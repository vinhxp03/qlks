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
	<?php $this->load->view('site/contact/header') ?>

	<div id="colorlib-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 animate-box">
						<h3>Thông tin liên hệ</h3>
						<div class="row contact-info-wrap">
							<div class="col-md-3">
								<p><span><i class="icon-location-2"></i></span> Đường Ngô Quyền, <br> Số 121, Quận 1, Hồ Chí Minh.</p>
							</div>
							<div class="col-md-3">
								<p><span><i class="icon-phone3"></i></span> <a href="">08 888 888</a></p>
							</div>
							<div class="col-md-3">
								<p><span><i class="icon-paperplane"></i></span> <a href="">luxhotel@gmail.com</a></p>
							</div>
							<div class="col-md-3">
								<p><span><i class="icon-globe"></i></span> <a href="#">luxhotel.com</a></p>
							</div>
						</div>
					</div>
					<div class="col-md-10 col-md-offset-1 animate-box">
						<h3>Liên hệ ngay</h3>
						<form action="#">
							<div class="row form-group">
								<div class="col-md-6">
									<label for="fname">First Name</label>
									<input type="text" id="fname" class="form-control" placeholder="Your firstname">
								</div>
								<div class="col-md-6">
									<label for="lname">Last Name</label>
									<input type="text" id="lname" class="form-control" placeholder="Your lastname">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="email">Email</label>
									<input type="text" id="email" class="form-control" placeholder="Your email address">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="subject">Chủ đề</label>
									<input type="text" id="subject" class="form-control" placeholder="Your subject of this message">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="message">Nội dung</label>
									<textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
								</div>
							</div>
							<div class="form-group text-center">
								<input type="submit" value="Gửi liên hệ" class="btn btn-primary">
							</div>

						</form>		
					</div>
				</div>
			</div>
		</div>
		
	<?php $this->load->view('site/footer') ?>
	</div>
	<?php $this->load->view('site/js') ?>
</body>
</html>