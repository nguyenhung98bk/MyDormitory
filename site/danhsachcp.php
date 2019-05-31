<html>
<head>
	 <link rel="stylesheet" href="../css/student_danhsachbancungphong.css">
</head>
<body>
<div class="hienthi">
<?php
	session_start();
    $Username=$_SESSION['Username'];
    $kyo=kyo2();
    $dbconn = pg_connect("host=localhost dbname=ktx user=postgres password=nguyenhung6256") or die('Could not connect: '. pg_last_error());
    $sql = "SELECT phieudangky.msphong FROM sinhvien,phieudangky Where sinhvien.ussv='$Username' 
                and sinhvien.mssv=phieudangky.mssv and phieudangky.kyo='$kyo' and phieudangky.trangthaidk='thanh cong'";
    $result = pg_query($sql) or die('Query failed: '. pg_last_error());
    while ($line = pg_fetch_row($result)){
        $msphong=$line[0];
    }
    if($msphong!=Null){
    $sql = "SELECT count(*) FROM sinhvien,phieudangky Where sinhvien.mssv=phieudangky.mssv 
                and phieudangky.msphong='$msphong' and phieudangky.kyo='$kyo' and phieudangky.trangthaidk='thanh cong' and sinhvien.ussv!='$Username'";
    $result = pg_query($sql) or die('Query failed: '. pg_last_error());
    while ($line = pg_fetch_row($result)){
        $songuoi=$line[0];
    }
    if($songuoi==0) header("location:student_nullcp.php");
    else{
    $sql = "SELECT sinhvien.* FROM sinhvien,phieudangky Where sinhvien.mssv=phieudangky.mssv 
                and phieudangky.msphong='$msphong' and phieudangky.kyo='$kyo' and phieudangky.trangthaidk='thanh cong' and sinhvien.ussv!='$Username'";
    $result = pg_query($sql) or die('Query failed: '. pg_last_error());
    ?>
    <table cellpadding="10px" border="1px">
        <tr><th>Mssv</th>
            <th width="150px">Họ tên</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th width="120px">Lớp-Khóa</th>
            <th width="120px">Quê quán</th>
            <th width="120px">Số điện thoại</th>
        </tr>
    <?php
    while ($line = pg_fetch_row($result)): ?>
        <tr><td><?php echo $line[0]; ?></td>
        <td><?php echo $line[1]; ?></td>
        <td><?php echo $line[2]; ?></td>
        <td><?php echo $line[3]; ?></td>
        <td><?php echo $line[4]; ?></td>
        <td><?php echo $line[5]; ?></td>
        <td><?php echo $line[7]; ?></td></tr>
    <?php
    endwhile;
}
}
    else include("../function/chuacobancp.php");
    pg_free_result($result);
    pg_close($db);
?>
</table>
</div>
</body>
</html>
