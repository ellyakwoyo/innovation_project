<?php

$con = mysqli_connect("localhost","root","","innovation");

function pagination($con,$table,$pgno,$noOfRecs){
	$query = $con->query("SELECT COUNT(*) as rows FROM".$table);
	$row = mysqli_fetch_assoc($query);
	//$totalRecord = 100000;
	$pageNumber = $pgno;
	$numberOfRecordsPerPage = $noOfRecs;

	$last = ceil($row["rows"]/$numberOfRecordsPerPage);
	echo "Total pages" .$last."<br/>";

	$pagination="";

	if ($last != 1) {

		if ($pageNumber > 1) {
			$previous = "";
			$previous = $pageNumber - 1;
			$pagination .= "<a href='pagination.php?pageNumber=".$previous."' style ='color:#333;'> Previous </a>";
		}

		for($i=$pageNumber - 5; $i<$pageNumber; $i++){
			if ($i > 0) {
				$pagination .="<a href='pagination.php?pageNumber=".$i."'> ".$i." </a>";
			}
			
		}
		$pagination .="<a href='pagination.php?pageNumber=".$pageNumber."' style='color:#333;'> $pageNumber </a>";

	}
    for($i=$pageNumber + 1; $i <= $last; $i++){
    	$pagination .="<a href='pagination.php?pageNumber=".$i."'> ".$i." </a>";
    	if ($i > $pageNumber + 4) {
    		break;
    	}
    }
    if ($last > $pageNumber) {
    	$next = $pageNumber + 1;
    	$pagination .="<a href='pagination.php?pageNumber=".$next."' style='color:#333;'> Next </a>";
    }
 //LIMIT 0,10
    //LIMIT 20,10

    $limit = "LIMIT ".($pageNumber - 1) * $numberOfRecordsPerPage.",".$numberOfRecordsPerPage;
	return ["pagination"=>$pagination, "limit"=>$limit];

}
if (isset($_GET['pageNumber'])) {
	$pageNumber=$_GET['pageNumber'];

	$table = "shoes";

	$array = pagination($con,$table,$pageNumber,10);

	$sql = "SELECT * FROM".$table." ".$array["limit"];

	$query = $con->query($sql);
	while ($row=mysqli_fetch_assoc($query)) {
		echo "<div style='margin:0 auto; font-size:20px'><b>".$row["shoeId"]."</b> ".$row["serialNo"]."</div>";
	}
	echo $array["pagination"];
	
	
}




?>