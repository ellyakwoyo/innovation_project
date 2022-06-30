<?php

include_once("./database/constants.php");
if (!isset($_SESSION["userid"])) {
	header("location:".DOMAIN."/");
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Innovation Project</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
     <script type="text/javascript" src = "./js/manage.js"></script>

</head>
<body>
	<!--Navbar-->
	<?php include_once("./templates/header.php");?>
	<br>
	<div class="container">
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Serial Number</th>
					<th>Date Produced</th>
					<th>Added Date</th>
					<th>Batch Bumber</th>
					<th>Color</th>
					<th>Size</th>
					<th>Status</th>
					<th>Action</th>				
				</tr>
			</thead>
			<tbody id="get_shoes">
			<!--	<tr>
					<td>1</td>
					<td>ok</td>
					<td>ok</td>
					<td>ok</td>
					<td>ok</td>
					<td>ok</td>
					<td>ok</td>
					<td>ok</td>
					<td><a href="#" class="btn btn-success btn-sm">Active</a></td>
					<td>
						<a href="#" class="btn btn-danger btn-sm">Delete</a>
						<a href="#" class="btn btn-info btn-sm">Edit</a>
					</td>
				</tr>-->
				
			</tbody>
			
		</table>
		
	</div>
	<?php
		include_once("./templates/update_shoe.php");
	//include_once("./templates/myUpdate.php");
	?>
	
</body>
</html>

