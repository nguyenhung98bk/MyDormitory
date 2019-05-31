<html>
<head>
     <link rel="stylesheet" href="../css/quanly_chuyenphong.css">
</head>
<body>
<div class="doipassword">
                <div class="title2">Chuyển phòng</div>
        <div class="login-area">
                <div class="login-content">
<form action="<?php $_PHP_SELF ?>" method="GET">
	<div class="form-group">
		<table>
         <tr><td>Nhập MSSV:</td><td> <input type="int" name="mssv" class="input-field"></td></tr>
         <tr><td>Nhập Tên phòng cần chuyển:</td><td> <input type="int" name="sophong" class="input-field"></td></tr>
         </table>
         <button type="submit" class="btn btn-primary" >Xác nhận</button>
     </div>
</form>
</div>
</div>
</div>
<?php
		$mssv = $_GET["mssv"];
		$sophong = $_GET["sophong"];
		session_start();
		$Username=$_SESSION['Username'];
	    $kyo=kyo2();
	    $db = pg_connect("host=localhost dbname=ktx user=postgres password=nguyenhung6256");
	    $sql = "SELECT count(*) FROM canboquanly c INNER JOIN phong p ON c.mskhu = p.mskhu AND c.uscb = '$Username' INNER JOIN phieudangky pdk ON pdk.msphong = p.msphong AND pdk.mssv = $mssv";
		$result = pg_query($sql) or die();
		while ($line = pg_fetch_row($result)){
			$check=$line[0];
		}
		if($check==0) header("location: quanly_falsecp.php?false=false5");
		else{
			$sql = "SELECT count(*) FROM phong p,canboquanly c WHERE c.uscb = '$Username' AND c.mskhu=p.mskhu AND p.sophong='$sophong'";
			$result = pg_query($sql) or die();
			while ($line = pg_fetch_row($result)){
				$check=$line[0];
			}
			if($check==0) header("location: quanly_falsecp.php?false=false6");
			else{
				$sql = "SELECT p.sophong FROM phong p INNER JOIN phieudangky pdk ON p.msphong = pdk.msphong INNER JOIN canboquanly c ON p.mskhu = c.mskhu WHERE pdk.mssv = $mssv AND kyo = $kyo AND c.uscb = '$Username' AND pdk.trangthaidk!='that bai'";
				$result = pg_query($sql) or die('a: '. pg_last_error());
				while ($line = pg_fetch_row($result)){
					$sp_cur=$line[0];
				}
				if($sp_cur==$sophong) header("location: quanly_falsecp.php?false=false4");
				else{
					$sql = "SELECT p.sncur, p.snmax FROM phong p INNER JOIN canboquanly c ON p.mskhu = c.mskhu WHERE c.uscb = '$Username' AND p.sophong = $sophong";
						$result = pg_query($sql) or die('Query failed: '. pg_last_error());
					while ($line = pg_fetch_row($result)){
						$sncur=$line[0];
						$snmax=$line[1];
					}
					if($sncur>=$snmax) header("location: quanly_falsecp.php?false=false3");
					else{
						$sql = "SELECT s.gtsv, pdk.trangthaidk FROM sinhvien s INNER JOIN phieudangky pdk ON pdk.mssv = s.mssv INNER JOIN phong p ON p.msphong = pdk.msphong INNER JOIN canboquanly c ON p.mskhu = c.mskhu WHERE c.uscb = '$Username' AND pdk.kyo = $kyo AND s.mssv = $mssv";
						$result = pg_query($sql) or die('Query failed: '. pg_last_error());
						while ($line = pg_fetch_row($result)){
							$gioitinhsv=$line[0];
							$trangthaidk=$line[1];
						}
						$sql = "SELECT p.gioitinh, p.msphong FROM phong p INNER JOIN canboquanly c ON p.mskhu = c.mskhu WHERE c.uscb = '$Username' AND p.sophong = $sophong";
						$result = pg_query($sql) or die('Query failed: '.pg_last_error());
						while ($line = pg_fetch_row($result)){
							$gioitinhphong=$line[0];
							$msphong=$line[1];
						}
						if($gioitinhsv!=$gioitinhphong) header("location: quanly_falsecp.php?false=false2");
						else{
							if($trangthaidk == 'that bai' || $trangthaidk == 'cho xac nhan') header("location: quanly_falsecp.php?false=false1");
							else{
								if($sncur<$snmax AND $gioitinhsv==$gioitinhphong AND $trangthaidk == 'thanh cong'){
									$sql = "UPDATE phieudangky SET msphong = $msphong WHERE mssv = $mssv AND kyo=$kyo";
									$result = pg_query($sql) or die('Query failed: '.pg_last_error());
									include("../function/trainweb.php");
								}
					}
				}
			}
		}
	}		
}
		pg_free_result($result);
		pg_free_result($result1);
		pg_close($db);
?>
</body>
</html>