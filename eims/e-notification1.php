<?php
	$GLOBALS['flag']="4.94";
	include('common/header.php');
	include('common/sidebar.php');
	include('dbcon.php');
$conn1 = dbcon1();
?>

	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			 e-Notification
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="dashboard.php">Home / मुख पृष्ठ</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">e-Notification</a>
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
								<i class="fa fa-list-alt"></i>e-notification
							</div>
							
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
										<div class="btn-group">
											<!-- <a class="btn btn-circle blue" href="add-enotification.php">Add e-notification</a> -->
										</div>
									</div>
									<div class="col-md-6">
										<div class="btn-group pull-right">
											<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
											</button>
											<ul class="dropdown-menu pull-right">
												<li>
													<a href="#">
													Print </a>
												</li>
												<li>
													<a href="#">
													Save as PDF </a>
												</li>
												<li>
													<a href="#">
													Export to Excel </a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							
							<table id="example1" class="table table-striped table-bordered table-hover">
							<thead>
							<tr>
								<th>Sr No</th>
								<th>Reference No</th>
								<th>Subject</th>
								<th>Notification Date</th>
							 
								
							</tr>
							</thead>
							<tbody>
							<?php
							$counter = 0;
							// dbcon1();
							mysqli_query($conn1,"set names 'utf8'");
							$qry = mysqli_query($conn1,"SELECT `id`, `ref_no`, `notification_date`, `subject`, `url`, `status` FROM `e-notification1` ORDER BY id DESC");
							echo  mysqli_error($conn1);
							while($row = mysqli_fetch_array($qry))
							{
							?>
							<tr class="odd gradeX">
								<td><?php echo ++$counter; ?></td>
								<td><?php echo $row['ref_no'];?></td>
								<?php
							    if(substr($row['url'], 0, 4) == "http")
							    {
							    ?>
								<td><a href="<?php echo $row['url'];?>"><?php echo $row['subject'];?></a></td>
								<?php
							    }
							    else
							    {
							    ?>
							    <td><a href="<?php echo 'control/'.$row['url'];?>"><?php echo $row['subject'];?></a></td>
							    <?php   
							    }
							    ?>
	
								<td><?php echo $row['notification_date'];?></td>
							 
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
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php
	include('common/footer.php');
?>
<script type="text/javascript">
	
    $(document).on('click','.deletenotification',function(){
    	var id=$(this).val();
    	// alert(id);
    	var result = confirm("Confirm!!! Proceed for e-notification delete?");
        if(result == true)
        {
            $.ajax({
            url: 'control/adminProcess.php',
            type: 'POST',
            data: {action: 'deletenotification', id : id},
          })
          .done(function(html) {
            alert(html);
            window.location="e-notification.php";
          });
        }
    });
</script>