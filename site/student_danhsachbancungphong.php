<!doctype html>

<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Sinh vien</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../png/unnamed.jpg">    
        <link rel="stylesheet" href="../css/student_danhsachbancungphong.css">
        <script src="../js/student_trangchu.js"></script>
        <link href="../php/datetime.php">
        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.0.min.js"></script>
        <script type="text/javascript"></script>
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
                <h2>Danh sách bạn cùng phòng :</h2>
            <div class="list">
                <?php
                    include("danhsachcp.php");
                ?>
            </div>
            </div>
        </div>
        <script src="../js/student_dangky.js"></script>
    </body>
</html>