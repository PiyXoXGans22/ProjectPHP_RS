<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <link rel="icon" type="image/png" href="img/logors.png">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login Rumah Sakit</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<?php
session_start();
if (isset($_SESSION['logout'])) {
  echo "<script>alert('{$_SESSION['logout']}');</script>";
  unset($_SESSION['logout']); // Hapus setelah ditampilkan agar tidak muncul terus
}
?>

  <div class="card">
    <h1><img src="img/logors.png" width="100"></h1>
    <form method="post" action="loginsubmit.php">
      <table>
<tr>
  <td>Masukkan Username :</td>
  <td>
    <div class="input-group">
      <i class="fas fa-user"></i>
      <input name="username" type="text" required autocomplete="username" placeholder="Username" />
    </div>
  </td>
</tr>
<tr>
  <td>Masukkan Password :</td>
  <td>
    <div class="input-group">
      <i class="fas fa-lock"></i>
      <input name="password" type="password" required autocomplete="current-password" placeholder="Password"/>
    </div>
  </td>
</tr>
<tr>
  <td colspan="2" style="text-align: right; padding-right: 150px;">
    <a href="#" class="forgot" onclick="alert('Maaf, fitur belum tersedia untuk saat ini.'); return false;">Lupa Password?</a>
  </td>
</tr>

        <tr>
          <td></td>
          <td><input type="submit" name="submit" value="Login" class="submit-button" /></td>
        </tr>
      </table>
    </form>
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
