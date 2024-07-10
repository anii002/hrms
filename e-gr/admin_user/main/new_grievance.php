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
                        <h2>New Grievance Complaints <small>List</small></h2>
                        <hr>
                        <div class="x_content">
                            <table class="table table-striped table-bordered display" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Employee No</th>
                                        <th>Employee Name</th>
                                        <th>Employee Type</th>
                                        <th>Employee Station</th>
                                        <th>Grievance Ref.No.</th>
                                        <th>Category</th>
                                        <th>Updated Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
									function get_Cat($type)
									{
										global $db_egr;
										$fetch_cat = mysql_query("select cat_name from category where cat_id='" . $type . "'", $db_egr);
										while ($cat_get = mysql_fetch_assoc($fetch_cat)) {
											$cat_names = $cat_get['cat_name'];
										}
										return ($cat_names);
									}
									$current_id = $_SESSION['SESSION_ID'];
								// 	echo $current_id;
									function get_type($emp_type)
									{
										global $db_egr;
										$fetch_cat = mysql_query("select * from emp_type where id='$emp_type'", $db_egr);
										while ($cat_fetch = mysql_fetch_array($fetch_cat)) {
											$e_type = $cat_fetch['type'];
										}
										return $e_type;
									}
									$cnt = 1;
									// echo $sql = "Select e.emp_id,e.emp_name,e.emp_type,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id,f.forwarded_date from employee e INNER JOIN tbl_grievance g ON e.emp_id=g.emp_id INNER JOIN tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where g.status='2' and f.status='2' and f.user_id_forwarded='$current_id' and f.griv_ref_no not like 'WEL%'";
									// $sql="Select e.emp_id,e.emp_name,e.emp_type,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id,f.forwarded_date from employee e INNER JOIN tbl_grievance g ON e.emp_id=g.emp_id INNER JOIN tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where g.status='2' and f.status='2' and f.user_id_forwarded='$current_id' and f.griv_ref_no not like 'WEL%'";
									$sql = "Select e.emp_no,e.name,e.empType,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id,f.forwarded_date from $db_common_name.register_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id INNER JOIN $db_egr_name.tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where g.status='2' and f.status='2' and f.user_id_forwarded='$current_id' and f.griv_ref_no not like 'WEL%' group by g.id order by g.gri_upload_date DESC";
									$query = mysql_query($sql);
									// echo mysql_error();
									while ($rw_data = mysql_fetch_array($query)) {
										$emp_id = $rw_data["emp_no"];
										$emp_name = $rw_data["name"];
										$emp_type = get_type($rw_data["empType"]);
										$gri_ref_no = $rw_data["gri_ref_no"];
										$gri_type = get_Cat($rw_data["gri_type"]);
										$gri_upload_date = $rw_data["gri_upload_date"];
										$g_id = $rw_data["id"];
										
										$fetch_query = "select e.station,g.up_doc,g.gri_upload_date,g.gri_ref_no,g.doc_id from $db_common_name.register_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=$emp_id INNER JOIN $db_egr_name.tbl_grievance_forward f ON g.gri_ref_no=$gri_ref_no WHERE g.id=$g_id";
									//	print_r($fetch_query);
										$fetch_query1 = mysql_query($fetch_query);
										$fetch_query2 = mysql_fetch_array($fetch_query1);
										$st = $fetch_query2["station"];
										
										$station_query = "select stationdesc FROM $db_common_name.station WHERE stationcode = '$st'";
										//print_r($station_query);
										$st1 = mysql_query($station_query);
				
										$st2 = mysql_fetch_array($st1);
										
										$st3 = $st2["stationdesc"];
										
										echo "<tr>";
										echo "<td>$cnt</td>";
										echo "<td>$emp_id</td>";
										echo "<td>$emp_name</td>";
										echo "<td>$emp_type</td>";
										echo "<td>$st3</td>";
										echo "<td>$gri_ref_no</td>";
										echo "<td>$gri_type</td>";
										echo "<td>$gri_upload_date</td>";
										echo "<td><div class='btn-group' style='margin-top:-5px;width: 85px;'>
										<a  style='width:34px' id='" . $rw_data['id'] . "' href='gri_comp_detail.php?g_id=" . $rw_data['id'] . "' class='btn_show_center btn1 btn btn-info' value='" . $rw_data['id'] . "'><i class='fa fa-eye' aria-hidden='true'></i></a>
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


    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <h2>New Grievance Complaints <small>List Added By welfare</small></h2>
                        <hr>
                        <div class="x_content">
                            <table class="table table-striped table-bordered display" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Employee No</th>
                                        <!--th>Employee Name</th>
							<th>Mobile Number</th-->
                                        <th>Grievance Ref.No.</th>
                                        <th>Category</th>
                                        <th>Updated Date</th>
                                        <th>Uploaded By</th>
                                        <th>Pending With</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
									function get_uploaded_user($id)
									{
										global $db_egr;
										$e_type = '';
										$fetch_name_sql = mysql_query("select * from tbl_user where user_id='$id'", $db_egr);
										while ($name_fetch = mysql_fetch_array($fetch_name_sql)) {
											$e_type = $name_fetch['user_name'];
										}
										return $e_type;
									}
									$cnt = 1;
									$query = mysql_query("Select f.user_id_forwarded, g.emp_id,g.gri_ref_no,g.gri_type,g.gri_upload_date, g.uploaded_by, g.id,f.forwarded_date from tbl_grievance g INNER JOIN tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where g.status='2' and f.status='2' and f.user_id_forwarded='$current_id' and f.griv_ref_no like 'WEL%'", $db_egr);

									while ($rw_data = mysql_fetch_array($query)) {
										$emp_id = $rw_data["emp_id"];
										$gri_ref_no = $rw_data["gri_ref_no"];
										$gri_type = get_Cat($rw_data["gri_type"]);
										$gri_upload_date = $rw_data["gri_upload_date"];
										$g_id = $rw_data["id"];
										$uploaded_by = get_uploaded_user($rw_data["uploaded_by"]);
										echo "<tr>";
										echo "<td>$cnt</td>";
										echo "<td>$emp_id</td>";
										echo "<td>$gri_ref_no</td>";
										echo "<td>$gri_type</td>";
										echo "<td>$gri_upload_date</td>";
										echo "<td>$uploaded_by</td>";
										echo "<td>" . get_uploaded_user($rw_data['user_id_forwarded']) . "</td>";
										echo "<td><div class='btn-group' style='margin-top:-5px;width: 85px;'>
										<a  style='width:34px' id='" . $rw_data['id'] . "' href='gri_compwel_detail.php?g_id=" . $rw_data['id'] . "' class='btn_show_center btn1 btn btn-info' value='" . $rw_data['id'] . "'><i class='fa fa-eye' aria-hidden='true'></i></a>
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
<script>

</script>