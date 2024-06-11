<?php
session_start();
include('../dbconfig/dbcon.php');

$date = date("Y-m-d h:i:s");

$cnt = 0;
echo $flag = count($_POST['selected_summary']);
if($flag>=1){
foreach($_POST['selected_summary'] as $sumid)
{
	$u_query="UPDATE master_summary SET pa_status='1',PA_approved_time='".$date."' where summary_id='".$sumid."' ";

	$result = mysql_query($u_query);

	if($result)
	{
		$cnt = $cnt + 1;
	}
}

if($flag == $cnt)
{   
    $empid1=$_SESSION['empid'];
    
    $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
    $msg='APO forward the '.$_POST['selected_summary'].' summaries to Account Dept ';
    user_activity($empid1,$file_name,'Forward Summary',$msg);
	echo "<script>alert('successfully forwarded to accountant..');window.location='approve_list.php';</script>";
} 
else
{
    $empid1=$_SESSION['empid'];
    $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
    $msg='APO unable to forward the '.$_POST['selected_summary'].' summaries to Account Dept ';
    user_activity($empid1,$file_name,'Forward Summary',$msg);
	echo "<script>alert('Failed to Forward...');window.location='approve_summary.php';</script>";
}
}else{
    $empid1=$_SESSION['empid'];
    $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
    $msg='APO not selected any summary to forward';
    user_activity($empid1,$file_name,'Forward Summary',$msg);
    echo "<script>alert('Plz Select Atleast One TA to forward..');window.location='approve_summary.php';</script>";
}

?>