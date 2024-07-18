<?php
require_once('Global_Data/header.php');
error_reporting(0);
include('config.php');
include('functions.php');
?>
<!-- PNotify -->
<!-- page content -->
<div class="right_col" role="main" style="background-image: url('images/small1.png');repeat:repeat;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> <i class="fa fa-recycle"></i>Designation</h3><br>
            </div>

            <div class="title_right">

            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <form action="process.php?action=add_designation" method="POST" class="form-horizontal">

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label col-md-4"> Department</label>
                                        <div class="col-md-8">
                                            <select class="form-control select2" name="deptname" id="deptname">
                                                <option selected hidden readonly>Select Department</option>
                                                <?php
                                                $query = "select * from tbl_department";
                                                $resultset = mysqli_query($db_egr,$query);
                                                while ($result = mysqli_fetch_array($resultset)) {
                                                    echo "<option value='" . $result['dept_id'] . "'>" . $result['deptname'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Designation Name</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" placeholder="Designation Name"
                                                name="des_name" id="des_name">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="text-center">
                                <button type="submit" class="btn btn-info source">Save</button>
                                <a href="index.php" class="btn btn-danger" data-dismiss="modal">Close</a>
                                <input type="hidden" name="delete_desig" id="delete_desig" value="" />
                            </div>
                        </form>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <!-- <div>-->
                            <h2>Designation <small>List</small><button type="button" class="pull-right btn btn-primary"
                                    id="delDesignation">Delete Designation</button></h2>

                            <hr>
                            <div class="x_content">
                                <div id="data">
                                    <table class="table table-striped table-bordered display" style="width:100%;">
                                        <?php

                                        $query_fire = "select * from tbl_designation";
                                        $fetch_query = mysqli_query($db_egr,$query_fire) or mysqli_error($db_egr);

                                        ?>
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Designation ID</th>
                                                <th>Designation Name</th>
                                                <th>Department Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="apply_data">
                                            <?php
                                            function get_dept($dept_id)
                                            {
                                                global $db_egr;
                                                $query_dept = "select deptname from tbl_department where dept_id='$dept_id'";
                                                $resultset_dept = mysqli_query($db_egr,$query_dept);
                                                $result_dept = mysqli_fetch_array($resultset_dept);
                                                return $result_dept['deptname'];
                                            }
                                            $cnt = 1;
                                            while ($result = mysqli_fetch_array($fetch_query)) {
                                                echo " <tr><td><input type='checkbox' class='checkbox' id='" . $result['id'] . "' name='" . $result['id'] . "'/></td><td>" . $cnt . "</td><td>" . $result['designation'] . "</td><td>" . get_dept($result['dept_id']) . "</td>
					<td>
					<a href='#' ><i class='fa fa-pencil-square btn-edit' style='font-size:20px;color:black;margin-left:20px;' data-toggle='modal' data-target='#edit_cat' id=" . $result['id'] . "></i></a>
					<a href='#'><i class='fa fa-trash btn-delete' style='font-size:20px;color:red;margin-left:10px;'  data-toggle='modal' data-target='#delete_cat' id=" . $result['id'] . "></i></a>
                    </td></tr>";
                                                $cnt++;
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="depart_value" name="depart_value" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--edit Modal -->
<div class="modal fade" id="edit_cat" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Designation</h4>
            </div>
            <div class="modal-body">
                <form action="process.php?action=edit_designation" method="POST">
                    <div class="row" style="margin-top:20px;">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-4">Department</label>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="updatedeptid" id="updatedeptid">

                                    </select>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-4">Designation Name</label>
                                <div class="col-md-8">
                                    <input type="hidden" name="hidden_id" id="hidden_id">
                                    <input type="text" class="form-control" placeholder="Category Name"
                                        name="md_des_name" id="md_des_name" value="">
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="des_update">Update</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!---------- edit modal end------------>

<!--delete Modal -->
<div class="modal fade" id="delete_cat" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete Category</h4>
            </div>
            <div class="modal-body">
                <form action="process.php?action=delete_designation" method="POST">
                    <input type="hidden" name="hidden_id_delete" id="hidden_id_delete">
                    <p>Do you really want to delete these records? This process cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" name="des_update">Delete</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>

    </div>
</div>
<!---------- edit modal end------------>

<?php
require_once('Global_Data/footer.php');
?>
<script>
$(".checkbox").on("click", function() {
    if ($(this).prop("checked") == true) {
        var temp = $("#delete_desig").val();
        var curr = this.id;
        var final = temp + "," + curr;
        $("#delete_desig").val(final);
    } else {
        var temp = this.id;
        var temp_array = $("#delete_desig").val();
        $("#delete_desig").val(temp_array.replace("," + temp, ''));
    }
});

$("#delDesignation").on("click", function() {
    var delete_desig = $("#delete_desig").val();
    $.ajax({
        type: 'POST',
        url: 'process.php',
        data: 'action=delete_designation_detail&delete_desig=' + delete_desig,
        success: function(data) {
            alert(data);
            window.location = 'designation.php';
        }
    });
});

$(document).on("click", ".btn-delete", function() {
    $("#hidden_id_delete").val($(this).attr('id'));
    //alert($("#hidden_id_delete").val());
});
$(document).on("click", ".btn-edit", function() {
    $("#hidden_id").val($(this).attr('id'));

    var hidden = $("#hidden_id").val();
    //alert(hidden);
    $.ajax({
        type: 'post',
        url: 'process.php',
        data: 'action=get_designation_detail&hidden=' + hidden,
        success: function(data) {
            //alert(data);
            var html = JSON.parse(data);
            $("#md_des_name").val(html['designation']);
            $("#updatedeptid").html(html['dept_ids']);
        }
    });
});

$("#deptname").change(function() {
    var table = $('.display').DataTable();
    var depart_value = this.value;
    $("#depart_value").val(depart_value);
    $.ajax({
        type: 'post',
        url: 'process.php',
        data: 'action=get_data_table&depart_value=' + depart_value,
        success: function(data) {
            //alert(data);
            //	table.row().remove().draw( false );
            $("#data").html(data);
            table.reload();
        }
    });
});
</script>