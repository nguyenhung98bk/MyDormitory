<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="quanly_trangchu.css">
</head>
<body>
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
    $sql = "SELECT cb.mscb,cb.tencb,cb.nscb,cb.gtcb,cb.qqcb,cb.sdt,khuktx.tenkhu FROM canboquanly cb,khuktx WHERE khuktx.mskhu=cb.mskhu ORDER BY cb.mscb LIMIT $limit OFFSET $start";
    $result = pg_query($sql) or die();
?>
<table cellpadding="5px" border="1px">
            <tr><th width="80px" class="center">Mã số cán bộ</th>
            	<th>Tên cán bộ</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Quê quán</th>
                <th>Số điện thoại</th>
                <th>Chức vụ</th>
                <th>Chỉnh sửa</th>
                <th width="80px">Xóa</th>
            </tr>
        <?php
        while ($line = pg_fetch_row($result)): ?>
            <tr height="50px"><td class="center"><?php echo $line[0]; ?></td>
                <td><?php echo $line[1]; ?></td>
                <td><?php echo $line[2]; ?></td>
                <td class="center"><?php if($line[3]=='nam') echo "Nam"; else echo "Nữ"; ?></td>
                <td class="center"><?php echo $line[4]; ?></td>
                <td class="center"><?php echo $line[5]; ?></td>
                <td class="center"><?php echo "CBQL $line[6]"; ?></td>
                <td width="120px" class="button"><a href="admin_chinhsua.php?mscb=<?php echo $line[0]; ?>"><button type="">Chỉnh sửa</button></a></td>
            
                <td width="120px" class="button"><a href="admin_xoa.php?mscb=<?php echo $line[0]; ?>" title=""><button type="">Chỉnh sửa</button></a></td>
            </tr>
        <?php endwhile; ?>
</table>
<?php
    pg_free_result($result);
    pg_close($db);
?>
<div class="page">
<?php
    // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
    if ($current_page > 1 && $total_page > 1){
    echo '<a href="admin_danhsachnv.php?page='.($current_page-1).'">Prev</a> | ';
}
 
// Lặp khoảng giữa
for ($i = 1; $i <= $total_page; $i++){
    // Nếu là trang hiện tại thì hiển thị thẻ span
    // ngược lại hiển thị thẻ a
    if ($i == $current_page){
        echo '<span>'.$i.'</span> | ';
    }
    else{
        echo '<a href="admin_danhsachnv.php?page='.$i.'">'.$i.'</a> | ';
    }
}
 
// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
if ($current_page < $total_page && $total_page > 1){
    echo '<a href="admin_danhsachnv.php?page='.($current_page+1).'">Next</a>  ';
}
?>
</div>
</body>
</html>