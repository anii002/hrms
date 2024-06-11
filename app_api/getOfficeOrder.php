<?php

require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();


	
								
									$db->hrms_eims_connect();
									//$srNo=0;
										$query = mysql_query(" SELECT * FROM `office_order` order by id desc");
										
										
										while($query_result = mysql_fetch_array($query))
										{
											
											
											
											$temp=array();
											//$temp['srNo']=$query_result[$srNo++];
											$temp['Order No']=$query_result['Order No'];
											$temp['Order Date']=$query_result['Order Date'];
											$temp['L No']=$query_result['L No'];
											$temp['Department']=$query_result['Department'];
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
