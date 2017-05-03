<?php 
session_start(); 
require "vendor/autoload.php";

use Imagine\Gd\Imagine;
use Imagine\Image\Box;
use Imagine\Image\Point;
use Imagine\Image\ImageInterface;

if(!empty($_FILES)){
	$image=$_FILES['file']['name'];
	//ngilangin yg bukan kata misalkan spasi, angka atau character -_~,;:[]().
	$image = preg_replace("([^\w\s\d\-_~,;:\[\]\(\).])", "", $image);
	$image = preg_replace("([\.]{2,})", "", $image);

	$actual_name = pathinfo($image,PATHINFO_FILENAME);

    $original_name = $actual_name;
    $extension = pathinfo($image, PATHINFO_EXTENSION);

	try{
		$directory = dirname(__FILE__).'/uploads/';
		
			
		if(!file_exists($directory))
			mkdir($directory);
		if(!file_exists($directory.'/avatar/'))
			mkdir($directory.'/avatar/');
		if(!file_exists($directory.'/avatar/thumb/'))
			mkdir($directory.'/avatar/thumb/');
		
		$i = 0;
		while(file_exists($directory.'/avatar/'.$actual_name.".".$extension))
	    {           
	        $actual_name = (string)$original_name.$i;
	        $tname = $image = $actual_name.".".$extension;
	        $i++;
	    }
	    $target = $directory.'/avatar/'.$image;
	    
		
		move_uploaded_file($_FILES['file']['tmp_name'], $target);
		

		$width  = 100;
		$height = 100;
		$result = $directory.'avatar/thumb/'.$image;


		
			$imagine = new Imagine;
			$size = new Box($width, $height);
			$mode = ImageInterface::THUMBNAIL_OUTBOUND;

			$resizeimg = $imagine->open($target)
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
		
		
		

		

		echo $image;
		
	}catch(Exception $e)
	{
		echo $image;
		
	}
}


?>