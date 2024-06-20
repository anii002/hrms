<?php
include_once('../dbconfig/dbcon.php');
$conn1 = $dbcon1();
include('mini_function.php');
include('fetch_all_column.php');
include_once('functions.php');
if (isset($_REQUEST['action'])) {
	switch (strtolower($_REQUEST['action'])) {  
           case 'get_pending_pf_report':
				$data='';
				$count=0;
				
				$pf_data=$_REQUEST['pf_data'];
				$b_v=$_REQUEST['b_v'];
				
				$data .="<table class='table table-striped' id='abcd'><thead><tr><th>Sr No</th><th>PF Number</th><th>Employee Name</th><th>Biodata</th><th>Medical Details</th><th>Initial Appointment</th><th>Present Working Details</th><th>Family Composition</th><th>Nominee</th></tr></thead><tbody>";
				
				$y=json_decode($pf_data);
				foreach($y as $key => $value){
					
					$billunit=explode("_",$key);

					if($billunit[0]==$b_v)
					{
						// //dbcon1();
						$data .="<tr>";
						$count++;
						$data .="<td>$count</td>";
						$data .="<td>".$value."</td>";
						$data .="<td>".get_emp_name($value)."</td>";
						
						$fetch=mysqli_query($conn1,"select * from biodata_temp where pf_number='$value'");
						if(mysqli_num_rows($fetch)>0)
						{
							$arr=[];
							$re=mysqli_fetch_array($fetch);
							if($re['pf_number']!="" && $re['sr_no']!="" && $re['dob']!="" && $re['emp_name']!="" && $re['aadhar_number']!="" && $re['pan_number']!="" && $re['identification_mark']!="" && $re['religion']!="" && $re['community']!="" && $re['gender']!="" && $re['marrital_status']!="" && $re['recruit_code']!="" && $re['group_col']!="" && $re['education_ini']!="")
							{
								$data.="<td><i class='fa fa-check' style='font-size:20px;color:green'></i></td>";
							}else{
								
								if($re['pf_number']==""){ $arr[0]="PF Number";}	
								if($re['dob']==""){ $arr[1]="Date Of Birth";}
								if($re['emp_name']==""){$arr[2]="Employee Name";}
								if($re['aadhar_number']==""){$arr[3]="Aadhar Number";} 
								if($re['pan_number']==""){$arr[4]="PAN Number";} 
								if($re['identification_mark']==""){$arr[5]="Identification Mark";} 
								if($re['religion']==""){$arr[6]="Religion";} 
								if($re['community']==""){$arr[7]="Community";} 
								if($re['gender']==""){$arr[8]="Gender";} 
								if($re['marrital_status']==""){$arr[9]="Marrital Status";} 
								if($re['recruit_code']==""){$arr[10]="Recruitment Code";} 
								if($re['group_col']==""){$arr[11]="Group";} 
								if($re['education_ini']==""){$arr[12]="Initial Education";} 
								$arr_data='';
								foreach ($arr as $values) {
									$arr_data.="$values,";
								}
								$data.="<td><i class='fa fa-close' data-toggle='tooltip' title='$arr_data' style='font-size:20px;color:red'></i></td>"; 
								
							}
						}else{
							$data.="<td><span style='font-size:15px;color:red;'>Not Available<span></td>";
						}
						
						$fetch=mysqli_query($conn1,"select * from medical_temp where medi_pf_number='$value'");
						
						if(mysqli_num_rows($fetch)>0)
						{
							$re=mysqli_fetch_array($fetch);
							$arr=[];
							if($re['medi_pf_number']!="" && $re['medi_cate']!="" && $re['medi_dob']!="" && $re['medi_appo_date']!="" && $re['medi_design']!="" && $re['medi_class']!="" && $re['medi_examtype']!="" && $re['medi_certino']!="" && $re['medi_certidate']!="")
							{
								$data.="<td><i class='fa fa-check' style='font-size:20px;color:green'></i></td>";
							}else{
								
								if($re['medi_pf_number']==""){ $arr[0]="Medical Pf Number";}	
								if($re['medi_cate']==""){ $arr[1]="Medical Category";}
								if($re['medi_dob']==""){$arr[2]="Medical Date of Birth";}
								if($re['medi_appo_date']==""){$arr[3]="Appointment Date";} 
								if($re['medi_design']==""){$arr[4]="Medical Design";} 
								if($re['medi_class']==""){$arr[5]="Medical PME Class";} 
								if($re['medi_examtype']==""){$arr[6]="Medical Exam Type";} 
								if($re['medi_certino']==""){$arr[7]="Certificate Number";} 
								if($re['medi_certidate']==""){$arr[8]="Certificate Date";} 
								$arr_data='';
								foreach ($arr as $values) {
									$arr_data.="$values,";
								}
								$data.="<td><i class='fa fa-close' data-toggle='tooltip' title='$arr_data' style='font-size:20px;color:red'></i></td>"; 
								
							}
						}else
						{
							$data.="<td><span style='font-size:15px;color:red;'>Not Available<span></td>";
						}
						$fetch=mysqli_query($conn1,"select * from appointment_temp where app_pf_number='$value'");
						
						if(mysqli_num_rows($fetch)>0)
						{
							$re=mysqli_fetch_array($fetch);
							$arr=[];
							if($re['app_type']=="4")
							{
								if($re['app_type']!="" && $re['app_pf_number']!="" && $re['app_department']!="" && $re['app_designation']!="" && $re['app_date']!="" && $re['app_regul_date']!="" && $re['app_payscale']!="" && $re['app_group']!="" && $re['app_station']!="" && $re['app_rop']!="" && $re['app_depot']!="")
								{
									$data.="<td><i class='fa fa-check' style='font-size:20px;color:green'></i></td>";
								}else{
									if($re['app_type']==""){ $arr[0]="Appointment Type";}	
									if($re['app_pf_number']==""){ $arr[1]="Pf Number";}
									if($re['app_department']==""){$arr[2]="Appointment Department";}
									if($re['app_designation']==""){$arr[3]="Appointment Designation";} 
									if($re['app_date']==""){$arr[4]="Appointment Date";} 
									if($re['app_regul_date']==""){$arr[5]="Regularization Date";} 
									if($re['app_payscale']==""){$arr[6]="Pay Scale Type";} 
									if($re['app_group']==""){$arr[7]="Group";} 
									if($re['app_station']==""){$arr[8]="Station";} 
									if($re['app_rop']==""){$arr[9]="Rate of Pay";} 
									if($re['app_depot']==""){$arr[10]="Depot/Workplace";} 
									$arr_data='';
									foreach ($arr as $values) {
										$arr_data.="$values,";
									}
									$data.="<td><i class='fa fa-close' data-toggle='tooltip' style='font-size:20px;color:red' title='$arr_data'></i></td>";
								}
							}else{
								if($re['app_type']!="" && $re['app_pf_number']!="" && $re['app_department']!="" && $re['app_designation']!="" && $re['app_regul_date']!="" && $re['app_payscale']!="" && $re['app_group']!="" && $re['app_station']!="" && $re['app_rop']!="" && $re['app_depot']!="")
								{
									$data.="<td><i class='fa fa-check' style='font-size:20px;color:green'></i></td>";
								}else{
									if($re['app_type']==""){ $arr[0]="Appointment Type";}	
									if($re['app_pf_number']==""){ $arr[1]="Pf Number";}
									if($re['app_department']==""){$arr[2]="Appointment Department";}
									if($re['app_designation']==""){$arr[3]="Appointment Designation";} 
									if($re['app_regul_date']==""){$arr[4]="Regularization Date";} 
									if($re['app_payscale']==""){$arr[5]="Pay Scale Type";} 
									if($re['app_group']==""){$arr[6]="Group";} 
									if($re['app_station']==""){$arr[7]="Station";} 
									if($re['app_rop']==""){$arr[8]="Rate of Pay";} 
									if($re['app_depot']==""){$arr[9]="Depot/Workplace";} 
									$arr_data='';
									foreach ($arr as $values) {
										$arr_data.="$values,";
									}
									$data.="<td><i class='fa fa-close' data-toggle='tooltip' style='font-size:20px;color:red' title='$arr_data'></i></td>";
								}
							}		
						}
						else{
							$data.="<td><span style='font-size:15px;color:red;'>Not Available<span></td>";
						}
						
						$fetch=mysqli_query($conn1,"select * from present_work_temp where preapp_pf_number='$value'");
						
						if(mysqli_num_rows($fetch)>0)
						{
							$re=mysqli_fetch_array($fetch);
							if($re['sgd_dropdwn']=='2'){
								
								if($re['preapp_pf_number']!="" && $re['preapp_department']!="" && $re['preapp_designation']!="" && $re['ps_type']!="" && $re['preapp_group']!="" && $re['preapp_station']!="" && $re['preapp_billunit']!="" && $re['preapp_rop']!="")
								{
									$data.="<td><i class='fa fa-check' style='font-size:20px;color:green'></i></td>";
								}
								else
								{
									if($re['preapp_pf_number']==""){ $arr[0]="Pf Number";}	
									if($re['preapp_department']==""){ $arr[1]="Department";}
									if($re['preapp_designation']==""){$arr[2]="Designation";}
									if($re['ps_type']==""){$arr[3]="Pay Scale Type";} 
									if($re['preapp_group']==""){$arr[4]="Group";} 
									if($re['preapp_station']==""){$arr[5]="Station";} 
									if($re['preapp_billunit']==""){$arr[6]="Billunit";} 
									if($re['preapp_rop']==""){$arr[7]="Rate of Pay";} 
									
									$arr_data='';
									foreach ($arr as $values) {
										$arr_data.="$values,";
									}
									
									$data.="<td><i class='fa fa-close' data-toggle='tooltip' style='font-size:20px;color:red' title='$arr_data'></i></td>";
								}
							}else{
								
								if($re['sgd_designation']!="" && $re['sgd_pst']!="" && $re['sgd_billunit']!="" && $re['sgd_station']!="" && $re['sgd_group']!="" && $re['ogd_desig']!="" && $re['ogd_pst']!="" && $re['ogd_billunit']!="" && $re['ogd_station']!="" && $re['ogd_group']!="" && $re['ogd_rop']!="")
								{
									$data.="<td><i class='fa fa-check' style='font-size:20px;color:green'></i></td>";
								}
								else
								{
									if($re['preapp_pf_number']==""){ $arr[0]="Pf Number";}	
									if($re['sgd_pst']==""){ $arr[1]="SGD Pay Scale";}
									if($re['sgd_billunit']==""){$arr[2]="SGD Billunit";}
									if($re['sgd_station']==""){$arr[3]="SGD Station";} 
									if($re['sgd_group']==""){$arr[4]="SGD Group";} 
									if($re['ogd_desig']==""){$arr[5]="OGD Designation";} 
									if($re['ogd_pst']==""){$arr[6]="OGD Pay Scale";} 
									if($re['ogd_billunit']==""){$arr[7]="OGD Billunit";}  
									if($re['ogd_station']==""){$arr[8]="OGD Station";}  
									if($re['ogd_group']==""){$arr[9]="OGD Group";}  
									if($re['ogd_rop']==""){$arr[10]="OGD Rate of pay";}

									$arr_data='';
									foreach ($arr as $values) {
										$arr_data.="$values,";
									}
								
									$data.="<td><i class='fa fa-close' data-toggle='tooltip' style='font-size:20px;color:red' title='$arr_data'></i></td>";
								}
							}
						}else{
							$data.="<td><span style='font-size:15px;color:red;'>Not Available<span></td>";
						}
						
						$fetch=mysqli_query($conn1,"select * from family_temp where emp_pf='$value'");
						
						if(mysqli_num_rows($fetch)>0)
						{
							$re=mysqli_fetch_array($fetch);
								if($re['emp_pf']!="" && $re['fmy_updatedate']!="" && $re['fmy_member']!="" && $re['fmy_gender']!="")
								{
									$data.="<td><i class='fa fa-check' style='font-size:20px;color:green'></i></td>";
								}else{
									
									if($re['emp_pf']==""){ $arr[0]="Pf Number";}	
									if($re['fmy_updatedate']==""){ $arr[1]="Update Date";}
									if($re['fmy_member']==""){$arr[2]="Member Name";}
									if($re['fmy_gender']==""){$arr[3]="Gender";}
									
									$arr_data='';
									foreach ($arr as $values) {
										$arr_data.="$values,";
									}
									
									$data.="<td><i class='fa fa-close' style='font-size:20px;color:red' data-toggle='tooltip' title='$arr_data'></i></td>";
								}

						}else{
							$data.="<td><span style='font-size:15px;color:red;'>Not Available<span></td>";
						}
						
						$fetch=mysqli_query($conn1,"select * from nominee_temp where nom_pf_number='$value'");
						
						if(mysqli_num_rows($fetch)>0)
						{
							$re=mysqli_fetch_array($fetch);
							if($re['nom_pf_number']!="" && $re['nom_type']!="" && $re['nom_name']!="" && $re['nom_rel']!="" && $re['nom_status']!=""){
								$data.="<td><i class='fa fa-check' style='font-size:20px;color:green'></i></td>";
							}else{
								$data.="<td><i class='fa fa-close' style='font-size:20px;color:red'></i></td>";
							}
						}else{
							$data.="<td><span style='font-size:15px;px;color:red;'>Not Available<span></td>";
						}
						$data .="</tr>";
					}
				}
				$data .="</tbody></table>";
				echo $data;
			break;
			
			
			case 'get_office_pfdata':
			//dbcon1();
			$pf=$_REQUEST['value'];
			// echo"<script>alert('$pf');</script>";
			$query=mysqli_query($conn1,"select b.pf_number, b.emp_name,p.preapp_pf_number,p.preapp_designation,p.ps_type,p.preapp_scale,p.preapp_level from biodata_temp b inner join present_work_temp p on b.pf_number=p.preapp_pf_number where b.pf_number='$pf'");
			// echo"select b.pf_number, b.emp_name,p.preapp_pf_number,p.preapp_designation,p.ps_type,p.preapp_scale,p.preapp_level from biodata_temp b inner join present_work_temp p on b.pf_number=p.preapp_pf_number where b.pf_number='$pf'".mysql_error();
			
			$sql_fetch=mysqli_num_rows($query);
				if($sql_fetch>0)
				{
					while($result=mysqli_fetch_array($query))
					{
						$data['emp_name']=$result['emp_name'];
						$data['preapp_designation']=get_designation($result['preapp_designation']);
						$data['ps_type']=get_pay_scale_type($result['ps_type']);
						$data['preapp_scale']=$result['preapp_scale'];
						$data['preapp_level']=$result['preapp_level'];
					}
				}
				else
					{
						$data="";	
					}
			echo json_encode($data);
			break;
			
			case 'get_complete_pf_report':
				$data ='';
				$count=0;
				
				$pf_data=$_REQUEST['pf_data'];
				
				$b_v=$_REQUEST['b_v'];
				
				$data .="<table class='table table-striped' id='abcd'><thead><tr><th>Sr No</th><th>PF Number</th><th>Employee Name</th><th>Biodata</th><th>Medical Details</th><th>Initial Appointment</th><th>Present Working Details</th><th>Family Composition</th><th>Nominee</th></tr></thead><tbody>";
		
				$count = 0;
				$y=json_decode($pf_data);
				foreach($y as $key => $value){

					$billunit=explode("_",$key);
					
					if($billunit[0]==$b_v)
					{
						//dbcon1();
						$data .="<tr>";
						$count++;
						$data .="<td>$count</td>";
						$data .="<td>".$value."</td>";
						$data .="<td>".get_emp_name($value)."</td>";
						
						$fetch=mysqli_query($conn1,"select * from biodata_temp where pf_number='$value'");
						if(mysqli_num_rows($fetch)>0)
						{
							$arr=[];
							$re=mysqli_fetch_array($fetch);
							if($re['pf_number']!="" && $re['sr_no']!="" && $re['dob']!="" && $re['emp_name']!="" && $re['aadhar_number']!="" && $re['pan_number']!="" && $re['identification_mark']!="" && $re['religion']!="" && $re['community']!="" && $re['gender']!="" && $re['marrital_status']!="" && $re['recruit_code']!="" && $re['group_col']!="" && $re['education_ini']!="")
							{
								$data.="<td><i class='fa fa-check' style='font-size:20px;color:green'></i></td>";
							}else{
								
								if($re['pf_number']==""){ $arr[0]="PF Number";}	
								if($re['dob']==""){ $arr[1]="Date Of Birth";}
								if($re['emp_name']==""){$arr[2]="Employee Name";}
								if($re['aadhar_number']==""){$arr[3]="Aadhar Number";} 
								if($re['pan_number']==""){$arr[4]="PAN Number";} 
								if($re['identification_mark']==""){$arr[5]="Identification Mark";} 
								if($re['religion']==""){$arr[6]="Religion";} 
								if($re['community']==""){$arr[7]="Community";} 
								if($re['gender']==""){$arr[8]="Gender";} 
								if($re['marrital_status']==""){$arr[9]="Marrital Status";} 
								if($re['recruit_code']==""){$arr[10]="Recruitment Code";} 
								if($re['group_col']==""){$arr[11]="Group";} 
								if($re['education_ini']==""){$arr[12]="Initial Education";} 
								$arr_data='';
								foreach ($arr as $value) {
									$arr_data.="$value,";
								}
								$data.="<td><i class='fa fa-close' data-toggle='tooltip' title='$arr_data' 'style='font-size:20px;color:red'></i></td>"; 
							}
						}
						
						$fetch=mysqli_query($conn1,"select * from medical_temp where medi_pf_number='$value'");
						
						if(mysqli_num_rows($fetch)>0)
						{
							$re=mysqli_fetch_array($fetch);
							$arr=[];
							if($re['medi_pf_number']!="" && $re['medi_cate']!="" && $re['medi_dob']!="" && $re['medi_appo_date']!="" && $re['medi_design']!="" && $re['medi_class']!="" && $re['medi_examtype']!="" && $re['medi_certino']!="" && $re['medi_certidate']!="")
							{
								$data.="<td><i class='fa fa-check' style='font-size:20px;color:green'></i></td>";
							}else{
								
								if($re['medi_pf_number']==""){ $arr[0]="Medical Pf Number";}	
								if($re['medi_cate']==""){ $arr[1]="Medical Category";}
								if($re['medi_dob']==""){$arr[2]="Medical Date of Birth";}
								if($re['medi_appo_date']==""){$arr[3]="Appointment Date";} 
								if($re['medi_design']==""){$arr[4]="Medical Design";} 
								if($re['medi_class']==""){$arr[5]="Medical PME Class";} 
								if($re['medi_examtype']==""){$arr[6]="Medical Exam Type";} 
								if($re['medi_certino']==""){$arr[7]="Certificate Number";} 
								if($re['medi_certidate']==""){$arr[8]="Certificate Date";} 
								$arr_data='';
								foreach ($arr as $value) {
									$arr_data.="$value,";
								}
								$data.="<td><i class='fa fa-close' data-toggle='tooltip' title='$arr_data' 'style='font-size:20px;color:red'></i></td>"; 
								
							}
						}
						$fetch=mysqli_query($conn1,"select * from appointment_temp where app_pf_number='$value'");
						
						if(mysqli_num_rows($fetch)>0)
						{
							$re=mysqli_fetch_array($fetch);
							$arr=[];
							if($re['app_type']=="4")
							{
								if($re['app_type']!="" && $re['app_pf_number']!="" && $re['app_department']!="" && $re['app_designation']!="" && $re['app_date']!="" && $re['app_regul_date']!="" && $re['app_payscale']!="" && $re['app_group']!="" && $re['app_station']!="" && $re['app_rop']!="" && $re['app_depot']!="")
								{
									$data.="<td><i class='fa fa-check' style='font-size:20px;color:green'></i></td>";
								}else{
									if($re['app_type']==""){ $arr[0]="Appointment Type";}	
									if($re['app_pf_number']==""){ $arr[1]="Pf Number";}
									if($re['app_department']==""){$arr[2]="Appointment Department";}
									if($re['app_designation']==""){$arr[3]="Appointment Designation";} 
									if($re['app_date']==""){$arr[4]="Appointment Date";} 
									if($re['app_regul_date']==""){$arr[5]="Regularization Date";} 
									if($re['app_payscale']==""){$arr[6]="Pay Scale Type";} 
									if($re['app_group']==""){$arr[7]="Group";} 
									if($re['app_station']==""){$arr[8]="Station";} 
									if($re['app_rop']==""){$arr[9]="Rate of Pay";} 
									if($re['app_depot']==""){$arr[10]="Depot/Workplace";} 
									$arr_data='';
									foreach ($arr as $values) {
										$arr_data.="$values,";
									}
									$data.="<td><i class='fa fa-close' data-toggle='tooltip' title='$arr_data' 'style='font-size:20px;color:red'></i></td>";
								}
							}else{
								if($re['app_type']!="" && $re['app_pf_number']!="" && $re['app_department']!="" && $re['app_designation']!="" && $re['app_regul_date']!="" && $re['app_payscale']!="" && $re['app_group']!="" && $re['app_station']!="" && $re['app_rop']!="" && $re['app_depot']!="")
								{
									$data.="<td><i class='fa fa-check' style='font-size:20px;color:green'></i></td>";
								}else{
									if($re['app_type']==""){ $arr[0]="Appointment Type";}	
									if($re['app_pf_number']==""){ $arr[1]="Pf Number";}
									if($re['app_department']==""){$arr[2]="Appointment Department";}
									if($re['app_designation']==""){$arr[3]="Appointment Designation";} 
									if($re['app_regul_date']==""){$arr[4]="Regularization Date";} 
									if($re['app_payscale']==""){$arr[5]="Pay Scale Type";} 
									if($re['app_group']==""){$arr[6]="Group";} 
									if($re['app_station']==""){$arr[7]="Station";} 
									if($re['app_rop']==""){$arr[8]="Rate of Pay";} 
									if($re['app_depot']==""){$arr[9]="Depot/Workplace";} 
									$arr_data='';
									foreach ($arr as $value) {
										$arr_data.="$value,";
									}
									$data.="<td><i class='fa fa-close' data-toggle='tooltip' title='$arr_data' 'style='font-size:20px;color:red'></i></td>";
								}
							}		
						}
						
						$fetch=mysqli_query($conn1,"select * from present_work_temp where preapp_pf_number='$value'");
						
						if(mysqli_num_rows($fetch)>0)
						{
							$re=mysqli_fetch_array($fetch);
							if($re['sgd_dropdwn']=='2'){
								
								if($re['preapp_pf_number']!="" && $re['preapp_department']!="" && $re['preapp_designation']!="" && $re['ps_type']!="" && $re['preapp_group']!="" && $re['preapp_station']!="" && $re['preapp_billunit']!="" && $re['preapp_rop']!="")
								{
									$data.="<td><i class='fa fa-check' style='font-size:20px;color:green'></i></td>";
								}else{
									$data.="<td><i class='fa fa-close' style='font-size:20px;color:red'></i></td>";
								}
							}else{
								
								if($re['sgd_designation']!="" && $re['sgd_pst']!="" && $re['sgd_billunit']!="" && $re['sgd_station']!="" && $re['sgd_group']!="" && $re['ogd_desig']!="" && $re['ogd_pst']!="" && $re['ogd_billunit']!="" && $re['ogd_station']!="" && $re['ogd_group']!="" && $re['ogd_rop']!="")
								{
									$data.="<td><i class='fa fa-check' style='font-size:20px;color:green'></i></td>";
								}else{
									$data.="<td><i class='fa fa-close' style='font-size:20px;color:red'>aaaaaaaaa</i></td>";
								}
							}
						}
						
						$fetch=mysqli_query($conn1,"select * from family_temp where emp_pf='$value'");
						
						if(mysqli_num_rows($fetch)>0)
						{
							$re=mysqli_fetch_array($fetch);
							if($re['emp_pf']!="" && $re['fmy_updatedate']!="" && $re['fmy_member']!="" && $re['fmy_gender']!="")
							{
								$data.="<td><i class='fa fa-check' style='font-size:20px;color:green'></i></td>";
							}else{
								$data.="<td><i class='fa fa-close' style='font-size:20px;color:red'></i></td>";
							}
						}
						
						$fetch=mysqli_query($conn1,"select * from nominee_temp where nom_pf_number='$value'");
						
						if(mysqli_num_rows($fetch)>0)
						{
							$re=mysqli_fetch_array($fetch);
							if($re['nom_pf_number']!="" && $re['nom_type']!="" && $re['nom_name']!="" && $re['nom_rel']!="" && $re['nom_status']!=""){
								$data.="<td><i class='fa fa-check' style='font-size:20px;color:green'></i></td>";
							}else{
								$data.="<td><i class='fa fa-close' style='font-size:20px;color:red'></i></td>";
							}
						}
						$data .="</tr>";
					}
					
				}
				

				/* $sql1=mysqli_query("select preapp_pf_number from present_work_temp where preapp_billunit='$b_v' OR ogd_billunit='$b_v'");
				
				while($f=mysqli_fetch_array($sql1))
				{
					$total_count=0;
					
					$fetch=mysqli_query("select * from biodata_temp where pf_number='".$f['preapp_pf_number']."'");
						if(mysqli_num_rows($fetch)>0)
						{
							$re=mysqli_fetch_array($fetch);
							if($re['pf_number']!="" && $re['sr_no']!="" && $re['dob']!="" && $re['emp_name']!="" && $re['aadhar_number']!="" && $re['pan_number']!="" && $re['identification_mark']!="" && $re['religion']!="" && $re['community']!="" && $re['gender']!="" && $re['marrital_status']!="" && $re['recruit_code']!="" && $re['group_col']!="" && $re['education_ini']!="")
							{
								$total_count++;
							}
						}
					$fetch=mysqli_query("select * from medical_temp where medi_pf_number='".$f['preapp_pf_number']."'");
						if(mysqli_num_rows($fetch)>0)
						{
							$re=mysqli_fetch_array($fetch);
							if($re['medi_pf_number']!="" && $re['medi_cate']!="" && $re['medi_dob']!="" && $re['medi_appo_date']!="" && $re['medi_design']!="" && $re['medi_class']!="" && $re['medi_examtype']!="" && $re['medi_certino']!="" && $re['medi_certidate']!="")
							{
								$total_count++;
							}
						}
					$fetch=mysqli_query("select * from appointment_temp where app_pf_number='".$f['preapp_pf_number']."'");
						if(mysqli_num_rows($fetch)>0)
						{
							$re=mysqli_fetch_array($fetch);
							if($re['app_type']=="4")
							{
								if($re['app_type']!="" && $re['app_pf_number']!="" && $re['app_department']!="" && $re['app_designation']!="" && $re['app_date']!="" && $re['app_regul_date']!="" && $re['app_payscale']!="" && $re['app_group']!="" && $re['app_station']!="" && $re['app_rop']!="" && $re['app_depot']!="")
								{
									$total_count++;
								}
							}else{
								if($re['app_type']!="" && $re['app_pf_number']!="" && $re['app_department']!="" && $re['app_designation']!="" && $re['app_regul_date']!="" && $re['app_payscale']!="" && $re['app_group']!="" && $re['app_station']!="" && $re['app_rop']!="" && $re['app_depot']!="")
								{
									$total_count++;
								}
							}
						}
					$fetch=mysqli_query("select * from present_work_temp where preapp_pf_number='".$f['preapp_pf_number']."'");
						if(mysqli_num_rows($fetch)>0)
						{
							$total_count++;
							$re=mysqli_fetch_array($fetch_record);
								if($re['sgd_dropdwn']=='2')
								{
									if($re['preapp_pf_number']!="" && $re['preapp_department']!="" && $re['preapp_designation']!="" && $re['ps_type']!="" && $re['preapp_group']!="" && $re['preapp_station']!="" && $re['preapp_billunit']!="" && $re['preapp_rop']!="")
									{
										$row_cnt++;
									}else{
										$inc_row_count++;
									}
								}else{
									if($re['sgd_designation']!="" && $re['sgd_pst']!="" && $re['sgd_billunit']!="" && $re['sgd_station']!="" && $re['sgd_group']!="" && $re['ogd_desig']!="" && $re['ogd_pst']!="" && $re['ogd_billunit']!="" && $re['ogd_station']!="" && $re['ogd_group']!="" && $re['ogd_rop']!="")
									{
										$row_cnt++;
									}else{
										$inc_row_count++;
									}
								}
						}
					$fetch=mysqli_query("select emp_pf from family_temp where emp_pf='".$f['preapp_pf_number']."'");
						if(mysqli_num_rows($fetch)>0)
						{
							$total_count++;
						}
					$fetch=mysqli_query("select nom_pf_number from nominee_temp where nom_pf_number='".$f['preapp_pf_number']."'");
						if(mysqli_num_rows($fetch)>0)
						{
							$total_count++;
						}
						
					if($total_count>=6)
					{
						
					} */
				//}
			//}		
				$data .="</tbody></table>";
				echo $data;
			break;
	
			case 'get_all_report_detail':
				$data='';
				$count=0;
				
				$b_v=$_REQUEST['b_v'];
				
				$data .="<table class='table table-striped' id='abcd'><thead><tr><th>Sr No</th><th>PF Number</th><th>Employee Name</th><th>Biodata</th><th>Medical Details</th><th>Initial Appointment</th><th>Present Working Details</th><th>Family Composition</th><th>Nominee</th></tr></thead><tbody>";
				
				// //dbcon1();
				$sql1=mysqli_query($conn1,"select * from present_work_temp where preapp_billunit='$b_v' OR ogd_billunit='$b_v'");
				
				while($f=mysqli_fetch_array($sql1))
				{
					$data .="<tr>";
					$count++;
					$data .="<td>$count</td>";
					$data .="<td>".$f['preapp_pf_number']."</td>";
					$data .="<td>".get_emp_name($f['preapp_pf_number'])."</td>";
					
					
					$fetch=mysqli_query($conn1,"select * from biodata_temp where pf_number='".$f['preapp_pf_number']."'");
					
					if(mysqli_num_rows($fetch)>0)
					{
						$data.="<td><i class='fa fa-check' style='font-size:20px;color:green'></i></td>";
					}else{
						$data.="<td><i class='fa fa-close' style='font-size:20px;color:red'></i></td>";
					}
					
					$fetch=mysqli_query($conn1,"select * from medical_temp where medi_pf_number='".$f['preapp_pf_number']."'");
					
					if(mysqli_num_rows($fetch)>0)
					{
						$data.="<td><i class='fa fa-check' style='font-size:20px;color:green'></i></td>";
					}else{
						$data.="<td><i class='fa fa-close' style='font-size:20px;color:red'></i></td>";
					}
					
					$fetch=mysqli_query($conn1,"select * from appointment_temp where app_pf_number='".$f['preapp_pf_number']."'");
					
					if(mysqli_num_rows($fetch)>0)
					{
						$data.="<td><i class='fa fa-check' style='font-size:20px;color:green'></i></td>";
					}else{
						$data.="<td><i class='fa fa-close' style='font-size:20px;color:red'></i></td>";
					}
					
					$fetch=mysqli_query($conn1,"select * from present_work_temp where preapp_pf_number='".$f['preapp_pf_number']."'");
					
					if(mysqli_num_rows($fetch)>0)
					{
						$data.="<td><i class='fa fa-check' style='font-size:20px;color:green'></i></td>";
					}else{
						$data.="<td><i class='fa fa-close' style='font-size:20px;color:red'></i></td>";
					}
					
					$fetch=mysqli_query($conn1,"select * from family_temp where emp_pf='".$f['preapp_pf_number']."'");
					
					if(mysqli_num_rows($fetch)>0)
					{
						$data.="<td><i class='fa fa-check' style='font-size:20px;color:green'></i></td>";
					}else{
						$data.="<td><i class='fa fa-close' style='font-size:20px;color:red'></i></td>";
					}
					
					$fetch=mysqli_query($conn1,"select * from nominee_temp where nom_pf_number='".$f['preapp_pf_number']."'");
					
					if(mysqli_num_rows($fetch)>0)
					{
						$data.="<td><i class='fa fa-check' style='font-size:20px;color:green'></i></td>";
					}else{
						$data.="<td><i class='fa fa-close' style='font-size:20px;color:red'></i></td>";
					}
					$data .="</tr>";
				}			
				$data .="</tbody></table>";
				echo $data;
				
			break;
            


                  case 'get_report':
				$data='';
				$b_v=$_REQUEST['b_v'];
				$f_d=$_REQUEST['f_d'];
				$t_d=$_REQUEST['t_d'];
				$f_n=$_REQUEST['f_n'];
				
				if($f_n=='biodata')
				{
					// //dbcon1();
					$count=0;
					
					$sql2=mysqli_query($conn1,"select * from biodata_temp b INNER JOIN present_work_temp p ON b.pf_number=p.preapp_pf_number where date(b.date_time) between '$f_d' and '$t_d' and (p.preapp_billunit='$b_v' OR p.ogd_billunit='$b_v')");
					
					while($f=mysqli_fetch_array($sql2))
					{
						if($f['pf_number']!="" && $f['sr_no']!="" && $f['dob']!="" && $f['emp_name']!="" && $f['aadhar_number']!="" && $f['pan_number']!="" && $f['identification_mark']!="" && $f['religion']!="" && $f['community']!="" && $f['gender']!="" && $f['marrital_status']!="" && $f['recruit_code']!="" && $f['education_ini']!="" && $f['group_col']!="")
						{
							$res="<span style='fon_size:18px;color:green'>Positive</span>";
						}else{
							$res="<span style='fon_size:18px;color:red'>Negative</span>";
						}
						$count++;
						$data .="<tr><td>$count</td><td>".$f['pf_number']."</td><td>$res</td></tr>";
						
					}
					//echo $data;
				} else if($f_n=='medical')
				{
					// //dbcon1();
					$count=0;
					
					$sql2=mysqli_query($conn1,"select * from medical_temp b INNER JOIN present_work_temp p ON b.medi_pf_number=p.preapp_pf_number where date(b.datetime) between '$f_d' and '$t_d' and (p.preapp_billunit='$b_v' OR p.ogd_billunit='$b_v')");
					
					//echo "select * from medical_temp b INNER JOIN present_work_temp p ON b.medi_pf_number=p.preapp_pf_number where date(b.datetime) between '$f_d' and '$t_d' and (p.preapp_billunit='$b_v' OR p.ogd_billunit='$b_v')".mysql_error();
					
					while($f=mysqli_fetch_array($sql2))
					{
						if($f['medi_pf_number']!="" && $f['medi_cate']!="" && $f['medi_dob']!="" && $f['medi_appo_date']!="" && $f['medi_design']!="" && $f['medi_examtype']!="" && $f['medi_certino']!="" && $f['medi_certidate']!="")
						{
							$res="<span style='fon_size:18px;color:green'>Positive</span>";
						}else{
							$res="<span style='fon_size:18px;color:red'>Negative</span>";
						}
						$count++;
						$data .="<tr><td>$count</td><td>".$f['medi_pf_number']."</td><td>$res</td></tr>";
						
					}
					
				} else if($f_n=='init_appo')
				{
					// //dbcon1();
					$count=0;
					
					$sql2=mysqli_query($conn1,"select * from appointment_temp b INNER JOIN present_work_temp p ON b.app_pf_number=p.preapp_pf_number where date(b.date_time) between '$f_d' and '$t_d' and (p.preapp_billunit='$b_v' OR p.ogd_billunit='$b_v')");
					
					
					while($f=mysqli_fetch_array($sql2))
					{
						if($f['app_type']==4){
							if($f['app_pf_number']!="" && $f['app_type']!="" && $f['app_department']!="" && $f['app_designation']!="" && $f['app_date']!="" && $f['app_regul_date']!="" && $f['app_payscale']!="" && $f['app_group']!="" && $f['app_station']!="" && $f['app_depot']!="" && $f['app_rop']!="")
							{
								$res="<span style='fon_size:18px;color:green'>Positive</span>";
							}else{
								$res="<span style='fon_size:18px;color:red'>Negative</span>";
							}
						}else{
							if($f['app_pf_number']!="" && $f['app_type']!="" && $f['app_department']!="" && $f['app_designation']!="" && $f['app_regul_date']!="" && $f['app_payscale']!="" && $f['app_group']!="" && $f['app_station']!="" && $f['app_depot']!="" && $f['app_rop']!="")
							{
								$res="<span style='fon_size:18px;color:green'>Positive</span>";
							}else{
								$res="<span style='fon_size:18px;color:red'>Negative</span>";
							}
						}
						
						$count++;
						$data .="<tr><td>$count</td><td>".$f['app_pf_number']."</td><td>$res</td></tr>";
						
					}
				}else if($f_n=='present_work')
				{
					// //dbcon1();
					$count=0;
					
					$sql2=mysqli_query($conn1,"select * from present_work_temp where date_time between '$f_d' and '$t_d' and (preapp_billunit='$b_v' OR ogd_billunit='$b_v')");
					
					
					while($f=mysqli_fetch_array($sql2))
					{
						if($f['sgd_dropdwn']==2)
						{
							if($f['preapp_pf_number']!="" && $f['preapp_department']!="" && $f['preapp_designation']!="" && $f['ps_type']!="" && $f['preapp_group']!="" && $f['preapp_station']!="" && $f['preapp_billunit']!="" && $f['preapp_rop']!="")
							{
								$res="<span style='fon_size:18px;color:green'>Positive</span>";
							}else{
								$res="<span style='fon_size:18px;color:red'>Negative</span>";
							}
						}
						else
						{
							if($f['preapp_pf_number']!="" && $f['preapp_department']!="" && $f['sgd_designation']!="" && $f['sgd_pst']!="" && $f['sgd_billunit']!="" && $f['sgd_station']!="" && $f['sgd_group']!="" && $f['ogd_desig']!="" && $f['ogd_pst']!="" && $f['ogd_billunit']!="" && $f['ogd_station']!="" && $f['ogd_group']!="" && $f['ogd_rop']!="")
							{
								$res="<span style='fon_size:18px;color:green'>Positive</span>";
							}else{
								$res="<span style='fon_size:18px;color:red'>Negative</span>";
							}
						}		
						$count++;
						$data .="<tr><td>$count</td><td>".$f['preapp_pf_number']."</td><td>$res</td></tr>";
						
					}
				}else if($f_n=='family')
				{
					// //dbcon1();
					$count=0;
					
					$sql2=mysqli_query($conn1,"select * from family_temp b INNER JOIN present_work_temp p ON b.fmy_pf_number=p.preapp_pf_number where date(b.date_time) between '$f_d' and '$t_d' and (p.preapp_billunit='$b_v' OR p.ogd_billunit='$b_v')");
					
					
					while($f=mysqli_fetch_array($sql2))
					{
						if($f['emp_pf']!="" && $f['fmy_updatedate']!="" && $f['fmy_member']!="" && $f['fmy_rel']!="" && $f['fmy_gender']!="")
						{
							$res="<span style='fon_size:18px;color:green'>Positive</span>";
						}else{
							$res="<span style='fon_size:18px;color:red'>Negative</span>";
						}
						$count++;
						$data .="<tr><td>$count</td><td>".$f['emp_pf']."</td><td>$res</td></tr>";
						
					}
				}else if($f_n=='nominee'){
					// //dbcon1();
					$count=0;
					
					$sql2=mysqli_query($conn1,"select * from nominee_temp b INNER JOIN present_work_temp p ON b.nom_pf_number=p.preapp_pf_number where date(b.date_time) between '$f_d' and '$t_d' and (p.preapp_billunit='$b_v' OR p.ogd_billunit='$b_v')");
					
					
					while($f=mysqli_fetch_array($sql2))
					{
						if($f['nom_pf_number']!="" && $f['nom_type']!="" && $f['nom_name']!="" && $f['nom_rel']!="")
						{
							$res="<span style='fon_size:18px;color:green'>Positive</span>";
						}else{
							$res="<span style='fon_size:18px;color:red'>Negative</span>";
						}
						$count++;
						$data .="<tr><td>$count</td><td>".$f['nom_pf_number']."</td><td>$res</td></tr>";
						
					}
				}else{
					$data="";
				}  
			echo $data;
			break;






 case 'find_bank_detail':
			//dbcon1();
			$pf=$_POST['temp_pf'];
			$ifsc=$_POST['ifsc'];
			$data=[];
	
			if(!empty($ifsc))
			{
				// //dbcon();
				$sql=mysqli_query($conn1,"select * from bank_detail where `ifsc_code`='$ifsc'");
				$ex=mysqli_num_rows($sql);
				if($ex>0)
				{
					while($re=mysqli_fetch_array($sql))
					{
						$data['bank_name']=$re['bank_name'];
						$data['micr_code']=$re['micr_code'];
						$data['address']=$re['address'];
					}
				}else
				{
					$data ="No Record";
				}
			}else
			{
				$data ="No Record Found";
			}
			
			echo json_encode($data);
		break;
		
		case 'get_bank_details':
			// //dbcon1();
			$pf=$_POST['temp_pf'];
			$data=[];
			$sql=mysqli_query($conn1,"select * from biodata_temp where `pf_number`='$pf'");
			$result=mysqli_fetch_array($sql);
			$ifsc=$result['ifsc_code'];
			
			if(!empty($ifsc))
			{
				// //dbcon();
				$sql=mysqli_query($conn1,"select * from bank_detail where `ifsc_code`='$ifsc'");
				$ex=mysqli_num_rows($sql);
				if($ex>0)
				{
					while($re=mysqli_fetch_array($sql))
					{
						$data['bank_name']=$re['bank_name'];
						$data['micr_code']=$re['micr_code'];
						$data['address']=$re['address'];
					}
				}else
				{
					$data ="No Record";
				}
			}else
			{
				$data ="No Record Found";
			}
			
			echo json_encode($data);
		break;


		case 'get_nom_value':
			// //dbcon1();
			$data='';
			$val=$_POST['val'];
			$sql=mysqli_query($conn1,"select * from family_temp where id='$val'");
			while($result=mysqli_fetch_array($sql))
			{
				$data['fmy_rel']=get_all_relation($result['fmy_rel']);
				$data['fmy_dob']=date('d-m-Y', strtotime($result['fmy_dob']));
			}
			echo json_encode($data);
			
		break;
		
		case 'fetch_history':
			// //dbcon1();
			$pf_no = $_REQUEST['pf'];
			$column = $_REQUEST['val'];
			$table = $_REQUEST['val1'];
			$pfnm = $_REQUEST['val2'];
			
            $query = mysqli_query($conn1,"select final_transaction_id,$column,date(date_time) as date, time(date_time) as time from $table where $pfnm='$pf_no'") or die(mysqli_error());
			$cnt = 0;
			$sr=1;
            while($resultset = mysqli_fetch_array($query))
            {
            	if($cnt==0)
            	{
            		$last_change="";
            		$cnt++;
            	}
            	echo '<tr><td>'.$sr.'</td><td>'.$resultset['final_transaction_id'].'</td>'.'<td> '.$last_change.'</td>'.'<td> '.$resultset["$column"].'</td>'.'<td>'.$resultset['date'].'</td>'.'<td>'.$resultset['time'].'</td>'.'<td>ADMIN</td></tr>';
            	$sr++;
            	if($cnt!=0)
            	{
            		$last_change = $resultset["$column"];
            	}
            }
         break;
	
		case 'get_state':
			$data='';
			$sqlreligion=mysqli_query($conn1,"select * from state");
				$data ="<option value='blank'></option>";
				while($rwDept=mysqli_fetch_array($sqlreligion))
				{
					$data .="<option value='".$rwDept["longdesc"]."'>".$rwDept["longdesc"]."</option>";
				}
			echo $data;
		break;
	
		//process.php training
		case 'get_training':
			$data="";
			$t_count=$_POST['training_count'];
			$data="<div class='clearfix'></div><br><h3>$t_count Training</h3><hr style='height:1px;border:none;color:#f39c12;background-color:#f39c12;'><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Training Type</label><div class='col-md-8 col-sm-8 col-xs-12'><select name='tr_training_status$t_count' id='tr_training_status$t_count' class='form-control select2_dyn$t_count' style='margin-top:0px; width:100%;' required><option disabled selected >Select Training Status</option>";
									
					$sqlreligion=mysqli_query($conn1,"select * from training_type");
					while($rwDept=mysqli_fetch_array($sqlreligion))
					{	
					$data .="<option value='".$rwDept["id"]."'>".$rwDept["type"]."</option>";
					}
										
			$data .="</select></div></div></div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Institute</label><div class='col-md-8 col-sm-8 col-xs-12' ><input type='text' id='tr_inst$t_count' name='tr_inst$t_count' class='form-control' placeholder='Enter Institute' ></div></div></div></div>";
			
			$data.="<br/><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Department</label><div class='col-md-8 col-sm-8 col-xs-12'><select name='tr_dept$t_count' id='tr_dept$t_count' class='form-control select2_dyn$t_count' style='margin-top:0px; width:100%;' required><option disabled selected > </option>";
							$sqlreligion=mysqli_query($conn1,"select * from department");
					while($rwDept=mysqli_fetch_array($sqlreligion))
					{	
					$data .="<option value='".$rwDept["id"]."'>".$rwDept["DEPTDESC"]."</option>";
					}
										
			$data .="</select></div></div></div>  <div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Designation</label><div class='col-md-8 col-sm-8 col-xs-12'><select name='tr_desig$t_count' id='tr_desig$t_count' class='form-control select2_dyn$t_count' style='margin-top:0px; width:100%;' required><option disabled selected > </option>";

							$sqlreligion=mysqli_query($conn1,"select * from designation");
					while($rwDept=mysqli_fetch_array($sqlreligion))
					{	
					$data .="<option value='".$rwDept["id"]."'>".$rwDept["desiglongdesc"]."</option>";
					}    
								
			
			
			$data.="</select></div></div></div></div><div class='row' id='schedule_id'><br><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Last Date</label><div class='col-md-8 col-sm-8 col-xs-12' ><input type='text' id='tra_last_date$t_count' name='tra_last_date$t_count' class='form-control calender_picker_dyn".$t_count."'></div></div></div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Due Date</label><div class='col-md-8 col-sm-8 col-xs-12'><input type='text' id='tra_due_date$t_count' name='tra_due_date$t_count' class='form-control calender_picker_dyn".$t_count."'></div></div></div></div><br><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Training From</label><div class='col-md-8 col-sm-8 col-xs-12'><input type='text' id='tra_training_from$t_count' name='tra_training_from$t_count' class='form-control calender_picker_dyn".$t_count."' required></div></div></div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Training To</label><div class='col-md-8 col-sm-8 col-xs-12'><input type='text' id='tra_training_to$t_count' name='tra_training_to$t_count' class='form-control calender_picker_dyn".$t_count."' required></div></div></div></div><div class='clearfix'></div> <br><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Letter No</label><div class='col-md-8 col-sm-8 col-xs-12' ><input type='text' id='tr_ltr_no$t_count' name='tr_ltr_no$t_count' class='form-control' placeholder='Enter Letter Number' required></div></div></div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group' ><label class='control-label col-md-4 col-sm-1 col-xs-12'>Letter Date</label><div class='col-md-8 col-sm-12 col-xs-12'><input type='text' id='tr_ltr_date$t_count' name='tr_ltr_date$t_count' class='form-control calender_picker_dyn".$t_count."' required></div></div></div></div><br><div class='row' ><div class='col-md-12 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-2 col-sm-1 col-xs-12'>Description</label><div class='col-md-10 col-sm-12 col-xs-12'><textarea  rows='2'  class='form-control primary description' id='tr_desc$t_count' name='tr_desc$t_count' placeholder='Enter Description' required></textarea></div></div></div></div><br><div class='row'><div class='col-md-12 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-2 col-sm-1 col-xs-12'>Remarks</label><div class='col-md-10 col-sm-12 col-xs-12'><textarea  rows='2'  class='form-control primary description' id='tr_remark$t_count' name='tr_remark$t_count' placeholder='Enter Remark' required></textarea></div></div></div></div><br>";
			
			$data.="<script>$('.calender_picker_dyn$t_count').datepicker({format:'dd-mm-yyyy',autoclose:true,forceParse:false});$('.select2_dyn$t_count').select2();</script>"; 
			
			echo $data;
		break;
	
		case 'get_property':
			$data="";
			$pro_count=$_POST['pro_count'];
			$data="<br><h3>$pro_count Property</h3><div class='clearfix'></div><hr style='height:1px;border:none;color:#f39c12;background-color:#f39c12;'><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Property Type</label><div class='col-md-8 col-sm-8 col-xs-12'><select name='pd_pro_type$pro_count' id='pd_pro_type$pro_count' class='form-control property select2_dyn$pro_count' style='margin-top:0px; width:100%;' required><option disabled selected >Select Property Type</option>";
					// //dbcon();
					$sqlreligion=mysqli_query($conn1,"select * from property_type");
					while($rwDept=mysqli_fetch_array($sqlreligion))
					{
						$data .="<option value='".$rwDept["id"]."'>".$rwDept["type"]."</option>";
					
					}
			$data.="</select></div></div></div></div><br><div class='clearfix'></div><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Item</label><div class='col-md-8 col-sm-8 col-xs-12'><select name='pd_item_name$pro_count' id='pd_item_name$pro_count' class='form-control select2_dyn$pro_count' style='margin-top:0px; width:100%;' required><option disabled selected >Select Item Type</option>";
						
			$data .="</select></div></div></div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Other Item</label><div class='col-md-8 col-sm-8 col-xs-12' ><input type='text' id='pd_othr_item_name$pro_count' name='pd_othr_item_name$pro_count' class='form-control TextNumber'></div></div></div></div><br><div class='row'><div class='col-md-6 col-sm-12 col-xs-12 hide_make$pro_count'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Make/Model</label><div class='col-md-8 col-sm-8 col-xs-12' ><input type='text' id='pd_make_model$pro_count' name='pd_make_model$pro_count' class='form-control TextNumber' placeholder='Enter Make/Modal'></div></div></div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-1 col-xs-12'>Date of Purchase</label><div class='col-md-8 col-sm-12 col-xs-12'><input type='text' id='pd_dop$pro_count' name='pd_dop$pro_count' class='form-control calender_picker_dyn$pro_count' required></div></div></div></div><br><div class='row' id='prop_detail1_$pro_count'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Location</label><div class='col-md-8 col-sm-8 col-xs-12' ><input type='text' id='pd_location$pro_count' name='pd_location$pro_count' class='form-control TextNumber'placeholder='Enter Location' ></div></div></div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group' ><label class='control-label col-md-4 col-sm-1 col-xs-12'>Registration No</label><div class='col-md-8 col-sm-12 col-xs-12'><input type='text' id='pd_reg_no$pro_count' name='pd_reg_no$pro_count' class='form-control TextNumber' placeholder='Enter Registration No' ></div></div></div></div><br><div class='row' id='prop_detail2_$pro_count'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Area</label><div class='col-md-8 col-sm-8 col-xs-12' ><input type='text' id='pd_area$pro_count' name='pd_area$pro_count' class='form-control TextNumber' placeholder='Enter Area' ></div></div></div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group' ><label class='control-label col-md-4 col-sm-1 col-xs-12'>Survey Number</label><div class='col-md-8 col-sm-12 col-xs-12'><input type='text' id='pd_sur_no$pro_count' name='pd_sur_no$pro_count' class='form-control'  placeholder='Enter Survey No' ></div></div></div></div><br><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Total Cost</label><div class='col-md-8 col-sm-8 col-xs-12' ><input type='text' id='pd_total_cost$pro_count' name='pd_total_cost$pro_count' class='form-control onlyNumber' placeholder='Enter Total Cost' required> </div></div></div></div><br><div class='row'><div class='col-md-12 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12'>Source of Amount/Source Type</label><div class='col-md-8 col-sm-8 col-xs-12' ><button class='btn btn-primary add_source' type='button' id='add_source$pro_count'>+ADD</button><!--button class='btn btn-danger remove_source' type='button' id='remove_source$pro_count'>-REMOVE</button--></div></div></div></div><div class='row' id='add_source_div$pro_count'></div><br><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Letter No</label><div class='col-md-8 col-sm-8 col-xs-12' ><input type='text' id='pd_letter_no$pro_count' name='pd_letter_no$pro_count' class='form-control' placeholder='Enter Letter Number' required></div></div></div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group' ><label class='control-label col-md-4 col-sm-1 col-xs-12'>Letter Date</label><div class='col-md-8 col-sm-12 col-xs-12'><input type='text' id='pd_letter_date$pro_count' name='pd_letter_date$pro_count' class='form-control calender_picker_dyn$pro_count' required></div></div></div></div><br><div class='row' ><div class='col-md-12 col-sm-12 col-xs-12'><div class='form-group' ><label class='control-label col-md-2 col-sm-1 col-xs-12'>Remarks</label><div class='col-md-10 col-sm-12 col-xs-12'><textarea  rows='2' style='resize:none'  class='form-control primary description' id='prop_remark$pro_count' name='prop_remark$pro_count' placeholder='Enter  Remark' required></textarea></div></div></div></div>";
			
			$data.="<script>$('.calender_picker_dyn$pro_count').datepicker({format:'dd-mm-yyyy',autoclose:true,forceParse:false});$('.select2_dyn$pro_count').select2();</script>";
			
			echo $data;
		break; 
	
		case 'get_advance':
			$adv_count=$_POST['adv_count'];
			$data="";
			
			$data="<h3>$adv_count Advance</h3><hr style='height:1px;border:none;color:#f39c12;background-color:#f39c12;'><div class='modal-body'><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Advances Type</label><div class='col-md-8 col-sm-8 col-xs-12' >
			<select class='form-control primary select2_dyn$adv_count' id='adv_type$adv_count' name='adv_type$adv_count' style='width:100%;'><option disabled selected >Select Advances Type</option>";
				// //dbcon();
				$sqlreligion=mysqli_query($conn1,"select * from advance");
					while($rwDept=mysqli_fetch_array($sqlreligion))
					{
						$data .="<option value='".$rwDept["short_desc"]."'>".$rwDept["long_desc"]."</option>";
					}
			$data .="</select></div></div></div></div><br><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Letter No<span class=''></span></label><div class='col-md-8 col-sm-8 col-xs-12'><input type='text' class='form-control primary' id='adv_letterno$adv_count' name='adv_letterno$adv_count' placeholder='Enter Letter No' required /></div></div></div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Letter Date</label><div class='col-md-8 col-sm-8 col-xs-12' ><input type='text' class='form-control primary calender_picker_dyn$adv_count' id='adv_letterdate$adv_count' name='adv_letterdate$adv_count' required  /></div></div></div></div><br><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >W.E.F Date</label><div class='col-md-8 col-sm-8 col-xs-12' ><input type='text' class='form-control primary calender_picker_dyn$adv_count' id='adv_wefdate$adv_count' name='adv_wefdate$adv_count' required  /></div></div></div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Amount<span class=''></span></label><div class='col-md-8 col-sm-8 col-xs-12'><input type='text' class='form-control primary' id='adv_amount$adv_count' name='adv_amount$adv_count' placeholder='Enter Amount' required /></div></div></div></div><br><h5><b>Recovery Details:</b></h5><hr><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Total Amount</label><label class='control-label col-md-2 col-sm-3 col-xs-12' >Principal</label><div class='col-md-6 col-sm-8 col-xs-12' ><input type='text' class='form-control primary' id='adv_principle$adv_count' name='adv_principle$adv_count' placeholder='Enter Principal Amount' /></div></div></div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Interest<span class=''></span></label><div class='col-md-8 col-sm-8 col-xs-12'><input type='text' class='form-control primary' id='adv_interest$adv_count' name='adv_interest$adv_count' placeholder='Enter Interest' /></div></div></div></div><br><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >From Date</label><div class='col-md-8 col-sm-8 col-xs-12' ><input type='text' class='form-control primary calender_picker_dyn$adv_count' id='adv_frmdate$adv_count' name='adv_frmdate$adv_count' placeholder='Enter From Date' /></div> </div></div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >To Date<span class=''></span></label><div class='col-md-8 col-sm-8 col-xs-12'><input type='text' class='form-control primary calender_picker_dyn$adv_count' id='adv_todate$adv_count' name='adv_todate$adv_count' placeholder='Enter To Date' /></div></div></div></div><br><div class='row'><div class='col-md-12 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-2 '>Remark</label><div class='col-md-10'><textarea style='resize:none'  rows='4'  class='form-control primary description' id='adv_remark$adv_count' name='adv_remark$adv_count' placeholder='Enter Advances Remark' required></textarea></div></div></div></div><br>";
			
			$data.="<script>$('.calender_picker_dyn$adv_count').datepicker({format:'dd-mm-yyyy',autoclose:true,forceParse:false});$('.select2_dyn$adv_count').select2();</script>";
			
			echo $data;
		break;
	
		//awards
case 'get_award':
			
			$data='';
			$a_count=$_POST['award_count'];
			
			$data="<h3>$a_count Award</h3><div class='clearfix'></div><hr style='height:1px;border:none;color:#f39c12;background-color:#f39c12;'><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-3 col-sm-3 col-xs-12' >Year Of Award</label><div class='col-md-9 col-sm-8 col-xs-12'><input type='text' id='award_date$a_count' name='award_date$a_count' class='form-control' required></div></div></div></div><br><div class='clearfix'></div><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-3 col-sm-3 col-xs-12' >Awarded By</label><div class='col-md-9 col-sm-8 col-xs-12'><select name='award_award_by$a_count' id='award_award_by$a_count' class='form-control select2_dyn$a_count' style='margin-top:0px; width:100%;' required><option disabled selected >Select Awarded By</option>";
				//dbcon();
				$sqlDept=mysqli_query($conn1,"select * from awarded_by");
				while($rwDept=mysqli_fetch_array($sqlDept))
					{
						$data .= "<option value='".$rwDept["id"]."'>".$rwDept["awarded_by"]."</option>";
					}
			$data .="</select></div></div></div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-3 col-sm-3 col-xs-12' >Type Of Award</label><div class='col-md-9 col-sm-8 col-xs-12'><select name='award_type_award$a_count' id='award_type_award$a_count' class='form-control select2_dyn$a_count' style='width:100%;' required><option disabled selected >Select Award Type</option>";
					//dbcon();
					$sqlDept=mysqli_query($conn1,"select * from awards");
						while($rwDept=mysqli_fetch_array($sqlDept))
						{
							$data .="<option value='".$rwDept["id"]."'>".$rwDept["awards"]."</option>";
						}
			$data .="</select></div></div></div></div><br><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-3 col-sm-3 col-xs-12' >Letter No</label><div class='col-md-9 col-sm-8 col-xs-12' ><input type='text' id='award_ltr_no$a_count' name='award_ltr_no$a_count' class='form-control description'></div></div></div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-3 col-sm-3 col-xs-12' >Letter Date</label><div class='col-md-9 col-sm-8 col-xs-12'><input type='text' id='award_ltr_date$a_count' name='award_ltr_date$a_count' class='form-control calender_picker_dyn$a_count'></div></div></div></div><br><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-3 col-sm-3 col-xs-12'>Other Award</label><div class='col-md-9 col-sm-8 col-xs-12'><input type='text' id='award_other_award$a_count' name='award_other_award$a_count' class='form-control TextNumber' placeholder='Enter Other Award' ></div></div></div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group' ><label class='control-label col-md-3 col-sm-1 col-xs-12'>Award Details</label><div class='col-md-9 col-sm-12 col-xs-12'><textarea  rows='2'  class='form-control primary description' id='award_detail$a_count' name='award_detail$a_count' placeholder='Enter Award Details' required></textarea></div></div></div></div></div><br><div class='clearfix'></div>";
			
			$data.="<script>$('.calender_picker_dyn$a_count').datepicker({format:'dd-mm-yyyy',autoclose:true,forceParse:false});$('.select2_dyn$a_count').select2();</script>";
			
			echo $data;
		break;	
		case 'get_increment':
		
			$incr="";
			$i_count=$_POST['incr_count'];
			
			$incr="<h3>$i_count Increment</h3><hr style='height:1px;border:none;color:#f39c12;background-color:#f39c12;'><div class='modal-body'><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Increment Type<span class=''></span></label><div class='col-md-8 col-sm-8 col-xs-12'><select class='form-control primary select2_dyn$i_count' id='incr_type$i_count' name='incr_type$i_count' style='width:100%;' required><option value='blank' selected></option>";
				$sqlDept=mysqli_query($conn1,"select * from increment_type");
				while($rwDept=mysqli_fetch_array($sqlDept))
					{
						$incr .="<option value='".$rwDept["id"]."'>".$rwDept["increment_type"]."</option>";	
					}
										
			$incr .="</select></div></div></div></div><br><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12'>Increment Date<span class=''></span></label><div class='col-md-8 col-sm-8 col-xs-12'><input type='text' class='form-control primary calender_picker_dyn$i_count' id='incr_date$i_count' name='incr_date$i_count' required  /></div></div></div><div class='col-md-6 col-sm-12 col-xs-12' id=''><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Pay Scale TYPE</label><div class='col-md-8 col-sm-8 col-xs-12'><select class='form-control primary ps_type_dyn select2_dyn$i_count' id='_".$i_count."_ps_type_4' name='_".$i_count."_ps_type_4' style='margin-top:0px; width:100%;' required><option value='' selected hidden disabled>-- Select PC Type --</option>";
				$sqlDept=mysqli_query($conn1,"select * from  pay_scale_type");
				while($rwDept=mysqli_fetch_array($sqlDept))
					{
						$incr .="<option value='".$rwDept["id"]."'>".$rwDept["type"]."</option>";	
					}
						
			$incr .="</select></div></div></div></div><br><div class='row'><div class='col-md-6 col-sm-12 col-xs-12' id='".$i_count."scale_4' style='display:none;'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Scale</label><div class='col-md-8 col-sm-8 col-xs-12'><select class='form-control primary select2_dyn$i_count' id='incr_scale$i_count' name='incr_scale$i_count' style='width:100%;'><option value='' selected hidden disabled>-- Select Sacle --</option>";
				$sqlDept=mysqli_query($conn1,"select distinct 6_cpc_scale from scale");
				while($rwDept=mysqli_fetch_array($sqlDept))
					{
						$incr .="<option value='".$rwDept["6_cpc_scale"]."'>".$rwDept["6_cpc_scale"]."</option>";
					}
			$incr .="</select></div></div></div><div class='col-md-6 col-sm-12 col-xs-12' id='".$i_count."level_4' style='display:none;'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Level<span class=''></span></label><div class='col-md-8 col-sm-8 col-xs-12'><select class='form-control primary select2_dyn$i_count' id='incr_level$i_count' name='incr_level$i_count' style='width:100%;'><option value='' selected hidden disabled>-- Select Level --</option>";
				$sqlDept=mysqli_query($conn1,"select distinct 7_pc_level from scale");
				while($rwDept=mysqli_fetch_array($sqlDept))
					{
						$incr .="<option value='".$rwDept["7_pc_level"]."'>".$rwDept["7_pc_level"]."</option>";
					}
					
			$incr .="</select></div></div></div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Old Rate Of Pay</label><div class='col-md-8 col-sm-8 col-xs-12' ><input type='text' class='form-control primary onlyNumber' id='incr_oldrop$i_count' name='incr_oldrop$i_count' placeholder='Enter Old ROP'/></div></div></div></div><br><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12'>Rate Of Pay<span class=''></span></label><div class='col-md-8 col-sm-8 col-xs-12'><input type='text' class='form-control primary onlyNumber' id='incr_rop$i_count' name='incr_rop$i_count' placeholder='Enter ROP' required /></div></div></div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12'>Personal Pay</label><div class='col-md-8 col-sm-8 col-xs-12'><input type='text' class='form-control primary TextNumber' id='incr_personel$i_count' name='incr_personel$i_count'  placeholder='Enter Personal Pay' required /></div></div></div> </div><br><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12'>Special Pay<span class=''></span></label><div class='col-md-8 col-sm-8 col-xs-12'><input type='text' class='form-control primary TextNumber' id='incr_special$i_count' name='incr_special$i_count'  placeholder='Enter Special Pay' required /></div></div></div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4'>Next Increment Date</label><div class='col-md-8'><input type='text' class='form-control primary calender_picker_dyn$i_count' id='incr_nxt_incr$i_count' name='incr_nxt_incr$i_count' required /></div></div></div></div><br><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12'>Letter Number<span class=''></span></label><div class='col-md-8 col-sm-8 col-xs-12'><input type='text' class='form-control primary TextNumber' id='incr_ltr_no$i_count' name='incr_ltr_no$i_count'  placeholder='Enter Special Pay' required /></div></div></div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4'>Letter Date</label><div class='col-md-8'><input type='text' class='form-control primary calender_picker_dyn$i_count' id='incr_ltr_date$i_count' name='incr_ltr_date$i_count' required /></div></div></div></div><br><div class='row'><div class='col-md-12 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-2'>Remark</label><div class='col-md-10'><textarea  rows='4' style='resize:none' class='form-control primary description' id='incr_remark$i_count' name='incr_remark$i_count' placeholder='Enter Increment Remark' required></textarea></div></div></div></div>";
			
			$incr.="<script>$('.calender_picker_dyn$i_count').datepicker({format:'dd-mm-yyyy',autoclose:true,forceParse:false});$('.select2_dyn$i_count').select2();</script>";
			
			echo $incr;
		break;
	
		//penalty code

		case 'get_penalty':
			
			$p_count = $_POST['penalty_count'];
			$penalty="";
			$penalty="<h3>$p_count Penalty</h3><hr style='height:1px;border:none;color:#f39c12;background-color:#f39c12;'><div class='clearfix'></div><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Penalty Type</label><div class='col-md-8 col-sm-8 col-xs-12'><select name='p_type$p_count' id='p_type$p_count' class='form-control select2_dyn$p_count' style='margin-top:0px; width:100%;' required><option value='' selected></option>";
                                                                                        
			$sqlDept=mysqli_query($conn1,'select * from penalty_type');
                while($rwDept=mysqli_fetch_array($sqlDept))
				{					
					$penalty .= "<option value='".$rwDept['id']."'>".$rwDept['type']."</option>";		
				}
										
			$penalty .= "</select></div></div></div></div><br><div class='clearfix'></div><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Penalty Issued</label><div class='col-md-8 col-sm-8 col-xs-12'><input type='text' id='pen_awarded$p_count' name='pen_awarded$p_count' class='form-control calender_picker_dyn$p_count'></div></div></div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Penalty Effected</label><div class='col-md-8 col-sm-8 col-xs-12'><input type='text' id='pen_eff$p_count' name='pen_eff$p_count' class='form-control calender_picker_dyn$p_count'></div></div></div></div><br><div class='clearfix'></div><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Letter No</label><div class='col-md-8 col-sm-8 col-xs-12'><input type='text' id='l_no$p_count' name='l_no$p_count' class='form-control' placeholder='Enter Letter No' required></div></div></div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Letter Date</label><div class='col-md-8 col-sm-8 col-xs-12'><input type='text' id='ltr_date$p_count' name='ltr_date$p_count' class='form-control calender_picker_dyn$p_count' placeholder='Enter Date' required></div></div></div></div><br><div class='clearfix'></div><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >ChargeSheet Status</label><div class='col-md-8 col-sm-8 col-xs-12'><select name='chrg_stat$p_count' id='chrg_stat$p_count' class='form-control select2_dyn$p_count' style='margin-top:0px; width:100%;' required><option value='blank' selected></option>";
				$sql_status=mysqli_query($conn1,'select * from charge_sheet_status');
					while($status_sql=mysqli_fetch_array($sql_status))
					{
						$penalty .= "<option value='".$status_sql['id']."'>".$status_sql['charge_sheet_status']."</option>";
					}
					
			$penalty .="</select></div></div></div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >ChargeSheet Reference</label><div class='col-md-8 col-sm-8 col-xs-12'><input type='text' id='pen_chrg_ref_no$p_count' name='pen_chrg_ref_no$p_count' class='form-control' placeholder='Enter ChargeSheet Reference Number' required></div></div></div></div><br><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >From Date</label><div class='col-md-8 col-sm-8 col-xs-12'><input type='text' id='f_date$p_count' name='f_date$p_count' class='form-control calender_picker_dyn$p_count' placeholder='Enter Letter No' required></div></div></div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >To Date</label><div class='col-md-8 col-sm-8 col-xs-12'><input type='text' id='t_date$p_count' name='t_date$p_count' class='form-control calender_picker_dyn$p_count' placeholder='Enter Letter No' required></div></div></div></div><br><div class='row'></div><br><div class='row'><div class='col-md-12 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-2 '>Remark</label><div class='col-md-10'><textarea  rows='4' cols='20' class='form-control primary description' id='penalty_remark$p_count' name='penalty_remark$p_count'  placeholder='Enter Remark' required></textarea></div></div></div></div><hr style='height:1px;border:none;color:#f39c12;background-color:#f39c12;'><br>";
			
			$penalty.="<script>$('.calender_picker_dyn$p_count').datepicker({format:'dd-mm-yyyy',autoclose:true,forceParse:false});$('.select2_dyn$p_count').select2();</script>";
			
			echo $penalty;
		break;
	
	case 'get_scale_all':
			//dbcon();
			$data='';
			$data .="<option selected disabled>Select Type</option>";
			$value=$_POST['value'];
			if($value=='2' || $value=='3'){
				$sql=mysqli_query($conn1,"select * from `scale` where `pay_scale_type`='$value'");
				while($result=mysqli_fetch_array($sql)){
					$data .= "<option value='".$result['6_cpc_scale']."'>".$result['6_cpc_scale']."</option>";
				}
			}else if($value=='4'){
				$sql=mysqli_query($conn1,"select * from `scale` where `pay_scale_type`='$value'");
				while($result=mysqli_fetch_array($sql)){
					$data .= "<option value='".$result['6_cpc_scale']."-".$result['gradepay']."'>".$result['6_cpc_scale']."-".$result['gradepay']."</option>";
				}
			}else if($value=='5'){
				$sql=mysqli_query($conn1,"select * from `scale` where `pay_scale_type`='$value'");
				while($result=mysqli_fetch_array($sql)){
					$data .= "<option value='".$result['7_pc_level']."'>".$result['7_pc_level']."</option>";
				}
			}else{
				$data="";
			}
			echo $data;
		break;
	
	case 'get_property_item':
			//dbcon();
			$data='';
			$pro_type=$_POST['pro_type'];
			$sql =mysqli_query($conn1,"SELECT * FROM `property_item` WHERE `type`='$pro_type'");
			while($result=mysqli_fetch_array($sql)){
				$data.="<option value='".$result['id']."'>".$result['item']."</option>";
			}
			echo $data;
			
		break;
	
		case 'fetch_property':
			//dbcon1();
			$pf_no=$_POST['pro_pf'];
			$data='';
			$sql=mysqli_query($conn1,"select * from property_temp where pro_pf_number='$pf_no'");
			//echo "select * from property_temp where pro_pf_number='$pf_no'".mysql_error();
			$sql_fetch=mysqli_num_rows($sql);
			if($sql_fetch>0)
			{
				while($result=mysqli_fetch_array($sql))
				{
					$data['pro_pf_number']=$result['pro_pf_number'];
					$data['pro_oldpf_number']=$result['pro_oldpf_number'];
					$data['pro_type']=get_all_property_type($result['pro_type']);
					$data['pro_item']=get_all_property_item($result['pro_item']);
					$data['pro_otheritem']=$result['pro_otheritem'];
					$data['pro_make']=$result['pro_make'];
					$data['pro_dop']=date('d-m-Y', strtotime($result['pro_dop']));
					$data['pro_location']=$result['pro_location'];
					$data['pro_regno']=$result['pro_regno'];
					$data['pro_area']=$result['pro_area'];
					$data['pro_surveyno']=$result['pro_surveyno'];
					$data['pro_cost']=$result['pro_cost'];
					$data['pro_source']=$result['pro_source'];
					$data['pro_sourcetype']=get_all_property_source($result['pro_sourcetype']);
					$data['pro_amount']=$result['pro_amount'];
					$data['pro_letterno']=$result['pro_letterno'];
					$data['pro_letterdate']=date('d-m-Y', strtotime($result['pro_letterdate']));
					$data['pro_remark']=$result['pro_remark'];
				}
			}
			else
			{
				$data[]="";
			}
			echo json_encode($data);
		break;
		
		case 'fetchtraining':
		    //dbcon1();
			$pf_no=$_POST['tra_pf'];
			$data='';
			$sql=mysqli_query($conn1,"select * from training_temp where pf_number='$pf_no'");
			//echo "select * from training_temp where pf_number='$pf_no'".mysql_error();
			$sql_fetch=mysqli_num_rows($sql);
			if($sql_fetch>0)
			{
				while($result=mysqli_fetch_array($sql))
				{
					$data['pf_number']=$result['pf_number'];
					$data['old_pf_number']=$result['old_pf_number'];
					$data['last_date']=date('d-m-Y', strtotime($result['last_date']));
					$data['training_type']=fetchtraining_type($result['training_type']);
					$data['due_date']=date('d-m-Y', strtotime($result['due_date']));
					$data['training_from']=date('d-m-Y', strtotime($result['training_from']));
					$data['training_to']=date('d-m-Y', strtotime($result['training_to']));
					$data['letter_no']=$result['letter_no'];
					$data['letter_date']=date('d-m-Y', strtotime($result['letter_date']));
					$data['description']=$result['description'];
					$data['remarks']=$result['remarks'];
										
				}
			}
			else
			{
				$data[]="";
					
			}
			echo json_encode($data);
		break;
	
		case 'fetch_present_awards':
			//dbcon1();
			$pf_no=$_POST['pre_pf'];
			$data='';
			$sql=mysqli_query($conn1,"select * from award_temp where awd_pf_number='$pf_no'");
			$sql_fetch=mysqli_num_rows($sql);
			if($sql_fetch>0){
				while($result=mysqli_fetch_array($sql))
				{
					$data['awd_pf_number']=$result['awd_pf_number'];
					$data['awd_date']=date('d-m-Y', strtotime($result['awd_date']));
					$data['awd_by']=get_all_awarded_by($result['awd_by']);
					$data['awd_type']=get_all_awards($result['awd_type']);
					$data['awd_other']=$result['awd_other'];
					$data['awd_detail']=$result['awd_detail'];
				}
			}else{
				$data[]="";
					
			}
			echo json_encode($data);
			
		break;
	
		case 'fetch_present_penalty':
			//dbcon1();
			$pf_no=$_POST['pre_pf'];
			$data='';
			$sql=mysqli_query($conn1,"select * from penalty_temp where pen_pf_number='$pf_no'");
			//echo "select * from present_work_temp where preapp_pf_number='$pf_no'".mysql_error();
			$sql_fetch=mysqli_num_rows($sql);
			if($sql_fetch>0){
				while($result=mysqli_fetch_array($sql))
				{
					$data .= $result['pen_pf_number']."$".get_all_penalty_type($result['pen_type'])."$".date('d-m-Y', strtotime($result['pen_issued']))."$".date('d-m-Y', strtotime($result['pen_effetcted']))."$".$result['pen_letterno']."$".date('d-m-Y', strtotime($result['pen_letterdate']))."$".get_chargesheet($result['pen_chargestatus'])."$".$result['pen_chargeref']."$".date('d-m-Y', strtotime($result['pen_from']))."$".date('d-m-Y', strtotime($result['pen_to']))."$".$result['pen_remark'];

				}
			}else{
				$data.="";
					
			}
			echo $data;
		break;
	
		case 'fetch_advance':
			// //dbcon1();
			$pf_no=$_POST['pre_pf'];
			$data='';
			$sql=mysqli_query($conn1,"select * from advance_temp where adv_pf_number='$pf_no'");
			
			$sql_fetch=mysqli_num_rows($sql);
			if($sql_fetch>0){
				while($result=mysqli_fetch_array($sql))
				{
					$data['adv_pf_number']=$result['adv_pf_number'];
					$data['adv_type']=get_all_advance($result['adv_type']);
					$data['adv_letterno']=$result['adv_letterno'];
					$data['adv_letterdate']=date('d-m-Y', strtotime($result['adv_letterdate']));
					$data['adv_wefdate']=date('d-m-Y', strtotime($result['adv_wefdate']));
					$data['adv_amount']=$result['adv_amount'];
					$data['adv_principle']=$result['adv_principle'];
					
					$data['adv_interest']=$result['adv_interest'];
				
					$data['adv_from']=date('d-m-Y', strtotime($result['adv_from']));
					$data['adv_to']=date('d-m-Y', strtotime($result['adv_to']));
					$data['adv_remark']=$result['adv_remark'];
				
				
				}
			}else{
				$data[]="";
			}
			echo json_encode($data);
		break;
		
		case 'fetch_increment':
			// //dbcon1();
			$pf_no=$_POST['pre_pf'];
			$data='';
			$sql=mysqli_query($conn1,"select * from increment_temp where incr_pf_number='$pf_no'");

			//echo "select * from present_work_temp where preapp_pf_number='$pf_no'".mysql_error();
			$sql_fetch=mysqli_num_rows($sql);
			if($sql_fetch>0){
				while($result=mysqli_fetch_array($sql))
				{
					$data['incr_pf_number']=$result['incr_pf_number'];
					$data['incr_type']=get_all_increment_type($result['incr_type']);
					$data['incr_date']=date('d-m-Y', strtotime($result['incr_date']));
					$data['ps_type']=get_all_pay_scale_type($result['ps_type']);
					$data['incr_scale']=fetch_all_scale($result['incr_scale']);
					
					$data['incr_level']=fetch_all_level($result['incr_level']);
					$data['incr_oldrop']=$result['incr_oldrop'];
					
					$data['incr_rop']=$result['incr_rop'];
					$data['incr_personel']=$result['incr_personel'];
				
					$data['incr_special']=$result['incr_special'];
					$data['incr_nextdate']=$result['incr_nextdate'];
				
					$data['incr_remark']=$result['incr_remark'];
					$data['ps_type_a']=$result['ps_type'];
				
				}
			}else{
				$data[]="";
					
			}
			echo json_encode($data);
		break;
		
		case 'get_appointment_data':
			$data='';
			$pf=$_POST['pf_number'];
			 //dbcon1();
			$sql="SELECT * FROM `appointment_temp` where app_pf_number='$pf'";
			$sql_row=mysqli_query($conn1,$sql);
			while($sql_res=mysqli_fetch_assoc($sql_row)){
			$data.="".fetch_all_dept($sql_res['app_department'])."$".fetch_all_desig($sql_res['app_designation'])."$".$sql_res['other_designation']."$".$sql_res['app_date']."$".$sql_res['app_regul_date']."$".get_all_pay_scale_type($sql_res['app_payscale'])."$".get_all_scale($sql_res['app_scale'],$sql_res['app_payscale'])."$".fetch_all_level($sql_res['app_level'])."$".fetch_all_group($sql_res['app_group'])."$".get_station($sql_res['app_station'])."$".$sql_res['other_station']."$".$sql_res['app_billunit']."$".$sql_res['app_rop']."$".get_depot($sql_res['app_depot'])."$".$sql_res['app_refno']."$".$sql_res['app_letter_date']."$".$sql_res['app_remark']."$".fetch_all_appo_type($sql_res['app_type'])."$".$sql_res['app_station']."$".$sql_res['app_depot']."$".$sql_res['app_payscale']."$".$sql_res['app_type']."";
			}
			echo $data;
		break;
			
		case 'fetch_present_work':
			//dbcon1();
			$pf_no=$_POST['pre_pf'];
			$data='';
			$sql=mysqli_query($conn1,"select * from present_work_temp where preapp_pf_number='$pf_no'");
			$sql_fetch=mysqli_num_rows($sql);
			if($sql_fetch>0){
				while($result=mysqli_fetch_array($sql))
				{
					$data['preapp_pf_number']=$result['preapp_pf_number'];
					$data['preapp_department']=fetch_all_dept($result['preapp_department']);
					$data['preapp_designation']=fetch_all_desig($result['preapp_designation']);
					$data['pre_otherdesign']=$result['pre_otherdesign'];
					$data['ps_type']=get_all_pay_scale_type($result['ps_type']);
					$data['preapp_scale']=get_all_scale($result['preapp_scale'],$result['ps_type']);
					$data['preapp_group']=fetch_all_group($result['preapp_group']);
					$data['preapp_station']=$result['preapp_station'];
					$data['preapp_level']=fetch_all_level($result['preapp_level']);
					$data['preapp_billunit']=get_billunit($result['preapp_billunit']);
					$data['preapp_billunit_id']=$result['preapp_billunit'];
					$data['preapp_rop']=$result['preapp_rop'];
					$data['preapp_depot']=get_depot($result['preapp_depot']);
					$data['preapp_remark']=$result['preapp_remark'];
					$data['sgd_dropdwn']=$result['sgd_dropdwn'];
					$data['sgd_designation']=fetch_all_desig($result['sgd_designation']);
					$data['presgd_otherdesign']=$result['presgd_otherdesign'];
					$data['sgd_pst']=get_all_pay_scale_type($result['sgd_pst']);
					$data['sgd_scale']=get_all_scale($result['sgd_scale'],$result['sgd_pst']);
					$data['sgd_level']=fetch_all_level($result['sgd_level']);
					$data['sgd_billunit']=get_billunit($result['sgd_billunit']);
					$data['sgd_billunit_id']=$result['sgd_billunit'];
					$data['sgd_depot']=get_depot($result['sgd_depot']);
					$data['sgd_station']=$result['sgd_station'];
					$data['sgd_group']=fetch_all_group($result['sgd_group']);
					$data['ogd_desig']=fetch_all_desig($result['ogd_desig']);
					$data['preogd_otherdesign']=$result['preogd_otherdesign'];
					$data['ogd_pst']=get_all_pay_scale_type($result['ogd_pst']);
					$data['ogd_scale']=get_all_scale($result['ogd_scale'],$result['ogd_pst']);
					$data['ogd_level']=fetch_all_level($result['ogd_level']);
					$data['ogd_billunit']=get_billunit($result['ogd_billunit']);
					$data['ogd_billunit_id']=$result['ogd_billunit'];
					$data['ogd_depot']=get_depot($result['ogd_depot']);
					$data['ogd_station']=$result['ogd_station'];
					$data['ogd_group']=fetch_all_group($result['ogd_group']);
					$data['ogd_rop']=$result['ogd_rop'];
					$data['ps_type_a']=$result['ps_type'];
					$data['sgd_pst_a']=$result['sgd_pst'];
					$data['ogd_pst_a']=$result['ogd_pst'];
					$data['pre_remarky']=$result['pre_remarky'];
					$data['pre_remarkn']=$result['pre_remarkn'];
				}
			}else{
				$data[]="";	
			}
			echo json_encode($data);
		break;
			
		case 'get_family_form':
			$f=$_POST['family_counter'];
			$data="<hr style='height:1px;border:none;color:#f39c12;background-color:#f39c12;'><div class='row'><h4>".$f." Family Member</h4></div><div class='modal-body'><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Family Member Name</label><div class='col-md-8 col-sm-8 col-xs-12' ><input type='text' id='fc_fam_mem_name".$f."' name='fc_fam_mem_name".$f."' class='form-control TextNumber' placeholder='Enter Family Member Name' required></div></div></div></div><br><div id='add_member_div' name='add_member_div'>
			</div><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-1 col-xs-12'>DOB</label><div class='col-md-8 col-sm-12 col-xs-12' ><input type='text' placeholder='Enter DATE' id='fc_fam_mem_dob".$f."' name='fc_fam_mem_dob".$f."' class='form-control calender_picker_dyn$f readonly_fam$f'></div></div></div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Member Relation</label> <div class='col-md-8 col-sm-8 col-xs-12' ><select name='fc_mem_rel".$f."' id='fc_mem_rel".$f."' class='form-control select2_dyn$f' style='margin-top:0px; width:100%;' required><option disabled selected value=''>Select Relation</option>";
				// //dbcon();
				$sqlDept=mysqli_query($conn1,"select * from relation");
				while($rwDept=mysqli_fetch_array($sqlDept))
				{
					$data.="<option value='".$rwDept['code']."'>".$rwDept['longdesc']."</option>";
				}		
			$data.="</select></div></div></div></div><br><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Gender</label><div class='col-md-8 col-sm-8 col-xs-12' ><select name='fc_mem_gender".$f."' id='fc_mem_gender".$f."' class='form-control select2_dyn$f' style='margin-top:0px; width:100%;' required><option disabled selected >Select Gender</option>";
			
				$sqlreligion=mysqli_query($conn1,"select * from gender");
				while($rwDept=mysqli_fetch_array($sqlreligion))
				{
					$data.="<option value='".$rwDept['id']."'>".$rwDept['gender']."</option>";
				}
		
			$data.="</select></div></div></div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Date Of Updation</label><div class='col-md-8 col-sm-8 col-xs-12'><input type='text' id='fc_updated_date".$f."' name='fc_updated_date".$f."' class='form-control' value='".date('d-m-Y')."'  readonly></div></div></div></div></div><hr style='height:1px;border:none;color:#f39c12;background-color:#f39c12;'>";
			
			$data.="<script>$('.calender_picker_dyn$f').datepicker({format:'dd-mm-yyyy',autoclose:true,forceParse:false});$('.select2_dyn$f').select2();</script>";
			
                     $data.="<script>$('.readonly_fam$f').keydown(function(e){e.preventDefault();});</script>";
    			echo $data;
		break;	
			
		case 'get_pf':
			$pf_count = $_REQUEST['pf_counter'];
			$data = "<hr/><div class='box-header with-border'><h3 class='box-title'><i class='fa fa-book'></i> &nbsp;&nbsp;".$pf_count." Nominee</h3><hr/></div><div class='modal-body'><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'>                    <label class='control-label col-md-4 col-sm-3 col-xs-12'>Nominee Type</label>
             <div class='col-md-8 col-sm-8 col-xs-12'><select class='form-control select2_dyn$pf_count' id='nom_type$pf_count' name='nom_type$pf_count' required><option value='' selected disabled >--Select Type--</option>";
			//  //dbcon();
			 $sql=mysqli_query($conn1,"select * from nominee_order_type");
			// echo "select * from nominee_order_type".mysql_error();
			 while($result=mysqli_fetch_array($sql))
			 {
				 $data.="<option value='".$result['order_type']."'>".$result['order_type']."</option>";
			 }
			 $data.=" </select></div></div></div></div><br><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12'> Name of Nominee(s) </label> <div class='col-md-8 col-sm-8 col-xs-12'><select class='form-control primary select2_dyn$pf_count nom_name' id='nom_name".$pf_count."' name='nom_name".$pf_count."' num='$pf_count' short='pf' style='width:100%;' required ><option selected value=''></option>";
					// //dbcon1();
					session_start();
					$sql=mysqli_query($conn1,"select * from family_temp where emp_pf='".$_SESSION['set_update_pf']."'");
					//echo "select * from family_temp where emp_pf='73858510651".mysql_error();
					while($result=mysqli_fetch_array($sql)){
						$data .="<option value='".$result['id']."'>".$result['fmy_member']."</option>";
					}  	
			$data .="</select></div> </div> </div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12'> Nominee Relationship <span class=''> </span></label><div class='col-md-8 col-sm-8 col-xs-12'><select class='form-control primary select2_dyn$pf_count' id='nomn_rel".$pf_count."' name='nomn_rel".$pf_count."' style='width:100%;' readonly><option selected>  </option>";
			// //dbcon();
			$sql = mysqli_query($conn1,"SELECT * FROM `relation`");
			//echo mysql_error();
			while($query_data = mysqli_fetch_array($sql)){
				$data .= "<option value='".$query_data['id']."'> ".$query_data['longdesc']." </option>";
			}
			
			$data .= " </select> </div> </div> </div> </div> <br><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12'> Other Relationship <span class = ''></span></label><div class = 'col-md-8 col-sm-8 col-xs-12'><input type = 'text' class = 'form-control primary' id = 'nom_otherrel".$pf_count."' name = 'nom_otherrel".$pf_count."' placeholder = 'Enter Relationship' /></div> </div> </div> <div class = 'col-md-6 col-sm-12 col-xs-12' ><div class = 'form-group' ><label class = 'control-label col-md-4 col-sm-3 col-xs-12' > <span class = '' > Percentage</span></label ><div class = 'col-md-8 col-sm-8 col-xs-12' ><input type = 'text' class = 'form-control primary percentage onlyNumber' id = 'nom_perc".$pf_count."' name = 'nom_perc".$pf_count."' placeholder = 'Enter Percentage' maxlength='3'> </div> </div> </div> </div> <br ><div class = 'row' ><div class = 'col-md-6 col-sm-12 col-xs-12' ><div class = 'form-group' ><label class = 'control-label col-md-4 col-sm-3 col-xs-12' > Marital Status <span class = '' > </span></label ><div class = 'col-md-8 col-sm-8 col-xs-12' ><select class = 'form-control primary select2_dyn$pf_count' id = 'nom_status".$pf_count."' name = 'nom_status".$pf_count."' style = 'width:100%;' required > <option value = '' selected hidden disabled > --Select Marital Status-- </option>";
			
			$sqlDept = mysqli_query($conn1,'select * from marital_status');
			while( $rwDept= mysqli_fetch_array($sqlDept)){
				$data .= "<option value = '".$rwDept['id']."'>".$rwDept['shortdesc']."</option>";
			}
			
			$data .=" </select> </div> </div> </div> <div class = 'col-md-6 col-sm-12 col-xs-12' ><div class = 'form-group'> <label class = 'control-label col-md-4 col-sm-3 col-xs-12' > Age <span class = '' > </span></label ><div class = 'col-md-8 col-sm-8 col-xs-12' ><input type = 'text' class = 'form-control primary' id = 'nom_age".$pf_count."' name = 'nom_age".$pf_count."' placeholder = 'Enter Age of Nominee' required readonly> </div> </div> </div> </div> <br > <div class = 'row' ><div class = 'col-md-6 col-sm-12 col-xs-12' ><div class = 'form-group' ><label class = 'control-label col-md-4 col-sm-3 col-xs-12' > DOB <span class = '' > </span></label ><div class = 'col-md-8 col-sm-8 col-xs-12' ><input type = 'text' class = 'form-control primary' id = 'nom_dob".$pf_count."' name = 'nom_dob".$pf_count."' placeholder = '' readonly /></div> </div> </div> <div class = 'col-md-6 col-sm-12 col-xs-12' ><div class = 'form-group' ><label class = 'control-label col-md-4 col-sm-3 col-xs-12' > Nominee PAN No <span class = '' > </span></label><div class = 'col-md-8 col-sm-8 col-xs-12' ><input type = 'text' class = 'form-control primary TextNumber' id = 'nom_pan".$pf_count."' name = 'nom_pan".$pf_count."' placeholder = 'Enter Nominee PAN Number' maxlength='10'  /> </div> </div> </div> </div><br> <div class = 'row' ><div class = 'col-md-12 col-sm-12 col-xs-12' ><div class = 'form-group' ><label class = 'control-label col-md-2 col-sm-3 col-xs-12' > Nominee Aadhar <span class = ''> </span></label ><div class = 'col-md-4 col-sm-8 col-xs-12' ><input type = 'text' class = 'form-control primary onlyNumber' id = 'nom_adhr".$pf_count."' name = 'nom_adhr".$pf_count."' placeholder = 'Enter Nominee Aadhar Number' maxlength='12'  /></div></div> </div> </div><br> <div class = 'row' ><div class = 'col-md-12 col-sm-12 col-xs-12' ><div class = 'form-group' ><label class = 'control-label col-md-2 ' > Address of Nominee </label> <div class = 'col-md-10' ><textarea rows = '2'style = 'resize:none;'  class = 'form-control primary description' id = 'nom_address".$pf_count."' name = 'nom_address".$pf_count."' placeholder = 'Enter Address of Nominee' required > </textarea> </div> </div> </div> </div><br> <div class = 'row' ><div class = 'col-md-12 col-sm-12 col-xs-12' ><div class = 'form-group' ><label class = 'control-label col-md-2' > Contingencies </label> <div class = 'col-md-10' ><textarea rows = '2' style = 'resize:none;' class = 'form-control primary description' id = 'nom_conting".$pf_count."' name = 'nom_conting".$pf_count."' placeholder = 'Enter Contingencies' required > </textarea> </div> </div> </div> </div><br> <div class = 'row' ><div class = 'col-md-12 col-sm-12 col-xs-12' ><div class = 'form-group' ><label class = 'control-label col-md-2 ' > Name, Address &amp; Relation of person the subscriber </label> <div class = 'col-md-10' ><textarea rows = '3' style = 'resize:none;' class = 'form-control primary description' id = 'nom_subsciber".$pf_count."' name = 'nom_subsciber".$pf_count."' placeholder = 'Enter Name' required > </textarea> </div> </div> </div> </div><br><div class = 'form-group' ><div class = 'col-sm-3 col-xs-12 pull-right' ></div> </div> </div>";
			
			$data.="<script>$('.calender_picker_dyn$pf_count').datepicker({format:'dd-mm-yyyy',autoclose:true,forceParse:false});$('.select2_dyn$pf_count').select2();</script>";
			
			echo $data;
		
		break;
		
		case 'get_gis':
			$pf_count = $_REQUEST['gis_counter'];
			$data = "<hr/><div class='box-header with-border'><h3 class='box-title'><i class='fa fa-book'></i> &nbsp;&nbsp;".$pf_count." Person GIS Nominee</h3><hr/></div><div class='modal-body'> <div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12'> Name of Nominee(s) </label> <div class='col-md-8 col-sm-8 col-xs-12'><select class='form-control primary select2_dyn$pf_count nom_name' id='gis_name".$pf_count."' name='gis_name".$pf_count."' num='$pf_count' short='gis' style='margin-top:0px; width:100%;' required><option selected value='blank'>--Select Nominee--</option>";
												
				// //dbcon1();
				session_start();
				$sql=mysqli_query($conn1,"select * from family_temp where emp_pf='".$_SESSION['set_update_pf']."'");
				//echo "select * from family_temp where emp_pf='".$_SESSION['same_pf_no']."'".mysql_error();
				while($result=mysqli_fetch_array($sql)){
					$data .="<option value='".$result['id']."'>".$result['fmy_member']."</option>";
				}  	
											
			$data .="</select></div> </div> </div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12'> Nominee Relationship <span class=''> </span></label><div class='col-md-8 col-sm-8 col-xs-12'><select class='form-control primary select2_dyn$pf_count' id='gis_rel".$pf_count."' name='gis_rel".$pf_count."' style='width:100%;' required><option value='' selected hidden disabled > --Select Relationship-- </option>";
			// //dbcon();
			$sql = mysqli_query($conn1,"SELECT * FROM `relation`");
			//echo mysql_error();
			while($query_data = mysqli_fetch_array($sql)){
				$data .= "<option value='".$query_data['id']."'> ".$query_data['longdesc']." </option>";
			}
			$data .= " </select> </div> </div> </div> </div> <br><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12'> Other Relationship <span class = ''></span></label><div class = 'col-md-8 col-sm-8 col-xs-12'><input type = 'text' class = 'form-control primary' id = 'gis_otherrel".$pf_count."' name = 'gis_otherrel".$pf_count."' placeholder = 'Enter Relationship' /></div> </div> </div> <div class = 'col-md-6 col-sm-12 col-xs-12' ><div class = 'form-group' ><label class = 'control-label col-md-4 col-sm-3 col-xs-12' > <span class = '' > Percentage</span></label ><div class = 'col-md-8 col-sm-8 col-xs-12' ><input type = 'text' class = 'form-control primary percentage2' id = 'gis_perc".$pf_count."' name = 'gis_perc".$pf_count."' placeholder = 'Enter Percentage' required /> </div> </div> </div> </div> <br ><div class = 'row' ><div class = 'col-md-6 col-sm-12 col-xs-12' ><div class = 'form-group' ><label class = 'control-label col-md-4 col-sm-3 col-xs-12' > Marital Status <span class = '' > </span></label ><div class = 'col-md-8 col-sm-8 col-xs-12' ><select class = 'form-control primary select2_dyn$pf_count' id = 'gis_status".$pf_count."' name = 'gis_status".$pf_count."' style = 'width:100%;' required > <option value = '' selected hidden disabled > --Select Marital Status-- </option>";
			
			$sqlDept = mysqli_query($conn1,'select * from marital_status');
			while( $rwDept= mysqli_fetch_array($sqlDept)){
				$data .= "<option value = '".$rwDept['id']."'>".$rwDept['shortdesc']."</option>";
			}
			
			$data .=" </select> </div> </div> </div> <div class = 'col-md-6 col-sm-12 col-xs-12' ><div class = 'form-group'> <label class = 'control-label col-md-4 col-sm-3 col-xs-12' > Age <span class = '' > </span></label ><div class = 'col-md-8 col-sm-8 col-xs-12' ><input type = 'text' class = 'form-control primary' id = 'gis_age".$pf_count."' name = 'gis_age".$pf_count."' placeholder = 'Enter Age of Nominee' required /> </div> </div> </div> </div> <br > <div class = 'row' ><div class = 'col-md-6 col-sm-12 col-xs-12' ><div class = 'form-group' ><label class = 'control-label col-md-4 col-sm-3 col-xs-12' > DOB <span class = '' > </span></label ><div class = 'col-md-8 col-sm-8 col-xs-12' ><input type = 'text' class = 'form-control primary calender_picker_dyn$pf_count' id = 'gis_dob".$pf_count."' name = 'gis_dob".$pf_count."' placeholder = 'Enter Name of Nominee' required /></div> </div> </div> <div class = 'col-md-6 col-sm-12 col-xs-12' ><div class = 'form-group' ><label class = 'control-label col-md-4 col-sm-3 col-xs-12' > Nominee PAN No <span class = '' > </span></label><div class = 'col-md-8 col-sm-8 col-xs-12' ><input type = 'text' class = 'form-control primary TextNumber' id = 'gis_pan".$pf_count."' name = 'gis_pan".$pf_count."' placeholder = 'Enter Nominee PAN Number' maxlength='10' required /> </div> </div> </div> </div><br> <div class = 'row' ><div class = 'col-md-12 col-sm-12 col-xs-12' ><div class = 'form-group' ><label class = 'control-label col-md-2 col-sm-3 col-xs-12' > Nominee Aadhar <span class = ''> </span></label ><div class = 'col-md-4 col-sm-8 col-xs-12' ><input type = 'text' class = 'form-control primary onlyNumber' id = 'gis_adhr".$pf_count."' name = 'gis_adhr".$pf_count."' placeholder = 'Enter Nominee Aadhar Number' maxlength='12' required /></div></div> </div> </div><br> <div class = 'row' ><div class = 'col-md-12 col-sm-12 col-xs-12' ><div class = 'form-group' ><label class = 'control-label col-md-2 ' > Address of Nominee </label> <div class = 'col-md-10' ><textarea rows = '2'style = 'resize:none;'  class = 'form-control primary description' id = 'gis_address".$pf_count."' name = 'gis_address".$pf_count."' placeholder = 'Enter Address of Nominee' required > </textarea> </div> </div> </div> </div><br> <div class = 'row' ><div class = 'col-md-12 col-sm-12 col-xs-12' ><div class = 'form-group' ><label class = 'control-label col-md-2' > Contingencies </label> <div class = 'col-md-10' ><textarea rows = '2' style = 'resize:none;' class = 'form-control primary description' id = 'gis_conting".$pf_count."' name = 'gis_conting".$pf_count."' placeholder = 'Enter Contingencies' required > </textarea> </div> </div> </div> </div><br> <div class = 'row' ><div class = 'col-md-12 col-sm-12 col-xs-12' ><div class = 'form-group' ><label class = 'control-label col-md-2 ' > Name, Address &amp; Relation of person the subscriber </label> <div class = 'col-md-10' ><textarea rows = '3' style = 'resize:none;' class = 'form-control primary description' id = 'gis_subsciber".$pf_count."' name = 'gis_subsciber".$pf_count."' placeholder = 'Enter Name' required > </textarea> </div> </div> </div> </div><br><div class = 'form-group' ><div class = 'col-sm-3 col-xs-12 pull-right' ></div> </div> </div>";
			
			$data.="<script>$('.calender_picker_dyn$pf_count').datepicker({format:'dd-mm-yyyy',autoclose:true,forceParse:false});$('.select2_dyn$pf_count').select2();</script>";
			echo $data;
		
		break;
		
		case 'get_gra':
			$pf_count = $_REQUEST['gra_counter'];
			$data = "<hr/><div class='box-header with-border'><h3 class='box-title'><i class='fa fa-book'></i> &nbsp;&nbsp;".$pf_count."<sup>nd</sup> Person GRATUTY Nominee</h3><hr/></div><div class='modal-body'> <div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12'> Name of Nominee(s) </label> <div class='col-md-8 col-sm-8 col-xs-12'><select style='margin-top:0px; width:100%;' class='form-control primary select2_dyn$pf_count nom_name' id='gra_name".$pf_count."' num='$pf_count' short='gra' name='gra_name".$pf_count."' required ><option selected value='blank'>--Select Nominee--</option>";
			
						// //dbcon1();
						session_start();
						$sql=mysqli_query($conn1,"select * from family_temp where emp_pf='".$_SESSION['set_update_pf']."'");
						//echo "select * from family_temp where emp_pf='".$_SESSION['same_pf_no']."'".mysql_error();
						while($result=mysqli_fetch_array($sql)){
							$data .="<option value='".$result['id']."'>".$result['fmy_member']."</option>";
						} 
			
			$data .="</select></div> </div> </div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12'> Nominee Relationship <span class=''> </span></label><div class='col-md-8 col-sm-8 col-xs-12'><select class='form-control primary select2_dyn$pf_count' id='gra_rel".$pf_count."' name='gra_rel".$pf_count."' style='width:100%;' required><option value='' selected hidden disabled > --Select Relationship-- </option>";
			//dbcon();
			$sql = mysqli_query($conn1,"SELECT * FROM `relation`");
			echo mysqli_error();
			while($query_data = mysqli_fetch_array($sql)){
				$data .= "<option value='".$query_data['id']."'> ".$query_data['longdesc']." </option>";
			}
			
			$data .= " </select> </div> </div> </div> </div> <br><div class='row'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12'> Other Relationship <span class = ''></span></label><div class = 'col-md-8 col-sm-8 col-xs-12'><input type = 'text' class = 'form-control primary' id = 'gra_otherrel".$pf_count."' name = 'gra_otherrel".$pf_count."' placeholder = 'Enter Relationship' /></div> </div> </div> <div class = 'col-md-6 col-sm-12 col-xs-12' ><div class = 'form-group' ><label class = 'control-label col-md-4 col-sm-3 col-xs-12' > <span class = '' > Percentage</span></label ><div class = 'col-md-8 col-sm-8 col-xs-12' ><input type = 'text' class = 'form-control primary percentage3' id = 'gra_perc".$pf_count."' name = 'gra_perc".$pf_count."' placeholder = 'Enter Percentage' required /> </div> </div> </div> </div> <br ><div class = 'row' ><div class = 'col-md-6 col-sm-12 col-xs-12' ><div class = 'form-group' ><label class = 'control-label col-md-4 col-sm-3 col-xs-12' > Marital Status <span class = '' > </span></label ><div class = 'col-md-8 col-sm-8 col-xs-12' ><select class = 'form-control primary select2_dyn$pf_count' id = 'gra_status".$pf_count."' name = 'gra_status".$pf_count."' style = 'width:100%;' required > <option value = '' selected hidden disabled > --Select Marital Status-- </option>";
			
			$sqlDept = mysqli_query($conn1,'select * from marital_status');
			while( $rwDept= mysqli_fetch_array($sqlDept)){
				$data .= "<option value = '".$rwDept['id']."'>".$rwDept['shortdesc']."</option>";
			}
			
			$data .=" </select> </div> </div> </div> <div class = 'col-md-6 col-sm-12 col-xs-12' ><div class = 'form-group'> <label class = 'control-label col-md-4 col-sm-3 col-xs-12' > Age <span class = '' > </span></label ><div class = 'col-md-8 col-sm-8 col-xs-12' ><input type = 'text' class = 'form-control primary' id = 'gra_age".$pf_count."' name = 'gra_age".$pf_count."' placeholder = 'Enter Age of Nominee' required /> </div> </div> </div> </div> <br > <div class = 'row' ><div class = 'col-md-6 col-sm-12 col-xs-12' ><div class = 'form-group' ><label class = 'control-label col-md-4 col-sm-3 col-xs-12' > DOB <span class = '' > </span></label ><div class = 'col-md-8 col-sm-8 col-xs-12' ><input type = 'text' class = 'form-control primary calender_picker_dyn$pf_count' id = 'gra_dob".$pf_count."' name = 'gra_dob".$pf_count."' placeholder = 'Enter Name of Nominee' required /></div> </div> </div> <div class = 'col-md-6 col-sm-12 col-xs-12' ><div class = 'form-group' ><label class = 'control-label col-md-4 col-sm-3 col-xs-12' > Nominee PAN No <span class = '' > </span></label><div class = 'col-md-8 col-sm-8 col-xs-12' ><input type = 'text' class = 'form-control primary TextNumber' id = 'gra_pan".$pf_count."' name = 'gra_pan".$pf_count."' placeholder = 'Enter Nominee PAN Number' required maxlength='10' /> </div> </div> </div> </div><br> <div class = 'row' ><div class = 'col-md-12 col-sm-12 col-xs-12' ><div class = 'form-group' ><label class = 'control-label col-md-2 col-sm-3 col-xs-12' > Nominee Aadhar <span class = ''> </span></label ><div class = 'col-md-4 col-sm-8 col-xs-12' ><input type = 'text' class = 'form-control primary onlyNumber' id = 'gra_adhr".$pf_count."' name = 'gra_adhr".$pf_count."' placeholder = 'Enter Nominee Aadhar Number' required maxlength='12' /></div></div> </div> </div><br> <div class = 'row' ><div class = 'col-md-12 col-sm-12 col-xs-12' ><div class = 'form-group' ><label class = 'control-label col-md-2 ' > Address of Nominee </label> <div class = 'col-md-10' ><textarea rows = '2'style = 'resize:none;'  class = 'form-control primary description' id = 'gra_address".$pf_count."' name = 'gra_address".$pf_count."' placeholder = 'Enter Address of Nominee' required > </textarea> </div> </div> </div> </div><br> <div class = 'row' ><div class = 'col-md-12 col-sm-12 col-xs-12' ><div class = 'form-group' ><label class = 'control-label col-md-2' > Contingencies </label> <div class = 'col-md-10' ><textarea rows = '2' style = 'resize:none;' class = 'form-control primary description' id = 'gra_conting".$pf_count."' name = 'gra_conting".$pf_count."' placeholder = 'Enter Contingencies' required > </textarea> </div> </div> </div> </div><br> <div class = 'row' ><div class = 'col-md-12 col-sm-12 col-xs-12' ><div class = 'form-group' ><label class = 'control-label col-md-2 ' > Name, Address &amp; Relation of person the subscriber </label> <div class = 'col-md-10' ><textarea rows = '3' style = 'resize:none;' class = 'form-control primary description' id = 'gra_subsciber".$pf_count."' name = 'gra_subsciber".$pf_count."' placeholder = 'Enter Name' required > </textarea> </div> </div> </div> </div><br><div class = 'form-group' ><div class = 'col-sm-3 col-xs-12 pull-right' ></div> </div> </div>";
			
			$data.="<script>$('.calender_picker_dyn$pf_count').datepicker({format:'dd-mm-yyyy',autoclose:true,forceParse:false});$('.select2_dyn$pf_count').select2();</script>";
			echo $data;
		
		break;		
			
		case 'get_pincode':
			$data="";
                        $data.="<option selected disabled >SELECT PIN CODE</option>";
			$state=$_POST['state_code'];
			$sql=mysqli_query($conn1,"select distinct(pincode) from pincode where state_u_t='$state'");
			while($result=mysqli_fetch_array($sql))
			{
				$data.="<option value='".$result['pincode']."'>".$result['pincode']."</option>";
			}
			 
			echo $data;
		break;
			
		case 'get_medical_detail':
			// //dbcon1();
			$data="";
			$pf_no=$_POST['session'];
		
			$sql=mysqli_query($conn1,"select * from medical_temp where medi_pf_number='$pf_no' ORDER BY id LIMIT 1");
		
			$cnt=mysqli_num_rows($sql);
		
			if($cnt>0)
			{
			while($result=mysqli_fetch_array($sql))
			{
				$data['id']=$result['id'];
				$data['medi_pf_number']=$result['medi_pf_number'];
				$data['medi_examtype']=$result['medi_examtype'];
				$data['medi_cate']=get_medical_classi($result['medi_cate']);
				$data['medi_class']=get_all_pme($result['medi_class']);
				$data['medi_design']=get_designation($result['medi_design']);
				$data['medi_certino']=$result['medi_certino'];
				if($result['medi_certidate']=="0000-00-00")
				{
					$data['medi_certidate']="";
				}
				else
				{
				$data['medi_certidate']=date('d-m-Y', strtotime($result['medi_certidate']));
				}
				$data['medi_refno']=$result['medi_refno'];
				if($result['medi_refdate']=="0000-00-00")
				{
					$data['medi_refdate']='';
				}else{
				$data['medi_refdate']=date('d-m-Y', strtotime($result['medi_refdate']));
				}
				$data['medi_remark']=$result['medi_remark'];
				$data['datetime']=$result['datetime'];
				$data['updated_by']=$result['updated_by'];
				if($result['medi_appo_date']=="0000-00-00")
				{
					$data['medi_appo_date']='';
				}
				else{
					$data['medi_appo_date']=date('d-m-Y', strtotime($result['medi_appo_date']));
				}
			  }
			}
			
			echo json_encode($data);
		break;
				
		case 'get_station':
			$data="";
			$division=$_POST['division'];

			if($division=='SUR')
			{
				$sql=mysqli_query($conn1,"select * from station where divisioncode='SUR'");
				while($res=mysqli_fetch_array($sql))
				{
					$data.="<option value='".$res['stationcode']."'>".$res['stationdesc']."</option>";
				}
			}
			else
			{
			$sql=mysqli_query($conn1,"select * from station where divisioncode='$division'");
			while($result=mysqli_fetch_array($sql))
			{
				$data.="<option value='".$result['stationcode']."'>".$result['stationdesc']."</option>";
			}
			}
			echo $data;
		break;
		
		case 'get_separate':
			$data="";
			$got_billunit=$_POST['got_billunit'];
			$sql=mysqli_query($conn1,"select * from billunit where id='$got_billunit'");
			while($result=mysqli_fetch_array($sql))
			{
				$data['billunit']=$result['billunit'];
				$data['deopt']=$result['deopt'];
			}
			echo json_encode($data);
		break;
		
		case 'get_bill_unit_depot':
			$data='';
			$unit=$_POST['unit'];
			if($unit=='0107')
			{
				$sql=mysqli_query($conn1,"select * from billunit where au='0107'");
				while($res=mysqli_fetch_array($sql))
				{
					$data.="<option value='".$res['id']."'>".$res['billunit']."/".$res['deopt']."</option>";	
				}
			}
			else
			{
			$sql=mysqli_query($conn1,"select * from billunit where au='$unit'");
			while($result=mysqli_fetch_array($sql))
			{
				$data.="<option value='".$result['id']."'>".$result['billunit']."/".$result['deopt']."</option>";
			}
		}
			$data.="<option value='not_available'>Not Available</option>";
			echo $data;
		break;
		
		case 'get_division':
			$data='';
			$zone=$_POST['zone'];
			if($zone=='01')
			{
				$sql=mysqli_query($conn1,"select * from division where divncode='SUR'");
				while($sql_fetch=mysqli_fetch_array($sql))
						{
							$data = "<option selected value='".$sql_fetch['divncode']."'>".$sql_fetch['longdesc']."</option>";
						}

						$sq=mysqli_query($conn1,"select * from division where divncode <> 'SUR'");
						while($res=mysqli_fetch_array($sq))
						{
							$data .="<option value='".$res['divncode']."'>".$res['longdesc']."</option>";
						}
			}
			else
			{
			$sql=mysqli_query($conn1,"select * from division where rlycode='$zone'");
			while($result=mysqli_fetch_array($sql))
			{
				$data.="<option value='".$result['divncode']."'>".$result['longdesc']."</option>";
			}
		}
			echo $data;
		break;
		
		// bill unit
		case 'get_division1':
			$data='';
			$zone=$_POST['zone'];
			if($zone=='01')
			{
				$sql=mysqli_query($conn1,"select * from unit where au='0107'");
				while($res_fetch=mysqli_fetch_array($sql))
				{
					$data="<option selected value='".$res_fetch['au']."'>".$res_fetch['audesc']."</option>";
				}
				$sql=mysqli_query($conn1,"select * from unit where au <> '0107'");
				while($res=mysqli_fetch_array($sql))
				{
					$data.="<option  value='".$res['au']."'>".$res['audesc']."</option>";
				}
			}
			else
			{
			$sql=mysqli_query($conn1,"select * from unit where rlycode='$zone'");
			while($result=mysqli_fetch_array($sql))
			{
				$data.="<option value='".$result['au']."'>".$result['audesc']."</option>";
			}
			}
			echo $data;
		break;
		
		case 'add_education':
			$religion=$_POST['religion'];
			$sql=mysqli_query($conn1,"insert into education(education)values('$religion')");
			if($sql){
				echo "<script>window.location='add_education.php';alert('Education Added Successfully');</script>";
			}else{
				echo "<script>window.location='add_education.php';alert('Education NOT Added');</script>";
			}
		break;
		
		case 'get_depot':
			$data='';
		
			$sql="select * FROM bill_unit where id = '".$_POST['app_bill_unit']."'";
			$sql_row=mysqli_query($conn1,$sql);
			
			while($sql_res=mysqli_fetch_assoc($sql_row)){
				
			$data.="".$sql_res['description']."$";
			}
			
			echo $data;
		break;
		
		// case 'fetchdept':
		// 	echo fetchdept($_REQUEST['id']);
		// break;
		
		/* Umesh Code Start Here */
		case 'fetchreligion':
	        echo fetchreligion($_REQUEST['id']);
			break;
			
			
		case 'fetchaward':
		    echo fetchaward($_REQUEST['id']);
		break;

		
		case 'fetchpenalty':
		    echo fetchpenalty($_REQUEST['id']);
		break;
		
		
		case 'fetchproperty':
		    echo fetchproperty($_REQUEST['id']);
		break;
		
		
		case 'fetchrecruitment':
		    echo fetchrecruitment($_REQUEST['id']);
		break;
		
		
		
		case 'add_recruitment':
		    $recruit=$_POST['recruit'];
			
			$sql=mysqli_query($conn1,"insert into recruitment_code(recruitment_code)values('$recruit')");
			if($sql){
				echo "<script>window.location='add_recruitment_code.php';alert('Recruitment Code added Successfully');</script>";
			}else{
				echo "<script>window.location='add_recruitment_code.php';alert('NOT Added, Please try again');</script>";
			}
		break;
		
		
		
		case 'update_recruitment':
		   if(update_recruitment($_REQUEST['hide_field'],$_REQUEST['update_recruit']))
		      echo "<script>window.location='add_recruitment_code.php';alert('Recruitment Code Updated Successfully');</script>";
		   else
			  echo "<script>window.location='add_recruitment_code.php';alert('Not Updated,Please try again');</script>";
		break;
		
		
		
		
		case 'delete_recruitment':
		 if(delete_recruitment($_REQUEST['delete_id']))
				echo "<script>window.location='add_recruitment_code.php';alert('Recruitment Code Deleted Successfully');</script>";
			else 
				echo "<script>window.location='add_recruitment_code.php';alert('Not Deleted, try again');</script>";
		break;
		
		case 'update_property':
		   if(update_property($_REQUEST['hide_field'],$_REQUEST['update_pro']))
		      echo "<script>window.location='add_property_source.php';alert('Property Updated Successfully');</script>";
		   else
			  echo "<script>window.location='add_property_source.php';alert('Not Updated,Please try again');</script>";
		break;
		
		
		case 'update_penalty':
		   if(update_penalty($_REQUEST['hide_field'],$_REQUEST['update_pen']))
		      echo "<script>window.location='add_penalty_effected.php';alert('Penalty Updated Successfully');</script>";
		   else
			  echo "<script>window.location='add_penalty_effected.php';alert('Not Updated,Please try again');</script>";
		break;
		
		
		
		case 'add_penalty':
		    $penalty=$_POST['penalty'];
			
			$sql=mysqli_query($conn1,"insert into penalty_effected(penalty_effected)values('$penalty')");
			if($sql){
				echo "<script>window.location='add_penalty_effected.php';alert('Penalty added Successfully');</script>";
			}else{
				echo "<script>window.location='add_penalty_effected.php';alert('NOT Added, Please try again');</script>";
			}
		break;
		
		
		
		case 'delete_penalty_effect':
		 if(delete_penalty_effect($_REQUEST['delete_id']))
				echo "<script>window.location='add_penalty_effected.php';alert('Penalty Deleted Successfully');</script>";
			else 
				echo "<script>window.location='add_penalty_effected.php';alert('Not Deleted, try again');</script>";
		break;
		
		
		
		case 'add_property':
		    $property=$_POST['property'];
			
			$sql=mysqli_query($conn1,"insert into property_source(property_source)values('$property')");
			if($sql){
				echo "<script>window.location='add_property_source.php';alert('Property added Successfully');</script>";
			}else{
				echo "<script>window.location='add_property_source.php';alert('NOT Added, Please try again');</script>";
			}
		break;
		
		
		
		case 'delete_property':
		 if(delete_property($_REQUEST['delete_id']))
				echo "<script>window.location='add_property_source.php';alert('Property Deleted Successfully');</script>";
			else 
				echo "<script>window.location='add_property_source.php';alert('Not Deleted, try again');</script>";
		break;
		
		
		
		case 'update_award':
		   if(update_award($_REQUEST['hide_field'],$_REQUEST['update_awr']))
		      echo "<script>window.location='add_awards.php';alert('Awards Updated Successfully');</script>";
		   else
			  echo "<script>window.location='add_awards.php';alert('Not Updated,Please try again');</script>";
		break;
		
		
		case 'add_award':
		    $awards=$_POST['awards'];
			
			$sql=mysqli_query($conn1,"insert into awards(awards)values('$awards')");
			if($sql){
				echo "<script>window.location='add_awards.php';alert('Awards added Successfully');</script>";
			}else{
				echo "<script>window.location='add_awards.php';alert('NOT Added');</script>";
			}
		break;
		
		
		case 'delete_award':
		 if(delete_award($_REQUEST['delete_id']))
				echo "<script>window.location='add_awards.php';alert('Awards Deleted Successfully');</script>";
			else 
				echo "<script>window.location='add_awards.php';alert('Not Deleted, try again');</script>";
		break;
			
		case 'fetchcommunity':
            echo fetchcommunity($_REQUEST['id']);
            break;

			
		case 'update_community':
		   if(update_community($_REQUEST['hide_field'],$_REQUEST['update_comm'],$_REQUEST['update_short']))
		      echo "<script>window.location='community.php';alert('Community Updated Successfully');</script>";
		   else
			  echo "<script>window.location='community.php';alert('Not Updated');</script>";
		break;
			


		case 'delete_community':
		    if(delete_community($_REQUEST['delete_id']))
				echo "<script>window.location='community.php';alert('Deleted Successfully');</script>";
			else 
				echo "<script>window.location='community.php';alert('Not Deleted');</script>";
		break;

		
			
		case 'add_community':
		    $shortdesc=$_POST['short'];
			$longdesc=$_POST['name'];
			$var=strtoupper($longdesc[0].$longdesc[1]);
			$sql=mysqli_query($conn1,"insert into community(code,shortdesc,longdesc)values('$var','$shortdesc','$longdesc')");
			if($sql){
				echo "<script>window.location='community.php';alert('Community added Successfully');</script>";
			}else{
				echo "<script>window.location='community.php';alert('NOT Added');</script>";
			}
		break;
    		
			
	    case 'update_religion':
		   if(update_religion($_REQUEST['hide_field'],$_REQUEST['update_rel'],$_REQUEST['update_short']))
		      echo "<script>window.location='add_religion.php';alert('Religion Updated Successfully');</script>";
		   else
			  echo "<script>window.location='add_religion.php';alert('Not Updated');</script>";
		break;
			
			
		case 'delete_religion':
		    if(delete_religion($_REQUEST['delete_id']))
				echo "<script>window.location='add_religion.php';alert('Deleted Successfully');</script>";
			else 
				echo "<script>window.location='add_religion.php';alert('Not Deleted');</script>";
		break;
		case 'add_religion':
		    $shortdesc=$_POST['short'];
			$longdesc=$_POST['name'];
			$var=strtoupper($longdesc[0].$longdesc[1]);
			$sql=mysqli_query($conn1,"insert into religion(code,shortdesc,longdesc)values('$var','$shortdesc','$longdesc')");
			if($sql){
				echo "<script>window.location='add_religion.php';alert('Religion added Successfully');</script>";
			}else{
				echo "<script>window.location='add_religion.php';alert('NOT Added');</script>";
			}
		break;
		
		/* Umesh Code End Here */
		
		
		
		/*Yogesh Code Starts Here*/
		case 'add_movable_item':
			$movable=$_POST['movable'];
			$sql=mysqli_query($conn1,"insert into property_item_movable(property_item_movable)values('$movable')");
			if($sql){
				echo "<script>window.location='add_movable_item.php';alert('Added Successfully');</script>";
			}else{
				echo "<script>window.location='add_movable_item.php';alert('NOT Added');</script>";
			}
		break;

		case 'fetchincrement':
	        echo fetchincrement($_REQUEST['id']);
			break;

		case 'fetchpenalty_awarded':
	        echo fetchpenalty_awarded($_REQUEST['id']);
			break;
			

		case 'fetchinmovableitem':
	        echo fetchinmovableitem($_REQUEST['id']);
			break;

		case 'fetchmovableitem':
	        echo fetchmovableitem($_REQUEST['id']);
			break;	

		case 'add_increment':
			//$shortdesc=$_POST['short'];
			$incr_type=$_POST['name'];
			$sql=mysqli_query($conn1,"insert into increment_type(increment_type)values('$incr_type')");
			/*echo "insert into increment_type(increment_type)values('$incr_type')".mysql_error();*/
			if($sql){
				echo "<script>window.location='add_increment_type.php';alert('Increment Type added Successfully');</script>";
			}else{
				echo "<script>window.location='add_increment_type.php';alert('NOT Added');</script>";
			}
		break;


		case 'update_increment':
		   if(update_increment($_REQUEST['hide_field'],$_REQUEST['update_incr']))
		      echo "<script>window.location='add_increment_type.php';alert('Increment Type Updated Successfully');</script>";
		   else
			  echo "<script>window.location='add_increment_type.php';alert('Not Updated');</script>";
		break;

		case 'update_penalty_awarded':
		   if(update_penalty_awarded($_REQUEST['hide_field'],$_REQUEST['update_penalty']))
		      echo "<script>window.location='add_penalty_award.php';alert('Penalty Awarded Updated Successfully');</script>";
		   else
			  echo "<script>window.location='add_penalty_award.php';alert('Not Updated');</script>";
		break;
  		
	   case 'update_inmovable_item':
		   if(update_inmovable_item($_REQUEST['hide_field'],$_REQUEST['update_item']))
		      echo "<script>window.location='add_inmovable_item.php';alert('Inmovable Item Updated Successfully');</script>";
		   else
			  echo "<script>window.location='add_inmovable_item.php';alert('Not Updated');</script>";
		break;

		case 'update_movable_item':
		   if(update_movable_item($_REQUEST['hide_field'],$_REQUEST['update_item']))
		      echo "<script>window.location='add_movable_item.php';alert('Movable Item Updated Successfully');</script>";
		   else
			  echo "<script>window.location='add_movable_item.php';alert('Not Updated');</script>";
		break;

		case 'delete_increment':
		    if(delete_increment($_REQUEST['delete_id']))
				echo "<script>window.location='add_increment_type.php';alert('Deleted Successfully');</script>";
			else 
				echo "<script>window.location='add_increment_type.php';alert('Not Deleted');</script>";
		break;


		case 'delete_penalty':
		    if(delete_penalty($_REQUEST['delete_id']))
				echo "<script>window.location='add_penalty_award.php';alert('Deleted Successfully');</script>";
			else 
				echo "<script>window.location='add_penalty_award.php';alert('Not Deleted');</script>";
		break;


		case 'delete_inmovable_item':
		    if(delete_inmovable_item($_REQUEST['delete_id']))
				echo "<script>window.location='add_inmovable_item.php';alert('Deleted Successfully');</script>";
			else 
				echo "<script>window.location='add_inmovable_item.php';alert('Not Deleted');</script>";
		break;


		case 'delete_movable_item':
		    if(delete_movable_item($_REQUEST['delete_id']))
				echo "<script>window.location='add_movable_item.php';alert('Deleted Successfully');</script>";
			else 
				echo "<script>window.location='add_movable_item.php';alert('Not Deleted');</script>";
		break;

		case 'add_penalty_awarded':
			$penalty_awarded=$_POST['penalty_awarded'];
			$sql=mysqli_query($conn1,"insert into penalty_awarded(penalty_awarded)values('$penalty_awarded')");
			if($sql){
				echo "<script>window.location='add_penalty_award.php';alert('Added Successfully');</script>";
			}else{
				echo "<script>window.location='add_penalty_award.php';alert('NOT Added');</script>";
			}
		break;


		case 'add_inmovable_item':
			$property_item=$_POST['inmovable'];
			$sql=mysqli_query($conn1,"insert into property_item_inmovable(property_item_inmovable)values('$property_item')");
			if($sql){
				echo "<script>window.location='add_inmovable_item.php';alert('Added Successfully');</script>";
			}else{
				echo "<script>window.location='add_inmovable_item.php';alert('NOT Added');</script>";
			}
		break;

/*Yogesh Code End Here*/
/* office order pf number  data get code 21-7*/
		
		// //dbcon();
			case 'get_office_pfdata':
			$pf=$_REQUEST['value'];
			$query=mysqli_query($conn1,"select b.pf_number, b.emp_name,p.preapp_pf_number,p.preapp_designation,p.ps_type,p.preapp_scale,p.preapp_level from biodata_temp b inner join present_work_temp p on b.pf_number=p.preapp_pf_number where b.pf_number='$pf'");
			
			$sql_fetch=mysqli_num_rows($query);
				if($sql_fetch>0)
				{
					while($result=mysqli_fetch_array($query))
					{
						$data['emp_name']=$result['emp_name'];
						$data['preapp_designation']=get_designation($result['preapp_designation']);
						$data['ps_type']=get_pay_scale_type($result['ps_type']);
						$data['preapp_scale']=$result['preapp_scale'];
						$data['preapp_level']=$result['preapp_level'];
					}
				}
				else
					{
						$data="";	
					}
			 json_encode($data);
			break;
		
		/* office order pf number  data get code 21-7 end*/
		
		
		
	}
}

?>
