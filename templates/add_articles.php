<?php
include_once PATH_LIB.'/article.php';
include_once PATH_LIB.'/genre.php';
$id = mysql_insert_id();
//print_r($id);
Article::insert($articles);

$genres = Genre::GetAll();

?>
<div id="admin-content">
    <div class="add_article" align="center">
    <h1>Добавить фильм</h1><br/>
	<form action="" method="POST" enctype='multipart/form-data'>
	<table>
		<tr>
			<td class="admin_edit"><label for="title">Название фильма:</label></td>
			<td><input type="text" id="title" name="title" required /></td>
		</tr>
		<tr>
			<td class="admin_edit"><label for="new_film">Добавить в новинки</label></td>
			<td><input type="checkbox" id="new_film" name="new_film" value="1"/></td>
		</tr>
		<tr>
			<td class="admin_edit"><label for="poster">Постер:</label></td>
			<td><input type="file" name="file[]" multiple='true'/></td>
		</tr>		
		<tr>
			<td class="admin_edit"><label for="intro_text">Краткое описание:</label></td>
			<td><textarea rows="10" cols="50" id="intro_text" name="intro_text" required></textarea></td>
		</tr>
		<tr>
			<td class="admin_edit"><label for="full_text">Описание:</label></td>
			<td><textarea rows="10" cols="50" id="full_text" name="full_text" required></textarea></td>
		</tr>
		<tr>
			<td class="admin_edit"><label for="producer">Режиссер:</label></td>
			<td><input type="text" id="producer" name="producer" required /></td>
		</tr>
		<tr>
			<td class="admin_edit"><label for="roles">В главных ролях:</label></td>
			<td><textarea rows="5" cols="50" id="roles" name="roles" required></textarea></td>
		</tr>
		<tr> 
			<td align="right"><label for="year">Год:</label></td>
			<td><input type="text" id="year" name="year" required /></td>
		</tr>
	<?php 
		if (is_array($genres) && (count($genres) > 0)){
			foreach ($genres as $genre) {
	?>
		<tr>
			<td align="right"><label for="add_genre[]"><?=$genre->name()?></label></td>
			<td><input type="checkbox" name="add_genre[]" value="<?=$genre->name()?>"/></td>
		</tr>
	<?php

			}
		}
	?>
		<tr>
			<td align="right"><label for="country">Страна:</label></td>
			<td><input type="text" id="country" name="country" required /></td>
		</tr>
		<tr>
			<td align="right"><label for="time">Длительность:</label></td>
			<td><input type="time" id="time" name="time" required /></td>
		</tr>
		<tr>
			<td class="admin_edit"><label for="trailer">Трейлер:</label></td>
			<td><textarea rows="5" cols="50" id="trailer" name="trailer" required></textarea></td>
		</tr>
		<tr>
			<td class="admin_edit"><label for="film">Фильм:</label></td>
			<td><textarea rows="5" cols="50" id="film" name="film" required></textarea></td>
		</tr>
		<tr>
			<td colspan="2" align="right"><input type="submit" name="art_add" value="Добавить фильм!"/></td>
		</tr>	
	</table>
	</form>
    </div>
</div>
<div id="admin-sidebar">
		
</div>
<div id="admin-footer">	
    <?php
	    require_once"../blocks/footer.php";
    ?>
</div>

 