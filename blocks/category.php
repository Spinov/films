<?php
include_once PATH_LIB.'/article.php';
include_once PATH_LIB.'/genre.php';


$articles = Article::getAllByCateg();
foreach ($articles as $article) {
?>
<div class="art">
	<a href="article.php?id=<?=$article->id();?>"><b><?=$article->title()?></b></a><br />
	<img src="<?=$article->uploadfile()?>" width="200" height="250" alt="<?=$article->title()?>" /><br />
	<sup><?=$article->date()?></sup>
	<sup>Год: <?=$article->year()?></sup>
	
</div>
<?php
	}
?>