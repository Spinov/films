<?php
include_once PATH_LIB.'/db.php';


class Genre {
	private $id;
	private $name;
	
	
	public function id() { return $this->id; }
	public function name() { return $this->name; }
	
	public function __construct($name, $id=FALSE) {
		$this->id = $id;
		$this->name = $name;
		
		
	}
	
	public static function getAll() {
		global $db;
		$query = "SELECT * FROM categories ORDER BY name";
		$genreArr = $db->query($query);
		if (is_array($genreArr)) {
			$genres = array();
			foreach ($genreArr as $genre) {
				$genres[] = new Genre($genre['name'], $genre['id']);
			}
			return (count($genres) > 0) ? $genres : FALSE; 
		}
		return FALSE;
	}
	
	public static function getNames() {
		global $db;
		$query = "SELECT * FROM categories ORDER BY name";
		$genreArr = $db->query($query);
		if (is_array($genreArr)) {
			$genres = array();
			foreach ($genreArr as $genre) {
				$genres[$genre['id']] = $genre['name'];
			}
			return (count($genres) > 0) ? $genres : FALSE; 
		}
		return FALSE;
	}
	
	public static function insert($genres) {
		global $db;
		$query = '';
		foreach ($genres as $genre) {
			$query .= (($query != '') ? ', ' : '')."('".$db->escape($genre->name())."')";
		}
		if ($query != ''){
			$query = "INSERT INTO categories (name) VALUES ".$query;
			$db->query($query, FALSE);
		}
	}
	
	public static function update($genres) {
		global $db;
		$names = Genre::getNames();
		foreach ($genres as $genre) {
			if ($genre->name() != $names[$genre->id()]){
				$query = 'UPDATE categories SET name = \''.$db->escape($genre->name()).
					'\' WHERE id ='.intval($genre->id());
				$db->query($query, FALSE);
			}
		}		
	}
	
	public static function del($genres) {
		global $db;
			if (isset($_POST['del']) && isset($_POST['add'])){
				$genresDel = $_POST['del'];
				$query = "DELETE FROM categories WHERE id IN ('".implode("','", $genresDel)."')"; 
				$db->query($query, FALSE);
			}
	}
}


class ArtCateg {
	private $id;
	private $title;
	private $name;
	private $art_id;
	private $categ_id;
	
	
	
	public function id() { return $this->id; }
	public function title() { return $this->title; }
	public function name() { return $this->name; }
	public function art_id() { return $this->art_id; }
	public function categ_id() { return $this->categ_id; }
	
	public function __construct($id, $title, $name, $art_id, $categ_id) {
		$this->id = $id;
		$this->title = $title;
		$this->name = $name;
		$this->art_id = $art_id;
		$this->categ_id = $categ_id;
		
		
	}
	
	public static function GetArtCateg() {
		global $db;
		$query = "SELECT article.title, GROUP_CONCAT(categories.name) FROM article
				INNER JOIN category_articles ON article.id = category_articles.art_id
				LEFT JOIN categories ON category_articles.categ_id = categories.id
				GROUP BY article.title";
		$ArtCategArr = $db->query($query);
		if (is_array($ArtCategArr)) {
			$ArtCategs = array();
			foreach ($ArtCategArr as $ArtCateg) {
				$ArtCategs[] = new ArtCateg($ArtCateg['title'], $ArtCateg['name']);
			}
			return (count($ArtCategs) > 0) ? $ArtCategs : FALSE; 
		}
		return FALSE;
		print_r($ArtCateg);
}
	
}