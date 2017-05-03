<?php 
	session_start() ;
	if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == true && ($_SESSION['role'] == 3 or $_SESSION['role'] == 4))
		header('location:dashboard.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Viesta Global Trading</title>

    <!-- Bootstrap core CSS -->
	
    <link href="../assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    
    <link href="../assets/Hover/css/hover.css" rel="stylesheet">


    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Engagement' rel='stylesheet' type='text/css'>
    
    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="login">

<div class="logo">
	
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" action="login-process.php" method="post">
		<h3 class="sc-heading text-center mb50">Admin</h3>
		<?php if(isset($_SESSION['__flash']['code']) && $_SESSION['__flash']['code'] != ""): ?>
			<div class="alert alert-<?= $_SESSION['__flash']['code'] ?>"><?= $_SESSION['__flash']['message'] ?></div>
			<?php unset($_SESSION['__flash']) ?>
		<?php endif; ?>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label sr-only">Username</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
		</div>
		<div class="form-group">
			<label class="control-label  sr-only">Password</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-pink">Login</button>
			<label class="rememberme check">
			<div class="checkbox rememberme">
		  	</div>
			
		</div>
		
		
	</form>
	<!-- END LOGIN FORM -->
	
</div>

<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="../assets/jquery/dist/jquery.min.js"></script>
    <script src="../assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../js/response.js"></script>
    <script src="../js/parallax.js"></script>
    <script src="../js/custom.js"></script>
  </body>
</html>