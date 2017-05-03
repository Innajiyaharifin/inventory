<div class="container">
			<div class="alert alert-info">
				<p>Fitur ini hanya untuk Gambaran dan Kalkulasi dalam Biaya Rencana Pernikahan, bukan untuk Memesan.. Silahkan Hubungi Vendor terkait yang ada pada Halaman Vendor Profil. </p>
			</div>
		<section class="step-content">

			<div class="row">
				
				<div class="col-md-6 text-center hidden-sm hidden-xs">
					<img src="images/calendar.png" id="img-calendar">
				</div>

				<div class="col-md-5 col-xs-10 content-step-info">
					<h3 class="sc-heading text-center mb50">Informasi Pernikahan</h3>

					<form class="form form-horizontal" action="proses_step1.php" method="post" id="form-step1" data-parsley-validate>
						<input type="hidden" name="step" value="2">
						<div class="form-group">
							<label class="col-xs-4 hidden-xs control-label" for="inputBudget">Budget Anda</label>
							<div class="col-xs-12 col-sm-6">
								<div class="input-group">
							      <div class="input-group-addon"><i class="fa fa-money"></i></div>
							      <input type="text" class="form-control" id="inputBudget" placeholder="Budget Anda" name="budget" required  data-inputmask="'mask': '99999999999'">
							    </div>
						    </div>
						</div>
						<div class="form-group">
							<label class="col-xs-4 hidden-xs control-label" for="inputBudget">Tanggal Pernikahan</label>
							<div class="col-xs-12 col-sm-6">
								<div class="input-group date">
									<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
								  	<input type="text" id="plan-date" class="form-control"  value="" placeholder="Tanggal Pernikahan" name="tgl" required  data-inputmask="'mask': '99-99-9999'"y>
								</div>
						    </div>
						</div>
						<div class="form-group">
							<label class="col-xs-4 hidden-xs control-label" for="inputBudget">Jumlah Undangan</label>
							<div class="col-xs-12 col-sm-6">
								<div class="input-group">
							      <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
							      <input type="text" class="form-control" id="invitation" placeholder="Jumlah Undangan" name="jml" required  data-inputmask="'mask': '999'">
							    </div>
						    </div>
						</div>
						<div class="form-group">
							<div class="col-xs-12 text-center">
								<input type="submit" value="Lanjutkan" class="btn btn-pink btn-block" id="btn-next-step">
							</div>
						</div>
					</form>
				</div>

			</div>
		</section>
	</div>