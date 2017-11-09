<?php
include_once PATH_LIB.'/db.php';

class Article {

    private $id;
    private $new_film;
    private $title;
    private $uploadfile;
    private $intro_text;
    private $full_text;
    private $year;
    private $country;
    private $time;
    private $date;
    private $producer;
    private $roles;
    private $trailer;
    private $film;
    private $genres;

    public function id() { return $this->id; }
    public function new_film() { return $this->new_film; }
    public function title() { return $this->title; }
    public function uploadfile() { return $this->uploadfile;}
    public function intro_text() { return $this->intro_text; }
    public function full_text() { return $this->full_text; }
    public function year(){ return $this->year; }
    public function country() { return $this->country; }
    public function time() { return $this->time; }
    public function date() { return $this->date; }
    public function producer() { return $this->producer; }
    public function roles() { return $this->roles; }
    public function trailer() { return $this->trailer; }
    public function film() { return $this->film; }
    public function genres(){ return $this->genres; }

    public function __construct($id, $new_film, $title, $uploadfile, $intro_text, $full_text, $year, $country,
							    $time, $date, $producer, $roles, $trailer, $film, $genres='') {
	$this->id = $id;
	$this->new_film = $new_film;
	$this->title = $title;
	$this->uploadfile = $uploadfile;
	$this->intro_text = $intro_text;
	$this->full_text = $full_text;
	$this->year = $year;
	$this->country = $country;
	$this->time = $time;
	$this->date = $date;
	$this->producer = $producer;
	$this->roles = $roles;
	$this->trailer = $trailer;
	$this->film = $film;
	$this->genres = $genres;
    }

    public function hasGenre($gid) {
	if (is_array($this->genres)){
		foreach ($this->genres as $gen){
			if ($gen['id'] == $gid){
				return TRUE;
			}
		}
	}
	return FALSE;
    }

    public static function getAll() {
	global $db;
	$query = "SELECT * FROM articles ORDER BY id";
	$articleArr = $db->query($query);
	if (is_array($articleArr)) {
	    $articles = array();
	    foreach ($articleArr as $article) {
		    $articles[] = new Article ($article['id'], $article['new_film'], $article['title'], $article['posters'],
						$article['intro_text'],	$article['full_text'], $article['year'],
						$article['country'], $article['time'], $article['date'], $article['producer'],
						$article['roles'], $article['trailer'], $article['film']);
	    }
	    return (count($articles) > 0) ? $articles : FALSE; 
	}
	return FALSE;
    }
 
    public static function getOne($id)	{
	global $db;
	$query = 'SELECT g.id, g.name FROM categories AS g'.
		' INNER JOIN category_articles AS ca ON g.id=ca.categ_id'.
		" WHERE ca.art_id = '$id'";

	$genres = $db->query($query);

	$query = "SELECT * FROM articles WHERE id = '$id'";
	$articleArr = $db->query($query);
	if (is_array($articleArr)) {
	    $articles = array();
	    foreach ($articleArr as $article) {
		    $articles[] = new Article ($article['id'], $article['new_film'], $article['title'], $article['posters'],
						$article['intro_text'],	$article['full_text'], $article['year'],
						$article['country'], $article['time'], $article['date'], $article['producer'],
						$article['roles'], $article['trailer'], $article['film'], $genres);
	    }
	    return (count($articles) > 0) ? $articles : FALSE; 
	}
	return FALSE;
    }

    public static function getAllNew(){
	global $db;
	$query = "SELECT * FROM articles WHERE new_film=1";
	$articleArr = $db->query($query);
	if (is_array($articleArr)) {
	    $articles = array();
	    foreach ($articleArr as $article) {
		    $articles[] = new Article ($article['id'], $article['new_film'], $article['title'], $article['posters'],
						$article['intro_text'],	$article['full_text'], $article['year'],
						$article['country'], $article['time'], $article['date'], $article['producer'],
						$article['roles'], $article['trailer'], $article['film']);
	    }
	    return (count($articles) > 0) ? $articles : FALSE; 
	}
	return FALSE;
    }

    public static function getAllByCateg(){
	    global $db;
	    $id = intval($_GET['categ_id']);
	    $query = "SELECT a.* FROM category_articles as ca"
		    . " INNER JOIN articles AS a ON ca.art_id = a.id"
		    . " WHERE ca.categ_id = '$id'";
	    $articleArr = $db->query($query);
	    if (is_array($articleArr)) {
		$articles = array();
		foreach ($articleArr as $article) {
		    $articles[] = new Article ($article['id'], $article['new_film'], $article['title'], $article['posters'],
						$article['intro_text'],	$article['full_text'], $article['year'],
						$article['country'], $article['time'], $article['date'], $article['producer'],
						$article['roles'], $article['trailer'], $article['film']);
		}
		return (count($articles) > 0) ? $articles : FALSE; 
	    }
	    return FALSE;
    }

    public static function getNames() {
	global $db;
	$query = "SELECT * FROM articles ORDER BY name";
	$articleArr = $db->query($query);
	if (is_array($articleArr)) {
	    $article = array();
	    foreach ($articleArr as $article) {
		    $articles[$article['id']] = $article['name'];
	    }
	    return (count($articles) > 0) ? $articles : FALSE; 
	}
	return FALSE;
    }

    public static function insert($articles) {
	global $db;
	if ($_POST) {
	    $pic_weight = 3000;
	    $pic_height = 3000;

	    if (isset($_FILES)) {
		foreach ($_FILES['file']['name'] as $k => $v) {
		    $uploaddir = "../uploads/";
		    $md = md5($_POST['title']);
		    $apend = $md . '.jpeg';
		    $uploadfile = "$uploaddir$apend";

		    if ($_FILES['file']['type'][$k] == "image/gif" || $_FILES['file']['type'][$k] == "image/png" ||
			$_FILES['file']['type'][$k] == "image/jpg" || $_FILES['file']['type'][$k] == "image/jpeg") {
			//черный список типов файлов
			$blacklist = array(".php", ".phtml", ".php3", ".php4");
			foreach ($blacklist as $item) {
			    if (preg_match("/$item\$/i", $_FILES['file']['name'][$k])) {
				echo "Нельзя загружать скрипты.";
				exit;
			    }
			}
			if (move_uploaded_file($_FILES['file']['tmp_name'][$k], $uploadfile)) {
			    $size = getimagesize($uploadfile);
			    if ($size[0] < $pic_weight && $size[1] < $pic_height) {
				echo "<center><br>Файл ($uploadfile) загружен.</center>";
			    } else {
				echo "<center><br>Размер пикселей превышает допустимые нормы.</center>";
				unlink($uploadfile);
			    }
			} else
			    echo "<center><br>Файл не загружен, вернитесь и попробуйте еще раз.</center>";
		    } else
			echo "<center><br>Можно загружать только изображения в форматах jpg, jpeg, gif и png.</center>";
		}
	    }
	}
	$art_id = $_GET['id'];
	$new_film = $_POST['new_film'];
	$title = $_POST['title'];
	$intro_text = $_POST['intro_text'];
	$full_text = $_POST['full_text'];
	$year = $_POST['year'];
	$genre = array(isset($_POST['add_genre']));
	$country = $_POST['country'];
	$time = $_POST['time'];
	$date = date("d.m.Y", time());
	$producer = $_POST['producer'];
	$roles = $_POST['roles'];
	$trailer = $_POST['trailer'];
	$film = $_POST['film'];
	if (($title & $intro_text & $full_text & $country & $year) != '') {
	    if (intval($year)) {
		$query = "INSERT INTO articles (new_film, title, posters, intro_text, full_text, year, country, time, date,"
			. " producer, roles, trailer, film) VALUES "
			. "('$new_film', '$title', '$uploadfile', '$intro_text', '$full_text', '$year', '$country', '$time',"
			. " '$date', '$producer', '$roles', '$trailer', '$film')";
		$db->query($query, FALSE);

		foreach ($genre as $categ_id) {
		    $query = "INSERT INTO category_articles (art_id, categ_id) VALUES ('$art_id', '$categ_id')";
		    $db->query($query, FALSE);
		}
	    } else
		echo '<p id="error">Error!</p>';
	}
    }

    public static function del() {
	global $db;
	    if (isset($_POST['del']) && isset($_POST['okdel'])){
		$artDel = $_POST['del'];
		$query = "DELETE FROM articles WHERE id IN ('".implode("','", $artDel)."')"; 
		$db->query($query, FALSE);
	    }
    }	

    public static function update() {
	global $db;
	$id = intval($_GET['id']);
	$new_film = (isset($_POST['new_film']))? 1 : 0;
	$title = $_POST['title'];
	$intro_text = $_POST['intro_text'];
	$full_text = $_POST['full_text'];
	$year = $_POST['year'];
	$country = $_POST['country'];
	$time = $_POST['time'];
	$producer = $_POST['producer'];
	$roles = $_POST['roles'];
	$trailer = $_POST['trailer'];
	$film = $_POST['film'];
	$genre = $_POST['genre'];
	if (($title & $intro_text & $full_text & $country & $year) != ''){
	    if (intval($year)){
		$query = "UPDATE articles SET new_film = '$new_film', title = '$title', intro_text = '$intro_text',"
			. " full_text = '$full_text', year = '$year', country = '$country', time = '$time', producer = '$producer',"
			. "roles = '$roles', trailer = '$trailer', film = '$film' WHERE id = '$id'";
		$db->query($query, FALSE);
		$query = "DELETE FROM category_articles WHERE art_id = '$id'";
		echo $query;
		$db->query($query, FALSE);
		if (isset($genre) && is_array($genre) && (count($genre) > 0)) {
		    $q_val = array();
		    foreach ($genre as $gen){
			$q_val[] = "($id, ". intval($gen).')';
		    }
		    $query = "INSERT INTO category_articles (art_id, categ_id) VALUES ".implode(', ', $q_val);
		    echo $query;
		    $db->query($query, FALSE);
		}
	    }
	}
    }
}


Class Comment {
	
    private $id;
    private $art_id;
    private $name;
    private $comment;
    private $date;


    public function id() { return $this->id; }
    public function art_id() { return $this->art_id; }
    public function name() { return $this->name; }
    public function comment() { return $this->comment; }
    public function date() { return $this->date; }

    public function __construct($id, $art_id, $name, $comment, $date) {
	$this->id = $id;
	$this->art_id = $art_id;
	$this->name = $name;
	$this->comment = $comment;
	$this->date = $date;
    }


    public static function GetComment($get){
	global $db;
	$art_id = $_GET['id'];
	$query = "SELECT * FROM comments WHERE art_id = '$art_id'";
	$commentArr = $db->query($query);
	if (is_array($commentArr)) {
	    $comments = array();
	    foreach ($commentArr as $comment) {
		$comments[] = new Comment($comment['id'], $comment['art_id'], $comment['name'],
					    $comment['comment'], $comment['date'], $comment['avatar']);
	    }
	    return (count($comments) > 0) ? $comments : FALSE; 
	}
	return FALSE;
    }

    public static function AddComment($comments){
	global $db;
	$art_id = $_GET['id'];
	$name = htmlspecialchars($_POST['name']);
	$comment = htmlspecialchars($_POST['comment']);
	$date = date("d.m.Y", time());
	if ($_POST) {
	    $query = "INSERT INTO comments (art_id, name, comment, date) VALUES ('$art_id', '$name', '$comment', '$date')";
	$db->query($query, FALSE);
	}
    }
}