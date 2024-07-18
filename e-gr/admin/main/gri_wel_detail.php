<?php
require_once('Global_Data/header.php');
error_reporting(0);
include('config.php');
include('functions.php');
?>


<!-- PNotify -->
<!-- page content -->
<div class="right_col" role="main" style="background-image: url('images/small1.png');repeat:repeat;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> <i class="fa fa-users"></i>&nbsp; Grievance Details</h3><br>
            </div>

            <div class="title_right">

            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <form action="process.php?action=forward_grievance_wel" method="POST" class="form-horizontal"
                            enctype="multipart/form-data">
                            <?php
                            $got_id = $_GET['g_id'];
                            //echo "<script>alert($got_id);</script>";

                            // $fetch_query = "Select u.user_name, u.user_mob, e.emp_id,e.emp_name,e.emp_type,e.emp_dept,e.emp_desig,e.emp_email,e.emp_aadhar,e.office,e.station, g.gri_ref_no, g.gri_type, g.gri_upload_date,g.id ,e.emp_mob from employee e INNER JOIN tbl_grievance g ON e.emp_id=g.emp_id INNER JOIN tbl_user u ON g.uploaded_by = u.user_id where g.id='$got_id' ";
                            $fetch_query = "Select u.user_name, u.user_mob, e.emp_no,e.name,e.empType,e.department,e.designation,e.emp_email,e.emp_aadhar,e.office,e.station, g.gri_ref_no, g.gri_type, g.gri_upload_date,g.id ,e.mobile from $db_common_name.register_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id INNER JOIN $db_egr_name.tbl_user u ON g.uploaded_by = u.user_id where g.id='$got_id' group by g.id order by g.gri_upload_date DESC";

                            $exe_query = mysqli_query($db_egr,$fetch_query) or die(mysqli_error($db_egr));
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
                            }
                            $got_des = get_designation($emp_desig);
                            $got_dept = get_department($emp_dept);
                            $e_type = get_emptype($emp_type);
                            $office_name = get_office_text($office);
                            $got_st = get_station_text($station);
                            ?>
                            <h4 class="bgshades"> Personal Details: </h4>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <?php
                                    $this_id = $_SESSION['SESSION_ID'];
                                    //echo "<script>alert('$this_id');</script>";
                                    ?>
                                    <input type="hidden" name="hidden_id" id="hidden_id"
                                        value='<?php echo $this_id; ?>'>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Emp Id/PF No</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" id="emp_id" name="emp_id" readonly
                                                value="<?php echo $emp_id; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Emp Type</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" id="emp_type" name="emp_type"
                                                readonly value="<?php echo $e_type ?>">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Emp Name</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" id="emp_name" name="emp_name" class="form-control"
                                                readonly value="<?php echo $emp_name; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile No</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" id="emp_mobile" name="emp_mobile"
                                                readonly value="<?php echo $emp_mob; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Emp Department</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" id="emp_dep" name="emp_dep" class="form-control" readonly
                                                value="<?php echo get_department($emp_depart); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Emp Designation</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" id="emp_desi" name="emp_desi"
                                                readonly value="<?php echo get_designation($emp_desig); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" id="emp_email" name="emp_email" class="form-control"
                                                readonly value="<?php echo $emp_email; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Aadhar No</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" id="emp_aadhar" name="emp_aadhar"
                                                readonly value="<?php echo $emp_aadhar; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Office</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" id="emp_office" name="emp_office" class="form-control"
                                                readonly value="<?php echo get_office_text($emp_office); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Station</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" id="emp_station" name="emp_station"
                                                readonly value="<?php echo get_station_text($emp_station); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <h4 class="bgshades"> Grievance Details: </h4>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-3 col-xs-12"></label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <?php
                                            $fetch_cat = mysqli_query($db_egr,"select cat_name from category where cat_id=$gri_type");
                                            while ($cat_fetch = mysqli_fetch_array($fetch_cat)) {
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
                                            function get_status($status)
                                            {
                                                global $db_egr;
                                                $sql1 = mysqli_query($db_egr,"select status from status where id=$status");
                                                $status_fetch = "";
                                                while ($sql_query1 = mysqli_fetch_array($sql1)) {
                                                    $status_fetch = $sql_query1['status'];
                                                }
                                                return $status_fetch;
                                            }
                                            function get_action($action)
                                            {
                                                global $db_egr;
                                                $f_action = mysqli_query($db_egr,"select action from action where id=$action");
                                                while ($action_f = mysqli_fetch_array($f_action)) {
                                                    $a_c = $action_f['action'];
                                                }
                                                return $a_c;
                                            }
                                            $fire_all = mysqli_query($db_egr,"select  * from tbl_grievance where gri_ref_no='" . $gri_ref_no . "'");
                                            while ($all_fetch = mysqli_fetch_array($fire_all)) {
                                                // print_r($all_fetch);
                                                $gri_ref_no = $all_fetch['gri_ref_no'];
                                                $forwarded_date = $all_fetch['gri_upload_date'];
                                                $remark = $all_fetch['gri_desc'];
                                                $return_action=get_action($all_fetch['action']);
                                                $status = get_status($all_fetch['status']);
                                                $doc_id = $all_fetch['doc_id'];
                                                $upload = $all_fetch["uploaded_by"];
                                                echo "<tr>";
                                                echo "<td>$gri_ref_no</td>";
                                                echo "<td>$remark</td>";
                                                echo "<td>$forwarded_date</td>";
                                                //	echo "<td>$return_action</td>";
                                                echo "<td>$status</td>";
                                                $sql_doc_sec = mysqli_query($db_egr,"select * from doc where griv_ref_no='$gri_ref_no' and uploaded_by='$upload' and doc_id='$doc_id'");
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

                            <h4 class="bgshades"> Added By: </h4>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">

                                    <input type="hidden" name="hidden_id" id="hidden_id"
                                        value='<?php echo $this_id; ?>'>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Name:</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" id="user_name" name="user_name"
                                                readonly value="<?php echo $user_name; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile No:</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" id="user_mobile" name="user_mobile"
                                                readonly value="<?php echo $user_mobile; ?>">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4 class="bgshades col-xs-12">Add Remarks &amp; Forward</h4>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-1 col-xs-12">Action</label>
                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <select id="action" name="action" style="width:100%" class="form-control"
                                                required>
                                                <option value="" disabled selected>Select Action</option>
                                                <?php
                                                $action = mysqli_query($db_egr,"select * from action");
                                                while ($fetch_action = mysqli_fetch_array($action)) {
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
                                </div>
                                <?php if (!isBA()) { ?>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="checkbox" name="chk_transfer_other_bo" id="chk_transfer_other_bo">
                                        <label class="control-label " for="chk_transfer_other_bo">Do You Want To
                                            Transfer
                                            to Other BO</label>
                                    </div>
                                </div>
                                <?php } ?>

                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12" id="div_other_bo">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-1 col-xs-12">Forward To Other Branch
                                            Officers</label>
                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <select id="lstOtherBO" name="lstOtherBO" style="width:100%"
                                                class="form-control select2">
                                                <!-- <?php
                                                        /*  $user = mysqli_query("select * from tbl_user where role='5'", $db_egr);
                                                while ($fetch_user = mysqli_fetch_array($user)) {
                                                    echo "<option value='" . $fetch_user['user_id'] . "'>" . $fetch_user['user_name'] . "</option>";
                                                }*/
                                                        ?> -->
                                                <?php
                                                //  where role='5'
                                                $user = mysqli_query($db_egr,"select * from tbl_user where status='active'");
                                                while ($fetch_user = mysqli_fetch_array($user)) {
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
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-2 col-xs-12">Forward to
                                                Section</label>
                                            <div class="col-md-8 col-sm-12 col-xs-12">
                                                <select id="section" name="section" style="width:100%"
                                                    class="form-control " multiple="multiple">
                                                    <option value="0" hidden readonly selected disabled>Select Section
                                                    </option>
                                                    <?php
                                                    if (isBA()) {
                                                        $sql = "select * from tbl_section where is_branch_admin='1'";
                                                    } else if (isAdmin()) {
                                                        $sql = "select * from tbl_section where is_branch_admin!='1'";
                                                    } else {
                                                        $sql = "select * from tbl_section";
                                                    }
                                                    $section = mysqli_query($db_egr,$sql);
                                                    while ($fetch_section = mysqli_fetch_array($section)) {
                                                        echo "<option value='" . $fetch_section['sec_id'] . "'>" . $fetch_section['sec_name'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-1 col-xs-12">Authority</label>
                                            <div class="col-md-8 col-sm-12 col-xs-12">
                                                <select id="auth" name="auth" style="width:100%"
                                                    class="form-control select2" multiple="multiple">

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- added upload file input ------------------------>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-1 col-xs-12">Upload Document</label>
                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <input type="file" id="upfile" name="upfile[]"
                                                accept="image/*,.doc, .docx,.txt,.pdf" multiple
                                                onchange='validatefile();'>
                                        </div>
                                    </div>
                                </div>
                                <!-- end upload file input ------------------------>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label
                                            class="control-label col-md-1 col-sm-1 col-xs-12">Remarks/Description</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <textarea name="remark" id="remark" rows="5" style="resize:none;"
                                                class="form-control">
									</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="col-sm-7 col-xs-12 pull-right">
                                <input type="submit" class="btn btn-info source" value='Save'>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
// $(".select2").select2();
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
$(document).ready(function() {
    $("#div_other_bo").hide();
    $("#div_other_bo_off").show();
    $(".select2").select2();
    $("#section").select2();
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

    var section_value = $(this).val();
    $("#section_value").val(section_value);
    //alert(section_value);
    if (section_value == "5") {
        var data = "<option value='<?php echo $emp_id; ?>'><?php echo $emp_name; ?></option>";
        /* $('#auth').append($('<option>', {
        		value: <?php echo $emp_id; ?>,
        		text: "<?php echo $emp_name; ?>"
        	}));  	
        	//alert(data);*/
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