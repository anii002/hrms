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
                        <h2>Closed Grievance<small> List</small></h2>

                        <hr>
                        <div class="x_content">
                            <table class="table table-striped table-bordered display" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Employee No</th>
                                        <th>Employee Name</th>
                                        <th>Employee Type</th>
                                        <th>Grievance Ref.No.</th>
                                        <th>Category</th>
                                        <th>Updated Date</th>
                                        <th>Last Updated Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
									$cnt = 1;
									if (isBA() || isBo()) {
										$currentuser = getCurrentUser();
										$section = getSectionIds($currentuser);
										// echo $section;
										// $sql = "Select  e.emp_id,e.emp_name,e.emp_type,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id,f.forwarded_date from employee e INNER JOIN tbl_grievance g ON e.emp_id=g.emp_id INNER JOIN tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where g.status='4' and f.status='4' and g.section_id in ($section) AND g.gri_ref_no NOT like 'WEL%' ORDER BY g.gri_upload_date DESC";
										$sql = "Select e.emp_no,e.name,e.empType,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id,f.forwarded_date from $db_common_name.register_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id INNER JOIN $db_egr_name.tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where g.status='4' and f.status='4' and (g.section_id in ($section) OR closedby='$currentuser') AND g.gri_ref_no NOT like 'WEL%' group by g.id ORDER BY g.gri_upload_date DESC";
									} else {
										// $sql = "Select  e.emp_id,e.emp_name,e.emp_type,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id,f.forwarded_date from employee e INNER JOIN tbl_grievance g ON e.emp_id=g.emp_id INNER JOIN tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where g.status='4' and f.status='4'  AND g.gri_ref_no NOT like 'WEL%' ORDER BY g.gri_upload_date DESC";
										$sql = "Select  e.emp_no,e.name,e.empType,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id,f.forwarded_date from $db_common_name.register_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id INNER JOIN $db_egr_name.tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where g.status='4' and f.status='4' AND g.gri_ref_no NOT like 'WEL%' group by g.id ORDER BY g.gri_upload_date DESC";
									}
									// echo $sql;
									$query = mysql_query($sql);
									while ($rw_data = mysql_fetch_array($query)) {
										// print_r($rw_data);
										$emp_id = $rw_data["emp_no"];
										$emp_name = $rw_data["name"];
										$emp_type = get_type($rw_data["empType"]);
										$gri_ref_no = $rw_data["gri_ref_no"];
										$gri_type = get_Cat($rw_data["gri_type"]);
										$gri_upload_date = $rw_data["gri_upload_date"];
										$g_id = $rw_data["id"];
										$forwarded_date = $rw_data["forwarded_date"];
										echo "<tr>";
										// echo "<td>$g_id</td>";
										echo "<td>$cnt</td>";
										echo "<td>$emp_id</td>";
										echo "<td>$emp_name</td>";
										echo "<td>$emp_type </td>";
										echo "<td>$gri_ref_no</td>";
										echo "<td>$gri_type</td>";
										echo "<td>$gri_upload_date</td>";
										echo "<td>$forwarded_date</td>";
										echo "<td><div class='btn-group' style='margin-top:-5px;width: 85px;'>
										<a  style='width:34px' id='" . $rw_data['id'] . "' href='griv_closed.php?g_id=" . $rw_data['id'] . "' class='btn_show_center btn1 btn btn-info' value='" . $rw_data['id'] . "'><i class='fa fa-eye' aria-hidden='true'></i></a>
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

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <h2>Closed Grievance<small> Added By Welfare List</small></h2>

                                <hr>
                                <div class="x_content">
                                    <table class="table table-striped table-bordered display" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>Employee No</th>
                                                <th>Employee Name</th>
                                                <th>Mobile Number</th>
                                                <th>Grievance Ref.No.</th>
                                                <th>Category</th>
                                                <th>Updated Date</th>
                                                <th>Uploaded By</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
											$cnt = 1;
											if (isBA() || isBO()) {
												$currentuser = getCurrentUser();
												$section = getSectionIds($currentuser);
												// $sql = "Select  e.emp_id,e.emp_name,e.emp_mob,e.emp_type,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id,f.forwarded_date from employee e INNER JOIN tbl_grievance g ON e.emp_id=g.emp_id INNER JOIN tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where g.status='4' and f.status='4' and g.section_id in ($section) AND g.gri_ref_no  like 'WEL%' ORDER BY g.gri_upload_date DESC";
												$sql = "Select e.emp_no,e.name,e.mobile,e.empType,g.gri_ref_no,g.gri_type,g.uploaded_by,g.gri_upload_date,g.id,f.forwarded_date from $db_common_name.register_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id INNER JOIN $db_egr_name.tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where g.status='4' and f.status='4' and (g.section_id in ($section) OR closedby='$currentuser') AND g.gri_ref_no  like 'WEL%' group by g.id ORDER BY g.gri_upload_date DESC";
											} else {

												// $sql = "Select  e.emp_id,e.emp_name,e.emp_mob,e.emp_type,g.gri_ref_no,g.gri_type,g.uploaded_by,g.gri_upload_date,g.id,f.forwarded_date from employee e INNER JOIN tbl_grievance g ON e.emp_id=g.emp_id INNER JOIN tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where g.status='4' and f.status='4'  AND g.gri_ref_no like 'WEL%' ORDER BY g.gri_upload_date DESC";
												$sql = "Select e.emp_no,e.name,e.mobile,e.empType,g.gri_ref_no,g.gri_type,g.uploaded_by,g.gri_upload_date,g.id,f.forwarded_date from $db_common_name.register_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id INNER JOIN $db_egr_name.tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where g.status='4' and f.status='4'  AND g.gri_ref_no like 'WEL%' group by g.id ORDER BY g.gri_upload_date DESC";
											}
											$query = mysql_query($sql);
											while ($rw_data = mysql_fetch_array($query)) {
												// print_r($rw_data);
												// print("<pre>".print_r($rw_data,true)."</pre>");
												// echo "<br>";
												$emp_id = $rw_data["emp_no"];
												$emp_name = $rw_data["name"];
												$emp_mobile = $rw_data["mobile"];
												$gri_ref_no = $rw_data["gri_ref_no"];
												$gri_type = get_Cat($rw_data["gri_type"]);
												$gri_upload_date = $rw_data["gri_upload_date"];
												$uploaded_by = get_uploaded_user($rw_data["uploaded_by"]);
												$g_id = $rw_data["id"];
												echo "<tr>";
												echo "<td>$cnt</td>";
												echo "<td>$emp_id</td>";
												echo "<td>$emp_name</td>";
												echo "<td>$emp_mobile</td>";
												echo "<td>$gri_ref_no</td>";
												echo "<td>$gri_type</td>";
												echo "<td>$gri_upload_date</td>";
												echo "<td>$uploaded_by</td>";
												echo "<td><div class='btn-group' style='margin-top:-5px;width: 85px;'>
										<a  style='width:34px' id='" . $rw_data['id'] . "' href='griv_closed_wel.php?g_id=" . $rw_data['id'] . "' class='btn_show_center btn1 btn btn-info' value='" . $rw_data['id'] . "'><i class='fa fa-eye' aria-hidden='true'></i></a>
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
    </div>
</div>

<?php
require_once('Global_Data/footer.php');
?>