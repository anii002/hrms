<?php
$GLOBALS['flag'] = "5.11";
include('common/header.php');
include('common/sidebar.php');
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
					<a href="#">Claimed Contigency List</a>
				</li>
			</ul>

		</div>
		<!-- <h1>ecefce</h1> -->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption col-md-6">
					<b> Claimed Contigency List</b>
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
									<!-- <label class="control-label"><h4 class="">Statement Showing the summery of TA & Contingency Bills For the Month of September-2018 </h4></label> -->
									<div class="portlet-body">
										<div class="table-scrollable summary-table">
											<table id="example" class="table table-hover table-bordered display">
												<thead>
													<tr class="warning">
														<!-- <th rowspan="2" valign="top">Sr No</th> -->
														<th>संदर्भ संख्या / Reference No.</th>
														<th>साल / Year</th>
														<th>माह / Month</th>
														<th>राशि / Amount</th>
														<th class="hidden-print">कार्य / Action</th>
													</tr>
												</thead>
												<tbody>
													<?php



													$qry = mysqli_query($conn,"SELECT `reference`, `month`, `year`, `total_amount` FROM `continjency_master` WHERE forward_status = '1' AND  empid = '" . $_SESSION['empid'] . "'");
													while ($row = mysqli_fetch_array($qry)) {



													?>
														<tr>
															<!-- <td>01</td> -->
															<td><?php echo $row['reference']; ?></td>
															<td><?php echo $row['year']; ?> </td>
															<td> <?php echo $row['month']; ?></td>
															<td><?php echo $row['total_amount']; ?></td>

															<td><a href="claimed_conti.php?ref_no=<?php echo $row['reference']; ?>" class="btn green btn_action">Show</a></td>
														</tr>
													<?php }  ?>
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
<?php
include 'common/footer.php';
?>

<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable({
			dom: 'Bfrtip',
			buttons: [
				'copyHtml5',
				'excelHtml5',
				'csvHtml5',
				'pdfHtml5'
			]
		});
	});
</script>

<!-- <script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script> -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js" type="text/javascript"></script>