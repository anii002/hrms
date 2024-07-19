<?php
$GLOBALS['flag'] = "1.3";
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
					<a href="index.php">Home </a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="#">Master Marked To</a>
				</li>
			</ul>

		</div>

		<div class="row">
		    <div class="col-md-12">
    			<div class="portlet box blue">
    				<div class="portlet-title">
    					<div class="caption">
    						<i class="fa fa-book"></i> Add Section User
    					</div>
    				</div>
    				<div class="portlet-body form">
    					<form action="" method="post" autocomplete="off" id="frm_add_user">
    						<div class="form-body">
    							<!-- <h3 class="form-section">Add User</h3> -->
    							<div class="row">
    								<div class="col-md-3">
    									<div class="form-group">
    										<label class="control-label">PF NO</label>
    										<div class="input-group">
    											<span class="input-group-addon">
    												<i class="fas  fa-user"></i>
    											</span>
    											<input type="text" class="form-control" id="empid" name="empid" placeholder="Enter PF Number" required>
    										</div>
    									</div>
    								</div>
    								<div class="col-md-3">
    									<div class="form-group">
    										<label class="control-label">Name</label>
    										<div class="input-group">
    											<span class="input-group-addon">
    												<i class="fas  fa-user"></i>
    											</span>
    											<input type="text" class="form-control" id="empname" name="empname" placeholder="Employee Name" readonly="">
    										</div>
    									</div>
    								</div>
    								<div class="col-md-3">
    									<div class="form-group">
    										<label class="control-label">Mobile</label>
    										<div class="input-group">
    											<span class="input-group-addon">
    												<i class="fas fa-envelope"></i>
    											</span>
    											<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile number" readonly="">
    										</div>
    									</div>
    								</div>
    								<div class="col-md-3">
    									<div class="form-group">
    										<label class="control-label">Designation</label>
    										<div class="input-group">
    											<span class="input-group-addon">
    												<i class="fas fa-envelope"></i>
    											</span>
    											<input type="text" id="design" name="design" placeholder="Employee Designation" class="form-control" readonly="">
    											<input type="hidden" id="design1" name="design1">
    										</div>
    									</div>
    								</div>
    							</div>
    							
    							<div class="row">
    								<div class="col-md-3">
    									<div class="form-group">
    										<label class="control-label">Department</label>
    										<div class="input-group">
    											<span class="input-group-addon">
    												<i class="fas fa-envelope"></i>
    											</span>
    											<input type="text" id="dept" name="dept" class="form-control" placeholder="Employee Department" readonly="">
    											<input type="hidden" id="dept1" name="dept1">
    										</div>
    									</div>
    								</div>
    								<div class="col-md-3">
    									<div class="form-group">
    										<label class="control-label">Pay Level</label>
    										<div class="input-group">
    											<span class="input-group-addon">
    												<i class="fas fa-envelope"></i>
    											</span>
    											<input type="text" id="paylevel" name="paylevel" class="form-control" placeholder="Employee Pay Level" readonly="">
    										</div>
    									</div>
    								</div>
    								<div class="col-md-3">
    									<div class="form-group">
    										<label class="control-label">Select Role</label>
    										<select name="role" id="role" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
    											<option value="" selected disabled>--Select Role--</option>
    											<?php
    
    											$query_role = mysqli_query($db_edak,"SELECT * from role_user where id NOT in (3)" );
    
    											while ($value_role = mysqli_fetch_array($query_role)) {
    												echo "<option value='" . $value_role['id'] . "'>" . $value_role['role_type'] . "</option>";
    											}
    
    											?>
    										</select>
    
    										<input type="hidden" id="dob" name="dob">
    
    									</div>
    								</div>
    								<div class="col-md-3" id="section1" style="display: none">
    									<div class="form-group">
    										<label class="control-label">Section</label>
    										<select name="section" id="section" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
    											<option value="" selected disabled>Select Section</option>
    											<?php
    
    											$query_src = mysqli_query($db_edak,"SELECT sec_id,sec_name from tbl_section");
    
    											while ($value_src = mysqli_fetch_array($query_src)) {
    												echo "<option value='" . $value_src['sec_id'] . "'>" . $value_src['sec_name'] . "</option>";
    											}
    
    											?>
    										</select>
    									</div>
    								</div>
    							</div>
    							<!--/row-->
    						</div>
    						<div class="form-actions left">
    							<button type="button" class="btn blue subbtn"><i class="fa fa-check"></i> Submit</button>&nbsp;
    							<button type="reset" class="btn default">Reset</button>
    						</div>
    					</form>
    				</div>
    
    			</div>
    			<div class="portlet box blue">
    				<div class="portlet-title">
    					<div class="caption">
    						<i class="fa fa-book"></i>Section User List
    					</div>
    				</div>
    				<div class="portlet-body form">
    					<div class="form-body">
    						<table class="table table-bordered table-hover" id="example1">
    							<thead>
    								<tr>
    									<th>SR No</th>
    									<th>PF No.</th>
    									<th>Name</th>
    									<th>Section</th>
    									<th>Designation</th>
    									<th>Department</th>
    									<th>Action</th>
    
    								</tr>
    							</thead>
    							<tbody>
    								<?php
    								$query_src = "SELECT $db_edak_name.tbl_user.id,emp_id,section,role,name,designation,department FROM $db_edak_name.tbl_user,$db_common_name.register_user WHERE $db_edak_name.tbl_user.emp_id=$db_common_name.register_user.emp_no and role not in(0)";
    								$result_src = mysqli_query($db_edak,$query_src);
    								$sr = 1;
    								while ($value_src = mysqli_fetch_array($result_src)) {
    
    									echo "
    								<tr>
    								<td>" . $sr++ . "</td>
    								<td>" . $value_src['emp_id'] . "</td>
    								<td>" . $value_src['name'] . "</td>";
    								if($value_src['section']=='' ||$value_src['section']==null)
    								{
    									echo "<td>DAK CLERK</td>";
    								}
    								else
    								{
    									echo "<td>" . getSection($value_src['section']) . "</td>";
    								}
    								
    								echo"<td>" . designation($value_src['designation']) . "</td>
    								<td>" . getdepartment($value_src['department']) . "</td>
    								
    								";
    
    									//echo "<a target='_blank'  id='".$value_emp['uploaded_file_path']."' value='".$value_emp['uploaded_file_path']."'>'".$value_emp['uploaded_file_path']."'</a>";
    
    									echo "<td><button pf='" . $value_src['emp_id'] . "' value='" . $value_src['id'] . "' role='" . $value_src['role'] . "' section='" . $value_src['section'] . "' class='btn btn-info fetchid' data-target='#responsive' data-toggle='modal'><i class='fa fa-edit'></i></button>";
    
    									echo "<button value='" . $value_src['id'] . "' pf='" . $value_src['emp_id'] . "' class='btn btn-danger remove'><i class='fa fa-trash'></i></button></td>";
    									echo "</tr>
    								";
    								}
    
    
    
    								?>
    							</tbody>
    						</table>
    					</div>
    				</div>
    			</div>
    			<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- END CONTENT -->

	<?php
	include('common/footer.php');
	?>

	<div id="responsive" class="modal fade modal-scroll" tabindex="-1" data-replace="true">
		<div class="modal-header btn-orange-moon">
			<button type="button" class="close" onclick="location.reload();" aria-hidden="true"></button>
			<h4 class="modal-title">Update Role/Section : </span> </h4>
		</div>
		<form action="control/adminProcess.php?action=update_sec_usr" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
			<div class="modal-body">
				<div class="portlet-body form">
					<!-- BEGIN FORM-->

					<input type="hidden" id="fid" name="fid">
					<input type="hidden" id="pf_num" name="pf_num">
					<div class="form-body">

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Select Role</label>
									<select name="role_up" id="role1" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>

										<option value="" selected disabled>--Select Role--</option>
										<?php

										$query_role = mysqli_query($db_edak,"SELECT * from role_user where id NOT in (3)");

										while ($value_role = mysqli_fetch_array($query_role)) {
											echo "<option value='" . $value_role['id'] . "'>" . $value_role['role_type'] . "</option>";
										}

										?>
									</select>


								</div>
							</div>
							<div class="col-md-6" id='hide'>
								<div class="form-group">
									<label class="control-label">Section</label>
									<select name="section_up" id="section11" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
										<option value="" selected disabled>Select Section</option>
										<?php

										$query_src = mysqli_query($db_edak,"SELECT sec_id,sec_name from tbl_section");

										while ($value_src = mysqli_fetch_array($query_src)) {
											echo "<option value='" . $value_src['sec_id'] . "'>" . $value_src['sec_name'] . "</option>";
										}

										?>
									</select>
								</div>
							</div>
						</div>


					</div>
					<!--/row-->

				</div>
			</div>
			<div class="modal-footer">
				<!--  -->
				<button type="submit" style="float:left" class="btn blue">Update</button>
				<button type="button" onclick="location.reload();" class="btn btn-default">Close</button>
			</div>
		</form>
	</div>

	<script type="text/javascript">
		$(document).on("change", "#role", function() {
			var e = document.getElementById("role");
			var strUser = e.options[e.selectedIndex].value;
			//alert(strUser);

			if (strUser == 2) {
				$("#section1").css("display", "block");
			}
			if (strUser == 1) {
				$("#section1").css("display", "none");
				//$("#section").val(NULL);
			}
		});


		$(document).on("change", "#empid", function() {
			var value = $('#empid').val();
			//alert(value);
			$.ajax({
					url: 'control/adminProcess.php',
					type: 'POST',
					data: {
						action: 'fetch_employee_details',
						id: value
					},
				})
				.done(function(html) {
					//alert(html);
					var data = JSON.parse(html);
					if(html==1)
                	{
                		alert("Already registered in Section user list....");
                		$('#empid').focus().val('');
                	}
					else if (data.pf_number == null) {
						alert("Not Found PF number.....")
						$('#empid').focus().val('');
					} else {
						$("#empid").val(data.pf_number);
						$("#empname").val(data.emp_name);
						$("#design").val(data.designation);
						$("#paylevel").val(data.scale);
						$("#dept").val(data.dept);
						$("#dept1").val(data.dept1);
						$("#design1").val(data.designation1);
						$("#mobile").val(data.mobile);
						$("#dob").val(data.dob);
					}


				});

		});


		$(document).on("click", ".remove", function() {
			var value = $(this).attr("value");
			var pf = $(this).attr("pf");
			//alert(pf);
			var result = confirm("Confirm!!! Proceed for Remove user?");
			if (result == true) {
				//alert(value);

				$.ajax({
					url: 'control/adminProcess.php',
					type: 'POST',
					data: "action=removeUser&id=" + value + "&pf=" + pf,
					success: function(data) {
						//alert(data);
						if (data == 1) {
							alert("Removed Succeessfully");
							window.location = "master_marked.php";
						}
						//     	
						else {
							alert("Failed To Remove");
						}
					}


				});
			}
		});

		$(document).on("click", ".fetchid", function() {
			var value = $(this).attr("value");
			var role = $(this).attr("role");
			var section = $(this).attr("section");
			var pfno = $(this).attr("pf");
			//alert(role + section);
			if (role == 1) {
				$("#fid").val(value);
				$("#pf_num").val(pfno);
				$("#role1").val(role).trigger("change");
				$("#hide").css("display", "none");
				$("#section11").val('').trigger("change");
			} else {
				$("#fid").val(value);
				$("#pf_num").val(pfno);
				$("#role1").val(role).trigger("change");
				$("#section11").val(section).trigger("change");
			}


		});

		$(document).on("change", "#role1", function() {
			var e = document.getElementById("role1");
			var strUser = e.options[e.selectedIndex].value;
			//alert(strUser);

			if (strUser == 2) {
				$("#hide").css("display", "block");
			}
			if (strUser == 1) {
				$("#hide").css("display", "none");
				//$("#section").val(NULL);
			}
		});


		$(document).on("click", ".subbtn", function() {
			var empid = $("#empid").val();
			var design1 = $("#design1").val();
			var dept1 = $("#dept1").val();
			var role = $("#role").val();
			var dob = $("#dob").val();
			var section = $("#section").val();

			//alert(ssrole);
			if(empid=='')
			{
			    alert("Enter PF number......");
			    $("#empid").focus();
			}
			else if (role == null) {
				alert("please select role field in form..");
				$("#role").focus();
			} 
			else if (role == 2) {

				if (section == null) {
					alert("please select section field in form..");
				}
				else {
					add(empid, design1, dept1, role, dob, section);
				}
			}
			else {
				add(empid, design1, dept1, role, dob, section);
			}



		});


		function add(empid, design1, dept1, role, dob, section) {
			$.ajax({
				type: "post",
				url: "control/adminProcess.php",
				data: "action=add_user&empid=" + empid + "&design1=" + design1 + "&dept1=" + dept1 + "&role=" + role + "&dob=" + dob + "&section=" + section,
				success: function(data) {
					console.log(data);
					//alert(data);
					if (data == '1') {
						alert("Added successfully..");
						window.location = "master_marked.php";
					}
					else if (data == '2') {
						alert("User already exists in this section..");
						window.location = "master_marked.php";
					}else {
						alert("Failed..");
						window.location = "master_marked.php";
					}

				}
			});
		}
	</script>