<?php
include_once PATH_LIB.'/article.php';
include_once PATH_LIB.'/genre.php';
$checked = ($new_film)? 'checked' : '';
//print_r($_POST);
Article::update($articles);

$get = $_GET['id'];
$articles = Article::getOne($get);

$genres = Genre::GetAll();
?>
<div id="admin-content">
    <div class="add_article" align="center">
	<h1>Изменить фильм</h1>
	<form action="" method="POST" enctype='multipart/form-data'>
	<table>
		<?php
		if (is_array($articles) && (count($articles) > 0)){
			foreach ($articles as $article) {
		?>
		<tr>
			<td class="admin_edit"><label for="title">Название фильма:</label></td>
			<td><input type="text" name="title" value="<?=$article->title()?>" />
			    <input type="hidden" name="id" value="<?=$article->id()?>" />
			</td>
			
		</tr>
		<tr>
			<td class="admin_edit"><label for="new_film">Добавить в новинки</label></td>
			<td><input type="checkbox" '.$checked.' name="new_film" value="<?=$article->new_film()?>"/></td>
		</tr>		
		<tr>
			<td class="admin_edit"><label for="intro_text">Краткое описание:</label></td>
			<td><textarea rows="10" cols="50" name="intro_text"><?=$article->intro_text()?></textarea></td>
		</tr>
		<tr>
			<td class="admin_edit"><label for="full_text">Описание:</label></td>
			<td><textarea rows="10" cols="50" name="full_text"><?=$article->full_text()?></textarea></td>
		</tr>
		<tr>
			<td class="admin_edit"><label for="producer">Режиссер:</label></td>
			<td><input type="text" id="producer" name="producer" value="<?=$article->producer()?>" /></td>
		</tr>
		<tr>
			<td class="admin_edit"><label for="roles">В главных ролях:</label></td>
			<td><textarea rows="5" cols="50" name="roles"><?=$article->roles()?></textarea></td>
		</tr>
		<tr> 
			<td class="admin_edit"><label for="year">Год:</label></td>
			<td><input type="text" name="year" value="<?=$article->year()?>" /></td>
		</tr>
	<?php 
		if (is_array($genres) && (count($genres) > 0)){
			foreach ($genres as $genre) {
	?>
		<tr>
			<td class="admin_edit"><label for="add_genre"><?=$genre->name()?></label></td>
			<td><input type="checkbox" name="genre[]" value="<?=$genre->id()?>"
				<?=($article->hasGenre($genre->id()) ? 'checked="1"' : '')?>/></td>
		</tr>
	<?php
	
			}
		}
	?>
		<tr>
			<td class="admin_edit"><label for="country">Страна:</label></td>
			<td><input type="text" name="country" value="<?=$article->country()?>" /></td>
		</tr>
		<tr>
			<td class="admin_edit"><label for="time">Длительность:</label></td>
			<td><input type="time" name="time" value="<?=$article->time()?>" /></td>
		</tr>
		<tr>
			<td class="admin_edit"><label for="trailer">Трейлер:</label></td>
			<td><textarea rows="5" cols="50" id="trailer" name="trailer"><?=$article->trailer()?></textarea></td>
		</tr>
		<tr>
			<td class="admin_edit"><label for="film">Фильм:</label></td>
			<td><textarea rows="5" cols="50" id="film" name="film"><?=$article->film()?></textarea></td>
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
</div>
<div id="admin-sidebar">
		
</div>
<div id="admin-footer">		
			<?php
				require_once"../blocks/footer.php";
			?>
</div>
