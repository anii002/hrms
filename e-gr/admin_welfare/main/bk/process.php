<?php
//error_reporting(0);
require('config.php');
if (isset($_REQUEST['action'])) {
	switch (strtolower($_REQUEST['action'])) {

		case 'submit_change_password':
			$sql = "UPDATE `tbl_otp` SET `flag`='0' WHERE `flag` = '' OR `flag` = '1' AND `emp_id` = '" . $_REQUEST['fetch_user_id'] . "' AND otp = '" . $_POST['typed_otp'] . "' ";
			$result = mysql_query($sql, $db_egr);
			//echo mysql_affected_rows();
			//echo $sql;
			if ($result) {
				$change_pass = "UPDATE `tbl_user` SET `password`= '" . $_POST['request_password'] . "' WHERE `user_id` = '" . $_REQUEST['fetch_user_id'] . "'";
				$change_result = mysql_query($change_pass, $db_egr);
				if ($change_result) {
					echo "<script>alert('Password changed successfully.'); window.location = 'index.php';</script>";
				} else {
					echo "<script>alert('Change Password failed. Generate OTP and try again.'); window.location = 'change_password.php';</script>";
				}
			} else {
				echo "<script>alert('Change Password failed. Try again.'); window.location = 'change_password.php';</script>";
			}
			//echo $change_pass;*/

			break;

		case 'select_desg':
			if (isset($_REQUEST['dept'])) {
				//$data="<option val='' readonly hidden selected disabled>Select Designation</option>";
				$dept = $_REQUEST['dept'];
				$sql_desg = mysql_query("select * from tbl_designation where dept_id='$dept'");
				while ($desg_sql = mysql_fetch_array($sql_desg)) {
					$data .= "<option value='" . $desg_sql['id'] . "'>" . $desg_sql['designation'] . "</option>";
				}
			}
			echo $data;
			break;

		case 'add_grievance':
			// print_r($_REQUEST);
			$name_array = "";
			$tmp_name_array = "";
			$cnt = 0;
			if ($_FILES['upload_doc']['error'][0] != 4) {
				$cnt = count($_FILES['upload_doc']['name']);
				for ($i = 0; $i < $cnt; $i++) {
					$name_array[$i] = $_FILES['upload_doc']['name'][$i];
					$tmp_name_array[$i] = $_FILES['upload_doc']['tmp_name'][$i];
				}
			}

			if (add_grievance($name_array, $tmp_name_array, $_POST['emp_id'], $_POST['emp_name'], $_POST['emp_type'], $_POST['emp_office'], $_POST['emp_dept'], $_POST['emp_desig'], $_POST['emp_mob_no'], $_POST['gri_type'], $_POST['wel_remark'], $_POST['griv_ref_no'], $_POST['hidden_id'])) {
				echo "<script>window.location='add_grievance.php';alert('Grievance Added Successfully');</script>";
			} else {
				echo "<script>window.location='add_grievance.php';alert('Grievance Not Added');</script>";
			}
			break;

		case 'get_temp_emp':
			$data = "";
			$emp_id = $_POST['emp_id'];
			$sql = mysql_query("select * from resgister_user where emp_no='$emp_id'", $db_common);
			while ($result = mysql_fetch_array($sql)) {
				// $data['emp_type'] = get_emp_type_html($result['emp_type']);
				$data['emp_type'] = $result['empType'];
				$data['emp_name'] = $result['name'];
				// $data['emp_dept'] = get_emp_dept_html($result['emp_dept']);
				$data['emp_dept'] = $result['department'];
				// $data['emp_desig'] = get_emp_design_html($result['emp_desig']);
				$data['emp_desig'] = $result['designation'];
				$data['emp_mob'] = $result['mobile'];
				// $data['office'] = get_emp_office_html($result['office']);
				$data['office'] = $result['office'];
			}
			echo json_encode($data);
			break;
	}
}