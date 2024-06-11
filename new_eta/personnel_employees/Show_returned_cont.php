<?php
$GLOBALS['flag']="5.112";
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
						<a href="#">वापस फुटकर बिल  / Returned Contingency</a>
					</li>
				</ul>
				
			</div>
				<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-list-alt"></i>वापस फुटकर बिल  / Returned Contingency
							</div>
							
						</div>
						<div class="portlet-body">
							
							<table class="table table-striped table-bordered table-hover" id="example1">
							<thead>
							<tr class="warning">
								<!-- <th rowspan="2" valign="top">Sr No</th> -->
								<th>संदर्भ संख्या / Reference No.</th>
								<th>साल / Year</th>
								<th>माह / Month</th>
								<th>दूरी / Distance</th>
								<th>राशि / Amount</th> 
								<th>Reason</th>
								<th>Rejected by </th> 
								<th class="hidden-print">कार्य / Action</th>
							</tr>	
							</thead>
							<tbody>
							<?php 
							$reject='';
							$query1="SELECT `id`, `month`, `year`, `empid`, `reference`, reason,rejected_by FROM `continjency_master` WHERE empid='".$_SESSION['empid']."' AND forward_status='1' AND is_rejected='1' ";
								$sql1=mysql_query($query1);
								while ($row = mysql_fetch_array($sql1)) 
								{
									$reject=explode(",",$row['rejected_by']);
									// print_r($reject);

									$query2="SELECT SUM(total_amount)as total_amount,SUM(kms)as distance FROM `continjency` WHERE reference='".$row['reference']."' ";
									$sql2=mysql_query($query2);
									echo mysql_error();
									$row2 = mysql_fetch_array($sql2);
								?>
							<tr>
								<td><?php echo $row['reference']; ?></td>
								<td><?php echo $row['year']; ?> </td>
								<td> <?php echo $row['month']; ?></td>
								<td><?php echo $row2['distance']; ?></td>
								<td><?php echo $row2['total_amount']; ?></td>
								<td><?php echo $row['reason'];?></td>
								<?php 
									
								?>
								<td>
									<?php echo get_employee($reject[0])."(".getrole($reject[1]).")";?>
								</td>
								<td><a href="reject_cont_details.php?ref_no=<?php echo $row['reference']; ?>" class="btn green btn_action">Show</a>
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
			
		</div>
	</div>
<?php
	include 'common/footer.php';
?>