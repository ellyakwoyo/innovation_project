<?php

include_once("./database/constants.php");
include_once("./database/db.php");
$db=new Database();
$con = $db->connect();
if (isset($_SESSION["userid"])) {
	$pre_stmt=$con->prepare("SELECT id, usertype FROM user WHERE id = ? ");
		$pre_stmt->bind_param("s", $_SESSION["userid"]);
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();
		$row = $result->fetch_assoc();
			if ($row["usertype"] == "Admin") {
				header("location:".DOMAIN."/dashboard.php") ;
			}else{
				
				header("location:".DOMAIN."/dashboardB.php") ;
			}
				
}


?>