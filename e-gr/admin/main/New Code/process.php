<?php
error_reporting(0);
require('config.php');
if (isset($_POST['action'])) {
	switch (strtolower($_POST['action'])) {
		case 'get_employee_details':
			$data = '';
			$sql = "SELECT * FROM `employee` where id='" . $_POST['update_employee_hidden_id'] . "'";
			$sql_row = mysqli_query($db_egr,$sql);
			while ($sql_res = mysqli_fetch_assoc($sql_row)) {
				$data .= "" . $sql_res['emp_type'] . "$" . $sql_res['emp_id'] . "$" . $sql_res['emp_name'] . "$" . $sql_res['emp_dept'] . "$" . $sql_res['emp_desig'] . "$" . $sql_res['emp_mob'] . "$" . $sql_res['emp_email'] . "$" . $sql_res['emp_aadhar'] . "$" . $sql_res['emp_address1'] . "$" . $sql_res['emp_address2'] . "$" . $sql_res['emp_state'] . "$" . $sql_res['emp_city'] . "$" . $sql_res['office_emp_address1'] . "$" . $sql_res['office_emp_address2'] . "$" . $sql_res['office_emp_state'] . "$" . $sql_res['office_emp_city'] . "$" . $sql_res['emp_pincode'] . "$" . $sql_res['office_emp_pincode'] . "";
			}
			echo $data;
			break;

		case 'get_city':
			$data = '';
			$query = mysqli_query($db_egr,"SELECT * FROM cities where state_id='" . $_POST['state_hidden_id'] . "'");
			while ($sql_res = mysqli_fetch_assoc($query)) {
				$data .= "" . $sql_res['city_name'] . "$" . "";
			}
			echo $data;
			break;

		case 'get_city1':
			$data = '';
			$query = mysqli_query($db_egr,"SELECT * FROM cities where state_id='" . $_POST['state_hidden_id1'] . "'");
			while ($sql_res = mysqli_fetch_assoc($query)) {
				$data .= "" . $sql_res['city_name'] . "$" . "";
			}
			echo $data;
			break;
	}
}

if (isset($_GET['action'])) {
	switch (strtolower($_GET['action'])) {
			/******Add Employee Details***********/
		case 'add_employee':
			if (add_employee($_POST['emp_type'], $_POST['emp_id'], $_POST['emp_name'], $_POST['emp_dept'], $_POST['emp_desig'], $_POST['emp_mob'], $_POST['emp_email'], $_POST['emp_aadhar'], $_POST['emp_address1'], $_POST['emp_address2'], $_POST['emp_state'], $_POST['emp_city'], $_POST['office_emp_address1'], $_POST['office_emp_address2'], $_POST['office_emp_state'], $_POST['office_emp_city'], $_POST['emp_pincode'], $_POST['office_emp_pincode'])) {
				echo "<script>window.location.href='employee_registration.php';alert('Record Inserted Successfully'); </script>";
			} else {
				echo "<script>window.location.href='employee_registration.php';alert('Record Not Inserted'); </script>";
			}

			break;

		case 'update_employee':
			if (update_employee($_POST['up_emp_type'], $_POST['up_emp_id'], $_POST['up_emp_name'], $_POST['up_emp_dept'], $_POST['up_emp_desig'], $_POST['up_emp_mob'], $_POST['up_emp_email'], $_POST['up_emp_aadhar'], $_POST['up_emp_address1'], $_POST['up_emp_address2'], $_POST['up_emp_state'], $_POST['up_emp_city'], $_POST['up_office_emp_address1'], $_POST['up_office_emp_address2'], $_POST['up_office_emp_state'], $_POST['up_office_emp_city'], $_POST['up_emp_pincode'], $_POST['up_office_emp_pincode'], $_POST['update_employee_hidden_id'])) {
				echo "<script>window.location.href='employee_list.php';alert('Record Updated Successfully'); </script>";
			} else {
				echo "<script>window.location.href='employee_list.php';alert('Record Not Updated'); </script>";
			}

			break;

		case 'delete_employee':

			if (isset($_POST['delete_employee_hidden_id'])) {
				if (delete_employee($_POST['delete_employee_hidden_id'])) {

					echo "<script>window.location.href='employee_list.php'</script>";
				} else {
					echo "<script>window.location.href='Employee.php';</script>";
				}
			}
			break;
	}
}
