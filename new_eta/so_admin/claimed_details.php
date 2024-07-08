<?php
$GLOBALS['flag']="5.4";
include('common/header.php');
include('common/sidebar.php');

include('control/function.php');

if(isset($_POST['getback']))
{
	$ref_no = $_GET['ref_no'];
// 	echo $ref_no;
	
	$query = mysqli_query($conn,"SELECT `empid` FROM `taentry_master` WHERE `reference_no`='".$ref_no."' ");
	$row = mysqli_fetch_array($query);
	$empid = $row['empid'];
	
	$query2 = mysqli_query($conn,"UPDATE `taentry_master` SET `forward_status`=0 WHERE reference_no = '".$ref_no."' and empid = '".$empid."' ");
	$query3 = mysqli_query($conn,"DELETE FROM `forward_data` WHERE reference_id = '".$ref_no."' AND empid = '".$empid."' ");

	if($query3 && $query3 == TRUE)
	{
		echo "<script>alert('Record Changed Successfully...');</script>";
		echo "<script> window.location='Show_unclaimed_TA.php'; </script>";
	}
	else
	{
		echo "<script>alert('Error While Changing Data...')</script>";
	}
}

?>

<style type="text/css" media="screen">  
@media print {
  .btnhide {
    display : none !important;
	display : block;
  }
  
	#info1 {
	border: 1px solid black;
    display : none;
	page-break-after:always;
    } 
	#info2 {
    display : none;
    }   
	#info3 {
    display : none;
    }
    #info4 {
    display : none;
    }
 
}
 @media print{
   .content{
    background: #fff !important;
   }
   .content-wrapper{
    background: #fff !important;
   }
 }
 
 .box.box-info {
    border-top-color: #ccc;
  }
        .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td{
          border : 1px solid #ccc;
        }
        .table-bordered {
            border: 1px solid #ccc;
        }
	
	#info1 {
    display : none;
  page-break-after:always;
  
      } 
  #info2 {
    display : none;
    }   
  #info3 {
    display : none;
      }
      #info4 {
    display : none;
      }
	
  .borderbox{
	  border: 1px solid black !important;
	  overflow: hidden;
  }
  .summary-total{
	  width: 33% !important;
	  margin: 0px auto;
  }
</style>
			
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
            			<a href="#">दावा किए गए यात्रा भत्ता विवरण / Claimed TA Details </a>
            		</li>
            	</ul>
            	
            </div>
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption col-md-6 btnhide">
						<b>दावा किए गए यात्रा भत्ता विवरण / Claimed TA Detalis</b>
					</div>
					<div class="caption col-md-6 text-right backbtn">
						<button class=" btn btn-danger print btnhide" onclick="history.go(-1);">Back</button>
					</div>
				</div>
				<div class="portlet-body form">
						
	<form method="POST">										
		<div class="form-body add-train">
			<div class="row add-train-title">
				<div class="col-md-12">
					<div class="form-group">
						<input type="hidden" value="<?php echo $_GET['ref_no']; ?>" name="reference_no" id="reference_no">
						<!-- <label class="control-label"><h4 class="">Statement Showing the summery of TA & Contingency Bills For the Month of September-2018 </h4></label> -->
						<div class="portlet-body">
								<div class="table-scrollable summary-table">
								<table id="example" class="table table-hover table-bordered display">
									<thead>
										<tr class="warning">
											<th>Card Pass</th>
											<th>Date</th>
											<th><center>Journey<br>Type</center></th>
											<th>Train No.</th>
											<th><center>Journey<br>Purpose</center></th>
											<th><center>Depart<br>Station</center></th> 
											<th><center>Depart<br>Time</center></th> 
											<th><center>Arrival<br>Station</center></th> 
											<th><center>Arrival<br>Time</center></th> 
											<th>Rate</th> 
											<th>Claim</th>
											<th>Objective</th> 								
											<th>Action</th> 								
										</tr>										
									</thead>
									<tbody align="center">
										<?php
											 // $_GET['ref_no'];
											$query="SELECT DISTINCT(objective) FROM `taentrydetails` WHERE reference_no='".$_GET['ref_no']."' ORDER BY `objective` DESC";
											$sql=mysqli_query($conn,$query);
											$total_row1=mysqli_num_rows($sql);
											while($row_1 = mysqli_fetch_array($sql)){

											$query1="SELECT * FROM `taentrydetails` WHERE objective='".$row_1['objective']."' ORDER by taDate ASC";
											$sql1=mysqli_query($conn,$query1);
											$total_rows=mysqli_num_rows($sql1);
											$cnt=1;
											while ($row = mysqli_fetch_array($sql1)) {
										?>
										<tr>
											<?php 
												if($cnt == 1){
											?>
											<td width="10%" rowspan='<?php echo $total_rows; ?>'> <?php echo getcardpass($row['reference_no']); ?> </td>
											<?php 
												}
											?>
											<td><?php echo $row['taDate']; ?></td>
											<td><?php echo getjourneytype($row['journey_type']); ?></td>
											<td><?php echo $row['train_no']; ?> </td>
											<td> <?php echo getjourneypurpose($row['journey_purpose']); ?></td>
											<td><?php echo $row['departS']; ?></td>
											<td><?php echo $row['departT']; ?></td>
											<td><?php echo $row['arrivalS']; ?></td>
											<td><?php echo $row['arrivalT']; ?></td>
											<td><?php echo $row['amount']; ?></td>
											<td><?php echo $row['percent']; ?></td>
											<?php 
												if($cnt == 1){
											?>
											<td width="10%" rowspan='<?php echo $total_rows; ?>'> <?php echo $row_1['objective']; ?> </td>
											<td width="10%" rowspan='<?php echo $total_rows; ?>'>

												<?php 
													$q="SELECT id FROM `master_cont` WHERE reference_no='".$_GET['ref_no']."'";
													$s=mysqli_query($conn,$q);
													$t=mysqli_num_rows($s);
													if($t == 1)
													{
														?>
														<a data-toggle="modal" href="#responsive" id="<?php echo $_GET['ref_no']; ?>" style="margin-top: 2px;" class="btn green btn_action">View Conti.</a>
														<?php
													}
													else {
												?>
												No Contingency Attached.

												<?php 
													}
												?>
											</td>
											<?php }
											// else {
												?>

												<!-- <td>vvv SSS</td> -->
												<?php
											 $cnt++;
											?>
											
										</tr>
										<?php 
											}
										?>
										<tr><td colspan="13" style="background-color: #fcf8e3a3;"></td></tr>
										<?php 
											}
										?>
									</tbody>
								</table>
							</div>


							<!-- <div class="text-right">
								<button class="btn yellow">Print</button>
							</div> -->
						</div>
						<div class="row">
						<div class="col-md-5 pull-right summary-total">
						<h4>Summary</h4>
						<div class="table-scrollable">
							<?php 
								$query3="SELECT cardpass,month,year,`30p_cnt`,`30p_amt`,`70p_cnt`,`70p_amt`,`100p_cnt`,`100p_amt` FROM `tasummarydetails`,taentry_master WHERE  tasummarydetails.reference_no=taentry_master.reference_no AND tasummarydetails.empid='".$_SESSION['empid']."' AND tasummarydetails.`reference_no`='".$_GET['ref_no']."'";
								$sql3=mysqli_query($conn,$query3);
								$row3=mysqli_fetch_array($sql3);
								$total_amount=$row3['100p_amt'] + $row3['70p_amt'] + $row3['30p_amt'];
							?>
								<table class="table table-bordered table-hover">
								<thead class="page-bar">
								<tr>
									<th>Percent</th>
									<th>Count</th>
									<th>Total</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>100%</td>
									<td><?php echo $row3['100p_cnt']; ?></td>
									<td><?php echo $row3['100p_amt']; ?></td>
								</tr>
								<tr>
									<td>70%</td>
									<td><?php echo $row3['70p_cnt']; ?></td>
									<td><?php echo $row3['70p_amt']; ?></td>
								</tr>
								<tr>
									<td>30%</td>
									<td><?php echo $row3['30p_cnt']; ?></td>
									<td><?php echo $row3['30p_amt']; ?></td>
								</tr>
								<tr>
									<td></td>
									<td><b>Total</b></td>
									<td><b><?php echo $total_amount; ?></b></td>
								</tr>
								</tbody>
								</table>
							</div>
						</div>
						<div class="col-md-12 trackprint-btn">
							<ul>
								<input type="hidden" value="<?php echo $row3['month']; ?>" name="ta_manth" id="ta_manth">
								<input type="hidden" value="<?php echo $row3['cardpass']; ?>" name="cardpass" id="cardpass">
								<input type="hidden" value="<?php echo $row3['year']; ?>" name="year" id="year">
								<li><button type="submit" name="getback" class="btn blue btnhide">Get Back</button></li>
								<li><a href="track-modul.php?ref_no=<?php echo $_GET['ref_no']; ?>" class="btn btn-warning">Track</a></li>
								<li><button onclick="print_button()" class="btn green btnhide">Print</button></li>
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



	<div id="responsive" class="modal fade modal-scroll modalemployeedata" tabindex="-1" data-replace="true">
		<div class="modal-header btn-orange-moon">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			<h4 class="modal-title">Contingency Data : <span id="name1" name="name1"></span>	</h4>
		</div>
		<form  method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
			<div class="modal-body">
				<div class="portlet-body table-responsive">
					<table class="table table-inverse " style="font-size: 15px" id="" border="1">
						<thead>
							<tr>
								<th >Sr. No.</th>
								<th >Date</th>
								<th >From</th>
								<th >To</th>
								<th >KM Rate</th>
								<th >KM</th>
								<th >Amount</th>
								<th>Objective</th>
								<th>Action</th>
							</tr>	
						</thead>
						<tbody>
							<?php 
								$id = $_GET['ref_no'];

								$query = "SELECT * FROM `add_cont` WHERE reference_no = '".$id."'";
	  							$result = mysqli_query($conn,$query);
	  							$cnt= 1;$sum = 0;
	  							while($value = mysqli_fetch_array($result))
	  							{
	  								echo "
										<tr>
										<td>$cnt</td>
										<td>".$value['cont_date']."</td>
										<td>".$value['from_place']."</td>
										<td>".$value['to_place']."</td>
										<td>".$value['rate']."</td>
										<td>".$value['kms']."</td>
										<td>".$value['amount']."</td>
										<td>".$value['objective']."</td>
										<td></td>
										</tr>
	  								";
	  								$cnt++;
	  								$sum = $sum + (int)$value['amount'];
	  							}
						     	echo "<tr><td colspan='6' class='text-right' style='text-align:right'><b>Total</b></td><td colspan='3'>$sum</td></tr>";
					    	?>
								
						</tbody>
					</table>
				</div>
			</div>
		</form>
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


      function print_button()
   {
      $(".main-footer").hide();
      $(".box-header").hide();
      $(".hide_print").hide();
      $("#info").hide();
      $(".btnhide").hide(); 
      window.print();
      $(".main-footer").show();
      $(".box-header").show();
      $(".hide_print").show();
     $("#info").show();
     $("#info2").show();
     $("#info3").show();
	 $("#info4").show();
	 window.location.reload();
   }

} );
</script>

<!-- <script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script> -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js" type="text/javascript"></script>