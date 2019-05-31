<html>
<head>
     <link rel="stylesheet" href="../css/quanly_trangchu.css">
</head>
<body>
<div>
<?php
    session_start();
    $Username = $_SESSION['Username'];
    //include("../php/datetime.php");
    $kyo=kyo2();
    $db = pg_connect("host=localhost dbname=ktx user=postgres password=nguyenhung6256");
    $sql = "SELECT count(mssv) as total FROM phieudangky pdk INNER JOIN phong p ON pdk.msphong = p.msphong AND kyo = $kyo AND trangthaidk = 'cho xac nhan' INNER JOIN canboquanly c ON p.mskhu = c.mskhu AND c.uscb = '$Username'";
        $result = pg_query($sql) or die('Query failed: '. pg_last_error());
        $row = pg_fetch_assoc($result); 
        $total_records = $row['total'];
 
// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 8;
// BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
// tổng số trang
    if($total_records==0) include("student_chuadk.php");
    else{
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
    $sql = "SELECT p.sophong, s.mssv, s.tensv, p.gioitinh, s.lop, s.qqsv, pdk.ngaydk, pdk.lephi, c.mscb FROM phieudangky pdk INNER JOIN phong p ON pdk.msphong = p.msphong AND kyo = $kyo AND trangthaidk = 'cho xac nhan' INNER JOIN canboquanly c ON p.mskhu = c.mskhu AND c.uscb = '$Username' INNER JOIN sinhvien s ON pdk.mssv = s.mssv ORDER BY  pdk.msphong,pdk.ngaydk ASC LIMIT $limit OFFSET $start";
    $result = pg_query($sql) or die('Query failed: '. pg_last_error());
    ?>
<table cellpadding="5px" border="1px">
        <tr><th>Số Phòng</th>
            <th>MSSV</th>
            <th>Tên</th>
            <th>Giới tính</th>
            <th>Lớp</th>
            <th>Quê Quán</th>
            <th>Ngày Đăng Ký</th>
            <th>Lệ phí</th>
            <th>Duyệt</th>
            <th>Hủy</th>
        </tr>
    <?php
    while ($line = pg_fetch_row($result)): ?>
        <tr height="40px"><td><?php echo $line[0]; ?></td>
            <td><?php echo $line[1]; ?></td>
            <td><?php echo $line[2]; ?></td>
            <td><?php echo $line[3]; ?></td>
            <td><?php echo $line[4]; ?></td>
            <td><?php echo $line[5]; ?></td>
            <td><?php echo $line[6]; ?></td>
            <td><?php echo number_format($line[7]); ?></td>
            <td width="120px" class="button" ><a href="duyetdk.php?mssv=<?php echo $line[1]; ?>&&mscb=<?php echo $line[8]; ?>"><button>Duyệt</button></a></td>
            <td width="120px" class="button"><a href="huydk.php?mssv=<?php echo $line[1]; ?>&&mscb=<?php echo $line[8]; ?>"><button>Hủy</button></a></td>
        </tr>   
    <?php endwhile; ?>
</table>

<div class="page">
<?php
    // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
    if ($current_page > 1 && $total_page > 1){
    echo '<a href="quanly_duyetpdk.php?page='.($current_page-1).'">Prev</a> | ';
}
 
// Lặp khoảng giữa
for ($i = 1; $i <= $total_page; $i++){
    // Nếu là trang hiện tại thì hiển thị thẻ span
    // ngược lại hiển thị thẻ a
    if ($i == $current_page){
        echo '<span>'.$i.'</span> | ';
    }
    else{
        echo '<a href="quanly_duyetpdk.php?page='.$i.'">'.$i.'</a> | ';
    }
}
 
// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
if ($current_page < $total_page && $total_page > 1){
    echo '<a href="quanly_duyetpdk.php?page='.($current_page+1).'">Next</a>  ';
}
}
?>
</div>
</div>
</body>
</html>