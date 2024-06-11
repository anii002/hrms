<?php
$GLOBALS['flag'] = "1.8";
include_once('../common_files/header.php');
// include_once('../common_files/sidebar_admin.php');
?>
<style type="text/css">
.updateModal {
    width: 805px !important;
    /* margin-left: 0px !important; */
    /* width: 100% !important; */
    left: 38% !important;
    right: 50% !important;
}
</style>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.php">Home </a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Master Penalty Type</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-book"></i> Add Master Penalty type
                    </div>
                </div>
                <div class="portlet-body form">
                    <form method="post" action="" autocomplete="off">
                        <div class="form-body">
                            <!-- <h3 class="form-section">Add User</h3> -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Penalty Name</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fas  fa-user"></i>
                                            </span>
                                            <input type="text" class="form-control" id="p_name" name="p_name"
                                                placeholder="Enter Penalty Name" required>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="form-actions left">
                            <button type="button" class="btn blue add_ptype"><i class="fa fa-check"></i>
                                Submit</button>&nbsp;
                            <button type="button" class="btn default">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-book"></i>Master Forms List
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="form-body">
                        <table class="table table-bordered table-hover" id="example1">
                            <thead>
                                <tr>
                                    <th>SR No</th>
                                    <th>Penalty Name</th>
                                    <!-- <th></th> -->
                                    <!-- <th>Penalty Type</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
								$query_frm = "SELECT * from tbl_penality_type";
								$result_frm = mysql_query($query_frm, $db_edar);
								$sr = 1;
								while ($value_frm = mysql_fetch_array($result_frm)) {
									echo "
										<tr>
										<td>" . $sr++ . "</td>
										<td>" . $value_frm['penality_name'] . "</td>
										
										";
									//echo "<a target='_blank'  id='".$value_emp['uploaded_file_path']."' value='".$value_emp['uploaded_file_path']."'>'".$value_emp['uploaded_file_path']."'</a>";
									echo "<td><button value='" . $value_frm['id'] . "'  p-type='" . $value_frm['penality_name'] . "' class='btn btn-info fetchid' data-target='#responsive' data-toggle='modal' style='margin-left:10px;'>Update</button>";
									echo "<button value='" . $value_frm['id'] . "' class='btn btn-danger remove' style='margin-left:10px;'>Remove</button></td>";
									echo "</tr>
								";
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
    <!-- END CONTENT -->
    <?php
	include_once('../common_files/footer.php');
	?>
    <div id="responsive" class="modal fade modal-scroll updateModal" tabindex="-1" data-replace="true">
        <div class="modal-header btn-orange-moon">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Update Penalty Data : </h4>
        </div>
        <form action="control/adminProcess.php?action=updatePType" method="post" enctype="multipart/form-data"
            autocomplete="off" class="horizontal-form">
            <div class="modal-body">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <input type="hidden" id="frm_id" name="frm_id">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Penalty Name</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fas  fa-user"></i>
                                        </span>
                                        <input type="text" class="form-control" id="u_p_name" name="u_p_name" required>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                    <!--/row-->
                </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" data-dismiss="modal" class="btn btn-default">Close</button> -->
                <button type="submit" style="float:left" class="btn blue">Update</button>
            </div>
        </form>
    </div>

    <script>
    $(document).on("click", ".remove", function() {
        var value = $(this).attr("value");
        var result = confirm("Confirm!!! Proceed for Remove?");
        if (result == true) {
            //alert(value);
            $.ajax({
                url: 'control/adminProcess.php',
                type: 'POST',
                data: "action=removePType&id=" + value,
                success: function(data) {
                    //alert(data);
                    if (data == 1) {
                        alert("Removed Successfully");
                        window.location = "master_penalty_type.php";
                    }
                    //
                    else {
                        alert("Failed To Remove");
                    }
                }
            });
        }
    });
    //Adding form master
    $(document).on("click", ".add_ptype", function() {
        var p_name = $("#p_name").val();

        if (p_name == "") {
            alert("Enter Penalty name....");
            $("#p_name").focus();
        } else {
            //alert(value);
            $.ajax({
                url: 'control/adminProcess.php',
                type: 'POST',
                data: "action=add_PType&p_name=" + p_name,
                success: function(data) {
                    // alert(data);
                    // console.log(data);
                    if (data == 1) {
                        alert("Penalty type added successfully....");
                        window.location = "master_penalty_type.php";
                    }
                    //
                    else {
                        alert("Failed To add form!!!");
                    }
                }
            });
        }
    });
    $(document).on("click", ".fetchid", function() {
        var value = $(this).attr("value");
        var ptype = $(this).attr("p-type");

        //alert(src_name);
        $("#frm_id").val(value);
        $("#u_p_name").val(ptype);



    });
    </script>