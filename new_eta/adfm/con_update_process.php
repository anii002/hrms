<?php
session_start();
date_default_timezone_set("Asia/kolkata");
include("../dbconfig/dbcon.php");
        
$res = 0;
$sum = 0;
$total_rows=$_POST['sr1']+1;

for($j=0;$j<$total_rows;$j++)
{
	$sum = $sum + (int)$_POST['amt'.$j];
	//	echo $_POST['total'.$j];
}

$update_cont_mas=mysql_query("UPDATE `continjency_master` SET `total_amount`='".$sum."',`created_date`='".date("d/m/Y h:i:s")."' WHERE reference='".$_POST['u_ref_no']."' ");

$delete_cont_sql = mysql_query("DELETE FROM `continjency` WHERE `reference`='".$_POST['u_ref_no']."' ");

if($update_cont_mas && $delete_cont_sql)
{
	for($i=0;$i<$total_rows;$i++)
	{
      $insert_sql = "INSERT INTO `continjency`(`reference`, `cntdate`, `cntfrom`, `cntTo`, `kms`, `rate_per_km`, `total_amount`, `set_number`, `objective`) VALUES ('".$_POST['u_ref_no']."','".$_POST['date'.$i]."','".$_POST['dstn'.$i]."','".$_POST['astn'.$i]."','".$_POST['distance'.$i]."', '".$_POST['per'.$i]."', '".$_POST['amt'.$i]."','0','".$_POST['object']."')";
		$result = mysql_query($insert_sql);
		if($result){
			$res = $res+1;
		}
		
	}
}

if($res == $total_rows){
	echo "<script>alert('Contigency bills are updated');window.location='show_saved_cont.php';</script>";
}
else{
	echo "<script>alert('Contingency bill not added...');window.location='update_cont_sep.php';</script>";
}
?>