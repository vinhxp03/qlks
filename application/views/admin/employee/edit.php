<div class="container-fluid">
	<div class="row">
		<?php $this->load->view('admin/employee/header'); ?>
	</div>
	<hr>
	<div class="row employee">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<form action="" method="POST" role="form" enctype="multipart/form-data">
				<legend>Cập nhật nhân viên</legend>
			  	<div class="tab-content">
				    <div id="home" class="tab-pane fade in active">
				      	<div class="row">
				      		<div class="form-group">
								<div class="col-xs2 col-sm-2 col-md-2 col-lg-2">
									<label for="">Tên nhân viên: <sup style="color: red">*</sup></label>
								</div>
								<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
									<input type="text" class="" name="name" value="<?php echo $info->TENNV ?>">
									<div class="form_error"><?php echo form_error('name') ?></div>
								</div>
							</div>
							<br>
							<div class="form-group sex">
								<div class="col-xs2 col-sm-2 col-md-2 col-lg-2">
									<label for="">Giới tính: <sup style="color: red">*</sup></label>
								</div>
								<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
									<select name="sex" id="sex">
										<option value="Nam" <?php if ($info->GIOITINH=='Nam') {
											echo "selected";
										} ?>>Nam</option>
										<option value="Nữ" <?php if ($info->GIOITINH=='Nữ') {
											echo "selected";
										} ?>>Nữ</option>
									</select>
									<div class="form_error"></div>
								</div>
				      		</div>
				      		<br>
				      		<div class="form-group">
								<div class="col-xs2 col-sm-2 col-md-2 col-lg-2">
									<label for="">Ngày sinh: <sup style="color: red">*</sup></label>
								</div>
								<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
									<input type="date" class="" name="born" value="<?php echo $info->NGSINH ?>">
									<div class="form_error"><?php echo form_error('born') ?></div>
								</div>
				      		</div>
				      		<br>
				      		<div class="form-group">
								<div class="col-xs2 col-sm-2 col-md-2 col-lg-2">
									<label for="">Số điện thoại: <sup style="color: red">*</sup></label>
								</div>
								<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
									<input type="text" class="" name="phone" value="<?php echo $info->SDT ?>">
									<div class="form_error"><?php echo form_error('phone') ?></div>
								</div>
							</div>
							<br>
							<div class="form-group">
								<div class="col-xs2 col-sm-2 col-md-2 col-lg-2">
									<label for="">Địa chỉ: <sup style="color: red">*</sup></label>
								</div>
								<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
									<input type="text" class="" name="address" value="<?php echo $info->DIACHI ?>">
									<div class="form_error"><?php echo form_error('address') ?></div>
								</div>
							</div>
							<br>
							<div class="form-group">
								<div class="col-xs2 col-sm-2 col-md-2 col-lg-2">
									<label for="">Ngày vào làm: <sup style="color: red">*</sup></label>
								</div>
								<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
									<input type="date" class="" name="dodate" value="<?php echo $info->NGVAOLAM ?>">
									<div class="form_error"><?php echo form_error('dodate') ?></div>
								</div>
				      		</div>
				      		<br>
							<div class="form-group status">
								<div class="col-xs2 col-sm-2 col-md-2 col-lg-2">
									<label for="">Trạng thái: <sup style="color: red">*</sup></label>
								</div>
								<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
									<select name="status" id="status">
										<option value="0" <?php if ($info->TRANGTHAI==0) {
											echo "selected";
										} ?>>Đang làm</option>
										<option value="1" <?php if ($info->TRANGTHAI==1) {
											echo "selected";
										} ?>>Làm không lương</option>
										<option value="2" <?php if ($info->TRANGTHAI==2) {
											echo "selected";
										} ?>>Đã nghỉ việc</option>
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