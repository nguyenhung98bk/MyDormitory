<!doctype html>

<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Sinh vien</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../png/unnamed.jpg">    
        <link rel="stylesheet" href="../css/student_doimatkhau.css">
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
            <div class="title2">Đăng ký phòng</div>
                <div class="login-area">
                <div class="login-content">
                    <div align="center" class="thongbao">
                        <h4>Đăng ký phòng không thành công</h4>
                <?php
                    $check=$_GET['false'];
                    if($check=='false1') echo 'Giới tính không đúng!';
                    if($check=='false2') echo 'Sinh viên đã đăng ký phòng kỳ này. Không thể đăng ký thêm!';
                    if($check=='false3') echo 'Phòng đã đầy, không thể đăng ký thêm!'
                    ?>
                    </div>
                <div class="dong" align="center"> <a href="../site/student_dangky.php"><input name="bt" type="button" value="Quay lai"></a></div>
                </div>
            </div>
            </div>
        </div>
    </body>
</html>