<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>VGT Inventory</title>

	<link href="css/style.css" rel="stylesheet">
	<link href="css/login.css" rel="stylesheet">

</head>
<body>
<pre>
	<form action="sok.php" method="POST">
<?php if (isset($_SESSION['__flash']['code']) && $_SESSION['__flash']['code'] !=""): ?>
<div class="alert alert-<?= $_SESSION['__flash']['code']?>"><?= $_SESSION['__flash']['message'] ?></div>
<?php unset($_SESSION['__flash']) ?>
<?php endif; ?>

	<H2>LOGIN USER</H2>
	Username		: <input type="text" placeholder="email" name="email">
	Password		: <input type="password" placeholder="password" name="password">	
	<input type="submit" class="btn btn-pink" value="LOGIN">
</form>
</pre>




    <script src="assets/jquery/dist/jquery.min.js"></script>
    <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/response.js"></script>
    <script src="js/parallax.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>