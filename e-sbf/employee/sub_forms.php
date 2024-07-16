<?php
	
	$GLOBALS['flag']="1.4";
	include('common/header.php');
	include('common/sidebar.php');
	require_once '../dbconfig/dbcon.php';
?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Submitted Forms / प्रस्तुत प्रपत्र
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="index.php">Home / मुख पृष्ठ</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="sub_forms.php">Submitted Forms / प्रस्तुत प्रपत्र</a>
				</li>
			</ul>
			<div class="page-toolbar">
				<div id="" class="pull-right tooltips btn btn-fit-height grey-salt">
					<i class=""></i> <span><?php echo date('d-m-Y h:i A'); ?></span>
					
				</div>
			</div>
		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN DASHBOARD STATS -->
		<div class="row">
			
			<?php
				$pf_no = $_SESSION['username'];
				$conn=dbcon();
				$sql = "SELECT reference_id,scheme_id, created_at, scheme_id FROM tbl_form_details WHERE emp_no = '$pf_no' AND status = 0";
				$result = mysqli_query($conn,$sql);
			?>
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				
				<table id="example1" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>Sr No</th>
							<th>Scheme</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; while($row = mysqli_fetch_assoc($result)) { ?>
						<tr class="odd gradeX">
							<td><?php echo $i++; ?></td>
							<td>
								<?php
								$sc_id = $row['scheme_id'];
								$sql_scheme = "SELECT scheme_name FROM tbl_master_form WHERE id = '$sc_id'";
								$result_scheme = mysqli_query($conn,$sql_scheme);
								$row_scheme = mysqli_fetch_assoc($result_scheme);
								echo $row_scheme['scheme_name'];
								?>
							</td>
							<td><?php echo date('d-m-Y', strtotime($row['created_at'])); ?></td>
							<td>
								<a href="view_form.php?ref=<?php echo $row['reference_id']; ?>" class="btn btn-info" target="_blank">View</a>
								<a href="update_form.php?ref=<?php echo $row['reference_id']; ?>" class="btn btn-success">Update</a>
								<a href="delete_form.php?ref=<?php echo $row['reference_id']; ?>" class="btn btn-danger">Delete</a>
								<a href="print.php?scheme_id=<?php echo $row['scheme_id']; ?>&ref=<?php echo $row['reference_id']; ?>" class="btn green" target="_blank">Print Preview</a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
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