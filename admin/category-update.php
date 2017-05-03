<?php require "../connection.php"; ?>
<?php require "header.php"; ?>
<?php
	$id = $_GET['id'];

	$sql= "SELECT * FROM t_kategori WHERE id=$id";
	$result = $db->query($sql);
	$data = $result->fetch_object();
	$directory = dirname(__FILE__).'/../uploads/';
?>
<div class="container bread">
	<ul class="breadcrumb">
		<li><a href="index.php">Home</a></li>
		<li><a href="category.php">Kategori</a></li>
		<li class="active">Update Kategori <?= $data->nama_kategori; ?></li>
	</ul>
</div>
<div class="container">
	<?php if(isset($_SESSION['__flash']['code']) && $_SESSION['__flash']['code'] != ""): ?>
		<div class="alert alert-<?= $_SESSION['__flash']['code'] ?>"><?= $_SESSION['__flash']['message'] ?></div>
		<?php unset($_SESSION['__flash']) ?>
	<?php endif; ?>
	<div class="row">
		<div class="col-md-8">
			<form action="category-update-proses.php" method="post" enctype="multipart/form-data">
			      <div class="modal-body">
			    	  		<div class="form-group">
				        		<label for="nama_kategori">Nama Kategori</label>
				        		<input type="text" name="nama_kategori" id="nama_kategori" class="form-control" placeholder="" value="<?= $data->nama_kategori ?>">
				        	</div>
				        	<div class="form-group">
				        		<label for="image">Image</label>
			        			<?php if($data->image != "" && file_exists($directory.'/category/'.$data->image)): ?>
									<p>
									<img src="../uploads/category/thumb/<?= $data->image; ?>"  class="img-responsive" width="100">
									</p>
								<?php else: ?>
									<p>
									<img src="../images/icon-camera.png" class="img-responsive img-thumbnail" >
									</p>
								<?php endif; ?>
				        		<input type="hidden" name="old_image" id="old_image" value="<?= $data->image ?>">
				        		<input type="hidden" name="id" id="id" value="<?= $data->id ?>">
				        		<input name="image" id="image" type="file" class="form-control">
				        	</div>
			      </div>
			      <div class="modal-footer">
			        
			        	<input type="hidden" name="images" id="images" value="">
			        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        	<button type="submit" class="btn btn-primary">Save</button>    
			      </div>
		  	</form>
	  	</div>
  	</div>
</div>


<?php require "footer.php"; ?>
