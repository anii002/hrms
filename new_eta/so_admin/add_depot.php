<?php
$GLOBALS['flag'] = "2.2";
include('common/header.php');
include('common/sidebar.php');

function getdepartment($id)
{
	global $conn;
	$query = "select * from department where DEPTNO='$id'";
	$result = mysqli_query($conn, $query);
	$value = mysqli_fetch_array($result);
	return $value['DEPTDESC'];
}


function fetch_station($code)
{
global $conn;
	$query = "select stationcode,stationdesc from station where stationcode='$code'";
	$result = mysqli_query($conn, $query);
	$value = mysqli_fetch_array($result);
	return $value['stationdesc'];
}
?>

<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="index.php">Home / मुख पृष्ठ</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="#">डिपो मास्टर जोड़ें / Add Depot Master</a>
				</li>
			</ul>

		</div>
		<!-- <h1>ecefce</h1> -->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-book"></i>डिपो मास्टर जोड़ें / Add Depot Master
				</div>

			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="control/adminProcess.php?action=AddDepotmaster" method="post" autocomplete="off" class="horizontal-form">
					<input type="hidden" name="deptid" id="deptid" value="<?php echo $_SESSION['dept']; ?>" />
					<div class="form-body">

						<div class="row">

							<div class="col-md-6 billunitzindex">
								<div class="form-group">
									<label class="control-label">स्टेशन / Station</label>

									<select class="form-control select2" style="width: 100%;" tabindex="-1" id="stationcode" name="stationcode" autofocus="true" required>
										<option value="" selected disabled>Select Station</option>
										<?php
										$query_emp = "select stationcode,stationdesc from station";
										$result_emp = mysqli_query($conn, $query_emp);
										while ($value_emp = mysqli_fetch_assoc($result_emp)) {
											echo "<option value='" . $value_emp['stationcode'] . "'>" . $value_emp['stationdesc'] . "</option>";
										}
										?>
									</select>

								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">डिपो / Depot </label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fas fa-edit "></i>
										</span>
										<input type="text" class="form-control" id="depotname" name="depotname" placeholder="Depot Name" required>
									</div>
								</div>
							</div>
							<!--/span-->

							<!--/span-->
						</div>

					</div>
					<div class="form-actions right">
						<button type="reset" class="btn default">Cancel</button>
						<button type="submit" class="btn blue submit_btn" name='button'><i class="fa fa-check"></i> प्रस्तुत करे / Submit</button>
					</div>
				</form>
				<!-- END FORM-->
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption col-md-6">
							<b>डिपो नाम / Depot List</b>
						</div>
						<div class="caption col-md-6 text-right backbtn">
							<a href="#."></a>
						</div>
					</div>
					<div class="portlet-body form">

						<form method="POST">
							<div class="form-body add-train">
								<div class="row add-train-title">
									<div class="col-md-12">
										<div class="form-group">

											<div class="portlet-body">
												<div class="table-scrollable summary-table">
													<table id="example1" class="table table-hover table-bordered display">
														<thead>
															<tr class="warning">
																<th>अनु क्रमांक<br>ID</th>
																<th>स्टेशन कोड<br>Station code</th>
																<th>डिपो नाम<br>Depot Name</th>
																<th>विभाग<br>Department Name</th>
																<th>कार्रवाई / Action</th>
															</tr>

														</thead>
														<tbody>
															<?php
															$query_emp = "select * from depot_master where dept_id='" . $_SESSION['dept'] . "'";
															$result_emp = mysqli_query($conn,$query_emp);
															//echo mysqli_error();
															$sr = 1;
															while ($value_emp = mysqli_fetch_assoc($result_emp)) {
																echo "<tr>";
																echo "<td>" . $sr++ . "</td>";
																echo "<td>" . fetch_station($value_emp['stationcode']) . "</td>";
																// echo "<td>".$stdesc."</td>";
																echo "<td>" . $value_emp['depot'] . "</td>";
																echo "<td>" . getdepartment($value_emp['dept_id']) . "</td>";
																// echo "<td><button value='".$value_emp['id']."' class='btn btn-primary changerole'>Change Role</button>";
																if ($value_emp['status'] == '0') {
																	echo "<td><button value='" . $value_emp['id'] . "' class='btn btn-warning activeDepot' style='margin-left:10px;'>Active</button></td>";
																} else {
																	echo "<td><button value='" . $value_emp['id'] . "' class='btn btn-danger deactiveDepot' style='margin-left:10px;'>Deactive</button></td>";
																}
																echo "</tr>";
															}
															?>
														</tbody>
													</table>
												</div>
												<div class="text-right">
													<!-- <button class="btn yellow">Print</button> -->
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include 'common/footer.php';
?>
<script>
	$(document).on("click", ".activeDepot", function(e) {
		e.preventDefault();
		var id = $(this).val();
		var result = confirm("Confirm!!! proceed for depot activation?");
		if (result == true) {
			$.ajax({
					url: 'control/adminProcess.php',
					type: 'POST',
					data: {
						action: 'activeDepot',
						id: id
					},
				})
				.done(function(html) {
					alert(html);
					window.location = "add_depot.php";
				});
		}
	});
	$(document).on("click", ".deactiveDepot", function(e) {
		e.preventDefault();
		var id = $(this).val();
		var result = confirm("Confirm!!! proceed for depot deactivation?");
		if (result == true) {
			$.ajax({
					url: 'control/adminProcess.php',
					type: 'POST',
					data: {
						action: 'deactiveDepot',
						id: id
					},
				})
				.done(function(html) {
					alert(html);
					window.location = "add_depot.php";
				});
		}
	});
</script>