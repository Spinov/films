<?php
include_once PATH_LIB.'/article.php';
include_once PATH_LIB.'/genre.php';

Article::del();

$articles = Article::getAll();
?>
<form action="" method="POST">
<table border="1" width="90%" align="center">
	<tr>
<!--	<th>id</th>  -->
		<th>Новинки</th>
		<th>Название</th>
		<th>Постер</th>
		<th>Часть описания</th>
		<th>Полное описание</th>
		<th>Год</th>
		<th>Страна</th>
		<th>Продолжительность</th>
		<th>Действия</th>
	</tr>
	<?php
	if (is_array($articles) && (count($articles) > 0)){
			foreach ($articles as $article) {
	?>
	<tr  align="center">
<!--	<td><?=$article->id()?></td>	-->
		<td><?=$article->new_film()?></td>
		<td><b><?=$article->title()?></b></td>
		<td><img src="<?=$article->uploadfile()?>" width="200" height="250" alt="<?=$article->title()?>" /></td>
		<td><?=$article->intro_text()?></td>
		<td><?=$article->full_text()?></td>
		<td><?=$article->year()?></td>
		<td><?=$article->country()?></td>
		<td><?=$article->time()?></td>
		<td colspan="9" align="right"><a href="edit_art.php?id=<?=$article->id();?>">Изменить</a><br /><br />
		<p>del<input type="checkbox" name="del[]" value="<?=$article->id()?>" /></p></td>
	</tr>
	<?php
		}
}
	?>
	<tr>
		<td colspan="9" align="right"><a href="add_article.php">Добавить</a>
		<input type="submit" name="okdel" value="Удалить"/></td>
	</tr>
</table>
</form>

