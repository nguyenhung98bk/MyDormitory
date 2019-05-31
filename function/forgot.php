<html>
<head>
	<meta http-equiv="refresh" content="0;url=../index.php">
</head>
<body>
	<?php
		$Username= $_POST["Username"];
		$Mssv= $_POST["Mssv"];
		$Sdt= $_POST["Sdt"];
		$db = pg_connect("host=localhost dbname=ktx user=postgres password=nguyenhung6256") or die('Could not connect: '. pg_last_error());

		$sql = "SELECT * FROM sinhvien";
		$result = pg_query($sql) or die('Query failed: '. pg_last_error());
		while ($line = pg_fetch_row($result)){
			if($line[6]==$Username) {
				$checkUsername=true;
				if($line[0]==$Mssv)
					$checkmssv=true;
				if($line[7]==$Sdt)
					$checksdt=true;
			}
		}
		pg_free_result($result);
		pg_close($db);
		if($checkUsername!=true){
			header ("Location: ../site/loiquenmk.php?check=false1");
		}
		else{
			if($checkmssv!=true){
			if($checksdt!=true){
				header ("Location: ../site/loiquenmk.php?check=false2");
			}
			else {
				header ("Location: ../site/loiquenmk.php?check=false3");
			}
		}
		if($checkmssv==true&&$checksdt!=true)
			header ("Location: ../site/loiquenmk.php?check=false4");
	}
	$db = pg_connect("host=localhost dbname=ktx user=postgres password=nguyenhung6256") or die('Could not connect: '. pg_last_error());

		$sql = "SELECT * FROM Accounts";
		$result = pg_query($sql) or die('Query failed: '. pg_last_error());
		while ($line = pg_fetch_row($result)){
			if($line[0]==$Username) {
				$Password=$line[1];
			}
		}
		pg_free_result($result);
		pg_close($db);
	?>
	<script>
		alert("Mật khẩu của bạn là <?php echo $Password ?>");
	</script>
</body>
</html>