<?php
	$GLOBALS['flag']="1.9";
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

 .box.box-info {
    border-top-color: #ccc;
  }
        .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td{
          border : 1px solid #ccc;
        }
        .table-bordered {
            border: 1px solid #ccc;
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

		
			<div class="portlet box blue btnz">
						<div class="portlet-title">
							<div class="caption btnboom">
											<i class="fa fa-book"></i> Pending Application Form 
										</div>
						</div>

						<div class="portlet-body form">
							<form action="" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
											 <input type="hidden" id="curDate" value="<?php echo date('m/d/Y'); ?>">
											 <input type="hidden" id="pid" name="pid" value="<?php echo $_GET['id']; ?>">
											 <input type="hidden" id="p_emp_pfno" name="p_emp_pfno" value="<?php echo $_GET['ex_emp_pfno']; ?>">
											 <input type="hidden" id="p_username" name="p_username" value="<?php echo $_GET['username']; ?>">
							<div class="form-body">

							<div class="tabbable-line ">
								<ul class="nav nav-tabs btnboom">
									<li class="active">
										<a href="#tab_15_1" data-toggle="tab">
										form </a>
									</li>
									
									<li>
										<a href="#tab_15_3" data-toggle="tab">
										Verified Documents </a>
									</li>
									
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab_15_1">
									
									<div class="" id="info1"  style="border-top:px solid black;padding:10px;">
						<div class="row text-center" >
							<label class="" style="font-size:16px;margin-top:25px;"><b>Central Railway</b></label>	
						</div>
						<div class="row" >
							<label align="right" style="font-size:14px;margin-left:80%;margin-top:25px;"><b>PHOTO</b></label>	</div><br><br>
						<div class="row">
							<label align="left" style="font-size:16px;margin-left:20px;">Investigation Report to be submitted by the Staff & Welfare Inspector in connection with appointment of candidates on compassionate grounds.</label>
						</div>
						<div class="row text-center" >
							<label class="" style="font-size:16px"><b>********</b></label>	
						</div>
						<div class="row">
							<label align="left" style="font-size:16px;margin-left:20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shri / Smt........................has submitted an application seeking appointment to her / her..........in group `C` / `D` on compassionate grounds against the death / Medical unfit of his / her.......The family of the deceased has been contacted on........</label>
						</div><br>
						<div class="row">
							<label align="left" style="font-size:16px;margin-left:20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The particular in detail of the ex employee, his family and the candidate for whom appointment on compassionate ground is sought have since been investigated and details are as under:- </label>
						</div><br>
						<div class="row" >
							<label class="" align="left" style="font-size:16px;margin-left:20px;"><b>PRIORITY NUMBER: | / || / |||</b></label>	
						</div>
						<div class="row" >
							<label class="" align="left" style="font-size:16px;margin-left:20px;"><b>(A) SERVICE PARTICULAR OF THE DECEASED / MEDICALLY DECALLY / UNFIT / MISSING EMPLOYEE.</b></label>	
						</div>
					</div>

					<div class="row">
								<div style="margin-left: 25px" class="table-responsive">
													<table border="1" style="width: 85%;">
														<tbody>
															<?php 
															dbcon2();
																$sql=mysql_query("SELECT * from drmpsurh_sur_railway.prmaemp where empno='".$_GET['ex_emp_pfno']."' ");
         														$res=mysql_fetch_array($sql);
         														dbcon1();
         														$sql1=mysql_query("SELECT * from drmpsurh_cga.service_particulars where ex_emp_pfno='".$_GET['ex_emp_pfno']."' ");
         														$res1=mysql_fetch_array($sql1);
															?>
															<tr>
																<td style="width: 30px;">1</td>
																<td style="width: 323px;">Name of the Employee</td>
																<td>:<?php echo $res['empname']; ?></td>
															</tr>
																<tr>
																<td>2</td>
																<td>Whether belongs to SC/ST/OBC</td>
																<td>:<?php echo $res['community']; ?></td>
															</tr>
															<tr>
																<td>3</td>
																<td>Design & place of last working</td>
																<td>:<?php echo designation($res['desigcode'])." &  (".$res['stationcode'].")"; ?></td>
															</tr>
																<tr>
																<td>4</td>
																<td>Scale & rate of pay</td>
																<td>:<?php  echo "(".getScaleCode($res['scalecode']).") & "; echo $res['payrate'];  ?></td>
															</tr>
																<tr>
																<td>5</td>
																<td>Date of Birth</td>
																<td>:<?php echo $res['birthdate']; ?></td>
															</tr>
																<tr>
																<td>6</td>
																<td>Date of Appointment<br>(Note:copy of the service certificate has to be enclosed in support of the information against item 1 to 6 )</td>
																<td>:<?php echo $res['rlyjoindate']; ?></td>
															</tr>
																<tr>
																<td>7</td>
																<td>Date of death/medical decategorised /medically unfit/missing</td>
																<td>:<?php

																	if($_GET['case']==1)
																	{
																		echo $res['date_of_expiry'];

																	}
																	else if($_GET['case']==2)
																	{
																		echo $res['date_of_missing'];

																	}
																	else if($_GET['case']==3)
																	{
																		echo $res['date_of_md']."&nbsp;&nbsp;&nbsp;&nbsp;";
																		echo $res['date_of_vr'];

																	}
																	elseif($_GET['case']==4)
																	{
																		echo $res['date_of_med_decat']."&nbsp;&nbsp;&nbsp;&nbsp;";
																		echo $res['date_of_retd'];

																	}
																  ?></td>
															</tr>									
															<tr>
																<td>8</td>
																<td>Whether death is due to accident on duty, if so, particulars of compensation paid.</td>
																<td>:<?php echo $res1['death_is_dueto_accident_on_duty']; ?></td>
																
															</tr>									
															<tr>
																<td>9</td>
																<td>Priority no. under which the case falls</td>
																<td>:<?php echo $res1['priority_no']; ?></td>
															</tr>
															<tr>
																<td>10</td>
																<td>Cause of death /reason for medical unfitness /decategorisation</td>
																<td>:<?php echo $res1['cause_of_death/reason']; ?></td>
															</tr>
															<tr>
																<td>11</td>
																<td>The period of sickness in case of medical unfit / decategorisation</td>
																<td>:<?php echo $res1['period_sickness']; ?></td>
															</tr>
															<tr>
																<td>12</td>
																<td>Total service</td>
																<td>:<?php echo $res1['total_service']; ?></td>
															</tr> 

														</tbody>
													</table>
													</div>
							</div>
							<div class="row" >
							<label align="right" style="font-size:12px;margin-left:80%;margin-top:25px;"><b>Cont 2</b></label>	</div>
							<div id="info2">
            					<div class="row" style="border-top:;page-break-before:always;">
            						
										<!-- <label align="left" style="font-size:16px;margin-left:30px;">Name of applicant:</label>
										<label align="left" style="font-size:16px;margin-left:30px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;S/o Sh / Lt</label>
										<label align="left" style="font-size:16px;margin-left:30px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Design: Ex.......</label> -->
										
										<div class="col-md-12">
											<p >Name of applicant: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;S/o Sh/Lt&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Design: Ex....</p>
											<p >Place of Working: </p>
											<!-- <p class="text-center"></p>
											<p style="float: right;"></p> -->
											
										</div>
									
									
									<div class="row text-center text-center">
										<label style="font-size:16px;margin-left:30px;">-2-</label>
									</div>
            					</div>
            				</div>
            				<div class="row">
								<div style="margin-left: 25px" class="table-responsive">
													<table  border="1" style="width: 85%;">
														<tbody>
															<?php 
															dbcon1();
																$sql=mysql_query("SELECT * from service_particulars where ex_emp_pfno='".$_GET['ex_emp_pfno']."' ");
         														$res=mysql_fetch_array($sql);
															?>
															 <tr>
																<td style="width: 30px;">13</td>
																<td style="width: 323px;">Date on which the alternative job offered (furnish Design/deptt & scale of the alternative post enclose copy of the alternative appointment).</td>
																<td>:<?php echo $res['alter_job_offered'] ;?></td>
															</tr>
															<tr>
																<td>14</td>
																<td>Whether alternative appointment on same emolument offered or otherwise</td>
																<td>:<?php echo $res['alter_apptmt_emolumt_offered'] ;?></td>
															</tr>
															<tr >
																<td rowspan="6">15</td>
																<td >Emoluments the employee has been drawing before decategorisation & BP also the post offered on alternative appointment.</td>
																<td ><p style="text-align: center;width: 50%;float: left;">Before</p> <p style="text-align: center;width: 50%;float: right;">After</p></td>
															</tr>
															<tr class="borderright">
																<td style="text-align: right;">BP:</td>
																<td><h5 class="bderright" style="width: 47%;float: left;text-align: center;" name="before_bp"><?php echo $res['before_bp'] ;?></h5> 
																	<h5 name="after_bp" style="text-align: center;"><?php echo $res['after_bp'] ;?></h5></td>
																<!-- <td></td> -->
															</tr>
															<tr class="borderright">
																<td style="text-align: right;">DA:</td>
																<td><h5 class="bderright" style="width: 47%;float: left;text-align: center;" name="before_bp"><?php echo $res['before_da'] ;?></h5> 
																	<h5 name="after_bp" style="text-align: center;"><?php echo $res['after_da'] ;?></h5></td>
																<!-- <td></td> -->
															</tr>
															<tr class="borderright">
																<td style="text-align: right;">HRA:</td>
																<td><h5 class="bderright" style="width: 47%;float: left;text-align: center;" name="before_bp"><?php echo $res['before_hra'] ;?></h5> 
																	<h5 name="after_bp" style="text-align: center;"><?php echo $res['after_hra'] ;?></h5></td>
																<!-- <td></td> -->
															</tr>
															<tr class="borderright">
																<td style="text-align: right;">CCA:</td>
																<td><h5 class="bderright" style="width: 47%;float: left;text-align: center;" name="before_bp"><?php echo $res['before_cca'] ;?></h5> 
																	<h5 name="after_bp" style="text-align: center;"><?php echo $res['after_cca'] ;?></h5></td>
																<!-- <td></td> -->
															</tr>
															<tr class="borderright">
																<td style="text-align: right;">OTHERS:</td>
																<td><h5 class="bderright" style="width: 47%;float: left;text-align: center;" name="before_bp"><?php echo $res['before_others'] ;?></h5> 
																	<h5 name="after_bp" style="text-align: center;"><?php echo $res['after_others'] ;?></h5></td>
																<!-- <td></td> -->
															</tr>
															<tr>
																<td>16</td>
																<td>Is there drop in emolument ,percentage of drop on alternative appointment.</td>
																<td>:<?php echo $res['drop_in_emolumt'] ;?></td>
															</tr>
															<tr>
																<td>17</td>
																<td>Reasons if any, for not accepting the altenative appointment (Encl copy of refusal)</td>
																<td>:<?php echo $res['not_accepting_alter_appmt'] ;?></td>
															</tr>
															<tr>
																<td>18</td>
																<td>Date on which the service terminated / compulsory retd. due to non_acceptance of alternative appt OR retired without waiting for alternative appt (Encl copy of office order)</td>
																<td>:<?php echo $res['service_trminated/compulsory_retd'] ;?></td>
															</tr>
															<tr>
																<td rowspan="8">19</td>
																<td >Settlement dues paid</td>
																<?php
																dbcon1();
																	$sql=mysql_query("SELECT * from wi_settlement where ex_emp_pfno='".$_GET['ex_emp_pfno']."'");
																	$res=mysql_fetch_array($sql);
																?>
																<td></td>
															</tr>
															<tr><td align="right">PF:</td><td>Rs.<?php echo $res['pf'] ;?></td></tr>
															<tr><td align="right">DCRG:</td><td>Rs.<?php echo $res['dcrg'] ;?></td></tr>
															<tr><td align="right">GIS:</td><td>Rs.<?php echo $res['gis'] ;?></td></tr>
															<tr><td align="right">IL:</td><td>Rs.<?php echo $res['il'] ;?></td></tr>
															<tr><td align="right">LE:</td><td>Rs.<?php echo $res['le'] ;?></td></tr>
															<tr><td align="right">Compensation in regard to WCA:</td><td>Rs.<?php echo $res['wca'] ;?></td></tr>
															<tr><td align="right">Others:</td><td>Rs.<?php echo $res['others'] ;?></td></tr>
															<tr>
																<td>20</td>
																<td>Pension /family pension sanction with relief</td>
																<td>Rs.<?php echo $res['family_pension'] ;?></td>
															</tr>
														</tbody>
													</table>
								</div>
							</div>
							<div class="row" >
								<label align="right" style="font-size:12px;margin-left:80%;margin-top:25px;"><b>Cont 3</b></label>	
							</div>
							<div id="info2">
            					<div class="row" style="border-top:;page-break-before:always;">
            						<div class="row">
										<label align="left" style="font-size:16px;margin-left:30px;">Name of applicant:</label>
										<label align="left" style="font-size:16px;margin-left:30px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;S/o Sh / Lt</label>
										<label align="left" style="font-size:16px;margin-left:30px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Design: Ex.......</label>
									</div>
									<div class="row">
										<label align="left" style="font-size:16px;margin-left:30px;">Place of working:</label>
									</div>
									<div class="row text-center">
										<label style="font-size:16px;margin-left:30px;">-3-</label>
									</div>
									<div class="row">
										<label align="left" style="font-size:16px;margin-left:20px;">21.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Present financial status of the family indicating land, immovable and movable property with details if any. Details of other source of income, location and place. Staff & Welfare Inspector should certify in his own handwriting whether the case deserves compassionate or otherwise:</label>
									</div><br><br>
									<div class="row">
										<label align="left" style="font-size:16px;margin-left:20px;margin-top:150px;">22.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Particular of composition of the family:(Wife,son and daughter as per the pass account).Enclose family composition certificate furnished by the ex-employee while in service.</label>
									</div><br><br>
            					</div>
            				</div>
            				<table border="1" style="width: 85%;">
            					<thead>
            						<th>Sr No.</th>
            						<th>Name</th>
            						<th>Relation with ex employee</th>
            						<th>D O B</th>
            						<th>Edu<br>Quali</th>
            						<th>Martial status</th>
            						<th>Employed/<br>Unemployed</th>
            						<!-- <th>Sr No.</th> -->
            					</thead>
            					<tbody>
            						<?php
            						dbcon1();
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
            				<div class="row">
								<label align="left" style="font-size:16px;margin-left:20px;"><b>B.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>PARTICULARS OF THE CANDIDATE IN WHOSE FAVOUR APPOINTMENT ON COMPASSIONATE GROUND SOUGHT FOR:</b></label>
							</div><br>
							<table border="1" style="width: 85%;">
										<?php
										dbcon1();
											$sql=mysql_query("SELECT * from applicant_registration where ex_emp_pfno='".$_GET['ex_emp_pfno']."'");
											$res=mysql_fetch_array($sql);
										?>
															<tr>
																<td style="width: 30px;">1</td>
																<td style="width: 323px;">Name of the candidate and relationship with the deceased /
																 MU / MD employee
																(encl certificate for two co-workers)</td>
																<td>:<?php echo $res['applicant_name']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(".getRelation($res['relation_with']).")";?></td>
															</tr>
															<tr>
																<td>2</td>
																<td>Date of the birth (encl SSC / SSLC / Leaving certificate / affidavit from the court of law)</td>
																<td>:<?php echo $res['applicant_dob']; ?></td>
															</tr>
															<tr>
																<td>3</td>
																<td>Educational Qualification (encl attested copies of certificate in support)</td>
																<td>:<?php echo $res['applicant_qualifiaction']; ?></td>
															</tr>
															<tr>
																<td>4</td>
																<td>Personal marks of identification of the candidate</td>
																<td>:a.<?php echo $res['identification_mark1']; ?><br><br>:b.<?php echo $res['identification_mark2']; ?></td>
															</tr>
															<tr>
																<td>5</td>
																<td>Permanent address of the candidate</td>
																<td>:<?php echo $res['permanent_address']; ?></td>
															</tr>
							</table>
							<div class="row" >
								<label align="right" style="font-size:12px;margin-left:80%;margin-top:25px;"><b>Cont 4</b></label>	
							</div>
							<div id="info2">
            					<div class="row" >
            						<div class="row">
										<label align="left" style="font-size:16px;margin-left:30px;">Name of applicant:</label>
										<label align="left" style="font-size:16px;margin-left:30px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;S/o Sh / Lt</label>
										<label align="left" style="font-size:16px;margin-left:30px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Design: Ex.......</label>
									</div>
								</div>
							</div>

							<div id="info2">
            					<div class="row" style="border-top:;page-break-before:always;">
            						<div class="row">
										<label align="left" style="font-size:16px;margin-left:30px;">Name of applicant:</label>
										<label align="left" style="font-size:16px;margin-left:30px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;S/o Sh / Lt</label>
										<label align="left" style="font-size:16px;margin-left:30px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Design: Ex.......</label>
									</div>
									<div class="row">
										<label align="left" style="font-size:16px;margin-left:30px;">Place of working:</label>
									</div>
									<div class="row text-center">
										<label style="font-size:16px;margin-left:30px;">-4-</label>
									</div>
								</div>
							</div>
							<table border="1" style="width: 85%;">
								<?php 
								dbcon1();
									$sql=mysql_query("SELECT * from service_particulars where ex_emp_pfno='".$_GET['ex_emp_pfno']."' ");
										$res=mysql_fetch_array($sql);
								?>
															<tr>
																<td style="width: 30px;">6</td>
																<td style="width: 323px;">Whether employed else were including in railways as CL/Sub & reasons for leaving the job(with particulars of employment viz. post held since when and monthly emoluments.)</td>
																<td><?php echo $res['cl_sub_n_reason'];?></td>
															</tr>
															<tr>
																<td>7</td>
																<td>Whether eligible for the post of Gr. C or D based on educational qualification?</td>
																<td><?php echo $res['eligible_group'];?></td>
															</tr>
															<tr>
																<td>8</td>
																<td>Date of receipt of application (for compassionate appointment and form whom Encl copy)</td>
																<td><?php echo $res['date_of_receipt_appl'];?></td>
															</tr>
															<tr>
																<td>9</td>
																<td>Whether the window has remarried or otherwise (encl declaration of the window)</td>
																<td><?php echo $res['widow_remarried'];?></td>
															</tr>
															<tr>
																<td>10</td>
																<td>Whether the window has applied for appointment for herself or forward with in the time limit of 5 years from the date of death of deceased employee.</td>
																<td><?php echo $res['widow_applied_apptmt'];?></td>
															</tr>
															<tr>
																<td>11</td>
																<td>Reason why she could not apply for appointment for herself or forward within five years.</td>
																<td><?php echo $res['not_apply_for_apptmt'];?></td>
															</tr>
															<tr>
																<td>12</td>
																<td>In the case the ward is minor at the time of death of the deceased, whether the window has applied within 2 years from the date of the candidate attained majority.</td>
																<td><?php echo $res['minor_at_time_death'];?></td>
															</tr>
															<tr>
																<td>13</td>
																<td>Detail remarks as on the circumstances of the case warranting relaxation of time limit of 5 to 20 years.</td>
																<td><?php echo $res['warranting_time_limit'];?></td>
															</tr>
															<tr>
																<td>14</td>
																<td>Whether relaxation in the age is required, if so to what extant (while seeking age relaxation the provision of age limit for SC / ST candidates has to be observed).</td>
																<td><?php echo $res['relaxation_age_req'];?></td>
															</tr>
															<tr>
																<td>15</td>
																<td>Date on which proforma filled and report submitted</td>
																<td><?php echo $res['date_filled_n_report_submitted'];?></td>
															</tr>
															<tr>
																<td>16</td>
																<td>Special or any other particulars considered relevant in the case:</td>
																<td><?php echo $res['other_particulars_considered'];?></td>
															</tr>
							</table>
							<div class="row" >
								<label align="right" style="font-size:12px;margin-left:80%;margin-top:25px;"><b>Cont 5</b></label>	
							</div>
							<div id="info2">
            					<div class="row" style="border-top:;page-break-before:always;">
            						<div class="row">
										<label align="left" style="font-size:16px;margin-left:30px;">Name of applicant:</label>
										<label align="left" style="font-size:16px;margin-left:30px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;S/o Sh / Lt</label>
										<label align="left" style="font-size:16px;margin-left:30px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Design: Ex.......</label>
									</div>
									<div class="row">
										<label align="left" style="font-size:16px;margin-left:30px;">Place of working:</label>
									</div>
									<div class="row text-center">
										<label style="font-size:16px;margin-left:30px;">-5-</label>
									</div>
								</div>
								<div class="row">
										<label align="left" style="font-size:16px;margin-left:20px;">Staff & Welfare Inspector should certify below in his / her own handwriting that the above information has been vertified from records / spot enquiry and are correct and no appointment to any ward of the deceased  / crippled / medically unfit / incapacitated / medically decategorised employee (Mention the name of the ex employee ) has been given.</label>
									</div><br><br>
									<div class="row">
										<label align="left" style="font-size:16px;margin-left:20px;margin-top:180px;">Submitted for needful action in the matter.</label>
									</div><br>
									<div class="row">
										<label align="left" style="font-size:16px;margin-left:20px;">Note: Information against any column / item is not applicable should be indicated clearly as 'NOT APPLICABLE' and not merely putting dash (-).</label>
									</div><br><br>
									<div class="row" >
										<label align="right" style="font-size:14px;margin-left:60%;margin-top:35px;">Signature of Staff & Welfare Inspector</label>
									</div>
									<div class="row">
										<label align="left" style="font-size:16px;margin-left:60%;margin-top:35px;">Name:</label><br><br>
										<label align="left" style="font-size:16px;margin-left:60%;margin-top:25px;">Date:</label>
									</div>
							</div>








									</div>
									
									<div class="tab-pane" id="tab_15_3">
										<p>
											 Verified Documents
										</p>
										<div class="row">
											<div class="col-md-6">
														<div class="form-group">
															
															<?php 
															dbcon1();
																$query_emp = "SELECT * from verified_docmts where ex_emp_pfno='".$_GET['ex_emp_pfno']."'";
																$result_emp = mysql_query($query_emp);
																$sr=0;
																while($value_emp = mysql_fetch_array($result_emp))
																{
																	$sr++;
																	echo "$sr)<a href='../verified_documts/".$value_emp['file_path']."' target='_blank'>".$value_emp['file_path']."</a><br><br>";
								
																}
															?>
														</div>
													</div>
											
										</div>
										<hr>
										<p>
											 Applicant Documents
										</p>
										<div class="row">
											<div class="col-md-6">
														<div class="form-group">
															
																<?php 
																dbcon1();
																$query_emp = "SELECT * from upload_doc where ex_emp_pfno='".$_GET['ex_emp_pfno']."'";
																$result_emp = mysql_query($query_emp);
																$sr=0;
																while($value_emp = mysql_fetch_array($result_emp))
																{
																	$sr++;
																	echo $sr.")<a href='../uploadFiles/".$_GET['ex_emp_pfno']."/".$value_emp['file_path']."' target='_blank'>".$value_emp['file_path']."</a><br><br>";
																	//echo"<input type='file'  class='form-control' id='file_$sr' name='file_$sr' >";
													
																}

															?>
															<input type="hidden" name="sr" value="<?php echo $sr;?>">
														</div>
													</div>
											
										</div>
										
									</div>
								</div>
							</div>
							
							<div class="form-actions right">
												<!-- <button type="submit" class="btn blue submit_btn" id='submit_btn' name='button'>Submit </button> -->
												<a class='btn blue btnn' data-toggle='modal' href='#basic'>Forward To </a>
												&nbsp;
												<button onclick="print_button()" class="btn green btnhide">Print</button>
												<button type="button" class="btn default" onclick="history.go(-1);">Cancel</button>
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

<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="control/adminProcess.php?action=pending_fw_application" method="post">
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
										<option value="" selected disabled>Select Recruitment cell clerk</option>
										  <?php
											 dbcon2();
											 dbcon1();
											 $query_emp =mysql_query("SELECT prmaemp.empname as name,login.pf_number as pf_number,login.* from drmpsurh_cga.login,drmpsurh_sur_railway.prmaemp where prmaemp.empno=login.pf_number AND role='7'  ");
											 					
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
        
     $('#fam_mem_dob_1').datepicker({
     	format:'dd/mm/yyyy',
      autoclose: true
    });
     $('#appl_dob').datepicker({
     	format:'dd/mm/yyyy',
      autoclose: true
    });

 }); 

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
</script>