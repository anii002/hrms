<?php

require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();

if(isset($_REQUEST['empid']))
{
$empid=$_REQUEST['empid'];
	
								
									$db->sr_connect();
									//$srNo=0;
										$query = mysql_query("select medi_examtype,medi_class,medi_certino,medi_certidate from medical_temp where medi_pf_number='".$empid."'");
										while($query_result = mysql_fetch_array($query))
										{
											
											
											
											$temp=array();
											//$temp['srNo']=$query_result[$srNo++];
											$temp['medi_examtype']=$query_result['medi_examtype'];
											$temp['medi_class']=$query_result['medi_class'];
											$temp['medi_certino']=$query_result['medi_certino'];
											$temp['medi_certidate']=$query_result['medi_certidate'];
											
														
																
											
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
