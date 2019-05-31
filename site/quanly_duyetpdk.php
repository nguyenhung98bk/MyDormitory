<!doctype html>

<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Quan ly</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../png/unnamed.jpg">    
        <link rel="stylesheet" href="../css/quanly_trangchu.css">
        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.0.min.js"></script>
        <script src="../js/student_dangky.js"></script>
        <link href="../php/datetime.php">
    </head>
    <body>
        <div class="menu">
            <div class="logo"><img src="../png/logo.png"></div>
            <a href="quanly.php">Trang chủ</a>
            <a href="quanly_qlphong.php">Quản lý phòng ở</a>
            <a href="quanly_ql1phong.php">Quản lý từng phòng</a>
            <a href="quanly_duyetpdk.php">Duyệt đăng ký</a>
            <a href="quanly_ttsv.php">Thông tin Sinh viên</a>
            <a href="quanly_chuyenphong.php">Chuyển phòng</a>
            <a class="final" href="quanly_thongke.php">Thống kê</a>
        </div>
        <div class="trangchu">
            <div class="title">
            <h1>Ký túc xá Đại học Bách khoa Hà Nội</h1>
            <div class="name">
                Xin chào:
                <?php 
                    include("function.php");
                    namecb();
                    checklogin3();
                 ?>
                 [<a href="logout.php">Đăng xuất</a>]
                 <div class="kyo">
                Kỳ ở hiện tại: <?php include("../php/datetime.php"); kyo();?>
                  </div>
                </div>
                <h2> Duyệt đăng ký :</h2>
            <div class="ddk">
                <?php
                    include("quanly_xl_duyetdk.php");
                ?>
            </div>
            </div>
        </div>
        <script src="../js/student_dangky.js"></script>
    </body>
</html>