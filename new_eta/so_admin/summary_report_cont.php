<?php
$GLOBALS['flag']="5.13";
include('common/header.php');
include('common/sidebar.php');
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
						<a href="#"> संक्षिप्त रिपोर्ट / Summary Report</a>
					</li>
				</ul>
				
			</div>
			<!-- <h1>ecefce</h1> -->
			
												<!-- <h3 class="form-section">Add User</h3> -->
								<div class="row">

<?php if(isset($_SESSION['empid'])){
	?>
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								संक्षिप्त रिपोर्ट / Summary Report
							</div>
							<div class="tools">
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-hover table-bordered display" id="example1">

							<thead>
								<tr class="warning">
								<th>ID</th>
								<th>Title</th>
								<th>Description</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
								$cnt=1;
									$query = "SELECT * from master_summary_cont WHERE forward_status = '0' AND dept_id='".$_SESSION['dept']."' ";
									//echo $query;
									$result = mysql_query($query);
									while($val = mysql_fetch_array($result))
									{
										if($val['title']!=null)
										{
											echo "
											<tr>
												<td>$cnt</td>
												<td>".$val['title']."</td>
												<td>".$val['description']."</td>
												<td><a href='summary_details_for_forw.php?id=".$val['id']."&sum_id=".$val['summary_id']."' class='btn btn-primary'>Show</a>";
											echo "</tr>";
										}
										$cnt++;
									}
								 ?>
							
							</tbody>
							</table>
						</div>
					</div>
					
				</div>
			<?php } ?>
			</div>
			
		</div>
	</div>
<?php
	include 'common/footer.php';
?>