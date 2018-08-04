<?php  ?>
<div class="container-fluid">
	<div class="row">
		<?php $this->load->view('site/message') ?>
		<p>(<i style="color: red">Lưu ý:</i> thông tin đánh dấu <sup style="color: red">*</sup> là thông tin bắt buộc)</p>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<form action="" method="POST" role="form" enctype="multipart/form-data">
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<b><legend>Thông tin đặt phòng</legend></b>
				    <div id="book" class="tab-pane fade in active">
				      	<div class="row">
				      		<div class="form-group">
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
									<label for="">Phòng trống: <sup style="color: red">*</sup></label>
								</div>
								<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
									<select name="room_null">
									<?php foreach ($room_null as $room) {?>
										<option value="<?php echo $room->MAPHONG ?>"><?php echo $room->MAPHONG ?></option>
									<?php } ?>
									</select>
									<div class="form_error"></div>
								</div>
							</div>
							<br>
				      		<div class="form-group">
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
									<label for="">Kiểu phòng: <sup style="color: red">*</sup></label>
								</div>
								<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
									<?php foreach ($price as $typename) { ?>
									<input type="text" class="" name="type" value="<?php echo $typename->tenloaiphong ?>" disabled>
									<?php } ?>
									<div class="form_error"></div>
								</div>
							</div>
							<br>
							<div class="form-group">
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
									<label for="">Chọn ngày đến:<sup style="color: red">*</sup></label>
								</div>
								<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
									<div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy"> 
							            <input class="form-control" id="datein" name="datein" placeholder="Ngày đến" readonly="" type="text" style="background-color:#fff" value="<?php echo $datein ?>"> 
							            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
							         </div>
									<div class="form_error"></div>
								</div>
							</div>
							<br>
							<div class="form-group">
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
									<label for="">Chọn ngày đi:<sup style="color: red">*</sup></label>
								</div>
								<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
									<div id="datepicker2" class="input-group date" data-date-format="dd-mm-yyyy"> 
							            <input class="form-control" id="dateout" name="dateout" placeholder="Ngày đi" readonly="" type="text" style="background-color:#fff" value="<?php echo $dateout ?>"> 
							            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
							         </div>
									<div class="form_error"></div>
								</div>
							</div>
							<br>
							<div class="form-group">
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
									<label for="">Số người: <sup style="color: red">*</sup></label>
								</div>
								<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
									<select name="people">
										<?php for ($i=1; $i < 5; $i++) {?>
										<option value="<?php echo $i ?>" 
											<?php if ($people==$i) { echo "selected";} ?>
											><?php echo $i ?></option>
										<?php } ?>
									</select>
									<div class="form_error"></div>
								</div>
							</div>
							<br>
							<div class="form-group">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<label for="" style="margin-right: 10px">Đơn giá phòng:</label>
									<?php  foreach ($price as $price) {
										echo $price->dongia;
									} ?> (đ/ngày)
								</div>
								</div>
							</div>
							<br>
					    </div>
					</div>
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<b><legend>Thông tin liên hệ</legend></b>
				    <div id="book" class="tab-pane fade in active">
				      	<div class="row">
				      		<div class="form-group">
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
									<label for="">Tên khách hàng: <sup style="color: red">*</sup></label>
								</div>
								<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
									<input type="text" class="" name="name" value="<?php echo set_value('name') ?>">
									<div class="form_error"><?php echo form_error('name') ?></div>
								</div>
							</div>
							<br>
							<div class="form-group">
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
									<label for="">Giới tính: <sup style="color: red">*</sup></label>
								</div>
								<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
									<select name="sex">
										<option value="Nam">Nam</option>
										<option value="Nữ">Nữ</option>
									</select>
									<div class="form_error"></div>
								</div>
							</div>
							<br>
							<div class="form-group">
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
									<label for="">Ngày sinh: <sup style="color: red">*</sup></label>
								</div>
								<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
									<input type="date" class="" name="born" value="<?php echo set_value('born') ?>">
									<div class="form_error"><?php echo form_error('born') ?></div>
								</div>
							</div>
							<br>
							<div class="form-group">
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
									<label for="">CMND: <sup style="color: red">*</sup></label>
								</div>
								<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
									<input type="text" class="" name="cmnd" value="<?php echo set_value('cmnd') ?>">
									<div class="form_error"><?php echo form_error('cmnd') ?></div>
								</div>
							</div>
							<br>
							<div class="form-group">
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
									<label for="">Điện thoại: <sup style="color: red">*</sup></label>
								</div>
								<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
									<input type="text" class="" name="phone" value="<?php echo set_value('phone') ?>">
									<div class="form_error"><?php echo form_error('phone') ?></div>
								</div>
							</div>
							<br>
							<div class="form-group">
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
									<label for="">Địa chỉ: <sup style="color: red">*</sup></label>
								</div>
								<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
									<input type="text" class="" name="address" value="<?php echo set_value('address') ?>">
									<div class="form_error"><?php echo form_error('address') ?></div>
								</div>
							</div>
							<div class="form-group" style="margin-top: 45px">
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
									<label for="">Loại khách: <sup style="color: red">*</sup></label>
								</div>
								<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
									<select name="loai">
										<option value="Nội địa">Nội địa</option>
										<option value="Nước ngoài">Nước ngoài</option>
									</select>
									<div class="form_error"></div>
								</div>
							</div>
							<br>
					    </div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
					<button type="submit" class="btn btn-danger">Đặt phòng</button>
				</div>
			</form>
		</div>
	</div>
</div>