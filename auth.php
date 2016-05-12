<?php
	require_once ".base.php";
	User::auth($_POST["login"], $_POST["password"]);
	header("Location: ".$_SERVER["HTTP_REFERER"]);
	exit;
?>