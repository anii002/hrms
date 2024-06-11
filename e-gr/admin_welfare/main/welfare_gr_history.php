<?php
require_once('Global_Data/header.php');
error_reporting(0);
// include('config.php');
?>

<?php
$empid = $_GET['emp_id'];
$griv_no = $_REQUEST['griv_no'];
$emp = mysql_query("select * from resgister_user where emp_no='$empid'", $db_common);
//echo"select * from employee where emp_id='$empid'";
$nominee = mysql_query("select * from  tbl_grievance where gri_ref_no='$griv_no'", $db_egr);
while ($fetch_nominee = mysql_fetch_array($nominee)) {
    $emp_id = $fetch_nominee['emp_id'];
    $griv_id = $fetch_nominee['gri_ref_no'];
    $gri_type = $fetch_nominee['gri_type'];
    $gri_desc = $fetch_nominee['gri_desc'];
    $gri_date = $fetch_nominee['gri_upload_date'];
    $gri_remark = $fetch_nominee['gri_desc'];
    $upload = $fetch_nominee['uploaded_by'];
}
while ($fetch_emp = mysql_fetch_array($emp)) {
    $emp_name = $fetch_emp['name'];
    $mobile_no = $fetch_emp['mobile'];
    $emp_dept = $fetch_emp['department'];
    $emp_desig = $fetch_emp['designation'];
    $emp_type = $fetch_emp['empType'];
}

function get_desc($name)
{
    global $db_egr;
    $query = mysql_query("select cat_name from category where cat_id='$name'", $db_egr);
    while ($fetch = mysql_fetch_array($query)) {
        return $fetch['cat_name'];
    }
}

?>
<!-- PNotify -->
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> <i class="fa fa-users"></i>Grievance History </h3><br>
            </div>

            <div class="title_right">

            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <form action="process.php?action=add_grievance" method="POST" class="form-horizontal"
                            enctype="multipart/form-data">
                            <h4 class="bgshades"> Grievance History: </h4>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Emp Number :</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <?php
                                            $user_id = $_SESSION['SESSION_ID'];
                                            //echo "<script>alert('$user_id');</script>";
                                            ?>
                                            <input type="hidden" name="hidden_id" id="hidden_id"
                                                value="<?php echo $user_id; ?>">

                                            <label class="control-label labelhdata"><?php echo $emp_id ?></label>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Griv Ref No :</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <label class="control-label labelhdata"><?php echo $griv_id ?></label>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Emp. Name :</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <label class="control-label labelhdata"><?php echo $emp_name ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile number:</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <label class="control-label labelhdata"><?php echo $mobile_no ?></label>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Grivance Type :</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <label
                                                class="control-label labelhdata"><?php echo get_desc($gri_type); ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class=" col-md-2 col-sm-3 col-xs-12">Grievance Desc : </label>
                                        <div class="col-md-12 col-sm-6 col-xs-12" style="padding-left:50px;">
                                            <label
                                                class="control-label labelhdata"><?php echo trim($gri_desc); ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class=" col-md-12 col-sm-3 col-xs-12">
                                    <h5 class="bgshades"><b>Grievance Status</b></h5>
                                </label>
                            </div>
                        </div>
                    </div>
                    <?php
                    function get_uploaded_user($id)
                    {
                        global $db_egr;
                        $e_type = '';
                        $fetch_name_sql = mysql_query("select * from tbl_user where user_id='$id'", $db_egr);
                        while ($name_fetch = mysql_fetch_array($fetch_name_sql)) {
                            $e_type = $name_fetch['user_name'];
                            $e_section = $name_fetch['section'];
                        }
                        return $e_type . "$" . get_section_name($e_section);
                    }
                    function get_section_name($id)
                    {
                        global $db_egr;
                        $e_type = '';
                        $fetch_name_sql = mysql_query("select * from tbl_section where sec_id='$id'", $db_egr);
                        while ($name_fetch = mysql_fetch_array($fetch_name_sql)) {
                            $e_type = $name_fetch['sec_name'];
                        }
                        return $e_type;
                    }
                    function get_current_status($id)
                    {
                        global $db_egr;
                        $e_type = '';
                        $fetch_name_sql = mysql_query("select * from status where id='$id'", $db_egr);
                        while ($name_fetch = mysql_fetch_array($fetch_name_sql)) {
                            $e_type = $name_fetch['status'];
                        }
                        return $e_type;
                    }
                    $sql = "SELECT f.`user_id_forwarded`, f.id,  f.`status` FROM `tbl_grievance_forward` f INNER JOIN `tbl_grievance` tg ON f.`griv_ref_no` = tg.`gri_ref_no` WHERE tg.`gri_ref_no` = '" . $_GET['griv_no'] . "' AND tg.emp_id = '" . $_GET['emp_id'] . "' ORDER BY f.id DESC LIMIT 1";

                    $result = mysql_query($sql, $db_egr);
                    if (mysql_affected_rows() > 0) {
                        $data = mysql_fetch_array($result);
                        $array = get_uploaded_user($data['user_id_forwarded']);
                        $arr = explode("$", $array);
                        $pending_with = $arr[0] . " (" . $arr[1] . ")";
                        $status_int = $data["status"];
                        $status = get_current_status($data['status']);
                        // echo $data['status'];
                    }
                    ?>
                    <div class="row">
                        <?php if ($status_int != 4) { ?>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Pending With:</label>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <label class="control-label labelhdata"><?php echo $pending_with; ?></label>
                                </div>
                            </div>
                        </div>
                        <?php
                    } ?>

                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Current Status:</label>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <label class="control-label labelhdata"><?php echo $status; ?></label>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br />
                <center><a class="btn btn-danger" href="index.php">Back</a></center>
                <br />
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>


<?php
require_once('Global_Data/footer.php');
?>
<link href="select2/select2.min.css" rel="stylesheet" />
<script src="select2/select2.min.js"> </script>
<script>
$("#emp_id").blur(function() {
    var emp_id = $("#emp_id").val();
    $.ajax({
        type: 'POST',
        url: 'process.php',
        data: 'action=get_temp_emp&emp_id=' + emp_id,
        success: function(html) {
            //alert(html);
            $data = JSON.parse(html);
            $('#emp_name').val($data['emp_name']);
            $('#emp_mob_no').val($data['mobile_no']);
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

var login_pass = $("#login_name").val();
//alert(login_pass);
$("#login_pass").val(login_pass);


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


function phonenumber(inputtxt) {
    var mobileno = /^\d{10}$/;
    if ((inputtxt.value.match(mobileno))) {
        return true;
    } else {
        alert("Mobile number must be integer and 10 digits");
        $("#emp_mob_no").val("");
        return false;
    }
}
</script>
<script>
function validate() {

    //alert("this is a demo");
    var fi = document.getElementById('upfile');
    var file_count = 0;
    for (var i = 0; i <= fi.files.length - 1; i++) {
        var fsize = fi.files.item(i).size;
        file_count += fsize;
    }
    // alert(file_count);
    if (file_count > 5097152) {
        $("#file_error").html("File size is greater than 5MB");
        $("#upfile").val("");

        return false;
    }

    return true;

}
</script>