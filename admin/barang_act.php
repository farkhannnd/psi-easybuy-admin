<?php 
include '../koneksi.php';
$barang  =$_POST['barang'];
$stok =$_POST['stok'];
$idkategori =$_POST['idkategori'];

mysqli_query($koneksi, "insert into barang (barang, stok_barang, idkategori) values ('$barang','$stok','$idkategori')");
header("location:barang.php");
?>