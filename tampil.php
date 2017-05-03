<?php session_start(); ?>
<?php include "connection.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>VGT Inventoy</title>
</head>
<body>
	<?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) : ?>
		<?php if ($_SESSION['role'] == 1): ?>
			<a href="user.php">Produk</a>
			<a href="userhi.php">Hi, <?php echo $_SESSION['fullname']; ?></a>
		<?php endif; ?>
	<?php endif ;?>	

	<?php if (isset($_GET) && count($_GET) > 0) 
			$id=$_GET['id'];
		else
			$id=$_SESSION['user_id'];
			$sql="SELECT t_member.*, t_user.email FROM t_user INNER JOIN t_member ON t_user.id=t_member.user_id where t_member.user_id=".$id;
			$result=$db->query($sql);
			$data=$result->fetch_object();
			?>

			<p>
				<label>Fullname</label>
				<span><?= $data->fullname;?></span>
			</p>
			<p>
				<label>Alamat</label>
				<span><?= $data->alamat;?></span>
			</p><p>
				<label>Email</label>
				<span><?= $data->email;?></span>
			</p>
			<p>
				<label>Handphone</label>
				<span><?= $data->telp;?></span>
			</p>

</body>
</html>
