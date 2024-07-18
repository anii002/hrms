<?php
// session_start();
function add_employee($emp_type, $emp_id, $emp_name, $emp_dept, $emp_desig, $emp_mob, $emp_email, $emp_aadhar, $emp_address1, $emp_address2, $emp_state, $emp_city, $office_emp_address1, $office_emp_address2, $office_emp_state, $office_emp_city, $emp_pincode, $office_emp_pincode)
{
	global $db_egr, $db_common;
	$sql = "INSERT INTO `employee`(emp_type,emp_id,emp_name,emp_dept,emp_desig,emp_mob,emp_email,emp_aadhar,emp_address1,emp_address2,emp_state,emp_city,office_emp_address1,office_emp_address2,office_emp_state,office_emp_city,emp_pincode,office_emp_pincode,created_date,delete_status) VALUES('" . $emp_type . "','" . $emp_id . "','" . $emp_name . "','" . $emp_dept . "','" . $emp_desig . "','" . $emp_mob . "','" . $emp_email . "','" . $emp_aadhar . "','" . $emp_address1 . "','" . $emp_address2 . "','" . $emp_state . "','" . $emp_city . "','" . $office_emp_address1 . "','" . $office_emp_address2 . "','" . $office_emp_state . "','" . $office_emp_city . "','" . $emp_pincode . "','" . $office_emp_pincode . "',Now(),1)";
	/**echo "INSERT INTO `employee`(emp_type,emp_id,emp_name,emp_dept,emp_desig,emp_mob,emp_email,emp_aadhar,emp_address1,emp_address2,emp_state,emp_city,office_emp_address1,office_emp_address2,office_emp_state,office_emp_city,emp_pincode,office_emp_pincode,created_date,delete_status) VALUES('".$emp_type."','".$emp_id."','".$emp_name."','".$emp_dept."','".$emp_desig."','".$emp_mob."','".$emp_email."','".$emp_aadhar."','".$emp_address1."','".$emp_address2."','".$emp_state."','".$emp_city."','".$office_emp_address1."','".$office_emp_address2."','".$office_emp_state."','".$office_emp_city."','".$emp_pincode."','".$office_emp_pincode."',Now(),1)".mysqli_error();*/
	$query = mysqli_query($db_egr, $sql) or trigger_error("Query Failed: " . mysqli_error($db_egr));
	if ($query) {
		return true;
	} else {
		return false;
	}
}

function update_employee($up_emp_type, $up_emp_id, $up_emp_name, $up_emp_dept, $up_emp_desig, $up_emp_mob, $up_emp_email, $up_emp_aadhar, $up_emp_address1, $up_emp_address2, $up_emp_state, $up_emp_city, $up_office_emp_address1, $up_office_emp_address2, $up_office_emp_state, $up_office_emp_city, $up_emp_pincode, $up_office_emp_pincode, $update_employee_hidden_id)
{
	global $db_egr, $db_common;
	$sql = "UPDATE `employee` SET empType='" . $up_emp_type . "',emp_id='" . $up_emp_id . "',emp_name='" . $up_emp_name . "',emp_dept='" . $up_emp_dept . "',emp_desig='" . $up_emp_desig . "',emp_mob='" . $up_emp_mob . "',emp_email='" . $up_emp_email . "',emp_aadhar='" . $up_emp_aadhar . "',emp_address1='" . $up_emp_address1 . "',emp_address2='" . $up_emp_address2 . "',emp_state='" . $up_emp_state . "',emp_city='" . $up_emp_city . "',office_emp_address1='" . $up_office_emp_address1 . "',office_emp_address2='" . $up_office_emp_address2 . "',office_emp_state='" . $up_office_emp_state . "',office_emp_city='" . $up_office_emp_city . "',emp_pincode='" . $up_emp_pincode . "',office_emp_pincode='" . $up_office_emp_pincode . "' WHERE id= '" . $update_employee_hidden_id . "' ";

	//echo "UPDATE `employee` SET emp_type='".$up_emp_type."',emp_id='".$up_emp_id."',emp_name='".$up_emp_name."',emp_dept='".$up_emp_dept."',emp_desig='".$up_emp_desig."',emp_mob='".$up_emp_mob."',emp_email='".$up_emp_email."',emp_aadhar='".$up_emp_aadhar."',emp_address1='".$up_emp_address1."',emp_address2='".$up_emp_address2."',emp_state='".$up_emp_state."',emp_city='".$up_emp_city."',office_emp_address1='".$up_office_emp_address1."',office_emp_address2='".$up_office_emp_address2."',office_emp_state='".$up_office_emp_state."',office_emp_city='".$up_office_emp_city."',emp_pincode='".$up_emp_pincode."',office_emp_pincode='".$up_office_emp_pincode."' WHERE id= '".$update_employee_hidden_id."'".mysqli_error();
	$query = mysqli_query($db_egr, $sql) or trigger_error("Query Failed: " . mysqli_error($db_egr));
	if ($query) {
		return true;
	} else {
		return false;
	}
}
function delete_employee($id)
{
	global $db_egr, $db_common;
	if (!empty($id)) {
		$sql = "DELETE from `employee` WHERE `id`='" . $id . "'  ";
		$query = mysqli_query($db_egr, $sql) or trigger_error("Query Failed: " . mysqli_error($db_egr));
		if ($query) {
			return true;
		}
	}
	return false;
}
function add_category($cat_name, $cat_desc)
{
	global $db_egr;
	if (!empty($cat_name) && !empty($cat_desc)) {

		$sql_query = "select * from category where `cat_name` = '$cat_name'";
		$sql_result = mysqli_query($db_egr, $sql_query) or trigger_error("Query Failed: " . mysqli_error($db_egr));
		$sql_fetch = mysqli_num_rows($sql_result);
		if ($sql_fetch == 0) {
			$sql_inner = "insert into category(cat_name,cat_desc) values('$cat_name','$cat_desc')";
			$sql_fire = mysqli_query($db_egr, $sql_inner) or trigger_error("Query Failed: " . mysqli_error($db_egr));
			//echo mysqli_error();
			if ($sql_fire) {
				return true;
			}
		}
		return false;
	}
}
function add_designation($des_name, $deptid)
{
	global $db_common;
	if (!empty($des_name) && !empty($deptid)) {

		$sql_query = "select * from designations where `DESIGLONGDESC` = '$des_name'";
		$sql_result = mysqli_query($db_common, $sql_query) or trigger_error("Query Failed: " . mysqli_error($db_common));
		$sql_fetch = mysqli_num_rows($sql_result);
		if ($sql_fetch == 0) {
			$sql_inner = "insert into tbl_designation(designation,dept_id) values('$des_name','$deptid')";
			$sql_fire = mysqli_query($db_common, $sql_inner) or trigger_error("Query Failed: " . mysqli_error($db_common));
			//echo mysqli_error();
			if ($sql_fire) {
				return true;
			}
		}
		return false;
	}
}
function edit_category($cat_name, $cat_desc, $hidden)
{
	global $db_egr;
	$sql_inner = "update `category` set cat_name='$cat_name', cat_desc='$cat_desc' where cat_id=$hidden";
	$sql_fire = mysqli_query($db_egr, $sql_inner) or trigger_error("Query Failed: " . mysqli_error($db_egr));
	//echo mysqli_error();
	if ($sql_fire) {
		return true;
	}
	return false;
}

function delete_category($hidden_id_delete)
{
	global $db_egr;
	$sql_delete = "delete from `category` where cat_id=$hidden_id_delete";
	$sql_fetch = mysqli_query($db_egr, $sql_delete) or trigger_error("Query Failed: " . mysqli_error($db_egr));
	//echo $sql_delete;
	//echo mysqli_error();
	if ($sql_fetch) {
		return true;
	} else {
		return false;
	}
}
function delete_section($hidden_id_delete)
{
	global $db_egr;
	$sql_delete = "delete from `tbl_section` where sec_id=$hidden_id_delete";
	$sql_fetch = mysqli_query($db_egr, $sql_delete) or trigger_error("Query Failed: " . mysqli_error($db_egr));
	//echo $sql_delete;
	//echo mysqli_error();
	if ($sql_fetch) {
		return true;
	} else {
		return false;
	}
}
function delete_griv($hidden_id_delete)
{
	global $db_egr;
	$sql_delete = "delete from `tbl_grievance` where id='$hidden_id_delete'";
	$sql_fetch = mysqli_query($db_egr, $sql_delete) or trigger_error("Query Failed: " . mysqli_error($db_egr));
	//echo $sql_delete;
	//echo mysqli_error();
	if ($sql_fetch) {
		return true;
	} else {
		return false;
	}
}
function edit_designation($des_name, $updatedeptid, $hidden)
{
	global $db_egr;
	$sql_inner = "update `tbl_designation` set designation='$des_name', dept_id='$updatedeptid' where id=$hidden";
	$sql_fire = mysqli_query($db_egr,$sql_inner) or trigger_error("Query Failed: " . mysqli_error($db_egr));
	//echo mysqli_error();
	if ($sql_fire) {
		return true;
	}
	return false;
}
function edit_section($sec_name, $sec_desc, $hidden, $is_BA_section)
{
	// echo $is_BA_section;
	global $db_egr;
	$sql_inner = "update `tbl_section` set sec_name='$sec_name', sec_desc='$sec_desc',is_branch_admin='$is_BA_section' where sec_id=$hidden";
	$sql_fire = mysqli_query($db_egr,$sql_inner) or trigger_error("Query Failed: " . mysqli_error($db_egr));
	//echo mysqli_error();
	if ($sql_fire) {
		return true;
	}
	return false;
}

function delete_designation($hidden_id_delete)
{
	global $db_egr;
	$sql_delete = "delete from `tbl_designation` where id=$hidden_id_delete";
	$sql_fetch = mysqli_query($db_egr,$sql_delete) or trigger_error("Query Failed: " . mysqli_error($db_egr));
	//echo $sql_delete;
	//echo mysqli_error();
	if ($sql_fetch) {
		return true;
	} else {
		return false;
	}
}
function check_user($emp_id, $user_mob)
{
global $db_egr;
	$fetch_before = mysqli_query($db_egr,"select * from tbl_user where emp_id='$emp_id' and user_mob='$user_mob'");
	$fetch_result = mysqli_num_rows($fetch_before);
	if ($fetch_result > 0) {
		return true;
	}
}
function check_handicap($emp_id)
{
	global $db_common;
	$fetch_before = mysqli_query($db_common, "select handicap_status from register_user where emp_no ='$emp_id'");
	$result = mysqli_fetch_array($fetch_before);

	if ($result['handicap_status'] == 'Y') {
		return true;
	} else {
		return false;
	}
}
function check_sex($emp_id)
{
	global $db_common;
	$fetch_before = mysqli_query($db_common, "select gender from register_user where emp_no ='$emp_id'");
	$result = mysqli_fetch_array($fetch_before);
	if ($result['gender'] == 'F') {
		return true;
	} else {
		return false;
	}
}
function check_community($emp_id)
{
	global $db_common;
	$fetch_before = mysqli_query($db_common, "select community from register_user where emp_no ='$emp_id'");
	$result = mysqli_fetch_array($fetch_before);

	if ($result['community'] == 'SC' || $result['community'] == 'ST') {
		return true;
	} else {
		return false;
	}
}


function add_user($emp_id, $user_name, $section, $user_dept, $user_desig, $user_mob, $user_email, $user_aadhar, $user_office, $user_station, $login_name, $login_pass, $role)
{
	global $db_egr, $db_common;
	$sql_user_permission = "SELECT pf_num,e_grievance FROM `user_permission` where pf_num='$emp_id'";
	$rst_user_permission = mysqli_query($db_common, $sql_user_permission);
	if (mysqli_num_rows($rst_user_permission) > 0) {
		$user_permission_roles = array();
		while ($rw_user_permission = mysqli_fetch_array($rst_user_permission)) {
			extract($rw_user_permission);
			$user_permission_roles = explode(',', $e_grievance);
			// echo "User Persmission ROles";
			// var_dump($user_permission_roles);
			$role_final = explode(',', $role);
			// echo "role1";
			// var_dump($role_final);
			if (is_array($role_final)) {
				// echo "working";
				foreach ($role_final as  $value) {
					if (!in_array($value, $user_permission_roles)) {
						array_push($user_permission_roles, $value);
					}
				}
			} else {
				if (!in_array($role, $user_permission_roles)) {
					array_push($user_permission_roles, $role);
				}
			}
		}
		// var_dump($user_permission_roles);
		array_push($user_permission_roles, '4');
		$update_user_permission = implode(',', $user_permission_roles);
		$role = implode(",", $role_final);
		$sql_update_permission = "UPDATE `user_permission` SET `e_grievance`='$update_user_permission' WHERE `pf_num`='$emp_id' ";
		if (mysqli_query($db_common, $sql_update_permission)) {
			$sql_user = "insert into tbl_user(emp_id,user_name,section,user_dept,user_desg,user_mob,user_email,user_aadhar,user_office,user_station,username,password,role,status) values('$emp_id','$user_name','$section','$user_dept','$user_desig','$user_mob','$user_email','$user_aadhar','$user_office','$user_station','$login_name','$login_pass','$role','active')";
			$insert_user = mysqli_query($db_egr, $sql_user) or trigger_error("Query Failed: " . mysqli_error($db_egr));
			if ($insert_user) {
				return true;
			} else {
				return false;
			}
		}
	} else {
		$role_final = explode(",", $role);
		array_push($role_final, '4');
		$role_common = implode(",", $role_final);
		$sql_user_permission = "INSERT INTO `user_permission`(`pf_num`,`e_grievance`) VALUES('$emp_id','$role_common')";
		$insert_permission = mysqli_query($db_common, $sql_user_permission);
		$sql_user = "insert into tbl_user(emp_id,user_name,section,user_dept,user_desg,user_mob,user_email,user_aadhar,user_office,user_station,username,password,role,status) values('$emp_id','$user_name','$section','$user_dept','$user_desig','$user_mob','$user_email','$user_aadhar','$user_office','$user_station','$login_name','$login_pass','$role','active')";
		$insert_user = mysqli_query($db_egr, $sql_user) or trigger_error("Query Failed: " . mysqli_error($db_common));
		if ($insert_user && $insert_permission) {
			return true;
		} else {
			return false;
		}
	}
}
/* old one
function add_user($emp_id, $user_name, $section, $user_dept, $user_desig, $user_mob, $user_email, $user_aadhar, $user_office, $user_station, $login_name, $login_pass, $role)
{
	global $db_egr, $db_common;

	$sql_user_permission = "SELECT pf_num,e_grievance FROM `user_permission` where pf_num='$emp_id'";
	$rst_user_permission = mysqli_query($sql_user_permission, $db_common);
	if (mysqli_num_rows($rst_user_permission) > 0) {
		$user_permission_roles = array();
		while ($rw_user_permission = mysqli_fetch_array($rst_user_permission)) {
			extract($rw_user_permission);
			$user_permission_roles = explode(',', $e_grievance);
			foreach ($role as  $value) {
				if (!in_array($value, $user_permission_roles)) {
					array_push($user_permission_roles, $value);
				}
			}
		}
		$update_user_permission = implode(',', $user_permission_roles);
// 		while ($rw_user_permission = mysqli_fetch_array($rst_user_permission)) {
// 			extract($rw_user_permission);
// 			$user_permission_roles = explode(',', $e_grievance);
// 			//print_r($user_permission_roles);
// 			$usertype_array = explode(',', $usertype);
// 			// print_r($usertype_array);
// 			foreach ($usertype_array as $value) {
// 				if (!in_array($value, $user_permission_roles)) {
// 					array_push($user_permission_roles, $value);
// 				}
// 			}
// 			$user_permission_final = array_values(array_intersect($usertype_array, $user_permission_roles));
// 			array_push($user_permission_final, '4');
// 		}

        while ($rw_user_permission = mysqli_fetch_array($rst_user_permission)) {
			extract($rw_user_permission);
			$user_permission_roles = explode(',', $e_grievance);
			// print_r($user_permission_roles);
			$usertype_array = explode(',', $usertype);
			// print_r($usertype_array);
			foreach ($usertype_array as $value) {
				if (!in_array($value, $user_permission_roles)) {
					array_push($user_permission_roles, $value);
				}
			}
			$user_permission_final = array_values(array_intersect($usertype_array, $user_permission_roles));
			array_push($user_permission_final, '4');
		}
		$update_user_permission = implode(',', $user_permission_final);
		$sql_update_permission = "UPDATE `user_permission` SET `e_grievance`='$update_user_permission' WHERE `pf_num`='$emp_id' ";
		if (mysqli_query($sql_update_permission, $db_common)) {
			$sql_user = "insert into tbl_user(emp_id,user_name,section,user_dept,user_desg,user_mob,user_email,user_aadhar,user_office,user_station,username,password,role,status) values('$emp_id','$user_name','$section','$user_dept','$user_desig','$user_mob','$user_email','$user_aadhar','$user_office','$user_station','$login_name','$login_pass','$role','active')";
			$insert_user = mysqli_query($sql_user, $db_egr) or trigger_error("Query Failed: " . mysqli_error());
			if ($insert_user) {
				return true;
			} else {
				return false;
			}
		}
	} else {
		$sql_user_permission = "INSERT INTO `user_permission`(`pf_num`,`e_grievance`) VALUES('$emp_id','$role')";
		$insert_permission = mysqli_query($sql_user_permission, $db_common);
		$sql_user = "insert into tbl_user(emp_id,user_name,section,user_dept,user_desg,user_mob,user_email,user_aadhar,user_office,user_station,username,password,role,status) values('$emp_id','$user_name','$section','$user_dept','$user_desig','$user_mob','$user_email','$user_aadhar','$user_office','$user_station','$login_name','$login_pass','$role','active')";
		$insert_user = mysqli_query($sql_user, $db_egr) or trigger_error("Query Failed: " . mysqli_error());
		if ($insert_user && $insert_permission) {
			return true;
		} else {
			return false;
		}
	}
}*/
function add_welfare($emp_id, $user_name, $section, $user_dept, $user_desig, $user_mob, $user_email, $user_aadhar, $user_office, $user_station, $login_name, $login_pass)
{
	global $db_egr;
	$sql_user = "insert into tbl_user(emp_id,user_name,section,user_dept,user_desg,user_mob,user_email,user_aadhar,user_office,user_station,username,password,role,status) values('$emp_id','$user_name','$section','$user_dept','$user_desig','$user_mob','$user_email','$user_aadhar','$user_office','$user_station','$login_name','$login_pass','welfare','active')";
	$insert_user = mysqli_query($db_egr, $sql_user) or trigger_error("Query Failed: " . mysqli_error($db_egr));
	if ($insert_user) {
		return true;
	} else {
		return false;
	}
}
// upload image on main admin side
function forward_grievance($name_array, $tmp_name_array, $griv_ref_no, $emp_id, $hidden_id, $auth, $remark, $action, $section)
{
	global $db_egr, $db_common;
	$_remark = mysqli_real_escape_string($db_egr, $remark);
	if ($action == "3") {
		$status = "4";
	} else if ($action == "1") {
		$status = "2";
	} else {
		$status = "3";
	}
	// $sql_query = "insert into tbl_grievance_forward(griv_ref_no,emp_id,user_id,user_id_forwarded,forwarded_date,remark,status,admin_action) values('$griv_ref_no','$emp_id','$hidden_id','$auth',NOW(),'$_remark','$status','$action')";

	if (!empty($name_array)) {
		$sql_count = mysqli_query($db_egr, "SELECT count(*) as count FROM doc where griv_ref_no='$griv_ref_no'") or die(mysqli_error($db_egr));
		$fetch_count = mysqli_fetch_array($sql_count);
		// print_r($fetch_count);
		$count = $fetch_count['count'];
		$count++;
		$folder_name = "admin_upload/";
		if (!file_exists($folder_name)) {
			mkdir($folder_name, 0777);
		}
		for ($i = 0; $i < count($tmp_name_array); $i++) {
			$temp = explode(".", $name_array[$i]);
			$newfilename = rand(10000, 999999) . '.' . end($temp);
			$file_ext = strtolower(end($temp));
			$expensions = array("pdf", "doc", "docx", "jpg", "jpeg", "png", "txt");
			if (in_array($file_ext, $expensions) == false) {
				// $errors = "Extension not allowed, please choose only pdf file.";
				return false;
			}
			// $sql="insert into doc(griv_ref_no,doc_path,upload_date,uploaded_by,count) values('$griv_ref_no','$newfilename',NOW(),'$hidden_id','$last_doc')";
			$current_date = date("Y-m-d H:i:s");
			$sql = "insert into doc(griv_ref_no,doc_path,upload_date,uploaded_by,count) values('$griv_ref_no','$newfilename','$current_date','$hidden_id','$count')";
			$sql_img = mysqli_query($db_egr, $sql) or die(mysqli_error($db_egr));
			$last_doc = mysqli_insert_id($db_egr);
			move_uploaded_file($tmp_name_array[$i], $folder_name . $newfilename);
		}
	} else {
		$last_doc = "";
		//$optradio = "no";
	}
	// echo "last doc=>" . $last_doc;
	//echo $sql_query.mysqli_error();
	$current_date = date("Y-m-d H:i:s");
	$sql_query = "insert into tbl_grievance_forward(griv_ref_no,emp_id,user_id,user_id_forwarded,forwarded_date,remark,status,admin_action,doc_id) values('$griv_ref_no','$emp_id','$hidden_id','$auth','$current_date','$_remark','$status','$action','$last_doc')";
	$fire_query = mysqli_query($db_egr, $sql_query) or trigger_error("Query Failed: " . mysqli_error($db_egr));
	if ($fire_query) {
		$status_update = mysqli_query($db_egr, "update tbl_grievance set status='$status',section_id='$section' where gri_ref_no=$griv_ref_no", $db_egr);
		if ($action == 3) {
			$sql = "SELECT * from register_user where emp_no ='" . $emp_id . "'";
			$result = mysqli_query($db_common, $sql);
			while ($dat = mysqli_fetch_assoc($result)) {
				$mob = $dat['mobile'];
			}
			$message = "Your e-Grievance closed successfully with '" . $griv_ref_no . "' reference no.";
			if (SendSMS($mob, $message)) {
				echo "<script>alert('SMS send successfully.');</script>";
			} else {
				echo "<script>alert('SMS send failed.');</script>";
			}
		}
		return true;
	} else {
		return false;
	}
}


function forward_grievance_wel($name_array, $tmp_name_array, $griv_ref_no, $emp_id, $hidden_id, $auth, $remark, $action, $section)
{
	global $db_common, $db_egr;
	$_remark = mysqli_real_escape_string($db_egr, $remark);
	if ($action == "3") {
		$status = "4";
	} else if ($action == "1") {
		$status = "2";
	} else {
		$status = "3";
	}
	$last_doc = "";
	if (!empty($name_array)) {
		$sql_count = mysqli_query($db_egr, "SELECT count(*) as count FROM doc where griv_ref_no='$griv_ref_no'") or die(mysqli_error($db_egr));
		$fetch_count = mysqli_fetch_array($sql_count);
		// print_r($fetch_count);
		$count = $fetch_count['count'];
		$count++;
		$folder_name = "admin_upload/";
		for ($i = 0; $i < count($tmp_name_array); $i++) {
			$temp = explode(".", $name_array[$i]);
			$newfilename = rand(10000, 999999) . '.' . end($temp);
			// $sql="insert into doc(griv_ref_no,doc_path,upload_date,uploaded_by,count) values('$griv_ref_no','$newfilename',NOW(),'$hidden_id','$last_doc')";
			$file_ext = strtolower(end($temp));
			$expensions = array("pdf", "doc", "docx", "jpg", "jpeg", "png", "txt");
			if (in_array($file_ext, $expensions) == false) {
				// $errors = "Extension not allowed, please choose only pdf file.";
				return false;
			}
			$current_date = date("Y-m-d H:i:s");
			$sql = "insert into doc(griv_ref_no,doc_path,upload_date,uploaded_by,count) values('$griv_ref_no','$newfilename','$current_date','$hidden_id','$count')";
			$sql_img = mysqli_query($db_egr, $sql) or die(mysqli_error($db_egr));
			$last_doc = mysqli_insert_id($db_egr);
			move_uploaded_file($tmp_name_array[$i], $folder_name . $newfilename);
		}
	}
	// $sql_query = "insert into tbl_grievance_forward(griv_ref_no,emp_id,user_id,user_id_forwarded,forwarded_date,remark,status,admin_action) values('$griv_ref_no','$emp_id','$hidden_id','$auth',NOW(),'$_remark','$status','$action')";
	$current_date = date("Y-m-d H:i:s");
	$sql_query = "insert into tbl_grievance_forward(griv_ref_no,emp_id,user_id,user_id_forwarded,forwarded_date,remark,status,admin_action,doc_id) values('$griv_ref_no','$emp_id','$hidden_id','$auth','$current_date','$_remark','$status','$action','$last_doc')";
	$fire_query = mysqli_query($db_egr, $sql_query) or trigger_error("Query Failed: " . mysqli_error($db_egr));
	//echo $sql_query.mysqli_error();
	// if ($fire_query) {
	if ($action == 1) {
		$update_sql = "update tbl_grievance set status='$status',section_id='$section' where gri_ref_no='$griv_ref_no'";
	} else if ($action == 3) {
		$update_sql = "update tbl_grievance set status='$status',closedby='$hidden_id' where gri_ref_no='$griv_ref_no'";
	} else {
		$update_sql = "update tbl_grievance set status='$status' where gri_ref_no='$griv_ref_no'";
	}

	$status_update = mysqli_query($db_egr, $update_sql);
	//echo"update tbl_grievance set status='$status' where gri_ref_no='$griv_ref_no'".mysqli_error();
	if ($action == 3) {
		$sql = "SELECT * from register_user where emp_no ='" . $hidden_id . "'";
		$result = mysqli_query($db_common, $sql);
		while ($dat = mysqli_fetch_assoc($result)) {
			$mob = $dat['mobile'];
		}
		$message = "Your e-Grievance closed successfully with '" . $griv_ref_no . "' reference no.";
		if (SendSMS($mob, $message)) {
			echo "<script>alert('SMS send successfully.');</script>";
		} else {
			echo "<script>alert('SMS send failed.');</script>";
		}
	}
	if ($status_update) {
		return true;
	} else {
		return false;
	}
}

function return_back_action($name_array, $tmp_name_array, $griv_ref_no, $emp_id, $hidden_id, $auth, $remark, $action, $emp_mobile, $section)
{
	// var_dump($name_array, $tmp_name_array, $griv_ref_no, $emp_id, $hidden_id, $auth, $remark, $action, $emp_mobile);
	global $db_egr, $db_common;
	$_remark = mysqli_real_escape_string($db_egr, $remark);
	if ($action == "3") {
		$status = "4";
	} else {
		$status = "2";
	}
	$last_doc = "";
	if (!empty($name_array)) {
		$sql_count = mysqli_query($db_egr, "SELECT count(*) as count FROM doc where griv_ref_no='$griv_ref_no'") or die(mysqli_error($db_egr));
		$fetch_count = mysqli_fetch_array($sql_count);
		// print_r($fetch_count);
		$count = $fetch_count['count'];
		$count++;
		$folder_name = "admin_upload/";
		if (!file_exists($folder_name)) {
			mkdir($folder_name, 0777);
		}
		for ($i = 0; $i < count($tmp_name_array); $i++) {
			$temp = explode(".", $name_array[$i]);
			$newfilename = rand(1000, 99999) . '.' . end($temp);
			$file_ext = strtolower(end($temp));
			$expensions = array("pdf", "doc", "docx", "jpg", "jpeg", "png", "txt");
			if (in_array($file_ext, $expensions) == false) {
				// $errors = "Extension not allowed, please choose only pdf file.";
				return false;
			}
			// $sql="insert into doc(griv_ref_no,doc_path,upload_date,uploaded_by,count) values('$griv_ref_no','$newfilename',NOW(),'$hidden_id','$last_id')";
			$current_date = date("Y-m-d H:i:s");
			$sql = "insert into doc(griv_ref_no,doc_path,upload_date,uploaded_by,count) values('$griv_ref_no','$newfilename','$current_date','$hidden_id','$count')";
			$sql_img = mysqli_query($db_egr, $sql) or die(mysqli_error($db_egr));
			$last_doc = mysqli_insert_id($db_egr);
			//echo "insert into doc(griv_ref_no,doc_path,upload_date,uploaded_by) values('$gri_ref_no','$folder_name.$newfilename',NOW(),'$hidden_id')".mysqli_error();
			move_uploaded_file($tmp_name_array[$i], $folder_name . $newfilename);
		}
	}
	$current_date = date("Y-m-d H:i:s");
	$sql_query = "insert into tbl_grievance_forward(griv_ref_no,emp_id,user_id,user_id_forwarded,forwarded_date,remark,status,admin_action,doc_id) values('$griv_ref_no','$emp_id','$hidden_id','$auth','$current_date','$_remark','$status','$action','$last_doc')";
	// $sql_query = "insert into tbl_grievance_forward(griv_ref_no,emp_id,user_id,user_id_forwarded,forwarded_date,remark,status,admin_action) values('$griv_ref_no','$emp_id','$hidden_id','$auth',NOW(),'$_remark','$status','$action')";
	$fire_query = mysqli_query($db_egr, $sql_query) or trigger_error("Query Failed: " . mysqli_error($db_egr));
	$last_id = mysqli_insert_id($db_egr);


	$set_zero = mysqli_query($db_egr, "update tbl_grievance_forward set status='0' where griv_ref_no='$griv_ref_no' and id < $last_id", $db_egr);
	//echo $set_zero;
	if ($action == 1) {
		$sql_inner = "update tbl_grievance set status='$status',section_id='$section' where gri_ref_no='$griv_ref_no'";
	} else if ($action == 3) {
		$sql_inner = "update tbl_grievance set status='$status',closedby='$hidden_id'  where gri_ref_no='$griv_ref_no'";
	} else {
		if (isBA() || isBo()) {
			$sql_inner = "update tbl_grievance set status='$status',section_id='$section'  where gri_ref_no='$griv_ref_no'";
		}
	}
	$status_update = mysqli_query($db_egr, $sql_inner);
	if ($status_update) {
		if ($action == 3) {
			$message = "Your e-Grievance closed successfully with '" . $griv_ref_no . "' reference no.";
			if (SendSMS($emp_mobile, $message)) {
				echo "<script>alert('SMS send successfully.');</script>";
			} else {
				echo "<script>alert('SMS send failed.');</script>";
			}
		}
		return true;
	} else {
		return false;
	}
}
function active_user($hidden_active)
{
	global $db_egr;
	$sql_st = mysqli_query($db_egr, "update tbl_user set status='active' where user_id='$hidden_active'", $db_egr);
	if ($sql_st) {
		return true;
	} else {
		return false;
	}
}
function deactive_user($hidden_deactive)
{
	global $db_egr;
	$sql_st = mysqli_query($db_egr, "update tbl_user set status='deactive' where user_id='$hidden_deactive'", $db_egr);
	if ($sql_st) {
		return true;
	} else {
		return false;
	}
}

function get_desig($user_desg)
{
	global $db_common;
	$data = "";
	$f_desg = mysqli_query($db_common, "select * from designations where DESIGCODE='$user_desg'", $db_common);
	$desg_f = mysqli_fetch_array($f_desg);
	$data = "<option value='" . $desg_f['DESIGCODE'] . "'>" . $desg_f['DESIGLONGDESC'] . "</option>";
	$f_desg = mysqli_query($db_common, "select * from designations where id<>'$user_desg'", $db_common);
	while ($desg_f = mysqli_fetch_array($f_desg))
		$data .= "<option value='" . $desg_f['DESIGCODE'] . "'>" . $desg_f['DESIGLONGDESC'] . "</option>";
	return $data;
}
function get_section($section)
{
	global $db_egr;
	$data = "";
	$f_section = mysqli_query($db_egr, "select * from tbl_section where sec_id='$section'", $db_egr);
	$section_f = mysqli_fetch_array($f_section);
	$data = "<option value='" . $section_f['sec_id'] . "'>" . $section_f['sec_name'] . "</option>";
	$f_section = mysqli_query($db_egr, "select * from tbl_section where sec_id<>'$section'", $db_egr);
	while ($section_f = mysqli_fetch_array($f_section))
		$data .= "<option value='" . $section_f['sec_id'] . "'>" . $section_f['sec_name'] . "</option>";
	return $data;
}
function get_office($user_office)
{
	global $db_egr;
	$data = "";
	$f_off = mysqli_query($db_egr, "select * from tbl_office where office_id='$user_office'", $db_egr);
	$office_f = mysqli_fetch_array($f_off);
	$data = "<option selected value='" . $office_f['office_id'] . "'>" . $office_f['office_name'] . "</option>";
	$f_off = mysqli_query($db_egr, "select * from tbl_office where office_id<>'$user_office'", $db_egr);
	while ($office_f = mysqli_fetch_array($f_off))
		$data .= "<option value='" . $office_f['office_id'] . "'>" . $office_f['office_name'] . "</option>";
	return $data;
}
function get_section_name($section)
{
	global $db_egr;
	$f_section = mysqli_query($db_egr, "select * from tbl_section where sec_id='$section'", $db_egr);
	$section_f = mysqli_fetch_array($f_section);
	return $section_f['sec_name'];
}
function get_category_name($section)
{
	global $db_egr;
	$f_section = mysqli_query($db_egr, "select * from category where cat_id='$section'", $db_egr);
	$section_f = mysqli_fetch_array($f_section);
	return $section_f['cat_name'];
}
function get_user_name($section)
{
	global $db_egr;
	$f_section = mysqli_query($db_egr, "select user_name from tbl_user where user_id='$section'", $db_egr);
	$section_f = mysqli_fetch_array($f_section);
	return $section_f['user_name'];
}
function get_station($user_station)
{
	global $db_common;
	$data = "";
	$f_station = mysqli_query($db_common, "select * from station where stationcode='$user_station'", $db_common);
	$station_f = mysqli_fetch_array($f_station);
	$data = "<option value='" . $station_f['stationcode'] . "'>" . $station_f['stationdesc'] . "</option>";
	$f_station = mysqli_query($db_common, "select * from tbl_station where stationcode<>'$user_station'", $db_common);
	while ($station_f = mysqli_fetch_array($f_station))
		$data .= "<option value='" . $station_f['stationcode'] . "'>" . $station_f['stationdesc'] . "</option>";
	return $data;
}
function get_user_dept($dept)
{
	global $db_common;
	$data = "";
	$fetch_dept = mysqli_query($db_common, "select * from department where DEPTNO='$dept'", $db_common);
	$dept_fetch = mysqli_fetch_array($fetch_dept);
	$data = "<option value='" . $dept_fetch['DEPTNO'] . "'>" . $dept_fetch['DEPTDESC'] . "</option>";
	$fetch_dept = mysqli_query($db_common, "select * from tbl_department where DEPTNO<>'$dept'", $db_common);
	while ($dept_fetch = mysqli_fetch_array($fetch_dept))
		$data .= "<option value='" . $dept_fetch['DEPTNO'] . "'>" . $dept_fetch['DEPTDESC'] . "</option>";

	return $data;
}
function get_designation($id)
{
    global $db_common;
    $sql = "SELECT DESIGLONGDESC FROM designations WHERE DESIGCODE = ?";
    $stmt = mysqli_prepare($db_common, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $id); // Assuming DESIGCODE is a string
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $desiglongdesc);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
        return $desiglongdesc ? $desiglongdesc : "Unknown Designation"; // Return "Unknown Designation" if $desiglongdesc is null
    } else {
        return "Query Failed"; // Return an error message if the query preparation fails
    }
}

function get_designation_short($id)
{
	global $db_common;
	$sql = "select DESIGSHORTDESC from designations where DESIGCODE='" . $id . "'";
	$f_desg = mysqli_query($db_common, $sql);
	$desg_f = mysqli_fetch_array($f_desg);
	return $desg_f['DESIGSHORTDESC'];
}

function get_department($id)
{
    global $db_common;
    $sql = "SELECT DEPTDESC FROM department WHERE DEPTNO = ?";
    $stmt = mysqli_prepare($db_common, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $id); // Assuming DEPTNO is a string
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $deptdesc);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
        return $deptdesc ? $deptdesc : "Unknown Department"; // Return "Unknown Department" if $deptdesc is null
    } else {
        return "Query Failed"; // Return an error message if the query preparation fails
    }
}

function get_emptype($id)
{
    global $db_egr;
    $sql = "SELECT type FROM emp_type WHERE id = ?";
    $stmt = mysqli_prepare($db_egr, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $type);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
        return $type ? $type : "Unknown Type"; // Return "Unknown Type" if $type is null
    } else {
        return "Query Failed"; // Return an error message if the query preparation fails
    }
}


function get_forwarded_user($id)
{
	global $db_egr;
	$sql = "select user_name from tbl_user where user_id='" . $id . "'";
	$f_desg = mysqli_query($db_egr, $sql);
	$desg_f = mysqli_fetch_array($f_desg);
	return $desg_f['user_name'];
}

function get_office_text($id)
{
    global $db_egr;
    
    // Sanitize the input ID to prevent SQL injection
    $id = mysqli_real_escape_string($db_egr, $id);
    
    $sql = "SELECT * FROM tbl_office WHERE office_id = '$id'";
    $f_desg = mysqli_query($db_egr, $sql);

    if (!$f_desg) {
        // Query failed
        return "Error: " . mysqli_error($db_egr);
    }

    $desg_f = mysqli_fetch_array($f_desg);

    if (!$desg_f) {
        // No result found
        return "No office found with ID " . $id;
    }

    return $desg_f['office_name'];
}


function get_station_text($id)
{
	global $db_common;
	$sql = "select * from station where stationcode='" . $id . "'";
	$f_desg = mysqli_query($db_common, $sql);
	$desg_f = mysqli_fetch_array($f_desg);
	return $desg_f['stationdesc'];
}

function update_user_modal($emp_id, $user_name, $section, $user_dept, $user_desig, $user_mob, $user_email, $user_aadhar, $user_office, $user_station, $hidden_update, $usertype)
{
    global $db_egr, $db_common;
    $sql_user_permission = "SELECT pf_num, e_grievance FROM `user_permission` WHERE pf_num='$emp_id'";
    $rst_user_permission = mysqli_query($db_common, $sql_user_permission);
    if (mysqli_num_rows($rst_user_permission) > 0) {
        $user_permission_roles = array();
        while ($rw_user_permission = mysqli_fetch_array($rst_user_permission)) {
            extract($rw_user_permission);
            $user_permission_roles = explode(',', $e_grievance);
            $usertype_array = explode(',', $usertype);
            foreach ($usertype_array as $value) {
                if (!in_array($value, $user_permission_roles)) {
                    array_push($user_permission_roles, $value);
                }
            }
            $user_permission_final = array_values(array_intersect($usertype_array, $user_permission_roles));
            array_push($user_permission_final, '4');
        }
        $update_user_permission = implode(',', $user_permission_final);
        $sql_update_permission = "UPDATE `user_permission` SET `e_grievance`='$update_user_permission' WHERE `pf_num`='$emp_id'";
        if (mysqli_query($db_common, $sql_update_permission)) {
            $update_query = mysqli_query($db_egr, "UPDATE tbl_user SET emp_id='$emp_id', user_name='$user_name', section='$section', user_dept='$user_dept', user_desg='$user_desig', user_mob='$user_mob', user_email='$user_email', user_aadhar='$user_aadhar', user_office='$user_office', user_station='$user_station', role='$usertype' WHERE user_id='$hidden_update'");
            if ($update_query) {
                return true;
            } else {
                return false;
            }
        }
    } else {
        $role = $usertype; // Assign $role the value of $usertype
        $sql_user_permission = "INSERT INTO `user_permission`(`pf_num`, `e_grievance`) VALUES('$emp_id', '$role')";
        $insert_permission = mysqli_query($db_common, $sql_user_permission);
        $update_query = mysqli_query($db_egr, "UPDATE tbl_user SET emp_id='$emp_id', user_name='$user_name', section='$section', user_dept='$user_dept', user_desg='$user_desig', user_mob='$user_mob', user_email='$user_email', user_aadhar='$user_aadhar', user_office='$user_office', user_station='$user_station', role='$usertype' WHERE user_id='$hidden_update'");
        if ($update_query && $insert_permission) {
            return true;
        } else {
            return false;
        }
    }
}

function add_section($sec_name, $sec_desc, $is_BA_section)
{
	global $db_egr;
	if (!empty($sec_name) && !empty($sec_desc)) {

		$sql_query = "select * from tbl_section where `sec_name` = '$sec_name'";
		$sql_result = mysqli_query($db_egr, $sql_query) or trigger_error("Query Failed: " . mysqli_error($db_egr));
		$sql_fetch = mysqli_num_rows($sql_result);

		//echo "$sql_query";

		if ($sql_fetch == 0) {
			$sql_inner = "insert into tbl_section(sec_name,sec_desc,is_branch_admin) values('$sec_name','$sec_desc','$is_BA_section')";
			$sql_fire = mysqli_query($db_egr, $sql_inner) or trigger_error("Query Failed: " . mysqli_error($db_egr));
			//echo mysqli_error();
			if ($sql_fire) {
				return true;
			}
		}
		return false;
	}
}

function add_office($off_cat_name, $off_cat_desc, $deptname)
{
	global $db_egr;
	if (!empty($off_cat_name) && !empty($off_cat_desc)) {

		$sql_query = "select * from tbl_office where `office_name` = '$off_cat_name'";
		$sql_result = mysqli_query($db_egr, $sql_query) or trigger_error("Query Failed: " . mysqli_error($db_egr));
		$sql_fetch = mysqli_num_rows($sql_result);

		//echo "$sql_query";

		if ($sql_fetch == 0) {
			$sql_inner = "insert into tbl_office(office_name,office_desc,deptname) values('$off_cat_name','$off_cat_desc','$deptname')";
			$sql_fire = mysqli_query($db_egr, $sql_inner) or trigger_error("Query Failed: " . mysqli_error($db_egr));
			//echo mysqli_error();
			if ($sql_fire) {
				return true;
			}
		}
		return false;
	}
}
function edit_office($md_off_name, $md_off_desc, $hidden, $md_off_dept)
{
	global $db_egr;
	// echo $md_off_dept;
	// echo $hidden;
	$sql_inner = "update `tbl_office` set office_name='$md_off_name', office_desc='$md_off_desc',deptname='$md_off_dept' where office_id='$hidden'";
	$sql_fire = mysqli_query($db_egr, $sql_inner) or trigger_error("Query Failed: " . mysqli_error($db_egr));
	//echo mysqli_error();
	if ($sql_fire) {
		return true;
	}
	return false;
}
function delete_office($hidden_id_delete)
{
	global $db_egr;
	$sql_delete = "delete from `tbl_office` where office_id=$hidden_id_delete";
	$sql_fetch = mysqli_query($db_egr, $sql_delete) or trigger_error("Query Failed: " . mysqli_error($db_egr));
	//echo $sql_delete;
	//echo mysqli_error();
	if ($sql_fetch) {
		return true;
	} else {
		return false;
	}
}

function get_all_department($dept_id)
{
	global $db_egr;
	$data = "";
	$query_dept = "select * from tbl_department where dept_id='$dept_id'";
	$resultset_dept = mysqli_query($db_egr,$query_dept);
	$result_dept = mysqli_fetch_array($resultset_dept);
	$data = "<option value='" . $result_dept['dept_id'] . "'>" . $result_dept['deptname'] . "</option>";
	$query_dept = "select * from tbl_department where dept_id<>'$dept_id'";
	$resultset_dept = mysqli_query($db_egr,$query_dept);
	while ($result_dept = mysqli_fetch_array($resultset_dept))
		$data .= "<option value='" . $result_dept['dept_id'] . "'>" . $result_dept['deptname'] . "</option>";
	return $data;
}

// function isBo()
// {
// 	if ($_SESSION["SESSION_ROLE"] == 3) {
// 		return true;
// 	} else {
// 		return false;
// 	}
// }
// function isBA()
// {
// 	if ($_SESSION["SESSION_ROLE"] == 5) {
// 		return true;
// 	} else {
// 		return false;
// 	}
// }
function getCurrentUser()
{
	$userid = isset($_SESSION["SESSION_ID"]) ? $_SESSION["SESSION_ID"] : null;
	return $userid;
}


function SendSMS($mobileno, $msg)
{
	// echo $mobileno;
	// echo $msg;

	$authKey = "70302AbSftnyOwtvs53d8e401";

	//Multiple mobiles numbers separated by comma
	$mobileNumber = $mobileno;

	//Sender ID,While using route4 sender id should be 6 characters long.
	$senderId = "FINSUR";

	//Your message to send, Add URL encoding here.
	// $msg = "Your TA claim for month of $mon - $y  and  amount $amt with $ref reference number has been submitted successfully.";
	// $msg = "Your TA claim with $ref reference number has been submitted successfully.";
	$message = urlencode("$msg");

	//Define route 
	$route = 4;
	//Prepare you post parameters
	$postData = array(
		'authkey' => $authKey,
		'mobiles' => $mobileNumber,
		'message' => $message,
		'sender' => $senderId,
		'route' => $route
	);

	//API URL
	$url = "http://smsindia.techmartonline.com/sendhttp.php";

	//init the resource
	$ch = curl_init();
	curl_setopt_array($ch, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_POST => true,
		CURLOPT_POSTFIELDS => $postData
		//,CURLOPT_FOLLOWLOCATION => true
	));


	//Ignore SSL certificate verification
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


	//get response
	$output = curl_exec($ch);

	//Print error if any
	if (curl_errno($ch)) {
		return ('error:' . curl_error($ch));
	}

	curl_close($ch);
	return true;
}

function getTypeName($id)
{
	global $db_egr;
	$sql = "select * from category where cat_id='$id'";
	$rstCategory = mysqli_query($db_egr, $sql);
	$category_name = "";
	if (mysqli_num_rows($rstCategory) > 0) {
		$rwCategory = mysqli_fetch_array($rstCategory);
		$category_name = $rwCategory["cat_name"];
	}
	return $category_name;
}
function getEmployeeName($id)
{
	global $db_common;
	$sql = "select * from register_user where emp_no='$id'";
	// $sql = "select * from employee where emp_id='$id'";
	$rst_employee = mysqli_query($db_common, $sql);
	$emp_name = "";
	if (mysqli_num_rows($rst_employee) > 0) {
		$rw_employee = mysqli_fetch_array($rst_employee);
		$emp_name = $rw_employee["name"];
	}
	return $emp_name;
}
function getEmployeeDesignation($id)
{
	global $db_common;
	$sql = "select * from register_user where emp_no='$id'";
	$rst_employee = mysqli_query($db_common, $sql);
	$emp_designation = "";
	if (mysqli_num_rows($rst_employee) > 0) {
		$rw_employee = mysqli_fetch_array($rst_employee);
		$emp_designation_id = $rw_employee["designation"];
		$rst_desig = mysqli_query($db_common, "select * from designations where DESIGCODE='$emp_designation_id'");
		$rw_desig = mysqli_fetch_array($rst_desig);
		$emp_designation = $rw_desig["DESIGLONGDESC"];
	}
	return $emp_designation;
}
function getSectionName($id)
{
	global $db_egr;
	$sql = "select * from tbl_section where sec_id='$id'";
	$rst_section = mysqli_query($db_egr, $sql);
	$section_name = "";
	if (mysqli_num_rows($rst_section) > 0) {
		$rw_section = mysqli_fetch_array($rst_section);
		$section_name = $rw_section["sec_name"];
	}
	return $section_name;
}
function getUsername($id)
{
	global $db_egr;
	$sql = "select * from tbl_user where user_id='$id'";
	$rst_section = mysqli_query($db_egr, $sql);
	$section_name = "";
	if (mysqli_num_rows($rst_section) > 0) {
		$rw_section = mysqli_fetch_array($rst_section);
		$section_name = $rw_section["user_name"];
	}
	return $section_name;
}
function getSectionIds($id)
{
	global $db_egr;
	$sql = "select * from tbl_user where user_id='$id'";
	$rst_section = mysqli_query($db_egr, $sql);
	$section_name = "";
	if (mysqli_num_rows($rst_section) > 0) {
		$rw_section = mysqli_fetch_array($rst_section);
		$section_name = $rw_section["section"];
	}
	return $section_name;
}

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
	// session_start();
}

// Function to check if the user is an admin
function isAdmin()
{
	if (isset($_SESSION["SESSION_ROLE"]) && $_SESSION["SESSION_ROLE"] == "admin") {
		return true;
	} else {
		return false;
	}
}


function is_valid_section($id)
{
	global $db_egr;
	if (isBA()) {
		$sql = "select * from tbl_section where sec_id='$id'";
		$rst_section = mysqli_query($db_egr, $sql);
		if (mysqli_num_rows($rst_section) > 0) {
			$rw_section = mysqli_fetch_array($rst_section);
			if ($rw_section['is_branch_admin'] > 0) {
				return true;
			} else {
				return false;
			}
		}
	} else if (isAdmin()) {
		return true;
	}
}
function is_valid_ba_section($id)
{
	global $db_egr;
	$sql = "select * from tbl_section where sec_id='$id'";
	$rst_section = mysqli_query($db_egr, $sql);
	if (mysqli_num_rows($rst_section) > 0) {
		$rw_section = mysqli_fetch_array($rst_section);
		if ($rw_section['is_branch_admin'] > 0) {
			return true;
		} else {
			return false;
		}
	}
}
function get_Cat($type)
{    //echo "<script>alert($type)</script>";
	global $db_egr;
	$fetch_cat = mysqli_query($db_egr, "select cat_name from category where cat_id='" . $type . "'");
	//  $cat_fetch=mysqli_query($fetch_cat);
	$cat_names = "";
	while ($cat_get = mysqli_fetch_assoc($fetch_cat)) {
		$cat_names = $cat_get['cat_name'];
	}
	return ($cat_names);
}

function get_type($id)
{
	global $db_egr;

	if ($id != 0) {
		$fetch_type = mysqli_query($db_egr, "SELECT type FROM emp_type WHERE id='$id'");

		if (!$fetch_type) {
			// Handle query error
			die('Error: ' . mysqli_error($db_egr));
		}

		if (mysqli_num_rows($fetch_type) > 0) {
			$f_s = mysqli_fetch_array($fetch_type);
			return $f_s['type'];
		} else {
			return "-";
		}
	} else {
		return "-";
	}
}

function get_uploaded_user($id)
{
	global $db_egr;
	$e_type = '';
	$fetch_name_sql = mysqli_query($db_egr, "select * from tbl_user where user_id='$id'");
	while ($name_fetch = mysqli_fetch_array($fetch_name_sql)) {
		$e_type = $name_fetch['user_name'];
	}
	return $e_type;
}
function get_emp_station($pf_no)
{
	global $db_common;
	$sql = "select * from register_user where emp_no='$pf_no'";
	$rst_employee = mysqli_query($db_common, $sql);
	$emp_station = "";
	if (mysqli_num_rows($rst_employee) > 0) {
		$rw_employee = mysqli_fetch_array($rst_employee);
		$station_id = $rw_employee["station"];
		$emp_station = get_station_text($station_id);
	}
	return $emp_station;
}



