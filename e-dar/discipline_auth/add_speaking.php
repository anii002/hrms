<?php
$GLOBALS['flag'] = "1.2";
include_once('../common_files/header.php');
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
                    <a href="#.">Add Speaking Order</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-book"></i> Add Speaking Order
                    </div>
                </div>
                <div class="portlet-body">

                    <form id="frm_add_form" method="POST">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="hidden" name="txt_emp_pf" id="txt_emp_pf" value="<?php echo $_GET['emp_pf']; ?>">
                                    <p>Employee Name</p>
                                </div>
                                <div class="col-md-3">
                                    <p><?php echo get_emp_name($_GET['emp_pf']); ?></p>
                                </div>
                                <div class="col-md-3">
                                    <p>Employee Designation</p>
                                </div>
                                <div class="col-md-3">
                                    <p><?php echo get_emp_designation($_GET['emp_pf']); ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="hidden" name="txt_reference_id" id="txt_reference_id" value="<?php echo get_emp_ref($_GET['emp_pf']); ?>">
                                    <input type="hidden" name="type_id" id="type_id" value="3">

                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-md-11">
                                    <div id="summernote"></div>
                                </div>
                            </div>
                        </div><br>
                        <div class="form-actions left">
                            <button type="button" class="btn blue submit_btn" id='submit_btn' name='button'><i class="fa fa-check"></i> Submit</button>&nbsp;
                            <button type="button" onclick="$('#summernote').summernote('reset');" class="btn default">Reset</button>

                        </div>


                    </form>

                </div>
            </div>
        </div>
        <!-- END DASHBOARD STATS -->
        <div class="clearfix">
        </div>
    </div>
</div>
<!-- END CONTENT -->
</div>


<?php
include_once('../common_files/footer.php');
?>
<script type="text/javascript">
    $(document).on("click", ".submit_btn", function() {
        var pf = $("#txt_emp_pf").val();
        var ref = $("#txt_reference_id").val();
        var type_id = $("#type_id").val();
        var desc_note = encodeURIComponent($('#summernote').summernote('code'));
        //alert(pf+" "+desc_note);
        console.log(desc_note);
        if ($('#summernote').summernote('isEmpty')) {
            alert('editor content is empty');
            $('#summernote').summernote('focus');
        } else {
            $.ajax({
                method: "post",
                url: "control/da_process.php",
                data: "action=add_speaking_order&empid=" + pf + "&ref=" + ref + "&type_id=" + type_id +
                    "&desc_note=" + desc_note,
                success: function(data) {
                    //alert(data);
                    console.log(data);
                    if (data == 1) {
                        alert("Successfully added....");
                        window.location = "accepted_forms_list.php";

                    } else {
                        alert("Failed to add.!!!");
                        window.location = "accepted_forms_list.php";
                    }
                }
            })

        }
    });
</script>