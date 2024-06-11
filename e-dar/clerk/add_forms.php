<?php
$GLOBALS['flag'] = "1.2";
include_once('../common_files/header.php');
?>
<link rel="stylesheet" href="../common_print_files/modal.css">
<?php
if (!isset($_GET["emp_pf"])) {
    ?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">

        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.php">Home </a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Forms of Employee</a>     
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-book"></i> Forms of Employee
                    </div>

                </div>
                <div class="portlet-body">
                    <h4>Please Goto the employee Forms and the Click on Add Forms</h4>
                </div>
            </div>

        </div>
        <!-- END DASHBOARD STATS -->
        <div class="clearfix">
        </div>
    </div>
</div>
<?php
} else {
    $emp_pf = $_GET["emp_pf"];
    if (!verify_emp($emp_pf)) {
        ?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.php">Home </a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Forms of Employee</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-book"></i> Forms of Employee
                    </div>

                </div>
                <div class="portlet-body">
                    <h4>Please Verify the employee</h4>
                </div>
            </div>

        </div>
        <!-- END DASHBOARD STATS -->
        <div class="clearfix">
        </div>
    </div>
</div>
<?php } else {
        $emp_name = get_emp_name($emp_pf);
        $emp_desig = get_emp_designation($emp_pf);
        ?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.php">Home </a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#.">Add Forms to Employee</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <form id="frm_add_form" method="POST" autocomplete="off">
                        <div class="caption">
                            <i class="fa fa-book"></i> Add Forms to Employee
                        </div>
                </div>
                <div class="portlet-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-3">
                                <input type="hidden" name="txt_emp_pf" id="txt_emp_pf" value="<?php echo $emp_pf; ?>">
                                <p>Employee Name</p>
                            </div>
                            <div class="col-md-3">
                                <p><?php echo $emp_name; ?></p>
                            </div>
                            <div class="col-md-3">
                                <p>Employee Designation</p>
                            </div>
                            <div class="col-md-3">
                                <p><?php echo $emp_desig; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <label for="lst_penalty_type">Select Penalty Type</label>
                            </div>
                            <div class="col-md-2">
                                <select name="lst_penalty_type" id="lst_penalty_type" class="select2 billunitindex"
                                    style="width:100%" required>
                                    <option value="0" selected disabled>Select Penalty Type</option>
                                    <?php
                                            $sql = "SELECT `id`,`penality_name` FROM `tbl_penality_type` WHERE `status`='1'";
                                            $rst_penalty_type = mysql_query($sql, $db_edar);
                                            while ($rw_penalty_type = mysql_fetch_assoc($rst_penalty_type)) {
                                                extract($rw_penalty_type);
                                                echo "<option value='$id'>$penality_name</option>";
                                            }
                                            ?>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="lst_forms">Select Form</label>
                            </div>
                            <div class="col-md-4">
                                <select name="lst_forms" id="lst_forms" class="select2 billunitindex" style="width:100%"
                                    required>
                                    <option value="0" selected disabled>Select Form</option>
                                    <?php
                                            $sql = "SELECT `id`,`form_name`,`form_title` FROM `tbl_master_form` WHERE `status`='1'";
                                            $rst_forms = mysql_query($sql, $db_edar);
                                            while ($rw_forms = mysql_fetch_assoc($rst_forms)) {
                                                extract($rw_forms);
                                                echo "<option value='$id' data-form-name='$form_name'>$form_title</option>";
                                            }
                                            ?>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-1">
                                <label for="txt_no">No:</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="txt_no" id="txt_no" class="form-control" required>
                            </div>
                            <div class="col-md-1">
                                <label for="txt_rail_board">Railway :</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="txt_rail_board" id="txt_rail_board" class="form-control"
                                    required>
                            </div>
                            <div class="col-md-1">
                                <label for="txt_place_of_issue">Place Of Issue :</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="txt_place_of_issue" id="txt_place_of_issue"
                                    class="form-control" required>
                            </div>
                            <div class="col-md-1">
                                <label for="txt_dated">Dated :</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="txt_dated" id="txt_dated" class="form-control datepicker"
                                    placeholder="dd-mm-yyyy" required>
                            </div>
                        </div>
                        <hr>
                        <div class="row div_hide" id="div_sf1">
                            <div class="col-md-3">
                                <label for="txt_sf1_effect_form">Effect Form :</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="txt_sf1_effect_form" id="txt_sf1_effect_form"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="div_hide" id="div_sf2">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="txt_sf2_custody_on" class="form-label">custody on :</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="txt_sf2_custody_on" id="txt_sf2_custody_on"
                                        class="form-control">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="txt_sf2_date_of_detention">Date of Detention :</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="txt_sf2_date_of_detention" placeholder="dd-mm-yyyy"
                                        id="txt_sf2_date_of_detention" class="form-control datepicker"
                                        autocomplete="off">

                                </div>
                            </div>
                        </div>
                        <div class="div_hide" id="div_sf3">

                            <div class="row">
                                <div class="col-md-3">
                                    <label for="txt_sf3_holding_post" class="form-label">Holding the post of :</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="txt_sf3_holding_post" id="txt_sf3_holding_post"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="div_hide" id="div_sf4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="txt_sf4_made_by" class="form-label">Made By:</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="txt_sf4_made_by" id="txt_sf4_made_by" class="form-control">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="txt_sf4_made_by" class="form-label">Made On :</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="txt_sf4_made_on" id="txt_sf4_made_on"
                                        class="form-control datepicker">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="txt_sf4_effect_from" class="form-label">Effect From :</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="txt_sf4_effect_from" id="txt_sf4_effect_from"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="div_hide" id="div_sf5">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="txt_sf5_contact" class="form-label">Contact:</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="txt_sf5_contact" id="txt_sf5_contact" class="form-control">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="txt_sf5_gm_pf" class="form-label">Select General Manager:</label>
                                </div>
                                <div class="col-md-4">
                                    <select name="txt_sf5_gm_pf" id="txt_sf5_gm_pf" class="select2 billunitindex"
                                        style="width:100%">
                                        <option value="0" selected="selected" disabled="disabled">Select General Manager
                                        </option>
                                        <?php
                                                $query = "SELECT `emp_no`,`name` FROM `resgister_user`";
                                                $rst_emp = mysql_query($query, $db_common);
                                                while ($rw_emp = mysql_fetch_assoc($rst_emp)) {
                                                    // print_r($rw_emp);
                                                    extract($rw_emp);
                                                    echo "<option value='$emp_no'>$name</option>";
                                                }
                                                ?>
                                    </select>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="txt_sf5_amt" class="form-label">Enter Amount:</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="txt_sf5_amt" id="txt_sf5_amt" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div id="div_sf6" class="div_hide">
                            <div class="row " id="div_sf6">
                                <div class="col-md-3">
                                    <label for="txt_sf6_subject">Requesting Subject:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="txt_sf6_subject" id="txt_sf6_subject" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="txt_sf6_memo_mo">Memorandum No :</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="txt_sf6_memo_no" id="txt_sf6_memo_no" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="txt_sf6_memo_dated">Dated</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="txt_sf6_memo_dated" id="txt_sf6_memo_dated"
                                        class="form-control datepicker" placeholder="dd-mm-yyyy">
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="row">
                                <div class="col-md-10 text-center">
                                    <h4><b>Description of Records & Reasons</b></h4>
                                </div>
                                <div class="col-md-2 pull-right">
                                    <input type="button" value="Add Row" class="btn btn-success"
                                        onClick="add_sf6_row();">
                                </div>
                            </div>
                            <table class="table table-responsive table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Description of records</th>
                                        <th>Reasons for refusing inspecton or taking extracts</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="tbl_sf6_div">
                                    <tr id="tr_sf6_1">
                                        <td>1</td>
                                        <td>
                                            <input type="text" name="txt_sf6_desc_rec[]" id="txt_sf6_desc_rec1"
                                                class="form-control cls_sf6_desc_rec">
                                        </td>
                                        <td>
                                            <input type="text" name="txt_sf6_reason[]" id="txt_sf6_reason1"
                                                class="form-control cls_sf6_reason">
                                        </td>
                                        <td>
                                            <input type="button" value="Remove" class="btn btn-danger sf6_remove_row"
                                                id="btn_sf6_remove_1">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="div_hide" id="div_sf7">
                            <div class="row">
                                <div class="col-md-10 text-center">
                                    <h4><b>Board of Inquiry consisting of</b></h4>
                                </div>
                                <div class="col-md-2 pull-right">
                                    <input type="button" value="Add Row" class="btn btn-success"
                                        onClick="add_sf7_row();">
                                </div>
                            </div>
                            <table class="table table-responsive table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Name of Member</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="tbl_sf7_div">
                                    <tr id="tr_sf7_1">
                                        <td>1</td>
                                        <td>
                                            <!-- <input type="text" name="txt_sf7_member_name[]" id="txt_sf7_member_name"
                                   class="form-control cls_sf7_mem_name"> -->
                                            <select name="txt_sf7_member_name[]" id="txt_sf7_member_name"
                                                class="select2 billunitindex cls_sf7_mem_name" style="width:100%">
                                                <option value="0" selected="selected" disabled="disabled">Select General
                                                    Manager</option>
                                                <?php
                                                        $query = "SELECT `emp_no`,`name` FROM `resgister_user`";
                                                        $rst_emp = mysql_query($query, $db_common);
                                                        while ($rw_emp = mysql_fetch_assoc($rst_emp)) {
                                                            // print_r($rw_emp);
                                                            extract($rw_emp);
                                                            echo "<option value='$emp_no'>$name</option>";
                                                        }
                                                        ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="button" value="Remove" class="btn btn-danger sf7_remove_row"
                                                id="btn_sf7_remove_1">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="inquiry_officer_pf" class="form-label">Select Inquiry Officer</label>
                                </div>
                                <div class="col-md-4">
                                    <select name="inquiry_officer_pf" id="inquiry_officer_pf"
                                        class="form-control select2me billunitindex" style="width: 100%;" tabindex="-1">
                                        <option value="" selected="" disabled="">Select Inquiry Officer</option>

                                        <?php
                                                $query_src = "SELECT $db_edar_name.tbl_user.id,emp_id,role,name,$db_edar_name.tbl_user.status FROM $db_edar_name.tbl_user,$db_common_name.resgister_user WHERE $db_edar_name.tbl_user.emp_id=$db_common_name.resgister_user.emp_no and role not in(1)";
                                                $result_src = mysql_query($query_src, $db_edar);
                                                while ($value_src = mysql_fetch_array($result_src)) {

                                                    $val = explode(",", $value_src['role']);

                                                    $names = array();
                                                    foreach ($val as $key => $value) {
                                                        if ($value == 4) {
                                                            $role_name = getrole($value);
                                                            array_push($names, $role_name);
                                                        }
                                                    }
                                                    //print_r($names);
                                                    if (empty($names)) {
                                                        echo "<td>-</td>";
                                                    } else {

                                                        echo "<option value='" . $value_src['emp_id'] . "'>" . $value_src['name'] . "(" . implode(" / ", $names) . ")" . "</option>";
                                                    }
                                                }


                                                ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="div_hide" id="div_sf8">

                            <div class="row">
                                <div class="col-md-3">
                                    <label for="presenting_officer_pf" class="form-label">Select Presenting
                                        Officer</label>
                                </div>
                                <div class="col-md-4">
                                    <select name="presenting_officer_pf" id="presenting_officer_pf"
                                        class="form-control select2me billunitindex" style="width: 100%;" tabindex="-1">
                                        <option value="" selected="" disabled="">Select Presenting Officer</option>

                                        <?php
                                                $query_src = "SELECT $db_edar_name.tbl_user.id,emp_id,role,name,$db_edar_name.tbl_user.status FROM $db_edar_name.tbl_user,$db_common_name.resgister_user WHERE $db_edar_name.tbl_user.emp_id=$db_common_name.resgister_user.emp_no and role not in(1)";
                                                $result_src = mysql_query($query_src, $db_edar);
                                                while ($value_src = mysql_fetch_array($result_src)) {
    
                                                    $val = explode(",", $value_src['role']);
    
                                                    $names = array();
                                                    foreach ($val as $key => $value) {
                                                        if ($value == 5) {
                                                            $role_name = getrole($value);
                                                            array_push($names, $role_name);
                                                        }
                                                    }
                                                    //print_r($names);
                                                    if (empty($names)) {
                                                        echo "<td>-</td>";
                                                    } else {
                                                        
                                                        echo "<option value='" . $value_src['emp_id'] . "'>" .$value_src['name']. "(".implode(" / ", $names).")" . "</option>";
                                                    }
                                                }
    
    
                                                ?>
                                    </select>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="inquiry_officer_pf" class="form-label">Select Inquiry Officer</label>
                                </div>
                                <div class="col-md-4">
                                    <select name="inquiry_officer_pf" id="inquiry_officer_pf"
                                        class="form-control select2me billunitindex" style="width: 100%;" tabindex="-1">
                                        <option value="" selected="" disabled="">Select Inquiry Officer</option>

                                        <?php
                                                $query_src = "SELECT $db_edar_name.tbl_user.id,emp_id,role,name,$db_edar_name.tbl_user.status FROM $db_edar_name.tbl_user,$db_common_name.resgister_user WHERE $db_edar_name.tbl_user.emp_id=$db_common_name.resgister_user.emp_no and role not in(1)";
                                                $result_src = mysql_query($query_src, $db_edar);
                                                while ($value_src = mysql_fetch_array($result_src)) {
    
                                                    $val = explode(",", $value_src['role']);
    
                                                    $names = array();
                                                    foreach ($val as $key => $value) {
                                                        if ($value == 4) {
                                                            $role_name = getrole($value);
                                                            array_push($names, $role_name);
                                                        }
                                                    }
                                                    //print_r($names);
                                                    if (empty($names)) {
                                                        echo "<td>-</td>";
                                                    } else {
                                                        
                                                        echo "<option value='" . $value_src['emp_id'] . "'>" .$value_src['name']. "(".implode(" / ", $names).")" . "</option>";
                                                    }
                                                }
                                                ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="div_hide" id="div_sf10">

                            <div class="col-md-10 text-center">
                                <h4><b>Add Railway Servants</b></h4>
                            </div>
                            <div class="col-md-2 pull-right">
                                <input type="button" value="Add Row" class="btn btn-success" onClick="add_sf10_row();">
                            </div>

                            <table class="table table-responsive table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Employee Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="tbl_sf10_div">
                                    <tr id="tr_sf10_1">
                                        <td>1</td>
                                        <td>
                                            <select name="txt_sf10_member_name[]" id="txt_sf10_member_name"
                                                class="select2 billunitindex cls_sf10_mem_name" style="width:100%">
                                                <option value="0" selected="selected" disabled="disabled">Select
                                                    Employee</option>
                                                <?php
                                   $query = "SELECT `emp_no`,`name` FROM `resgister_user`";
                                   $rst_emp = mysql_query($query, $db_common);
                                   while ($rw_emp = mysql_fetch_assoc($rst_emp)) {
                                       // print_r($rw_emp);
                                       extract($rw_emp);
                                       echo "<option value='$emp_no'>$name</option>";
                                   }
                                   ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="button" value="Remove" class="btn btn-danger sf10_remove_row"
                                                id="btn_sf10_remove_1">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- <div class='dyn_add_emp'>
                           </div> -->
                        </div>

                        <div class="div_hide" id="div_sf10a">

                            <div class="row">
                                <div class="col-md-3">
                                    <label for="txt_sf10a_order_no" class="form-label">Order No:</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="txt_sf10a_order_no"
                                        id="txt_sf10a_order_no">
                                </div>
                            </div> <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="txt_sf10a_order_dated" class="form-label">Order Dated:</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control datepicker" name="txt_sf10a_order_dated"
                                        id="txt_sf10a_order_dated" autocomplete="off">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="txt_sf10a_appting_auth" class="form-label">Select Appointing
                                        Authority:</label>
                                </div>
                                <div class="col-md-4">
                                    <select name="txt_sf10a_appting_auth" id="txt_sf10a_appting_auth"
                                        class="form-control select2 billunitindex sf_10_add_emp" style="width:100%">
                                        <option value="0" selected="selected" disabled="disabled">Select Appointing
                                            Authority</option>

                                        <?php
                                               $query_src = "SELECT $db_edar_name.tbl_user.id,emp_id,role,name,$db_edar_name.tbl_user.status FROM $db_edar_name.tbl_user,$db_common_name.resgister_user WHERE $db_edar_name.tbl_user.emp_id=$db_common_name.resgister_user.emp_no and role not in(1)";
                                               $result_src = mysql_query($query_src, $db_edar);
                                               while ($value_src = mysql_fetch_array($result_src)) {
   
                                                   $val = explode(",", $value_src['role']);
   
                                                   $names = array();
                                                   foreach ($val as $key => $value) {
                                                       if ($value == 3) {
                                                           $role_name = getrole($value);
                                                           array_push($names, $role_name);
                                                       }
                                                   }
                                                   //print_r($names);
                                                   if (empty($names)) {
                                                       echo "<td>-</td>";
                                                   } else {
                                                       
                                                       echo "<option value='" . $value_src['emp_id'] . "'>" .$value_src['name']. "(".implode(" / ", $names).")" . "</option>";
                                                   }
                                               }
   
   
                                               ?>
                                    </select>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="txt_sf10a_io" class="form-label">Select Inquiry Officer:</label>
                                </div>
                                <div class="col-md-4">
                                    <select name="txt_sf10a_io" id="txt_sf10a_io"
                                        class="form-control select2 billunitindex sf_10_add_emp" style="width:100%">
                                        <option value="0" selected="selected" disabled="disabled">Select Inquiry Officer
                                        </option>

                                        <?php
                                               $query_src = "SELECT $db_edar_name.tbl_user.id,emp_id,role,name,$db_edar_name.tbl_user.status FROM $db_edar_name.tbl_user,$db_common_name.resgister_user WHERE $db_edar_name.tbl_user.emp_id=$db_common_name.resgister_user.emp_no and role not in(1)";
                                               $result_src = mysql_query($query_src, $db_edar);
                                               while ($value_src = mysql_fetch_array($result_src)) {
   
                                                   $val = explode(",", $value_src['role']);
   
                                                   $names = array();
                                                   foreach ($val as $key => $value) {
                                                       if ($value == 4) {
                                                           $role_name = getrole($value);
                                                           array_push($names, $role_name);
                                                       }
                                                   }
                                                   //print_r($names);
                                                   if (empty($names)) {
                                                       echo "<td>-</td>";
                                                   } else { 
                                                       echo "<option value='" . $value_src['emp_id'] . "'>" .$value_src['name']. "(".implode(" / ", $names).")" . "</option>";
                                                   }
                                               }
   
   
                                               ?>
                                    </select>
                                </div>
                            </div>


                        </div>

                        <div class="div_hide" id="div_sf10b">

                            <div class="row">
                                <div class="col-md-3">
                                    <label for="txt_sf10b_order_no" class="form-label">Order No:</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="txt_sf10b_order_no"
                                        id="txt_sf10b_order_no">
                                </div>
                            </div> <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="txt_sf10b_order_dated" class="form-label">Order Dated:</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control datepicker" name="txt_sf10b_order_dated"
                                        id="txt_sf10b_order_dated" autocomplete="off">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="txt_sf10b_appting_auth" class="form-label">Select Appointing
                                        Authority:</label>
                                </div>
                                <div class="col-md-4">
                                    <select name="txt_sf10b_appting_auth" id="txt_sf10b_appting_auth"
                                        class="form-control select2 billunitindex sf_10_add_emp" style="width:100%">
                                        <option value="0" selected="selected" disabled="disabled">Select Appointing
                                            Authority</option>

                                        <?php
                                               $query_src = "SELECT $db_edar_name.tbl_user.id,emp_id,role,name,$db_edar_name.tbl_user.status FROM $db_edar_name.tbl_user,$db_common_name.resgister_user WHERE $db_edar_name.tbl_user.emp_id=$db_common_name.resgister_user.emp_no and role not in(1)";
                                               $result_src = mysql_query($query_src, $db_edar);
                                               while ($value_src = mysql_fetch_array($result_src)) {
   
                                                   $val = explode(",", $value_src['role']);
   
                                                   $names = array();
                                                   foreach ($val as $key => $value) {
                                                       if ($value == 3) {
                                                           $role_name = getrole($value);
                                                           array_push($names, $role_name);
                                                       }
                                                   }
                                                   //print_r($names);
                                                   if (empty($names)) {
                                                       echo "<td>-</td>";
                                                   } else {
                                                       
                                                       echo "<option value='" . $value_src['emp_id'] . "'>" .$value_src['name']. "(".implode(" / ", $names).")" . "</option>";
                                                   }
                                               }
   
   
                                               ?>
                                    </select>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="txt_sf10b_po" class="form-label">Select Presenting Officer:</label>
                                </div>
                                <div class="col-md-4">
                                    <select name="txt_sf10b_po" id="txt_sf10b_po"
                                        class="form-control select2 billunitindex sf_10_add_emp" style="width:100%">
                                        <option value="0" selected="selected" disabled="disabled">Select Presenting
                                            Officer</option>

                                        <?php
                                               $query_src = "SELECT $db_edar_name.tbl_user.id,emp_id,role,name,$db_edar_name.tbl_user.status FROM $db_edar_name.tbl_user,$db_common_name.resgister_user WHERE $db_edar_name.tbl_user.emp_id=$db_common_name.resgister_user.emp_no and role not in(1)";
                                               $result_src = mysql_query($query_src, $db_edar);
                                               while ($value_src = mysql_fetch_array($result_src)) {
   
                                                   $val = explode(",", $value_src['role']);
   
                                                   $names = array();
                                                   foreach ($val as $key => $value) {
                                                       if ($value == 5) {
                                                           $role_name = getrole($value);
                                                           array_push($names, $role_name);
                                                       }
                                                   }
                                                   //print_r($names);
                                                   if (empty($names)) {
                                                       echo "<td>-</td>";
                                                   } else {
                                                       
                                                       echo "<option value='" . $value_src['emp_id'] . "'>" .$value_src['name']. "(".implode(" / ", $names).")" . "</option>";
                                                   }
                                               }
   
   
                                               ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="div_hide" id="div_sf11_b">

                            <div class="row">
                                <div class="col-md-3">
                                    <label for="txt_sf11b_mem_no" class="form-label">Memorandum No:</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="txt_sf11b_mem_no"
                                        id="txt_sf11b_mem_no">
                                </div>
                            </div> <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="txt_sf11b_mem_dated" class="form-label">Memorandum Dated:</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control datepicker" name="txt_sf11b_mem_dated"
                                        id="txt_sf11b_mem_dated" autocomplete="off">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="txt_sf11b_common" class="form-label">the *President/Railway
                                        Board/undersigned is/are of the opinion:</label>
                                </div>
                                <div class="col-md-4">
                                    <textarea class="form-control" name="txt_sf11b_common" id="txt_sf11b_common"
                                        autocomplete="off"></textarea>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="txt_sf11b_io" class="form-label">Select Inquiry Officer:</label>
                                </div>
                                <div class="col-md-4">
                                    <select name="txt_sf11b_io" id="txt_sf11b_io"
                                        class="form-control select2 billunitindex sf_10_add_emp" style="width:100%">
                                        <option value="0" selected="selected" disabled="disabled">Select Inquiry
                                            Officer</option>
                                        <?php
                                            $query_src = "SELECT $db_edar_name.tbl_user.id,emp_id,role,name,$db_edar_name.tbl_user.status FROM $db_edar_name.tbl_user,$db_common_name.resgister_user WHERE $db_edar_name.tbl_user.emp_id=$db_common_name.resgister_user.emp_no and role not in(1)";
                                            $result_src = mysql_query($query_src, $db_edar);
                                            while ($value_src = mysql_fetch_array($result_src)) {

                                                $val = explode(",", $value_src['role']);

                                                $names = array();
                                                foreach ($val as $key => $value) {
                                                    if ($value == 4) {
                                                        $role_name = getrole($value);
                                                        array_push($names, $role_name);
                                                    }
                                                }
                                                //print_r($names);
                                                if (empty($names)) {
                                                    echo "<td>-</td>";
                                                } else {
                                                    
                                                    echo "<option value='" . $value_src['emp_id'] . "'>" .$value_src['name']. "(".implode(" / ", $names).")" . "</option>";
                                                }
                                            }


                                            ?>
                                    </select>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="txt_sf11b_contact" class="form-label">Contact**:</label>
                                </div>
                                <div class="col-md-4">
                                    <textarea class="form-control" name="txt_sf11b_contact" id="txt_sf11b_contact"
                                        autocomplete="off"></textarea>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="txt_sf11b_gm" class="form-label">Select General Manager:</label>
                                </div>
                                <div class="col-md-4">
                                    <select name="txt_sf11b_gm_pf" id="txt_sf11b_gm_pf"
                                        class="form-control select2 billunitindex sf_11b_gm_pfs" style="width:100%">
                                        <option value="0" selected="selected" disabled="disabled">Select General
                                            Manager</option>
                                        <?php
                                    $query = "SELECT `emp_no`,`name` FROM `resgister_user`";
                                    $rst_emp = mysql_query($query, $db_common);
                                    while ($rw_emp = mysql_fetch_assoc($rst_emp)) {
                                        // print_r($rw_emp);
                                        extract($rw_emp);
                                        echo "<option value='$emp_no'>$name</option>";
                                    }
                                    ?>
                                    </select>
                                </div>
                            </div>


                        </div>
                        <div class="div_hide" id="div_sf11_c">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="txt_sf11c_mem_no" class="form-label">Memorandum No:</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="txt_sf11c_mem_no"
                                        id="txt_sf11c_mem_no">
                                </div>
                            </div> <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="txt_sf11c_mem_dated" class="form-label">Memorandum Dated:</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control datepicker" name="txt_sf11c_mem_dated"
                                        id="txt_sf11c_mem_dated" autocomplete="off">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="txt_sf11c_on" class="form-label">on:</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control datepicker" name="txt_sf11c_on"
                                        id="txt_sf11c_on" autocomplete="off">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="txt_sf11c_gm" class="form-label">Select General Manager:</label>
                                </div>
                                <div class="col-md-4">
                                    <select name="txt_sf11c_gm_pf" id="txt_sf11c_gm_pf"
                                        class="form-control select2 billunitindex sf_11b_gm_pfs" style="width:100%">
                                        <option value="0" selected="selected" disabled="disabled">Select General
                                            Manager</option>
                                        <?php
                                       $query = "SELECT `emp_no`,`name` FROM `resgister_user`";
                                       $rst_emp = mysql_query($query, $db_common);
                                       while ($rw_emp = mysql_fetch_assoc($rst_emp)) {
                                           // print_r($rw_emp);
                                           extract($rw_emp);
                                           echo "<option value='$emp_no'>$name</option>";
                                       }
                                       ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions pull-right">
                <input type="submit" value="Preview" id="btn_preview" class="btn btn-success">
            </div>
            </form>
        </div>
    </div>
    <!-- END DASHBOARD STATS -->
    <div class="clearfix">
    </div>
</div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<?php }
    ?>
<?php
}
?>
<?php
include_once('../common_files/footer.php');
?>

<div id="mdlPreview" class="modal modal-width fade modal-scroll mldPreview" data-replace="true" tabindex="-1"
    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form id="frm_Preview" method="POST">
        <div class="modal-header btn-orange-moon">
            <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
            <h4 class="modal-title" style="text-align:center">Form Preview</h4>
        </div>
        <div class="modal-body">
            <div class="modalfull" id="mdlbody">

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="">Close</button>
            </div>
        </div>
    </form>
</div>

</div>
<script>
var sf6_row_count = 1;

function add_sf6_row() {
    var $container = $("#tbl_sf6_div");
    sf6_row_count += 1;
    // alert(sf6_row_count);
    var $content =
        '<tr id="tr_sf6_' + sf6_row_count + '"><td>' + sf6_row_count +
        '</td><td> <input type="text" name="txt_sf6_desc_rec[]" id="txt_sf6_desc_rec' +
        sf6_row_count +
        '" class="form-control cls_sf6_desc_rec"></td><td> <input type="text" name="txt_sf6_reason[]" id="txt_sf6_reason' +
        sf6_row_count +
        '" class="form-control cls_sf6_reason"></td><td><input type="button" value="Remove" class="btn btn-danger sf6_remove_row"></td></tr>';
    $($container).append($content);
}
$(document).ready(function() {
    $(".div_hide").hide();
    $("#txt_sf10_add_emp_1").select2("destroy").select2({
        minimumInputLength: 2,
    });
    $("#lst_forms").on("change", function(e) {
        // alert("w");
        $(".div_hide").hide();
        var data = $(this).val();
        // alert(data);
        if (data == 1) {
            $("#div_sf1").show();
        } else if (data == 2) {
            $("#div_sf2").show();
        } else if (data == 3) {
            $("#div_sf3").show();
        } else if (data == 4) {
            $("#div_sf4").show();
        } else if (data == 5) {
            $("#div_sf5").show();
        } else if (data == 6) {
            $("#div_sf6").show();
        } else if (data == 7) {
            $("#div_sf7").show();
        } else if (data == 8) {
            $("#div_sf8").show();
        } else if (data == 9) {
            $("#div_sf10").show();
        } else if (data == 10) {
            $("#div_sf10a").show();
        } else if (data == 11) {
            $("#div_sf10b").show();
        } else if (data == 12) {
            $("#div_sf11").show();
        } else if (data == 13) {
            $("#div_sf11_b").show();
        } else if (data == 15) {
            $("#div_sf11_c").show();
        } else {
            $(".div_hide").hide();
        }
    });
    $(document).on("click", ".sf6_remove_row", function() {
        $(this).parent().parent().remove();
    });
    $("#frm_add_form").submit(function(e) {
        e.preventDefault();
        var postData = new FormData();
        var postData = new FormData($(this)[0]);
        var $form_selected = $("#lst_forms").val();
        if ($form_selected == 6) {
            var sf6_desc_rec_array = [];
            var sf6_reason_array = [];
            $(".cls_sf6_desc_rec").each(function(i, v) {
                var data = $(v).val();
                sf6_desc_rec_array.push(data);
            });
            // console.log(sf6_desc_rec_array);
            $(".cls_sf6_reason").each(function(i, v) {
                var data = $(v).val();
                sf6_reason_array.push(data);
            });
            // console.log(sf6_reason_array);
            postData.append("sf6_desc_rec_array", sf6_desc_rec_array);
            postData.append("sf6_reason_array", sf6_reason_array);
            // var $form_selected = $("#lst_forms").val();
        } else if ($form_selected == 7) {
            var sf7_mem_array = [];
            $(".cls_sf7_mem_name").each(function(i, v) {
                //console.log(v);
                //console.log($(v).val());
                var data = $(v).val();
                if (data != "") {
                    sf7_mem_array.push(data);
                }
            });
            console.log(sf7_mem_array);
            postData.append('sf7_mem_name_data', sf7_mem_array);
        } else if ($form_selected == 9) {
            var sf10_mem_array = [];
            $(".cls_sf10_mem_name").each(function(i, v) {
                //console.log(v);
                //console.log($(v).val());
                var data = $(v).val();
                if (data != "") {
                    sf10_mem_array.push(data);
                }
            });
            // console.log(sf10_mem_array);
            postData.append('sf10_data', sf10_mem_array);
        }

        $.ajax({
            url: "load_form.php",
            type: "POST",
            data: postData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data, textStatus, jqXHR) {
                $("#mdlbody").html(data);
                $("#mdlPreview").modal("show");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });

    });
    $("#frm_Preview").submit(function(e) {
        e.preventDefault();
        $("#loader").show();
        var postData = new FormData();
        var postData = new FormData($(this)[0]);

        postData.append("action", "save_form");
        $.ajax({
            url: "control/clerk_process.php",
            type: "POST",
            data: postData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data, textStatus, jqXHR) {
                // alert(data);
                // console.log(data);
                var Response = JSON.parse(data);
                // console.log(Response);
                if (Response.res == "success") {
                    $("#loader").hide();
                    $("#mdlPreview").modal("hide");
                    $("#mdlbody").html(data);
                    AlertBox('Done', 'Inserted Record');
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);
                }

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    });
});
// ! sf7 form Script 
var sf7_row_count = 1;

function add_sf7_row() {
    var $container = $("#tbl_sf7_div");
    sf7_row_count += 1;

    // alert(sf7_row_count);
    var $content =
        '<tr id="tr_sf7_' + sf7_row_count + '"><td>' + sf7_row_count +
        '</td><td><select name="txt_sf7_member_name[]" id="txt_sf7_member_name' +
        sf7_row_count +
        '" class="select2 billunitindex cls_sf7_mem_name" style="width:100%"><option value="0" selected="selected" disabled="disabled">Select General Manager</option>';
    $content += '<?php
            $query = "SELECT `emp_no`,`name` FROM `resgister_user`";
            $rst_emp = mysql_query($query, $db_common);
            while ($rw_emp = mysql_fetch_assoc($rst_emp)) {
                // print_r($rw_emp);
                extract($rw_emp);
                echo "<option value=\"$emp_no\">$name</option>";
            }
          ?>';
    $content +=
        '</select></td><td><input type="button" value="Remove" class="btn btn-danger sf7_remove_row"></td></tr>';
    $($container).append($content);
    $("#txt_sf7_member_name" + sf7_row_count).select2("destroy");
    $("#txt_sf7_member_name" + sf7_row_count).select2();

}

$(document).on("click", ".sf7_remove_row", function() {
    $(this).parent().parent().remove();
});

// ! Sf10 form script
var sf10_row_count = 1;

function add_sf10_row() {
    var $container = $("#tbl_sf10_div");
    sf10_row_count += 1;

    // alert(sf7_row_count);
    var $content =
        '<tr id="tr_sf10_' + sf10_row_count + '"><td>' + sf10_row_count +
        '</td><td><select name="txt_sf10_member_name[]" id="txt_sf10_member_name' +
        sf10_row_count +
        '" class="select2 billunitindex cls_sf10_mem_name" style="width:100%"><option value="0" selected="selected" disabled="disabled">Select Employee </option>';
    $content += '<?php
            $query = "SELECT `emp_no`,`name` FROM `resgister_user`";
            $rst_emp = mysql_query($query, $db_common);
            while ($rw_emp = mysql_fetch_assoc($rst_emp)) {
                // print_r($rw_emp);
                extract($rw_emp);
                echo "<option value=\"$emp_no\">$name</option>";
            }
          ?>';
    $content +=
        '</select></td><td><input type="button" value="Remove" class="btn btn-danger sf10_remove_row"></td></tr>';
    $($container).append($content);
    $("#txt_sf10_member_name" + sf10_row_count).select2("destroy");
    $("#txt_sf10_member_name" + sf10_row_count).select2();

}

$(document).on("click", ".sf10_remove_row", function() {
    $(this).parent().parent().remove();
});
</script>