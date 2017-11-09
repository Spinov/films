<!--<tr>
	<td colspan="2" id="header">
		<p>
		<img src="/images/header.jpg" alt="Шапка" width="100%"/> 
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
		<div id="auth">
			<?php
					//if ($user !== FALSE)
					//require_once "blocks/user_panel.php";
					//else require_once "blocks/auth_form.php";
			?>
		</div>-->
<div id="topmenu">
	<ul>
		<li class="active">
			<a href="index.php" accesskey="1">Главная</a>
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
<div id="search">
	<form name="search" action="search.php" method="post">
	<table>
		<tr>
			<td>
				<input type="text" name="search"/>
				<input type="submit" name="button_search" value="Ok"/>
			</td>
		</tr>
	</table>
</div>
	<!-- </td>
	<td class="right">
		<?php
		//	if ($user !== FALSE)
		//	require_once "blocks/user_panel.php";
		//	else require_once "blocks/auth_form.php";
		?>
	</td>
</tr>
<tr>
	<td colspan="2">
		<hr />
	</td>
</tr>-->