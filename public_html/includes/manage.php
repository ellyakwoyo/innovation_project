 <?php

/**
 * 
 */
class Manage
{
private $con;
	
	function __construct()
	{

		include_once("../database/db.php");
		$db = new Database();
		$this->con = $db->connect();
		
	}
	public function manageRecordsWithPagination($table,$pgno){
		$a = $this->pagination($this->con, $table, $pgno, 5);
		if ($table=="shoes") {
			$sql = "SELECT `shoeId`, `serialNo`, `dateProduced`, `addedDate`, `batchNo`, `color`, `size`, `status` FROM `shoes`".$a["limit"];
		}
		//else{
		//	$sql = "SELECT * FROM ".$table." ".$a["limit"];
		//}
		$result = $this->con->query($sql) or die($this->con->error);
		$rows = array();
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$rows[] = $row;
			}
		}
		return ["rows"=>$rows,"pagination"=>$a["pagination"]];
	}


	private function pagination($con,$table,$pgno,$noOfRecs){
		
	$query = $con->query("SELECT COUNT(*) AS 'rows' FROM ".$table);
	$row = mysqli_fetch_assoc($query);
	
	
	//$totalRecord = 100000;
	$pageNumber = $pgno;
	$numberOfRecordsPerPage = $noOfRecs;

	$last = ceil($row["rows"]/$numberOfRecordsPerPage);
	//echo "Total pages " .$last."<br/>";

	$pagination="";
	$pagination="<ul class='pagination'>";

	if ($last != 1) {

		if ($pageNumber > 1) {
			$previous = "";
			$previous = $pageNumber - 1;
			$pagination .= "<li class='page-item'><a class='page-link' pgno='".$previous."' href='#' style ='color:#333;'> Previous </a></li>";
		}

		for($i=$pageNumber - 5; $i<$pageNumber; $i++){
			if ($i > 0) {
				$pagination .="<li class='page-item'><a class='page-link' pgno='".$i."' href='#> ".$i." </a></li>";
			}
			
		}
		$pagination .="<li class='page-item'><a class='page-link' pgno='".$pageNumber."' href='#' style='color:#333;'> $pageNumber </a><li>";

	}
    for($i=$pageNumber + 1; $i <= $last; $i++){
    	$pagination .="<li class='page-item'><a class='page-link' pgno='".$i."' href='#'> ".$i." </a></li>";
    	if ($i > $pageNumber + 4) {
    		break;
    	}
    }
    if ($last > $pageNumber) {
    	$next = $pageNumber + 1;
    	$pagination .="<li class='page-item'><a class='page-link' pgno='".$next."' href='#' style='color:#333;'> Next </a></li></ul>";
    }
 //LIMIT 0,10
    //LIMIT 20,10

    $limit = "LIMIT ".($pageNumber - 1) * $numberOfRecordsPerPage.",".$numberOfRecordsPerPage;
	return ["pagination"=>$pagination, "limit"=>$limit];

}

   public function deleteRecords($table,$id){
   	if ($table=="shoes") {
   		$pre_stmt = $this->con->prepare("SELECT `shoeId` FROM `shoes` WHERE `shoeId` = ?");
   		$pre_stmt->bind_param("i", $id);
   		$pre_stmt->execute();
   		$result=$pre_stmt->get_result() or die($this->con->error);
   		if ($result->num_rows>0) {
   			$pre_stmt = $this->con->prepare("DELETE FROM `shoes` WHERE `shoeId` = ?");
   			$pre_stmt->bind_param("i",$id);
   			$result = $pre_stmt->execute() or die($this->con->error);
   			if ($result) {
   				return "SHOE_DELETED";
   			}
   		}else{
   			return "THE_SHOE_DOES_NOT_EXIST";
   		}
      }
  }

  	public function getSingleRecord($table, $id){
  		$pre_stmt = $this->con->prepare("SELECT * FROM `shoes` WHERE `shoeId` = ? LIMIT 1");
  		$pre_stmt->bind_param("i", $id);
  		$pre_stmt->execute() or die($this->con->error);
  		$result=$pre_stmt->get_result();
  		if ($result->num_rows == 1) {
  			$row=$result->fetch_assoc();
  		}
  		return $row;
  	}

  		public function update_record($table,$where,$fields){
  			$sql="";
  			$condition="";
  			foreach ($where as $key => $value) {
  				// id = '3' AND m_name = 'something';
  				$condition.=$key . "='" . $value ."' AND";
  			}
  			$condition = substr($condition, 0, -3);
  			foreach ($fields as $key => $value) {
  				//UPDATE table SET m_name = '' , qty = '' WHERE id='';
  				$sql .= $key . "='" . $value ."' ,";
  			}
  			$sql = substr($sql, 0, -2);
  			$sql = "UPDATE " .$table. " SET " . $sql. " WHERE " .$condition;
  			if (mysqli_query($this->con,$sql)) {
  				return "UPDATED";
  			}
  		}


}

//$obj = new Manage();
//echo "<pre>";
//print_r($obj->manageRecordsWithPagination("shoes",1));
//echo $obj->getSingleRecord("shoes",3);
//print_r($obj->getSingleRecord("shoes",3));
//echo $obj->update_record("shoes",["shoeId"=>3],["serialNo"=>"RealAir","dateProduced"=>"2022-02-07","addedDate"=>"2022-02-07", "batchNo"=>5,"color"=>"White","size"=>34,"status"=>1]);
?>
