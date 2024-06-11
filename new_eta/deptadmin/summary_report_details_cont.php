<?php
	$GLOBALS['flag']="5.13";
	include('common/header.php');
	include('common/sidebar.php');
	include('control/function.php');

?>
			
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption col-md-6">
						<b>Summary Report Contijency Details </b>
					</div>
					<div class="caption col-md-6 text-right backbtn">
						<!-- <a href="#.">Back</a> -->
					</div>
				</div>
				<div class="portlet-body form">
						
	<form action="control/adminProcess.php?action=fwESTCLERK_cont" method="POST">										
		<div class="form-body add-train">
			<div class="row add-train-title">
				<div class="col-md-12">
					<div class="form-group">
						<label class="control-label"><h4 class="">Saved Contijency Details</h4></label>
						<div class="portlet-body">
								<div class="table-scrollable summary-table">
								<table id="example" class="table table-hover table-bordered display">
									<thead>
										<tr class="warning">
											<!-- <th rowspan="2" valign="top">Sr No</th> -->
											<th>Reference</th>
											<th>empid</th>
											<th>Name</th>
											<th>Year</th>
											<th>Month</th>
											<th>Total Distance</th>
											<th>Total Rate</th>
											<th>Applied Month</th>
											
											
										</tr>
										
									</thead>
									<tbody>
										<?php
								
								$cnt=0;
								// echo $q = "SELECT id,`reference`, `month`, `year`,empid FROM `continjency_master` WHERE summary_id = '".$_GET['sum_id']."'";
									$qry = mysql_query("SELECT id,`reference`, `month`, `year`,empid FROM `continjency_master` WHERE summary_id = '".$_GET['sum_id']."'");
								
									$count_row = mysql_num_rows($qry);
									$cnt=1;
									
									while($val = mysql_fetch_array($qry))
									{
										$id1 = $val['id'];

									$qry1 = mysql_query("SELECT * FROM `continjency` WHERE cid = '$id1'");
									while($row1 = mysql_fetch_array($qry1))
											{
										if($val['reference']!=null)
										{
											
										echo "<tr>
												<td>".$val['reference']."</td>
												<td>".$val['empid']."</td>
												<td>".get_employee($val['empid'])."</td>
												<td>".$val['year']."</td>
												<td>".$val['month']."</td>
												<td>".$row1['kms']."</td>
												<td>".$row1['total_amount']."</td>
												<td>".$row1['cntdate']."</td>				
											</tr>";
										$cnt++;
										}
									}
								}
								 ?>
								 <tr>
											<?php
													$result = mysql_query("SELECT sum(total_amount),sum(kms) FROM `continjency` WHERE reference = '".$_GET['ref_no']."'") or die(mysql_error());
													while ($rows = mysql_fetch_array($result)) {
												?>
											<!-- <td colspan="13" style="background-color: #fcf8e3a3;"></td> -->
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td><b>Total</b></td>
											<td><b><?php echo $rows['sum(kms)']; ?></b></td>
											<td><b><?php echo $rows['sum(total_amount)']; ?></b></td>
											<td></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
							<div class="text-right">
								<?php 
							//	echo "SELECT * from master_summary WHERE forward_status = '0' and estcrk_status='0' ";
								$query = mysql_query("SELECT * from cont_summary where id='".$_GET['id']."' and summary_id='".$_GET['sum_id']."'");
									$val=mysql_fetch_array($query);
									//echo "val=".$val['estcrk_status'].$val['forward_status'];
									if($val['estcrk_status']==0 && $val['forward_status'] == 0)
										{
											echo '<button type="submit" class="btn green">Approve</button>'
											;

										}
								?>
								
								<!-- <button class="btn yellow">Print</button> -->
							</div>
						</div>
					</div>
					<input type='hidden' name='empid' value='<?php echo $val['empid']; ?>'>
					<input type='hidden' name='refno' value='<?php echo $val['reference']; ?>'>
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


	// $(document).on("change","#month",function(){
	// 	var month=$("#month").val();
	// 	alert(month);
	// 	var m=month.split(",");
	// 	console.log(m);
	// });
</script>

<!-- File export script -->
<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable( {

        dom: 'Bfrtip',
        ordering: false,
        // buttons: [
        //     'copyHtml5',
        //     'excelHtml5',
        //     'csvHtml5',
        //     'pdfHtml5'
        // ]
        buttons: [
       {
           extend: 'pdf',
           footer: true,
           orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14]
            }
       },
       {
           extend: 'csv',
           footer: false
          
       },
       {
           extend: 'excel',
           footer: false,
           // exportOptions: {
           //      columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14]
           //  }
       }         
    ]
    } );
} );
</script>

<!-- <script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script> -->
<!--<script src="../assets/jquery.dataTables.min.js" type="text/javascript"></script>-->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js" type="text/javascript"></script>

    
    
    
    
    
    
    
