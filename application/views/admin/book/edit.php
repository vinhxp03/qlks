<div class="container-fluid">
	<div class="row">
		<?php $this->load->view('admin/book/header'); ?>
	</div>
	<hr>
	<div class="row employee">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<form action="" method="POST" role="form" enctype="multipart/form-data">
				<legend>Cập nhật đặt phòng</legend>
			  	<div class="tab-content">
				    <div id="home" class="tab-pane fade in active">
				      	<div class="row">
				      		<div class="form-group">
								<div class="col-xs2 col-sm-2 col-md-2 col-lg-2">
									<label for="">Mã khách hàng: <sup style="color: red">*</sup></label>
								</div>
								<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
									<input type="text" class="" name="cusid" disabled value="<?php echo $info->MAKH ?>">
									<div class="form_error"><?php echo form_error('cusid') ?></div>
								</div>
							</div>
							<br>
							<div class="form-group">
								<div class="col-xs2 col-sm-2 col-md-2 col-lg-2">
									<label for="">Mã phòng: <sup style="color: red">*</sup></label>
								</div>
								<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
									<input type="text" class="" name="roomid" disabled value="<?php echo $info->MAPHONG ?>">
									<div class="form_error"><?php echo form_error('roomid') ?></div>
								</div>
							</div>
							<br>
				      		<div class="form-group">
								<div class="col-xs2 col-sm-2 col-md-2 col-lg-2">
									<label for="">Ngày đến: <sup style="color: red">*</sup></label>
								</div>
								<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
									<input type="date" class="" name="fromdate" value="<?php echo $info->NGDEN ?>">
									<div class="form_error"><?php echo form_error('fromdate') ?></div>
								</div>
				      		</div>
				      		<br>
				      		<div class="form-group">
								<div class="col-xs2 col-sm-2 col-md-2 col-lg-2">
									<label for="">Ngày đi: <sup style="color: red">*</sup></label>
								</div>
								<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
									<input type="date" class="" name="todate" value="<?php echo $info->NGDI ?>">
									<div class="form_error"><?php echo form_error('todate') ?></div>
								</div>
				      		</div>
				      		<br>
							<div class="form-group">
								<div class="col-xs2 col-sm-2 col-md-2 col-lg-2">
									<label for="">Số người: <sup style="color: red">*</sup></label>
								</div>
								<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
									<select name="people" id="people">
										<?php for ($i=1; $i < 5; $i++) { ?>
											<option value="<?php echo $i ?>" <?php 
												if ($info->SONGUOI==$i) {
													echo "selected";
												}
											 ?>><?php echo $i ?></option>
										<?php } ?>
									</select>
									<div class="form_error"></div>
								</div>
							</div>
							<br>
						<button type="submit" class="btn btn-danger">Cập nhật</button>
				    </div>
				</div>
			</form>
		</div>
	</div>
</div>