<div class="container-fluid">
	<div class="row">
		<?php $this->load->view('admin/room_status/header'); ?>
	</div>
	<hr>
	<?php $this->load->view('admin/message') ?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="head">
				<h3 class="pull-left">Danh sách tình trạng phòng:</h3>
				<p class="pull-right">Số lượng tình trạng phòng: <?php echo $total?></p>
			</div>
			<table class="table table-hover table-bordered text-center">
				<thead>
				<tr>
					<td>Mã số</td>
					<td>Mã phòng</td>
					<td>Tình trạng</td>
					<td>Từ ngày</td>
					<td>Đến ngày</td>
				</tr></thead>
			<?php foreach ($list as $value) {?>	
			<tr>
				<td class="text-left"><?php echo $value->MATINHTRANG ?></td>
				<td class="text-left"><?php echo $value->MAPHONG ?></td>
				<td class="text-left"><?php echo $value->TENTINHTRANG ?></td>
				<td class="text-left"><?php echo show_date($value->TUNGAY) ?></td>
				<td class="text-left"><?php echo show_date($value->DENNGAY) ?></td>
			</tr> <?php  } ?>
			</table>
		</div>
	</div>
</div>