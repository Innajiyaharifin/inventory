<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title> Neeqah</title>

	<link href="css/style.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">

</head>
<body>
<pre>
<?php if (isset($_SESSION['__flash']['code'] && $_SESSION['__flash']['code'] != "") ?>
<div class="alert alert-<?= $_SESSION['__flash']['code']?>"><?= $_SESSION['__flash']['message'];?></div>
<?php unset($_SESSION['__flash']) ?>
<?php endif; ?>
<form class="login-form" action="proseslogin_sidang.php" method="POST">
<?php if (isset($_SESSION['__flash']['code']) && $_SESSION['__flash']['code'] !=""): ?>
	<div class="alert alert-<?= $_SESSION['__flash']['code']?>"><?= $_SESSION['__flash']['message']?></div>
	<?php unset($_SESSION['__flash']) ?>
<?php endif; ?>
 <H2>LOGIN</H2>
 		Email 		: <input type="text" placeholder="email" name="email">
 		Password	: <input type="password" placeholder="password" name="password">

 		<div  class="form-actions">
 		<input type="submit" class="btn btn-pink" value="login"></div>
</form>
</pre>

</body>
</html>