<?php
$emp_pf = $_REQUEST["txt_emp_pf"];
$reg_no = $_REQUEST["txt_no"];
$penalty_type = $_REQUEST["lst_penalty_type"];
$form_selected = $_REQUEST["lst_forms"];
$rail_board = $_REQUEST["txt_rail_board"];
$place_of_issue = $_REQUEST["txt_place_of_issue"];
// $ref = isset($_REQUEST["refernce_id"]) ? $_REQUEST["refernce_id"] : "";
$dated = date("d-m-Y ", strtotime($_REQUEST["txt_dated"]));
$db_dated = date("Y-m-d", strtotime($_REQUEST["txt_dated"]));
echo "<input type='hidden' value='$emp_pf' name='hd_emp_pf' id='hd_emp_pf'>";
echo "<input type='hidden' value='$reg_no' name='hd_no' id='hd_no'>";
echo "<input type='hidden' value='$penalty_type' name='hd_penalty_type' id='hd_penalty_type'>";
echo "<input type='hidden' value='$form_selected' name='hd_selected_form' id='hd_selected_form'>";
echo "<input type='hidden' value='$rail_board' name='hd_rail_board' id='hd_rail_board'>";
echo "<input type='hidden' value='$place_of_issue' name='hd_place_of_issue' id='hd_place_of_issue'>";
echo "<input type='hidden' value='$db_dated' name='hd_dated' id='hd_dated'>";
// echo "<input type='hidden' value='$ref' name='hd_refernce_id' id='hd_refernce_id'>";
if ($form_selected == 1) {
    $sf1_effect_form = $_REQUEST["txt_sf1_effect_form"];
    echo "<input type='hidden' value='$sf1_effect_form' name='hd_sf1_effect_form' id='hd_sf1_effect_form'>";
    include_once("load_sf1.php");
} else if ($form_selected == 2) {
    $sf2_custody_on = $_REQUEST["txt_sf2_custody_on"];
    $sf2_date_of_detention = $_REQUEST["txt_sf2_date_of_detention"];
    echo "<input type='hidden' value='$sf2_custody_on' name='hd_sf2_custody_on' id='hd_sf2_custody_on'>";
    echo "<input type='hidden' value='$sf2_date_of_detention' name='hd_sf2_date_of_detention' id='hd_sf2_date_of_detention'>";
    include_once("load_sf2.php");
} else if ($form_selected == 3) {
    $sf3_holding_post = $_REQUEST["txt_sf3_holding_post"];
    echo "<input type='hidden' value='$sf3_holding_post' name='hd_sf3_holding_post' id='hd_sf3_holding_post'>";
    include_once("load_sf3.php");
} else if ($form_selected == 4) {
    $sf4_made_by = $_REQUEST["txt_sf4_made_by"];
    $sf4_made_on = $_REQUEST["txt_sf4_made_on"];
    $sf4_effect_from = $_REQUEST["txt_sf4_effect_from"];

    echo "<input type='hidden' value='$sf4_made_by' name='hd_sf4_made_by' id='hd_sf4_made_by'>";
    echo "<input type='hidden' value='$sf4_made_on' name='hd_sf4_made_on' id='hd_sf4_made_on'>";
    echo "<input type='hidden' value='$sf4_effect_from' name='hd_sf4_effect_from' id='hd_sf4_effect_from'>";

    include_once("load_sf4.php");
} else if ($form_selected == 5) {
    $sf5_contact = $_REQUEST["txt_sf5_contact"];
    $sf5_gm_pf = $_REQUEST["txt_sf5_gm_pf"];
    $sf5_amt = $_REQUEST["txt_sf5_amt"];

    echo "<input type='hidden' value='$sf5_contact' name='hd_sf5_contact' id='hd_sf5_contact'>";
    echo "<input type='hidden' value='$sf5_gm_pf' name='hd_sf5_gm_pf' id='hd_sf5_gm_pf'>";
    echo "<input type='hidden' value='$sf5_amt' name='hd_sf5_amt' id='hd_sf5_amt'>";
    include_once("load_sf5.php");
} else if ($form_selected == 6) {
    // echo "<pre>";
    // var_dump($_REQUEST);
    // echo "</pre>";
    $sf6_subject = $_REQUEST["txt_sf6_subject"];
    $sf6_memo_no = $_REQUEST["txt_sf6_memo_no"];
    // date("Y-m-d", strtotime($_REQUEST["txt_dated"]));
    $sf6_memo_dated = date("Y-m-d", strtotime($_REQUEST["txt_sf6_memo_dated"]));
    $sf6_memo_dated_view = date("d-m-Y ", strtotime($_REQUEST["txt_sf6_memo_dated"]));
    $sf6_desc_rec_array = $_REQUEST["sf6_desc_rec_array"];
    $sf6_reason_array = $_REQUEST["sf6_reason_array"];
    // print_r($sf6_desc_rec_array);
    echo "<input type='hidden' value='$sf6_subject' name='sf6_subject' id='sf6_subject'>";
    echo "<input type='hidden' value='$sf6_memo_no' name='sf6_memo_no' id='sf6_memo_no'>";
    echo "<input type='hidden' value='$sf6_memo_dated' name='sf6_memo_dated' id='sf6_memo_dated'>";
    echo "<input type='hidden' value='$sf6_desc_rec_array' name='sf6_desc_rec_array' id='sf6_desc_rec_array'>";
    echo "<input type='hidden' value='$sf6_reason_array' name='sf6_reason_array' id='sf6_reason_array'>";
    include_once("load_sf6.php");
} else if ($form_selected == 7) {
    //$cnt=$_REQUEST['sr1'];
    //print_r($_REQUEST);
    $sf7_mem_data = explode(",", $_REQUEST['sf7_mem_name_data']);
    //print_r($data);

    $sf7_mem_pfs = $_REQUEST["sf7_mem_name_data"];
    $sf7_inquiry_officer_pf = $_REQUEST["inquiry_officer_pf"];
    echo "<input type='hidden' value='$sf7_mem_pfs' name='hd_sf7_mem_pfs' id='hd_sf7_mem_pfs'>";
    echo "<input type='hidden' value='$sf7_inquiry_officer_pf' name='hd_sf7_inquiry_officer_pf' id='hd_sf7_inquiry_officer_pf'>";
    include_once("load_sf7.php");
} else if ($form_selected == 8) {
    $sf8_presenting_officer_pf = $_REQUEST["presenting_officer_pf"];
    $inquiry_officer_pf = $_REQUEST["inquiry_officer_pf"];

    echo "<input type='hidden' value='$sf8_presenting_officer_pf' name='hd_presenting_officer_pf' id='hd_sf8_presenting_officer_pf'>";
    echo "<input type='hidden' value='$inquiry_officer_pf' name='hd_inquiry_officer_pf' id='hd_inquiry_officer_pf'>";

    include_once("load_sf8.php");
} else if ($form_selected == 9) {
    // $cnt = $_REQUEST['sr1'];
    //print_r($_REQUEST['sf10_data']);
    $data = explode(",", $_REQUEST['sf10_data']);
    //print_r($data);

    $sf10_emp_pfs = $_REQUEST["sf10_data"];
    echo "<input type='hidden' value='$sf10_emp_pfs' name='hd_sf10_emp_pfs' id='hd_sf10_emp_pfs'>";
    include_once("load_sf10.php");
} else if ($form_selected == 10) {
    $sf10a_order_no = $_REQUEST["txt_sf10a_order_no"];
    $sf10a_order_dated = $_REQUEST["txt_sf10a_order_dated"];
    $sf10a_appting_auth = $_REQUEST["txt_sf10a_appting_auth"];
    $sf10a_io = $_REQUEST["txt_sf10a_io"];

    echo "<input type='hidden' value='$sf10a_order_no' name='hd_sf10a_order_no' id='hd_sf10a_order_no'>";
    echo "<input type='hidden' value='$sf10a_order_dated' name='hd_sf10a_order_dated' id='hd_sf10a_order_dated'>";
    echo "<input type='hidden' value='$sf10a_appting_auth' name='hd_sf10a_appting_auth' id='hd_sf10a_appting_auth'>";
    echo "<input type='hidden' value='$sf10a_io' name='hd_sf10a_io' id='hd_sf10a_io'>";
    include_once("load_sf10a.php");
} else if ($form_selected == 11) {

    $sf10b_order_no = $_REQUEST["txt_sf10b_order_no"];
    $sf10b_order_dated = $_REQUEST["txt_sf10b_order_dated"];
    $sf10b_appting_auth = $_REQUEST["txt_sf10b_appting_auth"];
    $sf10b_po = $_REQUEST["txt_sf10b_po"];

    echo "<input type='hidden' value='$sf10b_order_no' name='hd_sf10b_order_no' id='hd_sf10b_order_no'>";
    echo "<input type='hidden' value='$sf10b_order_dated' name='hd_sf10b_order_dated' id='hd_sf10b_order_dated'>";
    echo "<input type='hidden' value='$sf10b_appting_auth' name='hd_sf10b_appting_auth' id='hd_sf10b_appting_auth'>";
    echo "<input type='hidden' value='$sf10b_po' name='hd_sf10b_po' id='hd_sf10b_po'>";
    include_once("load_sf10b.php");
} else if ($form_selected == 12) {
    include_once("load_sf11.php");
} else if ($form_selected == 13) {
    $sf11b_mem_no = $_REQUEST["txt_sf11b_mem_no"];
    $sf11b_mem_dated = $_REQUEST["txt_sf11b_mem_dated"];
    $sf11b_subject = $_REQUEST["txt_sf11b_common"];
    $sf11b_io = $_REQUEST["txt_sf11b_io"];
    $sf11b_contact = $_REQUEST["txt_sf11b_contact"];
    $sf11b_gm_pf = $_REQUEST["txt_sf11b_gm_pf"];

    echo "<input type='hidden' value='$sf11b_mem_no' name='hd_sf11b_mem_no' id='hd_sf11b_mem_no'>";
    echo "<input type='hidden' value='$sf11b_mem_dated' name='hd_sf11b_mem_dated' id='hd_sf11b_mem_dated'>";
    echo "<input type='hidden' value='$sf11b_subject' name='hd_sf11b_subject' id='hd_sf11b_subject'>";
    echo "<input type='hidden' value='$sf11b_io' name='hd_sf11b_io' id='hd_sf11b_io'>";
    echo "<input type='hidden' value='$sf11b_contact' name='hd_sf11b_contact' id='hd_sf11b_contact'>";
    echo "<input type='hidden' value='$sf11b_gm_pf' name='hd_sf11b_gm_pf' id='hd_sf11b_gm_pf'>";

    include_once("load_sf11b.php");
} else if ($form_selected == 14) {
    //include_once("load_sf11.php");   
} else if ($form_selected == 15) {
    $sf11c_mem_no = $_REQUEST["txt_sf11c_mem_no"];
    $sf11c_mem_dated = $_REQUEST["txt_sf11c_mem_dated"];
    $sf11c_on = $_REQUEST["txt_sf11c_on"];
    $sf11c_gm_pf = $_REQUEST["txt_sf11c_gm_pf"];

    echo "<input type='hidden' value='$sf11c_mem_no' name='hd_sf11c_mem_no' id='hd_sf11c_mem_no'>";
    echo "<input type='hidden' value='$sf11c_mem_dated' name='hd_sf11c_mem_dated' id='hd_sf11c_mem_dated'>";
    echo "<input type='hidden' value='$sf11c_on' name='hd_sf11c_on' id='hd_sf11c_on'>";
    echo "<input type='hidden' value='$sf11c_gm_pf' name='hd_sf11c_gm_pf' id='hd_sf11c_gm_pf'>";


    include_once("load_sf11c.php");
}