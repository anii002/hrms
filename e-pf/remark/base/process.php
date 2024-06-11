<?php
	include('config.php');
	include('mini_function.php');
	include('fun.php');
	error_reporting(0);
	
	
	if (isset($_REQUEST['action'])) {
	switch (strtolower($_REQUEST['action'])) {  
		////select designation code form dept
		case 'select_desg':
			if(isset($_REQUEST['dept']))
			{
				//$data="<option val='' readonly hidden selected disabled>Select Designation</option>";
				$dept=$_REQUEST['dept'];
				$sql_desg=mysql_query("select * from tbl_designation where dept_id='$dept'");
				while($desg_sql=mysql_fetch_array($sql_desg))
				{
					$data.="<option value='".$desg_sql['id']."'>".$desg_sql['designation']."</option>";
				}
			}
			echo $data;
		break;
		}
}
	
if (isset($_REQUEST['action'])) {
	switch (strtolower($_REQUEST['action'])) {
				/******Add Employee Details***********/	
			/* case 'login_emp':
			
				if(isset($_POST['user_name'],$_POST['pass'])){
						if (login_emp($_POST['user_name'],$_POST['pass'])) {
						
						echo "<script>window.location.href='registration.php';alert('Record Deleted Successfully');</script>";
				}else {
						echo "<script>window.location.href='registration.php';alert('Record Not Deleted');</script>";
					}			
				}
				
			break; */
			case 'fetchdata':
			
			$data=[];
			
			$my_query=mysql_query("select sgd_dropdwn from present_work_temp where preapp_pf_number='".$_POST['bio_pf_no']."'");
			//echo "select sgd_dropdwn from present_work_temp where preapp_pf_number='".$_POST['bio_pf_no']."'".mysql_error();
			$fet=mysql_fetch_array($my_query);
			
			$dropval=$fet['sgd_dropdwn'];
		//	echo $dropval;
			if($dropval==2)
			{
			
				$res=mysql_query('select b.emp_name,p.preapp_department,p.preapp_designation,p.preapp_station,p.preapp_rop,p.preapp_depot from biodata_temp b inner join present_work_temp p on b.pf_number=p.preapp_pf_number where b.pf_number="'.$_REQUEST["bio_pf_no"].'"');
				
				// echo 'select b.emp_name,p.preapp_department,p.preapp_designation,p.preapp_rop,p.preapp_depot from biodata_temp b inner join present_work_temp p on b.pf_number=p.preapp_pf_number where b.pf_number="'.$_REQUEST["bio_pf_no"].'"'.mysql_error();
	
			
				while($fetch_ar=mysql_fetch_array($res))
				{
					$data['emp_name']=$fetch_ar['emp_name'];
					$data['preapp_department']=get_department($fetch_ar['preapp_department']);
					$data['preapp_designation']=get_designation($fetch_ar['preapp_designation']);
					$data['preapp_rop']=$fetch_ar['preapp_rop'];
					$data['preapp_station']=get_station($fetch_ar['preapp_station']);
					$data['preapp_depot']=get_depot($fetch_ar['preapp_depot']);
					
					$data['preapp_station1']=$fetch_ar['preapp_station'];
					$data['preapp_depot1']=$fetch_ar['preapp_depot'];
					$data['preapp_department1']=$fetch_ar['preapp_department'];
					$data['preapp_designation1']=$fetch_ar['preapp_designation'];
				}
				
			}
			else
			{
				$res=mysql_query('select b.emp_name,p.preapp_department,p.ogd_desig,p.ogd_rop,p.ogd_depot,p.ogd_station from biodata_temp b inner join present_work_temp p on b.pf_number=p.preapp_pf_number where b.pf_number="'.$_POST["e_pf_pfno"].'"');
				
				while($fetch_ar=mysql_fetch_array($res))
				{
					$data['emp_name']=$fetch_ar['emp_name'];
					$data['preapp_department']=get_department($fetch_ar['preapp_department']);
					$data['preapp_designation']=get_designation($fetch_ar['ogd_desig']);
					$data['preapp_rop']=$fetch_ar['ogd_rop'];
					$data['preapp_station']=get_station($fetch_ar['ogd_station']);
					$data['preapp_depot']=get_depot($fetch_ar['ogd_depot']);
					
					$data['preapp_department1']=$fetch_ar['preapp_department'];
					$data['preapp_designation1']=$fetch_ar['ogd_desig'];
					$data['preapp_station1']=$fetch_ar['ogd_station'];
					$data['preapp_depot1']=$fetch_ar['ogd_depot'];
				}
				
			}
			echo json_encode($data);
		break;
			
			case 'insert_rpf':
			$e_pf_pfno=$_POST['e_pf_pfno'];
			$emp_pf_name=$_POST['emp_pf_name'];
			$hid_depart=$_POST['hid_depart'];
			$hid_desig=$_POST['hid_desig'];
			$hid_office=$_POST['hid_office'];
			$emp_pf_ticket=$_POST['emp_pf_ticket'];
			$hid_station=$_POST['hid_station'];
			$emp_pf_pay=$_POST['emp_pf_pay'];
			$rec_amt=$_POST['rec_amt'];
			$withdrown_amt=$_POST['withdrown_amt'];
			$emp_t=$_POST['emp_t'];
			$num_month=$_POST['num_month'];
			$amt_with_reason=$_POST['amt_with_reason'];
			$rel_mem=$_POST['rel_mem'];
			$adv_tkn=$_POST['adv_tkn'];
			$outstn_adv=$_POST['outstn_adv'];
			$loan_apply=$_POST['loan_apply'];
			$eng_date=date('Y-m-d', strtotime($_POST['eng_date']));
			$emp_pf_off=$_POST['emp_pf_off'];
			$fill_date=date('Y-m-d', strtotime($_POST['fill_date']));
			
				$query=mysql_query("insert into `pf_data`( `zone`, `division`, `pf_number`, `emp_name`, `dept`, `designation`, `office`, `ticket_no`, `station`, `pay`, `receive_amt`, `withdrawn_amt`, `emp_type`, `number_month`, `amt_withdraw_reason`, `relation_member`, `adv_taken`, `outstanding_adv`, `loadn_applied_reason`, `engagement_date`, `station_office`, `date`, `date_time`)values(01,'SUR','$e_pf_pfno','$emp_pf_name','$hid_depart','$hid_desig','$hid_office','$emp_pf_ticket','$hid_station','$emp_pf_pay','$rec_amt','$withdrown_amt','$emp_t','$num_month','$amt_with_reason','$rel_mem','$adv_tkn','$outstn_adv','$loan_apply','$eng_date','$emp_pf_off','$fill_date',NOW())");
				
				//echo "insert into `pf_data`( `zone`, `division`, `pf_number`, `emp_name`, `dept`, `designation`, `office`, `ticket_no`, `station`, `pay`, `receive_amt`, `withdrawn_amt`, `emp_type`, `number_month`, `amt_withdraw_reason`, `relation_member`, `adv_taken`, `outstanding_adv`, `loadn_applied_reason`, `engagement_date`, `station_office`, `date`, `date_time`)values(01,'SUR','$e_pf_pfno','$emp_pf_name','$hid_depart','$hid_desig','$hid_office','$emp_pf_ticket','$hid_station','$emp_pf_pay','$rec_amt','$withdrown_amt','$emp_t','$num_month','$amt_with_reason','$rel_mem','$adv_tkn','$outstn_adv','$loan_apply','$eng_date','$emp_pf_off','$fill_date',NOW())".mysql_error();
			if($query)
			{
			echo "<script>window.location='afterlogin.php';alert('e-PF added Successfully');</script>";
			}
			else
			{
			 echo "<script>window.location='afterlogin.php';alert('e-PF Not added');</script>";
			}
			break;
								
	}
	
}
	?>


