<!doctype html>

<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Quan ly</title>
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
            <div class="title2">Chuyển phòng</div>
                <div class="login-area">
                <div class="login-content">
                    <div align="center" class="thongbao">
                        <h4>Chuyển phòng không thành công</h4>
                <?php
                    $check=$_GET['false'];
                    if($check=='false1') echo 'Sinh viên phải đăng ký thành công trước!';
                    if($check=='false2') echo 'Giới tính không hợp lệ!';
                    if($check=='false3') echo 'Phòng đã đầy, không thể chuyển sang!';
                    if($check=='false4') echo 'Sinh viên đang ở phòng này. Không chuyển!';
                    if($check=='false5') echo 'Mã số sinh viên không tồn tại!';
                    if($check=='false6') echo 'Số phòng không tồn tại!';
                    ?>
                    </div>
                <div class="dong" align="center"> <a href="../site/quanly_chuyenphong.php"><input name="bt" type="button" value="Quay lai"></a></div>
                </div>
            </div>
            </div>
        </div>
    </body>
</html>