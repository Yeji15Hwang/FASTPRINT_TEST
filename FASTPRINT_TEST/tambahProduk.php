<?php 
// koneksi database
include 'conn.php';
 
// menangkap data yang di kirim dari form
$id_produk = $_POST['idProduk'];
$namaProduk = $_POST['namaProduk'];
$harga = $_POST['harga'];
$kategori = $_POST['kategori'];
// $status = $_POST['status'];
if ($_POST['status'] == "bisa dijual"){
    $status = '1';
}
elseif($_POST['status'] == "tidak bisa dijual") {
    $status = '0';
}
 
// menginput data ke database
mysqli_query($conn,"insert into produk values('$id_produk','$namaProduk','$harga','$kategori','$status')");
 
// mengalihkan halaman kembali ke index.php
header("location:home.php");
 
?>