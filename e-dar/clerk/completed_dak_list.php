<?php
$GLOBALS['flag'] = "1.5";
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
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-book"></i>Completed List
					</div>

				</div>
				<div class="portlet-body form">
					<div class="form-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Select Date</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fas  fa-user"></i>
										</span>
										<input type="text" class="form-control txtrdfrom" id="r_date" name="r_date" autocomplete="off">
									</div>
								</div>
							</div>
						</div>
						<button type="button" class="btn btn-info" id="btnc">Submit</button>
					</div>
				</div>
			</div>
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-book"></i>Completed List
					</div>

				</div>
				<div class="portlet-body form">
					<div class="form-body">
						<div class="table-responsive" id="setTable">

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
	$(function() {

		$('.txtrdfrom').datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true
		});

	});

	$(document).on("click", "#btnc", function() {
		var date = $("#r_date").val();
		//alert(date);
		if (date == null) {
			alert("Please select date For Report");
		} else {

			$.ajax({
				type: "post",
				url: "control/adminProcess.php",
				data: "action=completeList&date=" + date,
				success: function(data) {

					$("#setTable").html(data);

					$('#example1').DataTable({
						dom: 'Bfrtip',
						buttons: [
							'copy', 'csv', 'excel', 'pdf', 'print'
						]
					});
				}
			});
		}

	});
</script>