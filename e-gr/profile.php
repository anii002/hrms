<!DOCTYPE html>
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en-US"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en-US"> <![endif]-->
<!--[if gt IE 8]><!-->

<?php include_once('global/header.php');
include_once('global/model.php');
include_once('config.php');
include_once('fun.php');
error_reporting(0);
?>

<!-- Start: Header Section ================================ -->
<section class="header-section-1 bg-image-1 header-js" id="search">
    <div class="overlay-color img-responsive">
        <input type="hidden" id="hidden_id" name="hidden_id">
        <div class="container img-responsive responsive ">
            <div class="row section-separator" style="padding-top:100px;'">
                <form method="post" class="single-form" action="process.php?action=updateemployee"
                    enctype="multipart/form-data">
                    <div class="col-md-12 col-sm-12">
                        <?php
                        $query = "select * from register_user where emp_no='" . $_SESSION["user"] . "'";
                        // echo "select * from employee where emp_id='".$_SESSION["user"]."'";
                        $resultset = mysql_query($query, $db_common);
                        $result = mysql_fetch_array($resultset);
                        // print_r($result);
                        ?>
                        <h3 class="text-center">Employee Profile</h3>
                        <hr>
                        <h4>Personal Details</h4>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Employee Type</label>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" style="width:100%" id="emp_type" name="emp_type" required>
                                    <?php
                                    $query_emp = "select * from emp_type where id='" . $result['empType'] . "'";
                                    $result_emp = mysql_query($query_emp, $db_egr);
                                    while ($value_emp = mysql_fetch_array($result_emp)) {
                                        echo "<option value='" . $value_emp['id'] . "' >" . $value_emp['type'] . "</option>";
                                    }
                                    $query_emp = "select * from emp_type where id<>'" . $result['empType'] . "'";
                                    $result_emp = mysql_query($query_emp, $db_egr);
                                    while ($value_emp = mysql_fetch_array($result_emp)) {
                                        echo "<option value='" . $value_emp['id'] . "'>" . $value_emp['type'] . "</option>";
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label>Emp Id/PF No</label>
                            </div>
                            <div class="col-md-4">
                                <input name="emp_id" id="emp_id" class="form-control" type="text"
                                    value="<?php echo $result['emp_no']; ?>" readonly>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Emp Name</label>
                            </div>
                            <div class="col-md-4">
                                <input name="emp_name" id="emp_name" class=" form-control" type="text"
                                    value="<?php echo $result['name']; ?>">
                            </div>
                            <div class="col-md-2">
                                <label>Department</label>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" style="width:100%" id="emp_dept" name="emp_dept" required>
                                    <?php
                                    $query_dept = "SELECT * FROM `department` where DEPTNO='" . $result['designation'] . "'";
                                    $result_dept = mysql_query($query_dept, $db_common);

                                    while ($value_dept = mysql_fetch_array($result_dept)) {
                                        echo "<option value='" . $value_dept['DEPTNO'] . "'>" . $value_dept['DEPTDESC'] . "</option>";
                                    }
                                    $query_dept = "SELECT * FROM `department` where DEPTNO<>'" . $result['deptcode'] . "'";
                                    $result_dept = mysql_query($query_dept);
                                    while ($value_dept = mysql_fetch_array($result_dept)) {
                                        echo "<option value='" . $value_dept['DEPTNO'] . "'>" . $value_dept['DEPTDESC'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <!-- First Name -->
                                <label>Designation</label>
                            </div>
                            <div class="col-md-4">
                                <!-- First Name -->
                                <select class="form-control" style="width:100%" id="emp_desig" name="emp_desig"
                                    required>
                                    <?php
                                    $query_design = "SELECT * FROM `designations` where DESIGCODE='" . $result['designation'] . "'";
                                    $result_design = mysql_query($query_design, $db_common);
                                    while ($value_design = mysql_fetch_array($result_design)) {
                                        echo "<option value='" . $value_design['DESIGCODE'] . "'>" . $value_design['DESIGLONGDESC'] . "</option>";
                                    }
                                    $query_design = "SELECT * FROM `designations` where DESIGCODE<>'" . $result['designation'] . "'";
                                    $result_design = mysql_query($query_design, $db_common);
                                    while ($value_design = mysql_fetch_array($result_design)) {
                                        echo "<option value='" . $value_design['DESIGCODE'] . "'>" . $value_design['DESIGLONGDESC'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <!-- First Name -->
                                <label>MOBILE NO</label>
                            </div>
                            <div class="col-md-4">
                                <!-- First Name -->
                                <input name="emp_mob" id="emp_mob" class="form-control" type="text"
                                    value="<?php echo $result['mobile']; ?>"
                                    onkeydown="this.value=this.value.replace(/[^0-9]/g,'');"
                                    onChange="phonenumber(this);" maxlength="10">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <!-- First Name -->
                                <label>Email Id</label>
                            </div>
                            <div class="col-md-4">
                                <!-- First Name -->
                                <input name="emp_email" id="emp_email" class="email_validate form-control" type="email"
                                    value="<?php echo $result['emp_email']; ?>">
                            </div>
                            <div class="col-md-2">
                                <!-- First Name -->
                                <label>Aadhar No</label>
                            </div>
                            <div class="col-md-4">
                                <!-- First Name -->
                                <input name="emp_aadhar" id="emp_aadhar" class=" form-control" type="text"
                                    value="<?php echo $result['emp_aadhar']; ?>" readonly>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <!-- First Name -->
                                <label>Office</label>
                            </div>
                            <div class="col-md-4">
                                <!-- First Name -->
                                <select class="form-control" style="width:100%" id="emp_office" name="emp_office"
                                    required>
                                    <?php
                                    $query_office = "SELECT * FROM `tbl_office` where office_id='" . $result['office'] . "'";
                                    $result_office = mysql_query($query_office, $db_egr);
                                    while ($value_office = mysql_fetch_array($result_office)) {
                                        echo "<option value='" . $value_office['office_id'] . "'>" . $value_office['office_name'] . "</option>";
                                    }
                                    $query_office = "SELECT * FROM `tbl_office` where office_id<>'" . $result['office'] . "'";
                                    $result_office = mysql_query($query_office, $db_egr);
                                    while ($value_office = mysql_fetch_array($result_office)) {
                                        echo "<option value='" . $value_office['office_id'] . "'>" . $value_office['office_name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label>Station</label>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" style="width:100%" id="emp_station" name="emp_station"
                                    required>
                                    <?php
                                    $query_station = "SELECT * FROM `station` where stationcode='" . $result['station'] . "'";
                                    $result_station = mysql_query($query_station, $db_common);
                                    while ($value_result = mysql_fetch_array($result_station)) {
                                        echo "<option value='" . $value_result['stationcode'] . "'>" . $value_result['stationdesc'] . "</option>";
                                    }
                                    $query_station = "SELECT * FROM `station` where stationcode<>'" . $result['station'] . "'";
                                    $result_station = mysql_query($query_station, $db_common);
                                    while ($value_result = mysql_fetch_array($result_station)) {
                                        echo "<option value='" . $value_result['stationcode'] . "'>" . $value_result['stationdesc'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="btn-form text-center col-xs-12">
                            <button type="submit" class="btn btn-fill btn-success">Update</button>
                        </div>
                    </div>
            </div>
            </form>
            <br>
            <hr>
            <!--<form method="post" class="single-form" action="process.php?action=changepassword"-->
            <!--    enctype="multipart/form-data">-->
            <!--    <h4>Change Password</h4><br>-->
            <!--    <div class="row">-->
            <!--        <div class="col-md-2">-->
                        <!-- First Name -->
            <!--            <label>Password</label>-->
            <!--        </div>-->
            <!--        <div class="col-md-4">-->
                        <!-- First Name -->
            <!--            <input name="pro_emp_opass" id="pro_emp_opass" class=" form-control" type="password" required>-->
            <!--            <input type="hidden" readonly class="form-control" id="emp_id" name="emp_id"-->
            <!--                value="<?php echo $result['emp_no']; ?>">-->
            <!--        </div>-->
            <!--        <div class="col-md-2">-->
                        <!-- First Name -->
            <!--            <label>Confirm Password</label>-->
            <!--        </div>-->
            <!--        <div class="col-md-4">-->
                        <!-- First Name -->
            <!--            <input name="pro_emp_npass" id="pro_emp_npass" class=" form-control" type="password" value=""-->
            <!--                required>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--    <hr>-->
            <!--    <div class="btn-form text-center col-xs-12">-->
            <!--        <button type="submit" class="btn btn-fill btn-danger">Change</button>-->
            <!--    </div>-->
            <!--</form>-->
            
        </div>
    </div>
</section>
<!-- End: Header Section  ================================ -->
<?php include_once('global/footer.php') ?>
<script>
$(document).ready(function() {
    $('.nav-menu .menu-active').removeClass('menu-active');
    // $(container).closest('li').addClass('menu-active');
    $('#profile').addClass('menu-active');
});
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

function phonenumber(inputtxt) {
    var phoneno = /^[6789]\d{9}$/;
    if ((inputtxt.value.match(phoneno))) {
        return true;
    } else {
        $("#emp_mob").val("");
        $("#emp_mob").focus();
        alert("Invalid Mobile number");
        return false;
    }
}
</script>