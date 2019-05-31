<?php 
      $mssv = $_GET["mssv"];
      include("../php/datetime.php");
      $kyo=kyo2();
      $dbconn = pg_connect("host=localhost dbname=ktx user=postgres password=nguyenhung6256") or die('Could not connect: '. pg_last_error());
      $sql = "SELECT phong.msphong,phong.sncur,phong.sophong FROM phong,phieudangky pdk WHERE phong.msphong=pdk.msphong AND pdk.mssv='$mssv' AND pdk.kyo='$kyo'";
      $result = pg_query($sql) or die('Query failed: '. pg_last_error());
      while ($line = pg_fetch_row($result)) {
            $msphong=$line[0];
            $sncur=$line[1]-1;
            $sophong=$line[2];
      }
      $result = pg_query($sql);     
      $sql = "UPDATE phong SET sncur='$sncur' WHERE msphong='$msphong'";
      $result = pg_query($sql);
      $sql = "UPDATE phieudangky SET trangthaidk = 'that bai', ngayduyet = CURRENT_DATE WHERE mssv = '$mssv' and kyo = '$kyo'";
      $result = pg_query($sql);
      pg_free_result($result);
      pg_close($dbconn);
      header("location: quanly_ql1phong.php?sophong=$sophong");
?>