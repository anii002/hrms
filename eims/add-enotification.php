<?php
	$GLOBALS['flag']="4.94";
	include('common/header.php');
	include('common/sidebar.php');
?>

	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			 e-notification
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="dashboard.php">Home / मुख पृष्ठ</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">e-notification</a>
					</li>
				</ul>
				<div class="page-toolbar">
					<div id="" class="pull-right tooltips btn btn-fit-height grey-salt">
						<i class=""></i> <span><?php echo date('Y/m/d H:i:s'); ?></span>
						<!-- <span class="thin uppercase visible-lg-inline-block"></span> -->
						<!-- <i class="fa fa-angle-down"></i> -->
					</div>
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->
			<div class="row">
				
				
				
			</div>
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey-cascade">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-list-alt"></i>ADD e-notification DETAILS
							</div>
							
						</div>
						<div class="portlet-body">
						
						<form method="post" action="control/adminProcess.php?action=enotification" enctype="multipart/form-data" autocomplete="off">
							 <div class="form-body add-train">
								<div class="row add-train-title">
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label"><h4 class="">Reference No</h4></label>
											<input type="text" placeholder="Enter Reference No" name="ref_no" id="ref_no" class="form-control" required/>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label"><h4 class="">Notification Date</h4></label>
											<input class="form-control datepicker_1" type="text" name="notification_date" id="date0" val='0' placeholder ="DD-MM-YYYY" required/>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label"><h4 class="">Subject</h4></label>
											<input type="text" placeholder="Enter subject" name="subject" id="subject" class="form-control" required/>
										</div>
									</div>
									<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Attach Document</label>
											<div class="input-group">
												<br>
													<input type="file" class="form-control imagepdf" name="attach" id="attach" required//>
											</div>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="form-actions col-md-6 text-left">
									<button type="submit" class="btn blue submit_btn" id="submit_btn" name='submit'><i class="fa fa-check"></i>Submit</button>
									<button class=" btn btn-danger print btnhide" onclick="history.go(-1);">Back</button>
								</div>
								</div>
							</div>
						</form>
						
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
										<div class="btn-group">
											
										</div>
									</div>
									<div class="col-md-6">
										
									</div>
								</div>
							</div>
							
						
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
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
<script>
    $(".imagepdf").on("change", function(){
		var ext = $(this).val().split('.').pop().toLowerCase();
		if($.inArray(ext, ['png','jpg','jpeg','pdf']) == -1) {
			alert('Invalid file type!');
			$(this).val("");
		}
	});

</script>