<?php
//error_reporting(0);
require('config.php');
// print_r($_REQUEST);
if (isset($_REQUEST['action'])) {
	switch (strtolower($_REQUEST['action'])) {
		case 'get_section_report':
			// print_r($_REQUEST);
			$associate_array_label = array();
			$associate_array = array();
			$asso_complied_array = array();
			$asso_pending_array = array();
			$asso_more_array = array();
			$section = implode(",", (array)$_REQUEST['section']);
			$frm_date = date('Y-m-d', strtotime($_REQUEST['frm_date']));
			$to_date = date('Y-m-d', strtotime($_REQUEST['to_date']));
			$section_array = explode(",", $section);
			if (in_array(0, $section_array)) {
				// echo "done";
				if (isBA()) {
					$query = "select * from tbl_section where is_branch_admin='1'";
				} else {
					$query = "select * from tbl_section";
				}

				$rstSection = mysql_query($query, $db_egr);
				while ($rwSection = mysql_fetch_array($rstSection)) {
					// print_r($rwSection);
					$sec_id = $rwSection["sec_id"];
					if (!in_array($sec_id, $section_array)) {
						if (isAdmin()) {
							if ($rwSection["is_branch_admin"] != 1 || $sec_id == 5) {
								array_push($section_array, $sec_id);
							}
						} else if (is_valid_ba_section($sec_id)) {
							array_push($section_array, $sec_id);
						}
					}
				}
				// print_r($section_array);
			}

			$array_count = count($section_array);
			for ($i = 0; $i < $array_count; $i++) {
				$associate_array_label[$section_array[$i]] = get_section_name($section_array[$i]);
				$associate_array[$section_array[$i]] = 0;
				$asso_complied_array[$section_array[$i]] = 0;
				$asso_pending_array[$section_array[$i]] = 0;
				$asso_more_array[$section_array[$i]] = 0;
				if ($i == 0) {
					if (in_array(0, $section_array)) {
						$associate_array_label[$section_array[$i]] = "New Grievances";
					}
				}
			}

			$grie_sql = "SELECT `uploaded_by`,`section_id` FROM tbl_grievance WHERE `gri_upload_date` between '" . $frm_date . "' AND '" . $to_date . "'";
			$result = mysql_query($grie_sql, $db_egr);

			while ($data = mysql_fetch_assoc($result)) {
				// $user_id = $data['uploaded_by'];
				// echo mysql_affected_rows();
				// $section_sql = "SELECT `section` FROM `tbl_user` WHERE `user_id` = '" . $user_id . "'";
				// $sql_result = mysql_query($section_sql);
				// while ($sql_data = mysql_fetch_assoc($sql_result)) {
				// 	//?echo $sql_data['section']."<br/>";
				// 	//* welcome
				// 	//! eecho eef
				// 	//todo welcome 
				// }
				for ($i = 0; $i < $array_count; $i++) {
					//echo $section_array[1];
					//if($i <= $array_count-1)
					if ($section_array[$i] == $data['section_id']) {
						$cnt = $associate_array[$section_array[$i]];
						//echo $section_array[$i];
						$cnt = $cnt + 1;
						$associate_array[$section_array[$i]] = $cnt++;
					}
				}
			}

			$grie_sql = "SELECT g.id,g.uploaded_by,g.section_id, g.gri_upload_date,g.status,f.user_id FROM tbl_grievance g JOIN tbl_grievance_forward f  ON g.gri_ref_no=f.griv_ref_no WHERE g.gri_upload_date between '" . $frm_date . "' AND '" . $to_date . "' AND g.status=4 group by g.id";
			$result = mysql_query($grie_sql, $db_egr);

			while ($data = mysql_fetch_assoc($result)) {
				// $user_id = $data['uploaded_by'];
				// //echo mysql_affected_rows();
				// $section_sql = "SELECT `section` FROM `tbl_user` WHERE `user_id` = '" . $user_id . "'";
				// $sql_result = mysql_query($section_sql);

				// while ($sql_data = mysql_fetch_assoc($sql_result)) {
				//echo $sql_data['section']."<br/>";
				for ($i = 0; $i < $array_count; $i++) {
					//echo $section_array[1];
					//if($i <= $array_count-1)
					// if (is_valid_section($data["section_id"]) || !is_valid_ba_section($data["section_id"]) || $data["section_id"] == 5) {
					if ($section_array[$i] == $data['section_id']) {
						$cnt = $asso_complied_array[$section_array[$i]];
						//echo $user_id."<br/>";
						$cnt = $cnt + 1;
						$asso_complied_array[$section_array[$i]] = $cnt++;
					}
					// }
				}
				// }
			}

			$grie_sql = "SELECT g.uploaded_by,g.section_id, g.gri_upload_date,g.status,f.user_id FROM tbl_grievance g JOIN  tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no WHERE g.gri_upload_date between '" . $frm_date . "' AND '" . $to_date . "' AND g.status=1 group by g.id";
			$result = mysql_query($grie_sql, $db_egr);


			while ($data = mysql_fetch_assoc($result)) {
				// $user_id = $data['uploaded_by'];
				// //echo mysql_affected_rows();
				// $section_sql = "SELECT `section` FROM `tbl_user` WHERE `user_id` = '" . $user_id . "'";
				// $sql_result = mysql_query($section_sql);

				// while ($sql_data = mysql_fetch_assoc($sql_result)) {
				//echo $sql_data['section']."<br/>";
				for ($i = 0; $i < $array_count; $i++) {
					//echo $section_array[1];
					//if($i <= $array_count-1)
					// if (is_valid_section($data["section_id"]) || !is_valid_ba_section($data["section_id"]) || $data["section_id"] == 5) {
					if ($section_array[$i] == $data['section_id']) {
						$cnt = $asso_pending_array[$section_array[$i]];
						//echo $user_id."<br/>";
						$cnt = $cnt + 1;
						$asso_pending_array[$section_array[$i]] = $cnt++;
					}
					// }
				}
				// }
			}

			$grie_sql = "SELECT `uploaded_by`,`section_id`, `gri_upload_date` FROM tbl_grievance WHERE `gri_upload_date` between '" . $frm_date . "' AND '" . $to_date . "' AND `status` != '4'";
			$result = mysql_query($grie_sql, $db_egr);
			while ($data = mysql_fetch_assoc($result)) {
				$user_id = $data['uploaded_by'];
				$DB_date = date_create(date("Y-m-d", strtotime($data['gri_upload_date'])));
				$date_difference = date_diff($DB_date, date_create($to_date));
				$date_gap = $date_difference->format("%a");
				if ($date_gap == 30 || $date_gap >= 28) {
					//echo mysql_affected_rows();
					// $section_sql = "SELECT `section` FROM `tbl_user` WHERE `user_id` = '" . $user_id . "'";
					// $sql_result = mysql_query($section_sql);

					// while ($sql_data = mysql_fetch_assoc($sql_result)) {
					//echo $sql_data['section']."<br/>";
					for ($i = 0; $i < $array_count; $i++) {
						//echo $section_array[1];
						//if($i <= $array_count-1)
						// is_valid_section($value) || !is_valid_ba_section($value) || $value == 5
						// if (is_valid_section($data["section_id"]) || !is_valid_ba_section($data["section_id"]) || $data["section_id"] == 5) {
						if ($section_array[$i] == $data['section_id']) {
							$cnt = $asso_more_array[$section_array[$i]];
							//echo $user_id."<br/>";
							$cnt = $cnt + 1;
							$asso_more_array[$section_array[$i]] = $cnt++;
						}
						// }
					}
					// }
				}
			}
			//echo $grie_sql;
			$data = '';
			$sr_no = 0;
			for ($i = 0; $i < $array_count; $i++) {
				$sr_no = $sr_no + 1;
				// if (is_valid_section($section_array[$i]) && !is_valid_ba_section($section_array[$i]) || $section_array[$i] == 5) {
				$data .= "<tr style='font-size: 15px'>";
				$data .= "<td>" . $sr_no . "</td>";
				$data .= "<td>" . $associate_array_label[$section_array[$i]] . "</td>";
				$data .= "<td style='text-align:center'>" . $associate_array[$section_array[$i]] . "</td>";
				$data .= "<td style='text-align:center'>" . $asso_complied_array[$section_array[$i]] . "</td>";
				$data .= "<td style='text-align:center'>" . $asso_pending_array[$section_array[$i]] . "</td>";
				$data .= "<td style='text-align:center'>" . $asso_more_array[$section_array[$i]] . "</td>";
				$data .= "</tr>";
				// }
			}

			$data .= "<tr style='font-size: 15px'>";
			$data .= "<td></td>";
			$data .= "<td>Total</td>";
			$data .= "<td style='text-align:center'>" . array_sum($associate_array) . "</td>";
			$data .= "<td style='text-align:center'>" . array_sum($asso_complied_array) . "</td>";
			$data .= "<td style='text-align:center'>" . array_sum($asso_pending_array) . "</td>";
			$data .= "<td style='text-align:center'>" . array_sum($asso_more_array) . "</td>";
			$data .= "</tr>";
			echo $data;
			break;
			
	    

		case 'get_category_report':
			$associate_array_label = array();
			$associate_array = array();
			$asso_complied_array = array();
			$asso_pending_array = array();
			$asso_more_array = array();
			$category = implode(",", (array)$_REQUEST['category']);
			$frm_date = date('Y-m-d', strtotime($_REQUEST['frm_date']));
			$to_date = date('Y-m-d', strtotime($_REQUEST['to_date']));
			$section_array = explode(",", $category);
			// print_r($section_array);
			if (in_array(0, $section_array)) {
				// echo "done";
				$query = "select * from category";
				$rstCategory = mysql_query($query, $db_egr);
				while ($rwCategory = mysql_fetch_array($rstCategory)) {
					// print_r($rwCategory);
					$cat_id = $rwCategory["cat_id"];
					if (!in_array($cat_id, $section_array)) {
						array_push($section_array, $cat_id);
					}
				}
			}
			$array_count = count($section_array);
			for ($i = 0; $i < $array_count; $i++) {
				$associate_array_label[$section_array[$i]] = get_category_name($section_array[$i]);
				$associate_array[$section_array[$i]] = 0;
				$asso_complied_array[$section_array[$i]] = 0;
				$asso_pending_array[$section_array[$i]] = 0;
				$asso_more_array[$section_array[$i]] = 0;
			}

			$grie_sql = "SELECT `gri_type`,`section_id` FROM tbl_grievance WHERE `gri_upload_date` between '" . $frm_date . "' AND '" . $to_date . "'";
			$result = mysql_query($grie_sql, $db_egr);

			while ($data = mysql_fetch_assoc($result)) {
				for ($i = 0; $i < $array_count; $i++) {
					if (is_valid_section($data["section_id"])) {
						if ($section_array[$i] == $data['gri_type']) {
							$cnt = $associate_array[$section_array[$i]];
							//echo $section_array[$i];
							$cnt = $cnt + 1;
							$associate_array[$section_array[$i]] = $cnt++;
							// echo $cnt;
						}
					}
				}
			}

			$grie_sql = "SELECT `gri_type`,`section_id` FROM tbl_grievance WHERE `gri_upload_date` between '" . $frm_date . "' AND '" . $to_date . "' AND `status` = '4'";
			$result = mysql_query($grie_sql, $db_egr);

			while ($data = mysql_fetch_assoc($result)) {
				for ($i = 0; $i < $array_count; $i++) {
					//echo $section_array[1];
					//if($i <= $array_count-1)
					if (is_valid_section($data["section_id"])) {
						if ($section_array[$i] == $data['gri_type']) {
							$cnt = $asso_complied_array[$section_array[$i]];
							//echo $user_id."<br/>";
							$cnt = $cnt + 1;
							$asso_complied_array[$section_array[$i]] = $cnt++;
						}
					}
				}
			}

			$grie_sql = "SELECT `gri_type`,`section_id` FROM tbl_grievance WHERE `gri_upload_date` between '" . $frm_date . "' AND '" . $to_date . "' AND `status`!= '4'";
			$result = mysql_query($grie_sql, $db_egr);

			while ($data = mysql_fetch_assoc($result)) {
				for ($i = 0; $i < $array_count; $i++) {
					//echo $section_array[1];
					//if($i <= $array_count-1)
					if (is_valid_section($data["section_id"])) {
						if ($section_array[$i] == $data['gri_type']) {
							$cnt = $asso_pending_array[$section_array[$i]];
							//echo $user_id."<br/>";
							$cnt = $cnt + 1;
							$asso_pending_array[$section_array[$i]] = $cnt++;
						}
					}
				}
			}

			$grie_sql = "SELECT `gri_type`, `gri_upload_date`,`section_id` FROM tbl_grievance WHERE `gri_upload_date` between '" . $frm_date . "' AND '" . $to_date . "' AND `status` != '4'";
			$result = mysql_query($grie_sql, $db_egr);

			while ($data = mysql_fetch_assoc($result)) {
				$DB_date = date_create(date("Y-m-d", strtotime($data['gri_upload_date'])));
				$date_difference = date_diff($DB_date, date_create($to_date));
				$date_gap = $date_difference->format("%a");
				if ($date_gap == 30 || $date_gap >= 28) {
					for ($i = 0; $i < $array_count; $i++) {
						//echo $section_array[1];
						//if($i <= $array_count-1)
						if (is_valid_section($data["section_id"])) {
							if ($section_array[$i] == $data['gri_type']) {
								$cnt = $asso_more_array[$section_array[$i]];
								//echo $user_id."<br/>";
								$cnt = $cnt + 1;
								$asso_more_array[$section_array[$i]] = $cnt++;
							}
						}
					}
				}
			}

			$data = '';
			$sr_no = 0;
			for ($i = 0; $i < $array_count; $i++) {
				if (in_array(0, $section_array)) {
					if ($i != 0) {
						$sr_no = $sr_no + 1;
						$data .= "<tr style='font-size: 15px'>";
						$data .= "<td>" . $sr_no . "</td>";
						$data .= "<td>" . $associate_array_label[$section_array[$i]] . "</td>";
						$data .= "<td style='text-align:center'>" . $associate_array[$section_array[$i]] . "</td>";
						$data .= "<td style='text-align:center'>" . $asso_complied_array[$section_array[$i]] . "</td>";
						$data .= "<td style='text-align:center'>" . $asso_pending_array[$section_array[$i]] . "</td>";
						$data .= "<td style='text-align:center'>" . $asso_more_array[$section_array[$i]] . "</td>";
						$data .= "</tr>";
					}
				} else {
					$sr_no = $sr_no + 1;
					$data .= "<tr style='font-size: 15px'>";
					$data .= "<td>" . $sr_no . "</td>";
					$data .= "<td>" . $associate_array_label[$section_array[$i]] . "</td>";
					$data .= "<td style='text-align:center'>" . $associate_array[$section_array[$i]] . "</td>";
					$data .= "<td style='text-align:center'>" . $asso_complied_array[$section_array[$i]] . "</td>";
					$data .= "<td style='text-align:center'>" . $asso_pending_array[$section_array[$i]] . "</td>";
					$data .= "<td style='text-align:center'>" . $asso_more_array[$section_array[$i]] . "</td>";
					$data .= "</tr>";
				}
			}
			$data .= "<tr style='font-size: 15px'>";
			$data .= "<td></td>";
			$data .= "<td>Total</td>";
			$data .= "<td style='text-align:center'>" . array_sum($associate_array) . "</td>";
			$data .= "<td style='text-align:center'>" . array_sum($asso_complied_array) . "</td>";
			$data .= "<td style='text-align:center'>" . array_sum($asso_pending_array) . "</td>";
			$data .= "<td style='text-align:center'>" . array_sum($asso_more_array) . "</td>";
			$data .= "</tr>";
			echo $data;

			break;

		case 'get_snwi_report':
			$associate_array_label = array();
			$associate_array = array();
			$asso_complied_array = array();
			$asso_pending_array = array();
			$asso_more_array = array();
			$user = implode(",", (array)$_REQUEST['user']);
			$frm_date = date('Y-m-d', strtotime($_REQUEST['frm_date']));
			$to_date = date('Y-m-d', strtotime($_REQUEST['to_date']));
			$section_array = explode(",", $user);
			$array_count = count($section_array);
			for ($i = 0; $i < $array_count; $i++) {
				$associate_array_label[$section_array[$i]] = get_user_name($section_array[$i]);
				$associate_array[$section_array[$i]] = 0;
				$asso_complied_array[$section_array[$i]] = 0;
				$asso_pending_array[$section_array[$i]] = 0;
				$asso_more_array[$section_array[$i]] = 0;
			}

			$grie_sql = "SELECT `uploaded_by` FROM tbl_grievance WHERE `gri_upload_date` between '" . $frm_date . "' AND '" . $to_date . "'";
			$result = mysql_query($grie_sql, $db_egr);

			while ($data = mysql_fetch_assoc($result)) {
				for ($i = 0; $i < $array_count; $i++) {
					if ($section_array[$i] == $data['uploaded_by']) {
						$cnt = $associate_array[$section_array[$i]];
						//echo $section_array[$i];
						$cnt = $cnt + 1;
						$associate_array[$section_array[$i]] = $cnt++;
					}
				}
			}

			$grie_sql = "SELECT `uploaded_by` FROM tbl_grievance WHERE `gri_upload_date` between '" . $frm_date . "' AND '" . $to_date . "' AND `status` = '4'";
			$result = mysql_query($grie_sql, $db_egr);

			while ($data = mysql_fetch_assoc($result)) {
				for ($i = 0; $i < $array_count; $i++) {
					//echo $section_array[1];
					//if($i <= $array_count-1)
					if ($section_array[$i] == $data['uploaded_by']) {
						$cnt = $asso_complied_array[$section_array[$i]];
						//echo $user_id."<br/>";
						$cnt = $cnt + 1;
						$asso_complied_array[$section_array[$i]] = $cnt++;
					}
				}
			}

			$grie_sql = "SELECT `uploaded_by` FROM tbl_grievance WHERE `gri_upload_date` between '" . $frm_date . "' AND '" . $to_date . "' AND `status` != '4'";
			$result = mysql_query($grie_sql, $db_egr);

			while ($data = mysql_fetch_assoc($result)) {
				for ($i = 0; $i < $array_count; $i++) {
					//echo $section_array[1];
					//if($i <= $array_count-1)
					if ($section_array[$i] == $data['uploaded_by']) {
						$cnt = $asso_pending_array[$section_array[$i]];
						//echo $user_id."<br/>";
						$cnt = $cnt + 1;
						$asso_pending_array[$section_array[$i]] = $cnt++;
					}
				}
			}

			$grie_sql = "SELECT `uploaded_by`, `gri_upload_date` FROM tbl_grievance WHERE `gri_upload_date` between '" . $frm_date . "' AND '" . $to_date . "' AND `status` != '4'";
			$result = mysql_query($grie_sql, $db_egr);

			while ($data = mysql_fetch_assoc($result)) {
				$DB_date = date_create(date("Y-m-d", strtotime($data['gri_upload_date'])));
				$date_difference = date_diff($DB_date, date_create($to_date));
				$date_gap = $date_difference->format("%a");
				if ($date_gap == 30 || $date_gap >= 28) {
					for ($i = 0; $i < $array_count; $i++) {
						//echo $section_array[1];
						//if($i <= $array_count-1)
						if ($section_array[$i] == $data['uploaded_by']) {
							$cnt = $asso_more_array[$section_array[$i]];
							//echo $user_id."<br/>";
							$cnt = $cnt + 1;
							$asso_more_array[$section_array[$i]] = $cnt++;
						}
					}
				}
			}

			$data = '';
			for ($i = 0; $i < $array_count; $i++) {
				$sr_no = $i;
				$sr_no = $sr_no + 1;
				$data .= "<tr style='font-size: 15px'>";
				$data .= "<td>" . $sr_no . "</td>";
				$data .= "<td>" . $associate_array_label[$section_array[$i]] . "</td>";
				$data .= "<td style='text-align:center'>" . $associate_array[$section_array[$i]] . "</td>";
				$data .= "<td style='text-align:center'>" . $asso_complied_array[$section_array[$i]] . "</td>";
				$data .= "<td style='text-align:center'>" . $asso_pending_array[$section_array[$i]] . "</td>";
				$data .= "<td style='text-align:center'>" . $asso_more_array[$section_array[$i]] . "</td>";
				$data .= "</tr>";
			}
			$data .= "<tr style='font-size: 15px'>";
			$data .= "<td></td>";
			$data .= "<td>Total</td>";
			$data .= "<td style='text-align:center'>" . array_sum($associate_array) . "</td>";
			$data .= "<td style='text-align:center'>" . array_sum($asso_complied_array) . "</td>";
			$data .= "<td style='text-align:center'>" . array_sum($asso_pending_array) . "</td>";
			$data .= "<td style='text-align:center'>" . array_sum($asso_more_array) . "</td>";
			$data .= "</tr>";
			echo $data;
			break;

		case 'delete_designation_detail':
			$cnt = 0;
			$false = 0;
			$array = $_REQUEST['delete_desig'];
			$collected_id = explode(",", $array);
			$collected_id_count = count($collected_id);
			for ($i = 1; $i < $collected_id_count; $i++) {
				$sql = "DELETE FROM `tbl_designation` WHERE `id` = '" . $collected_id[$i] . "'";
				$result = mysql_query($sql);
				if (mysql_affected_rows() > 0) {
					$cnt++;
				} else {
					$false++;
				}
			}
			if ($false == 0 && $cnt != 0) {
				echo "Record/s deleted.";
			} else if ($false != $cnt) {
				echo "Record/s deleted but some record not deleted.";
			} else {
				echo "Falied to delete records";
			}

			break;

		case 'delete_office_detail':
			$cnt = 0;
			$false = 0;
			$array = $_REQUEST['delete_office'];
			$collected_id = explode(",", $array);
			$collected_id_count = count($collected_id);
			for ($i = 1; $i < $collected_id_count; $i++) {
				$sql = "DELETE FROM `tbl_office` WHERE `office_id` = '" . $collected_id[$i] . "'";
				$result = mysql_query($sql, $db_egr);
				if (mysql_affected_rows() > 0) {
					$cnt++;
				} else {
					$false++;
				}
			}
			if ($false == 0 && $cnt != 0) {
				echo "Record/s deleted.";
			} else if ($false != $cnt) {
				echo "Record/s deleted but some record not deleted.";
			} else {
				echo "Falied to delete records";
			}

			break;

		case 'submit_change_password':
			$sql = "UPDATE `tbl_otp` SET `flag`='0' WHERE `flag` = '' OR `flag` = '1' AND `emp_id` = '" . $_REQUEST['fetch_user_id'] . "' AND otp = '" . $_POST['typed_otp'] . "' ";
			$result = mysql_query($sql, $db_egr);
			//echo mysql_affected_rows();
			//echo $sql;
			if ($result) {
				$change_pass = "UPDATE `tbl_user` SET `password`= '" . $_POST['request_password'] . "' WHERE `user_id` = '" . $_REQUEST['fetch_user_id'] . "'";
				$change_result = mysql_query($change_pass);
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

		case 'get_data_table':
			$data = '<script> $(".display").DataTable();</script>';
			function get_dept($dept_id)
			{
				$query_dept = "select deptname from tbl_department where dept_id='$dept_id'";
				$resultset_dept = mysql_query($query_dept);
				$result_dept = mysql_fetch_array($resultset_dept);
				return $result_dept['deptname'];
			}
			$data .= '<table  class="table table-striped table-bordered display" style="width:100%;">';
			$data .= ' <thead><tr><th></th><th>Designation ID</th><th>Designation Name</th><th>Department Name</th><th>Action</th></tr></thead><tbody>';
			$sql = "SELECT * FROM tbl_designation WHERE dept_id = '" . $_POST['depart_value'] . "'";
			$result = mysql_query($sql);
			while ($retrive = mysql_fetch_array($result)) {
				$data .= "<tr><td><input type='checkbox' id='" . $retrive['id'] . "' name='" . $retrive['id'] . "'/></td>";
				$data .= "<td>" . $retrive['id'] . "</td>";
				$data .= "<td>" . $retrive['designation'] . "</td>";
				$data .= "<td>" . get_dept($retrive['dept_id']) . "</td>";
				$data .= "<td><a href='#' ><i class='fa fa-pencil-square btn-edit' style='font-size:20px;color:black;margin-left:20px;' data-toggle='modal' data-target='#edit_cat' id=" . $retrive['id'] . "></i></a><a href='#'><i class='fa fa-trash btn-delete' style='font-size:20px;color:red;margin-left:10px;'  data-toggle='modal' data-target='#delete_cat' id=" . $retrive['id'] . "></i></a></td></tr>";
			}
			$data .= '  </tbody></table>';
			echo $data;
			break;


		case 'get_employee_details':
			$data = '';
			$sql = "SELECT * FROM `employee` where id='" . $_POST['update_employee_hidden_id'] . "'";
			$sql_row = mysql_query($sql);
			while ($sql_res = mysql_fetch_assoc($sql_row)) {
				$data .= "" . $sql_res['emp_type'] . "$" . $sql_res['emp_id'] . "$" . $sql_res['emp_name'] . "$" . $sql_res['emp_dept'] . "$" . $sql_res['emp_desig'] . "$" . $sql_res['emp_mob'] . "$" . $sql_res['emp_email'] . "$" . $sql_res['emp_aadhar'] . "$" . $sql_res['emp_address1'] . "$" . $sql_res['emp_address2'] . "$" . $sql_res['emp_state'] . "$" . $sql_res['emp_city'] . "$" . $sql_res['office_emp_address1'] . "$" . $sql_res['office_emp_address2'] . "$" . $sql_res['office_emp_state'] . "$" . $sql_res['office_emp_city'] . "$" . $sql_res['emp_pincode'] . "$" . $sql_res['office_emp_pincode'] . "";
			}
			echo $data;
			break;

		case 'get_data':
			$data = '';
			$query = mysql_query("SELECT * FROM tbl_user where section='" . $_POST['sec_val'] . "' and status='active'");
			while ($sql_res = mysql_fetch_assoc($query)) {
				$data .= "<option value='" . $sql_res['user_id'] . "'>" . $sql_res['user_name'] . "</option>";
			}
			echo $data;
			break;

		case 'get_office_detail':
			$data = '';
			$sql = "select * from `tbl_office` where office_id='" . $_POST['hidden'] . "'";
			$sql_result = mysql_query($sql, $db_egr);
			while ($fetch_result = mysql_fetch_assoc($sql_result)) {
				$data .= "" . $fetch_result['office_name'] . "$" . $fetch_result['office_desc'] . "$" . $fetch_result["deptname"];
			}
			echo $data;
			break;

		case 'get_category_detail':
			$data = '';
			$sql = "select * from `category` where cat_id='" . $_POST['hidden'] . "'";
			$sql_result = mysql_query($sql, $db_egr);
			while ($fetch_result = mysql_fetch_assoc($sql_result)) {
				$data .= "" . $fetch_result['cat_name'] . "$" . $fetch_result['cat_desc'] . "";
			}
			echo $data;
			break;

		case 'get_designation_detail':
			$data = '';
			$sql = "select * from `tbl_designation` where id='" . $_POST['hidden'] . "'";
			$sql_result = mysql_query($sql);
			$fetch_result = mysql_fetch_assoc($sql_result);
			$data['designation'] = $fetch_result['designation'];
			$data['dept_ids'] = get_all_department($fetch_result['dept_id']);
			echo json_encode($data);
			break;

		case 'get_section_detail':
			$data = '';
			$sql = "select * from `tbl_section` where sec_id='" . $_POST['hidden'] . "'";
			$sql_result = mysql_query($sql, $db_egr);
			while ($fetch_result = mysql_fetch_assoc($sql_result)) {
				$data .= "" . $fetch_result['sec_name'] . "$" . $fetch_result['sec_desc'] . "$" . $fetch_result['is_branch_admin'];
			}
			echo $data;
			break;

		case 'get_city':
			$data = '';
			$query = mysql_query("SELECT * FROM cities where state_id='" . $_POST['state_hidden_id'] . "'");
			while ($sql_res = mysql_fetch_assoc($query)) {
				$data .= "" . $sql_res['city_name'] . "$" . "";
			}
			echo $data;
			break;

		case 'get_city1':
			$data = '';
			$query = mysql_query("SELECT * FROM cities where state_id='" . $_POST['state_hidden_id1'] . "'");
			while ($sql_res = mysql_fetch_assoc($query)) {
				$data .= "" . $sql_res['city_name'] . "$" . "";
			}
			echo $data;
			break;

		case 'update_user':
			$update = $_REQUEST['update'];
			$sql_fetch = mysql_query("select * from tbl_user where user_id='$update'", $db_egr);
			$rows = "";
			while ($fetch_sql = mysql_fetch_array($sql_fetch)) {
				//echo $fetch_sql['emp_id'];
				// $user_desig = get_desig($fetch_sql['user_desg']);
				// $section = get_section($fetch_sql['section']);
				// $office = get_office($fetch_sql['user_office']);
				// $station = get_station($fetch_sql['user_station']);
				// $fetch_user_dept = get_user_dept($fetch_sql['user_dept']);
				// $rows = [
				// 	"emp_id" => $fetch_sql['emp_id'],
				// 	"user_name" => $fetch_sql['user_name'],
				// 	"section" => $section,
				// 	"user_dept" => $fetch_user_dept,
				// 	"user_desg" => $user_desig,
				// 	"user_mob" => $fetch_sql['user_mob'],
				// 	"user_email" => $fetch_sql['user_email'],
				// 	"user_aadhar" => $fetch_sql['user_aadhar'],
				//  "user_office" => $office,
				// 	"user_station" => $station,
				// 	"username" => $fetch_sql['username'],
				// 	"password" => $fetch_sql['password'],
				// ];
				$sectiondata = explode(",", $fetch_sql["section"]);
				$section = (count($sectiondata) > 1) ? $sectiondata : $fetch_sql["section"];
				$rows = [
					"role" => $fetch_sql["role"],
					"emp_id" => $fetch_sql['emp_id'],
					"user_name" => $fetch_sql['user_name'],
					"section" => $section,
					"user_dept" => $fetch_sql["user_dept"],
					"user_desg" => $fetch_sql["user_desg"],
					"user_mob" => $fetch_sql['user_mob'],
					"user_email" => $fetch_sql['user_email'],
					"user_aadhar" => $fetch_sql['user_aadhar'],
					"user_office" => $fetch_sql["user_office"],
					"user_station" => $fetch_sql["user_station"],
					"username" => $fetch_sql['username'],
					"password" => $fetch_sql['password'],
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
			/**********reminder code*********************/
		case 'update_rem':
			if (isset($_REQUEST['rem_id'])) {
				$rm_id = $_REQUEST['rem_id'];
				$rem_id = $_REQUEST['rem_id'];
				$sql = mysql_query("update reminder set status='1' where rem_id='$rem_id'");
			}
			echo $rm_id;
			break;
			/**********end reminder code*********************/
// 		case 'get_emp_user_data':
// 			// print_r($_REQUEST);
// 			$Result = array("res" => "fail");
// 			$emp_id = $_REQUEST["emp_id"];
// 			$sql = "select name,mobile,emp_email,emp_aadhar,department,designation,station,office from register_user where emp_no='$emp_id'";
// 			$rst_emp = mysql_query($sql, $db_common);
// 			if (mysql_num_rows($rst_emp) > 0) {
// 				$Result["res"] = "success";
// 				while ($rw_emp = mysql_fetch_array($rst_emp)) {
// 					// print_r($rw_emp);
// 					extract($rw_emp);
// 					$data = array("emp_name" => $name, "emp_mobile" => $mobile, "emp_email" => $emp_email, "emp_aadhar" => $emp_aadhar, "emp_department" => $department, "emp_designation" => $designation, "emp_station" => $station, "emp_office" => $office);
// 					$Result["data"] = $data;
// 				}
// 			}
// 			echo json_encode($Result);
// 			break;

        case 'get_emp_user_data':
            // print_r($_REQUEST);
            $Result = array("res" => "fail");
            $emp_id = $_REQUEST["emp_id"];
            $sql_out = "select * from tbl_user where emp_id='$emp_id'";
            $rst_user = mysql_query($sql_out, $db_egr);
            if (mysql_num_rows($rst_user) > 0) {
                $Result["res"] = "Registered";
                $Result["message"] = "Already Registered!";
            } else {
                $sql = "select name,mobile,emp_email,emp_aadhar,department,designation,station,office,dob from register_user where emp_no='$emp_id'";
                $rst_emp = mysql_query($sql, $db_common);
                if (mysql_num_rows($rst_emp) > 0) {
                    $Result["res"] = "success";
                    while ($rw_emp = mysql_fetch_array($rst_emp)) {
                        // print_r($rw_emp);
                        extract($rw_emp);
                        $pass = str_replace('/', "", $dob);
                        $data = array("emp_no" => $emp_id, "emp_name" => $name, "emp_mobile" => $mobile, "emp_email" => $emp_email, "emp_aadhar" => $emp_aadhar, "emp_department" => $department, "emp_designation" => $designation, "emp_station" => $station, "emp_office" => $office, "dob" => $dob, "pass" => $pass);
                        $Result["data"] = $data;
                    }
                }
            }
            echo json_encode($Result);
            break;
            
	}
}

if (isset($_GET['action'])) {
	switch (strtolower($_GET['action'])) {
			/******Add Employee Details***********/
		case 'add_employee':
			if (add_employee($_POST['emp_type'], $_POST['emp_id'], $_POST['emp_name'], $_POST['emp_dept'], $_POST['emp_desig'], $_POST['emp_mob'], $_POST['emp_email'], $_POST['emp_aadhar'], $_POST['emp_address1'], $_POST['emp_address2'], $_POST['emp_state'], $_POST['emp_city'], $_POST['office_emp_address1'], $_POST['office_emp_address2'], $_POST['office_emp_state'], $_POST['office_emp_city'], $_POST['emp_pincode'], $_POST['office_emp_pincode'])) {
				echo "<script>window.location.href='employee_registration.php';alert('You Are Registered Successfully'); </script>";
			} else {
				echo "<script>window.location.href='employee_registration.php';alert('Registration Failed'); </script>";
			}
			break;

		case 'update_employee':
			if (update_employee($_POST['up_emp_type'], $_POST['up_emp_id'], $_POST['up_emp_name'], $_POST['up_emp_dept'], $_POST['up_emp_desig'], $_POST['up_emp_mob'], $_POST['up_emp_email'], $_POST['up_emp_aadhar'], $_POST['up_emp_address1'], $_POST['up_emp_address2'], $_POST['up_emp_state'], $_POST['up_emp_city'], $_POST['up_office_emp_address1'], $_POST['up_office_emp_address2'], $_POST['up_office_emp_state'], $_POST['up_office_emp_city'], $_POST['up_emp_pincode'], $_POST['up_office_emp_pincode'], $_POST['update_employee_hidden_id'])) {
				echo "<script>window.location.href='employee_list.php';alert('Employee Updated Successfully'); </script>";
			} else {
				echo "<script>window.location.href='employee_list.php';alert('Updation Failed'); </script>";
			}

			break;

		case 'delete_employee':

			if (isset($_POST['delete_employee_hidden_id'])) {
				if (delete_employee($_POST['delete_employee_hidden_id'])) {

					echo "<script>window.location.href='employee_list.php';alert('Deleted Successfully');</script>";
				} else {
					echo "<script>window.location.href='Employee.php';alert('Deletion Failed');</script>";
				}
			}
			break;

		case 'add_category':
			if (add_category($_POST['cat_name'], $_POST['cat_desc'])) {
				echo "<script>window.location.href='category.php';alert('Category Added Successfully'); </script>";
			} else {
				echo "<script>window.location.href='category.php';alert('Category Not Inserted'); </script>";
			}
			break;

		case 'edit_category':
			if (edit_category($_POST['md_cat_name'], $_POST['md_cat_desc'], $_POST['hidden_id'])) {
				echo "<script>window.location.href='category.php';alert('Record Updated Successfully'); </script>";
			} else {
				echo "<script>window.location.href='category.php';alert('Record Not updated'); </script>";
			}
			break;

		case 'delete_category':
			if (isset($_POST['hidden_id_delete'])) {
				if (delete_category($_POST['hidden_id_delete'])) {

					echo "<script>window.location.href='category.php';alert('Record Deleted Successfully');</script>";
				} else {
					echo "<script>window.location.href='category.php';alert('Record Not Deleted');</script>";
				}
			}
			break;

		case 'add_designation':
			if (add_designation($_POST['des_name'], $_POST['deptname'])) {
				echo "<script>window.location.href='designation.php';alert('Successfully Added Successfully'); </script>";
			} else {
				echo "<script>window.location.href='designation.php';alert('Designation Not Added'); </script>";
			}
			break;

		case 'edit_designation':
			if (edit_designation($_POST['md_des_name'], $_POST['updatedeptid'], $_POST['hidden_id'])) {
				echo "<script>window.location.href='designation.php';alert('Record Updated Successfully'); </script>";
			} else {
				echo "<script>window.location.href='designation.php';alert('Record Not updated'); </script>";
			}
			break;

		case 'delete_designation':
			if (isset($_POST['hidden_id_delete'])) {
				if (delete_designation($_POST['hidden_id_delete'])) {

					echo "<script>window.location.href='designation.php';alert('Record Deleted Successfully');</script>";
				} else {
					echo "<script>window.location.href='designation.php';alert('Record Not Deleted');</script>";
				}
			}
			break;

		case 'add_section':
			// print_r($_REQUEST);
			if (add_section($_POST['sec_name'], $_POST['sec_desc'], $_POST["is_BA_section"])) {
				echo "<script>window.location.href='section.php';alert('Section Added Successfully');</script>";
			} else {
				echo "<script>window.location.href='section.php';alert('Adding section Failed');</script>";
			}
			break;
		case 'edit_section':
			// print_r($_POST);
			$is_BA_section = $_POST["md_is_BA_section"];
			if (edit_section($_POST['md_sec_name'], $_POST['md_sec_desc'], $_POST['hidden_id'], $is_BA_section)) {
				echo "<script>window.location.href='section.php';alert('Record Updated Successfully'); </script>";
			} else {
				echo "<script>window.location.href='section.php';alert('Record Not updated'); </script>";
			}
			break;


		case 'delete_section':

			if (isset($_POST['hidden_id_delete'])) {
				if (delete_section($_POST['hidden_id_delete'])) {

					echo "<script>window.location.href='section.php';alert('Section Deleted Successfully');</script>";
				} else {
					echo "<script>window.location.href='section.php';alert('Section Not Deleted');</script>";
				}
			}
			break;

		case 'add_user':
			if (check_user($_POST['emp_id'], $_POST['user_mob'])) {
				echo "<script>window.location.href='user_reg.php';alert('User is Already Registered');</script>";
			} else {
				// print_r($_POST);
				// echo "\n";
				$section = is_array($_POST["section"]) ? implode(',', $_POST["section"]) : $_POST["section"];
				// echo $section;
				if (add_user($_POST['emp_id'], $_POST['user_name'], $section, $_POST['user_dept'], $_POST['user_desig'], $_POST['user_mob'], $_POST['user_email'], $_POST['user_aadhar'], $_POST['user_office'], $_POST['user_station'], $_POST['login_name'], $_POST['login_pass'], $_POST['usertype'])) {
					echo "<script>window.location.href='user_reg.php';alert('User Created Successfully');</script>";
				} else {
					echo "<script>window.location.href='user_reg.php';alert('User Not Created');</script>";
				}
			}


			break;

		case 'add_welfare':
			if (check_user($_POST['emp_id'], $_POST['user_mob'])) {
				echo "<script>window.location.href='user_reg.php';alert('User is Already Registered');</script>";
			} else {
				if (add_welfare($_POST['emp_id'], $_POST['user_name'], $_POST['section'], $_POST['user_dept'], $_POST['user_desig'], $_POST['user_mob'], $_POST['user_email'], $_POST['user_aadhar'], $_POST['user_office'], $_POST['user_station'], $_POST['login_name'], $_POST['login_pass'])) {
					echo "<script>window.location.href='user_reg.php';alert('Welfare inspector Created Successfully');</script>";
				} else {
					echo "<script>window.location.href='user_reg.php';alert('User Not Created');</script>";
				}
			}


			break;
			///image upload on main admin code
		case 'forward_grievance':

			// print_r($_REQUEST);
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
			if (isset($_POST['chk_transfer_other_bo'])) {
				$auth = $_POST["lstOtherBO"];
				$section = 0;
			} else {
				$auth = $_POST["auth"];
				$section = isset($_POST["section"]) ? $_POST["section"] : 0;
			}
			// echo $auth;
			if (forward_grievance($name_array, $tmp_name_array, $_POST['griv_ref_no'], $_POST['emp_id'], $_POST['hidden_id'], $auth, $_POST['remark'], $_POST['action'], $section)) {
				echo "<script>window.location.href='gri_comp.php';alert('Grievance Forwarded Successfully');</script>";
			} //window.location.href='gri_comp.php';
			else {
				echo "<script>window.location.href='gri_comp.php';alert('Grievance Not Forwarded');</script>";
			}

			break;

		case 'forward_grievance_wel':
			// print_r($_REQUEST);
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
			if (isset($_POST['chk_transfer_other_bo'])) {
				$auth = $_POST["lstOtherBO"];
			} else {
				$auth = $_POST["auth"];
			}
			// echo $auth;
			$section = isset($_POST["section"]) ? $_POST["section"] : 0;
			if (forward_grievance_wel($name_array, $tmp_name_array, $_POST['griv_ref_no'], $_POST['emp_id'], $_POST['hidden_id'], $auth, $_POST['remark'], $_POST['action'], $section)) {
				echo "<script>window.location.href='gri_comp.php';alert('Grievance Forwarded Successfully');</script>";
			} //window.location.href='gri_comp.php';
			else {
				echo "<script>window.location.href='gri_comp.php';alert('Grievance Not Forwarded');</script>";
			}

			break;



		case 'return_back_action':
			print_r($_POST);
			$mobile = $_POST["emp_mob"];
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
			// print_r($_POST);
			$action = $_POST['action'];
			$section = isset($_POST["section"]) ? $_POST["section"] : 0;
			if (return_back_action($name_array, $tmp_name_array, $_POST['griv_ref_no'], $_POST['emp_id'], $_POST['hidden_id'], $_POST['auth'], $_POST['remark'], $action, $mobile, $section)) {
				if ($action == 3) {
					echo "<script>window.location.href='returned_back.php';alert('Grievance Closed Successfully');</script>";
				} else {

					echo "<script>window.location.href='returned_back.php';alert('Grievance Returned Successfully');</script>";
				}
			} //window.location.href='returned_back.php';
			else {
				echo "<script>window.location.href='returned_back.php';alert('Grievance Not Returned');</script>";
			}

			break;
		case 'active_user':
			if (active_user($_POST['hidden_active'])) {
				echo "<script>window.location.href='user_list.php';alert('User Activated Successfully');</script>";
			} else {
				echo "<script>window.location.href='user_list.php';alert('User Activation Failed');</script>";
			}

			break;
		case 'deactive_user':
			if (deactive_user($_POST['hidden_deactive'])) {
				echo "<script>window.location.href='user_list.php';alert('User Deactivated Successfully');</script>";
			} else {
				echo "<script>window.location.href='user_list.php';alert('User Deactivation Failed');</script>";
			}
			break;
		case 'update_user_modal':
			// print_r($_REQUEST);
			$section = is_array($_POST["section"]) ? implode(',', $_POST["section"]) : $_POST["section"];

			if (update_user_modal($_POST['emp_id'], $_POST['user_name'], $section, $_POST['user_dept'], $_POST['user_desig'], $_POST['user_mob'], $_POST['user_email'], $_POST['user_aadhar'], $_POST['user_office'], $_POST['user_station'], $_POST['hidden_update'], $_POST['usertype'])) {
				echo "<script>window.location.href='user_list.php';alert('User Updated Successfully');</script>";
			} else {
				echo "<script>window.location.href='user_list.php';alert('User Updation Failed');</script>";
			}
			break;

			//office categoary 
		case 'add_office':
			if (add_office($_POST['off_cat_name'], $_POST['off_cat_desc'], $_POST['deptname'])) {
				echo "<script>window.location.href='office_cat.php';alert('Office data added Successfully'); </script>";
			} else {
				echo "<script>window.location.href='office_cat.php';alert('Office not Inserted'); </script>";
			}
			break;

		case 'edit_office':
			// print_r($_POST);
			if (edit_office($_POST['md_off_name'], $_POST['md_off_desc'], $_POST['hidden_id'], $_POST["md_off_dept"])) {
				echo "<script>window.location.href='office_cat.php';alert('Record Updated Successfully'); </script>";
			} else {
				echo "<script>window.location.href='office_cat.php';alert('Record Not updated'); </script>";
			}
			break;

		case 'delete_office':

			if (isset($_POST['hidden_id_delete'])) {
				if (delete_office($_POST['hidden_id_delete'])) {

					echo "<script>window.location.href='office_cat.php';alert('Record Deleted Successfully');</script>";
				} else {
					echo "<script>window.location.href='office_cat.php';alert('Record Not Deleted');</script>";
				}
			}
			break;
	}
}