<?php 
require_once "connection.php" ;
require "vendor/autoload.php";

session_start();
$id=$_POST['id'];
$kd_gudang=$_POST['kd_gudang'];
$nama_gudang=$_POST['nama_gudang'];
$total_item=$_POST['total_item'];


$sql = "UPDATE  `t_daftar_gudang` 
		SET   `kd_gudang` =  ?,
		`nama_gudang` =  ?,
		`total_item` = ?
		WHERE  `t_gudang`.`id` =$id";
var_dump($sql);
$user = $db->prepare($sql);
$user->bind_param('ssi', 
	$kd_gudang, $nama_gudang, $total_item);


if ($user->execute())
{
	$_SESSION['info'] = 'success';
	$_SESSION['message'] = 'Data Berhasil Disimpan';
	header('location: list-gudang.php');
}
else 
{
	$_SESSION['info'] = 'danger';
	$_SESSION['message'] = 'Data gagal disimpan';
	header('location: update-gudang.php?id='.$id);
}

?>