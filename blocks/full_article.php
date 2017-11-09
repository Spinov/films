<?php
include_once PATH_LIB.'/article.php';
include_once PATH_LIB.'/genre.php';

$get = $_GET['id'];

$genres = Genre::getAllCateg($get);
$articles = Article::getOne($get);

foreach ($articles as $article) {
?>
<div id ="full_art">
    <table>
	<tr>
	    <td width="250">
		<p>
		    <img src="<?=$article->uploadfile()?>" width="200" height="250" alt="<?=$article->title()?>" />
		</p>
	    </td>
	    <td>
		<h2><?=$article->title()?></h2>
		<p>Год: <?=$article->year()?></p>
		<p>Страна: <?=$article->country()?></p>
		<p>Жанр:
		    <?php
			if (is_array($genres)){
			foreach ($genres as $genre) {
		    ?>
			<a href="categ.php?categ_id=<?=$genre->name();?>"><?=$genre->id()?></a>
		    <?php
			}
		    }
		    ?>
		<p>Продолжительность: <?=$article->time()?></p>
		<p>Режиссер: <?=$article->producer()?></p>
		<p>В главных ролях: <?=$article->roles()?></p>
		<br />
	    </td>
	</tr>
	<tr>
	    <td colspan="2">
		<?=$article->full_text()?>
	    </td>
	</tr>
	<tr>
	    <td colspan="2">
		<p><?=$article->trailer()?></p>
		<p><?=$article->film()?></p>
		<hr />
	    </td>
	</tr>
    </table>
</div>
<?php
    require_once "blocks/comment.php";
}
?>