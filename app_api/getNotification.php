<?php

require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();


	
								
									$db->hrms_eims_connect();
									//$srNo=0;
									mysql_query("set names 'utf8'");
										$query = mysql_query(" SELECT * FROM `e-notification1` order by id desc");
										 header( 'Content-Type: text/html; charset=utf-8' );
								// 		echo "error".mysql_error();
										
										while($query_result = mysql_fetch_array($query))
										{
											
											
											
											$temp=array();
											//$temp['srNo']=$query_result[$srNo++];
											$temp['ref_no']=$query_result['ref_no'];
											$temp['notification_date']=$query_result['notification_date'];
											//$temp['subject']=bin2hex($query_result['subject']);
											$temp['subject']=($query_result['subject']);
											$temp['url']=$query_result['url'];
											
																
											
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
   
 ?>
