<?php

require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();

if(isset($_REQUEST['empid']))
{
$empid=$_REQUEST['empid'];
	
								
									$db->sr_connect();
									//$srNo=0;
										$query = mysql_query("select pf_number,training_type,last_date,due_date,training_from,training_to,letter_no,letter_date,description,remarks from training_temp where pf_number='".$empid."'");
										while($query_result = mysql_fetch_array($query))
										{
											
											
											
											$temp=array();
											//$temp['srNo']=$query_result[$srNo++];
											$temp['pf_number']=$query_result['pf_number'];
											$TrType=$query_result['training_type'];
											$temp['last_date']=$query_result['last_date'];
											$temp['due_date']=$query_result['due_date'];
											$temp['training_from']=$query_result['training_from'];
											$temp['training_to']=$query_result['training_to'];
											$temp['letter_no']=$query_result['letter_no'];
											$temp['letter_date']=$query_result['letter_date'];
											$temp['description']=$query_result['description'];
											$temp['remarks']=$query_result['remarks'];
											$db->sr_new_connect();
											$selectTrtype=mysql_query("SELECT type FROM training_type WHERE id='".$TrType."'");
											$resTrType=mysql_fetch_array($selectTrtype);
											
											$temp['Tr_type']=$resTrType['type'];
											
											
											
														
																
											
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
