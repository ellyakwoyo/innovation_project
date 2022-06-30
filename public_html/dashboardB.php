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
     <script type="text/javascript" src = "./js/main.js"></script>

</head>
<body>
	<!--Navbar-->
	<?php include_once("./templates/header.php");?>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card mx-auto" style="width: 20rem;">
				  <img src="./images/user.png" style="width:60%;" class="card-img-top mx-auto" alt="...">
				  <div class="card-body">
				    <h5 class="card-title">Profile Info</h5>
				    <p class="card-text"><i class="fa fa-user"></i>&nbsp;Elly Opetu</p>
				    <p class="card-text"><i class="fa fa-user"></i>&nbsp;User</p>
				    <p class="card-text">Last login xxxx xx xx</p>
				    <a href="#" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Edit Profile</a>
				  </div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="jumbotron" style="width:100%;height:100%;">
					<h1>Welcome User,</h1>
					<div class="row">
				 		<div class="col-sm-6">
				 			<iframe src="https://free.timeanddate.com/clock/i85g8a34/n170/szw110/szh110/hocfff/hbw0/hfc000/cf100/hgr0/fav0/fiv0/mqc0f0/mqs2/mql4/mqw4/mqd86/mhc0f0/mhs2/mhl4/mhw4/mhd86/mmc0f0/mml2/mmd88/hhc00f/hhs3/hhl50/hhw11/hmc00f/hms3/hml80/hmw11/hsc00f/hsl90/hsw6" frameborder="0" width="110" height="110"></iframe>
				 		</div>
						<div class="col-sm-6">
							<div class="card">
						      <div class="card-body">
						        <h5 class="card-title">Shoe Confirmation</h5>
						          <p class="card-text">Here You will enter shoe serial number to confirm its legitimacy</p>
				                 <a href="new_confirmation.php" class="btn btn-primary">Confirm Shoe Legitimacy</a>
						      </div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
	<br>


    <?php
  		//manage_shoes form
  		include_once("./templates/manage_shoes.php");
    ?>
    <?php
  		//confirmation form
  		include_once("./templates/confirmation.php");
    ?>
    <?php
  		//report fake form
  		include_once("./templates/report_fake.php");
    ?>
    <?php
  		//our_products form
  		include_once("./templates/our_products.php");
    ?>


</body>
</html>
