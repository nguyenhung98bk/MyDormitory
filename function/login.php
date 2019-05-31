<html>
	<meta http-equiv="refresh" content="0;url=../site/login.php">
<body>
	<?php $Username= $_POST["Username"];
	      $Password= $_POST["Password"];
	      ?>
	<?php
		$dbconn = pg_connect("host=localhost dbname=ktx user=postgres password=nguyenhung6256") or die('Could not connect: '. pg_last_error());

		$sql = "SELECT * FROM Accounts";
		$result = pg_query($sql) or die('Query failed: '. pg_last_error());
		while ($line = pg_fetch_row($result)){
		if($line[0]==$Username&&$line[1]==$Password){
			header ("Location: ../site/xuly.php?Username=$Username&&Ltk=$line[2]");
		}	
		}
		pg_free_result($result);
		pg_close($dbconn);
	?>
<script>
			alert("Tài khoản hoặc mật khẩu không chính xác\n\Nhấn OK để trở về màn hình đăng nhập.");
</script>	
</body>
</html>