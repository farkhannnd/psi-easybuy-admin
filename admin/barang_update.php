<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$barang  = $_POST['barang'];
$stok  =$_POST['stok'];
$kategori =$_POST['idkategori'];

mysqli_query($koneksi, "update barang set barang='$barang', stok_barang='$stok', idkategori='$kategori' where barang_id='$id'");
header("location:barang.php");