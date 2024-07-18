<?php
require_once('Global_Data/header.php');
// require('functions.php');
error_reporting(0);
?>

<!-- PNotify -->
<!-- page content -->
<div class="right_col" role="main" style="background-image: url('images/small1.png');repeat:repeat;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> <i class="fa fa-users"></i>&nbsp Grievance Details</h3><br>
            </div>

            <div class="title_right">

            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <form action="process.php?action=return_griv" method="POST" class="form-horizontal">
                            <?php
                            $got_id = $_GET['g_id'];
                            //echo "<script>alert($got_id);</script>";

                            // $fetch_query = "select e.emp_type,e.emp_id,e.emp_name,e.emp_dept,e.emp_desig,e.emp_mob,e.emp_email,e.emp_aadhar,e.office,e.station,g.gri_type,g.gri_desc,g.up_doc,g.gri_upload_date,g.gri_ref_no,g.doc_id,f.forwarded_date,f.remark,f.user_id from employee e INNER JOIN tbl_grievance g ON e.emp_id=g.emp_id INNER JOIN tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no WHERE g.id=$got_id";
                            $fetch_query = "select e.empType,e.emp_no,e.name,e.department,e.designation,e.mobile,e.emp_email,e.emp_aadhar,e.office,e.station,g.gri_type,g.gri_desc,g.up_doc,g.gri_upload_date,g.gri_ref_no,g.doc_id,f.forwarded_date,f.remark,f.user_id from $db_common_name.register_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id INNER JOIN $db_egr_name.tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no WHERE g.id=$got_id";

                            $exe_query = mysqli_query($db_egr, $fetch_query) or die(mysqli_error($db_egr));
                            while ($result = mysqli_fetch_array($exe_query)) {
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
                                $forwarded_date = $result['forwarded_date'];
                                $remark = $result['remark'];
                                $user_id = $result['user_id'];
                            }
                            ?>

                            <h4 class="bgshades"> Personal Details: </h4>
                            <div class="row">
                                <input type="hidden" name="hidden_user" id="hidden_user" value="<?php echo $user_id; ?>">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee Type</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <?php
                                            $this_id = $_SESSION['SESSION_ID'];
                                            ?>
                                            <input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo $this_id; ?>">
                                            <?php
                                            $e_type = get_emptype($emp_type);
                                            ?>
                                            <input type="text" class="form-control" id="emp_id" name="emp_id" readonly value="<?php echo $e_type; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Emp Id/PF No</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" id="emp_id" name="emp_id" readonly value="<?php echo $emp_id; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Emp Name</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" id="emp_name" name="emp_name" readonly value="<?php echo $emp_name; ?>">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Department</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <?php
                                            $got_dept = get_department($emp_dept);
                                            ?>
                                            <input type="text" class="form-control" id="emp_name" name="emp_name" readonly value="<?php echo $got_dept; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Designation</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <?php
                                            $got_des = get_designation($emp_desig);
                                            ?>
                                            <input type="text" class="form-control" id="emp_name" name="emp_name" readonly value="<?php echo $got_des; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile No.</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" id="emp_mob" name="emp_mob" class="form-control" readonly value="<?php echo $emp_mob; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email Id</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" id="emp_email" name="emp_email" class="form-control" readonly value="<?php echo $emp_email; ?>">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Aadhar No.</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" id="emp_aadhar" name="emp_aadhar" class="form-control" readonly value="<?php echo $emp_aadhar; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Office</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <?php
                                            $office_name = get_office_text($office);
                                            ?>
                                            <input type="text" id="emp_email" name="emp_email" class="form-control" readonly value="<?php echo $office_name; ?>">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Station</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <?php
                                            $got_st = get_station_text($station);
                                            ?>
                                            <input type="text" id="emp_aadhar" name="emp_aadhar" class="form-control" readonly value="<?php echo $got_st; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4 class="bgshades"> Grievance Details: </h4>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <?php
                                            $cat_name = get_category_text($gri_type);
                                            ?>
                                            <input type="hidden" id="up_office_emp_pincode" name="up_office_emp_pincode" class="form-control" readonly value="<?php echo $cat_name; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="hidden" id="griv_ref_no" name="griv_ref_no" class="form-control" readonly value="<?php echo $gri_ref_no; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-offset-1 col-md-12 table-responsive ">
                                    <table class="table table-striped table-bordered" style="width:80%;">
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
                                            $fire_all = mysqli_query($db_egr, "select  * from tbl_grievance where gri_ref_no='" . $gri_ref_no . "'");
                                            while ($all_fetch = mysqli_fetch_array($fire_all)) {
                                                // print_r($all_fetch);
                                                $gri_ref_no = $all_fetch['gri_ref_no'];
                                                $forwarded_date = $all_fetch['gri_upload_date'];
                                                $remark = $all_fetch['gri_desc'];
                                                //$return_action=get_action($all_fetch['action']);
                                                $status = get_status($all_fetch['status']);
                                                $doc_id = $all_fetch['doc_id'];
                                                $uploaded_by = isset($all_fetch["uploaded_by"]) ? $all_fetch["uploaded_by"] : $emp_id;

                                                $sql_inner = "select * from doc where griv_ref_no='$gri_ref_no' and uploaded_by='$uploaded_by'";
                                                echo "<tr>";
                                                echo "<td>$gri_ref_no </td>";
                                                echo "<td>$remark</td>";
                                                echo "<td>$forwarded_date</td>";
                                                //	echo "<td>$return_action</td>";
                                                echo "<td>$status</td>";

                                                $sql_doc_sec = mysqli_query($db_egr, $sql_inner);
                                                echo "<td>";
                                                $count_doc = 1;
                                                $cnt = 0;
                                                while ($doc_fetch = mysqli_fetch_array($sql_doc_sec)) {
                                                    //echo $doc_fetch['doc_path'];
                                                    echo "<a href='../../admin/main/admin_upload/" . $doc_fetch['doc_path'] . "' target='_blank' id='" . $cnt . "' name='" . $cnt . "' >DOC&nbsp;&nbsp;&nbsp;</a>";
                                                    $cnt++;
                                                }
                                                if (mysqli_num_rows($sql_doc_sec) > 0) {
                                                    $count_doc++;
                                                }

                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                    <h4 class="bgshades">Previous Remarks and History</h4>
                    <div class="row table-responsive" style="margin-top:30px;">

                        <table border="1" class="table table-border">
                            <tr>
                                <th>Forwarded From</th>
                                <th>Remark</th>
                                <th>Date</th>
                                <th>Forwarded To</th>
                                <th>Action</th>
                                <th>Status</th>
                                <th>Document Link</th>
                            </tr>

                            <?php
                           function get_user1($first_id)
                           {
                               global $db_egr;
                           
                               // Initialize the variable to handle cases where no result is found
                               $f_user = null;
                               
                               // Sanitize the input ID to prevent SQL injection
                               $first_id = (int) $first_id; // Casting to integer for safety
                           
                               $sql = "SELECT user_name FROM tbl_user WHERE user_id = $first_id AND status = 'active'";
                               $first_user = mysqli_query($db_egr, $sql);
                           
                               if (!$first_user) {
                                   // Query failed
                                   return "Error: " . mysqli_error($db_egr);
                               }
                           
                               while ($user_first = mysqli_fetch_array($first_user)) {
                                   $f_user = $user_first['user_name'];
                               }
                           
                               // Return the fetched user name or a default value if not found
                               return $f_user ?? "User not found";
                           }
                           
                           function get_user2($second_id)
                           {
                               global $db_egr;
                           
                               // Initialize the variable to handle cases where no result is found
                               $s_user = null;
                               
                               // Sanitize the input ID to prevent SQL injection
                               $second_id = (int) $second_id; // Casting to integer for safety
                           
                               $sql = "SELECT user_name FROM tbl_user WHERE user_id = $second_id AND status = 'active'";
                               $second_user = mysqli_query($db_egr, $sql);
                           
                               if (!$second_user) {
                                   // Query failed
                                   return "Error: " . mysqli_error($db_egr);
                               }
                           
                               while ($user_second = mysqli_fetch_array($second_user)) {
                                   $s_user = $user_second['user_name'];
                               }
                           
                               // Return the fetched user name or a default value if not found
                               return $s_user ?? "User not found";
                           }
                           
                           function get_status($status)
                           {
                               global $db_egr;

                               // Initialize the variable to handle cases where no result is found
                               $status_fetch = null;

                               // Sanitize the input ID to prevent SQL injection
                               $status = (int) $status; // Casting to integer for safety

                               $sql = "SELECT status FROM status WHERE id = $status";
                               $sql1 = mysqli_query($db_egr, $sql);

                               if (!$sql1) {
                                   // Query failed
                                   return "Error: " . mysqli_error($db_egr);
                               }

                               while ($sql_query1 = mysqli_fetch_array($sql1)) {
                                   $status_fetch = $sql_query1['status'];
                               }

                               // Return the fetched status or a default value if not found
                               return $status_fetch ?? "Status not found";
                           }

                           function get_action($action)
                           {
                               global $db_egr;

                               // Initialize the variable to handle cases where no result is found
                               $a_c = null;

                               // Sanitize the input ID to prevent SQL injection
                               $action = (int) $action; // Casting to integer for safety

                               $sql = "SELECT action FROM action WHERE id = $action";
                               $f_action = mysqli_query($db_egr, $sql);

                               if (!$f_action) {
                                   // Query failed
                                   return "Error: " . mysqli_error($db_egr);
                               }

                               while ($action_f = mysqli_fetch_array($f_action)) {
                                   $a_c = $action_f['action'];
                               }

                               // Return the fetched action or a default value if not found
                               return $a_c ?? "Action not found";
                           }

                           function get_section_action($sec_action)
                           {
                               global $db_egr;

                               // Initialize the variable to handle cases where no result is found
                               $s_a = null;

                               // Sanitize the input ID to prevent SQL injection
                               $sec_action = (int) $sec_action; // Casting to integer for safety

                               $sql = "SELECT action FROM return_action WHERE id = $sec_action";
                               $s_action = mysqli_query($db_egr, $sql);

                               if (!$s_action) {
                                   // Query failed
                                   return "Error: " . mysqli_error($db_egr);
                               }

                               while ($action_s = mysqli_fetch_array($s_action)) {
                                   $s_a = $action_s['action'];
                               }

                               // Return the fetched action or a default value if not found
                               return $s_a ?? "Section action not found";
                           }
                            $fire_all = mysqli_query($db_egr, "select  * from tbl_grievance_forward where griv_ref_no='$gri_ref_no'");
                            $count_doc = 1;
                            $cnt = 0;
                            while ($all_fetch = mysqli_fetch_array($fire_all)) {
                                $forwarded_date = $all_fetch['forwarded_date'];
                                $remark = $all_fetch['remark'];
                                $user_id = get_user1($all_fetch['user_id']);
                                $user_id_forwarded = get_user2($all_fetch['user_id_forwarded']);
                                $emp_need = $all_fetch['user_id_forwarded'];
                                $return_action = get_action($all_fetch['admin_action']);
                                $_status = $all_fetch['status'];
                                $status = get_status($_status);
                                $doc_id = $all_fetch['doc_id'];
                                $sec_action = get_section_action($all_fetch['section_action']);
                                echo "<tr>";
                                echo "<td>$user_id</td>";
                                echo "<td>$remark</td>";
                                echo "<td>$forwarded_date</td>";
                                $e_n = "";
                                if ($user_id_forwarded != "") {
                                    echo "<td>$user_id_forwarded</td>";
                                } else {
                                    $fetch_emp = mysqli_query($db_common, "select name from register_user where emp_no='$emp_need'");
                                    while ($emp_fetch = mysqli_fetch_array($fetch_emp)) {
                                        $e_n = $emp_fetch['emp_name'];
                                    }
                                    echo "<td>$e_n</td>";
                                }
                                if ($sec_action != "") {
                                    echo "<td>$sec_action</td>";
                                } else if ($return_action != "") {
                                    echo "<td>$return_action</td>";
                                } else {
                                    echo "<td>$return_action/$sec_action</td>";
                                }
                                echo "<td>$status</td>";
                                $sql_doc = "select * from doc where griv_ref_no='$gri_ref_no' AND doc_id='" . $doc_id . "'";
                                // $sql_doc = "select * from doc where griv_ref_no='$gri_ref_no' and uploaded_by='" . $all_fetch['user_id'] . "' AND doc_id='" . $doc_id . "'";
                                $sql_doc_sec = mysqli_query($db_egr, $sql_doc);
                                echo "<td>";
                                while ($doc_fetch = mysqli_fetch_array($sql_doc_sec)) {
                                    // if ($all_fetch['user_id'] == '1') {
                                    // } else {
                                    //     echo "<a href='../../admin_user/main/upload_doc/" . $doc_fetch['doc_path'] . "' target='_blank' id='" . $cnt . "' name='" . $cnt . "' >DOC&nbsp;&nbsp;&nbsp;</a>";
                                    // }
                                    echo "<a href='../../admin/main/admin_upload/" . $doc_fetch['doc_path'] . "' target='_blank' id='" . $cnt . "' name='" . $cnt . "' >DOC&nbsp;&nbsp;&nbsp;</a>";
                                    $cnt++;
                                }
                                if (mysqli_num_rows($sql_doc_sec) > 0) {
                                    $count_doc++;
                                }
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>

                        </table>
                    </div>
                    <br>
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <?php if ($_status == 3) { ?>
                            <a href="griv_pending.php" class="btn btn-info source">Back</a>
                        <?php } else {
                        ?>
                            <a href="griv_closed.php" class="btn btn-info source">Back</a>
                        <?php } ?>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</div>


<?php
require_once('Global_Data/footer.php');
?>
<link href="select2/select2.min.css" rel="stylesheet" />
<script src="select2/select2.min.js"> </script>
<script>
    $("#emp_dept").select2();
    $("#emp_desig").select2();
    $("#emp_state").select2();
    $("#emp_city").select2();
    $("#office_emp_state").select2();
    $("#office_emp_city").select2();
</script>
<script>
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
    $(document).on("change", "#section", function() {
        // debugger;
        var sec_val = $(this).val();
        //alert(sec_val);
        $.ajax({
            type: 'POST',
            url: 'get_user.php',
            data: {
                //action:get_user,
                sec_val: sec_val,
            },
            success: function(html) {
                //alert(html);
                var a = html;
                var b = a.split('$');
                var val_id = b[0];
                var name = b[1];
                //alert(val_id);
                //alert(name);

                $('#auth').append($('<option>', {
                    value: val_id,
                    text: name
                }));

            }
        });
    });
</script>