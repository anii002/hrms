<?php
	
	$GLOBALS['flag']="1.5";
	include('common/header.php');
	include('common/sidebar.php');
	require_once '../dbconfig/dbcon.php';
?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Forwarded Forms / अग्रेषित फॉर्म
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="index.php">Home / मुख पृष्ठ</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="for_form.php">Forwarded Forms / अग्रेषित फॉर्म</a>
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
					dbcon();
				$sql = "SELECT emp_no,reference_id,ref_id, scheme_id, created_at FROM tbl_form_details INNER JOIN tbl_form_forward ON tbl_form_details.reference_id = tbl_form_forward.ref_id WHERE tbl_form_forward.forwarded_to = '$pf_no' AND tbl_form_details.status = 1 AND tbl_form_forward.fw_status = 1";
				$result = mysql_query($sql);
			?>
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				
				<table id="example1" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>Sr No</th>
							<th>PF No</th>
							<th>Employee Name</th>
							<th>Scheme</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; while($row = mysql_fetch_assoc($result)) { 
							dbcon1(); 
							$sql_name = mysql_query("SELECT name FROM resgister_user WHERE emp_no = '".$row['emp_no']."'");
							$row_name = mysql_fetch_array($sql_name);?>
						<tr class="odd gradeX">
							<td><?php echo $i++; ?></td>
							<td><?php echo $row['emp_no']; ?></td>
							<td><?php echo $row_name['name']; ?></td>
							<td>
								<?php
								$sc_id = $row['scheme_id'];
								dbcon();
								$sql_scheme = "SELECT scheme_name FROM tbl_master_form WHERE id = '$sc_id'";
								$result_scheme = mysql_query($sql_scheme);
								$row_scheme = mysql_fetch_assoc($result_scheme);
								echo $row_scheme['scheme_name'];
								?>
							</td>
							<td><?php echo date('d-m-Y', strtotime($row['created_at'])); ?></td>
							<td>
								<a href="view_form.php?ref=<?php echo $row['ref_id'];?>&emp_no=<?php echo $row['emp_no'];?>" class="btn btn-info">View</a>
								<a href="print.php?scheme_id=<?php echo $row['scheme_id'];?>&emp_pf=<?php echo $row['emp_no']; ?>&ref=<?php echo $row['ref_id'];?>" class="btn green">Print Preview</a>
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