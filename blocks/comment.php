<div id="comment">
	<table width="100%">
		<tr>
			<td>
				<h3>Добавить комментарий</h3>
				<form name="comment" action="" method="post">
					<table>
						<tr>
							<td>Имя:</td>
							<td>
								<input type="text" name="name"/>
							</td>
						</tr>
						<tr>
							<td>Комментарий:</td>
							<td>
								<input type="text" name="comment"</>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" name="button_comment" value="Отправить"/>
						</tr>
					</table>
				</form>
				<div>
					<?php
						if (!empty($_POST["button_comment"])){
							$name = htmlspecialchars ($_POST["name"]);
							$comment = htmlspecialchars ($_POST["comment"]);
							if ((strlen($name) <3) || (strlen($comment) <3)) $success = false;
							else $success = addComment($name, $comment);
							if (!$success){
								$alert = "Ошибка при добавлении комментария";
								include "alert.php";
							}
						}
						$comments = getAllComments();
							for ($i = 0; $i < count($comments); $i++){
								$name = $comments[$i]["name"];
								$comment = $comments[$i]["comment"];
								include "blocks/comments.php";
							}
					?>
				</div>
			</td>
		</tr>
	</table>
</div>