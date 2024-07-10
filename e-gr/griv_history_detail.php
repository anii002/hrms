<!DOCTYPE html>
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en-US"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en-US"> <![endif]-->
<!--[if gt IE 8]><!-->

<?php include_once('global/header.php');
include_once('global/model.php');
?>
<?php
function get_type($id)
{
    global $db_egr;
    if ($id != 0) {
        $fetch_type = mysql_query("select type from emp_type where id='$id'", $db_egr);
        $f_s = mysql_fetch_array($fetch_type);
        return $states = $f_s['type'];
    } else {
        return "-";
    }
}
function get_office($id)
{
    global $db_egr;
    if ($id != 0) {
        $fetch_type = mysql_query("select office_name from tbl_office where office_id='$id'", $db_egr);
        $f_s = mysql_fetch_array($fetch_type);
        return $states = $f_s['office_name'];
    } else {
        return "-";
    }
}
function get_dept($id)
{
    global $db_common;
    if ($id != 0) {
        $fetch_type = mysql_query("select DEPTDESC from department where DEPTNO='$id'", $db_common);
        $f_s = mysql_fetch_array($fetch_type);
        return $states = $f_s['DEPTDESC'];
    } else {
        return "-";
    }
}
function get_desig($id)
{
    // echo $id;
    global $db_common;
    if ($id != '') {
        $fetch_type = mysql_query("select DESIGLONGDESC from designations where DESIGCODE='$id'", $db_common);
        $f_s = mysql_fetch_array($fetch_type);
        return $f_s['DESIGLONGDESC'];
    } else {
        return "-";
    }
}
function get_station($id)
{
    // echo $id;
    global $db_common;
    if ($id != '') {
        $fetch_type = mysql_query("select stationdesc from station where stationcode='$id'", $db_common);
        $f_s = mysql_fetch_array($fetch_type);
        return $f_s['stationdesc'];
    } else {
        return "-";
    }
}
function startsWith($string, $startString)
{
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
}
?>

<!-- Start: Header Section
        ================================ -->
<section class="header-section-1 bg-image-1 header-js" id="search">
    <div class="overlay-color img-responsive">
        <div class="container img-responsive responsive ">
            <div class="row section-separator" style="padding-top:100px;'">
                <div class="col-md-10 col-md-offset-1 col-sm-10">
                    <form class="single-form" action="process.php?action=add_feedback" method="POST">
                        <?php
                        $cur_user = $_SESSION["user"];
                        //echo "<script>alert('$cur_user');</script>";
                        // $sql = "select e.empType,e.emp_no,e.name,e.department,e.designation,e.mobile,e.emp_email,e.emp_aadhar,e.office,e.station,g.gri_type,g.gri_desc,g.up_doc,g.gri_upload_date,g.gri_ref_no,g.doc_id, g.status from $db_common_name.register_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id WHERE g.emp_id='$cur_user'";
                        $sql = "select e.empType,e.emp_no,e.name,e.department,e.designation,e.mobile,e.emp_email,e.emp_aadhar,e.office,e.station,g.gri_type,g.gri_desc,g.up_doc,g.gri_upload_date,g.gri_ref_no,g.doc_id,g.status from $db_common_name.register_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id WHERE g.emp_id='$cur_user'";

                        $exe_query = mysql_query($sql, $db_egr) or die(mysql_error());
                        if ($result = mysql_fetch_array($exe_query)) {
                            $emp_type = $result['empType'];
                            $emp_id = $result['emp_no'];
                            $emp_name = $result['name'];
                            $emp_dept = $result['department'];
                            $emp_desig = $result['designation'];
                            $emp_mob = $result['mobile'];
                            $emp_email = $result['emp_email'];
                            $emp_aadhar = $result['emp_aadhar'];
                            $office = $result['office'];
                            $station = $result['station'];
                            $gri_type = $result['gri_type'];
                            $gri_desc = $result['gri_desc'];
                            $up_doc = $result['up_doc'];
                            $gri_upload_date = $result['gri_upload_date'];
                            $gri_ref_no = $result['gri_ref_no'];
                            $doc_path = $result['doc_id'];
                            $griv_status = $result['status'];
                        }

                        $e_type = get_type($emp_type);
                        $got_des = get_desig($emp_desig);
                        $got_off = get_office($office);
                        $got_dept = get_dept($emp_dept);
                        $got_st = get_station($station);
                        // echo $griv_status;
                        ?>
                        <table class="table table-responsive table-bordered table-hover">
                            <tr>
                                <td colspan="4" style="text-align:Center;color:black"><b>Personal History</b></td>
                            </tr>
                            <tr>
                                <td style="font-weight:800">Employee Type</td>
                                <td><?php echo $e_type; ?></td>
                                <td style="font-weight:800">Emp-id/PF No</td>
                                <td><?php echo $emp_id; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:800">Employee Name</td>
                                <td><?php echo $emp_name; ?></td>
                                <td style="font-weight:800">Department</td>
                                <td><?php echo $got_dept; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:800">Designation</td>
                                <td><?php echo $got_des; ?></td>
                                <td style="font-weight:800">Mobile Number</td>
                                <td><?php echo $emp_mob; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:800">E-mail id</td>
                                <td><?php echo $emp_email; ?></td>
                                <td style="font-weight:800">Aadhar Number</td>
                                <td><?php echo $emp_aadhar; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:800">Office</td>
                                <td><?php echo $got_off; ?></td>
                                <td style="font-weight:800">Station</td>
                                <td><?php echo $got_st; ?></td>
                            </tr>
                        </table>
                        <label style="padding:5px;font-size:16px;">Employee Grievance</label>
                        <table class="table table-striped table-bordered display table-responsive">
                            <thead>
                                <tr>
                                    <th>Griv. Ref. No.</th>
                                    <th>Remark</th>
                                    <th>Date</th>
                                    <!--th>Action</th-->
                                    <th>Status</th>
                                    <th>Document Link</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                function get_status($status)
                                {
                                    global $db_egr;
                                    $sql1 = mysql_query("select status from status where id=$status", $db_egr);
                                    $status_fetch = "";
                                    while ($sql_query1 = mysql_fetch_array($sql1)) {
                                        $status_fetch = $sql_query1['status'];
                                    }
                                    return $status_fetch;
                                }
                                function get_action($action)
                                {
                                    global $db_egr;
                                    $f_action = mysql_query("select action from action where id=$action", $db_egr);
                                    while ($action_f = mysql_fetch_array($f_action)) {
                                        $a_c = $action_f['action'];
                                    }
                                    return $a_c;
                                }
                                $fire_all = mysql_query("select * from tbl_grievance where gri_ref_no='" . $_GET['griv_no'] . "'", $db_egr);
                                //echo "select  * from tbl_grievance where gri_ref_no='".$_GET['griv_no']."'";
                                while ($all_fetch = mysql_fetch_array($fire_all)) {
                                    $gri_ref_no = $all_fetch['gri_ref_no'];
                                    $forwarded_date = $all_fetch['gri_upload_date'];
                                    $remark = $all_fetch['gri_desc'];
                                    //$return_action=get_action($all_fetch['action']);
                                    $status = get_status($all_fetch['status']);
                                    $doc_id = $all_fetch['doc_id'];
                                    $uploaded_by = $all_fetch["uploaded_by"];
                                    $cur_user = startsWith($gri_ref_no, 'W') ? $uploaded_by : $cur_user;
                                    echo "<tr>";
                                    echo "<td>$gri_ref_no</td>";
                                    echo "<td>$remark</td>";
                                    echo "<td>$forwarded_date</td>";
                                    //	echo "<td>$return_action</td>";
                                    echo "<td>$status</td>";
                                    $sql_doc_sec = mysql_query("select * from doc where griv_ref_no='$gri_ref_no' and uploaded_by='$cur_user'", $db_egr);
                                    //echo "select * from doc where griv_ref_no='$gri_ref_no' and uploaded_by='$cur_user'".mysql_error();
                                    echo "<td>";
                                    $count_doc = 1;
                                    $cnt = 0;
                                    while ($doc_fetch = mysql_fetch_array($sql_doc_sec)) {
                                        //echo $doc_fetch['doc_path'];
                                        echo "<a href='admin/main/admin_upload/" . $doc_fetch['doc_path'] . "' target='_blank' id='" . $cnt . "' name='" . $cnt . "' >DOC&nbsp;&nbsp;&nbsp;</a>";
                                        $cnt++;
                                    }
                                    if (mysql_num_rows($sql_doc_sec) > 0) {
                                        $count_doc++;
                                    }
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <label style="padding:5px;font-size:16px;">Grievance History</label>
                        <table class="table table-striped table-bordered display" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Date</th>
                                    <th>Remarks</th>
                                    <th>Taken Action</th>
                                    <th>Forwarded To</th>
                                    <th>Documents Links</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $griv_no = $_GET['griv_no'];
                                //echo "<script>alert('$griv_no');</script>";
                                function get_user1($first_id)
                                {
                                    global $db_egr, $db_common;
                                    $first_user = mysql_query("select user_name from tbl_user where user_id='$first_id'", $db_egr);
                                    $count_record = mysql_num_rows($first_user);
                                    if ($count_record > 0) {
                                        $user_first = mysql_fetch_array($first_user);
                                        $f_user = $user_first['user_name'];
                                    } else {
                                        $first_user = mysql_query("select emp_name from employee where emp_id='$first_id'", $db_common);
                                        $count_record = mysql_num_rows($first_user);
                                        $user_first = mysql_fetch_array($first_user);
                                        $f_user = $user_first['emp_name'];
                                    }
                                    return $f_user;
                                }
                                function get_user2($second_id)
                                {
                                    global $db_common;
                                    $second_user = mysql_query("select user_name from tbl_user where user_id='$second_id'", $db_common);
                                    while ($user_second = mysql_fetch_array($second_user)) {
                                        $s_user = $user_second['user_name'];
                                    }
                                    return $s_user;
                                }
                                $fire_all = mysql_query("select  * from tbl_grievance_forward where griv_ref_no='$griv_no'", $db_egr);

                                $count_doc = 1;
                                $cnt = 0;
                                $sr_no = 1;
                                while ($all_fetch = mysql_fetch_array($fire_all)) {
                                    $forwarded_date = $all_fetch['forwarded_date'];
                                    $remark = $all_fetch['remark'];
                                    $user_id = get_user1($all_fetch['user_id']);
                                    $user_id_forwarded = get_user1($all_fetch['user_id_forwarded']);
                                    //$return_action=get_action($all_fetch['return_action']);
                                    $status = get_status($all_fetch['status']);
                                    $doc_id = $all_fetch['doc_id'];
                                    $status = $all_fetch['status'];
                                    echo "<tr>";
                                    echo "<td>$sr_no</td>";
                                    echo "<td>$forwarded_date</td>";
                                    echo "<td>$remark</td>";
                                    echo "<td>$user_id</td>";
                                    echo "<td>$user_id_forwarded</td>";
                                    $sql_doc_sec = mysql_query("select * from doc where griv_ref_no='$griv_no' and uploaded_by='" . $all_fetch['user_id'] . "' AND doc_id='$doc_id'", $db_egr);
                                    //  AND count='" . $all_fetch['id'] . "'
                                    $sr_no++;
                                    echo "<td>";
                                    while ($doc_fetch = mysql_fetch_array($sql_doc_sec)) {
                                        /*if ($all_fetch['user_id'] == '1') {
                                        } else {
                                            echo "<a href='admin_user/main/upload_doc/" . $doc_fetch['doc_path'] . "' target='_blank' id='" . $cnt . "' name='" . $cnt . "' >DOC&nbsp;&nbsp;&nbsp;</a>";
                                        }*/
                                        echo "<a href='admin/main/admin_upload/" . $doc_fetch['doc_path'] . "' target='_blank' id='" . $cnt . "' name='" . $cnt . "' >DOC&nbsp;&nbsp;&nbsp;</a>";
                                        $cnt++;
                                    }
                                    if (mysql_num_rows($sql_doc_sec) > 0) {
                                        $count_doc++;
                                    }

                                    echo "</td>";
                                    echo "</tr>";
                                }
                                ?>
                                <input type="hidden" name="hidden_status" id="hidden_status"
                                    value="<?php echo $status; ?>">
                                <input type="hidden" name="hidden_griv" id="hidden_griv"
                                    value="<?php echo $griv_no; ?>">
                                <input type="hidden" name="fed_pf" id="fed_pf" value="<?php echo $emp_id; ?>">
                                <input type="hidden" name="fed_name" id="fed_name" value="<?php echo $emp_name; ?>">
                                <input type="hidden" name="fed_email" id="fed_email" value="<?php echo $emp_email; ?>">
                                <input type="hidden" name="fed_mobile" id="fed_mobile" value="<?php echo $emp_mob; ?>">
                                <?php
                                $fetch_satisfy = mysql_query("select * from emp_satisfy where griv_ref_no='$griv_no'", $db_egr);
                                $row_count = mysql_num_rows($fetch_satisfy);
                                while ($satisfy_fetch = mysql_fetch_array($fetch_satisfy)) {
                                    $griv_ref = $satisfy_fetch['griv_ref_no'];
                                    $emp_no = get_user1($satisfy_fetch['emp_id']);
                                    $emp_remark = $satisfy_fetch['remark'];
                                    $emp_feedback = $satisfy_fetch['emp_feedback'];
                                    $created_at = $satisfy_fetch['created_at'];
                                    echo "<tr>";
                                    echo "<td>$sr_no</td>";
                                    echo "<td>$created_at</td>";
                                    echo "<td>$emp_remark</td>";
                                    echo "<td>$emp_no</td>";
                                    echo "<td>$emp_feedback</td>";
                                    echo "<td></td>";
                                    echo "<tr>";
                                }
                                $x = 0;
                                if ($row_count > 0) {
                                    $x++;
                                }
                                ?>
                            </tbody>
                        </table>

                        <?php if ($griv_status == 4) {
                            ?>
                        <div class="user_feedback" id="user_feedback">
                            <div class="row" style="margin-top:20px;">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-6 col-xs-12"
                                            style="margin-left: -50px;">Your FeedBack</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <select id="emp_react" name="emp_react" class="form-control">
                                                <option value="" disabled selected>Select Your feedback</option>
                                                <option value="Satiesfied">Satisfied</option>
                                                <option value="Not-Satisfied">Not Satisfied</option>
                                                <option value="Partially-Satisfied">Partially Satisfied</option>
                                                <option value="Re-Forward">Re-Forward</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="artperadd">FeedBack</label>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <textarea style="resize:none" rows="4" name="fed_remark" id="fed_remark"
                                                class=" form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="float:right;margin-top:10px;" class="col-sm-6 col-xs-6">
                                <button type="submit" class="btn btn-info" name="satisfy" id="satisfy">Submit</button>
                            </div>
                        </div>
                        <?php } ?>
                    </form>
                    <?php

                    if (isset($_POST['satisfy'])) {
                        $react = $_REQUEST['emp_react'];
                        $griv_no = $_REQUEST['hidden_griv'];

                        $remark = $_REQUEST['feedback_desc'];
                        $_remark = mysql_real_escape_string($remark);
                        if ($react == 'Re-Forward') {
                            $sql_satisfy = mysql_query("insert into tbl_grievance_forward(griv_ref_no,emp_id,user_id,user_id_forwarded,forwarded_date,remark,status,section_action) values('$griv_no','$cur_user','$cur_user','1',CURRENT_TIMESTAMP,'$_remark','3','4')", $db_egr);
                            $last_id = mysql_insert_id();
                            if ($sql_satisfy) {
                                $set_zero = mysql_query("update tbl_grievance_forward set status='0' where griv_ref_no='$griv_no' and id < $last_id", $db_egr);
                                $status_update = mysql_query("update tbl_grievance set status='3' where gri_ref_no=$griv_no", $db_egr);
                                echo "<script>alert('Grievance Forwarded successfully');window.location='griv_history.php';</script>";
                            } else { //window.location='griv_history.php';
                                echo "<script>alert('failed');</script>";
                            }
                        } else {
                            $sql_satisfy = mysql_query("insert into emp_satisfy(griv_ref_no,emp_id,remark,emp_feedback) values('$griv_no','$cur_user','$_remark','$react')", $db_egr);
                            if ($sql_satisfy) {
                                echo "<script>alert('Feedback has been added successfully ');window.location='griv_history.php';</script>";
                            } else { //window.location='griv_history.php';
                                echo "<script>alert('failed');</script>";
                            }
                        }
                    }
                    ?>
                </div> <!-- End: .part-1 -->
            </div> <!-- End: .row --><br>

        </div> <!-- End: .container -->
    </div> <!-- End: .overlay-color -->
</section>
<!-- End: Header Section
        ================================ -->

<div id="reminder" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Reminder</h4>
            </div>
            <form action="process.php?action=add_rem" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12">Emp Id</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="hidden" id="hidden_date" name="hidden_date">
                                    <input type="text" class="form-control" id="rem_emp_id" name="rem_emp_id" value=""
                                        readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top:20px;">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12">Grievance Ref. Number</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" class="form-control" id="rem_griv_no" name="rem_griv_no"
                                        readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top:20px;">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12">Remark</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <textarea class="form-control" col="7" rows="5" id="rem_remark" name="rem_remark"
                                        style="resize:none;"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-fill btn-primary">Add</button>
                    <button type="button" class="btn btn-fill btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
</div>

<?php include_once('global/footer.php'); ?>
<script>
$("#emp_dept").select2();
$("#emp_desig").select2();
$("#emp_state").select2();
$("#emp_city").select2();
$("#office_emp_state").select2();
$("#office_emp_city").select2();
</script>
<script>
var row_num = <?php echo $x; ?>;
var status = $("#hidden_status").val();
if (status == "4") {
    $("#user_feedback").show();
} else {
    $("#user_feedback").hide();
}
var status = $("#hidden_status").val();
if (status == "4") {
    $("#user_feedback").show();
} else {
    $("#user_feedback").hide();
}

$('#emp_state').on('change', function() {
    var stateID = $(this).val();
    //alert(stateID);
    if (stateID) {
        $.ajax({
            type: 'POST',
            url: 'statechange.php',
            data: 'state_id=' + stateID,
            success: function(html) {
                $('#emp_city').html(html);
            }
        });
    } else {
        $('#emp_city').html('<option value="">Select state first</option>');
    }
});
$('#office_emp_state').on('change', function() {
    //debugger;
    var stateID = $(this).val();
    //alert(stateID);
    if (stateID) {
        $.ajax({
            type: 'POST',
            url: 'statechange.php',
            data: 'state_id=' + stateID,
            success: function(html) {
                $('#office_emp_city').html(html);
            }
        });
    } else {
        $('#office_emp_city').html('<option value="">Select state first</option>');
    }
});
//reminder code
// debugger;
$("#rem").click(function() {
    var rem_emp_id = "<?php echo $emp_id; ?>";
    var upload_date = "<?php echo $gri_upload_date; ?>";
    var rem_griv = <?php echo $gri_ref_no; ?>;

    $("#rem_emp_id").val(rem_emp_id);
    $("#rem_griv_no").val(rem_griv);
    $("#hidden_date").val(upload_date);

});
</script>