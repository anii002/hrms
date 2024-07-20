<?php
$GLOBALS['flag'] = "1.22";
include_once('../common_files/header.php');
// include_once('../common_files/sidebar.php');
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
                    <div>
                        <div class="caption col-md-6 text-right pull-right">
                            <button class=" btn btn-danger print btnhide" onclick="history.go(-1);">Back</button>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">

                    <input type="hidden" name="emp_pf" id="emp_pf" value="<?php echo $_GET['emp_pf'] ?>">
                    <input type="hidden" name="reference_id" id="reference_id" value="<?php echo $_GET['reference_id'] ?>">

                    <table class="table table-resposive table-bordered" id="example1">
                        <thead>
                            <tr>
                                <th>SR.NO</th>
                                <th>Form Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbl_emp_forms">

                        </tbody>

                    </table>

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
    // ! get employee forms using ajax
    $(document).ready(function() {
        var emp_pf = $("#emp_pf").val();
        var reference_id = $("#reference_id").val();

        if (emp_pf == '' || emp_pf == null) {
            alert("Please select the employee..");
        } else {
            $.post("control/emp_process.php", {
                    action: "get_emp_forms",
                    emp_pf: emp_pf,
                    reference_id: reference_id
                },
                function(data, textStatus, jqXHR) {
                    // alert(data);
                    //  console.log(data);
                    $('#example1').DataTable().destroy();
                    $("#tbl_emp_forms").html('');
                    $("#tbl_emp_forms").html(data);
                    $('#example1').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            'copyHtml5',
                            'excelHtml5',
                            'csvHtml5',
                            'pdfHtml5'
                        ],
                        "ordering": false

                    });
                }
            );
        }

    });
</script>