<?php

require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();

if(isset($_REQUEST['empid']))
{
$empid=$_REQUEST['empid'];
	
								
									$db->sr_connect();
									//$srNo=0;
										$query = mysql_query("select nom_pf_number,nom_type,nom_name,nom_rel,nom_otherrel,nom_per,nom_status,nom_age,nom_dob,nom_panno,nom_aadhar,nom_address,nom_conti,nom_subscriber FROM nominee_temp where nom_pf_number='".$empid."'");
										while($query_result = mysql_fetch_array($query))
										{
											
											
											
											$temp=array();
											//$temp['srNo']=$query_result[$srNo++];
											$temp['pf_number']=$query_result['nom_pf_number'];
											$NomType=$query_result['nom_type'];
											$temp['nom_name']=$query_result['nom_name'];
											$temp['nom_rel']=$query_result['nom_rel'];
											$temp['nom_otherrel']=$query_result['nom_otherrel'];
											$temp['nom_per']=$query_result['nom_per'];
											$MaritalStatus=$query_result['nom_status'];
											$temp['nom_age']=$query_result['nom_age'];
											$temp['nom_dob']=$query_result['nom_dob'];
											$temp['nom_panno']=$query_result['nom_panno'];
											$temp['nom_aadhar']=$query_result['nom_aadhar'];
											$temp['nom_address']=$query_result['nom_address'];
											$temp['nom_conti']=$query_result['nom_conti'];
											$temp['nom_subscriber']=$query_result['nom_subscriber'];
											$db->sr_new_connect();
											$selectNomType=mysql_query("SELECT nomination_type FROM nomination_type WHERE id='".$NomType."'");
											$resNomType=mysql_fetch_array($selectNomType);
											
											$temp['nomination_type']=$resNomType['nomination_type'];
											
											$selectMaritalStatus=mysql_query("SELECT shortdesc FROM marital_status WHERE id='".$MaritalStatus."'");
											$resMaritalStatus=mysql_fetch_array($selectMaritalStatus);
											
											$temp['marital_status']=$resMaritalStatus['shortdesc'];
											
														
																
											
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
