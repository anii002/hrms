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


<script language="javascript">
	function printPage() {
		//window.print();
		var printButton = document.getElementById("btnSave");
		var printFooter = document.getElementById("ffooter");
		var prinDiv = document.getElementById("print");
		printButton.style.visibility = 'hidden';
		printFooter.style.visibility = 'hidden';
		prinDiv.style.visibility = 'visible';
		window.print();
		printButton.style.visibility = 'visible';
		printFooter.style.visibility = 'visible';
	}
</script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Report Print
		</h1>

		<br>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<br><br><br>
		<div class="row" id="print">
			<?php
			if (isset($_GET["reg_id"]) != '') {
				$editid = $_GET["reg_id"];
				$sqledit = mysqli_query($conn, "select * from tbl_registration where reg_id='$editid'");
				while ($rwEdit = mysqli_fetch_array($sqledit)) {
					$id = $rwEdit["reg_id"];
			?>
					<form action="#" method="post" id="frmregister" enctype="text/form-data" accept="image/jpg,image/png">
						<div class="box-body">
							<div class="table-responsive">
								<table class='table table-striped table table-hover' border="1" id='example' style="overflow-y: scroll; font-size:14px; width:75%; cellspacing:2px; cellpadding:1px; solid-black;">
									<tbody>
										<tr>
											<td style="width:200px;">&nbsp;<label>Index Register No:</label></td>
											<td style="width:120px;">&nbsp;<span><?php echo $rwEdit["registerno"]; ?></span></td>
											<td style="width:120px;">&nbsp;<label>PPO No</label>:</td>
											<td>&nbsp;<span><?php echo $rwEdit["ppono"]; ?></span></td>
										</tr>
										<tr>
											<td style="width:120px;">&nbsp;<label>User Full Name:</label></td>
											<td>&nbsp;<span><?php echo $rwEdit["fullname"]; ?></span></td>
											<td style="width:120px;">&nbsp;<label>Designation:</label></td>
											<td>&nbsp;<span><?php echo $rwEdit["designation"]; ?></span></td>
										</tr>
										<tr>
											<td style="width:120px;">&nbsp;<label>Station:</label></td>
											<td>&nbsp;<span><?php echo $rwEdit["station"]; ?></span></td>
											<td style="width:120px;">&nbsp;<label>Department:</label></td>
											<td>&nbsp;<span><?php echo $rwEdit["department"]; ?></span></td>
										</tr>
										<tr>
											<td style="width:120px;">&nbsp;<label>Date Of Birth:</label></td>
											<td>&nbsp;<span><?php echo $rwEdit["dateofbirth"]; ?></span></td>
											<td style="width:120px;">&nbsp;<label>Email:</label></td>
											<td>&nbsp;<span><?php echo $rwEdit["email"]; ?></span></td>
										</tr>
										<tr>
											<td style="width:120px;">&nbsp;<label>Date of Retirement:</label></td>
											<td>&nbsp;<span><?php echo $rwEdit["dateofretirment"]; ?></span></td>
											<td style="width:120px;">&nbsp;<label>Retirement Type</label></td>
											<td style="width:200px;">&nbsp;<span><?php echo $rwEdit["typeofretirement"]; ?></span></td>
										</tr>
										<tr>
											<td style="width:120px;">&nbsp;<label>User Address:</label></td>
											<td>&nbsp;<span><?php echo $rwEdit["address"]; ?></span></td>
											<td style="width:120px;">&nbsp;<label>PF Account No:</label></td>
											<td>&nbsp;<span><?php echo $rwEdit["pfaccountno"]; ?></span></td>
										</tr>
										<tr>
											<td style="width:120px;">&nbsp;<label>Qualifying Service:</label></td>
											<td>&nbsp;<span><?php echo $rwEdit["qualifyingservice"]; ?></span></td>
											<td style="width:120px;">&nbsp;<label>Rate Of Pay</label></td>
											<td>&nbsp;<span><?php echo $rwEdit["rateofpay"]; ?></span></td>
										</tr>
										<tr>
											<td style="width:120px;">&nbsp;<label>Scale / Level</label></td>
											<td>&nbsp;<span><?php echo $rwEdit["scale"]; ?></span></td>
											<td style="width:120px;">&nbsp;<label>Pension</label></td>
											<td>&nbsp;<span><?php echo $rwEdit["pension"]; ?></span></td>
										</tr>
										<tr style="text-align:center;font-size:18px;">
											<td colspan="4"><b>Family Pension</b></td>

										</tr>
										<tr>
											<td style="width:120px;">&nbsp;<label>Enhance</label></td>
											<td>&nbsp;<span><?php echo $rwEdit["enhance"]; ?></span></td>
											<td style="width:120px;">&nbsp;<label>Normal</label></td>
											<td>&nbsp;<span><?php echo $rwEdit["normal"]; ?></span></td>
										</tr>
										<tr>
											<td style="width:120px;">&nbsp;<label>Gratuity Amount:</label></td>
											<td>&nbsp;<span><?php echo $rwEdit["gratuityno"]; ?></span></td>
											<td style="width:120px;">&nbsp;<label>NGIS / REIS Amount:</label></td>
											<td>&nbsp;<span><?php echo $rwEdit["ngisamount"]; ?></span></td>
										</tr>
										<tr>
											<td style="width:120px;">&nbsp;<label>Railway Quarter No:</label></td>
											<td>&nbsp;<span><?php echo $rwEdit["railwayquarter"]; ?></span></td>
											<td style="width:120px;">&nbsp;<label>Date Of Vacation:</label></td>
											<td>&nbsp;<span><?php echo $rwEdit["dateofvacation"]; ?></span></td>
										</tr>
										<tr style="text-align:center;">
											<td colspan="4">&nbsp;<label style="color:black;font-size:18px;">Bank Details</label></td>
										</tr>
										<tr>
											<td style="width:120px;">&nbsp;<label>Name of Bank:</label></td>
											<td>&nbsp;<span><?php echo $rwEdit["nameofbank"]; ?></span></td>
											<td style="width:120px;">&nbsp;<label>Name of Branch:</label></td>
											<td>&nbsp;<span><?php echo $rwEdit["namebranch"]; ?></span></td>
										</tr>
										<tr>
											<td style="width:120px;">&nbsp;<label>IFSC Code:</label></td>
											<td>&nbsp;<span><?php echo $rwEdit["ifsccode"]; ?></span></td>
											<td style="width:120px;">&nbsp;<label>Account No:</label></td>
											<td>&nbsp;<span><?php echo $rwEdit["accountno"]; ?></span></td>
										</tr>
										<tr>
											<td style="width:120px;">&nbsp;<label>RELHS Option:</label></td>
											<td>&nbsp;<span><?php echo $rwEdit["relhsoption"]; ?></td>
											<td style="width:120px;">&nbsp;<label>RELHS Amount:</label></td>
											<td>&nbsp;<span><?php echo $rwEdit["relhsamount"]; ?></span></td>
										</tr>
										<tr>
											<td style="width:120px;">&nbsp;<label>FD if any:</label></td>
											<td>&nbsp;<span><?php echo $rwEdit["fd"]; ?></span></td>
											<td style="width:200px;">&nbsp;<label>Pensioner Aadhar No:</label></td>
											<td>&nbsp;<span><?php echo $rwEdit["pensioneraadhar"]; ?></span></td>
										</tr>
										<tr style="text-align:center;">
											<td colspan="4">&nbsp;<label style="color:black;font-size:18px">Family Particular Details</label></td>

										</tr>
										<tr>
											<td style="width:120px;">&nbsp;<label>Name</label></td>
											<td>&nbsp;<label>Relation</label></td>
											<td style="text-align:left; width:120px;">&nbsp;<label>Aadhar No.</label></td>
											<td style="text-align:left; width:120px;">&nbsp;<label>DOB.</label></td>
										</tr>
										<tr>
											<td>&nbsp;<span><?php echo $rwEdit["fname"]; ?></span></td>
											<td>&nbsp;<span><?php echo $rwEdit["relation"]; ?></span></td>
											<td>&nbsp;<span><?php echo $rwEdit["reaadharno"]; ?></span></td>
											<td>&nbsp;<span><?php echo date("d-m-Y", strtotime($rwEdit["redateofbirth"])); ?></span></td>
										</tr>
										<?php

										$sqlfamilypart = mysqli_query($conn,"select * from tbl_familyparticulars where ppoid='" . $rwEdit["ppono"] . "'");
										while ($rwFamilyPar = mysqli_fetch_array($sqlfamilypart)) {
											$username = $rwFamilyPar["name"];
											$userrel = $rwFamilyPar["relation"];
											$useraadhar = $rwFamilyPar["aadharno"];
										?>
											<tr>

												<td>&nbsp;<span><?php echo $rwFamilyPar["name"]; ?></span></td>
												<td>&nbsp;<span><?php echo $rwFamilyPar["relation"]; ?></span></td>
												<td>&nbsp;<span><?php echo $rwFamilyPar["aadharno"]; ?></span></td>
												<td>&nbsp;<span><?php echo date("d-m-Y", strtotime($rwFamilyPar["dob"])); ?></span></td>
											</tr>
										<?php
										}
										?>
										<tr>
											<td style="width:220px;" colspan="2">&nbsp;<label>Pensioner Phone/ Mob No:</label></td>
											<td colspan="2">&nbsp;<span><?php echo $rwEdit["pensionercontact"]; ?></span></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</form>
			<?php
				}
			}
			?>
		</div>
		<a href="#"><button type="submit" class="btn btn-success" id="btnSave" name="btnSave" onclick="printPage()"><i class="fa fa-print"></i>&nbsp;Print</button></a>
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