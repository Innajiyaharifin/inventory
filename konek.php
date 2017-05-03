<?php 
$db= new mysqli("localhost", "root", "", "neeqah");
if ($db->connect_errno > 0) {
die('Unconnected Database' .$db->connect_error);
}

 ?>