<html>
<head>
	<title> Welcome to Florida </title>

</head>
<body>
	<nav class="navbar navbar-fixed-top">
		<div class="container-fluid">
			<ul class="nav navbar-nav navbar-justified">
	 			<li class="active"><a href="Welcome.php">Home</a></li>
	 			<li><a href="kss.php">Kennedy Space Station</a></li>
	  			<li><a href="universal.php">Universal Studios</a></li>
	  			<li><a href="buschgardens.php">Busch Gardens</a></li>
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
		</ol>

		<!-- Wrapper -->
		<div class="carousel-inner" role="listbox">
			<div class="item active">
                <?php echo Asset::img('florida-postcard.jpg');?>
			</div>
		
			<div class="item">
				<?php echo Asset::img('nightRocket.jpg');?>
			</div>
			
			<div class="item">
				<?php echo Asset::img('UniversalFlorida.svg.png');?>
			</div>
			
			<div class="item">
				<?php echo Asset::img('busch gardens 1.jpg');?>
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
            Florida, which joined the union as the 27th state in 1845, is nicknamed the Sunshine State and known for its balmy climate and natural beauty. Spanish explorer Juan Ponce de Leon, who led the first European expedition to Florida in 1513, named the state in tribute to Spain&rsquo;s Easter celebration known as &ldquo;Pascua Florida,&rdquo; or Feast of Flowers. During the first half of the 1800s, U.S. troops waged war with the region&rsquo;s Native American population. During the Civil War, Florida was the third state to secede from the Union. Beginning in the late 19th century, residents of Northern states flocked to Florida to escape harsh winters. In the 20th century, tourism became Florida&rsquo;s leading industry and remains so today, attracting millions of visitors annually. Florida is also known for its oranges and grapefruit, and some 80 percent of America&rsquo;s citrus is grown there.
        </p>
        <p>
            Information from <a href="https://www.history.com/topics/us-states/florida">History.com</a>
        </p>	
	</div>
</body>
</html>
