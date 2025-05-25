<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Tambah Spesialis</title>
  <link rel="icon" type="image/png" href="img/logors.png">
  <link rel="stylesheet" href="css/form.css">
</head>
<body>
  <form action="tambah_jurusan.php" method="POST">
    <h2>Tambah Spesialis</h2>
    <input type="text" name="nama_jurusan" placeholder="Input Nama Spesialis" required>
    <input type="submit" name="simpan" value="SIMPAN">
    
    <?php
    if (isset($_POST['simpan'])) {
        include('koneksi.php');
        $nama_jurusan = $_POST['nama_jurusan'];
        $sql = mysqli_query($koneksi, "INSERT INTO tb_jurusan (nama_jurusan) VALUES ('$nama_jurusan')");

        if ($sql) {
            echo "<div class='success-message'>✅ Data Spesialis berhasil disimpan.</div>";
        } else {
            echo "<div class='error-message'>❌ Gagal menyimpan: " . mysqli_error($koneksi) . "</div>";
        }
    }
    ?>
  </form>
  <style>
        /*backgoud gambar*/
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
}
/* Lapisan overlay untuk blur */
body::before {
  content: "";
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  backdrop-filter: blur(2px);
  -webkit-backdrop-filter: blur(3px);
  background-color: rgba(0, 0, 0, 0.3); /* Overlay gelap dengan transparansi */
  z-index: -1;
}
  </style>
</body>
</html>
