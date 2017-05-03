<?php 
error_reporting(-1);
ini_set('display_errors', 'On'); 

session_start(); 

if(!isset($_SESSION['is_logged_in']))
{
    header('location:index.php'); 
}

?>
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
	
    <link href="../assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/flexslider/flexslider.css" rel="stylesheet">
    <link href="../assets/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
    <link href="../assets/colorbox/example4/colorbox.css" rel="stylesheet">
    <link href="../assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Engagement' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    
    <link href="../css/style.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-default  navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><img src="../images/logo.png" alt=""></a>
        </div>
            
		        <div class="coll apse navbar-collapse">
		          <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']): ?>
		          <ul class="nav navbar-nav navbar-right" id="nav">
                
                  <li class="drop"><a href="member.php">Member</a></li>
                  <li class="drop"><a href="vendor.php">Vendor</a>
                  <li class="drop"><a href="category.php">Kategori</a></li>
                  
                  <li class="drop"><a href="report.php">Laporan</a>
                  <?php if (isset($_SESSION['role']) and $_SESSION['role']==4): ?>
                      <li class="drop"><a href="create_admin.php">Kelola Admin</a>
                  <?php endif ?>
                  <li class="drop"><a href="pengaturan.php">Pengaturan</a>
                  </li>
                  <li><div class="hold-menu"><a href="../logout.php" class="btn btn-pink">Logout</a></div></li>
                
		          </ul>
              <?php else: ?>
              
              <?php endif; ?>
	          	</div>
	        
        
      </div><!-- /.container -->
    </div><!-- /.navbar -->