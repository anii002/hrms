<?php
$GLOBALS['flag'] = "1.4";
include('common/header.php');
include('common/sidebar.php');
?>

<div class="page-content-wrapper">
	<div class="page-content">


		<!-- <h1>ecefce</h1> -->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-book"></i> Add New Rules & Regulation
				</div>

			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="control/adminProcess.php?action=addRule" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
					<div class="form-body">
						<!-- <h3 class="form-section">Add User</h3> -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Title</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fas  fa-user"></i>
										</span>
										<input type="text" class="form-control" id="title" name="title" placeholder="Enter Rule Name or Title" required>
									</div>
								</div>
							</div>
							<!--/span-->

							<!--/span-->
						</div>
						<!--/row-->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Upload File </label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fas fa-envelope"></i>
										</span>
										<input type="file" class="form-control" id="upload" name="upload" placeholder=" ">
									</div>
								</div>
							</div>
							<!--/span-->

							<!--/span-->
						</div>
					</div>
					<div class="form-actions right">
						<button type="submit" class="btn blue submit_btn" id='submit_btn' name='button'><i class="fa fa-check"></i> Submit</button>&nbsp;
						<button type="button" class="btn default">Cancel</button>

					</div>
				</form>
				<!-- END FORM-->
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN EXAMPLE TABLE PORTLET-->
				<div class="portlet box blue-hoki">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-globe"></i>Uploaded Rules & Regulation List
						</div>
						<div class="tools">
						</div>
					</div>
					<div class="portlet-body">
						<table class="table table-bordered table-hover" id="example1">
							<thead>
								<tr>
									<th>SR No</th>
									<th>Title</th>
									<th>Files</th>
									<th>Action</th>

								</tr>
							</thead>
							<tbody>
								<?php
								$query_emp = "SELECT * from rules_n_regulations";
								$result_emp = mysqli_query($con,$query_emp);
								$sr = 1;
								while ($value_emp = mysqli_fetch_array($result_emp)) {

									echo "
								<tr>
								<td>" . $sr++ . "</td>
								<td>" . $value_emp['title'] . "</td>
								
								<td>";

									//echo "<a target='_blank'  id='".$value_emp['uploaded_file_path']."' value='".$value_emp['uploaded_file_path']."'>'".$value_emp['uploaded_file_path']."'</a>";

									echo "<a href='../rules&regulation/" . $value_emp['rules_path'] . "' target='_blank'>" . $value_emp['rules_path'] . "</a></td>";

									echo "<td><button value='" . $value_emp['id'] . "' class='btn btn-danger active' style='margin-left:10px;'>Remove</button></td>";
									echo "</tr>
								";
								}



								?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- END EXAMPLE TABLE PORTLET-->
			</div>
		</div>

	</div>
</div>
<?php
include 'common/footer.php';
?>

<script type="text/javascript">
	$(document).on("click", ".active", function() {
		var id = $(this).val();
		var result = confirm("Confirm!!! Proceed for Remove File?");
		if (result == true) {
			$.ajax({
					url: 'control/adminProcess.php',
					type: 'POST',
					data: {
						action: 'removeRuleFile',
						id: id
					},
				})
				.done(function(html) {
					//alert(html);
					//window.location="add_question_syllabus.php";
					if (html == 1) {
						alert('Successfully Removed file...');
						window.location = 'add_rulenregulation.php';
					} else {
						alert('Failed to  Remove file...');
						window.location = 'add_rulenregulation.php';
					}
				});
		}
	});
</script>