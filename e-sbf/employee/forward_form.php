<?php

$GLOBALS['flag']="1.4";

	include('common/header.php');

	include('common/sidebar.php');
	
	//echo "<pre>"; print_r($_SESSION);
	dbcon1();
	$sql = "SELECT bill_unit FROM register_user WHERE id = ".$_SESSION['user_id'];
	//echo $sql;

	$result = mysql_query($sql);
	
	$row = mysql_fetch_assoc($result);
	
    $bill_unit = $row['bill_unit'];
    //echo $bill_unit;
    

?>

<!-- BEGIN CONTENT -->

<div class="page-content-wrapper">

	<div class="page-content">

		<!-- BEGIN PAGE HEADER-->

		

		<div class="page-bar">

			<ul class="page-breadcrumb">

				<li>

					<i class="fa fa-home"></i>

					<a href="index.php">Home / मुख पृष्ठ</a>

					<i class="fa fa-angle-right"></i>

				</li>

				<li>

					<a href="#">Forward Form</a>

				</li>

			</ul>

			<div class="page-toolbar">

				<div id="" class="pull-right tooltips btn btn-fit-height grey-salt">

					<i class=""></i> <span><?php echo date('Y/m/d H:i:s'); ?></span>

				</div>

			</div>

		</div>

		<!-- END PAGE HEADER-->

		<!-- BEGIN DASHBOARD STATS -->

		

		<!-- END DASHBOARD STATS -->

		<div class="clearfix">

		</div>

		<div class="portlet box blue">

			<div class="portlet-title">

				<div class="caption  col-md-6">

					<i class="fa fa-book"></i>Forwarding Form:

				</div>

				<div class="caption col-md-6 text-right backbtn">

					<button class="btn btn-danger" onclick="history.go(-1);">Back</button>

				</div>

			</div>

			<div class="portlet-body form">

				<!-- BEGIN FORM-->

				<form class="horizontal-form">

					<input type="hidden" name="empid" id="empid" value="<?php echo $_SESSION['username']; ?>">

					<input type="hidden" name="ref" id="ref" value="<?php echo $_GET['reference_id']; ?>">

					<input type="hidden" name="frdname" id="frdname" value="">

					<div id="frd_form">

						<div class="form-body">

							<div class="row">

								<div class="col-md-4"></div>

								<div class="col-md-4">

									<div class="form-group">

										<center>

										<label class="control-label"><h4 class="">Select Controlling Incharge</h4></label>

										</center>

									</div>

								</div>

								<div class="col-md-4">	</div>

							</div>

							<div class="row">

								<div class="col-md-4"></div>

								<div class="col-md-4 billunitzindex">

									<div class="form-group">

										<select name="forwardName" id="forwardName" class="form-control required" style="width: 100%" required>

											<option readonly value='0' selected >Select CI</option>

											<?php

										        dbcon1();
										        if($_SESSION['pf_num'] == '123123'){
										            echo "<option value='00505283012'>R R Adhyapak</option>";	
										        }
										        else{
										            $sql = "SELECT empno, name FROM billunit WHERE billunit = ".$bill_unit;
										//	echo $sql;
											$result = mysql_query($sql);
				              				while($row = mysql_fetch_assoc($result))
				              				{
												echo "<option value='".$row['empno']."'>".$row['name']."</option>";	
				              				}

										        }
											
											?>

										</select>

									</div>

								</div>

								<div class="col-md-4"></div>

							</div>

							

						</div>

						<div class="form-actions right">

							<button type="button" class="btn blue btn_confirm_otp" id="submit_btn" name='button'><i class="fa fa-check"></i>प्रस्तुत करे / Submit</button>

						</div>

					</div>

					<div id="otp_confirm_form" style="display: none;">

						<div class="form-body">

							<!-- <h3 class="form-section">Add User</h3> -->

							<div class="row">

								<div class="col-md-4"></div>

								<div class="col-md-4">

									<div class="form-group">

										<center>

										<label class="control-label"><h4 class="">Enter OTP</h4></label>

										</center>

									</div>

								</div>

								<div class="col-md-4">	</div>

							</div>

							<div class="row">

								<div class="col-md-5"></div>

								<div class="col-md-2">

									<div class="form-group">

										<center>

										<input type="text" maxlength="4" autofocus="true" placeholder="Enter OTP" name="c_otp" id="c_otp" class="form-control" required>

										</center>

									</div>

								</div>

								<div class="col-md-5"></div>

							</div>

						</div>

						<!-- <div class="form-actions right">

									<button type="button" class="btn blue btn_confirm_otp" id="submit_btn" name='button'><i class="fa fa-check"></i> Confirm OTP</button>

						</div> -->

					</div>

				</form>

				<!-- END FORM-->

			</div>

		</div>

	</div>

</div>

<!-- END CONTENT -->

</div>

<!-- END CONTAINER -->

<?php

	include('common/footer.php');

?>

<script type="text/javascript">

	$(document).on('click','.btn_confirm_otp',function(){

		var fdname=$("#forwardName").val();

		var empid=$("#empid").val();

		var ref_no=$("#ref").val();

		// var c_otp=$("#c_otp").val();

		//alert(empid+"_"+fdname+"_"+ref_no);

		if(fdname != '0')

		{

		$("#otp_loader").show();

			$.ajax({

			type:"post",

			url:"control/adminProcess.php",

			data:"action=forward_form&fdname="+fdname+"&empid="+empid+"&ref_no="+ref_no,

				success:function(data)

					{

					 //alert(data);

					$("#otp_loader").hide();

					if(data == 1)

					{

						$.jGrowl("Your Form has been forwarded to"+fdname, { header: 'Forward Form.' });

						var delay = 1500;

						setTimeout(function(){ window.location = 'sub_forms.php'  }, delay);

					}

					else

					{

						// alert("Something Went Wrong.");

						$.jGrowl("Something Went Wrong...", { header: 'Forward Form.' });

					}

					}

			});

		}

		else{

			// alert("Please select Controlling Incahrge to forward TA.");

			$.jGrowl("Please select Controlling Incharge to forward Contingency...", { header: 'Forward Cont.' });

		}

	});

</script>