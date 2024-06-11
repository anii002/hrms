<?php
$GLOBALS['flag'] = "1.3";
include_once('../common_files/header.php');
// include_once('../common_files/sidebar.php');
?>

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
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="lst_emp_pf">Please Select the Employee</label>
                        </div>
                        <div class="col-md-6">
                            <select name="lst_emp_pf" id="lst_emp_pf" class="select2 get_emp_pf" style="width:100%">
                                <option value="0" selected="selected" disabled="disabled">Select Employee</option>
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
                    <div class="row">
                        <div class="col-md-3">
                            <h4>Forms Details</h4>
                        </div>
                        <div class="col-md-9 ">
                            <button class="btn btn-success" id="btn_add_form">Add Forms</button>
                            <button class="btn btn-success" id="btn_add_ack">Add Acknowledgment</button>
                            <button class="btn btn-success" id="btn_add_speaking_order">Add Speaking Order</button>
                            <button class="btn btn-success" id="btn_add_office_note">Add Office Note</button>
                        </div>
                    </div>
                    <hr>

                    <table class="table table-resposive table-bordered">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Form Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbl_emp_forms">
                            <tr>
                                
                            </tr>
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
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php
include_once('../common_files/footer.php');
?>
<script>
$(document).ready(function() {
    // alert("w");
    $("#lst_emp_pf").select2("destroy").select2({
        minimumInputLength: 2,
    });
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
    var emp_no=$("#lst_emp_pf").val();
        if(emp_no!='')
        {
            $(".get_emp_pf").trigger("change");
        }

});
$(document).on("change",".get_emp_pf",function(){
    var emp_no=$(this).val();
    //alert(emp_no);
    if(emp_no=='')
    {
        alert("Please select the employee..");
    }
    else
    {
        $.ajax({
            method:"post",
            url:"control/clerk_process.php",
            data:"action=get_emp_forms&emp_no="+emp_no,
            success:function(data){
                //alert(data);
                console.log(data);
                $("#tbl_emp_forms").html(data);

            }

        });
    }
});
</script>