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
		$("#frmadduser").submit(function(event) {
			var formData = new FormData($(this)[0]);
			formData.append("Flag", $("#btnSave").val());
			$.ajax({
				url: "Ajaxadduser.php",
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


	//----------------------------//Function ShowRecords//----------------------------//

	//------------------ShowRecords Employee---------------------------//
	function ShowRecordsUser() {
		$.post("Ajaxadduser.php", {
				Flag: "ShowRecordsUser"
			},
			function(data, success) {
				$("#divRecords").html(data);
				var oTable = $('#tbl_user').dataTable({
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
	//------------------End---------------------------//
</script> <!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			User Management
		</h1>
		<br>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->

		<div class="row">
			<div class="box box-info">

				<div class="box-body">
					<form method="post" id="frmadduser" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg">
						<!--div id="output1"></div-->
						<button style="float: right;" data-toggle='modal' data-target='#myModalAddUser' name='btnadd' id='btnadd' type='button' class='btn btn-success btn-flat' onclick="ResetEditor();"><i class='fa fa-plus'></i> &nbsp;&nbsp;Add User</button>
					</form>
					<div class="box box-warning box-solid" style="margin-top: 50px;">
						<div class="box-header with-border">
							<h3 class="box-title"><i class="fa fa-user-plus"></i> &nbsp;&nbsp;Add User Here...</h3>
						</div>
						<div class="table table-responsive">
							<div id="divRecords" class="table table-striped table-hover responsive-utilities jambo_table dataTable aria-describedby=" example_info">
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>

<?php
include_once('../global/footer.php');
include_once('../global/Modal_Member.php');
?>