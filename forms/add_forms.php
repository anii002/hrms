<?php
$GLOBALS['flag'] = "5.3";
include('common/header.php');
include('common/sidebar.php');
$con1=dbcon1();
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
							<i class="fa fa-globe"></i>Add Forms
						</div>
						<div class="tools">
						</div>
					</div>
					<div class="portlet-body form">
						<!-- BEGIN FORM-->
						<form action="control/adminProcess.php?action=addForms" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
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
												<input type="text" class="form-control onlyText" id="title" name="title" maxlength="35" placeholder="Enter Title" required>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Upload File<span style="color:red;">*</span> <small style="color:red;">documents(in pdf format) & images(in jpg or png)</small> </label>
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fas fa-envelope"></i>
												</span>
												<input type="file" class="form-control" id="upload" name="upload" placeholder=" " required="">
											</div>
										</div>
									</div>
								</div>
								<!--/row-->
							</div>
							<div class="form-actions right">
								<button type="submit" class="btn blue submit_btn" id='submit_btn' name='button'><i class="fa fa-check"></i> Submit</button>&nbsp;
								<button type="button" class="btn default">Cancel</button>
							</div>
						</form>
						<!-- END FORM-->
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
	// $(document).on("click",".active",function(){
	//         var id = $(this).val();
	//         var result = confirm("Confirm!!! Proceed for Remove File?");
	//         if(result == true)
	//         {
	//             $.ajax({
	//             url: 'control/adminProcess.php',
	//             type: 'POST',
	//             data: {action: 'removeRuleFile', id : id},
	//           })
	//           .done(function(html) {
	//             //alert(html);
	//             //window.location="add_question_syllabus.php";
	//             if(html==1)
	//             {
	//             	alert('Successfully Removed file...');
	//             	window.location='add_rulenregulation.php';
	//             }
	//             else
	//             {
	//             	alert('Failed to  Remove file...');
	//             	window.location='add_rulenregulation.php';
	//             }
	//           });
	//         }
	//     });
	document.getElementById("upload").onchange = function() { // on selecting file(s)
		for (var file in this.files) { // loop over all files
			if (isNaN(file) === false) { // if it is actually a file and not any other property
				if (this.files[file].type !== "application/pdf") { // if NOT PDF!!
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