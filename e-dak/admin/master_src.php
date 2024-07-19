<?php
$GLOBALS['flag'] = "1.2";
include('common/header.php');
include('common/sidebar.php');
?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">

		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="index.php">Home </a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="#">Master Source</a>
				</li>
			</ul>
		</div>

		<div class="row">
		    <div class="col-md-12">
    			<div class="portlet box blue">
    				<div class="portlet-title">
    					<div class="caption">
    						<i class="fa fa-book"></i> Add Master Source
    					</div> 
    				</div>
    				<div class="portlet-body form">
    					<form method="post" action="control/adminProcess.php?action=add_src" autocomplete="off">
    						<div class="form-body">
    							<!-- <h3 class="form-section">Add User</h3> -->
    
    							<div class="row">
    								<div class="col-md-4">
    									<div class="form-group">
    										<label class="control-label">Source Name</label>
    										<div class="input-group">
    											<span class="input-group-addon">
    												<i class="fas  fa-user"></i>
    											</span>
    											<input type="text" class="form-control" id="src_name" name="src_name" placeholder="Enter Source" required>
    										</div>
    									</div>
    								</div> 
    							</div> 
    						</div>
    						<div class="form-actions left">
    							<button type="submit" class="btn blue"><i class="fa fa-check"></i> Submit</button>&nbsp;
    							<button type="reset"  class="btn default">Reset</button> 
    						</div>
    					</form>
    				</div>
    			</div>
    			<div class="portlet box blue">
    				<div class="portlet-title">
    					<div class="caption">
    						<i class="fa fa-book"></i>Master Source List
    					</div> 
    				</div>
    				<div class="portlet-body form">
    					<div class="form-body">
    						<table class="table table-bordered table-hover" id="example1">
    							<thead>
    								<tr>
    									<th>SR No</th>
    									<th>Source</th>
    									<!-- <th>Files</th> -->
    									<th>Action</th> 
    								</tr>
    							</thead>
    							<tbody>
    								<?php
    								$query_src = "SELECT * from master_source";
    								$result_src = mysqli_query($db_edak,$query_src);
    								$sr = 1;
    								while ($value_src = mysqli_fetch_array($result_src)) {
    
    									echo "
    								<tr>
    								<td>" . $sr++ . "</td>
    								<td>" . $value_src['src_name'] . "</td>
    								
    								";
    
    									//echo "<a target='_blank'  id='".$value_emp['uploaded_file_path']."' value='".$value_emp['uploaded_file_path']."'>'".$value_emp['uploaded_file_path']."'</a>";
    
    									echo "<td><button value='" . $value_src['id'] . "' data-name='" . $value_src['src_name'] . "' class='btn btn-info fetchid' data-target='#responsive' data-toggle='modal'><i class='fa fa-edit'></i></button>";
    
    									echo "<button value='" . $value_src['id'] . "' class='btn btn-danger remove'><i class='fa fa-trash'></i></button></td>";
    									echo "</tr>
    								";
    								}
    
    
    
    								?>
    							</tbody>
    						</table>
    					</div>
    				</div>
    			</div>
    			<!-- END DASHBOARD STATS -->
    			<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- END CONTENT -->

	<?php
	include('common/footer.php');
	?>

	<div id="responsive" class="modal fade modal-scroll" tabindex="-1" data-replace="true">
		<div class="modal-header btn-orange-moon">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			<h4 class="modal-title">Update Source Data : <span id="name1" name="name1"></span> </h4>
		</div>
		<form action="control/adminProcess.php?action=update_src" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
			<div class="modal-body">
				<div class="portlet-body form">
					<!-- BEGIN FORM-->

					<input type="hidden" id="fid" name="fid">
					<div class="form-body">

						<div class="row">

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Source</label>
									<div class="input-group">
										<span>
											<input class="" type="text" id="src_name1" name="src_name" />
										</span>
									</div>
								</div>
							</div>

						</div>


					</div>
					<!--/row-->

				</div>
			</div>
			<div class="modal-footer">
				<!-- <button type="button" data-dismiss="modal" class="btn btn-default">Close</button> -->
				<button type="submit" style="float:left" class="btn blue">Update</button>
			</div>
		</form>
	</div>



	<script>
		$(document).on("click", ".remove", function() {
			var value = $(this).attr("value");
			var result = confirm("Confirm!!! Proceed for Remove Source?");
			if (result == true) {
				//alert(value);

				$.ajax({
					url: 'control/adminProcess.php',
					type: 'POST',
					data: "action=removeSRC&id=" + value,
					success: function(data) {
						//alert(data);
						if (data == 1) {
							alert("Removed Succeessfully");
							window.location = "master_src.php";
						}
						//     	
						else {
							alert("Failed To Remove");
						}
					}


				});
			}
		});

		$(document).on("click", ".fetchid", function() {
			var value = $(this).attr("value");
			var src_name = $(this).attr("data-name");
			//alert(src_name);
			$("#fid").val(value);
			$("#src_name1").val(src_name);
		});
	</script>