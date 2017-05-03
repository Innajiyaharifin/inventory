<?php 

session_start();
$admin_id = $_SESSION['admin_id'];
$email = $_POST['email'];
$lama = $_POST['password_lama'];
$baru = md5($_POST['password_baru']);
$ulangi = md5($_POST['konfirmasi_pw']);

if ($baru != $ulangi) {
	$_SESSION['__flash']['code'] = "warning";
	$_SESSION['__flash']['message'] = "Password Baru anda tidak sama dengan ulangi password";
	header("location: pengaturan.php");

}
else
{
	include '../library/activerecord.php';
	$activerecord = new activerecord;
	$proses = $activerecord->getWhere("t_user","*","id='$admin_id'");
	if($data= $activerecord->fetch($proses))
	{
		if ($data->password!= md5($lama)) {
			$_SESSION['__flash']['code'] = "warning";
			$_SESSION['__flash']['message'] = "Password Lama anda tidak sama dengan yang ada di database";
			header("location: pengaturan.php");
		}
		else
		{
			$update = $activerecord->getUpdate("t_user","email='$email',password='$baru'","id='$admin_id'");
			if ($update) {
				$_SESSION['__flash']['code'] = "success";
				$_SESSION['__flash']['message'] = "Berhasil!!... Profil anda sudah berubah";
				header("location: index.php");
			}
		}
	}
}


 ?>






