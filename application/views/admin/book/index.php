<div class="container-fluid">
	<div class="row">
		<?php $this->load->view('admin/book/header'); ?>
	</div>
	<hr>
	<?php $this->load->view('admin/message') ?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="head">
				<h3 class="pull-left">Danh sách đặt phòng:</h3>
				<p class="pull-right">Số lượng đặt phòng: <?php echo $total?></p>
			</div>
			<table class="table table-hover table-bordered text-center">
				<thead>
				<tr>
					<td>Mã số</td>
					<td>Mã khách hàng</td>
					<td>Mã phòng</td>
					<td>Ngày đến</td>
					<td>Ngày đi</td>
					<td>Số người</td>
					<td>Hành động</td>
				</tr></thead>
			<?php foreach ($list as $value) {?>	
			<tr>
				<td class="text-left"><?php echo $value->MADP ?></td>
				<td class="text-left"><?php echo $value->MAKH ?></td>
				<td class="text-left"><?php echo $value->MAPHONG ?></td>
				<td class="text-left"><?php echo show_date($value->NGDEN) ?></td>
				<td class="text-left"><?php echo show_date($value->NGDI) ?></td>
				<td class="text-left"><?php echo $value->SONGUOI ?></td>
				<td class="action">
					<a href="<?php echo admin_url('book/edit/'.$value->MADP) ?>" title="Sửa"><i class="fa fa-pencil"></i></a>
					<a href="<?php echo admin_url('book/delete/'.$value->MADP) ?>" title="Xóa"><i class="fa fa-trash" onclick="return confirm('Bạn có chắc muốn xóa')"></i></a>
					<a href="<?php echo admin_url('book/convert/'.$value->MADP.'/'.$nvinfo->MANV) ?>" title="Thuê phòng"><i class="fa fa-reply"></i></a>
				</td>
			</tr> <?php  } ?>
			</table>
		</div>
	</div>
</div>