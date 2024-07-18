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
                        <form action="process.php?action=forward_grievance" method="POST" class="form-horizontal"
                            enctype="multipart/form-data">
                            <?php
							$got_id = $_GET['g_id'];
							//echo "<script>alert($got_id);</script>";

							$fetch_query = "select u.user_name, u.user_mob, e.emp_id,e.emp_name,e.mobile_no,g.gri_type,g.gri_desc,g.gri_upload_date,g.gri_ref_no,g.doc_id,g.uploaded_by from temp_emp_admin e INNER JOIN tbl_grievance g ON e.emp_id=g.emp_id INNER JOIN tbl_user u ON g.uploaded_by = u.user_id WHERE g.id=$got_id";

							$exe_query = mysqli_query($db_egr,$fetch_query) or die(mysqli_error($db_egr));
							while ($result = mysqli_fetch_array($exe_query)) {
									$emp_id = $result['emp_id'];
									$emp_name = $result['emp_name'];
									$mobile_no = $result['mobile_no'];
									$gri_type = $result['gri_type'];
									$gri_desc = $result['gri_desc'];
									$gri_upload_date = $result['gri_upload_date'];
									$gri_ref_no = $result['gri_ref_no'];
									$doc_id = $result['doc_id'];
									$uploaded_by = $result['uploaded_by'];
									$user_name = $result['user_name'];
									$user_mobile = $result['user_mob'];
								}
							?>
                            <h4 class="bgshades"> Personal Details: </h4>
                            <?php
							$this_id = $_SESSION['SESSION_ID'];
							//echo "<script>alert('$this_id');</script>";

							?>
                            <div class="row">

                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Emp Id/PF No</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" id="emp_id" name="emp_id" readonly
                                                value="<?php echo $emp_id; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Emp Name</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" id="emp_name" name="emp_name"
                                                readonly value="<?php echo $emp_name; ?>">

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile No.</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" id="emp_mob" name="emp_mob" class="form-control" readonly
                                                value="<?php echo $mobile_no; ?>">
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
													$sql_doc_sec = mysqli_query($db_egr,"select * from doc where griv_ref_no='$gri_ref_no' and uploaded_by='$uploaded_by'");
													echo "<td>";
													$count_doc = 1;
													$cnt = 0;
													while ($doc_fetch = mysqli_fetch_array($sql_doc_sec)) {
															//echo $doc_fetch['doc_path'];
															echo "<a href='../../admin_welfare/main/upload_doc/" . $doc_fetch['doc_path'] . "' target='_blank' id='" . $cnt . "' name='" . $cnt . "' >DOC&nbsp;&nbsp;&nbsp;</a>";
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
                                            <input type="text" class="form-control" id="emp_id" name="emp_id" readonly
                                                value="<?php echo $user_name; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile No:</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" id="emp_name" name="emp_name"
                                                readonly value="<?php echo $user_mobile; ?>">

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <h4 class="bgshades col-xs-12">Add Remarks & Forward</h4>
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
														echo "<option value='" . $fetch_action['id'] . "'>" . $fetch_action['action'] . "</option>";
													}
												?>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-2 col-xs-12">Forward to
                                            Section</label>
                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <select id="section" name="section" style="width:100%" class="form-control"
                                                required>
                                                <option value="" disabled selected>Select Section</option>
                                                <?php
												$section = mysqli_query($db_egr,"select * from tbl_section");
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
                                            <select id="auth" name="auth" style="width:100%" class="form-control">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- added upload file input ------------------------>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-1 col-xs-12">Upload Document</label>
                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <input type="file" id="upfile" name="upfile[]"
                                                accept="image/*,.doc, .docx,.txt,.pdf" multiple>
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
                                <button type="submit" class="btn btn-info source">Save</button>
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
    debugger;
    var sec_val = $(this).val();
    if (sec_val == "5") {
        var data = "<option value='<?php echo $emp_id; ?>'><?php echo $emp_name; ?></option>";
        /* $('#auth').append($('<option>', {
        		value: <?php echo $emp_id; ?>,
        		text: "<?php echo $emp_name; ?>"
        	}));  */
        //alert(data);
        $('#auth').html(data);
    } else {
        //alert(sec_val);
        $.ajax({
            type: 'POST',
            url: 'get_user.php',
            data: {
                //action:get_user,
                sec_val: sec_val,
            },
            success: function(html) {

                $('#auth').html(html);
            }
        });
    }
});
</script>