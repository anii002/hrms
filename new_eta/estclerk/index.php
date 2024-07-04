<?php
$GLOBALS['flag']="1.1";	
include('common/header.php');
include('common/sidebar.php');
?>

	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Dashboard / डॅशबोर्ड<!-- <small>reports & statistics</small> -->
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.php">Home / मुख पृष्ठ</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Dashboard / डॅशबोर्ड</a>
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
				
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat red-intense">
						<div class="visual">
							<i class="fas fa-users"></i>
						</div>
						<div class="details">
							<div class="number">
							<?php 
							$q="SELECT billunit FROM `users` WHERE username='".$_SESSION['empid']."' ORDER BY `ID` ASC";
						    $result=mysqli_query($conn,$q);
						    echo mysqli_error($conn);
						    $row=mysqli_fetch_array($result);
						    $b=array();
						    $b=explode(",",$row['billunit']);
						    
						    $query1 = "SELECT title,summary_id FROM `master_summary` WHERE forward_status='1' AND estcrk_status='1'";
							$cnt=1;
							$result1 = mysqli_query($conn,$query1);
							$emp_bu=array();
						    $cnt_bu=0;
							while($val = mysqli_fetch_array($result1))
							{
							    $ta_query="SELECT DISTINCT(BU) FROM employees,tasummarydetails WHERE employees.pfno=tasummarydetails.empid AND tasummarydetails.summary_id='".$val['summary_id']."' ";
							    $ta_result=mysqli_query($conn,$ta_query);
							    $ta_rows=mysqli_fetch_array($ta_result);
							    $bu=$ta_rows['BU'];
						
							   if(in_array($bu, $b))
							   {
									if($val['title']!=null)
									{
										$cnt++;
									}
							   }
							}
						    
							echo "<h3 style='margin-bottom: 0px;margin-top: 18px;'>".$cnt."</h3>";
							?>
							</div>
							<div class="desc">
								 <p>अनुमोदित सारांश /<br> Approved Summary</p>
							</div>
						</div>
						<a class="more" href="approve_list.php">
						अधिक जानकारी / View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat green-haze">
						<div class="visual">
							<i class="fas fa-users"></i>
						</div>
						<div class="details">
							<div class="number">
							<?php 
						    $q="SELECT billunit FROM `users` WHERE username='".$_SESSION['empid']."' ORDER BY `ID` ASC";
						    $result=mysqli_query($conn,$q);
						    echo mysqli_error($conn);
						    $row=mysqli_fetch_array($result);
						    $b=array();
						    $b=explode(",",$row['billunit']);
				            
				            
				            $cnt=1;
							$query1 ="SELECT title,summary_id from master_summary WHERE forward_status = '1' and estcrk_status='0' ";
	                        $result1 = mysqli_query($conn,$query1);
							while($val = mysqli_fetch_array($result1))
							{
							    $sql1="SELECT BU from tasummarydetails,taentry_master,employees where tasummarydetails.reference_no=taentry_master.reference_no AND taentry_master.empid=employees.pfno AND taentry_master.is_rejected='0'  AND summary_id='".$val['summary_id']."' AND is_summary_generated='1'";
    							$res1=mysqli_query($conn,$sql1);
    							$data=0;
    							while($val1=mysqli_fetch_array($res1))
    							{
    							 //   echo "<br>".$val1['BU']."_".$val1['empid']."_".$val1['reference_no'];
							        if($data == 0)
							        {
        							    if(in_array($val1['BU'], $b) )  //&& $val1['gp'] >= 4200
                                        {
                                            if($val['title']!=null)
    										{
    											$cnt++;
    										}
    										$data++;
                                        }
    							    }
    							    
    							}
							}
        									
        									
							echo "<h3 style='margin-bottom: 0px;margin-top: 18px;'>".$cnt."</h3>";
							?>
							</div>
							<div class="desc">
								 <p>अपूर्ण सारांश /<br> Pending Summary</p>
							</div>
						</div>
						<a class="more" href="approve_summary.php">
						अधिक जानकारी / View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
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