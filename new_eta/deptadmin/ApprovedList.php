<?php
$GLOBALS['flag']="3.3";
include('common/header.php');
include('common/sidebar.php');
?>
			
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home / मुख पृष्ठ</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">मंजूर टीए इनबॉक्स / Approved TA Inbox</a>
					</li>
				</ul>
				
			</div>
			<!-- <h1>ecefce</h1> -->
			
		<?php

if(isset($_SESSION['empid']))
{

	?>
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue-hoki">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>ALL Approved TA
							</div>
							<div class="tools">
							</div>
						</div>
						<div class="portlet-body">
							<table class="display" id="example1">
							<thead>
							<tr>
								<th>Reference</th>
								<th>Name</th>
								<th>Year</th>
								<th>Month</th>
								<th>Total Distance</th>
								<th>Total Rate </th>
								<th>Applied month</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
								$cnt=0;
								function get_employee($id)
								{
									global $conn;
									$query = mysqli_query($conn,"select name from employees where pfno='$id'");
									$result = mysqli_fetch_array($query);
									return $result['name'];
								}
								if($_SESSION['role']=='13')
								{
									$query = "SELECT MONTHNAME( str_to_date(taentry_master.created_date,'%d/%m/%Y') ) as created, taentry_master.reference_no, taentry_master.TAYear, taentry_master.empid as empid, taentry_master.TAMonth, SUM(taentrydetails.distance) AS distance, SUM(taentrydetails.amount) as rate FROM taentry_master INNER JOIN taentrydetails ON taentry_master.reference_no = taentrydetails.reference_no WHERE taentry_master.reference_no IN (select reference_id  from forward_data where forward_data.fowarded_to='".$_SESSION['empid']."'and admin_approve='1') group by taentry_master.reference_no";
								}
								
								//echo $query;
									$result = mysqli_query($conn,$query);
									while($val = mysqli_fetch_array($result))
									{
										if($val['reference_no']!=null)
										{
										echo "
										<tr>
											<td>".$val['reference_no']."</td>
											<td>".get_employee($val['empid'])."</td>
											<td>".$val['TAYear']."</td>
											<td>".$val['TAMonth']."</td>
											<td>".$val['distance']."</td>
											<td>".$val['rate']."</td>
											<td>".$val['created']."</td>
											<td><a href='show_seperate_claim.php?ref_no=".$val['reference_no']."&empid=".$val['empid']."' class='btn btn-primary'>Show</a>
										</tr>
										";
										$cnt++;
										}
									}
								 ?>
							
							</tbody>
							</table>
						</div>
					</div>
					
				</div>
			</div>
			<?php } ?>
			
		</div>
	</div>
<?php
	include 'common/footer.php';
?>