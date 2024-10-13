<?php
//menghubungkan data yg dikirim dri form
include '../koneksi.php';

//menangkap data yg dikirim dri form
$pelanggan = $_POST['pelanggan'];
$berat = $_POST['berat'];
$tgl_selesai = $_POST['tgl_selesai'];

$tgl_hari_ini = date('Y-m-d');
$status = 0;

//mengambil data harga perkilo dri database
$h = mysqli_query($koneksi, "SELECT harga_perkilo FROM harga");
$harga_perkilo = mysqli_fetch_array($h);

//menghitung hrga laundry, harga perkilo x berat cucian
$harga = $berat*$harga_perkilo['harga_perkilo'];

//input data tabel transaksi
mysqli_query($koneksi, "INSERT INTO transaksi VALUES('','$tgl_hari_ini','$pelanggan','$harga','$berat','$tgl_selesai','$status')");

//menyimpan id dari data yg disimpan pada query insert data sebelumnya
$id_terakhir = mysqli_insert_id($koneksi);

//menangkap data form input array (jenis pakaian dan jumlah pakaian)
$jenis_pakaian = $_POST['jenis_pakaian'];
$jumlah_pakaian = $_POST['jumlah_pakaian'];

//input data cucian berdasarkan id transaksi (invoice) ke tabel pakaian
for($x=0;$x<count($jenis_pakaian);$x++){
    if($jenis_pakaian[$x] != ""){
        mysqli_query($koneksi, "INSERT INTO pakaian VALUES('','$id_terakhir','$jenis_pakaian[$x]','$jumlah_pakaian[$x]')");
    }
}

header("location:transaksi.php");

?>