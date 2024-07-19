<?php
$GLOBALS['flag'] = "1.2";
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
                    <a href="#">Master Forms</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-book"></i> Add Master Forms
                    </div>
                </div>
                <div class="portlet-body form">
                    <form method="post" action="" autocomplete="off">
                        <div class="form-body">
                            <!-- <h3 class="form-section">Add User</h3> -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Form Name</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fas  fa-user"></i>
                                            </span>
                                            <input type="text" class="form-control" id="form_name" name="form_name" placeholder="Enter Form Name" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Form Title</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                            <textarea class="form-control" id="form_title" name="form_title" required></textarea>
                                            <!-- <input type="text" class="form-control" id="gist_letter" name="gist_letter" placeholder="Enter Gist of letter"> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Penalty Type</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fas  fa-user"></i>
                                            </span>
                                            <select name="penality_type" id="penality_type" class="select2me form-control billunitindex" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                                <option value="0" selected>--Select Penalty Type--</option>

                                                <?php
                                                $query_form = mysqli_query($db_edar,"SELECT * from tbl_penality_type");
                                                while ($value_form = mysqli_fetch_array($query_form)) {
                                                    echo "<option value='" . $value_form['id'] . "'>" . $value_form['penality_name'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <!--/span-->
                            </div>
                        </div>
                        <div class="form-actions left">
                            <button type="button" class="btn blue add_form"><i class="fa fa-check"></i>
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
                                    <th>Form Name</th>
                                    <th>Form Title</th>
                                    <th>Penalty Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query_frm = "SELECT * from tbl_master_form";
                                $result_frm = mysqli_query($db_edar,$query_frm);
                                $sr = 1;
                                while ($value_frm = mysqli_fetch_array($result_frm)) {
                                    echo "
										<tr>
										<td>" . $sr++ . "</td>
										<td>" . $value_frm['form_name'] . "</td>
										<td>" . $value_frm['form_title'] . "</td>
										<td>" . getPenalyType($value_frm['form_type']) . "</td>

										";
                                    //echo "<a target='_blank'  id='".$value_emp['uploaded_file_path']."' value='".$value_emp['uploaded_file_path']."'>'".$value_emp['uploaded_file_path']."'</a>";
                                    echo "<td><button value='" . $value_frm['id'] . "' form-name='" . $value_frm['form_name'] . "' form-title='" . $value_frm['form_title'] . "' form-type='" . $value_frm['form_type'] . "' class='btn btn-info fetchid' data-target='#responsive' data-toggle='modal' style='margin-left:10px;'>Update</button>";
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
            <h4 class="modal-title">Update Form Data : <span id="name1" name="name1"></span> </h4>
        </div>
        <form action="control/adminProcess.php?action=updateMasterForm" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
            <div class="modal-body">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <input type="hidden" id="frm_id" name="frm_id">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Form Name</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fas  fa-user"></i>
                                        </span>
                                        <input type="text" class="form-control" id="u_form_name" name="u_form_name" placeholder="Enter Form Name" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Form Title</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                        <textarea rows="3" class="form-control" id="u_form_title" name="u_form_title" required></textarea>
                                        <!-- <input type="text" class="form-control" id="gist_letter" name="gist_letter" placeholder="Enter Gist of letter"> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Penalty Type</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fas  fa-user"></i>
                                        </span>
                                        <select name="u_penality_type" id="u_penality_type" class="select2me form-control billunitindex" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                            <option value="0" selected disabled="">--Select Penalty Type--</option>

                                            <?php
                                            $query_form = mysqli_query($db_edar,"SELECT * from tbl_penality_type");
                                            while ($value_form = mysqli_fetch_array($query_form)) {
                                                echo "<option value='" . $value_form['id'] . "'>" . $value_form['penality_name'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <!--/span-->
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
                    data: "action=removeMasterForm&id=" + value,
                    success: function(data) {
                        //alert(data);
                        if (data == 1) {
                            alert("Removed Successfully");
                            window.location = "master_forms.php";
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
        $(document).on("click", ".add_form", function() {
            var form_name = $("#form_name").val();
            var form_title = $("#form_title").val();
            var r = encodeURIComponent(form_title);
            var p_type = $("#penality_type").val();

            alert(r);
            if (form_name == "") {
                alert("Enter form name....");
                $("#form_name").focus();
            } else if (form_title == "") {
                alert("Enter form title....");
                $("#form_title").focus();
            } else if (p_type == "0") {
                alert("Please select penalty type....");
                $("#penality_type").focus();
            } else {
                //alert(value);
                $.ajax({
                    url: 'control/adminProcess.php',
                    type: 'POST',
                    data: "action=add_masterForm&form_name=" + form_name + "&form_title=" + r +
                        "&penality_type=" + p_type,
                    success: function(data) {
                        // alert(data);
                        // console.log(data);
                        if (data == 1) {
                            alert("Form added successfully....");
                            window.location = "master_forms.php";
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
            var frm_name = $(this).attr("form-name");
            var frm_title = $(this).attr("form-title");
            var frm_type = $(this).attr("form-type");
            //alert(src_name);
            $("#frm_id").val(value);
            $("#u_form_name").val(frm_name);
            $("#u_form_title").val(frm_title);
            $("#u_penality_type").val(frm_type).trigger("change");

        });
    </script>