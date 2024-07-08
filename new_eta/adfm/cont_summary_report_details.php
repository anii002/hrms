<?php
$GLOBALS['flag']="5.911";
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
            			<a href="#">Summary Report Contigency Details</a>
            		</li>
            	</ul>
            	
            </div>
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption col-md-6">
						<b>Summary Report Contigency Details</b>
					</div>
					<div class="caption col-md-6 text-right backbtn btnhide">
						<button class="btn btn-danger" onclick="history.go(-1);">Back</button>
					</div>
				</div>
				<div class="portlet-body form">
						
	<form action="control/adminProcess.php?action=fwESTCLERK_cont" method="POST">										
		<div class="form-body add-train">
			<div class="row add-train-title">
				<div class="col-md-12">
					<div class="form-group">
						<!-- <label class="control-label"><h4 class="">Statement Showing the summery of TA & Contingency Bills For the Month of September-2018 </h4></label> -->
						<div class="portlet-body">
								<div class="table-scrollable summary-table">
								<table id="example" class="table table-hover table-bordered display">
									<thead>
										<tr class="warning">
											<!-- <th rowspan="2" valign="top">Sr No</th> -->
											<th>संदर्भ संख्या / Reference No.</th>
											<th>empid</th>
											<th>Name</th>
											<th>साल / Year</th>
											<th>माह / Month</th>
											<th>राशि / Amount</th> 											
											<th class="hidden-print">कार्य / Action</th>
										</tr>										
									</thead>
									<tbody>
										<?php
											function get_employee($id)
											{
												global $conn;
												$query = mysqli_query($conn,"SELECT name from employees where pfno='$id'");
												$result = mysqli_fetch_array($query);
												return $result['name'];
											}		
											

											$qry = mysqli_query($conn,"SELECT id,`reference`, `month`, `year`,empid,total_amount,generate FROM `continjency_master` WHERE summary_id = '".$_GET['sum_id']."'");
											while($row = mysqli_fetch_array($qry))
											{

										?>
										<tr>
											<!-- <td>01</td> -->
											<td><?php echo $row['reference']; ?></td>
											<td><?php echo $row['empid']; ?></td>
											<td><?php echo get_employee($row['empid']); ?></td>
											<td><?php echo $row['year']; ?> </td>
											<td> <?php echo $row['month']; ?></td>
											<td><?php echo $row['total_amount']; ?></td>
											<td>
											<a href="unclaimed_cont_details.php?ref_no=<?php echo $row['reference']; ?>&id=<?php echo $_GET['id'];?>&sum_id=<?php echo $_GET['sum_id'];?>" class="btn green btn_action">Show</a></td>
										</tr>
										<?php }  ?>
									</tbody>
								</table>
							</div>
							<div class="text-right">
                                
                                <?php
								$query = mysqli_query($conn,"SELECT * from master_summary_cont where id='" . $_GET['id'] . "' and summary_id='" . $_GET['sum_id'] . "' ");
								$val = mysqli_fetch_array($query);
								if ($val['estcrk_status'] == 0 && $val['forward_status'] == 1&& $val['pa_status'] == 0) {

									echo '<button type="submit" class="btn green">Approve</button>';
								}
								?>								
							</div>
						</div>
					</div>
					<input type='hidden' name='sumid' value='<?php echo $val['summary_id']; ?>'>
					
				</div>
			</div>
	</div>
</form>				

				</div>
			</div>
		</div>
	</div>
<?php
	include 'common/footer.php';
?>

<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable( {
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

<!-- <script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script> -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js" type="text/javascript"></script>

