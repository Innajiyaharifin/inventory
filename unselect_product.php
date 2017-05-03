<?php
require_once("connection.php");
session_start();
$product_id = $_POST['product_id'];
$harga =$_POST['harga'];
$cat_id =$_POST['cat_id'];
	
$sisaBudget = $_SESSION['sisaBudget'];
if(in_array($product_id, $_SESSION['sel_product']))
{
	if(($key = array_search($product_id, $_SESSION['sel_product'])) !== false) {
	    unset($_SESSION['sel_product'][$key]);
	}
	
		
	$sisaBudget = $sisaBudget + $harga;
	$_SESSION['sisaBudget'] = $sisaBudget;
}

if(isset($_POST['ajax'])){
	$data = [];
	$data['sisaBudget'] = $sisaBudget;
	$data['sel_product'] = $product_id;
		$data['formatsisaBudget'] = 'Rp. '. number_format($sisaBudget, 2,',','.');
	$data['method'] = 'add';
	$data['product_count'] = count($_SESSION['sel_product']);
	echo json_encode($data);
}
else
	header('location:plan.php?step=3&cat_id='.$cat_id);

?>