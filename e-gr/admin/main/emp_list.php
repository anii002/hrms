<?php
require_once('Global_Data/header.php');
error_reporting(0);
?>

<!-- PNotify -->
<!-- page content -->
<div class="right_col" role="main" style="background-image: url('images/small1.png');repeat:repeat;">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <h2>All Employee <small>List</small></h2>
                        <hr>
                        <div class="x_content">
                            <table class="table table-striped table-bordered display" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Employee No</th>
                                        <th>Employee Name</th>
                                        <th>Mobile No</th>
                                        <th>Department</th>
                                        <th>Designation</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
									function get_uploaded_user($emp_id)
									{
										$sql_query = mysql_query("select * from tbl_user where user_id='$emp_id'");
										while ($query_sql = mysql_fetch_array($sql_query)) {
												$user_name = $query_sql['user_name'];
											}
										return $user_name;
									}

									$cnt = 1;
									$query = mysql_query("Select * FROM employee where delete_status = '0'");
									while ($rw_data = mysql_fetch_array($query)) {
										echo "<tr>";
										echo "<td>$cnt</td>";
										echo "<td>" . $rw_data["emp_id"] . "</td>";
										echo "<td>" . $rw_data["emp_name"] . "</td>";
										echo "<td>" . $rw_data["emp_mob"] . "</td>";
										echo "<td>" . get_department($rw_data["emp_dept"]) . "</td>";
										echo "<td>" . get_designation($rw_data["emp_desig"]) . "</td>";
										echo "<td><div class='btn-group' style='margin-top:-5px;width: 85px;'>
										<a  style='width:34px' id='" . $rw_data['emp_id'] . "' href='emp_detail.php?e_id=" . $rw_data['emp_id'] . "' class='btn_show_center btn1 btn btn-info' value='" . $rw_data['emp_id'] . "'><i class='fa fa-eye' aria-hidden='true'></i></a>
										</div>
										</td>";
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