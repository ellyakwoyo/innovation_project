$(document).ready(function(){
        	var DOMAIN = "http://localhost/Innovation/public_html";



	//manageShoes
       manageShoes(1);
		function manageShoes(pgno){
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data : {manageShoes:1, pageNumber:pgno},
				success : function(data){
					$("#get_shoes").html(data);
			
					
				}
			})

		}

		$("body").delegate(".page-link","click",function(){
			var pgno = $(this).attr("pgno");
			manageShoes(pgno);
		})

		$("body").delegate(".del_shoe", "click",function(){
			var did = $(this).attr("did");
			if (confirm("Are you sure you want to delete this shoe?")) {
				$.ajax({
					url : DOMAIN+"/includes/process.php",
					method : "POST",
					data : {deleteShoe:1, id:did},
					success : function(data){
						if (data == "SHOE_DELETED") {
						    alert("Deleted successfully...!");
						    manageShoes(1);	
						}else if (data == "THE_SHOE_DOES_NOT_EXIST"){
							alert("Sorry the shoe does not exist!");
						}else{
							alert(data);
						}

				}
			})				
			}else{
				
			}
		})


		//update shoe 
		$("body").delegate(".edit_shoe","click",function(){
			var eid = $(this).attr("eid");
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				dataType : "json",
				data : {updateShoe:1, id:eid},
				success : function(data){

					$("#shoeId").val(data.shoeId);
					$("#update_serialNo").val(data.serialNo);
					$("#dateProduced").val(data.dateProduced);
					$("#addedDate").val(data.addedDate);
					$("#batchNo").val(data.batchNo);
					$("#color").val(data.color);
					$("#size").val(data.size);
					

					//$("#insert").modal('Update');
					$("#form_shoes").modal('show');

					
				}

			})
		})

				$("#update_shoe_form").on("submit",function(){
					$.ajax({
						url : DOMAIN+"/includes/process.php", 
						method : "POST",
						data : $("#update_shoe_form").serialize(),
						success : function(data){
							//window.location.href = "";
							alert(data);
							/*if (data == "NEW_SHOE_ADDED"){	
								
								$("#serialNo").val("");
								$("#dateProduced").val("");
								$("#addedDate").val("");
								$("#batchNo").val("");
								$("#color").val("");
								$("#size").val("");
							}else{
						
								alert(data);
							}*/
						}
					})

				})


  })