<?php 

	$cpage = basename($_SERVER['PHP_SELF']);
	if(isset($_GET) && count($_GET) > 0)
		$id = $_GET['id'];
	else
		$id = $_SESSION['member_id'];

	$sql = "SELECT * FROM t_member WHERE id=$id";
	$result = $db->query($sql);
	$data = $result->fetch_assoc();
	$directory = dirname(__FILE__).'/uploads/';
 ?>
<div class="col-md-3">
	<div class="user-panel">
		<div class="text-center">
			<?php if($data['photo'] != "" && file_exists($directory.'/avatar/'.$data['photo'])): ?>
				<img src="uploads/avatar/thumb/<?= $data['photo']; ?>"  class="img-thumbnail img-responsive img-circle">
			<?php else: ?>
				<img src="images/default.png" class="img-responsive img-thumbnail img-circle">
			<?php endif; ?>
			
			<h3><?= $data['fullname'] ?></h3>
		</div>
		<ul class="menu">
			<li>
				<a href="user-profile.php">
					<i class="fa fa-user"></i> My Profile
				</a>
			</li>
			<li>
				<a href="plan.php?step=1">
					<i class="fa fa-user"></i> Rencana Pernikahan
				</a>
			</li>
			<li>
				<a href="edit-profile.php">
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