<?php
include_once PATH_LIB.'/article.php';
include_once PATH_LIB.'/genre.php';

Article::del();

$articles = Article::getAll();
?>
<div id="admin-content">
	<?php
		foreach ($articles as $article) {
	?>
	<form action="" method="POST">
		<div class="art">
			<table>
				<tr><td><img src="<?=$article->uploadfile()?>" width="200" height="250" alt="<?=$article->title()?>" /><br />
				<b><?=$article->title()?></b><br />
				<sup><a href="edit_art.php?id=<?=$article->id();?>">Изменить</a></sup>
				<sup>del<input type="checkbox" name="del[]" value="<?=$article->id()?>" /></sup></td></tr>
			</table>
		</div>
	<?php
		}
	?>	
	</form>	
</div>
<div id="admin-sidebar">
    <div id="del">
	<a href="add_article.php">Добавить</a>
	<input type="submit" name="okdel" value="Удалить"/>
    </div>
</div>
<div id="admin-footer">	
			<?php
				require_once"../blocks/footer.php";
			?>
</div>