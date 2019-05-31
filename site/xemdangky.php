<html>
<head>
	<link rel="stylesheet" href="../css/student_xemdangky.css">
</head>
<body>
<?php
	session_start();
    $Username=$_SESSION['Username'];
    $sql = "SELECT count(*) 
FROM sinhvien,phieudangky,phong,khuktx 
Where sinhvien.ussv='$Username' 
and sinhvien.mssv=phieudangky.mssv 
and phieudangky.msphong=phong.msphong 
and phong.mskhu=khuktx.mskhu";
    $result = pg_query($sql) or die('Query failed: '. pg_last_error());
    while ($line = pg_fetch_row($result)){
        $check=$line[0];
    }
    if($check==0){ 
        include("student_chuadk.php");
}   
    else{
    $sql = "SELECT phong.sophong,khuktx.tenkhu,phieudangky.kyo,phieudangky.ngaydk,phieudangky.ngayduyet,phieudangky.trangthaidk,phieudangky.lephi
FROM sinhvien,phieudangky,phong,khuktx 
Where sinhvien.ussv='$Username' 
and sinhvien.mssv=phieudangky.mssv 
and phieudangky.msphong=phong.msphong 
and phong.mskhu=khuktx.mskhu
ORDER BY phieudangky.ngaydk DESC";
    $result = pg_query($sql) or die('Query failed: '. pg_last_error());
    ?>
    <div class="print">
    <table cellpadding="10px" border="1px">
    	<tr>
    		<td>Phòng</td>
    		<td>Khu</td>
    		<td>Kỳ đăng ký</td>
    		<td>Ngày đăng ký</td>
    		<td>Ngày xác nhận</td>
    		<td>Trạng thái đăng ký</td>
            <td>Lệ phí(VNĐ)</td>
    	</tr>
    <?php while ($line = pg_fetch_row($result)): ?>
    	<tr>
    	<td><?php echo $line[0]; ?></td>
    	<td><?php echo $line[1]; ?></td>
    	<td><?php echo $line[2]; ?></td>
    	<td><?php echo $line[3]; ?></td>
    	<td><?php echo $line[4]; ?></td>
    	<td><?php echo $line[5]; ?></td>
        <td><?php echo number_format($line[6]); ?></td>
    </tr>
    <?php endwhile; }?>
</table>
</div>
</body>
</html>