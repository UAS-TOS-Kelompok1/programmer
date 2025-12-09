<?php
//include('dbconnected.php');
session_start();
include('koneksi.php');

$id = $_POST['id_hutang'];
$jumlah = $_POST['jumlah'];
$tgl = $_POST['tgl_hutang'];
$alasan = $_POST['alasan'];
$penghutang = $_POST['penghutang'];

//query update

 define('LOG','log.txt');
function write_log($log){  
 $time = @date('[Y-d-m:H:i:s]');
 $op=$time.' '.$log."\n".PHP_EOL;
 $fp = @fopen(LOG, 'a');
 $write = @fwrite($fp, $op);
 @fclose($fp);
}
//jika benar

$namaadmin = $_SESSION['nama'];


$stmt = $koneksi->prepare("UPDATE hutang SET jumlah=?, tgl_hutang=?, alasan=?, penghutang=? WHERE id_hutang=?");

// Periksa jika prepared statement gagal
if ($stmt === false) {
    write_log("Nama Admin : ".$namaadmin." => Edit hutang (Prepare Gagal) => ".$id." => Gagal");
    echo "ERROR, prepared statement gagal: " . $koneksi->error;
    exit();
}


$bind_result = $stmt->bind_param("isssi", $jumlah, $tgl, $alasan, $penghutang, $id); 

if ($bind_result === false) {
    write_log("Nama Admin : ".$namaadmin." => Edit hutang (Bind Gagal) => ".$id." => Gagal");
    echo "ERROR, bind parameter gagal: " . $stmt->error;
    exit();
}


if ($stmt->execute()) {
    write_log("Nama Admin : ".$namaadmin." => Edit Hutang => ".$id." => Sukses ");
    # redirect ke page index
    header("location:hutang.php?pesan=berhasil_update"); 
    exit(); // Penting untuk menghentikan eksekusi setelah header
}
else {
    write_log("Nama Admin : ".$namaadmin." => Edit hutang => ".$id." => Gagal. Error: " . $stmt->error);
    echo "ERROR, data gagal diupdate. Detail Error: ". $stmt->error;
}

$stmt->close();
//mysql_close($host);
?>