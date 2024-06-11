<?php
	$GLOBALS['flag']="1.4";
	include('common/header.php');
	include('common/sidebar.php');
?>
<style type="text/css" media="screen">  
@media print {
  .btnhide {
    display : none !important;
	display : block;
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
 
  </style>
			
	<div class="page-content-wrapper">
		<div class="page-content">

			
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue btnz">
									<div class="portlet-title">
										<div class="caption btnboom">
											<i class="fa fa-book"></i> Medical Decategorized Case Form 
										</div>
										
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
											<div class="form-body ">
												
													<div class="row">
														
														<div class="text-center">
															NP1
														</div>
													</div>
													<?php
														$sql=mysql_query("SELECT * from common_heading_details where ex_emp_pfno='".$_GET['ex_emp_pfno']."'");
														$res=mysql_fetch_array($sql);

													 ?>
													<div class="row">
														<div class="col-md-6" style="float: left;">

															<label>No.<?php echo $res['number'];?></label>
														</div>
														<div class="col-md-6" style="float: right;text-align: right;">
															<label>Date:-<?php echo $res['date'];?></label>
														</div>
													</div>
													<div class="row">
														
														<div class="text-center">
															<label><b><u>Office Note</u></b></label>
														</div>
														
													</div>
													<div class="row">
														
														<div class="col-xs-3" style="width: 120px;">
															<span style="margin-left: 60px">Sub.</span> 
														</div>
														<div class="col-md-8">
															<p style="float: left;"><?php echo $res['subject'];?></p>
														</div>

													</div>
													<div class="row">
														
														<div class="text-center">
															<label><b>**</b></label>
														</div>
														
													</div>
												
												<div class="row">
													<div class="col-md-12">
														<label><b>I.</b></label>&nbsp;&nbsp; DETAILS OF THE EX-EMPLOYEE
														<label style="float: right;margin-right: 120px;"><b>PRIORITY - III</b></label>
													</div>
													
												</div>
												<div class="row">	
													<div style="margin-left: 25px">
													<table  border="1" style="width: 85%;">
														<tbody>
															<?php 
																$sql=mysql_query("select * from prmaemp where empno='".$_GET['ex_emp_pfno']."' ");
         														$res=mysql_fetch_array($sql);
															?>
															<tr>
																<td style="width: 30px;">1</td>
																<td style="width: 323px;">Name of the Employee</td>
																<td><?php echo $res['empname']; ?></td>
															</tr>
																<tr>
																<td>2</td>
																<td>Designation and Station</td>
																<td><?php echo designation($res['desigcode'])."  (".$res['stationcode'].")"; ?></td>
															</tr>
																<tr>
																<td>3</td>
																<td>Scale & Basic pay</td>
																<td><?php echo $res['payrate'];  echo "(".getScaleCode($res['scalecode']).")"; ?></td>
															</tr>
																<tr>
																<td>4</td>
																<td>Date of Birth</td>
																<td><?php echo $res['birthdate']; ?></td>
															</tr>
																<tr>
																<td>5</td>
																<td>Date of Appointment</td>
																<td><?php echo $res['rlyjoindate']; ?></td>
															</tr>
																<tr>
																<td>6</td>
																<td>Date of normal retirement</td>
																<td><?php echo $res['retirementdate']; ?></td>
															</tr>									
															<tr>
																<td>7</td>
																<td>Date of medical Decategorisation</td>
																<td><?php echo $res['date_of_md']; ?></td>
																
															</tr>									
															<tr>
																<td>8</td>
																<td>Date of voluntary retirement</td>
																<td><?php echo $res['date_of_vr']; ?></td>
															</tr>
														</tbody>
													</table>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
													<label><b>II.</b></label>&nbsp;&nbsp;<label>DETAILS OF THE CANDIDATE</label>
													</div>
												</div>
												<div class="row">
													<div  style="margin-left: 25px" >
													<table border="1" style="width: 85%;">
														<tbody>
															<?php 
														$sql=mysql_query("SELECT * from applicant_registration where ex_emp_pfno='".$_GET['ex_emp_pfno']."' ");
														$result=mysql_fetch_array($sql);
														$a_date=substr($result['created_at'],0,10);
													?>
															<tr >
																<td style="width: 30px;">1</td>
																<td style="width: 323px;">Date of Application</td>
																<td><?php echo $a_date;?></td>
															</tr>
																<tr>
																<td>2</td>
																<td>Name of the Candidate</td>
																<td><?php echo $result['applicant_name']; ?></td>
															</tr>
																<tr>
																<td>3</td>
																<td>Relation with the employee</td>
																<td><?php echo $result['relation_with']; ?></td>
															</tr>
																<tr>
																<td>4</td>
																<td>SC/ST/OBC/UR</td>
																<td><?php echo $result['caste']; ?></td>
															</tr>
																<tr>
																<td>5</td>
																<td>Date of Birth</td>
																<td><?php echo $result['applicant_dob']; ?></td>
															</tr>
																<tr>
																<td>6</td>
																<td>Educational Qualification</td>
																<td><?php echo $result['applicant_qualifiaction']; ?></td>
															</tr>									
															<tr>
																<td>7</td>
																<td>Category for which eligible</td>
																<?php 
																 if($result['eligible_category']==1)
																 {
																 	echo "<td>Group A</td>";
																 }
																 elseif($result['eligible_category']==2)
																 {
																 	echo "<td>Group B</td>";
																 }
																 elseif($result['eligible_category']==3)
																 {
																 	echo "<td>Group C</td>";
																 }
																 elseif($result['eligible_category']==4)
																 {
																 	echo "<td>Group D</td>";
																 }
																  ?>
																
															</tr>									
															
														</tbody>
													</table>
													</div>
												</div>

												<div class="row">
													
													<div class="col-md-6">
													<label><b>III.</b></label>&nbsp;&nbsp; DETAILS OF ALL THE MEMBERS OF THE FAMILY
													</div>
												</div>
												<div class="row">
													<div  style="margin-left: 20px">
													<table border="1" style="width: 85%;">
														<thead>
															<tr>
																<th>SR.NO.</th>
																<th>Name</th>
																<th>Relation With Ex.-Employee</th>
																<th>Date of Birth</th>
																<th>Education Qual.</th>
																<th>Marital Status</th>
																<th>Whether employed</th>
															</tr>
														</thead>
														<tbody>
															<?php
																$sql=mysql_query("SELECT * from emp_family_tbl where ex_emp_pfno='".$_GET['ex_emp_pfno']."'");
																$sr=0;
																while ($res=mysql_fetch_array($sql)) {
																$sr++;
															?>
															<tr>
																<td ><?php echo $sr; ?></td>
																<td><?php echo $res['member_name']; ?></td>
																<td><?php echo $res['member_relation']; ?></td>
																<td><?php echo $res['member_dob']; ?></td>
																<td><?php echo $res['member_qualifiaction']; ?></td>
																<td><?php echo $res['marital_status']; ?></td>
																<td><?php echo $res['employed_or_other']; ?></td>
															</tr>									
															<?php } ?>
														</tbody>
													</table>
													</div>
												</div>

												<div class="row">
													
													<div class="col-md-9">
													<label><b>IV.</b></label>&nbsp;&nbsp;	SETTLEMENT DUES RECEIVED in Rs. : Settlement case is under process.	
													</div>
												</div>
												<div class="row">
													
													<div class="col-md-12">
													<label><b>V.</b></label>&nbsp;&nbsp; DETAILS OF MOVABLE/IMMOVABLE PROPERTY:Present financial status of family is not good. The family resides in railway quarter at GPR and possesses one scooter. There is no permanent source of income. The case deserves compassion.	
													</div>
												</div>
												<br>
												<br>
												<br>
												<br>
							<!--    2nd page code------------------------------------------ -->
													<?php
														$sql=mysql_query("SELECT * from common_heading_details where ex_emp_pfno='".$_GET['ex_emp_pfno']."'");
														$res=mysql_fetch_array($sql);

													 ?>
												<div class="row">
													<div class="col-md-6" style="float: left;">
														<label>No.<?php echo $res['number']; ?></label>
													</div>
												</div>
												<div class="row">
													<div class="col-md-9" style="margin-left: 50px;">

														<label>Sub.&nbsp;&nbsp;<?php echo $res['subject']; ?></label>
													</div>
												</div>
												<div class="text-center">
													**
												</div>
												<div class="row">
													<div class="" style="margin-left: 50px">
														<p>Past record of ex-empolyee:</p>
													</div>
												</div>
												<div>
													<div class="row ">
														<div class="col-md-4">
														a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>i)&nbsp;Reward granted - Nil.</span><br>
														<p style="margin-left: 30px">ii) Penalties imposed- Nil.</p>
														<p style="margin-left: 30px">iii).Working report/APAR &nbsp;&nbsp;&nbsp;      <b>-P-15-17.</b></p>
														</div>
													</div>
													<div class="row">
														<div class="col-md-9">
															<span>b)&nbsp;&nbsp;&nbsp;&nbsp;Special circumstance including employment/non employment of other members of the family (in Rly / other than Railways). Ex-Employee's daug. is ummanried. his Wife is housewife .There is no permanent source of income. </span>
															
														</div>
														
													</div>

													<div class="row">
														<div class="col-md-9">
															<span>c)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last 10 years Leave record is place at <b>P: 06-10.</b> </span>
															
														</div>
														
													</div>
													<br>
													<div class="row">
														<div class="col-md-9">
															<span>VI.&nbsp;&nbsp;&nbsp;&nbsp;Other documents placed are as under:</span>
															
														</div>
															
													</div>
													<div class="row" style="margin-left: 20px">
														<table border="1" style="width: 85%">
															<thead>
																<tr>
																	<th>Documnets</th>
																	<th>P NO</th>
																	<th>Documnets</th>
																	<th>P NO</th>
																	
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>PAN Card of Candidate</td>
																	<td>35</td>
																	<td>Service Certificate issued by CYM GPR</td>
																	<td>27</td>
																</tr>
																<tr>
																	<td>AAdhar Card of Candidavide ate</td>
																	<td>33</td>
																	<td>CO-Worker's Certificate</td>
																	<td>26</td>
																</tr>
																<tr>
																	<td>Photo copy of 1<superscript>st</superscript> page of SR</td>
																	<td>14</td>
																	<td>Decleration of bread winner</td>
																	<td>25</td>
																</tr>
																<tr>
																	<td>Family Composition Certificate</td>
																	<td>NA</td>
																	<td>Combined nomination</td>
																	<td>13</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<br>
												<div class="row">
													<div class="col-md-9">
														<span>VII. &nbsp;&nbsp;&nbsp;&nbsp; Ch S& W Insp's report is placed at <b>P-53-57.</b>Check list is at <b>P-58.</b></span>	
													</div>
												</div>
												<br>
												<div class="row">

												<div class="col-md-12">
													<p style="margin-left: 30px"><lable style="padding-left: 30px">Shri</lable>              has requested application dated 08/10/2018<b>(P-21)</b> to consider his son, Shri     for appointment on compoassioonate ground.<br> Smt.    w/o   shri   consider her son, Shri     for appointment on compassionate ground.
													Shri              has requested application dated 08/10/2018<b>(P-21)</b><br> to consider his son, Shri     for appointment on compoassioonate ground. Smt.    w/o   shri   consider her son, Shri     for appointment on compassionate ground.</p>

													<p style="margin-left: 30px"><lable style="padding-left: 30px">Shri</lable>              has requested application dated 08/10/2018<b>(P-21)</b> to consider his son, Shri     for appointment on compoassioonate ground.<br> Smt.    w/o   shri   consider her son, Shri     for appointment on compassionate ground.
													Shri              has requested application dated 08/10/2018<b>(P-21)</b><br> to consider his son, Shri     for appointment on compoassioonate ground. Smt.    w/o   shri   consider her son, Shri     for appointment on compassionate ground.</p>

													<p style="margin-left: 30px">The case is thus within DRM's zone of consideration. If approved by DRM, the applicant can be called for screening for Gr'D' Category.</p>
													</div>
												</div>
												<br>
																									
													<div class="" style="float: right;">
														<p style="margin-right: 124px;">Ch.S&WI</p>
													</div>
												
												<br>
												<br>
												<br>
												<br>
												<!-- <br>
												<br> -->
												<div class="text-center">
													<p>NP-3</p>
												</div>
												<div class="row">
													<div class="col-md-4">
													<p>No.<?php echo $res['number']; ?></p>

													</div>
												</div>
												<br>
												<br>
									<!--    3nd page code------------------------------------------ -->
													<?php
														$sql=mysql_query("SELECT * from common_heading_details where ex_emp_pfno='".$_GET['ex_emp_pfno']."'");
														$res=mysql_fetch_array($sql);

													 ?>
													 <div class="print3" style="display: none;">
												<div class="row">
													<div class="col-md-9" style="margin-left: 50px;">

														<label>Sub.&nbsp;&nbsp;<?php echo $res['subject']; ?></label>
													</div>
												</div>
												<div class="text-center">
													**
												</div>
												<div >
													<b>APO</b>
												</div>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<div>
													<b>Sr.DPO</b>
												</div>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<div>
													<b>ADRM</b>
												</div>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<div >
													<b>DRM</b>
												</div>
											</div>


											</div>


											
													
													
													
											<div class="form-actions right">
												<button type="button" class="btn blue submit_btn" id='submit_btn' name='button'><i class="fa fa-check"></i> Submit</button>&nbsp;
												<button type="button" class="btn default" onclick="history.go(-1);">Cancel</button>
												<button onclick="print_button()" type="button" class="btn green btnhide">Print</button>		
											</div>
										</form>
										
										
										<!-- END FORM-->
									</div>
								</div>
			
	</div>
<?php
	include 'common/footer.php';
?>
<script>
  $(function() {
        
     $('#md_app_d').datepicker({
      autoclose: true,
      format:'dd-mm-yyyy',
    });
    //  $('#date_of_nr').datepicker({
    //   autoclose: true
    // });
     $('#date_of_md').datepicker({
      autoclose: true,
      format:'dd-mm-yyyy'
    });
     $('#date_of_vr').datepicker({
      autoclose: true,
      format:'dd-mm-yyyy'
    });

 }); 
</script>
<script type="text/javascript">
	function print_button()
   {
      $(".main-footer").hide();
      
      $(".btnboom").hide();
      $(".right").hide();
      $(".print3").show();
      $(".btnhide").hide(); 
      //$(".btnz").attr("border","0");
      $(".btnz").css("border", "0");
      window.print();
     
      
	 window.location.reload();
   }
  $('#DataTables_Table_22').DataTable( {
                    dom: 'Bfrtip',
                    "pageLength": 5,
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                } );
</script>