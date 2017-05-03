<?php require "connection.php"; ?>
<?php require "header.php" ?>
<div class="container bread">
	<ul class="breadcrumb"><li><a href="index.php">Home</a></li>
		<li><a href="list-product.php">Product</a></li>
		<li class="active">Gallery</li>
	</ul>
</div>


<div class="container">
	<div class="row">
		<?php require "sidebar-vendor.php"; ?>
		<?php 
			$id = $_GET['id'];
			$sql="SELECT t_produk.*, t_vendor.name FROM t_produk JOIN t_vendor ON t_vendor.id = t_produk.vendor_id WHERE t_produk.id=$id";
			$result = $db->query($sql);
			if($result->num_rows > 0)
				$data = $result->fetch_assoc();
			$directory = dirname(__FILE__).'/uploads/';
		 ?>
		<div class="col-md-8">
			<div class="product product-list">
				<div class="row">
					<div class="col-md-3">
						<a href="product-detail.php">
							<?php if($data['featured_image'] != "" && file_exists($directory.$data['featured_image'])): ?>
									<img src="uploads/thumb/<?= $data['featured_image']; ?>"  class="img-responsive">
								<?php else: ?>
									<img src="images/product.jpg" class="img-responsive" data-min-width-0="images/product-480.jpg" data-min-width-641="images/product-800.jpg" data-min-width-1025="images/product.jpg">
								<?php endif; ?>
						</a>
					</div>
					<div class="col-md-6">
						<h5 class="prod-title"><a href="product-detail.php?id=<?=$data['id']?>"><?=$data['nama_produk']?></a></h5>
						<div class="product-author">by <a href="#"><?= $data['name'] ?></a></div>
					</div>
				</div>
			</div>
			<!-- Button trigger modal -->
			<div class="text-right">
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
				  Add Gallery
				</button>
			</div>

		<?php 
			$id = $_GET['id'];
			$sql="SELECT * FROM t_produk_gallery  WHERE produk_id=$id";
			$result = $db->query($sql);
			if($result->num_rows > 0):?>
			<div class="row">
			<?php while($data = $result->fetch_assoc()): ?>
				<div class="col-md-3">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="img">
								<img src="uploads/gallery/thumb/<?= $data['img'] ?>" class="img-thumbnail img-responsive">
							</div>
							<div class="text-center">
								<a class="btn btn-xs btn-primary enlarge" rel="enlarge" href="uploads/gallery/<?= $data['img'] ?>"><i class="fa fa-search"></i> Enlarge</a>
								<a class="btn btn-xs btn-danger" href="delete-gallery.php?id=<?= $data['id'] ?>"><i class="fa fa-trash"></i> Delete</a>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
			</div>
		<?php else: ?>
			No Gallery
		<?php endif; ?>

		</div>		
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Gallery</h4>
      </div>
      <div class="modal-body">
        <form action="upload-gallery.php" class="dropzone" id="upload-gallery"></form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <form action="save-gallery.php" method="post" class="form-gallery">
        	<input type="hidden" name="product_id" value="<?= $_GET['id'] ?>">
        	<input type="hidden" name="images" id="dimages" value="">
        	<button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php require "footer.php"; ?>