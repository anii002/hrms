<?php 
session_start();
date_default_timezone_set("Asia/kolkata");
include("../dbconfig/dbcon.php");

	$reference_no = $_POST['user_ref_no'];
	$set_no = $_POST['user_set_no'];
	$res = 0;
	//  $month = implode(",",$_POST['month']);
    //  $year = $_POST['year'];
	$month = $_POST['user_month'];
	$year = $_POST['user_year'];
	$sum = 0;
	$total_rows=$_POST['sr']+1;


	for($j=0;$j<$total_rows;$j++)
	{
		$sum = $sum + (int)$_POST['total'.$j];
		//echo $_POST['total'.$j];
	}
	//date_timezone_set("Asia/kolkata");
	$time = date("Y/m/d")." ".date("h:i:sa");


	$insert_master_sql = "insert into master_cont (empid, reference_no, ContYear, month, total_amount, objective, status, forward_status, rejected, created_at,set_no) VALUES('".$_SESSION['empid']."', '".$reference_no."', '".$year."', '".$month."', '".$sum."', '".$_POST['objective']."', '1', '0', '0', '".$time."','".$set_no."')";
	$result = mysql_query($insert_master_sql);

	echo mysql_error();

	// $id = mysql_insert_id() or die(mysql_error());

	if($result)
	{
		for($i=0;$i<$total_rows;$i++)
		{

				$insert_sql = "insert into add_cont(empid, reference_no, cont_date, from_place, to_place, kms, rate, amount, objective, status, created_at, set_no) values('".$_SESSION['empid']."', '".$reference_no."', '".$_POST['date'.$i]."', '".$_POST['from'.$i]."', '".$_POST['to'.$i]."', '".$_POST['kms'.$i]."', '".$_POST['rate'.$i]."', '".$_POST['total'.$i]."', '".$_POST['objective']."', '1', NOW(), '".$set_no."')";
			
				$result = mysql_query($insert_sql);
				echo mysql_error();
				if($result){
					$res = $res+1;
				}
			
		}
	}
	if($res == $total_rows){
	    $empid=$_SESSION['empid'];
        $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
        user_activity($empid,$file_name,'Save Contingency','ADFM save the Contingency');
		echo "<script>alert('Contigency bills are added');window.location='Show_unclaimed_TA.php';</script>";
	}
	else if($res < $total_rows && $res != 0){
	    $empid=$_SESSION['empid'];
        $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
        user_activity($empid,$file_name,'Save Contingency','ADFM unable to save the Contingency');
		echo "<script>alert('Contingency successfully added, but some not added. Please Check!');window.location='Show_unclaimed_TA.php';</script>";
	}
	else{
	    $empid=$_SESSION['empid'];
        $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
        user_activity($empid,$file_name,'Save Contingency','ADFM unable to save the Contingency');
		echo "<script>alert('Contingency bill not added...');window.location='add_cont.php';</script>";
	}
?>