<?php 
require_once "../connection.php";
session_start();
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$sql="select * from t_user where email='". $email. "' AND password='". $password."' LIMIT 1";
	if (!$result = $db->query($sql)){ //ketika query ini dijalankan dan hasilnya error maka tampilkan pesan error
 		die('query error' . $db->error); 
	}

	if($result->num_rows > 0)
	{
		
		$data = $result->fetch_object();
		if ($data->status == 9) 
		{
			$_SESSION['__flash']['code'] = 'danger';
			$_SESSION['__flash']['message'] = 'Akun anda sedang dibekukan. segera hubungi staff admin yang berwenang';
			header('location:index.php');
		}
		elseif((int) $data->role == 3 or (int) $data->role == 4)
		{
			$_SESSION['is_logged_in']=true;
			$_SESSION['admin_id']=$data->id;
 			$_SESSION['role']=$data->role;

			header('location:dashboard.php');
		}
		else {
			
			$_SESSION['__flash']['code'] = 'danger';
			$_SESSION['__flash']['message'] = 'Anda bukan admin';
			header('location:index.php');	
			break;
		}
		
	}
	else
	{
		$_SESSION['__flash']['code'] = 'danger';
		$_SESSION['__flash']['message'] = 'Username dan Password Tidak Ditemukan';
		header('location:index.php');
	}
 ?>