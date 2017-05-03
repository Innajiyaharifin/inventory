<?php
error_reporting(-1);
ini_set('display_errors', 'On'); 
require_once("connection.php");
session_start();

$user_id = $_SESSION['user_id'];
$member_id = $_SESSION['member_id'];
$budget = $_SESSION['budget'];
$sisaBudget = $_SESSION['sisaBudget'];
$undangan = $_SESSION['jml'];
$tgl = date('Y-m-d', strtotime($_SESSION['tgl']));
$products = $_SESSION['sel_product'];

$return = true;

$sql= "INSERT INTO t_plan (user_id, wedding_date, budget, jml_undangan) VALUES (?,?,?,?)";
$plan = $db->prepare($sql);
$plan->bind_param('isii', $member_id, $tgl, $budget, $undangan);

if($plan->execute() == true)
{
	$plan_id = $plan->insert_id;

	foreach($products as $product)
	{
		$sql = "SELECT * FROM t_produk WHERE id = $product";
		$prod= $db->query($sql);
		
		if($prod->num_rows > 0){
			$data = $prod->fetch_object();
			

			$sql= "INSERT INTO t_detail_plan (plan_id, produk_id, harga) VALUES (?,?,?)";
			$detail = $db->prepare($sql);
			$detail->bind_param('iii', $plan_id, $data->id, $data->harga);
			if($detail->execute() != true){
				$return = false;
				break;
			}

		}

	}

}
else
{
	$return = false;
}

if($return == false)
{
	$_SESSION['__flash']['code'] = 'danger';
	$_SESSION['__flash']['message'] = 'Terjadi kesalahan ketika menyimpan ke database';
	header('location:plan.php?step=4');	
	break;
}
else
{
	$_SESSION['__flash']['code'] = 'success';
	$_SESSION['__flash']['message'] = 'Terima Kasih';
	header('location:plan.php?step=4&id='.$plan_id);	
}




?>