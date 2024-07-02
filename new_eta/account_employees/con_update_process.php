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

$update_cont_mas=mysqli_query($conn,"UPDATE `continjency_master` SET `total_amount`='".$sum."',`created_date`='".date("d/m/Y h:i:s")."' WHERE reference='".$_POST['u_ref_no']."' ");
$delete_cont_sql = mysqli_query($conn,"DELETE FROM `continjency` WHERE `reference`='".$_POST['u_ref_no']."' ");

if($update_cont_mas && $delete_cont_sql)
{
	for($i=0;$i<$total_rows;$i++)
	{
      $insert_sql = "INSERT INTO `continjency`(`reference`, `cntdate`, `cntfrom`, `cntTo`, `kms`, `rate_per_km`, `total_amount`, `set_number`, `objective`) VALUES ('".$_POST['u_ref_no']."','".$_POST['date'.$i]."','".$_POST['dstn'.$i]."','".$_POST['astn'.$i]."','".$_POST['distance'.$i]."', '".$_POST['per'.$i]."', '".$_POST['amt'.$i]."','0','".$_POST['object']."')";
		$result = mysqli_query($conn,$insert_sql);
		if($result){
			$res = $res+1;
		}
		
	}
}

if($res == $total_rows){
    $empid=$_SESSION['empid'];
    $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
    user_activity($empid,$file_name,'Update Contingency','Acct Employee update the Contingency');
	echo "<script>alert('Contigency bills are added');window.location='show_saved_cont.php';</script>";
}
else{
    $empid=$_SESSION['empid'];
    $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
    user_activity($empid,$file_name,'Update Contingency','Acct Employee unable to update the Contingency');
	echo "<script>alert('Contingency bill not added...');window.location='update_cont_sep.php';</script>";
}
?>