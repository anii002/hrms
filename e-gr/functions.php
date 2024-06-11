<?php
function add_grievance($name_array, $tmp_name_array, $select_type, $gri_ref_no, $gri_desc, $optradio, $hidden_id)
{
	global $db_egr, $db_common;
	// echo $sql_insert = "insert into tbl_grievance(emp_id,gri_ref_no,gri_type,gri_desc,up_doc,doc_id,gri_upload_date,gri_target_date,status) values('$hidden_id','$gri_ref_no','$select_type','$_gri_desc','$optradio','$last_doc',NOW(),DATE_SUB(DATE_ADD(NOW(),INTERVAL 1 MONTH),INTERVAL 1 DAY),'1')";
	$sql_count = mysql_query("SELECT count(*) as count FROM doc where griv_ref_no='$gri_ref_no'", $db_egr) or die(mysql_error());
	$fetch_count = mysql_fetch_array($sql_count);
	$count = $fetch_count['count'];
	$count++;
	// echo $count;
	//echo count($tmp_name_array);	
	$last_doc = "";
	if (!empty($name_array)) {
		$folder_name = "admin/main/admin_upload/";
		if (!file_exists($folder_name)) {
			mkdir($folder_name, 0777);
		}
		for ($i = 0; $i < count($tmp_name_array); $i++) {
			$temp = explode(".", $name_array[$i]);
			// $file_name = $_FILES["txtUploadArticle"]['name'];
			// $file_size = $_FILES["txtUploadArticle"]['size'];
			// $file_tmp = $_FILES["txtUploadArticle"]['tmp_name'];
			// $file_type = $_FILES["txtUploadArticle"]['type'];
			// $value = explode(".", $file_name);
			$file_ext = strtolower(end($temp));
			$expensions = array("pdf", "doc", "docx", "jpg", "jpeg", "png", "txt");
			if (in_array($file_ext, $expensions) == false) {
				// $errors = "Extension not allowed, please choose only pdf file.";
				return false;
			}
			$newfilename = rand(10000, 999999) . '.' . $file_ext;
			//	move_uploaded_file($_FILES["file"]["tmp_name"], "../img/imageDirectory/" . $newfilename);
			$current_date = date("Y-m-d H:i:s");
			$sql_img = mysql_query("insert into doc(griv_ref_no,doc_path,upload_date,uploaded_by,count) values('$gri_ref_no','$newfilename','$current_date','$hidden_id',$count)", $db_egr) or die(mysql_error());
			if ($sql_img) {
				$last_doc = mysql_insert_id($db_egr);
			}
			//echo "insert into doc(griv_ref_no,doc_path,upload_date,uploaded_by) values('$gri_ref_no','$folder_name.$newfilename',CURRENT_TIMESTAMP,'$hidden_id')".mysql_error();
			//move_uploaded_file($tmp_name_array[$i],$folder_name.$name_array[$i]);
			move_uploaded_file($tmp_name_array[$i], $folder_name . $newfilename);
		}
	} else {
		$last_doc = "";
		$optradio = "no";
	}

	//echo $last_doc;
	$current_date = date("Y-m-d H:i:s");
	$target_date = date("Y-m-d H:i:s", strtotime("$current_date +1 month -1 day"));
	$_gri_desc = mysql_real_escape_string($gri_desc);
	$sql_insert = "insert into tbl_grievance(emp_id,gri_ref_no,gri_type,gri_desc,up_doc,doc_id,gri_upload_date,gri_target_date,status) values('$hidden_id','$gri_ref_no','$select_type','$_gri_desc','$optradio','$last_doc','$current_date','$target_date','1')";
	$inserted = mysql_query($sql_insert, $db_egr);
	//echo "insert into tbl_grievance(emp_id,gri_ref_no,gri_type,gri_desc,up_doc,doc_id,gri_upload_date,status) values('$hidden_id','$gri_ref_no','$select_type','$gri_desc','$optradio','$last_doc',CURRENT_TIMESTAMP,'1')".mysql_error();
	if ($inserted) {
		$sql = "SELECT mobile from resgister_user where emp_no ='" . $hidden_id . "'";
		$result = mysql_query($sql, $db_common);
		//echo mysql_affected_rows()."/<br/>".$hidden_id;
		while ($dat = mysql_fetch_assoc($result)) {
			$mob = $dat['mobile'];
		}
		$message = "Your e-Grievance added successfully with '" . $gri_ref_no . "' reference no.";
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

function add_employee($emp_type, $emp_id, $emp_name, $emp_dept, $emp_desig, $emp_mob, $emp_email, $emp_aadhar, $emp_address1, $emp_address2, $emp_state, $emp_city, $office_emp_address1, $office_emp_address2, $office_emp_state, $office_emp_city, $emp_pincode, $office_emp_pincode, $emp_office, $emp_station)
{
	global $db_egr, $db_common;
	$sql = "INSERT INTO `employee`(emp_type,emp_id,emp_name,emp_dept,emp_desig,emp_mob,emp_email,emp_aadhar,office,station,emp_address1,emp_address2,emp_state,emp_city,office_emp_address1,office_emp_address2,office_emp_state,office_emp_city,emp_pincode,office_emp_pincode,created_date,delete_status,password) VALUES('" . $emp_type . "','" . $emp_id . "','" . $emp_name . "','" . $emp_dept . "','" . $emp_desig . "','" . $emp_mob . "','" . $emp_email . "','" . $emp_aadhar . "','" . $emp_office . "','" . $emp_station . "','" . $emp_address1 . "','" . $emp_address2 . "','" . $emp_state . "','" . $emp_city . "','" . $office_emp_address1 . "','" . $office_emp_address2 . "','" . $office_emp_state . "','" . $office_emp_city . "','" . $emp_pincode . "','" . $office_emp_pincode . "',Now(),1,'$emp_mob')";
	$query = mysql_query($sql, $db_common) or trigger_error("Query Failed: " . mysql_error());
	if ($query) {
		return true;
	} else {
		return false;
	}
}

function add_feedback($name, $email, $mob_no, $msg, $griv = 0, $emp_react = NULL, $emp_id)
{
	global $db_egr;
    // var_dump($name);
    // var_dump($email); var_dump($mob_no);var_dump($msg);var_dump($griv);var_dump($emp_react);var_dump($emp_id);
	$_msg = mysql_real_escape_string($msg);
	 $sql_feedback = "insert into tbl_feedback(emp_id,name,email,mob_no,remark,griv_ref_id,emp_reaction) values('$emp_id','$name','$email','$mob_no','$_msg','$griv','$emp_react')";
	$fetch_feedback = mysql_query($sql_feedback, $db_egr);
	if ($fetch_feedback) {
		return true;
	} else {
		return false;
	}
}

function UpdateEmployee($emp_type, $emp_name, $emp_dept, $emp_desig, $emp_mob, $emp_email, $emp_office, $emp_station, $emp_id)
{
	global $db_common;
	$query = "UPDATE resgister_user set empType='$emp_type', name='$emp_name', department='$emp_dept', designation='$emp_desig', mobile='$emp_mob', emp_email='$emp_email', office='$emp_office', station='$emp_station' where emp_no='$emp_id'";
	$result = mysql_query($query, $db_common);
	if ($result)
		return true;
	else {
		return false;
	}
}

function changepassword($pro_emp_npass, $emp_id)
{
	global  $db_common;
	$pro_emp_npass = hashPassword($pro_emp_npass);
	$query = "UPDATE resgister_user set password='$pro_emp_npass' where emp_no='$emp_id'";
	$result = mysql_query($query, $db_common);
	if ($result)
		return true;
	else {
		return false;
	}
}

function add_rem($hidden_date, $rem_emp_id, $rem_griv_no, $rem_remark)
{
	// var_dump($hidden_date, $rem_emp_id, $rem_griv_no, $rem_remark);
	global $db_egr, $db_common;
	$sql_add = "insert into reminder(griv_ref_no,emp_id,griv_upload_date,reminder_date,remark)values('$rem_griv_no','$rem_emp_id','$hidden_date',CURRENT_TIMESTAMP,'$rem_remark')";
	// echo $sql_add;
	$sql = mysql_query($sql_add, $db_egr);
	// echo "insert into reminder(griv_ref_no,emp_id,griv_upload_date,reminder_date,remark)values('$rem_griv_no','$rem_emp_id','$hidden_date',CURRENT_TIMESTAMP,'$rem_remark')" . mysql_error();
	if ($sql) {
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
function startsWith($string, $startString)
{
	$len = strlen($startString);
	return (substr($string, 0, $len) === $startString);
}
function update_emp_station_dept_degn($pf_no, $station, $dept, $degn)
{
	global $db_common;
	$sql_update = "UPDATE `resgister_user` SET `designation`='$degn',`department`='$dept',`station`='$station' WHERE `emp_no`='$pf_no'";
	if (mysql_query($sql_update, $db_common)) {
		return true;
	}
	return false;
}
