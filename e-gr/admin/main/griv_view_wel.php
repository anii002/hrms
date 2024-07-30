<?php
require_once('Global_Data/header.php');
error_reporting(0);
include('config.php');
include('functions.php');
?>
<!-- PNotify -->
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> <i class="fa fa-users"></i> Grievance Details</h3><br>
            </div>
            <div class="title_right">
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <form action="process.php?action=return_back_action" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            <?php
                            $got_id = $_GET['g_id'];
                            //echo "<script>alert($got_id);</script>";

                            // $fetch_query = "Select u.user_name, u.user_mob, e.emp_id, e.emp_name, e.emp_type, e.emp_dept, e.emp_desig, e.emp_email, e.emp_aadhar, e.office, e.station, g.gri_ref_no, g.gri_type,g.gri_upload_date,g.id ,e.emp_mob,g.section_id from employee e INNER JOIN tbl_grievance g ON e.emp_id=g.emp_id INNER JOIN tbl_user u ON g.uploaded_by = u.user_id where g.id='$got_id'";
                            $fetch_query = "Select u.user_name, u.user_mob, e.emp_no, e.name, e.empType, e.department, e.designation, e.emp_email, e.emp_aadhar, e.office, e.station, g.gri_ref_no, g.gri_type,g.gri_upload_date,g.id,e.mobile,g.section_id from $db_common_name.register_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id INNER JOIN $db_egr_name.tbl_user u ON g.uploaded_by = u.user_id where g.id='$got_id'";

                            $exe_query = mysqli_query($db_egr, $fetch_query) or die(mysqli_error($db_egr));
                            while ($result = mysqli_fetch_array($exe_query)) {
                                $emp_id = $result['emp_no'];
                                $emp_name = $result['name'];
                                $emp_mob = $result['mobile'];
                                $emp_type = $result['empType'];
                                $emp_depart = $result['department'];
                                $emp_desig =  $result['designation'];
                                $emp_email =  $result['emp_email'];
                                $emp_aadhar = $result['emp_aadhar'];
                                $emp_office = $result['office'];
                                $emp_station = $result['station'];
                                $gri_type = $result['gri_type'];
                                $gri_desc = $result['gri_desc'];
                                $up_doc = $result['up_doc'];
                                $gri_upload_date = $result['gri_upload_date'];
                                $gri_ref_no = $result['gri_ref_no'];
                                $doc_id = $result['doc_id'];
                                $upload = $result['uploaded_by'];
                                $user_name = $result['user_name'];
                                $user_mobile = $result['user_mob'];
                                $section_id = $result["section_id"];
                            }
                            ?>
                            <h4 class="bgshades"> Personal Details: </h4>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <?php
                                    $this_id = $_SESSION['SESSION_ID'];
                                    //echo "<script>alert('$this_id');</script>";
                                    ?>
                                    <input type="hidden" name="hidden_id" id="hidden_id" value='<?php echo $this_id; ?>'>
                                    <input type="hidden" name="hidden_section_id" id="hidden_section_id" value="<?php echo $section_id; ?>">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Emp Id/PF No</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" id="emp_id" name="emp_id" readonly value="<?php echo $emp_id; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Emp Type</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" id="emp_type" name="emp_type" readonly value="<?php echo get_emptype($emp_type); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Emp Name</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" id="emp_name" name="emp_name" class="form-control" readonly value="<?php echo $emp_name; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile No</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" id="emp_mob" name="emp_mob" readonly value="<?php echo $emp_mob; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Emp Department</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" id="emp_dep" name="emp_dep" class="form-control" readonly value="<?php echo get_department($emp_depart); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Emp Designation</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" id="emp_desi" name="emp_desi" readonly value="<?php echo get_designation($emp_desig); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" id="emp_email" name="emp_email" class="form-control" readonly value="<?php echo $emp_email; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Aadhar No</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" id="emp_aadhar" name="emp_aadhar" readonly value="<?php echo $emp_aadhar; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Office</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" id="emp_office" name="emp_office" class="form-control" readonly value="<?php echo get_office_text($emp_office); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Station</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" id="emp_station" name="emp_station" readonly value="<?php echo get_station_text($emp_station); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4 class="bgshades"> Grievance Details: </h4>
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
                                                $uploaded_by = $all_fetch["uploaded_by"];
                                                echo "<tr>";
                                                echo "<td>$gri_ref_no</td>";
                                                echo "<td>$remark</td>";
                                                echo "<td>$forwarded_date</td>";
                                                //	echo "<td>$return_action</td>";
                                                echo "<td>$status</td>";
                                                $sql_doc_sec = mysqli_query($db_egr, "select * from doc where griv_ref_no='$gri_ref_no' and uploaded_by='$uploaded_by' and doc_id='$doc_id'");
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

                    <h4 class="bgshades"> Added By: </h4>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <input type="hidden" name="hidden_id" id="hidden_id" value='<?php echo $this_id; ?>'>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Name:</label>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control" id="user_name" name="user_name" readonly value="<?php echo $user_name; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile No:</label>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control" id="user_mobile" name="user_mobile" readonly value="<?php echo $user_mobile; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <?php
                                    $cat_name = getTypeName($gri_type);
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
                    <h4 class="bgshades">Previous Remarks and History</h4>
                    <div class=" table-responsive ">
                        <table border="1" class="table table-bordered">
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
                            $f = 0;
                            function get_user1($first_id){
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

                            function get_user2($second_id) {
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

                            function get_status($status){
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

                            function get_action($action){
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

                            function get_section_action($sec_action) {
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
                                $return_action = get_action($all_fetch['admin_action']);
                                $status = get_status($all_fetch['status']);
                                $doc_id = $all_fetch['doc_id'];
                                $sec_action = get_section_action($all_fetch['section_action']);
                                if ($all_fetch['section_action'] == 4) {
                                    $f = 1;
                                } else {
                                    $f = 0;
                                }
                                echo "<tr>";
                                echo "<td>$user_id</td>";
                                echo "<td>$remark</td>";
                                echo "<td>$forwarded_date</td>";
                                echo "<td>$user_id_forwarded</td>";
                                if ($sec_action != "") {
                                    echo "<td>$sec_action</td>";
                                } else if ($return_action != "") {
                                    echo "<td>$return_action</td>";
                                } else {
                                    echo "<td>$return_action/$sec_action</td>";
                                }
                                echo "<td>$status</td>";

                                $sql_doc_sec = mysqli_query($db_egr, "select * from doc where griv_ref_no='$gri_ref_no' and uploaded_by='" . $all_fetch['user_id'] . "' AND doc_id='" . $doc_id . "'");

                                echo "<td>";
                                while ($doc_fetch = mysqli_fetch_array($sql_doc_sec)) {
                                    /*if ($all_fetch['user_id'] == '1') {
                                    } else {
                                        echo "<a href='../../admin_user/main/upload_doc/" . $doc_fetch['doc_path'] . "' target='_blank' id='" . $cnt . "' name='" . $cnt . "' >DOC&nbsp;&nbsp;&nbsp;</a>";
                                    }*/
                                    echo "<a href='admin_upload/" . $doc_fetch['doc_path'] . "' target='_blank' id='" . $cnt . "' name='" . $cnt . "' >DOC&nbsp;&nbsp;&nbsp;</a>";
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
                    <?php if (isBo() || isBA() || $f == 1) { ?>
                        <h4 class="bgshades">Add Remarks & Forward</h4>
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Action</label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <select id="action" name="action" class="form-control" required>
                                            <option value="" disabled selected>Select Action</option>
                                            <?php
                                            $action = mysqli_query($db_egr, "select * from action");
                                            while ($fetch_action = mysqli_fetch_array($action)) {
                                                echo "<option value='" . $fetch_action['id'] . "'>" . $fetch_action['action'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-6 col-xs-12">Forward to Section</label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <select id="section" name="section" class="form-control section">
                                            <option value="" disabled selected>Select Section</option>
                                            <?php
                                            if (isBA()) {
                                                $sql = "select * from tbl_section where is_branch_admin='1'";
                                            } else {
                                                $sql = "select * from tbl_section";
                                            }
                                            $section = mysqli_query($db_egr, $sql);
                                            while ($fetch_section = mysqli_fetch_array($section)) {
                                                echo "<option value='" . $fetch_section['sec_id'] . "'>" . $fetch_section['sec_name'] . "</option>";
                                            }
                                            ?>
                                            <!--<option value="solapur">sr.DPO</option>
                                                                                                                                                                                                    <option value="pune">Assisment</option>-->
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Authority</label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <select id="auth" name="auth" class="form-control">

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12"><br>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Upload</label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <input type="file" id="upfile" name="upfile[]" accept="image/*,.doc, .docx,.txt,.pdf" multiple onchange='validatefile();'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row"><br>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12">Remarks/Description</label>
                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                        <textarea name="remark" id="remark" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-sm-7 col-xs-12 pull-right">
                            <button type="submit" class="btn btn-info source">Save</button>
                            <a href="returned_back.php" class="btn btn-danger" data-dismiss="modal">Close</a>
                        </div>
                        </form>
                    <?php } else {
                    ?>
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                            <a href="returned_back.php" class="btn btn-info source">Back</a>
                        </div>
                    <?php } ?>
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
    function validatefile() {
        //alert("this is a demo");
        var file_size = $('#upfile')[0].files[0].size;
        if (file_size > 5097152) {
            // $("#file_error").html("File size is greater than 5MB");
            alert("File size is greater than 5MB");
            $("#upfile").val("");
            return false;
        }
        var fileExtension = ['jpeg', 'jpg', 'png', 'pdf', 'doc', 'docx', 'txt'];
        if ($.inArray($("#upfile").val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            alert("Only formats are allowed : " + fileExtension.join(', '));
            // $("#file_error").html("Only formats are allowed : " + fileExtension.join(', '));
            $("#upfile").val('');
            return false;
        }
        return true;
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

    $(document).on('change', '#action', function() {
        // alert(this);
        var action = $(this).val();
        // alert(action);
        if (action == 3) {
            $('#section').val(5);
            // $('#section').trigger
            $("#section").trigger('change');
        } else if (action == 2) {
            $('#section').val($('#hidden_section_id').val());
            $("#section").trigger('change');
        } else {
            $('#section').val(0);
            $("#section").trigger('change');
        }

    });
    $(document).on("change", "#section", function() {

        // debugger;
        var sec_val = $(this).val();
        //alert(sec_val);
        if (sec_val == "5") {
            var data = "<option value='<?php echo $emp_id; ?>'><?php echo $emp_name; ?></option>";

            //alert(data);
            $('#auth').html(data);
        } else {
            $.ajax({
                type: 'POST',
                url: 'get_user.php',
                data: {
                    //action:get_user,
                    section_value: sec_val,
                },
                success: function(html) {

                    $('#auth').html(html);
                }
            });
        }
    });
</script>