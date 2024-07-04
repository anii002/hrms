<?php
$GLOBALS['flag'] = "1.2";
include('common/header.php');
include('common/sidebar.php');
include('control/function.php');
?>
<style>
.select2 {
    width: 100% !important;
}
</style>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.php">Home / मुख पृष्ठ</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#"> Add Accountant / एकाउंटेंट जोड़े </a>
                </li>
            </ul>
        </div>
        <!-- <h1>ecefce</h1> -->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-book"></i> Add Accountant / एकाउंटेंट जोड़े</span>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="control/adminProcess.php?action=AddAcctAdmin" method="post" enctype="multipart/form-data"
                    autocomplete="off" class="horizontal-form">
                    <div class="form-body">
                        <!-- <h3 class="form-section">Add User</h3> -->
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">कर्मचारी आईडी / PFNO</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user-circle"></i>
                                        </span>
                                        <input type="text" class="form-control" id="empid" name="empid"
                                            placeholder="Enter PF Number" required autofocus="true">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">नाम / Name</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fas  fa-user"></i>
                                        </span>
                                        <input type="text" class="form-control" id="empname" name="empname"
                                            placeholder="Employee Name" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">मोबाइल / Mobile</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </span>
                                        <input type="text" class="form-control" id="mobile" name="mobile"
                                            placeholder="Enter Mobile number" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">ई -मेल / E-Mail</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Employee Email id" readonly="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                        <!--<div class="row">-->
                        <!--	<div class="col-md-3">-->
                        <!--		<div class="form-group">-->
                        <!--			<label class="control-label">मोबाइल / Mobile</label>-->
                        <!--			<div class="input-group">-->
                        <!--			<span class="input-group-addon">-->
                        <!--			<i class="fa fa-phone"></i>-->
                        <!--			</span>-->
                        <!--			<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile number" readonly="">-->
                        <!--			</div>-->
                        <!--		</div>-->
                        <!--	</div>-->
                        <!--	<div class="col-md-3">-->
                        <!--		<div class="form-group">-->
                        <!--			<label class="control-label">ई -मेल / E-Mail</label>-->
                        <!--			<div class="input-group">-->
                        <!--			<span class="input-group-addon">-->
                        <!--			<i class="fas fa-envelope"></i>-->
                        <!--			</span>-->
                        <!--			<input type="email" class="form-control" id="email" name="email" placeholder="Employee Email id" readonly="">-->
                        <!--			</div>-->
                        <!--		</div>-->
                        <!--	</div>-->
                        <!--</div>-->
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">पदनाम / Designation</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fas fa-user-graduate"></i>
                                        </span>
                                        <input type="text" id="design" name="design" placeholder="Employee Designation"
                                            class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">पे लेवल / Pay Level</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-chart-line"></i>
                                        </span>
                                        <input type="text" id="paylevel" name="paylevel" class="form-control"
                                            placeholder="Employee Pay Level" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">प्रयोगकर्ता नाम / UserName</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="far fa-user-circle"></i>
                                        </span>
                                        <input type="text" id="username" name="username" class="form-control" readonly
                                            placeholder="Set Username">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                        <div class="row">
                            <!--<div class="col-md-6">-->
                            <!--	<div class="form-group">-->
                            <!--		<label class="control-label">प्रयोगकर्ता  नाम / UserName</label>-->
                            <!--		<div class="input-group">-->
                            <!--		<span class="input-group-addon">-->
                            <!--		<i class="far fa-user-circle"></i>-->
                            <!--		</span>-->
                            <!--		<input type="text" id="username" name="username" class="form-control" readonly placeholder="Set Username">-->
                            <!--		</div>-->
                            <!--	</div>-->
                            <!--</div>-->
                            <!--/span-->
                            <!--<div class="col-md-6">-->
                            <!--	<div class="form-group">-->
                            <!--		<label class="control-label">पासवर्ड / Password</label>-->
                            <!--		<div class="input-group">-->
                            <!--		<span class="input-group-addon">-->
                            <!--		<i class="fa fa-unlock-alt"></i>-->
                            <!--		</span>-->
                            <!--		<input type="text" id="psw" name="psw" class="form-control" readonly placeholder="Set Password">-->
                            <!--		</div>-->
                            <!--	</div>-->
                            <!--</div>-->
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6 billunitzindex">
                                <div class="form-group">
                                    <label class="control-label">बिल यूनिट / Bill Unit</label>
                                    <select class="form-control select2" multiple="multiple" width="100%" tabindex="-1"
                                        id="bu" name="bu[]" autofocus="true" required>
                                        <option value="0" disabled> बिल यूनिट का चयन करेंं / Select Bill Unit</option>
                                        <?php
										$sql = mysqli_query($conn,"SELECT billunit as BU FROM `billunit` WHERE au='0107' ORDER BY `BU` ASC");
										while ($row = mysqli_fetch_array($sql)) {
											echo "<option value='" . $row['BU'] . "'>" . $row['BU'] . "</option>";
										}
										?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions right">
                        <button type="reset" class="btn default">Cancel</button>
                        <button type="submit" class="btn blue submit_btn" id='submit_btn' name='button'><i
                                class="fa fa-check"></i> प्रस्तुत करे / Submit</button>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            रजिस्टर अकाउंटेंट / Register Accountant
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body table-responsive">
                        <table class="display table-stripped table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>अनु क्रमांक<br>ID</th>
                                    <th>कर्मचारी आईडी <br>Employee ID</th>
                                    <th>नाम<br>Name</th>
                                    <th>मोबाइल<br>Mobile</th>
                                    <th>उपयोगकर्ता नाम<br>User Name</th>
                                    <th>विभाग<br>Department</th>
                                    <th>कार्रवाई / Action</th>
                                </tr>
                            </thead>
                            <tbody>
    <?php
    $query_emp = "SELECT employees.*, users.status AS user_status, users.username, users.role 
                  FROM employees 
                  INNER JOIN users ON employees.pfno = users.empid 
                  WHERE role='5'";
    $result_emp = mysqli_query($conn, $query_emp);
    $sr = 1;
    while ($value_emp = mysqli_fetch_array($result_emp)) {
        echo "
        <tr>
        <td>" . $sr++ . "</td>
        <td>" . $value_emp['pfno'] . "</td>
        <td>" . $value_emp['name'] . "</td>
        <td>" . $value_emp['mobile'] . "</td>
        <td>" . $value_emp['username'] . "</td>
        <td>" . getdepartment($value_emp['dept']) . "</td>
        <td>";
        
        $r = getdepartment($value_emp['dept']);
        // <button value='".$value_emp['pfno']."' class='btn btn-primary changerole'>Change Role</button>";
        if ($value_emp['user_status'] == '0') {
            echo "<button value='" . $value_emp['pfno'] . "' class='btn btn-warning activeUser' style='margin-left:10px;'>Active</button></td>";
        } else {
            echo "<button value='" . $value_emp['pfno'] . "' class='btn btn-danger deactiveUser' >Deactive</button>";
            echo "<a id='" . $value_emp['pfno'] . "' data-toggle='modal' href='#updateDetails' class='btn btn-warning btn_action' style='margin-left:10px;'>Update Details</a>";
            echo "<a id='" . $value_emp['pfno'] . "' role='" . $value_emp['role'] . "' role_name='" . $r . "' data-toggle='modal' style='margin-left:10px;' href='#rol_transfer' style='margin-top: 5px;' class='btn btn-primary btn_action_role' style='margin-left:10px;'>Role Transfer</a></td>";
        }
        echo "</tr>
        ";
    }
    ?>
</tbody>

                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
</div>


<div id="updateDetails" class="modal fade modal-scroll " tabindex="-1" data-replace="true">
    <div class="modal-header btn-orange-moon">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Employee Data : <span id="emp_name_m" name="emp_name_m"></span> </h4>
    </div>
    <form action="control/adminProcess.php?action=updateAccData" method="post" enctype="multipart/form-data"
        autocomplete="off" class="horizontal-form">
        <!-- -->
        <div class="modal-body">
            <div class="portlet-body form">
                <div class="form-body">

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">कर्मचारी आईडी / PFNO</label>
                                <div class="input-group">
                                    <span>
                                        <input class="form-control" readonly type="text" id="emp_pfno"
                                            name="emp_pfno" />
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">नाम / Name</label>
                                <div class="input-group">
                                    <span>
                                        <input class="form-control" readonly type="text" id="emp_name"
                                            name="emp_name" />
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">स्टेशन / Station</label>

                                <div class="input-group">
                                    <span>
                                        <input class="form-control" readonly type="text" id="station_name"
                                            name="station_name" />
                                    </span>
                                </div>
                                <!-- </div> -->
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">बिल यूनिट / Bill Unit</label>

                                <select name="emp_bu[]" id="emp_bu" multiple="multiple" style="width:100%;"
                                    class="select2" tabindex="-1" aria-hidden="true">
                                    <option value="0" disabled> बिल यूनिट का चयन करेंं / Select Bill Unit</option>
                                    <?php
									$sql = mysqli_query($conn,"SELECT billunit FROM `billunit` WHERE au='0107' ORDER BY `billunit` ASC");
									while ($row = mysqli_fetch_array($sql)) {
										echo "<option value='" . $row['billunit'] . "'>" . $row['billunit'] . "</option>";
									}
									?>

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <!-- <button type="button" data-dismiss="modal" class="btn btn-default">Close</button> -->
            <button type="submit" class="btn blue">Update Details</button>
        </div>
    </form>
</div>

<div id="rol_transfer" class="modal fade modal-scroll" tabindex="-1" data-replace="true">
    <div class="modal-header btn-orange-moon">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Employee Data : <span id="emp_name_head" name="emp_name_head"></span> </h4>
    </div>
    <form action="control/adminProcess.php?action=role_transfer" method="post" enctype="multipart/form-data"
        autocomplete="off" class="horizontal-form">
        <!-- -->
        <input class="form-control" readonly type="hidden" id="emp_roles" name="emp_roles" />
        <div class="modal-body">
            <div class="portlet-body form">
                <div class="form-body">

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">कर्मचारी आईडी / PFNO</label>
                                <div class="input-group">
                                    <span>
                                        <input class="form-control" readonly type="text" id="emp_pfno1"
                                            name="emp_pfno1" />
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">नाम / Name</label>
                                <div class="input-group">
                                    <span>
                                        <input class="form-control" readonly type="text" id="emp_name_r"
                                            name="emp_name_r" />
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">भूमिका / Role</label>
                                <div class="input-group">
                                    <span>
                                        <input class="form-control" readonly type="text" id="role_name"
                                            name="role_name" />
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 billunitzindex">
                            <div class="form-group">
                                <label class="control-label">कर्मचारी नाम / Employee Names</label>
                                <select name="transfer_emp_id" id="transfer_emp_id" class="select2 form-control"
                                    tabindex="-1" aria-hidden="true">
                                    <option value="0">Please Select Employee</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <!-- <button type="button" data-dismiss="modal" class="btn btn-default">Close</button> -->
            <button type="submit" class="btn blue">Role Transfer</button>
        </div>
    </form>
</div>
<?php
include 'common/footer.php';
?>
<script>
$(document).on("click", ".btn_action_role", function() {
    var value = $(this).attr('id');
    var role = $(this).attr('role');
    var role_name = $(this).attr('role_name');

    $("#role_name").val(role_name);
    $("#emp_roles").val(role);
    //   alert(value);
    $.ajax({
            url: 'control/adminProcess.php',
            type: 'POST',
            data: {
                action: 'fetchEmployeeUpdated',
                id: value
            },
        })
        .done(function(html) {
            // alert(html);
            var data = JSON.parse(html);
            // console.log(data);
            $("#emp_pfno1").val(data.pfno);
            $("#emp_name_r").val(data.name);
            $("#emp_name_head").html(data.name);
            $("#transfer_emp_id").html(data.option);

        });

});


$(document).on("click", ".btn_action", function() {
    var value = $(this).attr('id');
    //   alert(value);
    $.ajax({
            url: 'control/adminProcess.php',
            type: 'POST',
            data: {
                action: 'fetchEmployeeUpdated',
                id: value
            },
        })
        .done(function(html) {
            // alert(html);
            var data = JSON.parse(html);
            // alert(data.billunit);
            $("#emp_pfno").val(data.pfno);
            $("#emp_name").val(data.name);
            $("#emp_name_m").html(data.name);
            $("#station_name").val(data.station);
            $("#emp_bu").val(data.billunit).trigger("change");
        });

});

$(document).on("change", "#empid", function() {
    var value = $('#empid').val();
    $.ajax({
            url: 'control/adminProcess.php',
            type: 'POST',
            data: {
                action: 'fetchEmployee1',
                id: value
            },
        })
        .done(function(html) {
            var data = JSON.parse(html);
            if (data == 1) {
                alert("Already Exists");
                $("#empid").val('');
                $("#empid").focus();
            } else if (data.fl == 0) {
                alert("Employee Not Authorized...");
                $("#empid").val('');
                $("#empid").focus();
            } else if (data.empid == null) {
                alert("PF Number Not Found..");
                // $.jGrowl('PF Number Not Found..', { header: 'Add User' });

            } else {
                $("#empid").val(data.empid);
                $("#empname").val(data.empname);
                $("#mobile").val(data.mobile);
                $("#design").val(data.designation);
                $("#email").val(data.email);
                $("#paylevel").val(data.level);
                var val = Math.floor(1000 + Math.random() * 9000);
                $("#psw").val(val);
                $("#username").val(data.empid);
            }
        });
});

$(document).on("click", ".activeUser", function() {
    var id = $(this).val();
    var result = confirm("Confirm!!! Proceed for user activation?");
    if (result == true) {
        $.ajax({
                url: 'control/adminProcess.php',
                type: 'POST',
                data: {
                    action: 'activeUser',
                    id: id
                },
            })
            .done(function(html) {
                alert(html);
                window.location = "add_user.php";
            });
    }
});
$(document).on("click", ".deactiveUser", function() {
    var id = $(this).val();
    var result = confirm("Confirm!!! Proceed for user deactivation?");
    if (result == true) {
        $.ajax({
                url: 'control/adminProcess.php',
                type: 'POST',
                data: {
                    action: 'deactiveUser',
                    id: id
                },
            })
            .done(function(html) {
                alert(html);
                window.location = "add_user.php";
            });
    }
});
</script>