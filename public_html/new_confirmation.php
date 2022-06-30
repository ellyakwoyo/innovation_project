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
     <script type="text/javascript" src = "./js/confirm.js"></script>

</head>
<body>
	<!--Navbar-->
	<?php include_once("./templates/header.php");?>
	<br>
	<div class="container">
		<div class="card mx-auto" style="width: 30rem;">
			<div calss="card-header"><h5>Shoe Serial Number Entry Form</h5></div>
			<div>
				<ol>
					<li>Before you enter the serial number, confirm if it has been interefered with or identical.</li>
					<li>If the serial number is identical, has been scratched or interefered with by someone other than you, the shoe might be fake and do not accept it.</li>
					<li>The confirmation is done once after which if the system gives you a convincing information that the shoe is legitimate, the second confirmation will not be successful as it is assumed that the serial number has been tampered with.</li>
					<li>Once you have scratched the serial number and confirmed that the shoe is <b>LEGITIMATE</b>, the seller will not accept the shoe or, you will not be allowed to return it.</li>
				</ol>
			</div>
		   <div class="card-body">
			   <form id="confirmation_form" onsubmit="return false" autocomplete="off">
						<div class="form-group">
							<label for="serialNo1">Serial Number</label>
							<input type="text" name="serialNo1" class="form-control" id="serialNo1" placeholder="Serial Number">
							<small id="s1_error" class="form-text text-muted"></small>
						</div>
						<div class="form-group">
							<label for="serialNo2">Re-Enter serial Number</label>
							<input type="text" name="serialNo2" class="form-control" id="serialNo2" placeholder="Serial Number">
							<small id="s2_error" class="form-text text-muted">Make sure you key in the serial number in the shoe correctly</small>
						</div>
					<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#confirmationList">Submit</button>
				</form>
		   </div>
		
		   <div class="card-footer text-muted">
		   		
		   </div>
		</div>	
		</div>

		<?php
		//confirmation list form
		include_once("./templates/confirmationList.php");	
		?>

</body>
</html>