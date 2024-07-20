<?php
$GLOBALS['flag'] = "1.2";
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
                    <a href="#">Pending Forms List</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-book"></i> Pending Forms List
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-bordered table-stripped table-responsive" id="example1">
                        <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Employee Name</th>
                                <th>From </th>
                                <th>View Form</th>
                                <th>Days Left</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                

                                $sql=mysqli_query($db_edar,"SELECT tbl_form_forward.id,tbl_form_forward.form_reference_id,tbl_form_forward.emp_pf,tbl_form_forward.approved_date,tbl_form_forward.fw_from,fw_to,form_id from tbl_form_forward where tbl_form_forward.status='3' and  tbl_form_forward.current_role='3' and ack_id is NULL  and fw_to='".$_SESSION['emp_id']."' and form_reference_id in(SELECT form_ref_id from  tbl_form_master_entry where emp_pf='".$_SESSION
                                    ['emp_id']."' and current_status='3' ) order by form_reference_id desc");

                                $sr=0;
                                while ($row=mysqli_fetch_array($sql)) 
                                {

                                    $fw_date=$row['approved_date'];
                                    $current_date=date_create(date('d-m-Y'));
                                    //$start_date = date('Y-m-d',strtotime($fw_date));
                                    $enddate = date_create(date('d-m-Y',strtotime('+10 days', strtotime($fw_date))));
                                    $interval = date_diff($current_date, $enddate);
                                    //var_dump($enddate);    
                                    $sr++;
                                    echo "<tr>";
                                    echo "<td>".$sr."</td>";
                                    echo "<td>".get_emp_name($row['emp_pf'])."</td>";

                                    echo "<td>".get_emp_name_from_id($row['fw_from'])." (".get_emp_desig_from_id($row['fw_from']).")</td>";    
                                        

                                    $ackmt_tbl=mysqli_query($db_edar,"SELECT id,type_name,created_date,status from tbl_ack_sorder where form_reference_id='".$row['form_reference_id']."' and emp_id='".$_SESSION['emp_id']."'");

                                    $fetch_ack=mysqli_fetch_array($ackmt_tbl);

                                    

                                    

                                    if(mysqli_num_rows($ackmt_tbl)==0)
                                    {
                                        if(($interval->format('%R%a days'))!="0 days")
                                        {
                                            
                                            
                                                echo "<td><a href='add_ackmt.php?emp_pf=".$row['emp_pf']."&reference_id=".$row['form_reference_id']."&type_id=1' class='btn btn-info' >Add Ackmt</a>&nbsp;&nbsp;
                                                    <a href='view.php?emp_pf=".$row['emp_pf']."&reference_id=".$row['form_reference_id']."&type_id=1' class='btn btn-info' >View</a>
                                                </td>";
                                                echo "<td class='text-danger'>".$interval->format('%a days')."</td>";
                                            
                                        }
                                        else 
                                        {

                                            echo "<td><a href='add_ackmt.php?emp_pf=".$row['emp_pf']."&reference_id=".$row['form_reference_id']."&type_id=1' class='btn btn-info' disabled>Add Ackmt</a>&nbsp;&nbsp;
                                                    <a href='view.php?emp_pf=".$row['emp_pf']."&reference_id=".$row['form_reference_id']."&type_id=1' class='btn btn-info' >View</a>
                                                </td>";
                                                echo "<td class='text-danger'>".$interval->format('%a days')."</td>";

                                        }
                                        $fw_date1=$fetch_ack['created_date'];
                                    $current_date1=date_create(date('d-m-Y'));

                                    $enddate1 = date_create(date('d-m-Y',strtotime('+10 days', strtotime($fw_date1))));
                                    $expl_interval = date_diff($current_date1, $enddate1);
                                        if(($expl_interval->format('%R%a days'))=="0 days")
                                        {
                                            

                                            // if(($expl_interval->format('%R%a days'))=="0 days")
                                            // {
                                        
                                        
                                            echo "<td><a href='add_ackmt.php?emp_pf=".$row['emp_pf']."&reference_id=".$row['form_reference_id']."&type_id=2' class='btn btn-info' disabled>Add Explanation</a>&nbsp;&nbsp;
                                                <a href='view.php?emp_pf=".$row['emp_pf']."&reference_id=".$row['form_reference_id']."&type_id=1' class='btn btn-info' >View</a>
                                            </td>";

                                             echo "<td class='text-danger'>".$expl_interval->format('%a days')."</td>";
                                        }
                                            //}
                                            else
                                            {
                                             echo "<td><a href='add_ackmt.php?emp_pf=".$row['emp_pf']."&reference_id=".$row['form_reference_id']."&type_id=2' class='btn btn-info' >Add Explanation</a>&nbsp;&nbsp;
                                                <a href='view.php?emp_pf=".$row['emp_pf']."&reference_id=".$row['form_reference_id']."&type_id=1' class='btn btn-info' >View</a>
                                            </td>";

                                             echo "<td class='text-danger'>".$expl_interval->format('%a days')."</td>";

                                            }
                                        //}


                                    }
                                    else 
                                    {
                                        if(($expl_interval->format('%R%a days'))=="0 days")
                                        {
                                            echo "<td><a href='#mdl_forward' data-toggle='modal'  emp_pf='".$row['emp_pf']."' reference_id='".$row['form_reference_id']."' officer_id='".$row['fw_from']."' ack_id='".$fetch_ack['id']."' tbl_fw_id='".$row['id']."' form_id='".$row['form_id']."' class='btn btn-info getdata' disabled>Forward</a>&nbsp;&nbsp;
                                                <a href='view.php?emp_pf=".$row['emp_pf']."&reference_id=".$row['form_reference_id']."&type_id=1' class='btn btn-info' >View</a>
                                            </td>";

                                         echo "<td class='text-danger'>".$expl_interval->format('%a days')."</td>";

                                        }
                                        else
                                        {
                                            echo "<td><a href='#mdl_forward' data-toggle='modal'  emp_pf='".$row['emp_pf']."' reference_id='".$row['form_reference_id']."' officer_id='".$row['fw_from']."' ack_id='".$fetch_ack['id']."' tbl_fw_id='".$row['id']."' form_id='".$row['form_id']."' class='btn btn-info getdata' >Forward</a>&nbsp;&nbsp;
                                            <a href='view.php?emp_pf=".$row['emp_pf']."&reference_id=".$row['form_reference_id']."&type_id=1' class='btn btn-info' >View</a>
                                            </td>";

                                            echo "<td class='text-danger'>".$expl_interval->format('%a days')."</td>";
                                        }
                                    
                                    
                                         
                                    
                                    }
                                    

                                    

                                        //echo "<td class='text-danger'>".$interval->format('%R%a days')."</td>";
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

$(document).on("click",".getdata",function(){
        var emp_id=$(this).attr("emp_pf");
        var tbl_fw_id=$(this).attr("tbl_fw_id");
        var form_id=$(this).attr("form_id");
        var ref_id=$(this).attr("reference_id");
        var officer_id=$(this).attr("officer_id");
        var ack_id=$(this).attr("ack_id");

        $("#mdl_hd_emp_pf").val(emp_id);
        $("#mdl_hd_tbl_fw_id").val(tbl_fw_id);
        $("#mdl_hd_form_id").val(form_id);
        $("#mdl_hd_ack_id").val(ack_id);
        $("#mdl_hd_ref_id").val(ref_id);
        $("#original_fw_to").val(officer_id);
        $("#mdl_fw").val(officer_id).trigger("change");
        $("#mdl_fw").attr('disabled',true);
        
});

$(document).ready(function() {
    
    
    $("#mdl_fm_forward").submit(function(e) {
        e.preventDefault();
        var postData = new FormData();
        var postData = new FormData($(this)[0]);
        postData.append("action", "forward_ackmt_to_da");
        $.ajax({
            url: "control/emp_process.php",
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
                    alert("Forwarded Successfully");
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



</script>

<div id="mdl_forward" class="modal modal-width fade modal-scroll" data-replace="true" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="control/emp_process.php" method="post" id="mdl_fm_forward">
        <div class="modal-header btn-orange-moon">
            <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
            <h4 class="modal-title" style="text-align:center">Forward To </h4>
        </div>
        <div class="modal-body">
            <input type="text" name="mdl_hd_emp_pf" id="mdl_hd_emp_pf">
            <input type="text" name="mdl_hd_ref_id" id="mdl_hd_ref_id">
            <input type="text" name="mdl_hd_ack_id" id="mdl_hd_ack_id">
            <input type="text" name="mdl_hd_form_id" id="mdl_hd_form_id">
            <input type="text" name="mdl_hd_tbl_fw_id" id="mdl_hd_tbl_fw_id">
            <div class="row">
                <div class="col-md-3">
                    <label for="lst_forward">Forward Officer Name</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="original_fw_to" id="original_fw_to">
                    <select name="mdl_fw" id="mdl_fw" class="select2 billunitindex"
                        style="width:100%">
                        <option value="0" selected="selected " disabled="disabled">Select Employee
                        </option>
                        <?php
                        $query = "SELECT * FROM `tbl_user`";
                        $rst_emp = mysqli_query($db_edar,$query);
                        while ($rw_emp = mysqli_fetch_assoc($rst_emp)) {
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