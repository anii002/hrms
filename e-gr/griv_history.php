<?php include_once('global/header.php');
include_once('global/model.php');
include_once('config.php');
?>
<?php
function get_type($id)
{
	global $db_egr;
	// echo $id;
	if ($id > 0) {

		$fetch_type = mysqli_query($db_egr,"select type from emp_type where id='$id'",);
		$f_s = mysqli_fetch_array($fetch_type);
		return $states = $f_s['type'];
	} else {
		return "-";
	}
}
function get_office($id)
{
	global $db_egr;
	if ($id != 0) {
		$fetch_type = mysqli_query($db_egr,"select office_name from tbl_office where office_id='$id'" );
		$f_s = mysqli_fetch_array($fetch_type);
		return $states = $f_s['office_name'];
	} else {
		return "-";
	}
}
function get_dept($id)
{
	global $db_common;
	if ($id != 0) {
		$fetch_type = mysqli_query($db_common,"select DEPTDESC from department where DEPTNO='$id'", );
		$f_s = mysqli_fetch_array($fetch_type);
		return $states = $f_s['DEPTDESC'];
	} else {
		return "-";
	}
}
function get_desig($id)
{
	// echo $id;
	global $db_common;
	if ($id != '') {
		$fetch_type = mysqli_query($db_common,"select DESIGLONGDESC from designations where DESIGCODE='$id'");
		$f_s = mysqli_fetch_array($fetch_type);
		return $f_s['DESIGLONGDESC'];
	} else {
		return "-";
	}
}

function startsWith($string, $startString)
{
	$len = strlen($startString);
	return (substr($string, 0, $len) === $startString);
} ?>
<!-- Start: Header Section
        ================================ -->
<section class="header-section-1 bg-image-1 header-js" id="search">
    <div class="overlay-color img-responsive">
        <div class="container img-responsive responsive ">
            <div class="row section-separator" style="padding-top:100px;">
                <div class="col-md-10 col-md-offset-1 col-sm-10">
                    <form class="single-form" action="" method="POST">
                        <?php
						$f = 0;
						$cur_user = $_SESSION["user"];
						//echo "<script>alert('$cur_user');</script>";
						// $query_emp = "select * from register_user where emp_no='$cur_user'";
						// $resultset = mysqli_query($query_emp, $db_common);
						// $value_emp = mysqli_fetch_array($resultset);
						// // $sql = "select e.empType,e.emp_no,e.name,e.department,e.designation,e.mobile,e.emp_email,e.emp_aadhar,e.office,e.station,g.gri_type,g.gri_desc,g.up_doc,g.gri_upload_date,g.gri_ref_no,g.doc_id, g.status from $db_common_name.register_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id WHERE g.emp_id='$cur_user'";
						$sql = "select e.empType,e.emp_no,e.name,e.department,e.designation,e.mobile,e.emp_email,e.emp_aadhar,e.office,e.station,g.gri_type,g.gri_desc,g.up_doc,g.gri_upload_date,g.gri_ref_no,g.doc_id from $db_common_name.register_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id WHERE g.emp_id='$cur_user' order by g.gri_upload_date DESC";
						
						// echo $sql = "select e.empType,e.emp_no,e.name,e.department,e.designation,e.mobile,e.emp_email,e.emp_aadhar,e.office,e.station,g.gri_type,g.gri_desc,g.up_doc,g.gri_upload_date,g.gri_ref_no,g.doc_id from $db_common_name.register_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id WHERE e.emp_no='$cur_user'";

						$exe_query = mysqli_query($db_egr,$sql) or die(mysqli_error($db_egr));
						if (mysqli_num_rows($exe_query) > 0) {
							if ($result = mysqli_fetch_array($exe_query)) {
								// print_r($result);
								$f = 1;
								$emp_type = $result['empType'];
								$emp_id = $result['emp_no'];
								$emp_name = $result['name'];
								$emp_dept = $result['department'];
								$emp_desig = $result['designation'];
								$emp_mob = $result['mobile'];
								$emp_email = $result['emp_email'];
								$emp_aadhar = $result['emp_aadhar'];
								$office = $result['office'];
								$station = $result['station'];
								$gri_type = $result['gri_type'];
								$gri_desc = $result['gri_desc'];
								$up_doc = $result['up_doc'];
								$gri_upload_date = $result['gri_upload_date'];
								$gri_ref_no = $result['gri_ref_no'];
								$doc_path = $result['doc_id'];
							}

							?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-responsive table-hover " width="100%"
                                style="border-collapse:collapse">
                                <tr>
                                    <td colspan="4" style="text-align:Center;color:black"><b>Personal History</b></td>
                                </tr>
                                <tr>
                                    <td style="font-weight:800">Employee Type</td>
                                    <td><?php echo get_type($emp_type);
											?></td>
                                    <td style="font-weight:800">EmpId / PF No</td>
                                    <td><?php echo $emp_id; ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight:800">Employee Name</td>
                                    <td><?php echo $emp_name; ?></td>
                                    <td style="font-weight:800">Department</td>
                                    <td><?php echo get_dept($emp_dept); ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight:800">Designation</td>
                                    <td><?php echo get_desig($emp_desig); ?></td>
                                    <td style="font-weight:800">Mobile Number</td>
                                    <td><?php echo $emp_mob; ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight:800">E-mail id</td>
                                    <td><?php echo $emp_email; ?></td>
                                    <td style="font-weight:800">Aadhar Number</td>
                                    <td><?php echo $emp_aadhar; ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight:800">Office</td>
                                    <td><?php echo get_office($office); ?></td>
                                    <td style="font-weight:800">Station</td>
                                    <td><?php echo $station; ?></td>
                                </tr>
                            </table>

                            <h4>Grievance History</h4>
                            <table class="table display table-bordered table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th>Griv. Ref. No.</th>
                                        <th>Remark</th>
                                        <th>Date</th>
                                        <!--th>Action</th-->
                                        <th>Status</th>
                                        <th>Document Link</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
										function get_user1($first_id)
										{
											global $db_egr;
											$first_user = mysqli_query($db_egr,"select user_name from tbl_user where user_id=$first_id");
											while ($user_first = mysqli_fetch_array($first_user)) {
												$f_user = $user_first['user_name'];
											}
											return $f_user;
										}
										function get_user2($second_id)
										{
											global $db_egr;
											$second_user = mysqli_query($db_egr,"select user_name from tbl_user where user_id=$second_id");
											while ($user_second = mysqli_fetch_array($second_user)) {
												$s_user = $user_second['user_name'];
											}
											return $s_user;
										}
										function get_status($status)
										{
											global $db_egr;
											$sql1 = mysqli_query($db_egr,"select status from status where id=$status");
											while ($sql_query1 = mysqli_fetch_array($sql1)) {
												$status_fetch = $sql_query1['status'];
											}
											return $status_fetch;
										}
										function get_action($action)
										{
											global $db_egr;
											$f_action = mysqli_query($db_egr,"select action from action where id=$action");
											while ($action_f = mysqli_fetch_array($f_action)) {
												$a_c = $action_f['action'];
											}
											return $a_c;
										}
										$fire_all = mysqli_query($db_egr,"select  * from tbl_grievance where emp_id='$cur_user' order by gri_upload_date desc");
										//echo "select  * from tbl_grievance where emp_id='$cur_user'";
										while ($all_fetch = mysqli_fetch_array($fire_all)) {
											$gri_ref_no = $all_fetch['gri_ref_no'];
											$forwarded_date = $all_fetch['gri_upload_date'];
											$remark = $all_fetch['gri_desc'];
											//$return_action=get_action($all_fetch['action']);
											$status = get_status($all_fetch['status']);
											$doc_id = $all_fetch['doc_id'];
											$uploaded_by = $all_fetch["uploaded_by"];
											$cur_user = startsWith($gri_ref_no, 'W') ? $uploaded_by : $cur_user;
											echo "<tr>";
											echo "<td>$gri_ref_no</td>";
											echo "<td>$remark</td>";
											echo "<td>$forwarded_date</td>";
											//	echo "<td>$return_action</td>";
											echo "<td>$status</td>";
											$sql_doc_sec = mysqli_query($db_egr,"select * from doc where griv_ref_no='$gri_ref_no' and uploaded_by='$cur_user'");
											echo "<td>";
											$count_doc = 1;
											$cnt = 0;
											while ($doc_fetch = mysqli_fetch_array($sql_doc_sec)) {
												//echo $doc_fetch['doc_path'];
												echo "<a href='admin/main/admin_upload/" . $doc_fetch['doc_path'] . "' target='_blank' id='" . $cnt . "' name='" . $cnt . "' >DOC&nbsp;&nbsp;&nbsp;</a>";
												$cnt++;
											}
											if (mysqli_num_rows($sql_doc_sec) > 0) {
												$count_doc++;
											}

											echo "</td>";
											//echo "<td>$doc_id</td>";
											//  style='background:#5bc0de;min-width: 100px;    line-height: 25px;'
											echo "<td><a href='griv_history_detail.php?griv_no=" . $all_fetch['gri_ref_no'] . "' class='btn btn-fill btn-primary'><i class='fa fa-eye' aria-hidden='true'></i> View</a></td>";
											echo "</tr>";
										}
										?>
                                </tbody>
                            </table>
                        </div>
                        <?php } else { ?>
                        <h4>Sorry No History Found.</h4>
                        <?php } ?>

                    </form>
                </div> <!-- End: .part-1 -->
            </div> <!-- End: .row -->
        </div> <!-- End: .container -->
    </div> <!-- End: .overlay-color -->
    <br><br>
    <center style="padding-bottom:20px;">
        <a href="index.php" style="text-decoration: underline; ">
            Click here to go Home Page
        </a>
    </center>
</section>
<!-- End: Header Section
			================================ -->
<?php include_once('global/footer.php'); ?>
<script>
$(document).ready(function() {
    $('.nav-menu .menu-active').removeClass('menu-active');
    // $(container).closest('li').addClass('menu-active');
    $('#griv_history').addClass('menu-active');
    var flag = '<?php echo $f; ?>';
    // alert(flag);
    if (flag != 1) {
        var docHeight = $(window).height();
        var footerHeight = $('footer').height();
        var footerTop = $('footer').position().top + footerHeight;
        if (footerTop < docHeight) {
            $('footer').css('margin-top', 10 + (docHeight - footerTop) + 'px');
        }
    }
});
</script>