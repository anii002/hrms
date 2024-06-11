<?php
session_start();
include_once("../../common_files/common_functions.php");
include_once("../../dbconfig/dbcon.php");
include_once("clerk_functions.php");
$action = strtolower($_REQUEST["action"]);
switch ($action) {
    case 'save_form':
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
            $query = "INSERT INTO `tbl_form_details`(`form_id`, `form_reference_id`, `form_no`, `railway_board`, `place_of_issue`, `form_dated`, `emp_id`, `effect_from`,`created_at`, `created_by`) VALUES ('$selected_form','$emp_form_ref','$form_no','$rail_board','$place_of_issue','$form_dated','$emp_pf','$sf1_effect_form','$current_date','$current_user')";
        }
        else if ($selected_form == 2) {
            $sf2_custody_on = $_REQUEST["hd_sf2_custody_on"];
            $sf2_date_of_detention =date('Y-m-d',strtotime($_REQUEST["hd_sf2_date_of_detention"]));
            $fun_res = save_sf2_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf, $sf2_custody_on, $sf2_date_of_detention);

        }
        else if ($selected_form == 3) {
            $sf3_holding_post = $_REQUEST["hd_sf3_holding_post"];
            
            $fun_res = save_sf3_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf, $sf3_holding_post);

        }
        else if ($selected_form == 4) {
            $sf4_made_by = $_REQUEST["hd_sf4_made_by"];
            $sf4_made_on = date('Y-m-d',strtotime($_REQUEST["hd_sf4_made_on"]));
            $sf4_effect_from = $_REQUEST["hd_sf4_effect_from"];
            
            $fun_res = save_sf4_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf, $sf4_made_by,$sf4_made_on,$sf4_effect_from);

        }
        else if ($selected_form == 7) {
            $sf7_mem_pfs = $_REQUEST["hd_sf7_mem_pfs"];
            $sf7_inquiry_officer_pf = $_REQUEST["hd_sf7_inquiry_officer_pf"];
            
            $fun_res = save_sf7_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf,$sf7_inquiry_officer_pf, $sf7_mem_pfs);

        }
        else if ($selected_form == 8) {
            $sf8_inquiry_officer_pf = $_REQUEST["hd_inquiry_officer_pf"];
            $sf8_presenting_officer_pf = $_REQUEST["hd_presenting_officer_pf"];
            
            $fun_res = save_sf8_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf,$sf8_inquiry_officer_pf, $sf8_presenting_officer_pf);

        }
        else if ($selected_form == 9) {
            $sf10_emp_pfs = $_REQUEST["hd_sf10_emp_pfs"];
            
            
            $fun_res = save_sf10_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf,$sf10_emp_pfs);

        }
        else if ($selected_form == 10) {
            $sf10a_order_no = $_REQUEST["hd_sf10a_order_no"];
            $sf10a_order_dated = date('Y-m-d',strtotime($_REQUEST["hd_sf10a_order_dated"]));
            $sf10a_appting_auth = $_REQUEST["hd_sf10a_appting_auth"];
            $sf10a_io = $_REQUEST["hd_sf10a_io"];
            
            
            $fun_res = save_sf10a_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf,$sf10a_order_no,$sf10a_order_dated,$sf10a_appting_auth,$sf10a_io);

        }
        else if ($selected_form == 11) {
            $sf10b_order_no = $_REQUEST["hd_sf10b_order_no"];
            $sf10b_order_dated = date('Y-m-d',strtotime($_REQUEST["hd_sf10b_order_dated"]));
            $sf10b_appting_auth = $_REQUEST["hd_sf10b_appting_auth"];
            $sf10b_po = $_REQUEST["hd_sf10b_po"];
                       
            $fun_res = save_sf10b_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf,$sf10b_order_no,$sf10b_order_dated,$sf10b_appting_auth,$sf10b_po);

        }
        else if ($selected_form == 12) {
            $fun_res = save_sf11_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf);

        }
        else if ($selected_form == 13) {
            $sf11b_mem_no = $_REQUEST["hd_sf11b_mem_no"];
            $sf11b_mem_dated = $_REQUEST["hd_sf11b_mem_dated"];
            $sf11b_mem_dated1 = date('Y-m-d',strtotime($_REQUEST["hd_sf11b_mem_dated"]));
            $sf11b_subject = $_REQUEST["hd_sf11b_subject"];
            $sf11b_io = $_REQUEST["hd_sf11b_io"];
            $sf11b_contact = $_REQUEST["hd_sf11b_contact"];
            $sf11b_gm_pf = $_REQUEST["hd_sf11b_gm_pf"];

            $fun_res = save_sf11b_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf,$sf11b_mem_no,$sf11b_mem_dated1,$sf11b_subject,$sf11b_io,$sf11b_contact,$sf11b_gm_pf);

        }
        else if ($selected_form == 15) {
            $sf11c_mem_no = $_REQUEST["hd_sf11c_mem_no"];
            $sf11c_mem_dated = $_REQUEST["hd_sf11c_mem_dated"];
            $sf11c_mem_dated1 = date('Y-m-d',strtotime($_REQUEST["hd_sf11c_mem_dated"]));
            $sf11c_on = $_REQUEST["hd_sf11c_on"];
            $sf11c_on1 = date('Y-m-d',strtotime($_REQUEST["hd_sf11c_on"]));
            $sf11c_gm_pf = $_REQUEST["hd_sf11c_gm_pf"];

            $fun_res = save_sf11c_form($selected_form, $emp_form_ref, $form_no, $rail_board, $place_of_issue, $form_dated, $emp_pf,$sf11c_mem_no,$sf11c_mem_dated1,$sf11c_on1,$sf11c_gm_pf);

        }
        
        else { }

        //echo update_master_entry($emp_pf, $emp_form_ref, $selected_form);
        if ($fun_res && update_master_entry($emp_pf, $emp_form_ref, $selected_form)) {
            $Result["res"] = "success";
        }

        echo json_encode($Result);


        //if (mysql_query($query, $db_edar)) { }

        break;
    case 'add_ackmt_note':
    $data='';
    $empid=$_POST['empid'];
    $refernce_id=$_POST['ref'];
    $type_id=$_POST['type_id'];
    $desc_note=($_POST['desc_note']);
    $form_id="123";
    $date=date('Y-m-d h:i:s');
    $ins_desc_note=mysql_query("INSERT INTO `tbl_ack_sorder`(`form_id`, `form_reference_id`, `emp_id`, `type_name`, `desc_note`, `created_date`) VALUES('".$form_id."','".$refernce_id."','".$empid."','".$type_id."','".$desc_note."','".$date."')",$db_edar);
    if($ins_desc_note)
    {
      $data=1;
    }
    echo $data;   
    break;

    case 'get_emp_forms':
        $emp_no=$_POST['emp_no'];
        $search_emp="SELECT * from tbl_form_master_entry where  emp_pf='$emp_no' and status='1' ";
        $res_emp=mysql_query($search_emp,$db_edar);
        
        $fetch_emp=mysql_fetch_array($res_emp);
        $form_ids=$fetch_emp['form_ids'];
        
        $frms=explode(",", $form_ids);

        //print_r($frms);
        $sr=0;
        foreach ($frms as $key => $frm_id) {
             $form_details=mysql_query("SELECT tbl_form_details.id,form_name,form_id,form_reference_id,emp_id from tbl_form_details,tbl_master_form where tbl_master_form.id=tbl_form_details.form_id and form_id='$frm_id' and emp_id='".$emp_no."' ",$db_edar);
             while($frm_get=mysql_fetch_array($form_details))
             {
                $sr++;
                //echo $frm_get['form_id']." ".$frm_get['form_no']."\n";
                echo "<tr>
                      <td>".$sr."</td>
                      <td>".$frm_get['form_name']."</td>";
                      if($frm_get['form_id']==1)
                      {
                        echo "<td><a href='../common_print_files/print_sf_1.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."'  class='btn btn-info'>View</a>
                          <a href='href='update_frms.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."''  class='btn btn-primary'>Update</a>
                          <a href='href='control/clerk_process.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."''  class='btn btn-danger'>Delete</a>  
                            </td>";  
                      }
                      else if($frm_get['form_id']==2)
                      {
                        echo "<td><a href='../common_print_files/print_sf_2.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."'  class='btn btn-info'>View</a>
                          <a href='update_frms.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."''  class='btn btn-primary'>Update</a>
                          <a href='print_sf_1.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."''  class='btn btn-danger'>Delete</a>  
                            </td>";  
                      }
                      else if($frm_get['form_id']==3)
                      {
                        echo "<td><a href='../common_print_files/print_sf_3.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."'  class='btn btn-info'>View</a>
                          <a href='update_frms.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."''  class='btn btn-primary'>Update</a>
                          <a href='print_sf_1.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."''  class='btn btn-danger'>Delete</a>  
                            </td>";  
                      }
                      else if($frm_get['form_id']==4)
                      {
                        echo "<td><a href='../common_print_files/print_sf_4.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."'  class='btn btn-info'>View</a>
                          <a href='update_frms.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."''  class='btn btn-primary'>Update</a>
                          <a href='print_sf_1.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."''  class='btn btn-danger'>Delete</a>  
                            </td>";  
                      }
                      else if($frm_get['form_id']==5)
                      {
                        echo "<td><a href='../common_print_files/print_sf_5.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."'  class='btn btn-info'>View</a>
                          <a href='update_frms.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."''  class='btn btn-primary'>Update</a>
                          <a href='print_sf_1.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."''  class='btn btn-danger'>Delete</a>  
                            </td>";  
                      }
                      else if($frm_get['form_id']==6)
                      {
                        echo "<td><a href='../common_print_files/print_sf_6.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."'  class='btn btn-info'>View</a>
                          <a href='update_frms.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."''  class='btn btn-primary'>Update</a>
                          <a href='print_sf_1.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."''  class='btn btn-danger'>Delete</a>  
                            </td>";    
                      }
                      else if($frm_get['form_id']==7)
                      {
                        echo "<td><a href='../common_print_files/print_sf_7.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."'  class='btn btn-info'>View</a>
                          <a href='update_frms.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."''  class='btn btn-primary'>Update</a>
                          <a href='print_sf_1.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."''  class='btn btn-danger'>Delete</a>  
                            </td>";   
                      }
                      else if($frm_get['form_id']==8)
                      {
                        echo "<td><a href='../common_print_files/print_sf_8.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."'  class='btn btn-info'>View</a>
                          <a href='update_frms.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."''  class='btn btn-primary'>Update</a>
                          <a href='print_sf_1.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."''  class='btn btn-danger'>Delete</a>  
                            </td>";  
                      }
                      else if($frm_get['form_id']==9)
                      {
                        echo "<td><a href='../common_print_files/print_sf_10.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."'  class='btn btn-info'>View</a>
                          <a href='update_frms.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."''  class='btn btn-primary'>Update</a>
                          <a href='print_sf_1.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."''  class='btn btn-danger'>Delete</a>  
                            </td>";   
                      }
                      else if($frm_get['form_id']==10)
                      {
                        echo "<td><a href='../common_print_files/print_sf_10_A.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."'  class='btn btn-info'>View</a>
                          <a href='update_frms.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."''  class='btn btn-primary'>Update</a>
                          <a href='print_sf_1.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."''  class='btn btn-danger'>Delete</a>  
                            </td>";  
                      }
                      else if($frm_get['form_id']==11)
                      {
                        echo "<td><a href='../common_print_files/print_sf_10_B.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."'  class='btn btn-info'>View</a>
                          <a href='update_frms.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."''  class='btn btn-primary'>Update</a>
                          <a href='print_sf_1.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."''  class='btn btn-danger'>Delete</a>  
                            </td>";  
                      }
                      else if($frm_get['form_id']==12)
                      {
                        echo "<td><a href='../common_print_files/print_sf_11.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."'  class='btn btn-info'>View</a>
                          <a href='update_frms.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."''  class='btn btn-primary'>Update</a>
                          <a href='print_sf_1.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."''  class='btn btn-danger'>Delete</a>  
                            </td>";  
                      }
                      else if($frm_get['form_id']==13)
                      {
                        echo "<td><a href='../common_print_files/print_sf_11_b.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."'  class='btn btn-info'>View</a>
                          <a href='update_frms.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."''  class='btn btn-primary'>Update</a>
                          <a href='print_sf_1.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."''  class='btn btn-danger'>Delete</a>  
                            </td>";   
                      }
                      else if($frm_get['form_id']==14)
                      {
                        echo "<td><a href='../common_print_files/print_sf_11b_annexure.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."'  class='btn btn-info'>View</a>
                          <a href='update_frms.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."''  class='btn btn-primary'>Update</a>
                          <a href='print_sf_1.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."''  class='btn btn-danger'>Delete</a>  
                            </td>";    
                      }
                      else if($frm_get['form_id']==15)
                      {
                        echo "<td><a href='../common_print_files/print_sf_11_c.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."'  class='btn btn-info'>View</a>
                          <a href='update_frms.php?id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."''  class='btn btn-primary'>Update</a>
                          <a href='control/clerk_process.php?action=delete_frms&id=".$frm_get['id']."&emp_id=".$frm_get['emp_id']."&refernce_id=".$frm_get['form_reference_id']."&form_id=".$frm_get['form_id']."''  class='btn btn-danger'>Delete</a>  
                            </td>";  
                      }

                      // <td><a href='view.php?id=".$frm_get['id']."'  class='btn btn-info'>View</a>
                      //     <button value='".$frm_get['id']."' class='btn btn-primary'>Update</button>
                      //     <button value='".$frm_get['id']."' class='btn btn-danger'>Delete</button>  
                      // </td>";

            }

        }
                
        break;

        case 'delete_frms':
                $fid=$_GET['id'];
                $emp_pf=$_GET['emp_id'];
                $ref_id=$_GET['refernce_id'];
                echo $form_id=$_GET['form_id'];
                
                $sql=mysql_query("SELECT * from tbl_form_master_entry where form_ref_id='".$ref_id."' and emp_pf='".$emp_pf."' and status='1' ",$db_edar);
                $sql_fetch=mysql_fetch_array($sql);
                $frm_ids=explode(",", $sql_fetch['form_ids']);
                print_r($frm_ids);
                if(($key=array_search($form_id, $frm_ids))!==false)
                {
                  unset($frm_ids[$key]);
                  print_r($frm_ids);
                  echo "yes";
                }
                else
                {
                  echo "nooo";
                }


                //$del_frm_detalis=mysql_query("DELETE from  tbl_form_details where id='".$_GET['id']."'",$db_edar);


          break;
    

    default:
        echo "working";
        break;
}