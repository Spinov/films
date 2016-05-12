<?php
include_once PATH_LIB.'/genre.php';
$numNew = 5;

Genre::del($genres);

$genres = array();
if (is_array($_POST)){
	foreach ($_POST as $key => $val) {
		if ((substr($key, 0, 2) == 'up') && (intval(substr($key, 2)) > 0)) {
			$genres[] = new Genre($val, intval(substr($key, 2)));
		}
	}
}
Genre::update($genres);

$genres = array();
for ($i = 0; $i < $numNew; $i++){
	if (trim($_POST['add'.$i]) != '')
		$genres[] = new Genre($_POST['add'.$i]);
}
Genre::insert($genres);

$genres = Genre::getAll();
?>
<form action="#" method="POST">
<table border="1" align="center" width="200px">
	<tr>
		<th>id</th>
		<th>name</th>
		<th>del</th>
	</tr>
	<?php
		if (is_array($genres) && (count($genres) > 0)){
			foreach ($genres as $genre) {
	?>
	<tr>
		<td><?= $genre->id()?></td>
		<td><input type="text" name="up<?=$genre->id()?>" value="<?=$genre->name()?>"/></td>
		<td><input type="checkbox" name="del[]" value="<?=$genre->id()?>"/></td>
	</tr>
	<?php
			}
		}
	?>
	<?php for ($i = 0; $i < $numNew; $i++){ ?>
	<tr>
		<td>+</td>
		<td><input type="text" name="add<?=$i?>"/></td>
		<td>&nbsp;</td>
	</tr>
	<?php } ?>
	<tr>
		<td colspan="3" align="center"><input type="submit" name="add" value="Сохранить"/></td>
	</tr>
</table>
</form>

