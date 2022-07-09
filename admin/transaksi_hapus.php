<?php 
include '../koneksi.php';
$id  = $_GET['id'];


$transaksi = mysqli_query($koneksi,"select * from transaksi where transaksi_id='$id'");
$t = mysqli_fetch_assoc($transaksi);
$stok_lama = $t['transaksi_barang'];

$rekening = mysqli_query($koneksi,"select * from barang where barang_id='$stok_lama'");
$r = mysqli_fetch_assoc($rekening);

$jenis = $t['transaksi_jenis'];
$nominal = $t['transaksi_nominal'];

if($jenis == "Masuk"){

	$saldo_sekarang = $r['stok_barang'];
	$total = $saldo_sekarang-$nominal;
	mysqli_query($koneksi,"update barang set stok_barang'=$total' where barang_id='$stok_lama'");

}elseif($jenis == "Keluar"){

	$saldo_sekarang = $r['stok_barang'];
	$total = $saldo_sekarang+$nominal;
	mysqli_query($koneksi,"update barang set stok_barang='$total' where barang_id='$stok_lama'");

}	


mysqli_query($koneksi, "delete from transaksi where transaksi_id='$id'");
header("location:transaksi.php");