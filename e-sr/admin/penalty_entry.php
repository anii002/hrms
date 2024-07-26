  <!--Penalty Tab Start -->

  <?php



	$_GLOBALS['a'] = 'penalty';

	include_once('../global/header1.php'); ?>

  <div style="padding:50px;border:1px solid black;margin:10px;">

  	<div class="box-header with-border">

  		<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Penalty</h3>

  	</div>

  	<br>

  	<form method="post" action="process_main.php?action=add_penalty" class="apply_readonly">

  		<div class="row">

  			<div class="col-md-12 col-sm-12 col-xs-12">

  				<a href="#" class="btn btn-primary pull-right" id="add_mul_penalty">+Add Penalty</a>

  			</div>

  		</div>



  		<div class="row">

  			<div class="col-md-6 col-sm-12 col-xs-12">

  				<div class="form-group">

  					<label class="control-label col-md-4 col-sm-3 col-xs-12">PF No</label>

  					<div class="col-md-8 col-sm-8 col-xs-12">

  						<input type="text" id="penalty_pf_no" name="penalty_pf_no" class="form-control TextNumber common_pf_number" readonly required>

  						<input type="hidden" name="penalty_count" id="penalty_count">

  					</div>

  				</div>

  			</div>

  		</div>

  		<br>

  		<div id="add_penalty">

  		</div>

  		<h3>1st Penalty</h3>

  		<hr style='height:1px;border:none;color:#f39c12;background-color:#f39c12;'>

  		<div class="clearfix"></div>

  		<div class="row">

  			<div class="col-md-6 col-sm-12 col-xs-12">

  				<div class="form-group">

  					<label class="control-label col-md-4 col-sm-3 col-xs-12">DR/Penalty Type</label>

  					<div class="col-md-8 col-sm-8 col-xs-12">

  						<select name="p_type1" id="p_type1" class="form-control select2" style="margin-top:0px; width:100%;" required>

  							<option value="" selected disabled>Select Type</option>

  							<option value=" "></option>

  							<?php



								$sqlDept = mysqli_query($conn,"select * from penalty_type");

								echo "select * from penalty_type" . mysqli_error($conn);

								while ($rwDept = mysqli_fetch_array($sqlDept)) {

								?>

  								<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["type"]; ?></option>

  							<?php

								}

								?>



  						</select>

  					</div>

  				</div>

  			</div>

  		</div><br>

  		<div class="clearfix"></div>



  		<div class="row">

  			<div class="col-md-6 col-sm-12 col-xs-12">

  				<div class="form-group">

  					<label class="control-label col-md-4 col-sm-3 col-xs-12">Penalty Issued</label>

  					<div class="col-md-8 col-sm-8 col-xs-12">

  						<input type="text" id="pen_awarded1" name="pen_awarded1" class="form-control calender_picker" placeholder="Select Date">

  					</div>

  				</div>

  			</div>

  			<div class="col-md-6 col-sm-12 col-xs-12">

  				<div class="form-group">

  					<label class="control-label col-md-4 col-sm-3 col-xs-12">Penalty Effected</label>

  					<div class="col-md-8 col-sm-8 col-xs-12">

  						<input type="text" id="pen_eff1" name="pen_eff1" class="form-control calender_picker" placeholder="Select Date">

  					</div>

  				</div>

  			</div>



  		</div><br>

  		<div class="clearfix"></div>

  		<div class="row">

  			<div class="col-md-6 col-sm-12 col-xs-12">

  				<div class="form-group">

  					<label class="control-label col-md-4 col-sm-3 col-xs-12">Letter No</label>

  					<div class="col-md-8 col-sm-8 col-xs-12">

  						<input type="text" id="l_no1" name="l_no1" class="form-control" placeholder="Enter Letter No" required>

  					</div>

  				</div>

  			</div>



  			<div class="col-md-6 col-sm-12 col-xs-12">

  				<div class="form-group">

  					<label class="control-label col-md-4 col-sm-3 col-xs-12">Letter Date</label>

  					<div class="col-md-8 col-sm-8 col-xs-12">

  						<input type="text" id="ltr_date1" name="ltr_date1" class="form-control calender_picker" placeholder="Enter Date" required>

  					</div>

  				</div>

  			</div>

  		</div><br>

  		<div class="clearfix"></div>

  		<div class="row">

  			<div class="col-md-6 col-sm-12 col-xs-12">

  				<div class="form-group">

  					<label class="control-label col-md-4 col-sm-3 col-xs-12">ChargeSheet Status</label>

  					<div class="col-md-8 col-sm-8 col-xs-12">

  						<select name="chrg_stat1" id="chrg_stat1" class="form-control select2" style="margin-top:0px; width:100%;" required>

  							<option value="" selected disabled>-- Select Type --</option>

  							<option value="blank"></option>

  							<?php

								$sql_status = mysqli_query($conn,"select * from charge_sheet_status");

								while ($status_sql = mysqli_fetch_array($sql_status)) {

									echo "<option value='" . $status_sql['id'] . "'>" . $status_sql['charge_sheet_status'] . "</option>";
								}

								?>



  						</select>

  					</div>

  				</div>

  			</div>

  			<div class="col-md-6 col-sm-12 col-xs-12">

  				<div class="form-group">

  					<label class="control-label col-md-4 col-sm-3 col-xs-12">ChargeSheet Reference</label>

  					<div class="col-md-8 col-sm-8 col-xs-12">

  						<input type="text" id="pen_chrg_ref_no1" name="pen_chrg_ref_no1" class="form-control" placeholder="Enter ChargeSheet Reference Number">

  					</div>

  				</div>

  			</div>





  		</div><br>



  		<div class="row">

  			<div class="col-md-6 col-sm-12 col-xs-12">

  				<div class="form-group">

  					<label class="control-label col-md-4 col-sm-3 col-xs-12">From Date</label>

  					<div class="col-md-8 col-sm-8 col-xs-12">

  						<input type="text" id="f_date1" name="f_date1" class="form-control calender_picker" placeholder="Select Date" required>

  					</div>

  				</div>

  			</div>



  			<div class="col-md-6 col-sm-12 col-xs-12">

  				<div class="form-group">

  					<label class="control-label col-md-4 col-sm-3 col-xs-12">To Date</label>

  					<div class="col-md-8 col-sm-8 col-xs-12">

  						<input type="text" id="t_date1" name="t_date1" class="form-control calender_picker" placeholder="Select Date" required>

  					</div>

  				</div>

  			</div>



  		</div><br>

  		<div class="row">



  		</div>



  		<br>
  		<div class="row">

  			<div class="col-md-12 col-sm-12 col-xs-12">

  				<div class="form-group">

  					<label class="control-label col-md-2 ">Remark</label>

  					<div class="col-md-10">

  						<textarea rows="4" cols="20" class="form-control primary description" id="penalty_remark1" name="penalty_remark1" placeholder="Enter Remark"></textarea>

  					</div>

  				</div>

  			</div>

  		</div><br>



  		<div class="col-sm-2 col-xs-12 pull-right">

  			<button type="submit" class="btn btn-info source">Save</button>

  			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

  		</div>

  	</form>

  </div>



  <script>
  	var penalty_count = 2;

  	$("#add_mul_penalty").click(function() {

  		$.ajax({

  			type: 'POST',

  			url: 'process.php',

  			data: 'action=get_penalty&penalty_count=' + penalty_count,

  			success: function(html) {

  				$("#add_penalty").prepend(html);

  				$("#penalty_count").val(penalty_count);

  				penalty_count++;

  			}

  		});

  	});



  	var pr_min = pro_count - 1;

  	$(".hide_make" + pr_min).hide();
  </script>

  <?php include_once('../global/footer.php'); ?>

  <!--Penalty Tab End -->