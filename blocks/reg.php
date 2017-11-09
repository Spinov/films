<?php session_start();

    include_once PATH_LIB.'/user.php';
    User::addUser($login, $email, $password_1, $password_2, $vopros, $otvet);

?>
<h2>Регистрация</h2>
<form name="reg" action="" method="post">
	<table id="reg">
		<tr>
			<td>Логин:</td>
			<td>
				<input type="text" name="login" placeholder="login" required/>
			</td>
		</tr>
		<tr>
			<td>Пароль: </td>
			<td>
				<input type="password" name="password_1" placeholder="не менее 4 символов" required/>
			</td>
		</tr>
		<tr>
			<td>Подтвердите пароль:</td>
			<td>
				<input type="password" name="password_2" placeholder="не менее 4 символов" required/>
			</td>
		</tr>
		<tr>
			<td>E-mail:</td>
			<td>
				<input type="text" name="email" placeholder="user@example.com" required/>
			</td>
		</tr>
		<tr>
			<td>Секретный вопрос:</td>
			<td>
				<input type="text" name="vopros" placeholder="любимый цвет" required/>
			</td>
		</tr>
		<tr>
			<td>Ответ:</td>
			<td>
				<input type="text" name="otvet" placeholder="красный" required/>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="button_reg" value="Зарегистрироваться"/>
			</td>
		</tr>
	</table>
</form>