<?php
	$GLOBALS['flag']="1.6";
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
								<i class="fa fa-globe"></i>Track Your Application Status
							</div>	
						</div>
						
						<div class="portlet-body">
						<div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 col-md-offset-2 col-lg-offset-2">
				 	<div class="boxtrack">
					
					<?php
												
						$qry2 = mysqli_query($con,"SELECT `empname` FROM `prmaemp` WHERE empno = '".$_SESSION['ex_emp_pfno']."'  ");
						$row2 = mysqli_fetch_array($qry2);
						
						
					?>
						 	<div class="text-center">
						 		<h5><?php echo $row2['empname']; ?>(TA Claimant)</h5>
						 		<!-- <p><?php echo $row['created_date'];?></p> -->
						 	</div>
						 </div>
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