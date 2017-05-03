<?php require "../connection.php"; ?>
<?php require "header.php"; ?>
<div class="container bread">
	<ul class="breadcrumb"><li><a href="index.php">Home</a></li>
		<li class="active">Kategori</li>
	</ul>
</div>
<div class="container">
	<?php
		$per_page = 8;
			
		if (isset($_GET["page"]))
			$page  = $_GET["page"];
		else  
			$page=1;
		
		$start_from = ($page-1) * $per_page;
		$sql= "SELECT * FROM t_kategori LIMIT $start_from, $per_page";
		$result = $db->query($sql);
		$directory = dirname(__FILE__).'/../uploads/';
	?>
	<h3>Kategori 
		<a href="#" data-toggle="modal" class="btn btn-sm btn-pink pull-right" data-target="#add-category">
			Tambah
		</a>
	</h3>
	<?php if(isset($_SESSION['__flash']['code']) && $_SESSION['__flash']['code'] != ""): ?>
			<div class="alert alert-<?= $_SESSION['__flash']['code'] ?>"><?= $_SESSION['__flash']['message'] ?></div>
			<?php unset($_SESSION['__flash']) ?>
		<?php endif; ?>
	<table class="table table-striped">
			<tr>
				<th>Kategori</th>
				<th>Image</th>
				<th>Action</th>
			</tr>
		 		<?php if($result->num_rows >0) : $i = 0; ?>
			<?php while($data =$result->fetch_assoc()):?>			
			<tr>
				<td><?=$data['nama_kategori']?></td>
				<td>
					<?php if($data['image'] != "" && file_exists($directory.'/category/'.$data['image'])): ?>
						
						<img src="../uploads/category/thumb/<?= $data['image']; ?>"  class="img-responsive" width="100">
						
					<?php else: ?>
						
						<img src="../images/icon-camera.png" class="img-responsive img-thumbnail" >
						
					<?php endif; ?>
				</td>
				<td>
				 	<a class="btn btn-warning btn-xs" href="category-update.php?id=<?=$data['id']?>">Update</a>
				 	<a class="btn btn-pink btn-xs btn-catdel" href="category-delete.php?id=<?=$data['id']?>">Delete</a>
				</td>
				
			</tr>
			<?php endwhile; ?>
				<?php endif; ?>
		
	</table>
	<div class="text-center">
		<ul class="pagination">
			<?php 
				$sql = "SELECT v.*, u.email FROM t_member v INNER JOIN t_user u ON u.id = v.user_id";
				$result = $db->query($sql);
				$record = $result->num_rows;
				$total_page = ceil($record / $per_page);
			 ?>
			<?php if($total_page != 1 && $page != 1): ?>
		    <li>
		      <a href="vendor.php?page=1" aria-label="Previous">
		        <span aria-hidden="true">&laquo;</span>
		      </a>
		    </li>
			<?php endif; ?>
		    <?php for($i=1; $i<=$total_page; $i++): ?>
				<li><a href="vendor.php?page=<?= $i; ?>"><?=$i?></a></li>
				
			<?php endfor; ?>
			<?php if($total_page != 1 && $page != $total_page): ?>
		    <li>
		      <a href="vendor.php?page=<?= $total_page ?>" aria-label="Next">
		        <span aria-hidden="true">&raquo;</span>
		      </a>
		    </li>
			<?php endif; ?>
		</ul>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="add-category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Kategori</h4>
      </div>
      <form action="category-add.php" method="post" enctype="multipart/form-data">
      <div class="modal-body">
    	  		<div class="form-group">
	        		<label for="nama_kategori">Nama Kategori</label>
	        		<input type="text" name="nama_kategori" id="nama_kategori" class="form-control" placeholder="">
	        	</div>
	        	<div class="form-group">
	        		<label for="image">Image</label>
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
