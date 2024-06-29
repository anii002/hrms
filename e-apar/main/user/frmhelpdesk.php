<?php
session_start();
if (!isset($_SESSION['SESS_MEMBER_NAME'])) {
	echo "<script>window.location='http://localhost/E-APAR/index.php';</script>";
}
include_once('../global/header.php');
include_once('../global/topbaruser.php');
include_once('../global/sidebaruser.php');
include_once('../global/alpha.php');

?>
<style>
	.primary {
		box-shadow: none;
		border-color: rgba(60, 141, 188, 0.53);
	}
</style>
<!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1> Helpdesk</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header">
						<h3 class="" style="text-align:center;">
							Add Request From Here....
						</h3>
						<!-- tools box -->

						<!-- /. tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body pad">
						<form action="Ajaxhelpdesk.php" method="POST" action="" enctype="multipart/form-data" role="form" id="frmhelpdesk">

							<div class="form-group col-md-2">
								<label>Date:</label>
							</div>
							<div class="col-md-6">
								<input type="date" name="txtdate" id="txtdate" class="form-control primary" />
							</div>
							<div class="clearfix"></div><br>
							<div class="form-group col-md-2">
								<label>Subject:</label>
							</div>
							<div class="col-md-6">
								<input type="text" name="txtsubject" id="txtsubject" class="form-control primary" placeholder="Enter Subject Here" />
							</div>


							<div class="clearfix"></div><br>
							<div class="form-group col-md-2">
								<label>Description:</label>
							</div>
							<div class="col-md-6">
								<textarea id="txtdescription" name="txtdescription" rows="5" class="form-control primary"></textarea>
								<input type="hidden" value="<?php echo $_SESSION['SESS_USER_NAME']; ?>" name="txtsessionpersone" id="txtsessionpersone">
								<input type="hidden" value="<?php echo $ticketcode; ?>" name="txtticketid" id="txtticketid">
								<div class="clearfix"></div><br>
							</div>

							<div class="col-md-6">
								<button class="btn btn-success btn-flat" id="btnnSubmit" name="btnnSubmit" type="submit">Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;
								<button class="btn btn-danger btn-flat" id="btnnSubmit" name="btnnSubmit" type="reset">Reset</button>
							</div>

						</form>
					</div>



					<div class="box-header">
						<div class="clearfix"></div>
						<br><br><br>
						<span>
							View Helpdesk Requests....
						</span>
					</div>
					<div class="box-body pad">
						<form action="Ajaxhelpdesk.php" method="POST" action="" enctype="multipart/form-data" role="form" id="frmhelpdesk">
							<div class="table-responsive" style="overflow-x: scroll;">
								<table class="table no-margin" id="example">
									<thead>
										<tr>
											<th>Date</th>
											<th>TICKET ID</th>
											<th>Subject</th>
											<th>Content</th>
										</tr>
									</thead>

									<tbody>
										<?php
										$sqlquery = mysqli_query($conn,"select * from tbl_helpdesk where createdby='" . $_SESSION['SESS_USER_NAME'] . "'");
										while ($rwReg = mysqli_fetch_array($sqlquery)) {
											$id = $rwReg["HLP_id"];
											//echo "$id";
										?>
											<tr>
												<td><?php echo date('d-m-Y', strtotime($rwReg["date"])); ?></td>
												<td><?php echo $rwReg["Ticketid"]; ?></td>
												<td><?php echo $rwReg["subject"]; ?></td>
												<td><?php echo $rwReg["description"]; ?></td>
											</tr>
										<?php

										}
										?>
									</tbody>

								</table>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>

<?php
include_once('../global/footer.php');
?>