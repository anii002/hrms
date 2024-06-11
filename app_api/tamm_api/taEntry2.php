<?php 
include('dbcon.php');
$dataset=$_POST['TA']; /*'[{"id":"38","empid":"20141219","referenceno":"20141219\/2017\/652365","taDate":"2017-12-11","trainno":"12365","dStation":"SUR","departT":"02:42","arriveS":"PA","arrivaT":"03:42","distance":"526","journeyType":"By Train","objective":"jkl","level":"9","leave":"None","tamonth":"April"},{"id":"38","empid":"20141219","referenceno":"20141219\/2017\/652365","taDate":"2017-12-13","trainno":"12365","dStation":"PA","departT":"06:42","arriveS":"SUR","arrivaT":"09:42","distance":"526","journeyType":"By Train","objective":"jkl","level":"9","leave":"None","tamonth":"April"}]';*/

/*'[{"empid":"20141219","referenceno":"20141219/2017/550704","taDate":"2017-12-2","trainno":"15324","dStaion":"SUR","departT":"12:48","arriveS":"PA","arrivaT":"4:48","distance":"250","journeyType":"By Train","objective":"sgzv","level":"10","leave":"None","tamonth":"March","tokeno":"255e","rowCount":2},{"empid":"20141219","referenceno":"20141219/2017/550704","taDate":"2017-12-3","trainno":"35528","dStaion":"PA","departT":"8:48","arriveS":"SUR","arrivaT":"12:48","distance":"450","journeyType":"By Tra;'*/
//$response=array("success");
$response=array("error"=>FALSE);
if(isset($dataset))
{
	$jsondata=$dataset;
	$jsondata1=json_decode($jsondata,true);
	$arr=$jsondata1[0]["id"];
	//echo $dataset;
	//print_r($jsondata1);
	
	//echo "date".$jsondata1[1]['taDate'];
	
	$hide_count = (int)count($jsondata1);
	//echo $hide_count;
	$data = "";
	$date_count = 0;
	$k=1;
	$temp_date = [];
	$temp_train = [];
	$temp_dept_time = [];
	$temp_station = [];
	$temp_arri_station=[];
	$temp_arri_time=[];
	$temp_journey_type = [];
	$temp_leave = [];
	$temp_percent = [];
	$temp_amout = [];
	$temp_distance = [];
	$cnt_row = 0;
	$beginT="";
	$endT="";
	$tempr = 0;
	$changed=0;
	$i_count=0;
	
     $year =$jsondata1[0]['year']; ;
	$level = $jsondata1[0]['level'];
	$months = $jsondata1[0]['tamonth'];
	$objective = $jsondata1[0]['objective'];
	$cardpass =addslashes($jsondata1[0]['tokeno']);
	//Find out previous set no.
	$query1="SELECT MAX(set_number) as set_number FROM taentryforms WHERE reference_id='".$jsondata1[0]['referenceno']."'";
	$result1=mysql_query($query1);
	$value1=mysql_fetch_array($result1);
	$set = $value1['set_number'];
	$set++;
	//Find out TA amount 
		$query = "select amount from ta_amount where min<=$level AND max>=$level";
	  $result  = mysql_query($query);
	  $value = mysql_fetch_array($result);
	  $amount = (int)$value['amount'];
	//echo $amount;

	for($j=0;$j<$hide_count;$j++)
	{
		//if($k!=$hide_count)
		//{
		if($jsondata1[$j]['taDate']!=$jsondata1[($k)]['taDate'])
		{
			$date_count++;
			//echo $jsondata1[$j]['taDate']."!=".$jsondata1[$k]['taDate']."<br>";
		}
		//}
		$k++;
	}
	//echo $date_count;
	$repeat_count = 0;
	$k = $hide_count-1;
	//echo "<style> table tr td { border : 2px solid black; }</style>";
	if($date_count==0)
	{
		echo $hide_count;
		echo "<h3>One day</h3>";
		echo "<table>";
		for($i=0;$i<=$hide_count;$i++)
		{
			$temp_date[$i_count]= $jsondata1[$i]['taDate'];
			$temp_train[$i_count]= $jsondata1[$i]['trainno'];
			$temp_dept_time[$i_count] = $jsondata1[$i]['departT'];
			$temp_station[$i_count] = $jsondata1[$i]['dStation'];
			$temp_arri_station[$i_count] = $jsondata1[$i]['arriveS'];
			$temp_arri_time[$i_count] =  $jsondata1[$i]['arrivaT'];
			$temp_distance[$i_count] = $jsondata1[$i]['distance'];
			$temp_journey_type[$i_count] =  $jsondata1[$i]['journeyType'];
			$temp_leave[$i_count] = $jsondata1[$i]['leave'];
			
			if($jsondata1[$i]['leave']=='None')
			{
				$BD = false;
				if($i==$hide_count)
				{
					$strStart = $jsondata1[0]['taDate']." ".$jsondata1[0]['departT']; 
					$strEnd   = $temp_date[$i_count]." ".$temp_arri_time[$i_count]; 
					$dteStart = new DateTime($strStart); 
					$dteEnd   = new DateTime($strEnd); 
					$dteDiff  = $dteStart->diff($dteEnd); 
					$time = (int)$dteDiff->format("%H"); 
					$date = $jsondata1[0]['taDate'];
					$query = "select SUM(percent) AS SUM from taentryforms where empid='".$jsondata1[0]['empid']."' and taDate='$date'";
					  $result = mysql_query($query);
					  $data = mysql_fetch_array($result);
					  $cnt = mysql_num_rows($result);
					  if($cnt>0 && $data['SUM']!="")
					  {
						$sum =  $data['SUM'];
					  }
					  else
					  {
						$sum= 0;
					  }
					  if($sum==0)
					  {
							if($time<6){
								$calamount = $amount*0.3;
								$temp_amout[$i_count] = $calamount;
								$temp_percent[$i_count] = "30%";
							}
							else if($time>=6 && $time<12){
								$calamount = $amount*0.7;
								$temp_amout[$i_count] = $calamount;
								$temp_percent[$i_count] = "70%";
							}
							else {
								$temp_amout[$i_count] = $amount;
								$temp_percent[$i_count] = "100%";
							}
					  }
					  else
					  {
							$remain = 100-$sum;
							if($remain==0 || $remain==10)
									{
										$amount=0;
										$response["error"]=TRUE;
										$response["msg"]="You already get 100% for this date";
										echo json_encode($response);
									}
									else if($remain==30 || $remain==40)
									{
										$calamount = $amount*0.3;
										$temp_amout[$i_count] = $calamount;
										$temp_percent[$i_count] = "30%";
									}
									else if($remain==70)
									{
											if($time<6)
											{
												$calamount = $amount*0.3;
												$temp_amout[$i_count] = $calamount;
												$temp_percent[$i_count] = "30%";
											}
											else
											{
												$calamount = $amount*0.7;
												$temp_amout[$i_count] = $calamount;
												$temp_percent[$i_count] = "70%";
											}
										
									}
					  }
				}
				else
				{
					$temp_amout[$i_count] = "";
					$temp_percent[$i_count] = "";
				}
			}
			$i_count++;
		}
	}
	else
	{
		//echo "<h3>Normal $hide_count</h3>";
		//echo "<table>";
		$end=0;
		for($i=0;$i<$hide_count;$i++)
		{
			
			$begin_Date = $jsondata1[$i]['taDate'];
			$temp_date[$i_count]= $jsondata1[$i]['taDate'];
			$temp_train[$i_count]= $jsondata1[$i]['trainno'];
			$temp_dept_time[$i_count] = $jsondata1[$i]['departT'];
			$temp_station[$i_count] = $jsondata1[$i]['dStation'];
			$temp_arri_station[$i_count] = $jsondata1[$i]['arriveS'];
			$temp_arri_time[$i_count] =  $jsondata1[$i]['arrivaT'];
			$temp_distance[$i_count] = $jsondata1[$i]['distance'];
			$temp_journey_type[$i_count] =  $jsondata1[$i]['journeyType'];
			$temp_leave[$i_count] = $jsondata1[$i]['leave'];
			//echo $temp_date[$i_count];
				$tmp = $i+1;
				
			if($temp_leave[$i_count]=='None')
			{
				if($i==0)
				{
					if($jsondata1[$tmp]['taDate']==$begin_Date)
						{
							if($cnt_row==0)
							{
								$beginT = $temp_dept_time[$i_count];
								//$beginT = $jsondata1[$i]['departT'];
							}
							else{
								$endT = $temp_arri_time[$i_count];
								//$endT = $jsondata1[$i]['arrivaT'];
							}
							$tempr = 1;
						}
						else{
							$cnt_row= 0;
						}
					if($jsondata1[$tmp]['taDate']!=$begin_Date)
					{
					$strStart = $jsondata1[0]['taDate']." ".$jsondata1[0]['departT']; 
					$strEnd   = $jsondata1[0]['taDate']." 24:00"; 
					$dteStart = new DateTime($strStart); 
					$dteEnd   = new DateTime($strEnd); 
					$dteDiff  = $dteStart->diff($dteEnd); 
					$time = (int)$dteDiff->format("%H"); 
					$date = $jsondata1[0]['taDate'];
					$query = "select SUM(percent) AS SUM from taentryforms where empid='".$jsondata1[0]['empid']."' and taDate='$date'";
					  $result = mysql_query($query);
					  $data = mysql_fetch_array($result);
					  $cnt = mysql_num_rows($result);
					  if($cnt>0 && $data['SUM']!="")
					  {
						$sum =  $data['SUM'];
					  }
					  else
					  {
						$sum= 0;
					  }
					  if($sum==0)
					  {
							if($time<6){
								$calamount = $amount*0.3;
								$temp_amout[$i_count] = $calamount;
								$temp_percent[$i_count] = "30%";
							}
							else if($time>=6 && $time<12){
								$calamount = $amount*0.7;
								$temp_amout[$i_count] = $calamount;
								$temp_percent[$i_count] = "70%";
							}
							else {
								$temp_amout[$i_count] = $amount;
								$temp_percent[$i_count] = "100%";
							}
					  }
					  else
					  {
							$remain = 100-$sum;
							if($remain==0 || $remain==10)
									{
										$amount=0;
										$response["error"]=TRUE;
										$response["msg"]="You already get 100% for this date";
										echo json_encode($response);
										//echo "You already get 100% for this date";
										$temp_amout[$i_count] = 0;
										$temp_percent[$i_count] = "0%";
									}
									else if($remain==30 || $remain==40)
									{
										$calamount = $amount*0.3;
										$temp_amout[$i_count] = $calamount;
										$temp_percent[$i_count] = "30%";
									}
									else if($remain==70)
									{
											if($time<6)
											{
												$calamount = $amount*0.3;
												$temp_amout[$i_count] = $calamount;
												$temp_percent[$i_count] = "30%";
											}
											else
											{
												$calamount = $amount*0.7;
												$temp_amout[$i_count] = $calamount;
												$temp_percent[$i_count] = "70%";
											}
										
									}
					  }
					  $i_count++;
					  //echo $i_count."<br>";
					}
					else{
						$temp_amout[$i_count] = "";
						$temp_percent[$i_count] = "";
						//$i_count++;
					}
					if($i<$hide_count)
						/*Code to check date difference*/
					{
						$diff_count = $i+1;
						$datetime1 = new DateTime($jsondata1[$i]['taDate']);
						$datetime2 = new DateTime($jsondata1[$diff_count]['taDate']);
						$interval = $datetime1->diff($datetime2);
						$difference =  (int)$interval->format('%a');
						
						if($difference>1)
						{
							//echo $diff_count;
									$begin = new DateTime( $jsondata1[$i]['taDate'] );
									$end = new DateTime( $jsondata1[$diff_count]['taDate'] );
									$end = $end->modify( '+1 day' ); 

									$interval = new DateInterval('P1D');
									$daterange = new DatePeriod($begin, $interval ,$end);
									$count = 0;$cnt=0;
									foreach($daterange as $date){
										//echo "$i_count Dfferce ".$difference;
										if($count!=$difference)
										{
										$count = $count+1;
										if($date->format("Y-m-d")!= $jsondata1[$i]['taDate'])
										{
										$temp_date[$i_count]= $date->format("Y-m-d");
										$temp_train[$i_count]= "";
										$temp_dept_time[$i_count] = "";
										$temp_station[$i_count] = "";
										$temp_arri_station[$i_count] = "";
										$temp_arri_time[$i_count] =  "";
										$temp_distance[$i_count] = "";
										$temp_journey_type[$i_count] =  "";
										$temp_leave[$i_count] = "";
										$date = $date->format("Y-m-d");
										$temp_amout[$i_count] = "$amount";
										$temp_percent[$i_count] = "100";
					$query = "select SUM(percent) AS SUM from taentryforms where empid='".$jsondata1[0]['empid']."' and taDate='$date'";
					//echo $query;
					  $result = mysql_query($query);
					  $data = mysql_fetch_array($result);
					  $cnt = mysql_num_rows($result);
					  if($cnt>0 && $data['SUM']!="")
					  {
						$sum =  $data['SUM'];
					  }
					  else
					  {
						$sum= 0;
					  }
					  if($sum==0)
					  {
								$temp_amout[$i_count] = $amount;
								$temp_percent[$i_count] = "100%";
					  }
					  else
					  {
							$remain = 100-$sum;
							if($remain==0 || $remain==10)
									{
										$amount=0;
										$response["error"]=TRUE;
										$response["msg"]="You already get 100% for this date";
										echo json_encode($response);
										//echo "You already get 100% for this date";
										$temp_amout[$i_count] = 0;
										$temp_percent[$i_count] = "0%";
									}
									else if($remain==30 || $remain==40)
									{
										$calamount = $amount*0.3;
										$temp_amout[$i_count] = $calamount;
										$temp_percent[$i_count] = "30%";
									}
									else if($remain==70)
									{
											if($time<6)
											{
												$calamount = $amount*0.3;
												$temp_amout[$i_count] = $calamount;
												$temp_percent[$i_count] = "30%";
											}
											else
											{
												$calamount = $amount*0.7;
												$temp_amout[$i_count] = $calamount;
												$temp_percent[$i_count] = "70%";
											}
										
									}
					  }
										//echo $date->format("Y-m-d")."<br>";
										if($count<=$difference)
											$i_count++;
										//echo $i_count." i coount<br>";
										}
										}
									}
						}
						
					}
					
			//echo "Count = ".$i_count;
					//finished
				}
				else if($i<=$hide_count)
				{
					//echo $i_count." = icounts <br>";
					//$i_count++;
					$begin_Date = $jsondata1[$i]['taDate'];
					if($tempr != 1)
					{
						$beginT = $temp_dept_time[$i_count];
					}
					$endT = $temp_arri_time[$i_count];
					$tmp = 0;
					if($i<$hide_count)
						$tmp = $i+1;
					$tmpr = $i-1;
					// while($i<$hide_count && $_REQUEST['date'.$tmp]==$begin_Date )
					// {
						// if($cnt_row>=1)
						// {
							// $beginT = $_REQUEST['departT'.$i];
							// $endT = $_REQUEST['arrivalT'.$tmp];
							// $tmp++;
							// $repeat_count++;
							// $temp_percent[$tmpr]="";
							// $temp_amout[$tmpr]="";
						// }
						// $cnt_row++;
					// }
					//echo $_REQUEST['date'.$tmp]."==".$begin_Date."<br><br>";
					if($jsondata1[$tmp]['taDate']==$begin_Date)
						{
							if($cnt_row==0)
							{
								$beginT = $temp_dept_time[$i_count];
							}
							else{
								$endT = $temp_arri_time[$i_count];
							}
							$changed=0;
						}
						else{
							$cnt_row= 0;
							if($tempr==1)
							{
								$tempr=0;
								$changed=1;
							}
						}
						
					if($jsondata1[$tmp]['taDate']!=$begin_Date)
					{
						//echo "Begin time = ".$beginT;
						//echo $endT;
						//echo $tempr;
						if($beginT=="")
							$beginT="00:00";
						if($endT=="" || $i<$hide_count)
							$endT="23:59";
						if($i==$hide_count)
							$beginT="00:00";
						//echo $i." ".$hide_count;
						//echo "$i<$hide_count && $tempr ==0";
						if($i<$hide_count && $tempr == 0 && $changed==0){
							$beginT="00:00";
							$endT="23:59";
						}
						if($tempr==2)
							$tempr=0;
						$strStart = $begin_Date." ".$beginT; 
						$strEnd   = $begin_Date." ".$endT; 
						//echo "<br>$strStart  $strEnd";
						$dteStart = new DateTime($strStart); 
						$dteEnd   = new DateTime($strEnd); 
						$dteDiff  = $dteStart->diff($dteEnd); 
						$time = (int)$dteDiff->format("%H"); 
						
						$date = $begin_Date;
						$query = "select SUM(percent) AS SUM from taentryforms where empid='".$jsondata1[0]['empid']."' and taDate='$date'";
						  $result = mysql_query($query);
						  $data = mysql_fetch_array($result);
						  $cnt = mysql_num_rows($result);
						  if($cnt>0 && $data['SUM']!="")
						  {
							$sum =  $data['SUM'];
						  }
						  else
						  {
							$sum= 0;
						  }
						  
						//echo "Time = ".$sum;
						  if($sum==0)
						  {
							  
								if($time<6){
									$calamount = $amount*0.3;
									$temp_amout[$i_count] = $calamount;
									$temp_percent[$i_count] = "30%";
								}
								else if($time>=6 && $time<12){
									$calamount = $amount*0.7;
									$temp_amout[$i_count] = $calamount;
									$temp_percent[$i_count] = "70%";
								}
								else {
									$calamount = $amount;
									$temp_amout[$i_count] = $calamount;
									$temp_percent[$i_count] = "100%";
								}
						  }
						  else
						  {
							  
								$remain = 100-$sum;
								if($remain==0 || $remain==10)
										{
											$amount=0;
											$response["error"]=TRUE;
											$response["msg"]="You already get 100% for this date";
										echo json_encode($response);
											//echo "You already get 100% for this date";
											$temp_amout[$i_count] = 0;
											$temp_percent[$i_count] = "0%";
										}
										else if($remain==30 || $remain==40)
										{
											$calamount = $amount*0.3;
											$temp_amout[$i_count] = $calamount;
											$temp_percent[$i_count] = "30%";
										}
										else if($remain==70)
										{
												if($time<6)
												{
													$calamount = $amount*0.3;
													$temp_amout[$i_count] = $calamount;
													$temp_percent[$i_count] = "30%";
												}
												else
												{
													$calamount = $amount*0.7;
													$temp_amout[$i_count] = $calamount;
													$temp_percent[$i_count] = "70%";
												}
											
										}
						  }
					}
					else
					{
						$temp_amout[$i_count] = "";
						$temp_percent[$i_count] = "";
					}
					
					
			$i_count++;
					$diff_count = $i+1;
					if($diff_count<$hide_count)
					{
						//echo $_REQUEST['date'.$i]."<br><br>";
						$datetime1 = new DateTime($jsondata1[$i]['taDate']);
						$datetime2 = new DateTime($jsondata1[$diff_count]['taDate']);
						$interval = $datetime1->diff($datetime2);
						$difference =  (int)$interval->format('%a');
						
						if($difference>1)
						{
							
									$begin = new DateTime( $jsondata1[$i]['taDate']);
									$end = new DateTime( $jsondata1[$diff_count]['taDate'] );
									$end = $end->modify( '+1 day' ); 

									$interval = new DateInterval('P1D');
									$daterange = new DatePeriod($begin, $interval ,$end);
									$count = 0;$cnt=$i_count-1;
									foreach($daterange as $date){
										if($count!=$difference)
										{
										if($date->format("Y-m-d")!= $temp_date[$cnt])
										{
											
										//echo $date->format("Y-m-d");
										$count = $count+1;
										$temp_date[$i_count]= $date->format("Y-m-d");
										$temp_train[$i_count]= "";
										$temp_dept_time[$i_count] = "";
										$temp_station[$i_count] = "";
										$temp_arri_station[$i_count] = "";
										$temp_arri_time[$i_count] =  "";
										$temp_distance[$i_count] = "";
										$temp_journey_type[$i_count] =  "";
										$temp_leave[$i_count] = "";$date = $date->format("Y-m-d");
										$temp_amout[$i_count] = "$amount";
										$temp_percent[$i_count] = "100";
					$query = "select SUM(percent) AS SUM from taentryforms where empid='".$jsondata1[0]['empid']."' and taDate='$date'";
					  $result = mysql_query($query);
					  $data = mysql_fetch_array($result);
					  $cnt = mysql_num_rows($result);
					  if($cnt>0 && $data['SUM']!="")
					  {
						$sum =  $data['SUM'];
					  }
					  else
					  {
						$sum= 0;
					  }
					  //echo "SUM : ".$sum." Time : ".$time;
					  if($sum==0)
					  {
								$temp_amout[$i_count] = $amount;
								$temp_percent[$i_count] = "100%";
					  }
					  else
					  {
							$remain = 100-$sum;
							if($remain==0 || $remain==10)
									{
										$amount=0;
										$response["error"]=TRUE;
										$response["msg"]="You already get 100% for this date";
										echo json_encode($response);
										//echo "You already get 100% for this date";
										$temp_amout[$i_count] = 0;
										$temp_percent[$i_count] = "0%";
									}
									else if($remain==30 || $remain==40)
									{
										$calamount = $amount*0.3;
										$temp_amout[$i_count] = $calamount;
										$temp_percent[$i_count] = "30%";
									}
									else if($remain==70)
									{
											if($time<6)
											{
												$calamount = $amount*0.3;
												$temp_amout[$i_count] = $calamount;
												$temp_percent[$i_count] = "30%";
											}
											else
											{
												$calamount = $amount*0.7;
												$temp_amout[$i_count] = $calamount;
												$temp_percent[$i_count] = "70%";
											}
										
									}
					  }
										//echo $date->format("Y-m-d")."<br>";
										if($count<$difference)
											$i_count++;
										//echo $i_count." i coount<br>";
										
										//echo $i_count;
										}
										}
										
									}
						}
					}
			//echo "<br><br>I count = $i_count <br>";
				}
				
			}//MSC END
			else
			{
				$temp_amout[$i_count] = "0";
				$temp_percent[$i_count] = "0";
				$i_count++;
				//Leave module
					$diff_count = $i+1;
						$datetime1 = new DateTime($jsondata1[$i]['taDate']);
						$datetime2 = new DateTime($jsondata1[$diff_count]['taDate']);
						$interval = $datetime1->diff($datetime2);
						$difference =  (int)$interval->format('%a');
						
						if($difference>1)
						{
							//echo $diff_count;
									$begin = new DateTime( $jsondata1[$i]['taDate'] );
									$end = new DateTime( $jsondata1[$diff_count]['taDate'] );
									$end = $end->modify( '+1 day' ); 

									$interval = new DateInterval('P1D');
									$daterange = new DatePeriod($begin, $interval ,$end);
									$count = 0;$cnt=0;
									foreach($daterange as $date){
										//echo "$i_count Dfferce ".$difference;
										if($count!=$difference)
										{
										$count = $count+1;
										if($date->format("Y-m-d")!= $jsondata1[$i]['taDate'])
										{
										$temp_date[$i_count]= $date->format("Y-m-d");
										$temp_train[$i_count]= "";
										$temp_dept_time[$i_count] = "";
										$temp_station[$i_count] = "";
										$temp_arri_station[$i_count] = "";
										$temp_arri_time[$i_count] =  "";
										$temp_distance[$i_count] = "";
										$temp_journey_type[$i_count] =  "";
										$temp_leave[$i_count] = "";
										$date = $date->format("Y-m-d");
										$temp_amout[$i_count] = "$amount";
										$temp_percent[$i_count] = "100";
					$query = "select SUM(percent) AS SUM from taentryforms where empid='".$jsondata1[0]['empid']."' and taDate='$date'";
					  $result = mysql_query($query);
					  $data = mysql_fetch_array($result);
					  $cnt = mysql_num_rows($result);
					  if($cnt>0 && $data['SUM']!="")
					  {
						$sum =  $data['SUM'];
					  }
					  else
					  {
						$sum= 0;
					  }
					  if($sum==0)
					  {
								$temp_amout[$i_count] = $amount;
								$temp_percent[$i_count] = "100%";
					  }
					  else
					  {
							$remain = 100-$sum;
							if($remain==0 || $remain==10)
									{
										$amount=0;
										$response["error"]=TRUE;
										$response["msg"]="You already get 100% for this date";
										echo json_encode($response);
										//echo "You already get 100% for this date";
										$temp_amout[$i_count] = 0;
										$temp_percent[$i_count] = "0%";
									}
									else if($remain==30 || $remain==40)
									{
										$calamount = $amount*0.3;
										$temp_amout[$i_count] = $calamount;
										$temp_percent[$i_count] = "30%";
									}
									else if($remain==70)
									{
											if($time<6)
											{
												$calamount = $amount*0.3;
												$temp_amout[$i_count] = $calamount;
												$temp_percent[$i_count] = "30%";
											}
											else
											{
												$calamount = $amount*0.7;
												$temp_amout[$i_count] = $calamount;
												$temp_percent[$i_count] = "70%";
											}
										
									}
					  }
										//echo $date->format("Y-m-d")."<br>";
										if($count<=$difference)
											$i_count++;
										//echo $i_count." i coount<br>";
										}
										}
									}
						}
				//Leave ends here
			}
		}
	}
	//echo "<table><tbody>";
	//$ref = rand(10000,999999);
        //$reference = $_REQUEST['empid']."/".$year."/".$ref;
        $reference = $jsondata1[0]['referenceno'];
	for($show=0;$show<$i_count;$show++)
	{
		/*echo "<tr>";
		echo 	"<td>".$temp_date[$show]." </td>";
		echo	"<td>".$jsondata1[0]['empid']."</td>";
		echo	"<td>".$temp_train[$show]."</td>";
		echo	"<td>".$temp_dept_time[$show]."</td>";
		echo	"<td>".$temp_station[$show]."</td>";
		echo	"<td>".$temp_arri_station[$show]."</td>";
		echo	"<td>".$temp_arri_time[$show]."</td>";
		echo	"<td>".$temp_distance[$show]."</td>";
		echo	"<td>".$temp_journey_type[$show]."</td>";
		echo	"<td>".$temp_leave[$show]."</td>";
		echo	"<td>".$temp_percent[$show]."</td>";
		echo	"<td>".$temp_amout[$show]."</td>";
		echo "</tr>";*/
		global $con;
		/*if($show==0)
		{
	  $query_outer = "insert into taentryform_master(empid,reference,TAYear, TAMonth, objective, cardpass) values('".$jsondata1[0]['empid']."','$reference','$year','$months','$objective','$cardpass')";
	  $result_outer = mysql_query($query_outer);
		}*/
		$query = "INSERT INTO `taentryforms`(empid,reference_id,`taDate`, `train`, `departS`, `departT`, `arrivalS`, `arrivalT`, `distance`, `percent`, `amount`, `set_number`,`journey_type`,`cardpass`,`leave_info`) VALUES ('".$jsondata1[0]['empid']."','$reference','".$temp_date[$show]."','".$temp_train[$show]."','".$temp_station[$show]."','".$temp_dept_time[$show]."','".$temp_arri_station[$show]."','".$temp_arri_time[$show]."','".$temp_distance[$show]."','".$temp_percent[$show]."','".$temp_amout[$show]."','$set','".$temp_journey_type[$show]."','$cardpass','".$temp_leave[$show]."')";
		$_SESSION['table_ref']=$reference;
		$result = mysql_query($query) or die(mysql_error());
		
		/*$query = "INSERT INTO `taentryforms`(empid,reference_id,`taDate`, `train`, `departS`, `departT`, `arrivalS`, `arrivalT`, `distance`, `percent`, `amount`, `set_number`,`journey_type`,`cardpass`,`leave_info`) VALUES ('".$_REQUEST['empid']."','$reference','".$temp_date[$show]."','".$temp_train[$show]."','".$temp_station[$show]."','".$temp_dept_time[$show]."','".$temp_arri_station[$show]."','".$temp_arri_time[$show]."','".$temp_distance[$show]."','".$temp_percent[$show]."','".$temp_amout[$show]."','$set','".$temp_journey_type[$show]."','$cardpass','".$temp_leave[$show]."')";
		$_SESSION['table_ref']=$reference;
		$result = mysql_query($query) or die(mysql_error());*/
  if($result)
  {
	  $response["error"]=FALSE;
	  $response["msg"]="TA Submitted Successfully";
    echo json_encode($response);
  }
  else
  {
	 $response["error"]=TRUE;
	 $response["msg"]="TA not submitted";
	 echo json_encode($response);
  }
    //echo "Failed to insert";
	//}
	// echo "</tbody></table>";
	// echo "<script>alert('TA Claimed successfully');window.location='Show_claimed_TA.php';</script>";

}
}

 
 
?>
