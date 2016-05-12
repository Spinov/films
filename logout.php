<?php
	require_once ".base.php";
	user::logout();
	header("Location: ".$_SERVER["HTTP_REFERER"]);
	exit;
?>