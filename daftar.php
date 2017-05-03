<?php session_start(); ?>
<?php require_once "connection.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>VGT Inventory</title>
	<link href="css/style.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
</head>

<body>
<pre>
	<?php if (isset($_SESSION['flash']['code']) && $_SESSION['flash']['code'] != ""): ?>
	<div class="alert alert-<?=$_SESSION['__flash']['code']?>"><?=$_SESSION['__flash']['message'] ?></div>
	<?php unset($_SESSION['__flash']) ?>
	<?php endif; ?>
		<ul class="nav nav-pills nav-justified" role="tablist">
		    <li role="presentation" class="active"><a href="#user" aria-controls="user" role="tab" data-toggle="tab"><i class="fa fa-user"></i> User</a></li>
		    <li role="presentation"><a href="#vendor" aria-controls="vendor" role="tab" data-toggle="tab"><i class="fa fa-building"></i> Vendor</a></li>
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="user">
			<form class="form" method="POST" action="proses_daftar.php" data-parsley-validate>
					<input type="hidden" name="role" value="1">
					<div class="form-group">
						<label>Fullname</label>
						<input type="text" name="fullname">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password">
					</div>
					<div class="form-group">
						<label>Telepon</label>
						<input type="text" name="telphone" integer autocomplete="off" required="required" data-inputmask="'mask' : '+62990000000'"/>
					</div>
					<div>
						<button type="submit" class="btn btn-pink">SIgn Up</button>
					</div>
			<div role="tabpanel" class="tab-pane active" id="vendor">
			<form class="form" method="POST" action="proses_daftar.php" data-parsley-validate>
					<input type="hidden" name="role" value="2">
					<div class="form-group">
						<label>Nama Vendor</label>
						<input type="text" name="vendor_name">
					</div>
					<div class="form-group">
						<label>Nama Agent</label>
						<input type="text" name="fullname">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password">
					</div>
					<div class="form-group">
						<label>Telepon</label>
						<input type="text" name="email" integer autocomplete="off" required="required" data-inputmask="'mask' : '+62990000000'"/>
					</div>
					<div>
						<button type="submit" class="btn btn-pink">SIgn Up</button>
					</div>

	</form>
</pre>
</body>
</html>