<?php


require_once 'DB_function.php';
$db=new DB_Function();

$refNo=$_REQUEST['reference_id'];
$response=array();
$query_first = "select DISTINCT(set_number) from taentrydetails where reference_no='".$refNo."'";
                    $result_first = mysql_query($query_first);
					$query_select = "select forward_status from taentry_master where reference_no='".$refNo."'";
          $result_select = mysql_query($query_select);
          $value_select = mysql_fetch_array($result_select);
					
					while($val_first = mysql_fetch_array($result_first))
                    {
						$query = "SELECT * FROM taentry_master INNER JOIN taentrydetails ON taentry_master.reference_no = taentrydetails.reference_no WHERE taentry_master.reference_no='".$refNo."' AND taentrydetails.set_number='".$val_first['set_number']."'";
						$cnt=1;
      									$result = mysql_query($query);
										while($value = mysql_fetch_array($result))
      									{
											
											  $query_first2 = "select SUM(amount) AS sum from taentrydetails where reference_no='".$refNo."'";
											  $result_first2 = mysql_query($query_first2);
											  $values2 = mysql_fetch_array($result_first2);

											
											$temp=array();
	
											$temp['amount']=$value['amount'];
											$temp['reference_id']=$value['reference_no'];
											$temp['taDate']=$value['taDate'];
											$temp['percent']=$value['percent'];
											$temp['distance']=$value['distance'];
											$temp['departS']=$value['departS'];
											$temp['arrivalS']=$value['arrivalS'];
											$temp['departT']=$value['departT'];
											$temp['arrivalT']=$value['arrivalT'];
											$temp['token']=$value['cardpass'];
											$temp['trainno']=$value['train_no'];
											$temp['TAmount']=$values2['sum'];
											$temp['objective']=$value['objective'];
											$temp['set_number']=$value['set_number'];
											// if($result_second['total']>=1)
											// {
												// $temp['cont']="yes";
											// }else
											// {
												// $temp['cont']="no";
											// }
										
											
								$query_second="select count(id) as total from continjency_master where reference_no='".$refNo."' and set_number='".$value['set_number']."'";
					$result_second=mysql_query($query_second);
                                
								// if($value_select['forward_status']!='1')
								// {
                                
                                $anotherquery = mysql_query("select count(id) as total from continjency_master where reference_no='".$value['reference_no']."' and set_number='".$val_first['set_number']."'");
                                $resultquery = mysql_fetch_array($anotherquery);
											if($resultquery['total']>=1)
											{
												
												$temp['cont']="yes";
											  // echo '<button value="'.$refNo.'" cnt="'.$val_first['set_number'].'" class="classBtn btn btn-success" data-toggle="modal" data-target="#myModal"  style="margin-top:20px; margin-left:15px" id="view_cont">View Contijency</button>';
											}
											else
											{
												$temp['cont']="no";
											  // echo "<a href='add_contigency.php?claim=".$refNo."&set=".$val_first['set_number']."' class='btn btn-danger hide_print'>Add contigency </a>";
											}
											
											
											
										// }
										$cnt++;
							
							array_push($response,$temp);
										}		
										
					}
					echo json_encode($response);

/*$stmt=mysql_query("SELECT * FROM taentryforms");

$response=array();
while($value=mysql_fetch_array($stmt))
{
	$temp=array();
	
	$temp['amount']=$value['amount'];
	$temp['reference_id']=$value['reference_id'];
	$temp['taDate']=$value['taDate'];
	$temp['percent']=$value['percent'];
	$temp['distance']=$value['distance'];
	$temp['departS']=$value['departS'];
	$temp['arrivalS']=$value['arrivalS'];
	$temp['departT']=$value['departT'];
	$temp['arrivalT']=$value['arrivalT'];
	
	array_push($response,$temp);
	
	
}*/

/*

if($stmt)
{
	$res=mysql_fetch_array($stmt);
	
	$data["data"]=$res["data"];
	
	$jsondata1=json_decode(implode("",$data),true);
	//$arr=$jsondata1["id"];
	
	
	
	foreach($jsondata1 as $value)
	{
		$id=$value['id'];
		$empid=$value['TA']['empid'];
		$referenceNo=$value['referenceno'];
		$taDate=$value['TA']['taDate'];
		$trainno=$value['TA']['trainno'];
		$dStation=$value['TA']['dStation'];
		$departT=$value['TA']['departT'];
		$arriveS=$value['TA']['arriveS'];
		$arrivaT=$value['TA']['arrivaT'];
		$distance=$value['TA']['distance'];
		$journeyType=$value['TA']['journeyType'];
		$objective=$value['TA']['objective'];
		$level=$value['TA']['level'];
		$tamonth=$value['TA']['tamonth'];
		$tokenno=$value['TA']['tokeno'];
		$rowCount=$value['rowCount'];
		$leave=$value['leave'];
		
	$query="INSERT INTO testta(data) VALUES('".$taDate."')";
	$stmt=mysql_query($query);
	echo json_encode($stmt);	
		
	}*/
	//echo json_encode($data);

?>