<?php
$GLOBALS['flag'] = "1.2";
include_once('../common_files/header.php');
?>
<link rel="stylesheet" href="../common_print_files/modal.css">
<?php
if (!isset($_GET["emp_pf"])) {
    ?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">

        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.php">Home </a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Forms of Employee</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-book"></i> Forms of Employee
                    </div>
                </div>
                <div class="portlet-body">
                    <h4>Please Goto the employee Forms and the Click on Add Forms</h4>
                </div>
            </div>

        </div>
        <!-- END DASHBOARD STATS -->
        <div class="clearfix">
        </div>
    </div>
</div>
<?php
} else {
    $emp_pf = $_GET["emp_pf"];
    if (!verify_emp($emp_pf)) {
        ?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.php">Home </a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Forms of Employee</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-book"></i> Forms of Employee
                    </div>

                </div>
                <div class="portlet-body">
                    <h4>Please Verify the employee</h4>
                </div>
            </div>

        </div>
        <!-- END DASHBOARD STATS -->
        <div class="clearfix">
        </div>
    </div>
</div>
<?php } else {
        $emp_name = get_emp_name($emp_pf);
        $emp_desig = get_emp_designation($emp_pf);
        ?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.php">Home </a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#.">Add Office Note to Employee</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <form id="frm_add_office_note" method="POST">
                        <div class="caption title">
                            <i class="fa fa-edit"></i>
                            <h4>Add Office Note to Employee</h4>
                        </div>
                </div>
                <div class="portlet-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-3">
                                <input type="hidden" name="txt_emp_pf" id="txt_emp_pf" value="<?php echo $emp_pf; ?>">
                                <p>Employee Name</p>
                            </div>
                            <div class="col-md-3">
                                <p><?php echo $emp_name; ?></p>
                            </div>
                            <div class="col-md-3">
                                <p>Employee Designation</p>
                            </div>
                            <div class="col-md-3">
                                <p><?php echo $emp_desig; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-1">
                                <label for="txt_no">No:</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="txt_no" id="txt_no" class="form-control" required>
                            </div>
                            <div class="col-md-1">
                                <label for="txt_rail_board">Railway :</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="txt_rail_board" id="txt_rail_board" class="form-control"
                                    required>
                            </div>
                            <div class="col-md-1">
                                <label for="txt_place_of_issue">Place Of Issue :</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="txt_place_of_issue" id="txt_place_of_issue"
                                    class="form-control" required>
                            </div>
                            <div class="col-md-1">
                                <label for="txt_dated">Dated :</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="txt_dated" id="txt_dated" class="form-control datepicker"
                                    placeholder="dd-mm-yyyy" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="txt_memo_dated">Memo even No. Dated : </label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="txt_memo_dated" id="txt_memo_dated"
                                    class="form-control datepicker">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-1">
                                <label for="txt_for">For : </label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="txt_for" id="txt_for" class="form-control">
                            </div>

                            <div class="col-md-2">
                                <label for="lst_penalty_type">Select Penalty Type</label>
                            </div>
                            <div class="col-md-2">
                                <select name="lst_penalty_type" id="lst_penalty_type" class="select2 billunitindex"
                                    style="width:100%" required>
                                    <option value="0" selected disabled>Select Penalty Type</option>
                                    <?php
                                            $sql = "SELECT `id`,`penality_name` FROM `tbl_penality_type` WHERE `status`='1'";
                                            $rst_penalty_type = mysql_query($sql, $db_edar);
                                            while ($rw_penalty_type = mysql_fetch_assoc($rst_penalty_type)) {
                                                extract($rw_penalty_type);
                                                echo "<option value='$id'>$penality_name</option>";
                                            }
                                            ?>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label for="txt_memo_one"> 1. The Major penalty memo.</label>
                            </div>
                            <div class="col-md-1">
                                <input type="text" name="txt_memo_one" id="txt_memo_one" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label for="txt_ack_two"> 2. Acknowledgement.</label>
                            </div>
                            <div class="col-md-1">
                                <input type="text" name="txt_ack_two" id="txt_ack_two" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label for="txt_reply_three"> 3. Reply to Memorandum.</label>
                            </div>
                            <div class="col-md-1">
                                <input type="text" name="txt_reply_three" id="txt_reply_three" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label for="txt_apoint_four"> 4. Order of Appointment of E.O.</label>
                            </div>
                            <div class="col-md-1">
                                <input type="text" name="txt_apoint_four" id="txt_apoint_four" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label for="txt_equiry_five"> 5. Enquiry proceedings from</label>
                            </div>
                            <div class="col-md-1">
                                <input type="text" name="txt_equiry_five" id="txt_equiry_five" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label for="txt_finding_six"> 6. Findings of E.O.</label>
                            </div>
                            <div class="col-md-1">
                                <input type="text" name="txt_finding_six" id="txt_finding_six" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label for="txt_defence_seven"> 7. Defence Plea is at</label>
                            </div>
                            <div class="col-md-1">
                                <input type="text" name="txt_defence_seven" id="txt_defence_seven" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label for="txt_eo_eight"> 8. E.O. held the D.E. (guilty/not)</label>
                            </div>
                            <div class="col-md-1">
                                <input type="text" name="txt_eo_eight" id="txt_eo_eight" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label for="txt_guilty">Guilty, vide findings at</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="txt_guilty" id="txt_guilty" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label for="txt_rate_nine"> 9. Rate of pay Rs </label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="txt_rate_nine" id="txt_rate_nine" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label for="txt_grade_ten"> 10. Grade Rs </label>
                            </div>

                            <div class="col-md-2">
                                <input type="text" name="txt_grade_ten" id="txt_grade_ten" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label for="txt_inc_eleven"> 11. Next increament normally due on </label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="txt_inc_eleven" id="txt_inc_eleven"
                                    class="form-control datepicker">
                            </div>
                        </div>
                        <p>The Delinquent Employee was kept under Suspension</p>
                        <div class="row">
                            <div class="col-md-1">
                                <label for="txt_from_date">From</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="txt_from_date" id="txt_from_date"
                                    class="form-control datepicker caltotoldays">
                            </div>
                            <div class="col-md-1">
                                <label for="txt_to_date">to</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="txt_to_date" id="txt_to_date"
                                    class="form-control datepicker caltotoldays">
                            </div>
                            <div class="col-md-1">
                                <label for="txt_total_days">Total days</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="txt_total_days" id="txt_total_days" class="form-control"
                                    readonly>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="txt_imposing_penalty"> Delegation of Power's for imposing penalty is</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="txt_imposing_penalty" id="txt_imposing_penalty"
                                    class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <label for="txt_appointing_auth"> Appointing
                                Authority</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="txt_appointing_auth" id="txt_appointing_auth" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions pull-right">
                <input type="submit" value="Preview" id="btn_preview" class="btn btn-success">
            </div>
            </form>
        </div>
    </div>
    <!-- END DASHBOARD STATS -->
    <div class="clearfix">
    </div>
</div>
<?php }
    ?>
<?php
}
?>
<?php
include_once('../common_files/footer.php');
?>

<div id="mdlPreview" class="modal modal-width fade modal-scroll mldPreview" data-replace="true" tabindex="-1"
    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form id="frm_office_preview" method="POST">
        <div class="modal-header btn-orange-moon">
            <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
            <h4 class="modal-title" style="text-align:center">Form Preview</h4>
        </div>
        <div class="modal-body">
            <div class="modalfull" id="mdlbody">

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="">Close</button>
            </div>
        </div>
    </form>
</div>

</div>
<script>
$(document).ready(function() {
    $(".caltotoldays").change(function(e) {
        e.preventDefault();
        var date_from = $("#txt_from_date").val();
        var date_to = $("#txt_to_date").val();
        if (date_from < date_to) {
            var date_from_sp = date_from.split("-");
            var date_from_date = date_from_sp[0];
            var date_from_month = date_from_sp[1];
            var date_from_year = date_from_sp[2];
            var date_to_sp = date_to.split("-");
            var date_to_date = date_to_sp[0];
            var date_to_month = date_to_sp[1];
            var date_to_year = date_to_sp[2];
            var oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
            var firstDate = new Date(date_from_year, date_from_month, date_from_date);
            var secondDate = new Date(date_to_year, date_to_month, date_to_date);
            var diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime()) / (
                oneDay)));
            $("#txt_total_days").val(diffDays);
        }
    });
    $("#frm_add_office_note").submit(function(e) {
        e.preventDefault();
        var postData = new FormData();
        var postData = new FormData($(this)[0]);
        $.ajax({
            url: "load_office_form.php",
            type: "POST",
            data: postData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data, textStatus, jqXHR) {
                $("#mdlbody").html(data);
                $("#mdlPreview").modal("show");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    });

    $("#frm_office_preview").submit(function(e) {
        e.preventDefault();
        $("#loader").show();
        var postData = new FormData();
        var postData = new FormData($(this)[0]);
        postData.append("action", "save_office_note");
        $.ajax({
            url: "control/da_process.php",
            type: "POST",
            data: postData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data, textStatus, jqXHR) {
                // alert(data);
                // console.log(data);
                $("#loader").hide();
                var Response = JSON.parse(data);
                // console.log(Response);
                if (Response.res == "success") {
                    $("#mdlPreview").modal("hide");
                    // $("#mdlbody").html(data);
                    AlertBox('Done', 'Inserted Record');
                    setTimeout(() => {
                        // window.location.reload();
                        window.location.href = "accepted_list_from_io.php";
                    }, 2000);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });

    });
});
</script>