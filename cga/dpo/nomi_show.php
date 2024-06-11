<?php
	$GLOBALS['flag']="2.1";
	include('common/header.php');
	include('common/sidebar.php');
?>
			
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="portlet box blue btnz">
						<div class="portlet-title">
							<div class="caption btnboom">
											<i class="fa fa-book"></i>  Application Form 
										</div>
						</div>

						<div class="portlet-body form">
							<form action="" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
											 <input type="hidden" id="category" name="category" value="<?php echo $_GET['case']; ?>">
												<input type="hidden" name="pid" value="<?php echo $_GET['id']; ?>">
							

							<div class="tabbable-line ">
								<ul class="nav nav-tabs btnboom">
									<li class="active">
										<a href="#tab_15_1" data-toggle="tab">
										DAK form report </a>
									</li>
									
									<li>
										<a href="#tab_15_2" data-toggle="tab">
										nomination note </a>
									</li>
									<li>
										<a href="#tab_15_3" data-toggle="tab">
											concern to wi
										 </a>
									</li>
									
								</ul>
								<div class="tab-content">
									<div class="tab-pane active h" id="tab_15_1">
										<div class="form-body">
												<!-- <h3 class="form-section">Add User</h3> -->
												<?php 
													dbcon2();
													$sql=mysql_query("SELECT * From drmpsurh_sur_railway.resgister_user where emp_no='".$_GET['ex_emp_pfno']."'");
													$res=mysql_fetch_array($sql);
													echo mysql_error();

												?>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Ex-Employees (Parent) PF number</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas  fa-user"></i>
															</span>
															<input type="text" class="form-control" id="empid" name="empid" value="<?php echo $res['emp_no']; ?>" readonly="">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Employee Name</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas  fa-user"></i>
															</span>
															<input type="text" class="form-control" id="empname" name="empname" value="<?php echo $res['name']; ?>" readonly="">
															</div>
														</div>
													</div>
													
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Department </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="department" name="department" value="<?php echo getdepartment($res['department']); ?>" readonly="">
															</div>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Designation </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="design" name="design" value="<?php echo designation($res['designation']); ?>" readonly="">
															</div>
														</div>
													</div>
													<!--/span-->
													
													<!--/span-->
												</div>
												<hr style='border:1px solid blue'>
											
											<h4>&emsp;Applicant Details</h4>
											<hr>
													<?php 
													dbcon1();
													$sql1=mysql_query("SELECT * From drmpsurh_cga.applicant_registration where ex_emp_pfno='".$_GET['ex_emp_pfno']."'");
													$res1=mysql_fetch_array($sql1);
													//echo mysql_error();

												?>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Applicant Name </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="appl_name" name="appl_name" value="<?php echo $res1['applicant_name']; ?>" readonly="" >
															</div>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Date Of Birth </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="appl_dob" name="aapl_dob" value="<?php echo $res1['applicant_dob']; ?>" readonly="">
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Gender</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="appl_dob" name="aapl_dob" value="<?php echo getgender($res1['applicant_gender']); ?>" readonly="">
															</div>
																
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Mobile Number </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="appl_mobile" name="appl_mobile" value="<?php echo $res1['applicant_mobno']; ?>" readonly="">
															</div>
														</div>
													</div>
												</div>
												
												<div class="row">
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Category</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="appl_mobile" name="appl_mobile" value="<?php echo getcase($res1['category']); ?>" readonly="">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">E-Mail </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="email" class="form-control" id="appl_email" name="email" value="<?php echo $res1['applicant_emailid']; ?>" readonly>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">PAN No</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="appl_pan" name="pan" value="<?php echo $res1['applicant_panno']; ?>" readonly maxlength="10">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Aadhar No </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="appl_aadhar" name="aadhar" value="<?php echo $res1['applicant_aadharno']; ?>" readonly maxlength="12">
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Applicant Qualification </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="appl_qualification" name="qualification" value="<?php echo $res1['applicant_qualifiaction']; ?>" readonly>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">SC/ST/OBC/Other</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="appl_qualification" name="qualification" value="<?php echo $res1['caste']; ?>" readonly>
															</div>
														</div>
													</div>
												</div>
												<hr>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Uploaded File</label><br>
															<?php 
																$query_emp = "SELECT * from upload_doc where ex_emp_pfno='".$_GET['ex_emp_pfno']."'";
																$result_emp = mysql_query($query_emp);
																$sr=0;
																while($value_emp = mysql_fetch_array($result_emp))
																{
																	$sr++;
																	echo "$sr)  <a href='../uploadFiles/".$_GET['ex_emp_pfno']."/".$value_emp['file_path']."' target='_blank'>".$value_emp['file_path']."</a><br><br>";
								
																}
															?>
														</div>
													</div>
												</div>
											</div>
									</div>



									<div class="tab-pane h" id="tab_15_2">
										
										<div class="form-body ">
												
													
													<br>
													<?php
														dbcon1();
														$sql=mysql_query("SELECT * from nomination_note where ex_emp_pfno='".$_GET['ex_emp_pfno']."'");
														$res=mysql_fetch_array($sql);

													 ?>
													<div class="row">
														
														<div  style="float: right;text-align: right;margin-right: 20px;">
															<label>P/Rect <br> Dtd:-<?php echo $res['date'];?></label>
														</div>
													</div>
													
													<div class="row">
														
														<div class="text-center">
															<b><h4>Office-Note</h4></b>
														</div>
													</div>
													
													<div class="row">
														<!-- 
														<div class="col-xs-3" style="width: 120px;">
															<span style="margin-left: 60px">Sub.:-</span> 
														</div> -->
														<div class="col-md-8">
															<label style="margin-left: 80px;">Sub.:-&nbsp;&nbsp;&nbsp;<?php echo $res['subject'];?></label>
														</div>

													</div>
													<div class="row">
														
														<!-- <div class="col-xs-3" style="width: 120px;">
															<span style="margin-left: 60px">Ref.:-</span> 
														</div> -->
														<div class="col-md-8">
															<label style="margin-left: 80px;">Ref.:-&nbsp;&nbsp;&nbsp;<?php echo $res['ref'];?></label>
														</div>

													</div>
													<div class="row">
														
														<div class="text-center">
															<label><b>**</b></label>
														</div>
														
													</div>

													<div class="row">
														
														<div class="col-md-12" style="margin-left: 10px;">
															<label>&nbsp;&nbsp;&nbsp;<?php echo $res['parag1'];?></label>
														</div>
														
													</div>													
													<div class="row">
														
														<div class="col-md-12" style="margin-left: 10px;">
															<label>&nbsp;&nbsp;&nbsp;<?php echo $res['parag2'];?></label>
														</div>
														
													</div>					
													<div class="row">
														
														<div class="col-md-12" style="margin-left: 10px;">
															<label>&nbsp;&nbsp;&nbsp;<?php echo $res['last_parag'];?></label>
														</div>
														<br>
														
														<p style="margin-left: 70px;">Submitted for order please</p>
													</div>					
													<br>
													<br>
													<br>
													<br>
													<br>
													<div class="row">
														<div class="" style="float: right;margin-right: 50px">
															<p><b>OS(P)Rect</b></p>
														</div>
													</div>	
													<br>
													<br>
													<br>
													<br>
													<br>
													<div class="row">
														<div class="" style="float: left;margin-left: 50px">
															<p><b>DPO(Wel):-</b></p>
														</div>
													</div>
											</div>

									</div>
									<div class="tab-pane h" id="tab_15_3">
										<div class="form-body ">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">Select Welfare Inspector</label>
													<select name="wi_pfno" id="wi_pfno" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
													<option value="1" selected disabled>Select Welfare Inspector</option>
													  <?php
														 dbcon1();
														 dbcon2();
														 $query_emp =mysql_query("SELECT resgister_user.name as name,login.pf_number as pf_number,login.* from drmpsurh_cga.login,drmpsurh_sur_railway.resgister_user where resgister_user.emp_no=login.pf_number AND role='5' ");
														 					
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
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">Remark</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-pencil-alt"></i>
															</span>
																<textarea class="form-control" rows="4" name="remark" id="remark" required="required"></textarea>
															</div>
													
									
												</div>
											</div>
										</div>
										<!-- <div class="left">
										</div> -->
									</div>
								</div>


									<div class="form-actions right">
										
												<button type="button" class="btn blue btnc" id="btnss" ><i class="fa fa-check"></i> Submit</button>
										<a class='btn blue btnn'  data-toggle='modal' href='#basic'>Forward To </a>
												
												&nbsp;
												
												<button onclick="print_button()" class="btn green btnhide">Print</button>
												<button type="button" class="btn default" onclick="history.go(-1);">Cancel</button>
									</div>

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
			<form action="control/adminProcess.php?action=fw_to_rcc" method="post">
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
										<option value="" selected disabled>Select Recruitment cell</option>
										  <?php
											 dbcon1();
											 dbcon2();
											 $query_emp =mysql_query("SELECT resgister_user.name as name,login.pf_number as pf_number,login.* from drmpsurh_cga.login,drmpsurh_sur_railway.resgister_user where resgister_user.emp_no=login.pf_number AND role='7' ");
											 					
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
        
     $('.ddate').datepicker({
      autoclose: true,
      format:'dd/mm/yyyy'
    });
 //     $('#txtdoe').datepicker({
 //      autoclose: true,
 //      format:'dd/mm/yyyy'
 //    });

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

   $(".btnn").hide();


   $(document).on("click","#btnss",function(){
	var ddl = document.getElementById("wi_pfno");
	var selectedValue = ddl.options[ddl.selectedIndex].value;
	var textarea =document.getElementById("remark").value == '';
    
   if(selectedValue == "1" && textarea)
	{
	    alert("please enter details in form...");

	}
	else
	{
		
   		var wi_pfno=$("#wi_pfno").val();
   		var remark=$("#remark").val();
   		var ex_emp_pfno=$("#empid").val();
   		var case1=$("#category").val();

   		//alert(ex_emp_pfno+case1);

   		$.ajax({
   			type:"post",
   			url:"control/adminProcess.php",
   			data:"action=concern_wi&wi_pfno="+wi_pfno+"&remark="+remark+"&ex_emp_pfno="+ex_emp_pfno+"&case="+case1,
   			success:function(data){
   				//alert(data);
   				if (data==1) 
   				{
   					alert("Submitted successfully");
   					//$(".btnn").css("display","block");
   					$(".btnn").show();
   					$(".btnc").hide();
   				}
   				else
   				{
   					alert("Failed");
   						
   				}
   			}
   		});
   

	}
   		
   });

   

</script>