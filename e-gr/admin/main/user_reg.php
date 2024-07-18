<?php
require_once('Global_Data/header.php');
error_reporting(0);
include('config.php');
include('functions.php');
?>
<!-- <link href="select2/select2.min.css" rel="stylesheet" /> -->
<!-- PNotify -->
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>User/Admin Registration</h3><br>
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
                    <form action="process.php?action=add_user" method="POST" class="form-horizontal">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="">Select User </label>
                                        <select name="usertype[]" style="width:100%" id="usertype"
                                            class="form-control select2" multiple="multiple" required>
                                            <option disabled selected>----Select User----</option>
                                            <option value='0'>Admin</option>
                                            <?php
                                            $fetch_section = mysqli_query($db_egr,"select * from role_user WHERE id = '1' OR id='2' OR id='3' OR id='5'");
                                            while ($section_fetch = mysqli_fetch_array($fetch_section)) {
                                                echo "<option value='" . $section_fetch['id'] . "'>" . $section_fetch['role_type'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="">Emp Id/PF No</label>
                                        <input type="text" class="form-control" id="emp_id" name="emp_id"
                                                placeholder="Enter Employee Id Or PF No. Or PPO No."
                                                onkeydown="this.value=this.value.replace(/[^a-zA-Z0-9 ]/g,'');"
                                                required>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="">Emp Name</label>
                                        <input type="text" class="form-control" id="user_name" name="user_name"
                                                placeholder="Enter Employee Name"
                                                onkeydown="this.value=this.value.replace(/[^a-zA-Z0-9 ]/g,'');"
                                                required>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="">Section</label>
                                        <select name="section[]" id="section" class="form-control select2" required
                                            multiple="multiple">
                                            <!-- <option value="0" disabled selected>---Select Section---</option> -->
                                            <?php
                                            $fetch_section = mysqli_query($db_egr,"select * from tbl_section");
                                            while ($section_fetch = mysqli_fetch_array($fetch_section)) {
                                                echo "<option value='" . $section_fetch['sec_id'] . "'>" . $section_fetch['sec_name'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="">Department</label>
                                        <select id="user_dept" name="user_dept" style="width:100%"
                                            class="form-control select2" required>
                                            <option value="" selected disabled>---Select Department---</option>
                                            <?php
                                            $fetch_dept = mysqli_query($db_common,"select * from  department");
                                            while ($dept_fetch = mysqli_fetch_array($fetch_dept)) {
                                                echo "<option value='" . $dept_fetch['DEPTNO'] . "'>" . $dept_fetch['DEPTDESC'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="">Designation</label>
                                        <select id="user_desig" name="user_desig" style="width:100%"
                                            class="form-control select2" required>
                                            <option value="" selected disabled>---Select Designation---</option>
                                            <?php
                                            $fetch_des = mysqli_query($db_common,"select * from  designations");
                                            while ($des_fetch = mysqli_fetch_array($fetch_des)) {
                                                echo "<option value='" . $des_fetch['DESIGCODE'] . "'>" . $des_fetch['DESIGLONGDESC'] . "(" . $des_fetch["DESIGSHORTDESC"] . ")</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="">Mobile No.</label>
                                        <input type="text" id="user_mob" name="user_mob" class="form-control"
                                                placeholder="Enter Mobile No."
                                                onkeydown="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="10"
                                                required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="">Email Id</label>
                                        <input type="email" id="user_email" name="user_email"
                                                class=" form-control" placeholder="Enter Email Address"
                                                >
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="">Aadhar No.</label>
                                        <input type="text" id="user_aadhar" name="user_aadhar" class="form-control"
                                                placeholder="Enter Aadhar No."
                                                onkeydown="this.value=this.value.replace(/[^0-9]/g,'');" required
                                                maxlength="12" onchange="adharnumber(this);">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="">Office</label>
                                        <select id="user_office" name="user_office" style="width:100%"
                                            class="form-control select2" required>
                                            <option value="" disabled selected>---Select Office---</option>
                                            <?php
                                            $fetch_office = mysqli_query($db_egr,"select * from tbl_office");
                                            while ($office_fetch = mysqli_fetch_array($fetch_office)) {
                                                echo "<option value='" . $office_fetch['office_id'] . "'>" . $office_fetch['office_name'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="">Station</label>
                                        <select id="user_station" name="user_station" style="width:100%"
                                            class="form-control select2" required>
                                            <option value="" disabled selected>---Select Station---</option>
                                            <?php
                                            $fetch_station = mysqli_query($db_common,"select * from station");
                                            while ($station_fetch = mysqli_fetch_array($fetch_station)) {
                                                echo "<option value='" . $station_fetch['stationcode'] . "'>" . $station_fetch['stationdesc'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="">User Name</label>
                                            <?php
                                            // $six_digit_random_number = mt_rand(100000, 999999);
                                            ?>
                                        <input type="text" id="login_name" name="login_name"
                                                class="form-control select2" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="">Password</label>
                                        <input type="text" id="login_pass" name="login_pass"
                                                class="form-control select2" value="" required readonly>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-4 col-sm-7 col-xs-12">
                                <button type="submit" class="btn btn-info source" id="btn_save">Save</button>
                                <a href="index.php" class="btn btn-danger" data-dismiss="modal">Close</a>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once('Global_Data/footer.php');
?>

<script src="select2/select2.min.js"> </script>
<script>
$(document).ready(function() {
    // alert("workig");
    // $("#section").select2("destroy").select2({
    //     placeholder: "Select Section*"
    // });
    $("#btn_save").attr("disabled", "disabled");
    $(".select2").select2({

    });
    // $("#section").select2({
    //     placeholder: "Select Section*"
    // });

});
</script>
<script>
$("#emp_id").on('change', function(e) {
    e.preventDefault();
    var emp_id = $(this).val();
    // alert(emp_id);
    $.post("process.php", {
            action: "get_emp_user_data",
            emp_id: emp_id
        },
        function(data, textStatus, jqXHR) {
            // alert(data);
            var Response = JSON.parse(data);
            // console.log(Response);
            if (Response.res == "success") {
                var emp_data = Response.data;
                // console.log(emp_data);
                $("#user_name").val(emp_data.emp_name);
                $("#user_dept").val(emp_data.emp_department);
                $("#user_dept").select2();
                $("#user_desig").val(emp_data.emp_designation);
                $("#user_desig").select2();
                $("#user_mob").val(emp_data.emp_mobile);
                $("#user_email").val(emp_data.emp_email);
                $("#user_aadhar").val(emp_data.emp_aadhar);
                $("#user_office").val(emp_data.emp_office);
                $("#user_office").select2();
                $("#user_station").val(emp_data.emp_station);
                $("#user_station").select2();
                $("#login_name").val(emp_data.emp_no);
                $("#login_pass").val(emp_data.pass);
                $("#btn_save").removeAttr("disabled");
            } else if (Response.res == "Registered") {
                alert(Response.message);
            } else {
                alert("User not Registered with HRMS! ");
            }

        }
    );
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

$('#user_dept').on('change', function() {
    var user_dept = $(this).val();
    $.ajax({
        type: 'POST',
        url: 'get_desig_office.php',
        data: 'user_dept=' + user_dept,
        success: function(html) {
            var array = html.split("$");
            $('#user_desig').children('option').remove();
            $('#user_desig').append(array[0]);
            $('#user_office').children('option').remove();
            $('#user_office').html(array[1]);
            //alert(array[1]);
        }
    });
});
$("#section").on('change', function() {
    // var section_array = $("#section").val();
    // $("#section").val(section_array);
    // $("#section").select2("destroy").select2();
    // // console.log(section_array);
    // if (section_array.includes('0')) {
    //     var filtered = section_array.filter(function(value, index, arr) {
    //         return value != "0";
    //     });
    //     // console.log(filtered);
    //     $("#section").val(filtered);
    //     $("#section").select2();
    // }

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

function phonenumber(inputtxt) {
    var phoneno = /^\d{10}$/;
    if ((inputtxt.value.match(phoneno))) {
        return true;
    } else {
        alert("Mobile number must be integer and 10 digits");
        $("#user_mob").val("");
        return false;
    }
}

function adharnumber(inputtxt) {
    var phoneno = /^\d{12}$/;
    if ((inputtxt.value.match(phoneno))) {
        return true;
    } else {
        alert("Adhar Card number must be integer and 12 digits");
        $("#user_aadhar").val("");
        return false;
    }
}
$(document).on("change", ".email_validate", function() {
    var id = $(this).val();
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
</script>