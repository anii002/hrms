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
	
	$Tp_cnt1=0;
	$Tp_amt1=0;
	$Sp_cnt1=0;
	$Sp_amt1=0;
	$Hp_cnt1=0;
	$Hp_amt1=0;
	$otherp_cnt1=0;
	$otherp_amt1=0;
	
	// $ref = rand(10000,999999);
	$year = date("Y");
    $old_reference = $_POST['user_ref_no'];
	$_SESSION['empid'];
	$t_main_rows=$_POST['sr1'];
	$total_rows=$_POST['sr1']+1;

	// $mts=implode(",", $_POST['month']);
	// $mts=$_POST['user_month'];
	$mths=$_POST['month'];
	$obj_month = implode(',', $mths);	
	$month_count=count($mths);
	$yr=$_POST['user_year'];
	$object=$_POST['object'];
	$cardpass=$_POST['cardpass'];
	$u_amount=$_POST['u_amount'];
	
	$sql=mysql_query("SELECT `set_number` FROM `taentrydetails` WHERE `reference_no`='".$old_reference."' AND empid='".$_SESSION['empid']."' ORDER BY set_number DESC limit 1");
	echo mysql_error();
	$result=mysql_fetch_array($sql);
	$set_no=$result['set_number'];
	$set_no=$set_no+1;
	
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
	if($month_count>1)
	{
		$object=$_POST['object']."(Split journey of Month ".$obj_month.")";
		$object1=$_POST['object'];
		function returnDates($fromdate, $todate) {
		    $fromdate = \DateTime::createFromFormat('d/m/Y', $fromdate);
    		$todate = \DateTime::createFromFormat('d/m/Y', $todate);
    		return new \DatePeriod(
        	$fromdate,
        	new \DateInterval('P1D'),
        	$todate->modify('+1 day'));
		}
		$d1=0;
		$datePeriod = returnDates($_POST['date0'], $_POST['date'.$t_main_rows]);
		foreach($datePeriod as $date) {
    		$dates[$d1]=$date->format('d/m/Y');
    		$d1++;
   		}
	   	//print_r($dates);
	   //	echo "<br>";
	   	//print_r($date_array);
		//echo "<br><br><br>";
		//$k=0;

		// echo $month_count."<br>".$total_rows."<br>";
		for($mcnt=0; $mcnt<$month_count; $mcnt++)
		{	
			echo $mcnt."<br>";
			if($mcnt == 0)
			{
				$tr=count($dates);
				$lm=0;
				$c=0;
				for($j=0; $j<$tr; $j++)
				{		
					if(in_array($dates[$j], $date_array))
					{	
						if($lm=="0")
						{
							$tamount=0;	
							//echo "<br>".$k;
							$months=array();
							$current_month='';
							$next_month='';
							for($k=0; $k<$total_rows; $k++)
							{
								$date = $_POST['date'.$k];
								$d = date_parse_from_format("Y-m-d", $date);
								$current_month1= $d["month"];
								$current_month= $d["month"];								
								array_push($months, $current_month);
								// echo $months[0];
								if($months[0] == $current_month)
								{
									$date=$_POST['date'.$k];
									$type=$_POST['type'.$k];
									$other=$_POST['other'.$k];
									$dtime=$_POST['dtime'.$k];
									$atime=$_POST['atime'.$k];
									$distance=$_POST['distance'.$k];
									$per=$_POST['per'.$k];
									$amt=$_POST['amt'.$k];
									$tamount=$tamount+$_POST['amt'.$k];
                                    
                                    if($c == 0)
                                    {						
                                    	$duplicate_query="SELECT empid, reference_no, taDate, departT, arrivalT, percent,amount FROM taentrydetails WHERE empid='".$_SESSION['empid']."' AND reference_no='".$old_reference."' AND taDate='".$date."' order by id desc limit 1";
                                    	$result=mysql_query($duplicate_query);
                                    	$fet=mysql_fetch_array($result);
                                    	$get_per=$fet['percent'];
                                    
                                    	if($get_per=="30%" || $get_per=="30"){
                                    		$Tp_cnt1=1;
                                    		$Tp_amt1=$u_amount*0.3;
                                    	}else if($get_per=="70%" || $get_per=="70"){
                                    		$Sp_cnt1=1;
                                    		$Sp_amt1=$u_amount*0.7;
                                    	}else if($get_per=="100%" || $get_per=="100"){
                                    		$Hp_cnt1=1;
                                    		$Hp_amt1=$u_amount*1;
                                    	}
                                    
                                    	$chk_record=mysql_num_rows($result);
                                    	if($chk_record >= 1)
                                    	{
                                    		$time_array1=array();
                                    		$dates_arr=array();
                                    		// Update Previous Date Calculation
                                    		$p_update="UPDATE `taentrydetails` SET `percent`='0',`amount`='0' WHERE `reference_no`='".$old_reference."' and empid='".$_SESSION['empid']."' and taDate='".$date."'";
                                    		$p_res=mysql_query($p_update);
                                    		
                                    		$time_array=array();
                                    		$result=mysql_query($duplicate_query);
                                    		while ($fet_data=mysql_fetch_array($result)){
                                    		  	$p_dtime="00:00";
                                    		  	$p_atime=$fet_data['arrivalT'];
                                    			$p_timediff=$p_atime;
                                    		}
                                    		
                                    		if($atime=='')
                                    		{
                                    			$dateDiff = intval((strtotime("23:59")-strtotime($dtime))/60);
                                    		}
                                    		else
                                    		{
                                    			array_push($dates_arr,$date);
                                    			if($dates_arr[0] == $dates[$k+1])
                                    			{
                                    				$dateDiff = intval((strtotime($atime)-strtotime($dtime))/60);
                                    			}
                                    			else
                                    			{
                                    				$atime='23:59';
                                    				$dateDiff = intval((strtotime($atime)-strtotime($dtime))/60);
                                    			}
                                    			
                                    		}
                                    		
                                    		array_push($time_array1,$dateDiff);
                                    		$add1=array_sum($time_array1);
                                    		$tinhr1 = intval($add1/60);
                                    		$tinmn1 = $add1%60;
                                    		$a_timediff1=$tinhr1.":".$tinmn1;
                                    		 
                                    		$time = 0;
                                    		$p_timediff;
                                    		$a_timediff1;
                                    		$time_arr =  array($p_timediff,$a_timediff1);
                                    		foreach ($time_arr as $time_val) {
                                    		    $time +=explode_time($time_val);  
                                    		}
                                    
                                    
                                    		$t_time=second_to_hhmm($time);
                                    		$t_len=strlen($t_time);
                                    		if($t_len < 5)
                                    		{
                                    			$t_time="0".$t_time;
                                    		}
                                    		else
                                    		{
                                    			$t_time=$t_time;
                                    		}
                                    		if(strtotime($t_time) <= strtotime("06:00"))
                                    		{
                                    			 $per="30%";
                                    			 $amt=$u_amount*0.3;	
                                    		}
                                    		else if(strtotime($t_time) > strtotime("06:00") && strtotime($t_time) <=strtotime("12:00"))
                                    		{
                                    			 $per="70%";
                                    			 $amt=$u_amount*0.7;								
                                    		}
                                    		else if(strtotime($t_time) > strtotime("12:00"))
                                    		{
                                    			$per="100%";
                                    			$amt=$u_amount*1;
                                    		}								
                                    	}
                                    	$c++;
                                    }
									if($per == "30%" || $per == "30")
									{
										$Tp_cnt=$Tp_cnt+1;
										$Tp_amt=$Tp_amt+$amt;
									}
									else if($per == "70%" || $per == "70")
									{
										$Sp_cnt=$Sp_cnt+1;
										$Sp_amt=$Sp_amt+$amt;
									}
									else if($per == "100%" || $per == "100")
									{
										$Hp_cnt=$Hp_cnt+1;
										$Hp_amt=$Hp_amt+$amt;
									}
								// 	else if($other == "5")
								// 	{
								// 		$otherp_cnt=$otherp_cnt+1;
								// 		$otherp_amt=$otherp_amt+$amt;
								// 	}
									$query2="INSERT INTO `taentrydetails`(`empid`, `reference_no`, `taDate`, `journey_type`, `train_no`, `journey_purpose`, `departS`, `departT`, `arrivalS`, `arrivalT`, `distance`, `percent`, `amount`, `status`, `created_at`,cardpass,objective ,`set_number`) VALUES ( '".$_SESSION['empid']."','".$old_reference."', '".$date."','".$type."','".$_POST['trainno'.$k]."','".$other."','".$_POST['dstn'.$k]."','".$dtime."','".$_POST['astn'.$k]."', '".$atime."','".$distance."','".$per."','".$amt."','0','".$date1."','".$cardpass."','".mysql_real_escape_string($object1)."','".$set_no."'  )";
									// echo "<br><br>";
									$sql2=mysql_query($query2);
										// echo "<br>";
									$lm++;
								}
							}
							// print_r($months);
						}
						else
						{
							
						}
					}
					else
					{
					    $d = date_parse_from_format("Y-m-d", $dates[$j]);
						$current_month1= $d["month"];								
						$current_month= $d["month"];								
						array_push($months, $current_month);
						if($months[0] == $current_month)
						{
    						$Hp_cnt=$Hp_cnt+1;
    						$Hp_amt=$Hp_amt+$u_amount;
    						$query2="INSERT INTO `taentrydetails`(`empid`, `reference_no`, `taDate`, `journey_type`, `train_no`, `journey_purpose`, `departS`, `departT`, `arrivalS`, `arrivalT`, `distance`, `percent`, `amount`, `status`, `created_at`, cardpass,objective ,`set_number`) VALUES ( '".$_SESSION['empid']."','".$old_reference."', '".$dates[$j]."','','','','','','', '','0','100%','".$u_amount."','0','".$date1."','".$cardpass."','".mysql_real_escape_string($object)."','".$set_no."'  )";
    						// echo "<br>";
    						$sql2=mysql_query($query2);
						}
					}
				}
				$query="SELECT `30p_cnt`,`30p_amt`,`70p_cnt`,`70p_amt`,`100p_cnt`,`100p_amt`,`otherp_cnt`,`otherp_amt` FROM `tasummarydetails` WHERE reference_no='".$_POST['user_ref_no']."' ";
				$sql=mysql_query($query);
				$row=mysql_fetch_array($sql);

				$total_30p_cnt=($row['30p_cnt']+$Tp_cnt)-$Tp_cnt1;
		$total_30p_amt=($row['30p_amt']+$Tp_amt)-$Tp_amt1;
		$total_70p_cnt=($row['70p_cnt']+$Sp_cnt)-$Sp_cnt1;
		$total_70p_amt=($row['70p_amt']+$Sp_amt)-$Sp_amt1;
		$total_100p_cnt=($row['100p_cnt']+$Hp_cnt)-$Hp_cnt1;
		$total_100p_amt=($row['100p_amt']+$Hp_amt)-$Hp_amt1;
		$total_otherp_cnt=($row['otherp_cnt']+$otherp_cnt)-$otherp_cnt1;
		$total_otherp_amt=($row['otherp_amt']+$otherp_amt)-$otherp_amt1;

				$query3="UPDATE `tasummarydetails` SET `30p_cnt`='".$total_30p_cnt."',`30p_amt`='".$total_30p_amt."',`70p_cnt`='".$total_70p_cnt."',`70p_amt`='".$total_70p_amt."',`100p_cnt`='".$total_100p_cnt."',`100p_amt`='".$total_100p_amt."',`otherp_cnt`='".$total_otherp_cnt."',`otherp_amt`='".$total_otherp_amt."',`created_at`='".$date1."' WHERE `reference_no`='".$_POST['user_ref_no']."'  ";
				// echo "<br><br><br>NEW TA ENTRY MASTER STARTED............";
				$sql3=mysql_query($query3);
			}
			else
			{
				$ref = rand(10000,999999);
				$reference = $_SESSION['empid']."/".$year."/".$ref;
				$array_count=count($dates);
				$query1="INSERT INTO `taentry_master`(`TAMonth`, `TAYear`, `empid`, `reference_no`, `cardpass`, `objective`, `status`, `forward_status`, `created_date`, `is_rejected`, `reason`) VALUES ('".$mths[$mcnt]."','".$year."','".$_SESSION['empid']."','".$reference."','".$cardpass."','".mysql_real_escape_string($object)."','0','0','".$date1."','0','null' )";
				$sql1=mysql_query($query1);
				// echo "<br>";
				echo mysql_error();
			   	$lm=0;
			   	$Tp_cnt=0;
				$Tp_amt=0;
				$Sp_cnt=0;
				$Sp_amt=0;
				$Hp_cnt=0;
				$Hp_amt=0;
				$otherp_cnt=0;
				$otherp_amt=0;

				for($kj=0; $kj<$array_count; $kj++)
				{
					
					$split_month1=substr($dates[$kj], 3,2); 
					if($mths[$mcnt]==$split_month1)
					{
						if(in_array($dates[$kj], $date_array))
						{
							$tamount=0;
							if($lm=="0")
							{
								for($k=0; $k<$total_rows; $k++)
								{
									$split_month2=substr($date_array[$k], 3,2);
									if($mths[$mcnt]==$split_month2)
									{
										$date=$_POST['date'.$k];
										$type=$_POST['type'.$k];
										$other=$_POST['other'.$k];
										$dtime=$_POST['dtime'.$k];
										$atime=$_POST['atime'.$k];
										$distance=$_POST['distance'.$k];
										$per=$_POST['per'.$k];
										$amt=$_POST['amt'.$k];
										$tamount=$tamount+$_POST['amt'.$k];
										if($per == "30%" || $per == "30")
										{
											$Tp_cnt=$Tp_cnt+1;
											$Tp_amt=$Tp_amt+$amt;
										}
										else if($per == "70%" || $per == "70")
										{
											$Sp_cnt=$Sp_cnt+1;
											$Sp_amt=$Sp_amt+$amt;
										}
										else if($per == "100%" || $per == "100")
										{
											$Hp_cnt=$Hp_cnt+1;
											$Hp_amt=$Hp_amt+$amt;
										}
								// 		else if($other == "5")
								// 		{
								// 			$otherp_cnt=$otherp_cnt+1;
								// 			$otherp_amt=$otherp_amt+$amt;
								// 		}
										$query2="INSERT INTO `taentrydetails`(`empid`, `reference_no`, `taDate`, `journey_type`, `train_no`, `journey_purpose`, `departS`, `departT`, `arrivalS`, `arrivalT`, `distance`, `percent`, `amount`, `status`, `created_at`, cardpass,objective ,`set_number`) VALUES ( '".$_SESSION['empid']."','".$reference."', '".$date."','".$type."','".$_POST['trainno'.$k]."','".$other."','".$_POST['dstn'.$k]."','".$dtime."','".$_POST['astn'.$k]."', '".$atime."','".$distance."','".$per."','".$amt."','0','".$date1."','".$cardpass."','".mysql_real_escape_string($object)."','0'  )";
										$sql2=mysql_query($query2);
										// echo "<br>";
										$lm++;
									}
								}
							}
						}
						else
						{
							//echo "K=".$k;
							$Hp_cnt=$Hp_cnt+1;
							$Hp_amt=$Hp_amt+$u_amount;
							$query2="INSERT INTO `taentrydetails`(`empid`, `reference_no`, `taDate`, `journey_type`, `train_no`, `journey_purpose`, `departS`, `departT`, `arrivalS`, `arrivalT`, `distance`, `percent`, `amount`, `status`, `created_at`, cardpass,objective ,`set_number`) VALUES ( '".$_SESSION['empid']."','".$reference."', '".$dates[$kj]."','','','','','','', '','0','100%','".$u_amount."','0','".$date1."','".$cardpass."','".mysql_real_escape_string($object)."','0'  )";
						 	$sql2=mysql_query($query2);	
							// echo "<br>";					  
						}	
					}
					else
					{

					}	
				} // End of array dates for loop
				$query3="INSERT INTO `tasummarydetails`(`empid`, `reference_no`, `month`, `year`, `30p_cnt`, `30p_amt`, `70p_cnt`, `70p_amt`, `100p_cnt`, `100p_amt`, `otherp_cnt`, `otherp_amt`, `is_summary_generated`, `created_at`) VALUES ('".$_SESSION['empid']."','".$reference."','".$mths[$mcnt]."','".$year."','".$Tp_cnt."','".$Tp_amt."','".$Sp_cnt."','".$Sp_amt."','".$Hp_cnt."','".$Hp_amt."','".$otherp_cnt."','".$otherp_amt."','0','".$date1."' )";	
				// echo "=============================================================================================================================================<br>";
				$sql3=mysql_query($query3);
				$empid=$_SESSION['empid'];
                $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
                user_activity($empid,$file_name,'Add more TA','ADFM add more TA with another month');
		 	}
		}
	} // Split journey if condition
	// Normal Code start here
	else
	{
		// $query1="INSERT INTO `taentry_master`( `TAMonth`, `TAYear`, `empid`, `reference_no`, `cardpass`, `objective`, `status`, `forward_status`, `created_date`, `is_rejected`, `reason`) VALUES ('".$mths."','".$year."','".$_SESSION['empid']."','".$old_reference."','".$cardpass."','".$object."','0','0','".$date1."','0','null' )";
		//  $sql1=mysql_query($query1);
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
		 $c=0;
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
						$distance=$_POST['distance'.$k];
						$per=$_POST['per'.$k];
						$amt=$_POST['amt'.$k];
						$tamount=$tamount+$_POST['amt'.$k];
                        
                        if($c == 0)
                        {						
                        	$duplicate_query="SELECT empid, reference_no, taDate, departT, arrivalT, percent,amount FROM taentrydetails WHERE empid='".$_SESSION['empid']."' AND reference_no='".$old_reference."' AND taDate='".$date."' order by id desc limit 1";
                        	$result=mysql_query($duplicate_query);
                        	$fet=mysql_fetch_array($result);
                        	$get_per=$fet['percent'];
                        
                        	if($get_per=="30%" || $get_per=="30"){
                        		$Tp_cnt1=1;
                        		$Tp_amt1=$u_amount*0.3;
                        	}else if($get_per=="70%" || $get_per=="70"){
                        		$Sp_cnt1=1;
                        		$Sp_amt1=$u_amount*0.7;
                        	}else if($get_per=="100%" || $get_per=="100"){
                        		$Hp_cnt1=1;
                        		$Hp_amt1=$u_amount*1;
                        	}
                        
                        	$chk_record=mysql_num_rows($result);
                        	if($chk_record >= 1)
                        	{
                        		$time_array1=array();
                        		$dates_arr=array();
                        		// Update Previous Date Calculation
                        		$p_update="UPDATE `taentrydetails` SET `percent`='0',`amount`='0' WHERE `reference_no`='".$old_reference."' and empid='".$_SESSION['empid']."' and taDate='".$date."'";
                        		$p_res=mysql_query($p_update);
                        		
                        		$time_array=array();
                        		$result=mysql_query($duplicate_query);
                        		while ($fet_data=mysql_fetch_array($result)){
                        		  	$p_dtime="00:00";
                        		  	$p_atime=$fet_data['arrivalT'];
                        			$p_timediff=$p_atime;
                        		}
                        		
                        		if($atime=='')
                        		{
                        			$dateDiff = intval((strtotime("23:59")-strtotime($dtime))/60);
                        		}
                        		else
                        		{
                        			array_push($dates_arr,$date);
                        			if($dates_arr[0] == $dates[$k+1])
                        			{
                        				$dateDiff = intval((strtotime($atime)-strtotime($dtime))/60);
                        			}
                        			else
                        			{
                        				$atime='23:59';
                        				$dateDiff = intval((strtotime($atime)-strtotime($dtime))/60);
                        			}
                        			
                        		}
                        		
                        		array_push($time_array1,$dateDiff);
                        		$add1=array_sum($time_array1);
                        		$tinhr1 = intval($add1/60);
                        		$tinmn1 = $add1%60;
                        		$a_timediff1=$tinhr1.":".$tinmn1;
                        		 
                        		$time = 0;
                        		$p_timediff;
                        		$a_timediff1;
                        		$time_arr =  array($p_timediff,$a_timediff1);
                        		foreach ($time_arr as $time_val) {
                        		    $time +=explode_time($time_val);  
                        		}
                        
                        
                        		$t_time=second_to_hhmm($time);
                        		$t_len=strlen($t_time);
                        		if($t_len < 5)
                        		{
                        			$t_time="0".$t_time;
                        		}
                        		else
                        		{
                        			$t_time=$t_time;
                        		}
                        		if(strtotime($t_time) <= strtotime("06:00"))
                        		{
                        			 $per="30%";
                        			 $amt=$u_amount*0.3;	
                        		}
                        		else if(strtotime($t_time) > strtotime("06:00") && strtotime($t_time) <=strtotime("12:00"))
                        		{
                        			 $per="70%";
                        			 $amt=$u_amount*0.7;								
                        		}
                        		else if(strtotime($t_time) > strtotime("12:00"))
                        		{
                        			$per="100%";
                        			$amt=$u_amount*1;
                        		}								
                        	}
                        	$c++;
                        }
                        
						if($per == "30%" || $per == "30")
						{
							$Tp_cnt=$Tp_cnt+1;
							$Tp_amt=$Tp_amt+$amt;
						}
						else if($per == "70%" || $per == "70")
						{
							$Sp_cnt=$Sp_cnt+1;
							$Sp_amt=$Sp_amt+$amt;
						}
						else if($per == "100%" || $per == "100")
						{
							$Hp_cnt=$Hp_cnt+1;
							$Hp_amt=$Hp_amt+$amt;
						}
				// 		else if($other == "5")
				// 		{
				// 			$otherp_cnt=$otherp_cnt+1;
				// 			$otherp_amt=$otherp_amt+$amt;
				// 		}
						$query2="INSERT INTO `taentrydetails`(`empid`, `reference_no`, `taDate`, `journey_type`, `train_no`, `journey_purpose`, `departS`, `departT`, `arrivalS`, `arrivalT`, `distance`, `percent`, `amount`, `status`, `created_at`, cardpass,objective ,`set_number`) VALUES ( '".$_SESSION['empid']."','".$old_reference."', '".$date."','".$type."','".$_POST['trainno'.$k]."','".$other."','".$_POST['dstn'.$k]."','".$dtime."','".$_POST['astn'.$k]."', '".$atime."','".$distance."','".$per."','".$amt."','0','".$date1."','".$cardpass."','".mysql_real_escape_string($object)."','".$set_no."'  )";
						// echo "<br><br>";
						$sql2=mysql_query($query2);
							// echo "<br>";
						$lm++;
					}
				}
				else{
					
				}
			}
			else
			{
				//$k--;
				$Hp_cnt=$Hp_cnt+1;
				$Hp_amt=$Hp_amt+$u_amount;
				$query2="INSERT INTO `taentrydetails`(`empid`, `reference_no`, `taDate`, `journey_type`, `train_no`, `journey_purpose`, `departS`, `departT`, `arrivalS`, `arrivalT`, `distance`, `percent`, `amount`, `status`, `created_at`, cardpass,objective ,`set_number`) VALUES ( '".$_SESSION['empid']."','".$old_reference."', '".$dates[$j]."','','','','','','', '','0','100%','".$u_amount."','0','".$date1."','".$cardpass."','".mysql_real_escape_string($object)."','".$set_no."'  )";
			 	$sql2=mysql_query($query2);
			 	// echo "<br><br>";
			}

		}
		// echo "<br>Total Amount ".$tamount;


		$query="SELECT `30p_cnt`,`30p_amt`,`70p_cnt`,`70p_amt`,`100p_cnt`,`100p_amt`,`otherp_cnt`,`otherp_amt` FROM `tasummarydetails` WHERE reference_no='".$_POST['user_ref_no']."' ";
		$sql=mysql_query($query);
		$row=mysql_fetch_array($sql);

		$total_30p_cnt=($row['30p_cnt']+$Tp_cnt)-$Tp_cnt1;
		$total_30p_amt=($row['30p_amt']+$Tp_amt)-$Tp_amt1;
		$total_70p_cnt=($row['70p_cnt']+$Sp_cnt)-$Sp_cnt1;
		$total_70p_amt=($row['70p_amt']+$Sp_amt)-$Sp_amt1;
		$total_100p_cnt=($row['100p_cnt']+$Hp_cnt)-$Hp_cnt1;
		$total_100p_amt=($row['100p_amt']+$Hp_amt)-$Hp_amt1;
		$total_otherp_cnt=($row['otherp_cnt']+$otherp_cnt)-$otherp_cnt1;
		$total_otherp_amt=($row['otherp_amt']+$otherp_amt)-$otherp_amt1;

		$query3="UPDATE `tasummarydetails` SET `30p_cnt`='".$total_30p_cnt."',`30p_amt`='".$total_30p_amt."',`70p_cnt`='".$total_70p_cnt."',`70p_amt`='".$total_70p_amt."',`100p_cnt`='".$total_100p_cnt."',`100p_amt`='".$total_100p_amt."',`otherp_cnt`='".$total_otherp_cnt."',`otherp_amt`='".$total_otherp_amt."',`created_at`='".$date1."' WHERE `reference_no`='".$_POST['user_ref_no']."'  ";
		$sql3=mysql_query($query3);
		// echo "<br><br>";
		$empid=$_SESSION['empid'];
		$file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
        user_activity($empid,$file_name,'Add more TA','ADFM add more TA in existing month.');
	}
	echo "<script>alert('TA Saved Successfully... '); window.location='Show_unclaimed_TA.php'; </script>";
}// IF SUBMIT
?>