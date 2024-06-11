<?php

require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();


	
								
									$db->hrms_eims_connect();
									//$srNo=0;
										$query = mysql_query(" SELECT * FROM `seniority_list` order by id desc");
										
										
										while($query_result = mysql_fetch_array($query))
										{
											
											
											
											$temp=array();
											//$temp['srNo']=$query_result[$srNo++];
											$temp['id']=$query_result['id'];
											$temp['year']=$query_result['year'];
											$temp['subject']=$query_result['subject'];
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
