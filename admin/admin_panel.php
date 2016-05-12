<?php
require_once ".base.php";
	echo 'Администратор, ';
	echo '<b>';
	echo $user->login();
	echo '</b>';
	echo '<br />';
	echo '<a href="admin/admin.php">Админ панель</a> / ';
	echo '<a href="logout.php">Выход</a>';
