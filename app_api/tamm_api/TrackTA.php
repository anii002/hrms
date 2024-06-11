<?php 
                    require_once 'DB_function.php';
					$db1=new DB_Function();
					$response=array();
					//echo $_REQUEST['refno'];
					if(isset($_REQUEST['refno']))
					{
						$refNo=$_REQUEST['refno'];
						
						$query=mysql_query("SELECT fowarded_to,arrived_time FROM forward_data WHERE reference_id='".$refNo."' AND hold_status='1'");
						
						$res=mysql_num_rows($query);
						if($res>0)
						{
						
											while($result=mysql_fetch_array($query))
											{
											
													$pfno=$result['fowarded_to'];
													$arr_time=$result['arrived_time'];
													$selectName=mysql_query("SELECT name FROM employees WHERE pfno='".$pfno."'");
													
													$result1=mysql_fetch_array($selectName);
													
													$name=$result1['name'];
											
											
																$temp=array();
						
																$temp['forwarded_to']=$name;
																$temp['arrived_time']=$arr_time;
																
																
																
																array_push($response,$temp);
											}
																echo json_encode($response);
											
											
						
						
						
						}else
						{
							$query=mysql_query("SELECT fowarded_to,arrived_time FROM forward_data WHERE reference_id='".$refNo."' AND admin_approve='1'");
						}
					}
					

?>