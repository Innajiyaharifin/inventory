<?php 
require_once "connection.php" ;
require "vendor/autoload.php";

session_start();
$kd_gudang=$_POST['kd_gudang'];
$nama_gudang=$_POST['nama_gudang'];
$vendor_id=$_SESSION['vendor_id'];
    



$sql = "INSERT INTO  `t_daftar_gudang` (`kd_gudang` , `nama_gudang` , `vendor_id`)
	VALUES ( ?,?,?)";
	

	
	$product = $db->prepare($sql);
	$product->bind_param('ssi', $kd_gudang, $nama_gudang, $vendor_id);
	$product->execute(); //proses
	
	if($product)
	{
		$_SESSION['__flash']['code'] = 'success'; //kita ngasih info bahwa ini tuh danger(error)
		$_SESSION['__flash']['message'] = 'Gudang berhasil ditambahkan';
		header('location: list-gudang.php');		
	}
	else
	{
		$_SESSION['__flash']['code'] = 'error'; //kita ngasih info bahwa ini tuh danger(error)
		$_SESSION['__flash']['message'] = 'Gudang gagal ditambahkan';
		header('location: add-gudang.php');			
	}



?>


