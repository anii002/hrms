<?php

require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();


	if(isset($_REQUEST['refNo']))
	{
						
			$refNo=$_REQUEST['refNo'];
			
									$db->selection_calendar_connect();
									//$srNo=0;
										$query = mysql_query("select file_path FROM notification_tbl where notification_ref_no='".$refNo."'");
										$res=mysql_fetch_array($query);
										
										$path=$res['file_path'];
										$finalURL="http://localhost/hrms/".$path;
										$response['array']['url']=$finalURL;
										
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
									
	}	
								
								//echo json_encode($response);
   
 ?>
