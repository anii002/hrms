<?php 
session_start();
date_default_timezone_set("Asia/kolkata");
include("../dbconfig/dbcon.php");

$res = 0;
$month = implode(",",$_POST['month']);
$year = $_POST['year'];	
$sum = 0;
$_POST['sr']+1;
$total_rows=$_POST['sr']+1;
$ref = rand(10000,999999);
$year1 = date("Y");
$reference_no = $_SESSION['empid']."/".$year1."/".$ref;
for($j=0;$j<$total_rows;$j++)
{
	$sum = $sum + (int)$_POST['total'.$j];
	//	echo $_POST['total'.$j];
}
$time = date("Y/m/d")." ".date("h:i:sa");

$insert_master_sql = "INSERT INTO `continjency_master`(`reference`, `month`, `year`, `empid`, `total_amount`, `set_number`, `generate`,`forward_status`) VALUES ('".$reference_no."','".$month."','".$year."','".$_SESSION['empid']."','".$sum."','0','0','0')";

$result = mysqli_query($conn,$insert_master_sql);

$query = mysqli_query($conn,"SELECT `id` FROM `continjency_master` ORDER BY id DESC");
$row = mysqli_fetch_array($query);
$id1 = $row['id'];

if($result)
{
	for($i=0;$i<$total_rows;$i++)
	{
		$insert_sql = "INSERT INTO `continjency`(`reference`, `cntdate`, `cntfrom`, `cntTo`, `kms`, `rate_per_km`, `total_amount`, `set_number`, `objective`, `cid`) VALUES ('".$reference_no."','".$_POST['date'.$i]."','".$_POST['from'.$i]."','".$_POST['to'.$i]."','".$_POST['kms'.$i]."', '".$_POST['rate'.$i]."', '".$_POST['total'.$i]."','0','".$_POST['objective']."','".$id1."')";
		$result = mysqli_query($conn,$insert_sql);
		if($result){
			$res = $res+1;
		}
		
	}
}
if($res == $total_rows){
	echo "<script>alert('Contigency bills are added');window.location='show_saved_cont.php';</script>";
}
else if($res < $total_rows && $res != 0){
	echo "<script>alert('Contingency successfully added, but some not added. Please Check!');window.location='Show_unclaimed_TA.php';</script>";
}
else{
	echo "<script>alert('Contingency bill not added...');window.location='add_cont_without_ta.php';</script>";
}
?>