<?php
session_start();
include('../dbconfig/dbcon.php');
$date = date("Y-m-d h:i:s");
$cnt = 0;
echo $flag = count($_POST['selected_summary']);
foreach($_POST['selected_summary'] as $sumid)
{
	$u_query="UPDATE master_summary SET pa_status='1',PA_approved_time='".$date."' where 	summary_id='".$sumid."' ";

	$result = mysql_query($u_query);

	if($result)
	{
		$cnt = $cnt + 1;
	}
}

if($flag == $cnt)
{
    $empid=$_SESSION['empid'];
    $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
    $msg='PA forward '.$_POST['selected_summary'].' summaries to Account dept';
    user_activity($empid,$file_name,'Forward Summaries',$msg);
	echo "<script>alert('successfully forwarded to accountant..');window.location='approve_list.php';</script>";
} 
else
{
    $empid=$_SESSION['empid'];
    $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
    $msg='PA unable to forward '.$_POST['selected_summary'].' summaries to Account dept';
    user_activity($empid,$file_name,'Forward Summaries',$msg);
	echo "<script>alert('Failed to Forward...');window.location='approve_summary.php';</script>";
}
?>
			