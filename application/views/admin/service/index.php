<div class="container-fluid">
	<div class="row">
		<?php $this->load->view('admin/service/header'); ?>
	</div>
	<hr>
	<?php $this->load->view('admin/message') ?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="head">
				<h3 class="pull-left">Danh sách dịch vụ:</h3>
				<p class="pull-right">Số lượng dịch vụ: <?php echo $total?></p>
			</div>
			<table class="table table-hover table-bordered text-center">
				<thead>
				<tr>
					<td>Mã DV</td>
					<td>Tên dịch vụ</td>
					<td>DVT</td>
					<td>Đơn giá</td>
					<td>Hành động</td>
				</tr></thead>
			<?php foreach ($list as $value) {?>	
			<tr>
				<td class="text-left"><?php echo $value->MADV ?></td>
				<td class="text-left"><?php echo $value->TENDV ?></td>
				<td class="text-left"><?php echo $value->DVT ?></td>
				<td class="text-left"><?php echo $value->DONGIA ?> (VND)</td>
				<td class="action">
					<a href="<?php echo admin_url('service/edit/'.$value->MADV) ?>" title="Sửa"><i class="fa fa-pencil"></i></a>
					<a href="<?php echo admin_url('service/delete/'.$value->MADV) ?>" title="Xóa"><i class="fa fa-trash" onclick="return confirm('Bạn có chắc muốn xóa')"></i></a>
				</td>
			</tr> <?php  } ?>
			</table>
		</div>
	</div>
</div>