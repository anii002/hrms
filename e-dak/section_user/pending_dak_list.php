<?php
$GLOBALS['flag'] = "4.9";
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
					<a href="#">DAK Application</a>
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
						<i class="fa fa-book"></i> Pending List
					</div> 
				</div>
				<div class="portlet-body form">
					<div class="form-body">
						<table class="table table-bordered table-hover" id="example1">
							<thead>
								<tr>
									<th>SR No</th>
									<th>Unique DAK No.</th>
									<th>Marked TO</th>
									<th>Station</th>
									<th>Forwarded Date</th>
									<th>Gist of Letter</th>
									<th>Source</th>
									<th>Action</th> 
								</tr>
							</thead>
							<tbody>
								<?php
								$query_src = "SELECT tbl_dak_forward.id,gist_of_letter,tbl_dak_forward.unique_dak_no,tbl_dak_forward.marked_to,tbl_dak.station_id,forwarded_date,source from tbl_dak_forward,tbl_dak where tbl_dak.unique_dak_no=tbl_dak_forward.unique_dak_no and tbl_dak_forward.marked_to='" . $_SESSION['emp_id'] . "' and tbl_dak_forward.status='1'  ";
								// order by tbl_dak.id desc
								$result_src = mysql_query($query_src, $db_edak);
								$sr = 1;
								while ($value_src = mysql_fetch_array($result_src)) {
								  
                                    $fetch_query = "SELECT stationdesc FROM station WHERE stationcode = '".$value_src['station_id']."'";
                               
                               $fetch_query1 = mysql_query($fetch_query,$db_common);
										$fetch_query2 = mysql_fetch_array($fetch_query1);
										$st = $fetch_query2["stationdesc"];
										
									echo "
								<tr>
								<td>" . $sr++ . "</td>
								<td>" . $value_src['unique_dak_no'] . "</td>
								<td>" . getSectionMarked($value_src['marked_to']) . "</td>
								<td>" . $st . "</td>
								<td>" . $value_src['forwarded_date'] . "</td>
								<td>" . $value_src['gist_of_letter'] . "</td>
								<td>" . getSource($value_src['source']) . "</td>
								
								
								";

									echo "<td><button dak_no='" . $value_src['unique_dak_no'] . "' value='" . $value_src['id'] . "'  class='btn btn-info fetchid' data-target='#responsive' data-toggle='modal' style='margin-left:10px;'>Reply</button></td>";

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
		<h4 class="modal-title">Reply Status : </span> </h4>
	</div>
	<form action="" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
		<div class="modal-body">
			<div class="portlet-body form">
				<!-- BEGIN FORM-->

				<input type="hidden" id="uid" name="uid">
				<input type="hidden" id="dak_no" name="dak_no">
				<div class="form-body">

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Select Status</label>
								<select name="status1" id="status1" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>

									<option value="" selected disabled>--Select Status--</option>
									<?php

									$query_role = mysql_query("SELECT * from replied_status ", $db_edak);

									while ($value_role = mysql_fetch_array($query_role)) {
										echo "<option value='" . $value_role['id'] . "'>" . $value_role['status'] . "</option>";
									}

									?>
								</select>


							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-9">
							<div class="form-group">
								<label class="control-label">Remark</label>
								<textarea class="form-control" name="remark"></textarea>
							</div>
						</div>
					</div>


				</div>
				<!--/row-->

			</div>
		</div>
		<div class="modal-footer">
			<!--  -->
			<button type="button" style="float:left" class="btn blue rep_btn">Submit</button>
			<button type="button" onclick="location.reload();" class="btn btn-default">Close</button>
		</div>
	</form>
</div>

<script>
	$(document).on("click", ".fetchid", function() {
		var value = $(this).attr("value");
		var no = $(this).attr("dak_no");

		//alert(no + "_" + value);

		$("#uid").val(value);
		$("#dak_no").val(no);



	});
	
	$(document).on("click",".rep_btn",function(){
		var status=$("#status1").val();
		var remark=$("#remark").val();
		var uid=$("#uid").val();
		var dak_no=$("#dak_no").val();
		//alert(status+"___"+remark);

		if(status==null || status=='')
		{
			alert("please select status");

		}
		else
		{
			$.ajax({
				type: "post",
				url: "control/adminProcess.php",
				data: "action=reply_status&status=" + status + "&remark=" + remark+"&dak_no="+dak_no+"&uid="+uid,
				success: function(data) {
					//console.log(data);
					//alert(data);
					if (data == '1') {
						alert('Submitted successfully');
						window.location='pending_dak_list.php';
					} else {
						alert("Failed..");
						window.location = "pending_dak_list.php";
					}

				}
			});
		}
	});


</script>