<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$tanggal  = $_POST['tanggal'];
$jenis  = $_POST['jenis'];
$kategori  = $_POST['kategori'];
$barang  = $_POST['barang'];
$nominal  = $_POST['nominal'];
$keterangan  = $_POST['keterangan'];

$transaksi = mysqli_query($koneksi,"select * from transaksi where transaksi_id='$id'");
$t = mysqli_fetch_assoc($transaksi);
$bank_lama = $t['transaksi_barang'];

$rekening = mysqli_query($koneksi,"select * from barang where barang_id='$barang'");
$r = mysqli_fetch_assoc($rekening);

// Kembalikan nominal ke saldo bank lama

if($t['transaksi_jenis'] == "Masuk"){
	$kembalikan = $r['stok_barang'] - $t['transaksi_nominal'];
	mysqli_query($koneksi,"update barang set stok_barang='$kembalikan' where barang_id='$barang'");

}else if($t['transaksi_jenis'] == "Keluar"){
	$kembalikan = $r['stok_barang'] + $t['transaksi_nominal'];
	mysqli_query($koneksi,"update barang set stok_barang='$kembalikan' where barang_id='$barang'");

}


if($jenis == "Masuk"){

	$rekening2 = mysqli_query($koneksi,"select * from barang where barang_id='$barang'");
	$rr = mysqli_fetch_assoc($rekening2);
	$saldo_sekarang = $rr['stok_barang'];
	$total = $saldo_sekarang+$nominal;
	mysqli_query($koneksi,"update barang set stok_barang='$total' where barang_id='$barang'");

}elseif($jenis == "Pengeluaran"){

	$rekening2 = mysqli_query($koneksi,"select *from barang where barang_id='$barang'");
	$rr = mysqli_fetch_assoc($rekening2);
	$saldo_sekarang = $rr['stok_barang'];
	$total = $saldo_sekarang+$nominal;
	mysqli_query($koneksi,"update barang set stok_barang='$total' where barang_id='$barang'");

}	

mysqli_query($koneksi, "update transaksi set transaksi_tanggal='$tanggal', transaksi_jenis='$jenis', transaksi_kategori='$kategori', transaksi_barang='$barang', transaksi_nominal='$nominal', transaksi_keterangan='$keterangan', where transaksi_id='$id'") or die(mysqli_error($koneksi));
header("location:transaksi.php");