<?php
include_once("../../dbconfig/dbcon.php");
/**
 * @param 
 * @description 
 */
function save_sf1_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf, $sf1_effect_form)
{
    global $db_edar;
    $current_user = $_SESSION["id"];
    $current_date = date("Y-m-d H:i:s");
    $check_query = "SELECT * FROM `tbl_form_details` WHERE `form_id`='$selected_form' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    $rst_check_query = mysql_query($check_query, $db_edar);
    if (mysql_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysql_fetch_assoc($rst_check_query);
        $check_id = $rw_check_query["id"];
        $query = "UPDATE `tbl_form_details` SET `form_id`='$selected_form',`form_no`='$form_no',`railway_board`='$rail_board',`place_of_issue`='$place_of_issue',`form_dated`='$form_dated',`effect_from`='$sf1_effect_form',`created_at`='$current_date',`created_by`='$current_user' WHERE id='$check_id' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    } else {
        $query = "INSERT INTO `tbl_form_details`(`form_id`, `form_reference_id`,`form_no`, `railway_board`, `place_of_issue`, `form_dated`, `emp_id`, `effect_from`,`created_at`, `created_by`) VALUES ('$selected_form','$emp_form_ref','$form_no','$rail_board','$place_of_issue','$form_dated','$emp_pf','$sf1_effect_form','$current_date','$current_user')";
    }
    if (mysql_query($query, $db_edar)) {
        return true;
    }
    // echo $query;
}
function save_sf2_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf, $sf2_custody_on, $sf2_date_of_detention)
{
    global $db_edar;
    $current_user = $_SESSION["id"];
    $current_date = date("Y-m-d H:i:s");
    $check_query = "SELECT * FROM `tbl_form_details` WHERE `form_id`='$selected_form' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    $rst_check_query = mysql_query($check_query, $db_edar);
    if (mysql_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysql_fetch_assoc($rst_check_query);
        $check_id = $rw_check_query["id"];
        $query = "UPDATE `tbl_form_details` SET `form_id`='$selected_form',`form_no`='$form_no',`railway_board`='$rail_board',`place_of_issue`='$place_of_issue',`form_dated`='$form_dated',`custody_on`='$sf2_custody_on',`date_of_detention`='$sf2_date_of_detention',`created_at`='$current_date',`created_by`='$current_user' WHERE id='$check_id' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    } else {
        $query = "INSERT INTO `tbl_form_details`(`form_id`, `form_reference_id`,`form_no`, `railway_board`, `place_of_issue`, `form_dated`, `emp_id`, `custody_on`,`date_of_detention`,`created_at`, `created_by`) VALUES ('$selected_form','$emp_form_ref','$form_no','$rail_board','$place_of_issue','$form_dated','$emp_pf','$sf2_custody_on','$sf2_date_of_detention','$current_date','$current_user')";
    }
    if (mysql_query($query, $db_edar)) {
        return true;
    }
    // echo $query;
}

function save_sf3_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf, $sf3_holding_post)
{
    global $db_edar;
    $current_user = $_SESSION["id"];
    $current_date = date("Y-m-d H:i:s");
    $check_query = "SELECT * FROM `tbl_form_details` WHERE `form_id`='$selected_form' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    $rst_check_query = mysql_query($check_query, $db_edar);
    if (mysql_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysql_fetch_assoc($rst_check_query);
        $check_id = $rw_check_query["id"];
        $query = "UPDATE `tbl_form_details` SET `form_id`='$selected_form',`form_no`='$form_no',`railway_board`='$rail_board',`place_of_issue`='$place_of_issue',`form_dated`='$form_dated',`holding_post`='$sf3_holding_post',`created_at`='$current_date',`created_by`='$current_user' WHERE id='$check_id' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    } else {
        $query = "INSERT INTO `tbl_form_details`(`form_id`, `form_reference_id`,`form_no`, `railway_board`, `place_of_issue`, `form_dated`, `emp_id`, `holding_post`,`created_at`, `created_by`) VALUES ('$selected_form','$emp_form_ref','$form_no','$rail_board','$place_of_issue','$form_dated','$emp_pf','$sf3_holding_post','$current_date','$current_user')";
    }
    if (mysql_query($query, $db_edar)) {
        return true;
    }
    // echo $query;
}
function save_sf4_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf, $sf4_made_by, $sf4_made_on, $sf4_effect_from)
{
    global $db_edar;
    $current_user = $_SESSION["id"];
    $current_date = date("Y-m-d H:i:s");
    $check_query = "SELECT * FROM `tbl_form_details` WHERE `form_id`='$selected_form' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    $rst_check_query = mysql_query($check_query, $db_edar);
    if (mysql_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysql_fetch_assoc($rst_check_query);
        $check_id = $rw_check_query["id"];
        $query = "UPDATE `tbl_form_details` SET `form_id`='$selected_form',`form_no`='$form_no',`railway_board`='$rail_board',`place_of_issue`='$place_of_issue',`form_dated`='$form_dated',`made_by`='$sf4_made_by',`made_on`='$sf4_made_on',`effect_from`='$sf4_effect_from',`created_at`='$current_date',`created_by`='$current_user' WHERE id='$check_id' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    } else {
        $query = "INSERT INTO `tbl_form_details`(`form_id`, `form_reference_id`,`form_no`, `railway_board`, `place_of_issue`, `form_dated`, `emp_id`, `made_by`,`made_on`,`effect_from`,`created_at`, `created_by`) VALUES ('$selected_form','$emp_form_ref','$form_no','$rail_board','$place_of_issue','$form_dated','$emp_pf','$sf4_made_by','$sf4_made_on','$sf4_effect_from','$current_date','$current_user')";
    }
    if (mysql_query($query, $db_edar)) {
        return true;
    }
    // echo $query;
}
function save_sf5_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf, $sf5_contact, $sf5_gm_pf, $sf5_amount)
{
    global $db_edar;
    $current_user = $_SESSION["id"];
    $current_date = date("Y-m-d H:i:s");
    $check_query = "SELECT * FROM `tbl_form_details` WHERE `form_id`='$selected_form' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    $rst_check_query = mysql_query($check_query, $db_edar);
    if (mysql_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysql_fetch_assoc($rst_check_query);
        $check_id = $rw_check_query["id"];
        $query = "UPDATE `tbl_form_details` SET `form_id`='$selected_form',`form_no`='$form_no',`railway_board`='$rail_board',`place_of_issue`='$place_of_issue',`form_dated`='$form_dated',`contact`='$sf5_contact',`euro_currency`='$sf5_amount',`GM_pf`='$sf5_gm_pf',`created_at`='$current_date',`created_by`='$current_user' WHERE id='$check_id' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    } else {
        $query = "INSERT INTO `tbl_form_details`(`form_id`, `form_reference_id`,`form_no`, `railway_board`, `place_of_issue`, `form_dated`, `emp_id`, `contact`,`euro_currency`,`GM_pf`,`created_at`, `created_by`) VALUES ('$selected_form','$emp_form_ref','$form_no','$rail_board','$place_of_issue','$form_dated','$emp_pf','$sf5_contact','$sf5_amount','$sf5_gm_pf','$current_date','$current_user')";
    }
    if (mysql_query($query, $db_edar)) {
        return true;
    }
}

function save_sf6_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf, $sf6_memo_dated, $sf6_subject, $sf6_memo_no, $sf6_desc_rec_array, $sf6_reason_array)
{
    global $db_edar;
    $current_user = $_SESSION["id"];
    $current_date = date("Y-m-d H:i:s");
    $check_query = "SELECT * FROM `tbl_form_details` WHERE `form_id`='$selected_form' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    $rst_check_query = mysql_query($check_query, $db_edar);
    $sf6_desc_rec_array_final = explode(",", $sf6_desc_rec_array);
    $sf6_desc_recds_reasons_final = explode(",", $sf6_reason_array);
    $sf6_desc_recds_reasons = array();
    foreach ($sf6_desc_rec_array_final as $key => $value) {
        array_push($sf6_desc_recds_reasons, array("desc" => $sf6_desc_rec_array_final[$key], "reason" => $sf6_desc_recds_reasons_final[$key]));
    }
    // print_r($sf6_desc_recds_reasons);
    $sf6_desc_recds_reasons_json = json_encode($sf6_desc_recds_reasons);
    if (mysql_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysql_fetch_assoc($rst_check_query);
        $check_id = $rw_check_query["id"];
        $query = "UPDATE `tbl_form_details` SET `form_id`='$selected_form',`form_no`='$form_no',`railway_board`='$rail_board',`place_of_issue`='$place_of_issue',`form_dated`='$form_dated',`sf6_subject`='$sf6_subject',`sf6_memo_no`='$sf6_memo_no',`sf6_memo_dated`='$sf6_memo_dated',`sf6_desc_recds_reasons`='$sf6_desc_recds_reasons_json',`created_at`='$current_date',`created_by`='$current_user' WHERE id='$check_id' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    } else {
        $query = "INSERT INTO `tbl_form_details`(`form_id`, `form_reference_id`,`form_no`, `railway_board`, `place_of_issue`, `form_dated`, `emp_id`, `sf6_subject`,`sf6_memo_no`,`sf6_memo_dated`,`sf6_desc_recds_reasons`,`created_at`, `created_by`) VALUES ('$selected_form','$emp_form_ref','$form_no','$rail_board','$place_of_issue','$form_dated','$emp_pf','$sf6_subject','$sf6_memo_no','$sf6_memo_dated','$sf6_desc_recds_reasons_json','$current_date','$current_user')";
    }
    // echo mysql_error();
    if (mysql_query($query, $db_edar)) {
        return true;
    }
}

function save_sf7_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf, $sf7_inquiry_officer_pf, $sf7_mem_pfs)
{
    global $db_edar;
    $current_user = $_SESSION["id"];
    $current_date = date("Y-m-d H:i:s");
    $check_query = "SELECT * FROM `tbl_form_details` WHERE `form_id`='$selected_form' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    $rst_check_query = mysql_query($check_query, $db_edar);
    if (mysql_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysql_fetch_assoc($rst_check_query);
        $check_id = $rw_check_query["id"];
        $query = "UPDATE `tbl_form_details` SET `form_id`='$selected_form',`form_no`='$form_no',`railway_board`='$rail_board',`place_of_issue`='$place_of_issue',`form_dated`='$form_dated',`inquiry_o_pf`='$sf7_inquiry_officer_pf',`sf7_board_members_details`='$sf7_mem_pfs',`created_at`='$current_date',`created_by`='$current_user' WHERE id='$check_id' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    } else {
        $query = "INSERT INTO `tbl_form_details`(`form_id`, `form_reference_id`,`form_no`, `railway_board`, `place_of_issue`, `form_dated`, `emp_id`, `inquiry_o_pf`,`sf7_board_members_details`,`created_at`, `created_by`) VALUES ('$selected_form','$emp_form_ref','$form_no','$rail_board','$place_of_issue','$form_dated','$emp_pf','$sf7_inquiry_officer_pf','$sf7_mem_pfs','$current_date','$current_user')";
    }
    if (mysql_query($query, $db_edar)) {
        return true;
    }
    // echo $query;
}
function save_sf8_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf, $sf8_inquiry_officer_pf, $sf8_presenting_officer_pf)
{
    global $db_edar;
    $current_user = $_SESSION["id"];
    $current_date = date("Y-m-d H:i:s");
    $check_query = "SELECT * FROM `tbl_form_details` WHERE `form_id`='$selected_form' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    $rst_check_query = mysql_query($check_query, $db_edar);
    if (mysql_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysql_fetch_assoc($rst_check_query);
        $check_id = $rw_check_query["id"];
        $query = "UPDATE `tbl_form_details` SET `form_id`='$selected_form',`form_no`='$form_no',`railway_board`='$rail_board',`place_of_issue`='$place_of_issue',`form_dated`='$form_dated',`inquiry_o_pf`='$sf8_inquiry_officer_pf',`presenting_officer_pf`='$sf8_presenting_officer_pf',`created_at`='$current_date',`created_by`='$current_user' WHERE id='$check_id' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    } else {
        $query = "INSERT INTO `tbl_form_details`(`form_id`, `form_reference_id`,`form_no`, `railway_board`, `place_of_issue`, `form_dated`, `emp_id`, `inquiry_o_pf`,`presenting_officer_pf`,`created_at`, `created_by`) VALUES ('$selected_form','$emp_form_ref','$form_no','$rail_board','$place_of_issue','$form_dated','$emp_pf','$sf8_inquiry_officer_pf','$sf8_presenting_officer_pf','$current_date','$current_user')";
    }
    if (mysql_query($query, $db_edar)) {
        return true;
    }
    // echo $query;
}
function save_sf10_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf, $sf10_emp_pfs)
{
    global $db_edar;
    $current_user = $_SESSION["id"];
    $current_date = date("Y-m-d H:i:s");
    $check_query = "SELECT * FROM `tbl_form_details` WHERE `form_id`='$selected_form' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    $rst_check_query = mysql_query($check_query, $db_edar);
    if (mysql_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysql_fetch_assoc($rst_check_query);
        $check_id = $rw_check_query["id"];
        $query = "UPDATE `tbl_form_details` SET `form_id`='$selected_form',`form_no`='$form_no',`railway_board`='$rail_board',`place_of_issue`='$place_of_issue',`form_dated`='$form_dated',`sf10_emp_pf`='$sf10_emp_pfs',`created_at`='$current_date',`created_by`='$current_user' WHERE id='$check_id' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    } else {
        $query = "INSERT INTO `tbl_form_details`(`form_id`, `form_reference_id`,`form_no`, `railway_board`, `place_of_issue`, `form_dated`, `emp_id`, `sf10_emp_pf`,`created_at`, `created_by`) VALUES ('$selected_form','$emp_form_ref','$form_no','$rail_board','$place_of_issue','$form_dated','$emp_pf','$sf10_emp_pfs','$current_date','$current_user')";
    }
    if (mysql_query($query, $db_edar)) {
        return true;
    }
    // echo $query;
}
function save_sf10a_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf, $sf10a_order_no, $sf10a_order_dated, $sf10a_appting_auth, $sf10a_io)
{
    global $db_edar;
    $current_user = $_SESSION["id"];
    $current_date = date("Y-m-d H:i:s");
    $check_query = "SELECT * FROM `tbl_form_details` WHERE `form_id`='$selected_form' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    $rst_check_query = mysql_query($check_query, $db_edar);
    if (mysql_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysql_fetch_assoc($rst_check_query);
        $check_id = $rw_check_query["id"];
        $query = "UPDATE `tbl_form_details` SET `form_id`='$selected_form',`form_no`='$form_no',`railway_board`='$rail_board',`place_of_issue`='$place_of_issue',`form_dated`='$form_dated',`inquiry_o_pf`='$sf10a_io',`sf10aorb_order_no`='$sf10a_order_no',`sf10aorb_dated`='$sf10a_order_dated',`sf10aorb_appoinitng_DA`='$sf10a_appting_auth',`created_at`='$current_date',`created_by`='$current_user' WHERE id='$check_id' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    } else {
        $query = "INSERT INTO `tbl_form_details`(`form_id`, `form_reference_id`,`form_no`, `railway_board`, `place_of_issue`, `form_dated`, `emp_id`, `inquiry_o_pf`,`sf10aorb_order_no`,`sf10aorb_dated`,`sf10aorb_appoinitng_DA`,`created_at`, `created_by`) VALUES ('$selected_form','$emp_form_ref','$form_no','$rail_board','$place_of_issue','$form_dated','$emp_pf','$sf10a_io','$sf10a_order_no','$sf10a_order_dated','$sf10a_appting_auth','$current_date','$current_user')";
    }
    if (mysql_query($query, $db_edar)) {
        return true;
    }
    // echo $query;
}
function save_sf10b_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf, $sf10b_order_no, $sf10b_order_dated, $sf10b_appting_auth, $sf10b_po)
{
    global $db_edar;
    $current_user = $_SESSION["id"];
    $current_date = date("Y-m-d H:i:s");
    $check_query = "SELECT * FROM `tbl_form_details` WHERE `form_id`='$selected_form' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    $rst_check_query = mysql_query($check_query, $db_edar);
    if (mysql_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysql_fetch_assoc($rst_check_query);
        $check_id = $rw_check_query["id"];
        $query = "UPDATE `tbl_form_details` SET `form_id`='$selected_form',`form_no`='$form_no',`railway_board`='$rail_board',`place_of_issue`='$place_of_issue',`form_dated`='$form_dated',`sf10aorb_order_no`='$sf10b_order_no',`sf10aorb_dated`='$sf10b_order_dated',`sf10aorb_appoinitng_DA`='$sf10b_appting_auth',`presenting_officer_pf`='$sf10b_po',`created_at`='$current_date',`created_by`='$current_user' WHERE id='$check_id' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    } else {
        $query = "INSERT INTO `tbl_form_details`(`form_id`, `form_reference_id`,`form_no`, `railway_board`, `place_of_issue`, `form_dated`, `emp_id`, `sf10aorb_order_no`,`sf10aorb_dated`,`sf10aorb_appoinitng_DA`,`presenting_officer_pf`,`created_at`, `created_by`) VALUES ('$selected_form','$emp_form_ref','$form_no','$rail_board','$place_of_issue','$form_dated','$emp_pf','$sf10b_order_no','$sf10b_order_dated','$sf10b_appting_auth','$sf10b_po','$current_date','$current_user')";
    }
    if (mysql_query($query, $db_edar)) {
        return true;
    }
    // echo $query;
}
function save_sf11_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf)
{
    global $db_edar;
    $current_user = $_SESSION["id"];
    $current_date = date("Y-m-d H:i:s");
    $check_query = "SELECT * FROM `tbl_form_details` WHERE `form_id`='$selected_form' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    $rst_check_query = mysql_query($check_query, $db_edar);
    if (mysql_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysql_fetch_assoc($rst_check_query);
        $check_id = $rw_check_query["id"];
        $query = "UPDATE `tbl_form_details` SET `form_id`='$selected_form',`form_no`='$form_no',`railway_board`='$rail_board',`place_of_issue`='$place_of_issue',`form_dated`='$form_dated',`created_at`='$current_date',`created_by`='$current_user' WHERE id='$check_id' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    } else {
        $query = "INSERT INTO `tbl_form_details`(`form_id`, `form_reference_id`,`form_no`, `railway_board`, `place_of_issue`, `form_dated`, `emp_id`, `created_at`, `created_by`) VALUES ('$selected_form','$emp_form_ref','$form_no','$rail_board','$place_of_issue','$form_dated','$emp_pf','$current_date','$current_user')";
    }
    if (mysql_query($query, $db_edar)) {
        return true;
    }
    // echo $query;
}
function save_sf11b_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf, $sf11b_mem_no, $sf11b_mem_dated1, $sf11b_subject, $sf11b_io, $sf11b_contact, $sf11b_gm_pf)
{
    global $db_edar;
    $current_user = $_SESSION["id"];
    $current_date = date("Y-m-d H:i:s");
    $check_query = "SELECT * FROM `tbl_form_details` WHERE `form_id`='$selected_form' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    $rst_check_query = mysql_query($check_query, $db_edar);
    if (mysql_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysql_fetch_assoc($rst_check_query);
        $check_id = $rw_check_query["id"];
        $query = "UPDATE `tbl_form_details` SET `form_id`='$selected_form',`form_no`='$form_no',`railway_board`='$rail_board',`place_of_issue`='$place_of_issue',`form_dated`='$form_dated',`sf6_memo_no`='$sf11b_mem_no',`sf6_memo_dated`='$sf11b_mem_dated1',`sf11b_subject`='$sf11b_subject',`inquiry_o_pf`='$sf11b_io',`contact`='$sf11b_contact',`GM_pf`='$sf11b_gm_pf',`created_at`='$current_date',`created_by`='$current_user' WHERE id='$check_id' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    } else {
        $query = "INSERT INTO `tbl_form_details`(`form_id`, `form_reference_id`,`form_no`, `railway_board`, `place_of_issue`, `form_dated`, `emp_id`,`sf6_memo_no`,`sf6_memo_dated`,`sf11b_subject`,`inquiry_o_pf`,`contact`,`GM_pf`, `created_at`, `created_by`) VALUES ('$selected_form','$emp_form_ref','$form_no','$rail_board','$place_of_issue','$form_dated','$emp_pf','$sf11b_mem_no','$sf11b_mem_dated1','$sf11b_subject','$sf11b_io','$sf11b_contact','$sf11b_gm_pf','$current_date','$current_user')";
    }
    if (mysql_query($query, $db_edar)) {
        return true;
    }
    // echo $query;
}
function save_sf11c_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf, $sf11c_mem_no, $sf11c_mem_dated1, $sf11c_on1, $sf11c_gm_pf)
{
    global $db_edar;
    $current_user = $_SESSION["id"];
    $current_date = date("Y-m-d H:i:s");
    $check_query = "SELECT * FROM `tbl_form_details` WHERE `form_id`='$selected_form' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    $rst_check_query = mysql_query($check_query, $db_edar);
    if (mysql_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysql_fetch_assoc($rst_check_query);
        $check_id = $rw_check_query["id"];
        $query = "UPDATE `tbl_form_details` SET `form_id`='$selected_form',`form_no`='$form_no',`railway_board`='$rail_board',`place_of_issue`='$place_of_issue',`form_dated`='$form_dated',`sf6_memo_no`='$sf11c_mem_no',`sf6_memo_dated`='$sf11c_mem_dated1',`GM_pf`='$sf11c_gm_pf',`made_on`='$sf11c_on1',`created_at`='$current_date',`created_by`='$current_user' WHERE id='$check_id' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    } else {
        $query = "INSERT INTO `tbl_form_details`(`form_id`, `form_reference_id`,`form_no`, `railway_board`, `place_of_issue`, `form_dated`, `emp_id`,`sf6_memo_no`,`sf6_memo_dated`,`GM_pf`, `made_on`,`created_at`, `created_by`) VALUES ('$selected_form','$emp_form_ref','$form_no','$rail_board','$place_of_issue','$form_dated','$emp_pf','$sf11c_mem_no','$sf11c_mem_dated1','$sf11c_gm_pf','$sf11c_on1','$current_date','$current_user')";
    }
    if (mysql_query($query, $db_edar)) {
        return true;
    }
    // echo $query;
}

/**@desc get updated form data*/
function update_frm_sf1($tbl_form_details_id, $form_id, $emp_id, $ref_id)
{
    global $db_edar;
    $data = '';
    $check_query = "SELECT *,tbl_master_form.form_type,tbl_master_form.form_title FROM `tbl_form_details`,tbl_master_form WHERE tbl_master_form.id=tbl_form_details.form_id and  `form_id`='$form_id' and `form_reference_id`='$ref_id' and `emp_id`='$emp_id'";
    $rst_check_query = mysql_query($check_query, $db_edar);
    if (mysql_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysql_fetch_assoc($rst_check_query);

        $data['form_title'] = $rw_check_query['form_title'];
        $data['form_type'] = getPenalyType($rw_check_query['form_type']);

        $data['form_no'] = $rw_check_query['form_no'];
        $data['railway_board'] = $rw_check_query['railway_board'];
        $data['place_of_issue'] = $rw_check_query['place_of_issue'];
        $data['form_dated'] = $rw_check_query['form_dated'];

        $data['effect_from'] = $rw_check_query['effect_from'];
    } else {
        $data['failed'] = "No Record Found...";
    }

    echo json_encode($data);
}
function update_frm_sf2($tbl_form_details_id, $form_id, $emp_id, $ref_id)
{
    global $db_edar;
    $data = '';
    $check_query = "SELECT *,tbl_master_form.form_type,tbl_master_form.form_title FROM `tbl_form_details`,tbl_master_form WHERE tbl_master_form.id=tbl_form_details.form_id and  `form_id`='$form_id' and `form_reference_id`='$ref_id' and `emp_id`='$emp_id'";
    $rst_check_query = mysql_query($check_query, $db_edar);
    if (mysql_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysql_fetch_assoc($rst_check_query);

        $data['form_title'] = $rw_check_query['form_title'];
        $data['form_type'] = getPenalyType($rw_check_query['form_type']);

        $data['form_no'] = $rw_check_query['form_no'];
        $data['railway_board'] = $rw_check_query['railway_board'];
        $data['place_of_issue'] = $rw_check_query['place_of_issue'];
        $data['form_dated'] = $rw_check_query['form_dated'];

        $data['custody_on'] = $rw_check_query['custody_on'];
        $data['date_of_detention'] = $rw_check_query['date_of_detention'];
    } else {
        $data['failed'] = "No Record Found...";
    }

    echo json_encode($data);
}
function update_frm_sf3($tbl_form_details_id, $form_id, $emp_id, $ref_id)
{
    global $db_edar;
    $data = '';
    $check_query = "SELECT *,tbl_master_form.form_type,tbl_master_form.form_title FROM `tbl_form_details`,tbl_master_form WHERE tbl_master_form.id=tbl_form_details.form_id and  `form_id`='$form_id' and `form_reference_id`='$ref_id' and `emp_id`='$emp_id'";
    $rst_check_query = mysql_query($check_query, $db_edar);
    if (mysql_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysql_fetch_assoc($rst_check_query);

        $data['form_title'] = $rw_check_query['form_title'];
        $data['form_type'] = getPenalyType($rw_check_query['form_type']);

        $data['form_no'] = $rw_check_query['form_no'];
        $data['railway_board'] = $rw_check_query['railway_board'];
        $data['place_of_issue'] = $rw_check_query['place_of_issue'];
        $data['form_dated'] = $rw_check_query['form_dated'];

        $data['holding_post'] = $rw_check_query['holding_post'];
    } else {
        $data['failed'] = "No Record Found...";
    }

    echo json_encode($data);
}
function update_frm_sf4($tbl_form_details_id, $form_id, $emp_id, $ref_id)
{
    global $db_edar;
    $data = '';
    $check_query = "SELECT *,tbl_master_form.form_type,tbl_master_form.form_title FROM `tbl_form_details`,tbl_master_form WHERE tbl_master_form.id=tbl_form_details.form_id and  `form_id`='$form_id' and `form_reference_id`='$ref_id' and `emp_id`='$emp_id'";
    $rst_check_query = mysql_query($check_query, $db_edar);
    if (mysql_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysql_fetch_assoc($rst_check_query);

        $data['form_title'] = $rw_check_query['form_title'];
        $data['form_type'] = getPenalyType($rw_check_query['form_type']);

        $data['form_no'] = $rw_check_query['form_no'];
        $data['railway_board'] = $rw_check_query['railway_board'];
        $data['place_of_issue'] = $rw_check_query['place_of_issue'];
        $data['form_dated'] = $rw_check_query['form_dated'];

        $data['made_by'] = $rw_check_query['made_by'];
        $data['made_on'] = $rw_check_query['made_on'];
        $data['effect_from'] = $rw_check_query['effect_from'];
    } else {
        $data['failed'] = "No Record Found...";
    }

    echo json_encode($data);
}
function update_frm_sf5($tbl_form_details_id, $form_id, $emp_id, $ref_id)
{
    global $db_edar;
    $data = '';
    $check_query = "SELECT *,tbl_master_form.form_type,tbl_master_form.form_title FROM `tbl_form_details`,tbl_master_form WHERE tbl_master_form.id=tbl_form_details.form_id and  `form_id`='$form_id' and `form_reference_id`='$ref_id' and `emp_id`='$emp_id'";
    $rst_check_query = mysql_query($check_query, $db_edar);
    if (mysql_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysql_fetch_assoc($rst_check_query);

        $data['form_title'] = $rw_check_query['form_title'];
        $data['form_type'] = getPenalyType($rw_check_query['form_type']);

        $data['form_no'] = $rw_check_query['form_no'];
        $data['railway_board'] = $rw_check_query['railway_board'];
        $data['place_of_issue'] = $rw_check_query['place_of_issue'];
        $data['form_dated'] = $rw_check_query['form_dated'];

        $data['contact'] = $rw_check_query['contact'];
        $data['euro_currency'] = $rw_check_query['euro_currency'];
        $data['GM_pf'] = $rw_check_query['GM_pf'];
    } else {
        $data['failed'] = "No Record Found...";
    }

    echo json_encode($data);
}
function update_frm_sf6($tbl_form_details_id, $form_id, $emp_id, $ref_id)
{
    global $db_edar;
    $data = '';
    $check_query = "SELECT *,tbl_master_form.form_type,tbl_master_form.form_title FROM `tbl_form_details`,tbl_master_form WHERE tbl_master_form.id=tbl_form_details.form_id and  `form_id`='$form_id' and `form_reference_id`='$ref_id' and `emp_id`='$emp_id'";
    $rst_check_query = mysql_query($check_query, $db_edar);
    if (mysql_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysql_fetch_assoc($rst_check_query);

        $data['form_title'] = $rw_check_query['form_title'];
        $data['form_type'] = getPenalyType($rw_check_query['form_type']);

        $data['form_no'] = $rw_check_query['form_no'];
        $data['railway_board'] = $rw_check_query['railway_board'];
        $data['place_of_issue'] = $rw_check_query['place_of_issue'];
        $data['form_dated'] = $rw_check_query['form_dated'];

        $data['sf6_subject'] = $rw_check_query['sf6_subject'];
        $data['sf6_memo_no'] = $rw_check_query['sf6_memo_no'];
        $data['sf6_memo_dated'] = $rw_check_query['sf6_memo_dated'];

        $desc = json_decode($rw_check_query['sf6_desc_recds_reasons']);
        $data['desc'] = $desc;
    } else {
        $data['failed'] = "No Record Found...";
    }

    echo json_encode($data);
}
function update_frm_sf7($tbl_form_details_id, $form_id, $emp_id, $ref_id)
{
    global $db_edar;
    $data = '';
    $check_query = "SELECT *,tbl_master_form.form_type,tbl_master_form.form_title FROM `tbl_form_details`,tbl_master_form WHERE tbl_master_form.id=tbl_form_details.form_id and  `form_id`='$form_id' and `form_reference_id`='$ref_id' and `emp_id`='$emp_id'";
    $rst_check_query = mysql_query($check_query, $db_edar);
    if (mysql_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysql_fetch_assoc($rst_check_query);

        $data['form_title'] = $rw_check_query['form_title'];
        $data['form_type'] = getPenalyType($rw_check_query['form_type']);

        $data['form_no'] = $rw_check_query['form_no'];
        $data['railway_board'] = $rw_check_query['railway_board'];
        $data['place_of_issue'] = $rw_check_query['place_of_issue'];
        $data['form_dated'] = $rw_check_query['form_dated'];

        $data['sf7_board_members_details'] = $rw_check_query['sf7_board_members_details'];
        $data['inquiry_o_pf'] = $rw_check_query['inquiry_o_pf'];
    } else {
        $data['failed'] = "No Record Found...";
    }

    echo json_encode($data);
}
function update_frm_sf8($tbl_form_details_id, $form_id, $emp_id, $ref_id)
{
    global $db_edar;
    $data = '';
    $check_query = "SELECT *,tbl_master_form.form_type,tbl_master_form.form_title FROM `tbl_form_details`,tbl_master_form WHERE tbl_master_form.id=tbl_form_details.form_id and  `form_id`='$form_id' and `form_reference_id`='$ref_id' and `emp_id`='$emp_id'";
    $rst_check_query = mysql_query($check_query, $db_edar);
    if (mysql_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysql_fetch_assoc($rst_check_query);

        $data['form_title'] = $rw_check_query['form_title'];
        $data['form_type'] = getPenalyType($rw_check_query['form_type']);

        $data['form_no'] = $rw_check_query['form_no'];
        $data['railway_board'] = $rw_check_query['railway_board'];
        $data['place_of_issue'] = $rw_check_query['place_of_issue'];
        $data['form_dated'] = $rw_check_query['form_dated'];

        $data['presenting_officer_pf'] = $rw_check_query['presenting_officer_pf'];
        $data['inquiry_o_pf'] = $rw_check_query['inquiry_o_pf'];
    } else {
        $data['failed'] = "No Record Found...";
    }

    echo json_encode($data);
}
function update_frm_sf10($tbl_form_details_id, $form_id, $emp_id, $ref_id)
{
    global $db_edar;
    $data = '';
    $check_query = "SELECT *,tbl_master_form.form_type,tbl_master_form.form_title FROM `tbl_form_details`,tbl_master_form WHERE tbl_master_form.id=tbl_form_details.form_id and  `form_id`='$form_id' and `form_reference_id`='$ref_id' and `emp_id`='$emp_id'";
    $rst_check_query = mysql_query($check_query, $db_edar);
    if (mysql_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysql_fetch_assoc($rst_check_query);

        $data['form_title'] = $rw_check_query['form_title'];
        $data['form_type'] = getPenalyType($rw_check_query['form_type']);

        $data['form_no'] = $rw_check_query['form_no'];
        $data['railway_board'] = $rw_check_query['railway_board'];
        $data['place_of_issue'] = $rw_check_query['place_of_issue'];
        $data['form_dated'] = $rw_check_query['form_dated'];

        $data['sf10_emp_pf'] = $rw_check_query['sf10_emp_pf'];
    } else {
        $data['failed'] = "No Record Found...";
    }

    echo json_encode($data);
}
function update_frm_sf10a($tbl_form_details_id, $form_id, $emp_id, $ref_id)
{
    global $db_edar;
    $data = '';
    $check_query = "SELECT *,tbl_master_form.form_type,tbl_master_form.form_title FROM `tbl_form_details`,tbl_master_form WHERE tbl_master_form.id=tbl_form_details.form_id and  `form_id`='$form_id' and `form_reference_id`='$ref_id' and `emp_id`='$emp_id'";
    $rst_check_query = mysql_query($check_query, $db_edar);
    if (mysql_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysql_fetch_assoc($rst_check_query);

        $data['form_title'] = $rw_check_query['form_title'];
        $data['form_type'] = getPenalyType($rw_check_query['form_type']);

        $data['form_no'] = $rw_check_query['form_no'];
        $data['railway_board'] = $rw_check_query['railway_board'];
        $data['place_of_issue'] = $rw_check_query['place_of_issue'];
        $data['form_dated'] = $rw_check_query['form_dated'];

        $data['inquiry_o_pf'] = $rw_check_query['inquiry_o_pf'];
        $data['sf10aorb_order_no'] = $rw_check_query['sf10aorb_order_no'];
        $data['sf10aorb_dated'] = $rw_check_query['sf10aorb_dated'];
        $data['sf10aorb_appoinitng_DA'] = $rw_check_query['sf10aorb_appoinitng_DA'];
    } else {
        $data['failed'] = "No Record Found...";
    }

    echo json_encode($data);
}
function update_frm_sf10b($tbl_form_details_id, $form_id, $emp_id, $ref_id)
{
    global $db_edar;
    $data = '';
    $check_query = "SELECT *,tbl_master_form.form_type,tbl_master_form.form_title FROM `tbl_form_details`,tbl_master_form WHERE tbl_master_form.id=tbl_form_details.form_id and  `form_id`='$form_id' and `form_reference_id`='$ref_id' and `emp_id`='$emp_id'";
    $rst_check_query = mysql_query($check_query, $db_edar);
    if (mysql_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysql_fetch_assoc($rst_check_query);

        $data['form_title'] = $rw_check_query['form_title'];
        $data['form_type'] = getPenalyType($rw_check_query['form_type']);

        $data['form_no'] = $rw_check_query['form_no'];
        $data['railway_board'] = $rw_check_query['railway_board'];
        $data['place_of_issue'] = $rw_check_query['place_of_issue'];
        $data['form_dated'] = $rw_check_query['form_dated'];

        $data['presenting_officer_pf'] = $rw_check_query['presenting_officer_pf'];
        $data['sf10aorb_order_no'] = $rw_check_query['sf10aorb_order_no'];
        $data['sf10aorb_dated'] = $rw_check_query['sf10aorb_dated'];
        $data['sf10aorb_appoinitng_DA'] = $rw_check_query['sf10aorb_appoinitng_DA'];
    } else {
        $data['failed'] = "No Record Found...";
    }

    echo json_encode($data);
}
function update_frm_sf11($tbl_form_details_id, $form_id, $emp_id, $ref_id)
{
    global $db_edar;
    $data = '';
    $check_query = "SELECT *,tbl_master_form.form_type,tbl_master_form.form_title FROM `tbl_form_details`,tbl_master_form WHERE tbl_master_form.id=tbl_form_details.form_id and  `form_id`='$form_id' and `form_reference_id`='$ref_id' and `emp_id`='$emp_id'";
    $rst_check_query = mysql_query($check_query, $db_edar);
    if (mysql_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysql_fetch_assoc($rst_check_query);

        $data['form_title'] = $rw_check_query['form_title'];
        $data['form_type'] = getPenalyType($rw_check_query['form_type']);

        $data['form_no'] = $rw_check_query['form_no'];
        $data['railway_board'] = $rw_check_query['railway_board'];
        $data['place_of_issue'] = $rw_check_query['place_of_issue'];
        $data['form_dated'] = $rw_check_query['form_dated'];
    } else {
        $data['failed'] = "No Record Found...";
    }

    echo json_encode($data);
}
function update_frm_sf11b($tbl_form_details_id, $form_id, $emp_id, $ref_id)
{
    global $db_edar;
    $data = '';
    $check_query = "SELECT *,tbl_master_form.form_type,tbl_master_form.form_title FROM `tbl_form_details`,tbl_master_form WHERE tbl_master_form.id=tbl_form_details.form_id and  `form_id`='$form_id' and `form_reference_id`='$ref_id' and `emp_id`='$emp_id'";
    $rst_check_query = mysql_query($check_query, $db_edar);
    if (mysql_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysql_fetch_assoc($rst_check_query);
        $data['form_no'] = $rw_check_query['form_no'];
        $data['railway_board'] = $rw_check_query['railway_board'];
        $data['place_of_issue'] = $rw_check_query['place_of_issue'];
        $data['form_dated'] = $rw_check_query['form_dated'];
        $data['sf6_memo_no'] = $rw_check_query['sf6_memo_no'];
        $data['sf6_memo_dated'] = $rw_check_query['sf6_memo_dated'];
        $data['contact'] = $rw_check_query['contact'];
        $data['GM_pf'] = $rw_check_query['GM_pf'];
        $data['sf11b_subject'] = $rw_check_query['sf11b_subject'];
        $data['inquiry_o_pf'] = $rw_check_query['inquiry_o_pf'];
        $data['form_title'] = $rw_check_query['form_title'];
        $data['form_type'] = getPenalyType($rw_check_query['form_type']);
    } else {
        $data['failed'] = "No Record Found...";
    }

    echo json_encode($data);
}
function update_frm_sf11c($tbl_form_details_id, $form_id, $emp_id, $ref_id)
{
    global $db_edar;
    $data = '';
    $check_query = "SELECT *,tbl_master_form.form_type,tbl_master_form.form_title FROM `tbl_form_details`,tbl_master_form WHERE tbl_master_form.id=tbl_form_details.form_id and  `form_id`='$form_id' and `form_reference_id`='$ref_id' and `emp_id`='$emp_id'";
    $rst_check_query = mysql_query($check_query, $db_edar);
    if (mysql_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysql_fetch_assoc($rst_check_query);

        $data['form_title'] = $rw_check_query['form_title'];
        $data['form_type'] = getPenalyType($rw_check_query['form_type']);
        $data['form_no'] = $rw_check_query['form_no'];
        $data['railway_board'] = $rw_check_query['railway_board'];
        $data['place_of_issue'] = $rw_check_query['place_of_issue'];
        $data['form_dated'] = $rw_check_query['form_dated'];
        $data['sf6_memo_no'] = $rw_check_query['sf6_memo_no'];
        $data['sf6_memo_dated'] = $rw_check_query['sf6_memo_dated'];
        $data['made_on'] = $rw_check_query['made_on'];
        $data['GM_pf'] = $rw_check_query['GM_pf'];
    } else {
        $data['failed'] = "No Record Found...";
    }

    echo json_encode($data);
}
function reject_form($emp_pf, $rejected_reason, $current_status)
{
    global $db_edar;
    $current_date = date("Y-m-d H:i:s");
    $emp_form_ref = get_emp_ref($emp_pf);
    $form_ids = get_emp_forms($emp_pf, $emp_form_ref);
    $clerk_id = get_clerk_id($emp_pf, $emp_form_ref);
    $current_date = date("Y-m-d H:i:s");
    $current_role = $_SESSION['role'];
    $current_user = $_SESSION["id"];
    $sql = "INSERT INTO `tbl_form_forward`(`form_reference_id`, `emp_pf`, `form_id`, `fw_from`, `fw_to`, `fw_date`, `status`,  `current_role`, `rejected_reason`) VALUES ('$emp_form_ref','$emp_pf','$form_ids','$current_user','$clerk_id','$current_date','$current_status','$current_role','$rejected_reason')";
    if (mysql_query($sql, $db_edar)) {
        if (update_master_entry_status($current_status, $emp_pf, $emp_form_ref)) {
            return true;
        }
    }
    return false;
}
function accept_form($emp_pf, $current_status)
{
    global $db_edar;
    $current_date = date("Y-m-d H:i:s");
    $emp_form_ref = get_emp_ref($emp_pf);
    $form_ids = get_emp_forms($emp_pf, $emp_form_ref);
    $clerk_id = get_clerk_id($emp_pf, $emp_form_ref);
    $current_date = date("Y-m-d H:i:s");
    $current_role = $_SESSION['role'];
    $current_user = $_SESSION["id"];
    $sql_clerk = "INSERT INTO `tbl_form_forward`(`form_reference_id`, `emp_pf`, `form_id`, `fw_from`, `fw_to`, `fw_date`, `status`,  `current_role`,`approved_date`) VALUES ('$emp_form_ref','$emp_pf','$form_ids','$current_user','$clerk_id','$current_date','$current_status','$current_role','$current_date')";
    $sql_emp = "INSERT INTO `tbl_form_forward`(`form_reference_id`, `emp_pf`, `form_id`, `fw_from`, `fw_to`, `fw_date`, `status`,  `current_role`,`approved_date`) VALUES ('$emp_form_ref','$emp_pf','$form_ids','$current_user','$emp_pf','$current_date','$current_status','$current_role','$current_date')";
    if (mysql_query($sql_clerk, $db_edar) && mysql_query($sql_emp, $db_edar)) {
        if (update_master_entry_status($current_status, $emp_pf, $emp_form_ref)) {
            return true;
        }
    }
    return false;
}
function close_form($emp_pf, $current_status)
{
    global $db_edar;
    $current_date = date("Y-m-d H:i:s");
    $emp_form_ref = get_emp_ref($emp_pf);
    $form_ids = get_emp_forms($emp_pf, $emp_form_ref);
    $current_date = date("Y-m-d H:i:s");
    $current_role = $_SESSION['role'];
    $current_user = $_SESSION["id"];
    $sql_emp = "INSERT INTO `tbl_form_forward`(`form_reference_id`, `emp_pf`, `form_id`, `fw_from`, `fw_to`, `fw_date`, `status`,  `current_role`,`approved_date`) VALUES ('$emp_form_ref','$emp_pf','$form_ids','$current_user','$emp_pf','$current_date','$current_status','$current_role','$current_date')";
    if (mysql_query($sql_emp, $db_edar)) {
        if (update_master_entry_status_close($current_status, $emp_pf, $emp_form_ref)) {
            return true;
        }
    }
    return false;
}