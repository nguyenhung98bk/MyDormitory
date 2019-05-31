<html>
<head>
     <link rel="stylesheet" href="../css/quanly_ttsv.css">
</head>
<body>
<div class="content">
    <div class="form-group">  
<form action="<?php $_PHP_SELF ?>" method="GET"  id="form_login">
    Nhập MSSV:
    <input type="int" name="mssv" class="input-field">
    <button type="submit" class="btn-primary" >Xem thông tin</button>
</form>
</div>
<div class="listtt">
<?php 
	$mssv = $_GET["mssv"];
	session_start();
	$Username=$_SESSION['Username'];
    //include("../php/datetime.php");
    $kyo=kyo2();
    if($mssv!=null){
    $db = pg_connect("host=localhost dbname=ktx user=postgres password=nguyenhung6256");
        $sql = "SELECT pdk.mssv FROM phieudangky pdk INNER JOIN phong p ON pdk.msphong = p.msphong INNER JOIN canboquanly c ON p.mskhu = c.mskhu AND c.uscb = '$Username' WHERE pdk.mssv = $mssv";
        $result = pg_query($sql) or die('Loi 1');
        while ($line2 = pg_fetch_row($result)){
            $check=$line2[0];
        }
        if($check==null){ ?>
        <div class="title_nullsv">
        <div class="nullsv"> <?php echo 'Mã số sinh viên không tồn tại'; } ?>
         </div>
  </div>    
    <?php }
    if($check!=null){
        $sql = "SELECT mssv, tensv, nssv, gtsv, lop, qqsv, sdt FROM sinhvien WHERE mssv = $mssv";
        $result = pg_query($sql) or die('Loi 2');
?>
        <h2>Thông tin cá nhân sinh viên</h2>
   <div class="listttsv">
        <?php
        while ($line = pg_fetch_row($result)): ?>
            <table class="table" cellpadding="5px" border="1px">
                        <tr><th width="250px">Mã số sinh viên</th>
                            <td width="250px"><?php echo $line[0]; ?></td></tr>
                        <tr><th>Họ Tên</th>
                            <td><?php echo $line[1]; ?></td></tr>
                        <tr><th>Ngày sinh</th>
                            <td><?php echo $line[2]; ?></td></tr>
                        <tr><th>Giới tính</th>
                            <td><?php echo $line[3]; ?></td></tr>
                        <tr><th>Lớp-Khóa</th>
                            <td><?php echo $line[4]; ?></td></tr>
                        <tr><th>Quê quán</th>
                            <td><?php echo $line[5]; ?></td></tr>
                        <tr><th>Số điện thoại</th>
                            <td><?php echo $line[6]; ?></td></tr>
                    </table>
        <?php endwhile; ?>

</div>
<h2>Lịch sử đăng ký của sinh viên</h2>
<?php
    $sql="SELECT p.sophong, pdk.kyo,pdk.ngaydk, pdk.ngayduyet, pdk.trangthaidk, pdk.lephi, c.tencb FROM canboquanly c INNER JOIN phong p ON p.mskhu = c.mskhu AND c.uscb = '$Username' INNER JOIN phieudangky pdk ON pdk.msphong = p.msphong AND pdk.mssv = $mssv ORDER BY kyo DESC";
    $result = pg_query($sql) or die('false');
    ?>
    <div class="lsdk">
    <table class="table" cellpadding="5px" border="1px">
        <tr>
            <td>Phòng</td>
            <td>Kỳ ở</td>
            <td>Ngày đăng ký</td>
            <td>Ngày chấp nhận</td>
            <td>Trạng thái đăng ký</td>
            <td>Lệ phí</td>
            <td>Người duyệt</td>
        </tr>
    <?php
        while ($line = pg_fetch_row($result)): ?>
            <tr><td><?php echo $line[0]; ?></td>
                <td><?php echo $line[1]; ?></td>
                <td><?php echo $line[2]; ?></td>
                <td><?php echo $line[3]; ?></td>
                <td><?php echo $line[4]; ?></td>
                <td><?php echo number_format($line[5]); ?></td>
                <td><?php echo $line[6]; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
<?php
    }
	pg_free_result($result);
    pg_free_result($result1);
	pg_close($db);
?>
</div>
</div>
</body>
</html>