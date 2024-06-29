<?php
session_start();
include_once("header.php");
include_once("topbar.php");
include_once("sidebar.php");
?>
<style>
	.primary {

		box-shadow: none;
		/*border-color: #337AB7;*/
		border: none;
		width: 50%;
	}

	@media print {
		body* {
			visibility: hidden;
		}

		#section-to-print,
		#section-to-print * {
			visibility: visible;
		}

		#section-to-print {
			position: absolute;
			left: 0;
			top: 0;

		}
	}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Dashboard
			<small>Control panel</small>
		</h1>

		<br>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->

		<div class="row" id="print">
			<?php
			if (isset($_GET["reg_id"]) != '') {
				$editid = $_GET["reg_id"];
				$sqledit = mysqli_query($conn,"select * from tbl_registration where reg_id='$editid'");
				while ($rwEdit = mysqli_fetch_array($sqledit)) {
					$id = $rwEdit["reg_id"];
			?>
					<form action="#" method="post" id="frmregister" enctype="text/form-data" accept="image/jpg,image/png">
						<div class="col-md-6 col-sm-6">
							<!-- small box -->
							<div class="form-group">
								<label>Index Register No:</label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["registerno"]; ?></span>
								<input type="hidden" id="txtregid" name="txtregid" value="<?php echo $rwEdit["reg_id"]; ?>">
								<!--input type="number" class="form-control primary" id="txtindexno" name="txtindexno" placeholder="Enter Index Number Here" value="<?php echo $rwEdit["registerno"]; ?>"  readonly /-->
							</div>

							<div class="form-group">
								<label>PPO No:</label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["ppono"]; ?></span>
							</div>

							<div class="form-group">
								<label>User Full Name:</label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["fullname"]; ?></span>
							</div>

							<div class="form-group">
								<label>Designation:</label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["designation"]; ?></span>
							</div>
							<div class="form-group">
								<label>Station:</label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["station"]; ?></span>
							</div>

							<div class="form-group">
								<label>Department:</label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["department"]; ?></span>
							</div>

							<div class="form-group">
								<label>Date Of Birth:</label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["dateofbirth"]; ?></span>
							</div>

							<div class="form-group">
								<label>Email:</label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["email"]; ?></span>
								<!--span class="form-group-addon"><i class="fa fa-envelope"></i></span-->
							</div>
							<div class="form-group">
								<label>Date of Retirement:</label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["dateofretirment"]; ?></span>
							</div>

							<div class="form-group">
								<label>Type Of Retirement</label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["typeofretirement"]; ?></span>
							</div>

							<div class="form-group">
								<label>User Address:</label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["address"]; ?></span>
								<!--textarea class="form-control primary" rows="3" id="txtaddress" name="txtaddress" value=""><?php echo $rwEdit["address"]; ?>
                </textarea-->
							</div>

						</div>
						<!-- ./col -->
						<div class="col-md-6 col-sm-6">
							<!-- small box -->
							<div class="form-group">
								<label>PF Account No:</label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["pfaccountno"]; ?></span>
							</div>

							<div class="form-group">
								<label>Qualifying Service:</label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["qualifyingservice"]; ?></span>
							</div>

							<div class="form-group">
								<label>Rate Of Pay: </label>&nbsp;&nbsp;&nbsp; <span><?php echo $rwEdit["rateofpay"]; ?></span>
							</div>

							<div class="form-group">
								<label>Scale / Level: </label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["scale"]; ?></span>
							</div>

							<div class="form-group">
								<label>Pension: </label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["pension"]; ?></span>
							</div>

							<div class="form-group">
								<label>Family Pension:-</label><br><br>
								<label>Enhance: </label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["enhance"]; ?></span><br><br>
								<label>Normal: </label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["normal"]; ?></span>
							</div>


							<div class="form-group">
								<label>Gratuity Amount:</label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["gratuityno"]; ?></span>
							</div>
							<div class="form-group">
								<label>NGIS / REIS Amount:</label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["ngisamount"]; ?></span>
							</div>

							<div class="form-group">
								<label>Railway Quarter No:</label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["railwayquarter"]; ?></span>
							</div>


							<div class="form-group">
								<label>Date Of Vacation:</label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["dateofvacation"]; ?></span>
							</div>
						</div>
						<!-- ./col -->
						<hr style="width:100%;background-color:red;height:2px;">
						<div class="col-md-6 col-sm-6">

							<label style="color:black;font-size:20px">Bank Details</label>
							<hr>
							<div class="form-group">
								<label>Name of Bank:</label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["nameofbank"]; ?></span>
							</div>


							<div class="form-group">
								<label>Name of Branch:</label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["namebranch"]; ?></span>
							</div>

							<div class="form-group">
								<label>IFSC Code:</label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["ifsccode"]; ?></span>
							</div>

							<div class="form-group">
								<label>Account No:</label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["accountno"]; ?></span>
							</div>
							<div class="form-group">
								<label>RELHS Option:</label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["relhsoption"]; ?></span>

								<!--div class="radio" id="">
							<label>
							  <input type="radio" name="optionsRadios" id="txtyes" value="yes" checked >
							  Yes
							</label>
						  </div>
						  <div class="radio">
							<label>
							  <input type="radio" name="optionsRadios" id="txtno" value="no">
							 No
							</label>
						  </div-->

							</div>
							<div class="form-group">
								<label>RELHS Amount Recovered:</label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["relhsamount"]; ?></span>
							</div>

							<div class="form-group">
								<label>FD if any:</label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["fd"]; ?></span>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-md-6 col-sm-6">
							<label style="color:black;font-size:20px">Family Details</label>
							<hr>

							<div class="form-group">
								<label>Family Particulars:</label>
								<div class="form-group">
									<label>Name:</label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["fname"]; ?></span>
								</div>

								<div class="form-group">
									<label>Relation:</label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["relation"]; ?></span>
								</div>
								<div class="form-group">
									<label>Date Of Birth:</label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["redateofbirth"]; ?></span>
								</div>

								<div class="form-group">
									<label>Aadhar No:</label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["reaadharno"]; ?></span>
								</div>

								<div class="form-group">
									<label>Permanent Address:</label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["peraddress"]; ?></span>
								</div>

								<div class="form-group">
									<label>Pensioner Aadhar No:</label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["pensioneraadhar"]; ?></span>
								</div>


								<div class="form-group">
									<label>Pensioner Phone/ Mob No:</label>&nbsp;&nbsp;&nbsp;<span><?php echo $rwEdit["pensionercontact"]; ?></span>
								</div>
							</div>
						</div>
						<!-- ./col -->



					</form>
			<?php
				}
			}
			?>
		</div>
		<button type="submit" class="btn btn-success" id="btnSave" name="btnSave" onClick="window.print();">Print</button>
		<br>
		<br>
		<br>

		<!-- /.row -->
		<!-- Main row -->

		<!-- /.row (main row) -->

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
	// function printPage(){
	// var divElements = document.getElementById('printDataHolder').innerHTML;
	// var oldPage = document.body.innerHTML;
	// document.body.innerHTML="<link rel='stylesheet' href='css/common.css' type='text/css' /><body class='bodytext'>"+divElements+"</body>";
	// window.print();
	// document.body.innerHTML = oldPage;
	// }
</script>
<?php

include_once("footer.php");
?>