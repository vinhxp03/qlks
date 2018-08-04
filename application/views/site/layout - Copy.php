<?php  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Khách sạn</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />
		
	<?php $this->load->view('site/head') ?>
</head>
<body data-spy="scroll" data-target=".navbar-fixed-top" data-offset="30">
	<a href="#" id="backtotop" style="display: none;"><i class="fa fa-arrow-up"></i></a>
	<!-- load navbar -->
	<?php $this->load->view('site/navbar') ?>
	<!-- load header -->
	<?php $this->load->view('site/header') ?>
	
	<div class="message">
		<div class="container">
			<?php $this->load->view('site/message') ?>
		</div>
	</div>
	<div class="book" id="book">
		<div class="container">
			<?php $this->load->view('site/book') ?>
		</div>
	</div>
	<div class="introduce" id="introduce">
		<div class="container">
			<?php $this->load->view('site/introduce') ?>
		</div>
	</div>
	<div class="news" id="news">
		<div class="container">
			<?php $this->load->view('site/news') ?>
		</div>
	</div>
	<div class="service" id="service">
		<div class="container text-center">
			<?php $this->load->view('site/service') ?>
		</div>
	</div>
	<div class="footer">
		<div class="up text-center">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<h3>Địa chỉ</h3>
				<p>34 Nguyễn Huệ, Quận 1, Tp.Hồ Chí Minh</p>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<h3>Về chúng tôi</h3>
				<ul>
					<a href="#"><li class="fa fa-facebook"></li></a>
					<a href="#"><li class="fa fa-google-plus"></li></a>
					<a href="#"><li class="fa fa-twitter"></li></a>
					<a href="#"><li class="fa fa-linkedin"></li></a>
					<a href="#"><li class="fa fa-dribbble"></li></a>
				</ul>
			</div>
		</div>
		<div class="down">
			<div class="container">
				<p>Copyright &copy Xuân Vinh 2018</p>
			</div>
		</div>
	</div>
</body>
</html>