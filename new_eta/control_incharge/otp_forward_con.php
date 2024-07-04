<?php
$GLOBALS['flag']="5.9";
include('common/header.php');
include('common/sidebar.php');
?>

	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
		
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home / मुख पृष्ठ</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Forwarding CON : </a>
					</li>
				</ul>

			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->
			
			<!-- END DASHBOARD STATS -->
			<div class="clearfix">
			</div>


			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption  col-md-6">
						<i class="fa fa-book"></i>Forwarding CON : 
					</div>
					<div class="caption col-md-6 text-right backbtn">
						<button class="btn btn-danger" onclick="history.go(-1);">Back</button>
					</div>
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
				<form class="horizontal-form">
					<input type="hidden" name="empid_session" id="empid_session" value="<?php echo $_SESSION['empid']; ?>">
					<input type="hidden" name="empid" id="empid" value="<?php echo $_SESSION['empid']; ?>">
          			<input type="hidden" name="ref" id="ref" value="<?php echo $_REQUEST['reference_no']; ?>">
          			<input type="hidden" name="frdname" id="frdname" value="">
          			<div id="frd_form">
						<div class="form-body">


							<div class="row">

								<div class="col-md-4"></div>
								<div class="col-md-4">
									<div class="form-group">
										<center>
											<label class="control-label"><h4 class="">Select Controlling Officer</h4></label>	
										</center>
									</div>						
								</div>
								<div class="col-md-4">	</div>
							</div>	

							<div class="row">
								<div class="col-md-4"></div>
								<div class="col-md-4">
									<div class="form-group">								
										 <?php 				           
				              $query_emp =mysqli_query($conn,"SELECT department.DEPTNO as id  FROM `employees` ,department WHERE department.DEPTNO=employees.dept AND pfno='".$_SESSION['empid']."' ");
				              $resu1=mysqli_fetch_array($query_emp);
				               $dptid=$resu1['id'];
				              $sql_user=mysqli_query($conn,"SELECT * from users where dept='".$dptid."' AND role='13' ");
				              $cnt=mysqli_num_rows($sql_user);
				        
				            ?>
				            <select name="forwardName" id="forwardName" class="form-control select2 required" style="width: 100%" required>
				              <option readonly value='0' selected >Select CO</option>
				            
				             <?php
				              while($resu=mysqli_fetch_assoc($sql_user)){             
				              $query = "SELECT pfno,name,desig FROM employees where pfno='".$resu['empid']."'";
				            //   $did.="SELECT * FROM employees where pfno='".$resu['empid']."'";
				                
				                $result = mysqli_query($conn,$query);
				                while($value = mysqli_fetch_assoc($result))
				                {
				                  // $did.=$value['pfno'];
				                  echo "<option value='".$value['pfno']."'>".$value['name']."  (".$value['desig'].")</option>";
				                }
				              }
				              ?>
				            </select>
									</div>						
								</div>
								<div class="col-md-4"></div>
							</div>	
					
						</div>							
						<div class="form-actions right">							
							<button type="button" class="btn blue btn_confirm_otp" id="submit_btn" name='button'><i class="fa fa-check"></i> प्रस्तुत करे / Submit</button>
						</div>
					</div>



					<div id="otp_confirm_form" style="display: none;">
						<div class="form-body">
							<!-- <h3 class="form-section">Add User</h3> -->
							<div class="row">

								<div class="col-md-4"></div>
								<div class="col-md-4">
									<div class="form-group">
										<center>
											<label class="control-label"><h4 class="">Enter OTP</h4></label>
										</center>							
									</div>						
								</div>
								<div class="col-md-4">	</div>
							</div>	

							<div class="row">
								<div class="col-md-5"></div>
								<div class="col-md-2">
									<div class="form-group">
										<center>								
											<input type="text" autofocus="true" placeholder="Enter OTP" name="c_otp" id="c_otp" class="form-control" required>
										</center>
									</div>						
								</div>
								<div class="col-md-5"></div>
							</div>	

						</div>	
						<div class="form-actions right">							
							<button type="button" class="btn blue btn_confirm_otp" id="submit_btn" name='button'><i class="fa fa-check"></i> Confirm OTP</button>
						</div>
					</div>

					</form>
					<!-- END FORM-->
				</div>
			</div>


		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php
	include('common/footer.php');
?>

<script type="text/javascript">
	

	 // $(document).on('click','.btn_action1',function(){

	 //   var forwardName=$("#forwardName").val();
	 //   var empid=$("#empid").val();	
	 //   var ref_no=$("#ref").val();
	//    alert(ref_no +"_"+forwardName+"_"+empid);

	//   	if(forwardName != '0')
	//   	{	  	
	//   		$.ajax({
	// 		    type:"post",
	// 		    url:"control/adminProcess.php",
	// 		    data:"action=otp_forward_con&forwardName="+forwardName+"&empid="+empid+"&ref_no="+ref_no,
	// 		    success:function(data)
	// 		    {
	// 		        if(data != 0)
	// 		        {
	// 		        	// alert("OTP has been sent on your registered mobile "+data);
	// 		        	$.jGrowl("OTP has been sent on your registered mobile "+data, { header: 'Forward TA' });

	// 		          	$("#frd_form").attr("style", "display:none");
	// 			  		$("#frdname").val(forwardName);
	// 			  		$("#otp_confirm_form").attr("style", "display:show");
	// 		        }
	// 		        else
	// 		        {
	// 		        	// alert("Mobile Number Not Found.");
	// 		        	$.jGrowl("Mobile Number Not Found...", { header: 'Forward TA' });
	// 		        }			        
	// 	    	}	
	// 		});
	//   	}
	//   	else{
	//   		// alert("Please select Controlling Incahrge to forward TA.");
	//   		$.jGrowl("Please select Controlling Incahrge to forward CON...", { header: 'Forward TA' });
	//   	}

	// });


	$(document).on('click','.btn_confirm_otp',function(){
		var fdname=$("#forwardName").val();
		var empid=$("#empid").val();
		var empid_session=$("#empid_session").val();
		var ref_no=$("#ref").val();
		var c_otp=$("#c_otp").val();
 		//alert(empid+"_"+c_otp+"_"+fdname+"_"+ref_no+"_"+empid_session);

		// if(c_otp != null)
		// {
			$.ajax({
			type:"post",
			url:"control/adminProcess.php",
			data:"action=forward_con&fdname="+fdname+"&empid="+empid+"&ref_no="+ref_no+"&c_otp="+c_otp+"&empid_session="+empid_session,
				success:function(data)
				{	
					// alert(data);
					if(data == 1)
					{
						// alert("Your Claim has been forwarded.");
						// window.location="Show_claimed_TA.php";
						$.jGrowl("Your Claim has been forwarded to "+fdname, { header: 'Forward TA' });
		                var delay = 1500;
		                setTimeout(function(){ window.location = 'show_unclaimed_cont.php'  }, delay);  
					}
					// else if(data == -1)
					// {
					// 	// alert("OTP Not Matched.");					  
					// 	$.jGrowl("OTP Not Matched...", { header: 'Confirm OTP' });
					// }
					else
					{
						// alert("Something Went Wrong.");
						$.jGrowl("Something Went Wrong...", { header: 'Forward TA' });
					}

				}	
			});
		// }
		// else{
		// 	alert("Please enter otp");
		// }

	});

</script>