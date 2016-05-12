<?php
include_once PATH_LIB.'/article.php';
include_once PATH_LIB.'/genre.php';

$get = $_GET['id'];
$articles = Article::getOne($get);
foreach ($articles as $article) {
?>

<div class="article">
	<div class="logo">
		<p class="article_img">
			<img src="<?=$article->uploadfile()?>" width="200" height="250" alt="<?=$article->title()?>" />
		</p>
	</div>
		<h1><?=$article->title()?></h1>
	<div class="genre">	
		<p>Год: <?=$article->year()?></p>
		<p>Страна: <?=$article->country()?></p>
		<p>Жанр: </p>
		<p>Продолжительность: <?=$article->time()?></p>
		<p>Режиссер: <?=$article->producer()?></p>
		<p>В главных ролях: <?=$article->roles()?></p>
		<br />
	</div>
	<div class="about_films">
		<?=$article->full_text()?>
	</div>
		<p><?=$article->trailer()?></p>
		<p><?=$article->film()?></p>
		<hr />
	<?php
		require_once "blocks/comment.php";
}
	?>
</div>
