<?php
	$GLOBALS['flag']="1.9";
	include('common/header.php');
	include('common/sidebar.php');
?>
			
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-book"></i> Pending Application Form 
					</div>
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<form action="control/adminProcess.php?action=upDate_service_particulars" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
						 <input type="hidden" id="curDate1" value="<?php echo date('d/m/Y'); ?>">
						 <input type="hidden" id="pid" name="pid" value="<?php echo $_GET['id']; ?>">
						 <input type="hidden" id="p_emp_pfno" name="p_emp_pfno" value="<?php echo $_GET['ex_emp_pfno']; ?>">
						 <!-- <input type="hidden" id="p_username" name="p_username" value="<?php //echo $_GET['username']; ?>"> -->
						 <input type="hidden" id="case" name="case" value="<?php echo $_GET['case']; ?>">

						<div class="form-body">
							<!-- <h3 class="form-section">Add User</h3> -->
							<div class="row">
								<div style="margin-left: 25px" class="table-responsive">
													<table  class="table table-bordered table-striped" style="width: 85%;">
														<tbody>
															<?php 
																dbcon2();
																$sql=mysql_query("SELECT * from resgister_user where emp_no='".$_GET['ex_emp_pfno']."' ");
         														$res=mysql_fetch_array($sql);
         														dbcon1();
         														$sql1=mysql_query("SELECT * from service_particulars where ex_emp_pfno='".$_GET['ex_emp_pfno']."' ");
         														$res1=mysql_fetch_array($sql1);
															?>
															<tr>
																<td style="width: 30px;">1</td>
																<td style="width: 323px;">Name of the Employee</td>
																<td><?php echo $res['name']; ?></td>
															</tr>
																<tr>
																<td>2</td>
																<td>Whether belongs to SC/ST/OBC</td>
																<td><?php //echo $res['community']; ?></td>
															</tr>
															<tr>
																<td>3</td>
																<td>Design & place of last working</td>
																<td><?php echo designation($res['designation'])." &  (".$res['station'].")"; ?></td>
															</tr>
																<tr>
																<td>4</td>
																<td>Scale & rate of pay</td>
																<td><?php   echo $res['basic_pay'];  ?></td>
															</tr>
																<tr>
																<td>5</td>
																<td>Date of Birth</td>
																<td><?php echo $res['dob']; ?></td>
															</tr>
																<tr>
																<td>6</td>
																<td>Date of Appointment<br>(Note:copy of the service certificate has to be enclosed in support of the information against item 1 to 6 )</td>
																<td><?php echo $res['doa']; ?></td>
															</tr>
																<tr>
																<td>7</td>
																<td>Date of death/medical decategorised /medically unfit/missing</td>
																<td>
																	<?php
																	dbcon1();
																		$sql=mysql_query("SELECT * from category where id='".$_GET['case']."'");
																		$res11=mysql_fetch_array($sql);
																		if($res11['id']==1)
																		{
																			echo '<input type="text" class="form-control appl_dob f_date" id="" name="expiry_date" value="'.$res['date_of_expiry'].'">';

																		}
																		elseif ($res11['id']==2) 
																		{
																			echo '<input type="text" class="form-control appl_dob f_date" id="" name="missing_date" value="'.$res['date_of_missing'].'">';
																			
																		}
																		elseif ($res11['id']==3) 
																		{
																			echo '<input type="text" class="form-control appl_dob f_date" id="" name="date_of_md" value="'.$res['date_of_md'].'">';
																			echo '<input type="text" class="form-control appl_dob f_date" id="" name="date_of_vr" value="'.$res['date_of_vr'].'">';
																		}
																		elseif ($res11['id']==4) 
																		{
																			echo '<input type="text" class="form-control appl_dob f_date" id="" name="txtdomd" value="'.$res['date_of_med_decat'].'">';
																			echo '<input type="text" class="form-control f_date appl_dob" id="" name="txtdor" value="'.$res['date_of_retd'].'">';
																		}
																	?>
																	
															</tr>									
															<tr>
																<td>8</td>
																<td>Whether death is due to accident on duty, if so, particulars of compensation paid.</td>
																<td><input type="text" class="form-control" name="due_to_accident" value="<?php echo $res1['death_is_dueto_accident_on_duty'];?>"></td>
																
															</tr>									
															<tr>
																<td>9</td>
																<td>Priority no. under which the case falls</td>
																<td><input type="text" name="priority_no" class="form-control " value="<?php echo $res1['priority_no'];?>"></td>
															</tr>
															<tr>
																<td>10</td>
																<td>Cause of death /reason for medical unfitness /decategorisation</td>
																<td><input type="text" name="cause_death/medical" class="form-control" value="<?php echo $res1['cause_of_death/reason'];?>"></td>
															</tr>
															<tr>
																<td>11</td>
																<td>The period of sickness in case of medical unfit / decategorisation</td>
																<td><input type="text" name="period_sickness" class="form-control" value="<?php echo $res1['period_sickness'];?>"></td>
															</tr>
															<tr>
																<td>12</td>
																<td>Total service</td>
																<td><input type="text" name="total_service" class="form-control" value="<?php echo $res1['total_service'];?>"></td>
															</tr>
															<tr>
																<td>13</td>
																<td>Date on which the alternative job offered (furnish Design/deptt & scale of the alternative post enclose copy of the alternative appointment).</td>
																<td><textarea name="alt_job_offered" class="form-control" rows="2" ><?php echo $res1['alter_job_offered'];?></textarea></td>
															</tr>
															<tr>
																<td>14</td>
																<td>Whether alternative appointment on same emolument offered or otherwise</td>
																<td><textarea name="apptmt_emolumt" class="form-control" rows="2"><?php echo $res1['alter_apptmt_emolumt_offered'];?></textarea></td>
															</tr>
															<tr>
																<td rowspan="6">15</td>
																<td >Emoluments the employee has been drawing before decategorisation & BP also the post offered on alternative appointment.</td>
																<td ><p style="text-align: center;width: 50%;float: left;">Before</p> <p style="text-align: center;width: 50%;float: right;">After</p></td>
															</tr>
															<tr >
																<td>BP</td>
																<td ><input type="text" class="form-control" style="width: 47%;float: left;margin-right: 10px;" name="before_bp" value="<?php echo $res1['before_bp'];?>"> <input type="text" style="width: 48%;" class="form-control" name="after_bp" value="<?php echo $res1['after_bp'];?>"></td>
																<!-- <td></td> -->
															</tr>
															<tr>
																<td>DA</td>
																<td><input type="text" style="width: 47%;float: left;margin-right: 10px;" class="form-control" name="before_da" value="<?php echo $res1['before_da'];?>"><input type="text" class="form-control" style="width: 48%;" name="after_da" value="<?php echo $res1['after_da'];?>"></td>
																<!-- <td></td> -->
															</tr>
															<tr>
																<td>HRA</td>
																<td><input type="text" style="width: 47%;float: left;margin-right: 10px;" class="form-control" name="before_hra" value="<?php echo $res1['before_hra'];?>"><input type="text" style="width: 48%;" class="form-control" name="after_hra" value="<?php echo $res1['after_hra'];?>"></td>
																<!-- <td></td> -->
															</tr>
															<tr>
																<td>CCA</td>
																<td><input type="text" style="width: 47%;float: left;margin-right: 10px;" class="form-control" name="before_cca" value="<?php echo $res1['before_cca'];?>"><input type="text" style="width: 48%;" class="form-control" name="after_cca" value="<?php echo $res1['after_cca'];?>"></td>
																<!-- <td></td> -->
															</tr>
															<tr>
																<td>OTHERS</td>
																<td><input type="text" style="width: 47%;float: left;margin-right: 10px;" class="form-control" name="before_others" value="<?php echo $res1['before_others'];?>"><input type="text" style="width: 48%;" class="form-control" name="after_others" value="<?php echo $res1['after_others'];?>"></td>
																<!-- <td></td> -->
															</tr>
															
															<tr>
																<td>16</td>
																<td>Is there drop in emolument ,percentage of drop on alternative appointment.</td>
																<td><textarea class="form-control" name="drop_in_emlmt"><?php echo $res1['drop_in_emolumt'];?></textarea></td>
															</tr>
															<tr>
																<td>17</td>
																<td>Reasons if any, for not accepting the altenative appointment (Encl copy of refusal)</td>
																<td><textarea class="form-control" name="not_accepting_alter"><?php echo $res1['not_accepting_alter_appmt'];?></textarea></td>
															</tr>
															<tr>
																<td>18</td>
																<td>Date on which the service terminated / compulsory retd. due to non_acceptance of alternative appt OR retired without waiting for alternative appt (Encl copy of office order)</td>
																<td><textarea class="form-control" name="service_terminated/compulsory_retd" rows="3"><?php echo $res1['service_trminated/compulsory_retd'];?></textarea></td>
															</tr>
															<tr>
																<td rowspan="8">19</td>
																<td>Settlement dues paid</td>
																<td></td>
															</tr>
															<?php 
															dbcon1();
																$qq=mysql_query("select * from wi_settlement where ex_emp_pfno='".$_GET['ex_emp_pfno']."' ");
         														$results=mysql_fetch_array($qq);
															?>
															<tr>
																<td>PF:</td>
																<td><input type="text" class="form-control" name="pf" value="<?php echo $results['pf'];?>"></td>
															</tr>
															<tr>
																<td>DCRG:</td>
																<td><input type="text" class="form-control" name="dcrg" value="<?php echo $results['dcrg'];?>"></td>
															</tr>
															<tr>
																<td>GIS:</td>
																<td><input type="text" class="form-control" name="gis" value="<?php echo $results['gis'];?>"></td>
															</tr>
															<tr>
																<td>IL:</td>
																<td><input type="text" class="form-control" name="il" value="<?php echo $results['il'];?>"></td>
															</tr>
															<tr>
																<td>LE:</td>
																<td><input type="text" class="form-control" name="le" value="<?php echo $results['le'];?>"></td>
															</tr>
															<tr>
																<td>Compensation in regard to WCA:</td>
																<td><input type="text" class="form-control" name="wca" value="<?php echo $results['wca'];?>"></td>
															</tr>
															<tr>
																<td>Others:</td>
																<td><input type="text" class="form-control" name="other" value="<?php echo $results['others'];?>"></td>
															</tr>
															<tr>
																<td>20</td>
																<td>Pension /family pension sanction with relief</td>
																<td><input type="text" class="form-control" name="family_pension" value="<?php echo $results['family_pension'];?>"></td>
															</tr>
															<tr>
																<td>1</td>
																<td>Whether employed else were including in railways as CL/Sub & reasons for leaving the job (with particulars of employment viz. post held since when and monthly emolument) </td>
																<td><textarea class="form-control" rows="3" name="cl/sub_reasons" ><?php echo $res1['cl_sub_n_reason'];?></textarea></td>
															</tr>
															<tr>
																<td>2</td>
																<td>Whether eligible for the post of Gr. C or D based on educational qualification? </td>
																<td><!-- <input type="text" class="form-control"  name="eligible_group"> -->
																	<select name="eligible_group" id="eligible_group" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
																
																<option value="<?php echo $res1['eligible_group']; ?>" selected><?php echo $res1['eligible_group']; ?></option>								
																<!-- <option value="Group A">Group A</option>								
																<option value="Group B">Group B</option> -->								
																<option value="Group C">Group C</option>								
																<option value="Group D">Group D</option>												
															</select>
																</td>
															</tr>
															<tr>
																<td>3</td>
																<td>Date of receipt of application (for compassionate appointment and from whom Encl copy)</td>
																<td><textarea class="form-control" rows="3" name="date_of_receipt"><?php echo $res1['date_of_receipt_appl'];?></textarea></td>
															</tr>
															<tr>
																<td>4</td>
																<td>Whether the widow has remarried or otherwise (encl declaration of the widow) </td>
																<td><textarea class="form-control" rows="3" name="widow_remarried"><?php echo $res1['widow_remarried'];?></textarea></td>
															</tr>
															<tr>
																<td>5</td>
																<td>Whether the widow has applied for appointment for herself or forward within the time limit of 5 years from the date of death of deceased employee. </td>
																<td><textarea class="form-control" rows="3" name="widow_applied_appmt"><?php echo $res1['widow_applied_apptmt'];?></textarea></td>
															</tr>
															<tr>
																<td>6</td>
																<td>Reason why she could not apply for appointment for herself or forward within five years. </td>
																<td><textarea class="form-control" rows="3" name="not_apply_appmt"><?php echo $res1['not_apply_for_apptmt'];?></textarea></td>
															</tr>
															<tr>
																<td>7</td>
																<td>In the case the ward is minor at the time of death of the deceased,whether the widow has applied within 2 years from the date of the candidate attained majority.  </td>
																<td><textarea class="form-control" rows="3" name="attained_majority"><?php echo $res1['minor_at_time_death'];?></textarea></td>
															</tr>
															<tr>
																<td>8</td>
																<td>Detail remarking as on the circumtances of the case warranting relaxation of time limit of 5 to 20 years. </td>
																<td><textarea class="form-control" rows="3" name="warranting_time_limit"><?php echo $res1['warranting_time_limit'];?></textarea></td>
															</tr>
															<tr>
																<td>9</td>
																<td>Whether relaxation in the age is required, if so to what extant (while seeking age relaxation the provision of age limit for SC/ST candidates has to be observed). </td>
																<td><textarea class="form-control" rows="3" name="relaxation_age_req"><?php echo $res1['relaxation_age_req'];?></textarea></td>
															</tr>
															<tr>
																<td>10</td>
																<td>Date on which proforma filled and report submitted  </td>
																<td><textarea class="form-control" rows="3" name="filled_n_report_submit"><?php echo $res1['date_filled_n_report_submitted'];?></textarea></td>
															</tr>
															<tr>
																<td>11</td>
																<td>Special or any other particulars considered relevant in the case: </td>
																<td><textarea class="form-control" rows="4" name="other_particulars"><?php echo $res1['other_particulars_considered'];?></textarea></td>
															</tr>

														</tbody>
													</table>
													</div>
													<div class="row">
														<div style="margin-left: 25px" class="table-responsive"	>
															<table class="table table-bordered table-striped" style="width: 85%;">
																<tr>
																	<th>Sr.NO.</th>
																	<th>File Name</th>
																	<th>Action</th>
																</tr>
																<tbody>
																	<?php
																	dbcon1();
																	$query=mysql_query("SELECT * from verified_docmts where ex_emp_pfno='".$_GET['ex_emp_pfno']."'");
																	$sr=0;
																		while($row=mysql_fetch_array($query)) 
																		{

																			$sr++;
																			echo "<tr>
																			<td>$sr</td>
																			<td><a href='../verified_documts/".$_GET['ex_emp_pfno']."/".$row['file_path']."' target='_blank'>".$row['file_path']."</a></td>
																			<td ><a data-id='".$row['id']."' class='btn blue btnn' data-toggle='modal' href='#basic'>Update Doc </a></td>
																			</tr>
																			";
																		}
																	?>
																</tbody>
															</table>
														</div>
														
													</div>

													<!-- <div class="row">
														<div class="col-md-6" style="margin-left: 20px;">
															<div class="form-group">
																<label class="control-label">Upload Verified Documents / Files<span style="color:red;">*</span>  <small style="color:red;">documents(in pdf format)</small> </label>
																<div class="input-group">
																<span class="input-group-addon">
																<i class="fas fa-envelope"></i>
																</span>
																<input type="file" multiple="multiple" class="form-control" id="file" name="file[]" accept="application/pdf"  placeholder=" ">
																</div>
															</div>
														</div>
													</div> -->
							</div>
								</div>							
							<div class="form-actions right">
												<button type="submit" class="btn blue submit_btn" id='submit_btn' name='button'>Submit </button>
												<!-- <a class='btn blue btnn' data-toggle='modal' href='#basic'>Forward To </a> -->
												&nbsp;
												<button type="button" class="btn default" onclick="history.go(-1);">Cancel</button>
							</div>
						</div>
					</form>
										<!-- END FORM-->
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
			<form action="control/adminProcess.php?action=update_Doc" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form" >
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Forward To </h4>
				</div>
				<div class="modal-body">
					 <input type="hidden" id="ex_emp_pfno" name="ex_emp_pfno" value="<?php echo $_GET['ex_emp_pfno']; ?>" >
					 <input type="hidden" id="tble_id" name="tble_id" value="" >
					 <!-- <input type="hidden" id="username" name="username" value="<?php echo $_GET['username']; ?>"> -->
					 <!-- <input type="hidden" id="fw_tbl_id" name="fw_tbl_id" value="<?php echo $_GET['id']; ?>"> -->

					 <div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Upload Verified Documents / Files<span style="color:red;">*</span>  <small style="color:red;">documents(in pdf format) & images(in jpg or png)</small></label>
								<div class="input-group">
								<span class="input-group-addon">
								<i class="fas fa-envelope"></i>
								</span>
								<input type="file"  class="form-control" id="file" name="file" accept="image/jpeg,image/png,application/pdf"  placeholder=" ">
								</div><br>
								<button type="submit" id="check" class="btn blue">Update</button>	
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


    $(document).on("click",'#check',function() 
    { 
        var imgVal = $('#file').val(); 
        if(imgVal=='') 
        { 
            alert("Empty input file Please select file.."); 

        }
        else
        {
        	$('#file').val(imgVal);
        } 
        return false;

         

    }); 
        



$(document).on('click','.btnn',function(){
	var id=$(this).attr("data-id");
	//alert(id);
	$("#tble_id").val(id);
});






  $(function() {
        
    //  $('#fam_mem_dob_1').datepicker({
    //  	format:'dd/mm/yyyy',
    //   autoclose: true
    // });
     $('.appl_dob').datepicker({
     	format:'dd/mm/yyyy',
      autoclose: true
    });

 }); 


  document.getElementById("file").onchange = function(){  // on selecting file(s)
    for(var file in this.files){ // loop over all files
        if(isNaN(file) === false){  // if it is actually a file and not any other property
            if(this.files[file].type !== "application/pdf" && this.files[file].type !== "image/jpeg" && this.files[file].type !== "image/png"){ // if NOT PDF!!
                alert('Please select PDFs and img files only.');
                $("#file").val('');
                return false;
            }
        }
    }
    var oFile = document.getElementById("file").files[0]; // <input type="file" id="fileUpload" accept=".jpg,.png,.gif,.jpeg"/>
    	for(var file in this.files)
    	{
    		if(isNaN(file)===false)
    		{
    			if (this.files[file].size > 9097152) // 2 mb for bytes.
            	{
                	alert("Please check selected any of the file size is greater 9mb!..  please select file under 9mb!");
                	$("#file").val('');
                	return;
            	}

    		}
    	}
    // alert('Yay!! All selected files are in PDF format.');
    // return true;
}
 $(".f_date").on("change", function(){
    var dob=$("#curDate1").val();
    var doa=$(".f_date").val();
    // alert("curr "+dob);
    // alert("DOB "+doa);
    // $('#emp_doa').val(doa);
    var parts = dob.split("/");
    var s=new Date(parts[2], parts[1] - 1, parts[0]);
    var parts1 = doa.split("/");
    var s1=new Date(parts1[2], parts1[1] - 1, parts1[0]);
    // alert(s);
    // alert(s1);
    if(s1 >= s){
      alert('Please select valid Date..');
      $(".f_date").val("");
      $(".f_date").focus();
    }
  });
</script>