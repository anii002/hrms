<?php

require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();
if(isset($_REQUEST['empid'])&&isset($_REQUEST['year']))
{
$empid=$_REQUEST['empid'];
$year=$_REQUEST['year'];
	
								
									$db->apar_connect();
										$query = mysql_query("select image from scanned_img where empid='".$empid."' AND year='".$year."'");
										while($query_result = mysql_fetch_array($query))
										{
											
											$temp=array();
											$url=$query_result['image'];
											$restURL=substr($url,0,-4);
											$ImgURL="http://www.drmpsur-hrms.in/e-apar/main/resources/NAME_PFNO/".$empid."/".$year."/".$restURL.".jpg";
											
											$temp['imgURL']=$ImgURL;
														
																
											
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
