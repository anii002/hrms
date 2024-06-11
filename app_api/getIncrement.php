<?php

require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();

if(isset($_REQUEST['empid']))
{
$empid=$_REQUEST['empid'];
	
								
									$db->sr_connect();
									//$srNo=0;
										$query = mysql_query("select incr_pf_number,incr_type,incr_date,ps_type,incr_scale,incr_rop,incr_remark from increment_temp where incr_pf_number='".$empid."'");
										while($query_result = mysql_fetch_array($query))
										{
											
											
											
											$temp=array();
											//$temp['srNo']=$query_result[$srNo++];
											$temp['pf_number']=$query_result['incr_pf_number'];
											$incrType=$query_result['incr_type'];
											$temp['incr_date']=$query_result['incr_date'];
											$payScaleType=$query_result['ps_type'];
											$temp['incr_scale']=$query_result['incr_scale'];
											$temp['incr_rop']=$query_result['incr_rop'];
											$temp['incr_remark']=$query_result['incr_remark'];
											$db->sr_new_connect();
											$selectIncrtype=mysql_query("SELECT increment_type FROM increment_type WHERE id='".$incrType."'");
											$resIncrType=mysql_fetch_array($selectIncrtype);
											
											$temp['incr_type']=$resIncrType['increment_type'];
											
											$selectPSType=mysql_query("SELECT type FROM pay_scale_type WHERE id='".$payScaleType."'");
											$resPSType=mysql_fetch_array($selectPSType);
											
											$temp['ps_type']=$resPSType['type'];
											
														
																
											
											array_push($response,$temp);
											
										}
echo json_encode($response);
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
									
									
								
								//echo json_encode($response);
								 
}
			
   
 ?>
