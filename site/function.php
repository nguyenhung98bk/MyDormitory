<?php 
	function name(){
    	session_start();
    	$Username=$_SESSION['Username'];
    	if($Username==null) header("Location: login.php");
    	include("../function/student_trangchu.php");
    	$name=layten($Username);
    	echo $name;
	}
        function namecb(){
        session_start();
        $Username=$_SESSION['Username'];
        if($Username==null) header("Location: login.php");
        include("../function/quanly_trangchu.php");
        $name=layten($Username);
        echo $name;
    }
	function checklogin(){
		session_start();
        $Username=$_SESSION['Username'];
        $Ltk=$_SESSION['Ltk'];
        if($Username!=null&&$Ltk=='sinhvien') header("Location: student_trangchu.php");
        if($Username!=null&&$Ltk=='quanly') header("Location: quanly.php");
        if($Username!=null&&$Ltk=='admin') header("Location: admin.php");
	}
    function checklogin2(){
        session_start();
        $Username=$_SESSION['Username'];
        $Ltk=$_SESSION['Ltk'];
        if($Ltk!='sinhvien') {
            session_start();
            session_destroy();
            header('location: ../index.php');
        }
    }
    function checklogin3(){
        session_start();
        $Username=$_SESSION['Username'];
        $Ltk=$_SESSION['Ltk'];
        if($Ltk!='quanly') {
            session_start();
            session_destroy();
            header('location: ../index.php');
        }
    }
    function checklogin4(){
        session_start();
        $Username=$_SESSION['Username'];
        $Ltk=$_SESSION['Ltk'];
        if($Ltk!='admin') {
            session_start();
            session_destroy();
            header('location: ../index.php');
        }
    }
?>