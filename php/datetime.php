<?php 
	function kyo(){
		$ngayhomnay = date("Y-m-d");
		if(strtotime($ngayhomnay)>=strtotime("2018/7/1")&&strtotime($ngayhomnay)<strtotime("2019/1/1"))
			echo '20181';
		if(strtotime($ngayhomnay)>=strtotime("2019/1/1")&&strtotime($ngayhomnay)<strtotime("2019/7/1"))
			echo '20182';
		if(strtotime($ngayhomnay)>=strtotime("2019/7/1")&&strtotime($ngayhomnay)<strtotime("2020/1/1"))
			echo '20191';
		if(strtotime($ngayhomnay)>=strtotime("2020/1/1")&&strtotime($ngayhomnay)<strtotime("2020/7/1"))
			echo '20192';
		if(strtotime($ngayhomnay)>=strtotime("2020/7/1")&&strtotime($ngayhomnay)<strtotime("2021/1/1"))
			echo '20201';
		if(strtotime($ngayhomnay)>=strtotime("2021/1/1")&&strtotime($ngayhomnay)<strtotime("2021/7/1"))
			echo '20202';
		if(strtotime($ngayhomnay)>=strtotime("2021/7/1")&&strtotime($ngayhomnay)<strtotime("2022/1/1"))
			echo '20211';
		if(strtotime($ngayhomnay)>=strtotime("2022/1/1")&&strtotime($ngayhomnay)<strtotime("2022/7/1"))
			echo '20212';
		if(strtotime($ngayhomnay)>=strtotime("2022/7/1")&&strtotime($ngayhomnay)<strtotime("2023/1/1"))
			echo '20221';
		if(strtotime($ngayhomnay)>=strtotime("2023/1/1")&&strtotime($ngayhomnay)<strtotime("2023/7/1"))
			echo '20222';
	}
	function kyo2(){
		$ngayhomnay = date("Y-m-d");
		if(strtotime($ngayhomnay)>=strtotime("2018/7/1")&&strtotime($ngayhomnay)<strtotime("2019/1/1"))
			return '20181';
		if(strtotime($ngayhomnay)>=strtotime("2019/1/1")&&strtotime($ngayhomnay)<strtotime("2019/7/1"))
			return '20182';
		if(strtotime($ngayhomnay)>=strtotime("2019/7/1")&&strtotime($ngayhomnay)<strtotime("2020/1/1"))
			return '20191';
		if(strtotime($ngayhomnay)>=strtotime("2020/1/1")&&strtotime($ngayhomnay)<strtotime("2020/7/1"))
			return '20192';
		if(strtotime($ngayhomnay)>=strtotime("2020/7/1")&&strtotime($ngayhomnay)<strtotime("2021/1/1"))
			return '20201';
		if(strtotime($ngayhomnay)>=strtotime("2021/1/1")&&strtotime($ngayhomnay)<strtotime("2021/7/1"))
			return '20202';
		if(strtotime($ngayhomnay)>=strtotime("2021/7/1")&&strtotime($ngayhomnay)<strtotime("2022/1/1"))
			return '20211';
		if(strtotime($ngayhomnay)>=strtotime("2022/1/1")&&strtotime($ngayhomnay)<strtotime("2022/7/1"))
			return '20212';
		if(strtotime($ngayhomnay)>=strtotime("2022/7/1")&&strtotime($ngayhomnay)<strtotime("2023/1/1"))
			return '20221';
		if(strtotime($ngayhomnay)>=strtotime("2023/1/1")&&strtotime($ngayhomnay)<strtotime("2023/7/1"))
			return '20222';
	}
?>