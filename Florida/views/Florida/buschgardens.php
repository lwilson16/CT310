<html>
<head>
	<title> Busch Gardens </title>

</head>
<body>
	<nav class="navbar navbar-fixed-top">
		<div class="container-fluid">
			<ul class="nav navbar-nav navbar-justified">
	 			<li><a href="Welcome.php">Home</a></li>
	 			<li><a href="kss.php">Kennedy Space Station</a></li>
	  			<li><a href="universal.php">Universal Studios</a></li>
	  			<li class="active"><a href="buschgardens.php">Busch Gardens</a></li>
				<li><a href="aboutus.php">About Us</a></li>
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
	<div id="Carousel" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#Carousel" data-slide-to="0" class="active"></li>
			<li data-target="#Carousel" data-slide-to="1"></li>
			<li data-target="#Carousel" data-slide-to="2"></li>
			<li data-target="#Carousel" data-slide-to="3"></li>
			<li data-target="#Carousel" data-slide-to="4"></li>
			<li data-target="#Carousel" data-slide-to="5"></li>
			<li data-target="#Carousel" data-slide-to="6"></li>
			<li data-target="#Carousel" data-slide-to="7"></li>
		</ol>

		<!-- Wrapper -->
		<div class="carousel-inner" role="listbox">
			<div class="item active">
                <?php echo Asset::img('busch1.jpg');?>
			</div>
		
			<div class="item">
				<?php echo Asset::img('busch2.jpg');?>
			</div>
			
			<div class="item">
				<?php echo Asset::img('busch3.jpg');?>
			</div>
			
			<div class="item">
				<?php echo Asset::img('busch4.jpg');?>
			</div>
			
			<div class="item">
                <?php echo Asset::img('busch5.jpg');?>
			</div>
		
			<div class="item">
				<?php echo Asset::img('busch6.jpg');?>
			</div>
			
			<div class="item">
				<?php echo Asset::img('busch7.jpg');?>
			</div>
			
			<div class="item">
				<?php echo Asset::img('busch8.jpg');?>
			</div>
		</div>
		
		 <!-- Left and right controls -->
  		<a class="left carousel-control" href="#Carousel" role="button" data-slide="prev">
   			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    			<span class="sr-only">Previous</span>
 		</a>
		
  		<a class="right carousel-control" href="#Carousel" role="button" data-slide="next">
    			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    			<span class="sr-only">Next</span>
  		</a>
	</div>
	
	<div class="container text-center">
	  <h3> Welcome to Florida</h3>
        <p>
            <a href="https://buschgardens.com/tampa/?utm_source=gmb&amp;utm_medium=organic">Busch Gardens Tampa</a> African-themed      animal theme park located in the city of Tampa, Florida. Busch Gardens Tampa is owned and operated by SeaWorld Parks &amp; Entertainment and is their 2nd largest park in terms of attendance behind SeaWorld Orlando. The park officially features 8 roller coasters and 2 water rides amongst other rides and animal attractions. Its newest roller coaster, Cobra's Curse, was opened in June 2016.
        </p>
        <p>
            Currently Busch Gardens competes with other such parks in Florida and charges comparable fees. Busch Gardens is currently accredited by the Association of Zoos and Aquariums. In 2015, the park hosted 4.2 million people, placing 11th as the most-visited theme parks in the United States.
        </p>
        <p>
            information from <a href="https://en.wikipedia.org/wiki/Busch_Gardens_Tampa">wikipedia.</a>
        </p>
	</div>

</body>
</html>
