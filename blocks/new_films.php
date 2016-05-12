<?php
include_once PATH_LIB.'/article.php';
include_once PATH_LIB.'/genre.php';


$articles = Article::getAllNew();
foreach ($articles as $article) {
?>
<div class="art">
	<table>
		<tr><td><a href="article.php?id=<?=$article->id();?>"><img src="<?=$article->uploadfile()?>" width="200" height="250" alt="<?=$article->title()?>" /></a><br />
		<a href="article.php?id=<?=$article->id();?>"><b><?=$article->title()?></b></a><br />
		<sup><?=$article->date()?></sup>
		<sup>Год: <?=$article->year()?></sup></td></tr>
	</table>
	
</div>
<?php
	}
?>