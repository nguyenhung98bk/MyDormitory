<html>
	<meta http-equiv="refresh" content="0;url=student_thongtincanhan.php">
<body>
<?php
	$Hoten=$_POST["Hoten"];
	$Ngaysinh=$_POST["Ngaysinh"];
	$Lop=$_POST["Lop"];
	$Quequan=$_POST["Quequan"];
	$Sdt=$_POST["Sdt"];
	session_start();
	$Username=$_SESSION['Username'];
	$db = pg_connect("host=localhost dbname=ktx user=postgres password=nguyenhung6256");
	$query = "UPDATE sinhvien SET qqsv='$Quequan', sdt='$Sdt', tensv='$Hoten',nssv='$Ngaysinh' ,lop='$Lop' where ussv='$Username'"; 
	$result = pg_query($query);
		pg_free_result($result);
		pg_close($db);
	?>
	<script>
			alert("Thay đổi thông tin thành công");
		</script>
</body>
</html>
