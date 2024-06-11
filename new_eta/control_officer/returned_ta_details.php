<?php
$GLOBALS['flag']="5.6";
include('common/header.php');
include('common/sidebar.php');
include('control/function.php');

if(isset($_POST['update']))
{
	$ref_no = $_GET['ref_no'];

	$query2 = mysql_query("UPDATE `taentry_master` SET `forward_status`=0, is_rejected=0, rejected_by='', reason=0  WHERE reference_no = '".$ref_no."' ");
	
	if($query2)
	{
		echo "<script>alert('TA Updated Successfully...');</script>";
		echo "<script> window.location='Show_unclaimed_TA.php'; </script>";
	}
	else
	{
		echo "<script>alert('Error While Changing Data...');</script>";
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

<?php

// if(isset($_POST['print_data']))
{
    
    // $e=("select * from taentry_master where reference_no='".$_GET['ref_no']."'");
    $empl_query = mysql_query("select * from taentry_master where reference_no='".$_GET['ref_no']."'");
    $empl_id_result = mysql_fetch_array($empl_query);
    $empl_id = $empl_id_result['empid'];
    
    $emp_query = mysql_query("select * from employees where pfno='".$empl_id."'");
    $emp_result = mysql_fetch_array($emp_query);
    $years=["January","February","March","April","May","June","July","August","September","October","November","December"];
    $expl = explode(",",$empl_id_result['TAMonth']);
}        

?>		
<div class="">			
<div class="page-content-wrapper">
		<div class="page-content">
		
		<div class="borderbox" id="info1"  style="border-top:1px solid black;padding:10px;">
	<div class="row text-center" >
		<label class="" style="font-size:16px"><b>यात्रा भत्ता जर्नल/TRAVELLING ALLOWANCE JOURNAL</b></label>
		<div style="position:absolute;left:80%;top:5px;font-size:16px;" class="cls_005"><span class="cls_005">जी.ए.31 एस  आर  सी /जी 1677</span></div>
		<div style="position:absolute;left:80%;top:20px;font-size:14px;" class="cls_005"><span class="cls_005">जी.69   एफ / जी 69 एफ / ए </span></div>
		<div style="position:absolute;left:80%;top:25px;font-size:12px;" class="cls_005"><span class="cls_005">____________________________________</span></div>
		<div style="position:absolute;left:80%;top:37px;font-size:16px;" class="cls_005"><span class="cls_005">GA 31 SRC/G 1677</span></div>
		<div style="position:absolute;left:80%;top:48px;font-size:14px;" class="cls_005"><span class="cls_005">G 69 F/G 69 F/A </span></div>
	</div>
	<div class="row">
		<label align="left" style="font-size:18px;margin-left:20px;">मध्य रेल/CENTRAL RAILWAY</label>
	</div>
	<div class="row text-center">
		<label class="" style="font-size:16px;font-weight:100;">नियम जिससे शामिल हे /Rules by Which governed &nbsp;<span style="border-bottom:1px solid black"><b></b></span></label>
	</div>
	<div class="row">
		<label class="" style="font-size:16px;font-weight:100;margin-left:20px;">शाखा/Branch &nbsp;&nbsp;<span style="border-bottom:1px solid black;">
		<b><?php echo getdepartment($emp_result['dept']); ?></b></span>&nbsp;&nbsp;&nbsp;&nbsp;मंडल/जिला/Divison/Dist.&nbsp;&nbsp;&nbsp;&nbsp;<span style="border-bottom:1px solid black"><b><?php echo get_dept_shortform($emp_result['dept']); ?> OFFICE</b></span>&nbsp;&nbsp;&nbsp;&nbsp;मुख्यालय /Headquarters at&nbsp;&nbsp;<span style="border-bottom:1px solid black"><b>SUR</b></span>&nbsp;&nbsp; &nbsp;द्वारा किये गये कार्यो का जर्नल, जिनके बारे मैं &nbsp;&nbsp;<span style="border-bottom:1px solid black"><b>
		<?php foreach($expl as $val)
         {
            echo $years[$val-1].", ";
         }
         echo " - ".$empl_id_result['TAYear']; ?></b></span> &nbsp;&nbsp;&nbsp;&nbsp;के लिये भत्ता मांगा गया हें |</label>
				
<label class="" style="font-size:16px;font-weight:100;margin-left:20px;">Journal of duties performed by &nbsp;&nbsp;&nbsp;<span style="border-bottom:1px solid black"><b><?php echo $emp_result['pfno'].'   ('.$emp_result['name'].')'; ?></b></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;for which allowance for&nbsp;&nbsp;&nbsp;<span style="border-bottom:1px solid black"><b><?php foreach($expl as $val)
         {
            echo $years[$val-1].", ";
         }
         echo " - ".$empl_id_result['TAYear']; ?></b></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;is claimed.</label><label style="font-size:13px;font-weight:100;margin-left:80px;">पदनाम /Designation&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="border-bottom:1px solid black"><b><?php echo $emp_result['desig']; ?></b></span>&nbsp;&nbsp;&nbsp;&nbsp;वेतन/Pay  &nbsp;&nbsp;&nbsp;&nbsp;<span style="border-bottom:1px solid black"><b><?php echo $emp_result['bp']; ?></b></span>&nbsp;&nbsp;</label>
				</div>
</div>
		
		<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.php">Home / मुख पृष्ठ</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">वापस यात्रा भत्ता सूची / Returned Claimed / Forward TA Details</a>
					</li>
				</ul>
				
			</div>
		
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption col-md-6 btnhide">
						<b> वापस किए गए यात्रा भत्ता विवरण / Returned Claimed / Forward TA Details</b>
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
						<!-- <label class="control-label"><h4 class="">Statement Showing the summery of TA & Contingency Bills For the Month of September-2018 </h4></label> -->
			    
				<input type="hidden" value="<?php echo $_GET['ref_no']; ?>" name="reference_no" id="reference_no">
			
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
											<th class='btnhide'>Action</th> 								
										</tr>										
									</thead>
									<tbody align="center">
										<?php
											 // $_GET['ref_no'];
											$query="SELECT DISTINCT(set_number) FROM `taentrydetails` WHERE reference_no='".$_GET['ref_no']."' ORDER BY `id` ASC";
											$sql=mysql_query($query);
											$total_row1=mysql_num_rows($sql);
											while($row_1 = mysql_fetch_array($sql)){

											$query1="SELECT * FROM `taentrydetails` WHERE set_number='".$row_1['set_number']."' AND reference_no='".$_GET['ref_no']."' ORDER by STR_TO_DATE(taDate,'%d/%m/%Y') ASC";
											$sql1=mysql_query($query1);
											$total_rows=mysql_num_rows($sql1);
											$cnt=1;
											while ($row = mysql_fetch_array($sql1)) {
										?>
										<tr>
											<?php 
												if($cnt == 1){
											?>
											<td width="10%" rowspan='<?php echo $total_rows; ?>'> <?php echo ($row['cardpass']); ?> </td>
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
											<td width="10%" rowspan='<?php echo $total_rows; ?>'> <?php echo $row['objective']; ?> </td>
											<td class='btnhide' width="10%" rowspan='<?php echo $total_rows; ?>'>

												<?php 
													$q="SELECT id FROM `master_cont` WHERE reference_no='".$_GET['ref_no']."' AND set_no='".$row_1['set_number']."' ";
													$s=mysql_query($q);
													$t=mysql_num_rows($s);
													if($t == 1)
													{
														?>
														<a id="<?php echo $row_1['set_number']; ?>" style="margin-top: 2px;" class="btn green view_cont btn_action">View Conti.</a>
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
						<div class="col-md-4"></div>
						<div class="col-md-4 summary-total">
						<h4 style="font-weight: bold;">Summary</h4>
						<div class="table-scrollable">
							<?php 
								$query3="SELECT `30p_cnt`,`30p_amt`,`70p_cnt`,`70p_amt`,`100p_cnt`,`100p_amt` FROM `tasummarydetails` WHERE `empid`='".$_SESSION['empid']."' AND `reference_no`='".$_GET['ref_no']."' ";
								$sql3=mysql_query($query3);
								$row3=mysql_fetch_array($sql3);
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
						<div class="col-md-4"></div>
						</div>
						
			<div id="info2">
            <div class="row" style="border-top:;page-break-before:always;">
            <div style="padding-left:35px;padding-right:30px;margin-top:30px;">
            <p style="text-align:justify;font-size:12px;"> मैं  प्रमाणित करता हूँ कि उपर्युक्त _______________________ उस अवधि  के दौरान, जिसके लिये इस बिल मैं भत्ता माँगा गया है रेलवे के कार्य से ड्यूटी पर मुख्यलय स्टेशन से बाहर गया था। इस अधिकारी ने रेलमार्ग /समुद्रमार्ग /सड़क-वाहन /वायुमार्ग की और इसे मुफ्त पास या सरकारी स्थानीय निधि या भारत सरकार के खर्च पर यात्रा करने की सुविधा दी गयी/नहीं दी गयी थी। <br>
मैं प्रमाणित करता हूं कि ड्यूटी पास की गयी यात्रा तथा विराम के बारे मैं जिसके लिए इस बिल मैं यात्रा भत्ता/दैनिक  भत्ता मांगा गया हैं,किसी भी स्त्रोत से कोई यात्रा भत्ता या अन्य पारिश्रमिक नहीं लिया गया हैं।   </p>
              <p style="text-align:justify;font-size:12px;margin-top:-11px;">
                I hereby certify that the above mentioned _______________________ was absent on duty from his headquater's station during the period charged for in this bill on railway business and that the officer performed the journey by Rail/Sea/Road/Air and was allowed free pass or locomotion at the expenses of Government local fund or Govt. of India.<br>
                I certify that no TA/DA or any other remuneration has been drawn from any other source in respect of the journey performed on duty pass and also for the halts for which TA/DA has been claimed in this bill. 
                
              </p>
            </div>
            </div>
          </div>
          <div id="info3">
            <div class="row" style="margin-top:15px;">
              <div style="padding-right:30px;padding-left:30px;">
                <div class="pull-left">___________________________________</div>
                <div class="pull-left"style="margin-top:25px;font-size:14px;margin-left:-180px;">प्रति हस्ताक्षरित/Countersigned</div>
              </div>
              <div style="padding-right:30px;padding-left:30px;margin-left:350px;">
                <div class="pull-left">___________________________________</div>
                <div class="pull-left" style="margin-top:25px;font-size:14px;margin-left:-180px;">कार्यालय प्रमुख /Head Of Office</div>
              </div>
              <div style="padding-right:px;padding-left:80px;margin-left:200px;margin-top:-3px;">
                <div class="" style="margin-left:500px;">___________________________________</div>
                <div class="" style="margin-top:5px;font-size:14px;margin-left:52%;">भत्ता मांगने वाले अधिकारी का हस्ताक्षर <br>Signature of officer/Claiming T.A</div>
              </div>        
            </div>
          </div>
          <div id="info4" >
            <div class="row" style="margin-top:15px;">
              <div style="padding-left:35px;padding-right:30px;">
                <div style="font-size:14px;">टिप्पणी :- किसी एक रेलवे से दूसरी रेलवे पर स्तानंन्तरण  होने पर यात्रा भत्ता बिल पर यह प्रमाणित किया जाना चाहिये कि मुफ्त पास या सरकारी खर्च पर यात्रा करने की सुविधा दी गयी या नहीं। </div>
                <div style="font-size:14px;">Note :- On transfer from one Railway to another,certificate whether or not a free pass or not a free pass or Locomotion at Government expenses was allowed or not should be recorded on T.A Bills. </div>
                
              </div>
            </div>
          </div>
						
			
						<div class="col-md-12 trackprint-btn">
							<ul>
								 <li><button type="submit" name="update" class="btn blue btnhide">Update</button></li> 
								<!--<li><button class="btn blue btnhide">Track</button></li>--> 
								<!-- <li><a href="track-modul.php?ref_no=<?php echo $_GET['ref_no']; ?>" class="btn green btn_action btnhide">Track</a></li> -->
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
	
	
	<div id="responsive" class="modal fade modal-scroll" tabindex="-1" data-replace="true">
		<div class="modal-header btn-orange-moon">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			<h4 class="modal-title">Contingency Data : <span id="name1" name="name1"></span>	</h4>
		</div>
		<form  action="control/adminProcess.php?action=delcont" method="post" class="horizontal-form">
		    <input type="hidden" id="ref_no" value="<?php  echo $_GET['ref_no'];?>" name="ref_no">
			<input type="hidden" id="set_no1" value="" name="set_no1">
			<div class="modal-body">
				<div class="portlet-body table-responsive">
					<div id="cont_details"></div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn default" data-dismiss="modal">Close</button>
				<!--<button type="submit" class="btn red" >Delete TA</button>-->
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
} );


    $(document).on("click",".view_cont",function(){
		var sno=$(this).attr('id');
		var ref_no=$("#reference_no").val();
		// alert(sno);
		// alert(ref_no);
		$("#set_no1").val(sno);

		$.ajax({
			url:'control/adminProcess.php',
			type:'post',
			data:"action=view_conti&ref_no="+ref_no+"&set_no="+sno,

			success:function(data)
			{
				// alert(data);
				if(data != 0)
				{
					$("#cont_details").html(data);
				 	$("#responsive").modal('toggle');  
	      			$("#responsive").modal('show'); 
				}
			}	
		});

	});

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

</script>

<!--<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>-->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js" type="text/javascript"></script>