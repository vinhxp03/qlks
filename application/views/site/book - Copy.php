<div class="row check">
	<div class="col-md-10 col-md-offset-1">
		<form action="" method="POST" role="form" enctype="multipart/form-data">
			<div class="row">
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<p style="color: red; font-size: 22px">Kiểm tra phòng trống:</p>
				</div>
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<div class="form-group">
						<label for="">Kiểu phòng</label>
						<select name="type" id="">
							<?php foreach ($room_type_list as $value) { ?>
							<option value="<?php echo $value->MALOAIPHONG ?>"><?php echo $value->TENLOAIPHONG ?></option>
							<?php } ?>
						</select>
						<div class="form_error"><?php echo form_error('type') ?></div>
					</div>
				</div>
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<label for="">Chọn ngày đến</label>
					<div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy"> 
			            <input class="form-control" id="datein" name="datein" placeholder="Ngày đến" readonly="" type="text" style="background-color:#fff" value="<?php echo date("d-m-Y") ?>"> 
			            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
			         </div>
				</div>
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<label for="">Chọn ngày đi</label>
					<div id="datepicker2" class="input-group date" data-date-format="dd-mm-yyyy"> 
			            <input class="form-control" id="dateout" name="dateout" placeholder="Ngày đi" readonly="" type="text" style="background-color:#fff" value="<?php echo date("d-m-Y") ?>"> 
			            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
			         </div> 
				</div>
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<div class="form-group">
						<label for="">Số gười</label>
						<select name="people" id="people">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
						<div class="form_error"></div>
					</div>
				</div>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
					<label for=""></label>
					<button type="submit" class="btn btn-default">Kiểm tra</button>
				</div>
			</div>
		</form>
	</div>
</div>