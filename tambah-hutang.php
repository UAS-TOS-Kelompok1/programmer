<?php
//include('dbconnected.php');
include('koneksi.php');

$jumlah = $_POST['jumlah'];
$tgl_hutang = $_POST['tgl_hutang'];
$penghutang = $_POST['penghutang'];
$alasan = $_POST['alasan'];


//query update
$query = mysqli_query($koneksi,"INSERT INTO `hutang` (`jumlah`, `tgl_hutang`, `alasan`, `penghutang`) VALUES ('$jumlah', '$tgl_hutang', '$alasan','$penghutang')");

if ($query) {
 # credirect ke page index
 header("location:hutang.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>