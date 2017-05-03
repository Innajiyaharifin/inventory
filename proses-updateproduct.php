<?php 
require_once "connection.php" ;
require "vendor/autoload.php";

use Imagine\Gd\Imagine;
use Imagine\Image\Box;
use Imagine\Image\Point;
use Imagine\Image\ImageInterface;
	
session_start();
//$id=$_GET['id'];





$sku=$_POST['sku'];
$nama=$_POST['nama_produk'];
//$harga=$_POST['harga'];
//$total_stok = $_POST['total_stok'];
//$berat = $_POST['berat'];
//$min_qty=$_POST['min_qty'];
$content=$_POST['content'];
//$date=date("Y-m-d h:i:s");
$status=$_POST['status'];
$kategori=$_POST['kategori'];
$stts=$_POST['stts'];
//$kd_gudang=$_POST['kd_gudang'];
//$stok_gudang = $_POST['stok_gudang'];
$vendor_id=$_SESSION['vendor_id'];

//$old_image=$_POST['old_image'];
//$image=$_FILES['image']['name'];
//ngilangin yg bukan kata misalkan spasi, angka atau character -_~,;:[]().
//$image = preg_replace("([^\w\s\d\-_~,;:\[\]\(\).])", "", $image);
//$image = preg_replace("([\.]{2,})", "", $image);
$date=date("Y-m-d h:i:s");    



		

/*try{
	if($image != NULL && $old_image != $image)
	{
		$directory = dirname(__FILE__).'/uploads/';
		if(file_exists($directory.$image)){ //ngecek dulu filenya ada atau engga do directory itu .. kalo ada berrti
			$_SESSION['info'] = 'danger'; //kita ngasih info bahwa ini tuh danger(error)
			$_SESSION['message'] = 'Nama file ada yang sama';
			header('location: update-product.php?sku='.$sku);
		}		
		
			
		if(!file_exists($directory))
			mkdir($directory);
		if(!file_exists($directory.'/thumb/'))
			mkdir($directory.'/thumb/');

		$source = $directory.$image;
		$result = $directory."/thumb/".$image;
		
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
	}
	else
	{
		$image = $old_image;
	}
}catch(Exception $e)
{
	var_dump($e);
	
}*/


$sql = "UPDATE  `t_produk` 
		SET   `sku` =  ?,
		`nama_produk` =  ?,
		`kategori_id` =  ?,
		`status` =  ?,
		`desc` = ?,
		`vendor_id` = ?,
		`stts` = ?
		WHERE  `t_produk`.`sku` =$sku";
var_dump($sql);
$user = $db->prepare($sql);
$user->bind_param('ssiisis', $sku, $nama, $kategori, $status, $content, $vendor_id, $stts);


if ($user->execute())
{
	$_SESSION['info'] = 'success';
	$_SESSION['message'] = 'Data Berhasil Disimpan';
	header('location: list-product.php');
}
else 
{
	$_SESSION['info'] = 'danger';
	$_SESSION['message'] = 'Data gagal disimpan';
	header('location: update-product.php?sku='.$sku);
}

?>