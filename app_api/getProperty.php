<?php

require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();

if(isset($_REQUEST['empid']))
{
$empid=$_REQUEST['empid'];
	
								
									$db->sr_connect();
									//$srNo=0;
										$query = mysql_query("select pro_pf_number,pro_type,pro_item,pro_otheritem,pro_make,pro_dop,pro_location,pro_regno,pro_area,pro_surveyno,pro_cost,pro_source,pro_sourcetype,pro_amount,pro_letterno,pro_letterdate,pro_remark from property_temp where pro_pf_number='".$empid."'");
										while($query_result = mysql_fetch_array($query))
										{
											
											
											
											$temp=array();
											//$temp['srNo']=$query_result[$srNo++];
											$temp['pf_number']=$query_result['pro_pf_number'];
											$ProType=$query_result['pro_type'];
											$ProItem=$query_result['pro_item'];
											$temp['other_item']=$query_result['pro_otheritem'];
											$temp['pro_make']=$query_result['pro_make'];
											$temp['pro_dop']=$query_result['pro_dop'];
											$temp['pro_location']=$query_result['pro_location'];
											$temp['pro_regno']=$query_result['pro_regno'];
											$temp['pro_area']=$query_result['pro_area'];
											$temp['pro_surveyno']=$query_result['pro_surveyno'];
											$temp['pro_cost']=$query_result['pro_cost'];
											$temp['pro_source']=$query_result['pro_source'];
											$ProSourceType=$query_result['pro_sourcetype'];
											$temp['pro_amount']=$query_result['pro_amount'];
											$temp['pro_letterno']=$query_result['pro_letterno'];
											$temp['pro_letterdate']=$query_result['pro_letterdate'];
											$temp['pro_remark']=$query_result['pro_remark'];
											
											
											$db->sr_new_connect();
											$selectProtype=mysql_query("SELECT type FROM property_type WHERE id='".$ProType."'");
											$resProType=mysql_fetch_array($selectProtype);
											
											$temp['Pro_type']=$resProType['type'];
											
											$selectProItem=mysql_query("SELECT item FROM property_item WHERE id='".$ProItem."' AND type='".$ProType."'");
											$resProItem=mysql_fetch_array($selectProItem);
											
											$temp['pro_item']=$resProItem['item'];
											
											$selectProSourceType=mysql_query("SELECT property_source FROM property_source WHERE id='".$ProSourceType."'");
											$resProSourceType=mysql_fetch_array($selectProSourceType);
											
											$temp['source_type']=$resProSourceType['property_source'];
											
											
											
														
																
											
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
