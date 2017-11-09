<?php session_start();
require_once ".base.php";
$user = User::get();
	
if ($_POST['button_forget']) {
	include_once PATH_LIB.'/user.php';
	User::lostPass($login, $email);
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
	    <td colspan="2" align = "right"><input type="submit" value="Восстановить пароль" name="button_forget"></td>
	</tr>
    </table>