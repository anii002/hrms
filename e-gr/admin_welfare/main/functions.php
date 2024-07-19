<?php
session_start();
function get_cat_name($name)
{
	global $db_egr;
	$sql = mysqli_query($db_egr,"select cat_name from category where cat_id='$name'" );
	$fetch = mysqli_fetch_array($sql);
	$nm = $fetch['cat_name'];
	if ($nm) {
		return $nm;
	} else {
		return '-';
	}
}
function get_type($emp_type)
{
	global $db_egr;
	$fetch_cat = mysqli_query($db_egr,"select * from emp_type where id='$emp_type'");
	while ($cat_fetch = mysqli_fetch_array($fetch_cat)) {
		$e_type = $cat_fetch['type'];
	}
	return $e_type;
}
// function get_status($status)
// {
// 	global $db_egr;
// 	$sql = mysqli_query($db_egr,"select status from status where id='$status'");

// 	$fetch = mysqli_fetch_array($sql);
// 	$nm = $fetch['status'];
// 	if ($nm) {
// 		return $nm;
// 	} else {
// 		return '-';
// 	}
// }
function add_grievance($name_array, $tmp_name_array, $emp_id, $emp_name, $emp_type, $emp_office, $emp_dept, $emp_desig, $emp_mob_no, $gri_type, $wel_remark, $griv_ref_no, $hidden_id)
{
	global $db_egr, $db_common;
	$querypf = mysqli_query( $db_common,"select * from register_user where emp_no='$emp_id'");
	//echo "select * from employee where emp_id='$emp_id'";
	$countpf = mysqli_num_rows($querypf);
	//echo $countpf;
	if ($countpf > 0) { } else {
		// $insert_sql = "insert into register_user (`password`,`emp_type`,`emp_id`,`emp_name`,`emp_dept`,`emp_desig`,`emp_mob`,`office`)values('$emp_mob_no','$emp_type','$emp_id','$emp_name','$emp_dept','$emp_desig','$emp_mob_no','$emp_office')";
		//echo $insert_sql;
		// $sql_wel = mysqli_query($insert_sql);
		//echo mysqli_affected_rows();
		//echo"insert into employee (`password`,`emp_type`,`emp_id`,`emp_name`,`emp_dept`,`emp_desig`,`emp_mob`)values('$emp_mob_no','$emp_type','$emp_id','$emp_name','$emp_dept','$emp_desig,'$emp_mob_no')";
	}

	$sql_count = mysqli_query($db_egr,"SELECT count FROM doc where griv_ref_no='$griv_ref_no'") or die(mysqli_error($db_egr));

	$fetch_count = mysqli_fetch_array($sql_count);
	$count = $fetch_count['count'];
	$count++;
	// echo $count;
	$last_doc = "";
	if (!empty($name_array)) {
		$sql_count = mysqli_query($db_egr,"SELECT count(*) as count FROM doc where griv_ref_no='$griv_ref_no'") or die(mysqli_error($db_egr));
		$fetch_count = mysqli_fetch_array($sql_count);
		// print_r($fetch_count);
		$count = $fetch_count['count'];
		$count++;
		$folder_name = "../../admin/main/admin_upload/";
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
			$current_date = date("Y-m-d H:i:s");
			$sql_img = mysqli_query($db_egr,"insert into doc(griv_ref_no,doc_path,upload_date,uploaded_by,count) values('$griv_ref_no','$newfilename','$current_date','$hidden_id','$count')") or die(mysqli_error($db_egr));
			$last_doc = mysqli_insert_id($db_egr);
			move_uploaded_file($tmp_name_array[$i], $folder_name . $newfilename);
		}
	}

	$_wel_remark = mysqli_real_escape_string($db_egr,$wel_remark);
	// $sql="insert into tbl_grievance(emp_id,gri_ref_no,gri_type,gri_desc,doc_id,gri_upload_date,status,uploaded_by) values('$emp_id','$griv_ref_no','$gri_type','$wel_remark','$last_doc',NOW(),'1','$hidden_id')";
	// insert into tbl_grievance(emp_id,gri_ref_no,gri_type,gri_desc,up_doc,doc_id,gri_upload_date,gri_target_date,status) values('$hidden_id','$gri_ref_no','$select_type','$_gri_desc','$optradio','$last_doc',NOW(),DATE_SUB(DATE_ADD(NOW(),INTERVAL 1 MONTH),INTERVAL 1 DAY),'1')
	// INSERT INTO `tbl_grievance`(`id`, `emp_id`, `gri_ref_no`, `gri_type`, `gri_desc`, `up_doc`, `doc_id`, `gri_upload_date`, `gri_target_date`, `status`, `action`, `uploaded_by`, `section_id`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13])
	$up_doc = ($last_doc != '') ? "yes" : "no";
	$current_date = date("Y-m-d H:i:s");
	$target_date = date("Y-m-d H:i:s", strtotime("$current_date +1 month -1 day"));
	$sql = "insert into tbl_grievance(emp_id,gri_ref_no,gri_type,gri_desc,up_doc,doc_id,gri_upload_date,gri_target_date,status,uploaded_by) values('$emp_id','$griv_ref_no','$gri_type','$wel_remark','$up_doc','$last_doc','$current_date','$target_date','1','$hidden_id')";
	$sql_insert = mysqli_query($db_egr,$sql);
	// var_dump($sql_insert);
	if ($sql_insert) {
		// echo "working";
		$sql = "SELECT * from register_user where emp_no ='" . $emp_id . "'";
		$result = mysqli_query($db_common,$sql);
		while ($dat = mysqli_fetch_assoc($result)) {
			$mob = $dat['mobile'];
		}
		// $griv_ref_no = mysqli_real_escape_string($griv_ref_no);
		$griv_ref_no = $griv_ref_no;
		// echo $griv_ref_no;
		$message = "Your e-Grievance added successfully with '$griv_ref_no' reference no.";
		if (SendSMS($mob, $message)) {
			echo "<script>alert('SMS send successfully.');</script>";
		} else {
			echo "<script>alert('SMS send failed.');</script>";
		}
		return true;
	} else {
		return false;
	}
}

function get_emp_type_html($id)
{
	global $db_egr;
	$data = "";
	$query = mysqli_query( $db_egr,"select * from emp_type where id='$id'");
	$result = mysqli_fetch_array($query);
	$data = "<option selected value='" . $result['id'] . "'>" . $result['type'] . "</option>";
	$query = mysqli_query( $db_egr,"select * from emp_type where id<>'$id'");
	while ($result = mysqli_fetch_array($query))
		$data .= "<option selected value='" . $result['id'] . "'>" . $result['type'] . "</option>";
	return $data;
}
function get_emp_office_html($id)
{
	global  $db_egr;
	$data = "";
	$query = mysqli_query( $db_egr,"select * from tbl_office where office_id='$id'");
	$result = mysqli_fetch_array($query);
	$data = "<option selected value='" . $result['office_id'] . "'>" . $result['office_name'] . "</option>";
	$query = mysqli_query( $db_egr,"select * from tbl_office where office_id<>'$id'");
	while ($result = mysqli_fetch_array($query))
		$data .= "<option selected value='" . $result['office_id'] . "'>" . $result['office_name'] . "</option>";
	return $data;
}
function get_emp_design_html($id)
{
	global  $db_egr;
	$data = "";
	$query = mysqli_query( $db_egr,"select * from tbl_designation where id='$id'");
	$result = mysqli_fetch_array($query);
	$data = "<option selected value='" . $result['id'] . "'>" . $result['designation'] . "</option>";
	$query = mysqli_query( $db_egr,"select * from tbl_designation where id<>'$id'");
	while ($result = mysqli_fetch_array($query))
		$data .= "<option selected value='" . $result['id'] . "'>" . $result['designation'] . "</option>";
	return $data;
}
function get_emp_dept_html($id)
{
	global  $db_egr;
	$data = "";
	$query = mysqli_query( $db_egr,"select * from tbl_department where dept_id='$id'");
	$result = mysqli_fetch_array($query);
	$data = "<option selected value='" . $result['dept_id'] . "'>" . $result['deptname'] . "</option>";
	$query = mysqli_query( $db_egr,"select * from tbl_department where dept_id<>'$id'");
	while ($result = mysqli_fetch_array($query))
		$data .= "<option selected value='" . $result['dept_id'] . "'>" . $result['deptname'] . "</option>";
	return $data;
}


/**
 * @param mobileno,msg
 * @desc send message to the mobile no  
 */
function SendSMS($mobileno, $msg)
{
	$authKey = "70302AbSftnyOwtvs53d8e401";

	// echo $mobileno . "-" . $msg;
	//Multiple mobiles numbers separated by comma
	$mobileNumber = $mobileno;

	//Sender ID,While using route4 sender id should be 6 characters long.
	$senderId = "FINSUR";

	//Your message to send, Add URL encoding here.
	// $msg = "Your TA claim for month of $mon - $y  and  amount $amt with $ref reference number has been submitted successfully.";
	// $ref = "WEL_123456";
	// $msg = "Your TA claim with $ref reference number has been submitted successfully.";
	$message = urlencode($msg);
	// echo $message;
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
//! Date 20-09-2019
function is_valid_section($id)
{
	global $db_egr;
	if (isBA()) {
		$sql = "select * from tbl_section where sec_id='$id'";
		$rst_section = mysqli_query( $db_egr,$sql);
		if (mysqli_num_rows($rst_section) > 0) {
			$rw_section = mysqli_fetch_array($rst_section);
			if ($rw_section['is_branch_admin'] > 0) {
				return true;
			} else {
				return false;
			}
		}
	} else if ($_SESSION['SESSION_ROLE'] == 2) {
		return true;
	}
}

function is_valid_ba_section($id)
{
	global $db_egr;
	$sql = "select * from tbl_section where sec_id='$id'";
	$rst_section = mysqli_query( $db_egr,$sql);
	if (mysqli_num_rows($rst_section) > 0) {
		$rw_section = mysqli_fetch_array($rst_section);
		if ($rw_section['is_branch_admin'] > 0) {
			return true;
		} else {
			return false;
		}
	}
}
function isBo()
{
	if ($_SESSION["SESSION_ROLE"] == 3) {
		return true;
	} else {
		return false;
	}
}
function isBA()
{
	if ($_SESSION["SESSION_ROLE"] == 5) {
		return true;
	} else {
		return false;
	}
}
function getTypeName($id)
{
	global $db_egr;
	$sql = "select * from category where cat_id='$id'";
	$rstCategory = mysqli_query( $db_egr,$sql);
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
	$rst_employee = mysqli_query( $db_common,$sql);
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
	$rst_employee = mysqli_query( $db_common,$sql);
	$emp_designation = "";
	if (mysqli_num_rows($rst_employee) > 0) {
		$rw_employee = mysqli_fetch_array($rst_employee);
		$emp_designation_id = $rw_employee["designation"];
		$rst_desig = mysqli_query( $db_common,"select * from designations where DESIGCODE='$emp_designation_id'");
		$rw_desig = mysqli_fetch_array($rst_desig);
		$emp_designation = $rw_desig["DESIGLONGDESC"];
	}
	return $emp_designation;
}
function getSectionName($id)
{
	global $db_egr;
	$sql = "select * from tbl_section where sec_id='$id'";
	$rst_section = mysqli_query( $db_egr,$sql);
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
	$rst_section = mysqli_query( $db_egr,$sql);
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
	$rst_section = mysqli_query( $db_egr,$sql);
	$section_name = "";
	if (mysqli_num_rows($rst_section) > 0) {
		$rw_section = mysqli_fetch_array($rst_section);
		$section_name = $rw_section["section"];
	}
	return $section_name;
}
function isAdmin()
{
	// print_r($_SESSION);
	if ($_SESSION["SESSION_ROLE"] == "0") {
		return true;
	} else {
		return false;
	}
}
if (!function_exists('get_section_name')) {
    function get_section_name($section)
    {
        global $db_egr;
        // Use prepared statements to prevent SQL injection
        $stmt = mysqli_prepare($db_egr, "SELECT sec_name FROM tbl_section WHERE sec_id = ?");
        mysqli_stmt_bind_param($stmt, 's', $section);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $sec_name);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        return $sec_name;
    }
}

function get_category_name($section)
{
	global $db_egr;
	$f_section = mysqli_query( $db_egr,"select * from category where cat_id='$section'");
	$section_f = mysqli_fetch_array($f_section);
	return $section_f['cat_name'];
}
function get_user_name($section)
{
	global $db_egr;
	$f_section = mysqli_query( $db_egr,"select user_name from tbl_user where user_id='$section'");
	$section_f = mysqli_fetch_array($f_section);
	return $section_f['user_name'];
}
function get_station($user_station)
{
	global $db_common;
	$data = "";
	$f_station = mysqli_query( $db_common,"select * from station where stationcode='$user_station'");
	$station_f = mysqli_fetch_array($f_station);
	$data = "<option value='" . $station_f['stationcode'] . "'>" . $station_f['stationdesc'] . "</option>";
	$f_station = mysqli_query( $db_common,"select * from tbl_station where stationcode<>'$user_station'");
	while ($station_f = mysqli_fetch_array($f_station))
		$data .= "<option value='" . $station_f['stationcode'] . "'>" . $station_f['stationdesc'] . "</option>";
	return $data;
}
function get_user_dept($dept)
{
	global $db_common;
	$data = "";
	$fetch_dept = mysqli_query( $db_common,"select * from department where DEPTNO='$dept'");
	$dept_fetch = mysqli_fetch_array($fetch_dept);
	$data = "<option value='" . $dept_fetch['DEPTNO'] . "'>" . $dept_fetch['DEPTDESC'] . "</option>";
	$fetch_dept = mysqli_query( $db_common,"select * from tbl_department where DEPTNO<>'$dept'");
	while ($dept_fetch = mysqli_fetch_array($fetch_dept))
		$data .= "<option value='" . $dept_fetch['DEPTNO'] . "'>" . $dept_fetch['DEPTDESC'] . "</option>";

	return $data;
}
function get_designation($id)
{
	global $db_common;
	$sql = "select DESIGLONGDESC from designations where DESIGCODE='" . $id . "'";
	$f_desg = mysqli_query( $db_common,$sql);
	$desg_f = mysqli_fetch_array($f_desg);
	return $desg_f['DESIGLONGDESC'];
}
function get_designation_short($id)
{
	global $db_common;
	$sql = "select DESIGSHORTDESC from designations where DESIGCODE='" . $id . "'";
	$f_desg = mysqli_query( $db_common,$sql);
	$desg_f = mysqli_fetch_array($f_desg);
	return $desg_f['DESIGSHORTDESC'];
}

function get_department($id)
{
	global $db_common;
	$sql = "select DEPTDESC from department where DEPTNO='" . $id . "'";
	$f_desg = mysqli_query( $db_common,$sql);
	$desg_f = mysqli_fetch_array($f_desg);
	return $desg_f['DEPTDESC'];
}
function get_emptype($id)
{
	global $db_egr;
	$sql = "select type from emp_type where id='" . $id . "'";
	$f_desg = mysqli_query( $db_egr,$sql);
	$desg_f = mysqli_fetch_array($f_desg);
	return $desg_f['type'];
}

function get_forwarded_user($id)
{
	global $db_egr;
	$sql = "select user_name from tbl_user where user_id='" . $id . "'";
	$f_desg = mysqli_query( $db_egr,$sql);
	$desg_f = mysqli_fetch_array($f_desg);
	return $desg_f['user_name'];
}

function get_office_text($id)
{
	global $db_egr;
	$sql = "select * from tbl_office where office_id='" . $id . "'";
	$f_desg = mysqli_query( $db_egr,$sql);
	$desg_f = mysqli_fetch_array($f_desg);
	return $desg_f['office_name'];
}

function get_station_text($id)
{
	global $db_common;
	$sql = "select * from station where stationcode='" . $id . "'";
	$f_desg = mysqli_query( $db_common,$sql);
	$desg_f = mysqli_fetch_array($f_desg);
	return $desg_f['stationdesc'];
}
function get_emp_station($pf_no)
{
	global $db_common;
	$sql = "select * from register_user where emp_no='$pf_no'";
	$rst_employee = mysqli_query( $db_common,$sql);
	$emp_station = "";
	if (mysqli_num_rows($rst_employee) > 0) {
		$rw_employee = mysqli_fetch_array($rst_employee);
		$station_id = $rw_employee["station"];
		$emp_station = get_station_text($station_id);
	}
	return $emp_station;
}
function get_Cat($type)
{    //echo "<script>alert($type)</script>";
	global $db_egr;
	$fetch_cat = mysqli_query( $db_egr,"select cat_name from category where cat_id='" . $type . "'");
	//  $cat_fetch=mysqli_query($fetch_cat);
	$cat_names = "";
	while ($cat_get = mysqli_fetch_assoc($fetch_cat)) {
		$cat_names = $cat_get['cat_name'];
	}
	return ($cat_names);
}

if (!function_exists('get_uploaded_user')) {
    function get_uploaded_user($id)
    {
        global $db_egr;

        // Use prepared statements to prevent SQL injection
        $stmt = mysqli_prepare($db_egr, "SELECT user_name FROM tbl_user WHERE user_id = ?");
        mysqli_stmt_bind_param($stmt, 's', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $user_name);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        return $user_name;
    }
}
