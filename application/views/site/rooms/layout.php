<?php  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Phòng</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />
		
	<?php $this->load->view('site/head') ?>
</head>
<body data-spy="scroll" data-target=".navbar-fixed-top" data-offset="30">
	<!-- <a href="#" id="backtotop" style="display: none;"><i class="fa fa-arrow-up"></i></a> -->
	<!-- load navbar -->
	<div id="page">
	<?php $this->load->view('site/navbar') ?>
	<!-- load header -->
	<?php $this->load->view('site/rooms/header') ?>

	<div id="colorlib-rooms" class="colorlib-light-grey">
			<div class="container">
				<div class="row">
					<div class="col-md-4 room-wrap animate-box">
						<a href="<?php echo public_url() ?>images/room-1.jpg" class="room image-popup-link" style="background-image: url(<?php echo public_url() ?>images/room-1.jpg);"></a>
						<div class="desc text-center">
							<span class="rate-star"><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
							<h3><a href="">Phòng đơn</a></h3>
							<p class="price">
								<span class="currency">đ</span>
								<span class="price-room">30000</span>
								<span class="per">/ một ngày</span>
							</p>
							<ul>
								<li><i class="icon-check"></i> Chỉ có 3 phòng có sắn</li>
								<li><i class="icon-check"></i> Có phục vụ bữa sáng</li>
								<li><i class="icon-check"></i> Giá không bao gồm VAT &amp; dịch vụ</li>
							</ul>
						</div>
					</div>
					<div class="col-md-4 room-wrap animate-box">
						<a href="<?php echo public_url() ?>images/room-5.jpg" class="room image-popup-link" style="background-image: url(<?php echo public_url() ?>images/room-5.jpg);"></a>
						<div class="desc text-center">
							<span class="rate-star"><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full"></i></span>
							<h3><a href="">Phòng vip đơn</a></h3>
							<p class="price">
								<span class="currency">đ</span>
								<span class="price-room">600000</span>
								<span class="per">/ một ngày</span>
							</p>
							<ul>
								<li><i class="icon-check"></i> Chỉ có 3 phòng có sắn</li>
								<li><i class="icon-check"></i> Có phục vụ bữa sáng</li>
								<li><i class="icon-check"></i> Giá không bao gồm VAT &amp; dịch vụ</li>
							</ul>
						</div>
					</div>
					<div class="col-md-4 room-wrap animate-box">
						<a href="<?php echo public_url() ?>images/room-2.jpg" class="room image-popup-link" style="background-image: url(<?php echo public_url() ?>images/room-2.jpg);"></a>
						<div class="desc text-center">
							<span class="rate-star"><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full"></i></span>
							<h3><a href="">Phòng đôi</a></h3>
							<p class="price">
								<span class="currency">đ</span>
								<span class="price-room">500000</span>
								<span class="per">/ một ngày</span>
							</p>
							<ul>
								<li><i class="icon-check"></i> Chỉ có 3 phòng có sắn</li>
								<li><i class="icon-check"></i> Có phục vụ bữa sáng</li>
								<li><i class="icon-check"></i> Giá không bao gồm VAT &amp; dịch vụ</li>
							</ul>
						</div>
					</div>
					<div class="col-md-4 room-wrap animate-box">
						<a href="<?php echo public_url() ?>images/room-3.jpg" class="room image-popup-link" style="background-image: url(<?php echo public_url() ?>images/room-3.jpg);"></a>
						<div class="desc text-center">
							<span class="rate-star"><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full"></i></span>
							<h3><a href="">Phòng gia đình</a></h3>
							<p class="price">
								<span class="currency">đ</span>
								<span class="price-room">1200000</span>
								<span class="per">/ một ngày</span>
							</p>
							<ul>
								<li><i class="icon-check"></i> Chỉ có 2 phòng có sắn</li>
								<li><i class="icon-check"></i> Có phục vụ bữa sáng</li>
								<li><i class="icon-check"></i> Giá không bao gồm VAT &amp; dịch vụ</li>
							</ul>
						</div>
					</div>
					<div class="col-md-4 room-wrap animate-box">
						<a href="<?php echo public_url() ?>images/room-6.jpg" class="room image-popup-link" style="background-image: url(<?php echo public_url() ?>images/room-6.jpg);"></a>
						<div class="desc text-center">
							<span class="rate-star"><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full"></i></span>
							<h3><a href="">Phòng vip gia đình</a></h3>
							<p class="price">
								<span class="currency"><small>đ</small></span>
								<span class="price-room">1800000</span>
								<span class="per">/ một ngày</span>
							</p>
							<ul>
								<li><i class="icon-check"></i> Chỉ có 1 phòng có sắn</li>
								<li><i class="icon-check"></i> Có phục vụ bữa sáng</li>
								<li><i class="icon-check"></i> Giá không bao gồm VAT &amp; dịch vụ</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	<?php $this->load->view('site/footer') ?>
	</div>
	<?php $this->load->view('site/js') ?>
</body>
</html>