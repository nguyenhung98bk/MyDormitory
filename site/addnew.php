<!doctype html>

<html class="no-js" lang="">
    <head>
    	<meta charset="utf-8">
    	<meta http-equiv="x-ua-compatible" content="ie=edge">
    	<title>LoiDangky| webktx.bk      </title>
    	<meta name="description" content="">
     	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="../png/unnamed.jpg">	
		<link rel="stylesheet" href="../css/addnew.css">
    </head>
    <body>
		<div class="login-header">
			<img class="title-img" src="../png/image.png" height="120" weight=60 alt="">
			<h1 class="title">BKA</h1>
			<h2 class="title">Ký Túc Xá Bách khoa </br> Đại học Bách Khoa Hà Nội</h2>
		</div>
		<div class="title2">PHẦN MỀM QUẢN LÝ KÝ TÚC XÁ</div>
		<div class="login-area">
				<div class="login-content">
					<div align="center" class="thongbao">
						<h3>Đăng ký không thành công</h3>
				<?php
				$check=$_GET['check'];
				if($check=='false1') echo 'Mật khẩu lặp lại không đúng';
				if($check=='false2') echo 'Tài khoản đã được sử dụng';
				if($check=='false3') echo 'Mssv này đã đăng ký tài khoản';
				?>
			</div>
				<div class="dong" align="center"> <a href="registration.php"><input name="bt" type="button" value="Quay lại"></a></div>
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