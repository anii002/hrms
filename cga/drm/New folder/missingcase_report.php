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
											<i class="fa fa-book"></i> Missing Case Form 
										</div>
										
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
											<div class="form-body ">
												
													<div class="row">
														
														<div class="text-center">
															<b>//Office-Note//</b>
														</div>
													</div>
													<br>
													<?php
														$sql=mysql_query("SELECT * from common_heading_details where ex_emp_pfno='".$_GET['ex_emp_pfno']."'");
														$res=mysql_fetch_array($sql);

													 ?>
													<div class="row">
														<div class="col-md-6" style="float: left;">

															<label>No.<?php echo $res['number'];?></label>
														</div>
														<div class="col-md-6" style="float: right;text-align: right;">
															<label>P/Rect Dtd:-<?php echo $res['date'];?></label>
														</div>
													</div>
													<br>
													<div class="row">
														
														<div class="text-center">
															<label><b>-Priority-III</b></label>
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
													<br>
													
												<div class="row">
													<div class="col-md-12">
														<label><b>1)</b></label>&nbsp;&nbsp; DETAILS OF THE EX-EMPLOYEE
														<!-- <label style="float: right;margin-right: 120px;"><b>PRIORITY - III</b></label> -->
													</div>
													
												</div>
												<br>
												<div class="row">	
													<div style="margin-left: 25px">
													<table  border="1" style="width: 85%;">
														<tbody>
															<?php 
																$sql=mysql_query("SELECT str_to_date(rlyjoindate,'%d/%m/%Y')as rlyjoindate1,str_to_date(retirementdate,'%d/%m/%Y')as retirementdate1,str_to_date(date_of_missing,'%d/%m/%Y')as date_of_missing1,prmaemp.*  from prmaemp where empno='".$_GET['ex_emp_pfno']."' ");
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
																<td>Date of Birth</td>
																<td><?php echo $res['birthdate']; ?></td>
															</tr>
																<tr>
																<td>4</td>
																<td>Date of Appointment</td>
																<td><?php echo $res['rlyjoindate']; ?></td>
															</tr>
																<tr>
																<td>5</td>
																<td>Date of Missing</td>
																<td><?php echo $res['date_of_missing']; ?></td>
															</tr>
															<tr>
																<td>6</td>
																<td>PF Number</td>
																<td><?php echo $res['empno']; ?></td>
															</tr>
															<tr>
																<td>7</td>
																<td>Rate of Pay</td>
																<td><?php echo $res['payrate']."/-"; ?></td>
															</tr>
															<tr>
																<td>8</td>
																<td>Service Rendered</td>
																<td>
																	<?php 

														$datetime1 = new DateTime($res['rlyjoindate1']);
														$datetime2 = new DateTime($res['date_of_missing1']);
														
														$interval = $datetime1->diff($datetime2);
														$calcu = $interval->format('Y--- %y M--- %m D--- %d');

																echo $calcu;

																 ?>
																</td>
															</tr>
															<tr>
																<td>9</td>
																<td>Service Left</td>
																<td>
																	<?php 

														$datetime1 = new DateTime($res['retirementdate1']);
														$datetime2 = new DateTime($res['date_of_missing1']);
														
														$interval = $datetime1->diff($datetime2);
														$calcu = $interval->format('Y--- %y M--- %m D--- %d');

																echo $calcu;

																 ?>
																</td>
															</tr>									
																
														</tbody>
													</table>
													</div>
												</div>
												
												<br>
												<div class="row">
													
													<div class="col-md-6">
													<label><b>2)</b></label>&nbsp;&nbsp; Following is the composition of his family
													</div>
												</div>
												<br>
												<div class="row">
													<div  style="margin-left: 20px">
													<table border="1" style="width: 85%;">
														<thead>
															<tr>
																<th>SR.NO.</th>
																<th>Name</th>
																<th>Relation With Ex.-Employee</th>
																<th>Age at the time of Death/MU/MD</th>
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
																<td><?php echo getRelation($res['member_relation']); ?></td>
																<td><?php echo $res['member_dob']; ?></td>
																<td><?php echo $res['member_qualifiaction']; ?></td>
																<td><?php echo getMaritailStatus($res['marital_status']); ?></td>
																<td><?php echo $res['employed_or_other']; ?></td>
															</tr>									
															<?php } ?>
														</tbody>
													</table>
													</div>
												</div>
												<br>

												<div class="row">
													<div class="col-md-6">
													<label><b>3)</b></label>&nbsp;&nbsp;<label>Particulars OF Applicant</label>
													</div>
												</div>
												<br>
												<div class="row">
													<div  style="margin-left: 25px" >
													<table border="1" style="width: 85%;">
														<tbody>
															<?php 
														$sql=mysql_query("SELECT str_to_date(applicant_dob,'%d/%m/%Y')as dob,str_to_date(created_at,'%d-%m-%Y')as cre,applicant_registration.* from applicant_registration where ex_emp_pfno='".$_GET['ex_emp_pfno']."' ");
														$result=mysql_fetch_array($sql);
														$a_date=substr($result['created_at'],0,10);

														// Declare and define two dates 
														$date1 = strtotime($result['dob']);  
														$date2 = strtotime($result['cre']);  

														// Formulate the Difference between two dates 
														$diff = abs($date2 - $date1);  
														// To get the year divide the resultant date into 
														// total seconds in a year (365*60*60*24) 
														$years = floor($diff / (365*60*60*24));  


														// To get the month, subtract it with years and 
														// divide the resultant date into 
														// total seconds in a month (30*60*60*24) 
														$months = floor(($diff - $years * 365*60*60*24) 
														/ (30*60*60*24));  


														// To get the day, subtract it with years and  
														// months and divide the resultant date into 
														// total seconds in a days (60*60*24) 
														$days = floor(($diff - $years * 365*60*60*24 -  
														$months*30*60*60*24)/ (60*60*24));
														// printf("%d years, %d months, %d days", $years, $months, 
														// $days);
													?>

																<tr>
																<td style="width: 30px;">1</td>
																<td style="width: 323px;">Name of the Candidate</td>
																<td><?php echo $result['applicant_name']; ?></td>
															</tr>
															<tr>
																<td>2</td>
																<td>Date of Birth</td>
																<td><?php echo $result['applicant_dob']; ?></td>
															</tr>
															<tr>
																<td>3</td>
																<td>Educational Qualification</td>
																<td><?php echo $result['applicant_qualifiaction']; ?></td>
															</tr>
															<tr>
																<td>4</td>
																<td>Age on Date</td>
																<td><?php printf("%d years, %d months, %d days", $years, $months,$days); ?></td>
															</tr>
																<!-- <tr>
																<td>3</td>
																<td>Relation with the employee</td>
																<td><?php// echo $result['relation_with']; ?></td>
															</tr> -->
																<tr>
																<td>5</td>
																<td>Whether SC/ST</td>
																<td><?php echo $result['caste']; ?></td>
															</tr>
															<tr>
																<td>6</td>
																<td>maritail Status</td>
																<td><?php echo getMaritailStatus($result['mariatial_status']); ?></td>
															</tr>
															<tr>
																<td>7</td>
																<td>AADHAr No</td>
																<td><?php echo $result['applicant_aadharno']; ?></td>
															</tr>
															<tr>
																<td>8</td>
																<td>PAN NO</td>
																<td><?php echo $result['applicant_panno']; ?></td>
															</tr>
															<tr>
																<td>9</td>
																<td>Mobile Number</td>
																<td><?php echo $result['applicant_mobno']; ?></td>
															</tr>
														</tbody>
													</table>
													</div>
												</div>

												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												
							<!--    2nd page code------------------------------------------ -->
												<br>
												<div class="row">
													<div class="col-md-6">
													<label><b>4)</b></label>&nbsp;&nbsp;<label>Financial Position of Ex Employee</label>
													</div>
												</div>
												<br>
												<div class="row">
													<div  style="margin-left: 25px" >
													<table border="1" style="width: 85%;">
														<tbody>
															<?php 
																$sql=mysql_query("SELECT * from financial_position_of_ex_emp where ex_emp_pfno='".$_GET['ex_emp_pfno']."' and category='".$_GET['case']."' ");
																$result=mysql_fetch_array($sql);
														
															?>
															<tr>
																<td style="width: 30px;">1</td>
																<td style="width: 323px;">Income from Family Pension</td>
																<td><?php echo $result['income_from_fmly_pension']; ?></td>
															</tr>
															<tr>
																<td>2</td>
																<td>Expected Incomes From Business/Employement of any other Members of the Family </td>
																<td><?php echo $result['expected_income']; ?></td>
															</tr>
															<tr>
																<td>3</td>
																<td>Total Income ( Rs )</td>
																<td><?php echo $result['total_income']; ?></td>
															</tr>
															<tr>
																<td>4</td>
																<td>Details of Immovable Property</td>
																<td><?php echo $result['immovable property']; ?></td>
															</tr>

																<tr>
																<td>5</td>
																<td>Whether Ex-Employee has his Own House or Not</td>
																<td><?php echo $result['his_own_houseornot']; ?></td>
															</tr>
														</tbody>
													</table>
													</div>
												</div>
												<br>
												<div class="row">
													<div class="col-md-6">
													<label><b>5)</b></label>&nbsp;&nbsp;<label>Details of Settlement dues paid are as follows </label>
													</div>
												</div>
												<br>
												<div class="row">
													<div  style="margin-left: 25px" >
													<table border="1" style="width: 85%;">
														<tbody>
															<?php 
														$sql=mysql_query("SELECT * from settlement where ex_emp_pfno='".$_GET['ex_emp_pfno']."' and category='".$_GET['case']."' ");
														$result=mysql_fetch_array($sql);
														
													?>
															<tr>
																<td style="width: 30px;">1</td>
																<td style="width: 323px;">Provident Fund</td>
																<td><?php echo $result['provident_fund']; ?></td>
															</tr>
															<tr>
																<td>2</td>
																<td>DCRG </td>
																<td><?php echo $result['dcrg']; ?></td>
															</tr>
															<tr>
																<td>3</td>
																<td>NGIS Lumpsum</td>
																<td><?php echo $result['ngis_lumpsum']; ?></td>
															</tr>
															<tr>
																<td>4</td>
																<td>NGIS Saving Fund</td>
																<td><?php echo $result['ngis_saving_fund']; ?></td>
															</tr>

																<tr>
																<td>5</td>
																<td>Leave Salary</td>
																<td><?php echo $result['leave_sal']; ?></td>
															</tr>
															<tr>
																<td>6</td>
																<td>Deposite Linked Insurance</td>
																<td><?php echo $result['deposit_linked_inssurance']; ?></td>
															</tr>
															<tr>
																<td>7</td>
																<td>Family Pension</td>
																<td><?php echo $result['fmly_pension']; ?></td>
															</tr>
															
														</tbody>
													</table>
													</div>
												</div>	
												<br>


													<?php
														$sql=mysql_query("SELECT * from fetch_category_data where ex_emp_pfno='".$_GET['ex_emp_pfno']."' and category_id='".$_GET['case']."'");
														$res=mysql_fetch_array($sql);

													 ?>
												<div class="row">
													<div class="col-md-12" style="float: left;">
														<p><b>6)</b>&nbsp;&nbsp;&nbsp;<?php echo $res['06'];?></p>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12" style="float: left;">
														<p><b>7)</b>&nbsp;&nbsp;&nbsp;<?php echo $res['07'];?></p>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12" style="float: left;">
														<p><b>8)</b>&nbsp;&nbsp;&nbsp;<?php echo $res['08'];?></p>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12" style="float: left;">
														<p><b>9)</b>&nbsp;&nbsp;&nbsp;<?php echo $res['09'];?></p>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12" style="float: left;">
														<p><b>10)</b>&nbsp;&nbsp;&nbsp;<?php echo $res['10'];?></p>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<p>&nbsp;&nbsp;&nbsp;<?php echo $res['last_common']; ?> </p>
													</div>
													<div class="col-md-4">
														<p class="">Submitted for approval please.</p>
														
													</div>
												</div>
												
												<br>
																									
													<div class="" style="float: right;">
														<p style="margin-right: 124px;">COS(P)/Rect</p>
													</div>
												
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												
												
													<div class="" style="float: left;">
														<p >DPO(Wel)</p>
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
												
												<div >
													<b>DPO</b>
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
												<div>
													<b>DRM</b>
												</div>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												
											</div>


											</div>


											
													
													
													
											<div class="form-actions right">
												<!-- <button type="button" class="btn blue " id='submit_btn' name='button' data-toggle="" data_target=""><i class="fa fa-check"></i> Submit</button> -->
												<a class='btn blue btnn' data-toggle='modal' href='#basic'>Forward  </a>&nbsp;
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



<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="control/adminProcess.php?action=missingcase_fw" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Forward To </h4>
				</div>
				<div class="modal-body">
					 <input type="hidden" id="ex_emp_pfno" name="ex_emp_pfno" value="<?php echo $_GET['ex_emp_pfno']; ?>" >
					 <input type="hidden" id="username" name="username" value="<?php echo $_GET['username']; ?>">
					 <input type="hidden" id="fw_tbl_id" name="fw_tbl_id" value="<?php echo $_GET['id']; ?>">

					 <div class="row">
						<div class="col-md-6">
							<div class="form-group">
								
									<select name="fw_to_pfno" id="fw_to_pfno" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
										<option value="" selected disabled>Select DPO</option>
										  <?php
											 
											 $query_emp =mysql_query("SELECT prmaemp.empname as name,login.pf_number as pf_number,login.* from login,prmaemp where prmaemp.empno=login.pf_number AND role='4' AND login.dept='".$_SESSION['dept']."' ");
											 					
											 while($value_emp = mysql_fetch_array($query_emp))
											 {
											  	echo "<option value='".$value_emp['pf_number']."'>".$value_emp['name']."</option>";
											 }
										  ?>
									</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								
								<button type="submit" class="btn blue">Forward</button>
									
							</div>
						</div>
						
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn default" data-dismiss="modal">Close</button>
					<!-- <button type="button" class="btn blue">Save changes</button> -->
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->


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