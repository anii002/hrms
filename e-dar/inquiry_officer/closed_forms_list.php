<?php
$GLOBALS['flag'] = "1.5";
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
                    <a href="#">Closed Forms List</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-book"></i> Closed Forms List
                    </div>
                </div>
                <div class="portlet-body">
                   <table class="table table-bordered table-stripped table-responsive" id="example1">
                        <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Employee Name</th>
                                <th>From DA </th>
                                <th>View Form</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php

                                //echo "SELECT tbl_form_forward.id,tbl_form_forward.form_reference_id,tbl_form_forward.emp_pf,tbl_form_forward.approved_date,tbl_form_forward.fw_from,fw_to,form_id from tbl_form_forward where tbl_form_forward.status='9' and  tbl_form_forward.current_role='3'  and form_reference_id in(SELECT form_ref_id from  tbl_form_master_entry where current_status='9' ) order by form_reference_id desc";

                                $sql=mysql_query("SELECT tbl_form_forward.id,tbl_form_forward.form_reference_id,tbl_form_forward.emp_pf,tbl_form_forward.approved_date,tbl_form_forward.fw_from,fw_to,form_id from tbl_form_forward where tbl_form_forward.status='9' and  tbl_form_forward.current_role='3' and form_reference_id in(SELECT form_ref_id from  tbl_form_master_entry where current_status='9' ) order by form_reference_id desc",$db_edar);

                                $sr=0;
                                while ($row=mysql_fetch_array($sql)) {

                                         $fw_date=$row['approved_date'];
                                        
                                        //  $current_date=date_create(date('d-m-Y'));
                                        //  $start_date = date('Y-m-d',strtotime($fw_date));
                                        //  $enddate = date_create(date('d-m-Y',strtotime('+10 days', strtotime($fw_date))));
                                        // $interval = date_diff($current_date, $enddate);
                                        
                                        

                                        $sr++;
                                        echo "<tr>";
                                        echo "<td>".$sr."</td>";
                                        echo "<td>".get_emp_name($row['emp_pf'])."</td>";

                                        echo "<td>".get_emp_name_from_id($row['fw_from'])." (".get_emp_desig_from_id($row['fw_from']).")</td>";    
                                        
                                        echo "<td><a href='view.php?emp_pf=".$row['emp_pf']."&reference_id=".$row['form_reference_id']."&type_id=1' class='btn btn-info' >View</a></td>";
                                        
                                        echo "</tr>";
                                }
                           
                            ?>
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
$(document).ready(function() {
    // alert("w");
    $("#lst_emp_pf").val('');
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
    $("#mdl_fm_forward").submit(function(e) {
        e.preventDefault();
        var postData = new FormData();
        var postData = new FormData($(this)[0]);
        postData.append("action", "forward_form");
        $.ajax({
            url: "control/clerk_process.php",
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
    // var emp_no = $("#lst_emp_pf").val();
    // // alert(emp_no);
    // // console.log(emp_no);
    // if (emp_no != '' || emp_no != null) {
    //     $(".get_emp_pf").trigger("change");
    // }


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
    var emp_no = $("#lst_emp_pf").val();
    // alert(emp_no);
    if (emp_no == '' || emp_no == null) {
        alert("Please select the employee..");
    } else {
        $.post("control/clerk_process.php", {
                action: "get_emp_forms",
                emp_no: emp_no
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

<!-- $res_fa=count(array_intersect($codes, $codes_final))>0?true:false; -->