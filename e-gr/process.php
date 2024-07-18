<?php
require('config.php');
include('functions.php');
include('fun.php');
error_reporting(0);

if (isset($_REQUEST['action'])) {
	switch (strtolower($_REQUEST['action'])) {
			////select designation code form dept
		case 'select_desg':
			if (isset($_REQUEST['dept'])) {
				//$data="<option val='' readonly hidden selected disabled>Select Designation</option>";
				$dept = $_REQUEST['dept'];
				$sql_desg = mysqli_query($db_common,"select * from designations where DESIGCODE='$dept'");
				while ($desg_sql = mysqli_fetch_array($sql_desg)) {
					$data .= "<option value='" . $desg_sql['DESIGCODE'] . "'>" . $desg_sql['DESIGLONGDESC'] . "</option>";
				}
			}
			echo $data;
			break;

		case 'search_griv_ref':
			$Result = array("res" => "fail");
			$data = '';
			$search_gri_ref = $_REQUEST['gri_ref_no'];
			//$my_query=mysqli_query("select * from tbl_grievance where gri_ref_no='".$_POST['gri_ref_no']."'");
			//echo "select * from tbl_grievance where gri_ref_no='".$_POST['gri_ref_no']."'";
			$query_user = "select * from tbl_grievance where gri_ref_no='" . $search_gri_ref  . "'";

			$resultset = mysqli_query($db_egr,$query_user);
			/**echo "select * from tbl_grievance where gri_ref_no='".$_REQUEST['gri_ref_no']."'";*/
			if (mysqli_num_rows($resultset) > 0) {
				$result_user = mysqli_fetch_array($resultset);
				$cur_user = $result_user['emp_id'];
				//echo "<script>alert('$cur_user');</script>";
				$sql = "select e.empType,e.emp_no,e.name,e.department,e.designation,e.mobile,e.emp_email,e.emp_aadhar,e.office,e.station,g.gri_type,g.gri_desc,g.up_doc,g.gri_upload_date,g.gri_ref_no,g.doc_id from $db_common_name.register_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id WHERE g.emp_id='$cur_user'";
				// echo "select e.emp_type,e.emp_id,e.emp_name,e.emp_dept,e.emp_desig,e.emp_mob,e.emp_email,e.emp_aadhar,e.office,e.station,g.gri_type,g.gri_desc,g.up_doc,g.gri_upload_date,g.gri_ref_no,g.doc_id from employee e INNER JOIN tbl_grievance g ON e.emp_id=g.emp_id WHERE g.emp_id='$cur_user'";

				$exe_query = mysqli_query($db_egr,$sql) or die(mysqli_error($db_egr));

				if ($result = mysqli_fetch_array($exe_query)) {
					// print_r($result);
					$emp_type = $result['empType'];
					$emp_id = $result['emp_no'];
					$emp_name = $result['name'];
					$emp_dept = $result['department'];
					$emp_desig = $result['designation'];
					$emp_mob = $result['mobile'];
					$emp_email = $result['emp_email'];
					$emp_aadhar = $result['emp_aadhar'];
					$office = $result['office'];
					$station = $result['station'];
					$gri_type = $result['gri_type'];
					$gri_desc = $result['gri_desc'];
					$up_doc = $result['up_doc'];
					$gri_upload_date = $result['gri_upload_date'];
					$gri_ref_no = $result['gri_ref_no'];
					$doc_path = $result['doc_id'];
					// print_r($result);
				}
				$fetch_cat = mysqli_query($db_egr,"select * from emp_type where id='" . $emp_type . "'");
				/*echo "select * from emp_type where id='".$emp_type."'";*/
				while ($cat_fetch = mysqli_fetch_array($fetch_cat)) {
					$e_type = $cat_fetch['type'];
				}

				$get_des = mysqli_query($db_common,"select DESIGLONGDESC from designations where DESIGCODE='" . $emp_desig . "'");
				while ($fetch_des = mysqli_fetch_array($get_des)) {
					$got_des = $fetch_des['DESIGLONGDESC'];
				}
				//echo "<script>alert('$got_des');</script>";

				$get_off = mysqli_query($db_egr,"select office_name from tbl_office where office_id='" . $office . "'");
				while ($fetch_off = mysqli_fetch_array($get_off)) {
					$got_off = $fetch_off['office_name'];
				}
				$got_dept = "";
				$get_dept = mysqli_query($db_common,"select DEPTDESC from department where DEPTNO='" . $emp_dept . "'");
				while ($fetch_dept = mysqli_fetch_array($get_dept)) {
					$got_dept = $fetch_dept['DEPTDESC'];
				}

				$get_st = mysqli_query($db_common,"select stationdesc from station where stationcode='" . $station . "'" );
				while ($fetch_st = mysqli_fetch_array($get_st)) {
					$got_st = $fetch_st['stationdesc'];
				}

				$data .= '<table class="table table-striped table-bordered table-responsive" width="100%" border="1" style="border-collapse:collapse"><tr><td colspan="4" style="text-align:Center;color:black"><b>Personal History</b></td></tr><tr><td>Employee Type</td><td>' . $e_type . '</td><td>Emp-id/PF No</td><td>' . $emp_id . '</td></tr><tr><td>Employee Name</td><td>' . $emp_name . '</td><td>Department</td><td>' . $got_dept . '</td></tr><tr><td>Designation</td><td>' . $got_des . '</td><td>Mobile Number</td><td>' . $emp_mob . '</td></tr><tr><td>E-mail id</td><td>' . $emp_email . '</td><td>Aadhar Number</td><td>' . $emp_aadhar . '</td></tr><tr><td>Office</td>
				<td>' . $got_off . '</td><td>Station</td><td>' . $got_st . '</td></tr></table>
				<label style="padding:5px;font-size:16px;">Employee Grievance</label>
				<table  class="table table-striped table-bordered " style="width:100%;"><thead><tr><th>Griv. Ref. No.</th><th>Remark</th><th>Date</th><!--th>Action</th--><th>Status</th><th>Document Link</th></tr></thead>
                <tbody>';

				function get_status($status)
				{
					global $db_egr;
					$sql1 = mysqli_query($db_egr,"select status from status where id=$status");

					$status_fetch = "";
					while ($sql_query1 = mysqli_fetch_array($sql1)) {
						$status_fetch = $sql_query1['status'];
					}
					return $status_fetch;
				}
				function get_action($action)
				{
					global $db_egr;
					$f_action = mysqli_query($db_egr,"select action from action where id=$action");
					while ($action_f = mysqli_fetch_array($f_action)) {
						$a_c = $action_f['action'];
					}
					return $a_c;
				}

				// echo $sql = "select  * from tbl_grievance where gri_ref_no='" . $_REQUEST['gri_ref_no'] . "'";
				$fire_all = mysqli_query($db_egr,"select  * from tbl_grievance where gri_ref_no='" . $_REQUEST['gri_ref_no'] . "'");
				while ($all_fetch = mysqli_fetch_array($fire_all)) {
					$gri_ref_no = $all_fetch['gri_ref_no'];
					$forwarded_date = $all_fetch['gri_upload_date'];
					$remark = $all_fetch['gri_desc'];
					//$return_action=get_action($all_fetch['action']);
					$status = get_status($all_fetch['status']);
					$doc_id = $all_fetch['doc_id'];
					$uploaded_by = $all_fetch["uploaded_by"];
					$data .= "<tr>";
					$data .= "<td>$gri_ref_no</td>";
					$data .= "<td>$remark</td>";
					$data .= "<td>$forwarded_date</td>";
					$data .= "<td>$status</td>";
					$uploaded_by = startsWith($_REQUEST["gri_ref_no"], 'W') ? $uploaded_by : $cur_user;
					$sql_doc_sec = mysqli_query($db_egr,"select * from doc where griv_ref_no='$gri_ref_no' and uploaded_by='$uploaded_by' and doc_id='$doc_id'", $db_egr);
					$data .= "<td>";
					$count_doc = 1;
					$cnt = 0;
					while ($doc_fetch = mysqli_fetch_array($sql_doc_sec)) {
						//echo $doc_fetch['doc_path'];
						$data .=  "<a href='admin/main/admin_upload/" . $doc_fetch['doc_path'] . "' target='_blank' id='" . $cnt . "' name='" . $cnt . "' >DOC&nbsp;&nbsp;&nbsp;</a>";
						$cnt++;
					}
					if (mysqli_num_rows($sql_doc_sec) > 0) {
						$count_doc++;
					}

					$data .=  "</td>";
					$data .= "</tr>";
				}
				$data .= '</tbody>';
				$data .= '</table>';
				$griv_no = $_REQUEST['gri_ref_no'];
				// print_r($_REQUEST);
				// echo "<script>alert('$griv_no');</script>";
				function get_user1($first_id)
				{
					global $db_egr, $db_common;
					$first_user = mysqli_query($db_egr,"select user_name from tbl_user where user_id='$first_id'", $db_egr);
					$count_record = mysqli_num_rows($first_user);
					if ($count_record > 0) {
						$user_first = mysqli_fetch_array($first_user);
						$f_user = $user_first['user_name'];
					} else {
						$first_user = mysqli_query($db_common,"select name from register_user where emp_no='$first_id'" );
						$count_record = mysqli_num_rows($first_user);
						$user_first = mysqli_fetch_array($first_user);
						$f_user = $user_first['name'];
					}
					return $f_user;
				}
				function get_user2($second_id)
				{
					global $db_egr;
					$second_user = mysqli_query($db_egr,"select user_name from tbl_user where user_id='$second_id'");
					while ($user_second = mysqli_fetch_array($second_user)) {
						$s_user = $user_second['user_name'];
					}
					return $s_user;
				}
				// echo "select * from tbl_grievance_forward where griv_ref_no='$griv_no' and emp_id='$cur_user'";
				$sql = "select * from tbl_grievance_forward where griv_ref_no='$griv_no' and emp_id='$cur_user'";

				$fire_all = mysqli_query($db_egr,$sql);
				// echo mysqli_num_rows($fire_all);
				$count_doc = 1;
				$cnt = 0;
				$sr_no = 1;
				// $data .= 'count=>' . mysqli_num_rows($fire_all);
				// $data .= 'sql=>' . $sql;
				if (mysqli_num_rows($fire_all) > 0) {
					$data .= '<label style="padding:5px;font-size:16px;">Grievance History</label>';
					$data .= '<table class="table table-striped table-bordered " style="width:100%;"> 
						  <thead><tr><th>Sr.No </th><th>Date</th><th>Remarks</th><th>Taken Action</th><th>Forwarded To</th><th>Documents Links</th></tr></thead><tbody>';

					while ($all_fetch = mysqli_fetch_array($fire_all)) {
						$forwarded_date = $all_fetch['forwarded_date'];
						$remark = $all_fetch['remark'];
						$user_id = get_user1($all_fetch['user_id']);
						$user_id_forwarded = get_user1($all_fetch['user_id_forwarded']);
						//$return_action=get_action($all_fetch['return_action']);
						$status = get_status($all_fetch['status']);
						$doc_id = $all_fetch['doc_id'];
						$status = $all_fetch['status'];
						$data .=  "<tr>";
						$data .=  "<td>$sr_no</td>";
						$data .=  "<td>$forwarded_date</td>";
						$data .=  "<td>$remark</td>";
						$data .=  "<td>$user_id</td>";
						$data .=  "<td>$user_id_forwarded</td>";
						$sql_inner = "select * from doc where griv_ref_no='$griv_no' and uploaded_by='" . $all_fetch['user_id'] . "' and doc_id='$doc_id'";
						$sql_doc_sec = mysqli_query($db_egr,$sql_inner);
						//echo "select * from doc where griv_ref_no='$griv_no' and uploaded_by!='$cur_user' and count='$count_doc'";
						$sr_no++;
						$data .=  "<td>";
						while ($doc_fetch = mysqli_fetch_array($sql_doc_sec)) {
							//echo $doc_fetch['doc_path'];
							$data .=  "<a href='admin/main/admin_upload/" . $doc_fetch['doc_path'] . "' target='_blank' id='" . $cnt . "' name='" . $cnt . "' >DOC&nbsp;&nbsp;&nbsp;</a>";
							$cnt++;
						}
						if (mysqli_num_rows($sql_doc_sec) > 0) {
							$count_doc++;
						}
						$data .=  "</td>";
						$data .= "</tr>";
					}
					$data .= '</tbody>';
					$data .= '</table>';
				}
				$Result["res"] = "success";
				$Result["data"] = $data;
			} else {
				$data .= "<table>
							<tr>
								<td>
									<h4>Grievance is not registered for this reference no $search_gri_ref</h4>
								</td>
							</tr>
						</table>";
				$Result["res"] = "fail";
				$Result["data"] = $data;
			}
			// echo $data;
			echo json_encode($Result);
			break;
	}
}

if (isset($_REQUEST['action'])) {
	switch (strtolower($_GET['action'])) {
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
		case 'search_griv_ref1':
			$my_query = mysqli_query($db_egr,"select * from tbl_grievance where gri_ref_no='" . $_POST['gri_ref_no'] . "'");
			echo "select * from tbl_grievance where gri_ref_no='" . $_POST['gri_ref_no'] . "'";

			break;


		case 'submit_change_password':
			$sql = "UPDATE `tbl_otp` SET `flag`='0' WHERE `flag` = '' OR `flag` = '1' AND `emp_id` = '" . $_REQUEST['fetch_user_id'] . "' AND otp = '" . $_POST['typed_otp'] . "' ";
			$result = mysqli_query($db_common,$sql);
			//echo mysqli_affected_rows();
			//echo $sql;
			if (mysqli_affected_rows($db_egr) > 0) {
				$change_pass = "UPDATE `tbl_user` SET `password`= '" . $_POST['request_password'] . "' WHERE `emp_id` = '" . $_REQUEST['fetch_user_id'] . "'";
				$change_result = mysqli_query($db_egr,$change_pass);
				if (mysqli_affected_rows($db_egr) > 0) {
					echo "<script>alert('Password changed successfully.'); window.location = 'index.php';</script>";
				} else {
					echo "<script>alert('Change Password failed. Generate OTP and try again.'); window.location = 'index.php';</script>";
				}
			} else {
				echo "<script>alert('Change Password failed. Try again.'); window.location = 'index.php';</script>";
			}
			//echo $change_pass;*/

			break;

		case 'add_grievance':
			$name_array = "";
			$tmp_name_array = "";
			$cnt = 0;
			if ($_FILES['upfile']['error'][0] != 4) {
				$cnt = count($_FILES['upfile']['name']);
				for ($i = 0; $i < $cnt; $i++) {
					$name_array[$i] = $_FILES['upfile']['name'][$i];
					$tmp_name_array[$i] = $_FILES['upfile']['tmp_name'][$i];
				}
			}
			$pf_no = $_POST["pf_no"];
			$station = $_POST["lst_station"];
			$dept = $_POST["lst_dept"];
			$degn = $_POST["lst_desig"];
			$res_update = update_emp_station_dept_degn($pf_no, $station, $dept, $degn);
			// echo $res_update;
			$add_res = add_grievance($name_array, $tmp_name_array, $_REQUEST['select_type'], $_REQUEST['gri_ref_no'], $_REQUEST['gri_desc'], $_REQUEST['optradio'], $_REQUEST['hidden_id']);
		
			
			if ($add_res && $res_update) {
				echo "<script>window.location.href='index.php';alert('New grievance has been added');</script>";
			} else {
				echo "<script>window.location.href='index.php';alert('Record Not Inserted');</script>";
			}
			break;

		case 'add_employee':
			$query = "select * from employee where emp_id='" . $_POST['emp_id'] . "' or emp_mob='" . $_POST['emp_mob'] . "'";
			$resultset = mysqli_query($db_egr,$query);
			$count = mysqli_num_rows($resultset);
			if ($count > 0) {
				echo "<script>window.location.href='registration.php';alert('Employee already registered'); </script>";
			}

			if (add_employee($_POST['emp_type'], $_POST['emp_id'], $_POST['emp_name'], $_POST['emp_dept'], $_POST['emp_desig'], $_POST['emp_mob'], $_POST['emp_email'], $_POST['emp_aadhar'], $_POST['emp_address1'], $_POST['emp_address2'], $_POST['emp_state'], $_POST['emp_city'], $_POST['office_emp_address1'], $_POST['office_emp_address2'], $_POST['office_emp_state'], $_POST['office_emp_city'], $_POST['emp_pincode'], $_POST['office_emp_pincode'], $_POST['emp_office'], $_POST['emp_station'])) {
				echo "<script>window.location.href='index.php';alert('Employee Registration Successful'); </script>";
			} else {
				echo "<script>window.location.href='index.php';alert('Record Not Inserted'); </script>";
			}

			break;
		case 'add_feedback':
		  //  print_r($_REQUEST);
// 			print_r($_POST);
			$griv = isset($_POST["hidden_griv"]) ? $_POST["hidden_griv"] : 0;
			$emp_react = isset($_POST["emp_react"]) ? $_POST["emp_react"] : NULL;
			if (add_feedback($_POST['fed_name'], $_POST['fed_email'], $_POST['fed_mobile'], $_POST['fed_remark'], $griv, $emp_react, $_POST["fed_pf"])) {
				echo "<script>window.location.href='index.php';alert('Thank You For Your Feedback'); </script>";
			} else {
				echo "<script>window.location.href='index.php';alert('Sorry Your Feedback Could not be send'); </script>";
			}
			break;

		case 'updateemployee':
			if (UpdateEmployee($_POST['emp_type'], $_POST['emp_name'], $_POST['emp_dept'], $_POST['emp_desig'], $_POST['emp_mob'], $_POST['emp_email'], $_POST['emp_office'], $_POST['emp_station'], $_REQUEST['emp_id'])) {
				echo "<script>window.location.href='profile.php';alert('Employee Details updated'); </script>";
			} else {
				echo "<script>window.location.href='profile.php';alert('Failed to Update'); </script>";
			}
			break;

		case 'changepassword':
			// print_r($_REQUEST);
			$pro_emp_opass = $_REQUEST['pro_emp_opass'];
			$pro_emp_npass = $_REQUEST['pro_emp_npass'];
			$emp_id = $_REQUEST['emp_id'];
			if ($pro_emp_npass == $pro_emp_opass) {
				if (changepassword($pro_emp_npass, $emp_id)) {
					echo "<script>window.location.href='profile.php';alert('Employee Password changed successful'); </script>";
				} else {
					echo "<script>window.location.href='profile.php';alert('Failed to Update'); </script>";
				}
			} else {
				echo "<script>window.location.href='profile.php';alert('Passwords are not matched'); </script>";
			}
			break;
		case 'add_rem':
			if (add_rem($_POST['hidden_date'], $_POST['rem_emp_id'], $_POST['rem_griv_no'], $_POST['rem_remark'])) {
				echo "<script>window.location.href='griv_history.php';alert('Reminder Gave Successfully');</script>";
			} else {
				echo "<script>window.location.href='griv_history.php';alert('Reminder Failed');</script>";
			}
			break;

		case 'default':
			echo "Not found";
			break;
	}
}