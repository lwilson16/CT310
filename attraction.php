<html>
<head>
	<title>Attraction</title>

</head>
<body>
	
	<div class='attrName'>	 
	<br><br><br>
	
	<?php foreach($attractions as $attr){
		if($attr['attractionID'] === $attractionID){
			
			echo $attr['attractionName'];
	?><br> <?php
			echo $attr['description'];
		}
	}?>
		
	</div>
	</div>




	<!-- Indicators -->
	<div class="container text-center">
        <h3> Comment if you dare! </h3>
            <?php 
				session_start();
				echo Session::get('username');
                if(Session::get('username')){ 
            ?>
                    <form method="POST">
                    <div>
                        <textarea rows="4" cols="50" name="comments" id="comments"></textarea>
                    </div>
                    <input type="submit" value="Submit">
                    </form>
            <?php }?>
            <p> 
                <h3>Comments</h3>
                <section id="comment">
				 
				<?php
					foreach($arrayComments as $comment){
						if($comment['attractionID'] === $attractionID)
							echo $comment['comment'];
						 ?> <br>
				<?php } ?>
            </p>
        </session>
	</div>
</body>
</html>
