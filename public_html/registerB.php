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
     <script type="text/javascript" src = "./js/main.js"></script>

</head>
<body>
<div class="overlay"><div class="loader"></div></div>
	<!--Navbar-->
	<?php include_once("./templates/header.php");?>
	<br>
	<div class="container">
		<div class="card mx-auto" style="width: 30rem;">
			<div calss="card-header">Register</div>
		   <div class="card-body">
		   	<form id="register_form" onsubmit="return false" autocomplete="off">
			   	<div class="form-group">
			   		<label for="username">Full Name</label>
			   		<input type="text" name="username" class="form-control" id="username" placeholder="Enter Username">
			   		<small id="u_error" class="form-text text-muted"></small>
		   		</div>
		   		<div class="form-group">
			   		<label for="email">Email Address</label>
			   		<input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email">
			   		<small id="e_error" class="form-text text-muted">We'll never share your email with anyone else.</small>
		   		</div>
		   		<div class="form-group">
			   		<label for="password1">Password</label>
			   		<input type="password" name="password1" class="form-control" id="password1" placeholder="Password">
			   		<small id="p1_error" class="form-text text-muted"></small>
		   		</div>
		   		<div class="form-group">
			   		<label for="password2">Re-enter Password</label>
			   		<input type="password" name="password2" class="form-control" id="password2" placeholder="Password">
			   		<small id="p2_error" class="form-text text-muted"></small>
		   		</div>
		   		<div class="form-group">
			   		<label for="usertype">Usertype</label>
			   		<input type="text" class="form-control" name="usertype" id="usertype" value="Other" readonly/>
			   		<small id="t_error" class="form-text text-muted"></small>
		   		</div>
		   		<br>
		   		<button type="submit" name="user_register" class="btn btn-primary"><span class="fa fa-user">&nbsp;Register</span></button><span><a href="index.php">Login</a></span>
		   	</form>
		   </div>
		   <div class="card-footer text-muted">
		   		
		   </div>
		</div>	
		</div>


</body>
</html>
