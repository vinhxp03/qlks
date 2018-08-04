<div class="container-fluid">
	<div class="row">
		<?php $this->load->view('admin/room/header'); ?>
	</div>
	<hr>
	<div class="row employee">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<form action="" method="POST" role="form" enctype="multipart/form-data">
				<legend>Cập nhật phòng</legend>
			  	<div class="tab-content">
				    <div id="home" class="tab-pane fade in active">
				      	<div class="row">
				      		<div class="form-group">
								<div class="col-xs2 col-sm-2 col-md-2 col-lg-2">
									<label for="">Mã Phòng: <sup style="color: red">*</sup></label>
								</div>
								<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
									<input type="text" class="" name="id" disabled value="<?php echo $info->MAPHONG ?>">
									<div class="form_error"></div>
								</div>
							</div>
							<br>
				      		<div class="form-group">
								<div class="col-xs2 col-sm-2 col-md-2 col-lg-2">
									<label for="">Loại phòng: <sup style="color: red">*</sup></label>
								</div>
								<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
									<select name="type" id="">
										<?php foreach ($type as $ktype) { ?>
										<option value="<?php echo $ktype->MALOAIPHONG ?>" 
											<?php if ($info->MALOAIPHONG==$ktype->MALOAIPHONG) {
												echo "selected";
											} ?>>
											<?php echo $ktype->TENLOAIPHONG ?>
										</option>
										<?php } ?>
									</select>
									<div class="form_error"></div>
								</div>
				      		</div>
							<br>
							<div class="form-group">
								<div class="col-xs2 col-sm-2 col-md-2 col-lg-2">
									<label for="">Ghi chú: </label>
								</div>
								<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
									<input type="text" class="" name="notes" value="<?php echo $info->GHICHU ?>">
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