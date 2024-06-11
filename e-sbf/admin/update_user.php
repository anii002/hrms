<?php

	$GLOBALS['flag']="4.91";

	include('common/header.php');

	include('common/sidebar.php');

	include("control/function.php");

?>

			

	<div class="page-content-wrapper">

		<div class="page-content">



			<div class="page-bar">

				<ul class="page-breadcrumb">

					<li>

						<i class="fa fa-home"></i>

						<a href="index.html">Home / मुख पृष्ठ</a>

						<i class="fa fa-angle-right"></i>

					</li>

					<li>

						<a href="#"> Update User</a>

					</li>

				</ul>

													

			</div>

			<!-- <h1>ecefce</h1> -->

			<div class="portlet box blue">

				<div class="portlet-title">

					<div class="caption">

						<i class="fa fa-book"></i> Update User 

					</div>

					

				</div>

				<div class="portlet-body form">

					<!-- BEGIN FORM-->

					<?php

					dbcon();

					$query = mysql_query("SELECT * FROM add_user WHERE user_id = '".$_GET['user_id']."'");

					$row = mysql_fetch_array($query);

					dbcon1();

  					$query1 = mysql_query("SELECT * FROM resgister_user WHERE emp_no = '".$row['user_pfno']."'");

  					$result = mysql_fetch_array($query1);

					?>

					<input type="hidden" id="user_id" name="user_id" value="<?php echo $_GET['user_id'];?>">

					<form action="control/adminProcess.php?action=update_user" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">

						<div class="form-body">

						<input type="hidden" id="user_id1" name="user_id1" value="<?php echo $_GET['user_id'];?>">

										<div class="row">

								<div class="col-md-3">

									<div class="form-group">

										<label class="control-label">कर्मचारी आईडी / PFNO</label>

										<div class="input-group">

										<span class="input-group-addon">

										<i class="fa fa-user-circle"></i>

										</span>

										<input type="text" class="form-control" id="empid" name="empid" placeholder="PF Number" value="<?php echo $result['emp_no'];?>" required autofocus="true" readonly="">

										</div>

									</div>

								</div>

								<!--/span-->

								<div class="col-md-3">

									<div class="form-group">

										<label class="control-label">नाम / Name</label>

										<div class="input-group">

										<span class="input-group-addon">

										<i class="fas  fa-user"></i>

										</span>

										<input type="text" class="form-control" id="empname" name="empname" placeholder="Employee Name" readonly="" value="<?php echo $result['name'];?>">

										</div>

									</div>

								</div>

								

								<!--/span-->

							<!--/row-->

								<div class="col-md-3">

									<div class="form-group">

										<label class="control-label">मोबाइल / Mobile</label>

										<div class="input-group">

										<span class="input-group-addon">

										<i class="fa fa-phone"></i>

										</span>

										<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Employee Mobile number" readonly="" value="<?php echo $result['mobile'];?>">

										</div>

									</div>

								</div>

								<!--/span-->

								<div class="col-md-3">

									<div class="form-group">

										<label class="control-label">ई -मेल / E-Mail</label>

										<div class="input-group">

										<span class="input-group-addon">

										<i class="fas fa-envelope"></i>

										</span>

										<input type="email" class="form-control" id="email" name="email" placeholder="Employee Email id" readonly="" value="<?php echo $result['emp_email'];?>">

										</div>

									</div>

								</div>

								<!--/span-->

							</div>

							<!--/row-->

							<div class="row">

								<div class="col-md-3">

									<div class="form-group">

										<label class="control-label">पदनाम / Designation</label>

										<div class="input-group">

										<span class="input-group-addon">

										<i class="fas fa-user-graduate"></i>

										</span>

										<input type="text" id="design" name="design" placeholder="Employee Designation" class="form-control" readonly="" value="<?php echo $result['designation'];?>">

										</div>

									</div>

								</div>

								<div class="col-md-3">

									<div class="form-group">

										<label class="control-label">विभाग / Department</label>

			                    	<input type="text" id="dept" name="dept" class="form-control" placeholder="Employee Department" readonly="" value="<?php echo getdepartment($result['department']);?>">

									</div>

								</div>

							<!--/row-->

							<!--/row-->	

								<div class="col-md-3">

									<div class="form-group">

										<label class="control-label">User</label>

										<select class="form-control" style="width: 100%;" tabindex="-1" id="user_role" name="role" autofocus="true">

			                    		<option value="" selected="" disabled="">Select User</option>

			                    		<option value="1">Controlling Incharge</option>

			                    		<option value="2">SBF Admin</option>

			                    		<option value="3">CSBF Admin</option>

			                    	</select>

									</div>

								</div>

								<!-- <div class="col-md-3">

									<div class="form-group">

										<label class="control-label">Bill Unit</label>

										<select class="form-control select2" style="width: 100%;" tabindex="-1" id="billunit" name="billunit[]" autofocus="true" multiple="multiple">

			                    		<option value="" disabled="disabled">Select Bill Unit</option>

			                    		<?php

			                    		dbcon1();

			                    		$query = mysql_query("SELECT billunit FROM billunit where au='0107' ORDER BY `billunit` ASC");

			                    		while($row = mysql_fetch_array($query))

			                    		{

			                    			echo "<option value='".$row['billunit']."'>".$row['billunit']."</option>";

			                    		}

			                    		?>

			                    	</select>

									</div>

								</div> -->

							</div>					

														

						</div>

								<div class="form-actions right">

								<button type="reset" class="btn default">Cancel</button>

								<button type="submit" class="btn blue submit_btn" id='submit_btn' name='button'><i class="fa fa-check"></i> प्रस्तुत करे / Submit</button>

								</div>

					</form>

								<!--/span-->

							</div>

							

					<!-- END FORM-->

				</div>

			</div>



			

			

		</div>

	</div>



	

	

<?php

	include 'common/footer.php';

?>

<script>

	$(document).ready(function(){

      var value = $('#user_id').val();

      //alert(value);

      $.ajax({

        url: 'control/adminProcess.php',

        type: 'POST',

        data: {action: 'fetchuser', id : value},

      })

      .done(function(html) 

      {

      	// console.log(html);

        var data = JSON.parse(html);

      //alert(data.user_bu);

        if(data==1)

          {

            alert("Error");

          }

          else

          {

            $("#billunit").val(data.user_bu).trigger("change");

            $("#user_role").val(data.user_role).trigger("change");

          }

      });

    });

</script>

