<div class="container-fluid">
	<div class="row">
		<?php $this->load->view('admin/cthd/header'); ?>
	</div>
	<hr>
	<?php $this->load->view('admin/message') ?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="head">
				<h3 class="pull-left">Danh sách chi tiết hóa đơn:</h3>
				<p class="pull-right">Số lượng chi tiết hóa đơn: <?php echo $total?></p>
			</div>
			<table class="table table-hover table-bordered text-center">
				<thead>
				<tr>
					<td>Mã HD</td>
					<td>Mã dịch vụ</td>
					<td>Số lượng</td>
					<td>Hành động</td>
				</tr></thead>
			<?php foreach ($list as $value) {?>	
			<tr>
				<td class="text-left"><?php echo $value->MAHD ?></td>
				<td class="text-left"><?php echo $value->MADV ?></td>
				<td class="text-left"><?php echo $value->SOLUONG ?></td>
				<td class="action">
					<a href="<?php echo admin_url('cthd/delete/'.$value->MAHD) ?>" title="Xóa"><i class="fa fa-trash" onclick="return confirm('Bạn có chắc muốn xóa')"></i></a>
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