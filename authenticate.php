<?php 

if( !session_id() )
{
    session_start();
}

	if(isset($_POST['send'])){

		$arr= array();
/*
		if($_POST['credential'] == 'momo'){
			$_SESSION['logged_in'] = true;
			$arr['success'] = true;
		} else {
			$arr['success'] = false;
		}
*/
		$arr['success'] = true;
		$arr['artikel'] = $_POST['credential'];
		echo json_encode($arr);
	}

?>