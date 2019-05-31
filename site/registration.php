<!doctype html>

<html class="no-js" lang="">
    <head>
    	<meta charset="utf-8">
    	<meta http-equiv="x-ua-compatible" content="ie=edge">
    	<title>Dangky | webktx.bk      </title>
    	<meta name="description" content="">
     	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="../png/unnamed.jpg">	
		<link rel="stylesheet" href="../css/registration.css">
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
				<form method="post" role="form" id="form_login" action="../function/registration.php">
					<table class="loginform_row" width="100%" cellpadding="10	" cellspacing="0" style="font-size: 10pt;" border="0">
					<tr><td><input type="text" class="input-field" name="Hoten" placeholder="Họ tên" required autocomplete="off" maxlength="30"></td>
					<td><input type="text" class="input-field" name="Username" placeholder="Tên đăng nhập" required autocomplete="off" maxlength="30"></td></tr>
					<tr><td><input type="Password" class="input-field" name="Password" placeholder="Mật khẩu" required autocomplete="off" maxlength="30"></td>
					<td><input type="Password" class="input-field" name="Confirmpassword" placeholder="Xác nhận mật khẩu" required autocomplete="off" maxlength="30"></td></tr>
					<tr><td><input type="text" class="input-field" name="Sdt" placeholder="Số điện thoại" required autocomplete="off" maxlength="11"></td>
						<td><input type="text" class="input-field" name="Mssv" maxlength="8" placeholder="Mã số sinh viên" required autocomplete="off"></td></tr>
					<tr>
					<td><input type="text" class="input-field" name="Lop" placeholder="Lớp-Khóa" required autocomplete="off" maxlength="10"></td>
					<td><input type="text" class="input-field" name="Quequan" placeholder="Quê quán" required autocomplete="off" maxlength="20"></td></tr>
					<tr><td width="220px"><div>Ngày sinh:</div></td>
						<td><input type="date" class="input-field" name="Ngaysinh" placeholder="Ngày sinh" required autocomplete="off"></td>
					</tr>
					</table>	
					<div class="Gioitinh">Giới tính: 
							<input type="radio" name="Gioitinh" value="nam" required checked="checked" autocomplete="off"> Nam <input type="radio" name="Gioitinh" value="nu" required autocomplete="off"> Nữ </div>					
					<button type="submit" class="btn-primary">Đăng Ký</button>
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

