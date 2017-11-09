<?php
	$mysqli = false;
	function connectDB(){
		global $mysqli;
		$mysqli = new mysqli("localhost", "root", "", "13films");
		$mysqli->query("SET NAMES 'utf8'");
	}
	
	function getAllBanners(){
		return getAll("banners");
	}
	
	function getAll($table){
		global $mysqli;
		connectDB();
		$result_set = $mysqli->query("SELECT * FROM `$table`");
		closeDB();
		return resultSetToArray($result_set);
	}
	
	function resultSetToArray($result_set){
		$array = array();
		while (($row = $result_set->fetch_assoc()) != false)
			$array[] = $row;
		return $array; 
	}
	
	function closeDB(){
		global $mysqli;
		$mysqli->close();
	}
?>