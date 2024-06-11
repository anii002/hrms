<?php

require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();


	
								
									$db->selection_calendar_connect();
									//$srNo=0;
										$query = mysql_query("select circular_no,subject,issued_date,issued_section FROM circular_tbl");
										while($query_result = mysql_fetch_array($query))
										{
											
											
											
											$temp=array();
											//$temp['srNo']=$query_result[$srNo++];
											$temp['circular_no']=$query_result['circular_no'];
											$temp['subject']=$query_result['subject'];
											$temp['created_at']=$query_result['issued_date'];
											$temp['issued_section']=$query_result['issued_section'];
											
											
														
																
											
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
