<?php
// hospital_queue.php

// Database configuration - change these to your settings
$db_host = 'localhost';
$db_name = 'akademik';
$db_user = 'root';
$db_pass = '';

// Create PDO connection
try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}

// Function to sanitize output for HTML
function e($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$msg = '';
$error = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['reset'])) {
        // Reset the database
        try {
            $stmt = $pdo->prepare('DELETE FROM queue_entries');
            $stmt->execute();

            // Reset the auto-increment value
            $stmt = $pdo->prepare('ALTER TABLE queue_entries AUTO_INCREMENT = 1');
            $stmt->execute();

            $msg = "Database telah direset. Semua entri antrian telah dihapus.";
        } catch (PDOException $ex) {
            $error = "Terjadi kesalahan saat mereset database: " . $ex->getMessage();
        }
    } else {
        $department = trim($_POST['department'] ?? '');

        // Validate input
        if ($department === '') {
            $error = 'Silakan pilih poliklinik/departemen.';
        } else {
            try {
              $stmt = $pdo->prepare('INSERT INTO queue_entries (department, created_at) VALUES (?, NOW())');
              $stmt->execute([$department]); // BENAR

                $msg = "Nomor antrian Anda adalah: " . $pdo->lastInsertId();
            } catch (PDOException $ex) {
                $error = "Terjadi kesalahan saat memasukkan data: " . $ex->getMessage();
            }
        }
    }
}

// Fetch current queue ordered by created_at ascending
try {
    $stmt = $pdo->query('SELECT * FROM queue_entries ORDER BY created_at ASC');
    $queue = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $ex) {
    $queue = [];
    $error = "Terjadi kesalahan saat mengambil antrian: " . $ex->getMessage();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Antrian Pendaftaran Rumah Sakit</title>
<style>
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #4a90e2, #50e3c2);
    margin: 0;
    padding: 0;
    display: flex;
    min-height: 100vh;
    justify-content: center;
    align-items: center;
  }
  .container {
    background: #fff;
    max-width: 480px;
    width: 100%;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 15px 25px rgba(0,0,0,0.3);
    text-align: center;
  }
  h1 {
    margin-bottom: 15px;
    color: #333;
    font-weight: 700;
  }
  p.subtitle {
    margin-bottom: 20px;
    color: #666;
    font-size: 16px;
  }
  form {
    display: flex;
    flex-direction: column;
    gap: 15px;
  }
  select {
    padding: 12px 15px;
    border-radius: 10px;
    border: 1.5px solid #ddd;
    font-size: 16px;
    outline: none;
    transition: all 0.3s ease;
  }
  select:focus {
    border-color: #4a90e2;
    box-shadow: 0 0 8px #4a90e2aa;
  }
  button {
    background-color: #4a90e2;
    color: #fff;
    padding: 15px;
    border-radius: 10px;
    border: none;
    font-size: 18px;
    font-weight: 700;
    cursor: pointer;
    transition: background-color 0.25s ease;
  }
  button:hover {
    background-color: #357abd;
  }
  .message {
    margin-bottom: 15px;
    font-weight: 600;
  }
  .message.success {
    color: green;
  }
  .message.error {
    color: red;
  }
  .queue-list {
    margin-top: 30px;
    text-align: left;
  }
  .queue-list h2 {
    font-size: 20px;
    margin-bottom: 12px;
    color: #444;
  }
  .queue-item {
    background: #50e3c2;
    color: #fff;
    padding: 12px 18px;
    margin-bottom: 10px;
    border-radius: 10px;
    box-shadow: 0 0 8px #50e3c2aa;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
  }
  .queue-item span {
    font-weight: 600;
  }
  @media (max-width: 480px) {
    .container {
      margin: 15px;
      padding: 20px;
    }
  }
</style>
<script>
  function confirmReset() {
    return confirm('Apakah Anda yakin ingin mereset database? Semua data antrian akan hilang.');
  }
</script>
</head>
<body>
<div class="container">
    <h1>Antrian Pendaftaran Rumah Sakit</h1>
    <p class="subtitle">Silakan pilih departemen tujuan Anda.</p>

    <?php if ($msg): ?>
    <div class="message success"><?= $msg ?></div>
    <?php endif; ?>
    <?php if ($error): ?>
    <div class="message error"><?= e($error) ?></div>
    <?php endif; ?>

    <form method="post" action="">
  <select name="department" required>
    <option value="" disabled <?= empty($_POST['department']) ? 'selected' : '' ?>>Poliklinik/Departemen Tujuan</option>
    <?php
    $departments = ['Umum', 'Gigi', 'Pediatri', 'Kardiologi', 'Neurologi', 'Bedah'];
    foreach ($departments as $dept) {
        $selected = (isset($_POST['department']) && $_POST['department'] === $dept) ? 'selected' : '';
        echo '<option value="'.e($dept).'" '.$selected.'>'.e($dept).'</option>';
    }
    ?>
  </select>
  <button type="submit">Daftar Antrian</button>
  <button type="submit" name="reset" value="1" style="background:#d9534f; margin-top:10px;"
    onclick="return confirm('Apakah Anda yakin ingin mereset database? Semua data antrian akan hilang.')">
    Reset Database
  </button>
</form>


    <?php if (count($queue) > 0): ?>
    <div class="queue-list">
      <h2>Daftar Antrian</h2>
      <?php foreach ($queue as $index => $entry): ?>
      <div class="queue-item">
        <span><?= $index + 1 ?>. Pasien</span>
        <span>Dept: <?= e($entry['department']) ?></span>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>
</body>
</html>
