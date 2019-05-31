<html>
<head>
	<meta http-equiv="refresh" content="0;url=../index.php">
</head>
<body>
	<?php $Username= $_POST["Username"];
	      $Password= $_POST["Password"];
	      $Confirmpassword=$_POST["Confirmpassword"];
	      $Hoten=$_POST["Hoten"];
	      $Mssv=$_POST["Mssv"];
	      $Ngaysinh=$_POST["Ngaysinh"];
	      $Gioitinh=$_POST["Gioitinh"];
	      $Lop=$_POST["Lop"];
	      $Quequan=$_POST["Quequan"];
	      $Sdt=$_POST["Sdt"];
	if($Password!=$Confirmpassword){
		header ("Location: ../site/addnew.php?check=false1");
	}
	else{
		$db = pg_connect("host=localhost dbname=ktx user=postgres password=nguyenhung6256") or die('Could not connect: '. pg_last_error());

		$sql = "SELECT * FROM Accounts";
		$result = pg_query($sql) or die('Query failed: '. pg_last_error());
		while ($line = pg_fetch_row($result)){
			if($line[0]==$Username) {
			$check=1;
			}
		}
		pg_free_result($result);
		if($check==1) {
		header ("Location: ../site/addnew.php?check=false2");
}
		else{
		$sql = "SELECT * FROM Sinhvien";
		$result = pg_query($sql) or die('Query failed: '. pg_last_error());
		while ($line1 = pg_fetch_row($result)){
			if($line1[0]==$Mssv) {
			$check=1;
			}
		}
		pg_free_result($result);
		if($check==1){
			header ("Location: ../site/addnew.php?check=false3");
		}
		else{
		$db = pg_connect("host=localhost dbname=ktx user=postgres password=nguyenhung6256");
		$query = "INSERT INTO Accounts VALUES ('$Username','$Password','sinhvien')"; 
		$query2 = "INSERT INTO Sinhvien VALUES ('$Mssv','$Hoten','$Ngaysinh','$Gioitinh','$Lop','$Quequan','$Username','$Sdt')";	
		$result = pg_query($query);
		$result2 = pg_query($query2); 
		pg_free_result($result);
		pg_free_result($result2);
		pg_close($db);
	}
}
}

	?>
		<script>
			alert("Đăng ký thành công\n\Nhấn OK trở về màn hình đăng nhập.");
</script>	
</body>
</html>