<?php
require_once('Global_Data/header.php');
error_reporting(0);
?>


<!-- PNotify -->
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> <i class="fa fa-users"></i>&nbsp Grievance Details</h3><br>
            </div>

            <div class="title_right">

            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <form action="process.php?action=forward_grievance" method="POST" class="form-horizontal">
                            <?php
                            $got_id = $_GET['g_id'];
                            //echo "<script>alert($got_id);</script>";

                            $fetch_query = "select e.emp_type,e.emp_id,e.emp_name,e.emp_dept,e.emp_desig,e.emp_mob,e.emp_email,e.emp_aadhar,e.emp_address1,e.emp_state,e.emp_city,e.emp_pincode,e.office_emp_address1,e.office_emp_state,e.office_emp_city,e.office_emp_pincode,e.office,e.station,g.gri_type,g.gri_desc,g.up_doc,g.gri_upload_date,g.gri_ref_no,g.doc_id from employee e INNER JOIN tbl_grievance g ON e.emp_id=g.emp_id WHERE g.id=$got_id";

                            $exe_query = mysql_query($fetch_query) or die(mysql_error());
                            while ($result = mysql_fetch_array($exe_query)) {
                                $emp_type = $result['emp_type'];
                                $emp_id = $result['emp_id'];
                                $emp_name = $result['emp_name'];
                                $emp_dept = $result['emp_dept'];
                                $emp_desig = $result['emp_desig'];
                                $emp_mob = $result['emp_mob'];
                                $emp_email = $result['emp_email'];
                                $emp_aadhar = $result['emp_aadhar'];
                                $emp_address1 = $result['emp_address1'];
                                $emp_state = $result['emp_state'];
                                $emp_city = $result['emp_city'];
                                $emp_pincode = $result['emp_pincode'];
                                $office_emp_address1 = $result['office_emp_address1'];
                                $office_emp_state = $result['office_emp_state'];
                                $office_emp_city = $result['office_emp_city'];
                                $office_emp_pincode = $result['office_emp_pincode'];
                                $office = $result['office'];
                                $station = $result['station'];
                                $gri_type = $result['gri_type'];
                                $gri_desc = $result['gri_desc'];
                                $up_doc = $result['up_doc'];
                                $gri_upload_date = $result['gri_upload_date'];
                                $gri_ref_no = $result['gri_ref_no'];
                                $doc_id = $result['doc_id'];
                            }
                            ?>
                            <h4 class="bgshades"> Personal Details: </h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4" style="margin-left: -50px;">Employee
                                            Type</label>
                                        <div class="col-md-8">
                                            <?php
                                            $this_id = $_SESSION['SESSION_ID'];
                                            //echo "<script>alert('$this_id');</script>";

                                            ?>
                                            <input type="hidden" name="hidden_id" id="hidden_id"
                                                value="<?php echo $this_id; ?>">
                                            <?php
                                            $fetch_cat = mysql_query("select * from emp_type where id='$emp_type'");
                                            while ($cat_fetch = mysql_fetch_array($fetch_cat)) {
                                                $e_type = $cat_fetch['type'];
                                            }
                                            ?>
                                            <input type="text" class="form-control" id="emp_id" name="emp_id" readonly
                                                value="<?php echo $e_type; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4" style="margin-left: -50px;">Emp Id/PF
                                            No</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="emp_id" name="emp_id" readonly
                                                value="<?php echo $emp_id; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4" style="margin-left: -50px;">Emp
                                            Name</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="emp_name" name="emp_name"
                                                readonly value="<?php echo $emp_name; ?>">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4"
                                            style="margin-left: -50px;">Department</label>
                                        <div class="col-md-8">
                                            <?php
                                            $get_dept = mysql_query("select deptname from tbl_department where dept_id='$emp_dept'");
                                            while ($fetch_dept = mysql_fetch_array($get_dept)) {
                                                $got_dept = $fetch_dept['deptname'];
                                            }
                                            ?>
                                            <input type="text" class="form-control" id="emp_name" name="emp_name"
                                                readonly value="<?php echo $got_dept; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4"
                                            style="margin-left: -50px;">Designation</label>
                                        <div class="col-md-8">
                                            <?php
                                            $get_des = mysql_query("select designation from tbl_designation where id='$emp_desig'");
                                            while ($fetch_des = mysql_fetch_array($get_des)) {
                                                $got_des = $fetch_des['designation'];
                                            }
                                            ?>
                                            <input type="text" class="form-control" id="emp_name" name="emp_name"
                                                readonly value="<?php echo $got_des; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4" style="margin-left: -50px;">Mobile
                                            No.</label>
                                        <div class="col-md-8">
                                            <input type="text" id="emp_mob" name="emp_mob" class="form-control" readonly
                                                value="<?php echo $emp_mob; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4" style="margin-left: -50px;">Email
                                            Id</label>
                                        <div class="col-md-8">
                                            <input type="text" id="emp_email" name="emp_email" class="form-control"
                                                readonly value="<?php echo $emp_email; ?>">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4" style="margin-left: -50px;">Aadhar
                                            No.</label>
                                        <div class="col-md-8">
                                            <input type="text" id="emp_aadhar" name="emp_aadhar" class="form-control"
                                                readonly value="<?php echo $emp_aadhar; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4" style="margin-left: -50px;">Office</label>
                                        <div class="col-md-8">
                                            <?php
                                            $fetch_office = mysql_query("select office_name from tbl_office where office_id=$office");
                                            while ($office_fetch = mysql_fetch_array($fetch_office)) {
                                                $office_name = $office_fetch['office_name'];
                                            }
                                            ?>
                                            <input type="text" id="emp_email" name="emp_email" class="form-control"
                                                readonly value="<?php echo $office_name; ?>">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4"
                                            style="margin-left: -50px;">Station</label>
                                        <div class="col-md-8">
                                            <?php
                                            $get_st = mysql_query("select station_name from tbl_station where station_id='$station'");
                                            while ($fetch_st = mysql_fetch_array($get_st)) {
                                                $got_st = $fetch_st['station_name'];
                                            }
                                            ?>
                                            <input type="text" id="emp_aadhar" name="emp_aadhar" class="form-control"
                                                readonly value="<?php echo $got_st; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4 class="bgshades">Personal Address: </h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4" style="margin-left: -50px;">Address
                                            1</label>
                                        <div class="col-md-8">
                                            <textarea rows="3" cols="30" id="emp_address1" name="emp_address1"
                                                class="form-control" readonly><?php echo $emp_address1; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4" style="margin-left: -50px;">State</label>
                                        <div class="col-md-8">
                                            <?php
                                            $fetch_state = mysql_query("select state_name from states where state_id=$emp_state");
                                            while ($state_fetch = mysql_fetch_array($fetch_state)) {
                                                $state_name = $state_fetch['state_name'];
                                            }
                                            ?>
                                            <input type="text" class="form-control" id="emp_name" name="emp_name"
                                                readonly value="<?php echo $state_name; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4" style="margin-left: -50px;">City</label>
                                        <div class="col-md-8">
                                            <?php
                                            $fetch_city = mysql_query("select city_name from cities where city_id=$emp_city");
                                            while ($city_fetch = mysql_fetch_array($fetch_city)) {
                                                $city_name = $city_fetch['city_name'];
                                            }
                                            ?>
                                            <input type="text" class="form-control" id="emp_name" name="emp_name"
                                                readonly value="<?php echo $city_name; ?>">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4"
                                            style="margin-left: -50px;">Pincode</label>
                                        <div class="col-md-8">
                                            <input type="text" id="emp_pincode" name="emp_pincode" class="form-control"
                                                readonly value="<?php echo $emp_pincode; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4 class="bgshades"> Office Address: </h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4" style="margin-left: -50px;">Address
                                            1</label>
                                        <div class="col-md-8">
                                            <textarea rows="3" cols="30" id="office_emp_address1"
                                                name="office_emp_address1" class="form-control"
                                                readonly><?php echo $office_emp_address1; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4" style="margin-left: -50px;">State</label>
                                        <div class="col-md-8">
                                            <?php
                                            $fetch_state_2 = mysql_query("select state_name from states where state_id=$office_emp_state");
                                            while ($state_fetch_2 = mysql_fetch_array($fetch_state_2)) {
                                                $state_name_2 = $state_fetch_2['state_name'];
                                            }
                                            ?>
                                            <input type="text" class="form-control" id="emp_name" name="emp_name"
                                                readonly value="<?php echo $state_name_2; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4" style="margin-left: -50px;">City</label>
                                        <div class="col-md-8">
                                            <?php
                                            $fetch_city_2 = mysql_query("select city_name from cities where city_id=$office_emp_city");
                                            while ($city_fetch_2 = mysql_fetch_array($fetch_city_2)) {
                                                $city_name_2 = $city_fetch_2['city_name'];
                                            }
                                            ?>
                                            <input type="text" class="form-control" id="emp_name" name="emp_name"
                                                readonly value="<?php echo $city_name_2; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4"
                                            style="margin-left: -50px;">Pincode</label>
                                        <div class="col-md-8">
                                            <input type="text" id="office_emp_pincode" name="office_emp_pincode"
                                                class="form-control" readonly
                                                value="<?php echo $office_emp_pincode; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4 class="bgshades"> Grievance Details: </h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4" style="margin-left:-50px;">Gri.
                                            Type</label>
                                        <div class="col-md-8">
                                            <?php
                                            $fetch_cat = mysql_query("select cat_name from category where cat_id=$gri_type");
                                            while ($cat_fetch = mysql_fetch_array($fetch_cat)) {
                                                $cat_name = $cat_fetch['cat_name'];
                                            }
                                            ?>
                                            <input type="text" id="up_office_emp_pincode" name="up_office_emp_pincode"
                                                class="form-control" readonly value="<?php echo $cat_name; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4" style="margin-left:-50px;">Gri. Ref.
                                            No.</label>
                                        <div class="col-md-8">
                                            <input type="text" id="griv_ref_no" name="griv_ref_no" class="form-control"
                                                readonly value="<?php echo $gri_ref_no; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-2" style="margin-left:-50px;">
                                            Description</label>
                                        <div class="col-md-10">
                                            <textarea rows="5" cols="30" id="up_office_emp_address2"
                                                name="up_office_emp_address2" class="form-control" readonly
                                                style="resize:none;"><?php echo $gri_desc; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:30px;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4"
                                            style="margin-left:-50px;">Attachment</label>
                                        <label class="control-label col-md-4"
                                            style="margin-left:-80px;"><?php echo $up_doc; ?></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4" style="margin-left:-50px;">Document
                                            Link</label>
                                        <?php //$got_str= explode("-",$doc_id);
                                        //echo "<script>alert('$got_str[1]');</script>";
                                        /* $sql_doc=mysql_query("select * from doc where griv_ref_no='$gri_ref_no'");
									while($doc_fetch=mysql_fetch_array($sql_doc))
									{
										echo "<a href='upload_doc/".$doc_fetch['doc_path']."' target='_blank'><label class='control-label col-md-4' style='margin-left:-80px;'>LINK</label></a>";
									} */

                                        $sql_doc = mysql_query("select * from doc where griv_ref_no='$gri_ref_no'");
                                        $cnt = 0;
                                        echo "<table style='width:20%;margin-left:40%;'><tr>";
                                        while ($doc_fetch = mysql_fetch_array($sql_doc)) {
                                            //echo $doc_fetch['doc_path'];
                                            echo "<td><a href='upload_doc/" . $doc_fetch['doc_path'] . "' target='_blank' id='" . $cnt . "' name='" . $cnt . "'><label class='control-label col-md-4' style='margin-left:-80px;'>DOC</label></a></td>";
                                            $cnt++;
                                        }
                                        echo "</tr></table>";
                                        ?>

                                    </div>
                                </div>
                            </div>
                            <h4 class="bgshades"> Add Remarks And Forward: </h4>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label col-md-5" style="margin-left: -50px;">Action</label>
                                        <div class="col-md-7">
                                            <select id="action" name="action" class="form-control" required>
                                                <option value="" disabled selected>Select Action</option>
                                                <?php
                                                $action = mysql_query("select * from action");
                                                while ($fetch_action = mysql_fetch_array($action)) {
                                                    echo "<option value='" . $fetch_action['id'] . "'>" . $fetch_action['action'] . "</option>";
                                                }
                                                ?>
                                                <!--<option value="" disabled selected>Select Station</option>
									<option value="solapur">sr.DPO</option>
									<option value="pune">Assisment</option>-->
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="control-label col-md-5" style="margin-left: -50px;">Forward to
                                            Section</label>
                                        <div class="col-md-7">
                                            <select id="section" name="section" class="form-control" required>
                                                <option value="" disabled selected>Select Section</option>
                                                <?php
                                                $section = mysql_query("select * from tbl_section");
                                                while ($fetch_section = mysql_fetch_array($section)) {
                                                    echo "<option value='" . $fetch_section['sec_id'] . "'>" . $fetch_section['sec_name'] . "</option>";
                                                }
                                                ?>
                                                <!--<option value="solapur">sr.DPO</option>
									<option value="pune">Assisment</option>-->
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label col-md-5"
                                            style="margin-left: -50px;">Authority</label>
                                        <div class="col-md-7">
                                            <select id="auth" name="auth" class="form-control">
                                                <!--<option value="" disabled selected>Select Station</option>
									<option value="solapur">sr.DPO</option>
									<option value="pune">Assisment</option>-->
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:30px;">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Remarks/Description</label>
                                        <div class="col-md-10">
                                            <textarea name="remark" id="remark" rows="5" style="resize:none;"
                                                class="form-control">
									</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div style="margin-left:850px;">
                                <button type="submit" class="btn btn-info source">Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<?php
require_once('Global_Data/footer.php');
?>
<link href="select2/select2.min.css" rel="stylesheet" />
<script src="select2/select2.min.js"> </script>
<script>
$("#emp_dept").select2();
$("#emp_desig").select2();
$("#emp_state").select2();
$("#emp_city").select2();
$("#office_emp_state").select2();
$("#office_emp_city").select2();
</script>
<script>
$('#emp_state').on('change', function() {
    var stateID = $(this).val();
    //alert(stateID);
    if (stateID) {
        $.ajax({
            type: 'POST',
            url: 'statechange.php',
            data: 'state_id=' + stateID,
            success: function(html) {
                $('#emp_city').html(html);
            }
        });
    } else {
        $('#emp_city').html('<option value="">Select state first</option>');
    }
});
$('#office_emp_state').on('change', function() {
    var stateID = $(this).val();
    //alert(stateID);
    if (stateID) {
        $.ajax({
            type: 'POST',
            url: 'statechange.php',
            data: 'state_id=' + stateID,
            success: function(html) {
                $('#office_emp_city').html(html);
            }
        });
    } else {
        $('#office_emp_city').html('<option value="">Select state first</option>');
    }
});
$(document).on("change", "#section", function() {
    debugger;
    var sec_val = $(this).val();
    if (sec_val == "5") {
        $('#auth').append($('<option>', {
            value: <?php echo $emp_id; ?>,
            text: "<?php echo $emp_name; ?>"
        }));
    }
    //alert(sec_val);
    $.ajax({
        type: 'POST',
        url: 'get_user.php',
        data: {
            //action:get_user,
            sec_val: sec_val,
        },
        success: function(html) {

            $('#auth').html(html);
        }
    });
});
</script>