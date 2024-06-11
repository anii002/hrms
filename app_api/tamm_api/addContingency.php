<?php 

date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();
// $data='[{"empid":"06014148","referenceno":"06014148/2018/525062","cont_month":"2","cont_date":"2018-2-5","cont_from":"Pune Junction ","cont_to":"DRM office pune","cont_kms":"25","cont_rt_pr_km":"15","cont_amount":"375","rowCount":1,"objective":"test"}]';

require_once 'DB_function.php';
$db1=new DB_Function();
$data=$_REQUEST['Contingency'];
$response=array("error"=>False);
	$array = json_decode($data,true);
// $reference_no = $array[0]['empid']."/".date("Y")."/".rand(100000, 999999);
//$month = implode(",", $_POST['month']);
$res = 0;
$cnt = $array[0]['rowCount'];
// $month = implode(",",$array[0]['cont_month']);
$month=$array[0]['cont_month'];
$sum = 0;

for($i=0;$i<$cnt;$i++)
{
	$sum = $sum + (int)$array[$i]['cont_amount'];
}
//date_timezone_set("Asia/kolkata");
$time = date("Y/m/d")." ".date("h:i:sa");
echo $insert_master_sql = "insert into master_cont (empid, reference_no, month, total_amount, objective, status, forward_status, rejected, created_at) VALUES('".$array[0]['empid']."', '".$array[0]['referenceno']."', '".$month."', '".$sum."', '".$array[0]['objective']."', '1', '0', '0', '".$time."')";
$result = mysql_query($insert_master_sql);
echo mysql_error();
$id = mysql_insert_id() or die(mysql_error());
if($result)
{
	for($i=0;$i<$cnt;$i++)
	{
		if(!empty($array[$i]['cont_date']) || isset($array[$i]['cont_date']))
		{
			echo $insert_sql = "insert into add_cont(empid, reference_no, cont_date, from_place, to_place, kms, rate, amount, objective, status, created_at, set_no) values('".$array[0]['empid']."', '".$array[0]['referenceno']."', '".$array[$i]['cont_date']."', '".$array[$i]['cont_from']."', '".$array[$i]['cont_to']."', '".$array[$i]['cont_kms']."', '".$array[$i]['cont_rt_pr_km']."', '".$array[$i]['cont_amount']."', '".$array[0]['objective']."', '1', NOW(), '".$id."')";
		
			$result = mysql_query($insert_sql);
			echo mysql_error();
			if($result){
				$res = $res+1;
			}
		}
	}
}
if($res == $cnt){
	echo "<script>alert('Contigency bills are added');</script>";
	
	$response['error']=False;
	$response['msg']="Contigency bills are added";
	echo json_encode($response);
}
else if($res < $cnt && $res != 0){
	echo "<script>alert('Contingency successfully added, but some not added. Please Check!');</script>";
	$response['error']=False;
	$response['msg']="Contingency successfully added, but some not added. Please Check!";
	echo json_encode($response);
}
else{
	echo "<script>alert('Something went wrong');</script>";
	$response['error']=False;
	$response['msg']="Something went wrong";
	echo json_encode($response);
}
?>