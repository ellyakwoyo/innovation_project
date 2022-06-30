<?php
/**
 * 
 */
class Confirm
{
private $con;
	
	function __construct()
	{

		include_once("../database/db.php");
		$db = new Database();
		$this->con = $db->connect();
		
	}

	//Shoe in database
	private function serialNoExists($serialNo){
		$pre_stmt=$this->con->prepare("SELECT serialNo FROM shoes WHERE serialNo = ? ");
		$pre_stmt->bind_param("s", $serialNo);
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();
		if ($result -> num_rows > 0) {
			return 1;
		}else{
			return 0;
		}
	}
	public function getShoeWithSerialNo($serialNo){
		if ($this->serialNoExists($serialNo)) {
			$pre_stmt = $this->con->prepare("SELECT * FROM `shoes` WHERE `serialNo` = ? LIMIT 1");
			$pre_stmt->bind_param("s", $serialNo);
			$pre_stmt->execute() or die($this->con->error);
  		    $result=$pre_stmt->get_result();
  			if ($result->num_rows == 1) {
  			$row=$result->fetch_assoc();
  			$pre_stm = $this->con->prepare("DELETE FROM `shoes` WHERE `serialNo` = ?");
   			$pre_stm->bind_param("s",$serialNo);
   			$resul = $pre_stm->execute() or die($this->con->error);
  		}
  		return $row;
		}else{
			return "SERIAL_NUMBER_DOES_NOT_EXIST";
		}
	}


}
//$obj = new Confirm();
//print_r($obj->getShoeWithSerialNo("gamingj"));

?>