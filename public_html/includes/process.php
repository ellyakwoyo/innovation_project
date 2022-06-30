 <?php


include_once("../database/constants.php");
include_once("user.php");
include_once("DBOperation.php");
include_once("manage.php");
include_once("confirm.php");



//for registration processing
if (isset($_POST["username"]) AND isset($_POST["email"])) {
	$user = new User();
	$result = $user->createUserAccount($_POST["username"], $_POST["email"], $_POST["password1"], $_POST["usertype"]);
	echo $result;
	exit();

}

//for login processing
if (isset($_POST["log_email"]) AND isset($_POST["log_password"])) {
	$user = new User();
	$result = $user->userLogin($_POST["log_email"],$_POST["log_password"]);
	echo $result;
	exit();
}

//for get shoe
if (isset($_POST['getShoe'])) {
	$obj = new DBoperation();
	$rows = $obj->getAllRecords("shoes");
	foreach ($rows as $row) {
		echo $row["serialNo"];
	}
	exit();
}



//add shoe
if (isset($_POST["addedDate"]) AND isset($_POST["serialNo"])) {
	$obj = new DBOperation();
	$result = $obj->addShoe($_POST["serialNo"],
		                   $_POST["dateProduced"],
		                   $_POST["addedDate"],
		                   $_POST["batchNo"],
		                   $_POST["color"],
		                   $_POST["size"]);
		                  // $_POST["shoe_stock"]);
	echo $result;
	exit();
}


//manage shoes

if (isset($_POST["manageShoes"])) {
	$m = new Manage();
	$result = $m ->manageRecordsWithPagination("shoes",$_POST['pageNumber']);
	$rows = $result["rows"];
	$pagination = $result["pagination"];
	if (count($rows) > 0) {
		$n=(($_POST['pageNumber'] - 1) * 5) + 1;
		foreach ($rows as $row) {
			

			?>
			<tr>					
					<td><?php echo $n; ?></td>
					<td><?php echo $row["serialNo"]; ?></td>
					<td><?php echo $row["dateProduced"]; ?></td>
					<td><?php echo $row["addedDate"]; ?></td>
					<td><?php echo $row["batchNo"]; ?></td>
					<td><?php echo $row["color"]; ?></td>
					<td><?php echo $row["size"]; ?></td>
					
					
					<td><a href ="#" class="btn btn-success btn-sm">Active</a></td>
					<td>
						<a href="#" did="<?php echo $row["shoeId"]; ?>" class="btn btn-danger btn-sm del_shoe">Delete</a>
						<a href="#" eid="<?php echo $row["shoeId"]; ?>" data-toggle="modal" 
							data-target="#form_shoes" class="btn btn-info btn-sm edit_shoe">Edit</a>
					</td>								
			</tr>
			<?php
			$n++;
		}
		?>
			<tr><td colspan="5"><?php echo $pagination; ?></td></tr>
		<?php
		exit();
	}

}
	//delete shoe
	if (isset($_POST['deleteShoe'])) {
		$m=new Manage();
		$result = $m->deleteRecords("shoes",$_POST['id']);
		echo $result;
	}
	//Get data to update shoe
	if (isset($_POST['updateShoe'])){
		$m=new Manage();
		$result = $m->getSingleRecord("shoes",$_POST['id']);
		echo json_encode($result);
		exit();
	}

	//update shoe after getting data
	if (isset($_POST['update_serialNo'])) {
		$m=new Manage();
		$shoeId = $_POST["shoeId"];
		$update_serialNo =$_POST["update_serialNo"];
		$dateProduced = $_POST["dateProduced"];
		$addedDate = $_POST["addedDate"];
		$batchNo = $_POST["batchNo"];
		$color = $_POST["color"];
		$size = $_POST["size"];
		//$shoe_stock = $_POST["shoe_stock"];
 		$result = $m->update_record("shoes",["shoeId"=>$shoeId],["serialNo"=>$update_serialNo,"dateProduced"=>$dateProduced,"addedDate"=>$addedDate, "batchNo"=>$batchNo,"color"=>$color,"size"=>$size,"status"=>1]);
 		echo $result;
 	
		
	}

	//Get data to update shoe
	if (isset($_POST['serialNo2'])){
		$c=new confirm();
		$result = $c->getShoeWithSerialNo($_POST['serialNo1']);
		echo json_encode($result);
		exit();
		}
    //Post confirmation
		if (isset($_POST["comment"])) {
			$obj = new DBOperation();
			$result = $obj->confirmation($_POST["serial_no"],
				                $_POST["dateProduced"],
				                $_POST["addedDate"],
				                $_POST["batchNo"],
				                $_POST["color"],
				                $_POST["size"],
				               //$_POST["shoe_stock"],
				                $_POST["report"],
								$_POST["comment"]);
 								
			echo $result;
	        exit();
	    }



?>