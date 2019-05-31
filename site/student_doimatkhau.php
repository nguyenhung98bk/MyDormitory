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
            <div class="doipassword">
                <div class="title2">Thay đổi mật khẩu</div>
        <div class="login-area">
                <div class="login-content">
                    <form method="post" role="form" id="form_login"
                            action="doimatkhau.php">
                    <div class="form-group">
                    <input type="Password" class="input-field" name="Password" placeholder="Mật khẩu"
                required maxlength="30">
                    <input type="Password" class="input-field" name="newPassword" placeholder="Mật khẩu mới"
                required maxlength="30">
                    <input type="Password" class="input-field" name="Confirmpassword" placeholder="Xác nhận mật khẩu"
                required maxlength="30">
                    </div>
                    <button type="submit" class="btn btn-primary">Thay đổi</button>
                    </form>
                </div>
        </div>      
            </div>
            </div>
        </div>
    </body>
</html>