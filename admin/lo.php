<? session_start();
	if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == true && $_SESSION['role'] == 3)
		header('location:dashboard.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN ADMIN</title>

    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet">

</head>
<body>
<pre>
<form action="cobalogindeh.php" method="POST">
	<?php if (isset($_SESSION['__flash']['code']) && $_SESSION['__flash']['code']!= ""):?>
		<div class= "alert alert-<?=$_SESSION['__flash']['code']?>"><?=$_SESSION['__flash']['message']?></div>
		<?php unset($_SESSION['__flash']) ?>
		<?php endif; ?>
		Username	: <input type="text" name="email">
		Password	: <input type="password" name="password">
		<button type="submit" class="btn btn-pink">LOGIN </button>
</form>
</pre>
    <script src="../assets/jquery/dist/jquery.min.js"></script>
    <script src="../assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../js/response.js"></script>
    <script src="../js/parallax.js"></script>
    <script src="../js/custom.js"></script>

</body>
</html>