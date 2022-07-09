<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$kategori  = $_POST['kategori'];

mysqli_query($koneksi, "update kategori_stok set namakategori='$kategori' where idkategori='$id'");
header("location:kategori.php");