<?php 
session_start(); 
require "connection.php";
$directory = dirname(__FILE__).'/uploads/gallery/';
if(isset($_POST['file']))
{ //fungsinya buat delete gambar
	$file = $directory.$_POST['file'];
	$thumb = $directory.'thumb/'.$_POST['file'];
	
	if(file_exists($file)){
		unlink($file);
	}
	if(file_exists($thumb)){
		unlink($thumb);
	}	
	echo $_POST['file'];
}

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	 $sql = 'SELECT * FROM t_produk_gallery WHERE id='.$id;
	$result = $db->query($sql);
	$data = $result->fetch_object();
	
	$file = $directory.$data->img;
	$thumb = $directory.'thumb/'.$data->img;
	
	if(file_exists($file))
		unlink($file);
	if(file_exists($thumb))
		unlink($thumb);

	$sql = "DELETE FROM `t_produk_gallery` WHERE id = ".$id;
	if($result = $db->query($sql))
	{
		$_SESSION['__flash']['code'] = 'success';
		$_SESSION['__flash']['message'] = $data->img.' telah di hapus dari gallery';
		header('location:gallery.php?id='.$data->produk_id);
	}
	else
	{
		$_SESSION['__flash']['code'] = 'danger';
		$_SESSION['__flash']['message'] = $data->img.' gagal di hapus dari gallery';
		header('location:gallery.php?id='.$data->produk_id);
	}
}
?>