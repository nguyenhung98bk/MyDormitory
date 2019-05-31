<!doctype html>

<html class="no-js" lang="">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>
        Login | webktx.bk      </title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="png/unnamed.jpg">	
	<link rel="stylesheet" href="css/style.css">
    </head>
    <body>
	<div class="title-image">
	</div>
	<div>
		<div class="login-header">
			<img class="title-img" src="png/image.png" height="240" weight=120 alt="">
			<h1 class="title">BKA</h1>
			<h2 class="title">Ký Túc Xá Bách khoa </br> Đại học Bách Khoa Hà Nội</h2>
		</div>
			<div class="login-area">
				<div class="login-content">
					<form method="post" role="form" id="form_login"
            action="http://ktx.hust.edu.vn/csam/index.php?login/validate_login">
						<div class="form-group">
							<input type="text" class="input-field" name="Username" placeholder="Username"
                required autocomplete="off">
						</div>
						<div class="form-group">
							<input type="Password" class="input-field" name="Password" placeholder="Password"
                required>
						</div>
						<button type="submit" class="btn btn-primary">Login<i class="fa fa-lock"></i></button>
					</form>

					<div class="login-bottom-links">
						<a href="fileweb/forgot.php" class="link">
							Forgot password</br>
						</a>
                        <a href="first.php" class="link">
                            Account registration                        </a>
					</div>
				</div>
			</div>

    <script src="http://ktx.hust.edu.vn/csam/assets/login_page/js/vendor/jquery-1.12.0.min.js"></script>
    <script src="http://ktx.hust.edu.vn/csam/assets/js/bootstrap-notify.js"></script>
	</div>

    
    </body>
</html>

