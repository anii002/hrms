<?php
$GLOBALS['flag'] = "";
include_once('../common_files/header.php');
?>
<style>
.rp-20 {
    padding-right: 25px;
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
                    <a href="#">View Employee Forms</a>
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
                                $query = "SELECT `emp_no`,`name` FROM `resgister_user`";
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
                    <!-- <div class="row pull-right rp-20">
                        <button class="btn btn-success btn-forward" data-toggle="modal"
                            data-target="#mdl_forward">Forward</button>
                    </div> -->
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
    $("#lst_emp_pf").val(emp_pf).trigger('change');
    $("#lst_emp_pf").attr("disabled", "disabled");
    // $('#lst_emp_pf').attr("readOnly", true);
});
// !set employee pf no in forward Modal
// ! get employee forms using ajax
$(document).on("change", ".get_emp_pf", function(e) {
    e.preventDefault();
    var emp_no = $("#lst_emp_pf").val();
    // alert(emp_no);
    var display = getQueryVariable("display");
    if (emp_no == '' || emp_no == null) {
        alert("Please select the employee..");
    } else {
        $.post("control/clerk_process.php", {
                action: "get_emp_forms",
                emp_no: emp_no,
                display: display
            },
            function(data, textStatus, jqXHR) {
                // alert(data);
                // console.log(data);
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