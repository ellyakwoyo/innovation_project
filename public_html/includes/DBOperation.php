<?php

/**
 * 
 */
class DBOperation
{

	private $con;
	
	function __construct()
	{

		include_once("../database/db.php");
		$db = new Database();
		$this->con = $db->connect();
		
	}

	public function addShoe($serialNo,$dateProduced,$addedDate,$batchNo,$color,$size){
		$pre_stmt = $this->con->prepare(
			"INSERT INTO `shoes`(`serialNo`, `dateProduced`, `addedDate`, `batchNo`, `color`, `size`, `status`) 
			VALUES (?,?,?,?,?,?,?)");
		$status = 1;
		$pre_stmt->bind_param("sssssii",$serialNo,$dateProduced,$addedDate,$batchNo,$color,$size,$status);
		$result=$pre_stmt->execute() or die($this->con->error);
		if ($result) {
			return "NEW_SHOE_ADDED";
		}else{
			return 0;
		}
	}

	public function getAllRecords($table){
		$pre_stmt = $this->con->prepare("SELECT * FROM $table");
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();
		$rows = array();
		if ($result->num_rows> 0) {
			while($row = $result->fetch_assoc()){
				$rows[] = $row;
			}
			return $rows;
		}
		return "NO_RECORDS";
	}
	public function confirmation($serial_no,$date_produced,$added_date,$batch_no,$colour,$size,$report,$comment){
		$pre_stmt = $this->con->prepare(
			"INSERT INTO `confirmation`(`serial_no`, `date_produced`, `added_date`, `batch_no`, `colour`, `size`,`report`, `comment`) 
			VALUES (?,?,?,?,?,?,?,?)");
		//$status = 1;
		
		
		$pre_stmt->bind_param("sssssiss",$serial_no,$date_produced,$added_date,$batch_no,$colour,$size,$report, $comment);
		$result=$pre_stmt->execute() or die($this->con->error);
		if ($result) {
			return "NEW_CONFIRMATION_ADDED";
		}else{
			return 0;
		}
	}
}
//$opr=new DBOperation();
//echo $opr -> confirmation("tgh", "4/4/2022", "4/4/2022", "ty", "t", "4", "6", "or");

//echo "<pre>";
//print_r($opr->getAllRecords("shoes"));
?>