<?php
require_once("connection.php");
session_start();
$product_id = $_POST['product_id'];
$harga =$_POST['harga'];
$cat_id =$_POST['cat_id'];
	
$sisaBudget = $_SESSION['sisaBudget'];
if(isset($_SESSION['sel_product']))
{
	if(!in_array($product_id, $_SESSION['sel_product'])){
		if($sisaBudget >= $harga)
		{
			$_SESSION['sel_product'][] = $product_id;
			$sisaBudget = $sisaBudget - $harga;
			$_SESSION['sisaBudget'] = $sisaBudget;
		}
		else
		{
			if(isset($_POST['ajax'])){
				$sisaBudget = $sisaBudget;
				$data = [];
				$data['method'] = 'error';
				echo json_encode($data);
				exit;			
			}
		}
	}
}
else
{
	$_SESSION['sel_product'][] = $product_id;
	
	$sisaBudget = $sisaBudget - $harga;
	$_SESSION['sisaBudget'] = $sisaBudget;	
}
if(isset($_POST['ajax'])){
	$data = [];
	$data['sisaBudget'] = $sisaBudget;
	$data['formatsisaBudget'] = 'Rp. '. number_format($sisaBudget, 2,',','.');
	$data['sel_product'] = $product_id;
	$data['method'] = 'remove';
	$data['product_count'] = count($_SESSION['sel_product']);

	echo json_encode($data);
}
else
	header('location:plan.php?step=3&cat_id='.$cat_id);

?>