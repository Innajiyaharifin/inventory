<?php require_once"connection.php";
session_start();
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql="SELECT * FROM t_user where email='". $email."' AND password='". $password."' AND status = 1 LIMIT 1";
if (!$result= $db->query($sql)){
	die('query error'. $db->error);	
 }

if ($result->num_rows > 0)
 {
 	$data=$result->fetch_object();

 	if((int) $data->role == 3)
 	{
 		$_SESSION['__flash']['code']= 'danger';
 		$_SESSION['__flash']['message']= 'Anda tidak dapat Login ke halaman ini!!';
 		header('location:loginsidang.php');
 		break;
 	}
 	if((int) $data->status == 0)
 	{

 	$_SESSION['is_logged_in']=true;
 	$_SESSION['user_id']=$data->id;
 	$_SESSION['role']=$data->role;
 	}
 	if ($data->role==1){
 		$sql="SELECT * FROM t_member where user_id=". $data->id;
 		if (!$result=$db->query($sql)){
 			die('query error'. $db->error);
 		}
 		$member=$result->fetch_object();
 		$_SESSION['fullname']=$member->fullname;
 		$_SESSION['member_id']=$member->id;
 	}
 	if ($data->role==2) {
 		$sql="SELECT * FROM t_vendor where user_id=". $data->id;
 		if (!$result=$db->query($sql)) {
 			die('query error'. $db->error);
 		}
 		$vendor=$result->fetch_object();
 		$_SESSION['vendor_id']=$vendor->id;
 		$_SESSION['vendor_name']=$vendor->name;
 		$_SESSION['telp']=$vendor->telp;
 		$_SESSION['alamat']=$vendor->alamat;
 	}
 	if ($data->role==1)
 	header('location:user-profile.php');
 	else
 	header('location:vendor-profile.php');
  	
 }
 else
{
 	$_SESSION['__flash']['code']="danger";
 	$_SESSION['__flash']['message']="Username dan Password Salah";
 	header('location:loginsidang.php');
}
?>