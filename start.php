<?php
	session_start();
	require_once "lib/functions.php";
	require_once ".base.php";
	$user = User::get();
?>