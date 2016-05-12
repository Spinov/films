<?php
require_once ".base.php";
	$user = User::get();
	if (($user === false) || $user->isAdmin()) 
		require_once "admin/admin_panel.php";
	else {
		echo 'Добро пожаловать, ';
		echo '<b>';
		echo $user->login();
		echo '</b>';
		echo '<br />';
		echo '<a href="logout.php">Выход</a>';
	
	}
	
	