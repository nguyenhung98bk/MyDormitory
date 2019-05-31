<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		session_start();
		$tongtien=0;
		$db = pg_connect("host=localhost dbname=ktx user=postgres password=nguyenhung6256");
		?>

		<?php $sql = "SELECT mskhu,(sum(snmax)-sum(sncur)) FROM phong GROUP BY mskhu ORDER BY mskhu";
	$result = pg_query($sql) or die('Query failed: '. pg_last_error());
	?>
	<h3>Kỳ ở hiện tại :</h3>
	<div class="thongke">
	<table cellpadding="5px" border="1px">
		<tr><td>Khu nhà</td>
			<td>Số chỗ ở chưa có sinh viên đăng ký</td></tr>
	<?php while ($line = pg_fetch_row($result)): ?>
			<tr><td><?php echo "B$line[0]"; ?></td>
			<td><?php echo $line[1]; ?></td></tr>
	<?php endwhile; ?>
</table>
</div>
	<?php
		$sql= "SELECT distinct(kyo) FROM phieudangky ORDER BY kyo";
		$result = pg_query($sql) or die('Query failed: '. pg_last_error());
	?>
	<div class="form_nhap">
	<form action="<?php $_PHP_SELF ?>" method="POST"  id="form_login">
		Chọn kỳ ở:
		<select name="pay">
			<option value="0">Chọn</option>
			<?php while ($line = pg_fetch_row($result)): ?>
			<option value="<?php echo $line[0]; ?>"><?php echo $line[0]; ?></option>
			<?php endwhile; ?>
		</select>
		<input type="submit" name="sm_order" value="Xem thống kê">
	</form>
</div>
<?php
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$kyo=$_POST['pay'];
	}
	if($kyo!=0){
	$sql = "SELECT pdk.lephi FROM phieudangky pdk,phong,khuktx WHERE pdk.kyo='$kyo' and (pdk.trangthaidk='thanh cong' or pdk.trangthaidk = 'het han') and pdk.msphong = phong.msphong and phong.mskhu=khuktx.mskhu";
	$result = pg_query($sql) or die('Query failed: '. pg_last_error());
	while ($line = pg_fetch_row($result)){
		$tongtien=$tongtien+$line[0];
	}
	$sql = "SELECT count(*) FROM phieudangky pdk,phong,khuktx WHERE pdk.kyo='$kyo' and (pdk.trangthaidk='thanh cong' or pdk.trangthaidk = 'het han') and pdk.msphong = phong.msphong and phong.mskhu=khuktx.mskhu";
	$result = pg_query($sql) or die('Query failed: '. pg_last_error());
	while ($line = pg_fetch_row($result)){
		$songuoio=$line[0];
	}
	$sql = "SELECT count(*) FROM phieudangky pdk,phong,khuktx,sinhvien sv WHERE pdk.kyo='$kyo' and (pdk.trangthaidk='thanh cong' or pdk.trangthaidk = 'het han') and pdk.msphong = phong.msphong and phong.mskhu=khuktx.mskhu and sv.gtsv='nam' and sv.mssv=pdk.mssv";
	$result = pg_query($sql) or die('Query failed: '. pg_last_error());
	while ($line = pg_fetch_row($result)){
		$soNam=$line[0];
	}
	$sql = "SELECT count(*) FROM phieudangky pdk,phong,khuktx,sinhvien sv WHERE pdk.kyo='$kyo' and (pdk.trangthaidk='thanh cong' or pdk.trangthaidk = 'het han') and pdk.msphong = phong.msphong and phong.mskhu=khuktx.mskhu and sv.gtsv='nu' and sv.mssv=pdk.mssv";
	$result = pg_query($sql) or die('Query failed: '. pg_last_error());
	while ($line = pg_fetch_row($result)){
		$soNu=$line[0];
	}
	$sql = "SELECT count(*) FROM phieudangky pdk,phong,khuktx WHERE pdk.kyo='$kyo' and pdk.msphong = phong.msphong and phong.mskhu=khuktx.mskhu";
	$result = pg_query($sql) or die('Query failed: '. pg_last_error());
	while ($line = pg_fetch_row($result)){
		$songuoidk=$line[0];
	}
	?>
	<div class="thongke">
	<table cellpadding="5px" border="1px">
		<tr><th>Tổng lệ phí ở thu được</th>
			<td><?php echo number_format($tongtien).'VNĐ' ?></td>
		</tr>
		<tr>
			<th>Tổng số sinh viên lưu trú</th>
			<td><?php echo "$songuoio"; ?></td>
		</tr>
		<tr>
			<th>Tổng số sinh viên nam lưu trú</th>
			<td><?php echo "$soNam"; ?></td>
		</tr>
		<tr>
			<th>Tổng số sinh viên nữ lưu trú</th>
			<td><?php echo "$soNu"; ?></td>
		</tr>
		<tr>
			<th>Tổng số sinh viên đăng ký</th>
			<td><?php echo "$songuoidk"; ?></td>
		</tr>
	</table>
	</div>
<?php }
	pg_free_result($result);
	pg_close($dbconn);
?>
</body>
</html>