<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng nhập</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
	<link rel="stylesheet" href="<?php echo public_url() ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo public_url() ?>css/style_login.css">
	<link rel="stylesheet" href="<?php echo public_url() ?>css/font-awesome.min.css">
	<script type="text/javascript" src="<?php echo public_url() ?>js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel-heading">
                    <h3 class="panel-title">Đăng nhập</h3>
                </div>
                <div class="panel-body">
                        <form role="form" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Tài khoản" name="username" type="text" autofocus value="<?php echo set_value('username') ?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mật khẩu" name="password" type="password" value="">
                                </div>
                                <div style="color: red"><?php echo form_error('login') ?></div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
			</div>
		</div>
	</div>
</body>
</html>