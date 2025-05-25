<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "akademik";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $alamat = $_POST['alamat'];

    // Query untuk menambah pasien
    $sql = "INSERT INTO tambah_pasien (nama, umur, alamat) VALUES ('$nama', '$umur', '$alamat')";

    if ($conn->query($sql) === TRUE) {
        echo "Data pasien berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pasien</title>
</head>
<body>
    <form method="post" action="">
    <h2>Tambah Pasien</h2>
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br>
        <label for="umur">Umur:</label><br>
        <input type="number" id="umur" name="umur" required><br>
        <label for="alamat">Alamat:</label><br>
        <input type="text" id="alamat" name="alamat" required><br><br>
        <input type="submit" value="Tambah Pasien">
    </form>
</body>
<style>
    /* style.css atau langsung di <style> */
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
  overflow-y: auto;
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
  box-sizing: border-box;
}

h2 {
  text-align: center;
  margin-bottom: 20px;
  font-size: 1.8rem;
  color: #333;
}

label {
  display: block;
  margin-bottom: 6px;
  font-weight: 600;
  color: #333;
}

input[type="text"],
input[type="number"],
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

</style>
</html>
