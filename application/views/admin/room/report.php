<div class="container-fluid">
	<div class="row">
		<?php $this->load->view('admin/room/header'); ?>
	</div>
	<hr>
	<?php $this->load->view('admin/message') ?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="head">
				<h3 class="pull-left">Danh mục phòng</h3>
				<a class="pull-right btn btn-default" target="_blank" href="<?php echo admin_url('room/print_report') ?>"><i class="fa fa-print"></i> In PDF</a>
			</div>
			<table id="danhmucphong" class="table table-hover table-bordered text-center">
				<thead>
				<tr>
					<td>STT</td>
					<td>Phòng</td>
					<td>Loại phòng</td>
					<td>Đơn giá</td>
					<td>Ghi chú</td>
				</tr></thead>
				<?php $i=1; foreach ($list as $value) { ?>
				<tr>
					<td class="text-left"><?php echo $i ?></td>
					<td class="text-left"><?php echo $value->MAPHONG ?></td>
					<td class="text-left"><?php echo $value->TENLOAIPHONG ?></td>
					<td class="text-left"><?php echo $value->DONGIA ?></td>
					<td class="text-left"><?php echo $value->GHICHU ?></td>
					<?php $i=$i+1 ?>
				</tr>
				<?php } ?>
			</table>
		</div>
	</div>
</div>