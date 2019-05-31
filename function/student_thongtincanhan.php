<?php
	function thongtin($Username){
	$dbconn = pg_connect("host=localhost dbname=ktx user=postgres password=nguyenhung6256") or die('Could not connect: '. pg_last_error());

		$sql = "SELECT * FROM sinhvien";
		$result = pg_query($sql) or die('Query failed: '. pg_last_error());
		while ($line = pg_fetch_row($result)){
			if($line[6]==$Username) {
				return $line;
			}
		}
		pg_free_result($result);
		pg_close($dbconn);
	}
?>