<?php
$GLOBALS['flag'] = "1.3";
include('common/header.php');
include('common/sidebar.php');
?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->

		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="index.php">Home </a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="#">Pending List</a>
				</li>
			</ul>

		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN DASHBOARD STATS -->
		<div class="row">
		    <div class="col-md-12">
			    <div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-book"></i>Pending List
					</div> 
				</div>
				<div class="portlet-body form">
					<div class="form-body">
						<table class="table table-bordered table-hover" id="example1">
							<thead>
								<tr>
									<th>SR No</th>
									<th>Unique DAK No.</th>
									<th>Gist of Letter</th>
									<th>Marked TO</th>
									<th>Station</th>
									<th>Forwarded Date</th>
									<th>Source</th>
									<th>Status</th>
									 <th>Action</th>  
								</tr>
							</thead>
							<tbody>
								<?php
								// $query_src = "SELECT *,source from tbl_dak_forward,tbl_dak where tbl_dak.unique_dak_no=tbl_dak_forward.unique_dak_no and tbl_dak_forward.status='1' GROUP BY tbl_dak.unique_dak_no ";
								$query_src = "SELECT *,tbl_dak_forward.id as tbl_dak_forward_id,tbl_dak.id as tbl_dak_id,source from tbl_dak_forward,tbl_dak where tbl_dak.unique_dak_no=tbl_dak_forward.unique_dak_no and tbl_dak_forward.status='1' GROUP BY tbl_dak.unique_dak_no order by tbl_dak_forward.id desc";

								//order by tbl_dak.id desc
								$result_src = mysql_query($query_src, $db_edak);
								
								$sr = 1;
								while ($value_src = mysql_fetch_array($result_src)) {
                               $fetch_query = "SELECT stationdesc FROM station WHERE stationcode = '".$value_src['station_id']."'";
                               //print_r($fetch_query);
                               $fetch_query1 = mysql_query($fetch_query,$db_common);
										$fetch_query2 = mysql_fetch_array($fetch_query1);
										$st = $fetch_query2["stationdesc"];
										
									echo "
								<tr>
								<td>" . $sr++ . "</td>
								<td>" . $value_src['unique_dak_no'] . "</td>
								<td>" . $value_src['gist_of_letter'] . "</td>
								<td>" . getSectionMarked($value_src['marked_to']) . "</td>
								<td>" . $st . "</td>
								<td>" . $value_src['forwarded_date'] . "</td>
								<td>" . getSource($value_src['source']) . "</td>
								<td class='text-danger'>" . getStatus($value_src['status']) . "</td>
								
								";
								$get_sec_id="SELECT sec_id from tbl_section where sec_name='".getSectionMarked($value_src['marked_to'])."'";
								$result_get_sec_id = mysql_query($get_sec_id, $db_edak);
								while ($row = mysql_fetch_array($result_get_sec_id)) {	
									$sec_id=$row['sec_id'];
									//echo "<input type='hidden' id='mrk_to' value='".$sec_id."'>";
								}

									echo "<td><button tbl_dak_id='" . $value_src['tbl_dak_id'] . "' tbl_dak_forward_id='" . $value_src['tbl_dak_forward_id'] . "'  u_dak_no='".$value_src['unique_dak_no']."' recd_frm='".$value_src['recd_from']."' dol='".$value_src['dt_of_letter']."' gistofletter='".$value_src['gist_of_letter']."' mrk_to='".$sec_id."' src='".$value_src['source']."' class='btn btn-info update_pen_tbl' data-target='#responsive' data-toggle='modal'><i class='fa fa-edit'></i></button>";


									echo "</tr>
								";
								}



								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
	<!-- END DASHBOARD STATS -->
	<div class="clearfix">
	</div>
</div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php
include('common/footer.php');
?>
<div id="responsive" class="modal fade modal-scroll" tabindex="-1" data-replace="true">
		<div class="modal-header btn-orange-moon">
			<button type="button" class="close" onclick="location.reload();" aria-hidden="true"></button>
			<h4 class="modal-title">Update : </span> </h4>
		</div>
		<form action="control/adminProcess.php?action=update_pending_list" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
			<div class="modal-body">
				<div class="portlet-body form">
					<!-- BEGIN FORM-->

					<input type="hidden" id="tbl_dak_id" name="tbl_dak_id">
					<input type="hidden" id="tbl_dak_forward_id" name="tbl_dak_forward_id">
					<div class="form-body">

						<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Unique DAK No.</label>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fas  fa-user"></i>
											</span>
											<input type="text" class="form-control" id="u_dak_no" name="u_dak_no" value="" readonly>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Received From </label>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fas  fa-user"></i>
											</span>
											<input type="text" class="form-control " id="rd_from" name="rd_from" placeholder="Enter record from" required>
										</div>
									</div>
								</div>

								<!--/span-->
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Date of Letter</label>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fas fa-envelope"></i>
											</span>
											<input type="text" class="form-control txtrdfrom" id="dt_letter" name="dt_letter" required>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Gist of Letter</label>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fas fa-envelope"></i>
											</span>
											<textarea class="form-control" id="gist_letter" name="gist_letter" rows="3" required></textarea>
											<!-- <input type="text" class="form-control" id="gist_letter" name="gist_letter" placeholder="Enter Gist of letter"> -->
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<!--/row-->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Marked To</label>

										<select name="marked_to" id="marked_to" class="form-control select2me billunitindex" style="width: 100%;" tabindex="-1" required>
											<option value="" selected="" disabled="">Select Marked To</option>

											<?php

											$query_role = mysql_query("SELECT * from tbl_section", $db_edak);

											while ($value_role = mysql_fetch_array($query_role)) {
												echo "<option value='" . $value_role['sec_id'] . "'>" . $value_role['sec_name'] . "</option>";
											}

											?>
										</select>


									</div>
								</div>

								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Date</label>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fas fa-envelope"></i>
											</span>
											<input type="text" id="cur_date" name="cur_date" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<!--/row-->

							<!--/row-->
							<div class="row">


								<div class="col-md-6" id="section1">
									<div class="form-group">
										<label class="control-label">Source </label>

										<select name="src" id="src" class="select2me form-control billunitindex" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
											<option value="" selected disabled>Select Source</option>
											<?php

											$query_src = mysql_query("SELECT id,src_name from master_source", $db_edak);

											while ($value_src = mysql_fetch_array($query_src)) {
												echo "<option value='" . $value_src['id'] . "'>" . $value_src['src_name'] . "</option>";
											}

											?>
										</select>


									</div>
								</div>
								<!--/span-->

								<!--/span-->
							</div>


					</div>
					<!--/row-->

				</div>
			</div>
			<div class="modal-footer">
				<!--  -->
				<button type="submit" style="float:left" class="btn blue">Update</button>
				<button type="button" onclick="location.reload();" class="btn btn-default">Close</button>
			</div>
		</form>
	</div>
<script type="text/javascript">
	$(function() {

		$('.txtrdfrom').datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true
		});

	});
	$(document).on("click",'.update_pen_tbl',function(){
		var tbl_dak_id=$(this).attr("tbl_dak_id");
		var tbl_dak_fw_id=$(this).attr("tbl_dak_forward_id");
		var u_dak_no=$(this).attr("u_dak_no");
		var recd_frm=$(this).attr("recd_frm");
		var dol=$(this).attr("dol");
		var gistofletter=$(this).attr("gistofletter");
		var mrk_to=$(this).attr("mrk_to");
		var src=$(this).attr("src");

		$("#tbl_dak_id").val(tbl_dak_id);
		$("#tbl_dak_forward_id").val(tbl_dak_fw_id);
		$("#u_dak_no").val(u_dak_no);
		$("#rd_from").val(recd_frm);
		$("#dt_letter").val(dol);
		$("#gist_letter").val(gistofletter);
		$("#marked_to").val(mrk_to).trigger('change');
		$("#src").val(src).trigger('change');

	});

</script>