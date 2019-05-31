<!doctype html>

<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Sinh vien</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../png/unnamed.jpg">    
        <link rel="stylesheet" href="../css/student_thongtincanhan.css">
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
            </div>
            <div class="student_thongtincanhan">
                <h2>Quản lý thông tin cá nhân:</h2>
                <div class="thongtin">
                    <?php
                        session_start();
                        $Username=$_SESSION['Username'];
                        include("../function/student_thongtincanhan.php");
                        $line=thongtin($Username);
                    ?>
                    <table class="table" cellpadding="5px" border="1px">
                        <tr><th width="250px">Mã số sinh viên</th>
                            <td width="250px"><?php echo $line[0]; ?></td></tr>
                        <tr><th>Họ Tên</th>
                            <td><?php echo $line[1]; ?></td></tr>
                        <tr><th>Ngày sinh</th>
                            <td><?php echo $line[2]; ?></td></tr>
                        <tr><th>Giới tính</th>
                            <td><?php echo $line[3]; ?></td></tr>
                        <tr><th>Lớp</th>
                            <td><?php echo $line[4]; ?></td></tr>
                        <tr><th>Quê quán</th>
                            <td><?php echo $line[5]; ?></td></tr>
                        <tr><th>Số điện thoại</th>
                            <td><?php echo $line[7]; ?></td></tr>
                    </table>
                </div>
                <div class="thaydoi">
                    <a href="student_thaydoithongtin.php"><button class="suadoi" >Chỉnh sửa thông tin</button></a>
                </div>
                
            </div>
        </div>
    </body>
</html> 