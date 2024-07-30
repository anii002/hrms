<?php
$GLOBALS['flag'] = "2.345";
include('common/header.php');
include('common/sidebar.php');
include('control/function.php');
?>

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
                    <a href="#">उपयोगकर्ता गतिविधि लॉग देखें / View User Activity Logs </a>
                </li>
            </ul>

        </div>
        <!-- <h1>ecefce</h1> -->
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption col-md-6">
                            <b>उपयोगकर्ता गतिविधि लॉग देखें / View User Activity Logs </b>
                        </div>
                        <div class="caption col-md-6 text-right backbtn">
                            <a href="#."></a>
                        </div>
                    </div>
                    <div class="portlet-body form">

                        <form method="POST">
                            <div class="form-body add-train">
                                <div class="row add-train-title">
                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <div class="portlet-body">
                                                <div class="table-scrollable summary-table">
                                                    <table id="example1" class="table table-hover table-bordered display">
                                                        <thead>
                                                            <tr class="warning">
                                                                <th>अनु क्रमांक<br>ID</th>
                                                                <th>कर्मचारी आईडी <br>Employee ID</th>
                                                                <th>नाम<br>Name</th>
                                                                <th>विभाग<br>Dept.</th>
                                                                <th>IP Address</th>
                                                                <th>File Name</th>
                                                                <th>Action Performed</th>
                                                                <th>Message</th>
                                                                <th>Created At</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $query_emp = "SELECT empid,name,dept,ip_address,file_name,action,message,created_at FROM `audit_table`, employees WHERE employees.pfno = audit_table.empid AND employees.dept NOT IN ('01') ORDER BY audit_table.id DESC";
                                                            $result_emp = mysqli_query($conn, $query_emp);
                                                            echo mysqli_error($conn);
                                                            $sr = 1;
                                                            while ($value_emp = mysqli_fetch_array($result_emp)) {
                                                                $r = '';
                                                                $role = '';
                                                                echo "
                  <tr>
                  <td>" . $sr++ . "</td>
                    <td>" . $value_emp['empid'] . "</td>
                    <td>" . $value_emp['name'] . "</td>
                    <td>" . getdepartment($value_emp['dept']) . "</td>
                    <td>" . $value_emp['ip_address'] . "</td>
                    <td>" . $value_emp['file_name'] . "</td>
                    <td>" . $value_emp['action'] . "</td>
                    <td>" . $value_emp['message'] . "</td>
                    <td>" . $value_emp['created_at'] . "</td>";
                                                                echo "</tr>
                ";
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="text-right">
                                                    <!-- <button class="btn yellow">Print</button> -->
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div id="changePass" class="modal fade modal-scroll" tabindex="-1" data-replace="true">
    <div class="modal-header btn-orange-moon">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Generated Password : <span id="name1" name="name1"></span> </h4>
    </div>
    <form class="horizontal-form">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">कर्मचारी आईडी / PFNO</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user-circle"></i>
                            </span>
                            <input type="text" class="form-control" id="pf_no_cp" name="pf_no_cp" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">New Generated Password</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-unlock-alt"></i>
                            </span>
                            <input type="text" class="form-control" id="new_password" name="new_password">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn default" data-dismiss="modal">Close</button>
            <!-- <button type="submit" class="btn blue">Change Password</button> -->
        </div>
    </form>
</div>

<div id="updateDetails" class="modal fade modal-scroll modalemployeedata" tabindex="-1" data-replace="true">
    <div class="modal-header btn-orange-moon">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Employee Data : <span id="emp_name1" name="emp_name1"></span> </h4>
    </div>
    <form action="control/adminProcess.php?action=updateEmpData" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
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
                                        <input class="form-control" readonly type="text" id="emp_pfno" name="emp_pfno" />
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">नाम / Name</label>
                                <div class="input-group">
                                    <span>
                                        <input class="form-control" readonly type="text" id="emp_name" name="emp_name" />
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">मोबाइल / Mobile</label>
                                <div class="input-group">
                                    <span>
                                        <input class="form-control" maxlength="10" type="text" id="emp_mobile" name="emp_mobile" required />
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">पदनाम / Designation</label>
                                <select name="emp_desig" id="emp_desig" class="select2 form-control" tabindex="-1" aria-hidden="true">
                                    <option value="0">Please Select Desig</option>
                                    <?php
                                    $query_emp = "SELECT `DESIGCODE`,`DESIGLONGDESC` FROM `designations`";
                                    $result_emp = mysqli_query($conn, $query_emp);
                                    while ($value_emp = mysqli_fetch_array($result_emp)) {
                                        echo "<option value='" . $value_emp['DESIGCODE'] . "'>" . $value_emp['DESIGLONGDESC'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">स्तर / Level</label>

                                <select name="emp_level" id="emp_level" class="select2 form-control" tabindex="-1" aria-hidden="true">
                                    <option value="0">Please Select Level</option>

                                    <?php
                                    $query_emp = "SELECT `num` FROM `paylevel`";
                                    $result_emp = mysqli_query($conn, $query_emp);
                                    while ($value_emp = mysqli_fetch_array($result_emp)) {
                                        echo "<option value='" . $value_emp['num'] . "'>" . $value_emp['num'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">स्टेशन / Station</label>

                                <select name="emp_station[]" id="emp_station" multiple="multiple" class="select2 form-control" tabindex="-1" aria-hidden="true">
                                    <option value="">Please Select Station</option>
                                    <option value="">All</option>
                                    <?php
                                    $query_emp = "select stationcode,stationdesc from station";
                                    $result_emp = mysqli_query($conn, $query_emp);
                                    while ($value_emp = mysqli_fetch_array($result_emp)) {
                                        echo "<option value='" . $value_emp['stationcode'] . "'>" . $value_emp['stationdesc'] . "</option>";
                                    }
                                    ?>
                                </select>
                                <!-- </div> -->
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">उपयोगकर्ता / User</label>

                                <select name="emp_role" id="emp_role" class="form-control select2" tabindex="-1" aria-hidden="true" required>
                                    <option value="0" selected>Select User </option>
                                    <option value="12">Controlling Incharge</option>
                                    <option value="13">Controlling Officer</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!--/row-->

                </div>
                <!--/row-->

            </div>
        </div>
        <div class="modal-footer">
            <!-- <button type="button" data-dismiss="modal" class="btn btn-default">Close</button> -->
            <button type="submit" class="btn blue">Update Details</button>
        </div>
    </form>
</div>

<?php
include 'common/footer.php';
?>
<script>
    // $(document).on("click", ".btn_action", function() {
    //     var value = $(this).attr('id');
    //     // alert(value);
    //     $.ajax({
    //             url: 'control/adminProcess.php',
    //             type: 'POST',
    //             data: {
    //                 action: 'fetchEmployeeUpdated',
    //                 id: value
    //             },
    //         })
    //         .done(function(html) {
    //             // alert(html);
    //             var data = JSON.parse(html);
    //             // alert(data.desig);
    //             $("#emp_pfno").val(data.pfno);
    //             $("#emp_name").val(data.name);
    //             $("#emp_name1").val(data.name);
    //             $("#emp_mobile").val(data.mobile);
    //             $("#emp_desig").val(data.desig_id).trigger("change");
    //             $("#emp_station").val(data.station).trigger("change");
    //             $("#emp_level").val(data.level).trigger("change");
    //             $("#emp_role").val(data.role).trigger("change");
    //             // $("#dept").val(data.dept);
    //         });

    // });

    // $(document).on("change", "#empid", function() {
    //     var value = $("#empid").val();
    //     $.ajax({
    //             url: 'control/adminProcess.php',
    //             type: 'POST',
    //             data: {
    //                 action: 'fetchEmployee1',
    //                 id: value
    //             },
    //         })
    //         .done(function(html) {
    //             var data = JSON.parse(html);
    //             // alert(data);
    //             //alert(data.f1);
    //             if (data == 1) {
    //                 alert("Already Exists");
    //                 $("#empid").val('');
    //                 $("#empid").focus();

    //             }
    //             //   else if(data.fl==0)
    //             //   {
    //             //       alert("Employee not authorized..");
    //             //       $("#empid").val('');
    //             //     $("#empid").focus();

    //             //   }
    //             else if (data.empid == null) {
    //                 alert("PF Number Not Found..");
    //                 $("#empid").val('');
    //                 $("#empid").focus();
    //             } else {
    //                 $("#empid").val(data.empid);
    //                 $("#empname").val(data.empname);
    //                 $("#mobile").val(data.mobile);
    //                 $("#design").val(data.designation);
    //                 $("#email").val(data.email);
    //                 $("#paylevel").val(data.level).trigger("change");
    //                 var val = Math.floor(1000 + Math.random() * 9000);
    //                 $("#psw").val(val);
    //                 $("#username").val(data.empid);

    //             }

    //         });

    // });


    // $(document).on("click", ".activeUser", function(e) {
    //     e.preventDefault();
    //     var id = $(this).val();
    //     // alert(id);
    //     var result = confirm("Confirm!!! proceed for user activation?");
    //     if (result == true) {
    //         $.ajax({
    //                 url: 'control/adminProcess.php',
    //                 type: 'POST',
    //                 data: {
    //                     action: 'activeUser',
    //                     id: id
    //                 },
    //             })
    //             .done(function(html) {
    //                 alert(html);
    //                 window.location = "add_user.php";
    //             });
    //     }
    // });
    // $(document).on("click", ".deactiveUser", function(e) {
    //     e.preventDefault();
    //     var id = $(this).val();
    //     // alert(id);
    //     var result = confirm("Confirm!!! proceed for user deactivation?");
    //     if (result == true) {
    //         $.ajax({
    //                 url: 'control/adminProcess.php',
    //                 type: 'POST',
    //                 data: {
    //                     action: 'deactiveUser',
    //                     id: id
    //                 },
    //             })
    //             .done(function(html) {
    //                 alert(html);
    //                 window.location = "add_user.php";
    //             });
    //     }
    // });



    // $(document).on("click", ".generatePassword", function() {
    //     var pf = $(this).attr('id');
    //     $("#pf_no_cp").val(pf);
    //     // alert(pf);
    //     $.ajax({
    //             url: 'control/adminProcess.php',
    //             type: 'POST',
    //             data: {
    //                 action: 'generatePassword',
    //                 id: pf
    //             },
    //         })
    //         .done(function(html) {
    //             // 			alert(html);
    //             if (html != 0) {
    //                 $("#new_password").val(html);
    //             } else {
    //                 alert("Password Not Generated.");
    //             }
    //         });

    // });


    // function phonenumber(inputtxt) {

    //     var phoneno = /^[6789]\d{9}$/;
    //     if ((inputtxt.value.match(phoneno))) {
    //         return true;
    //     } else {
    //         $("#mobile").val("");
    //         $("#mobile").focus();
    //         alert("Invalid Mobile number");

    //         return false;
    //     }
    // }

    // function email_valid(inputtxt) {
    //     var phoneno = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    //     if ((inputtxt.value.match(phoneno))) {
    //         return true;
    //     } else {
    //         alert("Enter Valid Email Address");
    //         // $("#email").val("");                  
    //         $("#email").focus();
    //         return false;
    //     }
    // }
</script>