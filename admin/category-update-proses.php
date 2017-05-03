<?php
error_reporting(-1);
ini_set('display_errors', 'On'); 
session_start();

include "../connection.php";
require "../vendor/autoload.php";

use Imagine\Gd\Imagine;
use Imagine\Image\Box;
use Imagine\Image\Point;
use Imagine\Image\ImageInterface;
$nama = $_POST['nama_kategori'];
$old_image = $_POST['old_image'];
$id = $_POST['id'];
	if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != "")
	{
		$image =$_FILES['image']['name'];
		$image = preg_replace("([^\w\s\d\-_~,;:\[\]\(\).])", "", $image);
		$image = preg_replace("([\.]{2,})", "", $image);

		$actual_name = pathinfo($image,PATHINFO_FILENAME);

	    $original_name = $actual_name;
	    $extension = pathinfo($image, PATHINFO_EXTENSION);
		try{
			

			$directory = dirname(__FILE__).'/../uploads/';
				
			
				
			if(!file_exists($directory.'/category/'))
				mkdir($directory.'/category/');
			if(!file_exists($directory.'/category/thumb/'))
				mkdir($directory.'/category/thumb/');
			$i = 1;

			while(file_exists($directory.'/'.$actual_name.".".$extension))
		    {           
		        $actual_name = (string)$original_name.$i;
		        $tname = $image = $actual_name.".".$extension;
		        $i++;
		    }

			$source = $directory.'/category/'.$image;
			$result = $directory."/category/thumb/".$image;


			
			move_uploaded_file($_FILES['image']['tmp_name'], $source);
			

			$width  = 300;
			$height = 250;

			$imagine = new Imagine;
			$size = new Box($width, $height);
			$mode = ImageInterface::THUMBNAIL_OUTBOUND;

			$resizeimg = $imagine->open($source)
		                ->thumbnail($size, $mode);
		    $sizeR     = $resizeimg->getSize();
			$widthR    = $sizeR->getWidth();
			$heightR   = $sizeR->getHeight();

			$preserve  = $imagine->create($size);
			
			$startX = $startY = 0;
			if ( $widthR < $width ) {
			    $startX = ( $width - $widthR ) / 2;
			}
			if ( $heightR < $height ) {
			    $startY = ( $height - $heightR ) / 2;
			}
			$preserve->paste($resizeimg, new Point($startX, $startY))
		    ->save($result);	
			
		}catch(Exception $e)
		{
			var_dump($e);
			
		}
	}
	else{
		$image = $old_image;
	}

	$sql = "/* 1:56:35 PM localhost */ UPDATE `t_kategori` SET `nama_kategori` = ?, `image`=? WHERE `id` = $id";
	$kategori = $db->prepare($sql);
	
	$kategori->bind_param('ss', $nama, $image);
	
	
	
	if($kategori->execute())
	{
		$_SESSION['__flash']['code'] = 'success';
		$_SESSION['__flash']['message'] = 'Kategori Berhasil Dibuat';
		header('location: category.php');		
	}
	else
	{
		$_SESSION['info'] = 'error'; //kita ngasih info bahwa ini tuh danger(error)
		$_SESSION['message'] = 'Kategori Gagal Dibuat';
		header('location: category.php');			
	}



?>
