<?php
$GLOBALS['flag'] = "5.9";
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
						<i class="fa fa-book"></i> Add Master Source
					</div>

				</div>
				<div class="portlet-body form">
					<div class="form-body">
						<!-- <h3 class="form-section">Add User</h3> -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Select Reply Status</label>

									<select name="r_status" id="r_status" class="select2me form-control r_status" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
										<option selected disabled>--Select Status--</option>
										<?php

										$query_rply = mysqli_query($db_edak,"SELECT * from replied_status");

										while ($value_rply = mysqli_fetch_array($query_rply)) {
											echo "<option value='" . $value_rply['id'] . "'>" . $value_rply['status'] . "</option>";
										}

										?>
									</select>


								</div>
							</div>
						</div>
					</div>
					<div class="form-actions left">
						<button type="submit" class="btn blue submit_btn" id='submit_btn' name='button'><i class="fa fa-check"></i> Submit</button>&nbsp;
						<button type="button" Onclick="history.go(-1)" class="btn default">Cancel</button>

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
<script>
	// $("#r_status").select2({
	// 	placeholder: 'Select ssa',
	// 	allowClear: true
	// });
</script>