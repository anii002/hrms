<?php
require_once('Global_Data/header.php');
error_reporting(0);
include('config.php');
?>
<!-- PNotify -->
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> Section</h3><br>
            </div>
            <!--<div class="title_right"></div>-->
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h4 class="bgshades"> Section Details </h4>
                    </div>
                    <form action="process.php?action=add_section" method="POST" class="form-horizontal">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="">Section Name</label>
                                    <input type="text" class="form-control" placeholder="Section Name" name="sec_name" id="sec_name" onkeydown="this.value=this.value.replace(/[^a-zA-Z0-9 /()]/g,'');" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class=""> Description</label>
                                    <input type="text" class="form-control " placeholder=" Description" name="sec_desc" id="sec_desc" onkeydown="this.value=this.value.replace(/[^a-zA-Z0-9 /()]/g,'');" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="">Is Branch Admin Section</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="radio" name="is_BA_section" id="is_BA_section1" value='1'>
                                            <label for="is_BA_section1">Yes</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="radio" name="is_BA_section" id="is_BA_section2" checked="checked" value='0'>
                                            <label for="is_BA_section2">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info source">Save</button>
                            <a href="index.php" class="btn btn-danger" data-dismiss="modal">Close</a>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <!-- <div>-->
                            <h2>Section <small>List</small></h2>
                            <hr>
                            <div class="x_content">
                                <table class="table table-striped table-bordered display" style="width:100%;">
                                    <?php
                                    $query_fire = "select * from tbl_section";
                                    $fetch_query = mysqli_query($db_egr,$query_fire) or mysqli_error($db_egr);
                                    ?>
                                    <thead>
                                        <tr>
                                            <th>Section ID</th>
                                            <th>Section Name</th>
                                            <th>Description</th>
                                            <th>Is Branch Admin Section</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($result = mysqli_fetch_array($fetch_query)) {
                                            $is_BA_section = ($result['is_branch_admin'] > 0) ? "Yes" : "No";
                                            echo " <tr><td>" . $result['sec_id'] . "</td><td>" . $result['sec_name'] . "</td><td>" . $result['sec_desc'] . "</td><td>" . $is_BA_section  . "</td>
					<td>
					<a href='#' ><i class='fa fa-pencil-square btn-edit' style='font-size:20px;color:black;margin-left:20px;' data-toggle='modal' data-target='#edit_cat' id=" . $result['sec_id'] . "></i></a>
					<a href='#'><i class='fa fa-trash btn-delete' style='font-size:20px;color:red;margin-left:10px;'  data-toggle='modal' data-target='#delete_cat' id=" . $result['sec_id'] . "></i></a>
					</td></tr>";
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div> <!-- </div>-->
                        </div>
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
                <h4 class="modal-title">Update Section</h4>
            </div>
            <div class="modal-body">
                <form action="process.php?action=edit_section" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-4">Section Name</label>
                                <div class="col-md-8">
                                    <input type="hidden" name="hidden_id" id="hidden_id">
                                    <input type="text" class="form-control" placeholder="Section Name" name="md_sec_name" id="md_sec_name" onkeydown="this.value=this.value.replace(/[^a-zA-Z0-9 /]/g,'');" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top:20px;">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-4">Description</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control " placeholder=" Description" name="md_sec_desc" id="md_sec_desc" onkeydown="this.value=this.value.replace(/[^a-zA-Z0-9 /]/g,'');" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-4"> Is Branch Admin Section</label>
                                <div class="col-md-8">
                                    <div class="col-md-2">
                                        <input type="radio" name="md_is_BA_section" id="md_is_BA_section1" value='1'>
                                        <label for="md_is_BA_section1">Yes</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="radio" name="md_is_BA_section" id="md_is_BA_section2" checked="checked" value='0'>
                                        <label for="md_is_BA_section2">No</label>
                                    </div>
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
                <h4 class="modal-title">Delete Section</h4>
            </div>
            <div class="modal-body">
                <form action="process.php?action=delete_section" method="POST">
                    <input type="hidden" name="hidden_id_delete" id="hidden_id_delete">
                    <p>Do you really want to delete this record? This process cannot be undone.</p>
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
            data: 'action=get_section_detail&hidden=' + hidden,
            success: function(data) {
                // alert(data);
                var ddd = data;
                var arr = ddd.split('$');
                $("#md_sec_name").val(arr[0]);
                $("#md_sec_desc").val(arr[1]);
                if (arr[2] != 0) {
                    // $("input[name=cols][value=" + value + "]").attr('checked', 'checked');
                    $("input[name=md_is_BA_section][value=" + arr[2] + "]").attr('checked', 'checked');
                }
            }
        });
    });
</script>