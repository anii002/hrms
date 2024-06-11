<?php
$GLOBALS['flag']="5.5";
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
						<a href="#">दावाा न किए गए यात्रा भत्ता / Saved / Unforwarded TA</a>
					</li>
				</ul>
				
			</div>
			
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption col-md-6">
						<b>दावा न किए गए यात्रा भत्ता / Saved / Unforwarded TA</b>
					</div>
					<div class="caption col-md-6 text-right backbtn">
						<a href="#."></a>
					</div>
				</div>
				<div class="portlet-body form">
						
	<form method="POST">										
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
											 <th >Sr. No.</th> 
            								<th>नाम / Name</th>
											<th>संदर्भ संख्या / Reference No.</th>
											<th>साल / Year</th>
											<th>माह / Month</th>
											<th>दूरी / Distance</th>
											<th>राशि / Amount</th> 											
											<th>लागू तिथि / Applied Date</th> 
											<th class="hidden-print">कार्य / Action</th>
										</tr>										
									</thead>
									<tbody>
										<?php
										    $query1="SELECT taentry_master.* from employees,taentry_master where employees.pfno=taentry_master.empid AND taentry_master.forward_status='1' AND taentry_master.est_approve='0' AND BU='".$_GET['bu']."' AND TAMonth='".$_GET['mon']."' AND TAYear='".$_GET['year']."' ";
											
								// 			$query1="SELECT `id`, `TAMonth`, `TAYear`, `empid`, `reference_no`,`objective`, `created_date` FROM `taentry_master` WHERE empid='".$_SESSION['empid']."' AND forward_status='0' ";
											$sql1=mysql_query($query1);
                                            $sr=0;
											while ($row = mysql_fetch_array($sql1)) 
											{
											    $sr++;
												$query2="SELECT SUM(amount)as total_amount,distance FROM `taentrydetails` WHERE empid='".$_SESSION['empid']."' AND reference_no='".$row['reference_no']."' ";
    											$sql2=mysql_query($query2);
    											$row2 = mysql_fetch_array($sql2);
										?>
										<tr>
											 <td><?php echo $sr; ?></td> 
											<td><?php echo get_employee($row['empid']); ?></td>
											<td><?php echo $row['reference_no']; ?></td>
											<td><?php echo $row['TAYear']; ?> </td>
											<td> <?php echo $row['TAMonth']; ?></td>
											<td><?php echo $row2['distance']; ?></td>
											<td><?php echo $row2['total_amount']; ?></td>
											<td><?php echo $row['created_date']; ?></td>
											
											<td><a href="claimed_details_1.php?ref_no=<?php echo $row['reference_no']; ?>&empid=<?php echo $row['empid']; ?>" class="btn green btn_action">Show</a></td>
										</tr>
										<?php 
											}
										?>
									</tbody>
								</table>
							</div>
							<div class="text-right">
								<!-- <button class="btn yellow">Print</button> -->
							</div>
						</div>
					</div>
					
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

