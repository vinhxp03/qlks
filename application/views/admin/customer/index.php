<div class="container-fluid">
	<div class="row">
		<?php $this->load->view('admin/customer/header'); ?>
	</div>
	<hr>
	<?php $this->load->view('admin/message') ?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="middle">
				<form action="<?php echo admin_url('customer') ?>" method="POST" role="form">
					<label for="">Tên</label>
					<input type="text" class="" id="" name="name" value="<?php echo $this->input->post('name') ?>">
					<input type="submit" class="btn btn-default" name="filter" value="Lọc">
					<input type="reset" class="btn btn-default" name="reset" value="Reset" onclick="window.location.href='<?php admin_url('customer') ?>'">
				</form>
			</div>
			<div class="head">
				<h3 class="pull-left">Danh sách khách hàng:</h3>
				<p class="pull-right">Số lượng khách hàng: <?php echo $total?></p>
			</div>
			<table class="table table-hover table-bordered text-center">
				<thead>
				<tr>
					<td>Mã số</td>
					<td>Tên khách hàng</td>
					<td>Giới tính</td>
					<td>Ngày sinh</td>
					<td>CMND</td>
					<td>SĐT</td>
					<td>Địa chỉ</td>
					<td>Loại</td>
					<td>Hành động</td>
				</tr></thead>
			<?php foreach ($list as $value) {?>	
			<tr>
				<td class="text-left"><?php echo $value->MAKH ?></td>
				<td class="text-left"><?php echo $value->TENKH ?></td>
				<td class="text-left"><?php echo $value->GIOITINH ?></td>
				<td class="text-left"><?php echo show_date($value->NGSINH) ?></td>
				<td class="text-left"><?php echo $value->CMND ?></td>
				<td class="text-left"><?php echo $value->SDT ?></td>
				<td class="text-left"><?php echo $value->DIACHI ?></td>
				<td class="text-left"><?php echo $value->LOAI ?></td>
				<td class="action">
					<a href="<?php echo admin_url('customer/edit/'.$value->MAKH) ?>" title="Sửa"><i class="fa fa-pencil"></i></a>
					<a href="<?php echo admin_url('customer/delete/'.$value->MAKH) ?>" title="Xóa"><i class="fa fa-trash" onclick="return confirm('Bạn có chắc muốn xóa')"></i></a>
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