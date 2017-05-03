<?php 
require_once "connection.php";
require "vendor/autoload.php";
session_start();
use Mailgun/Mailgun;

$mg = New Mailgun("key-7b4f2bee556cf6eb069eb77833b26a44");
$domain = "sandbox468ff3813c894c1db2b350a34909691c.mailgun.org";

$fullname=$_POST['fullname'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$telp=str_replace("_", "", $_POST['telphone']);
$role=$_POST['role'];

$sql="SELECT * FROM t_user WHERE email='$email' AND status = 1 LIMIT 1 ";
	$result=$db->query($sql);

	if ($result->num_rows > 0) {
		$_SESSION['flash']['code']="danger";
		$_SESSION['flash']['message']= "Email Sudah ada"!!;
		header('location:daftar.php')
	}
	else
		$sql="INSERT into t_user(email,password,role) VALUES (?,?,?)";
		$user=$db->prepare($sql);
		$user->bind_param('ssi', $email,$password,$role);
		$user->execute;

		$user_id=$user->insert_id;
		$hash_key=md5($email.uniqid());
		$sql="INSERT into t_verification (user_id, hash_key) VALUES (?,?)";
		$verifiy=$db->prepare($sql);
		$verify->bind_param('is', $user_id, $hash_key);
		$verifiy->execute;
		
	if ($role== 1) {
		$sql= "INSERT into t_member (user_id, fullname, telp) VALUES(?,?,?)";
			$member=$db->prepare($sql);
			$member->bind_param('iss',$user_id, $fullname, $telp);
			$member->execute;
	}	elseif ($role== 2) {
		$vendor_name=$_POST['vendor_name'];
		$sql= "INSERT into t_vendor (user_id, name, telp, responsible_name) VALUES(?,?,?,?)";
			$vendor=$db->prepare($sql);
			$vendor->bind_param('isss',$user_id, $vendor_name, $telp, $fullname);
			$vendor->execute;
	}	
	

	$url = "http://localhost/inventory/activate.php?key=".$hash_key;
	try
	{
		$mg->sendMessage($domain, [
							'from'    => 'innajiyaharifin@gmail.com', 
		                    'to'      => $email, 
		                    'subject' => 'Verification', 
		                    'text'    => 'no support html',
		                    'html'	  => "Klik <a href='$url'>disini</a> untuk memferivikasi"
		                   	]
	                   );
	}
	catch(Exception $e)
	{

	}
	header('location:lanjut_register.php');
}







 ?>