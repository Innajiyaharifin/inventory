<?php 
session_start();
require_once "connection.php";

$email=$_POST['email'];
$password=md5($_POST['password'];
$sql="SELECT * FROM t_user where user_id='" .$email."' AND password='" .$password." ' AND status = 1 LIMIT 1";
if (!$result=$db->query($sql)) {
	die('mysql error'. $db->error);	
}

if ($result->num_rows > 0) {
	$data=$result->fetch_object();

	if ($data->role==3) 
	{
		$_SESSION['__flash']['code']="danger";
		$_SESSION['__flash']['message']="Anda tidak dapat Login ke halaman Ini!!";
		header('location:loginsidang.php');
		break;
	}
	if ($data->status==0) 
	{
		$_SESSION['__flash']['code']="danger";
		$_SESSION['__flash']['message']="Akun belum terverifikasi!!";
		header('location:loginsidang.php');
		break;
	}
	if ($data->status==9) 
	{
		$_SESSION['__flash']['code']="danger";
		$_SESSION['__flash']['message']="Akun anda dibekukan";
		header('location:loginsidang.php');
		break;
	}

	$_SESSION['is_logged_in']=true;
	$_SESSION['user_id']=$data->id;

	if ($data->role==1) {
		$sql="SELECT * FROM t_member where user_id=" .$data->id;
		if (!$result=$db->query($sql)) 
		{
			die('query error' .$db->error)
		}
		$member=$result->fetch_object();
		$_SESSION['fullname']=$member->fullname;
		$_SESSION['member_id']=$member->id;
	}
}
?>