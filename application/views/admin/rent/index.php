<div class="container-fluid">
	<div class="row">
		<?php $this->load->view('admin/rent/header'); ?>
	</div>
	<hr>
	<?php $this->load->view('admin/message') ?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="head">
				<h3 class="pull-left">Danh sách thuê phòng:</h3>
				<p class="pull-right">Số lượng thuê phòng: <?php echo $total?></p>
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
					<td>Mã nhân viên</td>
					<td>Hành động</td>
				</tr></thead>
			<?php foreach ($list as $value) {?>	
			<tr>
				<td class="text-left"><?php echo $value->MATP ?></td>
				<td class="text-left"><?php echo $value->MAKH ?></td>
				<td class="text-left"><?php echo $value->MAPHONG ?></td>
				<td class="text-left"><?php echo show_date($value->NGDEN) ?></td>
				<td class="text-left"><?php echo show_date($value->NGDI) ?></td>
				<td class="text-left"><?php echo $value->SONGUOI ?></td>
				<td class="text-left"><?php echo $nvinfo->MANV?></td>
				<td class="action">
					<a href="<?php echo admin_url('rent/edit/'.$value->MATP) ?>" title="Sửa"><i class="fa fa-pencil"></i></a>
					<a target="_blank" href="<?php echo admin_url('rent/print_report/'.$value->MATP) ?>" title="Tạo phiếu thuê phòng"><i class="fa fa-print"></i></a>
					<a href="<?php echo admin_url('rent/pay/'.$value->MATP.'/'.$nvinfo->MANV) ?>" title="Tạo hóa đơn"><i class="fa fa-credit-card"></i></a>
				</td>
			</tr> <?php  } ?>
			</table>
		</div>
	</div>
</div>