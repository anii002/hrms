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
                <h3>Grievance Registration</h3><br>
            </div>
            <!--<div class="title_right"></div>-->
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h4 class="bgshades"> Personal Details </h4>
                    </div>
                    <form action="process.php?action=add_grievance" method="POST" class="form-horizontal"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="">Emp No./PF No</label>
                                    <?php
                                    $user_id = $_SESSION['SESSION_ID'];
                                    //echo "<script>alert('$user_id');</script>";
                                    ?>
                                    <input type="hidden" name="hidden_id" id="hidden_id"
                                        value="<?php echo $user_id; ?>">
                                    <input type="text" class="form-control" id="emp_id" name="emp_id"
                                        placeholder="Enter Employee Id Or PF No. Or PPO No." required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="">Emp Name</label>
                                    <input type="text" class="form-control" id="emp_name" name="emp_name"
                                        placeholder="Enter Employee Name"
                                        onkeydown="this.value=this.value.replace(/[^a-zA-Z0-9 ]/g,'');"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="">Employee Type</label>
                                    <select id="emp_type" required name="emp_type" class="form-control"
                                        style="width:100%">
                                        <option value="" disabled selected>Select Employee Type</option>
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
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="">Department</label>
                                    <select id="emp_dept" name="emp_dept" class="form-control mydept"
                                        style="width:100%" required>
                                        <option selected hidden readonly disabled>Select Department</option>
                                        <?php
                                        $query_dept = "SELECT * FROM `department`";
                                        $result_dept = mysqli_query($db_common,$query_dept);
                                        while ($value_dept = mysqli_fetch_array($result_dept)) {
                                            echo "<option value='" . $value_dept['DEPTNO'] . "'>" . $value_dept['DEPTDESC'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="">Office</label>
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
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="">Designation</label>
                                    <select id="emp_desig" name="emp_desig" class="form-control"
                                        style="width:100%" required>
                                        <option value="" disabled selected>Select Designation</option>
                                        <?php
                                        $query_design = "SELECT * FROM `designations`";
                                        $result_design = mysqli_query($db_common,$query_design);
                                        while ($value_design = mysqli_fetch_array($result_design)) {
                                            echo "<option value='" . $value_design['DESIGCODE'] . "'>" . $value_design['DESIGLONGDESC'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="">Mobile Number</label>
                                    <input type="text" class="form-control" id="emp_mob_no" name="emp_mob_no"
                                        placeholder="Enter Mobile number"
                                        onkeydown="this.value=this.value.replace(/[^0-9]/g,'');"
                                        onChange="phonenumber(this);" required>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="">Grievance Ref. No.</label>
                                    <?php $six_digit = mt_rand(100000, 999999); ?>
                                    <input type="text" class="form-control" id="griv_ref_no" name="griv_ref_no"
                                        value="WEL<?php echo $six_digit; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="">Grievance Type</label>
                                    <select name="gri_type" style="width:100%" id="gri_type"
                                        class="form-control" required>
                                        <option disabled selected>----Select Grievance Type----</option>
                                        <?php
                                        $fetch_section = mysqli_query($db_egr,"select * from category");
                                        while ($section_fetch = mysqli_fetch_array($fetch_section)) {
                                            echo "<option value='" . $section_fetch['cat_id'] . "'>" . $section_fetch['cat_name'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="">Upload Document</label>
                                    <input type="file" class="form-control" name="upload_doc[]" id="upload_doc"
                                        accept="image/*,.doc, .docx,.txt,.pdf" multiple
                                        onchange="validatefile()">
                                    <span style="color: #FF0000;" id="file_error"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12">Remark</label>
                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                        <textarea class="form-control" name="wel_remark" id="wel-remark"
                                            style="resize:none;" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-sm-7 col-xs-12">
                            <button type="submit" class="btn btn-info source">Save</button>
                            <a href="index.php" class="btn btn-danger" data-dismiss="modal">Close</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <p>* If employee data exists then data will fetch but it is not updatable.</p>
        </div>
    </div>
</div>


<?php
require_once('Global_Data/footer.php');
?>
<link href="select2/select2.min.css" rel="stylesheet" />
<script src="select2/select2.min.js"> </script>
<script>
$("#emp_office").select2();
$("#emp_desig").select2();
$("#emp_dept").select2();
$(document).on("change", "#emp_id", function() {
    var emp_id = $("#emp_id").val();
    $.ajax({
        type: 'POST',
        url: 'process.php',
        data: 'action=get_temp_emp&emp_id=' + emp_id,
        success: function(html) {
            // alert(html);
            // console.log(html);
            $data = JSON.parse(html);
            $('#emp_name').val($data['emp_name']);
            $('#emp_type').val($data['emp_type']);
            $("#emp_type").select2();
            $('#emp_dept').val($data['emp_dept']);
            $('#emp_dept').select2();
            $('#emp_office').val($data['office']);
            $('#emp_office').select2();
            $('#emp_desig').val($data['emp_desig']);
            $('#emp_desig').select2();
            $('#emp_mob_no').val($data['emp_mob']);
        }
    });
});
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

$('#emp_dept').on('change', function() {
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

var login_pass = $("#login_name").val();
//alert(login_pass);
$("#login_pass").val(login_pass);

function phonenumber(inputtxt) {
    var phoneno = /^\d{10}$/;
    if ((inputtxt.value.match(phoneno))) {
        return true;
    } else {
        alert("Mobile number must be integer and 10 digits");
        $("#emp_mob_no").val("");
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
</script>
<script>
function validatefile() {
    //alert("this is a demo");
    var file_size = $('#upload_doc')[0].files[0].size;
    if (file_size > 5097152) {
        $("#file_error").html("File size is greater than 5MB");
        $("#upload_doc").val("");
        return false;
    }
    var fileExtension = ['jpeg', 'jpg', 'png', 'pdf', 'doc', 'docx', 'txt'];
    if ($.inArray($("#upload_doc").val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        // alert("Only formats are allowed : " + fileExtension.join(', '));
        $("#file_error").html("Only formats are allowed : " + fileExtension.join(', '));
        $("#upload_doc").val('');
        return false;
    }
    return true;
}
</script>