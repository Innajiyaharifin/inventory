<?php 
session_start();
require "../connection.php"; 

if(isset($_GET['act']) && $_GET['act'] == 'freeze'){

	$id = $_GET['id'];


	
		$sql = "UPDATE `t_user` SET `status` = '9' WHERE `id` = ?";
		$freeze = $db->prepare($sql);
		$freeze->bind_param('i', $id);
		$freeze->execute();

		if($freeze)
		{
			$_SESSION['__flash']['code'] = 'success';
			$_SESSION['__flash']['message'] = ' Telah dibekukan';
			header('location:create_admin.php');	
		}
		
	

}elseif(isset($_GET['act']) && $_GET['act'] == 'unfreeze'){

	$id = $_GET['id'];

	
		
		$sql = "UPDATE `t_user` SET `status` = '1' WHERE `id` = ?";
		$freeze = $db->prepare($sql);
		$freeze->bind_param('i', $id);
		$freeze->execute();

		if($freeze)
		{
			$_SESSION['__flash']['code'] = 'success';
			$_SESSION['__flash']['message'] = ' Telah dipulihkan';
			header('location:create_admin.php');	
		}
		
	

}

?>
