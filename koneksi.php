<?php

$host = 'localhost';
$nama = 'root';
$pass = '01000110';
$db = 'keuangan';

$koneksi = mysqli_connect($host, $nama,$pass, $db);

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}
?>
