<?php

require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();

if(isset($_REQUEST['empid']))
{
$empid=$_REQUEST['empid'];
	
								
									$db->sr_connect();
									//$srNo=0;
										$query = mysql_query("select awd_pf_number,awd_date,awd_by,awd_type,awd_other,awd_detail FROM award_temp where awd_pf_number='".$empid."'");
										while($query_result = mysql_fetch_array($query))
										{
											
											
											
											$temp=array();
											//$temp['srNo']=$query_result[$srNo++];
											$temp['pf_number']=$query_result['awd_pf_number'];
											$AwdType=$query_result['awd_type'];
											$temp['awd_date']=$query_result['awd_date'];
											$AwardedBy=$query_result['awd_by'];
											$temp['awd_other']=$query_result['awd_other'];
											$temp['awd_detail']=$query_result['awd_detail'];
											
											$db->sr_new_connect();
											$selectAwdBy=mysql_query("SELECT awarded_by FROM awarded_by WHERE id='".$AwardedBy."'");
											$resAwdBy=mysql_fetch_array($selectAwdBy);
											
											$temp['awarded_by']=$resAwdBy['awarded_by'];
											
											$selectAwdType=mysql_query("SELECT awards FROM awards WHERE id='".$AwdType."'");
											$resAwdType=mysql_fetch_array($selectAwdType);
											
											$temp['awd_type']=$resAwdType['awards'];
											
														
																
											
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
