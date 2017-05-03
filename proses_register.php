<?php 
require_once "connection.php";
require_once "vendor/autoload.php";

use Mailgun\Mailgun; // use library untuk kirim email

//
$mg = new Mailgun("key-7b4f2bee556cf6eb069eb77833b26a44");
//ini domain yg di register di mailgun, tapi ini menggunakan sandbox dari.. ini set up kirim email, kalo pake sandbox ntar ada by mailgun 
$domain = "sandbox468ff3813c894c1db2b350a34909691c.mailgun.org";  


$fullname=$_POST['fullname'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$telp=str_replace("_", "", $_POST['telphone']);
$role=$_POST['role'];

$sql = "SELECT * FROM t_user WHERE email = '$email' AND status = 1 LIMIT 1";
$check = $db->query($sql);



if($check->num_rows > 0)
{	
	$_SESSION['__flash']['code'] = 'danger';
	$_SESSION['__flash']['message'] = 'Email sudah ada, coba email yang lain';
	header('location:register.php');
}
else
{
	$sql = "INSERT INTO t_user (email, password, role) VALUES (?,?,?)";
	$user = $db->prepare($sql);
	$user->bind_param('ssi', $email,$password, $role);
	$user->execute();
	
	$user_id = $user->insert_id;
	$hash_key = md5($email.uniqid()); 
	$sql= "INSERT INTO t_verification (user_id, hash_key) VALUES (?,?)";
	$verify = $db->prepare($sql);
	$verify->bind_param('is', $user_id, $hash_key);
	$verify->execute();
	

	if($role == 1)
	{
		$sql= "INSERT INTO t_member (user_id, fullname, telp) VALUES (?,?,?)";
		$member = $db->prepare($sql);
		$member->bind_param('iss', $user_id,$fullname,$telp);
		$member->execute();
		
	}
	elseif($role == 2)
	{
		$vendor_name = $_POST['vendor_name'];
		$sql= "INSERT INTO t_vendor (user_id, name, telp, responsible_name) VALUES (?,?,?, ?)";
		$vendor = $db->prepare($sql);
		$vendor->bind_param('isss', $user_id,$vendor_name,$telp, $fullname);
		$vendor->execute();
	}




	$url = "http://localhost/inventory/activate.php?key=".$hash_key; 

	try 
	{
		// nyoba ngirim email
		$mg->sendMessage($domain, [
							'from'    => 'innajiyaharifin@gmail.com', 
		                    'to'      => $email, 
		                    'subject' => 'Verification', 
		                    'text'    => 'no support html',
		                    'html'	  => "Klik <a href='$url'>disini</a> untuk memferivikasi"
		                   	]
	                   );
	}
	catch(Exception $e) // kalo gagal ngirim email gagal, hapus pesan error
	{

	}
	header('location:lanjut_register.php');
}




 ?>