<?php
require_once('global/header.php');
require('config.php');
error_reporting(0);
?>
<script>
$("#emp_dept").select2();
</script>

<!-- PNotify -->


<!-- page content -->
<div class="box container"
    style="padding:20px;border:0px solid black;margin-top:15px;margin-bottom:15px; background-color:#E8E8E8;">
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <span style="float:right; color:red;">* fields are required</span>
                <div style="text-align:center;">
                    <h3> <i class=""></i><b>Employee Registration</b></h3><br>
                </div>
                <div class="title_right">
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <form action="process.php?action=add_employee" method="POST" class="form-horizontal" id="">
                                <h4 class="bgshades">Personal Details: <span
                                        style="float:right;font-size:10px;color:red;">Employee No. will be your
                                        username<br> and Mobile number will be password</span></h4>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Employee Type<span
                                                    class="required">*</span></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <select id="emp_type" required name="emp_type" class="form-control"
                                                    style="width:100%">
                                                    <option value="" disabled selected>Select Employee</option>
                                                    <?php
													$query_emp = "select * from emp_type";
													$result_emp = mysqli_query($db_egr,$query_emp);
													while ($value_emp = mysqli_fetch_array($result_emp)) {
															echo "<option value='" . $value_emp['id'] . "'>" . $value_emp['type'] . "</option>";
														}
													?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Emp No./PF No./PPO
                                                No.<span class="required">*</span></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" required class="form-control" id="emp_id"
                                                    name="emp_id" placeholder="Enter Employee No. Or PF No. Or PPO No.">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Emp Name<span
                                                    class="required">*</span></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" required class="form-control" id="emp_name"
                                                    name="emp_name" placeholder="Enter Employee Name"
                                                    onChange="username(this)">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Department<span
                                                    class="required">*</span></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <select id="emp_dept" name="emp_dept" class="form-control mydept"
                                                    style="width:100%" required>
                                                    <option selected hidden readonly disabled>Select Department</option>
                                                    <?php
													$query_dept = "SELECT * FROM `tbl_department`";
													$result_dept = mysqli_query($db_egr,$query_dept);
													while ($value_dept = mysqli_fetch_array($result_dept)) {
															echo "<option value='" . $value_dept['dept_id'] . "'>" . $value_dept['deptname'] . "</option>";
														}
													?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Designation<span
                                                    class="required">*</span></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <select id="emp_desig" name="emp_desig" class="form-control"
                                                    style="width:100%" required>
                                                    <option value="" disabled selected>Select Designation</option>
                                                    <?php
													/* $query_design = "SELECT * FROM `tbl_designation`";
										$result_design = mysqli_query($query_design);
										while($value_design = mysqli_fetch_array($result_design))
										{
											echo "<option value='".$value_design['id']."'>".$value_design['designation']."</option>";
										} */
													?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Mobile No<span
                                                    class="required">*</span></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" id="emp_mob" name="emp_mob" class="form-control"
                                                    placeholder="Enter Mobile No." maxlength="10" required
                                                    onChange="phonenumber(this)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Email Id</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="email" id="emp_email" name="emp_email" class="form-control"
                                                    placeholder="Enter Email Address">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Aadhar No</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="number" id="emp_aadhar" name="emp_aadhar"
                                                    class="form-control" placeholder="Enter Aadhar No." maxlength="12"
                                                    onChange="adharnumber(this)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Office<span
                                                    class="required">*</span></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <select id="emp_office" required name="emp_office" class="form-control"
                                                    style="width:100%">
                                                    <option value="" disabled selected>Select Office</option>
                                                    <?php
													$query_office = "SELECT * FROM `tbl_office`";
													$result_office = mysqli_query($db_egr,$query_office);
													while ($value_office = mysqli_fetch_array($result_office)) {
															echo "<option value='" . $value_office['office_id'] . "'>" . $value_office['office_name'] . "</option>";
														}
													?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Station<span
                                                    class="required">*</span></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <select id="station" name="emp_station" class="form-control"
                                                    style="width:100%">
                                                    <option value="" disabled selected>Select Station</option>
                                                    <?php
													$query_station = "SELECT * FROM `tbl_station`";
													$result_station = mysqli_query($db_egr,$query_station);
													while ($value_result = mysqli_fetch_array($result_station)) {
															echo "<option value='" . $value_result['station_id'] . "'>" . $value_result['station_name'] . "</option>";
														}
													?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="bgshades">Personal Address:</h4>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Address 1</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea rows="3" cols="30" id="emp_address1" name="emp_address1"
                                                    class="form-control" placeholder="Enter Address"
                                                    style="resize:none;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Address 2</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea rows="3" cols="30" id="emp_address2" name="emp_address2"
                                                    class="form-control" placeholder="Enter Address"
                                                    style="resize:none;"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">State</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <?php
												$query = mysqli_query($db_egr,"SELECT * FROM states WHERE status = 1 AND country_id=100 ORDER BY state_name ASC");
												$rowCount = mysqli_num_rows($query);
												?>
                                                <select name="emp_state" id="emp_state" class="form-control"
                                                    style="margin-top:0px; width:100%;">
                                                    <option disabled selected>Select State</option>
                                                    <?php
													if ($rowCount > 0) {
														while ($row = mysqli_fetch_assoc($query)) {
															echo '<option value="' . $row['state_id'] . '">' . $row['state_name'] . '</option>';
														}
													} else {
														echo '<option value="">State not available</option>';
													}
													?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">City</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <select name="emp_city" id="emp_city" class="form-control"
                                                    style="margin-top:0px;width:100%">
                                                    <option disabled selected>Select state first</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Pincode</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" id="emp_pincode" name="emp_pincode"
                                                    class="form-control" placeholder="Enter Pincode">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="bgshades"> Office Address: </h4>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Address 1</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea rows="3" cols="30" id="office_emp_address1"
                                                    name="office_emp_address1" style="resize:none;" class="form-control"
                                                    placeholder="Enter Address"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Address 2</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea rows="3" cols="30" id="office_emp_address2"
                                                    name="office_emp_address2" style="resize:none;" class="form-control"
                                                    placeholder="Enter Address"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">State</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <?php
												$query = mysqli_query($db_egr,"SELECT * FROM states WHERE status = 1 AND country_id=100 ORDER BY state_name ASC");
												$rowCount = mysqli_num_rows($query);
												?>
                                                <select name="office_emp_state" id="office_emp_state"
                                                    class="form-control" style="margin-top:0px;width:100%">
                                                    <option disabled selected>Select State</option>
                                                    <?php
													if ($rowCount > 0) {
														while ($row = mysqli_fetch_assoc($query)) {
															echo '<option value="' . $row['state_id'] . '">' . $row['state_name'] . '</option>';
														}
													} else {
														echo '<option value="">State not available</option>';
													}
													?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">City</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <select name="office_emp_city" id="office_emp_city" class="form-control"
                                                    style="margin-top:0px; width:100%;">
                                                    <option disabled selected>Select state first</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Pincode</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" id="office_emp_pincode" name="office_emp_pincode"
                                                    class="form-control" placeholder="Enter Pincode">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div style="float:right;" class="col-sm-6 col-xs-12">
                                    <button type="submit" class="btn btn-info source">Save</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                </div>
                            </form>
                        </div>

                    </div>
                    <!--div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div>
                    <h2>Employee <small>List</small></h2><hr>
                 <div class="x_content">
					<table  class="table table-striped table-bordered display" style="width:100%;"> 
                      <thead>
                         <tr>
							<th>Sr.No</th>
							<th>Type</th>
							<th>ID/PF.No</th>
							<th>Name</th>
							<th>Department</th>
							<th>Designation</th>
							<th>Moblile No.</th>
						 </tr>
					  </thead>
                      <tbody-->
                    <?php
					// $cnt=1;
					// $query=mysqli_query("Select * from employee where delete_status=1 Limit 50");
					// while($rw_data=mysqli_fetch_assoc($query)){
					// $emp_type=$rw_data["emp_type"];
					// $emp_id=$rw_data["emp_id"];
					// $emp_name=$rw_data["emp_name"];
					// $emp_dept=$rw_data["emp_dept"];
					// $emp_desig=$rw_data["emp_desig"];
					// $emp_mob=$rw_data["emp_mob"];
					// echo "<tr>";
					// echo "<td>$cnt</td>";
					// echo "<td>$emp_type</td>";
					// echo "<td>$emp_id</td>";
					// echo "<td>$emp_name</td>";
					// echo "<td>$emp_dept</td>";
					// echo "<td>$emp_desig</td>";
					// echo "<td>$emp_mob</td>";
					// echo "</tr>";
					// $cnt++;
					// }
					?>

                    <!--/tbody>
                    </table>
                  </div>             
				  </div>
              </div>

              
            </div>
          </div-->
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require_once('Global/footer.php');
?>
<link href="select2.css" rel="stylesheet" />
<script src="select2.js"> </script>

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
// get designation on department
$("#emp_dept").on("change", function() {
    var emp_dept = $(this).val();
    $.ajax({
        type: 'POST',
        url: 'get_desig_office.php',
        data: 'emp_dept=' + emp_dept,
        success: function(html) {
            var array = html.split("$");
            $('#emp_desig').children('option').remove();
            $('#emp_desig').append(array[0]);
            $('#emp_office').children('option').remove();
            $('#emp_office').html(array[1]);
            //alert(array[1]);
        }
    });
});
</script>
<script>
$(document).ready(function() {

    $("#emp_dept").select2();
    $("#emp_state").select2();
    $("#emp_type").select2();
    $("#emp_desig").select2();
    $("#emp_state").select2();
    $("#emp_city").select2();
    $("#emp_office").select2();
    $("#station").select2();
    $("#office_emp_state").select2();
    $("#office_emp_city").select2();
});

function phonenumber(inputtxt) {
    var phoneno = /(7|8|9)\d{9}/;
    if ((inputtxt.value.match(phoneno))) {
        return true;
    } else {
        alert("Mobile number must be integer and 10 digits");
        $("#emp_mob").val("");
        return false;
    }
}

function adharnumber(inputtxt) {
    var phoneno = /^\d{12}$/;
    if ((inputtxt.value.match(phoneno))) {
        return true;
    } else {
        alert("Adhar number must be integer and 12 digits");
        $("#emp_aadhar").val("");
        return false;
    }
}

function username(inputtxt) {
    var phoneno = /^[A-Za-z ]+$/;
    if ((inputtxt.value.match(phoneno))) {
        return true;
    } else {
        alert("Name is not valid");
        $("#emp_name").val("");
        return false;
    }
}
</script>