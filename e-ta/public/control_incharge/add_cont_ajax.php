<?php 
session_start();
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

include("../../dbconfig/dbcon.php");

$reference_no = $_SESSION['empid']."/".date("Y")."/".rand(100000, 999999);
//$month = implode(",", $_POST['month']);
$res = 0;
$cnt = count($_POST['date']);
$month = implode(",",$_POST['month']);
$year = $_POST['year'];
$sum = 0;

for($i=0	;$i<$cnt;$i++)
{
	$sum = $sum + (int)$_POST['total'][$i];
}
//date_timezone_set("Asia/kolkata");
$time = date("Y/m/d")." ".date("h:i:sa");
$insert_master_sql = "insert into master_cont (empid, reference_no, ContYear, month, total_amount, objective, status, forward_status, rejected, created_at) VALUES('".$_SESSION['empid']."', '".$reference_no."', '".$year."', '".$month."', '".$sum."', '".$_POST['objective']."', '1', '0', '0', '".$time."')";
$result = mysql_query($insert_master_sql);
echo mysql_error();
$id = mysql_insert_id() or die(mysql_error());
if($result)
{
	for($i=0;$i<$cnt;$i++)
	{
		if(!empty($_POST['date'][$i]) || isset($_POST['date'][$i]))
		{
			$insert_sql = "insert into add_cont(empid, reference_no, cont_date, from_place, to_place, kms, rate, amount, objective, status, created_at, set_no) values('".$_SESSION['empid']."', '".$reference_no."', '".$_POST['date'][$i]."', '".$_POST['from'][$i]."', '".$_POST['to'][$i]."', '".$_POST['kms'][$i]."', '".$_POST['rate'][$i]."', '".$_POST['total'][$i]."', '".$_POST['objective']."', '1', NOW(), '".$id."')";
		
			$result = mysql_query($insert_sql);
			echo mysql_error();
			if($result){
				$res = $res+1;
			}
		}
	}
}
if($res == $cnt){
	echo "<script>alert('Contigency bills are added');window.location='show_unclaimed_cont.php';</script>";
}
else if($res < $cnt && $res != 0){
	echo "<script>alert('Contingency successfully added, but some not added. Please Check!');window.location='show_unclaimed_cont.php';</script>";
}
else{
	echo "<script>alert('Contingency bill not added...');window.location='add_cont.php';</script>";
}
?>