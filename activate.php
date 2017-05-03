<?php 
// FILE BUAT VERIFIKASI

require_once "connection.php"; 
$key = $_GET['key'];

$sql = "SELECT * FROM t_verification WHERE hash_key = '$key' LIMIT 1";
$check = $db->query($sql);


if($check->num_rows > 0) //kalo udah nemu kodenya/udah di verifikasi
{
	$data = $check->fetch_object();
	

	$sql = "UPDATE `t_user` SET `status` = '1' WHERE `id` = $data->user_id";
	$activate = $db->query($sql);


	$sql = "DELETE FROM `t_verification` WHERE `id` = $data->id"; //ini hapus kode verifikasi supaya ga ada double verifikasi
	$delete = $db->query($sql);


	$quser = "SELECT * FROM t_user WHERE id=".$data->user_id; 
	$user = $db->query($quser)->fetch_object(); 

	$qemail = "SELECT * FROM t_user WHERE email='".$user->email."' AND status = 0";
	$uemail = $db->query($qemail);
	
	while($email = $uemail->fetch_object() ) //ini buat hapus dari database kalo ada email yg sama tp belum di verifikasi
	{ //ini hapus data dari record  yg samadari 4 tabel 
		$sql = "DELETE FROM `t_verification` WHERE `user_id` = $email->id";
		$delete = $db->query($sql);

		$sql = "DELETE FROM `t_member` WHERE `user_id` = $email->id";
		$delete = $db->query($sql);
	

		$sql = "DELETE FROM `t_vendor` WHERE `user_id` = $email->id";
		$delete = $db->query($sql);

		$sql = "DELETE FROM `t_user` WHERE `id` = $email->id";
		$delete = $db->query($sql);
	}

	$_SESSION['__flash']['code'] = 'success';
	$_SESSION['__flash']['message'] = 'Terima kasih';
	header('location:activated.php');	
}
else
{
	header('location:404.php');		
}
?>

