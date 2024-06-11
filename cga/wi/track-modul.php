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
						dbcon1();
						dbcon2();
						$sql = mysql_query("SELECT role,pf_number FROM drmpsurh_cga.applicant_registration,drmpsurh_cga.login WHERE applicant_registration.added_by=login.unit_id AND ex_emp_pfno='".$_GET['ex_emp_pfno']."'");
						$rw = mysql_fetch_array($sql);

						$qry = mysql_query("SELECT empname,applicant_registration.* FROM drmpsurh_cga.applicant_registration,drmpsurh_sur_railway.prmaemp WHERE applicant_registration.ex_emp_pfno=prmaemp.empno and ex_emp_pfno='".$_GET['ex_emp_pfno']."'");
						$row = mysql_fetch_array($qry);

						$qry1 = mysql_query("SELECT empname FROM drmpsurh_sur_railway.prmaemp WHERE empno = '".$rw['pf_number']."'");
						$row1 = mysql_fetch_array($qry1);
						
						$sql = mysql_query("SELECT prmaemp.empname,forward_application.* FROM drmpsurh_cga.forward_application,drmpsurh_sur_railway.prmaemp WHERE forward_application.forward_from_pfno=prmaemp.empno and ex_emp_pfno='".$row['ex_emp_pfno']."' and applicant_username='".$row['username']."' ORDER BY id ASC");
						$sql_row = mysql_fetch_array($sql);


						$qry2 = mysql_query("SELECT prmaemp.empname,forward_application.* FROM drmpsurh_cga.forward_application,drmpsurh_sur_railway.prmaemp WHERE forward_application.forward_from_pfno=prmaemp.empno and ex_emp_pfno='".$row['ex_emp_pfno']."' and applicant_username='".$row['username']."' ORDER BY id ASC");
						$history_row = array();
						while($row2 = mysql_fetch_assoc($qry2))
						{
							array_push($history_row, $row2);
						}
						 $count = count($history_row);
						//print_r($history_row);
						//echo $history_row[0]['empname'];		
					?>
						<div class="text-center">
						 	<h5><?php echo $row['applicant_name']; ?>(APPLICANT)</h5>
						 	<p><?php echo $row['created_at'];?></p>
						</div>
						<div class="downarrow"><i class="fas fa-long-arrow-alt-down"></i></div>
									<div class="text-center">
										<h5>
										<?php
										if($rw['role']==5)
										{
										 	echo $row1['empname']."(WI)";
										}
										else if($rw['role']==8)
										{
										 	echo $row1['empname']."(DAK CLERK)";
										}
										?>
										</h5>
										
										<?php
											$curr = date("Y-m-d h:i:sa");
											$date1 = new DateTime($row['created_at']);
											$date2 = $date1->diff(new DateTime($curr));
											$d1 = $date2->d.' days'."\n";
											$d2 = $date2->h.' hours'."\n";
											$d3 = $date2->i.' minutes'."\n";
											$d4 = $date2->s.' seconds'."\n";
									
											$datetime1 = new DateTime($row['created_at']);
											$datetime2 = new DateTime($sql_row['arrived_time']);
											$interval = $datetime1->diff($datetime2);
											$elapsed = $interval->format('%m months %a days %h hours %i minutes %s seconds');

											if($row['fw_status']  == 0)
											{
											?>
												<p>Received - <?php echo $row['created_at'];?></p>
												<p>Pending time - <?php echo $elapsed; ?></p>
											<?php
											}
											else
											{
											?>
												<p>Received - <?php echo $row['created_at'];?></p>
												<p>Pending time - <?php echo $elapsed; ?></p>
												<p>Approved - <?php echo $sql_row['arrived_time'];?></p>
											<?php
											}
											?>
									</div>

									<?php 
										if($count != null)
										{	
											for($i = 0; $i < $count; $i++)
											{
											// echo $i."<br>";
										?>
						
								
											<?php

												$qry3 = mysql_query("SELECT role FROM drmpsurh_cga.forward_application,drmpsurh_cga.login WHERE forward_application.forward_to_u=login.unit_id AND pf_number='".$history_row[$i]['forward_to_pfno']."'");
												$row3 = mysql_fetch_array($qry3);

												// echo $row2['role'];
												$qry4 = mysql_query("SELECT prmaemp.empname,forward_application.* FROM drmpsurh_cga.forward_application,drmpsurh_sur_railway.prmaemp WHERE forward_application.forward_to_pfno=prmaemp.empno and empno='".$history_row[$i]['forward_to_pfno']."'");
												$row4 = mysql_fetch_array($qry4);


								if($row['fw_status']  == 1 && $history_row[$i]['hold_status'] == 1 && $history_row[$i]['rcc_note_status'] == 0 && $history_row[$i]['drm_approve'] == 0 && $history_row[$i]['cc_status'] == 0 && $history_row[$i]['return_status'] == 1)
								{
								?>
									<div class="downarrow"><i class="fas fa-long-arrow-alt-down"></i></div>
										<div class="text-center">
											<h5>
											<?php

												$curr = date("Y-m-d h:i:sa");
												$date1 = new DateTime($history_row[$i]['arrived_time']);
												$date2 = $date1->diff(new DateTime($curr));
												$d1 = $date2->d.' days'."\n";
												$d2 = $date2->h.' hours'."\n";
												$d3 = $date2->i.' minutes'."\n";
												$d4 = $date2->s.' seconds'."\n";
										
												$datetime1 = new DateTime($history_row[$i]['arrived_time']);
												$datetime2 = new DateTime($history_row[$i]['depart_time']);
												$interval = $datetime1->diff($datetime2);
												$elapsed = $interval->format('%m months %a days %h hours %i minutes %s seconds');	
												
											if($row3['role']==5)
											{
												echo $row4['empname']."(WI)";
											}
											else if($row3['role']==8)
											{
										 		echo $row4['empname']."(DAK CLERK)";
											}
											else if($row3['role']==7)
											{
												echo $row4['empname']."(RCC)";
											}
											else if($row3['role']==4)
											{
												echo $row4['empname']."(DPO)";
											}
											else if($row3['role']==3)
											{
												echo $row4['empname']."(Sr.DPO)";
											}
											else if($row3['role']==2)
											{
												echo $row4['empname']."(DRM)";
											}
											else if($row3['role']==6)
											{
												echo $row4['empname']."(Confidential Clerk)";
											}
											?>
										</h5>
											<p>Received - <?php echo $history_row[$i]['arrived_time'];?></p>
											<p>Pending time - <?php echo $elapsed; ?></p>
											<p>Rejected By - $history_row[$i]['rejected_by'];</p>
										
								<?php	
								}
								elseif($history_row[$i]['return_status'] == 1)
								{
								?>
									<div class="downarrow"><i class="fas fa-long-arrow-alt-down"></i></div>
										<div class="text-center">
											<h5>
											<?php

												$curr = date("Y-m-d h:i:sa");
												$date1 = new DateTime($history_row[$i]['arrived_time']);
												$date2 = $date1->diff(new DateTime($curr));
												$d1 = $date2->d.' days'."\n";
												$d2 = $date2->h.' hours'."\n";
												$d3 = $date2->i.' minutes'."\n";
												$d4 = $date2->s.' seconds'."\n";
										
												$datetime1 = new DateTime($history_row[$i]['arrived_time']);
												$datetime2 = new DateTime($history_row[$i]['depart_time']);
												$interval = $datetime1->diff($datetime2);
												$elapsed = $interval->format('%m months %a days %h hours %i minutes %s seconds');	
												
											if($row3['role']==5)
											{
												echo $row4['empname']."(WI)";
											}
											else if($row3['role']==8)
											{
										 		echo $row4['empname']."(DAK CLERK)";
											}
											else if($row3['role']==7)
											{
												echo $row4['empname']."(RCC)";
											}
											else if($row3['role']==4)
											{
												echo $row4['empname']."(DPO)";
											}
											else if($row3['role']==3)
											{
												echo $row4['empname']."(Sr.DPO)";
											}
											else if($row3['role']==2)
											{
												echo $row4['empname']."(DRM)";
											}
											else if($row3['role']==6)
											{
												echo $row4['empname']."(Confidential Clerk)";
											}
											?>
										</h5>
											<p>Received - <?php echo $history_row[$i]['arrived_time'];?></p>
											<p>Pending time - <?php echo $elapsed; ?></p>
											<p>Rejected Application<!-- By - <?php echo $history_row[$i]['rejected_by'];?> --></p>
										
								<?php	
								}
								else
								{
								?>
									<div class="downarrow"><i class="fas fa-long-arrow-alt-down"></i></div>
										<div class="text-center">
											<h5>
											<?php
											if($row3['role']==5)
											{
												echo $row4['empname']."(WI)";
											}
											else if($row3['role']==8)
											{
										 		echo $row4['empname']."(DAK CLERK)";
											}
											else if($row3['role']==7)
											{
												echo $row4['empname']."(RCC)";
											}
											else if($row3['role']==4)
											{
												echo $row4['empname']."(DPO)";
											}
											else if($row3['role']==3)
											{
												echo $row4['empname']."(Sr.DPO)";
											}
											else if($row3['role']==2)
											{
												echo $row4['empname']."(DRM)";
											}
											else if($row3['role']==6)
											{
												echo $row4['empname']."(Confidential Clerk)";
											}
											?>
										</h5>
											<p>Received - <?php echo $history_row[$i]['arrived_time'];?></p>
											<p>Pending time - <?php echo $elapsed; ?></p>
											<p>Approved - <?php echo $history_row[$i]['depart_time'];?></p>
										
								<?php
									}
								?>
								<?php } } ?> 
							</div>
						</div>

			</div>
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