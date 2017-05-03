<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Neeqah</title>

    <!-- Bootstrap core CSS -->
	
    <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/fontawesome/css/font-awesome.min.css" rel="stylesheet">
   
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Engagement' rel='stylesheet' type='text/css'>
    
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="login">

<div class="logo">
	<a href="index.php">
	<img src="images/logo.png" alt=""/>
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<div class="login-form"  method="post">
		<h3 class="text-center mb50">Daftarkan Admin</h3>
		<?php if(isset($_SESSION['__flash']['code']) && $_SESSION['__flash']['code'] != ""): ?>
			<div class="alert alert-<?= $_SESSION['__flash']['code'] ?>"><?= $_SESSION['__flash']['message'] ?></div>
			<?php unset($_SESSION['__flash']) ?>
		<?php endif; ?>
		<ul class="nav nav-pills nav-justified" role="tablist">
		  <!--  <li role="presentation" class="active"><a href="#user" aria-controls="user" role="tab" data-toggle="tab"><i class="fa fa-user"></i> Member</a></li>-->
		    <li role="presentation"><a href="#vendor" aria-controls="vendor" role="tab" data-toggle="tab"><i class="fa fa-building"></i> Admin </a></li>
		</ul>
		<!--<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="user">
			<form class="form" method="POST" action="proses_register.php" data-parsley-validate>
					<input type="hidden" name="role" value="1">
					<div class="form-group">
						<!ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<!--			<label class="control-label sr-only">Full Name</label>
						<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Full Name" name="fullname" required="reqiuired"/>
					</div>
					<div class="form-group">
						<label class="control-label  sr-only">Email</label>
						<input class="form-control form-control-solid placeholder-no-fix" type="email" autocomplete="off" placeholder="Email" name="email" required="reqiuired"/>
					</div>
					<div class="form-group">
						<label class="control-label  sr-only">Password</label>
						<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" required="reqiuired"/>
					</div>
					<div class="form-group">
						<label class="control-label  sr-only">Telphone</label>
						<input class="form-control form-control-solid placeholder-no-fix" type="text" integer autocomplete="off" placeholder="+6281234567890" name="telphone" required="reqiuired"  data-inputmask="'mask': '+6299999999999'"/ >
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-pink">Sign Up</button>
					</div>

				</form>
			</div>-->
			<div role="tabpanel" class="tab-pane" id="vendor">
				<form class="form" method="POST" action="proses_register.php" data-parsley-validate>
				<input type="hidden" name="role" value="2">
					<div class="form-group">
						<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
						<label class="control-label sr-only">Nama Admin</label>
						<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Nama Admin" name="vendor_name" required/>
					</div>
					<div class="form-group">
						<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
						<label class="control-label sr-only">Nickname</label>
						<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Nick Name" name="fullname" required/>
					</div>
					<div class="form-group">
						<label class="control-label  sr-only">Email</label>
						<input class="form-control form-control-solid placeholder-no-fix" type="email" autocomplete="off" placeholder="Email" name="email" required/>
					</div>
					<div class="form-group">
						<label class="control-label  sr-only">Password</label>
						<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" required/>
					</div>
					<div class="form-group">
						<label class="control-label  sr-only">Telphone</label>
						<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Telphone" name="telphone" required   data-inputmask="'mask': '+6299999999999'"/>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-pink">Daftarkan</button>
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
    
    <script src="assets/jquery/dist/jquery.min.js"></script>
    <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/response.js"></script>
    <script src="assets/parsley/parsley.min.js"></script>
    <script src="assets/jquery-input-mask/jquery.inputmask.bundle.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>