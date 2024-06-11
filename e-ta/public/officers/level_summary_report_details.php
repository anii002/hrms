<?php
  require_once("../../global/officer_header.php");
  require_once("../../global/officer_topbar.php");
  require_once("../../global/officer_sidebar.php");
?>
  <div class="content-wrapper">
    <section class="content-header" style="background-color:#95e9a7; padding-left:20px;padding-bottom:10px;">
      <span class="col-sm-12">
        <span class="text-left" style="font-family: 'Raleway', sans-serif; font-weight: 600;">
  			Summary Report Details
        </span>
        <span style="float: right">
        <button class=" btn btn-danger" onclick="history.go(-1);">Back</button>
      </span>
    </span>
    <div class="clearfix"></div>
    </section>
    <section class="content">

<?php

if(isset($_SESSION['empid']) && isset($_REQUEST['id']))
{
$get_month = explode("-",$_REQUEST['id']);
	?>
	<?php
						$query = mysql_query("SELECT * from tbl_summary where id = '".$_REQUEST['id']."'");
						$query_result = mysql_fetch_array($query);
						$dateObj = date_create($query_result['generated_date']);
						//$dateObj   = DateTime::createFromFormat('!m', $val['TAMonth']);
						$title = $dateObj->format('F');
						$y = $dateObj->format('Y');
						$title = $title."-".$y;
						?>
				<div class="box box-info">
					<div class="box-header">
						<h3 class="box-title">Summary Report Details</h3>
					</div>
					<div class="box-body">
						<?php if(isset($_SESSION['role']) && $_SESSION['role'] == '5') { echo "<span>For Reject TA press <i class='fa fa-close btn btn-sm btn-danger' style='width: 25px !important;padding: 0px !important' aria-hidden='true'></i> , & For View TA Details press <i class='fa fa-eye btn-sm btn btn-primary' style='width: 25px !important;padding: 0px !important' aria-hidden='true'></i></span><br/><br/>"; }?>
						<div class="col-xs-12 table-responsive">
						
								<?php
									$cnt=1;
									$cont_sum = 0;
									$total_sum_ta =0;
									$ref = "";
									$conti_sum = 0;
									$t_data = array();
									$query = "SELECT e.BU, e.pfno, e.name, e.desig, e.bp, ta.taDate, tam.TAMonth, ta.reference_id, SUM(ta.amount) as sum from employees as e INNER JOIN taentryforms as ta ON e.pfno = ta.empid INNER JOIN taentryform_master tam ON tam.reference = ta.reference_id  WHERE tam.reference NOT IN (SELECT ref FROM tbl_rejected) AND ta.reference_id IN(SELECT reference FROM tbl_summary_details where summary_id = '".$_REQUEST['id']."' and reject_pending='0') GROUP BY ta.reference_id"; //DATE_FORMAT(ta.created_at, '%Y-%m-%d')
									$associative_emp = array();	
									$reference_array = array();
									$temp_array = array();
									$array = array();
									$result = mysql_query($query);
									$total_sum =0;
									while($val = mysql_fetch_assoc($result))
									{
										$pf_no = $val['pfno'];
										$ref = $val['reference_id'];
										$associative_month = array();
										$associative_percentage = array();

										$innnerset = mysql_query("select * from forward_data where reference_id = '". $val['reference_id'] ."' order by id DESC");
											$innerresult = mysql_fetch_array($innnerset);
											

												if($innerresult['hold_status']=="0" || $innerresult['hold_status']=="1")
												{
													$check_date = "SELECT * FROM taentryforms WHERE reference_id = '".$val['reference_id']."' AND percent != ''";

													$data = mysql_query($check_date);
													while($row = mysql_fetch_array($data))
													{
														$time=strtotime($row['taDate']);
														$taDate = $row['taDate'];
														$year = date("Y",$time);
														$temp_m=date("F",$time);
														$month = substr($temp_m, 0, 3)."-".substr($year, 2, 3);
														$percent = $row['percent'];
														$percent = "p".str_replace('%', '', $percent)."";
														
														$amount = $row['amount'];

														if(!array_key_exists($pf_no, $associative_emp)){
															#$associative_month =array();
															#$associative_percentage =array();
															$associative_percentage[$percent] = $amount;
															$associative_month[$month] = $associative_percentage;
															$associative_emp[$pf_no] = $associative_month;
														}else{
															if(!array_key_exists($month, $associative_emp[$pf_no])){
															    $associative_month =array();
																$associative_percentage =array();
																$associative_percentage[$percent] = $amount;
																$associative_month[$month] = $associative_percentage;

																$month_array = $associative_emp[$pf_no];
																//echo "<br/>$pf_no";print_r($month_array);
																$associative_emp[$pf_no] = array_merge($month_array, $associative_month);

															}else{
																$temp_array = $associative_emp[$pf_no][$month];
																if(array_key_exists($percent, $temp_array)){
																	$associative_percentage = array();
																	$associative_month = array();
																	$get_val = $temp_array[$percent] + $amount;
																	$temp_array[$percent] = $get_val;
																	$associative_emp[$pf_no][$month] = $temp_array;
																}else{
																	$associative_percentage = array();
																	$associative_month = array();
																	$associative_percentage[$percent] = $amount;
																	$tempar_array = array_merge($temp_array, $associative_percentage);
																	$associative_emp[$pf_no][$month] = $tempar_array;
																}
															}
														}
													}
													
													$query_sum = "SELECT percent, SUM(amount) AS sum, amount, COUNT(reference_id) AS cnt FROM taentryforms where amount<>'' and reference_id='".$val['reference_id']."' AND percent != '0' GROUP BY percent ORDER BY percent ASC";
													$array = '';
													$array_100 = '';
													$array_30 = '';
													$array_70 = '';
													$day_count = 0;
													$result_sum = mysql_query($query_sum);
													
													while($result_show = mysql_fetch_array($result_sum))
													{
														if($result_show['percent'] == "100%"){
															$array_100 .= $result_show['percent'].",";
															$array_100 .= $result_show['cnt'].",";
															$day_count = $result_show['cnt'];
															$array_100 .= $result_show['amount'];
															//$array_sum = $result_show['sum'];
														}
														if($result_show['percent'] == "70%"){
															$array_70 .= $result_show['percent'].",";
															$array_70 .= $result_show['cnt'].",";
															$day_count = $result_show['cnt'] + $day_count;
															$array_70 .= $result_show['amount'];
															//$array_sum = $result_show['sum'];
														}
														if($result_show['percent'] == "30%"){
															$array_30 .= $result_show['percent'].",";
															$array_30 .= $result_show['cnt'].",";
															$day_count = $result_show['cnt'] + $day_count;
															$array_30 .= $result_show['amount'];
															//$array_sum = $result_show['sum'];
														}
													}
													$array = $array_100.",".$array_70.",".$array_30;
													$count_array = explode(',', $array);

		                      						$query1 = "SELECT e.pfno, e.name, e.desig, e.bp, ta.reference_id, SUM(ta.amount) as sum from employees as e INNER JOIN taentryforms as ta ON e.pfno = ta.empid WHERE ta.reference_id IN(SELECT reference FROM tbl_summary_details where summary_id = '".$_REQUEST['id']."' and reject_pending='0' and empid='".$val['pfno']."') GROUP BY ta.reference_id";
													$result1 = mysql_query($query1);
													$total = 0;
													$data = "";
													while($res = mysql_fetch_array($result1))
													{
														$innner = mysql_query("select * from `continjency_master` where reference='".$res['reference_id']."'");
														while($resultset = mysql_fetch_array($innner))
														{
															$inner_query = mysql_query("SELECT SUM(total_amount) as total FROM `continjency` where cid='".$resultset['id']."' and set_number='".$resultset['set_number']."'");
															$resultinner = mysql_fetch_array($inner_query);
															$total = $total + (int) $resultinner['total'];
														}
		                   							}
		                       						$cont_sum = $cont_sum + (int)$val['sum'];
													$cnt++;
												}
											}
									
								 ?>
								 <table id="" class="table table-hover" style="page-break-inside: inherit; border-collapse:collapse" width="100%" border="1">
						<thead>
							<tr id="tr1">
								<th colspan="18"  class=" remove_border">
									<label style="font-size:14px;">Statement Showing the summery of TA & Contingency Bills For the Month of <?= $title; ?>  </label>
								</th>
							</tr>
							<tr>
								<th rowspan="2" valign= "top">Sr No</th>
								<th rowspan="2" valign= "top">P.F. No</th>
								<th rowspan="2" valign= "top">Name</th>
								<th rowspan="2" valign= "top">Design</th>
								<th rowspan="2" valign= "top">Basic Pay</th> 
								<th rowspan="2" valign= "top">Rate</th> 
								<th rowspan="2" valign= "top">Travel Month</th>
								<th rowspan="2" valign= "top"><center>Claimed Month</center></th>
								<th colspan="2"><center>30%(Days Count)</center></th> 
								<th colspan="2"><center>70%(Days Count)</center></th>
								<th colspan="2"><center>100%(Days Count)</center></th>
								<th colspan="2" rowspan="2"><center>Total TA Amount</center></th>
								<th rowspan="2">Contingency</th>
								<th class="hidden-print" rowspan="2">Action</th>
							</tr>
							<tr>
								<th>Day</th>
								<th>Amount</th>
								<th>Day</th>
								<th>Amount</th>
								<th>Day</th>
								<th>Amount</th>
							</tr>
							</thead>
							<tbody>
								 <?php

			$query = "SELECT e.pfno, e.BU, e.name, e.level, e.desig, tam.created_at,e.bp, ta.taDate, tam.TAMonth, tam.TAYear, ta.reference_id, SUM(ta.amount) as sum from employees as e INNER JOIN taentryforms as ta ON e.pfno = ta.empid INNER JOIN taentryform_master tam ON tam.reference = ta.reference_id  WHERE ta.reference_id IN(SELECT reference FROM tbl_summary_details where summary_id = '".$_REQUEST['id']."') GROUP BY ta.empid";
			$result = mysql_query($query);
			
			$total_sum =0;
			$sr = 1;
			$d = '';
							$sum_count = 1;
			while($val = mysql_fetch_assoc($result))
			{
				$dummy = 0;
				foreach ($associative_emp as $key => $value) 
				{
//					ksort($value);
//					print_r($value);
					$pf_cnt = 1;
					if($val['pfno'] == $key && $pf_cnt == '1')
					{	
						$query1 = "select amount from ta_amount where min<=".$val['level']." AND max>=".$val['level']."";
	  					$result1  = mysql_query($query1);
	  					$value1 = mysql_fetch_array($result1);
	  					$amount1 = (int)$value1['amount'];
	  					
						echo "
						<tr>
						<td>$sr</td>
						<td>".$val['pfno']." </td>
						<td>".$val['name'].", <br/>BU: ".$val['BU']."</td>
						<td>".$val['desig']."</td>
						<td>".$val['bp']."</td>
						<td>".$amount1."</td>";
						$tem = $associative_emp[$val['pfno']];
						//echo $count = count($tem);
						$keyss = array_keys($tem);
						//print_r($keyss);
						$da = '';
						$coun = count($keyss);
						for($i=0; $i<$coun; $i++){
							$da .= "<tr style='line-height: 1.8; '><td>".$keyss[$i]."</td></tr>";
						}
						$query1 = "SELECT e.pfno, e.BU, e.name, e.level, e.desig, tam.created_at,e.bp, ta.taDate, tam.TAMonth, tam.TAYear, ta.reference_id, SUM(ta.amount) as sum from employees as e INNER JOIN taentryforms as ta ON e.pfno = ta.empid INNER JOIN taentryform_master tam ON tam.reference = ta.reference_id  WHERE ta.reference_id IN(SELECT reference FROM tbl_summary_details where summary_id = '".$_REQUEST['id']."') GROUP BY ta.reference_id";
						$result1 = mysql_query($query1);
						
						while ($rw = mysql_fetch_array($result1)) {
						    //echo $query1;
							if($val['pfno'] == $rw['pfno']){
							   // echo $rw['created_at']."<=";
								$dateObj = date_create($rw['created_at']);	
								$monthName = $dateObj->format('F');
								$d .= "<span style='line-height: 1.6'>".substr($monthName, 0, 3)."-".substr($rw['TAYear'], 2, 3)."<span><br/>";
							}
						}
						echo"<td  style='font-size:17px'><table>".$da."</table></td>
						<td>".$d."</td>";
						echo "<td colspan='10'>";
						
						$query_sum = "SELECT percent, SUM(amount) AS sum, COUNT(reference_id) AS cnt FROM 	taentryforms where amount<>'' and reference_id='".$ref."' GROUP BY percent";
	                    $result_sum = mysql_query($query_sum);
	                    $result_show = mysql_fetch_array($result_sum);
	                    echo "<table border='0' width='100%' style='table-layout: auto; text-align:center'>";
	                    foreach ($value as $month => $percent_value) 
	                    { 
	                    	
                    		$keys = array_keys($percent_value);
							//echo $keys[0];
							$keys_v = array_values($percent_value);
							//echo $keys_v[0];
							$count = count($keys);
							$r = $count;
                    		
                			if($count == '3'){
                				echo "<tr>";
                				$r = $r - 0;
                				$total = '';
                				$total_counter = '';
                				//print_r($percent_value);
                				
                				if($keys[$count-$r] == "p30"){
                					$counter = $keys_v[$count-$r]/($amount1 * 0.3);
                					$total = $total + $keys_v[$count-$r];
                					$total_counter = $total_counter + $counter;
                					echo"<td style='width:35px; border-right:1px solid white; border-bottom: 1px solid black'>".$counter." </td><td valign='middle' style='width:70px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]."</td>";
                					$r = $r - 2;
                					
                					if($keys[$count-$r] == "p70"){
                						$total = $total + $keys_v[$count-$r];
                						$counter = $keys_v[$count-$r]/($amount1*0.7);
                						$total_counter = $total_counter + $counter;
                						echo"<td style='width:45px; border-right:1px solid white ;border-bottom: 1px solid black'>".$counter." </td><td valign='middle' style='width:72px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]."</td>";
                						$r = $r + 1;
                						
                						$counter = $keys_v[$count-$r]/($amount1);
                						$total = $total + $keys_v[$count-$r];
                						$total_counter = $total_counter + $counter;
                						echo "<td style='width:45px; border-right:1px solid white; border-bottom: 1px solid black'>".$counter." </td><td valign='middle' style='width:70px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]."</td>";
                					}else{
                						$r = $r + 2;
                						//echo $r."<=";
                						$counter = $keys_v[$count-$r]/($amount1*0.7);
                						$total = $total + $keys_v[$count-$r];
                						$total_counter = $total_counter + $counter;
                						echo"<td style='width:45px; border-right:1px solid white; border-bottom: 1px solid black'>".$counter." </td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]."</td>";
                						$r = $r - 2;
										$counter = $keys_v[$count-$r]/($amount1);
										$total = $total + $keys_v[$count-$r];
										$total_counter = $total_counter + $counter;
										echo "<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>".$counter." </td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]."</td>";
                					}
                				}else if($keys[$count-$r] == "p70"){
                					$r = $r - 1;
                					
                					if($keys[$count-$r] == "p30"){
                						//$r = $r - 1;
                						
                						$total = $total + $keys_v[$count-$r];
                						$counter = $keys_v[$count-$r]/($amount1*0.3);
                						$total_counter = $total_counter + $counter;
                						echo"<td style='width:35px; border-right:1px solid white; border-bottom: 1px solid black'>".$counter." </td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]."</td>";
                						$r = $r + 1;
                						$total = $total + $keys_v[$count-$r];
                						$counter = $keys_v[$count-$r]/($amount1*0.7);
                						$total_counter = $total_counter + $counter;
                						echo"<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>".$counter." </td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]."</td>";
                						$r = $r - 2;
                						$total = $total + $keys_v[$count-$r];
                						$counter = $keys_v[$count-$r]/($amount1);
                						$total_counter = $total_counter + $counter;
                						echo "<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>".$counter." </td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]."</td>";
                					}else{
                						$r = $r - 1;
                						
                						$total = $total + $keys_v[$count-$r];
                						$counter = $keys_v[$count-$r]/($amount1*0.3);
                						$total_counter = $total_counter + $counter;
                						echo"<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>".$counter." </td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]."</td>";
                						$r = $r + 2;
                						
                						$total = $total + $keys_v[$count-$r];
                						$counter = $keys_v[$count-$r]/($amount1*0.7);
                						$total_counter = $total_counter + $counter;
                						echo"<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>".$counter." </td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]."</td>";
                						$r = $r - 1;
                						$total = $total + $keys_v[$count-$r];
                						$counter = $keys_v[$count-$r]/($amount1);
                						$total_counter = $total_counter + $counter;
                						echo "<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>".$counter." </td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]."</td>";
                					}	
                				}else{
                					
                					$r = $r - 1;
                					
                					if($keys[$count-$r] == "p30"){
                						//echo $r;
                						$total = $total + $keys_v[$count-$r];
                						$counter = $keys_v[$count-$r]/($amount1*0.3);
                						$total_counter = $total_counter + $counter;
                						echo"<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>".$counter." </td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]." </td>";
                						$r = $r - 1;
                                        //echo $keys_v[$count-$r];
                						$total = $total + $keys_v[$count-$r];
                						$counter = $keys_v[$count-$r]/($amount1*0.7);
                						$total_counter = $total_counter + $counter;
                						echo"<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>".$counter." </td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]."</td>";
                						$r = $r + 2;
                						$total = $total + $keys_v[$count-$r];
                						$counter = $keys_v[$count-$r]/($amount1);
                						$total_counter = $total_counter + $counter;
                						echo"<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>".$counter." </td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]."</td>";
                					}else{
                						$r = $r;
                						$r = $r - 1;
                						//print_r($keys);
                						//error_reporting();
                					    if($keys[$count-$r] != "p0" && $keys[$count-$r] == "p30"){
                    						$total = $total + $keys_v[$count-$r];
                    						//print_r($keys);
                    						$counter = $keys_v[$count-$r]/($amount1*0.3);
                    						$total_counter = $total_counter + $counter;
                    						echo"<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>".$counter."</td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]."</td>";
                    						$r = $r - 2;
                    						
                					    }else{
                					        $r = $r;
                					        echo"<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>&emsp;</td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>&emsp;</td>";
                					    }
                                        //echo $keys[$count-$r];
                                        //$r = $r - 1;
                						$total = $total + $keys_v[$count-$r];
                						$counter = $keys_v[$count-$r]/($amount1*0.7);
                						$total_counter = $total_counter + $counter;
                						echo"<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>".$counter." </td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]."</td>";
                						$r = $r + 1;
                						$total = $total + $keys_v[$count-$r];
                						$counter = $keys_v[$count-$r]/($amount1);
                						$total_counter = $total_counter + $counter;
                						echo"<td style='width:40px;  border-right:1px solid white; border-bottom: 1px solid black'>".$counter." </td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]."</td>";	
                					}
                				}
                				echo "<!--td style='width:40px; border-right:1px solid white'></td--><td style='width:65px; text-align:center; border-bottom: 1px solid black'>$total</td>";
							}else if($count == '2')
							{
								
								$total = '';
                				$total_counter = '';
								if($keys[$count-$r] == "p100")
								{
										
									$r = $r - 1;								
									if($keys[$count-$r] == "p70"){
										echo "<td style='width:40px;  border-right:1px solid white; border-bottom: 1px solid black'>&emsp;</td><td style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>&emsp;</td>";
										$counter = $keys_v[$count-$r]/($amount1*0.7);
										$total = $total + $keys_v[$count-$r];
										$total_counter = $total_counter + $counter;
										echo"<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>".$counter."</td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]."</td>";
										$r = $r + 1;
										$counter = $keys_v[$count-$r]/$amount1;
										$total = $total + $keys_v[$count-$r];
										$total_counter = $total_counter + $counter;
										echo"<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>".$counter."</td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]."</td>";
									}else{
										
										$counter = $keys_v[$count-$r]/($amount1*0.3);
										$total = $total + $keys_v[$count-$r];
										$total_counter = $total_counter + $counter;
										echo"<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>".$counter."</td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]."</td>";
										echo "<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>&emsp;</td><td style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>&emsp;</td>";
										$r = $r + 1;
										$counter = $keys_v[$count-$r]/$amount1;
										$total = $total + $keys_v[$count-$r];
										$total_counter = $total_counter + $counter;
										echo"<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>".$counter."</td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]."</td>";
									}
								}
								else if($keys[$count-$r] == "p70")
								{
									//echo $r;
									$r = $r - 1;
									
									if($keys[$count-$r] == "p100"){
										echo "<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>&emsp;</td><td style='width:80px; border-bottom: 1px solid black'>&emsp;</td>";
										//echo $r;
										
										$r = $r + 1;
										///echo $keys[$count-$r];
										$counter = $keys_v[$count-$r]/($amount1*0.7);
										$total = $total + $keys_v[$count-$r];
										$total_counter = $total_counter + $counter;
										echo"<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>".$counter."</td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]."</td>";
										
										$r = $r - 1;
										$counter = $keys_v[$count-$r]/($amount1);
										$total = $total + $keys_v[$count-$r];
										$total_counter = $total_counter + $counter;
										echo"<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>".$counter."</td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]."</td>";
										
									}else{
										//$r = $r + 1;
										echo "<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>&emsp;</td><td style='width:80px; border-bottom: 1px solid black'>&emsp;</td>";
										$counter = $keys_v[$count-$r]/($amount1*0.7);
										$total = $total + $keys_v[$count-$r];
										$total_counter = $total_counter + $counter;
										echo"<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'".$counter."</td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]."</td>";
										//$r = $r - 1;
										$counter = $keys_v[$count-$r]/($amount1*0.3);
										$total = $total + $keys_v[$count-$r];
										$total_counter = $total_counter + $counter;
										echo"<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>".$counter."</td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]."</td>";
									}
								}
								else{

									$r = $r + 0;
									$keys[$count-$r];
									if($keys[$count-$r] == "p30"){
										$counter = $keys_v[$count-$r]/($amount1*0.3);
										$total = $total + $keys_v[$count-$r];
									$total_counter = $total_counter + $counter;
										echo"<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>".$counter."</td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]."</td>";
										echo "<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>&emsp;</td><td style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>&emsp;</td>";
										$r = $r - 1;
										$counter = $keys_v[$count-$r]/($amount1);
										$total = $total + $keys_v[$count-$r];
									$total_counter = $total_counter + $counter;
										echo"<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>".$counter."</td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]."</td>";
										
									}else{
										//$r = $r + 1;
										echo "<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>&emsp;</td><td style='width:80px'>&emsp;</td>";
										$counter = $keys_v[$count-$r]/($amount1*0.7);
										$total = $total + $keys_v[$count-$r];
									$total_counter = $total_counter + $counter;
										echo"<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>".$counter."</td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]."</td>";
										$r = $r + 1;
										$counter = $keys_v[$count-$r]/($amount1*0.3);
										$total = $total + $keys_v[$count-$r];
									$total_counter = $total_counter + $counter;
										echo"<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>".$counter."</td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]."</td>";
									}
								}
								echo "<!--td style='width:40px; border-right:1px solid white'></td--><td style='width:80px; text-align:center; border-bottom: 1px solid black'>$total</td>";
							}else if($count == '1'){
								//print_r($percent_value);
								$total = '';
								$total_counter = '';
								if($keys[$count-$r] == "p100"){
									echo "<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>&emsp;</td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>&emsp;</td>";
									echo "<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>&emsp;</td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>&emsp;</td>";
									$counter = $keys_v[$count-$r]/$amount1;
									$total = $total + $keys_v[$count-$r];
									$total_counter = $total_counter + $counter;
									echo"<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>".$counter."</td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]."</td>";
										
								}else if($keys[$count-$r] == "p70"){
									$counter = $keys_v[$count-$r]/($amount1*0.7);
									$total = $total + $keys_v[$count-$r];
									$total_counter = $total_counter + $counter;
									echo "<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>&emsp;</td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>&emsp;</td>";
									echo"<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>".$counter."</td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]."</td>";
									echo "<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>&emsp;</td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>&emsp;</td>";	
								}else{
									$counter = $keys_v[$count-$r]/($amount1*0.3);
									$total = $total + $keys_v[$count-$r];
									$total_counter = $total_counter + $counter;
									echo"<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>".$counter."</td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>".$keys_v[$count-$r]."</td>";
									echo "	<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>&emsp;</td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>&emsp;</td>";
									echo "<td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'>&emsp;</td><td valign='middle' style='width:80px; border-right:1px solid white; border-bottom: 1px solid black'>&emsp;</td>";
										
								}
								echo "<!--td style='width:40px; border-right:1px solid white; border-bottom: 1px solid black'></td--><td style='width:80px; border-right:1px solid white; text-align:center; border-bottom: 1px solid black'>$total</td>";										
							}else{}

							$query1 = "SELECT e.pfno, e.name, e.desig, e.bp, ta.reference_id, SUM(ta.amount) as sum from employees as e INNER JOIN taentryforms as ta ON e.pfno = ta.empid WHERE ta.reference_id IN(SELECT reference FROM tbl_summary_details where summary_id = '".$_REQUEST['id']."' and reject_pending='0' and empid='".$val['pfno']."') GROUP BY ta.reference_id order by ta.taDate";
							$result1 = mysql_query($query1);
							$total = 0;
							$cont_data = '';
							
							$data = "";
							$row_no = mysql_affected_rows();
							while($res = mysql_fetch_array($result1))
							{
								
								$cont_total = 0;
								
							    $data .= "<a href='show_seperate_claim.php?id=".$res['reference_id']."' class='btn btn-primary btn-sm' style='margin-bottom: 5px'>Show</a><br/>"; 
								$innner = mysql_query("select * from `continjency_master` where reference='".$res['reference_id']."'");
								
								while($resultset = mysql_fetch_array($innner))
								{
									$inner_query = mysql_query("SELECT SUM(total_amount) as total FROM `continjency` where cid='".$resultset['id']."' and set_number='".$resultset['set_number']."'");
									
									//echo "SELECT SUM(total_amount) as total FROM `continjency` where cid='".$resultset['id']."' and set_number='".$resultset['set_number']."'";
									$resultinner = mysql_fetch_array($inner_query);
									$total = $total + (int) $resultinner['total'];
									$cont_total = $cont_total + (int) $resultinner['total'];

								}
								$cont_data .= "<span style='line-height:1.8; border-bottom: 1px solid black'>".$cont_total."</span><br/>";
								if($sum_count <= $row_no){
									$conti_sum += $cont_total;
									$sum_count++;
									//echo $row_no;
								}


   							}

       						$total_sum = $total_sum + $total;
							
							if($dummy == 0){

								echo "<td  rowspan='3' style='width:100px; border-right:1px solid white; border-left: 1px solid white'>$cont_data</td>";
  								echo "<td class='hidden-print' style='width:40px' rowspan='3'>";
								echo "$data</td></tr>";

							}$dummy++;
//							$sum = $sum + (int)$val['sum'];
							//echo "<td>&emsp;</td><td>&emsp;</td>";
						echo "</tr>";
						}
$sum_count = 1;
						echo "</table>";
						$pf_cnt++;
					}
					echo "</td></tr>";
				}
				$sr++;
				$d = '';
			}
			echo '<tr>
				<td colspan="15" style="text-align:right; font-size:16px; font-weight:bold; padding-right:60px">Total</td>
				<td style="font-size:16px; font-weight:bold;" class="text-left">'.$cont_sum.'</td>
				<td style="font-size:16px; font-weight:bold; width:10px" class="text-center">'.$conti_sum.'</td>
				<td class="hidden-print"></td>
			</tr>';
			echo "</table>";
			?>
					</div>

				<div class="row">
						<div class="col-xs-offset-8 col-xs-3 pull-right">
					<?php 
					echo "<br/>";
					if($_SESSION['role'] == 'AP'){
						$query= "select * from forward_data where reference_id='".$ref."' AND fowarded_to='".$_SESSION['empid']."' order by id desc limit 1";
					}else{
						$query = "select * from forward_data where reference_id='".$ref."' AND fowarded_to='12212325' order by id desc limit 1";
					}
					$query_approve = mysql_query($query);
					$result_approve = mysql_fetch_array($query_approve);
					$hold_status = $result_approve['hold_status'];
					$query_select = mysql_query("SELECT * FROM tbl_summary where id = '".$_REQUEST['id']."'");
					$result_set = mysql_fetch_array($query_select);
					if($result_set['forward_status']=='1' && $_SESSION['role']!='5' && $hold_status=='1' )
					{
						echo "<button class='btn btn-primary' style='margin-left:10px;' data-toggle='modal' data-target='#forward'>Approve and Forward</button>";
					} else if($hold_status=='1' && $_SESSION['role']=='5') {
						echo "<button class='btn btn-primary hide-print' style='margin-left:10px;' data-toggle='modal' data-target='#final_approve'>Vett</button>";
					} 
					else if($hold_status=='1') 
					{
						echo "<button class='btn btn-info' style='margin-left:10px;' data-toggle='modal' data-target = '#final_approve' >Approve </button> ";
					}
					echo "<button class='btn btn-success hide-print' style='margin-left:10px;' onclick='winprint();' >Print</button>"; ?>
						</div>
					</div>
					</div>
					<!-- /.box-body -->
				</div>

			<?php } ?>
			
    </section>
  </div>
  
  <!--Content code end here--->
  <div class='hide-print'>
 <?php
	require_once("../../global/footer.php");
 ?>
 </div>
 
  <!-- Modal -->
<div id="forward" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="border-bottom-color: white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3>Forward Summary Report </h3>
      </div>
      <form action='control/adminProcess.php?action=establishment_send' method="post">
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" name="original_id" value="<?php echo $_REQUEST['id']; ?>">
          
        <!--div class="col-xs-offset-1 col-xs-2"><label for="">User</label></div>
        <div class="col-xs-7"-->
            <select name="forwardName" class="form-control " style="width: 100%; display: none" required="required">
              <?php 
                $query = "SELECT * FROM employees where pfno IN ( select empid from users where status='1' AND id<>'1' and role='5' AND empid = '12212325')";
                $result = mysql_query($query);
                while($value = mysql_fetch_array($result))
                {
                  echo "<option selected='selected' value='".$value['pfno']."'>".$value['name']."  (".$value['desig'].")</option>";
                }
              ?>
            </select>
        <!--/div>
      </div-->
      </div>
      <div class="modal-footer" style="margin-top:0px;">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
    </form>
    </div>

  </div>
</div>

<div id="ReturntoEst" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="border-bottom-color: white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2>Reject and Send for approval </h2>
      </div>
      <form action='control/adminProcess.php?action=establishment_reject' method="post">
      <div class="modal-body" style="padding:20px;">
	  <h2>Are you sure, you want to reject this claim?</h2>
        <div class="form-group">
          <input type="hidden" name="reject_ref" id="reject_ref">
       
      </div>
      </div>
      <div class="modal-footer" style="margin-top:40px;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Forward to Est. Admin</button>
      </div>
    </form>
    </div>

  </div>
</div>

<!-- Modal Final Approve -->
<div id="final_approve" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="border-bottom-color: white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2>Approve Summary Report </h2>
      </div>
      <!--form action='control/adminProcess.php?action=finalapprove' method="post"-->
      <form action='control/adminProcess.php?action=finalapprove1' method="post">
      <div class="modal-body" style="padding:20px;">
        <h3>Are you sure, Confirm Approve?
        	<input type="hidden" name="refernce_collected" id="refernce_collected" value="<?php echo $ref_data; ?>" />
		<input type="hidden" name="original_id" value="<?php echo $_REQUEST['id']; ?>">
      </div>
      <div class="modal-footer" style="margin-top:40px;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Approve</button>
      </div>
    </form>
    </div>

  </div>
</div>

<!-- Modal Final Approve -->



<script>
	function winprint()
	{
		$(".hide-print").hide();
		window.print();
		$(".hide-print").show();
	}
	$(document).on("click",".return_btn",function(){
		var value = $(this).val();
		var emp = $(this).attr('emp');
		alert(emp +" " + value);
		$("#return_id").val(value);
		$("#return_emp").val(emp);
	});

	$(document).on("click",".reject_btn",function(){
		var value = $(this).val();
		$("#reject_ref").val(value);
	});
	
	
</script>