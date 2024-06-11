
<?php

require_once 'DB_function.php';
$db=new DB_Function();

$response=array();

									function get_employee($id)
						{
							$query = mysql_query("select name from employees where pfno='$id'");
							$result = mysql_fetch_array($query);
							return $result['name'];
						}

								 
if(isset($_REQUEST['empid']))
{
	
	$empid=$_REQUEST['empid'];
								// if($_SESSION['role']=='3')
								// {
									// $query = "SELECT MONTHNAME( taentryform_master.created_at ) as created, taentryform_master.reference, taentryform_master.TAYear,taentryform_master.empid, taentryform_master.TAMonth, SUM(taentryforms.distance) AS distance, SUM(taentryforms.amount) as rate FROM taentryform_master INNER JOIN taentryforms ON taentryform_master.reference = taentryforms.reference_id WHERE taentryform_master.reference IN (select reference_id from forward_data where forward_data.fowarded_to='".$_SESSION['empid']."' AND forward_data.depart_time is null AND admin_approve='0') group by taentryform_master.reference";
								// }
								// else{
									$query = "SELECT MONTHNAME( taentryform_master.created_at ) as created, taentryform_master.reference, taentryform_master.TAYear, taentryform_master.empid, taentryform_master.TAMonth, SUM(taentryforms.distance) AS distance, SUM(taentryforms.amount) as rate FROM taentryform_master INNER JOIN taentryforms ON taentryform_master.reference = taentryforms.reference_id WHERE taentryform_master.reference IN (select reference_id  from forward_data where forward_data.fowarded_to='".$empid."' and admin_approve='0' and admin_returned_status='0' AND depart_time is not null) group by taentryform_master.reference";
									// }
									
									$result = mysql_query($query);
									echo mysql_error();
									while($val = mysql_fetch_array($result))
									{
										// if($val['reference']!=null)
										// {
											
											
											$temp=array();
											
											$temp['reference']=$val['reference'];
											$temp['name']=get_employee($val['empid']);
											$temp['year_month']=$val['TAYear']."/".$val['TAMonth'];
											$temp['rate']=$val['rate'];
											$temp['month']=$val['created'];
											
											array_push($response,$temp);
											
										// echo "
										// <tr>
											// <td>".$val['reference']."/</td>
											// <td>".get_employee($val['empid'])."/</td>
											// <td>".$val['TAYear']."/".$val['TAMonth']."#</td>
											// <td>".$val['rate']."/</td>
// <td>".$val['created']."/</td>
											// <td><a href='show_seperate_claim.php?id=".$val['reference']."' class='btn btn-primary'>Show</a>
										// </tr>
										// ";
										// }
										
										
									}
echo json_encode($response);
}									?>
									