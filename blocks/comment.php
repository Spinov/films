<h3>Комментарии:</h3>

<?php session_start();

require_once ".base.php";
include_once PATH_LIB.'/article.php';

$user = User::get();
$get = $_GET['id'];

if ($_SESSION['secpic'] == strtolower($_POST['secpic']) || ($user !== false)) {
	Comment::AddComment($comments);
}

$comments = Comment::GetComment($get);
	if (is_array($comments)){
		foreach ($comments as $comment) {
?>
<div class="comment">
	<table>
		<tr><td height="50" colspan="2">
			<p>Добавил <b><?=$comment->name()?></b>
						  <?=$comment->date()?></p>
		</td></tr>
		<tr>
			<?php
			if ($user !== false){
			?>
                <td id="avatar"><img src="../images/profile_images/<?=$user->avatar()?>" width="100" height="100" alt="avatar"/></td>
			<?php
			}
			else{
			?>
                <td id="avatar"><img src="../images/profile_images/noavatar.png" width="100" height="100" alt="noavatar"/></td>
            <?php
			}
			?>
			<td id="addcomment" colspan="2" bgcolor="white" width="900">
				<p><?=$comment->comment()?></p>
		</td></tr>
	</table>
</div>
<?php
	}
}
	else echo '<h3>Комментариев еще нет!</h3>';
?>
<div class="addcomment">
<form name="comment" action="" method="POST">
	<table>
		<?php
			if ($user === false){
		?>
		<tr>
			<td><label for="title">Имя:</label></td>
			<td>
				<input type="text" name="name" required/>
			</td>
		</tr>
		<?php
			}
			if ($user !== false){
		?>
		<tr>
			<td>
				<input type="hidden" name="name" value="<?=$user->login()?>"/>
			</td>
		</tr>
		<tr>
			<td>
				<input type="hidden" name="avatar" value="<?=$user->avatar()?>"/>
			</td>
		</tr>
			<?php
				}
				
			?>
		<tr>
			<td><label for="comment">Комментарий:</label></td>
			<td>
				<textarea rows="15" cols="75" id="comment" name="comment" required></textarea>
			</td>
		</tr>
		<?php
			if ($user === false){
		?>
		<tr>
			<td>
				<img src="secpic.php" alt="защитный код" kasperskylab_antibanner="on"/>
			</td>
			<td>
				<input type="text" name="secpic"/>
			</td>
		</tr>
		<?php
			}
		?>
		<tr>
			<td colspan="2">
				<input type="submit" name="button_comment" value="Отправить"/>
		</tr>
	</table>
</form>
</div>