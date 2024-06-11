<?php
include_once('../dbconfig/dbcon.php');
dbcon();
include('mini_function.php');
include('fetch_all_column.php');
include_once('functions.php');
if (isset($_REQUEST['action'])) {
	switch (strtolower($_REQUEST['action'])) {  
	
	case 'fetch_history':
            dbcon1();
			$pf_no = $_REQUEST['pf'];
			$column = $_REQUEST['val'];
			$table = $_REQUEST['val1'];
			
			$pfnm = $_REQUEST['val2'];
			$getcount = $_REQUEST['getcount'];
            
            $query = mysql_query("select final_transaction_id,$column,date(date_time) as date, time(date_time) as time from $table where $pfnm='$pf_no' and count='$getcount'") or die(mysql_error());
			
            //echo "select final_transaction_id,$column, date(date_time) as date, time(date_time) as time from $table where $pfnm='$pf_no' and count='$getcount'";
		   
			$cnt = 0;
            $sr=1;
            while($resultset = mysql_fetch_array($query))
            {
            	
				if($cnt==0)
            	{
            		$last_change="";
            		$cnt++;
            	}
				
				 if($last_change!=$resultset["$column"]){
            	 echo '<tr>
					       <td>'.$sr.'</td>
						   <td>'.$resultset['final_transaction_id'].'</td>
						   <td></td>';
				
                /*-----------------Biodata History Start-------------------*/	
				
				
				if($column=='religion'){	      
				 echo'<td> '.get_religion($last_change).'</td>'.'<td> '.get_religion($resultset["$column"]).'</td>';	
				}
				else if($column=='community'){	      
				 echo'<td> '.get_community($last_change).'</td>'.'<td> '.get_community($resultset["$column"]).'</td>';	
				}

				else  if($column=='gender'){	      
				 echo'<td> '.get_gender($last_change).'</td>'.'<td> '.get_gender($resultset["$column"]).'</td>';	
				}
				else if($column=='marrital_status'){	      
				 echo'<td> '.got_mr($last_change).'</td>'.'<td> '.got_mr($resultset["$column"]).'</td>';	
				}
				else if($column=='recruit_code'){	      
				 echo'<td> '.get_recruitment_code($last_change).'</td>'.'<td> '.get_recruitment_code($resultset["$column"]).'</td>';	
				}
				else if($column=='group_col'){	      
				 echo'<td> '.get_group($last_change).'</td>'.'<td> '.get_group($resultset["$column"]).'</td>';	
				}
				else if($column=='education_ini'){	      
				 echo'<td> '.get_initial_edu($last_change).'</td>'.'<td> '.get_initial_edu($resultset["$column"]).'</td>';	
				}

				else if($column=='education_sub'){	      
				 echo'<td> '.get_sub_edu($last_change).'</td>'.'<td> '.get_sub_edu($resultset["$column"]).'</td>';	
				}
				
                /*-----------------Biodata History End-------------------*/	
				/*-----------------Present History Start-------------------*/
				// First
				else if($column=='preapp_department'){	      
				 echo'<td> '.get_department($last_change).'</td>'.'<td> '.get_department($resultset["$column"]).'</td>';	
				}
				else if($column=='preapp_designation'){	      
				 echo'<td> '.get_designation($last_change).'</td>'.'<td> '.get_designation($resultset["$column"]).'</td>';	
				}
				else if($column=='ps_type'){	      
				 echo'<td> '.get_pay_scale_type($last_change).'</td>'.'<td> '.get_pay_scale_type($resultset["$column"]).'</td>';	
				}
				else if($column=='preapp_billunit'){	      
				 echo'<td> '.get_billunit($last_change).'</td>'.'<td> '.get_billunit($resultset["$column"]).'</td>';	
				}
				else if($column=='preapp_group'){	      
				 echo'<td> '.get_group($last_change).'</td>'.'<td> '.get_group($resultset["$column"]).'</td>';	
				}
				else if($column=='preapp_station'){	      
				 echo'<td> '.get_station($last_change).'</td>'.'<td> '.get_station($resultset["$column"]).'</td>';	
				}
				else if($column=='preapp_depot'){	      
				 echo'<td> '.get_depot($last_change).'</td>'.'<td> '.get_depot($resultset["$column"]).'</td>';	
				}
				
				// SGD
				 
				else if($column=='sgd_designation'){	      
				 echo'<td> '.get_designation($last_change).'</td>'.'<td> '.get_designation($resultset["$column"]).'</td>';	
				}
				else if($column=='sgd_pst'){	      
				 echo'<td> '.get_pay_scale_type($last_change).'</td>'.'<td> '.get_pay_scale_type($resultset["$column"]).'</td>';	
				}
				else if($column=='sgd_billunit'){	      
				 echo'<td> '.get_billunit($last_change).'</td>'.'<td> '.get_billunit($resultset["$column"]).'</td>';	
				}
				else if($column=='get_group'){	      
				 echo'<td> '.get_group($last_change).'</td>'.'<td> '.get_group($resultset["$column"]).'</td>';	
				}
				else if($column=='get_station'){	      
				 echo'<td> '.get_station($last_change).'</td>'.'<td> '.get_station($resultset["$column"]).'</td>';	
				}
				else if($column=='sgd_depot'){	      
				 echo'<td> '.get_depot($last_change).'</td>'.'<td> '.get_depot($resultset["$column"]).'</td>';	
				}
				
				// OGD
				
				// SGD
				 
				else if($column=='ogd_desig'){	      
				 echo'<td> '.get_designation($last_change).'</td>'.'<td> '.get_designation($resultset["$column"]).'</td>';	
				}
				else if($column=='ogd_pst'){	      
				 echo'<td> '.get_pay_scale_type($last_change).'</td>'.'<td> '.get_pay_scale_type($resultset["$column"]).'</td>';	
				}
				else if($column=='ogd_billunit'){	      
				 echo'<td> '.get_billunit($last_change).'</td>'.'<td> '.get_billunit($resultset["$column"]).'</td>';	
				}
				else if($column=='ogd_group'){	      
				 echo'<td> '.get_group($last_change).'</td>'.'<td> '.get_group($resultset["$column"]).'</td>';	
				}
				else if($column=='ogd_station'){	      
				 echo'<td> '.get_station($last_change).'</td>'.'<td> '.get_station($resultset["$column"]).'</td>';	
				}
				else if($column=='ogd_depot'){	      
				 echo'<td> '.get_depot($last_change).'</td>'.'<td> '.get_depot($resultset["$column"]).'</td>';	
				}
				/*-----------------Present History End-------------------*/ 
				
                /*-----------------Award History Start-------------------*/	
				else if($column=='awd_by'){	      
				echo
                            '<td> '.get_awarded_by($last_change).'</td>'.
						    '<td> '.get_awarded_by($resultset["$column"]).'</td>';	
					}
			    else if($column=='awd_type'){	      
				echo
                            '<td> '.got_award($last_change).'</td>'.
						    '<td> '.got_award($resultset["$column"]).'</td>';	
					}
					
			 					
				/*-----------------Award History End-------------------*/	
				/*-----------------Increment History Start-------------------*/
				
				 	else if($column=='incr_type'){	      
				echo
                            '<td> '.get_increment_type($last_change).'</td>'.
						    '<td> '.get_increment_type($resultset["$column"]).'</td>';	
					}
					else if($column=='ps_type'){	      
				echo
                            '<td> '.get_pay_scale_type($last_change).'</td>'.
						    '<td> '.get_pay_scale_type($resultset["$column"]).'</td>';	
					}
				/*-----------------Increment History End-------------------*/ 
				
				/*-----------------Advance History End-------------------*/ 
				else if($column=='adv_type'){	      
				echo
                            '<td> '.get_advance($last_change).'</td>'.
						    '<td> '.get_advance($resultset["$column"]).'</td>';	
					}
				/*-----------------Advance History End-------------------*/ 
				/*-- Family tab Starts --*/
					else if($column=='fmy_rel'){	      
				echo
                            '<td> '.get_relation($last_change).'</td>'.
						    '<td> '.get_relation($resultset["$column"]).'</td>';	
					}
					else if($column=='fmy_gender'){	      
				echo
                            '<td> '.get_gender($last_change).'</td>'.
						    '<td> '.get_gender($resultset["$column"]).'</td>';	
					}
					/*-- Family tab Ends --*/
					/*-- Training tab Starts --*/
					else if($column=='training_type'){	      
				echo
                            '<td> '.get_training_type($last_change).'</td>'.
						    '<td> '.get_training_type($resultset["$column"]).'</td>';	
					}
					else if($column=='tr_dept'){	      
				echo
                            '<td> '.get_department($last_change).'</td>'.
						    '<td> '.get_department($resultset["$column"]).'</td>';	
					}
				else if($column=='tr_desig'){	      
				echo
                            '<td> '.get_designation($last_change).'</td>'.
						    '<td> '.get_designation($resultset["$column"]).'</td>';	
					}
					/*-- Training tab Ends --*/
					/*-- Penalty tab starts --*/
					else if($column=='pen_type'){	      
				echo
                            '<td> '.get_penalty_type($last_change).'</td>'.
						    '<td> '.get_penalty_type($resultset["$column"]).'</td>';	
					}
					else if($column=='pen_chargestatus'){	      
				echo
                            '<td> '.get_charge_sheet_status($last_change).'</td>'.
						    '<td> '.get_charge_sheet_status($resultset["$column"]).'</td>';	
					}
					
					/*-- Penalty tab Ends --*/
					
					/*-- Property tab Ends --*/
					
					else if($column=='pro_type'){	      
				echo
                            '<td> '.get_property_type($last_change).'</td>'.
						    '<td> '.get_property_type($resultset["$column"]).'</td>';	
					}
					else if($column=='pro_item'){	      
				echo
                            '<td> '.get_property_item($last_change).'</td>'.
						    '<td> '.get_property_item($resultset["$column"]).'</td>';	
					}
					else if($column=='pro_sourcetype'){	      
				echo
                            '<td> '.get_source_typ($last_change).'</td>'.
						    '<td> '.get_source_typ($resultset["$column"]).'</td>';	
					}
					/*-- Property tab Ends --*/
					
					/*-- nominee tab Starts --*/
					else if($column=='nom_status'){	      
				echo
                            '<td> '.got_mr($last_change).'</td>'.
						    '<td> '.got_mr($resultset["$column"]).'</td>';	
					}
					else if($column=='nom_rel'){	      
				echo
                            '<td> '.get_relation($last_change).'</td>'.
						    '<td> '.get_relation($resultset["$column"]).'</td>';	
					}
					/*-- nominee tab Ends --*/
					
					/*-- promotion tab Starts --*/
					else if($column=='pro_frm_dept'){	      
				echo
                            '<td> '.get_department($last_change).'</td>'.
						    '<td> '.get_department($resultset["$column"]).'</td>';	
					}
					else if($column=='pro_frm_desig'){	      
				echo
                            '<td> '.get_designation($last_change).'</td>'.
						    '<td> '.get_designation($resultset["$column"]).'</td>';	
					}
					else if($column=='pro_frm_group'){	      
				echo
                            '<td> '.get_group($last_change).'</td>'.
						    '<td> '.get_group($resultset["$column"]).'</td>';	
					}
					else if($column=='pro_frm_station'){	      
				echo
                            '<td> '.get_station($last_change).'</td>'.
						    '<td> '.get_station($resultset["$column"]).'</td>';	
					}
					else if($column=='pro_frm_billunit'){	      
				echo
                            '<td> '.get_relation($last_change).'</td>'.
						    '<td> '.get_relation($resultset["$column"]).'</td>';	
					}
					else if($column=='pro_frm_depot'){	      
				echo
                            '<td> '.get_depot($last_change).'</td>'.
						    '<td> '.get_depot($resultset["$column"]).'</td>';	
					}
					else if($column=='pro_to_dept'){	      
				echo
                            '<td> '.get_department($last_change).'</td>'.
						    '<td> '.get_department($resultset["$column"]).'</td>';	
					}
					else if($column=='pro_to_desig'){	      
				echo
                            '<td> '.get_designation($last_change).'</td>'.
						    '<td> '.get_designation($resultset["$column"]).'</td>';	
					}
					else if($column=='pro_to_group'){	      
				echo
                            '<td> '.get_group($last_change).'</td>'.
						    '<td> '.get_group($resultset["$column"]).'</td>';	
					}
					else if($column=='pro_to_station'){	      
				echo
                            '<td> '.get_station($last_change).'</td>'.
						    '<td> '.get_station($resultset["$column"]).'</td>';	
					}
					else if($column=='pro_to_billunit'){	      
				echo
                            '<td> '.get_billunit($last_change).'</td>'.
						    '<td> '.get_billunit($resultset["$column"]).'</td>';	
					}
					else if($column=='pro_to_depot'){	      
				echo
                            '<td> '.get_depot($last_change).'</td>'.
						    '<td> '.get_depot($resultset["$column"]).'</td>';	
					}
					
					
					/*-- promotion tab Ends --*/
					/*-- reversion tab starts --*/
					
					else if($column=='rev_frm_dept'){	      
				echo
							'<td> '.get_department($last_change).'</td>'.
							'<td> '.get_department($resultset["$column"]).'</td>';
					}
					
					else if($column=='rev_frm_desig'){	      
				echo
							'<td> '.get_designation($last_change).'</td>'.
							'<td> '.get_designation($resultset["$column"]).'</td>';
					}
					
					else if($column=='rev_frm_group'){	      
				echo
							'<td> '.get_group($last_change).'</td>'.
							'<td> '.get_group($resultset["$column"]).'</td>';
					}
					
					else if($column=='rev_frm_billunit'){	      
				echo
							'<td> '.get_billunit($last_change).'</td>'.
							'<td> '.get_billunit($resultset["$column"]).'</td>';
					}
					
					else if($column=='rev_frm_depot'){	      
				echo
							'<td> '.get_depot($last_change).'</td>'.
							'<td> '.get_depot($resultset["$column"]).'</td>';
					}
					
					else if($column=='rev_to_dept'){	      
				echo
                            '<td> '.get_department($last_change).'</td>';
							'<td> '.get_department($resultset["$column"]).'</td>';
					}
					
					else if($column=='rev_to_desig'){	      
				echo
                            '<td> '.get_designation($last_change).'</td>'.
							'<td> '.get_designation($resultset["$column"]).'</td>';
					}
					
					else if($column=='rev_to_group'){	      
				echo
							'<td> '.get_group($last_change).'</td>'.
							'<td> '.get_group($resultset["$column"]).'</td>';
					}
					
					
					else if($column=='rev_to_billunit'){	      
				echo
							'<td> '.get_billunit($last_change).'</td>'.
							'<td> '.get_billunit($resultset["$column"]).'</td>';
					}
					
					else if($column=='rev_to_depot'){	      
				echo	
							'<td> '.get_depot($last_change).'</td>'.
							'<td> '.get_depot($resultset["$column"]).'</td>';
					}
					
					/*-- reversion tab ends --*/
					/*-- fixation tab starts --*/
					else if($column=='fix_order_type')	      
				echo
                            
							'<td> '.get_order_type_fixation($last_change).'</td>'.
							'<td> '.get_order_type_fixation($resultset["$column"]).'</td>';
							
							else if($column=='fix_frm_ps_type')	      
				echo
                            
							'<td> '.get_pay_scale_type($last_change).'</td>'.
							'<td> '.get_pay_scale_type($resultset["$column"]).'</td>';
							
							else if($column=='fix_to_ps_type')	      
				echo
                            
							'<td> '.get_pay_scale_type($last_change).'</td>'.
							'<td> '.get_pay_scale_type($resultset["$column"]).'</td>';
					
					
					/*-- fixation tab ends --*/
					/*-- transfer tab starts --*/
				 			else if($column=='tran_frm_dept')	      
				echo
                            
							'<td> '.get_department($last_change).'</td>'.
							'<td> '.get_department($resultset["$column"]).'</td>';

							else if($column=='tran_frm_desig')	      
				echo
                            
							'<td> '.get_designation($last_change).'</td>'.
							'<td> '.get_designation($resultset["$column"]).'</td>';
							
							else if($column=='tran_frm_pay_scale_type')	      
				echo
                            
							'<td> '.get_pay_scale_type($last_change).'</td>'.
							'<td> '.get_pay_scale_type($resultset["$column"]).'</td>';
							
							else if($column=='tran_frm_group')	      
				echo
                            
							'<td> '.get_group($last_change).'</td>'.
							'<td> '.get_group($resultset["$column"]).'</td>';
							
							else if($column=='tran_frm_billunit')	      
				echo
                            
							'<td> '.get_billunit($last_change).'</td>'.
							'<td> '.get_billunit($resultset["$column"]).'</td>';
							
							else if($column=='tran_frm_depot')	      
				echo
                            
							'<td> '.get_depot($last_change).'</td>'.
							'<td> '.get_depot($resultset["$column"]).'</td>';
							
							else if($column=='tran_to_dept')	      
				echo
                            
							'<td> '.get_department($last_change).'</td>'.
							'<td> '.get_department($resultset["$column"]).'</td>';
							
							else if($column=='tran_to_desig')	      
				echo
                            
							'<td> '.get_designation($last_change).'</td>'.
							'<td> '.get_designation($resultset["$column"]).'</td>';
							
							else if($column=='tran_to_pay_scale_type')	      
				echo
                            
							'<td> '.get_pay_scale_type($last_change).'</td>'.
							'<td> '.get_pay_scale_type($resultset["$column"]).'</td>';
							
							else if($column=='tran_to_group')	      
				echo
                            
							'<td> '.get_group($last_change).'</td>'.
							'<td> '.get_group($resultset["$column"]).'</td>';
							
							else if($column=='tran_to_billunit')	      
				echo
                            
							'<td> '.get_billunit($last_change).'</td>'.
							'<td> '.get_billunit($resultset["$column"]).'</td>';
							
							else if($column=='tran_to_depot')	      
				echo
                            
							'<td> '.get_depot($last_change).'</td>'.
							'<td> '.get_depot($resultset["$column"]).'</td>';
							
					/*-- transfer tab ends --*/

	            else{	      
				echo
                            '<td> '.$last_change.'</td>'.
						    '<td> '.$resultset["$column"].'</td>';	
					}
					
				echo	   '<td>'.$resultset['date'].' '.$resultset['time'].'</td>'.
						  
						   '<td>ADMIN</td>';							
			   '</tr>';
			   $sr++;
				 }	 
            	
					if($cnt!=0)
					{
						$last_change = $resultset["$column"];
					}
            }
         break;
	}
}

?>
