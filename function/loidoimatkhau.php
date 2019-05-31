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
            <a href="../site/student_trangchu.php">Trang chủ</a>
            <a href="../site/student_dangky.php">Đăng ký phòng ở</a>
            <a href="../site/student_xemdangky.php">Xem đăng ký</a>
            <a href="../site/student_danhsachbancungphong.php">Danh sách bạn cùng phòng</a>
            <a href="../site/student_thongtincanhan.php">Thông tin cá nhân</a>
            <a class="final" href="../site/student_doimatkhau.php">Đổi mật khẩu</a>
        </div>
        <div class="trangchu">
            <div class="title">
            <h1>Ky tuc xa dai hoc bac khoa ha noi</h1>
            <div class="name">
                Xin chao ban :
                <?php 
                    include("../function/student_trangchu.php");
                    session_start();
                    $Username=$_SESSION['Username'];
                    $name=layten($Username);
                    echo $name;
                 ?>
                 [<a href="../index.php">Dang xuat</a>]
                 <div class="kyo">
                Ky o hien tai: <?php include("../php/datetime.php"); kyo();?>
                  </div>
                </div>
            <div class="doipassword">
                <div class="title2">Thay đổi mật khẩu</div>
                <div class="login-area">
                <div class="login-content">
                    <div align="center" class="thongbao">
                        <h4>Đổi mật khẩu không thành công</h4>
                        <?php
                            $check=$_GET['check'];
                            if($check=='false1') echo 'Mật khẩu lặp lại không đúng';
                            if($check=='false2') echo 'Sai mật khẩu';
                        ?>
            </div>
                <div class="dong" align="center"> <a href="../site/student_doimatkhau.php"><input name="bt" type="button" value="Quay lai"></a></div>
                </div>
        </div>      
                </div>    
            </div>
            </div>
        </div>
    </body>
</html>