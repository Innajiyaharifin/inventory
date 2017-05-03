<?php
session_start();
$_POST['budget'] = str_replace('_', '', $_POST['budget']);
$_POST['jml'] = str_replace('_', '', $_POST['jml']);
$_SESSION['budget']=$_POST['budget'];
$_SESSION['sisaBudget']=$_POST['budget'];
$_SESSION['tgl']=$_POST['tgl'];
$_SESSION['jml']=$jml=$_POST['jml'];
header('location:plan.php?step=2');
?>