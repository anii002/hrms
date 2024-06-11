<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css"> -->
<?php
	$GLOBALS['flag']="5.3";
	include('common/header.php');
	include('common/sidebar.php');
?>
			
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption col-md-6 col-xs-6">
						<b>Track CGA Application</b>
					</div>
					<div class="caption col-md-6 col-xs-6 text-right backbtn">
						<a href="#.">Back</a>
					</div>
				</div>
				<div class="portlet-body form">
				 	<div class="add-train-title track">		
				 		<label>
							<!-- <h4>Claim Reference Number - <?php //echo $_GET['ref_no']; ?></h4> -->
						</label>
				 	</div>
				 	<div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 col-md-offset-2 col-lg-offset-2">
				 	<div class="boxtrack">
					
					<?php
						
						$qry = mysql_query("SELECT empname,applicant_registration.* FROM `applicant_registration`,prmaemp WHERE applicant_registration.ex_emp_pfno=prmaemp.empno and ex_emp_pfno='".$_SESSION['ex_emp_pfno']."'");
						$row = mysql_fetch_array($qry);
						
						
						$qry1 = mysql_query("SELECT * FROM `forward_application` WHERE ex_emp_pfno='".$row['ex_emp_pfno']."' and applicant_username='".$row['username']."' ORDER BY id ASC");
						$history_row = array();
						while($row1 = mysql_fetch_assoc($qry1))
						{
							array_push($history_row, $row1);
						}
						$count = count($history_row);		
					?>
						 	<div class="text-center">
						 		<h5><?php echo $row['empname']; ?>(WI Forwarded To)</h5>
						 		<p><?php echo $row['created_at'];?></p>
						 	</div>	
							<?php
							for($i = 0; $i < $count; $i++)
							{
								$arrived_time = $history_row[$i]['arrived_time'];
								$depart_time=$history_row[$i]['depart_time'];
								$history_row[$i]['forward_to_pfno'];
								//echo "SELECT employees.name as name,role FROM employees,users WHERE users.empid=employees.pfno and pfno = '".$history_row[$i]['fowarded_to']."' and employees.dept='".$_SESSION['dept']."'";
								$qry3 = mysql_query("SELECT prmaemp.empname as name,role FROM prmaemp,login WHERE login.pf_number=prmaemp.empno and login.pf_number = '".$history_row[$i]['forward_to_pfno']."' ");
								$row3 = mysql_fetch_array($qry3);
								//echo $row3['role'];
								$curr = date("Y-m-d h:i:sa");
								$date1 = new DateTime($history_row[$i]['arrived_time']);
								$date2 = $date1->diff(new DateTime($curr));
								$d1 = $date2->d.' days'."\n";
								$d2 = $date2->h.' hours'."\n";
								$d3 = $date2->i.' minutes'."\n";
								$d4 = $date2->s.' seconds'."\n";
								
								$datetime1 = new DateTime($history_row[$i]['arrived_time']);
								$datetime2 = new DateTime($depart_time);
								$interval = $datetime1->diff($datetime2);
								$elapsed = $interval->format('%m months %a days %h hours %i minutes %s seconds');
								//echo $history_row[$i]['hold_status'];
								if($history_row[$i]['hold_status'] == 0)
								{	
							?>
									<div class="downarrow"><i class="fas fa-long-arrow-alt-down"></i></div>
									<div class="text-center">
									<h5>
										<?php
										// echo "ROLE ".$row3['role'];
										if($row3['role']==7){
										 echo $row3['name']."(RCC )";
										}
										else if($row3['role']=4){
										 echo $row3['name']."(DPO)";
										}
										?>
									</h5>
									
									<p>Received - <?php echo $arrived_time;?></p>
									<p>Pending time - <?php echo $elapsed; ?></p>	
									<?php
									echo "<p>Approved - $depart_time </p>";
								} 
								else
								{ 
									
									?>
									<div class="downarrow"><i class="fas fa-long-arrow-alt-down"></i></div>
									<div class="text-center">
									<h5><?php
									
										if($row3['role']==4){
										 echo $row3['name']."(DPO)";
										}
										if($row3['role']==2){
										 echo $row3['name']."(DRM)";
										}
										?>
									</h5>
									<p>Received - <?php echo $arrived_time;?></p>
									<p>Pending time - <?php echo $elapsed; ?></p>
									<?php 
									echo "<p>Pending from $d1.$d2.$d3.$d4</p>";
								}
									?>
									</div>
									<?php } ?>
							
							
			</div>
		</div>
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