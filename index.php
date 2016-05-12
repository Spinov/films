<?php
	require_once "start.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>13films</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="styles/main.css"/>
	
</head>
<body>
	<div id="container">
	<table>
		<?php
			require_once "blocks/top.php";
		?>
		<tr>
			<td colspan="2">
				<table cellpadding="0" cellspacing="0" id="content">
					<tr>
						<td>
							<?php
								require_once "blocks/left_menu.php"
							?>
						</td>	
						<td>
							<?php
								require_once "blocks/intro_article.php";
							?>
						</td>
						<td id="banners_240">
							<?php
								require_once "blocks/banners_240.php";
							?>
						</td>
					</tr>
				</table>
			</td>
		</tr>
			<?php
				require_once"blocks/footer.php";
			?>
	</table>
	</div>	
</body>
</html>