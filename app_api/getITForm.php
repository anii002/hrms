<?php

require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();


	$pf=$_REQUEST['pf'];
								
									$db->hrms_sur_connect();
									//$srNo=0;
										$query = mysql_query(" SELECT * FROM `tblpdfread` where pfno='$pf'");
										
										
										while($query_result = mysql_fetch_array($query))
										{
											
											
											
											$temp=array();
											//$temp['srNo']=$query_result[$srNo++];
											$temp['id']=$query_result['id'];
											$temp['year']=$query_result['year'];
											$url='http://drmpsur-hrms.in/uploads/';
											$temp['url']=$url.$query_result['path'];
											
											
																
											
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
