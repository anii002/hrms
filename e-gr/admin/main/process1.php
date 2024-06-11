<?php
//error_reporting(0);
require('config.php');
if (isset($_REQUEST['action'])) {
	switch (strtolower($_REQUEST['action'])) {  
		case 'get_employee_details':
			$data='';
			$sql="SELECT * FROM `employee` where id='".$_POST['update_employee_hidden_id']."'";
			$sql_row=mysql_query($sql);
			while($sql_res=mysql_fetch_assoc($sql_row))
			{
				$data.="".$sql_res['emp_type']."$".$sql_res['emp_id']."$".$sql_res['emp_name']."$".$sql_res['emp_dept']."$".$sql_res['emp_desig']."$".$sql_res['emp_mob']."$".$sql_res['emp_email']."$".$sql_res['emp_aadhar']."$".$sql_res['emp_address1']."$".$sql_res['emp_address2']."$".$sql_res['emp_state']."$".$sql_res['emp_city']."$".$sql_res['office_emp_address1']."$".$sql_res['office_emp_address2']."$".$sql_res['office_emp_state']."$".$sql_res['office_emp_city']."$".$sql_res['emp_pincode']."$".$sql_res['office_emp_pincode']."";
			}
			echo $data;
		break;
		
		case 'get_office_detail':
			$data='';
			$sql="select * from `tbl_office` where office_id='".$_POST['hidden']."'";
			$sql_result=mysql_query($sql);
			while($fetch_result=mysql_fetch_assoc($sql_result)){
				$data.="".$fetch_result['office_name']."$".$fetch_result['office_desc']."";
			}
			echo $data;
		break;
		
		case 'get_category_detail':
			$data='';
			$sql="select * from `category` where cat_id='".$_POST['hidden']."'";
			$sql_result=mysql_query($sql);
			while($fetch_result=mysql_fetch_assoc($sql_result)){
				$data.="".$fetch_result['cat_name']."$".$fetch_result['cat_desc']."";
			}
			echo $data;
		break;
		
		case 'get_designation_detail':
			$data='';
			$sql="select * from `tbl_designation` where id='".$_POST['hidden']."'";
			$sql_result=mysql_query($sql);
			$fetch_result=mysql_fetch_assoc($sql_result);
			$data['designation'] = $fetch_result['designation'];
			$data['dept_ids'] = get_all_department($fetch_result['dept_id']);
			echo json_encode($data);
		break;
		case 'get_section_detail':
			$data='';
			$sql="select * from `tbl_section` where sec_id='".$_POST['hidden']."'";
			$sql_result=mysql_query($sql);
			while($fetch_result=mysql_fetch_assoc($sql_result)){
				$data.="".$fetch_result['sec_name']."$".$fetch_result['sec_desc']."";
			}
			echo $data;
		break;
		
		case 'get_city':
			$data='';
			$query = mysql_query("SELECT * FROM cities where state_id='".$_POST['state_hidden_id']."'"); 
			while($sql_res=mysql_fetch_assoc($query))
			{
				$data.="".$sql_res['city_name']."$"."";
			}
			echo $data;
		break;
		
		case 'get_city1':
			$data='';
			$query = mysql_query("SELECT * FROM cities where state_id='".$_POST['state_hidden_id1']."'"); 
			while($sql_res=mysql_fetch_assoc($query))
			{
				$data.="".$sql_res['city_name']."$"."";
			}
			echo $data;
		break;
		case 'update_user':
			$update=$_REQUEST['update'];
			$sql_fetch=mysql_query("select * from tbl_user where user_id='$update'");
			$rows = "";
				while($fetch_sql=mysql_fetch_array($sql_fetch)){
					
					$user_desig=get_desig($fetch_sql['user_desg']);
					$section=get_section($fetch_sql['section']);
					$office=get_office($fetch_sql['user_office']);
					$station=get_station($fetch_sql['user_station']);  
					$fetch_user_dept=get_user_dept($fetch_sql['user_dept']);
					
				
					$rows=[
						emp_id => $fetch_sql['emp_id'],
						user_name => $fetch_sql['user_name'],
						section => $section,
						user_dept => $fetch_user_dept,
						user_desg =>$user_desig,
						user_mob => $fetch_sql['user_mob'],
						user_email => $fetch_sql['user_email'],
						user_aadhar => $fetch_sql['user_aadhar'],
						user_office => $office,
						user_station => $station,
						username => $fetch_sql['username'],
						password => $fetch_sql['password'],
					];
				}
				echo json_encode($rows);
				//echo $update;
		break;
		/* case 'get_user':
			$data='';
			$query = mysql_query("SELECT * FROM tbl_user where section='".$_POST['sec_val']."'"); 
			while($sql_res=mysql_fetch_assoc($query))
			{
				$data.="".$sql_res['user_id']."$"."".$sql_res['user_name']."";
			}
			echo $data;
		break; */
		 
		}
}
	
if (isset($_GET['action'])) {
	switch (strtolower($_GET['action'])) {
				/******Add Employee Details***********/	

				
				case 'add_employee':
					if (add_employee($_POST['emp_type'],$_POST['emp_id'],$_POST['emp_name'],$_POST['emp_dept'],$_POST['emp_desig'],$_POST['emp_mob'],$_POST['emp_email'],$_POST['emp_aadhar'],$_POST['emp_address1'],$_POST['emp_address2'],$_POST['emp_state'],$_POST['emp_city'],$_POST['office_emp_address1'],$_POST['office_emp_address2'],$_POST['office_emp_state'],$_POST['office_emp_city'],$_POST['emp_pincode'],$_POST['office_emp_pincode']))
					{
					echo "<script>window.location.href='employee_registration.php';alert('You Are Registered Successfully'); </script>";
					}
					else{
					echo "<script>window.location.href='employee_registration.php';alert('Registration Failed'); </script>";
					}
						
			break;
			
			case 'update_employee':
					if (update_employee($_POST['up_emp_type'],$_POST['up_emp_id'],$_POST['up_emp_name'],$_POST['up_emp_dept'],$_POST['up_emp_desig'],$_POST['up_emp_mob'],$_POST['up_emp_email'],$_POST['up_emp_aadhar'],$_POST['up_emp_address1'],$_POST['up_emp_address2'],$_POST['up_emp_state'],$_POST['up_emp_city'],$_POST['up_office_emp_address1'],$_POST['up_office_emp_address2'],$_POST['up_office_emp_state'],$_POST['up_office_emp_city'],$_POST['up_emp_pincode'],$_POST['up_office_emp_pincode'],$_POST['update_employee_hidden_id']))
					{
					echo "<script>window.location.href='employee_list.php';alert('Employee Updated Successfully'); </script>";
					}
					else{
					echo "<script>window.location.href='employee_list.php';alert('Updation Failed'); </script>";
					}
						
			break;
			
			 case 'delete_employee':
				
				if(isset($_POST['delete_employee_hidden_id'])){
						if (delete_employee($_POST['delete_employee_hidden_id'])) {
						
						echo "<script>window.location.href='employee_list.php';alert('Deleted Successfully');</script>";
				}else {
					    echo "<script>window.location.href='Employee.php';alert('Deletion Failed');</script>";
					}			
				}
				break;	
			
			case 'add_category':
				if (add_category($_POST['cat_name'],$_POST['cat_desc']))
					{
					echo "<script>window.location.href='category.php';alert('Category Added Successfully'); </script>";
					}
					else{
					echo "<script>window.location.href='category.php';alert('Category Not Inserted'); </script>";
					}
			break;
			
			case 'add_designation':
				if(add_designation($_POST['des_name'],$_POST['deptname']))
				{
					echo "<script>window.location.href='designation.php';alert('Successfully Added Successfully'); </script>";
				}
				else{
					echo "<script>window.location.href='designation.php';alert('Designation Not Added'); </script>";
				}				
			break;
			case 'edit_category':
				if(edit_category($_POST['md_cat_name'],$_POST['md_cat_desc'],$_POST['hidden_id']))
				{
					echo "<script>window.location.href='category.php';alert('Record Updated Successfully'); </script>";
				}
				else{
					echo "<script>window.location.href='category.php';alert('Record Not updated'); </script>";
				}				
			break;
			case 'delete_category':
			
				if(isset($_POST['hidden_id_delete'])){
						if (delete_category($_POST['hidden_id_delete'])) {
						
						echo "<script>window.location.href='category.php';alert('Record Deleted Successfully');</script>";
				}else {
						echo "<script>window.location.href='category.php';alert('Record Not Deleted');</script>";
					}			
				}
			break;	
			
			case 'edit_designation':
				if(edit_designation($_POST['md_des_name'],$_POST['updatedeptid'],$_POST['hidden_id']))
				{
					echo "<script>window.location.href='designation.php';alert('Record Updated Successfully'); </script>";
				}
				else{
					echo "<script>window.location.href='designation.php';alert('Record Not updated'); </script>";
				}				
			break;
			case 'edit_section':
				if(edit_section($_POST['md_sec_name'],$_POST['md_sec_desc'],$_POST['hidden_id']))
				{
					echo "<script>window.location.href='section.php';alert('Record Updated Successfully'); </script>";
				}
				else{
					echo "<script>window.location.href='section.php';alert('Record Not updated'); </script>";
				}				
			break;
			case 'delete_designation':
			
				if(isset($_POST['hidden_id_delete'])){
						if (delete_designation($_POST['hidden_id_delete'])) {
						
						echo "<script>window.location.href='designation.php';alert('Record Deleted Successfully');</script>";
				}else {
						echo "<script>window.location.href='designation.php';alert('Record Not Deleted');</script>";
					}			
				}
			break;	 
			
			case 'delete_section':
			
				if(isset($_POST['hidden_id_delete'])){
						if (delete_section($_POST['hidden_id_delete'])) {
						
						echo "<script>window.location.href='section.php';alert('Section Deleted Successfully');</script>";
				}else {
						echo "<script>window.location.href='section.php';alert('Section Not Deleted');</script>";
					}			
				}
			break;	 
			
			case 'add_user':
					if(check_user($_POST['emp_id'],$_POST['user_mob']))
					{
						echo "<script>window.location.href='user_reg.php';alert('User is Already Registered');</script>";
					}else{
						if (add_user($_POST['emp_id'],$_POST['user_name'],$_POST['section'],$_POST['user_dept'],$_POST['user_desig'],$_POST['user_mob'],$_POST['user_email'],$_POST['user_aadhar'],$_POST['user_office'],$_POST['user_station'],$_POST['login_name'],$_POST['login_pass']))
						{
						echo "<script>window.location.href='user_reg.php';alert('User Created Successfully');</script>";
						}
						else{
						echo "<script>window.location.href='user_reg.php';alert('User Not Created');</script>";
						}
					}
					
						
			break;
			
			case 'forward_grievance':
					if (forward_grievance($_POST['griv_ref_no'],$_POST['emp_id'],$_POST['hidden_id'],$_POST['auth'],$_POST['remark'],$_POST['action']))
					{
					echo "<script>window.location.href='gri_comp.php';alert('Grievance Forwarded Successfully');</script>";
					}//window.location.href='gri_comp.php';
					else{
					echo "<script>window.location.href='gri_comp.php';alert('Grievance Not Forwarded');</script>";
					}
						
			break;
			case 'return_back_action':
					if (return_back_action($_POST['griv_ref_no'],$_POST['emp_id'],$_POST['hidden_id'],$_POST['auth'],$_POST['remark'],$_POST['action']))
					{
					echo "<script>window.location.href='returned_back.php';alert('Grievance Returned Successfully');</script>";
					}//window.location.href='returned_back.php';
					else{
					echo "<script>window.location.href='returned_back.php';alert('Grievance Not Returned');</script>";
					}
						
			break;
			case 'active_user':
				if(active_user($_POST['hidden_active'])){
					echo "<script>window.location.href='user_list.php';alert('User Activated Successfully');</script>";
				}else{
					echo "<script>window.location.href='user_list.php';alert('User Activation Failed');</script>";
				}
			
			break;
			case 'deactive_user':
				if(deactive_user($_POST['hidden_deactive'])){
					echo "<script>window.location.href='user_list.php';alert('User Deactivated Successfully');</script>";
				}else{
					echo "<script>window.location.href='user_list.php';alert('User Deactivation Failed');</script>";
				}
			break;
			case 'update_user_modal':
				if(update_user_modal($_POST['emp_id'],$_POST['user_name'],$_POST['section'],$_POST['user_dept'],$_POST['user_desig'],$_POST['user_mob'],$_POST['user_email'],$_POST['user_aadhar'],$_POST['user_office'],$_POST['user_station'],$_POST['hidden_update'])){
					echo "<script>window.location.href='user_list.php';alert('User Updated Successfully');</script>";
				}else{
					echo "<script>window.location.href='user_list.php';alert('User Updation Failed');</script>";
				}
			break;
			case 'add_section':
				if(add_section($_POST['sec_name'],$_POST['sec_desc'])){
					echo "<script>window.location.href='section.php';alert('Section Added Successfully');</script>";
				}else{
					echo "<script>window.location.href='section.php';alert('Adding section Failed');</script>";
				}
			break;
				//office categoary 
			case 'add_office':
				if (add_office($_POST['off_cat_name'],$_POST['off_cat_desc']))
					{
					echo "<script>window.location.href='office_cat.php';alert('Category Added Successfully'); </script>";
					}
					else{
					echo "<script>window.location.href='office_cat.php';alert('Category Not Inserted'); </script>";
					}
			break;
				
				case 'edit_office':
				
				if(edit_office($_POST['md_off_name'],$_POST['md_off_desc'],$_POST['hidden_id']))
				{
					echo "<script>window.location.href='office_cat.php';alert('Record Updated Successfully'); </script>";
				}
				else{
					echo "<script>window.location.href='office_cat.php';alert('Record Not updated'); </script>";
				}				
			break;
			case 'delete_office':
			
				if(isset($_POST['hidden_id_delete'])){
						if (delete_office($_POST['hidden_id_delete'])) {
						
						echo "<script>window.location.href='office_cat.php';alert('Record Deleted Successfully');</script>";
				}else {
						echo "<script>window.location.href='office_cat.php';alert('Record Not Deleted');</script>";
					}			
				}
			break;
			
				
	}
	
}
?>
