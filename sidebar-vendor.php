<?php 
	$cpage = basename($_SERVER['PHP_SELF']);
	if(($cpage != 'gallery.php') && isset($_GET) && count($_GET) > 0)
		$id = $_GET['id'];
	else
		$id = $_SESSION['vendor_id'];

	$sql = "SELECT * FROM t_vendor WHERE id=$id";
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
			<li>
				<a href="vendor-profile.php">
					<i class="fa fa-user"></i> My Profile
				</a>
			</li>
			<li>
				<a href="list-product.php">
					<i class="fa fa-user"></i> List Produk
				</a>
			</li>
			<li>
				<a href="edit-vendor.php">
					<i class="fa fa-pencil"></i> Edit Profile
				</a>
			</li>
			<li>
				<a href="#" data-toggle="modal" data-target="#changeavatar">
					<i class="fa fa-file-image-o"></i> Edit Photo
				</a>
			</li>
		</ul>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="changeavatar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ganti Photo</h4>
      </div>
      <div class="modal-body">
        <form action="upload-avatar.php" class="dropzone" id="chgavatar"></form>
      </div>
      <div class="modal-footer">
        
        <form action="save-avatar.php" method="post">
        	<input type="hidden" name="images" id="images" value="">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        	<button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>