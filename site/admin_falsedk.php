<!doctype html>

<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Admin</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../png/unnamed.jpg">    
        <link rel="stylesheet" href="../css/quanly_chuyenphong.css">
        <script src="../js/student_trangchu.js"></script>
        <link href="../php/datetime.php">
    </head>
    <body>
        <div class="menu">
            <div class="logo"><img src="../png/logo.png"></div>
            <a href="admin.php">Trang chủ</a>
            <a href="admin_dangky.php">Thêm cán bộ quản lý</a>
            <a href="admin_danhsachnv.php">Danh sách cán bộ quản lý</a>
            <a class="final" href="admin_thongke.php">Thống kê</a>
        </div>
        <div class="trangchu">
            <div class="title">
            <h1>Ký túc xá Đại học Bách khoa Hà Nội</h1>
            <div class="name">
                Xin chào:
                 [<a href="logout.php">Đăng xuất</a>]
                 <div class="kyo">
                Kỳ ở hiện tại: <?php include("../php/datetime.php"); kyo();?>
                  </div>
                </div>
                </div>
            <div class="title2">Chuyển phòng</div>
                <div class="login-area">
                <div class="login-content">
                    <div align="center" class="thongbao">
                        <h4>Thêm cán bộ quản lý không thành công</h4>
                <?php
                    $check=$_GET['check'];
                    if($check=='false1') echo 'Mật khẩu lặp lại không đúng';
                    if($check=='false2') echo 'Tài khoản đã được sử dụng';
                    if($check=='false3') echo 'Bạn chưa chọn khu quản lý';
                    ?>
                    </div>
                <div class="dong" align="center"> <a href="../site/admin_dangky.php"><input name="bt" type="button" value="Quay lai"></a></div>
                </div>
            </div>
            </div>
    </body>
</html>