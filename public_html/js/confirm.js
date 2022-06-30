$(document).ready(function(){
        	var DOMAIN = "http://localhost/Innovation/public_html";


        //For getting shoe through serial number
		$("#confirmation_form").on("submit",function(){
			var serialNo1 = $("#serialNo1");
			var serialNo2 = $("#serialNo2");
			var status = false;
			if(serialNo1.val()=="" ){
				serialNo1.addClass("border-danger");
				$("#s1_error").html("<span class='text-danger'>Please enter password and it should be more than 9 characters.</span>");
				status=false;


			}else{
				serialNo1.removeClass("border-danger");
				$("#s1_error").html("");
				status=true;

			}
			if(serialNo2.val()==""){
				serialNo2.addClass("border-danger");
				$("#s2_error").html("<span class='text-danger'>Please reenter password and it should be more than 9 characters</span>");
				status=false;


			}else{
				serialNo2.removeClass("border-danger");
				$("#s2_error").html("");
				status=true;
			}

			if((serialNo1.val() == serialNo2.val()) && status == true){
				$.ajax({
					url : DOMAIN+"/includes/process.php", 
					method : "POST",
					dataType : "json",
					data : $("#confirmation_form").serialize(),
					success : function(data){
						if (data == "SERIAL_NUMBER_DOES_NOT_EXIST") {
							
							$("#confirmationList").modal('show');
						}else{
							
							//alert("The shoe is original as its details are available in our database. Thank you!");
						   	$("#shoeId").val(data.shoeId);
						 	$("#serial_no").val(data.serialNo);
							$("#dateProduced").val(data.dateProduced);
							$("#addedDate").val(data.addedDate);
							$("#batchNo").val(data.batchNo);
							$("#color").val(data.color);
							$("#size").val(data.size);
							//$("#shoe_stock").val(data.shoe_stock);

							//$("#insert").modal('Update');
							$("#confirmationList").modal('show');
						}
					}
				
			
			})
		}else{
				serialNo2.addClass("border-danger");
				$("#s2_error").html("<span class='text-danger'>Serial Number is not matched</span>");
				status=true;

			}				
	})
		$("#confirmation_list_shoe_form").on("submit",function(){
					$.ajax({
						url : DOMAIN+"/includes/process.php", 
						method : "POST",
						data : $("#confirmation_list_shoe_form").serialize(),
						success : function(data){
							if (data="NEW_CONFIRMATION_ADDED"){
								alert("Thanks for doing confirmation!");
							}else{
								alert("Sorry, some error occcured!")
							}
						}
					})
		})
})