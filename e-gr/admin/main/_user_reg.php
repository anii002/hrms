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
                <h3> <i class="fa fa-users"></i>User/Admin Registration</h3><br>
            </div>

            <div class="title_right">

            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <form action="process.php?action=add_user" method="POST" class="form-horizontal">
                            <h4 class="bgshades"> Personal Details: </h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4" style="margin-left: -50px;">Emp Id/PF
                                            No</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="emp_id" name="emp_id"
                                                placeholder="Enter Employee Id Or PF No. Or PPO No.">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4" style="margin-left: -50px;">Emp
                                            Name</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="user_name" name="user_name"
                                                placeholder="Enter Employee Name">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4"
                                            style="margin-left: -50px;">Section</label>
                                        <div class="col-md-8">
                                            <select name="section" id="section" class="form-control" multiple>
                                                <?php
												$fetch_section = mysql_query("select * from tbl_section");
												while ($section_fetch = mysql_fetch_array($fetch_section)) {
													echo "<option value='" . $section_fetch['sec_id'] . "'>" . $section_fetch['sec_name'] . "</option>";
												}

												?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4"
                                            style="margin-left: -50px;">Department</label>
                                        <div class="col-md-8">
                                            <select id="user_dept" name="user_dept" class="form-control mydept">
                                                <option value="" disabled selected>Select Department</option>
                                                <?php
												$fetch_dept = mysql_query("select * from  tbl_department");
												while ($dept_fetch = mysql_fetch_array($fetch_dept)) {
													echo "<option value='" . $dept_fetch['dept_id'] . "'>" . $dept_fetch['deptname'] . "</option>";
												}
												?>
                                                <!--<option value="Bill">Bill</option>
									<option value="Account">Account</option>-->
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4"
                                            style="margin-left: -50px;">Designation</label>
                                        <div class="col-md-8">
                                            <select id="user_desig" name="user_desig" class="form-control">
                                                <option value="" disabled selected>Select Designation</option>
                                                <?php
												$fetch_des = mysql_query("select * from  tbl_designation");
												while ($des_fetch = mysql_fetch_array($fetch_des)) {
													echo "<option value='" . $des_fetch['id'] . "'>" . $des_fetch['designation'] . "</option>";
												}
												?>
                                                <!--option value="DPO">DPO</option>
									<option value="Sr DPO">Sr DPO</option-->
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4" style="margin-left: -50px;">Mobile
                                            No.</label>
                                        <div class="col-md-8">
                                            <input type="text" id="user_mob" name="user_mob" class="form-control"
                                                placeholder="Enter Mobile No.">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4" style="margin-left: -50px;">Email
                                            Id</label>
                                        <div class="col-md-8">
                                            <input type="text" id="user_email" name="user_email" class="form-control"
                                                placeholder="Enter Email Address">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4" style="margin-left: -50px;">Aadhar
                                            No.</label>
                                        <div class="col-md-8">
                                            <input type="text" id="user_aadhar" name="user_aadhar" class="form-control"
                                                placeholder="Enter Aadhar No.">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4" style="margin-left: -50px;">Office</label>
                                        <div class="col-md-8">
                                            <select id="user_office" name="user_office" class="form-control">

                                                <?php
												$fetch_office = mysql_query("select * from tbl_office");
												while ($office_fetch = mysql_fetch_array($fetch_office)) {
													echo "<option value='" . $office_fetch['office_id'] . "'>" . $office_fetch['office_name'] . "</option>";
												}
												?>
                                            </select>
                                            <!--<input type="text" id="user_office" name="user_office" class="form-control" placeholder="Enter Office">-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4"
                                            style="margin-left: -50px;">Station</label>
                                        <div class="col-md-8">
                                            <select id="user_station" name="user_station" class="form-control">
                                                <?php
												$fetch_station = mysql_query("select * from tbl_station");
												while ($station_fetch = mysql_fetch_array($fetch_station)) {
													echo "<option value='" . $station_fetch['station_id'] . "'>" . $station_fetch['station_name'] . "</option>";
												}
												?>
                                                <!--<option value="solpaur">Solapur DRM</option>
										<option value="pune">Pune DRM</option>-->
                                            </select>
                                            <!--<input type="text" id="emp_station" name="emp_station" class="form-control" placeholder="Enter Station">-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4" style="margin-left: -50px;">User
                                            Name</label>
                                        <div class="col-md-8">
                                            <?php
											$six_digit_random_number = mt_rand(100000, 999999);
											?>
                                            <input type="text" id="login_name" name="login_name" class="form-control"
                                                value="SUR_<?php echo $six_digit_random_number; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4"
                                            style="margin-left: -50px;">Password</label>
                                        <div class="col-md-8">
                                            <input type="text" id="login_pass" name="login_pass" class="form-control"
                                                value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-left:850px;">
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
$("#user_desig").select2();
$("#emp_state").select2();
$("#emp_city").select2();
$("#office_emp_state").select2();
$("#office_emp_city").select2();
$("#user_office").select2();
$("#user_station").select2();
$("#section").select2();
$("#user_dept").select2();
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
$(document).on("change", "#user_aadhar", function() {
    var adhar_id = $(this).val();
    $("#login_pass").val(adhar_id);
});
</script>