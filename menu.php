<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Menu Rumah Sakit</title>
  <link rel="icon" type="image/png" href="img/logors.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="css/menu.css">
</head>
<body>
<div class="menu-container">
  <h2>Menu Utama</h2>

  <?php
  if ($_SESSION['hakakses'] == "admin") {
      echo "<a href='tambah_jurusan.php' class='menu-item'><i class='fas fa-stethoscope'></i> Tambah Spesialis</a>";
      echo "<a href='tambah_dokter.php' class='menu-item'><i class='fas fa-user-doctor'></i> Tambah Dokter</a>";
      echo "<a href='tambah_pasien.php' class='menu-item'><i class='fas fa-user-injured'></i> Tambah Pasien</a>";
      echo "<a href='cetak_mahasiswa.php' class='menu-item'><i class='fas fa-file-medical'></i> Cetak Data Dokter</a>";
      echo "<a href='jurusan.php' class='menu-item'><i class='fas fa-notes-medical'></i> Cetak Spesialis</a>";
      echo "<a href='hapus_jurusan.php' class='menu-item'><i class='fas fa-stethoscope'></i> Hapus Spesialis</a>";
      echo "<a href='reset_db.php' class='menu-item'><i class='fas fa-user-injured'></i> Hapus Antrian</a>";
      echo "<a href='logout.php' class='menu-item logout'><i class='fas fa-sign-out-alt'></i> Logout</a>";
  
    } else if ($_SESSION['hakakses'] == "user") {
      echo "<a href='hospital_queue.php' class='menu-item'><i class='fas fa-clinic-medical'></i> Daftar Antrian</a>";
      echo "<a href='logout.php' class='menu-item logout'><i class='fas fa-sign-out-alt'></i> Logout</a>";
  }
  ?>
</div>

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
