<?php
require_once("connection.php");
session_start();

$category = $_POST['category'];

$data = explode(',', $category);
unset($_SESSION['category']);
foreach($data as $d){		
	$_SESSION['category'][] = $d;	
}
header('location:plan.php?step=3');

?>