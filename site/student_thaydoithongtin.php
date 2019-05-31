<!doctype html>

<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Sinh vien</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../png/unnamed.jpg">    
        <link rel="stylesheet" href="../css/student_thaydoithongtin.css">
        <script src="../js/student_trangchu.js"></script>
        <link href="../php/datetime.php">
    </head>
    <body>
        <div class="menu">
            <div class="logo"><img src="../png/logo.png"></div>
            <a href="student_trangchu.php">Trang chủ</a>
            <a href="student_dangky.php">Đăng ký phòng ở</a>
            <a href="student_xemdangky.php">Xem đăng ký</a>
            <a href="student_danhsachbancungphong.php">Danh sách bạn cùng phòng</a>
            <a href="student_thongtincanhan.php">Thông tin cá nhân</a>
            <a href="student_canbo.php">Cán bộ quản lý</a>
            <a class="final" href="student_doimatkhau.php">Đổi mật khẩu</a>
        </div>
        <div class="trangchu">
            <div class="title">
            <h1>Ký túc xá Đại học Bách khoa Hà Nội</h1>
            <div class="name">
                Xin chào bạn :
                <?php 
                    include("function.php");
                    name();
                    checklogin2();
                 ?>
                 [<a href="logout.php">Đăng xuất</a>]
                 <div class="kyo">
                Kỳ ở hiện tại: <?php include("../php/datetime.php"); kyo();?>
                  </div>
                </div>
            <div>                
            </div>
            </div>
            <div class="login-area">
                <?php
                        session_start();
                        $Username=$_SESSION['Username'];
                        include("../function/student_thongtincanhan.php");
                        $line=thongtin($Username);
                    ?>
                <h2>Thay đổi thông tin cá nhân :</h2>
                <div class="login-content">
                <form method="post" role="form" id="form_login" action="thaydoithongtin.php">
                    <table class="loginform_row" width="100%" cellpadding="10   " cellspacing="0" style="font-size: 12pt;" border="0">
                        <tr><th width="160px">Mã số sinh viên :</th>
                            <td><?php echo $line[0]; ?></td></tr>
                        <tr>
                            <th>Họ Tên :</th>
                            <td><input type="text" class="input-field" name="Hoten" value="<?php echo $line[1] ?>" required autocomplete="off" maxlength="30"></td></tr>
                        <tr><th>Ngày sinh :</th>
                            <td><input type="date" class="input-field" name="Ngaysinh" value="<?php echo $line[2] ?>" required autocomplete="off"></td></tr>
                        <tr><th>Giới tính :</th>
                            <td><?php if($line[3]='nam') echo "Nam"; else echo "Nữ";?></td></tr>
                        <tr><th>Lớp-Khóa :</th>
                            <td><input type="text" class="input-field" name="Lop" value="<?php echo $line[4]; ?>" maxlength="10" required autocomplete="off"></td></tr>
                        <tr><th>Quê quán :</th>
                            <td><input type="text" class="input-field" name="Quequan" value="<?php echo $line[5]; ?>" maxlength="20" required autocomplete="off"></td></tr>
                        <tr><th>Số điện thoại :</th>
                            <td><input type="text" class="input-field" name="Sdt" value="<?php echo $line[7]; ?> " maxlength="20" required autocomplete="off"></td></tr>
                    </table>
                    <div class="thaydoi">
                    <button type="submit" class="btn-primary" >Thay đổi thông tin</button>
                </div>
                </form>
                </div>
            </div>
        </div>
    </body>
</html>