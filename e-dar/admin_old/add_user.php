<?php
$GLOBALS['flag'] = "1.3";
include_once('../common_files/header.php');
// include_once('../common_files/sidebar_admin.php');
?>
<style type="text/css">
.updateModal {
    width: 805px !important;
    /* margin-left: 0px !important; */
    /* width: 100% !important; */
    left: 38% !important;
    right: 50% !important;


}

.billunitindex {

    z-index: 9
}
</style>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->

        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.php">Home </a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Registered User</a>
                </li>
            </ul>

        </div>

        <div class="row">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-book"></i> Add User
                    </div>

                </div>
                <div class="portlet-body form">
                    <form action="" method="post" autocomplete="off">
                        <div class="form-body">
                            <!-- <h3 class="form-section">Add User</h3> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">PF NO</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fas  fa-user"></i>
                                            </span>
                                            <input type="text" class="form-control" id="empid" name="empid"
                                                placeholder="Enter PF Number" required>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Name</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fas  fa-user"></i>
                                            </span>
                                            <input type="text" class="form-control" id="empname" name="empname"
                                                placeholder="Employee Name" readonly="">
                                        </div>
                                    </div>
                                </div>

                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mobile</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                            <input type="text" class="form-control" id="mobile" name="mobile"
                                                placeholder="Enter Mobile number" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Designation</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                            <input type="text" id="design" name="design"
                                                placeholder="Employee Designation" class="form-control" readonly="">

                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">


                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Department</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                            <input type="text" id="dept" name="dept" class="form-control"
                                                placeholder="Employee Department" readonly="">

                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Pay Level</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                            <input type="text" id="paylevel" name="paylevel" class="form-control"
                                                placeholder="Employee Pay Level" readonly="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <input type="hidden" id="dob" name="dob">
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Select Role</label>
                                        <select name="role[]" id="role" multiple=""
                                            class="select2me form-control billunitindex" style="width: 100%;"
                                            tabindex="-1" aria-hidden="true" required>
                                            <option value="" selected disabled>--Select Role--</option>
                                            <?php

                                            $query_role = mysql_query("SELECT id,role_name from tbl_master_role where id NOT in (1)", $db_edar);

                                            while ($value_role = mysql_fetch_array($query_role)) {
                                                echo "<option value='" . $value_role['id'] . "'>" . $value_role['role_name'] . "</option>";
                                            }

                                            ?>
                                        </select>


                                    </div>
                                </div>

                            </div>


                        </div>
                        <div class="form-actions left">
                            <button type="button" class="btn blue addUser"><i class="fa fa-check"></i>
                                Submit</button>&nbsp;
                            <button type="reset" class="btn default">Clear</button>

                        </div>

                    </form>
                </div>

            </div>
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-book"></i>User List
                    </div>

                </div>
                <div class="portlet-body form">
                    <div class="form-body">
                        <table class="table table-bordered table-hover" id="example1">
                            <thead>
                                <tr>
                                    <th>SR No</th>
                                    <th>PF No.</th>
                                    <th>Name</th>
                                    <!-- <th>Section</th> -->
                                    <th>Designation</th>
                                    <th>Department</th>
                                    <th>Role</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query_src = "SELECT $db_edar_name.tbl_user.id,emp_id,role,name,designation,department,$db_edar_name.tbl_user.status FROM $db_edar_name.tbl_user,$db_common_name.resgister_user WHERE $db_edar_name.tbl_user.emp_id=$db_common_name.resgister_user.emp_no and role not in(1,7)";
                                $result_src = mysql_query($query_src, $db_edar);
                                $sr = 1;
                                while ($value_src = mysql_fetch_array($result_src)) {

                                    echo "
								<tr>
								<td>" . $sr++ . "</td>
								<td>" . $value_src['emp_id'] . "</td>
								<td>" . $value_src['name'] . "</td>
								
								<td>" . designation($value_src['designation']) . "</td>
								<td>" . getdepartment($value_src['department']) . "</td>";
                                    //print_r($value_src['role']);
                                    $val = explode(",", $value_src['role']);

                                    $names = array();
                                    foreach ($val as $key => $value) {
                                        if ($value != 7) {
                                            $role_name = getrole($value);
                                            array_push($names, $role_name);
                                        }
                                    }
                                    //print_r($names);
                                    if (empty($names)) {
                                        echo "<td>-</td>";
                                    } else {
                                        echo "<td>" . implode(" / ", $names) . "</td>";
                                    }

                                    //echo "<a target='_blank'  id='".$value_emp['uploaded_file_path']."' value='".$value_emp['uploaded_file_path']."'>'".$value_emp['uploaded_file_path']."'</a>";

                                    echo "<td><button pf='" . $value_src['emp_id'] . "' value='" . $value_src['id'] . "' role='" . $value_src['role'] . "'  class='btn btn-info fetchid' data-target='#responsive' data-toggle='modal' style='margin-left:10px;'>Update</button>";
                                    if ($value_src['status'] == 1) {
                                        echo "<button value='" . $value_src['id'] . "' pf='" . $value_src['emp_id'] . "' role='" . $value_src['role'] . "' class='btn btn-danger deactive' style='margin-left:10px;'>Disable</button></td>";
                                    } else {
                                        echo "<button value='" . $value_src['id'] . "' role='" . $value_src['role'] . "' pf='" . $value_src['emp_id'] . "' class='btn btn-success aactive' style='margin-left:10px;'>Enable</button></td>";
                                    }

                                    echo "</tr>
								";
                                }



                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="clearfix">
            </div>
        </div>
    </div>
    <!-- END CONTENT -->

    <?php
    include_once('../common_files/footer.php');
    ?>

    <div id="responsive" class="modal fade modal-scroll updateModal " tabindex="-1" data-replace="true">
        <div class="modal-header btn-orange-moon">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Update Role : </span> </h4>
        </div>
        <form action="" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
            <div class="modal-body">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->

                    <input type="text" id="u_fid" name="fid">
                    <input type="text" id="u_pf_num" name="pf_num">
                    <div class="form-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Select Role</label>
                                    <select name="u_role[]" id="u_role" multiple="multiple"
                                        class="select2me form-control billunitindex" style="width: 100%;" tabindex="-1"
                                        aria-hidden="true" required>

                                        <option value="0" selected disabled>--Select Role--</option>
                                        <?php

                                        $query_role = mysql_query("SELECT * from tbl_master_role where id NOT in (1)", $db_edar);

                                        while ($value_role = mysql_fetch_array($query_role)) {
                                            echo "<option value='" . $value_role['id'] . "'>" . $value_role['role_name'] . "</option>";
                                        }

                                        ?>
                                    </select>


                                </div>
                            </div>

                        </div>


                    </div>
                    <!--/row-->

                </div>
            </div>
            <div class="modal-footer">
                <!--  -->
                <button type="button" style="float:left" class="btn blue update">Update</button>
                <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
            </div>
        </form>
    </div>

    <script type="text/javascript">
    //Adding User
    $(document).on("click", ".addUser", function() {
        var empid = $("#empid").val();
        var dob = $("#dob").val();
        var role = $("#role").val();

        //alert(r);
        if (empid == "") {
            alert("Enter form name....");
            $("#empid").focus();
        } else if (role == "") {
            alert("please select role..");
            $("#role").focus();
        } else {
            //alert(value);
            $.ajax({
                url: 'control/adminProcess.php',
                type: 'POST',
                data: "action=add_user&empid=" + empid + "&dob=" + dob + "&role=" + role,
                success: function(data) {
                    alert(data);
                    console.log(data);
                    if (data == 1) {
                        alert("Added successfully....");
                        window.location = "add_user.php";
                    } else if (data == 2) {
                        alert("Already presented in user list!!!!.");
                        window.location = "add_user.php";
                    } else {
                        alert("Failed To add user!!!");
                    }
                }
            });
        }
    });


    $(document).on("change", "#empid", function() {
        var value = $('#empid').val();
        //alert(value);
        $.ajax({
                url: 'control/adminProcess.php',
                type: 'POST',
                data: {
                    action: 'fetch_employee_details',
                    id: value
                },
            })
            .done(function(html) {
                //alert(html);
                var data = JSON.parse(html);
                if (data.pf_number == null) {
                    alert("Not Found PF number.....")
                    $('#empid').focus().val('');
                } else {
                    $("#empid").val(data.pf_number);
                    $("#empname").val(data.emp_name);
                    $("#design").val(data.designation);
                    $("#paylevel").val(data.scale);
                    $("#dept").val(data.dept);
                    $("#dept1").val(data.dept1);
                    $("#design1").val(data.designation1);
                    $("#mobile").val(data.mobile);
                    $("#dob").val(data.dob);
                }


            });

    });


    $(document).on("click", ".deactive", function() {
        var value = $(this).attr("value");
        var pf = $(this).attr("pf");
        var role = $(this).attr("role");
        //alert(pf);
        var result = confirm("Confirm!!! Proceed for Disabled user?");
        if (result == true) {
            //alert(value);

            $.ajax({
                url: 'control/adminProcess.php',
                type: 'POST',
                data: "action=deactiveUser&id=" + value + "&pf=" + pf + "&role=" + role,
                success: function(data) {
                    alert(data);
                    console.log(data);
                    if (data == 1) {
                        alert("Disabled Succeessfully");
                        window.location = "add_user.php";
                    }
                    //     	
                    else {
                        alert("Failed To Disabled");
                    }
                }


            });
        }
    });

    $(document).on("click", ".aactive", function() {
        var value = $(this).attr("value");
        var pf = $(this).attr("pf");
        var role = $(this).attr("role");
        //alert(pf);
        var result = confirm("Confirm!!! Proceed for Enable user?");
        if (result == true) {
            //alert(value);

            $.ajax({
                url: 'control/adminProcess.php',
                type: 'POST',
                data: "action=activeUser&id=" + value + "&pf=" + pf + "&role=" + role,
                success: function(data) {
                    alert(data);
                    console.log(data);
                    if (data == 1) {
                        alert("Enabled Succeessfully");
                        window.location = "add_user.php";
                    }
                    //     	
                    else {
                        alert("Failed To Enabled");
                    }
                }


            });
        }
    });

    $(document).on("click", ".fetchid", function() {
        var id = $(this).attr("value");
        var pf = $(this).attr("pf");
        var role = $(this).attr("role");
        var array = role.split(",");
        //alert(array);
        $("#u_fid").val(id);
        $("#u_pf_num").val(pf);
        $("#u_role").val(array).trigger("change");


    });


    $(document).on("click", ".update", function() {
        var id = $("#u_fid").val();
        var pf = $("#u_pf_num").val();
        var role = $("#u_role").val();
        //alert(pf);
        var result = confirm("Confirm!!! Proceed for Update role...?");
        if (result == true) {
            //alert(value);

            $.ajax({
                url: 'control/adminProcess.php',
                type: 'POST',
                data: "action=updateUser&id=" + id + "&pf=" + pf + "&role=" + role,
                success: function(data) {
                    alert(data);
                    console.log(data);
                    if (data == 1) {
                        alert("Role updated Successfully");
                        window.location = "add_user.php";
                    }
                    //     	
                    else {
                        alert("Failed To update role");
                    }
                }


            });
        }
    });
    </script>