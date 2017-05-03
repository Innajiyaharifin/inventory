<?php 
require_once "connection.php" ;

session_start();
$id=$_POST['id'];
$sku=$_POST['sku'];
$nama_barang=$_POST['nama_barang'];
$barang_keluar=$_POST['barang_keluar'];
$petugas=$_POST['petugas'];
date_default_timezone_set('Asia/Jakarta');
#$date= mktime(date("m"),date("d"),date("Y"));
$dates = date("Y-m-d", time());

$sql= "INSERT INTO  `barang_keluar` (`sku` , `nama_barang` , `barang_keluar`, `admin` , `tanggal_keluar`)
	VALUES (?,?,?,?,?)";
	
	$product = $db->prepare($sql);
	$product->bind_param('ssiss', $sku, $nama_barang, $barang_keluar, $petugas, $dates);
	$berhasil=$product->execute(); //proses


if ($berhasil)
{
	$_SESSION['info'] = 'success';
	$_SESSION['message'] = 'Data Berhasil Disimpan';
	header('location: list-product.php');
}
else 
{
	$_SESSION['info'] = 'danger';
	$_SESSION['message'] = 'Data gagal disimpan';
	header('location: kurangi_stok.php?sku='.$sku);
}

?>