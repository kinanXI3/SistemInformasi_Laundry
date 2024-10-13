<?php
//menghubungkan koneksi
include '../koneksi.php';

//menangkap data id yg dikirim dri url
$id = $_GET['id'];

//menghapus pelanggan
mysqli_query($koneksi,"DELETE FROM pelanggan WHERE pelanggan_id='$id'");

//alihkan halaman ke halaman pelanggan
header("location:pelanggan.php");
?>