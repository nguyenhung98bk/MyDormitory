<!doctype html>

<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Admin</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../png/unnamed.jpg">    
        <link rel="stylesheet" href="../css/admin_danhsachnv.css">
        <script src="../js/student_trangchu.js"></script>
        <link href="../php/datetime.php">
        <script src="https://lichngaytot.com/Scripts/jquery-1.11.0.min.js"></script><script src="https://lichngaytot.com/Scripts/jquery-ui.min.js"></script>
        <script src="https://lichngaytot.com/Scripts/widgetlichthang.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.0.min.js"></script>
        <script type="text/javascript"></script>
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
                Xin chào Admin
                <?php
                session_start();
                $Username=$_SESSION['Username'];
                if($Username==null) header("Location: login.php");
                include("function.php");
                checklogin4();
                ?>
                 [<a href="logout.php">Đăng xuất</a>]
                 <div class="kyo">
                Kỳ ở hiện tại: <?php include("../php/datetime.php"); kyo();?>
                  </div>
                </div>

            </div>
            <h2>Danh sách cán bộ quản lý :</h2>
            <div class="thongtinphong">
                <?php 
                    include("admin_xl_danhsachnv.php");
                ?>
            </div>
            </div>
            <script src="../js/student_dangky.js"></script>
    </body>
</html>


