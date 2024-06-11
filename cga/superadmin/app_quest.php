<?php
	$GLOBALS['flag']="1.5";
	include('common/header.php');
	include('common/sidebar.php');
?>
			
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue-hoki">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Question Paper & Syllabus List
							</div>
							<div class="tools">
							</div>
						</div>
						
						<div class="portlet-body">
						<br>
							 <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                      <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
							<thead>
							<tr>
								<th>SR No</th>
								<th>PF Number</th>
								<th>Name</th>
								<th>Case</th>
								<th>Action</th>
								
							</tr>
							</thead>
							<tbody>
								<tr>
								<td>x</td>
								<td>1234567</td>
								<td>asdfg</td>
								<td>ssss</td>
								<td><button class='btn btn-warning active' style='margin-left:10px;'>Active</button></td>
								
							
								</tr>
								<tr>
								<td>b</td>
								<td>1234567</td>
								<td>asdfg</td>
								<td>ssss</td>
								<td><button class='btn btn-warning active' style='margin-left:10px;'>Active</button></td>
								
							
								</tr>
								<tr>
								<td>y</td>
								<td>1234567</td>
								<td>asdfg</td>
								<td>ssss</td>
								<td><button class='btn btn-warning active' style='margin-left:10px;'>Active</button></td>
								
							
								</tr>
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

<script type="text/javascript">
  $('#DataTables_Table_22').DataTable( {
                    dom: 'Bfrtip',
                    "pageLength": 5,
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                } );
</script>