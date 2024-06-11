<?php
include_once('../dbconfig/dbcon.php');
include_once('functions.php');
session_start();

dbcon();
//include_once('functions.php');
if(isset($_REQUEST['action']))
{
	switch(strtolower($_REQUEST['action']))
	{
	
	
		case 'get_dt':
		$mnt=$_POST['sm'];
		$year=$_POST['sy'];
			$ename=$_SESSION['SESS_USER_FULLNAME'];
			$data="";
			$sql=mysql_query("select * from post_schedule where MONTH(date_time)=$mnt and YEAR(date_time)=$year and updated_by='$ename'");
			if($sql)
			{
				while($result=mysql_fetch_array($sql))
				{
					$conv=$result['date_of_ass'];
					    if($conv!='0000-00-00')
					{
						$con1=date('d-m-Y',strtotime($conv));
					}
					else
					{
						$con1=$result['date_of_ass'];
					}
					
					 $con_exam1=$result['date_of_exam'];
					 if($con_exam1!='0000-00-00')
					{
						$con_exam=date('d-m-Y',strtotime($con_exam1));
					}
					else
					{
						$con_exam=$result['date_of_exam'];
					}
					
					$con_date_pan1=$result['date_of_panel'];
					if($con_date_pan1!='0000-00-00')
					{
				    $con_date_pan=date('d-m-Y',strtotime($con_date_pan1));
					}
					else
					{
						$con_date_pan=$result['date_of_panel'];
					}
					
					$con_date_noti1=$result['date_of_noti'];
					if($con_date_noti1!='0000-00-00')
					{
				    $con_date_not=date('d-m-Y',strtotime($con_date_noti1));
					}
					else
					{
						$con_date_not=$result['date_of_noti'];
					}
					
					$in_date=$result['date_time'];
					//echo $in_date1;
					if($in_date!='0000-00-00')
					{
				    $in_date1=date('d-m-Y',strtotime($in_date));
					}
					else
					{
						$in_date1=$result['date_time'];
					}
						
						echo "<tr>";						
						echo "<td>".get_dept_value($result['dept'])."</td>";
						echo "<td>".$con1."</td>";
						echo "<td>".$con_exam."</td>";
						echo "<td>".$con_date_pan."</td>";
						echo "<td>".$con_date_not."</td>";
						echo "<td>".$in_date1."</td>";
						echo "<td>
					          <button type='button' value='".$result['id']."' data-target='#update' data-toggle='modal' class='btn btn-primary update_btn'>View</button>
						     </td>";
						echo "</tr>";
				}
			}
			echo $data;
			
		break;
		
		case 'get_yr':
		$dt1=$_REQUEST['yr_1'];
		$dt2=$_REQUEST['yr_2'];
		//echo "<script>alert('$dt1')</script>";
		//echo "<script>alert('$dt2')</script>";
			$data="";
			$sql=mysql_query("select * from post_schedule where date_time between '$dt1' and '$dt2'");
			if($sql)
			{
				while($result=mysql_fetch_array($sql))
				{
					$conv=$result['date_of_ass'];
						$con1=date('d-m-Y',strtotime($conv));
						$con_exam1=$result['date_of_exam'];
						$con_exam=date('d-m-Y',strtotime($con_exam1));
						$con_date_pan1=$result['date_of_panel'];
						$con_date_pan=date('d-m-Y',strtotime($con_date_pan1));
				
					$data .= "<tr>";
			        $data .= "<td>".get_dept_value($result['dept'])."</td>";
					$data .= "<td>".get_cat_value($result['category'])."</td>";
					$data .= "<td>".get_level_value($result['level_of_pay'])."</td>";
					$data .= "<td>".$con1."</td>";
					$data .= "<td>".$con_exam."</td>";
					$data .= "<td>".$con_date_pan."</td>";
					$data .= "<td><button type='button' value='".$result['id']."' data-target='#update' data-toggle='modal' class='btn btn-primary update_btn'>View</button></td>";
					$data .= "</tr>";
				}
			}
			echo $data;
		break;
		
		case 'get_rpt':
		$sel1=$_POST['sel1'];
		$sel2=$_POST['sel2'];
	
		$data="";
		if($sel1==1)
		   {
		  $data="";
			  $sql=mysql_query("select * from post_schedule where date_of_ass='$sel2'");
			if($sql)
			{
				while($result=mysql_fetch_array($sql))
				{
					$conv=$result['date_of_ass'];
						$con1=date('d-m-Y',strtotime($conv));
						$con_exam1=$result['date_of_exam'];
						$con_exam=date('d-m-Y',strtotime($con_exam1));
						$con_date_pan1=$result['date_of_panel'];
						$con_date_pan=date('d-m-Y',strtotime($con_date_pan1));
					
					
					// echo '<tr><td>'.$result['id'].'</td>'.'<td>'.$result['dept'].'</td>'.'<td>'.$result['category'].'</td>'.'<td>'.$result['grade_pay'].'</td>'.'<td>'.$result['date_of_ass'].'</td>'.'<td>'.$result['date_of_exam'].'</td>'.'<td>'.$result['date_of_panel'].'</td></tr>';
				
					$data .= "<tr>";
					$data .= "<td>".get_dept_value($result['dept'])."</td>";
					$data .= "<td>".get_cat_value($result['category'])."</td>";
					$data .= "<td>".get_level_value($result['level_of_pay'])."</td>";
					$data .= "<td>".$con1."</td>";
					$data .= "<td>".$con_exam."</td>";
					$data .= "<td>".$con_date_pan."</td>";
					$data .= "<td><button type='button' value='".$result['id']."' data-target='#update' data-toggle='modal' class='btn btn-primary update_btn'>View</button></td>";
					$data .= "</tr>";
				}
			}
			echo $data;
		   }
		   else if($sel1==2)
		   {			
			$sql=mysql_query("select * from post_schedule where date_of_noti='$sel2'");
			if($sql)
			{
				while($result=mysql_fetch_array($sql))
				{
					$conv=$result['date_of_ass'];
						$con1=date('d-m-Y',strtotime($conv));
						$con_exam1=$result['date_of_exam'];
						$con_exam=date('d-m-Y',strtotime($con_exam1));
						$con_date_pan1=$result['date_of_panel'];
						$con_date_pan=date('d-m-Y',strtotime($con_date_pan1));
					
					
					// echo '<tr><td>'.$result['id'].'</td>'.'<td>'.$result['dept'].'</td>'.'<td>'.$result['category'].'</td>'.'<td>'.$result['grade_pay'].'</td>'.'<td>'.$result['date_of_ass'].'</td>'.'<td>'.$result['date_of_exam'].'</td>'.'<td>'.$result['date_of_panel'].'</td></tr>';
				
					$data .= "<tr>";
				
					$data .= "<td>".get_dept_value($result['dept'])."</td>";
					$data .= "<td>".get_cat_value($result['category'])."</td>";
					$data .= "<td>".get_level_value($result['level_of_pay'])."</td>";
					$data .= "<td>".$con1."</td>";
					$data .= "<td>".$con_exam."</td>";
					$data .= "<td>".$con_date_pan."</td>";
					$data .= "<td><button type='button' value='".$result['id']."' data-target='#update' data-toggle='modal' class='btn btn-primary update_btn'>View</button></td>";
					$data .= "</tr>";
				}
			}
			echo $data;
		   }
		   else if($sel1==3)
		   {			
			$sql=mysql_query("select * from post_schedule where date_of_exam='$sel2'");
			if($sql)
			{
				while($result=mysql_fetch_array($sql))
				{
					$conv=$result['date_of_ass'];
						$con1=date('d-m-Y',strtotime($conv));
						$con_exam1=$result['date_of_exam'];
						$con_exam=date('d-m-Y',strtotime($con_exam1));
						$con_date_pan1=$result['date_of_panel'];
						$con_date_pan=date('d-m-Y',strtotime($con_date_pan1));
					
					
					// echo '<tr><td>'.$result['id'].'</td>'.'<td>'.$result['dept'].'</td>'.'<td>'.$result['category'].'</td>'.'<td>'.$result['grade_pay'].'</td>'.'<td>'.$result['date_of_ass'].'</td>'.'<td>'.$result['date_of_exam'].'</td>'.'<td>'.$result['date_of_panel'].'</td></tr>';
				
					$data .= "<tr>";
	
					$data .= "<td>".get_dept_value($result['dept'])."</td>";
					$data .= "<td>".get_cat_value($result['category'])."</td>";
					$data .= "<td>".get_level_value($result['level_of_pay'])."</td>";
					$data .= "<td>".$con1."</td>";
					$data .= "<td>".$con_exam."</td>";
					$data .= "<td>".$con_date_pan."</td>";
					$data .= "<td><button type='button' value='".$result['id']."' data-target='#update' data-toggle='modal' class='btn btn-primary update_btn'>View</button></td>";
					$data .= "</tr>";
				}
			}
			echo $data;
		   }
		   else if($sel1==4)
		   {			
			$sql=mysql_query("select * from post_schedule where date_of_panel='$sel2'");
			if($sql)
			{
				while($result=mysql_fetch_array($sql))
				{
					$conv=$result['date_of_ass'];
						$con1=date('d-m-Y',strtotime($conv));
						$con_exam1=$result['date_of_exam'];
						$con_exam=date('d-m-Y',strtotime($con_exam1));
						$con_date_pan1=$result['date_of_panel'];
						$con_date_pan=date('d-m-Y',strtotime($con_date_pan1));
					
					
					// echo '<tr><td>'.$result['id'].'</td>'.'<td>'.$result['dept'].'</td>'.'<td>'.$result['category'].'</td>'.'<td>'.$result['grade_pay'].'</td>'.'<td>'.$result['date_of_ass'].'</td>'.'<td>'.$result['date_of_exam'].'</td>'.'<td>'.$result['date_of_panel'].'</td></tr>';
				
					$data .= "<tr>";
		            $data .= "<td>".get_dept_value($result['dept'])."</td>";
					$data .= "<td>".get_cat_value($result['category'])."</td>";
					$data .= "<td>".get_level_value($result['level_of_pay'])."</td>";
					$data .= "<td>".$con1."</td>";
					$data .= "<td>".$con_exam."</td>";
					$data .= "<td>".$con_date_pan."</td>";
					$data .= "<td><button type='button' value='".$result['id']."' data-target='#update' data-toggle='modal' class='btn btn-primary update_btn'>View</button></td>";
					$data .= "</tr>";
				}
			}
			echo $data;
		   }
	break;
	
	
	case 'get_custom_rpt':
		$sel1=$_POST['sel1'];
		$sel2=$_POST['sel2'];
	    $sel3=$_POST['sel3'];
	    $sel4=$_POST['sel4'];
	    $sel5=$_POST['sel5'];
	    $sel6=$_POST['sel6'];
//echo "<script>alert($sel1+$sel2+$sel3+$sel4+$sel5+$sel6)</script>";
	
		$data="";
		$sql=mysql_query("select * from post_schedule where (dept='$sel1' AND category='$sel2')OR(dept='$sel1')");
			  // $sql=mysql_query("select * from post_schedule where(dept='$sel1' AND category='$sel2' AND date_of_ass='$sel3' AND date_of_exam='$sel4' AND date_of_panel='$sel5'AND date_of_noti='$sel6')OR(dept='$sel1')OR(category='$sel2')OR(date_of_ass='$sel3')OR(date_of_exam='$sel4')OR(date_of_panel='$sel5')OR(date_of_noti='$sel6')OR(dept='$sel1' AND category='$sel2')OR(date_of_ass='$sel3' AND date_of_exam='$sel4')OR(date_of_panel='$sel5' AND date_of_noti='$sel6')");
			if($sql)
			{
				while($result=mysql_fetch_array($sql))
				{
					$conv=$result['date_of_ass'];
						$con1=date('d-m-Y',strtotime($conv));
						$con_exam1=$result['date_of_exam'];
						$con_exam=date('d-m-Y',strtotime($con_exam1));
						$con_date_pan1=$result['date_of_panel'];
						$con_date_pan=date('d-m-Y',strtotime($con_date_pan1));
				
					$data .= "<tr>";
					$data .= "<td>".get_dept_value($result['dept'])."</td>";
					$data .= "<td>".get_cat_value($result['category'])."</td>";
					$data .= "<td>".get_level_value($result['level_of_pay'])."</td>";
					$data .= "<td>".$con1."</td>";
					$data .= "<td>".$con_exam."</td>";
					$data .= "<td>".$con_date_pan."</td>";
					$data .= "<td><button type='button' value='".$result['id']."' data-target='#update' data-toggle='modal' class='btn btn-primary update_btn'>View</button></td>";
					$data .= "</tr>";
				}
			}
			echo $data;
		   
		   break;
		
		
		case 'get_cat':
		$cat=$_POST['cat'];
		
			$data="";
			$sql=mysql_query("select * from post_schedule where category='$cat'");
			if($sql)
			{
				while($result=mysql_fetch_array($sql))
				{
					$conv=$result['date_of_ass'];
						$con1=date('d-m-Y',strtotime($conv));
						$con_exam1=$result['date_of_exam'];
						$con_exam=date('d-m-Y',strtotime($con_exam1));
						$con_date_pan1=$result['date_of_panel'];
						$con_date_pan=date('d-m-Y',strtotime($con_date_pan1));
					
					
					
					// echo '<tr><td>'.$result['id'].'</td>'.'<td>'.$result['dept'].'</td>'.'<td>'.$result['category'].'</td>'.'<td>'.$result['grade_pay'].'</td>'.'<td>'.$result['date_of_ass'].'</td>'.'<td>'.$result['date_of_exam'].'</td>'.'<td>'.$result['date_of_panel'].'</td></tr>';
				
					$data .= "<tr>";
		
					$data .= "<td>".get_dept_value($result['dept'])."</td>";
					$data .= "<td>".get_cat_value($result['category'])."</td>";
					$data .= "<td>".get_level_value($result['level_of_pay'])."</td>";
					$data .= "<td>".$con1."</td>";
					$data .= "<td>".$con_exam."</td>";
					$data .= "<td>".$con_date_pan."</td>";
					$data .= "<td><button type='button' value='".$result['id']."' data-target='#update' data-toggle='modal' class='btn btn-primary update_btn'>View</button></td>";
					$data .= "</tr>";
				}
			}
			echo $data;
			break;
			
			case 'get_dept':
		$dept=$_POST['dept'];
		
			$data="";
			$sql=mysql_query("select * from post_schedule where dept='$dept'");
			if($sql)
			{
				while($result=mysql_fetch_array($sql))
				{
					$conv=$result['date_of_ass'];
						$con1=date('d-m-Y',strtotime($conv));
						$con_exam1=$result['date_of_exam'];
						$con_exam=date('d-m-Y',strtotime($con_exam1));
						$con_date_pan1=$result['date_of_panel'];
						$con_date_pan=date('d-m-Y',strtotime($con_date_pan1));
					
					
					
					// echo '<tr><td>'.$result['id'].'</td>'.'<td>'.$result['dept'].'</td>'.'<td>'.$result['category'].'</td>'.'<td>'.$result['grade_pay'].'</td>'.'<td>'.$result['date_of_ass'].'</td>'.'<td>'.$result['date_of_exam'].'</td>'.'<td>'.$result['date_of_panel'].'</td></tr>';
				
					$data .= "<tr>";
			
					$data .= "<td>".get_dept_value($result['dept'])."</td>";
					$data .= "<td>".get_cat_value($result['category'])."</td>";
					$data .= "<td>".get_level_value($result['level_of_pay'])."</td>";
					$data .= "<td>".$con1."</td>";
					$data .= "<td>".$con_exam."</td>";
					$data .= "<td>".$con_date_pan."</td>";
					$data .= "<td><button type='button' value='".$result['id']."' data-target='#update' data-toggle='modal' class='btn btn-primary update_btn'>View</button></td>";
					$data .= "</tr>";
				}
			}
			echo $data;
			break;
		 
		 case 'add_designation':
		   $desg_zone=$_POST['select_zone'];
		   $desg_dept=$_POST['select_dept'];
		   $desg=$_POST['desi_name'];
			
			$sql=mysql_query("insert into designation(zone,dept,desg)values('$desg_zone','$desg_dept','$desg')");
			if($sql){
				echo "<script>window.location='designation.php';alert('Designation added Successfully');</script>";
			}else{
				echo "<script>window.location='designation.php';alert('NOT Added, please try again');</script>";
			}
		break;
		//echo "insert into designation(zone,dept,desg)values('$desg_zone','$desg_dept','$desg')".mysql_error();
		
		
		
		case 'delete_designation':
		 if(delete_designation($_REQUEST['delete_id']))
				echo "<script>window.location='designation.php';alert('Designation Deleted Successfully');</script>";
			else 
				echo "<script>window.location='designation.php';alert('Not Deleted, try again');</script>";
		break;
		
		
		
		
		case 'delete_modeoffill':
		 if(delete_modeoffill($_REQUEST['delete_id']))
				echo "<script>window.location='mode_fill.php';alert('Mode of filling Deleted Successfully');</script>";
			else 
				echo "<script>window.location='mode_fill.php';alert('Not Deleted, try again');</script>";
		break;
		
		
		
		
		
		
	case 'delete_user':
		 if(delete_user($_REQUEST['delete_id']))
				echo "<script>window.location='users.php';alert('User Deleted Successfully');</script>";
			else 
				echo "<script>window.location='users.php';alert('Not Deleted, try again');</script>";
		break;
		
		
		
		
		case 'delete_department':
		 if(delete_department($_REQUEST['delete_id']))
				echo "<script>window.location='dept.php';alert('Department Deleted Successfully');</script>";
			else 
				echo "<script>window.location='dept.php';alert('Not Deleted, try again');</script>";
		break;
		
		
		
		case 'delete_postschedule':
		 if(delete_postschedule($_REQUEST['delete_id']))
				echo "<script>window.location='update_records.php';alert('Schedule Deleted Successfully');</script>";
			else 
				echo "<script>window.location='update_records.php';alert('Not Deleted, try again');</script>";
		break;
		
		
		
		
		
		
		case 'add_department':
		   $desg_zone=$_POST['select_zone'];
		   $desg_dept=$_POST['dept_name'];
		   //$desg=$_POST['desg'];
			
			$sql=mysql_query("insert into department(zone,dept)values('$desg_zone','$desg_dept')");
			if($sql){
				echo "<script>window.location='dept.php';alert('Department added Successfully');</script>";
			}else{
				echo "<script>window.location='dept.php';alert('NOT Added, please try again');</script>";
			}
		break;
		
		//update Department code here
		case 'fetchdepartment':
		    echo fetchdepartment($_REQUEST['id']);
		break;
		
		
		
		case 'add_mode_of_fill':
		  $mode_of_fill=$_POST['mode_fill'];
		  $sql=mysql_query("insert into mode_of_fill(mode_of_fill)values('$mode_of_fill')");
			if($sql){
				echo "<script>window.location='mode_fill.php';alert('Mode of Fill added Successfully');</script>";
			}else{
				echo "<script>window.location='mode_fill.php';alert('NOT Added, please try again');</script>";
			}
		break;
		
		
		
		
		case 'fetchpostschedule':
		    echo fetchpostschedule($_REQUEST['id']);
		break;
		
		case 'fetchpostschedule1':
		    echo fetchpostschedule1($_REQUEST['id']);
		break;
		
		
		case 'fetchmodefill':
		    echo fetchmodefill($_REQUEST['id']);
		break;
		
		
           case 'update_mode_of_fill':
		   if(update_mode_of_fill($_REQUEST['hide_field'],$_REQUEST['update_modefill']))
		      echo "<script>window.location='mode_fill.php';alert('Mode of Filling Updated Successfully');</script>";
		   else
			  echo "<script>window.location='mode_fill.php';alert('Not Updated');</script>";
		break;
		
		
		
			case 'fetchpostschedule_update':
		    echo fetchpostschedule_update($_REQUEST['id']);
		break;
		
		
		
		
		case 'fetchdesignation':
		    echo fetchdesignation($_REQUEST['id']);
		break;
		
		
		case 'update_department':
		   if(update_department($_REQUEST['hide_field'],$_REQUEST['update_dept'],$_REQUEST['update_dept2']))
		      echo "<script>window.location='dept.php';alert('Department Updated Successfully');</script>";
		   else
			  echo "<script>window.location='dept.php';alert('Not Updated');</script>";
		break;
			
		
		
		case 'update_postschedule':
		   if(update_postschedule($_REQUEST['hide_field'],$_REQUEST['post_dept'],$_REQUEST['post_category'],$_REQUEST['post_level'],$_REQUEST['post_fill'],$_REQUEST['post_ss'],$_REQUEST['post_mor'],$_REQUEST['post_vac'],$_REQUEST['post_vacinhg'],$_REQUEST['post_trg'],$_REQUEST['post_netvac'],$_REQUEST['post_dateass'],$_REQUEST['post_dateass2'],$_REQUEST['post_datenot'],$_REQUEST['post_datenot2'],$_REQUEST['post_exam'],$_REQUEST['post_dateexam'],$_REQUEST['post_dateofpanel'],$_REQUEST['post_dateofpanel2'],addslashes($_REQUEST['post_plan'])))
			   
		       echo "<script>window.location='update_records.php';alert('Schedule Updated Successfully');</script>";
		   else
			   echo "<script>window.location='update_records.php';alert('Not Updated');</script>";
		 break;
		
		
		
		case 'update_designation':
		   if(update_designation($_REQUEST['hide_field'],$_REQUEST['update_zone'],$_REQUEST['update_dept'],$_REQUEST['update_desg']))
		      echo "<script>window.location='designation.php';alert('Designation Updated Successfully');</script>";
		   else
			  echo "<script>window.location='designation.php';alert('Not Updated');</script>";
		break;
			
		
		
		case 'post_form':
		 $dept=$_POST['post_dept'];
		 $category=$_POST['post_category'];
		 $gradepay=$_POST['post_gradepay'];
		 $modeoffill=$_POST['post_fill'];
		 $ss=$_POST['post_ss'];
		 $mor=$_POST['post_mor'];
		 $vac=$_POST['post_vac'];
		 $vacinhg=$_POST['post_vacinhg'];
		 $utrg=$_POST['post_trg'];
		 $netvac=$_POST['post_netvac'];
		 $dateass=$_POST['post_dateass'];
		 $dateofnot=$_POST['post_datenot'];
		 $dateofexam=$_POST['post_dateexam'];
		 $dateofpanel=$_POST['post_datepanel'];
		 $actionplan=$_POST['post_plan'];
		 $ename=$_SESSION['SESS_USER_FULLNAME'];
		//	 echo "<script>alert($_SESSION[pfno])</script>";
		 
		 
		 $sql=mysql_query("insert into post_schedule(dept,category,level_of_pay,mode_of_filling,ss,mor,vac,vac_in_hg,utrg,netvac,date_of_ass,date_of_noti,date_of_exam,date_of_panel,action_plan,date_time,updated_by)values('$dept','$category','$gradepay','$modeoffill','$ss','$mor','$vac','$vacinhg','$utrg','$netvac','$dateass','$dateofnot','$dateofexam','$dateofpanel','$actionplan',now(),'$ename')");
		 
		 
		 
		  //echo "insert into post_schedule(dept,category,level_of_pay,mode_of_filling,ss,mor,vac,vac_in_hg,utrg,netvac,date_of_ass,date_of_noti,date_of_exam,date_of_panel,action_plan,date_time,updated_by)values('$dept','$category','$gradepay','$modeoffill','$ss','$mor','$vac','$vacinhg','$utrg','$netvac','$dateass','$dateofnot','$dateofexam','$dateofpanel','$actionplan',now(),'$ename')".mysql_error();
		 
		 
		 
		 
		 
		 
			if($sql){
				echo "<script>window.location='add_records.php';alert('Schedule added Successfully');</script>";
			}else{
				echo "<script>window.location='add_records.php';alert('NOT Added, please try again');</script>";
			}
		break;
		


     case 'users_form':
	     $zone=$_POST['user_zone'];
		 $division=$_POST['user_division'];
		 $pf_number=$_POST['user_pf_no'];
		 $emp_name=$_POST['user_emp_name'];
		 $emp_dept=$_POST['user_dept'];
		 $emp_desg=$_POST['user_desg'];
		 $emp_mob=$_POST['user_emp_mobile'];
		 $emp_email=$_POST['user_emp_email'];
		 $emp_username=$_POST['user_emp_username'];
		 $emp_password=$_POST['user_emp_password'];
		  
		  $sql=mysql_query("insert into users(zone,division,pf_no,emp_name,dept,desg,mob_no,user_email,username,password,date_time)values(' $zone','$division','$pf_number','$emp_name','$emp_dept','$emp_desg','$emp_mob','$emp_email','$emp_username','$emp_password',NOW())");
		  
		  
		  
		  echo "insert into users(pf_no,emp_name,dept,desg,mob_no,user_email,username,password,date_time)values('$pf_number','$emp_name','$emp_dept','$emp_desg','$emp_mob','$emp_email','$emp_username','$emp_password',NOW())".mysql_error();
		  
		  
		  if($sql)
		  {
			  echo "<script>window.location='users.php';alert('User Added Successfully');</script>";
		  }
		  else
		  {

			  echo "<script>window.location='users.php';alert('User Not Added');</script>";
		  }
		  break;
		  
		  
		  
		  
		  
		  case 'fetchuser':
		  echo fetchuser($_REQUEST['id']);
		break;
		
		
		
		case 'changeprofileuser':
			$oldpass=$_POST['user_oldpswrd'];
			$newpass=$_POST['user_newpswrd'];
			$sql="update users set password='$newpass' where password='$oldpass'";
				//echo $sql;
				 $result=mysql_query($sql);
				 echo mysql_error();
				 if($result)
				{
					echo "<script>alert('Password Changed successfully..'); window.location = 'index.php';</script>";
				}
			else{
					echo "<script>alert('Failed..'); window.location = 'index.php';</script>";
				}
			break;	
		
		
		
		
		
		
		
		
		
		case 'update_user':
		    $zone=$_POST['update_user_zone'];
		    $division=$_POST['update_user_division'];
		    $user_pfno=$_POST['user_pfno'];
			$user_emp=$_POST['user_emp'];
			$update_user_dept=$_POST['update_user_dept'];
			$update_user_desg=$_POST['update_user_desg'];
			$user_mob=$_POST['user_mob'];
			$user_email=$_POST['user_email'];
			
		 
		   $sql= "UPDATE `users` SET zone='$zone',division='$division',`emp_name`='$user_emp',`dept`='$update_user_dept',`desg`='$update_user_desg',`mob_no`='$user_mob',`user_email`='$user_email',`date_time`=Now() WHERE pf_no='$user_pfno'";
			
		 
			// session_start();
			// $update_by=$_SESSION['id'];
			$result1=mysql_query($sql);
			
		
			
			if($result1)
			{
				echo "<script>window.location='users.php';alert('User Updated Successfully');</script>";
			}else
			{
				echo "<script>window.location='users.php';alert('NOT Updated');</script>";
			}
		break;
		
		case 'changeprofile':
			$oldpass=$_POST['post_oldpswrd'];
			$newpass=$_POST['post_newpswrd'];
			$conpass=$_POST['post_conpswrd'];
			
			if($newpass!=$conpass)
			{
			echo "<script>alert('Password Does not Match'); window.location = 'changeprofile.php';</script>";	
			}
			else
			{
			   $sql="update users set password='$newpass' where password='$oldpass'";
				
				 $result=mysql_query($sql);
				 //echo mysql_error();
				 if(mysql_affected_rows()>0)
				{
					
				
					//echo "<script>alert('Password Changed successfully..'); window.location = 'index.php';</script>";
				}
			else{
					echo "<script>alert('Failed..'); window.location = 'changeprofile.php';</script>";
				}
			}
			break;	
			
			case 'checkpassword':
		$pass = $_REQUEST['id'];
		
		if(checkpassword($pass,$_SESSION['SESS_USER_NAME']))
			echo "true";
		else 
			echo "false";
		break;
	}
}


?>