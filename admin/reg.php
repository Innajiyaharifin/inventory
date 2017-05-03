<?php 
require '../library/activerecord.php';
$ar = new activerecord;
$email = $_POST['email'];
$pass = md5($_POST['password']);
$repass = md5($_POST['konfirmasi_pw']);
if ($pass != $repass) {
	echo "<script>alert('Password tidak sama');document.location='create_admin.php';</script>";
}

$check = $ar->getWhere("t_user","*","email = '$email' LIMIT 1");



if($check->num_rows > 0)
{	
	$_SESSION['__flash']['code'] = 'danger';
	$_SESSION['__flash']['message'] = 'Email sudah ada, coba email yang lain';
	header('location:register.php');
}
else
{
	$sql = "INSERT INTO t_user (email, password, role, status) VALUES ('$email','$pass','3','1')";
	$proses = $ar->query($sql);
	if ($proses) {
		echo "<script>alert('Admin Baru Berhasil Tersimpan');document.location='create_admin.php';</script>";
	}
	else
	{
		echo "Error";
	}
}
 ?>
