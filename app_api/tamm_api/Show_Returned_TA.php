<?php

require_once 'DB_function.php';
$db=new DB_Function();
$response=array();

if(isset($_REQUEST['empid']))
{
$empid=$_REQUEST['empid'];
	
								
								
									$query = "SELECT taentryform_master.reference, taentryform_master.TAYear, taentryform_master.TAMonth, SUM(taentryforms.distance) AS distance, SUM(taentryforms.amount) as rate FROM taentryform_master INNER JOIN taentryforms ON taentryform_master.reference = taentryforms.reference_id WHERE taentryforms.reference_id in (select taentryform_master.reference from taentryform_master where taentryform_master.empid='".$empid."') GROUP BY taentryforms.reference_id";
								
								//echo $query;		
									$result = mysql_query($query);
									while($val = mysql_fetch_array($result))
									{
										$query = mysql_query("select * from forward_data where reference_id='".$val['reference']."' ORDER BY id DESC LIMIT 1");
										$query_result = mysql_fetch_array($query);
										if($query_result['admin_returned_status']=='1')
										{
											
											$temp=array();
	
											$temp['amount']=$val['rate'];
											$temp['reference_id']=$val['reference'];
											$temp['TAYear']=$val['TAYear'];
											$temp['TAMonth']=$val['TAMonth'];
											$temp['distance']=$val['distance'];
											
											
											array_push($response,$temp);
	
											

										/*echo "
										<tr>
											<td>".$val['reference']."</td>
											<td>".$val['TAYear']."</td>
											<td>".$val['TAMonth']."</td>
											<td>".$val['distance']."</td>
											<td>".$val['rate']."</td>
											<td><a href='show_returned_seperate.php?id=".$val['reference']."' class='btn btn-primary'>दर्शाया जाए / Show</a>
										</tr>
										";*/
									}
									
									
								}
								echo json_encode($response); 
								
								 

			
}
 ?>
