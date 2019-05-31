<html>
<head>
     <link rel="stylesheet" href="../css/quanly_ql1phong.css">
</head>
<body>
    <div class="content">
    <div class="form-group">
      <form action="<?php $_PHP_SELF ?>" method="GET"  id="form_login">
        <div class="form-group">
            <div class="tp">
            Nhập tên phòng: 
        </div>
            <div class="input-class">
         <input type="int" name="sophong" class="input-field"    >
     </div>
     </div>
         <button type="submit" class="btn-primary" >Xem Danh Sách</button>
      </form>
</div>
</div>
<div class="listsinhvien">
<?php 
    $sophong = $_GET["sophong"];
    session_start();
    $Username=$_SESSION['Username'];
    $kyo=kyo2();
    if(!is_null($sophong)){
    $db = pg_connect("host=localhost dbname=ktx user=postgres password=nguyenhung6256");
    $sql = "SELECT p.msphong FROM phong p INNER JOIN canboquanly c ON p.mskhu = c.mskhu WHERE c.uscb = '$Username' and p.sophong='$sophong'";
            $result1 = pg_query($sql) or die('Loi 1');
    while ($line2 = pg_fetch_row($result1)){
            $check=$line2[0];
        }
        if($check==null){ ?>
        <div class="title_nullsv">
        <div class="nullsv"> <?php echo 'Số phòng không tồn tại';  ?>
         </div>
  </div>    
    <?php }
    if($check!=null){
        $sql = "SELECT s.mssv, s.tensv, s.gtsv, s.lop, pdk.trangthaidk, pdk.ngaydk, pdk.ngayduyet, pdk.lephi FROM canboquanly c INNER JOIN phong p ON c.mskhu = p.mskhu and c.uscb = '$Username' and p.sophong = $sophong INNER JOIN phieudangky pdk ON pdk.msphong = p.msphong and kyo = $kyo AND (pdk.trangthaidk = 'thanh cong' OR pdk.trangthaidk = 'cho xac nhan') INNER JOIN sinhvien s ON pdk.mssv = s.mssv ORDER BY s.mssv ASC";
        $result = pg_query($sql) or die('Loi 2');
?>
<table cellpadding="5px" border="1px">
            <tr><th>MSSV</th>
                <th>Tên</th>
                <th>Giới tính</th>
                <th>Lớp</th>
                <th>Trạng thái đăng ký</th>
                <th>Ngày đăng ký</th>
                <th>Ngày duyệt</th>
                <th>Lệ phí</th>
                <th>Xem</th>
                <th>Xóa</th>
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
                <td width="120px" class="button"><a href="quanly_ttsv.php?mssv=<?php echo $line[0]; ?>"><button type="">Xem</button></a>
        </td>
                <td width="120px" class="button"><a href="ql_xoasv.php?mssv=<?php echo $line[0]; ?>"><button type="">Xóa</button></a>
                
            </tr>   
        <?php endwhile; ?>
</table>
<?php
}
    pg_free_result($result);
    pg_close($db);
}
?>
</div>
</body>
</html>