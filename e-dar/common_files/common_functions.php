<?php
function getrole($id)
{
    global $db_edar;
    $query = "select role_name from tbl_master_role where id='$id'";
    $result = mysqli_query($db_edar,$query);
    $value = mysqli_fetch_array($result);
    return $value['role_name'];
}
function getPenalyType($id)
{
    global $db_edar;
    $query = "SELECT penality_name FROM `tbl_penality_type` WHERE `id`='" . $id . "' ";
    $result = mysqli_query($db_edar,$query );
    $value = mysqli_fetch_array($result);
    return $value['penality_name'];
}

function get_status($id)
{
    global $db_edar;
    $query = "SELECT `status_name` FROM `tbl_master_status` WHERE `id`='$id'";
    $result = mysqli_query($db_edar,$query);
    $value = mysqli_fetch_array($result);
    return $value['status_name'];
}
function designation($id)
{
    global $db_common;
    $query = "select DESIGSHORTDESC from designations where DESIGCODE='$id'";
    $result = mysqli_query($db_common,$query, );
    $value = mysqli_fetch_array($result);
    return $value['DESIGSHORTDESC'];
}
function getdepartment($id)
{
    global $db_common;
    $query = "SELECT `DEPTDESC` FROM `departments` WHERE `DEPTNO`='$id' ";
    $result = mysqli_query($db_common,$query);
    // echo mysqli_error();
    // var_dump($result);
    $value = mysqli_fetch_array($result);
    return $value['DEPTDESC'];
}
/**
 * @param String emp_pf
 * @return Boolean if emp_pf is exist in registration_table return true or return false
 */
function verify_emp($emp_pf)
{
    global $db_common;
    $query = "SELECT * FROM `register_user` WHERE `emp_no`='$emp_pf'";
    $rst_emp = mysqli_query($db_common,$query);
    if (mysqli_num_rows($rst_emp) > 0) {
        return true;
    } else {
        return false;
    }
}
/**
 * @param String emp_pf
 * @return String if emp_pf is exist in registration_table return employee name or return ""
 */
function get_emp_name($emp_pf)
{
    global $db_common;
    $query = "SELECT `name` FROM `register_user` WHERE `emp_no`='$emp_pf'";
    $emp_name = "";
    $rst_emp = mysqli_query($db_common,$query);
    if (mysqli_num_rows($rst_emp) > 0) {
        while ($rw_emp = mysqli_fetch_assoc($rst_emp)) {
            $emp_name = $rw_emp["name"];
        }
    }
    return $emp_name;
}

function get_emp_address($emp_pf)
{
    global $db_common;
    $query = "SELECT `emp_address1` FROM `register_user` WHERE `emp_no`='$emp_pf'";
    $emp_name = "";
    $rst_emp = mysqli_query($db_common,$query);
    if (mysqli_num_rows($rst_emp) > 0) {
        while ($rw_emp = mysqli_fetch_assoc($rst_emp)) {
            $emp_name = $rw_emp["emp_address1"];
        }
    }
    return $emp_name;
}



function get_emp_designation($emp_pf)
{
    global $db_common;
    $query = "SELECT `designation` FROM `register_user` WHERE `emp_no`='$emp_pf'";
    $emp_desgi = "";
    $rst_emp = mysqli_query($db_common,$query);
    if (mysqli_num_rows($rst_emp) > 0) {
        while ($rw_emp = mysqli_fetch_assoc($rst_emp)) {
            $emp_desgi = $rw_emp["designation"];
        }
    }
    // return $emp_desgi;
    if ($emp_desgi != "") {
        $final_desgn = designation($emp_desgi);
    }
    return $final_desgn;
}
function get_emp_station($emp_pf)
{
    global $db_common;
    $sql = "SELECT `station` FROM `register_user` WHERE `emp_no`='$emp_pf'";
    $result = mysqli_query($db_common,$sql);
    $code = mysqli_fetch_array($result);
    $station = fetch_station($code["station"]);
    return $station;
}
function get_emp_dob($emp_pf)
{
    global $db_common;
    $sql = "SELECT `dob` FROM `register_user` WHERE `emp_no`='$emp_pf'";
    $rst_emp = mysqli_query($db_common,$sql);
    $rw_emp = mysqli_fetch_array($rst_emp);
    $emp_dob = $rw_emp["dob"];
    return $emp_dob;
}
function get_emp_doa($emp_pf)
{
    global $db_common;
    $sql = "SELECT `doa` FROM `register_user` WHERE `emp_no`='$emp_pf'";
    $rst_emp = mysqli_query($db_common,$sql);
    $rw_emp = mysqli_fetch_array($rst_emp);
    $emp_doa = $rw_emp["doa"];
    return $emp_doa;
}
function fetch_station($code)
{
    global $db_common;
    $query = "SELECT `stationdesc` FROM `station` WHERE `stationcode`='$code'";
    $result = mysqli_query($db_common,$query);
    $value = mysqli_fetch_array($result);
    return $value['stationdesc'];
}

function get_emp_ref($emp_pf)
{
    global $db_edar;
    $emp_form_ref = "";
    $query = "SELECT `form_ref_id` FROM `tbl_form_master_entry` WHERE `emp_pf`='$emp_pf' and `status`='1'";
    $rst_emp_ref = mysqli_query($db_edar,$query);
    if (mysqli_num_rows($rst_emp_ref) > 0) {
        $rw_emp_ref = mysqli_fetch_assoc($rst_emp_ref);
        $emp_form_ref = $rw_emp_ref["form_ref_id"];
    } else {
        $emp_form_ref = set_master_form($emp_pf);
    }
    return $emp_form_ref;
}
function get_new_ref()
{
    global $db_edar;
    $query = "SELECT COUNT(*) as cnt FROM tbl_form_master_entry";
    $result = mysqli_query($db_edar,$query);
    $value = mysqli_fetch_array($result);
    return ($value['cnt'] + 1);
}
function set_master_form($emp_pf)
{
    global $db_edar;
    $form_ref_id = get_new_ref();
    $sql_query = "INSERT INTO `tbl_form_master_entry`(`emp_pf`,`form_ref_id`, `status`) VALUES ('$emp_pf','$form_ref_id','1')";
    if (mysqli_query($db_edar,$sql_query)) {
        $emp_form_ref = $form_ref_id;
        return $emp_form_ref;
    } else {
        return false;
    }
}
function update_master_entry($emp_pf, $emp_form_ref, $selected_form)
{
    global $db_edar;
    // echo "emp_pf=>$emp_pf<br>";
    // echo "emp_form_ref=>$emp_form_ref<br>";
    // echo "selected_form=>$selected_form<br>";
    $query = "SELECT `form_ids` FROM `tbl_form_master_entry` WHERE `emp_pf`='$emp_pf' and `form_ref_id`='$emp_form_ref' and `status`='1'";
    $rst_emp_ref = mysqli_query($db_edar,$query);
    if (mysqli_num_rows($rst_emp_ref) > 0) {
        $rw_emp_ref = mysqli_fetch_assoc($rst_emp_ref);
        // print_r($rw_emp_ref);
        $emp_form_ids = $rw_emp_ref["form_ids"];
        // var_dump($emp_form_ids);
        $emp_forms_array = ($emp_form_ids == "") ? "" : explode(",", $emp_form_ids);
        $sql_master_update = "";
        if ($emp_forms_array == "") {
            $sql_master_update = "UPDATE `tbl_form_master_entry` SET `form_ids`='$selected_form' WHERE `form_ref_id`='$emp_form_ref' and `emp_pf`='$emp_pf' and `status`='1'";
        } else {
            if (!in_array($selected_form, $emp_forms_array)) {
                array_push($emp_forms_array, $selected_form);
            }
            $form_ref_ids = implode(",", $emp_forms_array);
            $sql_master_update = "UPDATE `tbl_form_master_entry` SET `form_ids`='$form_ref_ids' WHERE `form_ref_id`='$emp_form_ref' and `emp_pf`='$emp_pf' and `status`='1'";
        }
        // echo $sql_master_update;
        if (mysqli_query($db_edar,$sql_master_update)) {
            return true;
        } else {
            return false;
        }
    }
}
function check_is_da($role)
{
    $roles_array = array(3);
    $user_role = explode(",", $role);
    $res = count(array_intersect($user_role, $roles_array)) > 0 ? true : false;
    return $res;
}
function check_is_iq($role)
{
    $roles_array = array(4);
    $user_role = explode(",", $role);
    $res = count(array_intersect($user_role, $roles_array)) > 0 ? true : false;
    return $res;
}
function forward_forms($emp_pf, $fw_emp_id, $fw_remark, $status)
{
    global $db_edar;
    $ref_id = get_emp_ref($emp_pf);
    $form_ids = get_emp_forms($emp_pf, $ref_id);
    $current_date = date("Y-m-d H:i:s");
    $current_role = $_SESSION['role'];
    $current_user = $_SESSION["id"];
    $sql = "INSERT INTO `tbl_form_forward`(`form_reference_id`, `emp_pf`, `form_id`, `fw_from`, `fw_to`, `fw_date`, `status`, `remark`,`current_role`) VALUES ('$ref_id','$emp_pf','$form_ids','$current_user','$fw_emp_id','$current_date','$status','$fw_remark','$current_role')";
    if (mysqli_query($db_edar,$sql)) {
        $update_all_frm_id = mysqli_query($db_edar,"UPDATE tbl_form_details set DA_pf='$fw_emp_id' where emp_id='$emp_pf' and  form_reference_id='$ref_id'");
        if ($update_all_frm_id && update_master_entry_status($status, $emp_pf, $ref_id)) {
            return true;
        }
    }
    return false;
}
function update_master_entry_status($current_status, $emp_pf, $ref_no)
{
    global $db_edar;
    $update_sql = "UPDATE `tbl_form_master_entry` SET `current_status`='$current_status' WHERE `form_ref_id`='$ref_no' AND `emp_pf`='$emp_pf' AND `status`='1'";
    if (mysqli_query($db_edar,$update_sql)) {
        return true;
    }
    return false;
}
function update_master_entry_status_close($current_status, $emp_pf, $ref_no)
{
    global $db_edar;
    $update_sql = "UPDATE `tbl_form_master_entry` SET `current_status`='$current_status',`status`='2' WHERE `form_ref_id`='$ref_no' AND `emp_pf`='$emp_pf'";
    if (mysqli_query($db_edar,$update_sql)) {
        return true;
    }
    return false;
}
function get_emp_forms($emp_pf, $ref_no)
{
    global $db_edar;
    $sql = "SELECT `form_ids` FROM `tbl_form_master_entry` WHERE `emp_pf`='$emp_pf' AND `status`='1' AND `form_ref_id`=' $ref_no'";
    $rst_emp_forms = mysqli_query($db_edar,$sql);
    $form_ids = "";
    // var_dump($rst_emp_forms);
    // echo mysqli_num_rows($rst_emp_forms);
    if (mysqli_num_rows($rst_emp_forms) > 0) {
        $rw_emp_forms = mysqli_fetch_assoc($rst_emp_forms);
        $form_ids = $rw_emp_forms["form_ids"];
    }
    return $form_ids;
}
function get_clerk_id($emp_pf, $ref_no)
{
    global $db_edar;
    $sql = "SELECT `fw_from` FROM `tbl_form_forward` WHERE emp_pf='$emp_pf' AND form_reference_id='$ref_no' AND `status`='2' AND `current_role`='2'";
    // $sql = "SELECT `form_ids` FROM `tbl_form_master_entry` WHERE `emp_pf`='$emp_pf' AND `status`='1' AND `form_ref_id`=' $ref_no'";
    $rst_clerk_id = mysqli_query($db_edar,$sql);
    $clerk_id = "";
    // var_dump($rst_emp_forms);
    // echo mysqli_num_rows($rst_emp_forms);
    if (mysqli_num_rows($rst_clerk_id) > 0) {
        $rw_emp_forms = mysqli_fetch_assoc($rst_clerk_id);
        $clerk_id = $rw_emp_forms["fw_from"];
    }
    return $clerk_id;
}
function get_io_id($emp_pf, $ref_no)
{
    global $db_edar;
    $sql = "SELECT `fw_from` FROM `tbl_form_forward` WHERE emp_pf='$emp_pf' AND form_reference_id='$ref_no' AND `status`='8' AND `current_role`='4'";
    // $sql = "SELECT `form_ids` FROM `tbl_form_master_entry` WHERE `emp_pf`='$emp_pf' AND `status`='1' AND `form_ref_id`=' $ref_no'";
    $rst_io_id = mysqli_query($db_edar,$sql);
    $io_id = "";
    // var_dump($rst_emp_forms);
    // echo mysqli_num_rows($rst_emp_forms);
    if (mysqli_num_rows($rst_io_id) > 0) {
        $rw_emp_forms = mysqli_fetch_assoc($rst_io_id);
        $io_id = $rw_emp_forms["fw_from"];
    }
    return $io_id;
}
// .......................................................
function get_emp_name_from_id($id) {
    global $db_edar, $db_common_name;
    // Prepare the query
    $query = "SELECT `name` FROM drmpsurh_sur_railway.register_user, drmpsurh_e_dar.tbl_user WHERE register_user.emp_no = tbl_user.emp_id AND tbl_user.id = '$id'";

    // Execute the query
    $rst_emp = mysqli_query($db_edar, $query);
    $emp_name = "";

    // Check if any rows were returned and fetch the name
    if (mysqli_num_rows($rst_emp) > 0) {
        while ($rw_emp = mysqli_fetch_assoc($rst_emp)) {
            $emp_name = $rw_emp["name"];
        }
    }

    return $emp_name;
}

function get_emp_desig_from_id($id) {
    global $db_edar, $db_common;

    // Ensure global variables for database names are accessible
    global $db_edar_name, $db_common_name;

    // Prepare the query
    $query = "SELECT `designation` FROM $db_common_name.register_user, $db_edar_name.tbl_user WHERE register_user.emp_no = tbl_user.emp_id AND tbl_user.id = '$id'";

    // Execute the query using the $db_edar connection
    $rst_emp = mysqli_query($db_edar, $query);
    $emp_desgi = "";

    // Check if any rows were returned and fetch the designation
    if (mysqli_num_rows($rst_emp) > 0) {
        while ($rw_emp = mysqli_fetch_assoc($rst_emp)) {
            $emp_desgi = $rw_emp["designation"];
        }
    }

    // Check if designation is not empty and get the final designation
    $final_desgn = "";
    if ($emp_desgi != "") {
        $final_desgn = designation($emp_desgi);
    }

    return $final_desgn;
}


function fetch_emp_place($emp_pf)
{
    global $db_common;
    $sql = mysqli_query($db_common,"SELECT station from register_user where emp_no='$emp_pf'");
    $fetch = mysqli_fetch_array($sql);
    $query = "SELECT `stationdesc` FROM `station` WHERE `stationcode`='" . $fetch['station'] . "'";
    $result = mysqli_query($db_common,$query);
    $value = mysqli_fetch_array($result);
    return $value['stationdesc'];
}
// ........................................................