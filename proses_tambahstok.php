<?php 
require_once "connection.php" ;

session_start();
$id=$_POST['id'];
$sku=$_POST['sku'];
$nama_barang=$_POST['nama_barang'];
$barang_masuk=$_POST['barang_masuk'];
$petugas=$_POST['petugas'];
date_default_timezone_set('Asia/Jakarta');
#$date= mktime(date("m"),date("d"),date("Y"));
$dates = date("Y-m-d", time());

$sql= "INSERT INTO  `barang_masuk` (`sku` , `nama_barang` , `barang_masuk`, `petugas` , `tanggal`)
	VALUES (?,?,?,?,?)";
//var_dump($sql);
	
	$product = $db->prepare($sql);

	$product->bind_param('ssiss', $sku, $nama_barang, $barang_masuk, $petugas, $dates);
	$berhasil=$product->execute(); //proses


if ($berhasil)
{
	$_SESSION['info'] = 'success';
	$_SESSION['message'] = 'Data Berhasil Disimpan';
	header('location: produk-jual-putus.php');
}
else 
{
	$_SESSION['info'] = 'danger';
	$_SESSION['message'] = 'Data gagal disimpan';
	header('location: tambah_stok.php?sku='.$sku);
}

?>