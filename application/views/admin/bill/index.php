<div class="container-fluid">
	<div class="row">
		<?php $this->load->view('admin/bill/header'); ?>
	</div>
	<hr>
	<?php $this->load->view('admin/message') ?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="head">
				<h3 class="pull-left">Danh sách hóa đơn:</h3>
				<p class="pull-right">Số lượng hóa đơn: <?php echo $total?></p>
			</div>
			<table class="table table-hover table-bordered text-center">
				<thead>
				<tr>
					<td>Mã HD</td>
					<td>Ngày hóa đơn</td>
					<td>Mã phòng</td>
					<td>Số ngày</td>
					<td>Khách hàng</td>
					<td>Nhân viên</td>
					<td>Trị giá</td>
					<td>Hành động</td>
				</tr></thead>
			<?php foreach ($list as $value) {?>	
			<tr>
				<td class="text-left"><?php echo $value->MAHD ?></td>
				<td class="text-left"><?php echo show_date($value->NGHD) ?></td>
				<td class="text-left"><?php echo $value->MAPHONG ?></td>
				<td class="text-left"><?php echo $value->SONGAYTHUE ?></td>
				<td class="text-left"><?php echo $value->MAKH ?></td>
				<td class="text-left"><?php echo $value->MANV ?></td>
				<td class="text-left"><?php echo $value->TRIGIA ?> (VND)</td>
				<td class="action">
					<a href="<?php echo admin_url('bill/delete/'.$value->MAHD) ?>" title="Xóa"><i class="fa fa-trash" onclick="return confirm('Bạn có chắc muốn xóa')"></i></a>
					<a target="_blank" href="<?php echo admin_url('bill/print_report/'.$value->MAHD) ?>" title="In hóa đơn"><i class="fa fa-print"></i></a>
				</td>
			</tr> <?php  } ?>
			</table>
			<div class="fot">
				<div class="pull-right"><?php echo $this->pagination->create_links() ?></div><br>
				<div><hr></div>
			</div>
		</div>
	</div>
</div>