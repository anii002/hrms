<?php
require_once('Global_Data/header.php');
error_reporting(0);
?>
<!-- PNotify -->
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <h2>Grievance <small>List</small></h2>
                        <hr>
                        <div class="x_content">
                            <table class="table table-striped table-bordered display" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Emp No</th>
                                        <th>Grievance Id</th>
                                        <th>Grievance Type</th>
                                        <th>Grievance Desc.</th>
                                        <th>Date and Time</th>
                                        <th>Status</th>
                                        <!-- <th>Pending With</th> -->
                                        <th>Action</th>
                                        <!--th>Action</th-->

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // function get_uploaded_user($id)
                                    // {
                                    //     global $db_egr;
                                    //     $e_type = '';
                                    //     $fetch_name_sql = mysql_query("select * from tbl_user where user_id='$id'", $db_egr);
                                    //     while ($name_fetch = mysql_fetch_array($fetch_name_sql)) {
                                    //         $e_type = $name_fetch['user_name'];
                                    //     }
                                    //     return $e_type;
                                    // }
                                    function get_current_status($id)
                                    {
                                        global $db_egr;
                                        $e_type = '';
                                        $fetch_name_sql = mysql_query("select * from status where id='$id'", $db_egr);
                                        while ($name_fetch = mysql_fetch_array($fetch_name_sql)) {
                                            $e_type = $name_fetch['status'];
                                        }
                                        return $e_type;
                                    }
                                    $cur_user = $_SESSION['SESSION_ID'];
                                    // $sql_query = "select g.*, f.user_id_forwarded, f.status from tbl_grievance g INNER JOIN tbl_grievance_forward f ON f.griv_ref_no = g.gri_ref_no where g.gri_ref_no like 'WEL%' and g.uploaded_by='$cur_user' group by g.id order by g.gri_upload_date DESC";
                                    $sql_query = "select * from tbl_grievance  where gri_ref_no like 'WEL%' and uploaded_by='$cur_user' group by id order by gri_upload_date DESC";
                                    // echo $sql_query;
                                    $sql = mysql_query($sql_query, $db_egr);
                                    // echo "select * from  grievance where gri_ref_no like 'WEL%'".mysql_error();
                                    $cnt = 1;
                                    while ($result = mysql_fetch_array($sql)) {
                                        $emp_id = $result['emp_id'];
                                        $gri_ref_no = $result['gri_ref_no'];
                                        echo "<tr>";
                                        echo "<td>" . $cnt . "</td>";
                                        echo "<td>" . $result['emp_id'] . "</td>";
                                        echo "<td>" . $result['gri_ref_no'] . "</td>";
                                        echo "<td>" . get_cat_name($result['gri_type']) . "</td>";
                                        echo "<td>" . $result['gri_desc'] . "</td>";
                                        echo "<td>" . $result['gri_upload_date'] . "</td>";
                                        echo "<td>" . get_current_status($result['status']) . "</td>";
                                        // echo "<td>" . get_uploaded_user($result['user_id_forwarded']) . "</td>";
                                        echo "<td><a href='welfare_gr_history.php?griv_no=" . $result['gri_ref_no'] . "&emp_id=" . $result['emp_id'] . "' class='btn btn-primary source'><i class='fa fa-eye' aria-hidden='true'></i>View</a></td>";

                                        echo "</tr>";
                                        $cnt++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>


<?php
require_once('Global_Data/footer.php');
?>
<script>
$('.btn1').on('click', function() {
    $('#update_employee_hidden_id').val($(this).attr('id'));
    $('#delete_employee_hidden_id').val($(this).attr('id'));
    var update_employee_hidden_id = document.getElementById('update_employee_hidden_id').value;
    $.ajax({
        type: "post",
        url: "process.php",
        data: "action=get_employee_details&update_employee_hidden_id=" + update_employee_hidden_id,
        success: function(data) {
            //alert(data);
            var ddd = data;
            var arr = ddd.split('$');
            $("#up_emp_type").val(arr[0]);
            $("#up_emp_id").val(arr[1]);
            $("#up_emp_name").val(arr[2]);
            $("#up_emp_dept").val(arr[3]);
            $("#up_emp_desig").val(arr[4]);
            $("#up_emp_mob").val(arr[5]);
            $("#up_emp_email").val(arr[6]);
            $("#up_emp_aadhar").val(arr[7]);
            $("#up_emp_address1").val(arr[8]);
            $("#up_emp_address2").val(arr[9]);
            $("#up_emp_state").val(arr[10]);
            $("#up_emp_city").val(arr[11]);
            $("#up_office_emp_address1").val(arr[12]);
            $("#up_office_emp_address2").val(arr[13]);
            $("#up_office_emp_state").val(arr[14]);
            $("#up_office_emp_city").val(arr[15]);
            $("#up_emp_pincode").val(arr[16]);
            $("#up_office_emp_pincode").val(arr[17]);

            $("#state_hidden_id").val(arr[10]);
            $("#state_hidden_id1").val(arr[14]);
            var state_hidden_id = document.getElementById('state_hidden_id').value;
            //alert(state_hidden_id);
            $.ajax({
                type: "post",
                url: "process.php",
                data: "action=get_city&state_hidden_id=" + state_hidden_id,
                success: function(data) {
                    //alert(data);
                    var ddd = data;
                    var arr1 = ddd.split('$');
                    // alert(arr1);
                    var options = "";
                    for (var i = 0; i < arr1.length; i++) {
                        options += "<option>" + arr1[i] + "</option>";
                    }
                    $("#up_emp_city").html(options);


                }
            });

            var state_hidden_id1 = document.getElementById('state_hidden_id1').value;
            //alert(state_hidden_id1);
            $.ajax({
                type: "post",
                url: "process.php",
                data: "action=get_city1&state_hidden_id1=" + state_hidden_id1,
                success: function(data) {
                    //alert(data);
                    var ddd = data;
                    var arr1 = ddd.split('$');
                    // alert(arr1);
                    var options = "";
                    for (var i = 0; i < arr1.length; i++) {
                        options += "<option>" + arr1[i] + "</option>";
                    }
                    $("#up_office_emp_city").html(options);


                }
            });
        }
    });


});

$('#up_emp_state').on('change', function() {
    var stateID = $(this).val();
    //alert(stateID);
    if (stateID) {
        $.ajax({
            type: 'POST',
            url: 'statechange.php',
            data: 'state_id=' + stateID,
            success: function(html) {
                $('#up_emp_city').html(html);
            }
        });
    } else {
        $('#up_emp_city').html('<option value="">Select state first</option>');
    }
});
$('#up_office_emp_state').on('change', function() {
    var stateID = $(this).val();
    //alert(stateID);
    if (stateID) {
        $.ajax({
            type: 'POST',
            url: 'statechange.php',
            data: 'state_id=' + stateID,
            success: function(html) {
                $('#up_office_emp_city').html(html);
            }
        });
    } else {
        $('#up_office_emp_city').html('<option value="">Select state first</option>');
    }
});
</script>