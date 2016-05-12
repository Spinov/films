<?php
include_once PATH_LIB.'/db.php';

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
		$this->name = $title;
		$this->id = $name;
		$this->id = $art_id;
		$this->name = $categ_id;
		
		
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
				$ArtCategs[] = new ArtCateg($ArtCateg['article.title'], $ArtCateg['categories.name']);
			}
			return (count($ArtCategs) > 0) ? $ArtCategs : FALSE; 
		}
		return FALSE;
}
	
}