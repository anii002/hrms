<?php
require_once('Global_Data/header.php');
error_reporting(0);
include('config.php');
include('functions.php')
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <div class="right_col" role="main">
        <div class="">
            <div class="row top_tiles">
                <!-- </div>-->
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div>
                                <h2><i class="fa fa-wheelchair" style="color:black;font-size:22px;"
                                        aria-hidden="true"></i>&nbsp;&nbsp;Handicap / Womans Employee Grievance
                                    <small>List </small></h2>
                                <hr>
                                <div class="x_content">
                                    <table class="table table-striped table-bordered display" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>Grievance Ref.No.</th>
                                                <th>Employee No</th>
                                                <th>Employee Name</th>
                                                <th>Employee Type</th>
                                                <th>Category</th>
                                                <th>Lodge Date</th>
                                                <th>Uploaded By</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
											$cnt = 1;
											// $sql="Select emp.gender, e.emp_id,e.emp_mob,e.emp_name,e.emp_type,g.gri_ref_no,g.gri_type,g.gri_upload_date, g.uploaded_by, g.id from employee e INNER JOIN tbl_grievance g ON e.emp_id=g.emp_id INNER JOIN emp_master1 emp ON emp.emp_no = e.emp_id where g.status='1' AND emp.sex = 'M' AND g.gri_ref_no like 'WEL%' OR g.gri_ref_no != 'WEL%'";
											$sql = "Select e.gender,e.emp_no,e.mobile,e.name,e.empType,g.gri_ref_no,g.gri_type,g.gri_upload_date, g.uploaded_by, g.id from $db_common_name.register_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id where g.status='1' AND e.gender = 'M' AND g.gri_ref_no like 'WEL%' OR g.gri_ref_no != 'WEL%' group by g.id order by g.gri_upload_date DESC";
											$query = mysqli_query($db_egr,$sql);
											//$query=mysqli_query("Select emp.sex, e.emp_id,e.emp_mob,e.emp_name,e.emp_type,g.gri_ref_no,g.gri_type,g.gri_upload_date, g.uploaded_by, g.id from employee e INNER JOIN tbl_grievance g ON e.emp_id=g.emp_id INNER JOIN employee_master1 emp ON emp.emp_no = e.emp_id where g.status='1' AND emp.sex NOT LIKE 'F' AND g.gri_ref_no like 'WEL%' OR g.gri_ref_no NOT like 'WEL%'");

											while ($rw_data = mysqli_fetch_array($query)) {
												// print_r($rw_data);
												$emp_id = $rw_data["emp_no"];
												$emp_name = $rw_data["name"];
												$emp_type = get_type($rw_data["empType"]);
												$gri_ref_no = $rw_data["gri_ref_no"];
												$gri_type = get_Cat($rw_data["gri_type"]);
												$gri_upload_date = $rw_data["gri_upload_date"];
												$g_id = $rw_data["id"];
												if ($rw_data["uploaded_by"] == "NULL" || $rw_data["uploaded_by"] == "") {
													$uploaded_by = "Employee";
												} else {
													$uploaded_by = get_uploaded_user($rw_data["uploaded_by"]);
												}
												if (check_community($emp_id)) {
													if (check_handicap($emp_id)) {
														if (check_sex($emp_id)) {
															echo "<tr style='color: blue; background-color:pink'>";
															echo "<td>$gri_ref_no</td>";
															echo "<td>$emp_id</td>";
															echo "<td><i class='fa fa-female' style='color:black;font-size:20px;'aria-hidden='true'></i> <i class='fa fa-wheelchair' style='color:black;font-size:18px;'aria-hidden='true'></i> $emp_name</td>";
															echo "<td>$emp_type</td>";
															echo "<td>$gri_type</td>";
															echo "<td>$gri_upload_date</td>";
															echo "<td>" . $uploaded_by . "</td>";
															echo "<td><div class='btn-group' style='margin-top:-5px;width: 85px;'>
												<a  style='width:34px' id='" . $rw_data['id'] . "' href='gri_comp_detail.php?g_id=" . $rw_data['id'] . "' class='btn_show_center btn1 btn btn-info' value='" . $rw_data['id'] . "'><i class='fa fa-eye' aria-hidden='true'></i></a>
												</div>
												</td>";
															echo "</tr>";
															$cnt++;
														} else {
															echo "<tr style='color: blue;'>";
															echo "<td>$gri_ref_no</td>";
															echo "<td>$emp_id</td>";
															echo "<td><i class='fa fa-wheelchair' style='color:black;font-size:18px;'aria-hidden='true'></i> $emp_name</td>";
															echo "<td>$emp_type</td>";
															echo "<td>$gri_type</td>";
															echo "<td>$gri_upload_date</td>";
															echo "<td>" . $uploaded_by . "</td>";
															echo "<td><div class='btn-group' style='margin-top:-5px;width: 85px;'>
													<a  style='width:34px' id='" . $rw_data['id'] . "' href='gri_comp_detail.php?g_id=" . $rw_data['id'] . "' class='btn_show_center btn1 btn btn-info' value='" . $rw_data['id'] . "'><i class='fa fa-eye' aria-hidden='true'></i></a>
													</div>
													</td>";
															echo "</tr>";
															$cnt++;
														}
													} else {
														if (check_sex($emp_id)) {
															echo "<tr style='background-color:pink'>";
															echo "<td>$gri_ref_no</td>";
															echo "<td>$emp_id</td>";
															echo "<td><i class='fa fa-female' style='color:black;font-size:20px;'aria-hidden='true'></i> <i class='fa fa-wheelchair' style='color:black;font-size:18px;'aria-hidden='true'></i> $emp_name</td>";
															echo "<td>$emp_type</td>";
															echo "<td>$gri_type</td>";
															echo "<td>$gri_upload_date</td>";
															echo "<td>" . $uploaded_by . "</td>";
															echo "<td><div class='btn-group' style='margin-top:-5px;width: 85px;'>
												<a  style='width:34px' id='" . $rw_data['id'] . "' href='gri_comp_detail.php?g_id=" . $rw_data['id'] . "' class='btn_show_center btn1 btn btn-info' value='" . $rw_data['id'] . "'><i class='fa fa-eye' aria-hidden='true'></i></a>
												</div>
												</td>";
															echo "</tr>";
															$cnt++;
														} else {
															echo "<tr>";
															echo "<td>$gri_ref_no</td>";
															echo "<td>$emp_id</td>";
															echo "<td>$emp_name</td>";
															echo "<td>$emp_type</td>";
															echo "<td>$gri_type</td>";
															echo "<td>$gri_upload_date</td>";
															echo "<td>" . $uploaded_by . "</td>";
															echo "<td><div class='btn-group' style='margin-top:-5px;width: 85px;'>
													<a  style='width:34px' id='" . $rw_data['id'] . "' href='gri_comp_detail.php?g_id=" . $rw_data['id'] . "' class='btn_show_center btn1 btn btn-info' value='" . $rw_data['id'] . "'><i class='fa fa-eye' aria-hidden='true'></i></a>
													</div>
													</td>";
															echo "</tr>";
															$cnt++;
														}
													}
												} else { }
											}
											?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div>
                   <h2><i class="fa fa-female" style="color:black;font-size:20px;"aria-hidden="true"></i>&nbsp;&nbsp;Womans Grievance Complaints <small>List</small></h2><hr>
                 <div class="x_content">
					<table  class="table table-striped table-bordered display" style="width:100%;"> 
                      <thead>
                         <tr>
							<th>Sr.No</th>
							<th>Employee No</th>
							<th>Employee Name</th>
							<th>Mobile number</th>
							<th>Grievance Ref.No.</th>
							<th>Lodge Date</th>
							<th>Forwarded To</th>
							<th>Action</th>
						 </tr>
					  </thead>
                      <tbody>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
                           
                         </tbody>
                    </table>
                  </div>             
				  </div>
              </div>
            </div>
          </div-->
            </div>
        </div>
</head>
<style>
.para {
    color: white;
}
</style>

</html>
<?php
require_once('Global_Data/footer.php');
?>