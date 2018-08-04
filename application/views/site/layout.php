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
	<!-- <a href="#" id="backtotop" style="display: none;"><i class="fa fa-arrow-up"></i></a> -->
	<!-- load navbar -->
	<div id="page">
	<?php $this->load->view('site/navbar') ?>
	<!-- load header -->
	<?php $this->load->view('site/header') ?>

	<div class="book" id="book">
		<div class="container">
			<?php $this->load->view('site/book') ?>
		</div>
	</div>
	<div class="service" id="service">
		<div class="container text-center">
			<?php $this->load->view('site/service') ?>
		</div>
	</div>
	<?php $this->load->view('site/room') ?>
	<?php $this->load->view('site/dinner') ?>
	<?php $this->load->view('site/testimony') ?>
	<?php $this->load->view('site/footer') ?>
	</div>
	<?php $this->load->view('site/js') ?>
</body>
</html>