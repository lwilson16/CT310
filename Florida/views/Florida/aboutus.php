<html>
<head>
	<title>About us</title>

</head>
<body>
	<nav class="navbar navbar-fixed-top">
		<div class="container-fluid">
			<ul class="nav navbar-nav navbar-justified">
	 			<li><a href="Welcome.php">Home</a></li>
	 			<li><a href="kss.php">Kennedy Space Station</a></li>
	  			<li><a href="universal.php">Universal Studios</a></li>
	  			<li><a href="buschgardens.php">Busch Gardens</a></li>
				<li class="active"><a href="aboutus.php">About Us</a></li>
				<li><a href="comment.php">Comment</a></li>

			</ul>
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
		</div>
</nav>
	<br>
	<br>
	<br>
	<!-- Indicators -->
	<div class="container text-center">
        <h3> Tanner Kinsey </h3>
            <p>
                My name is Tanner Kinsey. I was born in Texas and moved to Chicago durring the summer inbetween my sophmore and junior year of highschool. I moved to Colorado about five years ago with my girlfriend at the time. After moving here with my girlfriend we got maried. We have been maried now for almost three years. We have two big dogs, a chocolate lab named Walter, and a beautiful mutt named Frank.&nbsp;
            </p>
	</div>

	<div class="container text-center">
	<h3> Lettia Wilson </h3>
		<p> My name is Lettia Wilson. Born and and raised in Denver, Colorado. I'm majoring in Applied Computing Technology with a concentration in Computing Technology. I hope to get a Masters of Science in Cybersecurity at the University of Denver and further my career in cyber security</p>
	</div>
</body>
</html>
