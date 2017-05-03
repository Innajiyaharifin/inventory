<?php
error_reporting(-1);
ini_set('display_errors', 'On'); 
session_start();
include "../connection.php";
$id=$_GET['id'];

$sql="DELETE from t_kategori where id=$id";


if($result = $db->query($sql))
{
	$_SESSION['__flash']['code'] = 'success';
		$_SESSION['__flash']['message'] = 'Kategori Berhasil Didelete';
	header('location: category.php');
}
else
{
	$_SESSION['__flash']['code'] = 'danger';
	$_SESSION['__flash']['message'] = 'Kategori Gagal Didelete, karena ada product dalam kategori tersebut';
	header('location: category.php');	
}

?>
