<?php 
session_start(); 
require "connection.php";

if($_POST)
{	
	if($_SESSION['role'] == 1)
	{
		$id = $_SESSION['member_id'];
		$images = $_POST['images'];

		$return = true;
		
		
		$sql = "UPDATE `t_member` SET `photo` = ? WHERE `id` = ".$id;
		$gal = $db->prepare($sql);
		$gal->bind_param('s', $images);
		
		
		if(!$gal->execute())
		{
			$_SESSION['__flash']['code'] = 'danger';
			$_SESSION['__flash']['message'] = 'Ada kesalahan pada saat proses penyimpanan, coba sesaat lagi';
			header('location:user-profile.php');
		}
		else
		{
			$_SESSION['__flash']['code'] = 'success';
			$_SESSION['__flash']['message'] = 'Ganti Avatar Berhasil';
			header('location:user-profile.php');
		}
	}
	elseif($_SESSION['role'] == 2)
	{
		$id = $_SESSION['vendor_id'];
		$images = $_POST['images'];

		$return = true;
		
		
		$sql = "UPDATE `t_vendor` SET `logo` = ? WHERE `id` = ".$id;
		$gal = $db->prepare($sql);
		$gal->bind_param('s', $images);
		
		
		if(!$gal->execute())
		{
			$_SESSION['__flash']['code'] = 'danger';
			$_SESSION['__flash']['message'] = 'Ada kesalahan pada saat proses penyimpanan, coba sesaat lagi';
			header('location:vendor-profile.php');
		}
		else
		{
			$_SESSION['__flash']['code'] = 'success';
			$_SESSION['__flash']['message'] = 'Ganti Avatar Berhasil';
			header('location:vendor-profile.php');
		}
	}
}

?>