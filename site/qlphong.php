<html>
<head>
     <link rel="stylesheet" href="../css/student_timkiem.css">
</head>
<body>
<div class="hienthi_dsphong">
<?php
    $Username = $_SESSION['Username'];
    $db = pg_connect("host=localhost dbname=ktx user=postgres password=nguyenhung6256");
    $sql = "SELECT count(msphong) as total from phong p, canboquanly c where c.mskhu = p.mskhu and c.uscb = '$Username'";
        $result = pg_query($sql) or die('Query failed: '. pg_last_error());
        $row = pg_fetch_assoc($result); 
        $total_records = $row['total'];
 
// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 10;
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
    $sql = "SELECT k.tenkhu, p.sophong, p.gioitinh, p.sncur, p.snmax, k.giaphong, p.msphong FROM phong p INNER JOIN khuktx k ON p.mskhu = k.mskhu INNER JOIN canboquanly c ON k.mskhu = c.mskhu WHERE c.uscb = '$Username' ORDER BY sophong ASC LIMIT $limit OFFSET $start";
    $result = pg_query($sql) or die('Query failed: '. pg_last_error());
    ?>
    <table cellpadding="5px" border="1px">
        <tr><th>Tên khu</th>
            <th>Tên phòng</th>
            <th>Giới tính</th>
            <th width="100px">Số người đăng ký hiện tại</th>
            <th width="100px">Số người tối đa</th>
            <th>Giá phòng/Tháng</th>
            <th>Xem</th>
        </tr>
    <?php
    while ($line = pg_fetch_row($result)): ?>
        <tr height="40px"><td><?php echo $line[0]; ?></td>
            <td><?php echo $line[1]; ?></td>
            <td><?php echo $line[2]; ?></td>
            <td><?php echo $line[3]; ?></td>
            <td><?php echo $line[4]; ?></td>
            <td><?php echo number_format($line[5]); ?></td>
            <td width="120px" class="button"><a href="quanly_ql1phong.php?sophong=<?php echo $line[1]; ?>"><button type="">Xem</button></a>
            </td>
        </tr>   
    <?php endwhile; ?>
 </table>
</div>
 <div class="page">
    <?php
    // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
    if ($current_page > 1 && $total_page > 1){
    echo '<a href="quanly_qlphong.php?page='.($current_page-1).'">Prev</a> | ';
}
 
// Lặp khoảng giữa
for ($i = 1; $i <= $total_page; $i++){
    // Nếu là trang hiện tại thì hiển thị thẻ span
    // ngược lại hiển thị thẻ a
    if ($i == $current_page){
        echo '<span>'.$i.'</span> | ';
    }
    else{
        echo '<a href="quanly_qlphong.php?page='.$i.'">'.$i.'</a> | ';
    }
}
 
// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
if ($current_page < $total_page && $total_page > 1){
    echo '<a href="quanly_qlphong.php?page='.($current_page+1).'">Next</a>  ';
}
?>
</div>
</body>
</html>