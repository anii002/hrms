<?php
$GLOBALS['flag'] = "0";
include_once('../common_files/header.php');
// include_once('../common_files/sidebar.php');
?>
<style>
.rp-20 {
    padding-right: 25px;
}

.padding-20 {
    padding: 20px;
}

.btn-space {
    margin-right: 15px;
}
</style>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- 
			<h3 class="page-title">
			Dashboard / डॅशबोर्ड<small>reports & statistics</small>
			</h3> -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.php">Home </a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Employee Forms</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-book"></i> Employee Forms
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="lst_emp_pf">Please Select the Employee</label>
                        </div>
                        <div class="col-md-6">
                            <select name="lst_emp_pf" id="lst_emp_pf" class="select2 get_emp_pf billunitindex"
                                style="width:100%">
                                <option value="0" selected="selected " disabled="disabled">Select Employee
                                </option>
                                <?php
                                $query = "SELECT `emp_no`,`name` FROM `register_user`";
                                $rst_emp = mysql_query($query, $db_common);
                                while ($rw_emp = mysql_fetch_assoc($rst_emp)) {
                                    // print_r($rw_emp);
                                    extract($rw_emp);
                                    echo "<option value='$emp_no'>$name</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2">
                            <h4>Forms Details</h4>
                        </div>
                        <div class="col-md-10 pull-right">
                            <?php
                            if (isset($_GET["action"])) {
                                $action_array = explode(",", $_GET["action"]);
                                // print_r($action_array);
                                /**
                                 * Array ( [0] => add_forms [1] => add_ack [2] => add_speak [3] => add_office_note )
                                 */
                                if (in_array("add_forms", $action_array)) {
                                    echo "<button class=\"btn btn-success btn-space\" id=\"btn_add_form\">Add Forms</button>";
                                }
                                if (in_array("add_ack", $action_array)) {
                                    echo "<button class=\"btn btn-success btn-space\" id=\"btn_add_ack\">Add Acknowledgment</button>";
                                }
                                if (in_array("add_speak", $action_array)) {
                                    echo "<button class=\"btn btn-success btn-space\" id=\"btn_add_speaking_order\">Add Speaking Order</button>";
                                }
                                if (in_array("add_office_note", $action_array)) {
                                    echo  "<button class=\"btn btn-success btn-space\" id=\"btn_add_office_note\">Add Office Note</button>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <hr>
                    <table class="table table-resposive table-bordered" id="tbl_forms_emp">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Form Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbl_emp_forms">

                        </tbody>

                    </table>
                    <div class="row pull-right rp-20">
                        <?php if (isset($_GET["baction"])) {
                            // echo $_GET["baction"];
                            $baction_array = explode(",", $_GET["baction"]);
                            // print_r($baction_array);
                            /**
                             * Array ( [0] => accept [1] => reject [2] => forward ) 
                             */
                            if (in_array("accept", $baction_array)) {
                                echo "<button class=\"btn btn-success btn-space\" id=\"btn_accept\" data-toggle=\"modal\" data-target=\"#mdl_accept\">Accept</button>";
                            }
                            if (in_array("reject", $baction_array)) {
                                echo "<button class=\"btn btn-danger btn-space\" id=\"btn_reject\" data-toggle=\"modal\"
                                data-target=\"#mdl_reject\">Reject</button>";
                            }
                            if (in_array("forward", $baction_array)) {
                                echo "<button class=\"btn btn-success btn-forward btn-space\" data-toggle=\"modal\"
                                    data-target=\"#mdl_forward\">Forward</button>";
                            }
                            if (in_array("close", $baction_array)) {
                                echo "<button class=\"btn btn-danger btn-space\" data-toggle=\"modal\"
                                    data-target=\"#mdl_close\">Close Case</button>";
                            }
                        }
                        ?>
                    </div>
                    <?php
                    if (isset($_GET["display"])) {
                        $display_array = explode(",", $_GET["display"]);
                        if (in_array("reject", $display_array)) {
                            $emp_pf = $_GET["emp_pf"];
                            $ref_id = get_emp_ref($emp_pf);
                            $sql = "SELECT `rejected_reason` FROM `tbl_form_forward` WHERE `status`='4' AND `emp_pf`='$emp_pf' AND `form_reference_id`='$ref_id'";
                            $rst_reject_reason = mysql_query($sql, $db_edar);
                            if (mysql_num_rows($rst_reject_reason) > 0) {
                                $rw_reject_reason = mysql_fetch_assoc($rst_reject_reason);
                                // print_r($rw_reject_reason);
                                $rejected_reason = $rw_reject_reason["rejected_reason"];
                            }
                            ?>
                    <div class="row">
                        <div class="col-md-2">
                            <label for="txt_reason">Reason of Rejection: </label>
                        </div>
                        <div class="col-md-10">
                            <textarea name="txt_reason" id="txt_reason" class="form-control"
                                readonly><?php echo $rejected_reason; ?></textarea>
                        </div>
                    </div>
                    <?php
                        }
                    } ?>
                </div>
            </div>
        </div>
        <!-- END DASHBOARD STATS -->
        <div class="clearfix">
        </div>
    </div>
</div>

<?php
include_once('../common_files/footer.php');
?>
<script>
$(document).ready(function() {
    // alert("w");
    $("#lst_emp_pf").val('');
    $("#lst_emp_pf").select2("destroy").select2({
        minimumInputLength: 2,
    });

    var emp_pf = getQueryVariable("emp_pf");
    // console.log(emp_pf);
    if (emp_pf) {
        $("#lst_emp_pf").val(emp_pf).trigger('change');
        $("#lst_emp_pf").attr("disabled", "disabled");
    }
    $("#btn_add_form").click(function(e) {
        e.preventDefault();
        var emp_pf = $("#lst_emp_pf").val();
        if (emp_pf == 0 || emp_pf == null) {
            alert("Please Select the employee");
        } else {
            // alert(emp_pf);
            window.location = "add_forms.php?emp_pf=" + emp_pf;
        }
    });
    $("#mdl_fm_forward").submit(function(e) {
        e.preventDefault();
        var postData = new FormData();
        var postData = new FormData($(this)[0]);
        postData.append("action", "forward_form");
        $.ajax({
            url: "control/iq_process.php",
            type: 'POST',
            data: postData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data, textStatus, jqXHR) {
                // alert(data);
                // console.log(data);
                var Response = JSON.parse(data);
                if (Response.res == "success") {
                    alert("Employee Form Forwarded Successfully");
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                } else {
                    alert("Please Try Again!");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    });
    $("#mdl_form_reject").submit(function(e) {
        e.preventDefault();
        if ($("#mld_reject_remark").val() == '') {
            AlertBox("Error", "Please Ener the Reason of Rejecting?");
            $("#mld_reject_remark").focus();
        } else {
            var postData = new FormData();
            var postData = new FormData($(this)[0]);
            var emp_pf = $("#lst_emp_pf").val();
            postData.append("emp_pf", emp_pf);
            postData.append("action", "reject_form");
            $.ajax({
                url: "control/iq_process.php",
                type: 'POST',
                data: postData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data, textStatus, jqXHR) {
                    alert(data);
                    console.log(data);
                    var Response = JSON.parse(data);
                    if (Response.res == "success") {
                        AlertBox("Error", "Employee Forms is Rejected");
                        setTimeout(() => {
                            window.location.href = "rejected_forms_list.php";
                        }, 1000);
                    } else {
                        AlertBox("Error", "Please Try Again!");
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
        }
    });

    $("#mdl_form_accept").submit(function(e) {
        e.preventDefault();
        var postData = new FormData();
        var postData = new FormData($(this)[0]);
        var emp_pf = $("#lst_emp_pf").val();
        postData.append("emp_pf", emp_pf);
        postData.append("action", "accept_form");
        $.ajax({
            url: "control/iq_process.php",
            type: 'POST',
            data: postData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data, textStatus, jqXHR) {
                // alert(data);
                // console.log(data);
                var Response = JSON.parse(data);
                if (Response.res == "success") {
                    AlertBox("Success", "Employee Form is Accepted");
                    setTimeout(() => {
                        window.location.href = "accepted_forms_list.php";
                    }, 1000);
                } else {
                    AlertBox("Error", "Please Try Again!");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    });
    $("#mdl_form_close").submit(function(e) {
        e.preventDefault();
        var postData = new FormData();
        var postData = new FormData($(this)[0]);
        var emp_pf = $("#lst_emp_pf").val();
        postData.append("emp_pf", emp_pf);
        postData.append("action", "close_form");
        $.ajax({
            url: "control/iq_process.php",
            type: 'POST',
            data: postData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data, textStatus, jqXHR) {
                alert(data);
                console.log(data);
                // var Response = JSON.parse(data);
                // if (Response.res == "success") {
                //     AlertBox("Success", "Employee Form is Accepted");
                //     setTimeout(() => {
                //         window.location.href = "accepted_forms_list.php";
                //     }, 1000);
                // } else {
                //     AlertBox("Error", "Please Try Again!");
                // }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    });
});
// !set employee pf no in forward Modal
$(document).on("click", ".btn-forward", function() {
    var $data = $("#lst_emp_pf").val();
    if ($data != '') {
        $("#mdl_hd_emp_pf").val($data);
    } else {
        alert("Please Select the Employee To Forward");
    }
});

// ! get employee forms using ajax
$(document).on("change", ".get_emp_pf", function(e) {
    e.preventDefault();
    var emp_no = $(this).val();
    // alert(emp_no);
    var display = getQueryVariable("display");
    if (emp_no == '' || emp_no == null) {
        alert("Please select the employee..");
    } else {
        $.post("control/iq_process.php", {
                action: "get_emp_forms",
                emp_no: emp_no,
                display: display
            },
            function(data, textStatus, jqXHR) {
                // alert(data);
                console.log(data);
                // console.log(textStatus);
                $("#tbl_emp_forms").html('');
                $("#tbl_emp_forms").html(data);
                /*$('#tbl_forms_emp').DataTable().destroy();
                $('#tbl_forms_emp').DataTable();*/
            }
        );
    }
});
</script>
<div id="mdl_forward" class="modal modal-width fade modal-scroll" data-replace="true" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="control/clerk_process.php" method="post" id="mdl_fm_forward">
        <div class="modal-header btn-orange-moon">
            <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
            <h4 class="modal-title" style="text-align:center">Forward To </h4>
        </div>
        <div class="modal-body">
            <input type="hidden" name="mdl_hd_emp_pf" id="mdl_hd_emp_pf">
            <div class="row">
                <div class="col-md-3">
                    <label for="lst_forward">Select Forward Officer</label>
                </div>
                <div class="col-md-9">
                    <select name="mdl_lst_forward" id="mdl_lst_forward" class="select2 billunitindex"
                        style="width:100%">
                        <option value="0" selected="selected " disabled="disabled">Select Employee
                        </option>
                        <?php
                        $query = "SELECT * FROM `tbl_user`";
                        $rst_emp = mysql_query($query, $db_edar);
                        while ($rw_emp = mysql_fetch_assoc($rst_emp)) {
                            // print_r($rw_emp);
                            extract($rw_emp);
                            $emp_name = get_emp_name($emp_id);
                            if (check_is_da($role)) {
                                echo "<option value='$id'>$emp_name</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label for="mdl_forward_remark">Remark: </label>
                </div>
                <div class="col-md-9">
                    <textarea name="mdl_forward_remark" class="form-control" id="mdl_forward_remark" cols="60"
                        rows="3"></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <input type="submit" value="Confirm" class="btn btn-success">
        </div>
    </form>
</div>

<!--//? : Reject Modal   -->

<div id="mdl_reject" class="modal modal-width fade modal-scroll" data-replace="true" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="control/da_process.php" method="post" id="mdl_form_reject">
        <div class="modal-header btn-orange-moon">
            <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
            <h4 class="modal-title" style="text-align:center">Rejected Form</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" name="mdl_hd_clerk_id" id="mdl_hd_clerk_id">
            <div class="row">
                <div class="col-md-3">
                    <label for="mld_reject_remark">Reject Reason: </label>
                </div>
                <div class="col-md-9">
                    <textarea name="mld_reject_remark" class="form-control" id="mld_reject_remark" cols="60"
                        rows="3"></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <input type="submit" value="Confirm" class="btn btn-success">
        </div>
    </form>
</div>



<!--//? : Accept Confirmation Modal   -->

<div id="mdl_accept" class="modal modal-width fade modal-scroll" data-replace="true" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="control/da_process.php" method="post" id="mdl_form_accept">
        <div class="modal-header btn-orange-moon">
            <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
            <h4 class="modal-title" style="text-align:center">Accept Form</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <h2 class="text-danger text-center">Are you sure?</h2>
            </div>
        </div>
        <div class="modal-footer">
            <input type="submit" value="Yes" class="btn btn-success">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </form>
</div>



<!--//? : Close Case Confirmation Modal   -->

<div id="mdl_close" class="modal modal-width fade modal-scroll" data-replace="true" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="control/da_process.php" method="post" id="mdl_form_close">
        <div class="modal-header btn-orange-moon">
            <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
            <h4 class="modal-title" style="text-align:center">Close Form</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <h2 class="text-danger text-center">Are you sure?</h2>
            </div>
        </div>
        <div class="modal-footer">
            <input type="submit" value="Yes" class="btn btn-success">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </form>
</div>