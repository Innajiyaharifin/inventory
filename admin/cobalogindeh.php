<?php 
require_once "../connection.php";
session_start();

$email=$_POST['email'];
$password=md5($_POST['password']);
$sql = "SELECT * FROM t_user where email='" .$email."' AND password='" .$password."' LIMIT 1 ";
if (!$result=$db->query($sql)) 
{
	die("query eror" .$db->error);
}
if ($result->num_rows > 0) {
	$data = $result->fetch_object();

	if ((int)$data->role != 3) {
		$_SESSION['__flash']['code']='danger';
		$_SESSION['__flash']['message']='anda bukan admin!!';
		header('location:lo.php');
		break;
	}
	$_SESSION['is_logged_in']=true;
	$_SESSION['admin_id']=$data->id;
	$_SESSION['role']=$data->role;
	header('location:dashboard.php');
	}
else 
{
	$_SESSION['__flash']['code']="danger";
	$_SESSION['__flash']['message']="username dan password tdk ditemukan";
	header('location:lo.php');
}

 ?>