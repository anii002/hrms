<?php
$_GLOBALS['a'] = 'advance';
include_once('../global/header_update.php');

include('create_log.php');

$action = "Visited Advance page";
$action_on = $_SESSION['set_update_pf'];
create_log($action, $action_on);

?>
<!--Bio Tab Start -->
<div style="padding:10px;margin:5px;padding-top:0px;margin-top:-15px;">
	<div class="row" style="background:#67809f;margin:0px"><span style="color:white;font-size:22px;font-weight:200">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-address-card" style="font-size:22px;font-weight:200"></i>&nbsp;&nbsp;&nbsp;&nbsp;Advance</span>
	</div>
	<div style="border:1px solid #67809f;padding:30px;">
		<div class="box-header with-border">
			<!--<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Advance</h3>-->
		</div><br>
		<form action="process_main.php?action=update_advance" method="POST" class="apply_readonly">
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12">PF No</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<input type="text" class="form-control primary TextNumber common_pf_number" id="adv_pf" name="adv_pf" placeholder="Enter PF No" readonly>
								<input type="hidden" id="adv_count" name="adv_count">
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-12 col-xs-12 ">
						<div class="row">
							<a href="#" class="btn btn-primary pull-right" id="add_mul_adv">+Add Advance</a>
						</div>

					</div>
				</div>

				<div id="add_advance">
				</div>
				<?php
				$conn=dbcon1();
				$sql = mysqli_query($conn,"select * from advance_temp where adv_pf_number='" . $_SESSION['set_update_pf'] . "'");
				$count_ad = mysqli_num_rows($sql);
				if ($count_ad == 0) {
					echo "<label class='control-label col-md-4 col-sm-3 col-xs-12' style='font-size:15px;color:red;'>Advance for This Employee Is Not Available</label>";
				}
				for ($i = 1; $i <= $count_ad; $i++) {

					$result = mysqli_fetch_array($sql);

				?>
					<h3><?php echo $i; ?> Advance</h3>
					<hr style='height:1px;border:none;color:#f39c12;background-color:#f39c12;'>

					<div class="row">
						<input type="hidden" id="hidden_advance_id<?php echo $i; ?>" name="hidden_advance_id<?php echo $i; ?>" value="<?php echo $result['id']; ?>">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12">Advances Type</label>
								<div class="col-md-8 col-sm-8 col-xs-12">

									<select class="form-control primary select2" id="adv_type<?php echo $i; ?>" name="adv_type<?php echo $i; ?>" style="width:100%;">
										<?php echo get_all_advance($result['adv_type']); ?>
									</select>
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12">Letter No<span class=""></span></label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="form-control primary" id="adv_letterno<?php echo $i; ?>" name="adv_letterno<?php echo $i; ?>" value="<?php echo $result['adv_letterno']; ?>" required />
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12">Letter Date</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="form-control primary calender_picker" id="adv_letterdate<?php echo $i; ?>" name="adv_letterdate<?php echo $i; ?>" required value="<?php echo date('d-m-Y', strtotime($result['adv_letterdate'])); ?>" />
								</div>
							</div>
						</div>
					</div><br>

					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12">W.E.F Date</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="form-control primary calender_picker" id="adv_wefdate<?php echo $i; ?>" name="adv_wefdate<?php echo $i; ?>" required value="<?php echo date('d-m-Y', strtotime($result['adv_wefdate'])); ?>" />
								</div>
							</div>
						</div>


						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12">Amount<span class=""></span></label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="form-control primary" id="adv_amount<?php echo $i; ?>" name="adv_amount<?php echo $i; ?>" value="<?php echo $result['adv_amount']; ?>" required />
								</div>
							</div>
						</div>
					</div><br>
					<h5><b>Recovery Details:</b></h5>
					<hr>
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12">Total Amount</label>
								<label class="control-label col-md-2 col-sm-3 col-xs-12">Principle</label>
								<div class="col-md-6 col-sm-8 col-xs-12">
									<input type="text" class="form-control primary" id="adv_principle<?php echo $i; ?>" name="adv_principle<?php echo $i; ?>" value="<?php echo $result['adv_principle']; ?>" />
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12">Interest<span class=""></span></label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="form-control primary" id="adv_interest<?php echo $i; ?>" name="adv_interest<?php echo $i; ?>" value="<?php echo $result['adv_interest']; ?>" />
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12">From Date</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="form-control primary calender_picker" id="adv_frmdate<?php echo $i; ?>" name="adv_frmdate<?php echo $i; ?>" value="<?php echo date('d-m-Y', strtotime($result['adv_from'])); ?>" />
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12">To Date<span class=""></span></label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="form-control primary calender_picker" id="adv_todate<?php echo $i; ?>" name="adv_todate<?php echo $i; ?>" value="<?php echo date('d-m-Y', strtotime($result['adv_to'])); ?>" />
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-2 ">Remark</label>
								<div class="col-md-10">
									<textarea rows="4" class="form-control primary description" id="adv_remark<?php echo $i; ?>" name="adv_remark<?php echo $i; ?>" placeholder="Enter Advances Remark" required><?php echo $result['adv_remark']; ?></textarea>
								</div>
							</div>
						</div>
					</div><br>
				<?php } ?>

				<div class="form-group">
					<div class="col-sm-2 col-xs-12 pull-right">
						<input type="hidden" id="txtsession" name="txtsession" class="form-control" value="<?php echo $_SESSION['SESS_MEMBER_NAME']; ?>" />
						<input type="submit" id="btnSave" name="btnSave" value="Save" class="btn btn-success" />
						<!--<input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />-->
					</div>

				</div>

			</div>
		</form>
	</div>
</div>
<!--advance Tab End -->
<?php include('modal_js_header.php'); ?>
<script>
	//sr update advance
	var adv_count = <?php echo $count_ad + 1; ?>;
	$("#add_mul_adv").click(function() {
		$.ajax({
			type: 'POST',
			url: 'process.php',
			data: 'action=get_advance&adv_count=' + adv_count,
			success: function(html) {
				//alert(html);
				$("#add_advance").prepend(html);
				$("#adv_count").val(adv_count);
				adv_count++;
			}
		});
	});
</script>
<script>
	function fun_call() {
		var value = document.getElementById('reason_desig').value;
		var value1 = document.getElementById('app_olddesig1').value;
		document.getElementById('hide_app_olddesig_reason').value = value;
		document.getElementById('app_olddesig').value = value1;
	}
</script>
<script>
	$('#tr_training_status').change(function() {
		var value = $(this).val();
		if (value == 5) {
			$('#schedule_id').show();
		} else {
			$('#schedule_id').hide();
		}
	});
</script>
<?php
if (isset($_SESSION['set_update_pf'])) {
	echo "<script>$('.common_pf_number').val('" . $_SESSION['set_update_pf'] . "'); </script>";
	//echo "<script>alert('".$_SESSION['same_pf_no']."'); </script>";
}
?>
<script>
	$(document).ready(function() {
		$("#bio_pf_no").change(function() {
			if ($(".bio_pf_no").text() == "") {
				var bio_pf_no = $(this).val();
				//alert(bio_pf_no);
				$.ajax({
					type: 'POST',
					url: 'set_session.php',
					data: 'action=set_pf_session&bio_pf_no=' + bio_pf_no,
					success: function(html) {
						//alert(html);
						window.location = 'sr_entry.php';
					}
				});
			} else {
				alert("Enter Correct PF Format");
			}
		});
	});
</script>
<?php include_once('../global/footer.php'); ?>