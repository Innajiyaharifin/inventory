<?php 
session_start();
require_once "connection.php";

$id=$_SESSION['user_id'];
$name=$_POST['name'];
$alamat=$_POST['alamat'];
$telp=$_POST['hp'];
$email=$_POST['email'];
$sql="UPDATE  `neeqah`.`t_user` SET 
`email` = ?
WHERE  `t_user`.`id` =$id";

$query = $db->prepare($sql);
$query->bind_param('s', $email);
$vendor=$query->execute();


$sql="UPDATE  `neeqah`.`t_member` SET 
`fullname` = ?, 
`alamat` =  ?,
`telp` =  ?
WHERE  `t_member`.`user_id` =$id";

$query = $db->prepare($sql);
$query->bind_param('sss', $name,$alamat,$telp);
$vendor=$query->execute();


if($vendor)
	{
		$_SESSION['info'] = 'success';
		$_SESSION['message'] = 'Data Berhasil disimpan';
				header('location:user-profile.php');
}
else

	{
		$_SESSION['info'] = 'danger';
		$_SESSION['message'] = 'Ggal UPDATE	';
		header('location:edit-profile.php');
	}


?>