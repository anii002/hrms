<?php
require_once('Global_Data/header.php');
error_reporting(0);
?>

<!-- PNotify -->
<!-- page content -->
<div class="right_col" role="main" style="background-image: url('images/small1.png');repeat:repeat;">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <h2>User <small>List</small></h2>
                        <hr>
                        <div class="x_content">
                            <table class="table table-striped table-bordered display" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <!--th>Type</th-->
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
                                    $query = mysql_query("Select * from tbl_user where user_id>1", $db_egr);
                                    while ($rw_data = mysql_fetch_assoc($query)) {
                                        $user_id = $rw_data["user_id"];
                                        //$emp_type=get_type($rw_data["emp_type"]);
                                        $emp_id = $rw_data["emp_id"];
                                        $emp_name = $rw_data["user_name"];
                                        $emp_dept = get_department($rw_data["user_dept"]);
                                        $emp_desig = get_designation($rw_data["user_desg"]);
                                        $emp_mob = $rw_data["user_mob"];
                                        echo "<tr>";
                                        echo "<td>$cnt</td>";
                                        // echo "<td>$emp_type</td>";
                                        echo "<td>$emp_id</td>";
                                        echo "<td>$emp_name</td>";
                                        echo "<td>$emp_dept</td>";
                                        echo "<td>$emp_desig</td>";
                                        echo "<td>$emp_mob</td>";
                                        $fetch_a = mysql_query("select status from tbl_user where user_id='$user_id'", $db_egr);
                                        $a_fetch = mysql_fetch_array($fetch_a);
                                        $status = $a_fetch['status'];
                                        echo "<td>";
                                        if ($status == 'active') {
                                            echo "<a data-toggle='modal' style='width:34px;  margin-left:10px;' id='" . $rw_data['user_id'] . "' href='#deactive_employee' class='btn_show_center btn1 btn btn-danger' title='Deactivate Employee'  value='" . $rw_data['user_id'] . "'><i class='fa fa-lock'></i></a></div>";
                                        } else {
                                            echo "<a data-toggle='modal' style='width:34px' id='" . $rw_data['user_id'] . "' href='#active_employee' class='btn_show_center btn1 btn btn-success' title='Active Employee'  value='" . $rw_data['user_id'] . "'><i class='fa fa-unlock'></i></a>";
                                        }
                                        echo "<button data-toggle='modal' data-target='#update_user' id='" . $rw_data['user_id'] . "' class='btn_show_center btn1 btn btn-info' title='Update Employee' value='" . $rw_data['user_id'] . "'>Update</button>";
                                        echo "</td>";
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
    <!--------------update employee modal-------------------------->
    <!-- Modal -->
    <div class="modal fade" id="update_user" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update User</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="process.php?action=update_user_modal">
                        <input type="hidden" name="hidden_update" id="hidden_update">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select User </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <select name="usertype" style="width:100%" id="usertype"
                                            class="form-control select2" required>
                                            <option disabled selected>----Select User----</option>
                                            <?php
                                            $fetch_section = mysql_query("select * from role_user WHERE id = '1' OR id='2' OR id='3' OR id='5'", $db_egr);
                                            while ($section_fetch = mysql_fetch_array($fetch_section)) {
                                                echo "<option value='" . $section_fetch['id'] . "'>" . $section_fetch['role_type'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Emp Id/PF No</label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" id="emp_id" name="emp_id"
                                            placeholder="Enter Employee Id Or PF No. Or PPO No." value="" required>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Emp Name</label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" id="user_name" name="user_name"
                                            placeholder="Enter Employee Name"
                                            onkeydown="this.value=this.value.replace(/[^a-zA-Z0-9]/g,'');" required>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:20px;">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Section</label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <select name="section[]" style="width:100%" id="section" class="form-control"
                                            required multiple="multiple">
                                            <?php
                                            $rst_section = mysql_query("SELECT * FROM `tbl_section`", $db_egr);
                                            while ($rw_section = mysql_fetch_array($rst_section)) {
                                                echo "<option value='" . $rw_section['sec_id'] . "'>" . $rw_section['sec_name'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Department</label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <select id="user_dept" name="user_dept" style="width:100%"
                                            class="form-control mydept" required>
                                            <?php
                                            $rst_section = mysql_query("SELECT * FROM `department`", $db_common);
                                            while ($rw_section = mysql_fetch_array($rst_section)) {
                                                echo "<option value='" . $rw_section['DEPTNO'] . "'>" . $rw_section['DEPTDESC'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:20px;">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Designation</label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <select id="user_desig" name="user_desig" style="width:100%"
                                            class="form-control" required>
                                            <?php
                                            $rst_section = mysql_query("SELECT * FROM `designations`", $db_common);
                                            while ($rw_section = mysql_fetch_array($rst_section)) {
                                                echo "<option value='" . $rw_section['DESIGCODE'] . "'>" . $rw_section['DESIGLONGDESC'] . "(" . $rw_section["DESIGSHORTDESC"] . ")</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile No.</label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="text" id="user_mob" name="user_mob" class="form-control"
                                            placeholder="Enter Mobile No." required
                                            onkeydown="this.value=this.value.replace(/[^0-9]/g,'');"
                                            onChange="phonenumber(this);" maxlength="10">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:20px;">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Email Id</label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="email" id="user_email" name="user_email"
                                            class="form-control email_validate" placeholder="Enter Email Address"
                                            required>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Aadhar No.</label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="text" id="user_aadhar" name="user_aadhar" class="form-control"
                                            placeholder="Enter Aadhar No." required
                                            onkeydown="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="12">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:20px;">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Office</label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <select id="user_office" name="user_office" style="width:100%"
                                            class="form-control" required>
                                            <?php
                                            $rst_section = mysql_query("SELECT * FROM `tbl_office`", $db_egr);
                                            while ($rw_section = mysql_fetch_array($rst_section)) {
                                                echo "<option value='" . $rw_section['office_id'] . "'>" . $rw_section['office_name'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Station</label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <select id="user_station" name="user_station" style="width:100%"
                                            class="form-control" required>
                                            <?php
                                            $rst_section = mysql_query("SELECT * FROM `station`", $db_common);
                                            while ($rw_section = mysql_fetch_array($rst_section)) {
                                                echo "<option value='" . $rw_section['stationcode'] . "'>" . $rw_section['stationdesc'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:20px;">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">User Name</label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">

                                        <input type="text" id="login_name" name="login_name" class="form-control"
                                            value="" required readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="text" id="login_pass" name="login_pass" class="form-control"
                                            value="" required readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br />
                        <div class="col-sm-7 col-xs-12 pull-right">
                            <button type="submit" class="btn btn-info source">Update</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <!--button type="button" class="btn btn-default" data-dismiss="modal">Close</button-->
                </div>
            </div>

        </div>
    </div>

    <!--------------- deactivate employee modal------------------------->

    <div id="deactive_employee" class="modal fade">
        <form method="POST" action="process.php?action=deactive_user">
            <input type="hidden" id="hidden_deactive" name="hidden_deactive" class="form-control">
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
                        <p>Do you want to deactivate this user?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Deactivate</button>
                        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div id="active_employee" class="modal fade bs-modal-lg">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form method="POST" action="process.php?action=active_user">
                    <div class="modal-header" style="background: #17c7bf;color: #fff;">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>

                        <h4 class="modal-title" id="myModalLabel">Activate User</h4>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" id="hidden_active" name="hidden_active" class="form-control">
                        <p>Do you want to activate this user?</p>
                        <button type="submit" class="btn btn-info source">Active</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>


<?php
require_once('Global_Data/footer.php');
?>
<link href="select2/select2.min.css" rel="stylesheet" />
<script src="select2/select2.min.js"> </script>
<!--<script>
loadDept();
loadSection();
loadDesignation();
loadOffice();
loadStation();
$("#emp_dept").select2();
$("#user_desig").select2();
$("#emp_state").select2();
$("#emp_city").select2();
$("#office_emp_state").select2();
$("#office_emp_city").select2();
$("#user_office").select2();
$("#user_station").select2();
$("#section").select2();

function loadDept() {
    $("#user_dept").load("commonoperations.php", {
        Flag: "getCommonList",
        Table: "department",
        ValueField: "DEPTNO",
        DisplayField: "DEPTDESC"
    }, function(response, status, request) {
        this; // dom element
    });
    $("#user_dept").select2();
}

function loadSection() {
    $("#section").load("commonoperations.php", {
        Flag: "getList",
        Table: "tbl_section",
        ValueField: "sec_id",
        DisplayField: "sec_name"
    }, function(response, status, request) {
        this; // dom element
    });
    $("#section").select2({
        placeholder: "Select Section"
    });
}

function loadDesignation() {
    $("#user_desig").load("commonoperations.php", {
        Flag: "get_common_list_display_more",
        Table: "designations",
        ValueField: "DESIGCODE",
        DisplayField: ["DESIGLONGDESC", "DESIGSHORTDESC"]
    }, function(response, status, request) {
        this; // dom element
    });
    $("#user_desig").select2();
    // $.post("commonoperations.php", {
    //         Flag: "get_common_list_display_more",
    //         Table: "designations",
    //         ValueField: "DESIGCODE",
    //         DisplayField: ["DESIGLONGDESC", "DESIGSHORTDESC"]
    //     },
    //     function(data, textStatus, jqXHR) {
    //         alert(data);
    //     }
    // );
}

function loadOffice() {
    $("#user_office").load("commonoperations.php", {
        Flag: "getList",
        Table: "tbl_office",
        ValueField: "office_id",
        DisplayField: "office_name"
    }, function(response, status, request) {
        this; // dom element
    });
    $("#user_office").select2();
}

function loadStation() {
    $("#user_station").load("commonoperations.php", {
        Flag: "getCommonList",
        Table: "station",
        ValueField: "stationcode",
        DisplayField: "stationdesc"
    }, function(response, status, request) {
        this; // dom element
    });
    $("#user_station").select2();
}
</script>-->
<script>
$(document).on("change", ".email_validate", function() {
    var id = $(this).val();
    // alert(id);
    //var text=$("#"+id).val();
    var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
    if ((pattern.test(id))) {
        return true;
    } else {
        $(this).val("");
        $(this).focus();
        alert("invalid email id");
        return false;
    }
});

function phonenumber(inputtxt) {
    var phoneno = /^[6789]\d{9}$/;
    if ((inputtxt.value.match(phoneno))) {
        return true;
    } else {
        $("#user_mob").val("");
        $("#user_mob").focus();
        alert("Invalid Mobile number");
        return false;
    }
}
$('.btn1').on('click', function() {
    $('#hidden_active').val($(this).attr('id'));
    $('#hidden_deactive').val($(this).attr('id'));
    $('#hidden_update').val($(this).attr('id'));
    // debugger;
    var active = document.getElementById('hidden_active').value;
    var active = document.getElementById('hidden_deactive').value;
    var update = document.getElementById('hidden_update').value;
    //alert(update);
    $.ajax({
        type: 'POST',
        url: 'process.php?action=update_user',
        data: {
            update: update
        },
        success: function(rows) {
            // alert(rows);
            // console.log(rows);
            var data = JSON.parse(rows);
            // alert(data.emp_id);
            $('#emp_id').val(data.emp_id);
            $('#user_name').val(data.user_name);
            $('#user_mob').val(data.user_mob);
            $('#user_email').val(data.user_email);
            $('#user_aadhar').val(data.user_aadhar);
            $('#login_name').val(data.username);
            $('#login_pass').val(data.password);
            $('#section').val(data.section);
            $('#section').select2({
                placeholder: "Select section"
            });
            $('#user_dept').val(data.user_dept);
            $('#user_dept').select2();
            $('#user_desig').val(data.user_desg);
            $("#user_desig").select2();
            $('#user_office').val(data.user_office);
            $("#user_office").select2();
            $('#user_station').val(data.user_station);
            $('#user_station').select2();
            $('#usertype').val(data.role);
        }
    });
});
</script>