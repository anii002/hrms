<?php
$GLOBALS['flag'] = "4.7";
include('common/header.php');
include('common/sidebar.php');
include('control/function.php');
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
					<a href="#">दावा किए गए यात्रा भत्ता / Employee Claimed TA</a>
				</li>
			</ul>

		</div>

		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption col-md-6">
					<b>दावा किए गए यात्रा भत्ता / Employee Claimed TA</b>
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
											<table id="example1" class="table table-hover table-bordered display">
												<thead>
													<tr class="warning">
														<th>संदर्भ संख्या / Reference 567 <?php echo $_SESSION['role']; ?> ID</th>
														<th>नाम / Name</th>
														<th>साल / Year</th>
														<th>माह / Month</th>
														<th>दूरी / Distan</th>
														<th>राशि / Amount</th>
														<th>लागू तिथि / Applied Month</th>
														<th style="width:145px;">कार्रवाई / Action</th>
													</tr>
												</thead>
												<tbody>
    <?php
    if ($_SESSION['role'] == '3') {
        $query = "SELECT MONTHNAME( str_to_date(taentry_master.created_date,'%d/%m/%Y') ) as created, taentry_master.reference_no, taentry_master.TAYear,taentry_master.empid as empid, taentry_master.TAMonth, SUM(taentrydetails.distance) AS distance, SUM(taentrydetails.amount) as rate FROM taentry_master INNER JOIN taentrydetails ON taentry_master.reference_no = taentrydetails.reference_no WHERE taentry_master.reference_no IN (select reference_id from forward_data where forward_data.fowarded_to='" . $_SESSION['empid'] . "' AND forward_data.depart_time is null AND admin_approve='0') group by taentry_master.reference_no";
    } else {
        $query = "SELECT MONTHNAME( str_to_date(taentry_master.created_date,'%d/%m/%Y') ) as created, taentry_master.reference_no, taentry_master.TAYear,taentry_master.empid as empid, taentry_master.TAMonth, SUM(taentrydetails.distance) AS distance, SUM(taentrydetails.amount) as rate FROM taentry_master INNER JOIN taentrydetails ON taentry_master.reference_no = taentrydetails.reference_no WHERE taentry_master.reference_no IN (select reference_id from forward_data where forward_data.fowarded_to='" . $_SESSION['empid'] . "' AND forward_data.depart_time is null AND admin_approve='0') group by taentry_master.reference_no";
    }

    $result = mysqli_query($conn, $query);

    if ($result) {
        while ($val = mysqli_fetch_array($result)) {
            if ($val['reference_no'] != null) {
                $date_query = "SELECT arrived_time FROM `forward_data` WHERE fowarded_to='" . $_SESSION['empid'] . "' AND reference_id='" . $val['reference_no'] . "' ";
                $row_date = mysqli_query($conn, $date_query); // Corrected usage of mysqli_query

                if ($row_date) {
                    $row_date = mysqli_fetch_array($row_date);
                    echo "
                        <tr>
                            <td>" . $val['reference_no'] . "</td>
                            <td>" . get_employee($val['empid']) . "</td>
                            <td>" . $val['TAYear'] . "</td>
                            <td>" . $val['TAMonth'] . "</td>
                            <td>" . $val['distance'] . "</td>
                            <td>" . $val['rate'] . "</td>
                            <td>" . $row_date['arrived_time'] . "</td>
                            <td>
                                <a href='show_seperate_claim_1.php?ref_no=" . $val['reference_no'] . "&empid=" . $val['empid'] . "' class='btn btn-primary'>Show</a>
                                <a href='emp-track-modul.php?ref_no=" . $val['reference_no'] . "' class='btn green btn_action'>Track</a>
                            </td>
                        </tr>
                    ";
                }
            }
        }
    } else {
        echo "Query execution failed: " . mysqli_error($conn);
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
<?php
include 'common/footer.php';
?>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js" type="text/javascript"></script>