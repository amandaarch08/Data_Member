<?php
// File koneksi ke database
$host   = "localhost";
$user   = "root";
$pass   = "";
$dbname = "db_quis_koneksi";

$koneksi = mysqli_connect($host, $user, $pass, $dbname);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>
