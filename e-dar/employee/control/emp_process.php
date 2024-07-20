<?php
session_start();
include_once("../../common_files/common_functions.php");
include_once("../../dbconfig/dbcon.php");
include_once("emp_functions.php");
$action = strtolower($_REQUEST["action"]);
switch ($action) {

    case 'add_ackmt_note':
        $data = '';
        $empid = $_POST['empid'];
        $refernce_id = $_POST['ref'];
        $type_id = $_POST['type_id'];
        $desc_note = ($_POST['desc_note']);
        $date = date('Y-m-d h:i:s');
        $form_id = get_emp_forms($empid, $refernce_id);
        $push = array();
        $ins_desc_note = mysqli_query($db_edar,"INSERT INTO `tbl_ack_sorder`(`form_id`, `form_reference_id`, `emp_id`, `type_name`, `desc_note`, `created_date`,`status`) VALUES('" . $form_id . "','" . $refernce_id . "','" . $empid . "','" . $type_id . "','" . $desc_note . "','" . $date . "','1')");
        $sql2 = mysqli_query($db_edar,"SELECT id from tbl_ack_sorder where emp_id='" . $empid . "' and form_reference_id='" . $refernce_id . "' and status='1'");
        $sql = mysqli_query($db_edar,"SELECT ack_ids from tbl_form_master_entry where emp_pf='" . $empid . "' and `form_ref_id`='$refernce_id' and status='1'");
        $fetch_sql = mysqli_fetch_array($sql);

        while ($fetch2 = mysqli_fetch_array($sql2)) {
            $ackmt = $fetch2['id'];
            array_push($push, $ackmt);
            //print_r($push);
        }
        if ($type_id == '1') {
            $sql_master_update = mysqli_query($db_edar,"UPDATE `tbl_form_master_entry` SET `ack_ids`='" . $ackmt . "',ack_given='1' WHERE `form_ref_id`='$refernce_id' and `emp_pf`='$empid' and `status`='1'");
        } else {
            $ack = implode(",", $push);
            $sql_master_update = mysqli_query($db_edar,"UPDATE `tbl_form_master_entry` SET `ack_ids`='" . $ack . "',ack_given='1',expl_given='1' WHERE `form_ref_id`='$refernce_id' and `emp_pf`='$empid' and `status`='1'");
        }

        if ($ins_desc_note && $sql_master_update) {
            $data = 1;
        }
        echo $data;

        break;

    case 'forward_ackmt_to_da':

        $Result = array("res" => "fail");
        $emp_pf = $_REQUEST["mdl_hd_emp_pf"];
        $frm_ref_id = $_REQUEST["mdl_hd_ref_id"];
        $fw_to_id = $_REQUEST["original_fw_to"];
        // $ack_id = $_REQUEST["mdl_hd_ack_id"];
        $form_id = $_REQUEST["mdl_hd_form_id"];
        $id = $_REQUEST["mdl_hd_tbl_fw_id"];

        $fw_remark = isset($_REQUEST["mdl_forward_remark"]) ? $_REQUEST["mdl_forward_remark"] : "";
        if (forward_ackmt($emp_pf, $frm_ref_id, $fw_to_id, $fw_remark, $form_id)) {
            $Result["res"] = "success";
        }
        echo json_encode($Result);

        break;

    case 'get_emp_forms':

        $emp_no = $_POST['emp_pf'];
        $refernce_id = $_POST['reference_id'];
        $search_emp = "SELECT * from tbl_form_master_entry where emp_pf='$emp_no' and form_ref_id='$refernce_id' and status='1' ";
        $res_emp = mysqli_query($db_edar,$search_emp);

        if (mysqli_num_rows($res_emp) > 0) {
            $fetch_emp = mysqli_fetch_array($res_emp);
            $form_ids = $fetch_emp['form_ids'];
            $ack_ids = $fetch_emp['ack_ids'];
            $note_ids = $fetch_emp['note_ids'];
            $speaking_ids = $fetch_emp['speaking_ids'];
            $office_note_id = $fetch_emp["office_note_id"];

            $frms = explode(",", $form_ids);
            // print_r($frms);
            $sr = 0;
            foreach ($frms as $key => $frm_id) {
                $form_details = mysqli_query($db_edar,"SELECT tbl_form_details.id,form_name,form_id,form_reference_id,emp_id from tbl_form_details,tbl_master_form where tbl_master_form.id=tbl_form_details.form_id and form_id='$frm_id' and emp_id='$emp_no' ");
                while ($frm_get = mysqli_fetch_array($form_details)) {
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
            $explode = explode(",", $ack_ids);
            if (count($explode) > 0) {
                // print_r($explode);
                foreach ($explode as $value) {
                    // echo "hh";
                    // echo "<br>";
                    $sql_query_inner = "SELECT * FROM tbl_ack_sorder where id='$value'";
                    $sqll = mysqli_query($db_edar,$sql_query_inner);
                    $ack_fetch = mysqli_fetch_array($sqll);
                    // print_r($ack_fetch);
                    // echo "<br>";
                    $sr++;
                    echo "<tr>";
                    echo "<td>" . $sr . "</td>";
                    if ($ack_fetch['type_name'] == '1') {
                        echo "<td>Acknowledgement</td>";
                    } else if ($ack_fetch['type_name'] == '2') {
                        echo "<td>Explanation</td>";
                    }

                    echo "<td><a href='../common_print_files/ack.php?ack_id=" . $ack_fetch['id'] . "&emp_id=" . $ack_fetch['emp_id'] . "&refernce_id=" . $ack_fetch['form_reference_id'] . "&form_id=" . $ack_fetch['form_id'] . "'  class='btn btn-info'>View</a></td>";
                    echo "</tr>";
                }
            }

            if (!empty($note_ids)) {
                $explode = explode(",", $note_ids);

                foreach ($explode as  $value) {
                    $sqll = mysqli_query($db_edar,"SELECT * From  tbl_note where id='$value'");
                    $note_fetch = mysqli_fetch_array($sqll);

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
                    $sqll = mysqli_query($db_edar,"SELECT * From  tbl_ack_sorder where id='$value' and type_name='3'");
                    $ack_fetch = mysqli_fetch_array($sqll);
                    $sr++;
                    echo "<tr>";
                    echo "<td>" . $sr . "</td>";
                    if ($ack_fetch['type_name'] == '3') {
                        echo "<td>Speaking order</td>";
                    }
                    echo "<td>";
                    echo "<a href='../common_print_files/ack.php?ack_id=" . $ack_fetch['id'] . "&emp_id=" . $ack_fetch['emp_id'] . "&refernce_id=" . $ack_fetch['form_reference_id'] . "&form_id=" . $ack_fetch['form_id'] . "'   class='btn btn-info'>View</a>&nbsp;&nbsp";
                    echo "</td>";
                    echo "</tr>";
                }
            }
            $sr++;
            if (!empty($office_note_id)) {
                $sql_office_note = "SELECT * FROM `tbl_officer_note` WHERE `emp_pf`='$emp_no' AND `form_reference_id`='$form_ref_id'";
                $rst_office_note = mysqli_query($db_edar,$sql_office_note);
                if (mysqli_num_rows($rst_office_note) > 0) {
                    $rw_office_note = mysqli_fetch_assoc($rst_office_note);
                    // print_r($rw_office_note);
                    $emp_office_pf = $rw_office_note["emp_pf"];
                    $office_id = $rw_office_note["id"];
                    echo "<tr>
                            <td>$sr</td>
                            <td> Office Note</td>
                            <td>";
                    echo "<a href='../common_print_files/print_office_note.php?emp_pf=$emp_office_pf&office_id=$office_id' class='btn btn-info'>View</a> ";
                    echo "</td>
                        </tr>";
                }
            }
        } else {
            echo "<tr><td>Record Not Found!</td><td></td><td></td></tr>";
        }

        break;


    case 'get_emp_closed_forms':
        $emp_no = $_POST['emp_pf'];
        $refernce_id = $_POST['reference_id'];
        $search_emp = "SELECT * from tbl_form_master_entry where emp_pf='$emp_no' and form_ref_id='$refernce_id' and status='2' ";
        $res_emp = mysqli_query($db_edar,$search_emp);

        if (mysqli_num_rows($res_emp) > 0) {
            $fetch_emp = mysqli_fetch_array($res_emp);
            $form_ids = $fetch_emp['form_ids'];
            $ack_ids = $fetch_emp['ack_ids'];
            $note_ids = $fetch_emp['note_ids'];
            $speaking_ids = $fetch_emp['speaking_ids'];
            $office_note_id = $fetch_emp["office_note_id"];

            $frms = explode(",", $form_ids);
            // print_r($frms);
            $sr = 0;
            foreach ($frms as $key => $frm_id) {
                $form_details = mysqli_query($db_edar,"SELECT tbl_form_details.id,form_name,form_id,form_reference_id,emp_id from tbl_form_details,tbl_master_form where tbl_master_form.id=tbl_form_details.form_id and form_id='$frm_id' and emp_id='$emp_no' ");
                while ($frm_get = mysqli_fetch_array($form_details)) {
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
            $explode = explode(",", $ack_ids);
            if (count($explode) > 0) {
                // print_r($explode);
                foreach ($explode as $value) {
                    // echo "hh";
                    // echo "<br>";
                    $sql_query_inner = "SELECT * FROM tbl_ack_sorder where id='$value'";
                    $sqll = mysqli_query($db_edar,$sql_query_inner);
                    $ack_fetch = mysqli_fetch_array($sqll);
                    // print_r($ack_fetch);
                    // echo "<br>";
                    $sr++;
                    echo "<tr>";
                    echo "<td>" . $sr . "</td>";
                    if ($ack_fetch['type_name'] == '1') {
                        echo "<td>Acknowledgement</td>";
                    } else if ($ack_fetch['type_name'] == '2') {
                        echo "<td>Explanation</td>";
                    }

                    echo "<td><a href='../common_print_files/ack.php?ack_id=" . $ack_fetch['id'] . "&emp_id=" . $ack_fetch['emp_id'] . "&refernce_id=" . $ack_fetch['form_reference_id'] . "&form_id=" . $ack_fetch['form_id'] . "'  class='btn btn-info'>View</a></td>";
                    echo "</tr>";
                }
            }

            if (!empty($note_ids)) {
                $explode = explode(",", $note_ids);

                foreach ($explode as  $value) {
                    $sqll = mysqli_query($db_edar,"SELECT * From  tbl_note where id='$value'");
                    $note_fetch = mysqli_fetch_array($sqll);

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
                    $sqll = mysqli_query($db_edar,"SELECT * From  tbl_ack_sorder where id='$value' and type_name='3'");
                    $ack_fetch = mysqli_fetch_array($sqll);
                    $sr++;
                    echo "<tr>";
                    echo "<td>" . $sr . "</td>";
                    if ($ack_fetch['type_name'] == '3') {
                        echo "<td>Speaking order</td>";
                    }
                    echo "<td>";
                    // if (in_array("view", $display_array)) {
                    echo "<a href='../common_print_files/ack.php?ack_id=" . $ack_fetch['id'] . "&emp_id=" . $ack_fetch['emp_id'] . "&refernce_id=" . $ack_fetch['form_reference_id'] . "&form_id=" . $ack_fetch['form_id'] . "'   class='btn btn-info'>View</a>&nbsp;&nbsp";
                    // }

                    echo "</td>";
                    echo "</tr>";
                }
            }
            $sr++;
            if (!empty($office_note_id)) {
                $sql_office_note = "SELECT * FROM `tbl_officer_note` WHERE `emp_pf`='$emp_no' AND `form_reference_id`='$form_ref_id'";
                $rst_office_note = mysqli_query($db_edar,$sql_office_note,);
                if (mysqli_num_rows($rst_office_note) > 0) {
                    $rw_office_note = mysqli_fetch_assoc($rst_office_note);
                    // print_r($rw_office_note);
                    $emp_office_pf = $rw_office_note["emp_pf"];
                    $office_id = $rw_office_note["id"];
                    echo "<tr>
                    <td>$sr</td>
                    <td> Office Note</td>
                    <td>";

                    echo "<a href='../common_print_files/print_office_note.php?emp_pf=$emp_office_pf&office_id=$office_id' class='btn btn-info'>View</a> ";


                    echo "</td>
                </tr>";
                }
            }
        } else {
            echo "<tr><td>Record Not Found!</td><td></td><td></td></tr>";
        }

        break;

    default:
        echo "working";
        break;
}