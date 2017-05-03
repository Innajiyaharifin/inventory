<?php

include '../library/activerecord.php';

 ?>

<?php session_start(); 
$id = $_SESSION['admin_id'];
$activerecord = new activerecord;
$proses = $activerecord->getWhere("t_user","*","id='$id'");
$data=$activerecord->fetch($proses);
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
   
    <!-- Fonts -->
    <link href='../http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='../http://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>
    <link href='../http://fonts.googleapis.com/css?family=Engagement' rel='stylesheet' type='text/css'>
    
    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="../https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="../https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="login">

<div class="logo">
	<a href="index.php">
	<img src="../images/logo.png" alt=""/>
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<div class="login-form"  method="post">
		<h3 class="sc-heading text-center mb50">Change Profile</h3>
		<?php if(isset($_SESSION['__flash']['code']) && $_SESSION['__flash']['code'] != ""): ?>
			<div class="alert alert-<?= $_SESSION['__flash']['code'] ?>"><?= $_SESSION['__flash']['message'] ?></div>
			<?php unset($_SESSION['__flash']) ?>
		<?php endif; ?>
		
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="user">
			<form class="form" method="POST" action="change_password.php" data-parsley-validate>
					<input type="hidden" name="role" value="1">
					<div class="form-group">
						<label class="control-label  sr-only">Email</label>
						<input value="<?php echo $data->email; ?>"class="form-control form-control-solid placeholder-no-fix" type="email" autocomplete="off" placeholder="Email" name="email" required="reqiuired"/>
					</div>
					<div class="form-group">
						<label class="control-label  sr-only">Password Lama</label>
						<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password Lama" name="password_lama" required="reqiuired"/>
					</div>
					<div class="form-group">
						<label class="control-label  sr-only">Password Baru</label>
						<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password Baru" name="password_baru" required/>
					</div>
					<div class="form-group">
						<label class="control-label  sr-only">Konfirmasi Password</label>
						<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Konfirmasi Password" name="konfirmasi_pw" required/>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-pink">Save</button>
					</div>
				</form>
			</div>
		</div>


		
		
		
	</div>
	<!-- END LOGIN FORM -->
	
</div>

<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="../assets/jquery/dist/jquery.min.js"></script>
    <script src="../assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../js/response.js"></script>
    <script src="../assets/parsley/parsley.min.js"></script>
    <script src="../assets/jquery-input-mask/jquery.inputmask.bundle.min.js"></script>
    <script src="../js/custom.js"></script>
  </body>
</html>