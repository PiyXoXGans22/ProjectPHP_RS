<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Tambah Dokter</title>
  <link rel="stylesheet" href="css/form.css">
  <style>
body {
  margin: 0;
  padding: 0;
  font-family: 'Montserrat', sans-serif;
  background-image: url("img/bg_login1.jpg");
  background-size: cover;
  background-position: center;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background-repeat: no-repeat;
  overflow-y: auto; /* agar scroll jika tinggi form melebihi layar */
}

body::before {
  content: "";
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  backdrop-filter: blur(2px);
  background-color: rgba(0, 0, 0, 0.3);
  z-index: -1;
}

form {
  background: white;
  padding: 30px;
  border-radius: 16px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  width: 90%;
  max-width: 350px;
  max-height: 90vh;
  overflow-y: auto;
  box-sizing: border-box;
}

h2 {
  text-align: center;
  margin-bottom: 20px;
  font-size: 1.8rem;
}

@media screen and (max-height: 500px) {
  h2 {
    font-size: 1.3rem;
    margin-bottom: 10px;
  }
  form {
    padding: 15px;
  }
}

    label {
      display: block;
      margin-bottom: 6px;
      font-weight: 600;
      color: #333;
    }
    input[type="text"],
    input[type="date"],
    input[type="email"],
    input[type="submit"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 18px;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-sizing: border-box;
      font-size: 14px;
    }
    input[type="submit"] {
      background-color: #00796b;
      color: white;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    input[type="submit"]:hover {
      background-color: #004d40;
    }
    .success-message {
      color: green;
      text-align: center;
      margin-top: 10px;
    }
    .error-message {
      color: red;
      text-align: center;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <form action="" method="POST">
    <h2>Tambah Data Dokter</h2>

    <label for="nama">Nama Dokter</label>
    <input type="text" id="nama" name="nama" placeholder="Nama Dokter" required>

    <label for="nomor_SIP">Nomor SIP</label>
    <input type="text" id="nomor_SIP" name="nomor_SIP" placeholder="Nomor SIP" required>

    <label for="tanggal_lahir">Tanggal Lahir</label>
    <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>

    <label for="alamat">Alamat</label>
    <input type="text" id="alamat" name="alamat" placeholder="Alamat" required>

    <label for="no_telpon">No Telepon</label>
    <input type="text" id="no_telpon" name="no_telpon" placeholder="No Telepon" required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="Email" required>

    <input type="submit" name="simpan" value="SIMPAN">

    <?php
    if (isset($_POST['simpan'])) {
        include('koneksi.php');

        $nama = $_POST['nama'];
        $nomor_SIP = $_POST['nomor_SIP'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $alamat = $_POST['alamat'];
        $no_telpon = $_POST['no_telpon'];
        $email = $_POST['email'];

        $sql = mysqli_query($koneksi, "INSERT INTO tambah_dokter (nama, nomor_SIP, tanggal_lahir, alamat, no_telpon, email) VALUES ('$nama', '$nomor_SIP', '$tanggal_lahir', '$alamat', '$no_telpon', '$email')");

        if ($sql) {
            echo "<div class='success-message'>✅ Data Dokter berhasil disimpan.</div>";
        } else {
            echo "<div class='error-message'>❌ Gagal menyimpan: " . mysqli_error($koneksi) . "</div>";
        }
    }
    ?>
  </form>
</body>
</html>
