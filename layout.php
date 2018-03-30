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



	<nav class="navbar navbar-fixed-top">
		<div class="container-fluid"> 
                <ul class="nav navbar-nav navbar-justified">
                    <?php foreach($attractions as $attr){ ?> 
					<li> <a href = <?php echo Uri::create('Florida/attraction/'.$attr['attractionID']) ?> ><?php echo $attr['attractionName'];?></a> </li> 	
					<?php } ?>

					<li><a href="aboutus.php">About Us</a></li>
	<ul class="nav navbar-nav navbar-justified">
          			<li class="dropdown" id="menuLogin">
            			<a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">Login</a>
                        <div class="dropdown-menu" style="padding:17px;">
<?php 
				$session = Session::instance();
				if(strcmp("",$session->get('username'))==0){ ?>
                                <form action="login" method="POST"> 
                                    <input name="username" id="username" type="text" placeholder="Username"> 
                                    <input name="password" id="password" type="password" placeholder="Password"><br>
                                    <input type="submit" value="login">
				</form>
				<?php } else { ?>
				<form action="logout" method="POST"> 
                                    <input name="username" id="username" type="text" placeholder="Username"> 
                                    <input name="password" id="password" type="password" placeholder="Password"><br>
                                    <input type="submit" value="logout">
				</form>
<?php } ?>
				
            		</div>
                    		</li>
          	 	 </ul>

                </ul>
	
		</div>
	</nav>

		<div id="mainContent">
			<?=$content; ?>
		</div>
		<div id="footer">
			Part of a <a href="https://www.cs.colostate.edu/~ct310/">CT310</a> Course Project
		</div>
	</body>
</html>