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
						<a href="#"> Add Subject</a>
					</li>
				</ul>
													
			</div>
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption col-md-6 col-xs-6">
						Add Subject
					</div>
					<!-- <div class="caption col-md-6 text-right backbtn">
						<button class=" btn btn-danger print btnhide" onclick="history.go(-1);">Back</button>
					</div> -->
					
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<form action="control/adminProcess.php?action=add_purpose" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
						<div class="form-body">
							<!-- <h3 class="form-section">Add User</h3> -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Subject</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-user-circle"></i>
										</span>
										<input type="text" class="form-control" id="purpose" name="purpose" placeholder="Subject" required/>
										</div>
									</div>
								</div>
								<!--/span-->
							<!-- 	<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Station</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas  fa-user"></i>
										</span>
										<input type="text" class="form-control" id="station" name="station" placeholder="station" required/>
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
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey-cascade">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-list-alt"></i>View Subject
							</div>
							
						</div>
						<div class="portlet-body">
						
						
						
							<div class="table-toolbar">
								<div class="row">
									<!-- <div class="col-md-6">
										<div class="btn-group">
											<a class="btn btn-circle blue" href="add_office_order.php">Add Office Order</a>
										</div>
									</div> -->
									<div class="col-md-6">
										
									</div>
								</div>
							</div>
							
							
						<table id="example1" class="table table-striped table-bordered table-hover">
							<thead>
							<tr>
							<!-- <th colspan="6"><center>PURPOSE</center></th> -->
							</tr>
							<tr>
								<th>Sr No</th>
								<th>Subject</th>
								<!-- <th>Station</th> -->
								<!-- <th>L No</th>
								<th>Department</th> -->
								<th>Action</th>
								
								<!--<th>Action</th>-->
					
								
							</tr>
							</thead>
							<tbody>
							<?php
							$counter = 0;
							dbcon3();
							$qry = mysql_query("SELECT * FROM `purpose` ORDER BY purpose_id DESC");
							//$row = mysql_fetch_array($qry);
							//print_r($row);
							while($row = mysql_fetch_array($qry))
							{
							?>
							<tr class="odd gradeX">
								<td><?php echo ++$counter; ?></td>
							
								<td><?php echo $row['purpose'];?></td>
								<!-- <td><?php echo $row['station'];?></td> -->
								<!-- <td><?php echo $row['L No'];?></td>
								<td><?php echo $row['Department'];?></td> -->
								
								<td>
									<a class="btn btn-circle blue" href="update_purpose.php?purpose_id=<?php echo $row['purpose_id'];?>">Update</a>
									<button class="btn btn-circle red deletepurpose"  value="<?php echo $row['purpose_id'];?>">Delete</button>
								</td>
							</tr>
							<?php
							}
							?>
							</tbody>
							</table>
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
	</div>

	
	
<?php
	include 'common/footer.php';
?>
<script>
$(document).on('click','.deletepurpose',function(){
    	var id=$(this).val();
    	// alert(id);
    	var result = confirm("Confirm!!! Proceed for Subject delete?");
        if(result == true)
        {
            $.ajax({
            url: 'control/adminProcess.php',
            type: 'POST',
            data: {action: 'deletepurpose', id : id},
          })
          .done(function(html) {
            alert(html);
            window.location="add_purpose.php";
          });
        }
    });

</script>
