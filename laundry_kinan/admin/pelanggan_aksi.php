<?php
//menghububngkan dengan koneksi
include '../koneksi.php';

//menangkap data yg dikirim dri form
$nama = $_POST['nama'];
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];

//input data ke tbel pelanggan
mysqli_query($koneksi, "INSERT INTO pelanggan VALUES('','$nama','$hp','$alamat')");

//mengalihkan halaman kembali ke halaman pelanggan
header("location:pelanggan.php");

?>