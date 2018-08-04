<div id="colorlib-reservation">
	<div class="container">
		<div class="row">
			<div class="col-md-12 search-wrap">
				<form action="" method="POST" role="form" enctype="multipart/form-data">
              	<div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Chọn ngày đến</label>
					<div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy"> 
			            <input class="form-control" id="datein" name="datein" placeholder="Ngày đến" readonly="" type="text" style="background-color:#fff" value="<?php echo date("d-m-Y") ?>"> 
			            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
			         </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Chọn ngày đi</label>
					<div id="datepicker2" class="input-group date" data-date-format="dd-mm-yyyy"> 
			            <input class="form-control" id="dateout" name="dateout" placeholder="Ngày đi" readonly="" type="text" style="background-color:#fff" value="<?php echo date("d-m-Y") ?>"> 
			            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
			         </div> 
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <div class="form-group">
						<label for="">Số gười</label>
						<select name="people" id="people">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="4">5</option>
						</select>
						<div class="form_error"></div>
					</div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <div class="form-field">
                      <label for="">Loại phòng</label>
						<select name="type" id="">
							<?php foreach ($room_type_list as $value) { ?>
							<option value="<?php echo $value->MALOAIPHONG ?>"><?php echo $value->TENLOAIPHONG ?></option>
							<?php } ?>
						</select>
						<div class="form_error"><?php echo form_error('type') ?></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <input type="submit" name="submit" id="submit" value="Check" class="btn btn-primary btn-block">
                </div>
              </div>
            </form>
			</div>
		</div>
	</div>
</div>