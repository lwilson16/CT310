<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<?php echo Asset::css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'); ?>
		<?php echo Asset::css('https://fonts.googleapis.com/css?family=Lato'); ?>
		<?php echo Asset::css('https://fonts.googleapis.com/css?family=Montserrat'); ?>
		<?php echo Asset::js("https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js");?>
		<?php echo Asset::js("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js");?>
		<?php echo Asset::css('Florida-style.css'); ?>
	</head>
	<body>
		<div id="mainContent">
			<?=$content; ?>
		</div>
		<div id="footer">
			Part of a <a href="https://www.cs.colostate.edu/~ct310/">CT310</a> Course Project
		</div>
	</body>
</html>
