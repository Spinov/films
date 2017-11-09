<?php
include_once PATH_LIB.'/genre.php';
$genres = Genre::getAll();
?>
<div id="left_menu">
<?php
		if (is_array($genres) && (count($genres) > 0)){
			foreach ($genres as $genre) {
?>
	<ul class="style3">
		<li class="first">
			<a href="/categ.php?categ_id=<?=$genre->id()?>"><?=$genre->name()?></a>
		</li>
	</ul>
<?php
			}
		}
?>
</div>

