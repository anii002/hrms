
<?php
	$GLOBALS['flag']="5.5";
	include('common/header.php');
	include('common/sidebar.php');
?>
			
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption col-md-6">
						<b>Claimed TA Details</b>
					</div>
					<div class="caption col-md-6 text-right backbtn">
						<a href="#.">Back</a>
					</div>
				</div>
				<div class="portlet-body form">
						
	<form action="taprocess.php" method="POST">										
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
											<th>Reference</th>
											<th>Date</th>
											<th>J-Type</th>
											<th>Train no.</th> 
											<th>Depart station</th> 
											<th>Depart time</th>
											<th>Arrival station</th>
											<th>Arrival time</th> 
											<th>Rate</th>
											<th>Claim %</th>
											<th>Objective</th>
											<th>Action</th>
										</tr>
										
									</thead>
									<tbody>
										<tr>
											<td rowspan="2">00303157027/2018/945427<br>Name :- H P DIXIT</td><td>03/12/2018
											</td>
											<td>Road</td>
                            				<td></td>
                            				<td>kurduwadi</td><td>08:30</td><td>usmanabad</td><td>10:00</td><td></td>
                            				<td></td>
                            				<td rowspan="2">Steel checked sump at UMD.</td><td rowspan="2" class="hide_print">no contigency bill attached</td>
                            			</tr>
                            			<tr>
                            				<td>03/12/2018</td>
											<td>Road</td>
                            				<td></td>
                            				<td>usmanabad</td><td>17:30</td><td>kurduwadi</td><td>19:00</td><td>560</td>
                            				<td>70%</td>
                            			</tr>
                            			<tr class="warning">
                            				<td colspan="12"></td>
                            			</tr>
                            			<tr>
                            				<td rowspan="2">00303157027/2018/945427<br>Name :- H P DIXIT</td><td>04/12/2018</td>
											<td>Road</td>
                            				<td></td>
                            				<td>kurduwadi</td><td>08:30</td>
                            				<td>Dhoky</td><td>10:30</td>
                            				<td></td>
                            				<td></td>
                            				<td rowspan="2">Attended BCM block at between KMRD-DKY.</td><td rowspan="2" class="hide_print">no contigency bill attached</td>
                            			</tr>
                            			<tr>
                            				<td>04/12/2018</td>
											<td>Road</td>
                            				<td></td>
                            				<td>dhoky</td>
                            				<td>19:00</td>
                            				<td>kurduwadi</td>
                            				<td>21:00</td>
                            				<td>800</td>
                            				<td>100%</td>
                            			</tr>
                            			<tr class="warning">
                            				<td colspan="12"></td>
                            			</tr>
                            			<tr>
                            				<td rowspan="2">00303157027/2018/945427<br>Name :- H P DIXIT</td>
                            				<td>05/12/2018</td>
											<td>Road</td>
                            				<td></td>
                            				<td>kurduwadi</td><td>07:00</td><td>solapur</td><td>09:00</td><td></td>
                            				<td></td>
                            				<td rowspan="2">Attended PCDO meeting  at solpaur.</td>
                            				<td rowspan="2" class="hide_print">no contigency bill attached</td>
                            			</tr>
                            			<tr>
                            				<td>05/12/2018</td>
											<td>Road</td>
                            				<td></td>
                            				<td>solapur</td>
                            				<td>19:00</td>
                            				<td>kurduwadi</td>
                            				<td>21:00</td>
                            				<td>800</td>
                            				<td>100%</td>
                            			</tr>
                            			<tr class="warning">
                            				<td colspan="12"></td>
                            			</tr>
                            			<tr>
                            				<td></td>
											<td></td>
                            				<td></td>
                            				<td></td>
                            				<td></td>
                            				<td></td>
                            				<td></td>
                            				<td></td>
                            				<td></td>
                            				<td><b>Total</b></td>
                            				<td><b>16,960</b></td>
                            			</tr>
									</tbody>
								</table>
							</div>
						</div>
						
						<div class="row">
						<div class="col-md-5 pull-right summary-total">
						<h4>Summary</h4>
						<div class="table-scrollable">
								<table class="table table-bordered table-hover">
								<thead class="page-bar">
								<tr>
									<th>Percent</th>
									<th>Count</th>
									<th></th>
									<th>Total</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>100%</td>
									<td>1</td>
									<td>-</td>
									<td>960</td>
								</tr>
								<tr>
									<td>70%</td>
									<td>1</td>
									<td>-</td>
									<td>1000</td>
								</tr>
								<tr>
									<td>30%</td>
									<td>1</td>
									<td>-</td>
									<td>200</td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td><b>Total</b></td>
									<td><b>2160</b></td>
								</tr>
								</tbody>
								</table>
							</div>
						</div>
						<div class="col-md-12 trackprint-btn">
							<ul>
								<li><button class="btn blue">Track</button></li>
								<li><button class="btn green">Print</button></li>
							</ul>
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



<!-- File export script -->
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