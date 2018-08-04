<div class="container-fluid">
	<div class="row">
		<?php $this->load->view('admin/account/header'); ?>
	</div>
	<hr>
	<?php $this->load->view('admin/message') ?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="head">
				<h3 class="pull-left">Danh sách tài khoản đăng nhập:</h3>
				<p class="pull-right">Số lượng tài khoản đăng nhập: <?php echo $total?></p>
			</div>
			<table class="table table-hover table-bordered text-center">
				<thead>
				<tr>
					<td>MANV</td>
					<td>Tên tài khoản</td>
					<td>Mật khẩu</td>
					<td>Cập nhật tài khoản</td>
				</tr></thead>
			<?php foreach ($list as $value) {?>	
			<tr>
				<td class="text-left"><?php echo $value->MANV ?></td>
				<td class="text-left"><?php echo $value->TAIKHOAN ?></td>
				<td class="text-left"><?php echo $value->MATKHAU ?></td>
				<td class="action">
					<a href="<?php echo admin_url('account/edit/'.$value->MANV) ?>" title="Sửa"><i class="fa fa-pencil"></i></a>
				</td>
			</tr> <?php  } ?>
			</table>
		</div>
	</div>
</div>