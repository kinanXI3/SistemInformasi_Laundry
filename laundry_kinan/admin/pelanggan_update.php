<?php
//menghubungkan koneksi
include '../koneksi.php';

//menangkap data yg dikirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];

//update data
mysqli_query($koneksi, "UPDATE pelanggan SET pelanggan_nama='$nama', pelanggan_hp='$hp', pelanggan_alamat='$alamat' WHERE `pelanggan`.`pelanggan_id` = '$id';");

//mengalihkan halaman kembali ke halaman pelanggan
header("location:pelanggan.php");


?>