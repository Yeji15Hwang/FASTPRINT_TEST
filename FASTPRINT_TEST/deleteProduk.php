<?php 
include 'conn.php';
 
$id = $_GET['id'];
 
 
mysqli_query($conn,"delete from produk where id_produk='$id'");
 
header("location:home.php");
 
?>