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
	<?php $this->load->view('site/about/header') ?>

	<div id="colorlib-about">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="about animate-box">
							<h2>Welcome to our Lux Hotel</h2>
							<p>Nằm ở vị trí trung tâm thành phố, trên con đường đẹp nhất thành phố, gần trung tâm mua sắm, ăn uống , giải trí, cách chợ Hàn khoảng 300m. Từ khách sạn quý khách có thể ngắm toàn cảnh Cầu Sài Gòn với khoảng cách chỉ khoảng 300 mét và chiêm ngưỡng tận mắt những ngày cuối tuần. Cũng từ khách sạn chỉ mất 10 phút xe máy từ khách sạn là Qúy khách đã có thể hòa mình vào dòng nước trong xanh của đại dương tại một trong sáu bãi biển đẹp nhất hành tinh theo bình chọn của tạp chí có uy tín Forbes.</p>
							<p>Khách sạn được chia thành 5 hạng phòng khác nhau, được du khách yêu thích bởi sự sạch sẽ và dịch vụ phòng hoàn hảo. Ngoài ra, khách sạn Đệ Nhất còn trang bị phòng tập thể hình, hồ bơi, CLB trò chơi có thưởng (chỉ dành cho khách nước ngoài) & khu mát-xa – xông hơi để phục vụ khách lưu trú.</p>
							<p>Ẩm thực Đệ Nhất cũng là một thế mạnh bởi sự đa dạng phong cách và tinh tế trong từng món ăn. Nhà hàng Phố Nướng Đệ Nhất, Korea House và Hanasushi mang đến những món ăn cũng như không gian đặc trưng đậm chất Việt Nam, Hàn Quốc & Nhật Bản. Với nhà hàng Buffet Đệ Nhất là sự tổng hợp hài hòa các món ăn đến từ Việt – Á – Âu, là một bữa tiệc hoành tráng thật sự cho khách lưu trú tại khách sạn nói riêng và thực khách Sài Gòn nói chung.</p>
							<p>Đi kèm với dịch vụ lưu trú và ẩm thực, khách sạn Đệ Nhất còn cung cấp các dịch vụ - giải pháp cho tiệc và hội nghị. Hơn 20 sảnh tiệc – hội nghị với sức chứa sảnh nơi từ 30 – 1000 khách, được trang bị máy móc hiện đại và chất lượng phục vụ đẳng cấp. Đệ Nhất là khách sạn quốc tế 4 sao, đã 16 lần được Tổng Cục Du Lịch Việt Nam - Hiệp Hội Du lịch Việt Nam bình chọn vào top 10 khách sạn hàng đầu Việt Nam từ năm 1999 đến nay.</p>
						</div>
					</div>
					<div class="col-md-6">
						<img class="img-responsive" src="<?php echo public_url() ?>images/img_bg_5.jpg" alt="Free HTML5 Bootstrap Template by colorlib.com">
					</div>
				</div>
			</div>
		</div>
		
	<?php $this->load->view('site/footer') ?>
	</div>
	<?php $this->load->view('site/js') ?>
</body>
</html>