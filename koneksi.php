<?php
$hostname="localhost";
$username="root";
$password="";
$database="akademik";
$koneksi = mysqli_connect($hostname,$username,$password,$database) or die ("koneksi ke MYSQL GAGAL"); 
if (!$koneksi) {
    die("Connection Failed: " . mysqli_connect_error());
}
?>