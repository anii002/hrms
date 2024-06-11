<?php 
require_once 'DB_function.php';
$db=new DB_Function();


		//$response=array("success");
if(isset($_REQUEST['TA']))
{
	$jsondata=$_REQUEST['TA'];
	$jsondata1=json_decode($jsondata,true);
	$arr=$jsondata1["id"];
	
	
	
	/*foreach($jsondata1['TA'] as $value)
	{
		$id=$value['id'];
		$empid=$value['TA']['empid'];
		$referenceNo=$value['referenceno'];	
		$taDate=$value['TA']['taDate'];
		$trainno=$value['TA']['trainno'];
		$dStation=$value['TA']['dStation'];
		$departT=$value['TA']['departT'];
		$arriveS=$value['TA']['arriveS'];
		$arrivaT=$value['TA']['arrivaT'];
		$distance=$value['TA']['distance'];
		$journeyType=$value['TA']['journeyType'];
		$objective=$value['TA']['objective'];
		$level=$value['TA']['level'];
		$tamonth=$value['TA']['tamonth'];
		$tokenno=$value['TA']['tokeno'];
		$rowCount=$value['rowCount'];
		$leave=$value['leave'];
		
		
		
	}*/
	$query="INSERT INTO testta(data) VALUES('".$jsondata."')";
	$stmt=mysql_query($query);
	
	/*if(!empty($jsondata1)) 
{
	$query="INSERT INTO testta(data) VALUES('".$jsondata."')";
	$stmt=mysql_query($query);
    $response["success"] = 1;
    echo json_encode($response);
}
else
{
    $response["success"] = 0;
    echo json_encode($response);

}*/
	//$query="INSERT INTO testta(data) VALUES('".$data."')";
	//$stmt=mysql_query($query);
}

 
 
?>