<?php require "../connection.php"; ?>
<?php require "header.php"; ?>
<div class="container bread">
	<ul class="breadcrumb"><li><a href="index.php">Home</a></li>
		<li class="active">Buat Akun Admin</li>
	</ul>
</div>
<div class="container">
<?php
			     			$per_page = 4;
			     			
							if (isset($_GET["page"]))
								$page  = $_GET["page"];
							else  
								$page=1;
							
							$start_from = ($page-1) * $per_page;
							$sql= "SELECT * FROM t_user where role='3' ORDER BY id LIMIT $start_from, $per_page";
							$result = $db->query($sql);
							$directory = dirname(__FILE__).'/uploads/';
							$no=1;
						?>
	<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h3>Data Admin</h3>
				<?php if(isset($_SESSION['__flash']['code']) && $_SESSION['__flash']['code'] != ""): ?>
			<div class="alert alert-<?= $_SESSION['__flash']['code'] ?>"><?= $_SESSION['__flash']['message'] ?></div>
			<?php unset($_SESSION['__flash']) ?>
		<?php endif; ?>
			</div>
		</div>
	<div class="row">
		
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

			<form class="form" method="POST" action="reg.php" data-parsley-validate>
					<input type="hidden" name="role" value="1">
					<div class="form-group">
						<label class="control-label  sr-only">Email</label>
						<input value=""class="form-control form-control-solid placeholder-no-fix" type="email" autocomplete="off" placeholder="Email" name="email" required="reqiuired"/>
					</div>
				
					<div class="form-group">
						<label class="control-label  sr-only">Password</label>
						<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password Baru" name="password" required/>
					</div>
					<div class="form-group">
						<label class="control-label  sr-only">Konfirmasi Password</label>
						<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Konfirmasi Password" name="konfirmasi_pw" required/>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-pink">Register</button>
					</div>
				</form>
		</div>
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
			
					<table class="table table-striped">
  						<tr>
  							<th>No</th>
  							<th>Email</th>
  							<th>Aksi</th>
  						</tr>
  					 		<?php if($result->num_rows >0) : $i = 0; ?>
							<?php while($data =$result->fetch_assoc()):?>			
							<tr>
  							<td><?=$no?></td>
  							<td><?=$data['email']?></td>
  							
  							<?php if($data['status'] != 9): ?>
  								<td> <a class="btn btn-pink btn-xs" href="banned.php?id=<?=$data['id']?>&amp;act=freeze">Bekukan</a></td>
  							<?php else: ?>
  								<td> <a class="btn btn-pink btn-xs" href="banned.php?id=<?=$data['id']?>&amp;act=unfreeze">Pulihkan</a></td>
  							<?php endif; ?>
  						</tr>
  						<?php endwhile; ?>
  							<?php endif; ?>
  					
					</table>
					<div class="text-center">
						<ul class="pagination">
							<?php 
								$sql = "SELECT * FROM t_user where role='3'";
								$result = $db->query($sql);
								$record = $result->num_rows;
								$total_page = ceil($record / $per_page);
							 ?>
							<?php if($total_page != 1 && $page != 1): ?>
						    <li>
						      <a href="create_admin.php?page=1" aria-label="Previous">
						        <span aria-hidden="true">&laquo;</span>
						      </a>
						    </li>
							<?php endif; ?>
						    <?php for($i=1; $i<=$total_page; $i++): ?>
								<li><a href="create_admin.php?page=<?= $i; ?>"><?=$i?></a></li>
								
							<?php endfor; ?>
							<?php if($total_page != 1 && $page != $total_page): ?>
						    <li>
						      <a href="create_admin.php?page=<?= $total_page ?>" aria-label="Next">
						        <span aria-hidden="true">&raquo;</span>
						      </a>
						    </li>
							<?php endif; ?>
						</ul>
					</div>
		</div>
	</div>
</div>
<?php require "footer.php"; ?>
