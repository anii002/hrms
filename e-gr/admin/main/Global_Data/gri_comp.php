<?php
require_once('Global_Data/header.php');
error_reporting(0);
?>

<!-- PNotify -->
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <h2>New Grievance Complaints <small>List</small></h2>
                        <hr>
                        <div class="x_content">
                            <table class="table table-striped table-bordered display" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Type</th>
                                        <th>ID/PF.No</th>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Designation</th>
                                        <th>Moblile No.</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
									$cnt = 1;
									$query = mysql_query("Select * from employee where delete_status=1");
									while ($rw_data = mysql_fetch_assoc($query)) {
										$emp_type = $rw_data["emp_type"];
										$emp_id = $rw_data["emp_id"];
										$emp_name = $rw_data["emp_name"];
										$emp_dept = $rw_data["emp_dept"];
										$emp_desig = $rw_data["emp_desig"];
										$emp_mob = $rw_data["emp_mob"];
										echo "<tr>";
										echo "<td>$cnt</td>";
										echo "<td>$emp_type</td>";
										echo "<td>$emp_id</td>";
										echo "<td>$emp_name</td>";
										echo "<td>$emp_dept</td>";
										echo "<td>$emp_desig</td>";
										echo "<td>$emp_mob</td>";
										echo "<td><div class='btn-group' style='margin-top:-5px;width: 85px;'>
										<a data-toggle='modal' style='width:34px' id='" . $rw_data['id'] . "' href='#update_employee' class='btn_show_center btn1 btn btn-info' title='Update Details'  value='" . $rw_data['id'] . "'><i class='fa fa-pencil'></i></a>
										
										<a data-toggle='modal' style='width:34px;  margin-left:10px;' id='" . $rw_data['id'] . "' href='#delete_employee' class='btn_show_center btn1 btn btn-danger' title='Delete Details'  value='" . $rw_data['id'] . "'><i class='fa fa-trash'></i></a></div>
										</td>";
										echo "</tr>";
										$cnt++;
									}
									?>

                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<div id="delete_employee" class="modal fade">
    <form method="POST" action="process.php?action=delete_employee">
        <input name="delete_employee_hidden_id" id="delete_employee_hidden_id" type="hidden" class="form-control"
            autofocus="true">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">

                <div class="modal-header">
                    <div class="icon-box">
                        <i class="material-icons" data-dismiss="modal">&#xE5CD;</i>
                    </div>
                    <h4 class="modal-title">Are you sure?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Do you really want to delete these records? This process cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div id="update_employee" class="modal fade bs-modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: #17c7bf;color: #fff;">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Employee Edit</h4>
            </div>
            <div class="modal-body">
                <form action="process.php?action=update_employee" method="POST" class="form-horizontal" id="">
                    <input type="hidden" id="update_employee_hidden_id" name="update_employee_hidden_id"
                        class="form-control">
                    <h4 class="bgshades"> Personal Details: </h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-4" style="margin-left: -35px;">Emp Type</label>
                                <div class="col-md-8">
                                    <select id="up_emp_type" name="up_emp_type" class="form-control">
                                        <option value="" disabled selected>Select Employee</option>
                                        <option value="Service Employee">Service Employee</option>
                                        <option value="Pensioner Employee">Pensioner Employee</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-4" style="margin-left: -50px;">Emp Id/PF No</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="up_emp_id" name="up_emp_id"
                                        placeholder="Enter Employee Id Or PF No. Or PPO No.">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-4" style="margin-left: -35px;">Emp Name</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="up_emp_name" name="up_emp_name"
                                        placeholder="Enter Employee Name">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-4" style="margin-left: -50px;">Department</label>
                                <div class="col-md-8">
                                    <select id="up_emp_dept" name="up_emp_dept" class="form-control">
                                        <option value="" disabled selected>Select Department</option>
                                        <option value="Bill">Bill</option>
                                        <option value="Account">Account</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-4" style="margin-left: -35px;">Designation</label>
                                <div class="col-md-8">
                                    <select id="up_emp_desig" name="up_emp_desig" class="form-control">
                                        <option value="" disabled selected>Select Designation</option>
                                        <option value="DPO">DPO</option>
                                        <option value="Sr DPO">Sr DPO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-4" style="margin-left: -50px;">Mobile No.</label>
                                <div class="col-md-8">
                                    <input type="text" id="up_emp_mob" name="up_emp_mob" class="form-control"
                                        placeholder="Enter Mobile No.">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-4" style="margin-left: -35px;">Email Id</label>
                                <div class="col-md-8">
                                    <input type="text" id="up_emp_email" name="up_emp_email" class="form-control"
                                        placeholder="Enter Email Address">
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-4" style="margin-left: -50px;">Aadhar No.</label>
                                <div class="col-md-8">
                                    <input type="text" id="up_emp_aadhar" name="up_emp_aadhar" class="form-control"
                                        placeholder="Enter Aadhar No.">
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="bgshades">Personal Address: </h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-4" style="margin-left: -50px;">Address 1</label>
                                <div class="col-md-8">
                                    <textarea rows="3" cols="30" id="up_emp_address1" name="up_emp_address1"
                                        class="form-control" placeholder="Enter Address"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-4" style="margin-left: -50px;">Address 2</label>
                                <div class="col-md-8">
                                    <textarea rows="3" cols="30" id="up_emp_address2" name="up_emp_address2"
                                        class="form-control" placeholder="Enter Address"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6"> <input type="hidden" id="state_hidden_id" name="state_hidden_id"
                                class="form-control">
                            <div class="form-group">
                                <label class="control-label col-md-4" style="margin-left: -50px;">State</label>
                                <div class="col-md-8">
                                    <?php
									$query = mysql_query("SELECT * FROM states WHERE status = 1 AND country_id=100 ORDER BY state_name ASC");
									$rowCount = mysql_num_rows($query);
									?>
                                    <select name="up_emp_state" id="up_emp_state" class="form-control"
                                        style="margin-top:0px;">
                                        <option>Select State</option>
                                        <?php
										if ($rowCount > 0) {
											while ($row = mysql_fetch_assoc($query)) {
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-4" style="margin-left: -50px;">City</label>
                                <div class="col-md-8">
                                    <?php
									//$state_hidden_id = $_GET['state_hidden_id'];
									// echo "<script>alert($state_hidden_id)</script>";

									//$query = mysql_query("SELECT * FROM cities where state_id='".$state_hidden_id."'"); 
									//$rowCount = mysql_num_rows($query);
									?>
                                    <select name="up_emp_city" id="up_emp_city" class="form-control"
                                        style="margin-top:0px;">
                                        <option value=""></option>
                                        <?php
										// if($rowCount > 0){
										// while($row = mysql_fetch_assoc($query)){ 
										// echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';
										// }
										// }else{
										// echo '<option value="">City not available</option>';
										// }
										?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-4" style="margin-left: -50px;">Pincode</label>
                                <div class="col-md-8">
                                    <input type="text" id="up_emp_pincode" name="up_emp_pincode" class="form-control"
                                        placeholder="Enter Pincode">
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="bgshades"> Office Address: </h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-4" style="margin-left: -50px;">Address 1</label>
                                <div class="col-md-8">
                                    <textarea rows="3" cols="30" id="up_office_emp_address1"
                                        name="up_office_emp_address1" class="form-control"
                                        placeholder="Enter Address"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-4" style="margin-left: -50px;">Address 2</label>
                                <div class="col-md-8">
                                    <textarea rows="3" cols="30" id="up_office_emp_address2"
                                        name="up_office_emp_address2" class="form-control"
                                        placeholder="Enter Address"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-4" style="margin-left: -50px;">State</label>
                                <div class="col-md-8"><input type="hidden" id="state_hidden_id1" name="state_hidden_id1"
                                        class="form-control">
                                    <?php
									$query = mysql_query("SELECT * FROM states WHERE status = 1 AND country_id=100 ORDER BY state_name ASC");
									$rowCount = mysql_num_rows($query);
									?>
                                    <select name="up_office_emp_state" id="up_office_emp_state" class="form-control"
                                        style="margin-top:0px;">
                                        <option>Select State</option>
                                        <?php
										if ($rowCount > 0) {
											while ($row = mysql_fetch_assoc($query)) {
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-4" style="margin-left: -50px;">City</label>
                                <div class="col-md-8">
                                    <?php
									$query = mysql_query("SELECT * FROM cities");
									$rowCount = mysql_num_rows($query);
									?>
                                    <select name="up_office_emp_city" id="up_office_emp_city" class="form-control"
                                        style="margin-top:0px;">
                                        <option disabled>Select state first</option>
                                        <?php
										if ($rowCount > 0) {
											while ($row = mysql_fetch_assoc($query)) {
												echo '<option value="' . $row['city_id'] . '">' . $row['city_name'] . '</option>';
											}
										} else {
											echo '<option value="">City not available</option>';
										}
										?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-4" style="margin-left: -50px;">Pincode</label>
                                <div class="col-md-8">
                                    <input type="text" id="up_office_emp_pincode" name="up_office_emp_pincode"
                                        class="form-control" placeholder="Enter Pincode">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <button type="submit" class="btn btn-info source">Update</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<?php
require_once('Global_Data/footer.php');
?>
<script>
$('.btn1').on('click', function() {
    $('#update_employee_hidden_id').val($(this).attr('id'));
    $('#delete_employee_hidden_id').val($(this).attr('id'));
    var update_employee_hidden_id = document.getElementById('update_employee_hidden_id').value;
    $.ajax({
        type: "post",
        url: "process.php",
        data: "action=get_employee_details&update_employee_hidden_id=" + update_employee_hidden_id,
        success: function(data) {
            //alert(data);
            var ddd = data;
            var arr = ddd.split('$');
            $("#up_emp_type").val(arr[0]);
            $("#up_emp_id").val(arr[1]);
            $("#up_emp_name").val(arr[2]);
            $("#up_emp_dept").val(arr[3]);
            $("#up_emp_desig").val(arr[4]);
            $("#up_emp_mob").val(arr[5]);
            $("#up_emp_email").val(arr[6]);
            $("#up_emp_aadhar").val(arr[7]);
            $("#up_emp_address1").val(arr[8]);
            $("#up_emp_address2").val(arr[9]);
            $("#up_emp_state").val(arr[10]);
            $("#up_emp_city").val(arr[11]);
            $("#up_office_emp_address1").val(arr[12]);
            $("#up_office_emp_address2").val(arr[13]);
            $("#up_office_emp_state").val(arr[14]);
            $("#up_office_emp_city").val(arr[15]);
            $("#up_emp_pincode").val(arr[16]);
            $("#up_office_emp_pincode").val(arr[17]);

            $("#state_hidden_id").val(arr[10]);
            $("#state_hidden_id1").val(arr[14]);
            var state_hidden_id = document.getElementById('state_hidden_id').value;
            //alert(state_hidden_id);
            $.ajax({
                type: "post",
                url: "process.php",
                data: "action=get_city&state_hidden_id=" + state_hidden_id,
                success: function(data) {
                    //alert(data);
                    var ddd = data;
                    var arr1 = ddd.split('$');
                    // alert(arr1);
                    var options = "";
                    for (var i = 0; i < arr1.length; i++) {
                        options += "<option>" + arr1[i] + "</option>";
                    }
                    $("#up_emp_city").html(options);


                }
            });

            var state_hidden_id1 = document.getElementById('state_hidden_id1').value;
            //alert(state_hidden_id1);
            $.ajax({
                type: "post",
                url: "process.php",
                data: "action=get_city1&state_hidden_id1=" + state_hidden_id1,
                success: function(data) {
                    //alert(data);
                    var ddd = data;
                    var arr1 = ddd.split('$');
                    // alert(arr1);
                    var options = "";
                    for (var i = 0; i < arr1.length; i++) {
                        options += "<option>" + arr1[i] + "</option>";
                    }
                    $("#up_office_emp_city").html(options);


                }
            });
        }
    });


});

$('#up_emp_state').on('change', function() {
    var stateID = $(this).val();
    //alert(stateID);
    if (stateID) {
        $.ajax({
            type: 'POST',
            url: 'statechange.php',
            data: 'state_id=' + stateID,
            success: function(html) {
                $('#up_emp_city').html(html);
            }
        });
    } else {
        $('#up_emp_city').html('<option value="">Select state first</option>');
    }
});
$('#up_office_emp_state').on('change', function() {
    var stateID = $(this).val();
    //alert(stateID);
    if (stateID) {
        $.ajax({
            type: 'POST',
            url: 'statechange.php',
            data: 'state_id=' + stateID,
            success: function(html) {
                $('#up_office_emp_city').html(html);
            }
        });
    } else {
        $('#up_office_emp_city').html('<option value="">Select state first</option>');
    }
});
</script>