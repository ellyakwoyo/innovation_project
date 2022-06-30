<?php
include_once("./database/constants.php");
if (isset($_SESSION["userid"])){
	header("location:".DOMAIN."/dashboardB.php") ; 
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
     <link rel="stylesheet" type="text/css" href="./includes/style.css">
     <script type="text/javascript" rel="stylesheet" src = "./js/main.js"></script>

</head>
<body>
<div class="overlay"><div class="loader"></div></div>
	<!--Navbar-->
	<?php include_once("./templates/header.php");?>
	<br>
	<div class="container">
		<?php
         if (isset($_GET["msg"]) AND !empty($_GET["msg"])) {
         	?>
              
              <div class="alert alert-success alert-dismissible fade show" role="alert">
  				<?php echo $_GET["msg"]; ?>
  				<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
  				<span aria-hidden="true">&times;</span>
  				</button>
		   </div>

         	<?php
         }
		?>

		<div class="card mx-auto" style="width: 18rem;">
		  <img src="./images/login.png" class="card-img-top mx-auto" style ="width:60%;" alt="Login Icon">
			  <div class="card-body">
			    <form id="form_login" onsubmit="return false">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Email address</label>
				    <input type="email" class="form-control" name="log_email" id="log_email" placeholder="Enter Email">
				    <small id="e_error" class="form-text text-muted">We'll never share your email with anyone else.</small>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="password" class="form-control" name="log_password" id="log_password" placeholder="password">
				    <small id="p_error" class="form-text text-muted">Enter password</small>
				  </div>

				  <button type="submit" class="btn btn-primary"><i class="fa fa-lock">&nbsp;</i>Login</button>
				  <span><a href="registerB.php">Register</a></span>
				</form>
			  </div>
			  <div class="card-footer"><a href="#">Forget Password ?</a></div>
			</div>		
		</div>

</body>
</html>
