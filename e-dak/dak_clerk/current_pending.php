<?php
$GLOBALS['flag'] = "1.9";
include('common/header.php');
include('common/sidebar.php');
// if($_SESSION['role']=="0")
// {

// include('common/sidebar.php');
// }
// else if($_SESSION['role']=="1")
// {
// include('../dak_clerk/common/sidebar.php');
// }
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
								$today_date=date('Y-m-d');

								$days = 151;



								$query_src = "SELECT *,source,DATEDIFF('".$today_date."',curr_date) as days from tbl_dak_forward,tbl_dak where tbl_dak.unique_dak_no=tbl_dak_forward.unique_dak_no and tbl_dak_forward.status='1' GROUP BY tbl_dak.unique_dak_no ";
								// order by tbl_dak.id desc
								$result_src = mysql_query($query_src, $db_edak);
								$sr = 1;
								while ($value_src = mysql_fetch_array($result_src)) {

									echo "
								<tr>
								<td>" . $sr++ . "</td>
								<td>" . $value_src['unique_dak_no'] . "</td>
								<td>" . $value_src['gist_of_letter'] . "</td>
								<td>" . getSectionMarked($value_src['marked_to']) . "</td>
								<td>" . $value_src['forwarded_date'] . "</td>
								<td>" . getSource($value_src['source']) . "</td>
								<td class='text-danger'>" . getStatus($value_src['status']) . "</td>";

								$start_date = new DateTime();
								$end_date = (new $start_date)->add(new DateInterval("P{$value_src['days']}D") );
								$dd = date_diff($start_date,$end_date);
								
								echo "<td >" .$dd->m." months ,".$dd->d." days". "</td>
								
								";

									//echo "<a target='_blank'  id='".$value_emp['uploaded_file_path']."' value='".$value_emp['uploaded_file_path']."'>'".$value_emp['uploaded_file_path']."'</a>";

									echo "</tr>
								";
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