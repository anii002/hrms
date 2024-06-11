<?php
session_start();
include_once("../../common_files/common_functions.php");
include_once("../../dbconfig/dbcon.php");
include_once("clerk_functions.php");
$action = strtolower($_REQUEST["action"]);
switch ($action) {
    case 'save_form':
        $Result = array("res" => "fail");
        $emp_pf = $_REQUEST["hd_emp_pf"];
        $form_no = $_REQUEST["hd_no"];
        $penalty_type = $_REQUEST["hd_penalty_type"];
        $selected_form = $_REQUEST["hd_selected_form"];
        $rail_board = $_REQUEST["hd_rail_board"];
        $place_of_issue = $_REQUEST["hd_place_of_issue"];
        $form_dated = $_REQUEST["hd_dated"];
        $emp_form_ref = get_emp_ref($emp_pf);
        $current_user = $_SESSION["id"];
        $current_date = date("Y-m-d H:i:s");
        if ($selected_form == 1) {
            $sf1_effect_form = $_REQUEST["hd_sf1_effect_form"];
            $fun_res = save_sf1_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf, $sf1_effect_form);
        } else if ($selected_form == 2) {
            $sf2_custody_on = $_REQUEST["hd_sf2_custody_on"];
            $sf2_date_of_detention = date('Y-m-d', strtotime($_REQUEST["hd_sf2_date_of_detention"]));
            $fun_res = save_sf2_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf, $sf2_custody_on, $sf2_date_of_detention);
        } else if ($selected_form == 3) {
            $sf3_holding_post = $_REQUEST["hd_sf3_holding_post"];
            $fun_res = save_sf3_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf, $sf3_holding_post);
        } else if ($selected_form == 4) {
            $sf4_made_by = $_REQUEST["hd_sf4_made_by"];
            $sf4_made_on = date('Y-m-d', strtotime($_REQUEST["hd_sf4_made_on"]));
            $sf4_effect_from = $_REQUEST["hd_sf4_effect_from"];
            $fun_res = save_sf4_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf, $sf4_made_by, $sf4_made_on, $sf4_effect_from);
        } else if ($selected_form == 5) {
            $fun_res = false;
            // print_r($_REQUEST);
            $sf5_amount = $_REQUEST["hd_sf5_amt"];
            $sf5_contact = $_REQUEST["hd_sf5_contact"];
            $sf5_gm_pf = $_REQUEST["hd_sf5_gm_pf"];
            $fun_res = save_sf5_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf, $sf5_contact, $sf5_gm_pf, $sf5_amount);
        } else if ($selected_form == 6) {
            $sf6_memo_dated = $_REQUEST["sf6_memo_dated"];
            $sf6_subject = $_REQUEST["sf6_subject"];
            $sf6_memo_no = $_REQUEST["sf6_memo_no"];
            $sf6_desc_rec_array = $_REQUEST["sf6_desc_rec_array"];
            $sf6_reason_array = $_REQUEST["sf6_reason_array"];
            $fun_res = save_sf6_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf, $sf6_memo_dated, $sf6_subject, $sf6_memo_no, $sf6_desc_rec_array, $sf6_reason_array);
        } else if ($selected_form == 7) {
            $sf7_mem_pfs = $_REQUEST["hd_sf7_mem_pfs"];
            $sf7_inquiry_officer_pf = $_REQUEST["hd_sf7_inquiry_officer_pf"];
            $fun_res = save_sf7_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf, $sf7_inquiry_officer_pf, $sf7_mem_pfs);
        } else if ($selected_form == 8) {
            $sf8_inquiry_officer_pf = $_REQUEST["hd_inquiry_officer_pf"];
            $sf8_presenting_officer_pf = $_REQUEST["hd_presenting_officer_pf"];

            $fun_res = save_sf8_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf, $sf8_inquiry_officer_pf, $sf8_presenting_officer_pf);
        } else if ($selected_form == 9) {
            $sf10_emp_pfs = $_REQUEST["hd_sf10_emp_pfs"];
            $fun_res = save_sf10_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf, $sf10_emp_pfs);
        } else if ($selected_form == 10) {
            $sf10a_order_no = $_REQUEST["hd_sf10a_order_no"];
            $sf10a_order_dated = date('Y-m-d', strtotime($_REQUEST["hd_sf10a_order_dated"]));
            $sf10a_appting_auth = $_REQUEST["hd_sf10a_appting_auth"];
            $sf10a_io = $_REQUEST["hd_sf10a_io"];
            $fun_res = save_sf10a_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf, $sf10a_order_no, $sf10a_order_dated, $sf10a_appting_auth, $sf10a_io);
        } else if ($selected_form == 11) {
            $sf10b_order_no = $_REQUEST["hd_sf10b_order_no"];
            $sf10b_order_dated = date('Y-m-d', strtotime($_REQUEST["hd_sf10b_order_dated"]));
            $sf10b_appting_auth = $_REQUEST["hd_sf10b_appting_auth"];
            $sf10b_po = $_REQUEST["hd_sf10b_po"];
            $fun_res = save_sf10b_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf, $sf10b_order_no, $sf10b_order_dated, $sf10b_appting_auth, $sf10b_po);
        } else if ($selected_form == 12) {
            $fun_res = save_sf11_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf);
        } else if ($selected_form == 13) {
            $sf11b_mem_no = $_REQUEST["hd_sf11b_mem_no"];
            $sf11b_mem_dated = $_REQUEST["hd_sf11b_mem_dated"];
            $sf11b_mem_dated1 = date('Y-m-d', strtotime($_REQUEST["hd_sf11b_mem_dated"]));
            $sf11b_subject = $_REQUEST["hd_sf11b_subject"];
            $sf11b_io = $_REQUEST["hd_sf11b_io"];
            $sf11b_contact = $_REQUEST["hd_sf11b_contact"];
            $sf11b_gm_pf = $_REQUEST["hd_sf11b_gm_pf"];

            $fun_res = save_sf11b_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf, $sf11b_mem_no, $sf11b_mem_dated1, $sf11b_subject, $sf11b_io, $sf11b_contact, $sf11b_gm_pf);
        } else if ($selected_form == 15) {
            $sf11c_mem_no = $_REQUEST["hd_sf11c_mem_no"];
            $sf11c_mem_dated = $_REQUEST["hd_sf11c_mem_dated"];
            $sf11c_mem_dated1 = date('Y-m-d', strtotime($_REQUEST["hd_sf11c_mem_dated"]));
            $sf11c_on = $_REQUEST["hd_sf11c_on"];
            $sf11c_on1 = date('Y-m-d', strtotime($_REQUEST["hd_sf11c_on"]));
            $sf11c_gm_pf = $_REQUEST["hd_sf11c_gm_pf"];

            $fun_res = save_sf11c_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf, $sf11c_mem_no, $sf11c_mem_dated1, $sf11c_on1, $sf11c_gm_pf);
        } else { }

        if ($fun_res && update_master_entry($emp_pf, $emp_form_ref, $selected_form)) {
            $Result["res"] = "success";
        }

        echo json_encode($Result);

        break;

    case 'get_emp_forms':
        // print_r($_REQUEST);
        $emp_no = $_POST['emp_no'];
        $display = $_POST["display"];
        $form_ref_id = get_emp_ref($emp_no);
        $search_emp = "SELECT * from tbl_form_master_entry where emp_pf='$emp_no' AND status='1' AND form_ref_id='$form_ref_id'";
        $res_emp = mysql_query($search_emp, $db_edar);
        // echo mysql_error();
        // var_dump($res_emp);
        // var_dump(mysql_num_rows($res_emp));
        $display_array = explode(",", $display);
        if (mysql_num_rows($res_emp) > 0) {
            $fetch_emp = mysql_fetch_array($res_emp);
            $form_ids = $fetch_emp['form_ids'];

            $frms = explode(",", $form_ids);
            // print_r($frms);
            $sr = 0;
            foreach ($frms as $key => $frm_id) {
                $form_details = mysql_query("SELECT tbl_form_details.id,form_name,form_id,form_reference_id,emp_id from tbl_form_details,tbl_master_form where tbl_master_form.id=tbl_form_details.form_id and form_id='$frm_id' and emp_id='$emp_no' AND form_reference_id='$form_ref_id'", $db_edar);
                while ($frm_get = mysql_fetch_array($form_details)) {
                    $sr++;
                    //echo $frm_get['form_id']." ".$frm_get['form_no']."\n";
                    echo "<tr>
                          <td>" . $sr . "</td>
                          <td>" . $frm_get['form_name'] . "</td>";
                    if ($frm_get['form_id'] == 1) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a  href='../common_print_files/print_sf_1.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info '>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary btn-hide'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a  href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger btn-hide'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 2) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_2.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 3) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_3.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 4) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_4.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 5) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_5.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 6) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_6.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 7) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_7.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 8) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_8.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 9) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_10.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 10) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_10_A.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 11) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_10_B.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 12) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_11.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 13) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_11_b.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 14) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_11b_annexure.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 15) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_11_c.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    }
                    echo "</tr>";
                    // <td><a href='view.php?id=".$frm_get['id']."'  class='btn btn-info'>View</a>
                    //     <button value='".$frm_get['id']."' class='btn btn-primary'>Update</button>
                    //     <button value='".$frm_get['id']."' class='btn btn-danger'>Delete</button>  
                    // </td>";
                }
            }
        } else {
            echo "<tr><td>Record Not Found!</td><td></td><td></td></tr>";
        }

        break;

    case "check_form_is_forwarded":
        // print_r($_REQUEST);
        /**
         * Array
            (
                [action] => check_form_is_forwarded
                [emp_no] => 00512206892
            )
         */
        $Result = array("res" => "fail");
        $emp_pf = $_REQUEST["emp_no"];
        $form_ref_id = get_emp_ref($emp_pf);
        $sql = "SELECT * FROM `tbl_form_master_entry` WHERE `current_status` IN (1,4,0) AND `emp_pf`='$emp_pf' AND `form_ref_id`='$form_ref_id' AND `status`='1'";
        $rst_check_query = mysql_query($sql, $db_edar);
        if (mysql_num_rows($rst_check_query) > 0) {
            $Result["res"] = "success";
        }
        echo json_encode($Result);

        break;

    case 'get_emp_closed_forms':
        // print_r($_REQUEST);
        $emp_no = $_POST['emp_no'];
        $display = $_POST["display"];
        $emp_form_ref = $_POST["form_ref_id"];
        $search_emp = "SELECT * from tbl_form_master_entry where emp_pf='$emp_no' AND form_ref_id='$emp_form_ref'";
        $res_emp = mysql_query($search_emp, $db_edar);
        // echo mysql_error();
        // var_dump($res_emp);
        // var_dump(mysql_num_rows($res_emp));
        $display_array = explode(",", $display);
        if (mysql_num_rows($res_emp) > 0) {
            $fetch_emp = mysql_fetch_array($res_emp);
            $form_ids = $fetch_emp['form_ids'];
            $ack_ids = $fetch_emp['ack_ids'];
            $speaking_ids = $fetch_emp['speaking_ids'];
            $note_ids = $fetch_emp['note_ids'];
            $office_note_id = $fetch_emp["office_note_id"];
            $frms = explode(",", $form_ids);
            // print_r($frms);
            $sr = 0;
            foreach ($frms as $key => $frm_id) {
                $form_details = mysql_query("SELECT tbl_form_details.id,form_name,form_id,form_reference_id,emp_id from tbl_form_details,tbl_master_form where tbl_master_form.id=tbl_form_details.form_id and form_id='$frm_id' and emp_id='$emp_no' and form_reference_id ='$emp_form_ref'", $db_edar);
                while ($frm_get = mysql_fetch_array($form_details)) {
                    $sr++;
                    //echo $frm_get['form_id']." ".$frm_get['form_no']."\n";
                    echo "<tr>
                                  <td>" . $sr . "</td>
                                  <td>" . $frm_get['form_name'] . "</td>";
                    if ($frm_get['form_id'] == 1) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_1.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 2) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_2.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 3) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_3.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 4) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_4.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 5) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_5.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 6) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_6.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 7) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_7.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 8) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_8.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 9) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_10.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 10) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_10_A.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 11) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_10_B.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 12) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_11.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 13) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_11_b.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 14) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_11b_annexure.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 15) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_11_c.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    }
                    echo "</tr>";
                    // <td><a href='view.php?id=".$frm_get['id']."'  class='btn btn-info'>View</a>
                    //     <button value='".$frm_get['id']."' class='btn btn-primary'>Update</button>
                    //     <button value='".$frm_get['id']."' class='btn btn-danger'>Delete</button>  
                    // </td>";
                }
            }

            if (!empty($speaking_ids)) {
                $explode = explode(",", $speaking_ids);
                foreach ($explode as  $value) {
                    $sqll = mysql_query("SELECT * From  tbl_ack_sorder where id='$value' and type_name='3'", $db_edar);
                    $ack_fetch = mysql_fetch_array($sqll);
                    $sr++;
                    echo "<tr>";
                    echo "<td>" . $sr . "</td>";
                    if ($ack_fetch['type_name'] == '3') {
                        echo "<td>Speaking order</td>";
                    }
                    echo "<td><a href='../common_print_files/ack.php?ack_id=" . $ack_fetch['id'] . "&emp_id=" . $ack_fetch['emp_id'] . "&refernce_id=" . $ack_fetch['form_reference_id'] . "&form_id=" . $ack_fetch['form_id'] . "'   class='btn btn-info'>View</a>&nbsp;&nbsp;";
                    if ($fetch_emp['current_status'] == '3') {
                        echo "<a href='up_sorder.php?ack_id=" . $ack_fetch['id'] . "&emp_id=" . $ack_fetch['emp_id'] . "&refernce_id=" . $ack_fetch['form_reference_id'] . "&form_id=" . $ack_fetch['form_id'] . "&type_name=" . $ack_fetch['type_name'] . "'  class='btn btn-primary'>Update</a>";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
            }
            $sr++;
            if (!empty($office_note_id)) {
                $sql_office_note = "SELECT * FROM `tbl_officer_note` WHERE `emp_pf`='$emp_no' AND `form_reference_id`='$form_ref_id'";
                $rst_office_note = mysql_query($sql_office_note, $db_edar);
                if (mysql_num_rows($rst_office_note) > 0) {
                    $rw_office_note = mysql_fetch_assoc($rst_office_note);
                    // print_r($rw_office_note);
                    $emp_office_pf = $rw_office_note["emp_pf"];
                    $office_id = $rw_office_note["id"];
                    echo "<tr>
                                <td>$sr</td>
                                <td> Office Note</td>
                                <td>";
                    if (in_array("view", $display_array)) {
                        echo "<a href='../common_print_files/print_office_note.php?emp_pf=$emp_office_pf&office_id=$office_id' class='btn btn-info'>View</a> ";
                    }
                    if (in_array("update", $display_array)) {
                        echo "<a href='up_office_note.php?emp_pf=$emp_office_pf&office_id=$office_id' class='btn btn-primary'>Update</a> ";
                    }
                    if (in_array("remove", $display_array)) {
                        echo "<a href='control/clerk_process.php?action=delete_office_note&emp_pf=$emp_office_pf&office_id=$office_id' class='btn btn-danger'>Delete</a>  ";
                    }
                    echo "</td>
                            </tr>";
                }
            }
        } else {
            echo "<tr><td>Record Not Found!</td><td></td><td></td></tr>";
        }

        break;


    case 'get_emp_closed_forms_old':
        // print_r($_REQUEST);
        $emp_no = $_POST['emp_no'];
        $display = $_POST["display"];
        $emp_form_ref = $_POST["form_ref_id"];
        $search_emp = "SELECT * from tbl_form_master_entry where emp_pf='$emp_no' AND form_ref_id='$emp_form_ref'";
        $res_emp = mysql_query($search_emp, $db_edar);
        // echo mysql_error();
        // var_dump($res_emp);
        // var_dump(mysql_num_rows($res_emp));
        $display_array = explode(",", $display);
        if (mysql_num_rows($res_emp) > 0) {
            $fetch_emp = mysql_fetch_array($res_emp);
            $form_ids = $fetch_emp['form_ids'];

            $frms = explode(",", $form_ids);
            // print_r($frms);
            $sr = 0;
            foreach ($frms as $key => $frm_id) {
                $form_details = mysql_query("SELECT tbl_form_details.id,form_name,form_id,form_reference_id,emp_id from tbl_form_details,tbl_master_form where tbl_master_form.id=tbl_form_details.form_id and form_id='$frm_id' and emp_id='$emp_no'", $db_edar);
                while ($frm_get = mysql_fetch_array($form_details)) {
                    $sr++;
                    //echo $frm_get['form_id']." ".$frm_get['form_no']."\n";
                    echo "<tr>
                              <td>" . $sr . "</td>
                              <td>" . $frm_get['form_name'] . "</td>";
                    if ($frm_get['form_id'] == 1) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_1.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 2) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_2.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 3) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_3.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 4) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_4.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 5) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_5.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 6) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_6.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 7) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_7.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 8) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_8.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 9) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_10.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 10) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_10_A.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 11) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_10_B.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 12) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_11.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 13) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_11_b.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 14) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_11b_annexure.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    } else if ($frm_get['form_id'] == 15) {
                        echo "<td>";
                        if (in_array("view", $display_array)) {
                            echo "<a href='../common_print_files/print_sf_11_c.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>";
                        }
                        if (in_array("update", $display_array)) {
                            echo "<a href='update_frms.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-primary'>Update</a>";
                        }
                        if (in_array("remove", $display_array)) {
                            echo "<a href='control/clerk_process.php?action=delete_frms&id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "''  class='btn btn-danger'>Delete</a>";
                        }
                        echo "</td>";
                    }
                    echo "</tr>";
                    // <td><a href='view.php?id=".$frm_get['id']."'  class='btn btn-info'>View</a>
                    //     <button value='".$frm_get['id']."' class='btn btn-primary'>Update</button>
                    //     <button value='".$frm_get['id']."' class='btn btn-danger'>Delete</button>  
                    // </td>";
                }
            }
        } else {
            echo "<tr><td>Record Not Found!</td><td></td><td></td></tr>";
        }

        break;

    case 'add_ackmt_note':
        $data = '';
        $empid = $_POST['empid'];
        $refernce_id = $_POST['ref'];
        $type_id = $_POST['type_id'];
        $desc_note = ($_POST['desc_note']);
        $form_id = "123";
        $date = date('Y-m-d h:i:s');
        $ins_desc_note = mysql_query("INSERT INTO `tbl_ack_sorder`(`form_id`, `form_reference_id`, `emp_id`, `type_name`, `desc_note`, `created_date`) VALUES('" . $form_id . "','" . $refernce_id . "','" . $empid . "','" . $type_id . "','" . $desc_note . "','" . $date . "')", $db_edar);
        if ($ins_desc_note) {
            $data = 1;
        }
        echo $data;
        break;

    case "forward_form":
        // print_r($_REQUEST);
        /**
         * Array ( [action] => forward_form [mdl_hd_emp_pf] => 123123 [mdl_lst_forward] => 123123 [mdl_forward_remark] => Check )
         */
        $Result = array("res" => "fail");
        $emp_pf = $_REQUEST["mdl_hd_emp_pf"];
        $fw_emp_id = $_REQUEST["mdl_lst_forward"];
        $current_status = 2;
        $fw_remark = isset($_REQUEST["mdl_forward_remark"]) ? $_REQUEST["mdl_forward_remark"] : "";
        if (forward_forms($emp_pf, $fw_emp_id, $fw_remark, $current_status)) {
            $Result["res"] = "success";
        }
        echo json_encode($Result);

        break;


    case 'delete_frms':
        $fid = $_GET['id'];
        $emp_pf = $_GET['emp_id'];
        $ref_id = $_GET['refernce_id'];
        $form_id = $_GET['form_id'];

        $sql = mysql_query("SELECT * from tbl_form_master_entry where form_ref_id='" . $ref_id . "' and emp_pf='" . $emp_pf . "' and status='1' ", $db_edar);
        $sql_fetch = mysql_fetch_array($sql);
        $frm_ids = explode(",", $sql_fetch['form_ids']);
        //print_r($frm_ids);
        if (($key = array_search($form_id, $frm_ids)) !== false) {
            unset($frm_ids[$key]);
            $removed_frm_id = implode(",", $frm_ids);

            $update_master_frm = mysql_query("UPDATE tbl_form_master_entry set form_ids='" . $removed_frm_id . "' where emp_pf='" . $emp_pf . "' AND form_ref_id='" . $ref_id . "'", $db_edar);

            $del_frm_detalis = mysql_query("DELETE from  tbl_form_details where id='" . $_GET['id'] . "'", $db_edar);
            echo "<script>AlertBox('Removed','successfully removed..');window.location='../forms_of_emp.php';</script>";
        } else {
            echo "<script>AlertBox('Error','failed to remove form..');window.location='../forms_of_emp.php';</script>";
        }
        //$del_frm_detalis=mysql_query("DELETE from  tbl_form_details where id='".$_GET['id']."'",$db_edar);

        break;


    case 'get_update_data':
        $data = '';
        $tbl_form_details_id = $_REQUEST['id'];
        $form_id = $_REQUEST['form_id'];
        $emp_id = $_REQUEST['emp_id'];
        $ref_id = $_REQUEST['refernce_id'];

        if ($form_id == 1) {
            $update_sf1 = update_frm_sf1($tbl_form_details_id, $form_id, $emp_id, $ref_id);
        } else if ($form_id == 2) {
            $update_sf2 = update_frm_sf2($tbl_form_details_id, $form_id, $emp_id, $ref_id);
        } else if ($form_id == 3) {
            $update_sf2 = update_frm_sf3($tbl_form_details_id, $form_id, $emp_id, $ref_id);
        } else if ($form_id == 4) {
            $update_sf2 = update_frm_sf4($tbl_form_details_id, $form_id, $emp_id, $ref_id);
        } else if ($form_id == 5) {
            $update_sf2 = update_frm_sf5($tbl_form_details_id, $form_id, $emp_id, $ref_id);
        } else if ($form_id == 6) {
            $update_sf2 = update_frm_sf6($tbl_form_details_id, $form_id, $emp_id, $ref_id);
        } else if ($form_id == 7) {
            $update_sf2 = update_frm_sf7($tbl_form_details_id, $form_id, $emp_id, $ref_id);
        } else if ($form_id == 8) {
            $update_sf2 = update_frm_sf8($tbl_form_details_id, $form_id, $emp_id, $ref_id);
        } else if ($form_id == 9) {
            $update_sf2 = update_frm_sf10($tbl_form_details_id, $form_id, $emp_id, $ref_id);
        } else if ($form_id == 10) {
            $update_sf2 = update_frm_sf10a($tbl_form_details_id, $form_id, $emp_id, $ref_id);
        } else if ($form_id == 11) {
            $update_sf2 = update_frm_sf10b($tbl_form_details_id, $form_id, $emp_id, $ref_id);
        } else if ($form_id == 12) {
            $update_sf2 = update_frm_sf11($tbl_form_details_id, $form_id, $emp_id, $ref_id);
        } else if ($form_id == 13) {
            $update_sf2 = update_frm_sf11b($tbl_form_details_id, $form_id, $emp_id, $ref_id);
            //$update_sf13=update_frm_sf13($tbl_form_details_id,$form_id,$emp_id,$ref_id);

        } else if ($form_id == 14) {
            $update_sf2 = update_frm_sf11b_annexure($tbl_form_details_id, $form_id, $emp_id, $ref_id);
        } else if ($form_id == 15) {
            $update_sf2 = update_frm_sf11c($tbl_form_details_id, $form_id, $emp_id, $ref_id);
        } else {
            echo "1";
        }


        break;
    default:
        echo "working";
        break;
}