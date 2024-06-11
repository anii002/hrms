<?php
$GLOBALS['flag']="5.14";
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
						<a href="#"> Vetted Summary Report Contigency</a>
					</li>
				</ul>
				
			</div>
			<!-- <h1>ecefce</h1> -->
			
												<!-- <h3 class="form-section">Add User</h3> -->
			<div class="row">
				


				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue-hoki">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i> Approved Summary Report Contigency
							</div>
							<div class="tools">
							</div>
						</div>
						<div class="portlet-body">
							<table class="display" id="example1">
							<thead>
							<tr>
								<th>ID</th>
								<th>Title</th>
								<th>Description</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
								<?php
								$cnt=1;
									 $query = "SELECT * from cont_summary WHERE forward_status = '1' and estcrk_status='1' ";
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
												<td><a href='vetted_summary_report_cont_details.php?id=".$val['id']."&sum_id=".$val['summary_id']."' class='btn btn-primary'>Show</a>";
											echo "</tr>";
											$cnt++;
										}
									}
								 ?>
							
							
							</tbody>
							</table>
						</div>
					</div>
					
				</div>

				<!-- <div class="col-md-12">
					 BEGIN EXAMPLE TABLE PORTLET
					<div class="portlet box blue-hoki">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>अस्वीकृत सारांश रिपोर्ट / Rejected Summary Report
							</div>
							<div class="tools">
							</div>
						</div>
						<div class="portlet-body">
							<table class="display" id="example2">
							<thead>
							<tr>
								<th>ID</th>
								<th>Title</th>
								<th>Description</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>
									 Trident
								</td>
								
								<td>
									 Internet Explorer 4.0
								</td>
								<td>
									 Win 95+
								</td>
								<td>
									 4
								</td>
								
							</tr>
							<tr>
								<td>
									 Trident
								</td>
								
								<td>
									 Internet Explorer 4.0
								</td>
								<td>
									 Win 95+
								</td>
								
								<td>
									 X
								</td>
							</tr>
							
							</tbody>
							</table>
						</div>
					</div> -->
					<!-- END EXAMPLE TABLE PORTLET-->
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					
					<!-- END EXAMPLE TABLE PORTLET-->
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					
					<!-- END EXAMPLE TABLE PORTLET-->
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					
					<!-- END EXAMPLE TABLE PORTLET-->
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					
					<!-- END EXAMPLE TABLE PORTLET-->
				<!-- </div> -->

			</div>
			
		</div>
	</div>
<?php
	include 'common/footer.php';
?><script type="text/javascript">
$(document).ready(function() {
    $('#example2').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );


</script>