<?php 
	$cpage = basename($_SERVER['PHP_SELF']);
	if(($cpage != 'product-detail.php') && isset($_GET) && count($_GET) > 0){
		$id = $_GET['id'];
		$sql = "SELECT * FROM t_vendor WHERE id=$id";
		
	}else{
		$sql= "SELECT t_produk.*, t_kategori.nama_kategori, t_vendor.alamat, t_vendor.id as vendor_id, t_vendor.telp, t_vendor.name as vendor_name, t_user.email from t_kategori INNER JOIN t_produk on t_produk.kategori_id=t_kategori.id INNER JOIN t_vendor  ON t_vendor.id = t_produk.vendor_id INNER JOIN t_user ON t_user.id = t_vendor.user_id WHERE t_produk.id = $id";		
		$result = $db->query($sql);
		$data = $result->fetch_assoc();

		$sql = "SELECT * FROM t_vendor WHERE id=".$data['vendor_id'];
	}
	

	$result = $db->query($sql);
	$data = $result->fetch_assoc();
	
?>
<div class="col-md-3">
	<div class="user-panel">
		<div class="text-center" class="post-image">
			<?php if($data['logo'] != "" ): ?>
				<img src="uploads/avatar/thumb/<?= $data['logo'] ?>" alt="Post" class="img-responsive img-thumbnail img-circle">
			<?php else: ?>
				<img src="images/default.png" alt="Post" class="img-thumbnail img-circle">
			<?php endif; ?>
			<h3><?= $data['name'] ?></h3>
		</div>
		<ul class="menu">
			
			
			<?php if($cpage != 'product-detail.php'): ?>
			<li>
				<a href="vendor-profile.php?id=<?=$_GET['id']?>">
					<i class="fa fa-user"></i> Vendor Profile
				</a>
			</li>
			<li>
				<a href="vendor-detail.php?id=<?=$_GET['id']?>">
					<i class="fa fa-user"></i> List Produk
				</a>
			</li>
			<?php else: ?>
			<li>
				<a href="vendor-profile.php?id=<?=$data['id']?>">
					<i class="fa fa-user"></i> Vendor Profile
				</a>
			</li>
			<li>
				<a href="vendor-detail.php?id=<?=$data['id']?>">
					<i class="fa fa-user"></i> List Produk
				</a>
			</li>
			<?php endif; ?>
			<li>
				<a href="#" data-toggle="modal" data-target="#report">
					<i class="fa fa-user"></i> Laporkan
				</a>
			</li>
		</ul>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="report" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Lapor Vendor Bermasalah</h4>
      </div>
      <?php  
      	$sql = "SELECT * FROM t_report WHERE member_id = ".$_SESSION['member_id']." AND vendor_id = ".$data['id'];
      	$check = $db->query($sql);
      	if($check->num_rows > 0):
      ?>
  			<div class="modal-body">
  				<p>Anda telah melaporkan vendor ini sebelumnya</p>
  			</div>
		  <div class="modal-footer">
		  	    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
  		<?php else: ?>
      <form action="report.php" method="post" enctype="multipart/form-data" id="form-report">
      	<div class="modal-body">
      		<div id="pesan-body">
	      		<div class="form-group">
	        		<label for="Vendor">Nama Vendor</label>
	        		<p><span><?= $data['name'] ?></span></p>
	        	</div>
	        	<div class="form-group">
	        		<label for="message">Pesan</label>
	        		<textarea name="message" id="message" class="form-control" placeholder=""></textarea>
	        	</div>
        	</div>
        	<div id="pesan-loading" class="text-center hide"><i class="fa fa-spinner fa-pulse fa-3x"></i></div>
      	</div>
      	<div class="modal-footer" id="action-success">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        	<input type="hidden" name="vendor_id" value="<?= $data['id']; ?>">
        	<button type="submit" class="btn btn-primary" id="btn-progress">Lapor</button>
      	</div>
      	</form>
      	<div id="pesan-success" class="hide">
	      	<div class="modal-body">
	      		Terima Kasih Telah Melaporkan Vendor Bermasalah
	      	</div>
      		<div class="modal-footer">
		  	    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
      	</div>
  	<?php endif; ?>
    </div>
  </div>
</div>