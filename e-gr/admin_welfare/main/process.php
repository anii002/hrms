<?php
//error_reporting(0);
require('config.php');
if (isset($_REQUEST['action'])) {
	switch (strtolower($_REQUEST['action'])) {
			// !20-09-2019
		case 'ba_wise_sum_report':
			// print_r($_REQUEST);
			// print_r($_POST);

			$branchuser = implode(",", (array) $_REQUEST['user']);
			$frm_date = date('Y-m-d', strtotime($_REQUEST['frm_date']));
			$to_date = date('Y-m-d', strtotime($_REQUEST['to_date']));
			$branchadminuser_array = explode(",", $branchuser);
			$all = '0';
			if (in_array($all, $branchadminuser_array)) {
				$query = "select * from tbl_user";
				$rstbranchuser = mysql_query($query, $db_egr);
				while ($rwbranchuser = mysql_fetch_array($rstbranchuser)) {
					$role_user = explode(",", $rwbranchuser["role"]);
					if (in_array("5", $role_user)) {
						$user_id = $rwbranchuser["user_id"];
						if (!in_array($user_id, $branchadminuser_array)) {
							array_push($branchadminuser_array, $user_id);
						}
					}
				}
			}
			$total_array = array();
			$total_completed_array = array();
			$total_pending_completes_array = array();
			$total_pending_more_array = array();
			$sr = 1;
			foreach ($branchadminuser_array as $key => $value) {
				// echo "Key=>" . $key . "Value=>" . $value;
				$total_gr = 0;
				$total_completed = 0;
				$total_pending_completes = 0;
				$total_pending_more = 0;
				if ($value == 0) {
					continue;
				}
				$username = getUsername($value);

				$sql = "SELECT e.`gri_upload_date`,e.`gri_target_date`,e.`status` FROM `tbl_grievance` e INNER JOIN tbl_grievance_forward e_f ON e.gri_ref_no= e_f.griv_ref_no WHERE e_f.user_id_forwarded='$value' ";
				$rstRecord = mysql_query($sql, $db_egr);
				$Result = array("res" => "fail");
				if (mysql_num_rows($rstRecord) > 0) {
					while ($rwRecords = mysql_fetch_array($rstRecord)) {
						extract($rwRecords);
						// print_r($rwRecords);
						$total_gr++;
						if ($status == 4) {
							$total_completed++;
						}
						if ($status == 2 || $status == 3) {
							$DB_date = date_create(date("Y-m-d", strtotime($gri_upload_date)));
							$date_difference = date_diff($DB_date, date_create($to_date));
							$date_gap = $date_difference->format("%a");
							if ($date_gap == 30 || $date_gap >= 28) {
								$total_pending_more++;
							} else {
								$total_pending_completes++;
							}
						}
					}
				}
				array_push($total_array, $total_gr);
				array_push($total_completed_array, $total_completed);
				array_push($total_pending_completes_array, $total_pending_completes);
				array_push($total_pending_more_array, $total_pending_more);

				echo "<tr>
						<td>$sr</td>
						<td>$username</td>
						<td>$total_gr</td>
						<td>$total_completed</td>
						<td>$total_pending_completes</td>
						<td>$total_pending_more</td>
					</tr>";
				$sr++;
			}
			echo "<tr>
			<td></td>
			<td>Total</td>
			<td>" . array_sum($total_array) . "</td>
			<td>" . array_sum($total_completed_array) . "</td>
			<td>" . array_sum($total_pending_completes_array) . "</td>
			<td>" . array_sum($total_pending_more_array) . "</td>
		</tr>";

			break;

		case 'get_section_report':
			// print_r($_REQUEST);
			$associate_array_label = array();
			$associate_array = array();
			$asso_complied_array = array();
			$asso_pending_array = array();
			$asso_more_array = array();
			$section = implode(",", (array) $_REQUEST['section']);
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
						// var_dump(isAdmin());
						if ($_SESSION["SESSION_ROLE"] == 2) {
							if ($rwSection["is_branch_admin"] != 1) {
								array_push($section_array, $sec_id);
							}
						} else {
							if (is_valid_ba_section($sec_id)) {
								array_push($section_array, $sec_id);
							}
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

			$grie_sql = "SELECT `uploaded_by`,`section_id`,`status`,`emp_id` FROM tbl_grievance WHERE DATE(`gri_upload_date`) BETWEEN '" . $frm_date . "' AND '" . $to_date . "'";
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
				// print_r($data);
				for ($i = 0; $i < $array_count; $i++) {
					//echo $section_array[1];

					//if($i <= $array_count-1)
					if ($section_array[$i] == $data['section_id']) {
						if ($i == 0) {
							$emp_id = $data["emp_id"];
							$sql_check_emp = "SELECT * FROM `register_user` WHERE emp_no='$emp_id'";
							$rst_emp_check = mysql_query($sql_check_emp, $db_common);
							if (mysql_num_rows($rst_emp_check) > 0) {
								if ($data["status"] == 1) {
									$cnt = $associate_array[$section_array[$i]];
									//echo $section_array[$i];
									$cnt = $cnt + 1;
									$associate_array[$section_array[$i]] = $cnt++;
								}
							}
						} else {
							$cnt = $associate_array[$section_array[$i]];
							//echo $section_array[$i];
							$cnt = $cnt + 1;
							$associate_array[$section_array[$i]] = $cnt++;
						}
					}
				}
			}

			$grie_sql = "SELECT g.id,g.uploaded_by,g.section_id, g.gri_upload_date,g.status,f.user_id FROM tbl_grievance g JOIN tbl_grievance_forward f  ON g.gri_ref_no=f.griv_ref_no WHERE g.gri_upload_date between '" . $frm_date . "' AND '" . $to_date . "' AND g.status='4' group by g.id";
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

			$grie_sql = "SELECT g.uploaded_by,g.section_id, g.gri_upload_date,g.status,f.user_id FROM tbl_grievance g JOIN  tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no WHERE g.gri_upload_date between '" . $frm_date . "' AND '" . $to_date . "' AND g.status IN ('1','2','3') group by g.id";
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

						if ($i == 0) {
							if ($data["status"] == 1) {
								$cnt = $asso_pending_array[$section_array[$i]];
								//echo $section_array[$i];
								$cnt = $cnt + 1;
								$asso_pending_array[$section_array[$i]] = $cnt++;
							}
						} else {
							$cnt = $asso_pending_array[$section_array[$i]];
							//echo $user_id."<br/>";
							$cnt = $cnt + 1;
							$asso_pending_array[$section_array[$i]] = $cnt++;
						}
					}
					// }
				}
				// }
			}

			$grie_sql = "SELECT `uploaded_by`,`section_id`, `status`,`gri_upload_date` FROM tbl_grievance WHERE DATE(`gri_upload_date`) between '" . $frm_date . "' AND '" . $to_date . "' AND `status` != '4'";
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
							if ($i == 0) {
								if ($data["status"] == 1) {
									$cnt = $asso_more_array[$section_array[$i]];
									//echo $user_id."<br/>";
									$cnt = $cnt + 1;
									$asso_more_array[$section_array[$i]] = $cnt++;
								}
							} else {
								$cnt = $asso_more_array[$section_array[$i]];
								//echo $user_id."<br/>";
								$cnt = $cnt + 1;
								$asso_more_array[$section_array[$i]] = $cnt++;
							}
						}
						// }
					}
					// }
				}
			}
			// print_r($asso_more_array);
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

		case 'get_snwi_report':
			$associate_array_label = array();
			$associate_array = array();
			$asso_complied_array = array();
			$asso_pending_array = array();
			$asso_more_array = array();
			$user = implode(",", (array) $_REQUEST['user']);
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

		case 'get_category_report':
			$associate_array_label = array();
			$associate_array = array();
			$asso_complied_array = array();
			$asso_pending_array = array();
			$asso_more_array = array();
			$category = implode(",", (array) $_REQUEST['category']);
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
			//! 21-09-2019

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
			$sql = mysql_query("select * from register_user where emp_no='$emp_id'", $db_common);
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
