<!doctype html>

<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Sinh vien</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../png/unnamed.jpg">    
        <link rel="stylesheet" href="../css/student_trangchu.css">
        <script src="../js/student_trangchu.js"></script>
        <link href="../php/datetime.php">
        <script src="https://lichngaytot.com/Scripts/jquery-1.11.0.min.js"></script><script src="https://lichngaytot.com/Scripts/jquery-ui.min.js"></script>
        <script src="https://lichngaytot.com/Scripts/widgetlichthang.js"></script>
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
            <div>
            </div>
                
            <div class="trangchu2">
            <h2>Trang chủ</h2>
        <div class="lich">
        <script type="text/javascript">document.write('<div id="widgetlichthang-lvsicsoft" style="width:auto;" data-urlimage="" data-startin="1" data-amduongshow="1" data-colorbackground="#ffffff" data-colortoday="#33FFCC" data-colorborder="#BBBBBB" data-coloram="#BBBBBB" data-colorduong="#000000"><div class="css-style-widget"></div></div> <div id="calendar-widget-lvs" class="lvs-calendar-container" style="width: 650px;height:400px; float: left; margin-top: 00px;"></div>');getWidgetLichThang("css-style-widget", "widgetlichthang-lvsicsoft")
    </script>
</div>
</div>
<div class="thongke">
    <div class="sosinhvien">
        <div class="sosinhvien2">
        <h1>
        <?php
            $dbconn = pg_connect("host=localhost dbname=ktx user=postgres password=nguyenhung6256") or die('Could not connect: '. pg_last_error());

        $sql = "SELECT count(*) FROM Accounts WHERE ltk='sinhvien'";
        $result = pg_query($sql) or die('Query failed: '. pg_last_error());
        while ($line = pg_fetch_row($result)){
            echo $line[0];
        }
        pg_free_result($result);
        pg_close($dbconn);
        ?>
    </h1>
    <h3>Sinh viên</h3>
    Tổng số tài khoản sinh viên
</div>
    </div>
    <div class="socanbo">
        <div class="socanbo2">
        <h1>
            <?php
            $dbconn = pg_connect("host=localhost dbname=ktx user=postgres password=nguyenhung6256") or die('Could not connect: '. pg_last_error());

        $sql = "SELECT count(*) FROM Accounts WHERE ltk='quanly'";
        $result = pg_query($sql) or die('Query failed: '. pg_last_error());
        while ($line = pg_fetch_row($result)){
            echo $line[0];
        }
        pg_free_result($result);
        pg_close($dbconn);
        ?>
    </h1>
    <h3>Cán bộ</h3>
    Tổng số tài khoản cán bộ
        </div>
    </div>
    <div class="sodk">
        <div class="sodk2">
        <h1>
            <?php
            $kyo=kyo2();
            $dbconn = pg_connect("host=localhost dbname=ktx user=postgres password=nguyenhung6256") or die('Could not connect: '. pg_last_error());

        $sql = "SELECT count(distinct(mssv)) FROM phieudangky WHERE kyo='$kyo'";
        $result = pg_query($sql) or die('Query failed: '. pg_last_error());
        while ($line = pg_fetch_row($result)){
            echo $line[0];
        }
        pg_free_result($result);
        pg_close($dbconn);
        ?>
    </h1>
    <h3>Đăng ký</h3>
    Tổng số sinh viên đăng ký trong kỳ
        </div>
    </div>
</div>
</div>
    </body>
</html>