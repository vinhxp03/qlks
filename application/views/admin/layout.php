<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('admin/head') ?>
</head>
<body>
	<div id="wrapper">
		<!-- load nav -->
		<?php $this->load->view('admin/nav') ?>
		
		<!-- load wrapper -->
		<div class="page_wrapper">
			<?php $this->load->view($temp) ?>
		</div>
	</div>
	
</body>
</html>