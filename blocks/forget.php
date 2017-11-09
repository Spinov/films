<?php session_start();
require_once ".base.php";
$user = User::get();
	
if ($_SESSION['secpic'] == strtolower($_POST['secpic'])) {
	include_once PATH_LIB.'/user.php';
	User::lostPass($login, $email);
	
}
elseif (!empty($_POST["button_reg"])){
	echo 'Введите правильно защитное изображение!';
}
?>
<h2>Восстановление:</h2>
<form name="forget" action="" method="post">
	<table id="forget">
		<tr>
			<td>Логин:</td>
			<td><input type="text" size="20" name="login" required></td>
		</tr>
		<tr>
			<td>E-mail:</td>
			<td><input type="text" size="20" name="email" required></td>
		</tr>
		<tr>
			<td><img src="secpic.php" alt="защитный код" kasperskylab_antibanner="on"/></td>
			<td><input type="text" name="secpic" required></td>
		</tr>
		<tr>
			<td></td>
			<td colspan="2"><input type="submit" value="Восстановить пароль" name="button_forget"></td>
		</tr>
	</table>