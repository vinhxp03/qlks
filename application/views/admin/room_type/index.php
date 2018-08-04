<div class="container-fluid">
	<div class="row">
		<?php $this->load->view('admin/room_type/header'); ?>
	</div>
	<hr>
	<?php $this->load->view('admin/message') ?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="head">
				<h3 class="pull-left">Danh sách loại phòng:</h3>
				<p class="pull-right">Số lượng loại phòng: <?php echo $total?></p>
			</div>
			<table class="table table-hover table-bordered text-center">
				<thead>
				<tr>
					<td>Mã số</td>
					<td>Tên loại phòng</td>
					<td>Đơn giá</td>
					<td>Hành động</td>
				</tr></thead>
			<?php foreach ($list as $value) {?>	
			<tr>
				<td class="text-left"><?php echo $value->MALOAIPHONG ?></td>
				<td class="text-left"><?php echo $value->TENLOAIPHONG ?></td>
				<td class="price" style="display: -webkit-box">
					<div class="text-left"><?php echo $value->DONGIA ?></div>
					<div class="text-right" style="margin-left: 5px">(đ/ngày)</div>
				</td>
				<td class="action">
					<a href="<?php echo admin_url('room_type/edit/'.$value->MALOAIPHONG) ?>" title="Sửa"><i class="fa fa-pencil"></i></a>
					<a href="<?php echo admin_url('room_type/delete/'.$value->MALOAIPHONG) ?>" title="Xóa"><i class="fa fa-trash" onclick="return confirm('Bạn có chắc muốn xóa')"></i></a>
				</td>
			</tr> <?php  } ?>
			</table>
		</div>
	</div>
</div>