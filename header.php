<?php 
error_reporting(-1); //buat nampilin error, disimpen di header karena file header pertama di proses di setiap file
ini_set('display_errors', 'On');  //sepaket sama error_reporting

session_start(); //mulai session

$cpage = basename($_SERVER['PHP_SELF']); // ngambil nama file yg sedang di akses
if($cpage == 'plan.php' && !isset($_SESSION['is_logged_in'])){ // lagi ngecek apa kita lagi di file plan.php atau engga
    $_SESSION['__flash']['code'] = 'danger';
    $_SESSION['__flash']['message'] = "Anda harus <strong>login</strong> sebelum merencanakan pernikahan";
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> <!-- meta itu identitas dari sebuah html, charset itu format penulisan text, utf-8 (ngasih tau ke browser)-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--ngasih tau compatibility dari user agen kalo ie ga support -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- responsive layar, -->
    <meta name="description" content=""><!-- ini digunakan untuk Search Engine Optimizer, deskripsi tentang website, kemudahan di index oleh google -->
    <meta name="keywords" content=""><!-- sama penggunaannya dengan description-->
    <meta name="author" content="">
    

    <title>VGT Inventory</title>

    <!-- Bootstrap core CSS -->
	
    <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/flexslider/flexslider.css" rel="stylesheet">
    <link href="assets/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
    <link href="assets/colorbox/example4/colorbox.css" rel="stylesheet">
    <link href="assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
     <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <script type="text/javascript" src="loginqrcode/main.js"></script>
    <script type="text/javascript" src="loginqrcode/llqrcode.js"></script>

    
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Engagement' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    
    <link href="css/style.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-default  navbar-fixed-top" role="navigation" style="height:30px;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="dashboard.php">
          <img class="logo" src="images/logos.png"></a>
        </div>
            
		        <div class="collapse navbar-collapse">
		          <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']): ?>
		          <ul class="nav navbar-nav navbar-right" id="nav">
                <?php if($_SESSION['role'] == 2): ?>
                  <li class="drop"><a href="dashboard.php">Dashboard</a></li>
                  <li class="drop"><a href="page_barang.php">Daftar Barang</a></li>
                 <!-- <li class="drop"><a href="list-gudang.php">Daftar Gudang</a></li>-->
                  <li class="drop"><a href="laporan.php">Laporan</a></li>
                  <li class="drop"><a href="dashboard.php">Hi, <?php echo $_SESSION['vendor_name']; ?></a>
                  </li>
                <?php elseif($_SESSION['role'] == 3): ?>
                  <li class="drop"><a href="admin/member.php">Member</a></li>
                  <li class="drop"><a href="admin/vendor.php">Vendor</a></li>
                  <li class="drop"><a href="admin/report.php">Laporan</a>
                  </li>
                  
                <?php else: ?>
                  <li class="drop"><a href="product.php">Produk</a></li>
                  <li><a href="vendor.php">Vendor</a></li>
                  <li><a href="plan.php?step=1">Rencanakan Pernikahan</a></li>
                  <li><a href="" role="button">Hi, <?php echo $_SESSION['fullname']; ?></a></li>
		            <?php endif; ?>
                  <li><a href="logout.php" role="button">Logout</a></li>
                
		          </ul>
              <?php else: ?>
              <ul class="nav navbar-nav navbar-right" id="nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><div class="hold-menu"><a href="login.php" class="btn btn-pink">Login</a></div></li>
              </ul>
              <?php endif; ?>
	          	</div>
	        
        
      </div><!-- /.container -->
    </div><!-- /.navbar -->
