<!DOCTYPE html>
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en-US"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en-US"> <![endif]-->
<!--[if gt IE 8]><!-->

<?php
// include_once('config.php');
include_once('global/header.php');
include_once('global/model.php');
// include_once('fun.php');
/*added new functions*/
function get_designation_short($id)
{
    global $db_common;
    $sql = "select DESIGSHORTDESC from designations where DESIGCODE='" . $id . "'";
    $f_desg = mysql_query($sql, $db_common);
    $desg_f = mysql_fetch_array($f_desg);
    return $desg_f['DESIGSHORTDESC'];
}

function get_department($id)
{
    global $db_common;

    $sql = "select DEPTDESC from department where DEPTNO='" . $id . "'";
    $f_desg = mysql_query($sql, $db_common);
    $desg_f = mysql_fetch_array($f_desg);
    return $desg_f['DEPTDESC'];
}
function get_designation($id)
{
    global $db_common;
    $sql = "select DESIGLONGDESC from designations where DESIGCODE='" . $id . "'";
    $f_desg = mysql_query($sql, $db_common);
    $desg_f = mysql_fetch_array($f_desg);
    return $desg_f['DESIGLONGDESC'];
}

function get_office_text($id)
{
    global $db_egr;
    $sql = "select * from tbl_office where office_id='" . $id . "'";
    $f_desg = mysql_query($sql, $db_egr);
    $desg_f = mysql_fetch_array($f_desg);
    return $desg_f['office_name'];
}

function get_station_text($id)
{
    global $db_common;
    $sql = "select * from station where stationcode='" . $id . "'";
    $f_desg = mysql_query($sql, $db_common);
    $desg_f = mysql_fetch_array($f_desg);
    return $desg_f['stationdesc'];
}
function get_billunit_text($id)
{
    global $db_common;
    $sql = "SELECT bill_unit FROM `resgister_user` WHERE emp_no='$id'";
    $f_desg = mysql_query($sql, $db_common);
    $desg_f = mysql_fetch_array($f_desg);
    return $desg_f['bill_unit'];
}
function check()
{
    return "working";
}
?>
<?php
$user_last = $_SESSION['user'];
$fetch = "select * from resgister_user where emp_no='$user_last'";
$fetch_result = mysql_query($fetch, $db_common) or die(mysql_error());
//echo "select * from employee where emp_id='$user_last'";
$result_fetched = mysql_fetch_array($fetch_result);
//echo "<script>alert(".$user_last.");</script>"
// print_r($result_fetched);
?>

<!-- Start: Header Section    -->
<section class="header-section-1 bg-image-1 header-js" id="search">
    <div class="overlay-color img-responsive">
        <div class="container img-responsive responsive">
            <div class="row section-separator p-t80">
                <div class="col-md-12 col-sm-12">
                    <form method="post" class="single-form " action="process.php?action=add_grievance"
                        enctype="multipart/form-data">
                        <input type="hidden" id="hidden_id" name="hidden_id"
                            value="<?php echo $result_fetched['emp_no']; ?>">
                        <h3 class="text-center">Grievance Form</h3>
                        <hr>
                        <div class="row">
                            <div class="grievancebox">
                                <div class="col-md-2">
                                    <!-- First Name -->
                                    <label>PF NUMBER</label>
                                    <input name="pf_no" id="pf_no" class=" form-control" type="text"
                                        value="<?php echo $result_fetched['emp_no'] ?>" readonly>
                                </div>

                                <div class="col-md-4">
                                    <!-- First Name -->
                                    <label>Name</label>
                                    <input name="name" id="name" class="form-control" type="text"
                                        value="<?php echo $result_fetched['name']; ?>" readonly>
                                </div>

                                <div class="col-md-3">
                                    <!-- First Name -->
                                    <label>MOBILE NO</label>
                                    <input name="mob_no" id="mob_no" class="form-control" type="text"
                                        value="<?php echo $result_fetched['mobile']; ?>" readonly>
                                </div>
                                <div class="col-md-3">
                                    <!-- First Name -->
                                    <label>E-mail</label>
                                    <input name="email" id="email" class="form-control" type="text"
                                        value="<?php echo $result_fetched['emp_email']; ?>" readonly>
                                </div>
                                <div class="col-md-4">
                                    <!-- First Name -->
                                    <label>Permanant Address</label>
                                    <textarea name="per_addr" id="per_addr" class="form-control" rows="1" type="text"
                                        readonly
                                        style="resize:none"><?php echo $result_fetched['emp_address1']; ?></textarea>
                                </div>
                                <div class="col-md-3">
                                    <!-- First Name -->
                                    <label>State</label>
                                    <input name="state" id="state" class="contact-first-name form-control" type="text"
                                        value="<?php echo $result_fetched['emp_state']; ?>" readonly>
                                </div>
                                <div class="col-md-2">
                                    <!-- First Name -->
                                    <label>Pin Code</label>
                                    <input name="pin" id="pin" class="contact-first-name form-control" type="text"
                                        value="<?php echo $result_fetched['emp_pincode']; ?>" readonly>
                                </div>
                                <div class="col-md-3">
                                    <!-- First Name -->
                                    <label>City</label>
                                    <input name="city" id="city" class="contact-first-name form-control" type="text"
                                        value="<?php echo $result_fetched['emp_city']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Office Address</label>
                                <textarea name="o_addr" id="o_addr" class="form-control" rows="1" type="text" readonly
                                    style="resize:none"><?php echo $result_fetched['office_emp_address1']; ?></textarea>
                            </div>
                            <div class="col-md-3">
                                <label>State</label>
                                <input name="o_state" id="o_state" class="contact-first-name form-control" type="text"
                                    value="<?php echo $result_fetched['office_emp_state']; ?>" readonly>
                            </div>
                            <div class="col-md-2">
                                <label>Pin Code</label>
                                <input name="o_pin" id="o_pin" class="contact-first-name form-control" type="text"
                                    value="<?php echo $result_fetched['office_emp_pincode']; ?>" readonly>
                            </div>
                            <div class="col-md-3">
                                <!-- First Name -->
                                <label>City</label>
                                <input name="o_city" id="o_city" class="contact-first-name form-control" type="text"
                                    value="<?php echo $result_fetched['office_emp_city']; ?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Select Type</label>
                                <select class="form-control" style="" id="select_type" name="select_type" required>
                                    <option selected disabled>Select Your type</option>
                                    <?php
                                    $fetch_cat = "select * from category";
                                    $cat_result = mysql_query($fetch_cat, $db_egr) or die(mysql_error());
                                    // var_dump(mysql_error());
                                    while ($fetch_cat_result = mysql_fetch_array($cat_result)) {
                                        echo "<option value='" . $fetch_cat_result['cat_id'] . "'>" . $fetch_cat_result['cat_name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <!-- First Name -->
                                <!-- <input name="" id="" class="contact-first-name form-control" type="text" -->
                                <?php $six_digit_random_number = mt_rand(100000, 999999);
                                /* $unformatednumber = 1234567;
                                 $six_digit_random_number = sprintf('%04d', $unformatednumber); */
                                ?>
                                <label>Grivence Ref.No</label>
                                <input class="form-control" type="text" name="gri_ref_no" id="gri_ref_no" readonly
                                    value="<?php echo $six_digit_random_number ?>" readonly>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="gri_desc">Description</label>
                                <textarea name="gri_desc" id="gri_desc" class="form-control" rows="2" type="text"
                                    style="resize:none;background-color:white;border:1px solid gray;" required></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="offadd">Attachment(if any)&nbsp;<small style="color:red">File size limit 5
                                        MB</small></label>
                            </div>
                            <div class="col-md-6">
                                <label class="offadd" style="margin-top:-5px;">Do you Want
                                    Upload Any Document?</label>
                                <label class="radio-inline">
                                    <input type="radio" name="optradio" id="yes" value="yes"> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="optradio" id="no" value="no" checked> No
                                </label>
                            </div>
                            <div class="col-md-6" id="flupload">
                                <input type="file" id="upfile" name="upfile[]" accept="image/*,.do
                                
                                c, .docx,.txt,.pdf" onchange="return validatefile();" multiple>
                                <span style="color: #FF0000;" id="file_error"></span>
                            </div>
                        </div>
                        <?php
                        $sql = "SELECT * FROM `tbl_user` WHERE role like '%0%'";
                        $rst_auth = mysql_query($sql, $db_egr);
                        if (mysql_num_rows($rst_auth) > 0) {
                            if ($rw_auth = mysql_fetch_assoc($rst_auth)) {
                                // print_r($rw_auth);
                                $auth_name = $rw_auth["user_name"];
                                $auth_pf = $rw_auth["emp_id"];
                                $auth_dept = $rw_auth["user_dept"];

                                // echo get_department($auth_dept);
                                $auth_dept = get_department($rw_auth["user_dept"]);
                                $auth_desg = $rw_auth["user_desg"];
                                $auth_desg = get_designation($rw_auth["user_desg"]);
                                $auth_billunit = get_billunit_text($auth_pf);
                                $auth_station = get_station_text($rw_auth["user_station"]);

                                ?>
                        <hr>
                        <div class="row text-center">
                            <h4>Authority Details</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Name</label>
                                <input name="auth_name" id="auth_name" class="contact-first-name form-control"
                                    type="text" value="<?php echo $auth_name; ?>" readonly>

                            </div>
                            <div class="col-md-3">
                                <label>PF_No</label>
                                <input name="auth_pf" id="auth_pf" class="contact-first-name form-control" type="text"
                                    value="<?php echo $auth_pf; ?>" readonly>
                            </div>
                            <div class="col-md-2">
                                <label>Department</label>
                                <input name="auth_dept" id="auth_dept" class="contact-first-name form-control"
                                    type="text" value="<?php echo $auth_dept; ?>" readonly>
                            </div>
                            <div class="col-md-3">
                                <!-- First Name -->
                                <label>Designation</label>
                                <input name="auth_desg" id="auth_desg" class="contact-first-name form-control"
                                    type="text" value="<?php echo $auth_desg; ?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Station</label>
                                <input name="auth_station" id="auth_station" class="form-control" type="text" readonly
                                    value="<?php echo $auth_station; ?>">
                            </div>
                            <div class="col-md-3">
                                <label>Bill Unit</label>
                                <input name="auth_bill" id="auth_bill" class="contact-first-name form-control"
                                    type="text" value="<?php echo $auth_billunit; ?>" readonly>
                            </div>
                        </div>
                        <?php
                        }
                    }
                    ?>
                        <br>
                        <div class="btn-form  col-xs-12">
                            <button type="submit" class="btn btn-fill btn-success">Submit</button>
                        </div>
                        <div class="btn-form  text-center col-xs-12">
                            <a href="index.php" style="text-decoration: underline; margin-top:20px;">
                                Click here to go
                                Home Page
                            </a>
                        </div>
                    </form>
                </div>
            </div> <!-- End: .part-1 -->
        </div> <!-- End: .row -->

    </div> <!-- End: .container -->
    </div> <!-- End: .overlay-color -->
</section>
<!-- End: Header Section
        ================================ -->
<?php include_once('global/footer.php') ?>

<script>
$(document).ready(function() {
    $("#flupload").hide();
    $("#yes").click(function() {
        $("#flupload").show();
    });
    $("#no").click(function() {
        $("#flupload").hide();
    });
    $('.nav-menu .menu-active').removeClass('menu-active');
    // $(container).closest('li').addClass('menu-active');
    $('#add_grievance').addClass('menu-active');
});
</script>
<script>
function validatefile() {
    //alert("this is a demo");
    var file_size = $('#upfile')[0].files[0].size;
    if (file_size > 5097152) {
        $("#file_error").html("File size is greater than 5MB");
        $("#upfile").val("");
        return false;
    }
    var fileExtension = ['jpeg', 'jpg', 'png', 'pdf', 'doc', 'docx', 'txt'];
    if ($.inArray($("#upfile").val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        alert("Only formats are allowed : " + fileExtension.join(', '));
        $("#upfile").val('');
        return false;
    }
    return true;
}
</script>