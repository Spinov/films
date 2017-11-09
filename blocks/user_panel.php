<div id="full_user">
<?php
require_once ".base.php";
	$user = User::get();
	if (($user === false) || $user->isAdmin()) 
		require_once "admin/admin_panel.php";
	else {
		echo 'Добро пожаловать, ';
		echo '<b><h4>';
		echo $user->login();
		echo '</b></h4>';
		echo '<br />';
		echo '<a href="profile.php">Аккаунт</a> / ';
		echo '<a href="logout.php">Выход</a>';
	}
?>
</div>

	