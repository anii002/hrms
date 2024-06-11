<?php
$GLOBALS['flag'] = "1.22";
include_once('../common_files/header.php');
// include_once('../common_files/sidebar.php');
?>
<style>
.rp-20 {
    padding-right: 25px;
}

a.disabled {
    pointer-events: none;
    cursor: default;
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
                    <div class="row">
                        <div class="col-md-3">
                            <h4>Forms Details</h4>
                        </div>
                        <div class="col-md-9 ">
                            <?php
                            //echo "SELECT tbl_note.id,tbl_note.type_of_note,tbl_form_master_entry.current_status from tbl_note,tbl_form_master_entry where tbl_note.form_reference_id=tbl_form_master_entry.form_ref_id and tbl_note.emp_pf='".$_GET['emp_pf']."' and tbl_note.form_reference_id='".$_GET['reference_id']."'";

                            $sql = mysql_query("SELECT tbl_note.id,tbl_note.type_of_note,tbl_form_master_entry.current_status from tbl_note,tbl_form_master_entry where tbl_note.form_reference_id=tbl_form_master_entry.form_ref_id and tbl_note.emp_pf='" . $_GET['emp_pf'] . "' and tbl_note.form_reference_id='" . $_GET['reference_id'] . "' ", $db_edar);
                            while ($fetch = mysql_fetch_array($sql)) {
                                //print_r($fetch);
                                $tt = $fetch['type_of_note'];
                            }
                            if (mysql_num_rows($sql) == 0) {
                                echo "<td><a href='add_note.php?emp_pf=" . $_GET['emp_pf'] . "&reference_id=" . $_GET['reference_id'] . "&type_id=1' class='btn btn-success  ' >Add Preliminary Note</a></td>";
                                echo "<td><a href='add_note.php?emp_pf=" . $_GET['emp_pf'] . "&reference_id=" . $_GET['reference_id'] . "&type_id=2' class='btn btn-success ' >Add Regular</a></td>";
                            } else if ($tt == '1') {

                                echo "<td><a href='add_note.php?emp_pf=" . $_GET['emp_pf'] . "&reference_id=" . $_GET['reference_id'] . "&type_id=1' class='btn btn-success disabled' >Add Preliminary Note</a></td>";
                                echo "<td><a href='add_note.php?emp_pf=" . $_GET['emp_pf'] . "&reference_id=" . $_GET['reference_id'] . "&type_id=2' class='btn btn-success' >Add Regular Note</a></td>";
                            } else if ($tt == '2' && $fetch['current_status'] == '7') {
                                echo "<td><a href='add_note.php?emp_pf=" . $_GET['emp_pf'] . "&reference_id=" . $_GET['reference_id'] . "&type_id=1' class='btn btn-success disabled ' >Add Preliminary Note</a></td>";
                                echo "<td><a href='add_note.php?emp_pf=" . $_GET['emp_pf'] . "&reference_id=" . $_GET['reference_id'] . "&type_id=2' class='btn btn-success disabled' >Add Regular</a></td>";
                                echo "<td><a href='#mdl_forward' data-toggle='modal' class='btn btn-success' >Forward</a></td>";
                            }

                            // else if($fetch['current_status']=='8' )
                            // {
                            //     echo "<td><a href='add_note.php?emp_pf=".$_GET['emp_pf']."&reference_id=".$_GET['reference_id']."&type_id=1' class='btn btn-success disabled ' >Add Preliminary Note</a></td>";
                            //     echo "<td><a href='add_note.php?emp_pf=".$_GET['emp_pf']."&reference_id=".$_GET['reference_id']."&type_id=2' class='btn btn-success disabled' >Add Regular</a></td>";
                            //     echo "<td><a href='#mdl_forward' data-toggle='modal' class='btn btn-success disabled' >Forward</a></td>";

                            // }
                            else {
                                $sql = mysql_query("SELECT * from tbl_form_forward where emp_pf='" . $_GET['emp_pf'] . "' and form_reference_id='" . $_GET['reference_id'] . "' order by id desc ", $db_edar);
                                $sql_ff = mysql_fetch_array($sql);
                                //print_r($sql_ff);
                                if ($sql_ff['status'] == '8') {
                                    echo "<td><a href='add_note.php?emp_pf=" . $_GET['emp_pf'] . "&reference_id=" . $_GET['reference_id'] . "&type_id=1' class='btn btn-success disabled ' >Add Preliminary Note</a></td>";
                                    echo "<td><a href='add_note.php?emp_pf=" . $_GET['emp_pf'] . "&reference_id=" . $_GET['reference_id'] . "&type_id=2' class='btn btn-success disabled' >Add Regular</a></td>";
                                    echo "<td><a href='#mdl_forward' data-toggle='modal' class='btn btn-success disabled' >Forward</a></td>";
                                } else {
                                    echo "<td><a href='add_note.php?emp_pf=" . $_GET['emp_pf'] . "&reference_id=" . $_GET['reference_id'] . "&type_id=1' class='btn btn-success disabled ' >Add Preliminary Note</a></td>";
                                    echo "<td><a href='add_note.php?emp_pf=" . $_GET['emp_pf'] . "&reference_id=" . $_GET['reference_id'] . "&type_id=2' class='btn btn-success disabled' >Add Regular</a></td>";
                                    echo "<td><a href='#mdl_forward' data-toggle='modal' class='btn btn-success' >Forward</a></td>";
                                }
                            }


                            ?>


                        </div>
                    </div>
                    <hr>

                    <input type="hidden" name="emp_pf" id="emp_pf" value="<?php echo $_GET['emp_pf'] ?>">
                    <input type="hidden" name="reference_id" id="reference_id"
                        value="<?php echo $_GET['reference_id'] ?>">
                    <input type="hidden" name="form_id" id="form_id" value="<?php echo $_GET['form_id'] ?>">
                    <input type="hidden" name="id" id="id" value="<?php echo $_GET['id'] ?>">
                    <input type="hidden" name="fw_to" id="fw_to" value="<?php echo $_GET['fw_to'] ?>">

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

<div id="mdl_forward" class="modal modal-width fade modal-scroll" data-replace="true" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="control/io_process.php" method="post" id="mdl_fm_forward">
        <div class="modal-header btn-orange-moon">
            <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
            <h4 class="modal-title" style="text-align:center">Forward To </h4>
        </div>
        <div class="modal-body">
            <input type="hidden" name="mdl_hd_emp_pf" id="mdl_hd_emp_pf">
            <input type="hidden" name="mdl_hd_ref_id" id="mdl_hd_ref_id">
            <!-- <input type="hidden" name="mdl_hd_ack_id" id="mdl_hd_ack_id"> -->
            <input type="hidden" name="mdl_hd_form_id" id="mdl_hd_form_id">
            <input type="hidden" name="mdl_hd_tbl_fw_id" id="mdl_hd_tbl_fw_id">
            <div class="row">
                <div class="col-md-3">
                    <label for="lst_forward">Forward Officer Name</label>
                </div>
                <div class="col-md-9">
                    <input type="hidden" name="original_fw_to" id="original_fw_to">
                    <select name="mdl_fw" id="mdl_fw" class="select2 billunitindex" style="width:100%">
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


<script>
$(document).ready(function() {


    var emp_id = $("#emp_pf").val();
    var tbl_fw_id = $("#id").val();
    var form_id = $("#form_id").val();
    var ref_id = $("#reference_id").val();
    var officer_id = $("#fw_to").val();


    $("#mdl_hd_emp_pf").val(emp_id);
    $("#mdl_hd_tbl_fw_id").val(tbl_fw_id);
    $("#mdl_hd_form_id").val(form_id);

    $("#mdl_hd_ref_id").val(ref_id);
    $("#original_fw_to").val(officer_id);
    $("#mdl_fw").val(officer_id).trigger("change");
    $("#mdl_fw").attr('disabled', true);


    $("#mdl_fm_forward").submit(function(e) {
        e.preventDefault();
        var postData = new FormData();
        var postData = new FormData($(this)[0]);
        postData.append("action", "forward_io_to_da");
        $.ajax({
            url: "control/io_process.php",
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
                        window.location = 'pending_froms.php';
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



});



// ! get employee forms using ajax
$(document).ready(function() {
    var emp_pf = $("#emp_pf").val();
    var reference_id = $("#reference_id").val();

    if (emp_pf == '' || emp_pf == null) {
        alert("Please select the employee..");
    } else {
        $.post("control/io_process.php", {
                action: "get_emp_forms",
                emp_pf: emp_pf,
                reference_id: reference_id
            },
            function(data, textStatus, jqXHR) {
                // alert(data);
                console.log(data);
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