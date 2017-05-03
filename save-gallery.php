<?php 
session_start(); 
require "connection.php";

if($_POST)
{
	$id = $_POST['product_id'];
	$images = $_POST['images'];
	if($images != "")
	{
		$images = explode(',', $images);

		$return = true;
		foreach ($images as $image) {
			
			$sql = "INSERT INTO `t_produk_gallery` (`produk_id`, `img`)
					VALUES(?, ?);";
			$gal = $db->prepare($sql);
			$gal->bind_param('is', $id, $image);
			
			if(!$gal->execute()){
				$_SESSION['__flash']['code'] = 'danger';
				$_SESSION['__flash']['message'] = 'Ada kesalahan pada saat proses penyimpanan, coba sesaat lagi';
				$return = false;
				header('location:gallery.php?id='.$id);
				break;
			}


		}
		if($return == true){
			$_SESSION['__flash']['code'] = 'success';
			$_SESSION['__flash']['message'] = 'Upload gallery berhasil';
			header('location:gallery.php?id='.$id);
		}
	}
	header('location:gallery.php?id='.$id);
}
?>