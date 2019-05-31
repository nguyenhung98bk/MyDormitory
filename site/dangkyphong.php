
<?php 
      $msphong= $_GET["msphong"];
      include("../php/datetime.php");
      $kyo=kyo2();
      session_start();
      $Username=$_SESSION['Username'];
      $ngayhomnay = date("Y-m-d");
      include("../php/xulytimedk.php");
      $thang_o=thang_o();
      $dbconn = pg_connect("host=localhost dbname=ktx user=postgres password=nguyenhung6256") or die('Could not connect: '. pg_last_error());
      $sql = "SELECT sncur,snmax FROM phong Where msphong='$msphong'";
    $result = pg_query($sql) or die('Query failed: '. pg_last_error());
    while ($line = pg_fetch_row($result)){
      $sncur=$line[0];
      $snmax=$line[1];
    }
    if($sncur>=$snmax) header("location: student_falsedk.php?false=false3");
    else{
    $sql = "SELECT * FROM sinhvien Where ussv='$Username'";
    $result = pg_query($sql) or die('Query failed: '. pg_last_error());
    while ($line = pg_fetch_row($result)){
        $mssv=$line[0];
        $gioitinhsv=$line[3];
    }
    $sql = "SELECT phong.gioitinh,khuktx.giaphong FROM khuktx,phong Where khuktx.mskhu=phong.mskhu
          and phong.msphong='$msphong'";
    $result = pg_query($sql) or die('Query failed: '. pg_last_error());
    while ($line = pg_fetch_row($result)){
        $gioitinhkhu=$line[0];
        $giaphong=$line[1];
    }
    if($gioitinhkhu!=$gioitinhsv){
      header("location: student_falsedk.php?false=false1");
    }
    else{
    $sql = "SELECT * FROM phieudangky";
    $result = pg_query($sql) or die('Query failed: '. pg_last_error());
    while ($line = pg_fetch_row($result)){
        if($line[2]==$kyo&&$line[1]==$mssv&&($line[3]=='thanh cong'||$line[3]=='cho xac nhan')){
          header("location: student_falsedk.php?false=false2");
          $check=1;
        }
        if($line[2]==$kyo&&$line[1]==$mssv&&$line[3]=='that bai'){
          $tien_o=$giaphong*$thang_o;
          $sql = "SELECT phong.msphong,phong.sncur FROM phong,phieudangky pdk WHERE phong.msphong=pdk.msphong AND pdk.mssv='$mssv'";
          $result = pg_query($sql) or die('Query failed: '. pg_last_error());
          while ($line = pg_fetch_row($result)) {
              $msphong=$line[0];
              $sncur=$line[1]+1;
      }
      $result = pg_query($sql);     
      $sql = "UPDATE phong SET sncur='$sncur' WHERE msphong='$msphong'";
      $result = pg_query($sql);
          $sql ="UPDATE phieudangky SET ngaydk='$ngayhomnay',trangthaidk='cho xac nhan',ngayduyet=null,lephi='$tien_o',mscb=null, msphong='$msphong' WHERE mssv='$mssv' AND kyo='$kyo'";
          $result = pg_query($sql);
          $check=1;
          header("location: student_xemdangky.php");
        }
    }
    if($check!=1){
      $tien_o=$giaphong*$thang_o;
    $sql = "INSERT into phieudangky values('$msphong','$mssv','$kyo','cho xac nhan','$ngayhomnay',null,'$tien_o')";
    $result = pg_query($sql);
    header("location: student_xemdangky.php");
  }
}
}
    pg_free_result($result);
    pg_close($db);
?>