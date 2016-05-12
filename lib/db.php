<?php
class Db {
	private $conn;
	
	public function __construct($host, $user, $pass, $base) {
		$this->conn = new mysqli($host, $user, $pass, $base);
	}
	
	public function query($query, $withStore=TRUE) {
		if ($this->conn === FALSE)
			return FALSE;

		$res = $this->conn->query($query);
		if ($withStore) {
			$array = array();
			while (($row = $res->fetch_assoc()) != false)
				$array[] = $row;
			return (count($array) > 0) ? $array : FALSE; 
		}
		return $res;
	}
	public function escape($str){
		if ($this->conn === FALSE)
			return $str;
		return $this->conn->real_escape_string($str);
	}
}

$db = new Db("localhost", "root", "", "13films");
