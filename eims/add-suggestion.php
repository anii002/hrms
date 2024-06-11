<?php
	$GLOBALS['flag']="4.92";
	include('common/header.php');
	include('common/sidebar1.php');
?>

	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			 e-Seniority
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="dashboard.php">Home / मुख पृष्ठ</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">e-Senoirity</a>
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
								<i class="fa fa-list-alt"></i>ADD SENIORITY DETAILS
							</div>
							
						</div>
						<div class="portlet-body">
						
						<form action="control/adminProcess.php?action=seniority_sugg" method="post" enctype="multipart/form-data">
							 <div class="form-body add-train">
								<div class="row add-train-title">
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label"><h4 class="">Enter Your Suggestion</h4></label>
											<textarea name="suggestion" id="suggestion" class="form-control" placeholder="Enter Suggestion" style="padding: 20px 20px !important;" required> </textarea> 
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<input type="hidden" name="pfno" value="<?php echo $_SESSION['user'];?>" /> 
										</div>
									</div>
								<!-- 	<div class="col-md-4">
										<div class="form-group">
											<label class="control-label"><h4 class="">Year</h4></label>
											<input type="text" placeholder="Enter Year" name="year" id="year" class="form-control" required/>
										</div>
									</div>	
									<div class="col-md-4">
										<div class="form-group">
										<label class="control-label">Attach Document</label>
											<div class="input-group">
												<br>
													<input type="file" class="form-control" name="attach" id="attach" required//>
											</div>
									</div> -->
								</div>
								<div class="clearfix"></div>
								<div class="form-actions col-md-6 text-left">
									<button type="submit" class="btn blue submit_btn" id="submit_btn" name='submit'><i class="fa fa-check"></i>Submit</button>
									<button class="btn btn-danger" onclick="history.go(-1);">Back</button>
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