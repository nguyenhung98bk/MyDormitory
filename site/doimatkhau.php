<html>
	<meta http-equiv="refresh" content="0;url=student_trangchu.php">
<body>
<?php 
    session_start();
    $Username=$_SESSION['Username'];
	$Password= $_POST["Password"];
	$newPassword= $_POST["newPassword"];
	$Confirmpassword=$_POST["Confirmpassword"];
	if($newPassword!=$Confirmpassword){
		header ("Location: ../function/loidoimatkhau.php?check=false1");
	}
	else{
		$db = pg_connect("host=localhost dbname=ktx user=postgres password=nguyenhung6256") or die('Could not connect: '. pg_last_error());

		$sql = "SELECT * FROM Accounts";
		$result = pg_query($sql) or die('Query failed: '. pg_last_error());
		while ($line = pg_fetch_row($result)){
			if($line[0]==$Username&&$line[1]==$Password) {
			$check=1;
			}
		}
		pg_free_result($result);
		if($check!=1) {
		pg_close($db);
		header ("Location: ../function/loidoimatkhau.php?check=false2");
		}
		else{
		$db = pg_connect("host=localhost dbname=ktx user=postgres password=nguyenhung6256");
		$query = "UPDATE Accounts SET matkhau='$newPassword' where taikhoan='$Username'"; 
		$result = pg_query($query);
		pg_free_result($result);
		
	}
	pg_close($db);
}
?>
<script>
			alert("Đổi mật khẩu thành công\n\Nhấn OK để trở về trang chủ.");
</script>
</body>
</html>