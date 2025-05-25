<?php
session_start();
//delete all session
session_unset();
//menampilkan logout
$_SESSION['logout'] = 'Logout Berhasil.';
header("Location: login.php");
exit;
?>