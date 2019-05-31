<!doctype html>

<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Admin</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../png/unnamed.jpg">    
        <link rel="stylesheet" href="../css/admin_dangky.css">
        <script src="../js/student_trangchu.js"></script>
        <link href="../php/datetime.php">
        <script src="https://lichngaytot.com/Scripts/jquery-1.11.0.min.js"></script><script src="https://lichngaytot.com/Scripts/jquery-ui.min.js"></script>
        <script src="https://lichngaytot.com/Scripts/widgetlichthang.js"></script>
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
            <div class="doipassword">
                <div class="title2">Thông tin cán bộ quản lý</div>
        <div class="login-area">
                <div class="login-content">
                    <form method="post" role="form" id="form_login"
                            action="../function/admin_dangky.php">
                    <div class="form-group">
                    <table class="loginform_row" width="100%" cellpadding="10   " cellspacing="0" style="font-size: 10pt;" border="0">
                    <tr>
                        <td><input type="text" class="input-field" name="username" placeholder="Tên đăng nhập" required autocomplete="off" maxlength="30"></td>
                        <td><input type="text" class="input-field" name="Hoten" placeholder="Họ tên" required autocomplete="off" maxlength="30"></td>
                    </tr>
                    <tr>
                        <td><input type="Password" class="input-field" name="Password" placeholder="Mật khẩu" required autocomplete="off" maxlength="30"></td>
                        <td><input type="text" class="input-field" name="Sdt" placeholder="Số điện thoại" required autocomplete="off" maxlength="11"></td>
                    </tr>
                    <tr>
                        <td><input type="Password" class="input-field" name="Confirmpassword" placeholder="Xác nhận mật khẩu" required autocomplete="off" maxlength="30"></td>
                        <td><input type="text" class="input-field" name="Quequan" placeholder="Quê quán" required autocomplete="off" maxlength="20"></td>
                    </tr>
                        <tr><td><div>Chọn khu quản lý :</div></td>
                            <td>
                            <?php 
                                $db = pg_connect("host=localhost dbname=ktx user=postgres password=nguyenhung6256");
                                $sql = "SELECT tenkhu FROM khuktx";
                                $result = pg_query($sql) or die('Query failed: '. pg_last_error());
                            ?> 
                            <select name="khu">
                                <option value="0">Chọn khu quản lý </option>
                                <?php while ($line = pg_fetch_row($result)): ?>
                                <option value="<?php echo $line[0]; ?>"><?php echo $line[0]; ?></option>
                                <?php endwhile; ?>
                            </select>
                            </td>  
                        </tr>
                    </tr>
                    <tr>
                        <td width="220px"><div>Ngày sinh:</div></td>
                        <td><input type="date" class="input-field" name="Ngaysinh" placeholder="Ngày sinh" required autocomplete="off"></td>
                    </tr>
                    </table>    
                    <div class="Gioitinh">Giới tính: 
                            <input type="radio" name="Gioitinh" value="nam" required checked="checked" autocomplete="off"> Nam <input type="radio" name="Gioitinh" value="nu" required autocomplete="off"> Nữ </div>                    
                    <button type="submit" class="btn-primary">Thêm cán bộ quản lý</button>
                    </div>
                    </form>
                </div>
        </div>      
            </div>
            </div>
        </div>
    </body>
</html>


