<?php  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đặt vé</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
	<link rel="stylesheet" href="<?php echo public_url() ?>css/style_book.css">
	<link rel="stylesheet" href="<?php echo public_url() ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo public_url() ?>css/font-awesome.min.css">
	<script type="text/javascript" src="<?php echo public_url() ?>js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>js/style.js"></script>

	<link rel="stylesheet" href="<?php echo public_url() ?>datepicker/css/datepicker.css">
	<script type="text/javascript" src="<?php echo public_url() ?>datepicker/js/bootstrap-datepicker.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="gohome"><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Về trang chủ</a></div>
			<hr>
		</div>
		<div class="page_wrapper">
			<?php $this->load->view($temp) ?>
		</div>
	</div>
</body>
</html>