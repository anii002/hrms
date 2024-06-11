<?php 
	
	include("../dbconfig/dbcon.php");
	session_start();

	date_default_timezone_set('Asia/Kolkata');
	$date1=date("d/m/Y h:i:s");
	if(isset($_POST['submit']))
	{
		$Tp_cnt=0;
		$Tp_amt=0;
		$Sp_cnt=0;
		$Sp_amt=0;
		$Hp_cnt=0;
		$Hp_amt=0;
		$otherp_cnt=0;
		$otherp_amt=0;
		// $ref = rand(10000,999999);
		$year = date("Y");
        $reference = $_POST['user_ref_no'];
		$_SESSION['empid'];
		$t_main_rows=$_POST['sr1'];
		$total_rows=$_POST['sr1']+1;

		// $mts=implode(",", $_POST['month']);
		$mts=$_POST['user_month'];
		$yr=$_POST['user_year'];
		$object=$_POST['object'];
		$cardpass=$_POST['cardpass'];
		$u_amount=$_POST['u_amount'];
		
		echo mysql_error();
		// echo "<br>";
		$length=0;
		$date_array = array();
		$_POST['date0'];
		// echo "<br>";echo "<br>";echo "<br>";

		for ($i=0; $i <$total_rows; $i++) 
		{ 
			$date_array[]=$_POST['date'.$i];
			// echo "<br> PER ".$_POST['per'.$i].$_POST['amt'.$i];
			$length++;
		}
		
		$tr1=count($date_array);
		 function returnDates($fromdate, $todate) {
		    $fromdate = \DateTime::createFromFormat('d/m/Y', $fromdate);
		    $todate = \DateTime::createFromFormat('d/m/Y', $todate);
		    return new \DatePeriod(
		        $fromdate,
		        new \DateInterval('P1D'),
		        $todate->modify('+1 day')
		    );
		}
		$d1=0;
		$datePeriod = returnDates($_POST['date0'], $_POST['date'.$t_main_rows]);
		foreach($datePeriod as $date) {
		    $dates[$d1]=$date->format('d/m/Y');
		    $d1++;
		    
		}
		//print_r($dates);
		//echo "<br>";
		//print_r($date_array);
		 $tr=count($dates);
		$lm=0;
		for($j=0; $j<$tr; $j++)
		{
			
			if(in_array($dates[$j], $date_array))
			{
				if($lm=="0")
				{
					$tamount=0;	
				//echo "<br>".$k;
				for($k=0; $k<$total_rows; $k++)
					{
						$date=$_POST['date'.$k];
						$type=$_POST['type'.$k];
						$other=$_POST['other'.$k];
						$dtime=$_POST['dtime'.$k];
						$atime=$_POST['atime'.$k];
						$per=$_POST['per'.$k];
						$amt=$_POST['amt'.$k];
						$tamount=$tamount+$_POST['amt'.$k];

						if($per == "30%" )
						{
							$Tp_cnt=$Tp_cnt+1;
							$Tp_amt=$Tp_amt+$amt;
						}
						else if($per == "70%")
						{
							$Sp_cnt=$Sp_cnt+1;
							$Sp_amt=$Sp_amt+$amt;
						}
						else if($per == "100%")
						{
							$Hp_cnt=$Hp_cnt+1;
							$Hp_amt=$Hp_amt+$amt;
						}
						else if($other == "5")
						{
							$otherp_cnt=$otherp_cnt+1;
							$otherp_amt=$otherp_amt+$amt;
						}
						$query2="INSERT INTO `taentrydetails`(`empid`, `reference_no`, `taDate`, `journey_type`, `train_no`, `journey_purpose`, `departS`, `departT`, `arrivalS`, `arrivalT`, `distance`, `percent`, `amount`, `status`, `created_at`, cardpass,objective ,`set_number`) VALUES ( '".$_SESSION['empid']."','".$reference."', '".$date."','".$type."','".$_POST['trainno'.$k]."','".$other."','".$_POST['dstn'.$k]."','".$dtime."','".$_POST['astn'.$k]."', '".$atime."','0','".$per."','".$amt."','0','".$date1."','".$cardpass."','".$object."','0'  )";
						// echo "<br>";
							$sql2=mysql_query($query2);
							// echo "<br>";
						$lm++;
					}
				}
				else{
					
				}
			}
			else{
				//$k--;

				// echo "<br>900";
				$Hp_cnt=$Hp_cnt+1;
				$Hp_amt=$Hp_amt+$u_amount;
				$query2="INSERT INTO `taentrydetails`(`empid`, `reference_no`, `taDate`, `journey_type`, `train_no`, `journey_purpose`, `departS`, `departT`, `arrivalS`, `arrivalT`, `distance`, `percent`, `amount`, `status`, `created_at`, cardpass,objective ,`set_number`) VALUES ( '".$_SESSION['empid']."','".$reference."', '".$dates[$j]."','','','','','','', '','0','100%','".$u_amount."','0','".$date1."','".$cardpass."','".$object."','0'  )";
						$sql2=mysql_query($query2);
						 // echo "<br>";
						// echo "<br>Total Amount ".$tamount;
			}

		}
			// echo "<br>Total Amount ".$tamount;

		$query="SELECT `30p_cnt`,`30p_amt`,`70p_cnt`,`70p_amt`,`100p_cnt`,`100p_amt`,`otherp_cnt`,`otherp_amt` FROM `tasummarydetails` WHERE reference_no='".$_POST['user_ref_no']."' ";
		$sql=mysql_query($query);
		$row=mysql_fetch_array($sql);

		$total_30p_cnt=$row['30p_cnt']+$Tp_cnt;
		$total_30p_amt=$row['30p_amt']+$Tp_amt;
		$total_70p_cnt=$row['70p_cnt']+$Sp_cnt;
		$total_70p_amt=$row['70p_amt']+$Sp_amt;
		$total_100p_cnt=$row['100p_cnt']+$Hp_cnt;
		$total_100p_amt=$row['100p_amt']+$Hp_amt;
		$total_otherp_cnt=$row['otherp_cnt']+$otherp_cnt;
		$total_otherp_amt=$row['otherp_amt']+$otherp_amt;

		$query3="UPDATE `tasummarydetails` SET `30p_cnt`='".$total_30p_cnt."',`30p_amt`='".$total_30p_amt."',`70p_cnt`='".$total_70p_cnt."',`70p_amt`='".$total_70p_amt."',`100p_cnt`='".$total_100p_cnt."',`100p_amt`='".$total_100p_amt."',`otherp_cnt`='".$total_otherp_cnt."',`otherp_amt`='".$total_otherp_amt."',`created_at`='".$date1."' WHERE `reference_no`='".$_POST['user_ref_no']."'  ";


		$sql3=mysql_query($query3);
		echo "<script> window.location='Show_unclaimed_TA.php'; </script>";
	}

?>