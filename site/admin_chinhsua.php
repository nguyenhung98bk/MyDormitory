<!doctype html>

<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Admin</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../png/unnamed.jpg">    
        <link rel="stylesheet" href="../css/student_thaydoithongtin.css">
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
            <div>                
            </div>
            </div>
            <div class="login-area">
                <?php
                        session_start();
                        $Username=$_SESSION['Username'];
                        include("../function/student_thongtincanhan.php");
                        $line=thongtin($Username);
                    ?>
                <h2>Thay đổi thông tin cán bộ quản lý :</h2>
                <div class="login-content">
                <form method="post" role="form" id="form_login" action="admin_xl_chinhsua.php">
                    <table class="loginform_row" width="100%" cellpadding="10   " cellspacing="0" style="font-size: 12pt;" border="0">
                        <?php
                            $mscb= $_GET["mscb"];
                            $db = pg_connect("host=localhost dbname=ktx user=postgres password=nguyenhung6256");
                            $sql = "SELECT cb.mscb,cb.tencb,cb.nscb,cb.gtcb,cb.sdt,khuktx.tenkhu,cb.qqcb FROM canboquanly cb,khuktx WHERE khuktx.mskhu=cb.mskhu AND cb.mscb='$mscb'";
                            $result = pg_query($sql) or die();
                        ?>
                        <?php while ($line= pg_fetch_row($result)): ?>
                        <tr><th width="160px">Mã số cán bộ quản lý :</th>
                            <td><input type="radio" name="mscb" value="<?php echo $line[0]; ?>" required checked="checked" autocomplete="off"> <?php echo $line[0]; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Họ Tên :</th>
                            <td><input type="text" class="input-field" name="Hoten" value="<?php echo $line[1]; ?>" required autocomplete="off" maxlength="30"></td></tr>
                        <tr><th>Ngày sinh :</th>
                            <td><input type="date" class="input-field" name="Ngaysinh" value="<?php echo $line[2]; ?>" required autocomplete="off"></td></tr>
                        <tr><th>Giới tính :</th>
                            <td><?php if($line[3]=='nam') echo "Nam"; else echo "Nữ";?></td></tr>
                        <tr><th>Quê quán :</th>
                            <td><input type="text" class="input-field" name="Quequan" value="<?php echo $line[6]; ?> " required autocomplete="off" maxlength="20"></td></tr>
                        <tr><th>Số điện thoại :</th>
                            <td><input type="text" class="input-field" name="Sdt" value="<?php echo $line[4]; ?> " required autocomplete="off" maxlength="20"></td></tr>
                        <tr><th>Khu quản lý :</th>
                            <td><?php 
                                $db = pg_connect("host=localhost dbname=ktx user=postgres password=nguyenhung6256");
                                $sql = "SELECT tenkhu FROM khuktx WHERE tenkhu NOT like '$line[5]'";
                                $result = pg_query($sql) or die('Query failed: '. pg_last_error());
                            ?> 
                            <select name="Khu">
                                <option value="<?php echo $line[5]; ?>"><?php echo $line[5]; ?></option>
                                <?php while ($line1 = pg_fetch_row($result)): ?>
                                <option value="<?php echo $line1[0]; ?>"><?php echo $line1[0]; ?></option>
                                <?php endwhile; ?>
                            </select></td></tr>
                        <?php endwhile; ?>
                    </table>
                    <div class="thaydoi">
                    <button type="submit" class="btn-primary" >Thay đổi thông tin</button>
                </div>
                </form>
                </div>
            </div>
        </div>
    </body>
</html>


