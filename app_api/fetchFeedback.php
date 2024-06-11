<?php

require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();

$pfNo=$_REQUEST['pfNo'];


	
								
									$db->feedback_connect();
									//$srNo=0;
	$query = mysql_query("SELECT * FROM feedback WHERE pfno = '".$pfNo."' ORDER BY id DESC");										
										
										while($query_result = mysql_fetch_array($query))
										{
											
											
											
											$temp=array();
											//$temp['srNo']=$query_result[$srNo++];
											$temp['feedbackDate']=$query_result['created_date'];
											$temp['feedback']=bin2hex($query_result['feedback']);
											$temp['suggestion']=bin2hex($query_result['suggestion']);
											$file=$query_result['file'];
											if($file=="")
											{
											    $temp['url']="";
											}else{
											$temp['url']="http://drmpsur-hrms.in/feedback/control/doc/".$query_result['file'];
											}
											
																
											
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
