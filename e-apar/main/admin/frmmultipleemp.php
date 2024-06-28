<?php
session_start();
if (!isset($_SESSION['SESS_MEMBER_NAME'])) {
	echo "<script>window.location='http://drmpsur-hrms.in/e-apar/index.php';</script>";
}
include_once('../global/header.php');
include_once('../global/topbar.php');
include_once('../global/sidebaradmin.php');

?>
<style>
	.primary {
		box-shadow: none;
		border-color: #337AB7;
	}
</style>
<script>
	//----------------------------// Document Ready Function //----------------------------//
	// $(document).ready(function ()
	// {
	// ShowRecords();
	// $("#frm").submit(function(event)
	// {
	// var formData = new FormData($(this)[0]);
	// formData.append("Flag",$("#btnSave").val());
	// $.ajax({
	// url: "Ajaxgroups.php",
	// type: 'POST',
	// data: formData,
	// async: false,
	// success: function (data) {
	// alert(data);
	// ShowRecords();
	// },
	// cache: false,
	// contentType: false,
	// processData: false
	// });
	// });
	// });///ready fun close


	//----------------------------//Function ShowRecords//----------------------------//
	// function ShowRecords()
	// {
	// $.post("Ajaxgroups.php",
	// {
	// Flag:"ShowRecords"
	// },
	// function(data,success)
	// {
	// $("#divRecords").html(data);
	// var oTable = $('#tbl_group').dataTable
	// ({
	// "oLanguage":
	// {
	// "sSearch": "Search all columns:"
	// },
	// "aoColumnDefs":
	// [
	// {
	// 'bSortable': false,
	// 'aTargets': [0]
	// } //disables sorting for column one
	// ],
	// 'iDisplayLength': 12,
	// "sPaginationType": "full_numbers",
	// "dom": 'T<"clear">lfrtip'
	// });
	// }
	// );
	// }
</script> <!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Create Groups
		</h1>
		<ol class="breadcrumb">

			<li class="active">
				<!--button type="button" href="#myModal" class="btn btn-success" id="#btn1"><i class="fa fa-user"> Add User</i></button-->

			</li>
		</ol>
		<br>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->

		<div class="row">
			<div class="box box-info">
				<div class="box-header">
					<h3 class="box-title"><i class="fa fa-plus"></i>&nbsp;&nbsp;Create Groups Details...</h3>
					<hr>
				</div>
				<div class="box-body" style="padding:50px 50px 50px 50px;">
					<form method="post" action="ajaxgroup.php">
						<div class="table-responsive">
							<table class='table table-striped table-bordered table-hover table-responsive' id='tbl_employee'>
								<thead>
									<tr>
										<th>PF NO</th>
										<th>Years</th>
									</tr>
								</thead>
								<tbody>

									<?php
									$k = 0;
									$cnt = 0;
									if (!isset($_POST['year_list'])) {
										echo "<script>alert('Please select year'); window.location='index.php'</script>";
									} else {
										$keys = array_keys($_POST['year_list']);
										for ($i = 0; $i < count($_POST['year_list']); $i++) {
											echo "<tr><td style='width:250px;'><input type='text' id='txtempid' name='txtempid[]' style='border:0;' value='" . $keys[$i] . "' readonly/></td>";
											$k = $keys[$i];
											$cnt++;
											echo "<td>";
											foreach ($_POST['year_list'][$keys[$i]] as $key => $value) {
												echo "<input type='text' name='list[$k][]' id='txtyear' value='" . $value . "' style='border:0px;' size='8px' readonly/> |  ";
											}
											$k++;
											echo "</td> </tr>";
										}
										echo "<input type='hidden' value='" . $cnt . "' name='member_cnt'/>";
										//echo "<input type='hidden' value='".$_POST['deptn']."' name='deptn' id='deptn'/>";
									}
									?>

								</tbody>
							</table>
						</div>
						<table>
							<tr>
								<td><label>Create APAR Group</label></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td colspan="3">Group name</td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="Grpname" class="form-control primary" id="Grpname" placeholder="Group name here" /></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td colspan="3">Description</td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;<textarea cols="35" rows="3" class="form-control primary" name="grpdesc" id="grpdesc"></textarea></td>
							</tr>
						</table>
						<div><input type="submit" value="Create Group" class="btn btn-info btn-flat btn-sm" /></div>
					</form>
				</div>
			</div>
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
<?php

//include_once('../global/Modal_Index.php');
include_once('../global/footer.php');
?>