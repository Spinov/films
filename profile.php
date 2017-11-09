<?php
	require_once "start.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>NewFilm</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="styles/style.css"/>
	
</head>
<body>
	<div id="wrapper">
		<div id="top">
			<div id="logo">
				<h1><a href="#">FilmLife</a></h1>
			</div>
			<div id="auth">
				<?php
					if ($user !== FALSE)
					require_once "blocks/user_panel.php";
					else require_once "blocks/auth_form.php";
				?>
			</div>
		</div>
		<div id="header-wrapper">
			<div id="header" class="container">
				<?php
					require_once "blocks/top.php";
				?>
			</div>
		</div>
	<div id="page" class="container">
		<div id="content">
			<?php
				require_once "blocks/profile.php";
			?>
		</div>
		<div id="sidebar">
			<h2>Категории</h2>
			<?php
				require_once "blocks/left_menu.php";
				require_once "blocks/banners_240.php";
			?>
		</div>
	</div>	
	<div id="footer">	
			<?php
				require_once"blocks/footer.php";
			?>
	</div>
	</div>
</body>
</html>