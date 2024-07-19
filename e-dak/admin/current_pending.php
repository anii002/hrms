<?php
$GLOBALS['flag'] = "1.9";
include('common/header.php');
include('common/sidebar.php');

?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->

		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="index.php">Home </a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="#">Pending List</a>
				</li>
			</ul>

		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN DASHBOARD STATS -->
		<div class="row">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-book"></i>Pending List
					</div>

				</div>
				<div class="portlet-body form">
					<div class="form-body">
						<table class="table table-bordered table-hover" id="example1">
							<thead>
								<tr>
									<th>SR No</th>
									<th>Unique DAK No.</th>
									<th>Gist of Letter</th>
									<th>Marked TO</th>
									<th>Forwarded Date</th>
									<th>Source</th>
									<th>Status</th>
									<th>Month & Days</th>
									<!-- <th>Action</th> -->

								</tr>
							</thead>
							<tbody>
<?php
$today_date = date('Y-m-d');

$query_src = "SELECT *, DATEDIFF('".$today_date."', curr_date) as days 
              FROM tbl_dak_forward, tbl_dak 
              WHERE tbl_dak.unique_dak_no = tbl_dak_forward.unique_dak_no 
              AND tbl_dak_forward.status = '1' 
              GROUP BY tbl_dak.unique_dak_no";
$result_src = mysqli_query($db_edak, $query_src);
$sr = 1;
while ($value_src = mysqli_fetch_array($result_src)) {
    // Ensure days_diff is a valid integer
    $days_diff = (int)$value_src['days'];

    // Debugging: Print the days_diff to ensure it is correct
    // echo "Days Diff: " . $days_diff . "<br>";

    try {
        // Create DateInterval with days_diff
        $start_date = new DateTime();
        $end_date = (clone $start_date)->add(new DateInterval("P{$days_diff}D"));
        $dd = $start_date->diff($end_date);

        $months = $dd->m;
        $days = $dd->d;
    } catch (Exception $e) {
        // Handle any exceptions and provide fallback values
        $months = 0;
        $days = 0;
        // Optionally log or display the error message
        // echo "Error: " . $e->getMessage();
    }

    echo "
    <tr>
        <td>" . $sr++ . "</td>
        <td>" . $value_src['unique_dak_no'] . "</td>
        <td>" . $value_src['gist_of_letter'] . "</td>
        <td>" . getSectionMarked($value_src['marked_to']) . "</td>
        <td>" . $value_src['forwarded_date'] . "</td>
        <td>" . getSource($value_src['source']) . "</td>
        <td class='text-danger'>" . getStatus($value_src['status']) . "</td>
        <td>" . $months . " months, " . $days . " days" . "</td>
    </tr>";
}
?>
</tbody>

						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END DASHBOARD STATS -->
	<div class="clearfix">
	</div>
</div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php
include('common/footer.php');
?>