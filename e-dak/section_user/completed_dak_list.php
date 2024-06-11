<?php
$GLOBALS['flag'] = "4.10";
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
					<a href="#">Completed DAK List</a>
				</li>
			</ul>

		</div>
		<div class="row">
		    <div class="col-md-12">
			    <div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-book"></i> Add Master Source
					</div> 
				</div>
				<div class="portlet-body form">
					<div class="form-body">
						<div class="table-responsive">
							<table class="table table-bordered table-hover" id="example1">
								<thead>
									<tr>
										<th style="width: 10px">SR No</th>
										<th style="width: 20px">Unique DAK No.</th>
										<th style="width: 20px">Recd From</th>
										<th style="width: 20px">Dt. Of Letter</th>
										<th style="width: 20px">Gist Of Letter</th>
										<th style="width: 30px">Marked TO</th>
										<th style="width: 30px">Date</th>
										<!-- <th style="width: 30px">Acknolegement</th> -->
										<th style="width: 30px">Reply</th>
										<th style="width: 30px">Source</th>
										<!-- <th>Action</th> -->

									</tr>
								</thead>
								<tbody>
									<?php
									$query_src = "SELECT * from tbl_dak where status='2' and marked_to='" . $_SESSION['emp_id'] . "'";
									$result_src = mysql_query($query_src, $db_edak);
									$sr = 1;
									while ($value_src = mysql_fetch_array($result_src)) {

										echo "
								<tr>
								<td>" . $sr . "</td>
								<td>" . $value_src['unique_dak_no'] . "</td>
								<td>" . $value_src['recd_from'] . "</td>
								<td>" . $value_src['dt_of_letter'] . "</td>
								<td>" . $value_src['gist_of_letter'] . "</td>
								<td>" . getSectionMarked($value_src['marked_to']) . "</td>
								<td>" . $value_src['curr_date'] . "</td>
								<td>" . getReplied($value_src['replied']) . "</td>
								<td>" . getSource($value_src['source']) . "</td>
								
								";
										$sr++;
										//echo "<a target='_blank'  id='".$value_emp['uploaded_file_path']."' value='".$value_emp['uploaded_file_path']."'>'".$value_emp['uploaded_file_path']."'</a>";

										// echo "<td><button value='".$value_src['id']."' class='btn btn-info active' style='margin-left:10px;'>Forward</button>";
										// echo "<button value='".$value_src['id']."' class='btn btn-info active' style='margin-left:10px;'>Update</button>";
										// echo "<button value='".$value_src['id']."' class='btn btn-danger active' style='margin-left:10px;'>Remove</button></td>";
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