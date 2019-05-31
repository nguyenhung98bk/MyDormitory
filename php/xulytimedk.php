<?php
	function thang_o(){
		$date = getdate(); 
		$thang=$date['mon'];
		if($thang<7){
			$thang_o=7-$thang;
		}
		else $thang_o=12-$thang+1;
		return $thang_o;
	}
?>
