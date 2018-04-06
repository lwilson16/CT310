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
	            <?php 
				session_start();
				$user = Session::get('username');
				if(!isset($user)){
					$user = $guest;
				}
			
			?>
		<a href="<?php echo Uri::create('Florida/addItem/'.$attractionID.'/'.$user); ?>"><input type="button" name="addItem" value="+ item to cart" id="addItem"></a> <br>


			<?php
				
				echo "Welcome, ".$user;
				if(Session::get('username') === "kenny" || Session::get('username') === "lwilson1"){ 
            ?>
                    <form method="POST">
                    <div>
                        <textarea rows="4" cols="50" name="comments" id="comments"></textarea>
                    </div>
                    <input type="submit" value="Submit">
                    </form>
			<?php }?>

			<h3> Comment if you dare! </h3> <br>

            <p> 
                <h3>Comments</h3>
                <section id="comment">
				 
				<?php
				foreach($arrayComments as $comment){
					if($comment['attractionID'] === $attractionID){
						echo $comment['comment'] .$comment['commentID'];
				}		?> 
				<br>		
				<?php if(Session::get('username') === "kenny" || Session::get('username') === "lwilson1"){ ?>	
						<a  href="<?php echo Uri::create('Florida/deleteComment/'.$comment['attractionID'].'/'.$comment['commentID']); ?>"><input type="button" name="deleteComment" value="delete" id="deleteComment"></a> 
				
						<form method="POST" action="<?php echo Uri::create('Florida/updateComment/'.$comment['attractionID'].'/'.$comment['commentID']); ?>">
        	        		<textarea rows="1" cols="20" name="updateComment" id="updateComment"></textarea>
							<input type="submit" value="edit"></a>
						</form>
				
				<?php 	}	
				} ?>
            </p>
        </session>
	</div>
</body>
</html>
