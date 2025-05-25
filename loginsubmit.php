<link rel="icon" type="image/png" href="img/logors.png">
<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

// Cek data user di database
$query = "SELECT * FROM user WHERE username = '$username'";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($hasil);

// Cek password
if ($data && $password == $data["password"]) {
    $_SESSION['hakakses'] = $data['hakakses'];
    $_SESSION['username'] = $data['username'];
    
    // Login berhasil
    echo "<script>
      alert('Login Berhasil!');
      window.location.href = 'menu.php';
    </script>";
} else {
    // Login gagal
    echo "<script>
      alert('Login Gagal!');
      window.location.href = 'login.php';
    </script>";
}
?>
