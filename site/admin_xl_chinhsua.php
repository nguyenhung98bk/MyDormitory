<html>
	<meta http-equiv="refresh" content="0;url=admin_danhsachnv.php">
<body>
<?php
	$Mscb=$_POST["mscb"];
	$Hoten=$_POST["Hoten"];
	$Ngaysinh=$_POST["Ngaysinh"];
	$Quequan=$_POST["Quequan"];
	$Khu=$_POST["Khu"];
	$Sdt=$_POST["Sdt"];
	$db = pg_connect("host=localhost dbname=ktx user=postgres password=nguyenhung6256");
	$sql = "SELECT mskhu FROM khuktx WHERE tenkhu='$Khu'";
	$result = pg_query($sql) or die('Query failed: '. pg_last_error());
	while($line= pg_fetch_row($result)){
		$mskhu=$line[0];
	}
	$query = "UPDATE canboquanly SET sdt='$Sdt', tencb='$Hoten',nscb='$Ngaysinh' ,mskhu='$mskhu',qqcb='$Quequan' where mscb='$Mscb'"; 
	$result = pg_query($query);
		pg_free_result($result);
		pg_close($db);
	?>
	<script>
			alert("Thay đổi thông tin thành công");
		</script>
</body>
</html>