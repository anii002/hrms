<?php
$GLOBALS['flag'] = "1.2";
include('common/header.php');
include('common/sidebar.php');
?>


<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<!-- 
			<h3 class="page-title">
			Dashboard / डॅशबोर्ड<small>reports & statistics</small>
			</h3> -->
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="index.php">Home </a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="#">Registering</a>
				</li>
			</ul>
		</div>

		<div class="row">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-book"></i> Add DAK Letters
					</div>

				</div>
				<div class="portlet-body form">
					<form action="control/adminProcess.php?action=add_edak" method="post" autocomplete="off">
						<input type="hidden" id="eid" name="eid">
						<div class="form-body">
							<!-- <h3 class="form-section">Add User</h3> -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Unique DAK No.</label>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fas  fa-user"></i>
											</span>
											<input type="text" class="form-control" id="u_dak_no" name="u_dak_no" value="" readonly>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Received From </label>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fas  fa-user"></i>
											</span>
											<input type="text" class="form-control " id="rd_from" name="rd_from" placeholder="Enter record from" required>
										</div>
									</div>
								</div>

								<!--/span-->
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Date of Letter</label>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fas fa-envelope"></i>
											</span>
											<input type="text" class="form-control txtrdfrom" id="dt_letter" name="dt_letter" placeholder="Select date of letter" required>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Gist of Letter</label>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fas fa-envelope"></i>
											</span>
											<textarea class="form-control" id="gist_letter" name="gist_letter" rows="3" required></textarea>
											<!-- <input type="text" class="form-control" id="gist_letter" name="gist_letter" placeholder="Enter Gist of letter"> -->
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<!--/row-->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Marked To</label>

										<select name="marked_to" id="marked_to" class="form-control select2me billunitindex" style="width: 100%;" tabindex="-1" required>
											<option value="" selected="" disabled="">Select Marked To</option>

											<?php

											$query_role = mysqli_query($db_edak,"SELECT * from tbl_section");

											while ($value_role = mysqli_fetch_array($query_role)) {
												echo "<option value='" . $value_role['sec_id'] . "'>" . $value_role['sec_name'] . "</option>";
											}

											?>
										</select>


									</div>
								</div>

								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Date</label>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fas fa-envelope"></i>
											</span>
											<input type="text" id="cur_date" name="cur_date" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<!--/row-->

							<!--/row-->
							<div class="row">


								<div class="col-md-6" id="section1">
									<div class="form-group">
										<label class="control-label">Source </label>

										<select name="src" id="src" class="select2me form-control billunitindex" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
											<option value="" selected disabled>Select Source</option>
											<?php

											$query_src = mysqli_query($db_edak,"SELECT id,src_name from master_source");

											while ($value_src = mysqli_fetch_array($query_src)) {
												echo "<option value='" . $value_src['id'] . "'>" . $value_src['src_name'] . "</option>";
											}

											?>
										</select>


									</div>
								</div>
								<!--/span-->

								<!--/span-->
							</div>


						</div>
						<div class="form-actions left">
							<button type="submit" class="btn blue submit_btn" id='submit_btn' name='button'><i class="fa fa-check"></i> Forward</button>&nbsp;
							<button type="button" class="btn default">Cancel</button>

						</div>
					</form>
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
	$(function() {

		$('.txtrdfrom').datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true
		});

	});

	$(document).on("change", "#marked_to", function() {
		var e = document.getElementById("marked_to");
		var strUser = e.options[e.selectedIndex].value;
		//alert(strUser);
		$.ajax({
				url: 'control/adminProcess.php',
				type: 'POST',
				data: {
					action: 'fetch_empid',
					id: strUser
				},
			})
			.done(function(html) {
				//alert(html);
				var data = JSON.parse(html);

				$("#eid").val(data.emp_id);


			});
	});
</script>