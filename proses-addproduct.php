<?php 
require_once "connection.php" ;
require "vendor/autoload.php";

//ini buat thumbnails gambar. fungsinya buat motong gambar yg ukurannya ga masuk akal
use Imagine\Gd\Imagine; //use itu mempermudah pemanggilan satu file/class berdasarkan namespace sebagai pengganti nama folder.
use Imagine\Image\Box; //
use Imagine\Image\Point;
use Imagine\Image\ImageInterface;
	
session_start();

$sku=$_POST['sku'];
$nama=$_POST['nama'];
//$harga=$_POST['harga'];
//$total_stok = $_POST['total_stok'];
//$berat = $_POST['berat'];
//$min_qty=$_POST['min_qty'];
$content=$_POST['content'];
$image=$_FILES['image']['name'];//name ini bawaan namanya
//ngilangin yg bukan kata misalkan spasi, angka atau character -_~,;:[]().
$image = preg_replace("([^\w\s\d\-_~,;:\[\]\(\).])", "", $image); //stackoverflow
$image = preg_replace("([\.]{2,})", "", $image);
//$date=date("Y-m-d h:i:s");
$status=$_POST['status'];
$kategori=$_POST['kategori'];
$stts=$_POST['stts'];
//$kd_gudang=$_POST['kd_gudang'];
//$stok_gudang = $_POST['stok_gudang'];
$vendor_id=$_SESSION['vendor_id'];
    



$sql = "INSERT INTO  `t_produk` (`sku` , `nama_produk` , `desc`, `kategori_id` , `vendor_id` , `featured_image` ,`stts` , `status` )
	VALUES ( ?,?,?,?,?,?,?,?)";
	
	$product = $db->prepare($sql);
	$product->bind_param('ssssissi', $sku, $nama, $content, $kategori,$vendor_id, $image, $stts, $status);
	$product->execute(); //proses

/*	$produk_id=$product->insert_id;
	$sqls = "INSERT INTO  `t_gudang` (`kd_gudang`, `produk_id`, `stok_gudang` )
	VALUES ( ?,?,?)";
	$gudang = $db->prepare($sqls);
	$gudang->bind_param('sii', $kd_gudang, $produk_id, $stok_gudang);
	$gudang->execute(); //proses
*/	

	$_SESSION['kd_gudang'] = $gudang->kd_gudang;
	if($product)
	{
		$_SESSION['__flash']['code'] = 'success'; //kita ngasih info bahwa ini tuh danger(error)
		$_SESSION['__flash']['message'] = 'Produk berhasil ditambahkan';
		header('location: page_barang.php');		
	}
	else
	{
		$_SESSION['__flash']['code'] = 'error'; //kita ngasih info bahwa ini tuh danger(error)
		$_SESSION['__flash']['message'] = 'Produk gagal ditambahkan';
		header('location: add-product.php');			
	}



?>


