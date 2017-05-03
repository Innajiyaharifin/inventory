<?php 
session_start();
require "../connection.php"; 

if(isset($_GET['act']) && $_GET['act'] == 'freeze'){

	$report_id = $_GET['id'];


 	 $sql = "SELECT * FROM t_report INNER JOIN t_vendor ON t_vendor.id = t_report.vendor_id  WHERE t_report.id=$report_id";
	$report = $db->query($sql);
	

	if($report)
	{
		$data = $report->fetch_object();
		
		$sql = "UPDATE `t_user` SET `status` = '9' WHERE `id` = ?";
		$freeze = $db->prepare($sql);
		$freeze->bind_param('i', $data->user_id);
		$freeze->execute();

		if($freeze)
		{
			$_SESSION['__flash']['code'] = 'success';
			$_SESSION['__flash']['message'] = 'Vendor Telah dibekukan';
			header('location:report.php');	
		}
		
	}

}elseif(isset($_GET['act']) && $_GET['act'] == 'unfreeze'){

	$report_id = $_GET['id'];


 	 $sql = "SELECT * FROM t_report INNER JOIN t_vendor ON t_vendor.id = t_report.vendor_id  WHERE t_report.id=$report_id";
	$report = $db->query($sql);
	

	if($report)
	{
		$data = $report->fetch_object();
		
		$sql = "UPDATE `t_user` SET `status` = '1' WHERE `id` = ?";
		$freeze = $db->prepare($sql);
		$freeze->bind_param('i', $data->user_id);
		$freeze->execute();

		if($freeze)
		{
			$_SESSION['__flash']['code'] = 'success';
			$_SESSION['__flash']['message'] = 'Vendor Telah dipulihkan';
			header('location:report.php');	
		}
		
	}

}

?>
