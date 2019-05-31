<?php 
      $mssv = $_GET["mssv"];
      $mscb = $_GET["mscb"];
      include("../php/datetime.php");
      $kyo=kyo2();
      $dbconn = pg_connect("host=localhost dbname=ktx user=postgres password=nguyenhung6256") or die('Could not connect: '. pg_last_error());
      $sql = "UPDATE phieudangky SET trangthaidk = 'thanh cong', ngayduyet = CURRENT_DATE, mscb = $mscb WHERE mssv = $mssv and kyo = $kyo";
      $result = pg_query($sql);
      pg_free_result($result);
      pg_close($dbconn);
      header("location: quanly_duyetpdk.php");
?>