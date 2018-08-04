<div class="container-fluid">
	<div class="row">
		<?php $this->load->view('admin/room/header'); ?>
	</div>
	<hr>
	<?php $this->load->view('admin/message') ?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="head">
				<h3 class="pull-left">Danh sách phòng:</h3>
				<p class="pull-right">Số lượng phòng: <?php echo $total?></p>
			</div>
			<table class="table table-hover table-bordered text-center">
				<thead>
				<tr>
					<td>Mã phòng</td>
					<td>Loại phòng</td>
					<td>Ghi chú</td>
					<td>Hành động</td>
				</tr></thead>
			<?php foreach ($list as $value) {?>	
			<tr>
				<td class="text-left"><?php echo $value->MAPHONG ?></td>
				<td class="text-left"><?php echo $value->TENLOAIPHONG ?></td>
				<td class="text-left"><?php echo $value->GHICHU ?></td>
				<td class="action">
					<a href="<?php echo admin_url('room/edit/'.$value->MAPHONG) ?>" title="Sửa"><i class="fa fa-pencil"></i></a>
					<a href="<?php echo admin_url('room/delete/'.$value->MAPHONG) ?>" title="Xóa"><i class="fa fa-trash" onclick="return confirm('Bạn có chắc muốn xóa')"></i></a>
				</td>
			</tr> <?php  } ?>
			</table>
		</div>
	</div>
</div>