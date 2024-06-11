<?php

require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();

if(isset($_REQUEST['empid']))
{
$empid=$_REQUEST['empid'];
	
								
									$db->sr_connect();
									//$srNo=0;
										$query = mysql_query("select adv_pf_number,adv_type,adv_letterno,adv_letterdate,adv_wefdate,adv_amount,adv_principle,adv_interest,adv_from,adv_to,adv_remark from advance_temp where adv_pf_number='".$empid."'");
										while($query_result = mysql_fetch_array($query))
										{
											
											
											
											$temp=array();
											//$temp['srNo']=$query_result[$srNo++];
											$temp['pf_number']=$query_result['adv_pf_number'];
											$AdvType=$query_result['adv_type'];
											$temp['adv_letterno']=$query_result['adv_letterno'];
											$temp['adv_letterdate']=$query_result['adv_letterdate'];
											$temp['adv_wefdate']=$query_result['adv_wefdate'];
											$temp['adv_amount']=$query_result['adv_amount'];
											$temp['adv_principle']=$query_result['adv_principle'];
											$temp['adv_interest']=$query_result['adv_interest'];
											$temp['adv_from']=$query_result['adv_from'];
											$temp['adv_to']=$query_result['adv_to'];
											$temp['remarks']=$query_result['adv_remark'];
											$db->sr_new_connect();
											$selectTrtype=mysql_query("SELECT long_desc FROM advance WHERE id='".$AdvType."'");
											$resTrType=mysql_fetch_array($selectTrtype);
											
											$temp['Adv_type']=$resTrType['long_desc'];
											
											
											
														
																
											
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
