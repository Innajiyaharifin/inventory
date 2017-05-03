<?php require "header.php"; ?>
<?php require "connection.php"; ?>
<?php 

?>
	<div>
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li><a href="user-profile.php">Profile</a></li>
			<li class="active">Edit</li>
		</ul>
	</div>

	<div class="container">
		<div class="row">
			<h3 style="text-align:center;">Tambah Produk</h3>

			<div class="col-md-9 col-lg-9 col-xs-20 col-center">
				<div class="panel panel-default">
					<div class="panel-heading">
					</div>
					<div class="panel-body">
						<form enctype ="multipart/form-data" action="proses-addproduct.php" method="POST">
							<table >
								<tr>
									<td align="left" style="padding:2px;" >
										<label >Image </label></td>
										<td><input type="file" name="image">
										</td>
										<td align="">
											<input type="button" class="btn btn-info" style="width:100px; height:50px; font-size:18px;" value="Barcode"></button>

											<div style="display:none" id="result"></div>
											<div class="selector" id="webcamimg" onclick="setwebcam()" align="left" ></div>
											<div class="selector" id="qrimg" onclick="setimg()" align="right" ></div>
											<center id="mainbody"><div id="outdiv"></div></center>
											<canvas id="qr-canvas" width="800" height="600"></canvas>
											<input type="text" name="qrcode" value="" id="artikel_qrcode">
										</td>

									</tr>							
									<tr>
										<td align="left">
											<label>Jenis Produk</label>
										</td>
										<td>		<select name="status" class="form-control" style="width:200px;">
											<option value="1" name="1">Consinasi</option>	
											<option value="2" name="2">Jual Putus</option>	
										</select>
									</td>
									<td>	
									</td>
								</tr>							
								<tr>
									<td align="left">
										<label>SKU</label>
									</td>
									<td>	<input type="text" name="sku" class="form-control">
									</td>
								</tr>							
								<tr>
									<td align="left">
										<label>Kategori</label>
									</td>
									<td>		<?php 
										$sql = "SELECT * FROM t_kategori";
										$result = $db->query($sql);
										?>
										<select name="kategori" id="kategori" class="form-control">
											<?php if($result->num_rows >0) :?>
												<?php while($row =$result->fetch_assoc()):?>
													<option value="<?=$row['id']?>"><?=$row['nama_kategori']?></option>
												<?php endwhile ;?>
											<?php endif ;?>
										</select> 
									</td>
								</tr>							
								<tr>
									<td align="left">
										<label>Nama Produk</label>
									</td>
									<td>
										<input type="text" name="nama" class="form-control">

									</td>
								</tr>							
								<tr>
									<td align="left">
										<label>Nomor Rak</label>
									</td>
									<td>
										<input type="text" name="no_rak" class="form-control">

									</td>
								</tr>							
								<tr>
									<td align="left">
										<label>Deskripsi</label>
									</td>
									<td>		<textarea name="content" id="content" cols="10" rows="5" class="form-control"></textarea>
									</td>
								</tr>							
								<tr>
									<td align="left">
										<label>Status</label>
									</td>
									<td>			<select name="stts" class="form-control" style="width:200px;">
										<option value="Aktif" name="aktif">Aktif</option>	
										<option value="Discontinued" name="discontinued">Discontinued</option>	
										<option value="Inactive" name="inactive">Inactive</option>	
									</select>
								</td>
							</tr>							

						</table>
						<div class="col-md-12"></div>
						<div class="form-group">
							<input type="submit" class="btn btn-info btn-xs" style="width:100px; height:50px; font-size:18px;" value="Save">
						</div>


<!--						<div class="row">
							<div class="col-md-8 panel-body">
								<div class="">
									<label>Image</label>
									<input type="file" name="image">
								</div>
								
								<div class="form-group">
								
									<label>Jenis Produk</label>
								</div>
								<div class="form-group">
									<label>SKU</label>
								</div>
									<div class="form-group">
										</div>

								<div class="form-group">
									<label>Nama Product</label>
									</div>
									<div class="form-group">
									<label>Nomor Rak</label>
								</div>

								<div class="form-group">
									<label>Stok di Gudang 1</label>
									<input type="text" name="stok_gudang1" class="form-control">
								</div>

								<div class="form-group">
									<label>Stok di Gudang 2</label>
									<input type="text" name="harga" class="form-control">
								</div>

								
								<div class="form-group">
									<label>Deskripsi</label>
								</div>
								<div class="form-group">
									<label>Status</label>
								</div>
	

							</div>
							<div class="col-md-4">
								<div class="panel panel-info">
									<div class="panel-heading">Stok Gudang</div>
									<div class="panel-body">
										
											<div class="form-group">
											<?php 
												$sql = "SELECT * FROM t_daftar_gudang";
												$result = $db->query($sql);
											 ?>
											<label>Lihat Daftar Gudang</label>
											<select name="gudang" id="gudang" class="form-control" style="width:200px;">
												<?php if($result->num_rows >0) :?>
												<?php while($row =$result->fetch_assoc()):?>
												<option value="<?=$row['id']?>"><?=$row['nama_gudang']?></option>
												<?php endwhile ;?>
											<?php endif ;?>
												</select> 

										</div>
									<div class="form-group">
									<label>Kode Gudang</label>
									<input type="text" name="kd_gudang" class="form-control" style="width:200px;"><div class="form-group">
									<label>Stok</label>
									<input type="text" name="stok_gudang" class="form-control" style="width:200px;">

											
								</div>
							-->
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
</div>


</div>
</div>

<?php
require "footer.php";
?>