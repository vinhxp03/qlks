<div class="container-fluid">
	<div class="row">
		<?php $this->load->view('admin/employee/header'); ?>
	</div>
	<hr>
	<?php $this->load->view('admin/message') ?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="head">
				<h3 class="pull-left">Danh sách nhân viên:</h3>
				<p class="pull-right">Số lượng nhân viên: <?php echo $total?></p>
			</div>
			<table class="table table-hover table-bordered text-center">
				<thead>
				<tr>
					<td>Mã số</td>
					<td>Tên nhân viên</td>
					<td>Giới tính</td>
					<td>Ngày sinh</td>
					<td>SĐT</td>
					<td>Địa chỉ</td>
					<td>Ngày vào làm</td>
					<td>Trạng thái</td>
					<td>Hành động</td>
				</tr></thead>
			<?php foreach ($list as $value) {?>	
			<tr <?php if ($value->TENNV=='Admin') { ?>
				 style="color: red" 
			<?php } ?> >
				<td class="text-left"><?php echo $value->MANV ?></td>
				<td class="text-left"><?php echo $value->TENNV ?></td>
				<td class="text-left"><?php echo $value->GIOITINH ?></td>
				<td class="text-left"><?php echo show_date($value->NGSINH) ?></td>
				<td class="text-left"><?php echo $value->SDT ?></td>
				<td class="text-left"><?php echo $value->DIACHI ?></td>
				<td class="text-left"><?php echo show_date($value->NGVAOLAM) ?></td>
				<td class="text-left"><?php if ($value->TRANGTHAI==0) {
					echo "Đang làm";
				}elseif ($value->TRANGTHAI==1) {
					echo "Làm không lương";
				}elseif ($value->TRANGTHAI==2) {
					echo "Đã nghỉ việc";
				}?></td>
				<td class="action">
					<a href="<?php echo admin_url('employee/edit/'.$value->MANV) ?>" title="Sửa"><i class="fa fa-pencil"></i></a>
					<a href="<?php echo admin_url('employee/delete/'.$value->MANV) ?>" title="Xóa"><i class="fa fa-trash" onclick="return confirm('Bạn có chắc muốn xóa')"></i></a>
				</td>
			</tr> <?php  } ?>
			</table>
		</div>
	</div>
</div>