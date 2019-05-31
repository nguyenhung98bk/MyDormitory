<!doctype html>

<html class="no-js" lang="">
    <head>
    	<meta charset="utf-8">
    	<meta http-equiv="x-ua-compatible" content="ie=edge">
    	<title>Dangky | webktx.bk      </title>
    	<meta name="description" content="">
     	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="../png/unnamed.jpg">	
		<link rel="stylesheet" href="../css/forgot.css">
		<script src="js/login.js"></script>
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
				<form method="post" role="form" id="form_login" action="../function/forgot.php">
					<input type="text" class="input-field" name="Username" placeholder="Tên đăng nhập" required autocomplete="off">
					<input type="text" class="input-field" name="Mssv" placeholder="Mã số sinh viên" required autocomplete="off">
					<input type="text" class="input-field" name="Sdt" placeholder="Số điện thoại" required autocomplete="off">				
					<button type="submit" class="btn-primary">Tiếp tục</button>
				</form>
			</div>
		</div>		
		<div class="webtrang">
		</div>
		<div class="toolbar_bottom_fix">
		
                <div class="pull-left">Ký túc xá Đại học Bách Khoa Hà Nội. Địa chỉ: Phường Bách Khoa- Hai Bà Trưng- Hà Nội. Điện thoại:0335615050</div>                                   
            </div>
    </body>
</html>

