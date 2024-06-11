<?php


require_once 'DB_function.php';
$db=new DB_Function();
set_time_limit(0);
//if(isset($_GET['empid']))
//{
	
	//$reference_id=$_POST['reference_id'];
	$empid=$_REQUEST['empid'];

//$stmt=mysql_query("SELECT * FROM taentryforms");
$query = "SELECT d.reference_no, d.TAYear, d.TAMonth,d.distance,d.rate from (SELECT taentry_master.reference_no, taentry_master.TAYear, taentry_master.TAMonth, SUM(taentrydetails.distance) AS distance, SUM(taentrydetails.amount) as rate FROM taentry_master INNER JOIN taentrydetails ON taentry_master.reference_no = taentrydetails.reference_no GROUP BY taentrydetails.reference_no) as d WHERE d.reference_no in (select taentry_master.reference_no from taentry_master where taentry_master.empid='00505986771' AND taentry_master.forward_status=1)";
//$query = "SELECT taentry_master.reference_no, taentry_master.TAYear, taentry_master.TAMonth, SUM(taentrydetails.distance) AS distance, SUM(taentrydetails.amount) as rate FROM taentry_master INNER JOIN taentrydetails ON taentry_master.reference_no = taentrydetails.reference_no WHERE taentrydetails.reference_no in (select taentry_master.reference_no from taentry_master where taentry_master.empid='".$empid."' AND taentry_master.forward_status=1) GROUP BY taentrydetails.reference_no";
//echo $query;
$result=mysql_query($query);
$response=array();
while($value=mysql_fetch_array($result))
{
	$temp=array();
	
	$temp['amount']=$value['rate'];
	$temp['reference_id']=$value['reference_no'];
	$temp['TAYear']=$value['TAYear'];
	$temp['TAMonth']=$value['TAMonth'];
	$temp['distance']=$value['distance'];
	
	
	array_push($response,$temp);
	

	
}
echo json_encode($response);
//s}
/*

if($stmt)
{
	$res=mysql_fetch_array($stmt);
	
	$data["data"]=$res["data"];
	
	$jsondata1=json_decode(implode("",$data),true);
	//$arr=$jsondata1["id"];
	
	
	
	foreach($jsondata1 as $value)
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
		
	$query="INSERT INTO testta(data) VALUES('".$taDate."')";
	$stmt=mysql_query($query);
	echo json_encode($stmt);	
		
	}*/
	//echo json_encode($data);

?>