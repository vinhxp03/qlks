<div class="container-fluid">
	<div class="row">
		<?php $this->load->view('admin/usedv/header'); ?>
	</div>
	<hr>
	<div class="row employee">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<form action="" method="POST" role="form" enctype="multipart/form-data">
				<legend>Thêm mới sử dụng dịch vụ</legend>
			  	<div class="tab-content">
				    <div id="home" class="tab-pane fade in active">
				      	<div class="row">
				      		<div class="form-group">
								<div class="col-xs2 col-sm-2 col-md-2 col-lg-2">
									<label for="">Tên dịch vụ: <sup style="color: red">*</sup></label>
								</div>
								<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
									<select name="name">
										<?php foreach ($service as $key) { ?>
										<option value="<?php echo $key->MADV ?>"><?php echo $key->TENDV ?> (<?php echo $key->DVT ?>)
										</option>
										<?php } ?>
									</select>
									<div class="form_error"><?php echo form_error('name') ?></div>
								</div>
							</div>
							<br>
				      		<div class="form-group">
								<div class="col-xs2 col-sm-2 col-md-2 col-lg-2">
									<label for="">Mã phòng: <sup style="color: red">*</sup></label>
								</div>
								<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
									<select name="maphong">
										<?php foreach ($rent as $key) { ?>
										<option value="<?php echo $key->MAPHONG ?>"><?php echo $key->MAPHONG ?></option>
										<?php } ?>
									</select>
									<div class="form_error"><?php echo form_error('maphong') ?></div>
								</div>
							</div>
							<br>
							<div class="form-group">
								<div class="col-xs2 col-sm-2 col-md-2 col-lg-2">
									<label for="">Số lượng: <sup style="color: red">*</sup></label>
								</div>
								<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
									<input type="text" class="" name="soluong" value="">
									<div class="form_error"><?php echo form_error('soluong') ?></div>
								</div>
							</div>
							<br>
						<button type="submit" class="btn btn-danger">Thêm</button>
				    </div>
				</div>
			</form>
		</div>
	</div>
</div>