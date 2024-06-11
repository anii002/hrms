<?php
session_start();
function get_designation($id)
{
	global $db_common;
	$sql = "select * from designations where DESIGCODE='" . $id . "'";
	$f_desg = mysql_query($sql, $db_common);
	$desg_f = mysql_fetch_array($f_desg);
	return $desg_f['DESIGLONGDESC'];
}

function get_department($id)
{
	global $db_common;
	$sql = "select * from department where DEPTNO='" . $id . "'";
	$f_desg = mysql_query($sql, $db_common);
	$desg_f = mysql_fetch_array($f_desg);
	return $desg_f['DEPTDESC'];
}
function get_emptype($id)
{
	global $db_egr;
	$sql = "select * from emp_type where id='" . $id . "'";
	$f_desg = mysql_query($sql, $db_egr);
	$desg_f = mysql_fetch_array($f_desg);
	return $desg_f['type'];
}

function get_office_text($id)
{
	global $db_egr;
	$sql = "select * from tbl_office where office_id='" . $id . "'";
	$f_desg = mysql_query($sql, $db_egr);
	$desg_f = mysql_fetch_array($f_desg);
	return $desg_f['office_name'];
}

function get_station_text($id)
{
	global $db_common;
	$sql = "select * from station where stationcode='" . $id . "'";
	$f_desg = mysql_query($sql, $db_common);
	$desg_f = mysql_fetch_array($f_desg);
	return $desg_f['stationdesc'];
}
function get_category_text($id)
{
	global $db_egr;
	$cat_name = "";
	$fetch_cat = mysql_query("select cat_name from category where cat_id='$id'", $db_egr);
	while ($cat_fetch = mysql_fetch_array($fetch_cat)) {
		$cat_name = $cat_fetch['cat_name'];
	}
	return $cat_name;
}
function forward_grievance($griv_ref_no, $emp_id, $hidden_id, $auth, $remark)
{
	global $db_egr;
	$_remark = mysql_real_escape_string($remark);
	// $sql_query = "insert into tbl_grievance_forward(griv_ref_no,emp_id,user_id,user_id_forwarded,forwarded_date,remark,status) values('$griv_ref_no','$emp_id','$hidden_id','$auth',NOW(),'$_remark','2')";
	$current_date = date("Y-m-d H:i:s");
	$sql_query = "insert into tbl_grievance_forward(griv_ref_no,emp_id,user_id,user_id_forwarded,forwarded_date,remark,status) values('$griv_ref_no','$emp_id','$hidden_id','$auth','$current_date','$_remark','2')";
	$fire_query = mysql_query($sql_query, $db_egr) or trigger_error("Query Failed: " . mysql_error());
	//echo $sql_query.mysql_error();
	if ($fire_query) {
		$status_update = mysql_query("update tbl_grievance set status='2' where gri_ref_no=$griv_ref_no", $db_egr);
		return true;
	} else {
		return false;
	}
}
function return_griv($griv_ref_no, $emp_id, $hidden_id, $hidden_user, $remark, $action, $name_array, $tmp_name_array, $emp_mobile)
{
	global $db_egr;
	if (isBASection_Officer()) {
		$_remark = mysql_real_escape_string($remark);
		/*if ($action == "3") {
			$status = "4";
		} else {
			$status = "2";
			$auth = getBA($section);
		}*/
		// $auth = $_SESSION["SESSION_ID"];
		if ($action == "3") {
			$auth = $emp_id;
			$status = "4";
		} else {
			$status = "2";
			$section = $_SESSION["SESSION_SECTION"];
			$auth = $hidden_user;
		}

		if (!empty($name_array)) {
			$sql_count = mysql_query("SELECT count(*) as count FROM doc where griv_ref_no='$griv_ref_no'", $db_egr) or die(mysql_error());
			$fetch_count = mysql_fetch_array($sql_count);
			// print_r($fetch_count);
			$count = $fetch_count['count'];
			$count++;
			$folder_name = "../../admin/main/admin_upload/";
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
				$current_date=date("Y-m-d H:i:s");
				$sql_img = mysql_query("insert into doc(griv_ref_no,doc_path,upload_date,uploaded_by,count) values('$griv_ref_no','$newfilename','$current_date','$hidden_id','$count')", $db_egr) or die(mysql_error());
				$last_doc = mysql_insert_id($db_egr);
				//echo "insert into doc(griv_ref_no,doc_path,upload_date,uploaded_by) values('$gri_ref_no','$folder_name.$newfilename',NOW(),'$hidden_id')".mysql_error();
				move_uploaded_file($tmp_name_array[$i], $folder_name . $newfilename);
			}
		} else {
			$last_doc = "";
		}
        $current_date = date("Y-m-d H:i:s");
		$sql_query = "insert into tbl_grievance_forward(griv_ref_no,emp_id,user_id,user_id_forwarded,forwarded_date,remark,status,admin_action,doc_id) values('$griv_ref_no','$emp_id','$hidden_id','$auth','$current_date','$_remark','$status','$action','$last_doc')";
		// $sql_query = "insert into tbl_grievance_forward(griv_ref_no,emp_id,user_id,user_id_forwarded,forwarded_date,remark,status,admin_action) values('$griv_ref_no','$emp_id','$hidden_id','$auth',NOW(),'$_remark','$status','$action')";
		$fire_query = mysql_query($sql_query, $db_egr) or trigger_error("Query Failed: " . mysql_error());
		$last_id = mysql_insert_id($db_egr);

		$set_zero = mysql_query("update tbl_grievance_forward set status='0' where griv_ref_no='$griv_ref_no' and id < $last_id", $db_egr);
		//echo $set_zero;
		if ($action == 3) {
			$sql_close = "update tbl_grievance set status='$status',closedby='$hidden_id' where gri_ref_no='$griv_ref_no'";
		} else {
			$sql_close = "update tbl_grievance set status='$status' where gri_ref_no='$griv_ref_no'";
		}
		$status_update = mysql_query($sql_close, $db_egr);

		if ($action == 3) {
			$message = "Your e-Grievance closed successfully with '" . $griv_ref_no . "' reference no.";
			if (SendSMS($emp_mobile, $message)) {
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
	} else {
		$_remark = mysql_real_escape_string($remark);
		// $sql_return = "insert into tbl_grievance_forward(griv_ref_no,emp_id,user_id,user_id_forwarded,forwarded_date,remark,status,section_action) values('$griv_ref_no','$emp_id','$hidden_id','$hidden_user',NOW(),'$_remark','3','$action')";
		$last_doc = "";
		if (!empty($name_array)) {
			$sql_count = mysql_query("SELECT count(*) as count FROM doc where griv_ref_no='$griv_ref_no'", $db_egr) or die(mysql_error());
			$fetch_count = mysql_fetch_array($sql_count);
			// print_r($fetch_count);
			$count = $fetch_count['count'];
			$count++;
			$folder_name = "../../admin/main/admin_upload/";
			if (!file_exists($folder_name)) {
				mkdir($folder_name, 0777);
				// echo "not working";
			}
			// echo $count;
			for ($i = 0; $i < count($tmp_name_array); $i++) {
				$temp = explode(".", $name_array[$i]);
				$newfilename = rand(1000, 99999) . '.' . end($temp);
				$file_ext = strtolower(end($temp));
				$expensions = array("pdf", "doc", "docx", "jpg", "jpeg", "png", "txt");
				if (in_array($file_ext, $expensions) == false) {
					// $errors = "Extension not allowed, please choose only pdf file.";
					return false;
				}
				$current_date=date("Y-m-d H:i:s");
				$sql_img = mysql_query("insert into doc(griv_ref_no,doc_path,upload_date,uploaded_by,count) values('$griv_ref_no','$newfilename','$current_date','$hidden_id','$count')", $db_egr) or die(mysql_error());
				$last_doc = mysql_insert_id($db_egr);
				//echo "insert into doc(griv_ref_no,doc_path,upload_date,uploaded_by) values('$gri_ref_no','$folder_name.$newfilename',NOW(),'$hidden_id')".mysql_error();
				move_uploaded_file($tmp_name_array[$i], $folder_name . $newfilename);
			}
		}
		// echo $last_doc;
		$current_date = date("Y-m-d H:i:s");
		if ($action == 4) {
			$hidden_user = getAdminId();
		}
		$sql_return = "insert into tbl_grievance_forward(griv_ref_no,emp_id,user_id,user_id_forwarded,forwarded_date,remark,status,section_action,doc_id) values('$griv_ref_no','$emp_id','$hidden_id','$hidden_user','$current_date','$_remark','3','$action','$last_doc')";
		$fire_return = mysql_query($sql_return, $db_egr);
		$last_id = mysql_insert_id($db_egr);

		if ($fire_return) {
			$s_update = mysql_query("update tbl_grievance_forward set status='0' where griv_ref_no='$griv_ref_no' and id < $last_id", $db_egr);
			//echo $s_update;
			$status_update = mysql_query("update tbl_grievance set status='3' where gri_ref_no=$griv_ref_no", $db_egr);
			return true;
		} else {
			return false;
		}
	}
}

function return_grivwel($griv_ref_no, $emp_id, $hidden_id, $remark, $action, $name_array, $tmp_name_array, $hidden_user_id, $emp_mobile)
{
	global $db_egr;
	if (isBASection_Officer()) {
		$_remark = mysql_real_escape_string($remark);
		if ($action == "3") {
			$auth = $emp_id;
			$status = "4";
		} else {
			$status = "2";
			$section = $_SESSION["SESSION_SECTION"];
			$auth = $hidden_user_id;
		}
		// var_dump($auth);
		$last_doc = "";
		if (!empty($name_array)) {
			$sql_count = mysql_query("SELECT count(*) as count FROM doc where griv_ref_no='$griv_ref_no'", $db_egr) or die(mysql_error());
			$fetch_count = mysql_fetch_array($sql_count);
			// print_r($fetch_count);
			$count = $fetch_count['count'];
			$count++;
			$folder_name = "../../admin/main/admin_upload/";
			for ($i = 0; $i < count($tmp_name_array); $i++) {
				$temp = explode(".", $name_array[$i]);
				$newfilename = rand(1000, 99999) . '.' . end($temp);
				// $sql="insert into doc(griv_ref_no,doc_path,upload_date,uploaded_by,count) values('$griv_ref_no','$newfilename',NOW(),'$hidden_id','$last_id')";
				$file_ext = strtolower(end($temp));
				$expensions = array("pdf", "doc", "docx", "jpg", "jpeg", "png", "txt");
				if (in_array($file_ext, $expensions) == false) {
					// $errors = "Extension not allowed, please choose only pdf file.";
					return false;
				}
				$current_date = date("Y-m-d H:i:s");
				$sql = "insert into doc(griv_ref_no,doc_path,upload_date,uploaded_by,count) values('$griv_ref_no','$newfilename','$current_date','$hidden_id','$count')";
				$sql_img = mysql_query($sql, $db_egr) or die(mysql_error());
				$last_doc = mysql_insert_id($db_egr);
				//echo "insert into doc(griv_ref_no,doc_path,upload_date,uploaded_by) values('$gri_ref_no','$folder_name.$newfilename',NOW(),'$hidden_id')".mysql_error();

				move_uploaded_file($tmp_name_array[$i], $folder_name . $newfilename);
			}
		}
		$current_date = date("Y-m-d H:i:s");
		$sql_query = "insert into tbl_grievance_forward(griv_ref_no,emp_id,user_id,user_id_forwarded,forwarded_date,remark,status,admin_action,doc_id) values('$griv_ref_no','$emp_id','$hidden_id','$auth','$current_date','$_remark','$status','$action','$last_doc')";
		// $sql_query = "insert into tbl_grievance_forward(griv_ref_no,emp_id,user_id,user_id_forwarded,forwarded_date,remark,status,admin_action) values('$griv_ref_no','$emp_id','$hidden_id','$auth',NOW(),'$_remark','$status','$action')";
		$fire_query = mysql_query($sql_query, $db_egr) or trigger_error("Query Failed: " . mysql_error());
		$last_id = mysql_insert_id($db_egr);

		$set_zero = mysql_query("update tbl_grievance_forward set status='0' where griv_ref_no='$griv_ref_no' and id < $last_id", $db_egr);
		//echo $set_zero;
		if ($action == 3) {
			$sql_close = "update tbl_grievance set status='$status',closedby='$hidden_id' where gri_ref_no='$griv_ref_no'";
		} else {
			$sql_close = "update tbl_grievance set status='$status' where gri_ref_no='$griv_ref_no'";
		}
		$status_update = mysql_query($sql_close, $db_egr);
		if ($action == 3) {
			$message = "Your e-Grievance closed successfully with '" . $griv_ref_no . "' reference no.";
			if (SendSMS($emp_mobile, $message)) {
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
	} else {
		$_remark = mysql_real_escape_string($remark);
		$number = $hidden_user_id;
		// $sql_return = "insert into tbl_grievance_forward(griv_ref_no,emp_id,user_id,user_id_forwarded,forwarded_date,remark,status,section_action) values('$griv_ref_no','$emp_id','$hidden_id','$number',NOW(),'$_remark','3','$action')";
		if (!empty($name_array)) {
			$sql_count = mysql_query("SELECT count(*) as count FROM doc where griv_ref_no='$griv_ref_no'", $db_egr) or die(mysql_error());
			$fetch_count = mysql_fetch_array($sql_count);
			// print_r($fetch_count);
			$count = $fetch_count['count'];
			$count++;
			$folder_name = "../../admin/main/admin_upload/";
			$last_doc = "";
			for ($i = 0; $i < count($tmp_name_array); $i++) {
				$temp = explode(".", $name_array[$i]);
				$newfilename = rand(1000, 99999) . '.' . end($temp);
				$file_ext = strtolower(end($temp));
				$expensions = array("pdf", "doc", "docx", "jpg", "jpeg", "png", "txt");
				if (in_array($file_ext, $expensions) == false) {
					// $errors = "Extension not allowed, please choose only pdf file.";
					return false;
				}
				$current_date = date("Y-m-d H:i:s");
				$sql = "insert into doc(griv_ref_no,doc_path,upload_date,uploaded_by,count) values('$griv_ref_no','$newfilename','$current_date','$hidden_id','$count')";
				// $sql = "insert into doc(griv_ref_no,doc_path,uploaded_by,count) values('$griv_ref_no','$newfilename','$hidden_id','$last_id')";
				$sql_img = mysql_query($sql, $db_egr) or die(mysql_error());
				$last_doc = mysql_insert_id($db_egr);
				//echo "insert into doc(griv_ref_no,doc_path,upload_date,uploaded_by) values('$gri_ref_no','$folder_name.$newfilename',NOW(),'$hidden_id')".mysql_error();
				move_uploaded_file($tmp_name_array[$i], $folder_name . $newfilename);
			}
		}
		$current_date = date("Y-m-d H:i:s");
		if ($action == 4) {
			$hidden_user = getAdminId();
		}
		$sql_return = "insert into tbl_grievance_forward (griv_ref_no,emp_id,user_id,user_id_forwarded,forwarded_date,remark,status,section_action,doc_id) values('$griv_ref_no','$emp_id','$hidden_id','$number','$current_date','$_remark','3','$action','$last_doc')";
		$fire_return = mysql_query($sql_return, $db_egr) or die(mysql_error());
		$last_id = mysql_insert_id($db_egr);
		//echo $last_id;
		if ($fire_return) {
			$s_update = mysql_query("update tbl_grievance_forward set status='3' where griv_ref_no='$griv_ref_no' and id < $last_id", $db_egr);
			//echo $s_update;
			$status_update = mysql_query("update tbl_grievance set status='3' where gri_ref_no='$griv_ref_no'", $db_egr);
			return true;
		} else {
			return false;
		}
	}
}

function return_back_action($griv_ref_no, $emp_id, $hidden_id, $hidden_user, $remark, $action, $hidden_action, $name_array, $tmp_name_array)
{
	global $db_egr;
	$_remark = mysql_real_escape_string($remark);
	$last_doc = "";
	if (!empty($name_array)) {
		$sql_count = mysql_query("SELECT count(*) as count FROM doc where griv_ref_no='$griv_ref_no'", $db_egr) or die(mysql_error());
		$fetch_count = mysql_fetch_array($sql_count);
		// print_r($fetch_count);
		$count = $fetch_count['count'];
		$count++;
		$folder_name = "admin/main/admin_upload/";
		for ($i = 0; $i < count($tmp_name_array); $i++) {
			$temp = explode(".", $name_array[$i]);
			$newfilename = rand(1000, 99999) . '.' . end($temp);
			// $sql="insert into doc(griv_ref_no,doc_path,upload_date,uploaded_by,count) values('$griv_ref_no','$newfilename',NOW(),'$hidden_id','$count')";
			$file_ext = strtolower(end($temp));
			$expensions = array("pdf", "doc", "docx", "jpg", "jpeg", "png", "txt");
			if (in_array($file_ext, $expensions) == false) {
				// $errors = "Extension not allowed, please choose only pdf file.";
				return false;
			}
			$current_date = date("Y-m-d H:i:s");
			$sql = "insert into doc(griv_ref_no,doc_path,upload_date,uploaded_by,count) values('$griv_ref_no','$newfilename','$current_date','$hidden_id','$count')";
			$sql_img = mysql_query($sql, $db_egr) or die(mysql_error());
			$last_doc = mysql_insert_id($db_egr);

			move_uploaded_file($tmp_name_array[$i], $folder_name . $newfilename);
		}
	}

    $current_date=date("Y-m-d H:i:s");
    
	// $sql_query = "insert into tbl_grievance_forward(griv_ref_no,emp_id,user_id,user_id_forwarded,forwarded_date,remark,status,admin_action,section_action) values('$griv_ref_no','$emp_id','$hidden_id','$hidden_user',NOW(),'$_remark','3','$hidden_action','$action')";
	$sql_query = "insert into tbl_grievance_forward(griv_ref_no,emp_id,user_id,user_id_forwarded,forwarded_date,remark,status,admin_action,section_action,doc_id) values('$griv_ref_no','$emp_id','$hidden_id','$hidden_user','$current_date','$_remark','3','$hidden_action','$action','$last_doc')";
	$fire_query = mysql_query($sql_query, $db_egr) or trigger_error("Query Failed: " . mysql_error());
	$last_id = mysql_insert_id($db_egr);
	if ($fire_query) {
		$set_zero = mysql_query("update tbl_grievance_forward set status='0' where griv_ref_no='$griv_ref_no' and id < $last_id", $db_egr);
		$status_update = mysql_query("update tbl_grievance set status='3' where gri_ref_no=$griv_ref_no", $db_egr);

		return true;
	} else {
		return false;
	}
}

/**
 * @param mobileno,msg
 * @desc send message to the mobile no  
 */
function SendSMS($mobileno, $msg)
{
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

function isBASection_Officer()
{
	global $db_egr;
	$section = $_SESSION["SESSION_SECTION"];
	$sql = "select * from tbl_section where is_branch_admin='1' and sec_id='$section'";
	$rstRecord = mysql_query($sql, $db_egr);
	// echo mysql_error();
	// var_dump($rstRecord);
	// echo mysql_num_rows($rstRecord);
	if (mysql_num_rows($rstRecord) > 0) {
		// $rwRecord = mysql_fetch_array($rstRecord);
		// print_r($rwRecord);
		// echo "true";
		return true;
	} else {
		// echo "false";
		return false;
	}
}
function getSectionIds($id)
{
	global $db_egr;
	$sql = "select * from tbl_user where user_id='$id'";
	$rst_section = mysql_query($sql, $db_egr);
	$section_name = "";
	if (mysql_num_rows($rst_section) > 0) {
		$rw_section = mysql_fetch_array($rst_section);
		$section_name = $rw_section["section"];
	}
	return $section_name;
}
function getBA($id)
{
	global $db_egr;
// 	 where role='5'
	$sql = "select user_id,role,section from tbl_user";
	$rst_section = mysql_query($sql, $db_egr);
	$user_id = 0;
	if (mysql_num_rows($rst_section) > 0) {
		$rw_section = mysql_fetch_array($rst_section);
		$section_name = $rw_section["section"];
		// print_r($section_name);
		$section = explode(",", $section_name);
		// var_dump($section);
		$role_array = explode(",", $rw_section["role"]);
		if (in_array($id, $section)&& in_array('5', $role_array)) {
			$user_id = $rw_section["user_id"];
		}
	}
	return $user_id;
}
function get_return_ba($id){
	global $db_egr;
// 	echo $id;
// 	 where role='5'
	$sql = "select user_id,role from tbl_user where user_id='$id'";
	$rst_section = mysql_query($sql, $db_egr);
	$user_id = 0;
	if (mysql_num_rows($rst_section) > 0) {
		$rw_section = mysql_fetch_array($rst_section);
		// var_dump($section);
		$role_array = explode(",", $rw_section["role"]);
		if (in_array('5', $role_array)) {
			$user_id = $rw_section["user_id"];
		}
	}
	return $user_id;
}
function getAdminId()
{
	global $db_egr;
	$sql = "select user_id,role,section from tbl_user";
	$rst_section = mysql_query($sql, $db_egr);
	$user_id = 0;
	if (mysql_num_rows($rst_section) > 0) {
		$rw_section = mysql_fetch_array($rst_section);
		// print_r($section_name);
		// var_dump($section);
		$role_array = explode(",", $rw_section["role"]);
		if (in_array('0', $role_array)) {
			$user_id = $rw_section["user_id"];
		}
	}
	return $user_id;
}