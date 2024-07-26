<?php
$_GLOBALS['a'] = 'property';
include_once('../global/header_update.php');

include('create_log.php');

$action = "Visited Property page";
$action_on = $_SESSION['set_update_pf'];
create_log($action, $action_on);

?>
<!--Bio Tab Start -->
<div style="padding:10px;margin:5px;padding-top:0px;margin-top:-15px;">
	<div class="row" style="background:#67809f;margin:0px"><span style="color:white;font-size:22px;font-weight:200">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-address-card" style="font-size:22px;font-weight:200"></i>&nbsp;&nbsp;&nbsp;&nbsp;Property</span>
	</div>
	<div style="border:1px solid #67809f;padding:30px;">
		<div class="box-header with-border">
			<!--<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Property</h3>-->
		</div><br>
		<form action="process_main.php?action=update_property" method="POST" class="apply_readonly">

			<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12">PF No</label>
						<div class="col-md-8 col-sm-8 col-xs-12">
							<input type="text" id="pd_pf_no" name="pd_pf_no" class="form-control TextNumber common_pf_number" placeholder="Enter PF Number" readonly required>
							<input type="hidden" name="pro_count" id="pro_count">
						</div>
					</div>
				</div>
				<div class="col-md-5 col-sm-12 col-xs-12">
					<div class="row">
						<a href="#" class="btn btn-primary pull-right" id="add_mul_pro">+Add Property</a>
					</div>


				</div>
			</div>
			<br>
			<div id="add_property">
			</div>

			<br>
			<?php
			$conn = dbcon1();
			$sql = mysqli_query($conn, "select * from property_temp where pro_pf_number='" . $_SESSION['set_update_pf'] . "'");
			$count_p = mysqli_num_rows($sql);
			if ($count_p == 0) {
				echo "<label class='control-label col-md-4 col-sm-3 col-xs-12' style='font-size:15px;color:red;'>Property for This Employee Is Not Available</label>";
			}
			$pf_proprety_count = $count_p;
			for ($i = 1; $i <= $count_p; $i++) {

				$result1 = mysqli_fetch_array($sql);

			?>
				<input type="hidden" name="property_update_id<?php echo $i; ?>" id="property_update_id<?php echo $i; ?>" value="<?php echo $result1['id']; ?>">

				<h3><?php echo $i; ?> Property</h3>
				<div class="clearfix"></div>
				<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
				<div class="row">

					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12">Property Type</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<select name="pd_pro_type<?php echo $i; ?>" id="pd_pro_type<?php echo $i; ?>" class="form-control property select2" style="margin-top:0px; width:100%;" required>
									<?php
									echo get_all_property_type($result1['pro_type']);
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
							<label class="control-label col-md-4 col-sm-3 col-xs-12">Item</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<select name="pd_item_name<?php echo $i; ?>" id="pd_item_name<?php echo $i; ?>" class="form-control select2" style="margin-top:0px; width:100%;" required>
									<?php
									echo get_all_property_item($result1['pro_item']);
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12">Other Item</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<input type="text" id="pd_othr_item_name<?php echo $i; ?>" name="pd_othr_item_name<?php echo $i; ?>" class="form-control TextNumber" value="<?php echo $result1['pro_otheritem']; ?>">
							</div>
						</div>
					</div>
				</div>
				<br>
				<?php //if($result1['pro_type']=='1'){
				?>
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12 hide_make<?php echo $i; ?>" <?php if ($result1['pro_type'] == '1') {
																								echo "style=''";
																							} else {
																								echo "style='display:none'";
																							} ?>>
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12">Make/Model</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<input type="text" id="pd_make_model<?php echo $i; ?>" name="pd_make_model<?php echo $i; ?>" class="form-control TextNumber" value="<?php echo $result1['pro_make']; ?>">
							</div>
						</div>
					</div>
					<?php //}
					?>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-1 col-xs-12">DOP</label>
							<div class="col-md-8 col-sm-12 col-xs-12">
								<input type="text" id="pd_dop<?php echo $i; ?>" name="pd_dop<?php echo $i; ?>" class="form-control calender_picker" value="<?php echo date('d-m-Y', strtotime($result1['pro_dop'])); ?>" required>
							</div>
						</div>
					</div>
				</div>
				<br>
				<?php //if($result1['pro_type']=='2'){
				?>
				<div class="row" id="prop_detail1_<?php echo $i; ?>" <?php if ($result1['pro_type'] == '2') {
																			echo "style=''";
																		} else {
																			echo "style='display:none'";
																		} ?>>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12">Location</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<input type="text" id="pd_location<?php echo $i; ?>" name="pd_location<?php echo $i; ?>" class="form-control TextNumber" value="<?php echo $result1['pro_location']; ?>">
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-1 col-xs-12">Registration No</label>
							<div class="col-md-8 col-sm-12 col-xs-12">
								<input type="text" id="pd_reg_no<?php echo $i; ?>" name="pd_reg_no<?php echo $i; ?>" class="form-control TextNumber" value="<?php echo $result1['pro_regno']; ?>">
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="row" id="prop_detail2_<?php echo $i; ?>" <?php if ($result1['pro_type'] == '2') {
																			echo "style=''";
																		} else {
																			echo "style='display:none'";
																		} ?>>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12">Area</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<input type="text" id="pd_area<?php echo $i; ?>" name="pd_area<?php echo $i; ?>" class="form-control TextNumber" value="<?php echo $result1['pro_area']; ?>">
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-1 col-xs-12">Survey Number</label>
							<div class="col-md-8 col-sm-12 col-xs-12">
								<input type="text" id="pd_sur_no<?php echo $i; ?>" name="pd_sur_no<?php echo $i; ?>" class="form-control" value="<?php echo $result1['pro_surveyno']; ?>">
							</div>
						</div>
					</div>
				</div>
				<br>
				<php?>
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12">Total Cost</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" id="pd_total_cost<?php echo $i; ?>" name="pd_total_cost<?php echo $i; ?>" class="form-control onlyNumber" value="<?php echo $result1['pro_cost']; ?>" required>
								</div>
							</div>
						</div>

					</div>
					<br>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12">Source of Amount/Source Type</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<button class="btn btn-primary add_source" type="button" id="add_source<?php echo $i; ?>">+ADD</button>
									<!--button class="btn btn-danger remove_source" type="button" id="remove_source<?php //echo $i;
																													?>">-REMOVE</button-->
								</div>
							</div>
						</div>
					</div>
					<div class="row" id="add_source_div<?php echo $i; ?>">
						<?php echo get_pro_source($result1['pro_sourcetype'], $result1['pro_amount'], $i) ?>
					</div>
					<br>

					<br>
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12">Letter No</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" id="pd_letter_no<?php echo $i; ?>" name="pd_letter_no<?php echo $i; ?>" class="form-control" value="<?php echo $result1['pro_letterno']; ?>" required>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-1 col-xs-12">Letter Date</label>
								<div class="col-md-8 col-sm-12 col-xs-12">
									<input type="text" id="pd_letter_date<?php echo $i; ?>" name="pd_letter_date<?php echo $i; ?>" class="form-control calender_picker" required value="<?php echo date('d-m-Y', strtotime($result1['pro_letterdate'])); ?>">
								</div>
							</div>
						</div>
					</div><br>

					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-1 col-xs-12">Remarks</label>
								<div class="col-md-10 col-sm-12 col-xs-12">
									<textarea rows="2" style="resize:none" class="form-control primary description" id="prop_remark<?php echo $i; ?>" name="prop_remark<?php echo $i; ?>"><?php echo $result1['pro_remark']; ?></textarea>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
				<br>
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
<!--property Tab End -->
<?php include('modal_js_header.php'); ?>

<script>
	jQuery(document).ready(function() {
		$(".hide_make").hide();
		$("#pd_pro_type").change(function() {
			var pro_type = $(this).val();
			if (pro_type == '1')
				$(".hide_make").show();
			else
				$(".hide_make").hide();
			//alert(pro_type);
			$.ajax({
				type: "post",
				url: "process.php",
				data: "action=get_property_item&pro_type=" + pro_type,
				success: function(data) {
					//alert(data);
					$("#pd_item_name").html(data);
				}
			});
		});
	});
</script>
<script>
	var r = <?php echo $count_p + 1; ?>;
	$(document).on('click', '.add_source', function() {
		debugger; // Debugger for inspecting the code
		r++; // Increment the counter

		var pt = $(this).attr('id');
		var t = pt.slice(-1); // Extract the last character from the ID

		// Build the new source form HTML
		var source = `
        <br>
        <div class='col-md-6 col-sm-12 col-xs-12'>
            <div class='form-group'>
                <label class='control-label col-md-4 col-sm-3 col-xs-12'>Source Type</label>
                <div class='col-md-8 col-sm-8 col-xs-12'>
                    <select name='pd_sourcr_type${t}[${r}]' id='pd_sourcr_type${r}' class='form-control select2' style='margin-top:0px; width:100%;' required>
                        <option disabled selected>Select Source Type</option>
                        <?php
						$conn = dbcon();
						$sqlreligion = mysqli_query($conn, "SELECT * FROM property_source") or die(mysqli_error($conn));
						while ($rwDept = mysqli_fetch_array($sqlreligion)) {
							echo "<option value='" . $rwDept['id'] . "'>" . $rwDept['property_source'] . "</option>";
						}
						?>
                    </select>
                </div>
            </div>
        </div>
        <div class='col-md-6 col-sm-12 col-xs-12'>
            <div class='form-group'>
                <label class='control-label col-md-4 col-sm-1 col-xs-12'>Amount</label>
                <div class='col-md-8 col-sm-12 col-xs-12'>
                    <input type='text' id='pd_source_amt${r}' name='pd_source_amt${t}[${r}]' class='form-control TextNumber' placeholder='Enter Source Amount' required>
                </div>
            </div>
        </div>
        <br>
    `;

		// Append the new form to the target div
		$("#add_source_div" + t).append(source);
		// Initialize the select2 plugin on the new element
		$(".select2").select2();
	});



	$(document).on('change', '.property', function() {
		debugger;
		var pr_val = $(this).val();
		var p_id = $(this).attr('id');
		var s_pid = p_id.slice(-1);
		if (pr_val == 2) {
			$("#prop_detail2_" + s_pid).show();
			$("#prop_detail1_" + s_pid).show();
		} else {
			$("#prop_detail2_" + s_pid).hide();
			$("#prop_detail1_" + s_pid).hide();
		}

		var pro_type = $(this).val();
		var ss = $(this).attr('id');
		var pp = ss.slice(-1);
		if (pro_type == '1')
			$(".hide_make" + s_pid).show();
		else
			$(".hide_make" + s_pid).hide();
		//alert(pro_type);
		$.ajax({
			type: "post",
			url: "process.php",
			data: "action=get_property_item&pro_type=" + pro_type,
			success: function(data) {
				// alert(data);
				$("#pd_item_name" + pp).html(data);
			}
		});
	});
</script>
<?php
if (isset($_SESSION['set_update_pf'])) {
	echo "<script>$('.common_pf_number').val('" . $_SESSION['set_update_pf'] . "'); </script>";
	//echo "<script>alert('".$_SESSION['same_pf_no']."'); </script>";
}
?>
<?php include_once('../global/footer.php'); ?>
<script>
	var pro_count = <?php echo $pf_proprety_count + 1; ?>;
	$("#add_mul_pro").click(function() {
		$.ajax({
			type: 'POST',
			url: 'process.php',
			data: 'action=get_property&pro_count=' + pro_count,
			success: function(html) {
				//alert(html);
				$("#add_property").prepend(html);
				$("#pro_count").val(pro_count);
				pro_count++;
			}
		});
	});
</script>