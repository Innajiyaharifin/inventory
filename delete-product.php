<?php
session_start();
include "connection.php";
$id=$_GET['id'];

$sql="DELETE from t_produk_gallery where produk_id=$id";
$result = $db->query($sql);

$sql="DELETE from t_produk where id=$id";
$result = $db->query($sql);
if($result)
{
	$_SESSION['info'] = 'success';
	$_SESSION['message'] = 'Data Berhasil Didelete';
	header('location: list-product.php');
}
else
{
	$_SESSION['info'] = 'danger';
	$_SESSION['message'] = 'Data Gagal Didelete';
	header('location: list-product.php');	
}

?>
