<div class="container-fluid">
	<div class="row">
		<?php $this->load->view('admin/home/header'); ?>
	</div>
	<hr>
	<?php $this->load->view('admin/message') ?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<!-- <div class="middle" style="margin-left: 400px">
				<form action="<?php //echo admin_url('home') ?>" method="POST" role="form">
					<label for="">Tháng</label>
					<select name="month" id="month">
						<option value="0"></option>
						<option value="12">12</option>
						<option value="11">11</option>
						<option value="10">10</option>
						<option value="9">9</option>
						<option value="8">8</option>
						<option value="7">7</option>
						<option value="6">6</option>
						<option value="5">5</option>
						<option value="4">4</option>
						<option value="3">3</option>
						<option value="2">2</option>
						<option value="1">1</option>
					</select>
					<label for="">Năm</label>
					<select name=year id="year">
						<option value="0"></option>
						<option value="2018">2018</option>
						<option value="2017">2017</option>
					</select>
					<input type="submit" class="btn btn-default" name="filter" value="Lọc">
					<input type="reset" class="btn btn-default" name="reset" value="Reset" onclick="window.location.href='<?php //admin_url('home') ?>'">
				</form>
			</div> -->
			<div class="head">
				<h3 class="pull-left">Doanh thu theo loại phòng:</h3>
				<p class="pull-right"><a class="pull-right btn btn-default" target="_blank" href="<?php echo admin_url('home/print_report') ?>"><i class="fa fa-print"></i> In report</a></p>
			</div>
			<table class="table table-hover table-bordered text-center">
				<thead>
				<tr>
					<td>Mã số</td>
					<td>Loại phòng</td>
					<td>Tháng</td>
					<td>Năm</td>
					<td>Tổng doanh thu</td>
				</tr></thead>
			<?php $i=1; foreach ($list as $value) {?>	
			<tr>
				<td class="text-left"><?php echo $i ?></td>
				<td class="text-left"><?php echo $value->TENLOAIPHONG ?></td>
				<td class="text-left"><?php echo $value->THANG ?></td>
				<td class="text-left"><?php echo $value->NAM ?></td>
				<td class="text-left"><?php echo $value->TONG ?> (VND)</td>
			</tr> <?php $i++; } ?>
			</table>
		</div>
	</div>
</div>