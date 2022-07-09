<?php 
include '../koneksi.php';
$tanggal  = $_POST['tanggal'];
$jenis  = $_POST['jenis'];
$kategori  = $_POST['kategori'];
$barang  = $_POST['barang'];
$nominal  = $_POST['nominal'];
$keterangan  = $_POST['keterangan'];


$rekening = mysqli_query($koneksi,"select * from barang where barang_id='$barang'");
$r = mysqli_fetch_assoc($rekening);

if($jenis == "Pemasukan"){

	$saldo_sekarang = $r['stok_barang'];
	$total = $saldo_sekarang+$nominal;
	mysqli_query($koneksi,"update barang set stok_barang ='$total' where barang_id='$barang'");

}elseif($jenis == "Pengeluaran"){

	$saldo_sekarang = $r['stok_barang'];
	$total = $saldo_sekarang-$nominal;
	mysqli_query($koneksi,"update barang set stok_barang='$total' where barang_id='$barang'");

}


mysqli_query($koneksi, "insert into transaksi values (NULL,'$tanggal','$jenis','$kategori','$barang','$nominal','$keterangan')")or die(mysqli_error($koneksi));
header("location:transaksi.php");