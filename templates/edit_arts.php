<?php
include_once PATH_LIB.'/article.php';
include_once PATH_LIB.'/genre.php';
$checked = ($new_film)? 'checked' : '';
print_r($_POST);
Article::update($articles);

$get = $_GET['id'];
$articles = Article::getOne($get);

$genres = Genre::GetAll();
?>
<div class="add_article" align="center">
<h1>Изменить фильм</h1>
	<form action="" method="POST" enctype='multipart/form-data'>
	<table border="1" width="95%">
		<?php
		if (is_array($articles) && (count($articles) > 0)){
			foreach ($articles as $article) {
		?>
		<tr>
			<td align = "right"><label for="title">Название фильма:</label></td>
			<td><input type="text" name="title" value="<?=$article->title()?>" /></td>
			<input type="hidden" name="id" value="<?=$article->id()?>" />
		</tr>
		<tr>
			<td align = "right"><label for="new_film">Добавить в новинки</label></td>
			<td><input type="checkbox" '.$checked.' name="new_film" value="<?=$article->new_film()?>"/></td>
		</tr>		
		<tr>
			<td align = "right"><label for="intro_text">Краткое описание:</label></td>
			<td><textarea rows="15" cols="75" name="intro_text"><?=$article->intro_text()?></textarea></td>
		</tr>
		<tr>
			<td align = "right"><label for="full_text">Описание:</label></td>
			<td><textarea rows="15" cols="75" name="full_text"><?=$article->full_text()?></textarea></td>
		</tr>
		<tr>
			<td align = "right"><label for="producer">Режиссер:</label></td>
			<td><input type="text" id="producer" name="producer" value="<?=$article->producer()?>" /></td>
		</tr>
		<tr>
			<td align = "right"><label for="roles">В главных ролях:</label></td>
			<td><textarea rows="5" cols="75" name="roles"><?=$article->roles()?></textarea></td>
		</tr>
		<tr> 
			<td align="right"><label for="year">Год:</label></td>
			<td><input type="text" name="year" value="<?=$article->year()?>" /></td>
		</tr>
	<?php 
		if (is_array($genres) && (count($genres) > 0)){
			foreach ($genres as $genre) {
	?>
		<tr>
			<td align="right"><label for="add_genre"><?=$genre->name()?></label></td>
			<td><input type="checkbox" name="genre[]" value="<?=$genre->id()?>"
				<?=($article->hasGenre($genre->id()) ? 'checked="1"' : '')?>/></td>
		</tr>
	<?php
	
			}
		}
	?>
		<tr>
			<td align="right"><label for="country">Страна:</label></td>
			<td><input type="text" name="country" value="<?=$article->country()?>" /></td>
		</tr>
		<tr>
			<td align="right"><label for="time">Длительность:</label></td>
			<td><input type="time" name="time" value="<?=$article->time()?>" /></td>
		</tr>
		<tr>
			<td align = "right"><label for="trailer">Трейлер:</label></td>
			<td><textarea rows="5" cols="75" id="trailer" name="trailer"><?=$article->trailer()?></textarea></td>
		</tr>
		<tr>
			<td align = "right"><label for="film">Фильм:</label></td>
			<td><textarea rows="5" cols="75" id="film" name="film"><?=$article->film()?></textarea></td>
		</tr>
		<tr>
			<td colspan="2" align="right"><input type="submit" name="art_chen" value="Изменить фильм!"/></td>
		</tr>	
	</table>
	</form>
</div>
 <?php
			}
	}
?>