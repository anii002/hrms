<?php

require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();

if(isset($_REQUEST['empid']))
{
$empid=$_REQUEST['empid'];
	
								
									$db->sr_connect();
									//$srNo=0;
										$query = mysql_query("select trans_pf_no,trans_order_type,temp_transaction_id from prft_transfer_temp where trans_pf_no='".$empid."'");
										while($query_result = mysql_fetch_array($query))
										{
											
											
											
											$temp=array();
											//$temp['srNo']=$query_result[$srNo++];
											$temp['pf_number']=$query_result['trans_pf_no'];
											$orderType=$query_result['trans_order_type'];
											$temp['temp_transaction_id']=$query_result['temp_transaction_id'];
											$db->sr_new_connect();
											$query=mysql_query("SELECT type FROM order_type_transfer WHERE id='".$orderType."'");
											$res=mysql_fetch_array($query);
											
											$temp['order_type']=$res['type'];
											
														
																
											
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
