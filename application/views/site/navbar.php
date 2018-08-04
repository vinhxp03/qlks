<!-- <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			Brand and toggle get grouped for better mobile display
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php //echo base_url() ?>"><img src="<?php //echo public_url() ?>images/logo.png" alt="" class="img-responsive"></a>
			</div>
	
			Collect the nav links, forms, and other content for toggling
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li><a href="#introduce">Giới thiệu</a></li>
					<li><a href="#news">Tin tức</a></li>
					<li><a href="#service">Dịch vụ</a></li>
					<li><a href="#">Giải thưởng</a></li>
				</ul>
			</div>/.navbar-collapse
		</div>
	</nav> end menubar -->
<nav class="colorlib-nav" role="navigation">
	<div class="top-menu">
		<div class="container">
			<div class="row">
				<div class="col-xs-2">
					<div id="colorlib-logo"><a href="<?php echo base_url() ?>">Luxhotel</a></div>
				</div>
				<div class="col-xs-10 text-right menu-1">
					<ul>
						<li class="active"><a href="<?php echo base_url() ?>">Home</a></li>
						<li><a href="<?php echo base_url("rooms") ?>">Phòng</a></li>
						<li><a href="<?php echo base_url("dinner") ?>">Ăn uống</a></li>
						<li><a href="<?php echo base_url("about") ?>">Về chúng tôi</a></li>
						<li><a href="<?php echo base_url("contact") ?>">Liên hệ</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</nav>