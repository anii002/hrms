<?php
$_GLOBALS['a'] = 'fam_comp';
include_once('../global/header_update.php');

include('create_log.php');

$action = "Visited Family Composition page";
$action_on = $_SESSION['set_update_pf'];
create_log($action, $action_on);

?>
<!--Bio Tab Start -->
<div style="padding:10px;margin:5px;padding-top:0px;margin-top:-15px;">
	<div class="row" style="background:#67809f;margin:0px"><span style="color:white;font-size:22px;font-weight:200">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-address-card" style="font-size:22px;font-weight:200"></i>&nbsp;&nbsp;&nbsp;&nbsp;Family Composition</span>
	</div>
	<div style="border:1px solid #67809f;padding:30px;">
		<div class="box-header with-border">
			<!--<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Family Composition</h3>-->
		</div>

		<form method="post" action="process_main.php?action=update_family_compo" class="apply_readonly">
			<div class="modal-body">
				<div class="row" style="margin-top:10px;margin-bottom:10px;">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">PF No</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<input type="text" id="fc_pf_main" name="fc_pf_main" class="form-control TextNumber common_pf_number" readonly>
							</div>
						</div>
					</div>
					<div class="col-md-5 ">
						<div class="row pull-right" style="margin-right:20px;">
							<a class="btn btn-primary" href="#" id="add_member" name="add_member">+Add Family Member</a>
						</div>

					</div>
				</div>
				<input type="hidden" name="hidden_fc_count" id="hidden_fc_count">
				<div id="add_member_div" name="add_member_div">
				</div>
				<?php
				$conn1=dbcon1();
				$sql = mysqli_query($conn1,"select * from family_temp where emp_pf='" . $_SESSION['set_update_pf'] . "' order by fmy_dob asc");
				$result = mysqli_num_rows($sql);
				//echo "<script>alert('$result');</script>";
				$family_fetch_count = $result;
				for ($i = 1; $i <= $result; $i++) {
					$result2 = mysqli_fetch_array($sql);

				?>

					<input type="hidden" name="family_update_id<?php echo $i; ?>" id="family_update_id<?php echo $i; ?>" value="<?php echo $result2['id']; ?>">
					<div class="row">
						<h4><?php echo $i; ?> Family Member</h4>
					</div>
					<div class="row">
						<!--div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="fc_pf_no<?php //echo $i;
																	?>" name="fc_pf_no<?php //echo $i;
																										?>" class="form-control TextNumber" value="<?php //echo $result2['fmy_pf_number'];
																																								?>"   >
								  </div>
                                </div>
						    </div-->

					</div><br>
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12">Family Member Name</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" id="fc_fam_mem_name<?php echo $i; ?>" name="fc_fam_mem_name<?php echo $i; ?>" class="form-control TextNumber" value="<?php echo $result2['fmy_member']; ?>">
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12">Member Relation</label>
								<div class="col-md-8 col-sm-8 col-xs-12">

									<select name="fc_mem_rel<?php echo $i; ?>" id="fc_mem_rel<?php echo $i; ?>" class="form-control select2" style="margin-top:0px; width:100%;" required>
										<option value="<?php echo $result2['fmy_rel']; ?>" selected><?php echo get_relation($result2['fmy_rel']); ?></option>
										<?php
										$sqlDept = mysqli_query($conn1,"select * from relation where code<>'" . $result2['fmy_rel'] . "'");
										while ($rwDept = mysqli_fetch_array($sqlDept)) {
										?>
											<option value="<?php echo $rwDept["code"]; ?>"><?php echo $rwDept["longdesc"]; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12">Gender</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<select name="fc_mem_gender<?php echo $i; ?>" id="fc_mem_gender<?php echo $i; ?>" class="form-control select2" style="margin-top:0px; width:100%;" required>
										<option selected value="<?php echo $result2['fmy_gender']; ?>"><?php echo get_gender($result2['fmy_gender']); ?></option>
										<?php
										$sqlreligion = mysqli_query($conn1,"select * from gender where id<>'" . $result2['fmy_gender'] . "'");
										while ($rwDept = mysqli_fetch_array($sqlreligion)) {
										?>
											<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["gender"]; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-1 col-xs-12">DOB</label>
								<div class="col-md-8 col-sm-12 col-xs-12">
									<input type="text" id="fc_fam_mem_dob<?php echo $i; ?>" name="fc_fam_mem_dob<?php echo $i; ?>" value="<?php echo date('d-m-Y', strtotime($result2['fmy_dob'])); ?>" class="form-control calender_picker">
								</div>
							</div>
						</div>

					</div>
					<br>
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12">Date Of Updation</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" id="fc_updated_date<?php echo $i; ?>" name="fc_updated_date<?php echo $i; ?>" class="form-control" value="<?php echo date('d-m-Y', strtotime($result2['fmy_updatedate'])); ?>" readonly>
								</div>
							</div>
						</div>

					</div>
				<?php } ?>
			</div><br>
			<div class="clearfix"></div>
			<br>
			<div class="col-sm-2 col-xs-12 pull-right">
				<button type="submit" class="btn btn-info source">Save</button>
				<!--<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>-->

			</div>
			<br>
		</form>
	</div>
</div>
<!--family Tab End -->
<?php include('modal_js_header.php'); ?>
<?php
if (isset($_SESSION['set_update_pf'])) {
	echo "<script>$('.common_pf_number').val('" . $_SESSION['set_update_pf'] . "'); </script>";
	//echo "<script>alert('".$_SESSION['same_pf_no']."'); </script>";
}
?>
<?php include_once('../global/footer.php'); ?>
<script>
	var family_counter = <?php echo $family_fetch_count + 1; ?>;
	$("#add_member").click(function() {
		debugger;
		//alert("this"); 
		$.ajax({
			type: "post",
			url: "process.php",
			data: "action=get_family_form&family_counter=" + family_counter,
			success: function(data) {
				//alert(data);
				$("#add_member_div").prepend(data);
				$("#hidden_fc_count").val(family_counter);
				// alert(family_counter);
				family_counter++;
			}
		});
	});
</script>