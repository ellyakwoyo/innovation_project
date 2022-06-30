    $(document).ready(function(){
        var DOMAIN = "http://localhost/Innovation/public_html";
		$("#register_form").on("submit",function(){
			var status = false;
			var name = $("#username");
			var email = $("#email");
			var pass1 = $("#password1");
			var pass2 = $("#password2");
			var type = $("#usertype");
			//var n_pattern = new RegExp(/^[A-Za-z ]+$/);
			var e_pattern = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
			if(name.val == "" || name.val().length < 6){
				name.addClass("border-danger");
				$("#u_error").html("<span class='text-danger'>Please enter name that should be more than six characters</span>");
				status=false;


			}else{
				name.removeClass("border-danger");
				$("#u_error").html("");
				status=true;

			}
			if(!e_pattern.test(email.val())){
				email.addClass("border-danger");
				$("#e_error").html("<span class='text-danger'>Please enter valid email address</span>");
				status=false;


			}else{
				email.removeClass("border-danger");
				$("#e_error").html("");
				status=true;

			}
			if(pass1.val()=="" || pass1.val().length < 9){
				pass1.addClass("border-danger");
				$("#p1_error").html("<span class='text-danger'>Please enter password and it should be more than 9 characters.</span>");
				status=false;


			}else{
				pass1.removeClass("border-danger");
				$("#p1_error").html("");
				status=true;

			}
			if(pass2.val()==""|| pass2.val().length < 9){
				pass2.addClass("border-danger");
				$("#p2_error").html("<span class='text-danger'>Please reenter password and it should be more than 9 characters</span>");
				status=false;


			}else{
				pass2.removeClass("border-danger");
				$("#p2_error").html("");
				status=true;

			}
			if(type.val()==""){
				type.addClass("border-danger");
				$("#t_error").html("<span class='text-danger'>Please select either admin or user");
				status=false;


			}else{
				type.removeClass("border-danger");
				$("#t_error").html("");
				status=true;

			}
			if ((pass1.val() == pass2.val()) && status == true) {
				$(".overlay").show();
				$.ajax({
					url : DOMAIN+"/includes/process.php", 
					method : "POST",
					data : $("#register_form").serialize(),
					success : function(data){
						if (data == "EMAIL_ALREADY_EXISTS") {
							$(".overlay").hide();
							alert("Email already esxists");
						}else if(data == "SOME_ERROR"){
							$(".overlay").hide();
							alert("Something wrong");
						}else{
							$(".overlay").hide();
							window.location.href = encodeURI(DOMAIN+"/index.php?msg=You are registered now you can login");
						}
					}
				})

			}else{
				pass2.addClass("border-danger");
				$("#p2_error").html("<span class='text-danger'>password is not matched</span>");
				status=true;

			}
			
		})
		//For login part
		$("#form_login").on("submit",function(){
			var email = $("#log_email");
			var pass = $("#log_password");
			var status = false;
			if (email.val() == "") {
				email.addClass("border-danger");
				$("#e_error").html("<span class='text-danger'>Please enter email address</span>");
				status = false;
			}else{
				email.removeClass("border-danger");
				$("#e_error").html("");
				status = true;
			}
			if (pass.val() == "") {
				pass.addClass("border-danger");
				$("#p_error").html("<span class='text-danger'>Please enter password</span>");
				status = false;
			}else{
				pass.removeClass("border-danger");
				$("#p_error").html("");
				status = true;
			}
			if (status) {
				$(".overlay").show();
				$.ajax({
					url : DOMAIN+"/includes/process.php", 
					method : "POST",
					data : $("#form_login").serialize(),
					success : function(data){
						if (data == "NOT_REGISTERED") {
							$(".overlay").hide();
							email.addClass("border-danger");
							$("#e_error").html("<span class='text-danger'>It seems like you are not registered</span>");
						}else if(data == "PASSWORD_NOT_MATCHED"){
							$(".overlay").hide();
							pass.addClass("border-danger");
							$("#p_error").html("<span class='text-danger'>Please enter correct password</span>");
							status=true;

						}else{
							$(".overlay").hide();
							console.log(data);
							window.location.href = DOMAIN+"/dashboardB.php";
						}
						
					}
				
				})
			}
		})
		//Fetch shoes
	
		//add shoe
		$("#shoe_form").on("submit",function(){
			$.ajax({
					url : DOMAIN+"/includes/process.php", 
					method : "POST",
					data : $("#shoe_form").serialize(),
					success : function(data){
						if (data == "NEW_SHOE_ADDED"){	
							alert("New shoe added successfuly");
							$("#serialNo").val("");
							$("#dateProduced").val("");
							$("#addedDate").val("");
							$("#batchNo").val("");
							$("#color").val("");
							$("#size").val("");
							
							}else{					
							//console.log(data);
							alert(data);
						}
					}
				})
		})
	})









	
	
