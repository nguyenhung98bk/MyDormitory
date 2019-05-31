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
            <div class="student_canbo">
                <h2>Cán bộ quản lý :</h2>
                <div class="thongtin">
                <?php
    $db = pg_connect("host=localhost dbname=ktx user=postgres password=nguyenhung6256");
    $sql = "SELECT count(mscb) as total from canboquanly";
        $result = pg_query($sql) or die('Query failed: '. pg_last_error());
        $row = pg_fetch_assoc($result); 
        $total_records = $row['total'];
 
// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 5;
// BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
// tổng số trang
    $total_page = ceil($total_records / $limit);
// Giới hạn current_page trong khoảng 1 đến total_page
    if ($current_page > $total_page){
        $current_page = $total_page;
    }
    else if ($current_page < 1){
    $current_page = 1;
    }
     // Tìm Start
    $start = ($current_page - 1) * $limit;
    pg_free_result($result);
?>
                <?php 
                $db = pg_connect("host=localhost dbname=ktx user=postgres password=nguyenhung6256");
                $sql= "SELECT cb.tencb,khuktx.tenkhu,cb.sdt FROM khuktx,canboquanly cb WHERE cb.mskhu=khuktx.mskhu ORDER BY cb.mscb LIMIT $limit OFFSET $start";
                $result = pg_query($sql) or die('Query failed: '. pg_last_error());
                $i=(($current_page-1)*$limit);
                ?>
                <table cellpadding="5px" border="1px"   >
                    <tr><th width="50px">STT</th>
                        <th width="220px">Họ Tên</th>
                        <th width="280px">Chức vụ</th>
                        <th width="130px">Số điện thoại</th>
                    </tr>
                    <?php while ($line = pg_fetch_row($result)): ?>
                        <tr>
                            <td><?php echo $i=$i+1; ?></td>
                            <td><?php echo $line[0]; ?></td>
                            <td><?php echo "Cán bộ quản lý nhà $line[1]" ?></td>
                            <td><?php echo $line[2]; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
                <div class="page">
<?php
    // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
    if ($current_page > 1 && $total_page > 1){
    echo '<a href="student_canbo.php?page='.($current_page-1).'">Prev</a> | ';
}
 
// Lặp khoảng giữa
for ($i = 1; $i <= $total_page; $i++){
    // Nếu là trang hiện tại thì hiển thị thẻ span
    // ngược lại hiển thị thẻ a
    if ($i == $current_page){
        echo '<span>'.$i.'</span> | ';
    }
    else{
        echo '<a href="student_canbo.php?page='.$i.'">'.$i.'</a> | ';
    }
}
 
// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
if ($current_page < $total_page && $total_page > 1){
    echo '<a href="student_canbo.php?page='.($current_page+1).'">Next</a>  ';
}
?>
</div>
                </div>
            </div>
        </div>
    </body>
</html>