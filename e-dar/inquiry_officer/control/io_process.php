<?php
session_start();
include_once("../../common_files/common_functions.php");
include_once("../../dbconfig/dbcon.php");
include_once("io_functions.php");
$action = strtolower($_REQUEST["action"]);
switch ($action) {

    case 'get_emp_forms':
        $emp_no = $_POST['emp_pf'];
        $refernce_id = $_POST['reference_id'];
        $search_emp = "SELECT * from tbl_form_master_entry where emp_pf='$emp_no' and form_ref_id='$refernce_id' and status='1' ";
        $res_emp = mysql_query($search_emp, $db_edar);

        if (mysql_num_rows($res_emp) > 0) {
            $fetch_emp = mysql_fetch_array($res_emp);
            $form_ids = $fetch_emp['form_ids'];
            $ack_ids = $fetch_emp['ack_ids'];
            $note_ids = $fetch_emp['note_ids'];
            $fetch_emp = mysql_fetch_array($res_emp);
            $speaking_ids = $fetch_emp['speaking_ids'];
            $office_note_id = $fetch_emp["office_note_id"];
            $frms = explode(",", $form_ids);
            // print_r($frms);
            $sr = 0;
            foreach ($frms as $key => $frm_id) {
                $form_details = mysql_query("SELECT tbl_form_details.id,form_name,form_id,form_reference_id,emp_id from tbl_form_details,tbl_master_form where tbl_master_form.id=tbl_form_details.form_id and form_id='$frm_id' and emp_id='$emp_no' ", $db_edar);
                while ($frm_get = mysql_fetch_array($form_details)) {
                    $sr++;
                    //echo $frm_get['form_id']." ".$frm_get['form_no']."\n";
                    echo "<tr>
                          <td>" . $sr . "</td>
                          <td>" . $frm_get['form_name'] . "</td>";
                    if ($frm_get['form_id'] == 1) {
                        echo "<td><a href='../common_print_files/print_sf_1.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a> </td>";
                    } else if ($frm_get['form_id'] == 2) {
                        echo "<td><a href='../common_print_files/print_sf_2.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a></td>";
                    } else if ($frm_get['form_id'] == 3) {
                        echo "<td><a href='../common_print_files/print_sf_3.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a></td>";
                    } else if ($frm_get['form_id'] == 4) {
                        echo "<td><a href='../common_print_files/print_sf_4.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a></td>";
                    } else if ($frm_get['form_id'] == 5) {
                        echo "<td><a href='../common_print_files/print_sf_5.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a></td>";
                    } else if ($frm_get['form_id'] == 6) {
                        echo "<td><a href='../common_print_files/print_sf_6.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a></td>";
                    } else if ($frm_get['form_id'] == 7) {
                        echo "<td><a href='../common_print_files/print_sf_7.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a></td>";
                    } else if ($frm_get['form_id'] == 8) {
                        echo "<td><a href='../common_print_files/print_sf_8.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a></td>";
                    } else if ($frm_get['form_id'] == 9) {
                        echo "<td><a href='../common_print_files/print_sf_10.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>
                              </td>";
                    } else if ($frm_get['form_id'] == 10) {
                        echo "<td><a href='../common_print_files/print_sf_10_A.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>
                              </td>";
                    } else if ($frm_get['form_id'] == 11) {
                        echo "<td><a href='../common_print_files/print_sf_10_B.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>
                              </td>";
                    } else if ($frm_get['form_id'] == 12) {
                        echo "<td><a href='../common_print_files/print_sf_11.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>
                                           </td>";
                    } else if ($frm_get['form_id'] == 13) {
                        echo "<td><a href='../common_print_files/print_sf_11_b.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>
                              </td>";
                    } else if ($frm_get['form_id'] == 14) {
                        echo "<td><a href='../common_print_files/print_sf_11b_annexure.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a></td>";
                    } else if ($frm_get['form_id'] == 15) {
                        echo "<td><a href='../common_print_files/print_sf_11_c.php?id=" . $frm_get['id'] . "&emp_id=" . $frm_get['emp_id'] . "&refernce_id=" . $frm_get['form_reference_id'] . "&form_id=" . $frm_get['form_id'] . "'  class='btn btn-info'>View</a>
                              </td>";
                    }


                    echo "</tr>";
                }
            }


            if (!empty($ack_ids)) {
                $explode = explode(",", $ack_ids);

                foreach ($explode as  $value) {
                    $sqll = mysql_query("SELECT * From  tbl_ack_sorder where id='$value'", $db_edar);
                    $ack_fetch = mysql_fetch_array($sqll);

                    $sr++;
                    echo "<tr>";
                    echo "<td>" . $sr . "</td>";
                    if ($ack_fetch['type_name'] == '1') {
                        echo "<td>Acknowledgement</td>";
                    } else if ($ack_fetch['type_name'] == '2') {
                        echo "<td>Explanation</td>";
                    }

                    echo "<td><a href='../common_print_files/ack.php?ack_id=" . $ack_fetch['id'] . "&emp_id=" . $ack_fetch['emp_id'] . "&refernce_id=" . $ack_fetch['form_reference_id'] . "&form_id=" . $ack_fetch['form_id'] . "'   class='btn btn-info'>View</a>&nbsp;&nbsp;";
                    if ($fetch_emp['current_status'] == '3') {
                        echo "<a href='up_ack.php?ack_id=" . $ack_fetch['id'] . "&emp_id=" . $ack_fetch['emp_id'] . "&refernce_id=" . $ack_fetch['form_reference_id'] . "&form_id=" . $ack_fetch['form_id'] . "&type_name=" . $ack_fetch['type_name'] . "'  class='btn btn-info'>Update</a>";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
            }
            if (!empty($note_ids)) {
                $explode = explode(",", $note_ids);

                foreach ($explode as  $value) {
                    $sqll = mysql_query("SELECT * From  tbl_note where id='$value'", $db_edar);
                    $note_fetch = mysql_fetch_array($sqll);

                    $sr++;
                    echo "<tr>";
                    echo "<td>" . $sr . "</td>";
                    if ($note_fetch['type_of_note'] == '1') {
                        echo "<td>Preliminary</td>";
                    } else if ($note_fetch['type_of_note'] == '2') {
                        echo "<td>Regular</td>";
                    }

                    echo "<td><a href='../common_print_files/io_note.php?id=" . $note_fetch['id'] . "&emp_id=" . $note_fetch['emp_pf'] . "&refernce_id=" . $note_fetch['form_reference_id'] . "&type_id=" . $note_fetch['type_of_note'] . "'   class='btn btn-info'>View</a>&nbsp;&nbsp;";
                    if ($fetch_emp['current_status'] == '7' || $fetch_emp['current_status'] == '11') {
                        echo "<a href='update_note.php?id=" . $note_fetch['id'] . "&emp_id=" . $note_fetch['emp_pf'] . "&refernce_id=" . $note_fetch['form_reference_id'] . "&type_id=" . $note_fetch['type_of_note'] . "'  class='btn btn-info'>Update</a>";
                    }
                    echo "</td>";
                    echo "</tr>";
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
                    echo "<td>";
                    if (in_array("view", $display_array)) {
                        echo "<a href='../common_print_files/ack.php?ack_id=" . $ack_fetch['id'] . "&emp_id=" . $ack_fetch['emp_id'] . "&refernce_id=" . $ack_fetch['form_reference_id'] . "&form_id=" . $ack_fetch['form_id'] . "'   class='btn btn-info'>View</a>&nbsp;&nbsp";
                    }
                    if (in_array("update", $display_array)) {
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
                        echo "<a href='control/da_process.php?action=delete_office_note&emp_pf=$emp_office_pf&office_id=$office_id' class='btn btn-danger'>Delete</a>  ";
                    }
                    echo "</td>
                        </tr>";
                }
            }
        } else {
            echo "<tr><td>Record Not Found!</td><td></td><td></td></tr>";
        }

        break;

    case 'add_note':
        $data = '';
        $emp_pf = $_POST['emp_pf'];
        $emp_form_ref = $_POST['ref'];
        $type_id = $_POST['type_id'];
        $desc_note = ($_POST['desc_note']);

        if (add_note($emp_pf, $emp_form_ref, $type_id, $desc_note)) {
            $data = "1";
        }
        echo $data;

        break;




    case "forward_io_to_da":
        // print_r($_REQUEST);
        /**
         * Array ( [action] => forward_form [mdl_hd_emp_pf] => 123123 [mdl_lst_forward] => 123123 [mdl_forward_remark] => Check )
         */
        $Result = array("res" => "fail");
        $emp_pf = $_REQUEST["mdl_hd_emp_pf"];
        $ref_id = $_REQUEST["mdl_hd_ref_id"];
        $id = $_REQUEST["mdl_hd_tbl_fw_id"];
        $form_id = $_REQUEST["mdl_hd_form_id"];
        $fw_to = $_REQUEST["original_fw_to"];
        $current_status = 8;
        $fw_remark = isset($_REQUEST["mdl_forward_remark"]) ? $_REQUEST["mdl_forward_remark"] : "";

        if (forward_io_to_da($emp_pf, $ref_id, $form_id, $fw_remark, $fw_to, $current_status)) {
            $Result["res"] = "success";
        }
        echo json_encode($Result);
        break;


    default:
        echo "working";
        break;
}