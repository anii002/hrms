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
    $rst_check_query = mysqli_query( $db_edar,$check_query);
    if (mysqli_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysqli_fetch_assoc($rst_check_query);
        $check_id = $rw_check_query["id"];
        $query = "UPDATE `tbl_form_details` SET `form_id`='$selected_form',`form_no`='$form_no',`railway_board`='$rail_board',`place_of_issue`='$place_of_issue',`form_dated`='$form_dated',`effect_from`='$sf1_effect_form',`created_at`='$current_date',`created_by`='$current_user' WHERE id='$check_id' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    } else {
        $query = "INSERT INTO `tbl_form_details`(`form_id`, `form_reference_id`,`form_no`, `railway_board`, `place_of_issue`, `form_dated`, `emp_id`, `effect_from`,`created_at`, `created_by`) VALUES ('$selected_form','$emp_form_ref','$form_no','$rail_board','$place_of_issue','$form_dated','$emp_pf','$sf1_effect_form','$current_date','$current_user')";
    }
    if (mysqli_query( $db_edar,$query)) {
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
    $rst_check_query = mysqli_query( $db_edar,$check_query);
    if (mysqli_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysqli_fetch_assoc($rst_check_query);
        $check_id = $rw_check_query["id"];
        $query = "UPDATE `tbl_form_details` SET `form_id`='$selected_form',`form_no`='$form_no',`railway_board`='$rail_board',`place_of_issue`='$place_of_issue',`form_dated`='$form_dated',`custody_on`='$sf2_custody_on',`date_of_detention`='$sf2_date_of_detention',`created_at`='$current_date',`created_by`='$current_user' WHERE id='$check_id' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    } else {
        $query = "INSERT INTO `tbl_form_details`(`form_id`, `form_reference_id`,`form_no`, `railway_board`, `place_of_issue`, `form_dated`, `emp_id`, `custody_on`,`date_of_detention`,`created_at`, `created_by`) VALUES ('$selected_form','$emp_form_ref','$form_no','$rail_board','$place_of_issue','$form_dated','$emp_pf','$sf2_custody_on','$sf2_date_of_detention','$current_date','$current_user')";
    }
    if (mysqli_query( $db_edar,$query)) {
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
    $rst_check_query = mysqli_query( $db_edar,$check_query);
    if (mysqli_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysqli_fetch_assoc($rst_check_query);
        $check_id = $rw_check_query["id"];
        $query = "UPDATE `tbl_form_details` SET `form_id`='$selected_form',`form_no`='$form_no',`railway_board`='$rail_board',`place_of_issue`='$place_of_issue',`form_dated`='$form_dated',`holding_post`='$sf3_holding_post',`created_at`='$current_date',`created_by`='$current_user' WHERE id='$check_id' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    } else {
        $query = "INSERT INTO `tbl_form_details`(`form_id`, `form_reference_id`,`form_no`, `railway_board`, `place_of_issue`, `form_dated`, `emp_id`, `holding_post`,`created_at`, `created_by`) VALUES ('$selected_form','$emp_form_ref','$form_no','$rail_board','$place_of_issue','$form_dated','$emp_pf','$sf3_holding_post','$current_date','$current_user')";
    }
    if (mysqli_query( $db_edar,$query)) {
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
    $rst_check_query = mysqli_query( $db_edar,$check_query);
    if (mysqli_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysqli_fetch_assoc($rst_check_query);
        $check_id = $rw_check_query["id"];
        $query = "UPDATE `tbl_form_details` SET `form_id`='$selected_form',`form_no`='$form_no',`railway_board`='$rail_board',`place_of_issue`='$place_of_issue',`form_dated`='$form_dated',`made_by`='$sf4_made_by',`made_on`='$sf4_made_on',`effect_from`='$sf4_effect_from',`created_at`='$current_date',`created_by`='$current_user' WHERE id='$check_id' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    } else {
        $query = "INSERT INTO `tbl_form_details`(`form_id`, `form_reference_id`,`form_no`, `railway_board`, `place_of_issue`, `form_dated`, `emp_id`, `made_by`,`made_on`,`effect_from`,`created_at`, `created_by`) VALUES ('$selected_form','$emp_form_ref','$form_no','$rail_board','$place_of_issue','$form_dated','$emp_pf','$sf4_made_by','$sf4_made_on','$sf4_effect_from','$current_date','$current_user')";
    }
    if (mysqli_query( $db_edar,$query)) {
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
    $rst_check_query = mysqli_query( $db_edar,$check_query);
    if (mysqli_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysqli_fetch_assoc($rst_check_query);
        $check_id = $rw_check_query["id"];
        $query = "UPDATE `tbl_form_details` SET `form_id`='$selected_form',`form_no`='$form_no',`railway_board`='$rail_board',`place_of_issue`='$place_of_issue',`form_dated`='$form_dated',`contact`='$sf5_contact',`euro_currency`='$sf5_amount',`GM_pf`='$sf5_gm_pf',`created_at`='$current_date',`created_by`='$current_user' WHERE id='$check_id' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    } else {
        $query = "INSERT INTO `tbl_form_details`(`form_id`, `form_reference_id`,`form_no`, `railway_board`, `place_of_issue`, `form_dated`, `emp_id`, `contact`,`euro_currency`,`GM_pf`,`created_at`, `created_by`) VALUES ('$selected_form','$emp_form_ref','$form_no','$rail_board','$place_of_issue','$form_dated','$emp_pf','$sf5_contact','$sf5_amount','$sf5_gm_pf','$current_date','$current_user')";
    }
    if (mysqli_query( $db_edar,$query)) {
        return true;
    }
}

function save_sf6_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf, $sf6_memo_dated, $sf6_subject, $sf6_memo_no, $sf6_desc_rec_array, $sf6_reason_array)
{
    global $db_edar;
    $current_user = $_SESSION["id"];
    $current_date = date("Y-m-d H:i:s");
    $check_query = "SELECT * FROM `tbl_form_details` WHERE `form_id`='$selected_form' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    $rst_check_query = mysqli_query( $db_edar,$check_query);
    $sf6_desc_rec_array_final = explode(",", $sf6_desc_rec_array);
    $sf6_desc_recds_reasons_final = explode(",", $sf6_reason_array);
    $sf6_desc_recds_reasons = array();
    foreach ($sf6_desc_rec_array_final as $key => $value) {
        array_push($sf6_desc_recds_reasons, array("desc" => $sf6_desc_rec_array_final[$key], "reason" => $sf6_desc_recds_reasons_final[$key]));
    }
    // print_r($sf6_desc_recds_reasons);
    $sf6_desc_recds_reasons_json = json_encode($sf6_desc_recds_reasons);
    if (mysqli_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysqli_fetch_assoc($rst_check_query);
        $check_id = $rw_check_query["id"];
        $query = "UPDATE `tbl_form_details` SET `form_id`='$selected_form',`form_no`='$form_no',`railway_board`='$rail_board',`place_of_issue`='$place_of_issue',`form_dated`='$form_dated',`sf6_subject`='$sf6_subject',`sf6_memo_no`='$sf6_memo_no',`sf6_memo_dated`='$sf6_memo_dated',`sf6_desc_recds_reasons`='$sf6_desc_recds_reasons_json',`created_at`='$current_date',`created_by`='$current_user' WHERE id='$check_id' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    } else {
        $query = "INSERT INTO `tbl_form_details`(`form_id`, `form_reference_id`,`form_no`, `railway_board`, `place_of_issue`, `form_dated`, `emp_id`, `sf6_subject`,`sf6_memo_no`,`sf6_memo_dated`,`sf6_desc_recds_reasons`,`created_at`, `created_by`) VALUES ('$selected_form','$emp_form_ref','$form_no','$rail_board','$place_of_issue','$form_dated','$emp_pf','$sf6_subject','$sf6_memo_no','$sf6_memo_dated','$sf6_desc_recds_reasons_json','$current_date','$current_user')";
    }
    // echo mysqli_error();
    if (mysqli_query( $db_edar,$query)) {
        return true;
    }
}

function save_sf7_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf, $sf7_inquiry_officer_pf, $sf7_mem_pfs)
{
    global $db_edar;
    $current_user = $_SESSION["id"];
    $current_date = date("Y-m-d H:i:s");
    $check_query = "SELECT * FROM `tbl_form_details` WHERE `form_id`='$selected_form' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    $rst_check_query = mysqli_query( $db_edar,$check_query);
    if (mysqli_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysqli_fetch_assoc($rst_check_query);
        $check_id = $rw_check_query["id"];
        $query = "UPDATE `tbl_form_details` SET `form_id`='$selected_form',`form_no`='$form_no',`railway_board`='$rail_board',`place_of_issue`='$place_of_issue',`form_dated`='$form_dated',`inquiry_o_pf`='$sf7_inquiry_officer_pf',`sf7_board_members_details`='$sf7_mem_pfs',`created_at`='$current_date',`created_by`='$current_user' WHERE id='$check_id' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    } else {
        $query = "INSERT INTO `tbl_form_details`(`form_id`, `form_reference_id`,`form_no`, `railway_board`, `place_of_issue`, `form_dated`, `emp_id`, `inquiry_o_pf`,`sf7_board_members_details`,`created_at`, `created_by`) VALUES ('$selected_form','$emp_form_ref','$form_no','$rail_board','$place_of_issue','$form_dated','$emp_pf','$sf7_inquiry_officer_pf','$sf7_mem_pfs','$current_date','$current_user')";
    }
    if (mysqli_query( $db_edar,$query)) {
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
    $rst_check_query = mysqli_query( $db_edar,$check_query);
    if (mysqli_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysqli_fetch_assoc($rst_check_query);
        $check_id = $rw_check_query["id"];
        $query = "UPDATE `tbl_form_details` SET `form_id`='$selected_form',`form_no`='$form_no',`railway_board`='$rail_board',`place_of_issue`='$place_of_issue',`form_dated`='$form_dated',`inquiry_o_pf`='$sf8_inquiry_officer_pf',`presenting_officer_pf`='$sf8_presenting_officer_pf',`created_at`='$current_date',`created_by`='$current_user' WHERE id='$check_id' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    } else {
        $query = "INSERT INTO `tbl_form_details`(`form_id`, `form_reference_id`,`form_no`, `railway_board`, `place_of_issue`, `form_dated`, `emp_id`, `inquiry_o_pf`,`presenting_officer_pf`,`created_at`, `created_by`) VALUES ('$selected_form','$emp_form_ref','$form_no','$rail_board','$place_of_issue','$form_dated','$emp_pf','$sf8_inquiry_officer_pf','$sf8_presenting_officer_pf','$current_date','$current_user')";
    }
    if (mysqli_query( $db_edar,$query)) {
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
    $rst_check_query = mysqli_query( $db_edar,$check_query);
    if (mysqli_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysqli_fetch_assoc($rst_check_query);
        $check_id = $rw_check_query["id"];
        $query = "UPDATE `tbl_form_details` SET `form_id`='$selected_form',`form_no`='$form_no',`railway_board`='$rail_board',`place_of_issue`='$place_of_issue',`form_dated`='$form_dated',`sf10_emp_pf`='$sf10_emp_pfs',`created_at`='$current_date',`created_by`='$current_user' WHERE id='$check_id' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    } else {
        $query = "INSERT INTO `tbl_form_details`(`form_id`, `form_reference_id`,`form_no`, `railway_board`, `place_of_issue`, `form_dated`, `emp_id`, `sf10_emp_pf`,`created_at`, `created_by`) VALUES ('$selected_form','$emp_form_ref','$form_no','$rail_board','$place_of_issue','$form_dated','$emp_pf','$sf10_emp_pfs','$current_date','$current_user')";
    }
    if (mysqli_query( $db_edar,$query)) {
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
    $rst_check_query = mysqli_query( $db_edar,$check_query);
    if (mysqli_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysqli_fetch_assoc($rst_check_query);
        $check_id = $rw_check_query["id"];
        $query = "UPDATE `tbl_form_details` SET `form_id`='$selected_form',`form_no`='$form_no',`railway_board`='$rail_board',`place_of_issue`='$place_of_issue',`form_dated`='$form_dated',`inquiry_o_pf`='$sf10a_io',`sf10aorb_order_no`='$sf10a_order_no',`sf10aorb_dated`='$sf10a_order_dated',`sf10aorb_appoinitng_DA`='$sf10a_appting_auth',`created_at`='$current_date',`created_by`='$current_user' WHERE id='$check_id' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    } else {
        $query = "INSERT INTO `tbl_form_details`(`form_id`, `form_reference_id`,`form_no`, `railway_board`, `place_of_issue`, `form_dated`, `emp_id`, `inquiry_o_pf`,`sf10aorb_order_no`,`sf10aorb_dated`,`sf10aorb_appoinitng_DA`,`created_at`, `created_by`) VALUES ('$selected_form','$emp_form_ref','$form_no','$rail_board','$place_of_issue','$form_dated','$emp_pf','$sf10a_io','$sf10a_order_no','$sf10a_order_dated','$sf10a_appting_auth','$current_date','$current_user')";
    }
    if (mysqli_query( $db_edar,$query)) {
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
    $rst_check_query = mysqli_query( $db_edar,$check_query);
    if (mysqli_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysqli_fetch_assoc($rst_check_query);
        $check_id = $rw_check_query["id"];
        $query = "UPDATE `tbl_form_details` SET `form_id`='$selected_form',`form_no`='$form_no',`railway_board`='$rail_board',`place_of_issue`='$place_of_issue',`form_dated`='$form_dated',`sf10aorb_order_no`='$sf10b_order_no',`sf10aorb_dated`='$sf10b_order_dated',`sf10aorb_appoinitng_DA`='$sf10b_appting_auth',`presenting_officer_pf`='$sf10b_po',`created_at`='$current_date',`created_by`='$current_user' WHERE id='$check_id' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    } else {
        $query = "INSERT INTO `tbl_form_details`(`form_id`, `form_reference_id`,`form_no`, `railway_board`, `place_of_issue`, `form_dated`, `emp_id`, `sf10aorb_order_no`,`sf10aorb_dated`,`sf10aorb_appoinitng_DA`,`presenting_officer_pf`,`created_at`, `created_by`) VALUES ('$selected_form','$emp_form_ref','$form_no','$rail_board','$place_of_issue','$form_dated','$emp_pf','$sf10b_order_no','$sf10b_order_dated','$sf10b_appting_auth','$sf10b_po','$current_date','$current_user')";
    }
    if (mysqli_query( $db_edar,$query)) {
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
    $rst_check_query = mysqli_query( $db_edar,$check_query);
    if (mysqli_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysqli_fetch_assoc($rst_check_query);
        $check_id = $rw_check_query["id"];
        $query = "UPDATE `tbl_form_details` SET `form_id`='$selected_form',`form_no`='$form_no',`railway_board`='$rail_board',`place_of_issue`='$place_of_issue',`form_dated`='$form_dated',`created_at`='$current_date',`created_by`='$current_user' WHERE id='$check_id' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    } else {
        $query = "INSERT INTO `tbl_form_details`(`form_id`, `form_reference_id`,`form_no`, `railway_board`, `place_of_issue`, `form_dated`, `emp_id`, `created_at`, `created_by`) VALUES ('$selected_form','$emp_form_ref','$form_no','$rail_board','$place_of_issue','$form_dated','$emp_pf','$current_date','$current_user')";
    }
    if (mysqli_query( $db_edar,$query)) {
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
    $rst_check_query = mysqli_query( $db_edar,$check_query);
    if (mysqli_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysqli_fetch_assoc($rst_check_query);
        $check_id = $rw_check_query["id"];
        $query = "UPDATE `tbl_form_details` SET `form_id`='$selected_form',`form_no`='$form_no',`railway_board`='$rail_board',`place_of_issue`='$place_of_issue',`form_dated`='$form_dated',`sf6_memo_no`='$sf11b_mem_no',`sf6_memo_dated`='$sf11b_mem_dated1',`sf11b_subject`='$sf11b_subject',`inquiry_o_pf`='$sf11b_io',`contact`='$sf11b_contact',`GM_pf`='$sf11b_gm_pf',`created_at`='$current_date',`created_by`='$current_user' WHERE id='$check_id' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    } else {
        $query = "INSERT INTO `tbl_form_details`(`form_id`, `form_reference_id`,`form_no`, `railway_board`, `place_of_issue`, `form_dated`, `emp_id`,`sf6_memo_no`,`sf6_memo_dated`,`sf11b_subject`,`inquiry_o_pf`,`contact`,`GM_pf`, `created_at`, `created_by`) VALUES ('$selected_form','$emp_form_ref','$form_no','$rail_board','$place_of_issue','$form_dated','$emp_pf','$sf11b_mem_no','$sf11b_mem_dated1','$sf11b_subject','$sf11b_io','$sf11b_contact','$sf11b_gm_pf','$current_date','$current_user')";
    }
    if (mysqli_query( $db_edar,$query)) {
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
    $rst_check_query = mysqli_query( $db_edar,$check_query);
    if (mysqli_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysqli_fetch_assoc($rst_check_query);
        $check_id = $rw_check_query["id"];
        $query = "UPDATE `tbl_form_details` SET `form_id`='$selected_form',`form_no`='$form_no',`railway_board`='$rail_board',`place_of_issue`='$place_of_issue',`form_dated`='$form_dated',`sf6_memo_no`='$sf11c_mem_no',`sf6_memo_dated`='$sf11c_mem_dated1',`GM_pf`='$sf11c_gm_pf',`made_on`='$sf11c_on1',`created_at`='$current_date',`created_by`='$current_user' WHERE id='$check_id' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'";
    } else {
        $query = "INSERT INTO `tbl_form_details`(`form_id`, `form_reference_id`,`form_no`, `railway_board`, `place_of_issue`, `form_dated`, `emp_id`,`sf6_memo_no`,`sf6_memo_dated`,`GM_pf`, `made_on`,`created_at`, `created_by`) VALUES ('$selected_form','$emp_form_ref','$form_no','$rail_board','$place_of_issue','$form_dated','$emp_pf','$sf11c_mem_no','$sf11c_mem_dated1','$sf11c_gm_pf','$sf11c_on1','$current_date','$current_user')";
    }
    if (mysqli_query( $db_edar,$query)) {
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
    $rst_check_query = mysqli_query( $db_edar,$check_query);
    if (mysqli_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysqli_fetch_assoc($rst_check_query);

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
    $rst_check_query = mysqli_query( $db_edar,$check_query);
    if (mysqli_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysqli_fetch_assoc($rst_check_query);

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
    $rst_check_query = mysqli_query( $db_edar,$check_query);
    if (mysqli_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysqli_fetch_assoc($rst_check_query);

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
    $rst_check_query = mysqli_query( $db_edar,$check_query);
    if (mysqli_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysqli_fetch_assoc($rst_check_query);

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
    $rst_check_query = mysqli_query( $db_edar,$check_query);
    if (mysqli_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysqli_fetch_assoc($rst_check_query);

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
    $rst_check_query = mysqli_query( $db_edar,$check_query);
    if (mysqli_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysqli_fetch_assoc($rst_check_query);

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
    $rst_check_query = mysqli_query( $db_edar,$check_query);
    if (mysqli_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysqli_fetch_assoc($rst_check_query);

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
    $rst_check_query = mysqli_query( $db_edar,$check_query);
    if (mysqli_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysqli_fetch_assoc($rst_check_query);

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
    $rst_check_query = mysqli_query( $db_edar,$check_query);
    if (mysqli_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysqli_fetch_assoc($rst_check_query);

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
    $rst_check_query = mysqli_query( $db_edar,$check_query);
    if (mysqli_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysqli_fetch_assoc($rst_check_query);

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
    $rst_check_query = mysqli_query( $db_edar,$check_query);
    if (mysqli_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysqli_fetch_assoc($rst_check_query);

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
    $rst_check_query = mysqli_query( $db_edar,$check_query);
    if (mysqli_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysqli_fetch_assoc($rst_check_query);

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
    $rst_check_query = mysqli_query( $db_edar,$check_query);
    if (mysqli_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysqli_fetch_assoc($rst_check_query);
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
    $rst_check_query = mysqli_query( $db_edar,$check_query);
    if (mysqli_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysqli_fetch_assoc($rst_check_query);

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
    if (mysqli_query( $db_edar,$sql)) {
        if (update_master_entry_status($current_status, $emp_pf, $emp_form_ref)) {
            return true;
        }
    }
    return false;
}
function save_office_note(
    $emp_pf,
    $form_no,
    $penalty_type,
    $rail_board,
    $place_of_issue,
    $form_dated,
    $for_text,
    $memo_one,
    $ack_two,
    $reply_three,
    $apoint_four,
    $enquiry_five,
    $finding_six,
    $defence_seven,
    $eo_eight,
    $rate_nine,
    $grade_ten,
    $guilty_text,
    $db_inc_eleven,
    $db_suspension_from,
    $db_suspension_to,
    $total_days,
    $imposing_penalty,
    $appontingauth,
    $db_memo_even_dated
) {
    global $db_edar;
    $current_date = date("Y-m-d H:i:s");
    $emp_form_ref = get_emp_ref($emp_pf);
    $current_date = date("Y-m-d H:i:s");
    $current_user = $_SESSION["id"];
    $check_query = "SELECT * FROM `tbl_officer_note` WHERE `emp_pf`='$emp_pf' AND `form_reference_id`='$emp_form_ref'";
    $rst_query = mysqli_query( $db_edar,$check_query);
    if (mysqli_num_rows($rst_query) > 0) {
        $sql = "UPDATE `tbl_officer_note` SET `form_no`='$form_no',`railway_board`='$rail_board',`place_of_issue`='$place_of_issue',`form_dated`='$form_dated',`for_details`='$for_text',`penality_type`='$penalty_type',`penalty_memo_1`='$memo_one',`ack_2`='$ack_two',`reply_to_memo_3`='$reply_three',`order_of_ap_4`='$apoint_four',`enquiry_from_5`='$enquiry_five',`findings_of_eo_6`='$finding_six',`defence_7`='$defence_seven',`eo_8`='$eo_eight',`rate_of_pay_9`='$rate_nine',`grade_10`='$grade_ten',`nxt_increment_date`='$db_inc_eleven',`suspension_from`='$db_suspension_from',`suspension_to`='$db_suspension_to',`total_days`='$total_days',`appointing_authority`='$appontingauth',`imposing_penalty`='$imposing_penalty',`memo_even_dated`='$db_memo_even_dated',`guilty`='$guilty_text',`created_date`='$current_date',`created_by`='$current_user' WHERE `emp_pf`='$emp_pf' AND `form_reference_id`='$emp_form_ref'";
    } else {
        $sql = "INSERT INTO `tbl_officer_note`(`emp_pf`, `form_no`,`form_reference_id`, `railway_board`, `place_of_issue`, `form_dated`, `for_details`, `penality_type`, `penalty_memo_1`, `ack_2`, `reply_to_memo_3`, `order_of_ap_4`, `enquiry_from_5`, `findings_of_eo_6`, `defence_7`, `eo_8`, `rate_of_pay_9`, `grade_10`, `nxt_increment_date`, `suspension_from`, `suspension_to`, `total_days`, `appointing_authority`, `imposing_penalty`, `memo_even_dated`, `guilty`, `created_date`, `created_by`) VALUES ('$emp_pf','$form_no','$emp_form_ref','$rail_board','$place_of_issue','$form_dated','$for_text','$penalty_type','$memo_one','$ack_two','$reply_three','$apoint_four','$enquiry_five','$finding_six','$defence_seven','$eo_eight','$rate_nine','$grade_ten','$db_inc_eleven','$db_suspension_from','$db_suspension_to','$total_days','$appontingauth','$imposing_penalty','$db_memo_even_dated','$guilty_text','$current_date','$current_user')";
    }
    if (mysqli_query( $db_edar,$sql)) {
        if (update_master_entry_office_id($emp_pf, $emp_form_ref)) {
            return true;
        }
    }
    return false;
}
function update_master_entry_office_id($emp_pf, $form_ref_id)
{
    global $db_edar;
    $sql_check = "SELECT `id` FROM `tbl_officer_note` WHERE `emp_pf`='$emp_pf' AND `form_reference_id`='$form_ref_id'";
    $rst_check = mysqli_query( $db_edar,$sql_check);
    if (mysqli_num_rows($rst_check) > 0) {
        $rw_check = mysqli_fetch_assoc($rst_check);
        $id = $rw_check["id"];
        $sql = "UPDATE `tbl_form_master_entry` SET `office_note_id`='$id' WHERE `form_ref_id`='$form_ref_id' AND `emp_pf`='$emp_pf'";
        if (mysqli_query( $db_edar,$sql)) {
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
    if (mysqli_query( $db_edar,$sql_clerk) && mysqli_query( $db_edar,$sql_emp)) {
        if (update_master_entry_status($current_status, $emp_pf, $emp_form_ref)) {
            return true;
        }
    }
    return false;
}
function accept_io_form($emp_pf, $current_status)
{
    global $db_edar;
    $current_date = date("Y-m-d H:i:s");
    $emp_form_ref = get_emp_ref($emp_pf);
    $form_ids = get_emp_forms($emp_pf, $emp_form_ref);
    $io_id = get_io_id($emp_pf, $emp_form_ref);
    $current_date = date("Y-m-d H:i:s");
    $current_role = $_SESSION['role'];
    $current_user = $_SESSION["id"];
    $sql_clerk = "INSERT INTO `tbl_form_forward`(`form_reference_id`, `emp_pf`, `form_id`, `fw_from`, `fw_to`, `fw_date`, `status`,  `current_role`,`approved_date`) VALUES ('$emp_form_ref','$emp_pf','$form_ids','$current_user','$io_id','$current_date','$current_status','$current_role','$current_date')";
    if (mysqli_query( $db_edar,$sql_clerk)) {
        if (update_master_entry_status($current_status, $emp_pf, $emp_form_ref)) {
            return true;
        }
    }
    return false;
}
function reject_io_form($emp_pf, $rejected_reason, $current_status)
{
    global $db_edar;
    $current_date = date("Y-m-d H:i:s");
    $emp_form_ref = get_emp_ref($emp_pf);
    $form_ids = get_emp_forms($emp_pf, $emp_form_ref);
    $io_id = get_io_id($emp_pf, $emp_form_ref);
    $current_date = date("Y-m-d H:i:s");
    $current_role = $_SESSION['role'];
    $current_user = $_SESSION["id"];
    $sql = "INSERT INTO `tbl_form_forward`(`form_reference_id`, `emp_pf`, `form_id`, `fw_from`, `fw_to`, `fw_date`, `status`,  `current_role`, `rejected_reason`) VALUES ('$emp_form_ref','$emp_pf','$form_ids','$current_user','$io_id','$current_date','$current_status','$current_role','$rejected_reason')";
    if (mysqli_query( $db_edar,$sql)) {
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
    if (mysqli_query( $db_edar,$sql_emp)) {
        if (update_master_entry_status_close($current_status, $emp_pf, $emp_form_ref)) {
            return true;
        }
    }
    return false;
}

function add_sorder($emp_pf, $emp_form_ref, $type_id, $desc_note)
{
    global $db_edar;
    $form_ids = get_emp_forms($emp_pf, $emp_form_ref);
    $current_user = $_SESSION["id"];
    $current_date = date("Y-m-d H:i:s");
    $push = array();
    $check_query = "SELECT * FROM `tbl_ack_sorder` WHERE `emp_id`='$emp_pf' and `form_reference_id`='$emp_form_ref' and type_name='$type_id' ";
    $rst_check_query = mysqli_query( $db_edar,$check_query);
    if (mysqli_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysqli_fetch_assoc($rst_check_query);
        $check_id = $rw_check_query["id"];
        //echo "UPDATE `tbl_ack_sorder` SET `desc_note`='$desc_note' WHERE id='$check_id' and `form_reference_id`='$emp_form_ref' and `emp_pf`='$emp_pf'";
        $query = mysqli_query( $db_edar,"UPDATE `tbl_ack_sorder` SET `desc_note`='$desc_note' WHERE id='$check_id' and `form_reference_id`='$emp_form_ref' and `emp_id`='$emp_pf'");
    } else {
        $query = mysqli_query( $db_edar,"INSERT INTO `tbl_ack_sorder`(`form_id`, `form_reference_id`, `emp_id`, `type_name`, `desc_note`, `created_date`, `status`) VALUES ('$form_ids','$emp_form_ref','$emp_pf','$type_id','$desc_note','$current_date','1')");
        //up_master_entry_note_ids($emp_pf,$emp_form_ref);
        $sql = mysqli_query( $db_edar,"SELECT * from tbl_form_master_entry where emp_pf='$emp_pf' and form_ref_id='$emp_form_ref' and status='1'");
        $fetch_sql = mysqli_fetch_array($sql);
        $sql_tbl_note = mysqli_query( $db_edar,"SELECT * from tbl_ack_sorder where emp_id='$emp_pf' and form_reference_id='$emp_form_ref'");
        while ($row = mysqli_fetch_array($sql_tbl_note)) {

            $id = $row['id'];


            array_push($push, $id);
            //print_r($push);

        }
        if ($fetch_sql['speaking_ids'] == null) {
            $sql_up = mysqli_query( $db_edar,"UPDATE tbl_form_master_entry set speaking_ids='" . $id . "' where emp_pf='$emp_pf' and form_ref_id='$emp_form_ref'");
        } else {

            $note_id = implode(",", $push);
            $sql_up = mysqli_query( $db_edar,"UPDATE tbl_form_master_entry set speaking_ids='" . $note_id . "' where emp_pf='$emp_pf' and form_ref_id='$emp_form_ref'");
        }
    }

    return true;
}
function forward_da_to_emp($emp_pf, $fw_emp_id, $fw_remark, $status)
{
    global $db_edar;
    $ref_id = get_emp_ref($emp_pf);
    $form_ids = get_emp_forms($emp_pf, $ref_id);
    $current_date = date("Y-m-d H:i:s");
    $current_role = $_SESSION['role'];
    $current_user = $_SESSION["id"];
    $sql = "INSERT INTO `tbl_form_forward`(`form_reference_id`, `emp_pf`, `form_id`, `fw_from`, `fw_to`, `fw_date`, `status`, `remark`,`current_role`) VALUES ('$ref_id','$emp_pf','$form_ids','$current_user','$fw_emp_id','$current_date','$status','$fw_remark','$current_role')";
    if (mysqli_query( $db_edar,$sql)) {
        $update_all_frm_id = mysqli_query( $db_edar,"UPDATE tbl_form_details set inquiry_o_pf='$fw_emp_id' where emp_id='$emp_pf' and  form_reference_id='$ref_id'");
        if ($update_all_frm_id && update_master_entry_status($status, $emp_pf, $ref_id)) {
            return true;
        }
    }
    return false;
}