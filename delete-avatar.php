<?php 
session_start(); 
require "connection.php";
$directory = dirname(__FILE__).'/uploads/avatar/';
if(isset($_POST['file']))
{
	echo $file = $directory.$_POST['file'];
	$thumb = $directory.'thumb/'.$_POST['file'];
	
	if(file_exists($file)){
		unlink($file);
	}
	if(file_exists($thumb)){
		unlink($thumb);
	}	
	echo 1;
}

?>