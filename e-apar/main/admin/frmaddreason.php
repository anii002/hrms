<?php
session_start();
if (!isset($_SESSION['SESS_MEMBER_NAME'])) {
	echo "<script>window.location='http://drmpsur-hrms.in/e-apar/index.php';</script>";
}
include_once('../global/header.php');
include_once('../global/topbar.php');
include_once('../global/sidebaradmin.php');

?>
<script>
	//----------------------------// Document Ready Function //----------------------------//
	$(document).ready(function() {
		ShowRecordsUser();
		$("#frmaddemployee").submit(function(event) {
			var formData = new FormData($(this)[0]);
			formData.append("Flag", $("#btnSave").val());
			$.ajax({
				url: "Ajaxemployee.php",
				type: 'POST',
				data: formData,
				async: false,
				success: function(data) {
					alert(data);
					ShowRecords();
				},
				cache: false,
				contentType: false,
				processData: false
			});
		});
	}); ///ready fun close


	//----------------------------//Function ShowRecords User//----------------------------//
	function ShowRecordsUser() {
		$.post("Ajaxemployee.php", {
				Flag: "ShowRecordsUser"
			},
			function(data, success) {
				$("#divRecords").html(data);
				var oTable = $('#tbl_registration').dataTable({
					"oLanguage": {
						"sSearch": "Search all columns:"
					},
					"aoColumnDefs": [{
							'bSortable': false,
							'aTargets': [0]
						} //disables sorting for column one
					],
					'iDisplayLength': 12,
					"sPaginationType": "full_numbers",
					"dom": 'T<"clear">lfrtip'
				});
			}
		);
	}
</script> <!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Employee Management
		</h1>
		<ol class="breadcrumb">

			<li class="active">
				<a href="frmsample.php"><button type="button" class="btn btn-success"><i class="fa fa-mail-reply"> Back</i></button></a>

			</li>
		</ol>
		<br>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<!--hr style="width:100%;height:3px;background-color:green;"-->
		<div class="row">
			<div class="box box-info">
				<div class="box-header">
					<h3 class="box-title"><i class="fa fa-plus"></i> Add Reason For Not Available...</h3>
					<hr>
				</div>
				<div class="box-body" style="padding:50px 50px 50px 50px;">
					<?php
					if (isset($_GET["emppf"]) != '') {
						// echo $_GET["emppf"]."|";
						// echo $_GET["year"];
					}
					?>
					<form method="post" id="frmreasone" enctype="multipart/form-data" role="form" accept="image/jpg,image/png,image/gif,image/jpeg" action="Ajaxreason.php">
						<div class="modal-body">
							<div class="form-group">
								<label class="col-md-4">Year :</label>
								<div class="col-md-6">
									<div class="input-group">
										<div class="input-group-addon"></div>
										<input type="text" class="form-control primary" id="txtyear" name="txtyear" value="<?php echo $_GET["year"]; ?>" readonly />
									</div><br>
								</div>
								<label class="col-md-4">Employee No/ PF No :</label>
								<div class="col-md-6">
									<div class="input-group">
										<div class="input-group-addon"></div>
										<input type="text" class="form-control primary" id="txtempcode" name="txtempcode" value="<?php echo $_GET["emppf"]; ?>" readonly />
										<input type="hidden" class="form-control primary" id="txtsession" name="txtsession" value="<?php echo $_SESSION['SESS_ADMIN_FULLNAME']; ?>" readonly />
										<input type="hidden" class="form-control primary" id="txtempid" name="txtempid" value="<?php echo $_GET["empid"]; ?>" readonly />
									</div><br>
								</div>
								<label class="col-md-4">Reasone :</label>
								<div class="col-md-6">
									<div class="input-group">
										<div class="input-group-addon"></div>
										<select class="form-control primary" name="txtreason" id="txtreason">
											<option value="" selected hidden disabled>-- Select Reasone Type --</option>
											<option value="APAR NOT INITIATED">APAR NOT INITIATED</option>
											<option value="APAR MISSING">APAR MISSING</option>
											<option value="APAR NOT APPLICABLE">APAR NOT APPLICABLE</option>
										</select>
									</div><br>
								</div>

							</div>
						</div>

						<div class="form-group">
							<div class="col-md-12">
								<input type="submit" id="btnSave" name="btnSave" value="Save" class="btn btn-success" />
								<input type="reset" id="btnreset" name="btnreset" value="Reset" class="btn btn-default" />
								<input type="button" id="btnrefresh" name="btnrefresh" value="Refresh" class="btn btn-info" onClick="window.location.reload()" />
								<br>
								<br>
								<br>
							</div>
						</div>
					</form>

					<!--div class="table table-responsive">
				<div id="divRecords" class="table table-striped table-hover responsive-utilities jambo_table dataTable aria-describedby="example_info">
				</div>
				</div-->
				</div>
			</div>

		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
<script>
	// function ShowTable()
	// {
	// $.post("Ajaxemployee.php",
	// {
	// Flag:"ShowRecords",
	// Date:$("#txtDate").val()
	// },
	// function (data,success)
	// {
	// $("#divShowTable").html(data);
	// });

	// }
	// $(document).ready(function()
	// {
	// ShowTable();
	// $('#txtDate').datepicker({
	// dateFormat: "yy-mm-dd"
	// dateFormat: "HH:MM:ss"
	// });
	// });
</script>
<?php
include_once('../global/footer.php');
include_once('../global/Modal_Member.php');
?>