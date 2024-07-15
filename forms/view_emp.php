<?php
$GLOBALS['flag'] = "5.4";
include('common/header.php');
include('common/sidebar.php');
$con1 = dbcon1();
?>

<div class="page-content-wrapper">
	<div class="page-content">
		<!-- <h1>ecefce</h1> -->
		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN EXAMPLE TABLE PORTLET-->
				<div class="portlet box blue-hoki">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-globe"></i>Forms List
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
									<th>Action</th>
									<!--<th>Action</th>-->
								</tr>
							</thead>
							<tbody>
								<?php
								$con1 = dbcon1();
								$query_emp = "SELECT * from forms";
								$result_emp = mysqli_query($con1, $query_emp);
								$sr = 1;
								while ($value_emp = mysqli_fetch_array($result_emp)) {

									echo "
								<tr>
								<td>" . $sr++ . "</td>
								<td>" . $value_emp['title'] . "</td>
								
								<td>";

									//echo "<a target='_blank'  id='".$value_emp['uploaded_file_path']."' value='".$value_emp['uploaded_file_path']."'>'".$value_emp['uploaded_file_path']."'</a>";

									echo "<a href='forms_doc/" . $value_emp['file_path'] . "' class='btn btn-primary' target='_blank'>View</a>";


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
	$(document).on("click", ".active1", function() {
		var id = $(this).val();
		//alert(id);
		var result = confirm("Confirm!!! Proceed for Remove File?");
		if (result == true) {
			$.ajax({
					url: 'control/adminProcess.php',
					type: 'POST',
					data: {
						action: 'removeFile',
						id: id
					},
				})
				.done(function(html) {
					//alert(html);
					//window.location="add_question_syllabus.php";
					if (html == 1) {
						alert('Successfully Removed file...');
						window.location = 'view_file.php';
					} else {
						alert('Failed to  Remove file...');
						window.location = 'view_file.php';
					}
				});
		}
	});
	document.getElementById("upload").onchange = function() { // on selecting file(s)
		for (var file in this.files) { // loop over all files
			if (isNaN(file) === false) { // if it is actually a file and not any other property
				if (this.files[file].type !== "application/pdf" && this.files[file].type !== "image/jpeg" && this.files[file].type !== "image/png") { // if NOT PDF!!
					alert('Please select PDFs and img files only.');
					$("#upload").val('');
					return false;
				}
			}
		}
		var oFile = document.getElementById("upload").files[0]; // <input type="file" id="fileUpload" accept=".jpg,.png,.gif,.jpeg"/>
		for (var file in this.files) {
			if (isNaN(file) === false) {
				if (this.files[file].size > 9097152) // 2 mb for bytes.
				{
					alert("Please check selected any of the file size is greater 9mb!..  please select file under 9mb!");
					$("#upload").val('');
					return;
				}

			}
		}
		// alert('Yay!! All selected files are in PDF format.');
		// return true;
	}



	$(".onlyText").on("input change paste", function() {

		var newVal = $(this).val().replace(/[^a-zA-Z\s]/g, '');

		$(this).val(newVal);


	});
</script>