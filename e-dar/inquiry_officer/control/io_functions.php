<?php
include_once("../../dbconfig/dbcon.php");
/**
 * @param 
 * @description 
 */

function add_note($emp_pf,$emp_form_ref,$type_id,$desc_note)
{
    global $db_edar;
    $current_user = $_SESSION["id"];
    $current_date = date("Y-m-d H:i:s");
    $push=array();

    $check_query = "SELECT * FROM `tbl_note` WHERE `emp_pf`='$emp_pf' and `form_reference_id`='$emp_form_ref' and type_of_note='$type_id' ";
    $rst_check_query = mysqli_query($db_edar,$check_query );
    if (mysqli_num_rows($rst_check_query) > 0) {
        $rw_check_query = mysqli_fetch_assoc($rst_check_query);
        $check_id = $rw_check_query["id"];

         $query = mysqli_query($db_edar,"UPDATE `tbl_note` SET `note`='$desc_note',`type_of_note`='$type_id',`created_date`='$current_date',`created_by`='$current_user' WHERE id='$check_id' and `form_reference_id`='$emp_form_ref' and `emp_pf`='$emp_pf'");
    } else {
            
            $query = mysqli_query($db_edar,"INSERT INTO `tbl_note`(`emp_pf`, `form_reference_id`, `note`, `type_of_note`, `created_date`, `created_by`) VALUES ('$emp_pf','$emp_form_ref','$desc_note','$type_id','$current_date','$current_user')");
            
            //up_master_entry_note_ids($emp_pf,$emp_form_ref);

            $sql=mysqli_query($db_edar,"SELECT * from tbl_form_master_entry where emp_pf='$emp_pf' and form_ref_id='$emp_form_ref' and status='1'");
            $fetch_sql=mysqli_fetch_array($sql);

            $sql_tbl_note=mysqli_query($db_edar,"SELECT * from tbl_note where emp_pf='$emp_pf' and form_reference_id='$emp_form_ref'");


            while ($row=mysqli_fetch_array($sql_tbl_note)) 
            {

                $id=$row['id'];

               
                array_push($push, $id);
                //print_r($push);

            }
            if($fetch_sql['note_ids']==null)
            {
             $sql_up=mysqli_query($db_edar,"UPDATE tbl_form_master_entry set note_ids='".$id."' where emp_pf='$emp_pf' and form_ref_id='$emp_form_ref'");
            }
            else
            {

            $note_id=implode(",", $push);
             $sql_up=mysqli_query($db_edar,"UPDATE tbl_form_master_entry set note_ids='".$note_id."' where emp_pf='$emp_pf' and form_ref_id='$emp_form_ref'");       
            }
            
        }
    
   

    // if (mysqli_query($query, $db_edar)) {
    //     return true;
    // }
     //echo $query;
    return true;
}

function forward_io_to_da($emp_pf,$frm_ref_id,$form_id,$fw_remark,$fw_to,$current_status)
{
    global $db_edar;
    
    $current_date = date("Y-m-d H:i:s");
    $current_role = $_SESSION['role'];    
    $current_user = $_SESSION["id"];

    $sql=mysqli_query($db_edar,"SELECT note_ids,ack_ids from tbl_form_master_entry where emp_pf='$emp_pf' and form_ref_id='$frm_ref_id'");
    $fetch_sql=mysqli_fetch_array($sql);


    $up_sql=mysqli_query($db_edar,"UPDATE  tbl_form_master_entry set current_status='$current_status' where emp_pf='$emp_pf' and form_ref_id='$frm_ref_id'");

    $sql_ins=mysqli_query($db_edar,"INSERT INTO `tbl_form_forward`(`form_reference_id`, `emp_pf`, `form_id`, `fw_from`, `fw_to`, `fw_date`, `status`, `remark`, `current_role`,`ack_id`, `note_id`) VALUES('$frm_ref_id','$emp_pf','$form_id','$current_user','$fw_to','$current_date','$current_status','$fw_remark','$current_role','".$fetch_sql['ack_ids']."','".$fetch_sql['note_ids']."') ");
    
    
    if ($sql_ins && $up_sql) {
            return true;
        
    }
    return false;
}

?>