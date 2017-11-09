<!DOCTYPE html>
<html>
<head>
	<title>NewFilm</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="../styles/style.css"/>
	
</head>
<body>
	<div id="admin-wrapper">
	    <div id="admin-top">
		<ul>
		    <li class="active">
			    <a href="../index.php" accesskey="1">Вернуться на сайт</a>
		    </li>
		</ul>
	    </div>
		
	    <div id="admin-menu">
		<ul class="style3">
			<li class="first">
				<a href="all_articles.php">Статьи</a><br/>
			</li>
			<li class="first">
				<a href="changegenre.php">Жанры</a><br/>
			</li>
		</ul>
	   </div>
	    <div id="admin-content">
		<h1>Добро пожаловать в админ панель!</h1><br/>
	    </div>
	    <div id="admin-sidebar">
		
	    </div>
	<div id="admin-footer">	
			<?php
				require_once"../blocks/footer.php";
			?>
	</div>
</div>