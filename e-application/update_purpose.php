<?php
	$GLOBALS['flag']="4.93";
	include('common/header.php');
	include('common/sidebar.php');
?>
			
	<div class="page-content-wrapper">
		<div class="page-content">

			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="dashboard.php">Home / मुख पृष्ठ</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#"> Update Subject</a>
					</li>
				</ul>
													
			</div>
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
				<div class="portlet-title">
					<!--<div class="caption">-->
					<!--	<i class="fa fa-book"></i> Update Subject -->
					<!--</div>-->
					<div class="caption col-md-6 col-xs-6">
						Update Subject
					</div>
					<div class="caption col-md-6 text-right backbtn">
						<button class=" btn btn-danger print btnhide" onclick="history.go(-1);">Back</button>
					</div>
					
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<?php
					$conn=dbcon3();
					$query = mysqli_query($conn,"SELECT * FROM purpose WHERE purpose_id = '".$_GET['purpose_id']."'");
					$row = mysqli_fetch_array($query);
					?>
					<form action="control/adminProcess.php?action=update_purpose" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
						<div class="form-body">
							<!-- <h3 class="form-section">Add User</h3> -->
							<input type="hidden" name="purpose_id" value="<?php echo $_GET['purpose_id'];?>">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Subject</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-user-circle"></i>
										</span>
										<input type="text" class="form-control" id="purpose" name="purpose" value="<?php echo $row['purpose'];?>" required/>
										</div>
									</div>
								</div>
								<!--/span-->
								<!-- <div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Station</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas  fa-user"></i>
										</span>
										<input type="text" class="form-control" id="station" name="station" value="<?php echo $row['station'];?>" required/>
										</div>
									</div>
								</div> -->
							</div>
								<div class="form-actions right">
								<button type="reset" class="btn default">Cancel</button>
								<button type="submit" class="btn blue submit_btn" id='submit_btn' name='button'><i class="fa fa-check"></i> प्रस्तुत करे / Submit</button>
								</div>
					</form>
								<!--/span-->
							</div>
							
					<!-- END FORM-->
				</div>
			</div>

			
			
		</div>
	</div>

	
	
<?php
	include 'common/footer.php';
?>
<script>


</script>
