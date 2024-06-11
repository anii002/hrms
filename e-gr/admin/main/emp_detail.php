<?php
require_once('Global_Data/header.php');
error_reporting(0);

function get_user_type($id)
{
	$sql = "select * from emp_type where id='" . $id . "'";
	$f_desg = mysql_query($sql);
	$desg_f = mysql_fetch_array($f_desg);
	return $desg_f['type'];
} /*
function get_office_text($id){
	$sql = "select * from tbl_office where office_id='".$id."'";
	$f_desg=mysql_query($sql);
	$desg_f=mysql_fetch_array($f_desg);
	return $desg_f['office_name'];
}
function get_station_text($id){
	$sql = "select * from tbl_station where station_id='".$id."'";
	$f_desg=mysql_query($sql);
	$desg_f=mysql_fetch_array($f_desg);
	return $desg_f['station_name'];
}*/

$emp_id = $_GET['e_id'];
//echo $emp_id;
$emp_sql = "SELECT * FROM `employee` WHERE `emp_id` = '" . $emp_id . "' AND `delete_status` = '0' ";
//echo $emp_sql;
$result = mysql_query($emp_sql);
echo mysql_error();
if (mysql_affected_rows() > 0) {
	while ($fetch_data = mysql_fetch_assoc($result)) {
		$emp_type = get_user_type($fetch_data['emp_type']);
		$emp_pf = $fetch_data['emp_id'];
		$emp_name = $fetch_data['emp_name'];
		$emp_dept = get_department($fetch_data['emp_dept']);
		$emp_desig = get_designation($fetch_data['emp_desig']);
		$emp_mobile = $fetch_data['emp_mob'];
		$emp_mail = $fetch_data['emp_email'];
		$emp_aadhar = $fetch_data['emp_aadhar'];
		$emp_office = get_office_text($fetch_data['office']);
		$emp_station = get_station_text($fetch_data['station']);
		$emp_address1 = $fetch_data['emp_address1'];
		$emp_address2 = $fetch_data['emp_address2'];
		$emp_state = $fetch_data['emp_state'];
		$emp_city = $fetch_data['emp_city'];
		$emp_pincode = $fetch_data['emp_pincode'];
		$emp_o_address1 = $fetch_data['office_emp_address1'];
		$emp_o_address2 = $fetch_data['office_emp_address2'];
		$emp_o_state = $fetch_data['office_emp_state'];
		$emp_o_city = $fetch_data['office_emp_city'];
		$emp_o_pincode = $fetch_data['office_emp_pincde'];
	}
}

?>

<!-- PNotify -->
<!-- page content -->
<div class="right_col" role="main" style="background-image: url('images/small1.png');repeat:repeat;">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <h2>Employee Details</h2>
                        <div class="x_content">
                            <div class="container">
                                <div class="" role="main">
                                    <div class="">
                                        <div class="clearfix"></div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="x_panel">
                                                    <div class="x_title">
                                                        <h4 class="bgshades">Personal Details: <span
                                                                style="float:right;font-size:10px;color:red;">Employee
                                                                No. will be your username<br> and Mobile number will be
                                                                password</span></h4>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-md-4 col-sm-3 col-xs-12">Employee
                                                                        Type</label>
                                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                                        <label
                                                                            class="control-label col-md-8 col-sm-3 col-xs-12"><?php echo $emp_type; ?></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-md-4 col-sm-3 col-xs-12">Emp
                                                                        No./PF No./PPO No.</label>
                                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                                        <label
                                                                            class="control-label col-md-12 col-sm-3 col-xs-12"><?php echo $emp_pf; ?></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-md-4 col-sm-3 col-xs-12">Emp
                                                                        Name</label>
                                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                                        <label
                                                                            class="control-label col-md-12 col-sm-3 col-xs-12"><?php echo $emp_name; ?></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-md-4 col-sm-3 col-xs-12">Department</label>
                                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                                        <label
                                                                            class="control-label col-md-4 col-sm-3 col-xs-12"><?php echo $emp_dept; ?></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-md-4 col-sm-3 col-xs-12">Designation</label>
                                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                                        <label
                                                                            class="control-label col-md-12 col-sm-3 col-xs-12"><?php echo $emp_desig; ?></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-md-4 col-sm-3 col-xs-12">Mobile
                                                                        No</label>
                                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                                        <label
                                                                            class="control-label col-md-4 col-sm-3 col-xs-12"><?php echo $emp_mobile; ?></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-md-4 col-sm-3 col-xs-12">Email
                                                                        Id</label>
                                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                                        <label
                                                                            class="control-label col-md-4 col-sm-3 col-xs-12"><?php echo $emp_mail; ?></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-md-4 col-sm-3 col-xs-12">Aadhar
                                                                        No</label>
                                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                                        <label
                                                                            class="control-label col-md-4 col-sm-3 col-xs-12"><?php echo $emp_aadhar; ?></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-md-4 col-sm-3 col-xs-12">Office
                                                                        Name</label>
                                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                                        <label
                                                                            class="control-label col-md-12 col-sm-3 col-xs-12"><?php echo $emp_office; ?></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-md-4 col-sm-3 col-xs-12">Station</label>
                                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                                        <label
                                                                            class="control-label col-md-4 col-sm-3 col-xs-12"><?php echo $emp_station; ?></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h4 class="bgshades">Personal Address:</h4>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-md-4 col-sm-3 col-xs-12">Address
                                                                        1</label>
                                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                                        <label
                                                                            class="control-label col-md-4 col-sm-3 col-xs-12"><?php echo $emp_address1; ?></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-md-4 col-sm-3 col-xs-12">Address
                                                                        2</label>
                                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                                        <label
                                                                            class="control-label col-md-4 col-sm-3 col-xs-12"><?php echo $emp_address2; ?></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-md-4 col-sm-3 col-xs-12">State</label>
                                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                                        <label
                                                                            class="control-label col-md-4 col-sm-3 col-xs-12"><?php echo $emp_state; ?></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-md-4 col-sm-3 col-xs-12">City</label>
                                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                                        <label
                                                                            class="control-label col-md-4 col-sm-3 col-xs-12"><?php echo $emp_city; ?></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-md-4 col-sm-3 col-xs-12">Pincode</label>
                                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                                        <label
                                                                            class="control-label col-md-4 col-sm-3 col-xs-12"><?php echo $emp_pincode; ?></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h4 class="bgshades"> Office Address: </h4>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-md-4 col-sm-3 col-xs-12">Address
                                                                        1</label>
                                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                                        <label
                                                                            class="control-label col-md-4 col-sm-3 col-xs-12"><?php echo $office_emp_address1; ?></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-md-4 col-sm-3 col-xs-12">Address
                                                                        2</label>
                                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                                        <label
                                                                            class="control-label col-md-4 col-sm-3 col-xs-12"><?php echo $office_emp_address2; ?></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-md-4 col-sm-3 col-xs-12">State</label>
                                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                                        <label
                                                                            class="control-label col-md-4 col-sm-3 col-xs-12"><?php echo $office_emp_state; ?></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-md-4 col-sm-3 col-xs-12">City</label>
                                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                                        <label
                                                                            class="control-label col-md-4 col-sm-3 col-xs-12"><?php echo $office_emp_city; ?></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="control-label col-md-4 col-sm-3 col-xs-12">Pincode</label>
                                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                                        <label
                                                                            class="control-label col-md-4 col-sm-3 col-xs-12"><?php echo $office_emp_pincode; ?></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div style="float:right;" class="col-sm-6 col-xs-12">
                                                            <a href="emp_list.php" class="btn btn-danger"
                                                                data-dismiss="modal">Close</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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