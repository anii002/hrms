<?php
require_once('Global_Data/header.php');
error_reporting(0);
?>
<!-- PNotify -->
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> Grievance Details</h3><br>
            </div>
            <!--<div class="title_right"></div>-->
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h4 class="bgshades"> Personal Details: </h4>
                    </div>
                    
                        <form action="process.php?action=forward_grievance" method="POST" class="form-horizontal"
                            enctype="multipart/form-data">
                            <?php
                            $got_id = $_GET['g_id'];
                            //echo "<script>alert($got_id);</script>";

                            // $fetch_query = "select e.emp_type,e.emp_id,e.emp_name,e.emp_dept,e.emp_desig,e.emp_mob,e.emp_email,e.emp_aadhar,e.emp_address1,e.emp_state,e.emp_city,e.emp_pincode,e.office_emp_address1,e.office_emp_state,e.office_emp_city,e.office_emp_pincode,e.office,e.station,g.gri_type,g.gri_desc,g.up_doc,g.gri_upload_date,g.gri_ref_no,g.doc_id from employee e INNER JOIN tbl_grievance g ON e.emp_id=g.emp_id WHERE g.id=$got_id";
                            $fetch_query = "select e.empType,e.emp_no,e.name,e.department,e.designation,e.mobile    ,e.emp_email,e.emp_aadhar,e.emp_address1,e.emp_state,e.emp_city,e.emp_pincode,e.office_emp_address1,e.office_emp_state,e.office_emp_city,e.office_emp_pincode,e.office,e.station,g.gri_type,g.gri_desc,g.up_doc,g.gri_upload_date,g.gri_ref_no,g.doc_id from $db_common_name.register_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id WHERE g.id=$got_id group by g.id order by g.gri_upload_date DESC";
                            $exe_query = mysql_query($fetch_query) or die(mysql_error());
                            while ($result = mysql_fetch_array($exe_query)) {
                                $emp_type = $result['empType'];
                                $emp_id = $result['emp_no'];
                                $emp_name = $result['name'];
                                $emp_dept = $result['department'];
                                $emp_desig = $result['designation'];
                                $emp_mob = $result['mobile'];
                                $emp_email = $result['emp_email'];
                                $emp_aadhar = $result['emp_aadhar'];
                                $emp_address1 = $result['emp_address1'];
                                $emp_state = $result['emp_state'];
                                $emp_city = $result['emp_city'];
                                $emp_pincode = $result['emp_pincode'];
                                $office_emp_address1 = $result['office_emp_address1'];
                                $office_emp_state = $result['office_emp_state'];
                                $office_emp_city = $result['office_emp_city'];
                                $office_emp_pincode = $result['office_emp_pincode'];
                                $office = $result['office'];
                                $station = $result['station'];
                                $gri_type = $result['gri_type'];
                                $gri_desc = $result['gri_desc'];
                                $up_doc = $result['up_doc'];
                                $gri_upload_date = $result['gri_upload_date'];
                                $gri_ref_no = $result['gri_ref_no'];
                                $doc_id = $result['doc_id'];
                            }
                            $got_des = get_designation($emp_desig);
                            $got_dept = get_department($emp_dept);
                            $e_type = get_emptype($emp_type);
                            $office_name = get_office_text($office);
                            $got_st = get_station_text($station);
                            //echo '<script>alert("'.$sql.'");</script>';
                            ?>
                            
                            <div class="row">
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="">Employee Type</label>
                                        <?php
                                        $this_id = $_SESSION['SESSION_ID'];
                                        //echo "<script>alert('$this_id');</script>";
                                        ?>
                                        <input type="hidden" name="hidden_id" id="hidden_id"
                                            value="<?php echo $this_id; ?>">
                                        <input type="text" class="form-control" id="emp_id" name="emp_id" readonly
                                            value="<?php echo $e_type; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="">Emp Id/PF No</label>
                                        <input type="text" class="form-control" id="emp_id" name="emp_id" readonly
                                                value="<?php echo $emp_id; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="">Emp Name</label>
                                        <input type="text" class="form-control" id="emp_name" name="emp_name"
                                                readonly value="<?php echo $emp_name; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="">Department</label>
                                        <input type="text" class="form-control" id="emp_name" name="emp_name"
                                                readonly value="<?php echo $got_dept; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="">Designation</label>
                                        <input type="text" class="form-control" id="emp_name" name="emp_name"
                                                readonly value="<?php echo $got_des; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="">Mobile No.</label>
                                        <input type="text" id="emp_mob" name="emp_mob" class="form-control" readonly
                                                value="<?php echo $emp_mob; ?>">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="">Email Id</label>
                                        <input type="text" id="emp_email" name="emp_email" class="form-control"
                                                readonly value="<?php echo $emp_email; ?>">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="">Aadhar No.</label>
                                        <input type="text" id="emp_aadhar" name="emp_aadhar" class="form-control"
                                                readonly value="<?php echo $emp_aadhar; ?>">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="">Office</label>
                                        <input type="text" id="emp_email" name="emp_email" class="form-control"
                                                readonly value="<?php echo $office_name; ?>">
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="">Station</label>
                                        <input type="text" id="emp_aadhar" name="emp_aadhar" class="form-control"
                                                readonly value="<?php echo $got_st; ?>">
                                    </div>
                                </div>
                            </div>
                            
                        <div class="x_title">
                            <h4 class="bgshades">Personal Address: </h4>
                        </div>
                        
                            <div class="row">
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="">Address 1</label>
                                        <textarea rows="3" cols="30" id="emp_address1" name="emp_address1"
                                                class="form-control" readonly><?php echo $emp_address1; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="">State</label>
                                        <input type="text" class="form-control" id="emp_name" name="emp_name"
                                                readonly value="<?php echo $emp_state; ?>">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="">City</label>
                                        <input type="text" class="form-control" id="emp_name" name="emp_name"
                                                readonly value="<?php echo $emp_city; ?>">
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="">Pincode</label>
                                        <input type="text" id="emp_pincode" name="emp_pincode" class="form-control"
                                                readonly value="<?php echo $emp_pincode; ?>">
                                    </div>
                                </div>
                            </div>
                            
                        <div class="x_title">
                            <h4 class="bgshades"> Office Address: </h4>
                        </div>
                        
                            <div class="row">
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="">Address 1</label>
                                        <textarea rows="3" cols="30" id="office_emp_address1"
                                                name="office_emp_address1" class="form-control"
                                                readonly><?php echo $office_emp_address1; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="">State</label>
                                        <input type="text" class="form-control" id="emp_name" name="emp_name"
                                                readonly value="<?php echo $office_emp_state; ?>">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="">City</label>
                                        <input type="text" class="form-control" id="emp_name" name="emp_name"
                                                readonly value="<?php echo $office_emp_city; ?>">
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="">Pincode</label>
                                        <input type="text" id="office_emp_pincode" name="office_emp_pincode"
                                                class="form-control" readonly
                                                value="<?php echo $office_emp_pincode; ?>">
                                    </div>
                                </div>
                            </div>
                            
                        <div class="x_title">
                            <h4 class="bgshades"> Grievance Details: </h4>
                        </div>
                        
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-3 col-xs-12"></label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <?php
                                            $fetch_cat = mysql_query("select cat_name from category where cat_id=$gri_type", $db_egr);
                                            while ($cat_fetch = mysql_fetch_array($fetch_cat)) {
                                                $cat_name = $cat_fetch['cat_name'];
                                            }
                                            ?>
                                            <input type="hidden" id="up_office_emp_pincode" name="up_office_emp_pincode"
                                                class="form-control" readonly value="<?php echo $cat_name; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="hidden" id="griv_ref_no" name="griv_ref_no"
                                                class="form-control" readonly value="<?php echo $gri_ref_no; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 table-responsive">
                                    <table class="table table-striped table-bordered">
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

                                            $fire_all = mysql_query("select * from tbl_grievance where gri_ref_no='" . $gri_ref_no . "'", $db_egr);
                                            while ($all_fetch = mysql_fetch_array($fire_all)) {
                                                $gri_ref_no = $all_fetch['gri_ref_no'];
                                                $forwarded_date = $all_fetch['gri_upload_date'];
                                                $remark = $all_fetch['gri_desc'];
                                                //$return_action=get_action($all_fetch['action']);
                                                $status = get_status($all_fetch['status']);
                                                $doc_id = $all_fetch['doc_id'];
                                                echo "<tr>";
                                                echo "<td>$gri_ref_no</td>";
                                                echo "<td>$remark</td>";
                                                echo "<td>$forwarded_date</td>";
                                                //	echo "<td>$return_action</td>";
                                                echo "<td>$status</td>";
                                                $sql_doc_sec = mysql_query("select * from doc where griv_ref_no='$gri_ref_no' and uploaded_by='$emp_id'", $db_egr);
                                                echo "<td>";
                                                $count_doc = 1;
                                                $cnt = 0;
                                                while ($doc_fetch = mysql_fetch_array($sql_doc_sec)) {
                                                    //echo $doc_fetch['doc_path'];
                                                    echo "<a href='admin_upload/" . $doc_fetch['doc_path'] . "' target='_blank' id='" . $cnt . "' name='" . $cnt . "' >DOC&nbsp;&nbsp;&nbsp;</a>";
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
                                </div>
                            </div><input type="hidden" id="section_value" name="section_value" />
                            
                        <div class="x_title">
                            <h4 class="bgshades">Add Remarks & Forward</h4>
                        </div>
                        
                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="">Action</label>
                                        <select id="action" name="action" style="width:100%" class="form-control"
                                            required>
                                            <option value="" disabled selected>Select Action</option>
                                            <?php
                                            $action = mysql_query("select * from action", $db_egr);
                                            while ($fetch_action = mysql_fetch_array($action)) {
                                                if ($fetch_action['action'] == 'CLOSE') {
                                                    if (isBA() || isBo()) {
                                                        echo "<option value='" . $fetch_action['id'] . "'>" . $fetch_action['action'] . "</option>";
                                                    }
                                                } else {
                                                    echo "<option value='" . $fetch_action['id'] . "'>" . $fetch_action['action'] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <?php if (!isBA()) { ?>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="checkbox" name="chk_transfer_other_bo" id="chk_transfer_other_bo">
                                        <label class="control-label " for="chk_transfer_other_bo">Do You Want To
                                            Transfer to Other Branch Admin</label>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="col-md-4 col-sm-6 col-xs-12" id="div_other_bo">
                                    <div class="form-group">
                                        <label class="">Forward To Other Branch Officers</label>
                                        <select id="lstOtherBO" name="lstOtherBO" style="width=100%"
                                            class="form-control select2">
                                            <?php
                                            // where role='5'
                                            $user = mysql_query("select * from tbl_user where status='active'", $db_egr);
                                            while ($fetch_user = mysql_fetch_array($user)) {
                                                $des_id = $fetch_user['user_desg'];
                                                $user_role = explode(",", $fetch_user["role"]);
                                                if (in_array('5', $user_role)) {
                                                    $user_design = get_designation($des_id);
                                                    $user_design_short = get_designation_short($des_id);
                                                    echo "<option value='" . $fetch_user['user_id'] . "'>" . $fetch_user['user_name'] . "(" . $user_design . "/" . $user_design_short . ")</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div id="div_other_bo_off">
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="">Forward to Section</label>
                                        <select id="section" name="section" style="width:100%"
                                            class="form-control select2" multiple="multiple">
                                            <option value="" hidden readonly>Select Section</option>
                                            <?php
                                            if (isBA()) {
                                                $sql = "select * from tbl_section where is_branch_admin='1'";
                                            }/* else if (isAdmin()) {
                                                $sql = "select * from tbl_section where is_branch_admin!='1'";
                                            }*/
                                            else {
                                                $sql = "select * from tbl_section";
                                            }
                                            $section = mysql_query($sql, $db_egr);
                                            while ($fetch_section = mysql_fetch_array($section)) {
                                                if(isAdmin()){
                                                    if($fetch_section["is_branch_admin"]!=1 || $fetch_section["sec_id"]==5){
                                                         echo "<option value='" . $fetch_section['sec_id'] . "'>" . $fetch_section['sec_name'] . "</option>";
                                                    }
                                                    
                                                }else{
                                                echo "<option value='" . $fetch_section['sec_id'] . "'>" . $fetch_section['sec_name'] . "</option>";
                                                }
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                                <?php if (isAdmin()) { ?>
                                    <input type="hidden" name="hidden_section_id" id="hidden_section_id" value="5">
                                <?php } ?>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="">Authority</label>
                                        <select id="auth" name="auth" style="width=100%"
                                            class="form-control select2" multiple="multiple">
                                        </select>
                                    </div>
                                </div>
                            </div>
                    

                    <div class="row">
                        <!-- added upload file input ------------------------>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="">Upload Document</label>
                                <div class="" id="flupload">
                                    <input type="file" id="upfile" name="upfile[]"
                                        accept="image/*,.doc, .docx,.txt,.pdf" onchange="return validatefile();"
                                        multiple>
                                    <span style="color: #FF0000;" id="file_error"></span>
                                </div>
                            </div>
                        </div>
                        <!-- end upload file input ------------------------>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-1 col-sm-1 col-xs-12">Remarks/Description</label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <textarea name="remark" id="remark" rows="5" style="resize:none;"
                                        class="form-control">
									</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-sm-7 col-xs-12">
                        <button type="submit" class="btn btn-info source">Save</button>
                        <a href="index.php" class="btn btn-danger" data-dismiss="modal">Close</a>
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

<script src="select2/select2.full.min.js"></script>
<!-- Select2 -->
<link rel="stylesheet" href="select2/select2.min.css">

<link href="select2/select2.min.css" rel="stylesheet" />
<script src="select2/select2.min.js"> </script>
<script>
$("#emp_dept").select2();
$("#emp_desig").select2();
$("#emp_state").select2();
$("#emp_city").select2();
$("#office_emp_state").select2();
$("#office_emp_city").select2();
$(".select2").select2();
</script>
<script>
$(document).ready(function() {
    $("#div_other_bo").hide();
    $("#div_other_bo_off").show();
    $('#chk_transfer_other_bo').change(function(e) {
        if ($('input[name="chk_transfer_other_bo"]').is(':checked')) {
            $("#div_other_bo").show();
            $("#div_other_bo_off").hide();
        } else {
            // alert("not working");
            $("#div_other_bo").hide();
            $("#div_other_bo_off").show();
        }
    });
});

function validatefile() {
    var file_size = $('#upfile')[0].files[0].size;
    if (file_size > 5097152) {
        $("#file_error").html("File size is greater than 5MB");
        $("#upfile").val("");
        return false;
    }
    var fileExtension = ['jpeg', 'jpg', 'png', 'pdf', 'doc', 'docx', 'txt'];
    if ($.inArray($("#upfile").val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        // alert("Only formats are allowed : " + fileExtension.join(', '));
        $("#file_error").html("Only formats are allowed : " + fileExtension.join(', '));
        $("#upfile").val('');
        return false;
    }
    return true;
}
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
    var section_value = $(this).val();
    $("#section_value").val(section_value);
    //alert(section_value);
    if (section_value == "5") {
        var data = "<option value='<?php echo $emp_id; ?>'><?php echo $emp_name; ?></option>";

        $('#auth').html(data);
    } else {
        $.ajax({
            type: "Post",
            url: "get_user.php",
            data: "action=get_data&section_value=" + section_value,
            success: function(data) {
                //alert(data);
                $('#auth').html(data);
            }
        });
        /*$.ajax({
			type:'POST',
			url:'get_user.php',
			data: {
	         // action: 'get_data',
	          sec_val: sec_val,
	        },
			success:function(html){
				debugger;
				alert(html);
				 $('#auth').html(html); 	
			}
		});*/
    }
});
</script>