<!doctype html>

<html class="no-js" lang="">
    <head>
    	<meta charset="utf-8">
    	<meta http-equiv="x-ua-compatible" content="ie=edge">
    	<title>Login | webktx.bk      </title>
    	<meta name="description" content="">
     	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="../png/unnamed.jpg">	
		<link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
    	<?php
    		include("function.php");
    		checklogin();
        ?>
		<div class="login-header">
			<img class="title-img" src="../png/image.png" height="120" weight=60 alt="">
			<h1 class="title">HUST</h1>
			<h2 class="title">Ký Túc Xá Bách khoa </br> Đại học Bách Khoa Hà Nội</h2>
		</div>
		<div class="title2">PHẦN MỀM QUẢN LÝ KÝ TÚC XÁ</div>
		<div class="login-area">
				<div class="login-content">
					<form method="post" role="form" id="form_login"
            				action="../function/login.php">
					<div class="form-group">
					<input type="text" class="input-field" name="Username" placeholder="Tài khoản"
                required autocomplete="off" maxlength="30">
					</div>
					<div class="form-group">
					<input type="Password" class="input-field" name="Password" placeholder="Mật khẩu"
                required maxlength="30">
					</div>
					<button type="submit" class="btn btn-primary">Đăng nhập</button>
					</form>
					<div class="login-bottom-links">
						<a href="registration.php" class="link">
                            Đăng ký      </br>                  </a>
							</br>
                        <a href="forgot.php" class="link">
							Quên mật khẩu
						</a>
					</div>
				</div>
		</div>		
		<div class="webtrang">
		</div>
		<div class="demo1">
			<div style="height: 280px; text-align:left;">
				<img src="../png/ktx.jpeg" height="170" weight=400 alt=""></div></div>

		<div class="demo2">
			<div style="height: 280px; text-align:left;">
				<img src="../png/ktxhust.jpg" height="170" weight=400 alt=""></div></div>
		</div>
		<div class="toolbar_bottom_fix">
		
                <div class="pull-left">Ký túc xá Đại học Bách Khoa Hà Nội. Địa chỉ: Phường Bách Khoa- Hai Bà Trưng- Hà Nội. Điện thoại:0335615050</div>                                   
            </div>
    </body>
</html>

