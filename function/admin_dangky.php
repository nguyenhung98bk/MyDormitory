<html>
<head>
	<meta http-equiv="refresh" content="0;url=../site/admin_dangky.php">
</head>
<body>
	<?php $username= $_POST["username"];
	      $Password= $_POST["Password"];
	      $Confirmpassword=$_POST["Confirmpassword"];
	      $Hoten=$_POST["Hoten"];
	      $Ngaysinh=$_POST["Ngaysinh"];
	      $Gioitinh=$_POST["Gioitinh"];
	      $Quequan=$_POST["Quequan"];
	      $khu=$_POST["khu"];
	      $Sdt=$_POST["Sdt"];
	if($khu=='0'){
		header ("Location: ../site/admin_falsedk.php?check=false3");
	}
	else{
	if($Password!=$Confirmpassword){
		header ("Location: ../site/admin_falsedk.php?check=false1");
	}
	else{
		$db = pg_connect("host=localhost dbname=ktx user=postgres password=nguyenhung6256") or die('Could not connect: '. pg_last_error());

		$sql = "SELECT * FROM Accounts";
		$result = pg_query($sql) or die('Query failed: '. pg_last_error());
		while ($line = pg_fetch_row($result)){
			if($line[0]==$username) {
			$check=1;
			}
		}
		if($check==1) {
		header ("Location: ../site/admin_falsedk.php?check=false2");
		}
		else{
			$sql = "SELECT max(mscb) FROM canboquanly";
			$result = pg_query($sql) or die('Query failed: '. pg_last_error());
			while ($line = pg_fetch_row($result)){
				$mscb=$line[0]+1;
			}
			$sql = "SELECT mskhu FROM khuktx WHERE tenkhu='$khu'";
			$result = pg_query($sql) or die('Query failed: '. pg_last_error());
			while ($line = pg_fetch_row($result)){
				$mskhu=$line[0];
			}
			$query = "INSERT INTO Accounts VALUES ('$username','$Password','quanly')"; 
			$query2 = "INSERT INTO canboquanly VALUES ('$mscb','$Hoten','$Ngaysinh','$Gioitinh','$Quequan','$Sdt','$username','$mskhu')";	
		$result = pg_query($query);
		$result2 = pg_query($query2); 
		pg_free_result($result2);
		}
		pg_free_result($result);
		pg_close($db);
		}
	}
	?>
		<script>
			alert("Thêm cán bộ quản lý thành công");
</script>	
</body>
</html>