<?php
$GLOBALS['flag']="5.6";
include('common/header.php');
include('common/sidebar.php');
include('control/function.php');
?>
			
			<div class="page-content-wrapper">
		<div class="page-content">
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.php">Home / मुख पृष्ठ</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">वापस यात्रा भत्ता सूची / Returned Claimed / Forward TA</a>
					</li>
				</ul>
				
			</div>
				<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-list-alt"></i>सभी वापस किए गए यात्रा भत्ता / ALL Returned / Forward TA
							</div>
							
						</div>
						<div class="portlet-body">
							
							<table class="table table-striped table-bordered table-hover" id="example1">
							<thead>
							<tr>
								
								<th>SR.No</th>
								<th>संदर्भ / Reference</th>
								<th>नाम / Name</th>
								<th>वर्ष  / Year</th>
								<th>माह  / Month</th>
								<th>कुल दर / Total Rate </th>
								<th>Reason</th>
								<th>Rejected by </th>
								<th>कार्रवाई / Action</th>
					
								
							</tr>
							</thead>
							<tbody>
							<?php 
							$sr=0;
							$sql="SELECT taentry_master.* from employees,taentry_master where employees.pfno=taentry_master.empid AND taentry_master.is_rejected='1' AND BU='".$_GET['bu']."' AND TAMonth='".$_GET['mon']."' AND TAYear='".$_GET['year']."' ";
							$result=mysql_query($sql);
							while ($row=mysql_fetch_array($result)) 
							{ $sr++;?>
								<tr>
									<td><?php echo $sr; ?></td>
									<td><?php echo get_employee($row['empid']); ?></td>
									<td><?php echo $row['reference_no']; ?></td>
									<td><?php echo $row['TAYear']; ?></td>
									<td><?php echo $row['TAMonth']; ?></td>
								<?php
									$query=mysql_query("SELECT SUM(amount) as amount from taentrydetails where empid='".$row['empid']."' AND reference_no='".$row['reference_no']."'");
									$res=mysql_fetch_array($query);
								?>
									
									<td><?php echo $res['amount']; ?></td>
									<td><?php echo $row['reason']; ?></td>
								<?php 
									$reject=explode(",",$row['rejected_by']);
									//print_r($reject);
									$rejected_name=$reject[0];
									$rejected_role=$reject[1];

									echo "<td>".get_employee($rejected_name).",(".getrole($rejected_role).")</td>";
								?>
								<td><a href="rejected_ta_details.php?ref_no=<?php echo $row['reference_no']; ?>&empid=<?php echo $row['empid']; ?>" class="btn green btn_action">Show</a></td>
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
			
		</div>
	</div>
<?php
	include 'common/footer.php';
?>