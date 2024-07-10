<?php
	$GLOBALS['flag']="1.9";
	include('common/header.php');
	include('common/sidebar.php');

	dbcon1();
	dbcon2();
	$sqll=mysql_query("SELECT applicant_name,designation,station from drmpsurh_cga.applicant_registration,drmpsurh_sur_railway.register_user where register_user.emp_no=applicant_registration.ex_emp_pfno and ex_emp_pfno='".$_GET['ex_emp_pfno']."' ");
	$ser=mysql_fetch_array($sqll);

	$name=$ser['applicant_name'];
	$desig=designation($ser['designation']);
	$staion=$ser['station'];
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

  .brder_top{
  	border-top: 1px solid #CCC ; 
  }




.tab-content{
  	border-top: none ;
  }

</style>
			
	<div class="page-content-wrapper">
		<div class="page-content">

		
			<div class="portlet box blue btnz">
						<div class="portlet-title">
							<div class="caption btnboom">
											<i class="fa fa-book"></i> Application Form 
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
									<li>
										<a href="#tab_15_4" data-toggle="tab">
										note </a>
									</li>
									
								</ul>
								<div class="tab-content brder_top">
									<div class="tab-pane active h" id="tab_15_1">
									
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
																$sql=mysql_query("SELECT * from drmpsurh_sur_railway.register_user where emp_no='".$_GET['ex_emp_pfno']."' ");
         														$res=mysql_fetch_array($sql);
         														dbcon1();	
         														$sql1=mysql_query("SELECT * from service_particulars where ex_emp_pfno='".$_GET['ex_emp_pfno']."' ");
         														$res1=mysql_fetch_array($sql1);
															?>
															<tr>
																<td style="width: 30px;">1</td>
																<td style="width: 323px;">Name of the Employee</td>
																<td>:<?php echo $res['name']; ?></td>
															</tr>
																<tr>
																<td>2</td>
																<td>Whether belongs to SC/ST/OBC</td>
																<td>:<?php //echo $res['']; ?></td>
															</tr>
															<tr>
																<td>3</td>
																<td>Design & place of last working</td>
																<td>:<?php echo designation($res['designation'])." &  (".$res['station'].")"; ?></td>
															</tr>
																<tr>
																<td>4</td>
																<td>Scale & rate of pay</td>
																<td>:<?php  //echo "(".getScaleCode($res['scalecode']).") & "; echo $res['basic_pay'];
																echo $res['basic_pay'];  ?></td>
															</tr>
																<tr>
																<td>5</td>
																<td>Date of Birth</td>
																<td>:<?php echo $res['dob']; ?></td>
															</tr>
																<tr>
																<td>6</td>
																<td>Date of Appointment<br>(Note:copy of the service certificate has to be enclosed in support of the information against item 1 to 6 )</td>
																<td>:<?php echo $res['doa']; ?></td>
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
            						
										
										<div class="col-md-12">
											<p >Name of applicant: <?php echo $name ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;S/o Sh/Lt&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Design: <?php echo $desig; ?></p>
											<p >Place of Working: <?php echo $staion; ?> </p>
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
            						<div class="col-md-12">
											<p >Name of applicant: <?php echo $name ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;S/o Sh/Lt&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Design: <?php echo $desig; ?></p>
											<p >Place of Working: <?php echo $staion; ?> </p>
											<!-- <p class="text-center"></p>
											<p style="float: right;"></p> -->
											
										</div>
									<div class="row text-center">
										<label style="font-size:16px;margin-left:30px;">-3-</label>
									</div>
									<div class="row">
										<label align="left" style="font-size:16px;margin-left:20px;">21.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Present financial status of the family indicating land, immovable and movable property with details if any. Details of other source of income, location and place. Staff & Welfare Inspector should certify in his own handwriting whether the case deserves compassionate or otherwise:<br><br></label>
										<div class="col-md-12" style="margin-left: 30px">
											<p><?php echo $res['twenty_one']; ?></p>
										</div>
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
            						<div class="col-md-12">
											<p >Name of applicant: <?php echo $name ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;S/o Sh/Lt&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Design: <?php echo $desig; ?></p>
											<p >Place of Working: <?php echo $staion; ?> </p>
											<!-- <p class="text-center"></p>
											<p style="float: right;"></p> -->
											
										</div>
									<div class="row text-center">
										<label style="font-size:16px;margin-left:30px;">-4-</label>
									</div>
								</div>
							</div>
							<table border="1" style="width: 85%;">
								<?php 
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
            						<div class="col-md-12">
											<p >Name of applicant: <?php echo $name ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;S/o Sh/Lt&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Design: <?php echo $desig; ?></p>
											<p >Place of Working: <?php echo $staion; ?> </p>
											<!-- <p class="text-center"></p>
											<p style="float: right;"></p> -->
											
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
																$query_emp = "SELECT * from verified_docmts where ex_emp_pfno='".$_GET['ex_emp_pfno']."'";
																$result_emp = mysql_query($query_emp);
																$sr=0;
																while($value_emp = mysql_fetch_array($result_emp))
																{
																	$sr++;
																	echo "$sr)<a href='../verified_documts/".$_GET['ex_emp_pfno']."/".$value_emp['file_path']."' target='_blank'>".$value_emp['file_path']."</a><br><br>";
								
																}
															?>
														</div>
													</div>
											
										</div>
										
									</div>
									<div class="tab-pane" id="tab_15_4">
										<?php 
										if($_GET['case']==2)
										{
										?>	
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
														
														<!-- <div class="col-xs-3" style="width: 120px;">
															<span style="margin-left: 60px">Sub.</span> 
														</div>
														<div class="col-md-8">
															<p style="float: left;"><?php echo $res['subject'];?></p>
														</div> -->
														<label style="margin-left: 80px;">Sub.&nbsp;&nbsp;&nbsp;<?php echo $res['subject'];?></label>

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
															dbcon2();
																//$sql=mysql_query("SELECT str_to_date(doa,'%d/%m/%Y')as rlyjoindate1,str_to_date(retirementdate,'%d/%m/%Y')as retirementdate1,str_to_date(date_of_missing,'%d/%m/%Y')as date_of_missing1,register_user.*  from register_user where emp_no='".$_GET['ex_emp_pfno']."' ");
																$sql=mysql_query("SELECT str_to_date(doa,'%d/%m/%Y')as rlyjoindate1,str_to_date(date_of_missing,'%d/%m/%Y')as date_of_missing1,str_to_date(retirementdate,'%d/%m/%Y')as retirementdate1,register_user.*  from register_user where emp_no='".$_GET['ex_emp_pfno']."' ");
         														$res=mysql_fetch_array($sql);
															?>
															<tr>
																<td style="width: 30px;">1</td>
																<td style="width: 323px;">Name of the Employee</td>
																<td><?php echo $res['name']; ?></td>
															</tr>
																<tr>
																<td>2</td>
																<td>Designation and Station</td>
																<td><?php echo designation($res['designation'])."  (".$res['station'].")"; ?></td>
															</tr>
																
																<tr>
																<td>3</td>
																<td>Date of Birth</td>
																<td><?php echo $res['dob']; ?></td>
															</tr>
																<tr>
																<td>4</td>
																<td>Date of Appointment</td>
																<td><?php echo $res['doa']; ?></td>
															</tr>
																<tr>
																<td>5</td>
																<td>Date of Missing</td>
																<td><?php echo $res['date_of_missing']; ?></td>
															</tr>
															<tr>
																<td>6</td>
																<td>PF Number</td>
																<td><?php echo $res['emp_no']; ?></td>
															</tr>
															<tr>
																<td>7</td>
																<td>Rate of Pay</td>
																<td><?php echo $res['basic_pay']."/-"; ?></td>
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
															dbcon1();
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

												
												
							<!--    2nd page code------------------------------------------ -->
												<br>
												<div class="row" style="page-break-before:always;">
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
															dbcon1();
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
															dbcon1();
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
													dbcon1();
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
												
									<!--    3nd page code------------------------------------------ -->
													<?php
														$sql=mysql_query("SELECT * from common_heading_details where ex_emp_pfno='".$_GET['ex_emp_pfno']."'");
														$res=mysql_fetch_array($sql);

													 ?>
													 <div class="print3" style="display: none;">
												<div class="row" style="page-break-before: always;">
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

										<?php 
										}
										else if($_GET['case']==1){	
										?>

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
															<label>P/ S A Cell Dtd:-<?php echo $res['date'];?></label>
														</div>
													</div>
													<br>
													<div class="row">
														
														<div class="text-center">
															<label><b>-Priority-III</b></label>
														</div>
														
													</div>
													<div class="row">
														
														<!-- <div class="col-xs-3" style="width: 120px;">
															<span style="margin-left: 60px">Sub.</span> 
														</div>
														<div class="col-md-8">
															<p style="float: left;"><?php echo $res['subject'];?></p>
														</div> -->
														<label style="margin-left: 80px;">Sub.&nbsp;&nbsp;&nbsp;<?php echo $res['subject'];?></label>	
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
															dbcon2();
																//$sql=mysql_query("SELECT str_to_date(rlyjoindate,'%d/%m/%Y')as rlyjoindate1,str_to_date(retirementdate,'%d/%m/%Y')as retirementdate1,str_to_date(date_of_expiry,'%d/%m/%Y')as date_of_expiry1,prmaemp.* from prmaemp where empno='".$_GET['ex_emp_pfno']."' ");
																$sql=mysql_query("SELECT str_to_date(dob,'%d/%m/%Y')as rlyjoindate1,str_to_date(date_of_expiry,'%d/%m/%Y')as date_of_expiry1,str_to_date(retirementdate,'%d/%m/%Y')as retirementdate1,register_user.* from register_user where emp_no='".$_GET['ex_emp_pfno']."' ");
         														$res=mysql_fetch_array($sql);
         														
															?>
															<tr>
																<td style="width: 30px;">1</td>
																<td style="width: 323px;">Name of the Employee</td>
																<td><?php echo $res['name']; ?></td>
															</tr>
																<tr>
																<td>2</td>
																<td>Designation and Station</td>
																<td><?php echo designation($res['designation'])."  (".$res['station'].")"; ?></td>
															</tr>
																
																<tr>
																<td>3</td>
																<td>Date of Birth</td>
																<td><?php echo $res['dob']; ?></td>
															</tr>
																<tr>
																<td>4</td>
																<td>Date of Appointment</td>
																<td><?php echo $res['doa']; ?></td>
															</tr>
																<tr>
																<td>5</td>
																<td>Date of Expiry</td>
																<td><?php echo $res['date_of_expiry']; ?></td>
															</tr>
															<tr>
																<td>6</td>
																<td>PF Number</td>
																<td><?php echo $res['emp_no'];  ?></td>
															</tr>
															<tr>
																<td>7</td>
																<td>Rate of pay</td>
																<td><?php echo $res['basic_pay']."/-";  //echo "(".getScaleCode($res['scalecode']).")"; ?></td>
															</tr>
															<tr>
																<td>8</td>
																<td>Service Rendered</td>
																<td><?php 

														$datetime1 = new DateTime($res['rlyjoindate1']);
														$datetime2 = new DateTime($res['date_of_expiry1']);
														
														$interval = $datetime1->diff($datetime2);
														$calcu = $interval->format('Y--- %y M--- %m D--- %d');

																echo $calcu;

																 ?></td>
															</tr>
															<tr>
																<td>9</td>
																<td>Service Left</td>
																<td><?php

														$datetime1 = new DateTime($res['retirementdate1']);
														$datetime2 = new DateTime($res['date_of_expiry1']);
														$interval = $datetime1->diff($datetime2);
														$calcu = $interval->format('Y--- %y M--- %m D--- %d');

																echo $calcu;
																 ?></td>
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
															dbcon1();
														$sql=mysql_query("SELECT str_to_date(applicant_dob,'%d/%m/%Y')as dob,str_to_date(created_at,'%d-%m-%Y')as cre,applicant_registration.* from applicant_registration where ex_emp_pfno='".$_GET['ex_emp_pfno']."' ");
														$result=mysql_fetch_array($sql);
														$a_date=substr($result['created_at'],0,10);

															//echo $result['dob'];
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
															<!-- <tr >
																<td style="width: 30px;">1</td>
																<td style="width: 323px;">Date of Application</td>
																<td><?php echo $a_date;?></td>
															</tr> -->
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
												<div class="row" style="page-break-before: always;">
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
															dbcon1();
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
															dbcon1();
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
													dbcon1();
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
														<p>&nbsp;&nbsp;&nbsp; <?php echo $res['last_common']; ?></p>
													</div>
													<div class="col-md-4">
														<p class="">Submitted for approval please.</p>
														
													</div>
												</div>
												
												<br>
																									
													<div class="" style="float: right;">
														<p style="margin-right: 124px;">OS(P)/S A Cell</p>
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
													<b>DPO(CO)</b>
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

										<?php
									}
									elseif ($_GET['case']==3) 
									{
									?>

									<div class="form-body ">
												
													<div class="row">
														
														<div class="text-center">
															NP1
														</div>
													</div>
													<?php
													dbcon1();
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
														
														<!-- <div class="col-xs-3" style="width: 120px;">
															<span style="margin-left: 60px">Sub.</span> 
														</div>
														<div class="col-md-8">
															<p style="float: left;"><?php echo $res['subject'];?></p>
														</div> -->
														<label style="margin-left: 80px;">Sub.&nbsp;&nbsp;&nbsp;<?php echo $res['subject'];?></label>
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
															dbcon2();
																$sql=mysql_query("select * from register_user where emp_no='".$_GET['ex_emp_pfno']."' ");
         														$res=mysql_fetch_array($sql);
															?>
															<tr>
																<td style="width: 30px;">1</td>
																<td style="width: 323px;">Name of the Employee</td>
																<td><?php echo $res['name']; ?></td>
															</tr>
																<tr>
																<td>2</td>
																<td>Designation and Station</td>
																<td><?php echo designation($res['designation'])."  (".$res['station'].")"; ?></td>
															</tr>
																<tr>
																<td>3</td>
																<td>Scale & Basic pay</td>
																<td><?php echo $res['basic_pay'];   ?></td>
															</tr>
																<tr>
																<td>4</td>
																<td>Date of Birth</td>
																<td><?php echo $res['dob']; ?></td>
															</tr>
																<tr>
																<td>5</td>
																<td>Date of Appointment</td>
																<td><?php echo $res['doa']; ?></td>
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
															dbcon1(); 
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
																 $sql=mysql_query("SELECT eligible_group from service_particulars where ex_emp_pfno='".$_GET['ex_emp_pfno']."'");
																$r=mysql_fetch_array($sql);
																  ?>
																  <td><?php echo $r['eligible_group']; ?></td>
																
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
													dbcon1();
														$sql=mysql_query("SELECT * from common_heading_details where ex_emp_pfno='".$_GET['ex_emp_pfno']."'");
														$res=mysql_fetch_array($sql);

														$sql1=mysql_query("SELECT * from medicalcase_form where ex_emp_pfno='".$_GET['ex_emp_pfno']."'");
														$res1=mysql_fetch_array($sql1);

													 ?>
												<div class="row" style="page-break-before: always;">
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
														a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>i)&nbsp;Reward granted - <?php echo $res1['a_i']; ?>.</span><br>
														<p style="margin-left: 30px">ii) Penalties imposed- <?php echo $res1['a_ii']; ?>.</p>
														<p style="margin-left: 30px">iii).Working report/APAR &nbsp;&nbsp;&nbsp;      <b>-<?php echo $res1['a_iii']; ?>.</b></p>
														</div>
													</div>
													<div class="row">
														<div class="col-md-9">
															<span>b)&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $res1['b']; ?>. </span>
															
														</div>
														
													</div>

													<div class="row">
														<div class="col-md-9">
															<span>c)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $res1['c']; ?> <b>P: 06-10.</b> </span>
															
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
														<span>VII. &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $res1['vii']; ?> </span>	
													</div>
												</div>
												<br>
												<div class="row">

												<div class="col-md-12">
													
													<p><?php echo $res1['last_common_details']; ?></p>
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
													dbcon1();
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


									<?php	
									}
									else if($_GET['case']==4)
									{
									?>

									<div class="form-body ">
												
													<div class="row">
														
														<div class="text-center">
															<b>//Office-Note//</b>
														</div>
													</div>
													<br>
													<?php
														dbcon1();
														$sql=mysql_query("SELECT * from common_heading_details where ex_emp_pfno='".$_GET['ex_emp_pfno']."'");
														$res=mysql_fetch_array($sql);

													 ?>
													<div class="row">
														<div class="col-md-6" style="float: left;">

															<label>No.<?php echo $res['number'];?></label>
														</div>
														<div class="col-md-6" style="float: right;text-align: right;">
															<label>P/ Rect Dtd:-<?php echo $res['date'];?></label>
														</div>
													</div>
													<br>
													<div class="row">
														
														<div class="text-center">
															<label><b>-Priority-III</b></label>
														</div>
														
													</div>
													<div class="row">
														
														<!-- <div class="col-xs-3" style="width: 120px;">
															<span style="margin-left: 60px">Sub.</span> 
														</div>
														<div class="col-md-8">
															<p style="float: left;"><?php echo $res['subject'];?></p>
														</div> -->
														<label style="margin-left: 80px;">Sub.&nbsp;&nbsp;&nbsp;<?php echo $res['subject'];?></label>
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
																dbcon2();
																//$sql=mysql_query("SELECT str_to_date(doa,'%d/%m/%Y')as rlyjoindate1,str_to_date(date_of_med_decat,'%d/%m/%Y')as date_of_med_decat1,str_to_date(date_of_retd,'%d/%m/%Y')as date_of_retd1,str_to_date(retirementdate,'%d/%m/%Y')as retirementdate1,prmaemp.* from prmaemp where empno='".$_GET['ex_emp_pfno']."' ");
																$sql=mysql_query("SELECT str_to_date(doa,'%d/%m/%Y')as rlyjoindate1,str_to_date(date_of_med_decat,'%d/%m/%Y')as date_of_med_decat1,str_to_date(date_of_retd,'%d/%m/%Y')as date_of_retd1,str_to_date(retirementdate,'%d/%m/%Y')as retirementdate1,register_user.* from register_user where emp_no='".$_GET['ex_emp_pfno']."' ");
         														$res=mysql_fetch_array($sql);

																$date1 = strtotime($res['rlyjoindate1']);  
																$date2 = strtotime($res['date_of_med_decat1']);  

																// Formulate the Difference between two dates 
																$diff = abs($date2 - $date1);   
																$years = floor($diff / (365*60*60*24));   
																$months = floor(($diff - $years * 365*60*60*24) 
																/ (30*60*60*24));  
																$days = floor(($diff - $years * 365*60*60*24 -  
																$months*30*60*60*24)/ (60*60*24));
																//printf("Y--- %d ,M--- %d , D--- %d", $years, $months,$days);
															?>
															<tr>
																<td style="width: 30px;">1</td>
																<td style="width: 323px;">Name of the Employee</td>
																<td><?php echo $res['name']; ?></td>
															</tr>
																<tr>
																<td>2</td>
																<td>Designation and Station</td>
																<td><?php echo designation($res['designation'])."  (".$res['station'].")"; ?></td>
															</tr>
																
																<tr>
																<td>3</td>
																<td>Date of Birth</td>
																<td><?php echo $res['dob']; ?></td>
															</tr>
																<tr>
																<td>4</td>
																<td>Date of Appointment</td>
																<td><?php echo $res['doa']; ?></td>
															</tr>
																<tr>
																<td>5</td>
																<td>Date of Med Decat & Retd</td>
																<td><?php echo $res['date_of_med_decat']."&nbsp;&nbsp;&nbsp; Retd ".$res['date_of_retd']; ?></td>
															</tr>
															<tr>
																<td>7</td>
																<td>PF Number</td>
																<td><?php echo $res['emp_no']; ?></td>
															</tr>
															<tr>
																<td>8</td>
																<td>Rate of pay</td>
																<td><?php echo $res['basic_pay']."/-";   ?></td>
															</tr>
															<tr>
																<td>7</td>
																<td>Service Rendered</td>
																<td><?php


														$datetime1 = new DateTime($res['rlyjoindate1']);
														$datetime2 = new DateTime($res['date_of_med_decat1']);
														$interval = $datetime2->diff($datetime1);
														$calcu = $interval->format('Y--- %y M--- %m D--- %d');

																echo $calcu;

																 ?></td>
															</tr>
															<tr>
																<td>8</td>
																<td>Service Left</td>
																<td>
																	<?php

														$datetime1 = new DateTime($res['retirementdate1']);
														$datetime2 = new DateTime($res['date_of_retd1']);
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
															dbcon1();
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
															<!-- <tr >
																<td style="width: 30px;">1</td>
																<td style="width: 323px;">Date of Application</td>
																<td><?php echo $a_date;?></td>
															</tr> -->
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
												<div class="row" style="page-break-before: always;">
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
															dbcon1();
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
															dbcon1();
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
													dbcon1();
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
													<div class="col-md-12">
														<p>&nbsp;&nbsp;&nbsp; <?php echo $res['last_common']; ?></p>
													</div>
													<div class="col-md-4">
														<p class="">Submitted for approval please.</p>
														
													</div>
												</div>
												
												<br>
																									
													<div class="" style="float: right;">
														<p style="margin-right: 124px;">COS(P) Rect</p>
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
													<b>DPO(CO)</b>
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


									<?php
									}
									?>
									</div>
									</div>
								</div>
							</div>
							
							<div class="form-actions right">
												<!-- <button type="submit" class="btn blue submit_btn" id='submit_btn' name='button'>Submit </button> -->
														<?php
														dbcon1();
								$query_emp =mysql_query("SELECT * FROM `forward_application` where  ex_emp_pfno='".$_GET['ex_emp_pfno']."' and forward_to_pfno='".$_SESSION['pf_number']."' order by id desc limit 1 ");
								$result_emp = mysql_fetch_array($query_emp);
									if($result_emp['hold_status']==1 )
									{
										echo "<a class='btn blue btnn' data-toggle='modal' href='#basic'>Approve & Forward To </a>&nbsp;&nbsp;";
										echo "<a class='btn red btnn' data-toggle='modal' href='#reject'>Reject </a>";
									}
								?>
									
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
			<form action="control/adminProcess.php?action=fw_to_drm" method="post">
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
										<option value="" selected disabled>Select DRM Officer</option>
										  <?php
											 dbcon1();
											 dbcon2();
											 $query_emp =mysql_query("SELECT name as name,login.pf_number as pf_number,login.* from drmpsurh_cga.login,drmpsurh_sur_railway.register_user where register_user.emp_no=login.pf_number AND role='2' ");
											 					
											 while($value_emp = mysql_fetch_array($query_emp))
											 {
											  	echo "<option value='".$value_emp['pf_number']."'>".$value_emp['name']."</option>";
											 }
										  ?>
									</select>
							</div>
						</div>
					</div>
					<div class="row">
					 	<div class="col-md-12">
							<div class="form-group">
								<label>Reason</label>
									<textarea class="form-control" name="remark" rows="4"></textarea>
							</div>
						</div>
					 </div>
					<div class="row">
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



<div class="modal fade" id="reject" tabindex="-1" role="reject" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="control/adminProcess.php?action=reject" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Reject Application </h4>
				</div>
				<div class="modal-body">
					 <input type="hidden" id="ex_emp_pfno" name="ex_emp_pfno" value="<?php echo $_GET['ex_emp_pfno']; ?>" >
					 <input type="hidden" id="username" name="username" value="<?php echo $_GET['username']; ?>">
					 <input type="hidden" id="fw_tbl_id" name="fw_tbl_id" value="<?php echo $_GET['id']; ?>">
					 <div class="row">
						<div class="col-md-6">
							<div class="form-group">
								
									<select name="fw_to_pfno" id="fw_to_pfno" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
										<option value="" selected disabled>Select Recruitment Clerk Cell</option>
										  <?php
											 dbcon1();
											 dbcon2();
											 $query_emp =mysql_query("SELECT name as name,login.pf_number as pf_number,login.* from drmpsurh_cga.login,drmpsurh_sur_railway.register_user where register_user.emp_no=login.pf_number AND role='7' ");
											 					
											 while($value_emp = mysql_fetch_array($query_emp))
											 {
											  	echo "<option value='".$value_emp['pf_number']."'>".$value_emp['name']."</option>";
											 }
										  ?>
									</select>
							</div>
						</div>
					</div>
					 <div class="row">
					 	<div class="col-md-12">
							<div class="form-group">
								<label>Reason</label>
									<textarea class="form-control" name="remark" rows="4"></textarea>
							</div>
						</div>
					 </div>
					 
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								
								<button type="submit" class="btn blue">Submit</button>
									
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
      $(".brder_top").css("border-top", "0");
      window.print();
     
      
	 window.location.reload();
   }
</script>	