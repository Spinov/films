<div id="login_form">
<form name="auth" action="auth.php" method="post">
	<table>
		<tr>
			<td>Логин:</td>
			<td>
				<input type="text" name="login"/>
			</td>
		</tr>
		<tr>
			<td>Пароль:</td>
			<td>
				<input type="password" name="password"/>
			</td>
		</tr>
		<tr>
			<td colspan="4">
				<a href="forget.php">Забыл пароль?</a>
				<input type="submit" name="button_auth" value="Войти"/>
			</td>
		</tr>
	</table>
</form>
</div>