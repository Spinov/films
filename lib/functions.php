<?php
	$mysqli = false;
	function connectDB(){
		global $mysqli;
		$mysqli = new mysqli("localhost", "root", "", "13films");
		$mysqli->query("SET NAMES 'utf8'");
	}
	
	function getAllArticles(){
		return getAll("articles");
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
	
	function getAllNew(){
		global $mysqli;
		connectDB();
		$result_set = $mysqli->query("SELECT * FROM `articles` WHERE new_film=1");
		closeDB();
		return resultSetToArray($result_set);
	}
	
	
	function getAllComments(){
		return getAll("comments");
	}
	
	function addComment($name, $comment){
		global $mysqli;
		connectDB();
		$success = $mysqli->query("INSERT INTO `comments`(`name`, `comment`) VALUES('$name', '$comment')");
		closeDB();
		return $success;
	}

	function addUser($login, $email, $password){
		global $mysqli;
		connectDB();
		$success = $mysqli->query("INSERT INTO `users`(`login`, `email`, `password`) VALUES('$login', '$email', '$password')");
		closeDB();
		return $success;
	}
	
	function checkUser($login, $password){
		global $mysqli;
		connectDB();
		$result_set = $mysqli->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
		closeDB();
		if ($result_set->fetch_assoc()) return true;
		else return false;
	}
	
	function checkAdmin($login){
		global $mysqli;
		connectDB();
		$result_set = $mysqli->query("SELECT is_admin FROM `users` WHERE is_admin = 1");
		closeDB();
		if ($result_set->fetch_assoc()) return true;
		else return false;
	}
	
	
	function getArticle($id){
		global $mysqli;
		connectDB();
		$result_set = $mysqli->query("SELECT* FROM `articles` WHERE `id`='$id'");
		closeDB();
		return $result_set->fetch_assoc();
	}
	
		function addArticle($title, $poster, $year, $genre, $country, $time, $intro_text, $full_text, $biographies, $action ,
							$war, $detective, $documentaries, $drama, $historical, $comedy, $crime, $melodrama, $cartoons, $adventure,
							$russian, $family, $sport, $thriller, $horror, $fantastic){
		global $mysqli;
		connectDB();
		$success = $mysqli->query("INSERT INTO `articles`(`title`, `poster`, `year`, `genre`, `country`, `time`, `intro_text`,
								`full_text`, `biographies`, `action `,`war`, `detective`, `documentaries`, `drama`, `historical`,
								`comedy`, `crime`, `melodrama`, `cartoons`, `adventure`,`russian`, `family`, `sport`, `thriller`,
								`horror`, `fantastic`) 
							VALUES('$title', '$poster', '$year', '$genre', '$country', '$time', '$intro_text', '$full_text', '$biographies',
							'$action ','$war', '$detective', '$documentaries', '$drama', '$historical', '$comedy', '$crime', '$melodrama',
							'$cartoons', '$adventure', '$russian', '$family', '$sport', '$thriller', '$horror', '$fantastic')");
		closeDB();
		return $success;
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