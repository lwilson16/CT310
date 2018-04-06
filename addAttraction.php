<html>
<head>
	<title> Add an Attraction </title>

</head>
<body>
	<!-- Indicators -->
	<div class="container-fluid">
	<h3> Add An Attraction </h3>
	<form method="POST" action="<?php echo Uri::create('Florida/addAttractionDB')?>" id="attractionForm"  enctype="multipart/form-data">
		<br><br>
		<p> Attraction Name </p>
		<input type="text" name="attractionName"><br><br>

		<p> Attraction Description </p>
		 <textarea rows="4" cols="50" name="description"></textarea> <br><br>

		<p>Upload an Image </p>
		<input type="file" value="Upload Image" name="picture" id="inp">
		
		<input type="submit" value="Submit Attraction" name="submit">
	</form>
	</div>

</body>
</html>
