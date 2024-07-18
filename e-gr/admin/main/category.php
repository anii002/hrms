<?php
require_once('Global_Data/header.php');
error_reporting(0);
include('config.php');
include('functions.php')
?>
<!-- PNotify -->
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> Category</h3><br>
            </div>
            <!--<div class="title_right"></div>-->
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h4 class="bgshades"> Category Details: </h4>
                    </div>
                    <form action="process.php?action=add_category" method="POST" class="form-horizontal">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="">Category Name</label>
                                    <input type="text" class="form-control" placeholder="Category Name"
                                            name="cat_name" id="cat_name">
                                        <!--   onkeydown="this.value=this.value.replace(/[^a-zA-Z0-9 ]/g,'');" -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class=""> Description</label>
                                    <input type="text" class="form-control " placeholder=" Description"
                                            name="cat_desc" id="cat_desc">
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
                            <h2>Category <small>List</small></h2>
                            <hr>
                            <div class="x_content">
                                <table class="table table-striped table-bordered display" style="width:100%;">
                                    <?php
                                    $query_fire = "select * from category";
                                    $fetch_query = mysqli_query($db_egr,$query_fire) or mysqli_error($db_egr);

                                    ?>
                                    <thead>
                                        <tr>
                                            <th>Category ID</th>
                                            <th>Category Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($result = mysqli_fetch_array($fetch_query)) {
                                            echo " <tr><td>" . $result['cat_id'] . "</td><td>" . $result['cat_name'] . "</td><td>" . $result['cat_desc'] . "</td>
					<td>
					<a href='#'><i class='fa fa-pencil-square btn-edit' style='font-size:20px;color:black;margin-left:20px;' data-toggle='modal' data-target='#edit_cat' id=" . $result['cat_id'] . "></i></a>
					<a href='#'><i class='fa fa-trash btn-delete' style='font-size:20px;color:red;margin-left:10px;' data-toggle='modal' data-target='#delete_cat' id=" . $result['cat_id'] . "></i></a>
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
                <h4 class="modal-title">Update Category</h4>
            </div>
            <div class="modal-body">
                <form action="process.php?action=edit_category" method="POST">
                    <input type="hidden" name="hidden_id" id="hidden_id">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-4">Category Name</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="Category Name"
                                        name="md_cat_name" id="md_cat_name" value=""
                                        onkeydown="this.value=this.value.replace(/[^a-zA-Z0-9 ]/g,'');">
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
                                        name="md_cat_desc" id="md_cat_desc" value=""
                                        onkeydown="this.value=this.value.replace(/[^a-zA-Z0-9 ]/g,'');">
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
<div class="modal fade" id="delete_cat" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form action="process.php?action=delete_category" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete Category</h4>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="hidden_id_delete" id="hidden_id_delete">
                    <p>Do you really want to delete this record? This process cannot be undone.</p>
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
        data: 'action=get_category_detail&hidden=' + hidden,
        success: function(data) {
            //alert(data);
            var ddd = data;
            var arr = ddd.split('$');
            $("#md_cat_name").val(arr[0]);
            $("#md_cat_desc").val(arr[1]);
        }
    });
});
</script>