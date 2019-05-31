<html>
	<meta http-equiv="refresh" content="0;url=admin_danhsachnv.php">
<body>
<?php 
	$mscb= $_GET["mscb"];
	$dbconn = pg_connect("host=localhost dbname=ktx user=postgres password=nguyenhung6256") or die('Could not connect: '. pg_last_error());
	$sql = "SELECT uscb FROM canboquanly WHERE mscb='$mscb'";
	$result = pg_query($sql) or die('Query failed: '. pg_last_error());
	while($line= pg_fetch_row($result)){
		$uscb=$line[0];
	}
	$sql = "UPDATE phieudangky SET mscb=null WHERE mscb='$mscb'";
	$sql = "DELETE FROM canboquanly WHERE mscb='$mscb'";
	$result = pg_query($sql);
	$sql = "DELETE FROM accounts WHERE taikhoan='$uscb'";
	$result = pg_query($sql);
	pg_free_result($result);
    pg_close($dbconn);
?>
<script>
			alert("Xóa thành công!");
</script>	
</body>
</html>