<?php 
session_start();
require_once "connection.php";

//initiate data dari session dan dari form
$id=$_SESSION['vendor_id'];
$user_id=$_SESSION['user_id'];
$name=$_POST['vname'];
$alamat=$_POST['alamat'];
$telp=$_POST['telp'];
$email=$_POST['email'];
$fullname=$_POST['fullname'];

//update data vendor
$sql="UPDATE  `neeqah`.`t_vendor` SET 
	`name` = ?, 
	`alamat` =  ?,
	`responsible_name` = ?,
	`telp` =  ? WHERE  `t_vendor`.`id` =$id";


$query = $db->prepare($sql);
$query->bind_param('ssss', $name,$alamat,$fullname, $telp);
$vendor=$query->execute();


//update data user
 $sql2="UPDATE  `neeqah`.`t_user` SET 
	`email` =  ?
	WHERE  `t_user`.`id` =$user_id";


$query2 = $db->prepare($sql2);
$query2->bind_param('s', $email);
$user=$query2->execute();




if($query)
{
	// Set session nama penaggung jawab dan nama vendor ketika berhasil update
	$_SESSION['fullname'] = $fullname;
	$_SESSION['vendor_name'] = $name;

	$_SESSION['info'] = 'success';
	$_SESSION['message'] = 'Data Berhasil disimpan';
	header('location:vendor-profile.php');
}
else
{
	$_SESSION['info'] = 'danger';
	$_SESSION['message'] = 'Ggal UPDATE	';
	header('location:edit-vendor.php');
}


?>