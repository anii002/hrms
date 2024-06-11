<?php
require_once('Global_Data/header.php');
error_reporting(0);
?>
<link href="select2/select2.min.css" rel="stylesheet" />

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> Office </h3><br>
            </div>
            <!--<div class="title_right"></div>-->
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h4 class="bgshades"> Department Details </h4>
                    </div>
                    <form action="process.php?action=add_office" method="POST" class="form-horizontal">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class=""> Department</label>
                                    <select class="form-control select2" name="deptname" id="deptname" required>
                                        <option hidden readonly>Select Department</option>
                                        <?php
                                        $query = "select * from department";
                                        $resultset = mysql_query($query, $db_common);
                                        while ($result = mysql_fetch_array($resultset)) {
                                            echo "<option value='" . $result['DEPTNO'] . "'>" . $result['DEPTDESC'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                             <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                <label class="">Office Name</label>
                                    <input type="text" class="form-control" placeholder="Office Category Name"
                                        name="off_cat_name" id="off_cat_name">
                                    <!-- onkeydown="this.value=this.value.replace(/[^a-zA-Z0-9 ] /g,'');" -->
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class=""> Description</label>
                                    <input type="text" class="form-control " placeholder=" Description"
                                            name="off_cat_desc" id="off_cat_desc">
                                    <!-- onkeydown="this.value=this.value.replace(/[^a-zA-Z0-9] /g,'');" -->
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-sm-8 col-xs-12">
                            <button type="submit" class="btn btn-info source">Save</button>
                            <a href="index.php" class="btn btn-danger" data-dismiss="modal">Close</a>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <!-- <div>-->
                            <h2>Office <small>List</small><button type="button" class="pull-right btn btn-primary"
                                    id="delDesignation">Delete Designation</button></h2>
                            <hr>
                            <div class="x_content">
                                <table class="table table-striped table-bordered display" style="width:100%;">
                                    <?php
                                    $query_fire = "select * from tbl_office";
                                    $fetch_query = mysql_query($query_fire, $db_egr) or mysql_error();
                                    ?>
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Office ID</th>
                                            <th>Department Name</th>
                                            <th>Office Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $cnt = 1;
                                        while ($result = mysql_fetch_array($fetch_query)) {
                                            $dept_name = get_department($result['deptname']);
                                            // echo "<script>alert('$dept_name')</script>";
                                            echo " <tr><td><input type='checkbox' class='checkbox' id='" . $result['office_id'] . "' name='" . $result['office_id'] . "'/></td><td>" . $cnt . "</td><td>" . $dept_name . "</td><td>" . $result['office_name'] . "</td>
					<td>
					<a href='#'><i class='fa fa-pencil-square btn-edit' data-toggle='modal' data-target='#edit_office' id=" . $result['office_id'] . "></i></a>
					<a href='#'><i class='fa fa-trash btn-delete' data-toggle='modal' data-target='#delete_office_modal' id=" . $result['office_id'] . "></i></a>
                    </td></tr>";
                                            $cnt++;
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div> <!-- </div>-->
                        </div>

                        <input type="hidden" name="delete_office" id="delete_office" value="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--edit Modal -->
<div class="modal fade" id="edit_office" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Office </h4>
            </div>
            <div class="modal-body">
                <form action="process.php?action=edit_office" method="POST">
                    <input type="hidden" name="hidden_id" id="hidden_id">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-4">Department</label>
                                <div class="col-md-8">
                                    <select class="form-control" style="width:100%" id="md_off_dept" name="md_off_dept"
                                        required>
                                        <?php
                                        $query_station = "SELECT * FROM `department`";
                                        $result_station = mysql_query($query_station, $db_common);
                                        while ($value_result = mysql_fetch_array($result_station)) {
                                            echo "<option value='" . $value_result['DEPTNO'] . "'>" . $value_result['DEPTDESC'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <!-- <input type="text" class="form-control" placeholder="Office Name" name="md_off_dept"
                                        id="md_off_dept" value=""
                                        onkeydown="this.value=this.value.replace(/[^a-zA-Z0-9 ]/g,'');"> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-4">Office Name</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="Office Name" name="md_off_name"
                                        id="md_off_name" value=""
                                        onkeydown="this.value=this.value.replace(/[^a-zA-Z0-9 /]/g,'');">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top:20px;">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-4"> Description</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control " placeholder=" Description"
                                        name="md_off_desc" id="md_off_desc" value=""
                                        onkeydown="this.value=this.value.replace(/[^a-zA-Z0-9 /]/g,'');">
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="cat_update">Update</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>

    </div>
</div>
<!---------- edit modal end------------>

<!--delete Modal-->
<div class="modal fade" id="delete_office_modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form action="process.php?action=delete_office" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete Category</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="hidden_id_delete" id="hidden_id_delete">
                    <p>Do you really want to delete this records? This process cannot be undoed.</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" name="cat_update">Delete</button>
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
<script src="select2/select2.min.js"> </script>
<script>
$(document).ready(function() {
    $("#deptname").select2();
    $("#md_off_dept").select2();
});
$(".checkbox").on("click", function() {
    if ($(this).prop("checked") == true) {
        var temp = $("#delete_office").val();
        var curr = this.id;
        var final = temp + "," + curr;
        $("#delete_office").val(final);
    } else {
        var temp = this.id;
        var temp_array = $("#delete_office").val();
        $("#delete_office").val(temp_array.replace("," + temp, ''));
    }
});

$("#delDesignation").on("click", function() {
    var delete_office = $("#delete_office").val();
    $.ajax({
        type: 'POST',
        url: 'process.php',
        data: 'action=delete_office_detail&delete_office=' + delete_office,
        success: function(data) {
            alert(data);
            window.location = 'office_cat.php';
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
        data: 'action=get_office_detail&hidden=' + hidden,
        success: function(data) {
            //alert(data);
            var ddd = data;
            var arr = ddd.split('$');
            $("#md_off_name").val(arr[0]);
            $("#md_off_desc").val(arr[1]);
            $("#md_off_dept").val(arr[2]);
            $("#md_off_dept").select2();
        }
    });
});
</script>