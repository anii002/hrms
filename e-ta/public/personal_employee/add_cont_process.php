<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

include("../../dbconfig/dbcon.php");
	error_reporting(0);
	/*for($i=0;$i<count($_REQUEST['date']);$i++)
	{
		echo $_REQUEST['date'][$i]."<br>";
		echo $_REQUEST['from'][$i]."<br>";
		echo $_REQUEST['to'][$i]."<br>";
		echo $_REQUEST['kms'][$i]."<br>";
		echo $_REQUEST['rate'][$i]."<br>";
		echo $_REQUEST['total'][$i]."<br>";
	}*/

	if($_REQUEST['button']!="update")
	{
		/*$query=mysql_query("select *from continjency_master");
		$cnt=0;
		while($result=mysql_fetch_array($query))
		{
			if($_REQUEST['refernce']==$result['reference'])
			$cnt++;
		}*/
		
		for($show=0;$show<count($_REQUEST['date']);$show++)
		{ 
				$data=$_REQUEST['date'][$show];
				$from=$_REQUEST['from'][$show];
				$to=$_REQUEST['to'][$show];
				$kms=$_REQUEST['kms'][$show];
				$rate=$_REQUEST['rate'][$show];
				$total=$_REQUEST['total'][$show];
				
				
			if($show==0)
			{
				
			$query_outer = "insert into continjency_master(empid,reference,total_amount,set_number) values('".$_REQUEST['empid']."','".$_REQUEST['refernce']."','$total','".$_REQUEST['setno']."')";
		  
			  $result_outer = mysql_query($query_outer);
			  $cid = mysql_insert_id();
			}
			$query = "INSERT INTO `continjency`(`cntdate`, `cntfrom`, `cntTo`, `kms`, `rate_per_km`, `total_amount`,`set_number`,`cid`) VALUES ('$data','$from','$to','$kms','$rate','$total','".$_REQUEST['setno']."','$cid')";
			//$_SESSION['table_ref']=$reference;
			$result = mysql_query($query) or die(mysql_error());
			if($result)
				echo "<script>alert('Continjency Claimed Successfully...'); window.location='show_seperate_claim1.php?id=".$_REQUEST['refernce']."';</script>";
			else
				echo "<script>alert('Failed to Claim Continjency...'); windows.location='show_seperate_claim1.php?id=".$_REQUEST['refernce']."';</script>";
		}
	}
	else
	{
		$delete  = mysql_query("select id from continjency_master where reference='".$_REQUEST['refernce']."' and set_number='".$_REQUEST['setno']."'");

		$delete_id = mysql_fetch_array($delete);

		$delete_query = mysql_query("delete from continjency_master where id = '".$delete_id['id']."'");

		$delete_details = mysql_query("delete from continjency where cid='".$delete_id['id']."'");

		for($show=0;$show<count($_REQUEST['date']);$show++)
		{ 
				$data=$_REQUEST['date'][$show];
				$from=$_REQUEST['from'][$show];
				$to=$_REQUEST['to'][$show];
				$kms=$_REQUEST['kms'][$show];
				$rate=$_REQUEST['rate'][$show];
				$total=$_REQUEST['total'][$show];
				
				
			if($show==0)
			{
				
			$query_outer = "insert into continjency_master(empid,reference,total_amount,set_number) values('".$_REQUEST['empid']."','".$_REQUEST['refernce']."','$total','".$_REQUEST['setno']."')";
		  
			  $result_outer = mysql_query($query_outer);
			  $cid = mysql_insert_id();
			}
			$query = "INSERT INTO `continjency`(`cntdate`, `cntfrom`, `cntTo`, `kms`, `rate_per_km`, `total_amount`,`set_number`,`cid`) VALUES ('$data','$from','$to','$kms','$rate','$total','".$_REQUEST['setno']."','$cid')";
			//$_SESSION['table_ref']=$reference;
			$result = mysql_query($query) or die(mysql_error());
			if($result)
				echo "<script>alert('Continjency Claimed Successfully...'); window.location='show_seperate_claim1.php?id=".$_REQUEST['refernce']."';</script>";
			else
				echo "<script>alert('Failed to Claim Continjency...'); windows.location='show_seperate_claim1.php?id=".$_REQUEST['refernce']."';</script>";
		}
	}
	
	

?>