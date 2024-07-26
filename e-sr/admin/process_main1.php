<?php
include('create_log.php');
include_once('../dbconfig/dbcon.php');
include('mini_function.php');
include('fetch_all_column.php');
error_reporting(0);
session_start();
$conn = dbcon1();
if (isset($_REQUEST['action'])) {
	switch (strtolower($_REQUEST['action'])) {


		case 'upload_leave_doc':

			$name_array = "";
			$tmp_name_array = "";
			$cnt = 0;

			$name_array = $_FILES['doc_file']['name'];
			$tmp_name_array = $_FILES['doc_file']['tmp_name'];

			$pf_number = $_POST['doc_pf_no'];
			$count = 0;

			$folder_name = "upload_scanned_doc/";

			if (is_dir("upload_scanned_doc/" . $pf_number . "/leave_account")) {
			} else {
				mkdir("upload_scanned_doc/" . $pf_number . "/leave_account");
			}
			$folder_name = "upload_scanned_doc/" . $pf_number . "/leave_account/";


			$temp = explode(".", $name_array);
			$newfilename = rand(1000, 99999) . '.' . end($temp);

			$q = mysqli_query($conn, "select count from leave_account where pf_number='$pf_number' order by id desc limit 1");
			$f = mysqli_fetch_array($q);
			if ($f['count'] != "") {
				$count = $f['count'] + 1;
			} else {
				$count = $count + 1;
			}

			$year = $_POST['year'];

			$sql_img = mysqli_query($conn, "insert into leave_account(pf_number,doc_name,count,updated_date,uploaded_by,year) values('$pf_number','$newfilename','$count',CURRENT_TIMESTAMP,'1','$year')") or die(mysqli_error($conn));

			$action = "Inserted Record in Leave Account Table";
			$action_on = $pf_number;
			create_log($action, $action_on);

			if ($sql_img) {
				move_uploaded_file($tmp_name_array, $folder_name . $newfilename);
				echo "<script>alert('Documents Uploaded Successfully');window.location='leave_upload.php';</script>";
			} else {
				echo "<script>alert('Documents NOT Uploaded');window.location='leave_upload.php';</script>";
			}
			break;




		case 'upload_doc':

			$name_array = "";
			$tmp_name_array = "";
			$cnt = 0;

			if ($_FILES['doc_file']['error'][0] != 4) {
				$cnt = count($_FILES['doc_file']['name']);
				for ($i = 0; $i < $cnt; $i++) {
					$name_array[$i] = $_FILES['doc_file']['name'][$i];
					$tmp_name_array[$i] = $_FILES['doc_file']['tmp_name'][$i];
				}
			}

			$name_array = $_FILES['doc_file']['name'];
			$tmp_name_array = $_FILES['doc_file']['tmp_name'];

			$pf_number = $_POST['doc_pf_no'];
			$count = 0;

			$folder_name = "upload_scanned_doc/";

			if (is_dir("upload_scanned_doc/" . $pf_number)) {
			} else {
				mkdir("upload_scanned_doc/" . $pf_number);
			}
			$folder_name = "upload_scanned_doc/" . $pf_number . "/";

			for ($i = 0; $i < count($tmp_name_array); $i++) {


				$temp = explode(".", $name_array[$i]);
				$newfilename = rand(1000, 99999) . '.' . end($temp);

				$q = mysqli_query($conn, "select count from sr_doc where pf_number='$pf_number' order by id desc limit 1");
				$f = mysqli_fetch_array($q);
				if ($f['count'] != "") {
					$count = $f['count'] + 1;
				} else {
					$count = $count + 1;
				}


				$sql_img = mysqli_query($conn, "insert into sr_doc(pf_number,doc_name,count,update_date,uploaded_by) values('$pf_number','$newfilename','$count',CURRENT_TIMESTAMP,'1')") or die(mysqli_error($conn));

				$action = "Inserted Record in SR Doc Table";
				$action_on = $pf_number;
				create_log($action, $action_on);

				if ($sql_img) {
					move_uploaded_file($tmp_name_array[$i], $folder_name . $newfilename);
					echo "<script>alert('Documents Uploaded Successfully');window.location='doc_upload.php';</script>";
				} else {
					echo "<script>alert('Documents NOT Uploaded');window.location='doc_upload.php';</script>";
				}
			}
			break;

		case 'get_prft_promotion_2':
			$data = [];
			$prft_pf_no = $_POST['prft_pf_no'];
			$prft_id = $_POST['prft_id'];

			$qry = mysqli_query($conn, "SELECT * from prft_promotion_temp where pro_pf_no='$prft_pf_no' and id='$prft_id'");
			while ($fetch = mysqli_fetch_assoc($qry)) {
				$data['pro_pf_no'] = $fetch['pro_pf_no'];
				$data['pro_order_type'] = $fetch['pro_order_type'];
				$data['pro_letter_no'] = $fetch['pro_letter_no'];
				$data['pro_letter_date'] = date('d-m-Y', strtotime($fetch['pro_letter_date']));
				$data['pro_wef'] = date('d-m-Y', strtotime($fetch['pro_wef']));
				$data['pro_frm_dept'] = $fetch['pro_frm_dept'];
				$data['pro_frm_desig'] = $fetch['pro_frm_desig'];
				$data['pro_frm_othr_desig'] = $fetch['pro_frm_othr_desig'];
				$data['pro_frm_pay_scale_type'] = get_all_pay_scale_type($fetch['pro_frm_pay_scale_type']);
				$data['pro_frm_scale'] = get_all_scale($fetch['pro_frm_scale'], $fetch['pro_frm_pay_scale_type']);
				$data['pro_frm_level'] = fetch_all_level($fetch['pro_frm_level']);
				$data['pro_frm_group'] = $fetch['pro_frm_group'];
				$data['pro_frm_station'] = $fetch['pro_frm_station'];
				$data['pro_frm_othr_station'] = $fetch['pro_frm_othr_station'];
				$data['pro_frm_billunit'] = get_billunit($fetch['pro_frm_billunit']);
				$data['pro_frm_depot'] = get_depot($fetch['pro_frm_depot']);
				$data['pro_to_dept'] = $fetch['pro_to_dept'];
				$data['pro_to_desig'] = $fetch['pro_to_desig'];
				$data['pro_to_othr_desig'] = $fetch['pro_to_othr_desig'];
				$data['pro_to_pay_scale_type'] = get_all_pay_scale_type($fetch['pro_to_pay_scale_type']);
				$data['pro_to_scale'] = get_all_scale($fetch['pro_to_scale'], $fetch['pro_to_pay_scale_type']);
				$data['pro_to_level'] = fetch_all_level($fetch['pro_to_level']);
				$data['pro_to_group'] = $fetch['pro_to_group'];
				$data['pro_to_station'] = $fetch['pro_to_station'];
				$data['pro_to_othr_station'] = $fetch['pro_to_othr_station'];
				$data['pro_frm_rop'] = $fetch['pro_frm_rop'];
				$data['rop_to'] = $fetch['rop_to'];
				$data['pro_to_billunit'] = get_billunit($fetch['pro_to_billunit']);
				$data['pro_to_depot'] = get_depot($fetch['pro_to_depot']);
				$data['pro_carried_out_type'] = $fetch['pro_carried_out_type'];
				$data['pro_carri_wef'] = date('d-m-Y', strtotime($fetch['pro_carri_wef']));
				$data['pro_carri_date_of_incr'] = date('d-m-Y', strtotime($fetch['pro_carri_date_of_incr']));
				$data['pro_car_re_accept_ltr_no'] = $fetch['pro_car_re_accept_ltr_no'];
				$data['pro_car_re_accept_ltr_date'] = date('d-m-Y', strtotime($fetch['pro_car_re_accept_ltr_date']));
				$data['pro_car_re_wef_date'] = date('d-m-Y', strtotime($fetch['pro_car_re_wef_date']));
				$data['pro_car_re_remark'] = $fetch['pro_car_re_remark'];
				//getting ID
				$data['pro_frm_ps'] = $fetch['pro_frm_pay_scale_type'];
				$data['pro_to_ps'] = $fetch['pro_to_pay_scale_type'];
				$data['pro_to_scale_value'] = $fetch['pro_to_pay_scale_type'];
				$data['dep_scale_value'] = $fetch['pro_to_scale'];
				// geting billunit id
				$data['pro_frm_billunit_value'] = $fetch['pro_frm_billunit'];
				$data['pro_to_billunit_value'] = $fetch['pro_to_billunit'];
				$data['pro_remark'] = $fetch['pro_remark'];
			}
			echo json_encode($data);
			break;

		case 'get_prft_reversion2':
			$data = [];
			$prft_pf_no = $_POST['prft_pf_no'];
			$prft_id = $_POST['prft_id'];
			$qry = mysqli_query($conn, "SELECT * from prft_reversion_temp where rev_pf_no = '$prft_pf_no' and id='$prft_id'");

			while ($fetch = mysqli_fetch_assoc($qry)) {

				$data['rev_order_type'] = $fetch['rev_order_type'];
				$data['rev_letter_no'] = $fetch['rev_letter_no'];
				$data['rev_letter_date'] = date('d-m-Y', strtotime($fetch['rev_letter_date']));
				$data['rev_wef'] = date('d-m-Y', strtotime($fetch['rev_wef']));
				$data['rev_frm_dept'] = $fetch['rev_frm_dept'];
				$data['rev_frm_desig'] = $fetch['rev_frm_desig'];
				$data['rev_frm_othr_desig'] = $fetch['rev_frm_othr_desig'];
				$data['rev_frm_pay_scale_type'] = get_all_pay_scale_type($fetch['rev_frm_pay_scale_type']);
				$data['rev_frm_scale'] = get_all_scale($fetch['rev_frm_scale'], $fetch['rev_frm_pay_scale_type']);
				$data['rev_frm_level'] = fetch_all_level($fetch['rev_frm_level']);
				$data['rev_frm_group'] = $fetch['rev_frm_group'];
				$data['rev_frm_station'] = $fetch['rev_frm_station'];
				$data['rev_frm_othr_station'] = $fetch['rev_frm_othr_station'];
				$data['rev_frm_billunit'] = get_billunit($fetch['rev_frm_billunit']);
				$data['rev_frm_depot'] = get_depot($fetch['rev_frm_depot']);
				$data['rev_to_dept'] = $fetch['rev_to_dept'];
				$data['rev_to_desig'] = $fetch['rev_to_desig'];
				$data['rev_to_othr_desig'] = $fetch['rev_to_othr_desig'];
				$data['rev_to_pay_scale_type'] = get_all_pay_scale_type($fetch['rev_to_pay_scale_type']);
				$data['rev_to_scale'] = get_all_scale($fetch['rev_to_scale'], $fetch['rev_to_pay_scale_type']);
				$data['rev_to_level'] = fetch_all_level($fetch['rev_to_level']);
				$data['rev_to_group'] = $fetch['rev_to_group'];
				$data['rev_to_station'] = $fetch['rev_to_station'];
				$data['rev_to_othr_station'] = $fetch['rev_to_othr_station'];
				$data['rev_frm_rop'] = $fetch['rev_frm_rop'];
				$data['rev_to_rop'] = $fetch['rev_to_rop'];
				$data['rev_to_billunit'] = get_billunit($fetch['rev_to_billunit']);
				$data['rev_to_depot'] = get_depot($fetch['rev_to_depot']);
				$data['rev_carried_out_type'] = $fetch['rev_carried_out_type'];
				$data['rev_carri_wef'] = date('d-m-Y', strtotime($fetch['rev_carri_wef']));
				$data['rev_carri_date_of_incr'] = date('d-m-Y', strtotime($fetch['rev_carri_date_of_incr']));
				$data['rev_car_re_accept_ltr_no'] = $fetch['rev_car_re_accept_ltr_no'];
				$data['rev_car_re_accept_ltr_date'] = date('d-m-Y', strtotime($fetch['rev_car_re_accept_ltr_date']));

				$data['rev_car_re_wef_date'] = date('d-m-Y', strtotime($fetch['rev_car_re_wef_date']));

				$data['rev_car_re_remark'] = $fetch['rev_car_re_remark'];
				$data['rev_frm_billunit_value'] = $fetch['rev_frm_billunit'];
				$data['rev_to_billunit_value'] = $fetch['rev_to_billunit'];

				$data['frm_ps_value'] = $fetch['rev_frm_pay_scale_type'];
				$data['to_ps_type'] = $fetch['rev_to_pay_scale_type'];
				$data['rev_remark'] = $fetch['rev_remark'];
			}
			echo json_encode($data);
			break;

		case 'get_prft_transfer':
			$conn = dbcon1();
			$prft_pf_no = $_POST['prft_pf_no'];
			$prft_id = $_POST['prft_id'];

			$data = '';
			$sql = mysqli_query($conn, "select * from prft_transfer_temp where trans_pf_no='$prft_pf_no' and id='$prft_id'");

			$sql_fetch = mysqli_num_rows($sql);

			if ($sql_fetch > 0) {
				while ($result = mysqli_fetch_array($sql)) {

					$data['trans_order_type'] = get_all_order_type_transfer($result['trans_order_type']);
					$data['trans_letter_no'] = $result['trans_letter_no'];
					$data['trans_letter_date'] = date('d-m-Y', strtotime($result['trans_letter_date']));
					//$data['ps_type']=$result['ps_type'];
					$data['trans_wef'] = date('d-m-Y', strtotime($result['trans_wef']));

					$data['trans_frm_dept'] = fetch_all_dept($result['trans_frm_dept']);
					$data['trans_frm_desig'] = fetch_all_desig($result['trans_frm_desig']);
					$data['trans_frm_othr_desig'] = $result['trans_frm_othr_desig'];
					$data['trans_frm_pay_scale_type'] = get_all_pay_scale_type($result['trans_frm_pay_scale_type']);
					$data['payscaletype'] = $result['trans_frm_pay_scale_type'];
					$data['trans_frm_scale'] = get_all_scale($result['trans_frm_scale'], $result['trans_frm_pay_scale_type']);
					$data['trans_frm_level'] = fetch_all_level($result['trans_frm_level']);
					$data['trans_frm_group'] = fetch_all_group($result['trans_frm_group']);
					$data['trans_frm_station'] = $result['trans_frm_station'];
					$data['trans_frm_othr_station'] = $result['trans_frm_othr_station'];
					$data['trans_frm_rop'] = $result['trans_frm_rop'];
					$data['trans_frm_billunit'] = get_billunit($result['trans_frm_billunit']);
					$data['trans_frm_depot'] = get_depot($result['trans_frm_depot']);
					$data['trans_frm_bill'] = $result['trans_frm_billunit'];
					$data['stationto'] = $result['trans_frm_station'];

					$data['trans_to_dept'] = fetch_all_dept($result['trans_to_dept']);
					$data['trans_to_desig'] = fetch_all_desig($result['trans_to_desig']);
					$data['trans_to_othr_desig'] = $result['trans_to_othr_desig'];
					$data['trans_to_pay_scale_type'] = get_all_pay_scale_type($result['trans_to_pay_scale_type']);
					$data['payscaletypeto'] = $result['trans_to_pay_scale_type'];

					$data['trans_to_scale'] = get_all_scale($result['trans_to_scale'], $result['trans_to_pay_scale_type']);
					$data['trans_to_level'] = fetch_all_level($result['trans_to_level']);
					$data['trans_to_group'] = fetch_all_group($result['trans_to_group']);
					$data['trans_to_station'] = $result['trans_to_station'];
					$data['trans_to_othr_station'] = $result['trans_to_othr_station'];
					$data['trans_to_rop'] = $result['trans_to_rop'];
					$data['trans_to_billunit'] = get_billunit($result['trans_to_billunit']);
					$data['trans_to_bill'] = $result['trans_to_billunit'];
					$data['trans_to_depot'] = get_depot($result['trans_to_depot']);
					$data['stationfrm'] = $result['trans_to_station'];

					$data['trans_carried_out_type'] = $result['trans_carried_out_type'];
					//Yes
					$data['trans_carri_wef'] = date('d-m-Y', strtotime($result['trans_carri_wef']));
					$data['trans_carri_date_of_incr'] = date('d-m-Y', strtotime($result['trans_carri_date_of_incr']));
					//No
					$data['trans_car_re_accept_ltr_no'] = $result['trans_car_re_accept_ltr_no'];
					$data['trans_car_re_accept_ltr_date'] = date('d-m-Y', strtotime($result['trans_car_re_accept_ltr_date']));
					$data['trans_car_re_wef_date'] = date('d-m-Y', strtotime($result['trans_car_re_wef_date']));
					$data['trans_car_re_remark'] = $result['trans_car_re_remark'];
					$data['trans_remark'] = $result['trans_remark'];
				}
			} else {
				$data = "";
			}
			echo json_encode($data);
			break;


			//fixation process_main

		case 'get_prft_fixtion':
			$conn = dbcon1();
			$prft_pf_no = $_POST['prft_pf_no'];
			$prft_id = $_POST['prft_id'];
			$data = '';
			$sql = mysqli_query($conn, "select * from prft_fixation_temp where fix_pf_no='$prft_pf_no' and id='$prft_id'");

			$sql_fetch = mysqli_num_rows($sql);
			if ($sql_fetch > 0) {
				while ($result = mysqli_fetch_array($sql)) {

					$data['fix_order_type'] = get_all_order_type_fixation($result['fix_order_type']);
					$data['fix_letter_no'] = $result['fix_letter_no'];
					$data['fix_letter_date'] = date('d-m-Y', strtotime($result['fix_letter_date']));

					$data['fix_wef'] = date('d-m-Y', strtotime($result['fix_wef']));
					$data['fix_remark'] = $result['fix_remark'];

					$data['fix_frm_rop'] = $result['fix_frm_rop'];
					$data['fix_frm_ps_type'] = get_all_pay_scale_type($result['fix_frm_ps_type']);
					$data['pay_scale_to'] = $result['fix_frm_ps_type'];
					$data['fix_frm_scale'] = get_all_scale($result['fix_frm_scale'], $result['fix_frm_ps_type']);
					$data['fix_frm_level'] = fetch_all_level($result['fix_frm_level']);

					$data['fix_to_rop'] = $result['fix_to_rop'];
					$data['fix_to_ps_type'] = get_all_pay_scale_type($result['fix_to_ps_type']);
					$data['pay_scale_frm'] = $result['fix_to_ps_type'];
					$data['fix_to_scale'] = get_all_scale($result['fix_to_scale'], $result['fix_to_ps_type']);
					$data['fix_to_level'] = get_all_scale($result['fix_to_level'], $result['fix_to_ps_type']);

					$data['fix_carried_out_type'] = $result['fix_carried_out_type'];

					$data['fix_carri_wef'] = date('d-m-Y', strtotime($result['fix_carri_wef']));
					$data['fix_carri_date_of_incr'] = date('d-m-Y', strtotime($result['fix_carri_date_of_incr']));


					$data['fix_car_re_accept_ltr_no'] = $result['fix_car_re_accept_ltr_no'];
					$data['fix_car_re_accept_ltr_date'] = date('d-m-Y', strtotime($result['fix_car_re_accept_ltr_date']));
					$data['fix_car_re_wef_date'] = date('d-m-Y', strtotime($result['fix_car_re_wef_date']));
					$data['fix_car_re_remark'] = $result['fix_car_re_remark'];
				}
			} else {
				$data[] = "";
			}
			echo json_encode($data);
			break;


			// Get PRFT Promotion
		case 'get_prft_promotion':
			$data = '';
			$prft_pf_no = $_POST['prft_pf_no'];
			$prft_id = $_POST['prft_id'];


			$qry = mysqli_query($conn, "SELECT * from prft_promotion_temp where pro_pf_no='$prft_pf_no' and id='$prft_id'");
			while ($fetch = mysqli_fetch_assoc($qry)) {
				$data .= "" . $fetch['pro_pf_no'] . "$" . $fetch['pro_order_type'] . "$" . $fetch['pro_letter_no'] . "$" . $fetch['pro_letter_date'] . "$" . $fetch['pro_wef'] . "$" . $fetch['pro_frm_dept'] . "$" . $fetch['pro_frm_desig'] . "$" . $fetch['pro_frm_othr_desig'] . "$" . get_all_pay_scale_type($fetch['pro_frm_pay_scale_type']) . "$" . $fetch['pro_frm_scale'] . "$" . $fetch['pro_frm_level'] . "$" . $fetch['pro_frm_group'] . "$" . $fetch['pro_frm_station'] . "$" . $fetch['pro_frm_othr_station'] . "$" . get_billunit($fetch['pro_frm_billunit']) . "$" . get_depot($fetch['pro_frm_depot']) . "$" . $fetch['pro_to_dept'] . "$" . $fetch['pro_to_desig'] . "$" . $fetch['pro_to_othr_desig'] . "$" . get_all_pay_scale_type($fetch['pro_to_pay_scale_type']) . "$" . $fetch['pro_to_scale'] . "$" . $fetch['pro_to_level'] . "$" . $fetch['pro_to_group'] . "$" . $fetch['pro_to_station'] . "$" . $fetch['pro_to_othr_station'] . "$" . $fetch['pro_frm_rop'] . "$" . $fetch['rop_to'] . "$" . get_billunit($fetch['pro_to_billunit']) . "$" . get_depot($fetch['pro_to_depot']) . "$" . $fetch['pro_carried_out_type'] . "$" . $fetch['pro_carri_wef'] . "$" . $fetch['pro_carri_date_of_incr'] . "$" . $fetch['pro_car_re_accept_ltr_no'] . "$" . $fetch['pro_car_re_accept_ltr_date'] . "$" . $fetch['pro_car_re_wef_date'] . "$" . $fetch['pro_car_re_remark'] . "$" . $fetch['pro_frm_billunit'] . "$" . $fetch['pro_to_billunit'] . "$" . $fetch['pro_frm_pay_scale_type'] . "$" . $fetch['pro_to_pay_scale_type'] . "$" . get_all_scale($fetch['pro_frm_scale'], $fetch['pro_frm_pay_scale_type']) . "$" . get_all_scale($fetch['pro_frm_level'], $fetch['pro_frm_pay_scale_type']) . "$" . get_all_scale($fetch['pro_to_scale'], $fetch['pro_to_pay_scale_type']) . "$" . get_all_scale($fetch['pro_to_level'], $fetch['pro_to_pay_scale_type']) . "";
			}
			echo $data;
			break;

			// Get PRFT Reversion
		case 'get_prft_reversion':
			$data = '';
			$prft_pf_no = $_POST['prft_pf_no'];
			$prft_id = $_POST['prft_id'];
			$qry = mysqli_query($conn, "SELECT * from prft_reversion_temp where rev_pf_no = '$prft_pf_no' and id='$prft_id'");
			//echo mysqli_error();
			while ($fetch = mysqli_fetch_assoc($qry)) {
				$data .= "" . "$" . $fetch['rev_order_type'] . "$" . $fetch['rev_letter_no'] . "$" . $fetch['rev_letter_date'] . "$" . $fetch['rev_wef'] . "$" . $fetch['rev_frm_dept'] . "$" . $fetch['rev_frm_desig'] . "$" . $fetch['rev_frm_othr_desig'] . "$" . get_all_pay_scale_type($fetch['rev_frm_pay_scale_type']) . "$" . $fetch['rev_frm_scale'] . "$" . $fetch['rev_frm_level'] . "$" . $fetch['rev_frm_group'] . "$" . $fetch['rev_frm_station'] . "$" . $fetch['rev_frm_othr_station'] . "$" . get_billunit($fetch['rev_frm_billunit']) . "$" . get_depot($fetch['rev_frm_depot']) . "$" . $fetch['rev_to_dept'] . "$" . $fetch['rev_to_desig'] . "$" . $fetch['rev_to_othr_desig'] . "$" . get_all_pay_scale_type($fetch['rev_to_pay_scale_type']) . "$" . $fetch['rev_to_scale'] . "$" . $fetch['rev_to_level'] . "$" . $fetch['rev_to_group'] . "$" . $fetch['rev_to_station'] . "$" . $fetch['rev_to_othr_station'] . "$" . $fetch['rev_frm_rop'] . "$" . $fetch['rev_to_rop'] . "$" . get_billunit($fetch['rev_to_billunit']) . "$" . get_depot($fetch['rev_to_depot']) . "$" . $fetch['rev_carried_out_type'] . "$" . $fetch['rev_carri_wef'] . "$" . $fetch['rev_carri_date_of_incr'] . "$" . $fetch['rev_car_re_accept_ltr_no'] . "$" . $fetch['rev_car_re_accept_ltr_date'] . "$" . $fetch['rev_car_re_wef_date'] . "$" . $fetch['rev_car_re_remark'] . "$" . $fetch['rev_frm_billunit'] . "$" . $fetch['rev_to_billunit'] . "$" . get_all_scale($fetch['rev_frm_scale'], $fetch['rev_frm_pay_scale_type']) . "$" . get_all_scale($fetch['rev_frm_level'], $fetch['rev_frm_pay_scale_type']) . "$" . get_all_scale($fetch['rev_to_scale'], $fetch['rev_to_pay_scale_type']) . "$" . get_all_scale($fetch['rev_to_level'], $fetch['rev_to_pay_scale_type']) . "$" . $fetch['rev_frm_pay_scale_type'] . "$" . $fetch['rev_to_pay_scale_type'] . "$" . $fetch['rev_to_pay_scale_type'] . "";
			}
			echo $data;
			break;

		case 'update_property':
			$fetch_pre = mysqli_query($conn, "select * from property_temp where pro_pf_number='" . $_POST['pd_pf_no'] . "'");
			$pre_result = mysqli_num_rows($fetch_pre);

			session_start();

			$hidden_prt_count = $_POST['pro_count'];
			if ($hidden_prt_count == "") {
				$hidden_prt_count = $pre_result;
			}
			$update_by = $_SESSION['id'];
			date_default_timezone_set('Asia/Kolkata');
			$trans_id = date('dmYHis');
			$pro_pf_no = $_POST['pd_pf_no'];
			$count = 0;


			for ($i = 1; $i <= $hidden_prt_count; $i++) {
				$property_update_id = $_POST['property_update_id' . $i];
				$pro_type = $_POST['pd_pro_type' . $i];
				$pro_item = $_POST['pd_item_name' . $i];
				$pro_otheritem = $_POST['pd_othr_item_name' . $i];
				$pro_make = $_POST['pd_make_model' . $i];
				$pro_dop = date('Y-m-d', strtotime($_POST['pd_dop' . $i]));
				$pro_location = $_POST['pd_location' . $i];
				$pro_regno = $_POST['pd_reg_no' . $i];
				$pro_area = $_POST['pd_area' . $i];
				$pro_surveyno = $_POST['pd_sur_no' . $i];
				$pro_cost = $_POST['pd_total_cost' . $i];
				$src = $_REQUEST['pd_sourcr_type' . $i];
				$pro_sourcetype = implode(',', $src);

				$amount = $_POST['pd_source_amt' . $i];
				$pro_amount = implode(',', $amount);

				$pro_letter_no = $_POST['pd_letter_no' . $i];
				$pro_letterdate = date('Y-m-d', strtotime($_POST['pd_letter_date' . $i]));
				$pro_remark = $_POST['prop_remark' . $i];


				if ($i > $pre_result) {
					$sq = mysqli_query($conn, "select count from `property_temp` where `pro_pf_number`='$pro_pf_no' order by id desc limit 1");
					$fetch = mysqli_fetch_array($sq);
					if ($fetch['count'] == "") {
						$count = $count + 1;
					} else {
						$count = $fetch['count'] + 1;
					}

					$sql1 = ("insert into `property_temp` (`temp_transaction_id`,`zone`,`division`,`pro_pf_number`,`pro_oldpf_number`,`pro_type`,`pro_item`,`pro_otheritem`,`pro_make`,`pro_dop`,`pro_location`,`pro_regno`,`pro_area`,`pro_surveyno`,`pro_cost`,`pro_source`,`pro_sourcetype`,`pro_amount`,`pro_letterno`,`pro_letterdate`,`pro_remark`,`updated_by`,`date_time`,`updated_fields`,`updated_reason`,`updated_datetime`,`letter_no`,`letter_datetime`,`uploaded_letter`,`approved_status`,`approved_by`,`approved_datetime`,`count`)values('$trans_id',01,'SUR','$pro_pf_no','','$pro_type','$pro_item','$pro_otheritem','$pro_make','$pro_dop','$pro_location','$pro_regno','$pro_area','$pro_surveyno','$pro_cost','$pro_source','$pro_sourcetype','$pro_amount','$pro_letter_no','$pro_letterdate','$pro_remark','$update_by',Now(),'','','','','','','','','','$count')");


					$sql2 = ("insert into `property_track` (`zone`,`division`,`temp_transaction_id`,`final_transaction_id`,`pro_pf_number`,`pro_oldpf_number`,`pro_type`,`pro_item`,`pro_otheritem`,`pro_make`,`pro_dop`,`pro_location`,`pro_regno`,`pro_area`,`pro_surveyno`,`pro_cost`,`pro_source`,`pro_sourcetype`,`pro_amount`,`pro_letterno`,`pro_letterdate`,`pro_remark`,`updated_by`,`date_time`,`updated_fields`,`updated_reason`,`updated_datetime`,`letter_no`,`letter_datetime`,`uploaded_letter`,`approved_status`,`approved_by`,`approved_datetime`,`count`)values(01,'SUR','$trans_id','$trans_id','$pro_pf_no','','$pro_type','$pro_item','$pro_otheritem','$pro_make','$pro_dop','$pro_location','$pro_regno','$pro_area','$pro_surveyno','$pro_cost','$pro_source','$pro_sourcetype','$pro_amount','$pro_letter_no','$pro_letterdate','$pro_remark','$update_by',Now(),'','','','','','','','','','$count')");

					$result1 = mysqli_query($conn, $sql1);
					$result2 = mysqli_query($conn, $sql2);

					$action = "Inserted Record in Property Temp and in Property Track";
				} else {
					$conn = dbcon1();
					$sq = mysqli_query($conn, "SELECT * from property_temp where pro_pf_number='" . $pro_pf_no . "' and id='" . $property_update_id . "'");
					//echo "SELECT * from property_temp where pro_pf_number='".$pro_pf_no."' and id='".$property_update_id."'".mysqli_error();

					if ($sq) {

						while ($fetch_sql = mysqli_fetch_array($sq)) {
							if ($pro_type == $fetch_sql['pro_type'] && $pro_item == $fetch_sql['pro_item'] && $pro_otheritem == $fetch_sql['pro_otheritem'] && $pro_make == $fetch_sql['pro_make'] && $pro_dop == $fetch_sql['pro_dop'] && $pro_location == $fetch_sql['pro_location'] && $pro_regno == $fetch_sql['pro_regno'] && $pro_area == $fetch_sql['pro_area'] && $pro_surveyno == $fetch_sql['pro_surveyno'] && $pro_cost == $fetch_sql['pro_cost'] && $pro_sourcetype == $fetch_sql['pro_sourcetype'] && $pro_amount == $fetch_sql['pro_amount'] && $pro_letter_no == $fetch_sql['pro_letterno'] && $pro_letterdate == $fetch_sql['pro_letterdate'] && $pro_remark == $fetch_sql['pro_remark']) {
								echo "<script>alert('No Field Has Been Changed')</script>";
							} else {
								$sq = mysqli_query($conn, "select count from `property_temp` where `pro_pf_number`='$pro_pf_no' and id='$property_update_id'");
								$fetch = mysqli_fetch_array($sq);
								if ($fetch['count'] == "") {
									$count = $count + 1;
								} else {
									$count = $fetch['count'];
								}
								/* echo "<script>alert('inside else')</script>";
							
							echo $pro_type."<>".$fetch_sql['pro_type']."<br>";
							echo $pro_item."<>".$fetch_sql['pro_item']."<br>";
							echo $pro_otheritem."<>".$fetch_sql['pro_otheritem']."<br>";
							echo $pro_make."<>".$fetch_sql['pro_make']."<br>";
							echo $pro_dop."<>".$fetch_sql['pro_dop']."<br>";
							echo $pro_location."<>".$fetch_sql['pro_location']."<br>";
							echo $pro_regno."<>".$fetch_sql['pro_regno']."<br>";
							echo $pro_area."<>".$fetch_sql['pro_area']."<br>";
							echo $pro_surveyno."<>".$fetch_sql['pro_surveyno']."<br>";
							echo $pro_cost."<>".$fetch_sql['pro_cost']."<br>";
							//echo $src."<>".$fetch_sql['pro_source']."<br>";
							echo $pro_sourcetype."<>".$fetch_sql['pro_sourcetype']."<br>";
							echo $pro_amount."<>".$fetch_sql['pro_amount']."<br>";
							echo $pro_letter_no."<>".$fetch_sql['pro_letterno']."<br>";
							echo $pro_letterdate."<>".$fetch_sql['pro_letterdate']."<br>";
							echo $pro_remark."<>".$fetch_sql['pro_remark']."<br>"; */

								$sql1 = "insert into `property_track` (`zone`,`division`,`temp_transaction_id`,`final_transaction_id`,`pro_pf_number`,`pro_type`,`pro_item`,`pro_otheritem`,`pro_make`,`pro_dop`,`pro_location`,`pro_regno`,`pro_area`,`pro_surveyno`,`pro_cost`,`pro_source`,`pro_sourcetype`,`pro_amount`,`pro_letterno`,`pro_letterdate`,`pro_remark`,`updated_by`,`date_time`,`updated_fields`,`updated_reason`,`updated_datetime`,`letter_no`,`letter_datetime`,`uploaded_letter`,`approved_status`,`approved_by`,`approved_datetime`,`count`)values(01,'SUR','$trans_id','$trans_id','$pro_pf_no','$pro_type','$pro_item','$pro_otheritem','$pro_make','$pro_dop','$pro_location','$pro_regno','$pro_area','$pro_surveyno','$pro_cost','$pro_source','$pro_sourcetype','$pro_amount','$pro_letter_no','$pro_letterdate','$pro_remark','$update_by',Now(),'','','','','','','','','','$count')";

								$result1 = mysqli_query($conn, $sql1);

								$action = "Updated Record in Property Temp and Inserted Record in Property Track";
							}
						}
					}


					$sql2 = "UPDATE `property_temp` SET `temp_transaction_id`='$trans_id',`zone`='01',`division`='SUR',`pro_pf_number`='$pro_pf_no',`pro_type`='$pro_type',`pro_item`='$pro_item',`pro_otheritem`='$pro_otheritem',`pro_make`='$pro_make',`pro_dop`='$pro_dop',`pro_location`='$pro_location',`pro_regno`='$pro_regno',`pro_area`='$pro_area',`pro_surveyno`='$pro_surveyno',`pro_cost`='$pro_cost',`pro_source`='$pro_source',`pro_sourcetype`='$pro_sourcetype',`pro_amount`='$pro_amount',`pro_letterno`='$pro_letter_no',`pro_letterdate`='$pro_letterdate',`pro_remark`='$pro_remark',`updated_by`='$update_by',`date_time`=Now() WHERE pro_pf_number='$pro_pf_no' and id='$property_update_id'";


					$result2 = mysqli_query($conn, $sql2);
				}
			}
			if ($result1 && $result2) {
				$action_on = $pro_pf_no;
				create_log($action, $action_on);
				echo "<script>window.location='property_update.php';alert('Updated Successfully');</script>";
			} else {
				echo "<script>window.location='property_update.php';alert('NOT Updated');</script>";
			}
			break;

			//update training case code

		case 'update_training':
			$fetch_pre = mysqli_query($conn, "select * from training_temp where pf_number='" . $_POST['tr_pf_no'] . "'");
			$pre_result = mysqli_num_rows($fetch_pre);
			session_start();

			$hidden_tr_count = $_POST['training_count'];
			if ($hidden_tr_count == "") {
				$hidden_tr_count = $pre_result;
			}

			date_default_timezone_set('Asia/Kolkata');
			$trans_id = date('dmYHis');
			$tra_pf_no = $_POST['tr_pf_no'];
			$update_by = $_SESSION['id'];

			for ($i = 1; $i <= $hidden_tr_count; $i++) {
				$tra_type = $_POST['tr_training_status' . $i];
				$inst = $_POST['tr_inst' . $i];
				$tr_dept = $_POST['tr_dept' . $i];
				$tr_desig = $_POST['tr_desig' . $i];
				$tra_last_date = date('Y-m-d', strtotime($_POST['tra_last_date' . $i]));
				$tra_due_date = date('Y-m-d', strtotime($_POST['tra_due_date' . $i]));
				$tra_from = date('Y-m-d', strtotime($_POST['tra_training_from' . $i]));
				$tra_to = date('Y-m-d', strtotime($_POST['tra_training_to' . $i]));
				$tra_letter_no = $_POST['tr_ltr_no' . $i];
				$tra_letter_date = date('Y-m-d', strtotime($_POST['tr_ltr_date' . $i]));
				$tra_desc = $_POST['tr_desc' . $i];
				$tra_remarks = $_POST['tr_remark' . $i];
				$hidden_training = $_POST['hidden_training' . $i];


				if ($i > $pre_result) {
					$count = 0;
					$f_c = mysqli_query($conn, "select count from training_temp where pf_number='" . $tra_pf_no . "' order by id desc limit 1");
					$res = mysqli_fetch_array($f_c);
					if ($res['count'] == "") {
						$count++;
						//echo "if".$count."<br>";
					} else {
						$count = $res['count'] + 1;
						//echo "else".$count."<br>";
					}


					$sql1 = "insert into `training_track`(`zone`, `division`, `temp_transaction_id`, `final_transaction_id`, `pf_number`, `last_date`, `training_from`, `letter_no`, `description`, `remarks`, `training_type`,`tr_inst`,`tr_dept`,`tr_desig`, `due_date`, `training_to`, `letter_date`, `updated_by`, `date_time`, `updated_fields`, `updated_reason`,`uploaded_status`, `updated_datetime`, `letter_number`, `letter_datetime`, `uploaded_letter`, `approved_by`, `approved_datetime`,`count`)values('01','SUR','$trans_id','$trans_id','$tra_pf_no','$tra_last_date','$tra_from','$tra_letter_no','$tra_desc','$tra_remarks','$tra_type','$inst','$tr_dept','$tr_desig','$tra_due_date','$tra_to','$tra_letter_date','$update_by',Now(),'','','','','','','','','','$count')";

					$sql2 = "insert into `training_temp`(`zone`, `division`, `temp_transaction_id`, `pf_number`, `last_date`, `training_from`, `letter_no`, `description`, `remarks`, `training_type`,`tr_inst`,`tr_dept`,`tr_desig`, `due_date`, `training_to`, `letter_date`, `updated_by`, `date_time`, `updated_fields`, `updated_reason`,`uploaded_status`, `updated_datetime`, `letter_number`, `letter_datetime`, `uploaded_letter`, `approved_by`, `approved_datetime`,`count`)values('01','SUR','$trans_id','$tra_pf_no','$tra_last_date','$tra_from','$tra_letter_no','$tra_desc','$tra_remarks','$tra_type','$inst','$tr_dept','$tr_desig','$tra_due_date','$tra_to','$tra_letter_date','$update_by',Now(),'','','','','','','','','','$count')";

					$action = "Inserted Record in Training Temp and in Training Track";

					$result1 = mysqli_query($conn, $sql1);
					$result2 = mysqli_query($conn, $sql2);
				} else {
					//   echo "f_sql:";
					$f_sql = "select count from training_temp where pf_number='" . $tra_pf_no . "' and id='" . $hidden_training . "'";
					// echo "<br>";
					$f_q = mysqli_query($conn, $f_sql);
					$re = mysqli_fetch_array($f_q);
					$count = $re['count'];
					$count = ($count == NULL) ? "" : $count;
					// echo "cnt:".$count."<br>";

					$conn = dbcon1();
					$sq = mysqli_query($conn, "SELECT * from training_temp where pf_number='" . $tra_pf_no . "' and id='" . $hidden_training . "'");

					if ($sq) {

						while ($fetch_sql = mysqli_fetch_array($sq)) {
							if ($tra_type == $fetch_sql['training_type'] && $inst == $fetch_sql['tr_inst'] && $tr_dept == $fetch_sql['tr_dept'] && $tr_desig == $fetch_sql['tr_desig'] && $tra_last_date == $fetch_sql['last_date'] && $tra_due_date == $fetch_sql['due_date'] && $tra_from == $fetch_sql['training_from'] && $tra_to == $fetch_sql['training_to'] && $tra_letter_no == $fetch_sql['letter_no'] && $tra_letter_date == $fetch_sql['letter_date']  && $tra_desc == $fetch_sql['description'] && $tra_remarks == $fetch_sql['remarks']) {
								// echo "<script>alert('No Field Has Been Changed')</script>";
							} else {
								//echo "<script>alert('inside else')</script>";
								$sql1 = "insert into `training_track`(`zone`, `division`, `temp_transaction_id`, `final_transaction_id`, `pf_number`, `last_date`, `training_from`, `letter_no`, `description`, `remarks`, `training_type`,`tr_inst`,`tr_dept`,`tr_desig`, `due_date`, `training_to`, `letter_date`, `updated_by`, `date_time`, `updated_fields`, `updated_reason`,`uploaded_status`, `updated_datetime`, `letter_number`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`)values('01','SUR','$trans_id','$trans_id','$tra_pf_no','$tra_last_date','$tra_from','$tra_letter_no','$tra_desc','$tra_remarks','$tra_type','$inst','$tr_dept','$tr_desig','$tra_due_date','$tr_tra_to','$tra_letter_date','$update_by',Now(),'','','','','','','','','','','$count')";

								$result1 = mysqli_query($conn, $sql1);

								$action = "Updated Record in Training Temp and Inserted Record in Training Track";
							}
						}
					}

					// echo "cnt:".$count."<br>";
					$sql2 = "UPDATE `training_temp` SET `temp_transaction_id`='$trans_id',`zone`='01',`division`='SUR',`pf_number`='$tra_pf_no',`old_pf_number`='',`last_date`='$tra_last_date',`training_type`='$tra_type',`tr_inst`='$inst',`tr_dept`='$tr_dept',`tr_desig`='$tr_desig',`due_date`='$tra_due_date',`training_from`='$tra_from',`training_to`='$tra_to',`letter_no`='$tra_letter_no',`letter_date`='$tra_letter_date',`description`='$tra_desc',`remarks`='$tra_remarks',`updated_by`='$update_by',`date_time`=Now(), `count`='$count' WHERE pf_number='$tra_pf_no' and id='$hidden_training'";

					$result2 = mysqli_query($conn, $sql2);
				}
			}
			// 			echo "rst1:";
			// 			var_dump($result1);
			// 			echo "<br>";
			// 			echo "rst2:";
			// 			var_dump($result2);
			// 			echo "<br>";
			// 			echo mysqli_error();
			if ($result1 && $result2) {
				$action_on = $tra_pf_no;
				create_log($action, $action_on);
				echo "<script>window.location='training_update.php';alert('Updated Successfully');</script>";
			} else {
				echo "<script>window.location='training_update.php';alert('No Field Has Been Changed! NOT Updated');</script>";
			}
			break;


		case 'update_penalty':
			$conn = dbcon1();

			$fetch_pre = mysqli_query($conn, "select * from penalty_temp where pen_pf_number='" . $_POST['penalty_pf_no'] . "'");
			$pre_result = mysqli_num_rows($fetch_pre);
			session_start();

			$hidden_pen_count = $_POST['penalty_count'];
			if ($hidden_pen_count == "") {
				$hidden_pen_count = $pre_result;
			}
			date_default_timezone_set('Asia/Kolkata');
			$trans_id = date('dmYHis');

			$update_by = $_SESSION['id'];

			$pen_pf_no = $_POST['penalty_pf_no'];

			$count = 0;
			$s = mysqli_query($conn, "select * from penalty_temp where pen_pf_number='" . $_POST['penalty_pf_no'] . "' ORDER BY id DESC");
			$rs = mysqli_num_rows($s);
			if ($rs > 0) {
				$re = mysqli_fetch_array($s);
				$count = $re['count'] + 1;
			}

			for ($i = 1; $i <= $hidden_pen_count; $i++) {

				$pen_type = $_POST['p_type' . $i];
				$pen_issued = date('Y-m-d', strtotime($_POST['pen_awarded' . $i]));
				$pen_effected = date('Y-m-d', strtotime($_POST['pen_eff' . $i]));
				$pen_letter_no = $_POST['l_no' . $i];
				$pen_letter_date = date('Y-m-d', strtotime($_POST['ltr_date' . $i]));
				$pen_chargesheet_status = $_POST['chrg_stat' . $i];
				$pen_chargesheet_ref = $_POST['pen_chrg_ref_no' . $i];
				$pen_from_date = date('Y-m-d', strtotime($_POST['f_date' . $i]));
				$pen_to_date = date('Y-m-d', strtotime($_POST['t_date' . $i]));
				$pen_remark = $_POST['penalty_remark' . $i];
				$hidden_penalty_id = $_POST['hidden_penalty_id' . $i];
				$penalty_sub_type = $_POST['p_sub_type' . $i];

				if ($i > $pre_result) {

					$count = 0;
					$f_c = mysqli_query($conn, "select count from penalty_temp where pen_pf_number='" . $_POST['penalty_pf_no'] . "' order by id desc limit 1");
					$res = mysqli_fetch_array($f_c);
					if ($res['count'] == "") {
						$count++;
					} else {
						$count = $res['count'] + 1;
					}

					$sql1 = ("insert into `penalty_track`(`zone`,`division`,`temp_transaction_id`,`final_transaction_id`,`pen_pf_number`,`pen_oldpf_number`, `pen_type`, `pen_issued`, `pen_effetcted`, `pen_letterno`, `pen_letterdate`, `pen_chargestatus`, `pen_chargeref`, `pen_from`, `pen_to`, `pen_remark`, `updated_by`, `date_time`, `updated_fields`, `updated_reason`, `updated_datetime`,`letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`,`pen_sub_type`)values('01','SUR','$trans_id','$trans_id','$pen_pf_no','','$pen_type','$pen_issued','$pen_effected','$pen_letter_no','$pen_letter_date','$pen_chargesheet_status','$pen_chargesheet_ref','$pen_from_date','$pen_to_date','$pen_remark','$update_by',Now(),'','','','','','','','','','$count','$penalty_sub_type')");


					$sql2 = ("insert into `penalty_temp`(`temp_transaction_id`,`zone`,`division`,`pen_pf_number`,`pen_oldpf_number`, `pen_type`, `pen_issued`, `pen_effetcted`, `pen_letterno`, `pen_letterdate`, `pen_chargestatus`, `pen_chargeref`, `pen_from`, `pen_to`, `pen_remark`, `updated_by`, `date_time`, `updated_fields`, `updated_reason`, `updated_datetime`,`letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`,`pen_sub_type`)values('$trans_id','01','SUR','$pen_pf_no','','$pen_type','$pen_issued','$pen_effected','$pen_letter_no','$pen_letter_date','$pen_chargesheet_status','$pen_chargesheet_ref','$pen_from_date','$pen_to_date','$pen_remark','$update_by',Now(),'','','','','','','','','','$count','$penalty_sub_type')");


					$result1 = mysqli_query($conn, $sql1);
					$result2 = mysqli_query($conn, $sql2);

					$action = "Inserted Record in Penalty Temp and in Penalty Track";
				} else {

					$f_q = mysqli_query($conn, "select count from penalty_temp where pen_pf_number='" . $_POST['penalty_pf_no'] . "' and `id`='$hidden_penalty_id'");

					$re = mysqli_fetch_array($f_q);
					$count = $re['count'];

					$conn = dbcon1();
					$sq = mysqli_query($conn, "SELECT * from penalty_temp where pen_pf_number='" . $pen_pf_no . "' and id='" . $hidden_penalty_id . "'");
					if ($sq) {

						while ($fetch_sql = mysqli_fetch_array($sq)) {

							if ($pen_type == $fetch_sql['pen_type'] && $pen_issued == $fetch_sql['pen_issued'] && $pen_effected == $fetch_sql['pen_effetcted'] && $pen_letter_no == $fetch_sql['pen_letterno'] && $pen_letter_date == $fetch_sql['pen_letterdate'] && $pen_chargesheet_status == $fetch_sql['pen_chargestatus'] && $pen_chargesheet_ref == $fetch_sql['pen_chargeref'] && $pen_from_date == $fetch_sql['pen_from'] && $pen_to_date == $fetch_sql['pen_to'] && $pen_remark == $fetch_sql['pen_remark'] && $penalty_sub_type == $fetch_sql['pen_sub_type']) {
								echo "<script>alert('Nothing Has Changed')</script>";
							} else {
								$f_q = mysqli_query($conn, "select count from penalty_temp where pen_pf_number='" . $_POST['penalty_pf_no'] . "' and `id`='$hidden_penalty_id'");

								$re = mysqli_fetch_array($f_q);
								$count = $re['count'];

								$sql1 = ("insert into `penalty_track`(`zone`,`division`,`temp_transaction_id`,`final_transaction_id`,`pen_pf_number`,`pen_oldpf_number`, `pen_type`, `pen_issued`, `pen_effetcted`, `pen_letterno`, `pen_letterdate`, `pen_chargestatus`, `pen_chargeref`, `pen_from`, `pen_to`, `pen_remark`, `updated_by`, `date_time`, `updated_fields`, `updated_reason`, `updated_datetime`,`letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`,`pen_sub_type`)values('01','SUR','$trans_id','$trans_id','$pen_pf_no','','$pen_type','$pen_issued','$pen_effected','$pen_letter_no','$pen_letter_date','$pen_chargesheet_status','$pen_chargesheet_ref','$pen_from_date','$pen_to_date','$pen_remark','$update_by',Now(),'','','','','','','','','','$count','$penalty_sub_type')");

								$result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));

								$action = "Updated Record in Penalty Temp and Inserted Record in Penalty Track";
							}
						}
					}

					$sql2 = ("UPDATE `penalty_temp` SET `temp_transaction_id`= '$trans_id',`pen_pf_number`='$pen_pf_no',`pen_type`='$pen_type',`pen_issued`='$pen_issued',`pen_effetcted`='$pen_effected',`pen_letterno`='$pen_letter_no',`pen_letterdate`='$pen_letter_date',`pen_chargestatus`='$pen_chargesheet_status',`pen_chargeref`='$pen_chargesheet_ref',`pen_from`='$pen_from_date',`pen_to`='$pen_to_date',`pen_remark`='$pen_remark',updated_datetime=Now(),`pen_sub_type`='$penalty_sub_type' where `pen_pf_number`='$pen_pf_no' and id='$hidden_penalty_id'");

					$result2 = mysqli_query($conn, $sql2);
				}
			}

			if ($result1 && $result2) {
				$action_on = $pen_pf_no;
				create_log($action, $action_on);
				echo "<script>window.location='penalty_update.php?pf=$pen_pf_no';alert('Penalty Updated Successfully');</script>";
			} else {
				echo "<script>window.location='penalty_update.php?pf=$pen_pf_no';alert('Failed to Update penalty.');</script>";
			}
			break;




			//update awards case code

		case 'update_awards':
			$fetch_pre = mysqli_query($conn, "select * from award_temp where awd_pf_number='" . $_POST['award_pf_no'] . "'");
			$pre_result = mysqli_num_rows($fetch_pre);

			session_start();
			$hidden_awd_count = $_POST['award_count'];
			if ($hidden_awd_count == "") {
				$hidden_awd_count = $pre_result;
			}
			date_default_timezone_set('Asia/Kolkata');
			$trans_id = date('dmYHis');
			$pf_no = $_POST['award_pf_no'];
			$update_by = $_SESSION['id'];
			$count = 0;

			for ($i = 1; $i <= $hidden_awd_count; $i++) {
				$doa = $_POST['award_date' . $i];
				$awarded_by = $_POST['award_award_by' . $i];
				$select_awd_type = $_POST['award_type_award' . $i];
				$award_ltr_no = $_POST['award_ltr_no' . $i];
				$award_ltr_date = date('Y-m-d', strtotime($_POST['award_ltr_date' . $i]));
				$other_award = $_POST['award_other_award' . $i];
				$award_details = $_POST['award_detail' . $i];
				$hidden_award_id = $_POST['hidden_award_id' . $i];

				if ($i > $pre_result) {

					$count = 0;
					$f_c = mysqli_query($conn, "select count from award_temp where awd_pf_number='$pf_no' order by id desc limit 1");
					$res = mysqli_fetch_array($f_c);
					if ($res['count'] == "") {
						$count++;
					} else {
						$count = $res['count'] + 1;
					}

					$sql1 = ("insert into `award_temp`(`temp_transaction_id`,`zone`,`division`,`awd_pf_number`,`awd_oldpf_number`,`awd_date`,`awd_by`,`awd_type`,`awd_other`,`awd_detail`,`date_time`,`updated_by`,`letter_no`,`letter_datetime`,`count`)values('$trans_id',01,'SUR','$pf_no','','$doa','$awarded_by','$select_awd_type','$other_award','$award_details',Now(),'$update_by','$award_ltr_no','$award_ltr_date','$count')");

					$sql2 = ("insert into `award_track`(`zone`,`division`,`temp_transaction_id`,`final_transaction_id`,`awd_pf_number`,`awd_oldpf_number`,`awd_date`,`awd_by`,`awd_type`,`awd_other`,`awd_detail`,`date_time`,`updated_by`,`letter_no`,`letter_datetime`,`count`)values(01,'SUR','$trans_id','$trans_id','$pf_no','','$doa','$awarded_by','$select_awd_type','$other_award','$award_details',Now(),'$update_by','$award_ltr_no','$award_ltr_date','$count')");

					$res1 = mysqli_query($conn, $sql1);
					$res2 = mysqli_query($conn, $sql2);

					$action = "Inserted Record in Award Temp and in Award Track";
				} else {

					$f_q = mysqli_query($conn, "select * from award_temp where awd_pf_number='$pf_no' and `id`='$hidden_award_id'");
					$re = mysqli_fetch_array($f_q);
					$count = $re['count'];
					if ($re['awd_pf_number'] == $pf_no && $re['awd_date'] == $doa && $re['awd_by'] == $awarded_by && $re['awd_type'] == $select_awd_type && $re['awd_other'] == $other_award && $re['awd_detail'] == $award_details) {
						echo "<script>alert('Nothing Has Changed');</script>";

						/* echo $re['awd_pf_number']."=".$pf_no."<br>";
				echo $re['awd_date']."=".$doa."<br>"; 
				echo $re['awd_by']."=".$awarded_by."<br>"; 
				echo $re['awd_type']."=".$select_awd_type."<br>"; 
				echo $re['awd_other']."=".$other_award."<br>"; 
				echo $re['awd_detail']."=".$award_details."<br>"; */
					} else {

						/* echo "<script>alert('in else');</script>";
				
				echo $re['awd_pf_number']."=".$pf_no."<br>";
				echo $re['awd_date']."=".$doa."<br>"; 
				echo $re['awd_by']."=".$awarded_by."<br>"; 
				echo $re['awd_type']."=".$select_awd_type."<br>"; 
				echo $re['awd_other']."=".$other_award."<br>"; 
				echo $re['awd_detail']."=".$award_details."<br>"; */

						$sql1 = ("insert into `award_track`(`temp_transaction_id`,`final_transaction_id`,`zone`,`division`,`awd_pf_number`,`awd_date`,`awd_by`,`awd_type`,`awd_other`,`awd_detail`,`date_time`,`updated_by`,`letter_no`,`letter_datetime`,`count`)values('$trans_id','$trans_id',01,'SUR','$pf_no','$doa','$awarded_by','$select_awd_type','$other_award','$award_details',Now(),'$update_by','$award_ltr_no','$award_ltr_date','$count')");

						$res1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));

						$action = "Updated Record in Award Temp and Inserted Record in Award Track";
					}

					$sql2 = ("UPDATE `award_temp` SET `temp_transaction_id`='$trans_id',`zone`='01',`division`='SUR',`awd_pf_number`='$pf_no',`awd_date`='$doa',`awd_by`='$awarded_by',`awd_type`='$select_awd_type',`awd_other`='$other_award',`awd_detail`='$award_details',`date_time`=Now(),`letter_no`='$award_ltr_no',`letter_datetime`='$award_ltr_date', `count`='$count' WHERE awd_pf_number='$pf_no' and id='$hidden_award_id'");

					$res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
				}
			}

			if ($res1 && $res2) {
				$action_on = $pf_no;
				create_log($action, $action_on);
				echo "<script>window.location='award_update.php';alert('UPDATE Successfully');</script>";
			} else {
				echo "<script>window.location='award_update.php';alert('NOT Added');</script>";
			}
			break;


		case 'update_increment':
			$conn = dbcon1();
			// 			print_r($_POST);
			echo "<br>";
			// 			$incr_pf=$_POST['incr_pf'];

			$sql = mysqli_query($conn,"select * from `increment_temp` where `incr_pf_number`='$incr_pf'");
			$fetch_sql = mysqli_num_rows($sql);
			$row_count = $_POST['row_count'];
			//  $row_count=($row_count=="") ? $row_count=$fetch_sql : $_POST["row_cnt"];
			if ($row_count == "") {
				$row_count = $fetch_sql;
			}
			// 			echo $row_count;
			$zone = '01';
			$division = 'SUR';

			date_default_timezone_set('Asia/Kolkata');
			$transaction_id = date('Ymdhis');
			$final_transaction_id = date('Ymdhis');
			session_start();
			$updated_by = $_SESSION['id'];
			$count = 0;

			for ($i = 1; $i <= $row_count; $i++) {
				$incr_hidden_id = $_POST['incr_hidden_id' . $i];
				$incr_type = $_POST['incr_type' . $i];
				$incr_date = date('Y-m-d', strtotime($_POST['incr_date' . $i]));
				$ps_type_4 = $_POST['ps_type_row_' . $i];

				$incr_scale = "";
				$incr_level = "";
				if ($ps_type_4 == 1) {
					$incr_scale = $_POST['scale_drop_text_' . $i];
					$incr_level = "";
				} else if ($ps_type_4 == 2 || $ps_type_4 == 3 || $ps_type_4 == 4) {
					$incr_scale = $_POST['scale_drop_' . $i];
					$incr_level = "";
				} else if ($ps_type_4 == 5) {
					$incr_level = $_POST['level_drop_' . $i];
					$incr_scale = "";
				}

				$incr_rop = $_POST['incr_add_row_rop' . $i];
				$incr_remark = $_POST['incr_row_reason' . $i];

				$sql = mysqli_query($conn,"select * from `increment_temp` where `incr_pf_number`='$incr_pf'");

				$fetch_sql = mysqli_num_rows($sql);

				if ($i > $fetch_sql) {

					$count = 0;
					$f_c = mysqli_query($conn,"select count from `increment_temp` where `incr_pf_number`='$incr_pf' order by id desc limit 1");
					$res = mysqli_fetch_array($f_c);
					if ($res['count'] == "") {
						$count++;
					} else {
						$count = $res['count'] + 1;
					}

					$sql1 = mysqli_query($conn,"insert into `increment_temp`(`temp_transaction_id`, `zone`, `division`, `incr_pf_number`, `incr_type`, `incr_date`, `ps_type`, `incr_scale`, `incr_level`, `incr_oldrop`, `incr_rop`, `incr_personel`, `incr_special`, `incr_nextdate`, `incr_remark`, `date_time`, `updated_by`,  `updated_fields`, `updated_reason`, `updated_datetime`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`)values('$transaction_id','$zone','$division','$incr_pf','$incr_type','$incr_date','$ps_type_4','$incr_scale','$incr_level','','$incr_rop','','','','$incr_remark',Now(),$updated_by,'','','','','','','','','','$count')");


					$sql2 = mysqli_query($conn,"insert into `increment_track`(`temp_transaction_id`,`final_transaction_id`, `zone`, `division`, `incr_pf_number`, `incr_type`, `incr_date`, `ps_type`, `incr_scale`, `incr_level`, `incr_oldrop`, `incr_rop`, `incr_personel`, `incr_special`, `incr_nextdate`, `incr_remark`, `date_time`, `updated_by`,  `updated_fields`, `updated_reason`, `updated_datetime`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`)values('$transaction_id','$final_transaction_id','$zone','$division','$incr_pf','$incr_type','$incr_date','$ps_type_4','$incr_scale','$incr_level','','$incr_rop','','','','$incr_remark',Now(),$updated_by,'','','','','','','','','','$count')");

					$action = "Inserted Record in Increment Temp and in Increment Track";
				} else {

					$f_q = mysqli_query($conn,"select count from `increment_temp` where incr_pf_number='" . $incr_pf . "' and id='" . $incr_hidden_id . "'");
					$re = mysqli_fetch_array($f_q);
					$count = $re['count'];

					$conn = dbcon1();
					$sq = mysqli_query($conn,"SELECT * from increment_temp where incr_pf_number='" . $incr_pf . "' and id='" . $incr_hidden_id . "'");

					if ($sq) {
						while ($fetch_sql = mysqli_fetch_array($sq)) {
							if ($incr_type == $fetch_sql['incr_type'] && $incr_date == $fetch_sql['incr_date'] && $ps_type_4 == $fetch_sql['ps_type'] && $incr_scale == $fetch_sql['incr_scale'] && $incr_level == $fetch_sql['incr_level'] && $incr_rop == $fetch_sql['incr_rop'] && $incr_remark == $fetch_sql['incr_remark']) {
								//echo "<script>alert('No Field Has Been Changed')</script>";
							} else {

								$sql1 = mysqli_query($conn,"insert into `increment_track`(`temp_transaction_id`,`final_transaction_id`, `zone`, `division`, `incr_pf_number`, `incr_type`, `incr_date`, `ps_type`, `incr_scale`, `incr_level`, `incr_oldrop`, `incr_rop`, `incr_personel`, `incr_special`, `incr_nextdate`, `incr_remark`, `date_time`, `updated_by`,  `updated_fields`, `updated_reason`, `updated_datetime`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`)values('$transaction_id','$final_transaction_id','$zone','$division','$incr_pf','$incr_type','$incr_date','$ps_type_4','$incr_scale','$incr_level','','$incr_rop','','','','$incr_remark',Now(),$updated_by,'','','','','','','','','','$count')");

								$action = "Updated Record in Increment Temp and Inserted Record in Increment Track";
							}
						}
					}
					//   echo $count;
					$sql2 = mysqli_query($conn,"UPDATE `increment_temp` SET `temp_transaction_id`='$transaction_id',`zone`='$zone',`division`='$division',`incr_pf_number`='$incr_pf',`incr_type`='$incr_type',`incr_date`='$incr_date',`ps_type`='$ps_type_4',`incr_scale`='$incr_scale',`incr_level`='$incr_level',`incr_rop`='$incr_rop',`incr_remark`='$incr_remark',`updated_by`='$updated_by',`date_time`=Now() WHERE incr_pf_number='$incr_pf' and id='$incr_hidden_id'");
				}
			}

			if ($sql && $sql2) {
				$action_on = $incr_pf;
				create_log($action, $action_on);
				echo "<script>window.location='increment_update.php';alert('Updated Successfully');</script>";
			} else {
				echo "<script>window.location='increment_update.php';alert('NOT Updated');</script>";
			}
			break;

		case 'delete_row_increment':
			// print_r($_POST);
			// print_r($_SESSION);
			$del_pf_num = $_SESSION["set_update_pf"];
			$del_id = $_POST["id"];
			// echo "id=>$id pf_num=>$pf_num";
			$res = mysqli_query($conn,"DELETE FROM `increment_temp` WHERE incr_pf_number='$del_pf_num' and id='$del_id'");
			//echo mysqli_error();
			if ($res) {
				echo "true";
			} else {
				echo "false";
			}
			break;

		case 'update_advance':

			$fetch_pre = mysqli_query($conn,"select * from advance_temp where adv_pf_number='" . $_POST['adv_pf'] . "'");
			$pre_result = mysqli_num_rows($fetch_pre);
			session_start();

			$hidden_adv_count = $_POST['adv_count'];
			if ($hidden_adv_count == "") {
				$hidden_adv_count = $pre_result;
			}

			date_default_timezone_set('Asia/Kolkata');
			$trans_id = date('dmYHis');

			$update_by = $_SESSION['id'];

			$pf_no = $_POST['adv_pf'];


			for ($i = 1; $i <= $hidden_adv_count; $i++) {
				$advance_type = $_POST['adv_type' . $i];
				$letter_no = $_POST['adv_letterno' . $i];
				$letter_date = date('Y-m-d', strtotime($_POST['adv_letterdate' . $i]));;
				$wefdate = date('Y-m-d', strtotime($_POST['adv_wefdate' . $i]));
				$amount = $_POST['adv_amount' . $i];
				$principle = $_POST['adv_principle' . $i];
				$interest = $_POST['adv_interest' . $i];
				$fromdate = date('Y-m-d', strtotime($_POST['adv_frmdate' . $i]));
				$todate = date('Y-m-d', strtotime($_POST['adv_todate' . $i]));
				$remark = $_POST['adv_remark' . $i];
				$hidden_advance_id = $_POST['hidden_advance_id' . $i];


				if ($i > $pre_result) {
					$count = 0;
					$f_c = mysqli_query($conn,"select count from advance_temp where adv_pf_number='" . $_POST['adv_pf'] . "' order by id desc limit 1");
					$res = mysqli_fetch_array($f_c);
					if ($res['count'] == "") {
						$count++;
					} else {
						$count = $res['count'] + 1;
					}

					$sql1 = ("insert into `advance_temp`(`zone`,`division`,`temp_transaction_id`,`adv_pf_number`,`adv_oldpf_number`,`adv_type`,`adv_letterno`,`adv_letterdate`,`adv_wefdate`,`adv_amount`,`adv_principle`,`adv_interest`,`adv_from`,`adv_to`,`adv_remark`,`updated_by`,`date_time`,`updated_fields`,`updated_reason`,`updated_datetime`,`letter_no`,`letter_datetime`,`uploaded_letter`,`approved_status`,`approved_by`,`approved_datetime`,`count`)values(01,'SUR','$trans_id','$pf_no','','$advance_type','$letter_no','$letter_date','$wefdate','$amount','$principle','$interest','$fromdate','$todate','$remark','$update_by',Now(),'','','','','','','','','','$count')");

					$sql2 = ("insert into `advance_track`(`zone`,`division`,`temp_transaction_id`,`final_transaction_id`,`adv_pf_number`,`adv_oldpf_number`,`adv_type`,`adv_letterno`,`adv_letterdate`,`adv_wefdate`,`adv_amount`,`adv_principle`,`adv_interest`,`adv_from`,`adv_to`,`adv_remark`,`updated_by`,`date_time`,`updated_fields`,`updated_reason`,`updated_datetime`,`letter_no`,`letter_datetime`,`uploaded_letter`,`approved_status`,`approved_by`,`approved_datetime`,`count`)values(01,'SUR','$trans_id','$trans_id','$pf_no','','$advance_type','$letter_no','$letter_date','$wefdate','$amount','$principle','$interest','$fromdate','$todate','$remark','$update_by',Now(),'','','','','','','','','','$count')");

					$res1 = mysqli_query($conn,$sql1);
					$res2 = mysqli_query($conn,$sql2);

					$action = "Inserted Record in Advance Temp and in Advance Track";
				} else {
					$f_q = mysqli_query($conn,"select count from advance_temp where adv_pf_number='" . $pf_no . "' and id='" . $hidden_advance_id . "'");
					$re = mysqli_fetch_array($f_q);
					$count = $re['count'];

					$conn = dbcon1();
					$sq = mysqli_query($conn,"SELECT * from advance_temp where adv_pf_number='" . $pf_no . "' and id='" . $hidden_advance_id . "'");
					if ($sq) {
						while ($fetch_sql = mysqli_fetch_array($sq)) {

							if ($advance_type == $fetch_sql['adv_type'] && $letter_no == $fetch_sql['adv_letterno'] && $letter_date == $fetch_sql['adv_letterdate'] && $wefdate == $fetch_sql['adv_wefdate'] && $amount == $fetch_sql['adv_amount'] && $principle == $fetch_sql['adv_principle'] && $interest == $fetch_sql['adv_interest'] && $fromdate == $fetch_sql['adv_from'] && $todate == $fetch_sql['adv_to'] && $remark == $fetch_sql['adv_remark']) {
								echo "<script>alert('Nothing Has Changed')</script>";
							} else {

								$sql1 = ("insert into `advance_track`(`zone`,`division`,`temp_transaction_id`,`final_transaction_id`,`adv_pf_number`,`adv_oldpf_number`,`adv_type`,`adv_letterno`,`adv_letterdate`,`adv_wefdate`,`adv_amount`,`adv_principle`,`adv_interest`,`adv_from`,`adv_to`,`adv_remark`,`updated_by`,`date_time`,`updated_fields`,`updated_reason`,`updated_datetime`,`letter_no`,`letter_datetime`,`uploaded_letter`,`approved_status`,`approved_by`,`approved_datetime`,`count`)values(01,'SUR','$trans_id','$trans_id','$pf_no','','$advance_type','$letter_no','$letter_date','$wefdate','$amount','$principle','$interest','$fromdate','$todate','$remark','$update_by',Now(),'','','','','','','','','','$count')");

								$res1 = mysqli_query($conn,$sql1) or die(mysqli_error($conn));

								$action = "Updated Record in Advance Temp and Inserted Record in Advance Track";
							}
						}
					}

					$sql2 = ("UPDATE `advance_temp` SET `zone`='01',`division`='SUR',`temp_transaction_id`='$trans_id',`adv_pf_number`='$pf_no',`adv_type`='$advance_type',`adv_letterno`='$letter_no',`adv_letterdate`='$letter_date',`adv_wefdate`='$wefdate',`adv_amount`='$amount',`adv_principle`='$principle',`adv_interest`='$interest',`adv_from`='$fromdate',`adv_to`='$todate',`adv_remark`='$remark',`updated_by`='$update_by',`date_time`=Now(), `count`='$count'  WHERE adv_pf_number='$pf_no' and id='$hidden_advance_id'");

					$res2 = mysqli_query($conn,$sql2);
				}
			}
			if ($res1 && $res2) {
				$action_on = $pf_no;
				create_log($action, $action_on);
				echo "<script>window.location='advance_update.php';alert('Updated Successfully');</script>";
			} else {
				echo "<script>window.location='advance_update.php';alert('NOT Updated');</script>";
			}
			break;

		case 'add_gra_nominee':

			$gra_counter = $_POST['gra_counter'];
			if ($gra_counter == "") {
				$gra_counter = 1;
			}
			$trans_id = date('dmYHis');
			$update_by = $_SESSION['id'];
			$gra_pf = $_POST['gra_pf1'];
			$nominee_type_gra = 'GRA';
			for ($i = 1; $i <= $gra_counter; $i++) {
				$gra_name = $_POST['gra_name' . $i];
				$gra_rel = $_POST['gra_rel' . $i];
				$gra_otherrel = $_POST['gra_otherrel' . $i];
				$gra_perc = $_POST['gra_perc' . $i];
				$gra_status = $_POST['gra_status' . $i];
				$gra_age = $_POST['gra_age' . $i];
				$gra_dob = date('Y-m-d', strtotime($_POST['gra_dob' . $i]));
				$gra_pan = $_POST['gra_pan' . $i];
				$gra_adhr = $_POST['gra_adhr' . $i];
				$gra_address = $_POST['gra_address' . $i];
				$gra_conting = $_POST['gra_conting' . $i];
				$gra_subsciber = $_POST['gra_subsciber' . $i];


				$sql1 = mysqli_query($conn,"insert into `nominee_temp`(`zone`,`division`,`temp_transaction_id`,`nom_pf_number`,`nom_type`, `nom_name`, `nom_rel`, `nom_otherrel`, `nom_per`, `nom_status`, `nom_age`, `nom_dob`, `nom_panno`, `nom_aadhar`, `nom_address`, `nom_conti`, `nom_subscriber`, `updated_by`, `date_time`, `count`)values('01','SUR','$trans_id','$gra_pf','$nominee_type_gra','$gra_name','$gra_rel','$gra_otherrel','$gra_perc','$gra_status','$gra_age','$gra_dob','$gra_pan','$gra_adhr','$gra_address','$gra_conting','$gra_subsciber','$update_by',Now(),'$i')");

				$sql2 = mysqli_query($conn,"INSERT INTO `nominee_track`(`zone`, `division`, `temp_transaction_id`, `final_transaction_id`, `nom_pf_number`, `nom_type`, `nom_name`, `nom_rel`, `nom_otherrel`, `nom_per`, `nom_status`, `nom_age`, `nom_dob`, `nom_panno`, `nom_aadhar`, `nom_address`, `nom_conti`, `nom_subscriber`, `updated_by`, `date_time`,`count`) VALUES ('01','SUR','$trans_id','$trans_id','$gra_pf','$nominee_type_gra','$gra_name','$gra_rel','$gra_otherrel','$gra_perc','$gra_status','$gra_age','$gra_dob','$gra_pan','$gra_adhr','$gra_address','$gra_conting','$gra_subsciber','$update_by',Now(),'$i')");
			}
			if ($sql1 && $sql2) {
				echo "<script>alert('PF Nomination Added Successfully');window.location='sr_entry.php'</script>";
			} else {
				echo "<script>alert('NOT Added');window.location='sr_entry.php'</script>";
			}
			break;

		case 'update_gra_nominee':

			$fetch_pre = mysqli_query($conn,"select * from nominee_temp where nom_pf_number='" . $_POST['gra_pf1'] . "' and nom_type='GRA'");

			$pre_result = mysqli_num_rows($fetch_pre);

			$gra_counter = $_POST['gra_counter'];
			if ($gra_counter == "") {
				$gra_counter = $pre_result;
			}

			$count = 0;
			$s = mysqli_query($conn,"select * from nominee_temp where nom_pf_number='" . $_POST['gra_pf1'] . "' ORDER BY id DESC");
			$rs = mysqli_num_rows($s);
			if ($rs > 0) {
				$re = mysqli_fetch_array($s);
				$count = $re['count'] + 1;
			}

			$trans_id = date('dmYHis');
			$update_by = $_SESSION['id'];
			$nom_pf = $_POST['gra_pf1'];
			$nominee_type = 'GRA';
			for ($i = 1; $i <= $gra_counter; $i++) {
				$update_id = $_POST['gra_update_id' . $i];
				$nom_name = $_POST['gra_name' . $i];
				$nomn_rel = $_POST['gra_rel' . $i];
				$nom_otherrel = $_POST['gra_otherrel' . $i];
				$nom_perc = $_POST['gra_perc' . $i];
				$nom_status = $_POST['gra_status' . $i];
				$nom_age = $_POST['gra_age' . $i];
				$nom_dob = date('Y-m-d', strtotime($_POST['gra_dob' . $i]));
				$nom_pan = $_POST['gra_pan' . $i];
				$nom_adhr = $_POST['gra_adhr' . $i];
				$nom_address = $_POST['gra_address' . $i];
				$nom_conting = $_POST['gra_conting' . $i];
				$nom_subsciber = $_POST['gra_subsciber' . $i];

				if ($i > $pre_result) {
					$sql1 = mysqli_query($conn,"INSERT INTO `nominee_track`(`zone`, `division`, `temp_transaction_id`, `final_transaction_id`, `nom_pf_number`, `nom_type`, `nom_name`, `nom_rel`, `nom_otherrel`, `nom_per`, `nom_status`, `nom_age`, `nom_dob`, `nom_panno`, `nom_aadhar`, `nom_address`, `nom_conti`, `nom_subscriber`, `updated_by`, `date_time`,`count`) VALUES ('01','SUR','$trans_id','$trans_id','$nom_pf','$nominee_type','$nom_name','$nomn_rel','$nom_otherrel','$nom_perc','$nom_status','$nom_age','$nom_dob','$nom_pan','$nom_adhr','$nom_address','$nom_conting','$nom_subsciber','$update_by',Now(),'$count')");

					$sql2 = mysqli_query($conn,"INSERT INTO `nominee_temp`(`zone`, `division`, `temp_transaction_id`, `nom_pf_number`, `nom_type`, `nom_name`, `nom_rel`, `nom_otherrel`, `nom_per`, `nom_status`, `nom_age`, `nom_dob`, `nom_panno`, `nom_aadhar`, `nom_address`, `nom_conti`, `nom_subscriber`, `updated_by`, `date_time`,`count`) VALUES ('01','SUR','$trans_id','$nom_pf','$nominee_type','$nom_name','$nomn_rel','$nom_otherrel','$nom_perc','$nom_status','$nom_age','$nom_dob','$nom_pan','$nom_adhr','$nom_address','$nom_conting','$nom_subsciber','$update_by',Now(),'$count')") or die(mysqli_error($conn));
				} else {

					$sql1 = mysqli_query($conn,"UPDATE `nominee_temp` SET `zone`='01',`division`='SUR',`temp_transaction_id`='$trans_id',`nom_pf_number`='$nom_pf',`nom_type`='$nominee_type',`nom_name`='$nom_name',`nom_rel`='$nomn_rel',`nom_otherrel`='$nom_otherrel',`nom_per`='$nom_perc',`nom_status`='$nom_status',`nom_age`='$nom_age',`nom_dob`='$nom_dob',`nom_panno`='$nom_pan',`nom_aadhar`='$nom_adhr',`nom_address`='$nom_address',`nom_conti`='$nom_conting',`nom_subscriber`='$nom_subsciber',`updated_by`='$update_by',`date_time`=Now() WHERE `nom_pf_number`='$nom_pf' and id='$update_id'");

					$sql2 = mysqli_query($conn,"INSERT INTO `nominee_track`(`zone`, `division`, `temp_transaction_id`, `final_transaction_id`, `nom_pf_number`, `nom_type`, `nom_name`, `nom_rel`, `nom_otherrel`, `nom_per`, `nom_status`, `nom_age`, `nom_dob`, `nom_panno`, `nom_aadhar`, `nom_address`, `nom_conti`, `nom_subscriber`, `updated_by`, `date_time`) VALUES ('01','SUR','$trans_id','$trans_id','$nom_pf','$nominee_type','$nom_name','$nomn_rel','$nom_otherrel','$nom_perc','$nom_status','$nom_age','$nom_dob','$nom_pan','$nom_adhr','$nom_address','$nom_conting','$nom_subsciber','$update_by',Now())");
				}
			}
			if ($sql1 && $sql2) {
				echo "<script>alert('GRA Nomination Updated Successfully');window.location='nominee_update.php'</script>";
			} else {
				echo "<script>alert('NOT Updated');window.location='nominee_update.php'</script>";
			}
			break;


		case 'add_pf_nominee':
			$pf_counter = $_POST['pf_counter'];
			if ($pf_counter == "") {
				$pf_counter = 1;
			}
			$trans_id = date('dmYHis');
			$update_by = $_SESSION['id'];
			$nom_pf = $_POST['nom_pf1'];
			$nominee_type = 'PF';
			for ($i = 1; $i <= $pf_counter; $i++) {
				//$nom_pf=$_POST['nom_pf'.$i];
				//$nom_type=$_POST['nom_type'.$i];
				$nom_name = $_POST['nom_name' . $i];
				$nomn_rel = $_POST['nomn_rel' . $i];
				$nom_otherrel = $_POST['nom_otherrel' . $i];
				$nom_perc = $_POST['nom_perc' . $i];
				$nom_status = $_POST['nom_status' . $i];
				$nom_age = $_POST['nom_age' . $i];
				if ($_POST['nom_dob' . $i] == '') {
					$nom_dob = '';
				} else {
					$nom_dob = date('Y-m-d', strtotime($_POST['nom_dob' . $i]));
				}

				$nom_pan = $_POST['nom_pan' . $i];
				$nom_adhr = $_POST['nom_adhr' . $i];
				$nom_address = $_POST['nom_address' . $i];
				$nom_conting = $_POST['nom_conting' . $i];
				$nom_subsciber = $_POST['nom_subsciber' . $i];


				$sql1 = mysqli_query($conn,"insert into `nominee_temp`(`zone`,`division`,`temp_transaction_id`,`nom_pf_number`,`nom_type`, `nom_name`, `nom_rel`, `nom_otherrel`, `nom_per`, `nom_status`, `nom_age`, `nom_dob`, `nom_panno`, `nom_aadhar`, `nom_address`, `nom_conti`, `nom_subscriber`, `updated_by`, `date_time`,`count`)values('01','SUR','$trans_id','$nom_pf','$nominee_type','$nom_name','$nomn_rel','$nom_otherrel','$nom_perc','$nom_status','$nom_age','$nom_dob','$nom_pan','$nom_adhr','$nom_address','$nom_conting','$nom_subsciber','$update_by',Now(),'$i')");

				$sql2 = mysqli_query($conn,"INSERT INTO `nominee_track`(`zone`, `division`, `temp_transaction_id`, `final_transaction_id`, `nom_pf_number`, `nom_type`, `nom_name`, `nom_rel`, `nom_otherrel`, `nom_per`, `nom_status`, `nom_age`, `nom_dob`, `nom_panno`, `nom_aadhar`, `nom_address`, `nom_conti`, `nom_subscriber`, `updated_by`, `date_time`,`count`) VALUES ('01','SUR','$trans_id','$trans_id','$nom_pf','$nominee_type','$nom_name','$nomn_rel','$nom_otherrel','$nom_perc','$nom_status','$nom_age','$nom_dob','$nom_pan','$nom_adhr','$nom_address','$nom_conting','$nom_subsciber','$update_by',Now(),'$i')");
			}
			if ($sql1) {
				echo "<script>alert('PF Nomination Added Successfully');window.location='sr_entry.php'</script>";
			} else {
				echo "<script>alert('NOT Added');window.location='sr_entry.php'</script>";
			}
			break;

			//update nominee
		case 'update_pf_nominee':

			$fetch_pre = mysqli_query($conn,"select * from nominee_temp where nom_pf_number='" . $_POST['nom_pf1'] . "'");

			$pre_result = mysqli_num_rows($fetch_pre);

			$pf_counter = $_POST['pf_counter'];
			if ($pf_counter == "") {
				$pf_counter = $pre_result;
			}

			$trans_id = date('dmYHis');
			$update_by = $_SESSION['id'];
			$nom_pf = $_POST['nom_pf1'];

			for ($i = 1; $i <= $pf_counter; $i++) {
				$update_id = $_POST['update_id' . $i];
				$nom_name = $_POST['nom_name' . $i];
				$nomn_rel = $_POST['nomn_rel' . $i];
				$nominee_type = $_POST['nom_type' . $i];
				$nom_otherrel = $_POST['nom_otherrel' . $i];
				$nom_perc = $_POST['nom_perc' . $i];
				$nom_status = $_POST['nom_status' . $i];
				$nom_age = $_POST['nom_age' . $i];
				$nom_dob = date('Y-m-d', strtotime($_POST['nom_dob' . $i]));
				$nom_pan = $_POST['nom_pan' . $i];
				$nom_adhr = $_POST['nom_adhr' . $i];
				$nom_address = $_POST['nom_address' . $i];
				$nom_conting = $_POST['nom_conting' . $i];
				$nom_subsciber = $_POST['nom_subsciber' . $i];

				if ($i > $pre_result) {
					$count = 0;
					$f_c = mysqli_query($conn,"select count from nominee_temp where `nom_pf_number`='$nom_pf' order by id desc limit 1");
					$res = mysqli_fetch_array($f_c);
					if ($res['count'] == "") {
						$count++;
						//echo "if".$count."<br>";
					} else {
						$count = $res['count'] + 1;
						//echo "else".$count."<br>";
					}

					$sql1 = mysqli_query($conn,"INSERT INTO `nominee_track`(`zone`, `division`, `temp_transaction_id`, `final_transaction_id`, `nom_pf_number`, `nom_type`, `nom_name`, `nom_rel`, `nom_otherrel`, `nom_per`, `nom_status`, `nom_age`, `nom_dob`, `nom_panno`, `nom_aadhar`, `nom_address`, `nom_conti`, `nom_subscriber`, `updated_by`, `date_time`,`count`) VALUES ('01','SUR','$trans_id','$trans_id','$nom_pf','$nominee_type','$nom_name','$nomn_rel','$nom_otherrel','$nom_perc','$nom_status','$nom_age','$nom_dob','$nom_pan','$nom_adhr','$nom_address','$nom_conting','$nom_subsciber','$update_by',Now(),'$count')");

					$sql2 = mysqli_query($conn,"INSERT INTO `nominee_temp`(`zone`, `division`, `temp_transaction_id`, `nom_pf_number`, `nom_type`, `nom_name`, `nom_rel`, `nom_otherrel`, `nom_per`, `nom_status`, `nom_age`, `nom_dob`, `nom_panno`, `nom_aadhar`, `nom_address`, `nom_conti`, `nom_subscriber`, `updated_by`, `date_time`,`count`) VALUES ('01','SUR','$trans_id','$nom_pf','$nominee_type','$nom_name','$nomn_rel','$nom_otherrel','$nom_perc','$nom_status','$nom_age','$nom_dob','$nom_pan','$nom_adhr','$nom_address','$nom_conting','$nom_subsciber','$update_by',Now(),'$count')") or die(mysqli_error($conn));

					$action = "Inserted Record in Nominee Temp and in Nominee Track";
				} else {
					$conn = dbcon1();
					$sq = mysqli_query($conn,"SELECT * from nominee_temp where nom_pf_number='" . $nom_pf . "' and id='" . $update_id . "'");

					if ($sq) {
						while ($fetch_sql = mysqli_fetch_array($sq)) {

							if ($nom_name == $fetch_sql['nom_name'] && $nomn_rel == $fetch_sql['nom_rel'] && $nominee_type == $fetch_sql['nom_type'] && $nom_otherrel == $fetch_sql['nom_otherrel'] && $nom_perc == $fetch_sql['nom_per'] && $nom_status == $fetch_sql['nom_status'] && $nom_age == $fetch_sql['nom_age'] && $nom_dob == $fetch_sql['nom_dob'] && $nom_pan == $fetch_sql['nom_panno'] && $nom_adhr == $fetch_sql['nom_aadhar'] && $nom_address == $fetch_sql['nom_address'] && $nom_conting == $fetch_sql['nom_conti'] && $nom_subsciber == $fetch_sql['nom_subscriber']) {
								echo "<script>alert('Nothing Has Changed')</script>";
							} else {
								$f_q = mysqli_query($conn,"select count from nominee_temp where `nom_pf_number`='$nom_pf' and `id`='$update_id'");
								$re = mysqli_fetch_array($f_q);
								$count = $re['count'];

								$sql1 = ("INSERT INTO `nominee_track`(`zone`, `division`, `temp_transaction_id`, `final_transaction_id`, `nom_pf_number`, `nom_type`, `nom_name`, `nom_rel`, `nom_otherrel`, `nom_per`, `nom_status`, `nom_age`, `nom_dob`, `nom_panno`, `nom_aadhar`, `nom_address`, `nom_conti`, `nom_subscriber`, `updated_by`, `date_time`,`count`) VALUES ('01','SUR','$trans_id','$trans_id','$nom_pf','$nominee_type','$nom_name','$nomn_rel','$nom_otherrel','$nom_perc','$nom_status','$nom_age','$nom_dob','$nom_pan','$nom_adhr','$nom_address','$nom_conting','$nom_subsciber','$update_by',Now(),'$count')");

								$result1 = mysqli_query($conn,$sql1) or die(mysqli_error($conn));

								$action = "Updated Record in Nominee Temp and Inserted Record in Nominee Track";
							}
						}
					}

					$sql2 = ("UPDATE `nominee_temp` SET `zone`='01',`division`='SUR',`temp_transaction_id`='$trans_id',`nom_pf_number`='$nom_pf',`nom_type`='$nominee_type',`nom_name`='$nom_name',`nom_rel`='$nomn_rel',`nom_otherrel`='$nom_otherrel',`nom_per`='$nom_perc',`nom_status`='$nom_status',`nom_age`='$nom_age',`nom_dob`='$nom_dob',`nom_panno`='$nom_pan',`nom_aadhar`='$nom_adhr',`nom_address`='$nom_address',`nom_conti`='$nom_conting',`nom_subscriber`='$nom_subsciber',`updated_by`='$update_by',`date_time`=Now() WHERE `nom_pf_number`='$nom_pf' and id='$update_id'");

					$result2 = mysqli_query($conn,$sql2);
				}
			}
			if ($result1 && $result2 || $sql1 && $sql2) {
				$action_on = $nom_pf;
				create_log($action, $action_on);
				echo "<script>alert('Nominee Updated Successfully');window.location='nominee_update.php'</script>";
			} else {
				echo "<script>alert('NOT Updated');window.location='nominee_update.php'</script>";
			}
			break;


		case 'add_gis_nominee':

			$gis_counter = $_POST['gis_counter'];
			if ($gis_counter == "") {
				$gis_counter = 1;
			}

			$trans_id = date('dmYHis');
			$update_by = $_SESSION['id'];
			$gis_pf = $_POST['gis_pf1'];
			$nominee_type_gis = 'GIS';
			for ($i = 1; $i <= $gis_counter; $i++) {
				$gis_name = $_POST['gis_name' . $i];
				$gis_rel = $_POST['gis_rel' . $i];
				$gis_otherrel = $_POST['gis_otherrel' . $i];
				$gis_perc = $_POST['gis_perc' . $i];
				$gis_status = $_POST['gis_status' . $i];
				$gis_age = $_POST['gis_age' . $i];
				$gis_dob = date('Y-m-d', strtotime($_POST['gis_dob' . $i]));
				$gis_pan = $_POST['gis_pan' . $i];
				$gis_adhr = $_POST['gis_adhr' . $i];
				$gis_address = $_POST['gis_address' . $i];
				$gis_conting = $_POST['gis_conting' . $i];
				$gis_subsciber = $_POST['gis_subsciber' . $i];


				$sql1 = mysqli_query($conn,"insert into `nominee_temp`(`zone`,`division`,`temp_transaction_id`,`nom_pf_number`,`nom_type`, `nom_name`, `nom_rel`, `nom_otherrel`, `nom_per`, `nom_status`, `nom_age`, `nom_dob`, `nom_panno`, `nom_aadhar`, `nom_address`, `nom_conti`, `nom_subscriber`, `updated_by`, `date_time`,`count`)values('01','SUR','$trans_id','$gis_pf','$nominee_type_gis','$gis_name','$gis_rel','$gis_otherrel','$gis_perc','$gis_status','$gis_age','$gis_dob','$gis_pan','$gis_adhr','$gis_address','$gis_conting','$gis_subsciber','$update_by',Now(),'$i')");

				$sql2 = mysqli_query($conn,"INSERT INTO `nominee_track`(`zone`, `division`, `temp_transaction_id`, `final_transaction_id`, `nom_pf_number`, `nom_type`, `nom_name`, `nom_rel`, `nom_otherrel`, `nom_per`, `nom_status`, `nom_age`, `nom_dob`, `nom_panno`, `nom_aadhar`, `nom_address`, `nom_conti`, `nom_subscriber`, `updated_by`, `date_time`,`count`) VALUES ('01','SUR','$trans_id','$trans_id','$gis_pf','$nominee_type_gis','$gis_name','$gis_rel','$gis_otherrel','$gis_perc','$gis_status','$gis_age','$gis_dob','$gis_pan','$gis_adhr','$gis_address','$gis_conting','$gis_subsciber','$update_by',Now(),'$i')");
			}
			if ($sql1 && $sql2) {
				echo "<script>alert('GIS Nomination Added Successfully');window.location='sr_entry.php'</script>";
			} else {
				echo "<script>alert('NOT Added');window.location='sr_entry.php'</script>";
			}
			break;

		case 'update_gis_nominee':

			$fetch_pre = mysqli_query($conn,"select * from nominee_temp where nom_pf_number='" . $_POST['gis_pf1'] . "' and nom_type='GIS'");
			$pre_result = mysqli_num_rows($fetch_pre);

			$gis_counter = $_POST['gis_counter'];
			if ($gis_counter == "") {
				$gis_counter = $pre_result;
			}
			$trans_id = date('dmYHis');
			$update_by = $_SESSION['id'];
			$nom_pf = $_POST['gis_pf1'];
			$nominee_type = 'GIS';

			$count = 0;
			$s = mysqli_query($conn,"select * from nominee_temp where nom_pf_number='" . $_POST['gis_pf1'] . "' ORDER BY id DESC");
			$rs = mysqli_num_rows($s);
			if ($rs > 0) {
				$re = mysqli_fetch_array($s);
				$count = $re['count'] + 1;
			}

			for ($i = 1; $i <= $gis_counter; $i++) {

				$gis_update_id = $_POST['gis_update_id' . $i];
				//echo "<script>alert('$gis_update_id');</script>";
				$gis_name = $_POST['gis_name' . $i];
				$gis_rel = $_POST['gis_rel' . $i];
				$gis_otherrel = $_POST['gis_otherrel' . $i];
				$gis_perc = $_POST['gis_perc' . $i];
				$gis_status = $_POST['gis_status' . $i];
				$gis_age = $_POST['gis_age' . $i];
				$gis_dob = date('Y-m-d', strtotime($_POST['gis_dob' . $i]));
				$gis_pan = $_POST['gis_pan' . $i];
				$gis_adhr = $_POST['gis_adhr' . $i];
				$gis_address = $_POST['gis_address' . $i];
				$gis_conting = $_POST['gis_conting' . $i];
				$gis_subsciber = $_POST['gis_subsciber' . $i];

				if ($i > $pre_result) {
					$sql1 = mysqli_query($conn,"INSERT INTO `nominee_track`(`zone`, `division`, `temp_transaction_id`, `final_transaction_id`, `nom_pf_number`, `nom_type`, `nom_name`, `nom_rel`, `nom_otherrel`, `nom_per`, `nom_status`, `nom_age`, `nom_dob`, `nom_panno`, `nom_aadhar`, `nom_address`, `nom_conti`, `nom_subscriber`, `updated_by`, `date_time`,`count`) VALUES ('01','SUR','$trans_id','$trans_id','$nom_pf','$nominee_type','$gis_name','$gis_rel','$gis_otherrel','$gis_perc','$gis_status','$gis_age','$gis_dob','$gis_pan','$gis_adhr','$gis_address','$gis_conting','$gis_subsciber','$update_by',Now(),'$count')");

					$sql2 = mysqli_query($conn,"INSERT INTO `nominee_temp`(`zone`, `division`, `temp_transaction_id`, `nom_pf_number`, `nom_type`, `nom_name`, `nom_rel`, `nom_otherrel`, `nom_per`, `nom_status`, `nom_age`, `nom_dob`, `nom_panno`, `nom_aadhar`, `nom_address`, `nom_conti`, `nom_subscriber`, `updated_by`, `date_time`,`count`) VALUES ('01','SUR','$trans_id','$nom_pf','$nominee_type','$gis_name','$gis_rel','$gis_otherrel','$gis_perc','$gis_status','$gis_age','$gis_dob','$gis_pan','$gis_adhr','$gis_address','$gis_conting','$gis_subsciber','$update_by',Now(),'$count')") or die(mysqli_error($conn));
				} else {

					$sql1 = mysqli_query($conn,"UPDATE `nominee_temp` SET `zone`='01',`division`='SUR',`temp_transaction_id`='$trans_id',`nom_pf_number`='$nom_pf',`nom_type`='$nominee_type',`nom_name`='$gis_name',`nom_rel`='$gis_rel',`nom_otherrel`='$gis_otherrel',`nom_per`='$gis_perc',`nom_status`='$gis_status',`nom_age`='$gis_age',`nom_dob`='$gis_dob',`nom_panno`='$gis_pan',`nom_aadhar`='$gis_adhr',`nom_address`='$gis_address',`nom_conti`='$gis_conting',`nom_subscriber`='$gis_subsciber',`updated_by`='$update_by',`date_time`=Now() WHERE `nom_pf_number`='$nom_pf' and id='$gis_update_id'");

					$sql2 = mysqli_query($conn,"INSERT INTO `nominee_track`(`zone`, `division`, `temp_transaction_id`, `final_transaction_id`, `nom_pf_number`, `nom_type`, `nom_name`, `nom_rel`, `nom_otherrel`, `nom_per`, `nom_status`, `nom_age`, `nom_dob`, `nom_panno`, `nom_aadhar`, `nom_address`, `nom_conti`, `nom_subscriber`, `updated_by`, `date_time`) VALUES ('01','SUR','$trans_id','$trans_id','$nom_pf','$nominee_type','$gis_name','$gis_rel','$gis_otherrel','$gis_perc','$gis_status','$gis_age','$gis_dob','$gis_pan','$gis_adhr','$gis_address','$gis_conting','$gis_subsciber','$update_by',Now())");
				}
			}
			if ($sql1 && $sql2) {
				echo "<script>alert('PF Nomination Updated Successfully');window.location='nominee_update.php'</script>";
			} else {
				echo "<script>alert('NOT Updated');window.location='nominee_update.php'</script>";
			}
			break;

		case 'add_initial_medical':

			$trans_id = date('dmYHis');
			$update_by = $_SESSION['id'];
			$medi_pf_no = $_POST['medi_pf_no'];
			$medi_exam = $_POST['medi_exam'];
			$medi_cat = $_POST['medi_cat'];

			$medi_cat_pme = $_POST['medi_cat_pme'];
			$in_med_desig = $_POST['in_med_desig'];
			$medi_cer_no = $_POST['medi_cer_no'];

			if ($_POST['med_cer_date'] == '') {
				$med_cer_date = '';
			} else {
				$med_cer_date = date('Y-m-d', strtotime($_POST['med_cer_date']));
			}

			$med_ref = $_POST['med_ref'];

			if ($_POST['med_ref_date'] == '') {
				$med_ref_date = '';
			} else {
				$med_ref_date = date('Y-m-d', strtotime($_POST['med_ref_date']));
			}
			$med_remark = addslashes($_POST['med_remark']);
			$med_dob = date('Y-m-d', strtotime($_POST['med_dob']));
			if ($_POST['med_appo_date'] == '') {
				$med_appo_date = '';
			} else {
				$med_appo_date = date('Y-m-d', strtotime($_POST['med_appo_date']));
			}
			$medi_id = $_POST['medi_id'];
			//echo "id".$medi_id; 
			if ($medi_id == "") {
				$sql = mysqli_query($conn,"insert into medical_temp(temp_transaction_id,zone,division,medi_pf_number,medi_examtype,medi_cate,medi_class,medi_design,medi_certino,medi_certidate,medi_refno,medi_refdate,medi_remark,datetime,updated_by,medi_dob,medi_appo_date)values('$trans_id','01','SUR','$medi_pf_no','$medi_exam','$medi_cat','$medi_cat_pme','$in_med_desig','$medi_cer_no','$med_cer_date','$med_ref','$med_ref_date','$med_remark',NOW(),'$update_by','$med_dob','$med_appo_date')");


				$sql2 = mysqli_query($conn,"insert into medical_track(zone,temp_transaction_id,final_transaction_id,medi_pf_number,medi_examtype,medi_cate,medi_class,medi_design,medi_certino,medi_certidate,medi_refno,medi_refdate,medi_remark,datetime,updated_by,medi_dob,medi_appo_date)values('01','$trans_id','$trans_id','$medi_pf_no','$medi_exam','$medi_cat','$medi_cat_pme','$in_med_desig','$medi_cer_no','$med_cer_date','$med_ref','$med_ref_date','$med_remark',NOW(),'$update_by','$med_dob','$med_appo_date')");

				$action = "Inserted Initial Medical Record in Medical Temp and in Medical Track";
			} else {
				$conn = dbcon1();
				$fetch = mysqli_query($conn,"select * from `medical_temp` where `medi_pf_number`='$medi_pf_no' and id='$medi_id'");

				//echo "select * from `medical_temp` where `medi_pf_number`='$medi_pf_no' and id='$medi_id'".mysqli_error();

				$re = mysqli_fetch_array($fetch);

				if ($re['medi_pf_number'] == $medi_pf_no && $re['medi_examtype'] == $medi_exam && $re['medi_cate'] == $medi_cat && $re['medi_dob'] == $med_dob && $re['medi_appo_date'] == $med_appo_date && $re['medi_class'] == $medi_cat_pme && $re['medi_design'] == $in_med_desig && $re['medi_certino'] == $medi_cer_no && $re['medi_certidate'] == $med_cer_date && $re['medi_refno'] == $med_ref && $re['medi_refdate'] == $med_ref_date && $re['medi_remark'] == $med_remark) {
					echo "<script>alert('Nothing Has Changed');</script>";

					/* echo $re['medi_pf_number']."=".$medi_pf_no."<br>";
						echo $re['medi_examtype']."=".$medi_exam."<br>";
						echo $re['medi_cate']."=".$medi_cat."<br>"; 
						echo $re['medi_dob']."=".$med_dob."<br>"; 
						echo $re['medi_appo_date']."=".$med_appo_date."<br>"; 
						echo $re['medi_class']."=".$medi_cat_pme."<br>"; 
						echo $re['medi_design']."=".$in_med_desig."<br>";  
						echo $re['medi_certino']."=".$medi_cer_no."<br>"; 
						echo $re['medi_certidate']."=".$med_cer_date."<br>";
						echo $re['medi_refno']."=".$med_ref."<br>";
						echo $re['medi_refdate']."=".$med_ref_date."<br>";
						echo $re['medi_remark']."=".$med_remark."<br>";  */
				} else {
					//echo "<script>alert('in else');</script>";
					$sql2 = mysqli_query($conn,"insert into medical_track(zone,temp_transaction_id,final_transaction_id,medi_pf_number,medi_examtype,medi_cate,medi_class,medi_design,medi_certino,medi_certidate,medi_refno,medi_refdate,medi_remark,datetime,updated_by,medi_dob,medi_appo_date)values('01','$trans_id','$trans_id','$medi_pf_no','$medi_exam','$medi_cat','$medi_cat_pme','$in_med_desig','$medi_cer_no','$med_cer_date','$med_ref','$med_ref_date','$med_remark',NOW(),'$update_by','$med_dob','$med_appo_date')");

					$action = "Updated Initial Medical Record in Medical Temp and Inserted Record in Medical Track";
				}

				$sql = mysqli_query($conn,"UPDATE `medical_temp` SET `medi_examtype`='$medi_exam',`medi_cate`='$medi_cat',`medi_dob`='$med_dob',`medi_appo_date`='$med_appo_date',`medi_class`='$medi_cat_pme',`medi_design`='$in_med_desig',`medi_certino`='$medi_cer_no',`medi_certidate`='$med_cer_date',`medi_refno`='$med_ref',`medi_refdate`='$med_ref_date',`medi_remark`='$med_remark',`datetime`='NOW()' WHERE `medi_pf_number`='$medi_pf_no' and id='$medi_id'");
			}

			if ($sql && $sql2) {
				$action_on = $medi_pf_no;
				create_log($action, $action_on);
				echo "<script>alert('Initial Medical Added Successfully');window.location='medical_update.php'</script>";
			} else {
				echo "<script>alert('Initial Medical NOT Added');window.location='medical_update.php'</script>";
			}
			break;


		case 'update_initial_medical':

			$trans_id = date('dmYHis');
			$update_by = $_SESSION['id'];
			$medi_pf_no = $_POST['medi_pf_no'];
			$medi_exam = $_POST['medi_exam'];
			$medi_cat = $_POST['medi_cat'];
			//$med_dob=$_POST['medi_dob'];
			$medi_cat_pme = $_POST['medi_cat_pme'];
			$in_med_desig = $_POST['in_med_desig'];
			$medi_cer_no = $_POST['medi_cer_no'];
			// $a=$_POST['med_cer_date'];
			// echo $a;
			//$med_cer_date=date('Y-m-d', strtotime($_POST['med_cer_date']));
			if ($_POST['med_cer_date'] == '') {
				$med_cer_date = '';
			} else {
				$med_cer_date = date('Y-m-d', strtotime($_POST['med_cer_date']));
			}
			$med_ref = $_POST['med_ref'];
			if ($_POST['med_ref_date'] == '') {
				$med_ref_date = '';
			} else {
				$med_ref_date = date('Y-m-d', strtotime($_POST['med_ref_date']));
			}
			$med_remark = addslashes($_POST['med_remark']);
			$med_dob = date('Y-m-d', strtotime($_POST['med_dob']));
			if ($_POST['med_appo_date'] == '') {
				$med_appo_date = '';
			} else {
				$med_appo_date = date('Y-m-d', strtotime($_POST['med_appo_date']));
			}

			$sql = mysqli_query($conn,"insert into medical_temp(temp_transaction_id,zone,division,medi_pf_number,medi_examtype,medi_cate,medi_class,medi_design,medi_certino,medi_certidate,medi_refno,medi_refdate,medi_remark,datetime,updated_by,medi_dob,medi_appo_date)values('$trans_id','01','SUR','$medi_pf_no','$medi_exam','$medi_cat','$medi_cat_pme','$in_med_desig','$medi_cer_no','$med_cer_date','$med_ref','$med_ref_date','$med_remark',NOW(),'$update_by','$med_dob','$med_appo_date')");

			$sql2 = mysqli_query($conn,"insert into medical_track(zone,temp_transaction_id,final_transaction_id,medi_pf_number,medi_examtype,medi_cate,medi_class,medi_design,medi_certino,medi_certidate,medi_refno,medi_refdate,medi_remark,datetime,updated_by,medi_dob,medi_appo_date)values('01','$trans_id','$trans_id','$medi_pf_no','$medi_exam','$medi_cat','$medi_cat_pme','$in_med_desig','$medi_cer_no','$med_cer_date','$med_ref','$med_ref_date','$med_remark',NOW(),'$update_by','$med_dob','$med_appo_date')");

			$action = "Updated Record in Medical Temp and Inserted Record in Medical Track";
			$action_on = $medi_pf_no;
			create_log($action, $action_on);

			if ($sql && $sql2) {
				echo "<script>alert('Initial Medical Added Successfully');window.location='medical_update.php'</script>";
			} else {
				echo "<script>alert('Initial Medical NOT Added');window.location='medical_update.php'</script>";
			}


			break;




		case 'add_penalty':

			date_default_timezone_set('Asia/Kolkata');
			$trans_id = date('dmYHis');
			$pen_pf_no = $_POST['penalty_pf_no'];
			$penalty_count = $_POST['penalty_count'];

			if ($penalty_count == "") {
				$penalty_count = 1;
			}
			$update_by = $_SESSION['id'];


			for ($i = 1; $i <= $penalty_count; $i++) {
				$pen_type = $_POST['p_type' . $i];
				$pen_issued = date('Y-m-d', strtotime($_POST['pen_awarded' . $i]));
				$pen_effected = date('Y-m-d', strtotime($_POST['pen_eff' . $i]));
				$pen_letter_no = $_POST['l_no' . $i];
				$pen_letter_date = date('Y-m-d', strtotime($_POST['ltr_date' . $i]));
				$pen_chargesheet_status = $_POST['chrg_stat' . $i];
				$pen_chargesheet_ref = $_POST['pen_chrg_ref_no' . $i];
				$pen_from_date = date('Y-m-d', strtotime($_POST['f_date' . $i]));
				$pen_to_date = date('Y-m-d', strtotime($_POST['t_date' . $i]));
				$pen_remark = addslashes($_POST['penalty_remark' . $i]);

				$sql1 = ("insert into `penalty_track`(`zone`,`division`,`temp_transaction_id`,`final_transaction_id`,`pen_pf_number`,`pen_oldpf_number`, `pen_type`, `pen_issued`, `pen_effetcted`, `pen_letterno`, `pen_letterdate`, `pen_chargestatus`, `pen_chargeref`, `pen_from`, `pen_to`, `pen_remark`, `updated_by`, `date_time`, `updated_fields`, `updated_reason`, `updated_datetime`,`letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`, `count`)values('01','SUR','$trans_id','$trans_id','$pen_pf_no','','$pen_type','$pen_issued','$pen_effected','$pen_letter_no','$pen_letter_date','$pen_chargesheet_status','$pen_chargesheet_ref','$pen_from_date','$pen_to_date','$pen_remark','$update_by',Now(),'','','','','','','','','','$i')");


				$sql2 = ("insert into `penalty_temp`(`temp_transaction_id`,`zone`,`division`,`pen_pf_number`,`pen_oldpf_number`, `pen_type`, `pen_issued`, `pen_effetcted`, `pen_letterno`, `pen_letterdate`, `pen_chargestatus`, `pen_chargeref`, `pen_from`, `pen_to`, `pen_remark`, `updated_by`, `date_time`, `updated_fields`, `updated_reason`, `updated_datetime`,`letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`)values('$trans_id','01','SUR','$pen_pf_no','','$pen_type','$pen_issued','$pen_effected','$pen_letter_no','$pen_letter_date','$pen_chargesheet_status','$pen_chargesheet_ref','$pen_from_date','$pen_to_date','$pen_remark','$update_by',Now(),'','','','','','','','','','$i')");

				$result1 = mysqli_query($conn,$sql1);
				$result2 = mysqli_query($conn,$sql2);
			}

			if ($result1 && $result2) {
				echo "<script>window.location='sr_entry.php';alert('Penalty Added Successfully');</script>";
			} else {
				echo "<script>window.location='sr_entry.php';alert('Penalty NOT Added Successfully');</script>";
			}
			break;

		case 'add_training':

			date_default_timezone_set('Asia/Kolkata');
			$trans_id = date('dmYHis');
			session_start();
			$update_by = $_SESSION['id'];
			$tra_pf_no = $_POST['tr_pf_no'];
			$training_count = $_POST['training_count'];
			if ($training_count == "") {
				$training_count = 1;
			}

			for ($i = 1; $i <= $training_count; $i++) {
				$tra_type = $_POST['tr_training_status' . $i];
				$inst = $_POST['inst' . $i];
				$tr_dept = $_POST['tr_dept' . $i];
				$tr_desig = $_POST['tr_desig' . $i];
				$tra_last_date = date('Y-m-d', strtotime($_POST['tra_last_date' . $i]));
				$tra_due_date = date('Y-m-d', strtotime($_POST['tra_due_date' . $i]));
				$tra_from = date('Y-m-d', strtotime($_POST['tr_training_from' . $i]));
				$tra_to = date('Y-m-d', strtotime($_POST['tr_training_to' . $i]));
				$tra_letter_no = $_POST['tr_ltr_no' . $i];
				$tra_letter_date = date('Y-m-d', strtotime($_POST['tr_ltr_date' . $i]));
				$tra_desc = $_POST['tr_desc' . $i];
				$tra_remarks = $_POST['tr_remark' . $i];

				$sql1 = "insert into `training_track`(`zone`, `division`, `temp_transaction_id`, `final_transaction_id`, `pf_number`, `last_date`, `training_from`, `letter_no`, `description`, `remarks`, `training_type`,`tr_inst`,`tr_dept`,`tr_desig`, `due_date`, `training_to`, `letter_date`, `updated_by`, `date_time`, `updated_fields`, `updated_reason`,`uploaded_status`, `updated_datetime`, `letter_number`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`, `count`)values('01','SUR','$trans_id','$trans_id','$tra_pf_no','$tra_last_date','$tra_from','$tra_letter_no','$tra_desc','$tra_remarks','$tra_type','$inst','$tr_dept','$tr_desig','$tra_due_date','$tra_to','$tra_letter_date','$update_by',Now(),'','','','','','','','','','','$i')";

				$sql2 = "insert into `training_temp`(`temp_transaction_id`,`zone`,`division`,`pf_number`,`old_pf_number`, `last_date`, `training_type`,`tr_inst`,`tr_dept`,`tr_desig`, `due_date`, `training_from`, `letter_no`, `letter_date`, `description`, `remarks`, `updated_by`, `date_time`, `updated_fields`, `updated_reason`, `updated_datetime`, `letter_number`, `letter_datetime`,`uploaded_letter`,`uploaded_status`, `approved_by`, `approved_datetime`, `training_to`, `count`)values('$trans_id','01','SUR','$tra_pf_no','','$tra_last_date','$tra_type','$inst','$tr_dept','$tr_desig','$tra_due_date','$tra_from','$tra_letter_no','$tra_letter_date','$tra_desc','$tra_remarks','$update_by',Now(),'','','','','','','','','','$tra_to','$i')";

				$result1 = mysqli_query($conn,$sql1);
				$result2 = mysqli_query($conn,$sql2);
			}

			if ($result1 && $result2) {
				echo "<script>window.location='sr_entry.php';alert('Training Details Recorded Successfully');</script>";
			} else {
				echo "<script>window.location='sr_entry.php';alert('NOT Added');</script>";
			}
			break;

		case 'add_awards':
			date_default_timezone_set('Asia/Kolkata');
			$trans_id = date('dmYHis');
			$pf_no = $_POST['award_pf_no'];
			session_start();
			$update_by = $_SESSION['id'];
			$award_count = $_POST['award_count'];
			if ($award_count == "") {
				$award_count = 1;
			}
			for ($i = 1; $i <= $award_count; $i++) {
				$doa = date('Y-m-d', strtotime($_POST['award_date' . $i]));
				$awarded_by = $_POST['award_award_by' . $i];
				$select_awd_type = $_POST['award_type_award' . $i];
				$other_award = $_POST['award_other_award' . $i];
				$award_details = $_POST['award_detail' . $i];
				$award_ltr_no = $_POST['award_ltr_no' . $i];
				$award_ltr_date = date('Y-m-d', strtotime($_POST['award_ltr_date' . $i]));


				$sql1 = ("insert into `award_temp`(`temp_transaction_id`,`zone`,`division`,`awd_pf_number`,`awd_oldpf_number`,`awd_date`,`awd_by`,`awd_type`,`awd_other`,`awd_detail`,`date_time`,`updated_by`,`letter_no`,`letter_datetime`,`count`)values('$trans_id',01,'SUR','$pf_no','','$doa','$awarded_by','$select_awd_type','$other_award','$award_details',Now(),'$update_by','$award_ltr_no','$award_ltr_date','$i')");

				$sql2 = ("insert into `award_track`(`zone`,`division`,`temp_transaction_id`,`final_transaction_id`,`awd_pf_number`,`awd_oldpf_number`,`awd_date`,`awd_by`,`awd_type`,`awd_other`,`awd_detail`,`date_time`,`updated_by`,`letter_no`,`letter_datetime`,`count`)values(01,'SUR','$trans_id','$trans_id','$pf_no','','$doa','$awarded_by','$select_awd_type','$other_award','$award_details',Now(),'$update_by','$award_ltr_no','$award_ltr_date','$i')");

				$res1 = mysqli_query($conn,$sql1);
				$res2 = mysqli_query($conn,$sql2);
			}

			if ($res1 && $res2) {
				echo "<script>window.location='sr_entry.php';alert('Award Details Recorded Successfully');</script>";
			} else {
				echo "<script>window.location='sr_entry.php';alert('Award Details Not Recorded Successfully');</script>";
			}
			break;

		case 'family_compo':
			session_start();
			$hidden_fc_count = $_POST['hidden_fc_count'];
			if ($hidden_fc_count == "") {
				$hidden_fc_count = 1;
			}
			$fc_pf_main = $_POST['fc_pf_main'];
			$update_by = $_SESSION['id'];
			$trans_id = date('dmYHis');

			for ($i = 1; $i <= $hidden_fc_count; $i++) {
				$fc_pf_no = $_POST['fc_pf_no' . $i];

				$fc_updated_date = date('Y-m-d', strtotime($_POST['fc_updated_date' . $i]));
				$fc_fam_mem_name = $_POST['fc_fam_mem_name' . $i];
				$fc_mem_rel = $_POST['fc_mem_rel' . $i];
				$fc_mem_gender = $_POST['fc_mem_gender' . $i];
				$fc_fam_mem_dob = date('Y-m-d', strtotime($_POST['fc_fam_mem_dob' . $i]));

				$sql1 = ("insert into `family_temp`(`temp_transaction_id`,`zone`,`division`,`emp_pf`,`fmy_pf_number`,`fmy_updatedate`,`fmy_member`,`fmy_rel`,`fmy_gender`,`fmy_dob`,`updated_by`,`date_time`,`count`)values('$trans_id',01,'SUR','$fc_pf_main','$fc_pf_no','$fc_updated_date','$fc_fam_mem_name','$fc_mem_rel','$fc_mem_gender','$fc_fam_mem_dob','$update_by',Now(),'$i')");

				$sql2 = ("INSERT INTO `family_track`(`zone`, `division`, `temp_transaction_id`, `final_transaction_id`, `emp_pf`, `fmy_pf_number`,`fmy_updatedate`, `fmy_member`, `fmy_rel`, `fmy_gender`, `fmy_dob`, `updated_by`, `date_time`,`count`) VALUES (01,'SUR','$trans_id','$trans_id','$fc_pf_main','$fc_pf_no','$fc_updated_date','$fc_fam_mem_name','$fc_mem_rel','$fc_mem_gender','$fc_fam_mem_dob','$update_by',Now(),'$i')");


				$res1 = mysqli_query($conn,$sql1);
				$res2 = mysqli_query($conn,$sql2);
			}

			if ($res1 && $res2) {
				echo "<script>window.location='sr_entry.php';alert('Family Member Added Successfully');</script>";
			} else {
				echo "<script>window.location='sr_entry.php';alert('Family Member NOT Added Successfully');</script>";
			}
			break;

		case 'update_family_compo':
			$fetch_pre = mysqli_query($conn,"select * from family_temp where emp_pf='" . $_POST['fc_pf_main'] . "'");
			$pre_result = mysqli_num_rows($fetch_pre);

			session_start();

			$hidden_fc_count = $_POST['hidden_fc_count'];
			if ($hidden_fc_count == "") {
				$hidden_fc_count = $pre_result;
			}
			$fc_pf_main = $_POST['fc_pf_main'];
			$update_by = $_SESSION['id'];
			$trans_id = date('dmYHis');
			$count = 0;
			$s = mysqli_query($conn,"select * from family_temp where emp_pf='$fc_pf_main' ORDER BY id DESC");
			$rs = mysqli_num_rows($s);
			if ($rs > 0) {
				$re = mysqli_fetch_array($s);
				$count = $re['count'] + 1;
			}

			for ($i = 1; $i <= $hidden_fc_count; $i++) {
				$family_update_id = $_POST['family_update_id' . $i];
				$fc_pf_no = $_POST['fc_pf_no' . $i];
				$fc_updated_date = date('Y-m-d', strtotime($_POST['fc_updated_date' . $i]));
				$fc_fam_mem_name = $_POST['fc_fam_mem_name' . $i];
				$fc_mem_rel = $_POST['fc_mem_rel' . $i];
				$fc_mem_gender = $_POST['fc_mem_gender' . $i];
				$fc_fam_mem_dob = date('Y-m-d', strtotime($_POST['fc_fam_mem_dob' . $i]));;
				/* echo $_POST['fc_updated_date1']."<br>";
			echo $i."<br>";
			echo "fc_updated_date".$fc_updated_date."<br>";
			echo "fc_fam_mem_dob".$fc_fam_mem_dob."<br>"; */

				if ($i > $pre_result) {
					$count = 0;
					$f_c = mysqli_query($conn,"select count from family_temp where `emp_pf`='$fc_pf_main' order by id desc limit 1");
					$res = mysqli_fetch_array($f_c);
					if ($res['count'] == "") {
						$count++;
						//echo "if".$count."<br>";
					} else {
						$count = $res['count'] + 1;
						//echo "else".$count."<br>";
					}

					$sql1 = mysqli_query($conn,"insert into `family_temp`(`temp_transaction_id`,`zone`,`division`,`emp_pf`,`fmy_pf_number`,`fmy_updatedate`,`fmy_member`,`fmy_rel`,`fmy_gender`,`fmy_dob`,`updated_by`,`date_time`,`count`)values('$trans_id',01,'SUR','$fc_pf_main','$fc_pf_no','$fc_updated_date','$fc_fam_mem_name','$fc_mem_rel','$fc_mem_gender','$fc_fam_mem_dob','$update_by',Now(),'$count')");

					$sql2 = mysqli_query($conn,"INSERT INTO `family_track`(`zone`, `division`, `temp_transaction_id`, `final_transaction_id`, `emp_pf`, `fmy_pf_number`,`fmy_updatedate`, `fmy_member`, `fmy_rel`, `fmy_gender`, `fmy_dob`, `updated_by`, `date_time`,`count`) VALUES (01,'SUR','$trans_id','$trans_id','$fc_pf_main','$fc_pf_no','$fc_updated_date','$fc_fam_mem_name','$fc_mem_rel','$fc_mem_gender','$fc_fam_mem_dob','$update_by',Now(),'$count')");

					$action = "Inserted Record in Family Temp and in Family Track";
				} else {
					$f_q = mysqli_query($conn,"select count from family_temp where `emp_pf`='$fc_pf_main' and `id`='$family_update_id'");
					$re = mysqli_fetch_array($f_q);
					$count = $re['count'];

					$conn = dbcon1();
					$sq = mysqli_query($conn,"SELECT * from family_temp where emp_pf='" . $fc_pf_main . "' and id='" . $family_update_id . "'");
					if ($sq) {
						while ($fetch_sql = mysqli_fetch_array($sq)) {
							if ($fc_updated_date == $fetch_sql['fmy_updatedate'] && $fc_fam_mem_name == $fetch_sql['fmy_member'] && $fc_mem_rel == $fetch_sql['fmy_rel'] && $fc_mem_gender == $fetch_sql['fmy_gender'] && $fc_fam_mem_dob == $fetch_sql['fmy_dob']) {
								echo "<script>alert('Nothing Changed')</script>";
							} else {

								$sql2 = mysqli_query($conn,"INSERT INTO `family_track`(`zone`, `division`, `temp_transaction_id`, `final_transaction_id`, `emp_pf`, `fmy_pf_number`,`fmy_updatedate`, `fmy_member`, `fmy_rel`, `fmy_gender`, `fmy_dob`, `updated_by`, `date_time`,`count`) VALUES (01,'SUR','$trans_id','$trans_id','$fc_pf_main','$fc_pf_no','$fc_updated_date','$fc_fam_mem_name','$fc_mem_rel','$fc_mem_gender','$fc_fam_mem_dob','$update_by',Now(),'$count')") or die(mysqli_error($conn));

								$action = "Updated Record in Family Temp and Inserted Record in Family Track";
							}
						}
					}

					$sql1 = mysqli_query($conn,"UPDATE `family_temp` SET `zone`=01,`division`='SUR',`emp_pf`='$fc_pf_main',`fmy_pf_number`='$fc_pf_no',`fmy_updatedate`='$fc_updated_date',`fmy_member`='$fc_fam_mem_name',`fmy_rel`='$fc_mem_rel',`fmy_gender`='$fc_mem_gender',`fmy_dob`='$fc_fam_mem_dob',`updated_by`='$update_by',`date_time`=Now() WHERE `emp_pf`='$fc_pf_main' and `id`='$family_update_id'");
				}
			}
			if ($sql1 && $sql2) {
				$action_on = $fc_pf_main;
				create_log($action, $action_on);
				echo "<script>window.location='family_update.php';alert('Family Composition Updated Successfully');</script>";
			} else {
				echo "<script>window.location='family_update.php';alert('Family Composition NOT Updated Successfully');</script>";
			}

			break;

		case 'add_advance':
			echo $_POST['adv_count'];
			date_default_timezone_set('Asia/Kolkata');
			$trans_id = date('dmYHis');
			session_start();
			$update_by = $_SESSION['id'];
			$adv_count = $_POST['adv_count'];
			if ($adv_count == "") {
				$adv_count = 1;
			}
			$pf_no = $_POST['adv_pf'];

			for ($i = 1; $i <= $adv_count; $i++) {

				$advance_type = $_POST['adv_type' . $i];
				$letter_no = $_POST['adv_letterno' . $i];
				$letter_date = date('Y-m-d', strtotime($_POST['adv_letterdate' . $i]));
				$wefdate = date('Y-m-d', strtotime($_POST['adv_wefdate' . $i]));
				$amount = $_POST['adv_amount' . $i];
				$principle = $_POST['adv_principle' . $i];
				$interest = $_POST['adv_interest' . $i];
				$fromdate = date('Y-m-d', strtotime($_POST['adv_frmdate' . $i]));
				$todate = date('Y-m-d', strtotime($_POST['adv_todate' . $i]));
				$remark = $_POST['adv_remark' . $i];

				$sql1 = ("insert into `advance_temp`(`zone`,`division`,`temp_transaction_id`,`adv_pf_number`,`adv_oldpf_number`,`adv_type`,`adv_letterno`,`adv_letterdate`,`adv_wefdate`,`adv_amount`,`adv_principle`,`adv_interest`,`adv_from`,`adv_to`,`adv_remark`,`updated_by`,`date_time`,`updated_fields`,`updated_reason`,`updated_datetime`,`letter_no`,`letter_datetime`,`uploaded_letter`,`approved_status`,`approved_by`,`approved_datetime`,`count`)values(01,'SUR','$trans_id','$pf_no','','$advance_type','$letter_no','$letter_date','$wefdate','$amount','$principle','$interest','$fromdate','$todate','$remark','$update_by',Now(),'','','','','','','','','','$i')");

				$sql2 = ("insert into `advance_track`(`zone`,`division`,`temp_transaction_id`,`final_transaction_id`,`adv_pf_number`,`adv_oldpf_number`,`adv_type`,`adv_letterno`,`adv_letterdate`,`adv_wefdate`,`adv_amount`,`adv_principle`,`adv_interest`,`adv_from`,`adv_to`,`adv_remark`,`updated_by`,`date_time`,`updated_fields`,`updated_reason`,`updated_datetime`,`letter_no`,`letter_datetime`,`uploaded_letter`,`approved_status`,`approved_by`,`approved_datetime`,`count`)values(01,'SUR','$trans_id','$trans_id','$pf_no','','$advance_type','$letter_no','$letter_date','$wefdate','$amount','$principle','$interest','$fromdate','$todate','$remark','$update_by',Now(),'','','','','','','','','','$i')");

				$res1 = mysqli_query($conn,$sql1);
				$res2 = mysqli_query($conn,$sql2);

				$action = "Inserted Record in Advance Temp and in Advance Track";
				$action_on = $pf_no;
				create_log($action, $action_on);
			}

			if ($res1 && $res2) {
				echo "<script>window.location='sr_entry.php';alert('Advances Details Recorded Successfully');</script>";
			} else {
				echo "<script>window.location='sr_entry.php';alert('Advances Details NOT Recorded Successfully');</script>";
			}
			break;

		case 'update_present_work_detail':

			$pre_pf_no = $_POST['pre_pf_no'];
			$preapp_dept = $_POST['preapp_dept'];
			$preapp_subtype1 = $_POST['preapp_subtype1'];
			$preapp_desig = $_POST['preapp_desig'];
			$depot_bill_unit1 = $_POST['depot_bill_unit1'];
			$ps_type_2 = $_POST['ps_type_2'];
			if ($ps_type_2 == 1) {
				$preapp_scale = $_POST['preapp_scale_text'];
			} else if ($ps_type_2 == 2 || $ps_type_2 == 3 || $ps_type_2 == 4) {
				$preapp_scale = $_POST['preapp_scale'];
			}
			$preapp_level = $_POST['preapp_level'];
			$preapp_group = $_POST['preapp_group'];
			$station_id6 = $_POST['station_id6'];
			$preapp_otherstation = $_POST['preapp_otherstation'];
			$preapp_rop = $_POST['preapp_rop'];

			//SGD
			$preapp_sgd_desig = $_POST['preapp_sgd_desig'];
			$sgd_ps_type_2 = $_POST['sgd_ps_type_2'];
			$preapp_sgd_other_desig = $_POST['preapp_sgd_other_desig'];
			$preapp_sgd_level = $_POST['preapp_sgd_level'];
			if ($sgd_ps_type_2 == 1) {
				$preapp_sgd_scale = $_POST['preapp_sgd_scale_text'];
			} else if ($sgd_ps_type_2 == 2 || $sgd_ps_type_2 == 3 || $sgd_ps_type_2 == 4) {
				$preapp_sgd_scale = $_POST['preapp_sgd_scale'];
			}
			$sgd_depot_bill_unit1 = $_POST['depot_bill_unit2'];
			$station_id4 = $_POST['station_id4'];
			$sgd_preapp_group = $_POST['sgd_preapp_group'];

			//OGD
			$preapp_ogd_desig = $_POST['preapp_ogd_desig'];
			$ogd_ps_type_2 = $_POST['ogd_ps_type_2'];
			if ($ogd_ps_type_2 == 1) {
				$preapp_ogd_scale = $_POST['preapp_ogd_scale_text'];
			} else if ($ogd_ps_type_2 == 2 || $ogd_ps_type_2 == 3 || $ogd_ps_type_2 == 4) {
				$preapp_ogd_scale = $_POST['preapp_ogd_scale'];
			}
			$preapp_ogd_other_desig = $_POST['preapp_ogd_other_desig'];
			$preapp_ogd_level = $_POST['preapp_ogd_level'];
			$ogd_depot_bill_unit1 = $_POST['depot_bill_unit4'];
			$station_id5 = $_POST['station_id5'];
			$ogd_preapp_group = $_POST['preapp_ogd_group'];
			$preapp_ogd_rop = $_POST['preapp_ogd_rop'];

			$yremark = $_POST['pwd1_remark'];
			$nremark = $_POST['pwd_remark'];

			date_default_timezone_set('Asia/Kolkata');
			$transaction_id = date('Ymdhis');
			$final_transaction_id = date('Ymdhis');
			session_start();
			$updated_by = $_SESSION['id'];
			$pre = mysqli_query($conn,"select * from `present_work_temp` where preapp_pf_number='" . $_SESSION['set_update_pf'] . "'");

			$pre_fetch = mysqli_num_rows($pre);

			if ($pre_fetch == 0) {

				$sql = mysqli_query($conn,"INSERT INTO `present_work_temp` (`temp_transaction_id`, `zone`, `division`, `preapp_pf_number`,`preapp_department`, `preapp_designation`,`pre_otherdesign`, `ps_type`, `preapp_scale`, `preapp_level`, `preapp_group`, `preapp_station`, `preapp_billunit`, `preapp_rop`, `preapp_depot`, `sgd_dropdwn`, `sgd_designation`,`presgd_otherdesign`, `sgd_pst`, `sgd_scale`,`sgd_level`, `sgd_billunit`, `sgd_depot`, `sgd_station`, `sgd_group`, `ogd_desig`,`preogd_otherdesign`, `ogd_pst`, `ogd_scale`,`ogd_level`, `ogd_billunit`, `ogd_depot`, `ogd_station`, `ogd_group`, `ogd_rop`,`pre_remarky`,`pre_remarkn`, `updated_by`, `date_time`, `updated_fields`, `updated_reason`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`) VALUES ('$transaction_id','01','SUR','$pre_pf_no','$preapp_dept','$preapp_desig','$preapp_otherstation','$ps_type_2','$preapp_scale','$preapp_level','$preapp_group','$station_id6','$depot_bill_unit1','$preapp_rop','$depot_bill_unit1','$preapp_subtype1','$preapp_sgd_desig','$preapp_sgd_other_desig','$sgd_ps_type_2','$preapp_sgd_scale','$preapp_sgd_level','$sgd_depot_bill_unit1','$sgd_depot_bill_unit1','$station_id4','$sgd_preapp_group' ,'$preapp_ogd_desig','$preapp_ogd_other_desig','$ogd_ps_type_2','$preapp_ogd_scale','$preapp_ogd_level','$ogd_depot_bill_unit1','$ogd_depot_bill_unit1','$station_id5','$ogd_preapp_group','$preapp_ogd_rop','$yremark','$nremark','$updated_by',Now(),'','','','','','','','')");

				$sq2 = mysqli_query($conn,"INSERT INTO `present_work_track` (`temp_transaction_id`, `zone`, `division`, `preapp_pf_number`,`preapp_department`, `preapp_designation`,`pre_otherdesign`, `ps_type`, `preapp_scale`, `preapp_level`, `preapp_group`, `preapp_station`, `preapp_billunit`, `preapp_rop`, `preapp_depot`, `sgd_dropdwn`, `sgd_designation`,`presgd_otherdesign`, `sgd_pst`, `sgd_scale`,`sgd_level`, `sgd_billunit`, `sgd_depot`, `sgd_station`, `sgd_group`, `ogd_desig`,`preogd_otherdesign`, `ogd_pst`, `ogd_scale`,`ogd_level`, `ogd_billunit`, `ogd_depot`, `ogd_station`, `ogd_group`, `ogd_rop`, `pre_remarky`,`pre_remarkn`,`updated_by`, `date_time`, `updated_fields`, `updated_reason`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`final_transaction_id`) VALUES ('$transaction_id','01','SUR','$pre_pf_no','$preapp_dept','$preapp_desig','$preapp_otherstation','$ps_type_2','$preapp_scale','$preapp_level','$preapp_group','$station_id6','$depot_bill_unit1','$preapp_rop','$depot_bill_unit1','$preapp_subtype1','$preapp_sgd_desig','$preapp_sgd_other_desig','$sgd_ps_type_2','$preapp_sgd_scale','$preapp_sgd_level','$sgd_depot_bill_unit1','$sgd_depot_bill_unit1','$station_id4','$sgd_preapp_group' ,'$preapp_ogd_desig','$preapp_ogd_other_desig','$ogd_ps_type_2','$preapp_ogd_scale','$preapp_ogd_level','$ogd_depot_bill_unit1','$ogd_depot_bill_unit1','$station_id5','$ogd_preapp_group','$preapp_ogd_rop','$yremark','$nremark','$updated_by',Now(),'','','','','','','','','$transaction_id')");

				$action = "Inserted Record in Present Work Temp and in Present Work Track";
			} else {
				$conn = dbcon1();
				$sq = mysqli_query($conn,"SELECT * from present_work_temp where preapp_pf_number='" . $pre_pf_no . "'");
				if ($sq) {
					while ($fetch_sql = mysqli_fetch_array($sq)) {
						if ($preapp_dept == $fetch_sql['preapp_department'] && $preapp_subtype1 == $fetch_sql['sgd_dropdwn'] && $preapp_desig == $fetch_sql['preapp_designation'] && $depot_bill_unit1 == $fetch_sql['preapp_billunit'] && $ps_type_2 == $fetch_sql['ps_type'] && $preapp_scale == $fetch_sql['preapp_scale'] && $preapp_level == $fetch_sql['preapp_level'] && $preapp_group == $fetch_sql['preapp_group'] && $station_id6 == $fetch_sql['preapp_station'] && $preapp_otherstation == $fetch_sql['pre_otherdesign'] && $preapp_rop == $fetch_sql['preapp_rop'] && $preapp_sgd_desig == $fetch_sql['sgd_designation'] && $sgd_ps_type_2 == $fetch_sql['sgd_pst'] && $preapp_sgd_other_desig == $fetch_sql['presgd_otherdesign'] && $preapp_sgd_level == $fetch_sql['sgd_level'] && $preapp_sgd_scale == $fetch_sql['sgd_scale'] && $sgd_depot_bill_unit1 == $fetch_sql['sgd_billunit'] && $station_id4 == $fetch_sql['sgd_station'] && $sgd_preapp_group == $fetch_sql['sgd_group'] && $preapp_ogd_desig == $fetch_sql['ogd_desig'] && $ogd_ps_type_2 == $fetch_sql['ogd_pst'] && $preapp_ogd_scale == $fetch_sql['ogd_scale'] && $preapp_ogd_other_desig == $fetch_sql['preogd_otherdesign'] && $preapp_ogd_level == $fetch_sql['ogd_level'] && $ogd_depot_bill_unit1 == $fetch_sql['ogd_billunit'] && $station_id5 == $fetch_sql['ogd_station'] && $ogd_preapp_group == $fetch_sql['ogd_group'] && $preapp_ogd_rop == $fetch_sql['ogd_rop'] && $yremark == $fetch_sql['pre_remarky'] && $nremark == $fetch_sql['pre_remarkn']) {
							echo "<script>alert('Nothing Has Changed')</script>";
						} else {
							/* echo "<script>alert('In else')</script>";
								
								echo $preapp_dept."==".$fetch_sql['preapp_department']."<br>";
								echo $preapp_subtype1."==".$fetch_sql['sgd_dropdwn']."<br>";
								echo $preapp_desig."==".$fetch_sql['preapp_designation']."<br>"; 
								echo $depot_bill_unit1."==".$fetch_sql['preapp_billunit']."<br>";
								echo $ps_type_2."==".$fetch_sql['ps_type']."<br>";
								echo $preapp_scale."==".$fetch_sql['preapp_scale']."<br>";
								echo $preapp_level."==".$fetch_sql['preapp_level']."<br>";
								echo $preapp_group."==".$fetch_sql['preapp_group']."<br>"; 
								echo $station_id6."==".$fetch_sql['preapp_station']."<br>"; 
								echo $preapp_otherstation."==".$fetch_sql['pre_otherdesign']."<br>"; 
								echo $preapp_rop."==".$fetch_sql['preapp_rop']."<br>"; 
								echo $preapp_sgd_desig."==".$fetch_sql['sgd_designation']."<br>"; 
								echo $sgd_ps_type_2."==".$fetch_sql['sgd_pst']."<br>"; 
								echo $preapp_sgd_other_desig."==".$fetch_sql['presgd_otherdesign']."<br>"; 
								echo $preapp_sgd_level."==".$fetch_sql['sgd_level']."<br>"; 
								echo $preapp_sgd_scale."==".$fetch_sql['sgd_scale']."<br>"; 
								echo $sgd_depot_bill_unit1."==".$fetch_sql['sgd_billunit']."<br>"; 
								echo $station_id4."==".$fetch_sql['sgd_station']."<br>"; 
								echo $sgd_preapp_group."==".$fetch_sql['sgd_group']."<br>"; 
								echo $preapp_ogd_desig."==".$fetch_sql['ogd_desig']."<br>"; 
								echo $ogd_ps_type_2."==".$fetch_sql['ogd_pst']."<br>"; 
								echo $preapp_ogd_scale."==".$fetch_sql['ogd_scale']."<br>"; 
								echo $preapp_ogd_other_desig."==".$fetch_sql['preogd_otherdesign']."<br>"; 
								echo $preapp_ogd_level."==".$fetch_sql['ogd_level']."<br>"; 
								echo $ogd_depot_bill_unit1."==".$fetch_sql['ogd_billunit']."<br>"; 
								echo $station_id5."==".$fetch_sql['ogd_station']."<br>"; 
								echo $ogd_preapp_group."==".$fetch_sql['ogd_group']."<br>";
								echo $preapp_ogd_rop."==".$fetch_sql['ogd_rop']."<br>"; 
								echo $yremark."==".$fetch_sql['pre_remarky']."<br>"; 
								echo $nremark."==".$fetch_sql['pre_remarkn']."<br>";  */


							$sq2 = mysqli_query($conn,"INSERT INTO `present_work_track` (`temp_transaction_id`, `zone`, `division`, `preapp_pf_number`,`preapp_department`, `preapp_designation`,`pre_otherdesign`, `ps_type`, `preapp_scale`, `preapp_level`, `preapp_group`, `preapp_station`, `preapp_billunit`, `preapp_rop`, `preapp_depot`, `sgd_dropdwn`, `sgd_designation`,`presgd_otherdesign`, `sgd_pst`, `sgd_scale`,`sgd_level`, `sgd_billunit`, `sgd_depot`, `sgd_station`, `sgd_group`, `ogd_desig`,`preogd_otherdesign`, `ogd_pst`, `ogd_scale`,`ogd_level`, `ogd_billunit`, `ogd_depot`, `ogd_station`, `ogd_group`, `ogd_rop`, `pre_remarky`,`pre_remarkn`, `updated_by`, `date_time`, `updated_fields`, `updated_reason`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`) VALUES ('$transaction_id','01','SUR','$pre_pf_no','$preapp_dept','$preapp_desig','$preapp_otherstation','$ps_type_2','$preapp_scale','$preapp_level','$preapp_group','$station_id6','$depot_bill_unit1','$preapp_rop','$depot_bill_unit1','$preapp_subtype1','$preapp_sgd_desig','$preapp_sgd_other_desig','$sgd_ps_type_2','$preapp_sgd_scale','$preapp_sgd_level','$sgd_depot_bill_unit1','$sgd_depot_bill_unit1','$station_id4','$sgd_preapp_group' ,'$preapp_ogd_desig','$preapp_ogd_other_desig','$ogd_ps_type_2','$preapp_ogd_scale','$preapp_ogd_level','$ogd_depot_bill_unit1','$ogd_depot_bill_unit1','$station_id5','$ogd_preapp_group','$preapp_ogd_rop','$yremark','$nremark','$updated_by',Now(),'','','','','','','','')");

							$action = "Updated Record in Present Work Temp and Inserted Record in Present Work Track";
						}
					}
				}
				$sql = mysqli_query($conn,"UPDATE `present_work_temp` SET `zone`='SUR',`division`='06',`preapp_pf_number`='$pre_pf_no',`preapp_department`='$preapp_dept',`preapp_designation`='$preapp_desig',`ps_type`='$ps_type_2',`preapp_scale`='$preapp_scale',`preapp_level`='$preapp_level',`preapp_group`='$preapp_group',`preapp_station`='$station_id6',`preapp_billunit`='$depot_bill_unit1',`preapp_rop`='$preapp_rop',`preapp_depot`='$depot_bill_unit1',`sgd_dropdwn`='$preapp_subtype1',`sgd_designation`='$preapp_sgd_desig',`presgd_otherdesign`='$preapp_sgd_other_desig',`sgd_pst`='$sgd_ps_type_2',`sgd_scale`='$preapp_sgd_scale',`sgd_level`='$preapp_sgd_level',`sgd_billunit`='$sgd_depot_bill_unit1',`sgd_depot`='$sgd_depot_bill_unit1',`sgd_station`='$station_id4',`sgd_group`='$sgd_preapp_group',`ogd_desig`='$preapp_ogd_desig',`preogd_otherdesign`='$preapp_ogd_other_desig',`ogd_pst`='$ogd_ps_type_2',`ogd_scale`='$preapp_ogd_scale',`ogd_level`='$preapp_ogd_level',`ogd_billunit`='$ogd_depot_bill_unit1',`ogd_depot`='$ogd_depot_bill_unit1',`ogd_station`='$station_id5',`ogd_group`='$ogd_preapp_group',`ogd_rop`='$preapp_ogd_rop',`pre_remarky`='$yremark',`pre_remarkn`='$nremark',`updated_by`='$updated_by',`date_time`='NOW()' WHERE preapp_pf_number='$pre_pf_no'");
			}

			if ($sql && $sq2) {
				$action_on = $pre_pf_no;
				create_log($action, $action_on);
				echo "<script>alert('Present Working Details Updated Successfully');window.location='present_work_update.php'</script>";
			} else {
				echo "<script>alert('Present Working Details NOT Updated Successfully');window.location='present_work_update.php'</script>";
			}
			break;


		case 'add_lastentry';
			date_default_timezone_set('Asia/Kolkata');
			$trans_id = date('dmYHis');
			$le_pf_no = $_POST['le_pf_no'];
			$le_doj = date('Y-m-d', strtotime($_POST['le_doj']));
			$le_retiredment_type = $_POST['le_retiredment_type'];

			echo $le_retiredment_type;
			$le_retirement_date = date('Y-m-d', strtotime($_POST['tr_training_from']));
			$le_des_retire = $_POST['desc_id'];
			$le_dept = $_POST['dept_id'];
			$station11 = $_POST['stationh'];
			$le_rop = $_POST['le_rop'];
			$billunit20 = $_POST['billunit_id'];
			$depot20 = $_POST['billunit_id'];
			$le_scale_level = $_POST['le_scale_level'];
			//$le_emp_cat=$_POST['le_emp_cat'];
			$le_total_year = $_POST['le_total_year'];
			$le_total_month = $_POST['le_total_month'];
			$le_total_day = $_POST['le_total_day'];
			$le_total_year2 = $_POST['le_total_year2'];
			$le_total_month2 = $_POST['le_total_month2'];
			$le_total_day2 = $_POST['le_total_day2'];
			$le_lap = $_POST['le_lap'];
			$le_lhap = $_POST['le_lhap'];
			//$le_advance=$_POST['le_advance'];
			$le_due = $_POST['due_type'];
			$due_type = implode(',', $le_due);
			$le_due_amt = $_POST['due_amt'];
			$due_amt = implode(',', $le_due_amt);

			if ($le_retiredment_type == '1') {
				$service_status = '1';
			} else if ($le_retiredment_type == '2') {
				$service_status = '2';
			} else if ($le_retiredment_type == '3') {
				$service_status = '3';
			} else if ($le_retiredment_type == '4') {
				$service_status = '4';
			} else if ($le_retiredment_type == '5') {
				$service_status = '5';
			} else if ($le_retiredment_type == '6') {
				$service_status = '6';
			} else if ($le_retiredment_type == '7') {
				$service_status = '7';
			} else if ($le_retiredment_type == '8') {
				$service_status = '8';
			} else if ($le_retiredment_type == '9') {
				$service_status = '9';
			} else if ($le_retiredment_type == '10') {
				$service_status = '10';
			} else if ($le_retiredment_type == '11') {
				$service_status = '11';
			}

			session_start();
			$update_by = $_SESSION['id'];

			$sql = mysqli_query($conn,"insert into `lastentry_temp`(`zone`, `division`, `trans_id`, `pf_number`, `old_pf_number`, `date_of_join`, `retire_type`, `retire_date`, `retire_designation`, `department`, `station`, `rop`, `bill_unit`, `scale`, `depot`, `emp_category`, `total_years`, `total_months`, `total_days`, `no_years`, `no_months`, `no_days`, `lap`, `lhap`, `advance_leave`, `updated_by`, `date_time`, `updated_fields`, `updated_reason`, `updated_datetime`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`)values('01','SUR','$trans_id','$le_pf_no','','$le_doj','$le_retiredment_type','$le_retirement_date','$le_des_retire','$le_dept','$station11','$le_rop','$billunit20','$le_scale_level','$depot20','$le_total_year','$le_total_month','$le_total_day','$le_total_year2','$le_total_month2','$le_total_day2','$le_lap','$le_lhap','$update_by','Now()','','','','','','','','','','$due_type','$due_amt')");


			$sql1 = mysqli_query($conn,"update present_work_temp set serving_status='$service_status' where preapp_pf_number='$le_pf_no'");

			// echo "update present_work_temp set serving_status='$service_status' where preapp_pf_number='$le_pf_no'".mysqli_error()."<br>";

			// echo "insert into `lastentry_temp``zone`, `division`, `trans_id`, `pf_number`, `old_pf_number`, `date_of_join`, `retire_type`, `retire_date`, `retire_designation`, `department`, `station`, `rop`, `bill_unit`, `scale`, `depot`, `emp_category`, `total_years`, `total_months`, `total_days`, `no_years`, `no_months`, `no_days`, `lap`, `lhap`, `advance_leave`, `updated_by`, `date_time`, `updated_fields`, `updated_reason`, `updated_datetime`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`)values('01','SUR','$trans_id','$le_pf_no','','$le_doj','$le_retiredment_type','$le_retirement_date','$le_des_retire','$le_dept','$station11','$le_rop','$billunit20','$le_scale_level','$depot20','$le_total_year','$le_total_month','$le_total_day','$le_total_year2','$le_total_month2','$le_total_day2','$le_lap','$le_lhap','$update_by','Now()','','','','','','','','','','$due_type','$due_amt')".mysqli_error();

			$action = "Inserted Record in Last Entry";
			$action_on = $le_pf_no;
			create_log($action, $action_on);

			if ($sql && $sql1) {
				echo "<script>window.location='last_update.php';alert('Last Entry Added Successfully');</script>";
			} else {
				echo "<script>window.location='last_update.php';alert('Not Added');</script>";
			}
			break;

		case 'update_appointment':

			$app_pf_no = $_POST['app_pf_no'];
			$app_dept = $_POST['app_dept'];
			$app_desig = $_POST['app_desig'];
			$app_other_desig = $_POST['app_other_desig'];
			$initial_type = $_POST['initial_type'];
			if ($_POST['app_date'] == '') {
				$app_date = '';
			} else {
				$app_date = date('Y-m-d', strtotime($_POST['app_date']));
			}
			if ($_POST['app_datereg'] == '') {
				$app_datereg = '';
			} else {
				$app_datereg = date('Y-m-d', strtotime($_POST['app_datereg']));
			}
			$ps_type_1 = $_POST['ps_type_1'];
			$app_group = $_POST['app_group'];
			$app_level = $_POST['app_level'];
			if ($ps_type_1 == 1) {
				$app_scale = $_POST['app_scale_text'];
			} else if ($ps_type_1 == 2 || $ps_type_1 == 3 || $ps_type_1 == 4) {
				$app_scale = $_POST['app_scale'];
			}
			$station_id3 = $_POST['station_id3'];
			$app_rop = $_POST['app_rop'];
			$app_depot = $_POST['depot_bill_unit3'];
			$app_letterno = $_POST['app_letterno'];
			if ($_POST['app_letterdate'] == '') {
				$_POST['app_letterdate'] = '';
			} else {
				$app_letterdate = date('Y-m-d', strtotime($_POST['app_letterdate']));
			}
			$app_remark = $_POST['app_remark'];
			$app_otherstation = $_POST['app_otherstation'];
			//$app_bill_unit=$_POST['depot_bill_unit3'];
			date_default_timezone_set('Asia/Kolkata');
			$temp_transaction_id = date('Ymdhis');
			$final_transaction_id = date('Ymdhis');
			session_start();
			$updated_by = $_SESSION['id'];

			$sql = mysqli_query($conn,"select * from appointment_temp where app_pf_number='" . $_SESSION['set_update_pf'] . "'");
			$sql_fetch = mysqli_num_rows($sql);

			if ($sql_fetch == 0) {

				$appoint_temp_sql = mysqli_query($conn,"INSERT INTO `appointment_temp`(`temp_transaction_id`, `zone`, `division`,`app_type`, `app_pf_number`, `app_department`, `app_designation`, `other_designation`, `app_date`, `app_regul_date`, `app_payscale`, `app_scale`, `app_level`, `app_group`, `app_station`, `other_station`, `app_billunit`, `app_rop`, `app_depot`, `app_refno`, `app_letter_date`, `app_remark`, `date_time`, `updated_by`, `updated_fields`, `updated_reason`, `updated_datetime`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`) VALUES ('" . $temp_transaction_id . "', '" . $zone . "', '" . $division . "','" . $initial_type . "','" . $app_pf_no . "', '" . $app_dept . "', '" . $app_desig . "', '" . $app_other_desig . "', '" . $app_date . "', '" . $app_datereg . "', '" . $ps_type_1 . "', '" . $app_scale . "', '" . $app_level . "', '" . $app_group . "', '" . $station_id3 . "', '" . $app_otherstation . "', '" . $app_bill_unit . "', '" . $app_rop . "', '" . $app_depot . "', '" . $app_letterno . "', '" . $app_letterdate . "', '" . $app_remark . "', Now(), '" . $updated_by . "', '', '', '', '', '', '', '', '', '')");

				$appoint_track_sql = mysqli_query($conn,"INSERT INTO `appointment_track`( `zone`, `division`, `app_type`,`temp_transaction_id`,`final_transaction_id`,`app_pf_number`,`app_department`, `app_designation`,`app_other_desig`,`app_date`,`app_regul_date`,`app_payscale`,`app_scale`,`app_level`,`app_group`,`app_station`,`other_station`,`app_billunit`,`app_rop`,`app_depot`,`app_refno`,`app_letter_date`,`app_remark`,`date_time`,`updated_by`,`updated_fields`,`updated_reason`,`updated_datetime`,`letter_no`,`letter_datetime`,`uploaded_letter`,`approved_status`,`approved_by`,`approved_datetime`)VALUES('" . $zone . "', '" . $division . "','" . $initial_type . "','" . $temp_transaction_id . "', '" . $final_transaction_id . "', '" . $app_pf_no . "', '" . $app_dept . "', '" . $app_desig . "', '" . $app_other_desig . "', '" . $app_date . "', '" . $app_datereg . "', '" . $ps_type_1 . "', '" . $app_scale . "', '" . $app_level . "', '" . $app_group . "', '" . $station_id3 . "', '" . $app_otherstation . "', '" . $app_bill_unit . "', '" . $app_rop . "', '" . $app_depot . "', '" . $app_letterno . "', '" . $app_letterdate . "', '" . $app_remark . "', Now(), '" . $updated_by . "', '', '', '', '', '', '', '', '', '')");

				$action = "Inserted Record in Initial Appointment Temp and in Initial Appointment Track";
			} else {
				$conn = dbcon1();
				$sq = mysqli_query($conn,"SELECT * from appointment_temp where app_pf_number='" . $app_pf_no . "'");
				if ($sq) {
					while ($fetch_sql = mysqli_fetch_array($sq)) {

						if ($app_dept == $fetch_sql['app_department'] && $app_desig == $fetch_sql['app_designation'] && $app_other_desig == $fetch_sql['other_designation'] && $initial_type == $fetch_sql['app_type'] && $app_date == $fetch_sql['app_date'] && $app_datereg == $fetch_sql['app_regul_date'] && $ps_type_1 == $fetch_sql['app_payscale'] && $app_group == $fetch_sql['app_group'] && $app_level == $fetch_sql['app_level'] && $app_scale == $fetch_sql['app_scale'] && $station_id3 == $fetch_sql['app_station'] && $app_rop == $fetch_sql['app_rop'] && $app_depot == $fetch_sql['app_depot'] && $app_letterno == $fetch_sql['app_refno'] && $app_letterdate == $fetch_sql['app_letter_date'] && $app_remark == $fetch_sql['app_remark'] && $app_otherstation == $fetch_sql['other_station']) {
							echo "<script>alert('Nothing Has Changed')</script>";
						} else {
							//echo "<script>alert('In else')</script>";
							//echo $app_dept."=".$fetch_sql['app_department']."<br>";
							// echo $app_desig."=".$fetch_sql['app_designation'] ."<br>";
							// echo $app_other_desig."=".$fetch_sql['other_designation']."<br>";
							// echo $initial_type."=".$fetch_sql['app_type'] ."<br>";
							// echo $app_date."=".$fetch_sql['app_date'] ."<br>";
							// echo $app_datereg."=".$fetch_sql['app_regul_date'] ."<br>";
							// echo $ps_type_1."=".$fetch_sql['app_payscale']."<br>";
							// echo $app_group."=".$fetch_sql['app_group']."<br>"; 
							// echo $app_level."=".$fetch_sql['app_level']."<br>"; 
							// echo $app_scale."=".$fetch_sql['app_scale']."<br>"; 
							// echo $station_id3."=".$fetch_sql['app_station']."<br>"; 
							// echo $app_rop."=".$fetch_sql['app_rop']."<br>"; 
							// echo $app_depot."=".$fetch_sql['app_depot']."<br>";
							// echo $app_letterno."=".$fetch_sql['app_refno']."<br>";
							// echo $app_letterdate."=".$fetch_sql['app_letter_date']."<br>"; 
							// echo $app_remark."=".$fetch_sql['app_remark']."<br>";
							// echo $app_otherstation."=".$fetch_sql['other_station']."<br>"; 


							$appoint_track_sql = "INSERT INTO `appointment_track`( `zone`, `division`, `temp_transaction_id`, `final_transaction_id`, `app_pf_number`, `app_department`, `app_designation`, `app_other_desig`, `app_date`, `app_regul_date`, `app_payscale`, `app_scale`, `app_level`, `app_group`, `app_station`, `other_station`, `app_billunit`, `app_rop`, `app_depot`, `app_refno`, `app_letter_date`, `app_remark`, `date_time`, `updated_by`, `updated_fields`, `updated_reason`, `updated_datetime`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`app_type`) VALUES ('SUR', '06', '" . $temp_transaction_id . "', '" . $final_transaction_id . "', '" . $app_pf_no . "', '" . $app_dept . "', '" . $app_desig . "', '" . $app_other_desig . "', '" . $app_date . "', '" . $app_datereg . "', '" . $ps_type_1 . "', '" . $app_scale . "', '" . $app_level . "', '" . $app_group . "', '" . $station_id3 . "', '" . $app_otherstation . "', '" . $app_bill_unit . "', '" . $app_rop . "', '" . $app_depot . "', '" . $app_letterno . "', '" . $app_letterdate . "', '" . $app_remark . "', Now(), '" . $updated_by . "', '', '', '', '', '', '', '', '', '','$initial_type')";

							$result2 = mysqli_query($conn,$appoint_track_sql) or die(mysqli_error($conn));

							$action = "Updated Record in Initial Appointment Temp and Inserted Record in Initial Appointment Track";
						}
					}
				}

				$appoint_temp_sql = "UPDATE `appointment_temp` SET `app_type`='$initial_type',`app_department`='$app_dept',`app_designation`='$app_desig',`other_designation`='$app_other_desig',`app_date`='$app_date',`app_regul_date`='$app_datereg',`app_payscale`='$ps_type_1',`app_scale`='$app_scale',`app_level`='$app_level',`app_group`='$app_group',`app_station`='$station_id3',`other_station`='$app_otherstation',`app_rop`='$app_rop',`app_depot`='$app_depot',`app_refno`='$app_letterno',`app_letter_date`='$app_letterdate',`app_remark`='$app_remark',`date_time`=Now(),`updated_by`='$updated_by' WHERE `app_pf_number`='$app_pf_no'";

				$result1 = mysqli_query($conn,$appoint_temp_sql);
			}

			if ($result1 && $result2 or $appoint_temp_sql && $appoint_track_sql) {

				$action_on = $app_pf_no;
				create_log($action, $action_on);

				echo "<script>window.location='init_appo_update.php';alert('Appointment Updated Successfully');</script>";
			} else {
				echo "<script>window.location='init_appo_update.php';alert('Appointment not Updated');</script>";
			}
			break;


		case 'update_prtf_promotion':

			$zone = '01';
			$division = 'SUR';

			$pm_pf = $_POST['pm_pf'];
			$pm_ordertype = $_POST['pm_ordertype'];
			$pm_letterno = $_POST['pm_letterno'];
			$pm_letterdate = date('Y-m-d', strtotime($_POST['pm_letterdate']));
			$pm_wef = date('Y-m-d', strtotime($_POST['pm_wef']));
			$pm_id = $_POST['pro_id'];
			$pm_remark = $_POST['pm_remark'];

			//echo $pm_remark."<br>".$_POST['pm_remark']."<br>";

			// Promotion From
			$pm_frm_dept = $_POST['pm_frm_dept'];
			$pm_frm_desig = $_POST['pm_frm_desig'];
			$pm_frm_otherdesig = $_POST['pm_frm_otherdesig'];
			$pm_frm_ps_type_3 = $_POST['pm_frm_ps_type_3'];
			if ($pm_frm_ps_type_3 == 1) {
				$pm_frm_scale = $_POST['pm_frm_scale_text'];
			} else if ($pm_frm_ps_type_3 == 2 || $pm_frm_ps_type_3 == 3 || $pm_frm_ps_type_3 == 4) {
				$pm_frm_scale = $_POST['pm_frm_scale'];
			}
			$pm_frm_level = $_POST['pm_frm_level'];
			$pm_frm_group = $_POST['pm_frm_group'];
			$station_id1 = $_POST['station_id1'];
			$pm_frm_otherstation = $_POST['pm_frm_otherstation'];
			$pm_frm_rop = $_POST['pm_frm_rop'];
			$depot_bill_unit2 = $_POST['depot_bill_unita'];
			$depot2 = $_POST['depot_bill_unita'];

			// Promotion To
			$pm_to_dept = $_POST['pm_to_dept'];
			$pm_to_desig = $_POST['pm_to_desig'];
			$pm_to_otherdesig = $_POST['pm_to_otherdesig'];
			$pm_to_ps_type_3 = $_POST['pm_to_ps_type_3'];
			if ($pm_to_ps_type_3 == 1) {
				$pro_to_scale = $_POST['pm_to_scale_text'];
			} else if ($pm_to_ps_type_3 == 2 || $pm_to_ps_type_3 == 3 || $pm_to_ps_type_3 == 4) {
				$pro_to_scale = $_POST['pm_to_scale'];
			}
			$pm_to_level = $_POST['pm_to_level'];
			$pm_to_group = $_POST['pm_to_group'];
			$station_id7 = $_POST['station_id7'];
			$pm_to_otherstation = $_POST['pm_to_otherstation'];
			$pm_to_rop = $_POST['pm_to_rop'];
			$depot_bill_unit5 = $_POST['depot_bill_unit5'];
			$depot5 = $_POST['depot_bill_unit5'];

			// Deputation From
			$dp_frm_dept = $_POST['dp_frm_dept'];
			$dp_frm_desig = $_POST['dp_frm_desig'];
			$dp_frm_otherdesig = $_POST['dp_frm_otherdesig'];
			$dp_frm_ps_type_3 = $_POST['dp_frm_ps_type_3'];
			if ($dp_frm_ps_type_3 == 1) {
				$dp_frm_scale = $_POST['dp_frm_scale_text'];
			} else if ($dp_frm_ps_type_3 == 2 || $dp_frm_ps_type_3 == 3 || $dp_frm_ps_type_3 == 4) {
				$dp_frm_scale = $_POST['dp_frm_scale'];
			}

			$dp_frm_level = $_POST['dp_frm_level'];
			$dp_frm_group = $_POST['dp_frm_group'];
			$station_id8 = $_POST['station_id8'];
			$dp_frm_otherstation = $_POST['dp_frm_otherstation'];
			$dp_frm_rop = $_POST['dp_frm_rop'];
			$depot_bill_unit6 = $_POST['depot_bill_unit6'];
			$depot6 = $_POST['depot_bill_unit6'];


			// Deputation To
			$dp_to_dept = $_POST['dp_to_dept'];
			$dp_to_desig = $_POST['dp_to_desig'];
			$dp_to_othr_desig = $_POST['dp_to_othr_desig'];
			$dp_to_pay_scale_level = $_POST['dp_to_pay_scale_level'];
			$dp_to_grp = $_POST['dp_to_grp'];
			$dp_to_place = $_POST['dp_to_place'];
			$dp_to_rop = $_POST['dp_to_rop'];
			$depot_bill_unit7 = $_POST['billunit7'];
			$depot7 = $_POST['depot7'];

			// Reparation From
			$re_frm_dept = $_POST['re_frm_dept'];
			$re_frm_desig = $_POST['re_frm_desig'];
			$re_frm_otherdesig = $_POST['re_frm_otherdesig'];
			$re_frm_ps_type_3 = $_POST['re_frm_ps_type_3'];
			if ($re_frm_ps_type_3 == 1) {
				$re_frm_scale = $_POST['re_frm_scale_text'];
			} else if ($re_frm_ps_type_3 == 2 || $re_frm_ps_type_3 == 3 || $re_frm_ps_type_3 == 4) {
				$re_frm_scale = $_POST['re_frm_scale'];
			}
			//$re_frm_scale=$_POST['re_frm_scale'];
			$re_frm_level = $_POST['re_frm_level'];
			$re_frm_group = $_POST['re_frm_group'];
			$station_id9 = $_POST['station_id9'];
			$re_frm_otherstation = $_POST['re_frm_otherstation'];
			$re_frm_rop = $_POST['re_frm_rop'];
			$depot_bill_unit9 = $_POST['depot_bill_unit9'];
			$depot9 = $_POST['depot_bill_unit9'];


			// Reparation To
			$re_to_dept = $_POST['re_to_dept'];
			$re_to_desig = $_POST['re_to_desig'];
			$re_to_otr_desig = $_POST['re_to_otr_desig'];
			$re_to_pay_scale = $_POST['re_to_pay_scale'];
			$re_to_group = $_POST['re_to_group'];
			$re_to_place = $_POST['re_to_place'];
			$re_to_rop = $_POST['re_to_rop'];
			$billunit8 = $_POST['billunit8'];
			$depot8 = $_POST['depot8'];

			//echo $re_to_pay_scale;

			$prtf_carried = $_POST['prtf_carried'];
			$prtf_acc_ltr_no = $_POST['prtf_acc_ltr_no'];
			$prtf_acc_ltr_date = date('Y-m-d', strtotime($_POST['prtf_acc_ltr_date']));
			$prtf_carr_wef_date = date('Y-m-d', strtotime($_POST['prtf_carr_wef_date']));
			$prtf_carr_remark = $_POST['prtf_carr_remark'];
			$prtf_wefdate = date('Y-m-d', strtotime($_POST['prtf_wefdate']));
			$prtf_incrdate = date('Y-m-d', strtotime($_POST['prtf_incrdate']));

			date_default_timezone_set('Asia/Kolkata');
			$transaction_id = date('Ymdhis');
			$final_transaction_id = date('Ymdhis');
			session_start();
			$updated_by = $_SESSION['id'];

			$count = 0;

			if ($pm_id != "") {

				if ($pm_ordertype == 'LDCE' || $pm_ordertype == 'GDCE' || $pm_ordertype == 'LGS' || $pm_ordertype == 'Departmental' || $pm_ordertype == 'Re-structuring' || $pm_ordertype == 'MACP-1' || $pm_ordertype == 'MACP-2' || $pm_ordertype == 'MACP-3') {

					$fetch = mysqli_query($conn,"select * from `prft_promotion_temp` where `pro_pf_no`='$pm_pf' and id='$pm_id'");

					if ($fetch) {
						$re = mysqli_fetch_array($fetch);

						if ($re['count'] == "") {
							$count = $count + 1;
						} else {
							$count = $re['count'];
						}


						if ($re['pro_order_type'] == $pm_ordertype && $re['pro_letter_no'] == $pm_letterno && $re['pro_letter_date'] == $pm_letterdate && $re['pro_wef'] == $pm_wef && $re['pro_frm_dept'] == $pm_frm_dept && $re['pro_frm_desig'] == $pm_frm_desig && $re['pro_frm_othr_desig'] == $pm_frm_otherdesig && $re['pro_frm_pay_scale_type'] == $pm_frm_ps_type_3 && $re['pro_frm_scale'] == $pm_frm_scale && $re['pro_frm_level'] == $pm_frm_level && $re['pro_frm_group'] == $pm_frm_group && $re['pro_frm_station'] == $station_id1 && $re['pro_frm_othr_station'] == $pm_frm_otherstation && $re['pro_frm_rop'] == $pm_frm_rop && $re['pro_frm_billunit'] == $depot_bill_unit2 && $re['pro_frm_depot'] == $depot2 && $re['pro_to_dept'] == $pm_to_dept && $re['pro_to_desig'] == $pm_to_desig && $re['pro_to_othr_desig'] == $pm_to_otherdesig && $re['pro_to_pay_scale_type'] == $pm_to_ps_type_3 && $re['pro_to_scale'] == $pro_to_scale && $re['pro_to_level'] == $pm_to_level && $re['pro_to_group'] == $pm_to_group && $re['pro_to_station'] == $station_id7 && $re['pro_to_othr_station'] == $pm_to_otherstation && $re['rop_to'] == $pm_to_rop && $re['pro_to_billunit'] == $depot_bill_unit5 && $re['pro_to_depot'] == $depot5 && $re['pro_carried_out_type'] == $prtf_carried && $re['pro_carri_wef'] == $prtf_wefdate && $re['pro_carri_date_of_incr'] == $prtf_incrdate && $re['pro_car_re_accept_ltr_no'] == $prtf_acc_ltr_no && $re['pro_car_re_accept_ltr_date'] == $prtf_acc_ltr_date && $re['pro_car_re_wef_date'] == $prtf_carr_wef_date && $re['pro_car_re_remark'] == $prtf_carr_remark && $re['pro_remark'] == $pm_remark) {

							echo "<script>alert('Nothing Has Changed');</script>";
						} else {

							/* 								echo $re['pro_order_type']."=".$pm_ordertype."<br>";
								echo $re['pro_letter_no']."=".$pm_letterno."<br>";
								echo $re['pro_letter_date']."=".$pm_letterdate."<br>"; 
								echo $re['pro_wef']."=".$pm_wef."<br>"; 
								echo $re['pro_frm_dept']."=".$pm_frm_dept."<br>"; 
								echo $re['pro_frm_desig']."=".$pm_frm_desig."<br>"; 
								echo $re['pro_frm_othr_desig']."=".$pm_frm_otherdesig."<br>"; 
								echo $re['pro_frm_pay_scale_type']."=".$pm_frm_ps_type_3."<br>"; 
								echo $re['pro_frm_scale']."=".$pm_frm_scale."<br>"; 
								echo $re['pro_frm_level']."=".$pm_frm_level."<br>"; 
								echo $re['pro_frm_group']."=".$pm_frm_group."<br>"; 
								echo $re['pro_frm_station']."=".$station_id1."<br>"; 
								echo $re['pro_frm_othr_station']."=".$pm_frm_otherstation."<br>"; 
								echo $re['pro_frm_rop']."=".$pm_frm_rop."<br>"; 
								echo $re['pro_frm_billunit']."=".$depot_bill_unit2."<br>"; 
								echo $re['pro_frm_depot']."=".$depot2."<br>"; 
								echo $re['pro_to_dept']."=".$pm_to_dept."<br>"; 
								echo $re['pro_to_desig']."=".$pm_to_desig."<br>"; 
								echo $re['pro_to_othr_desig']."=".$pm_to_otherdesig."<br>"; 
								echo $re['pro_to_pay_scale_type']."=".$pm_to_ps_type_3."<br>"; 
								echo $re['pro_to_scale']."=".$pro_to_scale."<br>"; 
								echo $re['pro_to_level']."=".$pm_to_level."<br>"; 
								echo $re['pro_to_group']."=".$pm_to_group."<br>"; 
								echo $re['pro_to_station']."=".$station_id7."<br>"; 
								echo $re['pro_to_othr_station']."=".$pm_to_otherstation."<br>"; 
								echo $re['rop_to']."=".$pm_to_rop."<br>"; 
								echo $re['pro_to_billunit']."=".$depot_bill_unit5."<br>"; 
								echo $re['pro_to_depot']."=".$depot5."<br>"; 
								echo $re['pro_carried_out_type']."=".$prtf_carried."<br>"; 
								echo $re['pro_carri_wef']."=".$prtf_wefdate."<br>";
								echo $re['pro_carri_date_of_incr']."=".$prtf_incrdate."<br>";
								echo $re['pro_car_re_accept_ltr_no']."=".$prtf_acc_ltr_no."<br>";
								echo $re['pro_car_re_accept_ltr_date']."=".$prtf_acc_ltr_date."<br>";
								echo $re['pro_car_re_wef_date']."=".$prtf_carr_wef_date."<br>";
								echo $re['pro_car_re_remark']."=".$prtf_carr_remark."<br>";
								
								echo "<script>alert('in else');</script>"; */

							$sql1 = mysqli_query($conn,"INSERT INTO `prft_promotion_track`(`temp_transaction_id`,`final_transaction_id`, `zone`, `division`, `pro_pf_no`, `pro_order_type`, `pro_letter_no`, `pro_letter_date`, `pro_wef`, `pro_frm_dept`, `pro_frm_desig`, `pro_frm_othr_desig`, `pro_frm_pay_scale_type`, `pro_frm_scale`, `pro_frm_level`, `pro_frm_group`, `pro_frm_station`, `pro_frm_othr_station`, `pro_frm_rop`,`rop_to`,`pro_frm_billunit`, `pro_frm_depot`, `pro_to_dept`, `pro_to_desig`, `pro_to_othr_desig`, `pro_to_pay_scale_type`, `pro_to_scale`, `pro_to_level`, `pro_to_group`, `pro_to_station`, `pro_to_othr_station`, `pro_to_billunit`, `pro_to_depot`, `pro_carried_out_type`, `pro_carri_wef`, `pro_carri_date_of_incr`, `pro_car_re_accept_ltr_no`, `pro_car_re_accept_ltr_date`, `pro_car_re_wef_date`, `pro_car_re_remark`, `date_time`, `updated_by`, `updated_fields`, `updated_reason`, `updated_date_time`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`,`pro_remark`) VALUES ('$transaction_id','$transaction_id','$zone','$division','$pm_pf','$pm_ordertype','$pm_letterno','$pm_letterdate','$pm_wef','$pm_frm_dept','$pm_frm_desig','$pm_frm_otherdesig','$pm_frm_ps_type_3','$pm_frm_scale','$pm_frm_level','$pm_frm_group','$station_id1','$pm_frm_otherstation','$pm_frm_rop','$pm_to_rop','$depot_bill_unit2','$depot2','$pm_to_dept','$pm_to_desig','$pm_to_otherdesig','$pm_to_ps_type_3','$pro_to_scale','$pm_to_level','$pm_to_group','$station_id7','$pm_to_otherstation','$depot_bill_unit5','$depot5','$prtf_carried','$prtf_incrdate','$prtf_wefdate','$prtf_acc_ltr_no','$prtf_acc_ltr_date','$prtf_carr_wef_date','$prtf_carr_remark',Now(),'$updated_by','','','','','','','','','','$count','$pm_remark')");

							$action = "Updated Record in PRFT Promotion Temp and Inserted Record in PRFT Promotion Track";
						}
					}

					$sql = mysqli_query($conn,"UPDATE  `prft_promotion_temp` SET `pro_order_type`='$pm_ordertype', `pro_letter_no`='$pm_letterno', `pro_letter_date`='$pm_letterdate', `pro_wef`='$pm_wef', `pro_frm_dept`='$pm_frm_dept', `pro_frm_desig`='$pm_frm_desig', `pro_frm_othr_desig`='$pm_frm_otherdesig', `pro_frm_pay_scale_type`='$pm_frm_ps_type_3', `pro_frm_scale`='$pm_frm_scale', `pro_frm_level`='$pm_frm_level', `pro_frm_group`='$pm_frm_group', `pro_frm_station`='$station_id1', `pro_frm_othr_station`='$pm_frm_otherstation', `pro_frm_rop`='$pm_frm_rop',`pro_frm_billunit`='$depot_bill_unit2', `pro_frm_depot`='$depot2', `pro_to_dept`='$pm_to_dept', `pro_to_desig`='$pm_to_desig', `pro_to_othr_desig`='$pm_to_otherdesig', `pro_to_pay_scale_type`='$pm_to_ps_type_3', `pro_to_scale`='$pro_to_scale', `pro_to_level`='$pm_to_level', `pro_to_group`='$pm_to_group', `pro_to_station`='$station_id7', `pro_to_othr_station`='$pm_to_otherstation', `rop_to`='$pm_to_rop', `pro_to_billunit`='$depot_bill_unit5', `pro_to_depot`='$depot5', `pro_carried_out_type`='$prtf_carried', `pro_carri_wef`='$prtf_wefdate', `pro_carri_date_of_incr`='$prtf_incrdate', `pro_car_re_accept_ltr_no`='$prtf_acc_ltr_no', `pro_car_re_accept_ltr_date`='$prtf_acc_ltr_date', `pro_car_re_wef_date`='$prtf_carr_wef_date', `pro_car_re_remark`='$prtf_carr_remark', `date_time`=Now(), `updated_by`='$updated_by', `pro_remark`='$pm_remark' where `pro_pf_no`='$pm_pf' and id='$pm_id'");
				} else if ($pm_ordertype == 'Deputation') {

					$fetch = mysqli_query($conn,"select * from `prft_promotion_temp` where `pro_pf_no`='$pm_pf' and id='$pm_id'");

					if ($fetch) {
						$re = mysqli_fetch_array($fetch);

						if ($re['count'] == "") {
							$count = $count + 1;
						} else {
							$count = $re['count'];
						}

						if ($re['pro_order_type'] == $pm_ordertype && $re['pro_letter_no'] == $pm_letterno && $re['pro_letter_date'] == $pm_letterdate && $re['pro_wef'] == $pm_wef && $re['pro_frm_dept'] == $dp_frm_dept && $re['pro_frm_desig'] == $dp_frm_desig && $re['pro_frm_othr_desig'] == $dp_frm_otherdesig && $re['pro_frm_pay_scale_type'] == $dp_frm_ps_type_3 && $re['pro_frm_scale'] == $dp_frm_scale && $re['pro_frm_level'] == $dp_frm_level && $re['pro_frm_group'] == $dp_frm_group && $re['pro_frm_station'] == $station_id8 && $re['pro_frm_othr_station'] == $dp_frm_otherstation && $re['pro_frm_rop'] == $dp_frm_rop && $re['pro_frm_billunit'] == $depot_bill_unit6 && $re['pro_frm_depot'] == $depot6 && $re['pro_to_dept'] == $dp_to_dept && $re['pro_to_desig'] == $dp_to_desig && $re['pro_to_othr_desig'] == $dp_to_othr_desig && $re['pro_to_scale'] == $dp_to_pay_scale_level && $re['pro_to_group'] == $dp_to_grp && $re['pro_to_station'] == $dp_to_place && $re['rop_to'] == $dp_to_rop && $re['pro_to_billunit'] == $depot_bill_unit7 && $re['pro_to_depot'] == $depot7 && $re['pro_carried_out_type'] == $prtf_carried && $re['pro_carri_wef'] == $prtf_wefdate && $re['pro_carri_date_of_incr'] == $prtf_incrdate && $re['pro_car_re_accept_ltr_no'] == $prtf_acc_ltr_no && $re['pro_car_re_accept_ltr_date'] == $prtf_acc_ltr_date && $re['pro_car_re_wef_date'] == $prtf_carr_wef_date && $re['pro_car_re_remark'] == $prtf_carr_remark && $re['pro_remark'] == $pm_remark) {
							echo "<script>alert('Nothing Has Changed');</script>";
						} else {

							/* echo "<script>alert('in else');</script>";
								
								echo $re['pro_order_type']."=".$pm_ordertype."<br>"; 
								echo $re['pro_letter_no']."=".$pm_letterno."<br>"; 
								echo $re['pro_letter_date']."=".$pm_letterdate."<br>"; 
								echo $re['pro_wef']."=".$pm_wef."<br>"; 
								echo $re['pro_frm_dept']."=".$dp_frm_dept."<br>"; 
								echo $re['pro_frm_desig']."=".$dp_frm_desig."<br>"; 
								echo $re['pro_frm_othr_desig']."=".$dp_frm_otherdesig."<br>"; 
								echo $re['pro_frm_pay_scale_type']."=".$dp_frm_ps_type_3."<br>"; 
								echo $re['pro_frm_scale']."=".$dp_frm_scale."<br>"; 
								echo $re['pro_frm_level']."=".$dp_frm_level."<br>"; 
								echo $re['pro_frm_group']."=".$dp_frm_group."<br>"; 
								echo $re['pro_frm_station']."=".$station_id8."<br>"; 
								echo $re['pro_frm_othr_station']."=".$dp_frm_otherstation."<br>"; 
								echo $re['pro_frm_rop']."=".$dp_frm_rop."<br>"; 
								echo $re['pro_frm_billunit']."=".$depot_bill_unit6."<br>"; 
								echo $re['pro_frm_depot']."=".$depot6."<br>"; 
								echo $re['pro_to_dept']."=".$dp_to_dept."<br>"; 
								echo $re['pro_to_desig']."=".$dp_to_desig."<br>"; 
								echo $re['pro_to_othr_desig']."=".$dp_to_othr_desig."<br>"; 
								echo $re['pro_to_scale']."=".$dp_to_pay_scale_level."<br>"; 
								echo $re['pro_to_group']."=".$dp_to_grp."<br>"; 
								echo $re['pro_to_station']."=".$dp_to_place."<br>"; 
								echo $re['rop_to']."=".$dp_to_rop."<br>"; 
								echo $re['pro_to_billunit']."=".$depot_bill_unit7."<br>"; 
								echo $re['pro_to_depot']."=".$depot7."<br>"; 
								echo $re['pro_carried_out_type']."=".$prtf_carried."<br>"; 
								echo $re['pro_carri_wef']."=".$prtf_wefdate."<br>"; 
								echo $re['pro_carri_date_of_incr']."=".$prtf_incrdate."<br>"; 
								echo $re['pro_car_re_accept_ltr_no']."=".$prtf_acc_ltr_no."<br>"; 
								echo $re['pro_car_re_accept_ltr_date']."=".$prtf_acc_ltr_date."<br>"; 
								echo $re['pro_car_re_wef_date']."=".$prtf_carr_wef_date."<br>"; 
								echo $re['pro_car_re_remark']."=".$prtf_carr_remark."<br>"; */

							$sql1 = mysqli_query($conn,"INSERT INTO `prft_promotion_track`(`temp_transaction_id`, `final_transaction_id`, `zone`, `division`, `pro_pf_no`, `pro_order_type`, `pro_letter_no`, `pro_letter_date`, `pro_wef`, `pro_frm_dept`, `pro_frm_desig`, `pro_frm_othr_desig`, `pro_frm_pay_scale_type`, `pro_frm_scale`, `pro_frm_level`, `pro_frm_group`, `pro_frm_station`, `pro_frm_othr_station`, `pro_frm_rop`,`pro_frm_billunit`, `pro_frm_depot`, `pro_to_dept`, `pro_to_desig`, `pro_to_othr_desig`, `pro_to_scale`, `pro_to_group`, `pro_to_station`,`rop_to`,`pro_to_billunit`, `pro_to_depot`, `pro_carried_out_type`, `pro_carri_wef`, `pro_carri_date_of_incr`, `pro_car_re_accept_ltr_no`, `pro_car_re_accept_ltr_date`, `pro_car_re_wef_date`, `pro_car_re_remark`, `date_time`, `updated_by`, `updated_fields`, `updated_reason`, `updated_date_time`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`,`pro_remark`) VALUES ('$transaction_id','$transaction_id','$zone','$division','$pm_pf','$pm_ordertype','$pm_letterno','$pm_letterdate','$pm_wef','$dp_frm_dept','$dp_frm_desig','$dp_frm_otherdesig','$dp_frm_ps_type_3','$dp_frm_scale','$dp_frm_level','$dp_frm_group','$station_id8','$dp_frm_otherstation','$dp_frm_rop','$depot_bill_unit6','$depot6','$dp_to_dept','$dp_to_desig','$dp_to_othr_desig','$dp_to_pay_scale_level','$dp_to_grp','$dp_to_place','$dp_to_rop','$depot_bill_unit7','$depot7','$prtf_carried','$prtf_wefdate','$prtf_incrdate','$prtf_acc_ltr_no','$prtf_acc_ltr_date','$prtf_carr_wef_date','$prtf_carr_remark',Now(),'$updated_by','','','','','','','','','','$count','$pm_remark')");

							$action = "Updated Record in PRFT Promotion Temp and Inserted Record in PRFT Promotion Track";
						}
					}

					$sql = mysqli_query($conn,"UPDATE `prft_promotion_temp` SET `pro_order_type`='$pm_ordertype', `pro_letter_no`='$pm_letterno', `pro_letter_date`='$pm_letterdate', `pro_wef`='$pm_wef', `pro_frm_dept`='$dp_frm_dept', `pro_frm_desig`='$dp_frm_desig', `pro_frm_othr_desig`='$dp_frm_otherdesig', `pro_frm_pay_scale_type`='$dp_frm_ps_type_3', `pro_frm_scale`='$dp_frm_scale', `pro_frm_level`='$dp_frm_level', `pro_frm_group`='$dp_frm_group', `pro_frm_station`='$station_id8', `pro_frm_othr_station`='$dp_frm_otherstation', `pro_frm_rop`='$dp_frm_rop',`pro_frm_billunit`='$depot_bill_unit6', `pro_frm_depot`='$depot6', `pro_to_dept`='$dp_to_dept', `pro_to_desig`='$dp_to_desig', `pro_to_othr_desig`='$dp_to_othr_desig', `pro_to_scale`='$dp_to_pay_scale_level', `pro_to_group`='$dp_to_grp', `pro_to_station`='$dp_to_place',`rop_to`='$dp_to_rop',`pro_to_billunit`='$depot_bill_unit7', `pro_to_depot`='$depot7', `pro_carried_out_type`='$prtf_carried', `pro_carri_wef`='$prtf_wefdate', `pro_carri_date_of_incr`='$prtf_incrdate', `pro_car_re_accept_ltr_no`='$prtf_acc_ltr_no', `pro_car_re_accept_ltr_date`='$prtf_acc_ltr_date', `pro_car_re_wef_date`='$prtf_carr_wef_date', `pro_car_re_remark`='$prtf_carr_remark', `date_time`=Now(), `updated_by`='$updated_by',`pro_remark`='$pm_remark' where `pro_pf_no`='$pm_pf' and id='$pm_id'");
				} else {

					$fetch = mysqli_query($conn,"select * from `prft_promotion_temp` where `pro_pf_no`='$pm_pf' and id='$pm_id'");

					if ($fetch) {
						$re = mysqli_fetch_array($fetch);

						if ($re['count'] == "") {
							$count = $count + 1;
						} else {
							$count = $re['count'];
						}

						if ($re['pro_pf_no'] == $pm_pf && $re['pro_order_type'] == $pm_ordertype && $re['pro_letter_no'] == $pm_letterno && $re['pro_letter_date'] == $pm_letterdate && $re['pro_wef'] == $pm_wef && $re['pro_frm_dept'] == $re_frm_dept && $re['pro_frm_desig'] == $re_frm_desig && $re['pro_frm_othr_desig'] == $re_frm_otherdesig && $re['pro_frm_pay_scale_type'] == $re_frm_ps_type_3 && $re['pro_frm_scale'] == $re_frm_scale && $re['pro_frm_level'] == $re_frm_level && $re['pro_frm_group'] == $re_frm_group && $re['pro_frm_station'] == $station_id9 && $re['pro_frm_othr_station'] == $re_frm_otherstation && $re['pro_frm_rop'] == $re_frm_rop && $re['pro_frm_billunit'] == $depot_bill_unit9 && $re['pro_frm_depot'] == $depot_bill_unit9 && $re['pro_to_dept'] == $re_to_dept && $re['pro_to_desig'] == $re_to_desig && $re['pro_to_othr_desig'] == $re_to_otr_desig && $re['pro_to_scale'] == $re_to_pay_scale && $re['pro_to_group'] == $re_to_group && $re['pro_to_station'] == $re_to_place && $re['rop_to'] == $re_to_rop && $re['pro_to_billunit'] == $billunit8 && $re['pro_to_depot'] == $depot8 && $re['pro_carried_out_type'] == $prtf_carried && $re['pro_carri_wef'] == $prtf_wefdate && $re['pro_carri_date_of_incr'] == $prtf_incrdate && $re['pro_car_re_accept_ltr_no'] == $prtf_acc_ltr_no && $re['pro_car_re_accept_ltr_date'] == $prtf_acc_ltr_date && $re['pro_car_re_wef_date'] == $prtf_carr_wef_date && $re['pro_car_re_remark'] == $prtf_carr_remark && $re['pro_remark'] == $pm_remark) {
							echo "<script>alert('Nothing Has Changed');</script>";
						} else {

							echo "<script>alert('in else');</script>";

							/* echo $re['pro_pf_no']."=".$pm_pf."<br>"; 
									echo $re['pro_order_type']."=".$pm_ordertype."<br>"; 
									echo $re['pro_letter_no']."=".$pm_letterno."<br>"; 
									echo $re['pro_letter_date']."=".$pm_letterdate."<br>"; 
									echo $re['pro_wef']."=".$pm_wef."<br>"; 
									echo $re['pro_frm_dept']."=".$re_frm_dept."<br>"; 
									echo $re['pro_frm_desig']."=".$re_frm_desig."<br>"; 
									echo $re['pro_frm_othr_desig']."=".$re_frm_otherdesig."<br>"; 
									echo $re['pro_frm_pay_scale_type']."=".$re_frm_ps_type_3."<br>"; 
									echo $re['pro_frm_scale']."=".$re_frm_scale."<br>";
									echo $re['pro_frm_level']."=".$re_frm_level."<br>"; 
									echo $re['pro_frm_group']."=".$re_frm_group."<br>"; 
									echo $re['pro_frm_station']."=".$station_id9."<br>"; 
									echo $re['pro_frm_othr_station']."=".$re_frm_otherstation."<br>"; 
									echo $re['pro_frm_rop']."=".$re_frm_rop."<br>"; 
									echo $re['pro_frm_billunit']."=".$billunit8."<br>"; 
									echo $re['pro_frm_depot']."=".$depot8."<br>"; 
									echo $re['pro_to_dept']."=".$re_to_dept."<br>"; 
									echo $re['pro_to_desig']."=".$re_to_desig."<br>"; 
									echo $re['pro_to_othr_desig']."=".$re_to_otr_desig."<br>"; 
									echo $re['pro_to_scale']."=".$re_to_pay_scale."<br>"; 
									echo $re['pro_to_group']."=".$re_to_group."<br>"; 
									echo $re['pro_to_station']."=".$re_to_place."<br>";
									echo $re['rop_to']."=".$re_to_rop."<br>"; 
									echo $re['pro_to_billunit']."=".$depot_bill_unit9."<br>"; 
									echo $re['pro_to_depot']."=".$depot_bill_unit9."<br>"; 
									echo $re['pro_carried_out_type']."=".$prtf_carried."<br>"; 
									echo $re['pro_carri_wef']."=".$prtf_wefdate."<br>"; 
									echo $re['pro_carri_date_of_incr']."=".$prtf_incrdate."<br>"; 
									echo $re['pro_car_re_accept_ltr_no']."=".$prtf_acc_ltr_no."<br>"; 
									echo $re['pro_car_re_accept_ltr_date']."=".$prtf_acc_ltr_date."<br>"; 
									echo $re['pro_car_re_wef_date']."=".$prtf_carr_wef_date."<br>"; 
									echo $re['pro_car_re_remark']."=".$prtf_carr_remark."<br>";  */


							$sql1 = mysqli_query($conn,"INSERT INTO `prft_promotion_track`(`temp_transaction_id`, `final_transaction_id`,`zone`, `division`, `pro_pf_no`, `pro_order_type`, `pro_letter_no`, `pro_letter_date`, `pro_wef`, `pro_frm_dept`, `pro_frm_desig`, `pro_frm_othr_desig`, `pro_frm_pay_scale_type`, `pro_frm_scale`, `pro_frm_level`, `pro_frm_group`, `pro_frm_station`, `pro_frm_othr_station`, `pro_frm_rop`,`pro_frm_billunit`, `pro_frm_depot`, `pro_to_dept`, `pro_to_desig`, `pro_to_othr_desig`, `pro_to_scale`, `pro_to_group`, `pro_to_station`,`rop_to`,`pro_to_billunit`, `pro_to_depot`, `pro_carried_out_type`, `pro_carri_wef`, `pro_carri_date_of_incr`, `pro_car_re_accept_ltr_no`, `pro_car_re_accept_ltr_date`, `pro_car_re_wef_date`, `pro_car_re_remark`, `date_time`, `updated_by`, `updated_fields`, `updated_reason`, `updated_date_time`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`,`pro_remark`) VALUES ('$transaction_id','$transaction_id','$zone','$division','$pm_pf','$pm_ordertype','$pm_letterno','$pm_letterdate','$pm_wef','$re_frm_dept','$re_frm_desig','$re_frm_otherdesig','$re_frm_ps_type_3','$re_frm_scale','$re_frm_level','$re_frm_group','$station_id9','$re_frm_otherstation','$re_frm_rop','$depot_bill_unit9','$depot_bill_unit9','$re_to_dept','$re_to_desig','$re_to_otr_desig','$re_to_pay_scale','$re_to_group','$re_to_place','$re_to_rop','$billunit8','$depot8','$prtf_carried','$prtf_wefdate','$prtf_incrdate','$prtf_acc_ltr_no','$prtf_acc_ltr_date','$prtf_carr_wef_date','$prtf_carr_remark',Now(),'$updated_by','','','','','','','','','','$count','$pm_remark')");

							$action = "Updated Record in PRFT Promotion Temp and Inserted Record in PRFT Promotion Track";
						}
					}

					$sql = mysqli_query($conn,"UPDATE  `prft_promotion_temp` SET  `pro_order_type`='$pm_ordertype', `pro_letter_no`='$pm_letterno', `pro_letter_date`='$pm_letterdate', `pro_wef`='$pm_wef', `pro_frm_dept`='$re_frm_dept', `pro_frm_desig`='$re_frm_desig', `pro_frm_othr_desig`='$re_frm_otherdesig', `pro_frm_pay_scale_type`='$re_frm_ps_type_3', `pro_frm_scale`='$re_frm_scale', `pro_frm_level`='$re_frm_level', `pro_frm_group`='$re_frm_group', `pro_frm_station`='$station_id9', `pro_frm_othr_station`='$re_frm_otherstation', `pro_frm_rop`='$re_frm_rop',`pro_frm_billunit`='$depot_bill_unit9', `pro_frm_depot`='$depot9', `pro_to_dept`='$re_to_dept', `pro_to_desig`='$re_to_desig', `pro_to_othr_desig`='$re_to_otr_desig', `pro_to_scale`='$re_to_pay_scale', `pro_to_group`='$re_to_group', `pro_to_station`='$re_to_place',`rop_to`='$re_to_rop',`pro_to_billunit`='$billunit8', `pro_to_depot`='$depot8', `pro_carried_out_type`='$prtf_carried', `pro_carri_wef`='$prtf_wefdate', `pro_carri_date_of_incr`='$prtf_incrdate', `pro_car_re_accept_ltr_no`='$prtf_acc_ltr_no', `pro_car_re_accept_ltr_date`='$prtf_acc_ltr_date', `pro_car_re_wef_date`='$prtf_carr_wef_date', `pro_car_re_remark`='$prtf_carr_remark', `date_time`=Now(), `updated_by`='$updated_by', `pro_remark`='$pm_remark' where `pro_pf_no`='$pm_pf' and id='$pm_id'");
				}
			} else {

				if ($pm_ordertype == 'LDCE' || $pm_ordertype == 'GDCE' || $pm_ordertype == 'LGS' || $pm_ordertype == 'Departmental' || $pm_ordertype == 'Re-structuring' || $pm_ordertype == 'MACP-1' || $pm_ordertype == 'MACP-2' || $pm_ordertype == 'MACP-3') {

					echo "in second if<br>";

					$fetch = mysqli_query($conn,"select * from `prft_promotion_temp` where `pro_pf_no`='$pm_pf' order by id desc limit 1");

					$re = mysqli_fetch_array($fetch);

					if ($re['count'] == "") {
						$count = $count + 1;
					} else {
						$count = $re['count'] + 1;
					}

					$sql = mysqli_query($conn,"INSERT INTO `prft_promotion_temp`(`temp_transaction_id`, `zone`, `division`, `pro_pf_no`, `pro_order_type`, `pro_letter_no`, `pro_letter_date`, `pro_wef`, `pro_frm_dept`, `pro_frm_desig`, `pro_frm_othr_desig`, `pro_frm_pay_scale_type`, `pro_frm_scale`, `pro_frm_level`, `pro_frm_group`, `pro_frm_station`, `pro_frm_othr_station`, `pro_frm_rop`,`rop_to`,`pro_frm_billunit`, `pro_frm_depot`, `pro_to_dept`, `pro_to_desig`, `pro_to_othr_desig`, `pro_to_pay_scale_type`, `pro_to_scale`, `pro_to_level`, `pro_to_group`, `pro_to_station`, `pro_to_othr_station`, `pro_to_billunit`, `pro_to_depot`, `pro_carried_out_type`, `pro_carri_wef`, `pro_carri_date_of_incr`, `pro_car_re_accept_ltr_no`, `pro_car_re_accept_ltr_date`, `pro_car_re_wef_date`, `pro_car_re_remark`, `date_time`, `updated_by`, `updated_fields`, `updated_reason`, `updated_date_time`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`,`pro_remark`) VALUES ('$transaction_id','$zone','$division','$pm_pf','$pm_ordertype','$pm_letterno','$pm_letterdate','$pm_wef','$pm_frm_dept','$pm_frm_desig','$pm_frm_otherdesig','$pm_frm_ps_type_3','$pm_frm_scale','$pm_frm_level','$pm_frm_group','$station_id1','$pm_frm_otherstation','$pm_frm_rop','$pm_to_rop','$depot_bill_unit2','$depot2','$pm_to_dept','$pm_to_desig','$pm_to_otherdesig','$pm_to_ps_type_3','$pro_to_scale','$pm_to_level','$pm_to_group','$station_id7','$pm_to_otherstation','$depot_bill_unit5','$depot5','$prtf_carried','$prtf_wefdate','$prtf_incrdate','$prtf_acc_ltr_no','$prtf_acc_ltr_date','$prtf_carr_wef_date','$prtf_carr_remark',Now(),'$updated_by','','','','','','','','','','$count','$pm_remark')");

					$sql1 = mysqli_query($conn,"INSERT INTO `prft_promotion_track`(`temp_transaction_id`,`final_transaction_id`, `zone`, `division`, `pro_pf_no`, `pro_order_type`, `pro_letter_no`, `pro_letter_date`, `pro_wef`, `pro_frm_dept`, `pro_frm_desig`, `pro_frm_othr_desig`, `pro_frm_pay_scale_type`, `pro_frm_scale`, `pro_frm_level`, `pro_frm_group`, `pro_frm_station`, `pro_frm_othr_station`, `pro_frm_rop`,`rop_to`,`pro_frm_billunit`, `pro_frm_depot`, `pro_to_dept`, `pro_to_desig`, `pro_to_othr_desig`, `pro_to_pay_scale_type`, `pro_to_scale`, `pro_to_level`, `pro_to_group`, `pro_to_station`, `pro_to_othr_station`, `pro_to_billunit`, `pro_to_depot`, `pro_carried_out_type`, `pro_carri_wef`, `pro_carri_date_of_incr`, `pro_car_re_accept_ltr_no`, `pro_car_re_accept_ltr_date`, `pro_car_re_wef_date`, `pro_car_re_remark`, `date_time`, `updated_by`, `updated_fields`, `updated_reason`, `updated_date_time`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`,`pro_remark`) VALUES ('$transaction_id','$transaction_id','$zone','$division','$pm_pf','$pm_ordertype','$pm_letterno','$pm_letterdate','$pm_wef','$pm_frm_dept','$pm_frm_desig','$pm_frm_otherdesig','$pm_frm_ps_type_3','$pm_frm_scale','$pm_frm_level','$pm_frm_group','$station_id1','$pm_frm_otherstation','$pm_frm_rop','$pm_to_rop','$depot_bill_unit2','$depot2','$pm_to_dept','$pm_to_desig','$pm_to_otherdesig','$pm_to_ps_type_3','$pro_to_scale','$pm_to_level','$pm_to_group','$station_id7','$pm_to_otherstation','$depot_bill_unit5','$depot5','$prtf_carried','$prtf_incrdate','$prtf_wefdate','$prtf_acc_ltr_no','$prtf_acc_ltr_date','$prtf_carr_wef_date','$prtf_carr_remark',Now(),'$updated_by','','','','','','','','','','$count','$pm_remark')");

					$action = "Inserted Record in PRFT Promotion Temp and in PRFT Promotion Track";
				} else if ($pm_ordertype == 'Deputation') {

					$fetch = mysqli_query($conn,"select * from `prft_promotion_temp` where `pro_pf_no`='$pm_pf' order by id desc limit 1");

					$re = mysqli_fetch_array($fetch);

					if ($re['count'] == "") {
						$count = $count + 1;
					} else {
						$count = $re['count'] + 1;
					}

					$sql = mysqli_query($conn,"INSERT INTO `prft_promotion_temp`(`temp_transaction_id`, `zone`, `division`, `pro_pf_no`, `pro_order_type`, `pro_letter_no`, `pro_letter_date`, `pro_wef`, `pro_frm_dept`, `pro_frm_desig`, `pro_frm_othr_desig`, `pro_frm_pay_scale_type`, `pro_frm_scale`, `pro_frm_level`, `pro_frm_group`, `pro_frm_station`, `pro_frm_othr_station`, `pro_frm_rop`,`pro_frm_billunit`, `pro_frm_depot`, `pro_to_dept`, `pro_to_desig`, `pro_to_othr_desig`, `pro_to_scale`, `pro_to_group`, `pro_to_station`,`rop_to`,`pro_to_billunit`, `pro_to_depot`, `pro_carried_out_type`, `pro_carri_wef`, `pro_carri_date_of_incr`, `pro_car_re_accept_ltr_no`, `pro_car_re_accept_ltr_date`, `pro_car_re_wef_date`, `pro_car_re_remark`, `date_time`, `updated_by`, `updated_fields`, `updated_reason`, `updated_date_time`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`,`pro_remark`) VALUES ('$transaction_id','$zone','$division','$pm_pf','$pm_ordertype','$pm_letterno','$pm_letterdate','$pm_wef','$dp_frm_dept','$dp_frm_desig','$dp_frm_otherdesig','$dp_frm_ps_type_3','$dp_frm_scale','$dp_frm_level','$dp_frm_group','$station_id8','$dp_frm_otherstation','$dp_frm_rop','$depot_bill_unit6','$depot6','$dp_to_dept','$dp_to_desig','$dp_to_othr_desig','$dp_to_pay_scale_level','$dp_to_grp','$dp_to_place','$dp_to_rop','$depot_bill_unit7','$depot7','$prtf_carried','$prtf_wefdate','$prtf_incrdate','$prtf_acc_ltr_no','$prtf_acc_ltr_date','$prtf_carr_wef_date','$prtf_carr_remark',Now(),'$updated_by','','','','','','','','','','$count','$pm_remark')");

					$sql1 = mysqli_query($conn,"INSERT INTO `prft_promotion_track`(`temp_transaction_id`, `final_transaction_id`, `zone`, `division`, `pro_pf_no`, `pro_order_type`, `pro_letter_no`, `pro_letter_date`, `pro_wef`, `pro_frm_dept`, `pro_frm_desig`, `pro_frm_othr_desig`, `pro_frm_pay_scale_type`, `pro_frm_scale`, `pro_frm_level`, `pro_frm_group`, `pro_frm_station`, `pro_frm_othr_station`, `pro_frm_rop`,`pro_frm_billunit`, `pro_frm_depot`, `pro_to_dept`, `pro_to_desig`, `pro_to_othr_desig`, `pro_to_scale`, `pro_to_group`, `pro_to_station`,`rop_to`,`pro_to_billunit`, `pro_to_depot`, `pro_carried_out_type`, `pro_carri_wef`, `pro_carri_date_of_incr`, `pro_car_re_accept_ltr_no`, `pro_car_re_accept_ltr_date`, `pro_car_re_wef_date`, `pro_car_re_remark`, `date_time`, `updated_by`, `updated_fields`, `updated_reason`, `updated_date_time`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`,`pro_remark`) VALUES ('$transaction_id','$transaction_id','$zone','$division','$pm_pf','$pm_ordertype','$pm_letterno','$pm_letterdate','$pm_wef','$dp_frm_dept','$dp_frm_desig','$dp_frm_otherdesig','$dp_frm_ps_type_3','$dp_frm_scale','$dp_frm_level','$dp_frm_group','$station_id8','$dp_frm_otherstation','$dp_frm_rop','$depot_bill_unit6','$depot6','$dp_to_dept','$dp_to_desig','$dp_to_othr_desig','$dp_to_pay_scale_level','$dp_to_grp','$dp_to_place','$dp_to_rop','$depot_bill_unit7','$depot7','$prtf_carried','$prtf_wefdate','$prtf_incrdate','$prtf_acc_ltr_no','$prtf_acc_ltr_date','$prtf_carr_wef_date','$prtf_carr_remark',Now(),'$updated_by','','','','','','','','','','$count','$pm_remark')");

					$action = "Inserted Record in PRFT Promotion Temp and in PRFT Promotion Track";
				} else {

					$fetch = mysqli_query($conn,"select * from `prft_promotion_temp` where `pro_pf_no`='$pm_pf' order by id desc limit 1");

					$re = mysqli_fetch_array($fetch);

					if ($re['count'] == "") {
						$count = $count + 1;
					} else {
						$count = $re['count'] + 1;
					}

					$sql1 = mysqli_query($conn,"INSERT INTO `prft_promotion_track`(`temp_transaction_id`, `final_transaction_id`,`zone`, `division`, `pro_pf_no`, `pro_order_type`, `pro_letter_no`, `pro_letter_date`, `pro_wef`, `pro_frm_dept`, `pro_frm_desig`, `pro_frm_othr_desig`, `pro_frm_pay_scale_type`, `pro_frm_scale`, `pro_frm_level`, `pro_frm_group`, `pro_frm_station`, `pro_frm_othr_station`, `pro_frm_rop`,`pro_frm_billunit`, `pro_frm_depot`, `pro_to_dept`, `pro_to_desig`, `pro_to_othr_desig`, `pro_to_scale`, `pro_to_group`, `pro_to_station`,`rop_to`,`pro_to_billunit`, `pro_to_depot`, `pro_carried_out_type`, `pro_carri_wef`, `pro_carri_date_of_incr`, `pro_car_re_accept_ltr_no`, `pro_car_re_accept_ltr_date`, `pro_car_re_wef_date`, `pro_car_re_remark`, `date_time`, `updated_by`, `updated_fields`, `updated_reason`, `updated_date_time`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`,`pro_remark`) VALUES ('$transaction_id','$transaction_id','$zone','$division','$pm_pf','$pm_ordertype','$pm_letterno','$pm_letterdate','$pm_wef','$re_frm_dept','$re_frm_desig','$re_frm_otherdesig','$re_frm_ps_type_3','$re_frm_scale','$re_frm_level','$re_frm_group','$station_id9','$re_frm_otherstation','$re_frm_rop','$depot_bill_unit9','$depot9','$re_to_dept','$re_to_desig','$re_to_otr_desig','$re_to_pay_scale','$re_to_group','$re_to_place','$re_to_rop','$billunit8','$depot8','$prtf_carried','$prtf_wefdate','$prtf_incrdate','$prtf_acc_ltr_no','$prtf_acc_ltr_date','$prtf_carr_wef_date','$prtf_carr_remark',Now(),'$updated_by','','','','','','','','','','$count','$pm_remark')");


					$sql = mysqli_query($conn,"INSERT INTO `prft_promotion_temp`(`temp_transaction_id`, `zone`, `division`, `pro_pf_no`, `pro_order_type`, `pro_letter_no`, `pro_letter_date`, `pro_wef`, `pro_frm_dept`, `pro_frm_desig`, `pro_frm_othr_desig`, `pro_frm_pay_scale_type`, `pro_frm_scale`, `pro_frm_level`, `pro_frm_group`, `pro_frm_station`, `pro_frm_othr_station`, `pro_frm_rop`,`pro_frm_billunit`, `pro_frm_depot`, `pro_to_dept`, `pro_to_desig`, `pro_to_othr_desig`, `pro_to_scale`, `pro_to_group`, `pro_to_station`,`rop_to`,`pro_to_billunit`, `pro_to_depot`, `pro_carried_out_type`, `pro_carri_wef`, `pro_carri_date_of_incr`, `pro_car_re_accept_ltr_no`, `pro_car_re_accept_ltr_date`, `pro_car_re_wef_date`, `pro_car_re_remark`, `date_time`, `updated_by`, `updated_fields`, `updated_reason`, `updated_date_time`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`,`pro_remark`) VALUES ('$transaction_id','$zone','$division','$pm_pf','$pm_ordertype','$pm_letterno','$pm_letterdate','$pm_wef','$re_frm_dept','$re_frm_desig','$re_frm_otherdesig','$re_frm_ps_type_3','$re_frm_scale','$re_frm_level','$re_frm_group','$station_id9','$re_frm_otherstation','$re_frm_rop','$depot_bill_unit9','$depot9','$re_to_dept','$re_to_desig','$re_to_otr_desig','$re_to_pay_scale','$re_to_group','$re_to_place','$re_to_rop','$billunit8','$depot8','$prtf_carried','$prtf_wefdate','$prtf_incrdate','$prtf_acc_ltr_no','$prtf_acc_ltr_date','$prtf_carr_wef_date','$prtf_carr_remark',Now(),'$updated_by','','','','','','','','','','$count','$pm_remark')");

					$action = "Inserted Record in PRFT Promotion Temp and in PRFT Promotion Track";
				}
			}

			if ($sql) {
				$action_on = $pm_pf;
				create_log($action, $action_on);
				echo "<script>alert('PRTF Promotion Updated Successfully');window.location='prft_update.php?pf=$pm_pf';</script>";
			} else {
				echo "<script>alert('PRTF not Updated');window.location='prft_update.php?pf=$pm_pf';</script>";
			}
			break;

			// Reversion
		case 'update_prtf_reversion':
			$zone = '01';
			$division = 'SUR';
			$pm_pf = $_POST['rev_pf'];
			$pm_ordertype = $_POST['rev_ordertype'];
			$pm_letterno = $_POST['rev_letterno'];
			$pm_letterdate = date('Y-m-d', strtotime($_POST['rev_letterdate']));
			$pm_wef = date('Y-m-d', strtotime($_POST['rev_wef']));
			$rev_id = $_POST['rev_id'];
			$rev_remark = $_POST['rev_remark'];

			// Promotion From
			$pm_frm_dept = $_POST['rev_frm_dept'];
			$pm_frm_desig = $_POST['rev_frm_desig'];
			$pm_frm_otherdesig = $_POST['rev_frm_otherdesig'];
			$pm_frm_ps_type_3 = $_POST['rev_frm_ps_type_3'];
			if ($pm_frm_ps_type_3 == 1) {
				$pm_frm_scale = $_POST['rev_frm_scale_text'];
			} else if ($pm_frm_ps_type_3 == 2 || $pm_frm_ps_type_3 == 3 || $pm_frm_ps_type_3 == 4) {
				$pm_frm_scale = $_POST['rev_frm_scale'];
			}
			//$pm_frm_scale=$_POST['rev_frm_scale'];
			$pm_frm_level = $_POST['rev_frm_level'];
			$pm_frm_group = $_POST['rev_frm_group'];
			$station_id1 = $_POST['station_ida'];
			$pm_frm_otherstation = $_POST['rev_frm_otherstation'];
			$pm_frm_rop = $_POST['rev_frm_rop'];
			$depot_bill_unit2 = $_POST['depot_bill_unitb'];
			$depot2 = $_POST['depot_bill_unitb'];


			// Promotion To
			$pm_to_dept = $_POST['rev_to_dept'];
			$pm_to_desig = $_POST['rev_to_desig'];
			$pm_to_otherdesig = $_POST['rev_to_otherdesig'];
			$pm_to_ps_type_3 = $_POST['rev_to_ps_type_3'];
			if ($pm_to_ps_type_3 == 1) {
				$pro_to_scale = $_POST['rev_to_scale_text'];
			} else if ($pm_to_ps_type_3 == 2 || $pm_to_ps_type_3 == 3 || $pm_to_ps_type_3 == 4) {
				$pro_to_scale = $_POST['rev_to_scale'];
			}
			//$pro_to_scale=$_POST['rev_to_scale'];
			$pm_to_level = $_POST['rev_to_level'];
			$pm_to_group = $_POST['rev_to_group'];
			$station_id7 = $_POST['station_idb'];
			$pm_to_otherstation = $_POST['rev_to_otherstation'];
			$pm_to_rop = $_POST['rev_to_rop'];
			$depot_bill_unit5 = $_POST['depot_bill_unitc'];
			$depot5 = $_POST['depot_bill_unitc'];

			// Deputation From
			$dp_frm_dept = $_POST['re_de_dept'];
			$dp_frm_desig = $_POST['re_de_desig'];
			$dp_frm_otherdesig = $_POST['re_de_otherdesig'];
			$dp_frm_ps_type_3 = $_POST['re_de_ps_type_3'];
			if ($dp_frm_ps_type_3 == 1) {
				$dp_frm_scale = $_POST['re_de_scale_text'];
			} else if ($dp_frm_ps_type_3 == 2 || $dp_frm_ps_type_3 == 3 || $dp_frm_ps_type_3 == 4) {
				$dp_frm_scale = $_POST['re_de_scale'];
			}
			//$dp_frm_scale=$_POST['re_de_scale'];
			$dp_frm_level = $_POST['re_de_level'];
			$dp_frm_group = $_POST['re_de_group'];
			$station_id8 = $_POST['station_idc'];
			$dp_frm_otherstation = $_POST['re_de_otherstation'];
			$dp_frm_rop = $_POST['re_de_rop'];

			$depot_bill_unit6 = $_POST['depot_bill_unitd'];
			$depot6 = $_POST['depot_bill_unitd'];

			//echo $_POST['depot_bill_unitd']."<br>";
			//echo $depot_bill_unit6."<br>";


			// Deputation To
			$dp_to_dept = $_POST['re_de_to_dept'];
			$dp_to_desig = $_POST['re_de_to_desc'];
			$dp_to_othr_desig = $_POST['re_de_to_other'];
			$dp_to_pay_scale_level = $_POST['re_de_to_ps'];
			$dp_to_grp = $_POST['re_de_to_grp'];
			$dp_to_place = $_POST['re_de_to_place'];
			$dp_to_rop = $_POST['re_de_to_rop'];
			$depot_bill_unit7 = $_POST['re_de_to_bill_unit'];
			$depot7 = $_POST['re_de_to_deopt'];

			$prtf_carried = $_POST['rep_from_rev_carried'];
			$prtf_acc_ltr_no = $_POST['prtf_rev_acc_ltr_no'];
			$prtf_acc_ltr_date = date('Y-m-d', strtotime($_POST['prtf_rev_acc_ltr_date']));
			$prtf_carr_wef_date = date('Y-m-d', strtotime($_POST['rev_carr_wef_date']));
			$prtf_carr_remark = $_POST['rev_carr_remark'];
			$prtf_wefdate = date('Y-m-d', strtotime($_POST['rep_rev_wefdate']));
			$prtf_incrdate = date('Y-m-d', strtotime($_POST['rep_rev_incrdate']));

			// Reparation From
			$re_frm_dept = $_POST['rep_from_dept'];
			$re_frm_desig = $_POST['rep_from_desg'];
			$re_frm_otherdesig = $_POST['rep_from_oth_desg'];
			$re_frm_ps_type_3 = $_POST['rep_from_ps_type_3'];
			if ($re_frm_ps_type_3 == 1) {
				$re_frm_scale = $_POST['rep_from_scale_text'];
			} else if ($re_frm_ps_type_3 == 2 || $re_frm_ps_type_3 == 3 || $re_frm_ps_type_3 == 4) {
				$re_frm_scale = $_POST['rep_from_scale'];
			}
			//$re_frm_scale=$_POST['rep_from_scale'];
			$re_frm_level = $_POST['rep_from_level'];
			$re_frm_group = $_POST['rep_from_group'];
			$station_id9 = $_POST['station_idd'];
			$re_frm_otherstation = $_POST['rep_from_otherstation'];
			$re_frm_rop = $_POST['rep_from_rop'];
			$depot_bill_unit9 = $_POST['depot_bill_unite'];
			$depot9 = $_POST['depot_bill_unite'];


			// Reparation To
			$re_to_dept = $_POST['rep_to_dept'];
			$re_to_desig = $_POST['rep_to_desc'];

			$re_to_otr_desig = $_POST['rep_to_oth_desc'];
			$re_to_pay_scale = $_POST['rep_to_ps_level'];
			$re_to_group = $_POST['rep_to_grp'];

			$re_to_place = $_POST['rep_to_place'];
			$re_to_rop = $_POST['rep_to_rop'];

			$depot_bill_unit8 = $_POST['rep_to_bill_unit'];
			$depot8 = $_POST['rep_to_deopt'];
			$count = 0;

			date_default_timezone_set('Asia/Kolkata');
			$transaction_id = date('Ymdhis');
			$final_transaction_id = date('Ymdhis');
			session_start();
			$updated_by = $_SESSION['id'];

			if ($rev_id != "") {

				if ($pm_ordertype == 'Under DAR' || $pm_ordertype == 'Own Request' || $pm_ordertype == 'Medically Decategories') {
					$fetch = mysqli_query($conn,"select * from `prft_reversion_temp` where `rev_pf_no`='$pm_pf' and id='$rev_id'");

					if ($fetch) {
						$re = mysqli_fetch_array($fetch);

						if ($re['count'] == "") {
							$count = $count + 1;
						} else {
							$count = $re['count'];
						}

						if ($re['rev_pf_no'] == $pm_pf && $re['rev_order_type'] == $pm_ordertype && $re['rev_letter_no'] == $pm_letterno && $re['rev_letter_date'] == $pm_letterdate && $re['rev_wef'] == $pm_wef && $re['rev_frm_dept'] == $pm_frm_dept && $re['rev_frm_desig'] == $pm_frm_desig && $re['rev_frm_othr_desig'] == $pm_frm_otherdesig && $re['rev_frm_pay_scale_type'] == $pm_frm_ps_type_3 && $re['rev_frm_scale'] == $pm_frm_scale && $re['rev_frm_level'] == $pm_frm_level && $re['rev_frm_group'] == $pm_frm_group && $re['rev_frm_station'] == $station_id1 && $re['rev_frm_othr_station'] == $pm_frm_otherstation && $re['rev_frm_billunit'] == $depot_bill_unit2 && $re['rev_frm_depot'] == $depot2 && $re['rev_to_dept'] == $pm_to_dept && $re['rev_to_desig'] == $pm_to_desig && $re['rev_to_othr_desig'] == $pm_to_otherdesig && $re['rev_to_pay_scale_type'] == $pm_to_ps_type_3 && $re['rev_to_scale'] == $pro_to_scale && $re['rev_to_level'] == $pm_to_level && $re['rev_to_group'] == $pm_to_group && $re['rev_to_station'] == $station_id7 && $re['rev_to_othr_station'] == $pm_to_otherstation && $re['rev_to_billunit'] == $depot_bill_unit5 && $re['rev_to_depot'] == $depot5 && $re['rev_carried_out_type'] == $prtf_carried && $re['rev_carri_wef'] == $prtf_wefdate && $re['rev_carri_date_of_incr'] == $prtf_incrdate && $re['rev_car_re_accept_ltr_no'] == $prtf_acc_ltr_no && $re['rev_car_re_accept_ltr_date'] == $prtf_acc_ltr_date && $re['rev_car_re_wef_date'] == $prtf_carr_wef_date && $re['rev_car_re_remark'] == $prtf_carr_remark && $re['rev_frm_rop'] == $pm_frm_rop && $re['rev_to_rop'] == $pm_to_rop) {
							echo "<script>alert('Nothing Has Changed');</script>";

							/*   echo $re['rev_pf_no']."=".$pm_pf."<br>"; 
									echo $re['rev_order_type']."=".$pm_ordertype."<br>"; 
									echo $re['rev_letter_no']."=".$pm_letterno."<br>"; 
									echo $re['rev_letter_date']."=".$pm_letterdate."<br>"; 
									echo $re['rev_wef']."=".$pm_wef."<br>"; 
									echo $re['rev_frm_dept']."=".$pm_frm_dept."<br>"; 
									echo $re['rev_frm_desig']."=".$pm_frm_desig."<br>"; 
									echo $re['rev_frm_othr_desig']."=".$pm_frm_otherdesig."<br>"; 
									echo $re['rev_frm_pay_scale_type']."=".$pm_frm_ps_type_3."<br>"; 
									echo $re['rev_frm_scale']."=".$pm_frm_scale."<br>"; 
									echo $re['rev_frm_level']."=".$pm_frm_level."<br>"; 
									echo $re['rev_frm_group']."=".$pm_frm_group."<br>"; 
									echo $re['rev_frm_station']."=".$station_id1."<br>"; 
									echo $re['rev_frm_othr_station']."=".$pm_frm_otherstation."<br>"; 
									echo $re['rev_frm_billunit']."=".$depot_bill_unit2."<br>"; 
									echo $re['rev_frm_depot']."=".$depot2."<br>"; 
									echo $re['rev_to_dept']."=".$pm_to_dept."<br>"; 
									echo $re['rev_to_desig']."=".$pm_to_desig."<br>"; 
									echo $re['rev_to_othr_desig']."=".$pm_to_otherdesig."<br>"; 
									echo $re['rev_to_pay_scale_type']."=".$pm_to_ps_type_3."<br>"; 
									echo $re['rev_to_scale']."=".$pro_to_scale."<br>"; 
									echo $re['rev_to_level']."=".$pm_to_level."<br>"; 
									echo $re['rev_to_group']."=".$pm_to_group."<br>";
									echo $re['rev_to_station']."=".$station_id7."<br>"; 
									echo $re['rev_to_othr_station']."=".$pm_to_otherstation."<br>"; 
									echo $re['rev_to_billunit']."=".$depot_bill_unit5."<br>"; 
									echo $re['rev_to_depot']."=".$depot5."<br>"; 
									echo $re['rev_carried_out_type']."=".$prtf_carried."<br>"; 
									echo $re['rev_carri_wef']."=".$prtf_wefdate."<br>"; 
									echo $re['rev_carri_date_of_incr']."=".$prtf_incrdate."<br>"; 
									echo $re['rev_car_re_accept_ltr_no']."=".$prtf_acc_ltr_no."<br>"; 
									echo $re['rev_car_re_accept_ltr_date']."=".$prtf_acc_ltr_date."<br>"; 
									echo $re['rev_car_re_wef_date']."=".$prtf_carr_wef_date."<br>"; 
									echo $re['rev_car_re_remark']."=".$prtf_carr_remark."<br>"; 
									echo $re['rev_frm_rop']."=".$pm_frm_rop."<br>"; 
									echo $re['rev_to_rop']."=".$pm_to_rop."<br>";    */
						} else {
							/*  echo "<script>alert('In else');</script>";
								
								echo $re['rev_pf_no']."=".$pm_pf."<br>"; 
								echo $re['rev_order_type']."=".$pm_ordertype."<br>"; 
								echo $re['rev_letter_no']."=".$pm_letterno."<br>"; 
								echo $re['rev_letter_date']."=".$pm_letterdate."<br>"; 
								echo $re['rev_wef']."=".$pm_wef."<br>"; 
								echo $re['rev_frm_dept']."=".$pm_frm_dept."<br>"; 
								echo $re['rev_frm_desig']."=".$pm_frm_desig."<br>"; 
								echo $re['rev_frm_othr_desig']."=".$pm_frm_otherdesig."<br>"; 
								echo $re['rev_frm_pay_scale_type']."=".$pm_frm_ps_type_3."<br>"; 
								echo $re['rev_frm_scale']."=".$pm_frm_scale."<br>"; 
								echo $re['rev_frm_level']."=".$pm_frm_level."<br>"; 
								echo $re['rev_frm_group']."=".$pm_frm_group."<br>"; 
								echo $re['rev_frm_station']."=".$station_id1."<br>"; 
								echo $re['rev_frm_othr_station']."=".$pm_frm_otherstation."<br>"; 
								echo $re['rev_frm_billunit']."=".$depot_bill_unit2."<br>"; 
								echo $re['rev_frm_depot']."=".$depot2."<br>"; 
								echo $re['rev_to_dept']."=".$pm_to_dept."<br>"; 
								echo $re['rev_to_desig']."=".$pm_to_desig."<br>"; 
								echo $re['rev_to_othr_desig']."=".$pm_to_otherdesig."<br>"; 
								echo $re['rev_to_pay_scale_type']."=".$pm_to_ps_type_3."<br>"; 
								echo $re['rev_to_scale']."=".$pro_to_scale."<br>"; 
								echo $re['rev_to_level']."=".$pm_to_level."<br>"; 
								echo $re['rev_to_group']."=".$pm_to_group."<br>";
								echo $re['rev_to_station']."=".$station_id7."<br>"; 
								echo $re['rev_to_othr_station']."=".$pm_to_otherstation."<br>"; 
								echo $re['rev_to_billunit']."=".$depot_bill_unit5."<br>"; 
								echo $re['rev_to_depot']."=".$depot5."<br>"; 
								echo $re['rev_carried_out_type']."=".$prtf_carried."<br>"; 
								echo $re['rev_carri_wef']."=".$prtf_wefdate."<br>"; 
								echo $re['rev_carri_date_of_incr']."=".$prtf_incrdate."<br>"; 
								echo $re['rev_car_re_accept_ltr_no']."=".$prtf_acc_ltr_no."<br>"; 
								echo $re['rev_car_re_accept_ltr_date']."=".$prtf_acc_ltr_date."<br>"; 
								echo $re['rev_car_re_wef_date']."=".$prtf_carr_wef_date."<br>"; 
								echo $re['rev_car_re_remark']."=".$prtf_carr_remark."<br>"; 
								echo $re['rev_frm_rop']."=".$pm_frm_rop."<br>"; 
								echo $re['rev_to_rop']."=".$pm_to_rop."<br>";   */

							$sql1 = mysqli_query($conn,"INSERT INTO `prft_reversion_track`(`temp_transaction_id`,`final_transaction_id`, `zone`, `division`, `rev_pf_no`, `rev_order_type`, `rev_letter_no`, `rev_letter_date`, `rev_wef`, `rev_frm_dept`, `rev_frm_desig`, `rev_frm_othr_desig`, `rev_frm_pay_scale_type`, `rev_frm_scale`, `rev_frm_level`, `rev_frm_group`, `rev_frm_station`, `rev_frm_othr_station`, `rev_frm_billunit`, `rev_frm_depot`, `rev_to_dept`, `rev_to_desig`, `rev_to_othr_desig`, `rev_to_pay_scale_type`, `rev_to_scale`, `rev_to_level`, `rev_to_group`, `rev_to_station`, `rev_to_othr_station`, `rev_to_billunit`, `rev_to_depot`, `rev_carried_out_type`, `rev_carri_wef`, `rev_carri_date_of_incr`, `rev_car_re_accept_ltr_no`, `rev_car_re_accept_ltr_date`, `rev_car_re_wef_date`, `rev_car_re_remark`, `rev_frm_rop`, `rev_to_rop`, `date_time`, `updated_by`, `updated_fields`, `updated_reason`, `updated_date_time`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`,`rev_remark`) VALUES ('$transaction_id','$transaction_id','$zone','$division','$pm_pf','$pm_ordertype','$pm_letterno','$pm_letterdate','$pm_wef','$pm_frm_dept','$pm_frm_desig','$pm_frm_otherdesig','$pm_frm_ps_type_3','$pm_frm_scale','$pm_frm_level','$pm_frm_group','$station_id1','$pm_frm_otherstation','$depot_bill_unit2','$depot2','$pm_to_dept','$pm_to_desig','$pm_to_otherdesig','$pm_to_ps_type_3','$pro_to_scale','$pm_to_level','$pm_to_group','$station_id7','$pm_to_otherstation','$depot_bill_unit5','$depot5','$prtf_carried','$prtf_wefdate','$prtf_incrdate','$prtf_acc_ltr_no','$prtf_acc_ltr_date','$prtf_carr_wef_date','$prtf_carr_remark','$pm_frm_rop','$pm_to_rop',Now(),'$updated_by','','','','','','','','','','$count','$rev_remark')");

							$action = "Updated Record in PRFT Reversion Temp and Inserted Record in PRFT Reversion Track";
						}
					}

					$sql = mysqli_query($conn,"UPDATE `prft_reversion_temp` SET `rev_order_type`='$pm_ordertype', `rev_letter_no`='$pm_letterno', `rev_letter_date`='$pm_letterdate', `rev_wef`='$pm_wef', `rev_frm_dept`='$pm_frm_dept', `rev_frm_desig`='$pm_frm_desig', `rev_frm_othr_desig`='$pm_frm_otherdesig', `rev_frm_pay_scale_type`='$pm_frm_ps_type_3', `rev_frm_scale`='$pm_frm_scale', `rev_frm_level`='$pm_frm_level', `rev_frm_group`='$pm_frm_group', `rev_frm_station`='$station_id1', `rev_frm_othr_station`='$pm_frm_otherstation', `rev_frm_rop`='$pm_frm_rop',`rev_frm_billunit`='$depot_bill_unit2', `rev_frm_depot`='$depot2', `rev_to_dept`='$pm_to_dept', `rev_to_desig`='$pm_to_desig', `rev_to_othr_desig`='$pm_to_otherdesig', `rev_to_pay_scale_type`='$pm_to_ps_type_3', `rev_to_scale`='$pro_to_scale', `rev_to_level`='$pm_to_level', `rev_to_group`='$pm_to_group', `rev_to_station`='$station_id7', `rev_to_othr_station`='$pm_to_otherstation', `rev_to_billunit`='$depot_bill_unit5', `rev_to_depot`='$depot5',`rev_to_rop`='$pm_to_rop',`rev_carried_out_type`='$prtf_carried', `rev_carri_wef`='$prtf_wefdate', `rev_carri_date_of_incr`='$prtf_incrdate', `rev_car_re_accept_ltr_no`='$prtf_acc_ltr_no', `rev_car_re_accept_ltr_date`='$prtf_acc_ltr_date', `rev_car_re_wef_date`='$prtf_carr_wef_date', `rev_car_re_remark`='$prtf_carr_remark', `date_time`=Now(), `updated_by`='$updated_by', `rev_remark`='$rev_remark' where `rev_pf_no`='$pm_pf' and id='$rev_id'");
				} else if ($pm_ordertype == 'Deputation') {

					$fetch = mysqli_query($conn,"select * from `prft_reversion_temp` where `rev_pf_no`='$pm_pf' and id='$rev_id'");

					if ($fetch) {
						$re = mysqli_fetch_array($fetch);

						if ($re['count'] == "") {
							$count = $count + 1;
						} else {
							$count = $re['count'];
						}

						if ($re['rev_pf_no'] == $pm_pf && $re['rev_order_type'] == $pm_ordertype && $re['rev_letter_no'] == $pm_letterno && $re['rev_letter_date'] == $pm_letterdate && $re['rev_wef'] == $pm_wef && $re['rev_frm_dept'] == $dp_frm_dept && $re['rev_frm_desig'] == $dp_frm_desig && $re['rev_frm_othr_desig'] == $dp_frm_otherdesig && $re['rev_frm_pay_scale_type'] == $dp_frm_ps_type_3 && $re['rev_frm_scale'] == $dp_frm_scale && $re['rev_frm_level'] == $dp_frm_level && $re['rev_frm_group'] == $dp_frm_group && $re['rev_frm_station'] == $station_id8 && $re['rev_frm_othr_station'] == $dp_frm_otherstation && $re['rev_frm_billunit'] == $depot_bill_unit6 && $re['rev_frm_depot'] == $depot6 && $re['rev_to_dept'] == $dp_to_dept && $re['rev_to_desig'] == $dp_to_desig && $re['rev_to_othr_desig'] == $dp_to_othr_desig && $re['rev_to_pay_scale_type'] == $dp_to_pay_scale_level && $re['rev_to_group'] == $dp_to_grp && $re['rev_to_station'] == $dp_to_place && $re['rev_to_billunit'] == $depot_bill_unit7 && $re['rev_to_depot'] == $depot7 && $re['rev_carried_out_type'] == $prtf_carried && $re['rev_carri_wef'] == $prtf_wefdate && $re['rev_carri_date_of_incr'] == $prtf_incrdate && $re['rev_car_re_accept_ltr_no'] == $prtf_acc_ltr_no && $re['rev_car_re_accept_ltr_date'] == $prtf_acc_ltr_date && $re['rev_car_re_wef_date'] == $prtf_carr_wef_date && $re['rev_car_re_remark'] == $prtf_carr_remark && $re['rev_frm_rop'] == $dp_frm_rop && $re['rev_to_rop'] == $dp_to_rop) {
							echo "<script>alert('Nothing Has Changed');</script>";
						} else {
							/* echo "<script>alert('in else');</script>";
								
								echo $re['rev_pf_no']."=".$pm_pf."<br>"; 
								echo $re['rev_order_type']."=".$pm_ordertype."<br>"; 
								echo $re['rev_letter_no']."=".$pm_letterno."<br>"; 
								echo $re['rev_letter_date']."=".$pm_letterdate."<br>"; 
								echo $re['rev_wef']."=".$pm_wef."<br>"; 
								echo $re['rev_frm_dept']."=".$dp_frm_dept."<br>"; 
								echo $re['rev_frm_desig']."=".$dp_frm_desig."<br>"; 
								echo $re['rev_frm_othr_desig']."=".$dp_frm_otherdesig."<br>"; 
								echo $re['rev_frm_pay_scale_type']."=".$dp_frm_ps_type_3."<br>"; 
								echo $re['rev_frm_scale']."=".$dp_frm_scale."<br>"; 
								echo $re['rev_frm_level']."=".$dp_frm_level."<br>"; 
								echo $re['rev_frm_group']."=".$dp_frm_group."<br>"; 
								echo $re['rev_frm_station']."=".$station_id8."<br>"; 
								echo $re['rev_frm_othr_station']."=".$dp_frm_otherstation."<br>"; 
								echo $re['rev_frm_billunit']."=".$depot_bill_unit6."<br>"; 
								echo $re['rev_frm_depot']."=".$depot6."<br>"; 
								echo $re['rev_to_dept']."=".$dp_to_dept."<br>"; 								
								echo $re['rev_to_desig']."=".$dp_to_desig."<br>";
								echo $re['rev_to_othr_desig']."=".$dp_to_othr_desig."<br>"; 
								echo $re['rev_to_pay_scale_type']."=".$dp_to_pay_scale_level."<br>"; 
								echo $re['rev_to_group']."=".$dp_to_grp."<br>"; 
								echo $re['rev_to_station']."=".$dp_to_place."<br>"; 
								echo $re['rev_to_billunit']."=".$depot_bill_unit7."<br>"; 
								echo $re['rev_to_depot']."=".$depot7."<br>"; 
								echo $re['rev_carried_out_type']."=".$prtf_carried."<br>"; 
								echo $re['rev_carri_wef']."=".$prtf_wefdate."<br>"; 
								echo $re['rev_carri_date_of_incr']."=".$prtf_incrdate."<br>"; 
								echo $re['rev_car_re_accept_ltr_no']."=".$prtf_acc_ltr_no."<br>"; 
								echo $re['rev_car_re_accept_ltr_date']."=".$prtf_acc_ltr_date."<br>"; 
								echo $re['rev_car_re_wef_date']."=".$prtf_carr_wef_date."<br>"; 
								echo $re['rev_car_re_remark']."=".$prtf_carr_remark."<br>"; 
								echo $re['rev_frm_rop']."=".$dp_frm_rop."<br>"; 
								echo $re['rev_to_rop']."=".$dp_to_rop."<br>"; */

							$sql1 = mysqli_query($conn,"INSERT INTO `prft_reversion_track`(`temp_transaction_id`,`final_transaction_id`, `zone`, `division`, `rev_pf_no`, `rev_order_type`, `rev_letter_no`, `rev_letter_date`, `rev_wef`, `rev_frm_dept`, `rev_frm_desig`, `rev_frm_othr_desig`, `rev_frm_pay_scale_type`, `rev_frm_scale`, `rev_frm_level`, `rev_frm_group`, `rev_frm_station`, `rev_frm_othr_station`, `rev_frm_billunit`, `rev_frm_depot`, `rev_to_dept`, `rev_to_desig`, `rev_to_othr_desig`, `rev_to_pay_scale_type`,`rev_to_group`, `rev_to_station`, `rev_to_billunit`, `rev_to_depot`, `rev_carried_out_type`, `rev_carri_wef`, `rev_carri_date_of_incr`, `rev_car_re_accept_ltr_no`, `rev_car_re_accept_ltr_date`, `rev_car_re_wef_date`, `rev_car_re_remark`, `rev_frm_rop`, `rev_to_rop`, `date_time`, `updated_by`, `updated_fields`, `updated_reason`, `updated_date_time`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`,`rev_remark`) VALUES ('$transaction_id','$transaction_id','$zone','$division','$pm_pf','$pm_ordertype','$pm_letterno','$pm_letterdate','$pm_wef','$dp_frm_dept','$dp_frm_desig','$dp_frm_otherdesig','$dp_frm_ps_type_3','$dp_frm_scale','$dp_frm_level','$dp_frm_group','$station_id8','$dp_frm_otherstation','$depot_bill_unit6','$depot6','$dp_to_dept','$dp_to_desig','$dp_to_othr_desig','$dp_to_pay_scale_level','$dp_to_grp','$dp_to_place','$depot_bill_unit7','$depot7','$prtf_carried','$prtf_wefdate','$prtf_incrdate','$prtf_acc_ltr_no','$prtf_acc_ltr_date','$prtf_carr_wef_date','$prtf_carr_remark','$dp_frm_rop','$dp_to_rop',Now(),'$updated_by','','','','','','','','','',,'$count','$rev_remark')");

							$action = "Updated Record in PRFT Reversion Temp and Inserted Record in PRFT Reversion Track";
						}
					}

					$sql = mysqli_query($conn,"UPDATE `prft_reversion_temp` SET `rev_order_type`='$pm_ordertype', `rev_letter_no`='$pm_letterno', `rev_letter_date`='$pm_letterdate', `rev_wef`='$pm_wef', `rev_frm_dept`='$dp_frm_dept', `rev_frm_desig`='$dp_frm_desig', `rev_frm_othr_desig`='$dp_frm_otherdesig', `rev_frm_pay_scale_type`='$dp_frm_ps_type_3', `rev_frm_scale`='$dp_frm_scale', `rev_frm_level`='$dp_frm_level', `rev_frm_group`='$dp_frm_group', `rev_frm_station`='$station_id8', `rev_frm_othr_station`='$dp_frm_otherstation', `rev_frm_rop`='$dp_frm_rop',`rev_frm_billunit`='$depot_bill_unit6', `rev_frm_depot`='$depot6', `rev_to_dept`='$dp_to_dept', `rev_to_desig`='$dp_to_desig', `rev_to_othr_desig`='$dp_to_othr_desig', `rev_to_pay_scale_type`='$dp_to_pay_scale_level', `rev_to_group`='$dp_to_grp', `rev_to_station`='$dp_to_place',`rev_to_rop`='$dp_to_rop',`rev_to_billunit`='$depot_bill_unit7', `rev_to_depot`='$depot7', `rev_carried_out_type`='$prtf_carried', `rev_carri_wef`='$prtf_wefdate', `rev_carri_date_of_incr`='$prtf_incrdate', `rev_car_re_accept_ltr_no`='$prtf_acc_ltr_no', `rev_car_re_accept_ltr_date`='$prtf_acc_ltr_date', `rev_car_re_wef_date`='$prtf_carr_wef_date', `rev_car_re_remark`='$prtf_carr_remark', `date_time`=Now(), `updated_by`='$updated_by',`rev_remark`='$rev_remark' where `rev_pf_no`='$pm_pf' and id='$rev_id'");
				} else {

					$fetch = mysqli_query($conn,"select * from `prft_reversion_temp` where `rev_pf_no`='$pm_pf' and id='$rev_id'");

					if ($fetch) {
						$re = mysqli_fetch_array($fetch);
						if ($re['count'] == "") {
							$count = $count + 1;;
						} else {
							$count = $re['count'];
						}

						if ($re['rev_pf_no'] == $pm_pf && $re['rev_order_type'] == $pm_ordertype && $re['rev_letter_no'] == $pm_letterno && $re['rev_letter_date'] == $pm_letterdate && $re['rev_wef'] == $pm_wef && $re['rev_frm_dept'] == $re_frm_dept && $re['rev_frm_desig'] == $re_frm_desig && $re['rev_frm_othr_desig'] == $re_frm_otherdesig && $re['rev_frm_pay_scale_type'] == $re_frm_ps_type_3 && $re['rev_frm_scale'] == $re_frm_scale && $re['rev_frm_level'] == $re_frm_level && $re['rev_frm_group'] == $re_frm_group && $re['rev_frm_station'] == $station_id9 && $re['rev_frm_othr_station'] == $re_frm_otherstation && $re['rev_frm_billunit'] == $depot_bill_unit9 && $re['rev_frm_depot'] == $depot9 && $re['rev_to_dept'] == $re_to_dept && $re['rev_to_desig'] == $re_to_desig && $re['rev_to_othr_desig'] == $re_to_otr_desig && $re['rev_to_pay_scale_type'] == $re_to_pay_scale && $re['rev_to_group'] == $re_to_group && $re['rev_to_station'] == $re_to_place && $re['rev_to_billunit'] == $depot_bill_unit8 && $re['rev_to_depot'] == $depot8 && $re['rev_carried_out_type'] == $prtf_carried && $re['rev_carri_wef'] == $prtf_wefdate && $re['rev_carri_date_of_incr'] == $prtf_incrdate && $re['rev_car_re_accept_ltr_no'] == $prtf_acc_ltr_no && $re['rev_car_re_accept_ltr_date'] == $prtf_acc_ltr_date && $re['rev_car_re_wef_date'] == $prtf_carr_wef_date && $re['rev_car_re_remark'] == $prtf_carr_remark && $re['rev_frm_rop'] == $re_frm_rop && $re['rev_to_rop'] == $re_to_rop) {
							echo "<script>alert('Nothing Has Changed');</script>";
						} else {
							//echo "<script>alert('in else');</script>";

							/* echo $re['rev_pf_no']."=".$pm_pf."<br>";
								echo $re['rev_order_type']."=".$pm_ordertype."<br>"; 
								echo $re['rev_letter_no']."=".$pm_letterno."<br>"; 
								echo $re['rev_letter_date']."=".$pm_letterdate."<br>"; 
								echo $re['rev_wef']."=".$pm_wef."<br>"; 
								echo $re['rev_frm_dept']."=".$re_frm_dept."<br>"; 
								echo $re['rev_frm_desig']."=".$re_frm_desig."<br>"; 
								echo $re['rev_frm_othr_desig']."=".$re_frm_otherdesig."<br>"; 
								echo $re['rev_frm_pay_scale_type']."=".$re_frm_ps_type_3."<br>";
								echo $re['rev_frm_scale']."=".$re_frm_scale."<br>"; 
								echo $re['rev_frm_level']."=".$re_frm_level."<br>"; 
								echo $re['rev_frm_group']."=".$re_frm_group."<br>"; 
								echo $re['rev_frm_station']."=".$station_id9."<br>"; 
								echo $re['rev_frm_othr_station']."=".$re_frm_otherstation."<br>"; 
								echo $re['rev_frm_billunit']."=".$depot_bill_unit9."<br>"; 
								echo $re['rev_to_dept']."=".$depot9."<br>"; 
								echo $re['rev_to_desig']."=".$re_to_dept."<br>"; 
								echo $re['rev_to_othr_desig']."=".$re_to_desig."<br>"; 
								echo $re['rev_to_pay_scale_type']."=".$re_to_otr_desig."<br>"; 
								echo $re['rev_to_group']."=".$re_to_pay_scale."<br>"; 
								echo $re['rev_to_station']."=".$re_to_group."<br>"; 
								//echo $re['rev_to_othr_station']."=".$re_to_place."<br>"; 
								echo $re['rev_to_billunit']."=".$depot_bill_unit8."<br>"; 
								echo $re['rev_to_depot']."=".$depot8."<br>"; 
								echo $re['rev_carried_out_type']."=".$prtf_carried."<br>"; 
								echo $re['rev_carri_wef']."=".$prtf_wefdate."<br>"; 
								echo $re['rev_carri_date_of_incr']."=".$prtf_incrdate."<br>"; 
								echo $re['rev_car_re_accept_ltr_no']."=".$prtf_acc_ltr_no."<br>"; 
								echo $re['rev_car_re_accept_ltr_date']."=".$prtf_acc_ltr_date."<br>"; 
								echo $re['rev_car_re_wef_date']."=".$prtf_carr_wef_date."<br>"; 
								echo $re['rev_car_re_remark']."=".$prtf_carr_remark."<br>"; 
								echo $re['rev_frm_rop']."=".$re_frm_rop."<br>"; 
								echo $re['rev_to_rop']."=".$re_to_rop."<br>"; */

							$sql1 = mysqli_query($conn,"INSERT INTO `prft_reversion_track`(`temp_transaction_id`, `final_transaction_id`,`zone`, `division`, `rev_pf_no`, `rev_order_type`, `rev_letter_no`, `rev_letter_date`, `rev_wef`, `rev_frm_dept`, `rev_frm_desig`, `rev_frm_othr_desig`, `rev_frm_pay_scale_type`, `rev_frm_scale`, `rev_frm_level`, `rev_frm_group`, `rev_frm_station`, `rev_frm_othr_station`, `rev_frm_billunit`, `rev_frm_depot`, `rev_to_dept`, `rev_to_desig`, `rev_to_othr_desig`, `rev_to_pay_scale_type`,`rev_to_group`, `rev_to_station`, `rev_to_othr_station`, `rev_to_billunit`, `rev_to_depot`, `rev_carried_out_type`, `rev_carri_wef`, `rev_carri_date_of_incr`, `rev_car_re_accept_ltr_no`, `rev_car_re_accept_ltr_date`, `rev_car_re_wef_date`, `rev_car_re_remark`, `rev_frm_rop`, `rev_to_rop`, `date_time`, `updated_by`, `updated_fields`, `updated_reason`, `updated_date_time`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`,`rev_remark`)VALUES ('$transaction_id','$transaction_id','$zone','$division','$pm_pf','$pm_ordertype','$pm_letterno','$pm_letterdate','$pm_wef','$re_frm_dept','$re_frm_desig','$re_frm_otherdesig','$re_frm_ps_type_3','$re_frm_scale','$re_frm_level','$re_frm_group','$station_id9','$re_frm_otherstation','$depot_bill_unit9','$depot9','$re_to_dept','$re_to_desig','$re_to_otr_desig','$re_to_pay_scale','$re_to_group','$re_to_place','','$depot_bill_unit8','$depot8','$prtf_carried','$prtf_wefdate','$prtf_incrdate','$prtf_acc_ltr_no','$prtf_acc_ltr_date','$prtf_carr_wef_date','$prtf_carr_remark','$re_frm_rop','$re_to_rop',Now(),'$updated_by','','','','','','','','','','$count','$rev_remark')");

							$action = "Updated Record in PRFT Reversion Temp and Inserted Record in PRFT Reversion Track";
						}
					}

					$sql = mysqli_query($conn,"UPDATE `prft_reversion_temp` SET  `rev_order_type`='$pm_ordertype', `rev_letter_no`='$pm_letterno', `rev_letter_date`='$pm_letterdate', `rev_wef`='$pm_wef', `rev_frm_dept`='$re_frm_dept', `rev_frm_desig`='$re_frm_desig', `rev_frm_othr_desig`='$re_frm_otherdesig', `rev_frm_pay_scale_type`='$re_frm_ps_type_3', `rev_frm_scale`='$re_frm_scale', `rev_frm_level`='$re_frm_level', `rev_frm_group`='$re_frm_group', `rev_frm_station`='$station_id9', `rev_frm_othr_station`='$re_frm_otherstation', `rev_frm_rop`='$re_frm_rop',`rev_frm_billunit`='$depot_bill_unit9', `rev_frm_depot`='$depot9', `rev_to_dept`='$re_to_dept', `rev_to_desig`='$re_to_desig', `rev_to_othr_desig`='$re_to_otr_desig', `rev_to_pay_scale_type`='$re_to_pay_scale', `rev_to_group`='$re_to_group', `rev_to_station`='$re_to_place',`rev_to_rop`='$re_to_rop',`rev_to_billunit`='$depot_bill_unit8', `rev_to_depot`='$depot8', `rev_carried_out_type`='$prtf_carried', `rev_carri_wef`='$prtf_wefdate', `rev_carri_date_of_incr`='$prtf_incrdate', `rev_car_re_accept_ltr_no`='$prtf_acc_ltr_no', `rev_car_re_accept_ltr_date`='$prtf_acc_ltr_date', `rev_car_re_wef_date`='$prtf_carr_wef_date', `rev_car_re_remark`='$prtf_carr_remark', `date_time`=Now(), `updated_by`='$updated_by', `rev_remark`='$rev_remark' where `rev_pf_no`='$pm_pf' and id='$rev_id'");
				}
			} else {

				if ($pm_ordertype == 'Under DAR' || $pm_ordertype == 'Own Request' || $pm_ordertype == 'Medically Decategories') {

					$fetch = mysqli_query($conn,"select * from `prft_reversion_temp` where `rev_pf_no`='$pm_pf'");

					$re = mysqli_fetch_array($fetch);

					if ($re['count'] == "") {
						$count = $count + 1;
					} else {
						$count = $re['count'] + 1;
					}

					$sql = mysqli_query($conn,"INSERT INTO `prft_reversion_temp`(`temp_transaction_id`, `zone`, `division`, `rev_pf_no`, `rev_order_type`, `rev_letter_no`, `rev_letter_date`, `rev_wef`, `rev_frm_dept`, `rev_frm_desig`, `rev_frm_othr_desig`, `rev_frm_pay_scale_type`, `rev_frm_scale`, `rev_frm_level`, `rev_frm_group`, `rev_frm_station`, `rev_frm_othr_station`, `rev_frm_billunit`, `rev_frm_depot`, `rev_to_dept`, `rev_to_desig`, `rev_to_othr_desig`, `rev_to_pay_scale_type`, `rev_to_scale`, `rev_to_level`, `rev_to_group`, `rev_to_station`, `rev_to_othr_station`, `rev_to_billunit`, `rev_to_depot`, `rev_carried_out_type`, `rev_carri_wef`, `rev_carri_date_of_incr`, `rev_car_re_accept_ltr_no`, `rev_car_re_accept_ltr_date`, `rev_car_re_wef_date`, `rev_car_re_remark`, `rev_frm_rop`, `rev_to_rop`, `date_time`, `updated_by`, `updated_fields`, `updated_reason`, `updated_date_time`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`,`rev_remark`) VALUES ('$transaction_id','$zone','$division','$pm_pf','$pm_ordertype','$pm_letterno','$pm_letterdate','$pm_wef','$pm_frm_dept','$pm_frm_desig','$pm_frm_otherdesig','$pm_frm_ps_type_3','$pm_frm_scale','$pm_frm_level','$pm_frm_group','$station_id1','$pm_frm_otherstation','$depot_bill_unit2','$depot2','$pm_to_dept','$pm_to_desig','$pm_to_otherdesig','$pm_to_ps_type_3','$pro_to_scale','$pm_to_level','$pm_to_group','$station_id7','$pm_to_otherstation','$depot_bill_unit5','$depot5','$prtf_carried','$prtf_wefdate','$prtf_incrdate','$prtf_acc_ltr_no','$prtf_acc_ltr_date','$prtf_carr_wef_date','$prtf_carr_remark','$pm_frm_rop','$pm_to_rop',Now(),'$updated_by','','','','','','','','','','$count','$rev_remark')");

					$sql1 = mysqli_query($conn,"INSERT INTO `prft_reversion_track`(`temp_transaction_id`,`final_transaction_id`, `zone`, `division`, `rev_pf_no`, `rev_order_type`, `rev_letter_no`, `rev_letter_date`, `rev_wef`, `rev_frm_dept`, `rev_frm_desig`, `rev_frm_othr_desig`, `rev_frm_pay_scale_type`, `rev_frm_scale`, `rev_frm_level`, `rev_frm_group`, `rev_frm_station`, `rev_frm_othr_station`, `rev_frm_billunit`, `rev_frm_depot`, `rev_to_dept`, `rev_to_desig`, `rev_to_othr_desig`, `rev_to_pay_scale_type`, `rev_to_scale`, `rev_to_level`, `rev_to_group`, `rev_to_station`, `rev_to_othr_station`, `rev_to_billunit`, `rev_to_depot`, `rev_carried_out_type`, `rev_carri_wef`, `rev_carri_date_of_incr`, `rev_car_re_accept_ltr_no`, `rev_car_re_accept_ltr_date`, `rev_car_re_wef_date`, `rev_car_re_remark`, `rev_frm_rop`, `rev_to_rop`, `date_time`, `updated_by`, `updated_fields`, `updated_reason`, `updated_date_time`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`,`rev_remark`) VALUES ('$transaction_id','$transaction_id','$zone','$division','$pm_pf','$pm_ordertype','$pm_letterno','$pm_letterdate','$pm_wef','$pm_frm_dept','$pm_frm_desig','$pm_frm_otherdesig','$pm_frm_ps_type_3','$pm_frm_scale','$pm_frm_level','$pm_frm_group','$station_id1','$pm_frm_otherstation','$depot_bill_unit2','$depot2','$pm_to_dept','$pm_to_desig','$pm_to_otherdesig','$pm_to_ps_type_3','$pro_to_scale','$pm_to_level','$pm_to_group','$station_id7','$pm_to_otherstation','$depot_bill_unit5','$depot5','$prtf_carried','$prtf_wefdate','$prtf_incrdate','$prtf_acc_ltr_no','$prtf_acc_ltr_date','$prtf_carr_wef_date','$prtf_carr_remark','$pm_frm_rop','$pm_to_rop',Now(),'$updated_by','','','','','','','','','','$count','$rev_remark')");

					$action = "Inserted Record in PRFT Reversion Temp and in PRFT Reversion Track";
				} else if ($pm_ordertype == 'Deputation') {

					$fetch = mysqli_query($conn,"select * from `prft_reversion_temp` where `rev_pf_no`='$pm_pf' order by id desc limit 1");

					$re = mysqli_fetch_array($fetch);
					if ($re['count'] == "") {
						$count = $count + 1;
					} else {
						$count = $re['count'] + 1;
					}

					$sql = mysqli_query($conn,"INSERT INTO `prft_reversion_temp`(`temp_transaction_id`, `zone`, `division`, `rev_pf_no`, `rev_order_type`, `rev_letter_no`, `rev_letter_date`, `rev_wef`, `rev_frm_dept`, `rev_frm_desig`, `rev_frm_othr_desig`, `rev_frm_pay_scale_type`, `rev_frm_scale`, `rev_frm_level`, `rev_frm_group`, `rev_frm_station`, `rev_frm_othr_station`, `rev_frm_billunit`, `rev_frm_depot`, `rev_to_dept`, `rev_to_desig`, `rev_to_othr_desig`, `rev_to_pay_scale_type`,`rev_to_group`, `rev_to_station`, `rev_to_billunit`, `rev_to_depot`, `rev_carried_out_type`, `rev_carri_wef`, `rev_carri_date_of_incr`, `rev_car_re_accept_ltr_no`, `rev_car_re_accept_ltr_date`, `rev_car_re_wef_date`, `rev_car_re_remark`, `rev_frm_rop`, `rev_to_rop`, `date_time`, `updated_by`, `updated_fields`, `updated_reason`, `updated_date_time`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`,`rev_remark`) VALUES ('$transaction_id','$zone','$division','$pm_pf','$pm_ordertype','$pm_letterno','$pm_letterdate','$pm_wef','$dp_frm_dept','$dp_frm_desig','$dp_frm_otherdesig','$dp_frm_ps_type_3','$dp_frm_scale','$dp_frm_level','$dp_frm_group','$station_id8','$dp_frm_otherstation','$depot_bill_unit6','$depot6','$dp_to_dept','$dp_to_desig','$dp_to_othr_desig','$dp_to_pay_scale_level','$dp_to_grp','$dp_to_place','$depot_bill_unit7','$depot7','$prtf_carried','$prtf_wefdate','$prtf_incrdate','$prtf_acc_ltr_no','$prtf_acc_ltr_date','$prtf_carr_wef_date','$prtf_carr_remark','$dp_frm_rop','$dp_to_rop',Now(),'$updated_by','','','','','','','','','','$count','$rev_remark')");


					$sql1 = mysqli_query($conn,"INSERT INTO `prft_reversion_track`(`temp_transaction_id`,`final_transaction_id`, `zone`, `division`, `rev_pf_no`, `rev_order_type`, `rev_letter_no`, `rev_letter_date`, `rev_wef`, `rev_frm_dept`, `rev_frm_desig`, `rev_frm_othr_desig`, `rev_frm_pay_scale_type`, `rev_frm_scale`, `rev_frm_level`, `rev_frm_group`, `rev_frm_station`, `rev_frm_othr_station`, `rev_frm_billunit`, `rev_frm_depot`, `rev_to_dept`, `rev_to_desig`, `rev_to_othr_desig`, `rev_to_pay_scale_type`,`rev_to_group`, `rev_to_station`, `rev_to_billunit`, `rev_to_depot`, `rev_carried_out_type`, `rev_carri_wef`, `rev_carri_date_of_incr`, `rev_car_re_accept_ltr_no`, `rev_car_re_accept_ltr_date`, `rev_car_re_wef_date`, `rev_car_re_remark`, `rev_frm_rop`, `rev_to_rop`, `date_time`, `updated_by`, `updated_fields`, `updated_reason`, `updated_date_time`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`,`rev_remark`) VALUES ('$transaction_id','$transaction_id','$zone','$division','$pm_pf','$pm_ordertype','$pm_letterno','$pm_letterdate','$pm_wef','$dp_frm_dept','$dp_frm_desig','$dp_frm_otherdesig','$dp_frm_ps_type_3','$dp_frm_scale','$dp_frm_level','$dp_frm_group','$station_id8','$dp_frm_otherstation','$depot_bill_unit6','$depot6','$dp_to_dept','$dp_to_desig','$dp_to_othr_desig','$dp_to_pay_scale_level','$dp_to_grp','$dp_to_place','$depot_bill_unit7','$depot7','$prtf_carried','$prtf_wefdate','$prtf_incrdate','$prtf_acc_ltr_no','$prtf_acc_ltr_date','$prtf_carr_wef_date','$prtf_carr_remark','$dp_frm_rop','$dp_to_rop','Now()','$updated_by','','','','','','','','','','$count','$rev_remark')");

					$action = "Inserted Record in PRFT Reversion Temp and in PRFT Reversion Track";
				} else {

					$sql = mysqli_query($conn,"INSERT INTO `prft_reversion_temp`(`temp_transaction_id`, `zone`, `division`, `rev_pf_no`, `rev_order_type`, `rev_letter_no`, `rev_letter_date`, `rev_wef`, `rev_frm_dept`, `rev_frm_desig`, `rev_frm_othr_desig`, `rev_frm_pay_scale_type`, `rev_frm_scale`, `rev_frm_level`, `rev_frm_group`, `rev_frm_station`, `rev_frm_othr_station`, `rev_frm_billunit`, `rev_frm_depot`, `rev_to_dept`, `rev_to_desig`, `rev_to_othr_desig`, `rev_to_pay_scale_type`,`rev_to_group`, `rev_to_station`, `rev_to_othr_station`, `rev_to_billunit`, `rev_to_depot`, `rev_carried_out_type`, `rev_carri_wef`, `rev_carri_date_of_incr`, `rev_car_re_accept_ltr_no`, `rev_car_re_accept_ltr_date`, `rev_car_re_wef_date`, `rev_car_re_remark`, `rev_frm_rop`, `rev_to_rop`, `date_time`, `updated_by`, `updated_fields`, `updated_reason`, `updated_date_time`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`,`rev_remark`) VALUES ('$transaction_id','$zone','$division','$pm_pf','$pm_ordertype','$pm_letterno','$pm_letterdate','$pm_wef','$re_frm_dept','$re_frm_desig','$re_frm_otherdesig','$re_frm_ps_type_3','$re_frm_scale','$re_frm_level','$re_frm_group','$station_id9','$re_frm_otherstation','$depot_bill_unit9','$depot9','$re_to_dept','$re_to_desig','$re_to_otr_desig','$re_to_pay_scale','$re_to_group','$re_to_place','','$depot_bill_unit8','$depot8','$prtf_carried','$prtf_wefdate','$prtf_incrdate','$prtf_acc_ltr_no','$prtf_acc_ltr_date','$prtf_carr_wef_date','$prtf_carr_remark','$re_frm_rop','$re_to_rop',Now(),'$updated_by','','','','','','','','','','$count','$rev_remark')");

					$sql1 = mysqli_query($conn,"INSERT INTO `prft_reversion_track`(`temp_transaction_id`, `final_transaction_id`,`zone`, `division`, `rev_pf_no`, `rev_order_type`, `rev_letter_no`, `rev_letter_date`, `rev_wef`, `rev_frm_dept`, `rev_frm_desig`, `rev_frm_othr_desig`, `rev_frm_pay_scale_type`, `rev_frm_scale`, `rev_frm_level`, `rev_frm_group`, `rev_frm_station`, `rev_frm_othr_station`, `rev_frm_billunit`, `rev_frm_depot`, `rev_to_dept`, `rev_to_desig`, `rev_to_othr_desig`, `rev_to_pay_scale_type`,`rev_to_group`, `rev_to_station`, `rev_to_othr_station`, `rev_to_billunit`, `rev_to_depot`, `rev_carried_out_type`, `rev_carri_wef`, `rev_carri_date_of_incr`, `rev_car_re_accept_ltr_no`, `rev_car_re_accept_ltr_date`, `rev_car_re_wef_date`, `rev_car_re_remark`, `rev_frm_rop`, `rev_to_rop`, `date_time`, `updated_by`, `updated_fields`, `updated_reason`, `updated_date_time`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`,`rev_remark`)VALUES ('$transaction_id','$transaction_id','$zone','$division','$pm_pf','$pm_ordertype','$pm_letterno','$pm_letterdate','$pm_wef','$re_frm_dept','$re_frm_desig','$re_frm_otherdesig','$re_frm_ps_type_3','$re_frm_scale','$re_frm_level','$re_frm_group','$station_id9','$re_frm_otherstation','$depot_bill_unit9','$depot9','$re_to_dept','$re_to_desig','$re_to_otr_desig','$re_to_pay_scale','$re_to_group','$re_to_place','','$depot_bill_unit8','$depot8','$prtf_carried','$prtf_wefdate','$prtf_incrdate','$prtf_acc_ltr_no','$prtf_acc_ltr_date','$prtf_carr_wef_date','$prtf_carr_remark','$re_frm_rop','$re_to_rop',Now(),'$updated_by','','','','','','','','','','$count','$rev_remark')");

					$action = "Inserted Record in PRFT Reversion Temp and in PRFT Reversion Track";
				}
			}

			if ($sql && $sql1) {
				$action_on = $pm_pf;
				create_log($action, $action_on);

				echo "<script>alert('PRTF Reversion Updated Successfully');window.location='prft_update.php?pf=$pm_pf';</script>";
			} else {
				echo "<script>alert('PRTF not Updated');window.location='prft_update.php?pf=$pm_pf';</script>";
			}
			break;


			//fixation update code

		case 'update_prtf_fixation':

			$zone = '01';
			$division = 'SUR';
			$fix_id = $_POST['fix_id'];

			$pm_pf = $_POST['fx_pf'];
			$pm_ordertype = $_POST['fx_ordertype'];
			$pm_letterno = $_POST['fx_letterno'];
			$pm_letterdate = date('Y-m-d', strtotime($_POST['fx_letterdate']));
			$pm_wef = date('Y-m-d', strtotime($_POST['eff_date']));
			$pm_fx_remark = $_POST['fix_remark'];

			$pm_oldrop = $_POST['fx_rop'];
			$pm_newrop = $_POST['fx_new_rop'];
			$pm_fx_frm_scale = "";
			$pm_fx_frm_level = "";
			$pm_fx_ps_type_e = $_POST['fx_ps_type_e'];
			if ($pm_fx_ps_type_e == 1) {
				$pm_fx_frm_scale = $_POST['fx_frm_scale_text'];
			} else if ($pm_fx_ps_type_e == 2 || $pm_fx_ps_type_e == 3 || $pm_fx_ps_type_e == 4) {
				$pm_fx_frm_scale = $_POST['fx_frm_scale'];
			}
			$pm_fx_frm_level = $_POST['fx_frm_level'];
			$pm_fx_to_scale = "";
			$pm_fx_to_level = "";
			$pm_fx_to_type_p = $_POST['fx_ps_type_p'];
			if ($pm_fx_to_type_p == 1) {
				$pm_fx_to_scale = $_POST['fx_to_scale_text'];
			} else if ($pm_fx_to_type_p == 2 || $pm_fx_to_type_p == 3 || $pm_fx_to_type_p == 4) {
				$pm_fx_to_scale = $_POST['fx_to_scale'];
			}
			$pm_fx_to_level = $_POST['fx_to_level'];
			$prtf_acc_ltr_no = "";
			$prtf_acc_ltr_date = "";
			$prtf_carr_wef_date = "";
			$prtf_carr_remark = "";
			$prtf_wefdate = "";
			$prtf_incrdate = "";
			$count = 0;

			$prtf_carried = $_POST['fx_carried'];

			if ($prtf_carried == "No") {
				$prtf_acc_ltr_no = $_POST['fx_acc_ltr_no'];
				$prtf_acc_ltr_date = date('Y-m-d', strtotime($_POST['fx_acc_ltr_date']));
				$prtf_carr_wef_date = date('Y-m-d', strtotime($_POST['fx_carr_wef_date']));
				$prtf_carr_remark = $_POST['fx_carr_remark'];
			} else {
				$prtf_wefdate = date('Y-m-d', strtotime($_POST['fx_wefdate']));
				$prtf_incrdate = date('Y-m-d', strtotime($_POST['fx_incrdate']));
			}

			date_default_timezone_set('Asia/Kolkata');
			$transaction_id = date('Ymdhis');
			$final_transaction_id = date('Ymdhis');
			session_start();
			$updated_by = $_SESSION['id'];

			if ($fix_id != "") {

				$fetch = mysqli_query($conn,"select * from `prft_fixation_temp` where `fix_pf_no`='$pm_pf' order by id desc LIMIT 1");
				$res = mysqli_num_rows($fetch);
				if ($res > 0) {
					$re = mysqli_fetch_array($fetch);


					if ($re['fix_carri_wef'] == '0000-00-00') {
						$fix_carri_wef = "";
					} else {
						$fix_carri_wef = $re['fix_carri_wef'];
					}
					if ($re['fix_carri_date_of_incr'] == '0000-00-00') {
						$fix_carri_date_of_incr = "";
					} else {
						$fix_carri_date_of_incr = $re['fix_carri_date_of_incr'];
					}
					if ($re['fix_car_re_accept_ltr_date'] == '0000-00-00') {
						$fix_car_re_accept_ltr_date = "";
					} else {
						$fix_car_re_accept_ltr_date = $re['fix_car_re_accept_ltr_date'];
					}
					if ($re['fix_car_re_wef_date'] == '0000-00-00') {
						$fix_car_re_wef_date = "";
					} else {
						$fix_car_re_wef_date = $re['fix_car_re_wef_date'];
					}

					if ($re['fix_pf_no'] == $pm_pf && $re['fix_order_type'] == $pm_ordertype && $re['fix_letter_no'] == $pm_letterno && $re['fix_letter_date'] == $pm_letterdate && $re['fix_wef'] == $pm_wef && $re['fix_remark'] == $pm_fx_remark && $re['fix_frm_rop'] == $pm_oldrop && $re['fix_frm_ps_type'] == $pm_fx_ps_type_e && $re['fix_frm_scale'] == $pm_fx_frm_scale && $re['fix_frm_level'] == $pm_fx_frm_level && $re['fix_to_rop'] == $pm_newrop && $re['fix_to_ps_type'] == $pm_fx_to_type_p && $re['fix_to_scale'] == $pm_fx_to_scale && $re['fx_to_level'] == $pm_fx_to_level && $re['fix_carried_out_type'] == $prtf_carried && $fix_carri_wef == $prtf_wefdate && $fix_carri_date_of_incr == $prtf_incrdate && $re['fix_car_re_accept_ltr_no'] == $prtf_acc_ltr_no && $fix_car_re_accept_ltr_date == $prtf_acc_ltr_date && $fix_car_re_wef_date == $prtf_carr_wef_date && $re['fix_car_re_remark'] == $prtf_carr_remark) {
						echo "<script>alert('Nothing Has Changed');</script>";
					} else {
						/*  echo "<script>alert('In else');</script>";
							
							echo $re['fix_pf_no']."=".$pm_pf."<br>"; 
							echo $re['fix_order_type']."=".$pm_ordertype."<br>"; 
							echo $re['fix_letter_no']."=".$pm_letterno."<br>"; 
							echo $re['fix_letter_date']."=".$pm_letterdate."<br>"; 
							echo $re['fix_wef']."=".$pm_wef."<br>"; 
							echo $re['fix_remark']."=".$pm_fx_remark."<br>"; 
							echo $re['fix_frm_rop']."=".$pm_oldrop."<br>"; 
							echo $re['fix_frm_ps_type']."=".$pm_fx_ps_type_e."<br>"; 
							echo $re['fix_frm_scale']."=".$pm_fx_frm_scale."<br>"; 
							echo $re['fix_frm_level']."=".$pm_fx_frm_level."<br>"; 
							echo $re['fix_to_rop']."=".$pm_newrop."<br>"; 
							echo $re['fix_to_ps_type']."=".$pm_fx_to_type_p."<br>"; 
							echo $re['fix_to_scale']."=".$pm_fx_to_scale."<br>"; 
							echo $re['fx_to_level']."=".$pm_fx_to_level."<br>"; 
							echo $re['fix_carried_out_type']."=".$prtf_carried."<br>"; 
							echo $fix_carri_wef."=".$prtf_wefdate."<br>"; 
							echo $fix_carri_date_of_incr."=".$prtf_incrdate."<br>"; 
							echo $re['fix_car_re_accept_ltr_no']."=".$prtf_acc_ltr_no."<br>"; 
							echo $fix_car_re_accept_ltr_date."=".$prtf_acc_ltr_date."<br>";
							echo $fix_car_re_wef_date."=".$prtf_carr_wef_date."<br>";
							echo $re['fix_car_re_remark']."=".$prtf_carr_remark."<br>"; */

						$f_q = mysqli_query($conn,"select count from `prft_fixation_temp` where id='$fix_id' and `fix_pf_no`='$pm_pf'");
						$resl = mysqli_fetch_array($f_q);
						if ($resl['count'] == "") {
							$count = $count + 1;
						} else {
							$count = $resl['count'];
						}

						$sql2 = mysqli_query($conn,"INSERT INTO `prft_fixaction_track`(`temp_transaction_id`, `final_transaction_id`, `zone`, `division`, `fix_pf_no`, `fix_order_type`, `fix_letter_no`, `fix_letter_date`, `fix_wef`,`fix_remark`,`fix_frm_rop`,`fix_frm_ps_type`, `fix_frm_scale`, `fix_frm_level`,   `fix_to_rop`, `fix_to_ps_type`, `fix_to_scale`, `fx_to_level`, `fix_carried_out_type`, `fix_carri_wef`, `fix_carri_date_of_incr`, `fix_car_re_accept_ltr_no`, `fix_car_re_accept_ltr_date`, `fix_car_re_wef_date`, `fix_car_re_remark`, `date_time`, `updated_by`, `updated_fields`, `updated_reason`, `updated_date_time`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`) VALUES ('$transaction_id','$transaction_id','$zone','$division','$pm_pf','$pm_ordertype','$pm_letterno','$pm_letterdate','$pm_wef','$pm_fx_remark','$pm_oldrop','$pm_fx_ps_type_e','$pm_fx_frm_scale','$pm_fx_frm_level','$pm_newrop','$pm_fx_to_type_p','$pm_fx_to_scale','$pm_fx_to_level','$prtf_carried','$prtf_wefdate','$prtf_incrdate','$prtf_acc_ltr_no','$prtf_acc_ltr_date','$prtf_carr_wef_date','$prtf_carr_remark',Now(),'$updated_by','','','','','','','','','','$count')");

						$action = "Updated Record in PRFT Fixation Temp and Inserted Record in PRFT Fixaction Track";
					}
				}

				$sql1 = mysqli_query($conn,"UPDATE `prft_fixation_temp` SET `temp_transaction_id`='$transaction_id',`zone`='$zone',`division`='$division',`fix_pf_no`='$pm_pf',`fix_order_type`='$pm_ordertype',`fix_letter_no`='$pm_letterno',`fix_letter_date`='$pm_letterdate',`fix_wef`='$pm_wef',`fix_remark`='$pm_fx_remark',`fix_frm_ps_type`='$pm_fx_ps_type_e',`fix_frm_scale`='$pm_fx_frm_scale',`fix_frm_level`='$pm_fx_frm_level',`fix_frm_rop`='$pm_oldrop',`fix_to_ps_type`='$pm_fx_to_type_p',`fix_to_scale`='$pm_fx_to_scale',`fx_to_level`='$pm_fx_to_level',`fix_to_rop`='$pm_newrop',`fix_carried_out_type`='$prtf_carried',`fix_carri_wef`='$prtf_wefdate',`fix_carri_date_of_incr`='$prtf_incrdate',`fix_car_re_accept_ltr_no`='$prtf_acc_ltr_no',`fix_car_re_accept_ltr_date`='$prtf_acc_ltr_date',`fix_car_re_wef_date`='$prtf_carr_wef_date',`fix_car_re_remark`='$prtf_carr_remark',`date_time`=Now(),`updated_by`='$updated_by' WHERE id='$fix_id'");
			} else {

				$f_q = mysqli_query($conn,"select count from `prft_fixation_temp` where `fix_pf_no`='$pm_pf' order by id desc LIMIT 1");
				$resl = mysqli_fetch_array($f_q);
				if ($resl['count'] == "") {
					$count = $count + 1;
				} else {
					$count = $resl['count'] + 1;
				}


				$sql2 = mysqli_query($conn,"INSERT INTO `prft_fixaction_track`(`temp_transaction_id`, `final_transaction_id`, `zone`, `division`, `fix_pf_no`, `fix_order_type`, `fix_letter_no`, `fix_letter_date`, `fix_wef`,`fix_remark`,`fix_frm_rop`,`fix_frm_ps_type`, `fix_frm_scale`, `fix_frm_level`,   `fix_to_rop`, `fix_to_ps_type`, `fix_to_scale`, `fx_to_level`, `fix_carried_out_type`, `fix_carri_wef`, `fix_carri_date_of_incr`, `fix_car_re_accept_ltr_no`, `fix_car_re_accept_ltr_date`, `fix_car_re_wef_date`, `fix_car_re_remark`, `date_time`, `updated_by`, `updated_fields`, `updated_reason`, `updated_date_time`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`) VALUES ('$transaction_id','$transaction_id','$zone','$division','$pm_pf','$pm_ordertype','$pm_letterno','$pm_letterdate','$pm_wef','$pm_fx_remark','$pm_oldrop','$pm_fx_ps_type_e','$pm_fx_frm_scale','$pm_fx_frm_level','$pm_newrop','$pm_fx_to_type_p','$pm_fx_to_scale','$pm_fx_to_level','$prtf_carried','$prtf_wefdate','$prtf_incrdate','$prtf_acc_ltr_no','$prtf_acc_ltr_date','$prtf_carr_wef_date','$prtf_carr_remark',Now(),'$updated_by','','','','','','','','','','$count')");


				$sql1 = mysqli_query($conn,"INSERT INTO `prft_fixation_temp`(`temp_transaction_id`, `zone`, `division`, `fix_pf_no`, `fix_order_type`, `fix_letter_no`, `fix_letter_date`,  `fix_wef`,`fix_remark`,`fix_frm_rop`,`fix_frm_ps_type`, `fix_frm_scale`, `fix_frm_level`,`fix_to_rop`, `fix_to_ps_type`, `fix_to_scale`, `fx_to_level`, `fix_carried_out_type`, `fix_carri_wef`, `fix_carri_date_of_incr`, `fix_car_re_accept_ltr_no`, `fix_car_re_accept_ltr_date`, `fix_car_re_wef_date`, `fix_car_re_remark`, `date_time`, `updated_by`, `updated_fields`, `updated_reason`, `updated_date_time`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`) VALUES ('$transaction_id','$zone','$division','$pm_pf','$pm_ordertype','$pm_letterno','$pm_letterdate','$pm_wef','$pm_fx_remark','$pm_oldrop','$pm_fx_ps_type_e','$pm_fx_frm_scale','$pm_fx_frm_level','$pm_newrop','$pm_fx_to_type_p','$pm_fx_to_scale','$pm_fx_to_level','$prtf_carried','$prtf_wefdate','$prtf_incrdate','$prtf_acc_ltr_no','$prtf_acc_ltr_date','$prtf_carr_wef_date','$prtf_carr_remark',Now(),'$updated_by','','','','','','','','','','$count')");

				$action = "Inserted Record in PRFT Fixation Temp and in PRFT Fixaction Track";
			}

			if ($sql1 && $sql2) {
				$action_on = $pm_pf;
				create_log($action, $action_on);
				echo "<script>alert('PRTF Updated Successfully');window.location='prft_update.php?pf=$pm_pf';</script>";
			} else {
				echo "<script>alert('PRTF Not Updated');window.location='prft_update.php?pf=$pm_pf';</script>";
			}

			break;

			//transaction update code

		case 'update_prtf_transfer':

			$zone = '01';
			$division = 'SUR';
			$tran_id = $_POST['tran_id'];
			$pm_pf = $_POST['tf_pf'];
			$pm_ordertype = $_POST['tf_ordertype'];
			$pm_letterno = $_POST['tf_letterno'];
			$pm_letterdate = date('Y-m-d', strtotime($_POST['tf_letterdate']));
			$pm_wef = date('Y-m-d', strtotime($_POST['bill_unitf']));
			$pm_frm_dept = $_POST['tran_frm_dept'];
			$pm_frm_desig = $_POST['tran_frm_desig'];
			$pm_frm_otherdesig = $_POST['tran_frm_otherdesig'];
			$pm_frm_ps_type_3 = $_POST['tran_frm_ps_type_m'];
			$pm_frm_scale = "";
			$pm_frm_level = "";
			if ($pm_frm_ps_type_3 == 1) {
				$pm_frm_scale = $_POST['tran_frm_scale_text'];
			} else if ($pm_frm_ps_type_3 == 2 || $pm_frm_ps_type_3 == 3 || $pm_frm_ps_type_3 == 4) {
				$pm_frm_scale = $_POST['tran_frm_scale'];
			}
			$pm_frm_level = $_POST['tran_frm_level'];
			$pm_frm_group = $_POST['tran_frm_group'];
			$pm_frm_station = $_POST['station_ide'];
			$pm_frm_otherstation = $_POST['tran_frm_otherstation'];
			$pm_frm_rop = $_POST['tran_frm_rop'];
			$pm_frm_bill_unith = $_POST['depot_bill_unith'];
			$pm_frm_depoth = $_POST['depot_bill_unith'];

			$pm_to_dept = $_POST['tran_to_dept'];
			$pm_to_desig = $_POST['tran_to_desig'];
			$pm_to_otherdesig = $_POST['tran_to_otherdesig'];
			$pm_to_ps_type_3 = $_POST['tran_to_ps_type_n'];
			$pm_to_level = "";
			$pm_to_scale = "";
			if ($pm_to_ps_type_3 == 1) {
				$pm_to_scale = $_POST['tran_to_scale_text'];
			} else if ($pm_to_ps_type_3 == 2 || $pm_to_ps_type_3 == 3 || $pm_to_ps_type_3 == 4) {
				$pm_to_scale = $_POST['tran_to_scale'];
			}

			$pm_to_level = $_POST['tran_to_level'];
			$pm_to_group = $_POST['tran_to_group'];
			$pm_to_station = $_POST['station_idg'];
			$pm_to_otherstation = $_POST['tran_to_otherstation'];
			$pm_to_rop = $_POST['tran_to_rop'];
			$pm_to_bill_unitj = $_POST['depot_bill_unitj'];
			$pm_to_depotj = $_POST['depot_bill_unitj'];
			$prtf_carried = $_POST['prtf_rev_carried'];

			$trans_remark = $_POST['trans_remark'];

			$prtf_acc_ltr_no = "";
			$prtf_acc_ltr_date = "";
			$prtf_carr_wef_date = "";
			$prtf_carr_remark = "";
			$prtf_wefdate = "";
			$prtf_incrdate = "";
			if ($prtf_carried == "No") {
				$prtf_acc_ltr_no = $_POST['prtf_rev_acc_ltr_no'];
				$prtf_acc_ltr_date = date('Y-m-d', strtotime($_POST['prtf_rev_acc_ltr_date']));
				$prtf_carr_wef_date = date('Y-m-d', strtotime($_POST['prtf_rev_carr_wef_date']));
				$prtf_carr_remark = $_POST['prtf_rev_carr_remark'];
				$prtf_wefdate = NULL;
				$prtf_incrdate = NULL;
			} else {
				$prtf_acc_ltr_date = NULL;
				$prtf_carr_wef_date = NULL;
				$prtf_wefdate = date('Y-m-d', strtotime($_POST['prtf_rev_wefdate']));
				$prtf_incrdate = date('Y-m-d', strtotime($_POST['prtf_rev_incrdate']));
			}


			date_default_timezone_set('Asia/Kolkata');
			$transaction_id = date('Ymdhis');
			$final_transaction_id = date('Ymdhis');
			session_start();
			$updated_by = $_SESSION['id'];
			$t_id = $_POST['trans_id'];
			$count = 0;

			$sl = mysqli_query($conn,"select max(id) as max from prft_transfer_temp where trans_pf_no='$pm_pf'");
			$max = mysqli_fetch_array($sl);

			if ($tran_id == "") {
				$fetch = mysqli_query($conn,"select * from `prft_transfer_temp` where trans_pf_no='pm_pf' order by id desc LIMIT 1");
				if ($fetch) {
					$re = mysqli_fetch_array($fetch);

					if ($re['count'] == "") {
						$count = $count + 1;
					} else {
						$count = $re['count'] + 1;
					}
				}

				$sql1 = mysqli_query($conn,"INSERT INTO `prft_transfer_temp`(`temp_transaction_id`, `zone`, `division`, `trans_pf_no`, `trans_order_type`, `trans_letter_no`, `trans_letter_date`, `trans_wef`, `trans_frm_dept`, `trans_frm_desig`, `trans_frm_othr_desig`, `trans_frm_pay_scale_type`, `trans_frm_scale`, `trans_frm_level`, `trans_frm_group`, `trans_frm_station`, `trans_frm_othr_station`, `trans_frm_rop`, `trans_frm_billunit`, `trans_frm_depot`, `trans_to_dept`, `trans_to_desig`, `trans_to_othr_desig`, `trans_to_pay_scale_type`, `trans_to_scale`, `trans_to_level`, `trans_to_group`, `trans_to_station`, `trans_to_othr_station`, `trans_to_rop`, `trans_to_billunit`, `trans_to_depot`, `trans_carried_out_type`, `trans_carri_wef`, `trans_carri_date_of_incr`, `trans_car_re_accept_ltr_no`, `trans_car_re_accept_ltr_date`, `trans_car_re_wef_date`, `trans_car_re_remark`, `date_time`, `updated_by`, `updated_fields`, `updated_reason`, `updated_date_time`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`,`trans_remark`) VALUES ('$transaction_id','$zone','$division','$pm_pf','$pm_ordertype','$pm_letterno','$pm_letterdate','$pm_wef','$pm_frm_dept','$pm_frm_desig','$pm_frm_otherdesig','$pm_frm_ps_type_3','$pm_frm_scale','$pm_frm_level','$pm_frm_group','$pm_frm_station','$pm_frm_otherstation','$pm_frm_rop','$pm_frm_bill_unith','$pm_frm_depoth','$pm_to_dept','$pm_to_desig','$pm_to_otherdesig','$pm_to_ps_type_3','$pm_to_scale','$pm_to_level','$pm_to_group','$pm_to_station','$pm_to_otherstation','$pm_to_rop','$pm_to_bill_unitj','$pm_to_depotj','$prtf_carried','$prtf_wefdate','$prtf_incrdate','$prtf_acc_ltr_no','$prtf_acc_ltr_date','$prtf_carr_wef_date','$prtf_carr_remark',Now(),'$updated_by','','','','','','','','','','$count','$trans_remark')");


				$sql2 = mysqli_query($conn,"INSERT INTO `prft_transfer_track`(`temp_transaction_id`,`final_transaction_id`, `zone`, `division`, `trans_pf_no`, `tran_order_type`, `tran_letter_no`, `tran_letter_date`, `tran_wef`, `tran_frm_dept`, `tran_frm_desig`, `tran_frm_othr_desig`, `tran_frm_pay_scale_type`, `tran_frm_scale`, `tran_frm_level`, `tran_frm_group`, `tran_frm_station`, `tran_frm_othr_station`, `tran_frm_rop`, `tran_frm_billunit`, `tran_frm_depot`, `tran_to_dept`, `tran_to_desig`, `tran_to_othr_desig`, `tran_to_pay_scale_type`, `tran_to_scale`, `tran_to_level`, `tran_to_group`, `tran_to_station`, `tran_to_othr_station`, `tran_to_rop`, `tran_to_billunit`, `tran_to_depot`, `tran_carried_out_type`, `tran_carri_wef`, `tran_carri_date_of_incr`, `tran_car_re_accept_ltr_no`, `tran_car_re_accept_ltr_date`, `tran_car_re_wef_date`, `tran_car_re_remark`, `date_time`, `updated_by`, `updated_fields`, `updated_reason`, `updated_date_time`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`,`trans_remark`) VALUES ('$transaction_id','$transaction_id','$zone','$division','$pm_pf','$pm_ordertype','$pm_letterno','$pm_letterdate','$pm_wef','$pm_frm_dept','$pm_frm_desig','$pm_frm_otherdesig','$pm_frm_ps_type_3','$pm_frm_scale','$pm_frm_level','$pm_frm_group','$pm_frm_station','$pm_frm_otherstation','$pm_frm_rop','$pm_frm_bill_unith','$pm_frm_depoth','$pm_to_dept','$pm_to_desig','$pm_to_otherdesig','$pm_to_ps_type_3', '$pm_to_scale', '$pm_to_level','$pm_to_group', '$pm_to_station', '$pm_to_otherstation', '$pm_to_rop', '$pm_to_bill_unitj', '$pm_to_depotj','$prtf_carried','$prtf_wefdate','$prtf_incrdate','$prtf_acc_ltr_no','$prtf_acc_ltr_date','$prtf_carr_wef_date','$prtf_carr_remark',Now(),'$updated_by','','','','','','','','','','$count','$trans_remark')");

				$action = "Inserted Record in PRFT Transfer Temp and in PRFT Transfer Track";
			} else {
				$conn = dbcon1();
				$fetch = mysqli_query($conn,"select * from `prft_transfer_temp` where trans_pf_no='$pm_pf' and id='$t_id'");

				if ($fetch) {
					$re = mysqli_fetch_array($fetch);

					if ($re['count'] == "") {
						$count = $count + 1;
					} else {
						$count = $re['count'];
					}

					if ($re['trans_carri_wef'] == '0000-00-00') {
						$trans_carri_wef = "";
					} else {
						$trans_carri_wef = $re['trans_carri_wef'];
					}
					if ($re['trans_carri_date_of_incr'] == '0000-00-00') {
						$trans_carri_date_of_incr = "";
					} else {
						$trans_carri_date_of_incr = $re['trans_carri_date_of_incr'];
					}
					if ($re['trans_car_re_accept_ltr_date'] == '0000-00-00') {
						$trans_car_re_accept_ltr_date = "";
					} else {
						$trans_car_re_accept_ltr_date = $re['trans_car_re_accept_ltr_date'];
					}
					if ($re['trans_car_re_wef_date'] == '0000-00-00') {
						$trans_car_re_wef_date = "";
					} else {
						$trans_car_re_wef_date = $re['trans_car_re_wef_date'];
					}

					if ($re['trans_order_type'] == $pm_ordertype && $re['trans_letter_no'] == $pm_letterno && $re['trans_letter_date'] == $pm_letterdate && $re['trans_wef'] == $pm_wef && $re['trans_frm_dept'] == $pm_frm_dept && $re['trans_frm_desig'] == $pm_frm_desig && $re['trans_frm_othr_desig'] == $pm_frm_otherdesig  && $re['trans_frm_pay_scale_type'] == $pm_frm_ps_type_3 && $re['trans_frm_scale'] == $pm_frm_scale && $re['trans_frm_level'] == $pm_frm_level && $re['trans_frm_group'] == $pm_frm_group && $re['trans_frm_station'] == $pm_frm_station && $re['trans_frm_othr_station'] == $pm_frm_otherstation && $re['trans_frm_rop'] == $pm_frm_rop && $re['trans_frm_billunit'] == $pm_frm_bill_unith && $re['trans_frm_depot'] == $pm_frm_depoth && $re['trans_to_dept'] == $pm_to_dept && $re['trans_to_desig'] == $pm_to_desig && $re['trans_to_othr_desig'] == $pm_to_otherdesig && $re['trans_to_pay_scale_type'] == $pm_to_ps_type_3 && $re['trans_to_scale'] == $pm_to_scale && $re['trans_to_level'] == $pm_to_level && $re['trans_to_group'] == $pm_to_group && $re['trans_to_station'] == $pm_to_station && $re['trans_to_othr_station'] == $pm_to_otherstation && $re['trans_to_rop'] == $pm_to_rop && $re['trans_to_billunit'] == $pm_to_bill_unitj && $re['trans_to_depot'] == $pm_to_depotj && $re['trans_carried_out_type'] == $prtf_carried && $trans_carri_wef == $prtf_wefdate && $trans_carri_date_of_incr == $prtf_incrdate && $re['trans_car_re_accept_ltr_no'] == $prtf_acc_ltr_no && $trans_car_re_accept_ltr_date == $prtf_acc_ltr_date && $trans_car_re_wef_date == $prtf_carr_wef_date && $re['trans_car_re_remark'] == $prtf_carr_remark && $re['trans_remark'] == $trans_remark) {

						echo "<script>alert('Nothing Has Changed');</script>";
					} else {
						/* echo $re['trans_order_type']."=".$pm_ordertype."<br>";
							echo $re['trans_letter_no']."=".$pm_letterno."<br>";
							echo $re['trans_letter_date']."=".$pm_letterdate."<br>";
							echo $re['trans_wef']."=".$pm_wef."<br>";
							echo $re['trans_frm_dept']."=".$pm_frm_dept."<br>";
							echo $re['trans_frm_desig']."=".$pm_frm_desig."<br>";
							echo $re['trans_frm_othr_desig']."=".$pm_frm_otherdesig."<br>";
							echo $re['trans_frm_pay_scale_type']."=".$pm_frm_ps_type_3."<br>";
							echo $re['trans_frm_scale']."=".$pm_frm_scale."<br>";
							echo $re['trans_frm_level']."=".$pm_frm_level."<br>";
							echo $re['trans_frm_group']."=".$pm_to_group."<br>";
							echo $re['trans_frm_station']."=".$pm_frm_station."<br>";
							echo $re['trans_frm_othr_station']."=".$pm_frm_otherstation."<br>";
							echo $re['trans_frm_rop']."=".$pm_frm_rop."<br>";
							echo $re['trans_frm_billunit']."=".$pm_frm_bill_unith."<br>";
							echo $re['trans_frm_depot']."=".$pm_frm_depoth."<br>";
							echo $re['trans_to_dept']."=".$pm_to_dept."<br>";
							echo $re['trans_to_desig']."=".$pm_to_desig."<br>";
							echo $re['trans_to_othr_desig']."=".$pm_to_otherdesig."<br>";
							echo $re['trans_to_pay_scale_type']."=".$pm_to_ps_type_3."<br>";
							echo $re['trans_to_scale']."=".$pm_to_scale."<br>";
							echo $re['trans_to_level']."=".$pm_to_level."<br>";
							echo $re['trans_to_group']."=".$pm_to_group."<br>";
							echo $re['trans_to_station']."=".$pm_to_station."<br>";
							echo $re['trans_to_othr_station']."=".$pm_to_otherstation."<br>";
							echo $re['trans_to_rop']."=".$pm_to_rop."<br>";
							echo $re['trans_to_billunit']."=".$pm_to_bill_unitj."<br>"; 
							echo $re['trans_to_depot']."=".$pm_to_depotj."<br>";
							echo $re['trans_carried_out_type']."=".$prtf_carried."<br>";
							echo $trans_carri_wef."=".$prtf_wefdate."<br>";
							echo $trans_carri_date_of_incr."=".$prtf_incrdate."<br>";
							echo $re['trans_car_re_accept_ltr_no']."=".$prtf_acc_ltr_no."<br>";
							echo $trans_car_re_accept_ltr_date."=".$prtf_acc_ltr_date."<br>";
							echo $trans_car_re_wef_date."=".$prtf_carr_wef_date."<br>";
							echo $re['trans_car_re_remark']."=".$prtf_carr_remark."<br>";  */

						//echo "<script>alert('In Else');</script>";


						$sql2 = mysqli_query($conn,"INSERT INTO `prft_transfer_track`(`temp_transaction_id`,`final_transaction_id`, `zone`, `division`, `trans_pf_no`, `tran_order_type`, `tran_letter_no`, `tran_letter_date`, `tran_wef`, `tran_frm_dept`, `tran_frm_desig`, `tran_frm_othr_desig`, `tran_frm_pay_scale_type`, `tran_frm_scale`, `tran_frm_level`, `tran_frm_group`, `tran_frm_station`, `tran_frm_othr_station`, `tran_frm_rop`, `tran_frm_billunit`, `tran_frm_depot`, `tran_to_dept`, `tran_to_desig`, `tran_to_othr_desig`, `tran_to_pay_scale_type`, `tran_to_scale`, `tran_to_level`, `tran_to_group`, `tran_to_station`, `tran_to_othr_station`, `tran_to_rop`, `tran_to_billunit`, `tran_to_depot`, `tran_carried_out_type`, `tran_carri_wef`, `tran_carri_date_of_incr`, `tran_car_re_accept_ltr_no`, `tran_car_re_accept_ltr_date`, `tran_car_re_wef_date`, `tran_car_re_remark`, `date_time`, `updated_by`, `updated_fields`, `updated_reason`, `updated_date_time`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`,`count`,`trans_remark`) VALUES ('$transaction_id','$transaction_id','$zone','$division','$pm_pf','$pm_ordertype','$pm_letterno','$pm_letterdate','$pm_wef','$pm_frm_dept','$pm_frm_desig','$pm_frm_otherdesig','$pm_frm_ps_type_3','$pm_frm_scale','$pm_frm_level','$pm_frm_group','$pm_frm_station','$pm_frm_otherstation','$pm_frm_rop','$pm_frm_bill_unith','$pm_frm_depoth','$pm_to_dept','$pm_to_desig','$pm_to_otherdesig','$pm_to_ps_type_3','$pm_to_scale','$pm_to_level','$pm_to_group','$pm_to_station','$pm_to_otherstation','$pm_to_rop','$pm_to_bill_unitj','$pm_to_depotj','$prtf_carried','$prtf_wefdate','$prtf_incrdate','$prtf_acc_ltr_no','$prtf_acc_ltr_date','$prtf_carr_wef_date','$prtf_carr_remark',Now(),'$updated_by','','','','','','','','','','$count','$trans_remark')");

						$action = "Updated Record in PRFT Transfer Temp and Inserted Record in PRFT Transfer Track";
					}
				}

				$sql1 = mysqli_query($conn,"UPDATE `prft_transfer_temp` SET `temp_transaction_id`='$transaction_id',`zone`='$zone',`division`='$division',`trans_pf_no`='$pm_pf',`trans_order_type`='$pm_ordertype',`trans_letter_no`='$pm_letterno',`trans_letter_date`='$pm_letterdate',`trans_wef`='$pm_wef',`trans_frm_dept`='$pm_frm_dept',`trans_frm_desig`='$pm_frm_desig',`trans_frm_othr_desig`='$pm_frm_otherdesig',`trans_frm_pay_scale_type`='$pm_frm_ps_type_3',`trans_frm_scale`='$pm_frm_scale',`trans_frm_level`='$pm_frm_level',`trans_frm_group`='$pm_frm_group',`trans_frm_station`='$pm_frm_station',`trans_frm_othr_station`='$pm_frm_otherstation',`trans_frm_rop`='$pm_frm_rop',`trans_frm_billunit`='$pm_frm_bill_unith',`trans_frm_depot`='$pm_frm_depoth',`trans_to_dept`='$pm_to_dept',`trans_to_desig`='$pm_to_desig',`trans_to_othr_desig`='$pm_to_otherdesig',`trans_to_pay_scale_type`='$pm_to_ps_type_3',`trans_to_scale`='$pm_to_scale',`trans_to_level`='$pm_to_level',`trans_to_group`='$pm_to_group',`trans_to_station`='$pm_to_station',`trans_to_othr_station`='$pm_to_otherstation',`trans_to_rop`='$pm_to_rop',`trans_to_billunit`='$pm_to_bill_unitj',`trans_to_depot`='$pm_to_depotj',`trans_carried_out_type`='$prtf_carried',`trans_carri_wef`='$prtf_wefdate',`trans_carri_date_of_incr`='$prtf_incrdate',`trans_car_re_accept_ltr_no`='$prtf_acc_ltr_no',`trans_car_re_accept_ltr_date`='$prtf_acc_ltr_date',`trans_car_re_wef_date`='$prtf_carr_wef_date',`trans_car_re_remark`='$prtf_carr_remark',`date_time`=Now(),`updated_by`=$updated_by,`trans_remark`='$trans_remark' WHERE id='$tran_id'");
			}

			if ($sql1 && $sql2) {
				$action_on = $pm_pf;
				create_log($action, $action_on);

				echo "<script>alert('PRTF Updated Successfully');window.location='prft_update.php?pf=$pm_pf';</script>";
			} else {
				echo "<script>alert('PRTF Not Updated');window.location='prft_update.php?pf=$pm_pf';</script>";
			}

			break;


		case 'revise_penalty':
			$id = $_POST['hidden_penalty_row_id'];
			$rev_ltr_no = $_POST['rev_pen_ltr_no'];
			$rev_ltr_date = $_POST['rev_pen_ltr_date'];
			$from_date = $_POST['rev_pen_from_date'];
			$to_date = $_POST['rev_pen_to_date'];
			$remark = $_POST['revise_remark'];
			$status = 1;
			$conn = dbcon1();
			$sql = mysqli_query($conn,"update penalty_temp set revised_letter_no='$rev_ltr_no',revised_letter_date='$rev_ltr_date',revised_from_Date='$from_date',revised_to_date='$to_date',revised_remark='$remark',status='$status' where id='$id'");

			echo "update penalty_temp set revised_letter_no='$rev_ltr_no',revised_letter_date='$rev_ltr_date',revised_from_Date='$from_date',revised_to_date='$to_date',revised_remark='$remark' where id='$id'" . mysqli_error($conn);
			if ($sql) {
				//	echo "<script>alert('Penalty Revised Successfully');window.location='penalty_update.php'</script>";
			} else {
				//	echo "<script>alert('Penalty Can not Revised');window.location='penalty_update.php'</script>";
			}
			break;
	}
}
