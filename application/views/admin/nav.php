<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="" style="color: white"><marquee> Xin chào: 
				<?php echo $nvinfo->TENNV ?>. Have a nice day!</marquee></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu">
                        <li>
                        	<a href="<?php echo admin_url('employee/logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                        </li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->

		<!-- sidebar-menu -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav side-nav">
				<li>
					<a href="<?php echo admin_url('home') ?>"><i class="fa fa-dashboard fa-fw"></i>Bảng điều khiển</a>
				</li>
				<li>
					<a href="#" data-toggle="collapse" data-target="#submenu1"><i class="fa fa-chrome"></i>Quản lý thuê phòng <i class="fa fa-angle-down pull-right"></i></a>
					<ul id="submenu1" class="collapse">
						<li><a href="<?php echo admin_url('customer') ?>"><i class="fa fa-angle-double-right"></i>Khách hàng</a></li>
						<li><a href="<?php echo admin_url('book') ?>"><i class="fa fa-angle-double-right"></i>Đặt phòng</a></li>
						<li><a href="<?php echo admin_url('rent') ?>"><i class="fa fa-angle-double-right"></i>Thuê phòng</a></li>
					</ul>
				</li>
				<li>
					<a href="#" data-toggle="collapse" data-target="#submenu6"><i class="fa fa-credit-card"></i>Quản lý hóa đơn<i class="fa fa-angle-down pull-right"></i></a>
					<ul id="submenu6" class="collapse">
						<li><a href="<?php echo admin_url('bill') ?>"><i class="fa fa-angle-double-right"></i>Hóa đơn</a></li>
						<li><a href="<?php echo admin_url('cthd') ?>"><i class="fa fa-angle-double-right"></i>Chi tiết hóa đơn</a></li>
					</ul>
				</li>
				<li>
					<a href="#" data-toggle="collapse" data-target="#submenu2"><i class="fa fa-user-circle"></i>Quản lý nhân viên <i class="fa fa-angle-down pull-right"></i></a>
					<ul id="submenu2" class="collapse">
						<li><a href="<?php echo admin_url('employee') ?>"><i class="fa fa-angle-double-right"></i>Nhân viên</a></li>
						<li><a href="<?php echo admin_url('account') ?>"><i class="fa fa-angle-double-right"></i>Tài khoản</a></li>
					</ul>
				</li>
				<li>
					<a href="#" data-toggle="collapse" data-target="#submenu3"><i class="fa fa-product-hunt"></i>Quản lý phòng<i class="fa fa-angle-down pull-right"></i></a>
					<ul id="submenu3" class="collapse">
						<li><a href="<?php echo admin_url('room') ?>"><i class="fa fa-angle-double-right"></i>Phòng</a></li>
						<li><a href="<?php echo admin_url('room_type') ?>"><i class="fa fa-angle-double-right"></i>Loại phòng</a></li>
						<li><a href="<?php echo admin_url('room_status') ?>"><i class="fa fa-angle-double-right"></i>Tình trạng phòng</a></li>
					</ul>
				</li>
				<li>
					<a href="#" data-toggle="collapse" data-target="#submenu4"><i class="fa fa-server"></i>Quản lý dịch vụ <i class="fa fa-angle-down pull-right"></i></a>
					<ul id="submenu4" class="collapse">
						<li><a href="<?php echo admin_url('service') ?>"><i class="fa fa-angle-double-right"></i>Dịch vụ</a></li>
						<li><a href="<?php echo admin_url('usedv') ?>"><i class="fa fa-angle-double-right"></i>Sử dụng dịch vụ</a></li>
					</ul>
				</li>
				<!-- <li>
					<a href="#" data-toggle="collapse" data-target="#submenu5"><i class="fa fa-square"></i>Quản lý nội dung <i class="fa fa-angle-down pull-right"></i></a>
					<ul id="submenu5" class="collapse">
						<li><a href=""><i class="fa fa-angle-double-right"></i>Slide</a></li>
						<li><a href=""><i class="fa fa-angle-double-right"></i>Tin tức</a></li>
					</ul>
				</li> -->
			</ul>
		</div><!-- end sidebar -->
	</div>
</nav>