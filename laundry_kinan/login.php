<?php  

session_start();

include 'koneksi.php';

$username = $_GET['username'];
$password = md5($_GET['password']);

$data = mysqli_query($koneksi, "SELECT * FROM ADMIN WHERE username= '$username' and password= '$password'");

$check = mysqli_num_rows($data);

if($check > 0){
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:admin/index.php");
}else{
    header("location:index.php?pesan=gagal");
}




?>