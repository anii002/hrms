<?php

require_once 'DB_connect.php';
require_once 'DB_function.php';
$db=new DB_Connect();
$db1=new DB_Function();
$response=array();
// json response array
// $response = array("error" => FALSE); 

if(isset($_REQUEST['empid']))
{
$empid=$_REQUEST['empid'];
// 	echo "userExist";
$db->hrms_sur_connect();
if($db1->isUserExisted($empid))
	{
	
	$temp=array();
		$temp["error"]=TRUE;
		$temp["error_msg"]="User already Existed with ".$empid;
		
		array_push($response,$temp);
		
		echo json_encode($response);
	}else
	{
								
									$db->hrms_sur_connect();
									//$srNo=0;
										$query = mysql_query("select empno,empname ,desigcode ,phoneno ,payrate ,deptcode ,billunit,stationcode,birthdate,rlyjoindate,pc7_level from prmaemp where empno='".$empid."'");
										while($query_result = mysql_fetch_array($query))
										{
											
								
											
											$temp=array();
												$temp["error"]=FALSE;
											//$temp['srNo']=$query_result[$srNo++];
											$temp['pf_number']=$query_result['empno'];
											$temp['empname']=$query_result['empname'];
											$desigcode=$query_result['desigcode'];
											$temp['mobile']=$query_result['phoneno'];
											
											$temp['payrate']=$query_result['payrate'];
											$temp['rlyjoindate']=$query_result['rlyjoindate'];
											$deptcode=$query_result['deptcode'];
											$temp['pc7_level']=$query_result['pc7_level'];
											$temp['billunit']=$query_result['billunit'];
											$stationcode=$query_result['stationcode'];
											$temp['birthdate']=$query_result['birthdate'];
											
										
											$selectDesig=mysql_query("SELECT DESIGLONGDESC FROM designations WHERE DESIGCODE='".$desigcode."'");
											$resDesig=mysql_fetch_array($selectDesig);
											
											$temp['desig']=$resDesig['DESIGLONGDESC'];
											
											$selectDept=mysql_query("SELECT DEPTDESC FROM departments WHERE DEPTNO='".$deptcode."'");
											$resDept=mysql_fetch_array($selectDept);
											
											$temp['dept']=$resDept['DEPTDESC'];
											
											
                                            $selectStation=mysql_query("SELECT stationdesc FROM station WHERE stationcode='SUR'");
											$resStation=mysql_fetch_array($selectStation);
											
											$temp['station']=$resStation['stationdesc'];
																						
								// 			$selectPayLevel=mysql_query("SELECT level FROM payband_master WHERE gradepay='".$scalecode."'");
								// 			$resPayLevel=mysql_fetch_array($selectPayLevel);
											
								// 			$temp['Level']=$resPayLevel['level'];
											
											
											
														
																
											
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
								 
}
			
   
 ?>
