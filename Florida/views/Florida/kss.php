<html>
<head>
	<title> Kennedy Space Station </title>

</head>
<body>
	<nav class="navbar navbar-fixed-top">
		<div class="container-fluid">
			<ul class="nav navbar-nav navbar-justified">
	 			<li><a href="Welcome.php">Home</a></li>
	 			<li class="active"><a href="kss.php">Kennedy Space Station</a></li>
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
			<li data-target="#Carousel" data-slide-to="4"></li>
		</ol>

		<!-- Wrapper -->
		<div class="carousel-inner" role="listbox">
			<div class="item active">
                <?php echo Asset::img('kss1.jpg');?>
			</div>
		
			<div class="item">
				<?php echo Asset::img('kss2.jpg');?>
			</div>
			
			<div class="item">
				<?php echo Asset::img('kss3.png');?>
			</div>
			
			<div class="item">
				<?php echo Asset::img('kss4.jpg_fit=scale');?>
			</div>
			
			<div class="item">
                <?php echo Asset::img('kss6.jpg');?>
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
	  <p>
    		The&nbsp;<a href="https://www.nasa.gov/centers/kennedy/home/index.html"><strong>John F. Kennedy Space Center</strong>&nbsp;(<strong>KSC</strong>)</a> is one of ten National Aeronautics and Space Administration field centers.&nbsp;Since December 1968, Kennedy Space Center has been NASA's primary launch center of human spaceflight. Launch operations for the Apollo, Skylab, and Space Shuttle&nbsp;programs were carried out from Kennedy Space Center Launch Complex 39&nbsp;and managed by KSC.<sup id="cite_ref-2" class="reference"></sup>&nbsp;Located on the east coast of Florida, KSC is adjacent to Cape Canaveral Air Force Station&nbsp;(CCAFS). The management of the two entities work very closely together, share resources, and even own facilities on each other's property.
	</p>
	<p>
    		information from wikipedia.<a href="https://en.wikipedia.org/wiki/Kennedy_Space_Center">https://en.wikipedia.org/wiki/Kennedy_Space_Center</a>
	</p>
	  
	</div>
