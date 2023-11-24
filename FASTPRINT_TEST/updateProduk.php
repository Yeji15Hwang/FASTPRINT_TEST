<?php 
// koneksi database
include 'conn.php';
 
// ambil data dari page editProduk.php
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
 
 
//update data
mysqli_query($conn,"update produk set nama_produk = '$namaProduk', harga = '$harga', kategori_id ='$kategori', status_id ='$status' where id_produk='$id_produk'");
 
// kembali ke home.php
header("location:home.php");
 
?>