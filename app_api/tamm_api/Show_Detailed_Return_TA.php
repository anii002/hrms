<?php

require_once 'DB_function.php';
$db=new DB_Function();
$response=array();
if(isset($_REQUEST['reference_id']))
{
	$reference_id=$_REQUEST['reference_id'];
  $empl_query = mysql_query("select * from taentryform_master where reference='".$reference_id."'");
  $empl_id_result = mysql_fetch_array($empl_query);
  $empl_id = $empl_id_result['empid'];

  $emp_query = mysql_query("select * from employees where pfno='".$empl_id."'");
  $emp_result = mysql_fetch_array($emp_query);
  $years=["January","February","March","April","May","June","July","August","September","October","November","December"];
  $expl = explode(",",$empl_id_result['TAMonth']);
        

	
         
                 
              
				  $query_select = "select forward_status from taentryform_master where reference='".$reference_id."'";
          $result_select = mysql_query($query_select);
          $value_select = mysql_fetch_array($result_select);
		  
                    $query_first = "select DISTINCT(set_number) from taentryforms where reference_id='".$reference_id."'";
                    $result_first = mysql_query($query_first);
                    while($val_first = mysql_fetch_array($result_first))
                    {
                        $query = "SELECT * FROM taentryform_master INNER JOIN taentryforms ON taentryform_master.reference = taentryforms.reference_id WHERE taentryform_master.reference='".$reference_id."' AND taentryforms.set_number='".$val_first['set_number']."'";
                        $result = mysql_query($query);
                        $rows = mysql_num_rows($result);
                        $cnt = 1;
                        while($val = mysql_fetch_array($result))
                        {
							$query_first2 = "select SUM(amount) AS sum from taentryforms where reference_id='".$reference_id."'";
											  $result_first2 = mysql_query($query_first2);
											  $values2 = mysql_fetch_array($result_first2);

							
							$temp=array();
                          //echo "
                          //<tr>";
                          if($cnt == 1)
                            {
                                //echo "<td rowspan='$rows'>".$val['cardpass']."</td>";
								$temp['token']=$val['cardpass'];
                            }
                            //$date = date_create($val['taDate']);
							$temp['taDate']=$val['taDate'];
                            //echo "<td>".date_format($date,"d/m/Y")."</td>
                            //<td>".$val['train']."</td>
                            //<td>".$val['departS']."</td>";
							$temp['trainno']=$val['train'];
                            if($val['departT']!="00:00:00")
                             //echo "<td>". $val['departT']."</td>";
						 $temp['departT']=$val['departT'];
                            else
                              //echo "<td></td>";
                            //echo "<td>".$val['arrivalS']."</td>";
							$temp['arrivalS']=$val['arrivalS'];
                            if($val['arrivalT']!="00:00:00")
                            // echo "<td>". $val['arrivalT']."</td>";
						$temp['arrivalT']=$val['arrivalT'];
                            else
                             // echo "<td></td>";
                            //echo "<td>".$val['amount']."</td>
							$temp['amount']=$val['amount'];
                            //<td>".$val['percent']."</td>";
							$temp['percent']=$val['percent'];
                            if($cnt == 1)
                            {
                                //echo "<td rowspan='$rows'>".$val['Objective']."</td>";
								$temp['objective']=$val['Objective'];
								
                                
                                $cnt++;
                            }
							$temp['TAmount']=$values2['sum'];

                         array_push($response,$temp);
                        }
                        
                      }
                   echo json_encode($response);
                       
					  
}
?>
