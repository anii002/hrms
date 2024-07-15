<?php
$GLOBALS['flag'] = "4.91";
include('common/header.php');
include('common/sidebar.php');
?>

<div class="page-content-wrapper">
	<div class="page-content">

		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="dashboard.php">Home </a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="#"> View IT_PARTICULAS </a>
				</li>
			</ul>

		</div>
		<!-- <h1>ecefce</h1> -->
		<div class="portlet box blue">
			<div class="portlet-body form">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN EXAMPLE TABLE PORTLET-->
				<div class="portlet box blue-hoki">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-globe"></i>View IT_PARTICULAS
						</div>
						<div class="tools">
						</div>
					</div>
					<div class="portlet-body table-responsive">
						<table class="display table-stripped " id="example1">
							<thead>
								<tr>
									<th>अनु क्रमांक<br>ID</th>
									<th>कर्मचारी आईडी <br>Employee ID</th>
									<th>कर्मचारी नाम <br>Employee Name</th>
									<th>Year</th>
									<th>कार्रवाई / Action</th>
								</tr>
							</thead>
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

<script>
	$(document).on("change", "#empid", function() {
		var value = $('#empid').val();
		alert(value);
		$.ajax({
				url: 'control/adminProcess.php',
				type: 'POST',
				data: {
					action: 'fetchEmployee1',
					id: value
				},
			})
			.done(function(html) {
				var data = JSON.parse(html);
				alert(data);
				if (data == 1) {
					alert("Already Exists");
					$("#empid").val('');
					$("#empid").focus();
				} else if (data.fl == 0) {
					alert("Employee Not Authorized...");
					$("#empid").val('');
					$("#empid").focus();
				} else if (data.empid == null) {
					alert("PF Number Not Found..");
					// $.jGrowl('PF Number Not Found..', { header: 'Add User' });

				} else {
					$("#empid").val(data.empid);
					$("#empname").val(data.empname);
					$("#mobile").val(data.phoneno);
					$("#design").val(data.desigcode);
					$("#email").val(data.email2);
					$("#paylevel").val(data.pc7_level);
				}
			});
	});
	$(document).on('click', '.deleteit', function() {
		var id = $(this).val();
		// alert(id);
		var result = confirm("Confirm!!! Proceed for IT-PERTICULAR delete?");
		if (result == true) {
			$.ajax({
					url: 'control/adminProcess.php',
					type: 'POST',
					data: {
						action: 'deleteit',
						id: id
					},
				})
				.done(function(html) {
					alert(html);
					window.location = "view_it_perticular.php";
				});
		}
	})
</script>