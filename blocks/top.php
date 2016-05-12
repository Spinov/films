<tr>
	<td colspan="2" id="header">
		<p>
			<!--<img src="/images/header.jpg" alt="Шапка" width="100%"/>	-->
		</p>
	</td>
</tr>
<tr>
	<td colspan="2">
		<hr />
	</td>
</tr>
<tr>
	<td>
		<div id="topmenu">
			<ul>
				<li>
					<a href="index.php">Главная</a>
				</li>
				<li>
					<a href="reg.php">Регистрация</a>
				</li>
				<li>
					<a href="new_films.php">Новинки</a>
				</li>
				<li>
					<a href="feedback.php">Обратная связь</a>
				</li>
			</ul>
		</div>
	</td>
	<td class="right">
		<?php
			if ($user !== FALSE)
			require_once "blocks/user_panel.php";
			else require_once "blocks/auth_form.php";
		?>
	</td>
</tr>
<tr>
	<td colspan="2">
		<hr />
	</td>
</tr>