<div class="container-fluid">
	<div class="row">
		<?php $this->load->view('admin/usedv/header'); ?>
	</div>
	<hr>
	<?php $this->load->view('admin/message') ?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="head">
				<h3 class="pull-left">Danh sách sử dụng dịch vụ:</h3>
				<p class="pull-right">Số lượng: <?php echo $total?></p>
			</div>
			<table class="table table-hover table-bordered text-center">
				<thead>
				<tr>
					<td>Mã SDDV</td>
					<td>Mã dịch vụ</td>
					<td>Mã thuê phòng</td>
					<td>Số lượng</td>
					<td>Thành tiền</td>
					<td>Hành động</td>
				</tr></thead>
			<?php foreach ($list as $value) {?>	
			<tr>
				<td class="text-left"><?php echo $value->MASD ?></td>
				<td class="text-left"><?php echo $value->MADV ?></td>
				<td class="text-left"><?php echo $value->MATP ?></td>
				<td class="text-left"><?php echo $value->SOLUONG ?></td>
				<td class="text-left"><?php echo $value->THANHTIEN ?></td>
				<td class="action">
					<a href="<?php echo admin_url('usedv/edit/'.$value->MASD) ?>" title="Sửa"><i class="fa fa-pencil"></i></a>
					<a href="<?php echo admin_url('usedv/delete/'.$value->MASD) ?>" title="Xóa"><i class="fa fa-trash" onclick="return confirm('Bạn có chắc muốn xóa')"></i></a>
				</td>
			</tr> <?php  } ?>
			</table>
		</div>
	</div>
</div>