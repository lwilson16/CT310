<html>
<head>
	<title> Shopping Cart </title>

</head>
<body>

	<div class="container text-center">
	  <h3> Shopping Cart</h3>
		<p>
			Items in cart:
		<br>	
<?php
		session_start();
		$username = Session::get('username');
		$message = "You have ordered brochures on the following list:";
		if(!isset($username)){
			$username = "guest";
		}
			foreach($cart as $item){
				foreach($attractions as $attr){
					if($item['attractionID'] === $attr['attractionID'] && $item['username'] === $username){
						$message += "\n" . $attr['attractionName'];
						echo $attr['attractionName'];?>  
						<a  href="<?php echo Uri::create('Florida/deleteItem/'.$item["attractionID"].'/'.$item['itemID']); ?>"><input type="button" name="deleteComment" value="delete" id="deleteComment"></a> 								<br>
		<?php
					}
				}
			}
		
		/*	foreach($cart as $item){
				foreach($attractions as $attr){
					if($item['attractionID'] === $attr['attractionID'])
						echo $attr['attractionName'];
				}
			}*/
		?>
	   </p>


		<form method="post">
		Name: 	<input type="text" name="name"><br>
		Email:	<input type="text" name="email"><br>
				<input type="submit" value="Request Brochure">

		</form>

		
</div>
</body>
</html>
