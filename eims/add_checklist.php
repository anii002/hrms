<?php
	$GLOBALS['flag']="4.96";
	include('common/header.php');
	include('common/sidebar.php');
?>

	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			 e-Checklist
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="dashboard.php">Home / मुख पृष्ठ</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">e-Checklist</a>
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
								<i class="fa fa-list-alt"></i>ADD CHECKLIST DETAILS
							</div>
							
						</div>
						<div class="portlet-body">
						
						<form method="post" action="control/adminProcess.php?action=checklist" enctype="multipart/form-data">
							 <div class="form-body add-train">
								<div class="row add-train-title">
									<!-- <div class="col-md-6">
										<div class="form-group">
											<label class="control-label"><h4 class="">Issued Date</h4></label>
											<input class="form-control datepicker_1" type="text" name="issued_date" id="date0" val='0' placeholder ="DD-MM-YYYY" required/>
										</div>
									</div> -->
									<!-- <div class="col-md-6">
										<div class="form-group">
											<label class="control-label"><h4 class="">Issued Section</h4></label>		
											<select class="form-control select2" name="issued_section" id="issued_section" multiple="multiple" data-placeholder="Select Department" required/>
													<option value="0" selected disabled>Select Section</option>
													<option value="S&T">S&T</option>
													<option value="OPTG">OPTG</option>
													<option value="C&W">C&W</option>
													<option value="LOCO">LOCO</option>
													<option value="ADMIN">ADMIN</option>
													<option value="ELECT">ELECT</option>
													<option value="ENGG">ENGG</option>
													<option value="COMM">COMM</option>
												</select>
										</div>
									</div> -->
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label"><h4 class="">Checklist Subject</h4></label>
											<input type="text" placeholder="Enter Subject" name="subject" id="subject" class="form-control" required/>
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
								<!-- <div class="caption col-md-6 text-right backbtn">
									<button class=" btn btn-danger print btnhide" onclick="history.go(-1);">Back</button>
								</div> -->
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

<script type="text/javascript">
	$(".imagepdf").on("change", function(){
var ext = $(this).val().split('.').pop().toLowerCase();
if($.inArray(ext, ['png','jpg','jpeg','pdf']) == -1) {
alert('Invalid file type!');
$(this).val("");
}
});
</script>
