<?php
include('alpha.php');
?>

<style>
.primary
{
	 box-shadow: none;
	border-color: rgba(60, 141, 188, 0.53);
}
</style>

		<!--END ADMIN MODAL SETTINGS -->
	<div class="modal fade" id="myModalAddEmployee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="example-modal">
			<div class="modal-dialog">
				<div class="modal-content" style="width: 600px;">
					<div class="modal-header" style="background-color: rgba(221, 75, 57, 0.48);">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">×</span></button>
					<h4 class="modal-title"><i class="fa fa-plus"></i> Employee Registration </h4>
					<hr style="width:100%;background-color:red;height:2px;">
					</div>
			<form method="post" action="Ajaxaddemployee.php" id="frmaddemployee" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg">
				<div class="modal-body" style="overflow-y: scroll;">
					<div class="form-group">
						<label class="col-md-4"> Registered Year :</label>
						<div class="col-md-8">
						<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
							<select class="form-control primary" id="cmbyear" name="cmbyear" selected required >
							<option value="" selected hidden disabled>-- Select Year --</option>
							<?php
								$sqlDept=mysql_query("select * from year");
								while($rwDept=mysql_fetch_array($sqlDept))
								{
								?>
								<option value="<?php echo $rwDept["years"]; ?>"><?php echo $rwDept["years"]; ?></option>
								<?php
								}
							
							?>
							</select>
						</div><br>
						</div>
						
						<label class="col-md-4">Employee Name : </label>
						<div class="col-md-8">
						<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-font"></i></div>
						<input type="text" class="form-control primary" id="txtempname" name="txtempname" placeholder="Enter Employee Name Here" required /></div><br>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4">Employee No/ PF No :</label>
						<div class="col-md-8">
						<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-calculator"></i></div>
							<input type="text" class="form-control primary" id="txtempcode" name="txtempcode"  placeholder="Enter Code Here" required />
						</div><br>
						</div>
						<label class="col-md-4">Department:</label>
						<div class="col-md-8">
						<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-bookmark"></i>&nbsp;&nbsp;</div>
							<select class="form-control primary" id="cmbdept" name="cmbdept" required>
							<option value="" selected hidden disabled>-- Select Department Here --</option>
							<?php
								$sqlDept=mysql_query("select * from tbl_department");
								while($rwDept=mysql_fetch_array($sqlDept))
								{
								?>
								<option value="<?php echo $rwDept["deptname"]; ?>"><?php echo $rwDept["deptname"]; ?></option>
								<?php
								}
							
							?>
							</select>
						</div><br>
						</div>
					</div>
              <div class="form-group">
                <label class="col-md-4">Designation:</label>
				<div class="col-md-8">
				<div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-cube"></i></div>
				    <select class="form-control primary" id="cmbdesignation" name="cmbdesignation" required>
					<option value="" selected hidden disabled>-- Select Designation Here --</option>
					<?php
								$sqlDept=mysql_query("select * from tbl_designation");
								while($rwDept=mysql_fetch_array($sqlDept))
								{
								?>
								<option value="<?php echo $rwDept["designation"]; ?>"><?php echo $rwDept["designation"]; ?></option>
								<?php
								}
							
							?>
					</select>
                </div><br>
                </div>
				<label class="col-md-4">Station:</label>
				<div class="col-md-8">
				<div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-train"></i></div>
				    	<select class="form-control primary" id="cmbstation" name="cmbstation" required>
							<option value="" selected hidden disabled>-- Select Station Here --</option>
							<?php
								$sqlDept=mysql_query("select * from tbl_station");
								while($rwDept=mysql_fetch_array($sqlDept))
								{
								?>
								<option value="<?php echo $rwDept["station_name"]; ?>"><?php echo $rwDept["station_name"]; ?></option>
								<?php
								}
							
							?>

							</select>
                </div><br>
                </div>
              </div>
			  
			  	<div class="form-group">
						<label class="col-md-4">Pay Scale :</label>
						<div class="col-md-8">
						<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-rupee"></i>&nbsp;&nbsp;</div>
							<input type="text" class="form-control primary" id="txtpayscale" name="txtpayscale"  placeholder="Enter Pay Scale Here" required/>
						</div><br>
						</div>
						
				</div>
				
				
				<div class="form-group">
						<label class="col-md-4">Substantive / GradePay :</label>
						<div class="col-md-8">
						<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-rupee"></i>&nbsp;&nbsp;</div>
							<input type="text" class="form-control primary" id="txtsubstantive" name="txtsubstantive"  placeholder="Enter Substantive Here" required />
						</div><br>
						</div>
						
						<label class="col-md-4">Substantive 7th CPC Paylevel :</label>
						<div class="col-md-8">
						<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-rupee"></i>&nbsp;&nbsp;</div>
							<input type="text" class="form-control primary" id="txtcpcpaylevel" name="txtcpcpaylevel"  placeholder="Enter Substantive Here" />
						</div><br>
						</div>
						
						<label class="col-md-4">ST SC:</label>
						<div class="col-md-8">
						<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-font"></i></div>
						<select id="txtstsc" name="txtstsc" class="form-control primary" required>
						<option value="" selected hidden disabled>-- Select ST SC Option --</option>
						<option value="ST/SC">YES</option>
						<option value="UR">NO</option>
						</select>
						</div><br>
						</div>
						
						<label class="col-md-4">Contact:</label>
						<div class="col-md-8">
						<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-phone"></i></div>
						<input type="number" class="form-control primary" id="txtcontact" name="txtcontact"  placeholder="Enter Contact Here" required onchange="ValidatecontactEmployee();" maxlength="10"/>
						<input type="hidden" class="form-control primary" id="txtpassword" name="txtpassword" value="<?php echo $employee; ?>"/>
						</div><br>
						</div>
				</div>
			  	
				<div class="form-group">
				<div class="col-md-12">
					<input type="hidden" id="txtsession" name="txtsession"  class="form-control" value="<?php echo $_SESSION['SESS_MEMBER_NAME']; ?>"/>
					<input type="submit" id="btnSave" name="btnSave" value="Save"  class="btn btn-success" />
					<input type="reset" id="btnreset" name="btnreset" value="Reset" class="btn btn-default" />
					<input type="button"  id="btnrefresh" name="btnrefresh" value="Refresh"class="btn btn-info" onClick="window.location.reload()"/>
					<br>
					<br>
					<br>
				</div>
				</div>
					</form>
				</div>
				<!-- /.modal-content -->
			</div>
		</div>
	</div>
</div>
<!--END ADMIN MODAL SETTINGS -->


	<div class="modal fade" id="myModalAddUser" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="example-modal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="background-color: rgba(221, 75, 57, 0.48);">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true" ><b>×</b></span></button>
					<h4 class="modal-title"><i class="fa fa-plus"></i> New User Registration</h4>
					<hr style="width:100%;background-color:red;height:2px;">
					</div>
			<form method="post" id="frmadduser" action="ajaxaddusers.php" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg">
					<div class="modal-body" style="overflow-y: scroll;">
			    <div class="form-group">
			    	<label class="col-md-4">PF Number :</label>
					<div class="col-md-8">
					<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-font"></i></div>
						<input type="text" class="form-control primary" id="txtuserpf" name="txtuserpf" placeholder="Enter PF Number"  required />
					</div><br>
					</div>
					<label class="col-md-4">User Full Name :</label>
					<div class="col-md-8">
					<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-font"></i></div>
						<input type="text" class="form-control primary" id="txtuserfullname" name="txtuserfullname" placeholder="Enter Full Name"  required />
					</div><br>
					</div>
					<label class="col-md-4">Department :</label>
						<div class="col-md-8">
						<div class="input-group">
						  <div class="input-group-addon"><i class="fa fa-bookmark"></i></div>
							<select class="form-control primary" id="cmbdept" name="cmbdept" required>
									<option value="" selected hidden disabled>-- Select Department Here --</option>
									<?php
										$sqlDept=mysql_query("select * from tbl_department");
										while($rwDept=mysql_fetch_array($sqlDept))
										{
										?>
										<option value="<?php echo $rwDept["deptname"]; ?>"><?php echo $rwDept["deptname"]; ?></option>
										<?php
										}
									
									?>
							</select>
						</div><br>
						
						</div>
						<div class="clearfix"></div>
				</div>
				
					<div class="form-group">
					<label class="col-md-4">Group ID :</label>
					<div class="col-md-8">
					<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-user-plus"></i></div>
						<select class="form-control primary" id="cmbgroup" name="cmbgroup" required>
						<option value="" selected hidden disabled>-- Select Group ID --</option>
						<option value="1">A</option>
						<option value="2">B</option>
						<option value="3">C</option>
						<option value="4">D</option>
						</select>
					</div><br>
					</div>
					
					<label class="col-md-4">Designation :</label>
					<div class="col-md-8">
					<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-cube"></i></div>
					 <select class="form-control primary" id="cmbdesignation" name="cmbdesignation" required>
					<option value="" selected hidden disabled>-- Select Designation Here --</option>
					<?php
								$sqlDept=mysql_query("select * from tbl_designation");
								while($rwDept=mysql_fetch_array($sqlDept))
								{
								?>
								<option value="<?php echo $rwDept["designation"]; ?>"><?php echo $rwDept["designation"]; ?></option>
								<?php
								}
							
							?>
							
					</select>
					</div><br>
					</div>
					<label class="col-md-4">Access Level :</label>
					<div class="col-md-8">
					<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-users"></i></div>
						<select class="form-control primary" id="cmbaccesslevel" name="cmbaccesslevel" required>
							<option value="" selected hidden disabled>-- Select User Level --</option>
							<!--option value="Super Admin">Super Admin</option-->
							<option value="Admin"> Admin </option>
							<option value="Office general"> Officer General </option>
							<option value="Officer Departmental"> Officer Departmental </option>
							<option value="Cadder Cheif Office Superitendent"> Cadder Cheif Office Superitendent </option>
							<option value="Techinical"> Techinical </option>
						</select>
					</div><br>
					</div>
				</div>
				<input type="hidden" id=role name="role" value="">
				
				<!-- <div class="form-group">
					<label class="col-md-4">User Name :</label>
					<div class="col-md-8">
					<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-university"></i></div>
						<input type="text" class="form-control primary" id="txtusername" name="txtusername" value="<?php echo $usercode; ?>" readonly />
					</div><br>
					</div>
					<label class="col-md-4">Password :</label>
					<div class="col-md-8">
					<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-university"></i></div>
						<input type="text" class="form-control primary" id="txtpassword" name="txtpassword" value="<?php echo $usercode; ?>" readonly />
					</div><br>
					</div>
				</div> -->
              <div class="form-group">
                <label class="col-md-4">Email :</label>
				<div class="col-md-8">
				<div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-university"></i></div>
				    <input type="email" class="form-control primary" id="txtemail"  name="txtemail" placeholder="Enter Valid Email"   />
                </div><br>
                </div>
				
              </div>
			  	<div class="form-group">
				<label class="col-md-4">Contact :</label>
					<div class="col-md-8">
					<div class="input-group">
					<div class="input-group-addon"><label style="font-size:12px;">+91 </label></div>
						<input type="text" class="form-control primary" id="txtmobile" name="txtmobile" placeholder="Enter Contact number"  onchange="Validatecontact();" maxlength="10"/ >
					</div><br>
					</div>
					
					<label class="col-md-4">Register Date :</label>
					<div class="col-md-8">
					<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
						<input type="date" class="form-control primary" id="txtjoindate" name="txtjoindate"  />
					</div><br>
					</div>
					
					
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<input type="submit" id="btnSave" name="btnSave" value="Save"  class="btn btn-success"  onClick=""/>
						<input type="reset" id="btnreset" name="btnreset" value="Reset" class="btn btn-default" />
						<input type="button"  id="btnrefresh" name="btnrefresh" value="Refresh"class="btn btn-info" onClick="window.location.reload()"/>
						<br>
						<br>
						<br>
					</div>
				</div>
					</form>
				</div>
				<!-- /.modal-content -->
			</div>
		</div>
	</div>
	   <!--END ADMIN MODAL SETTINGS -->
	</div>
	
	
<script>
function Validatecontact()
{
	var pass1 = document.getElementById('txtmobile');
  var goodColor = "#0C6";
    var badColor = "#FF9B37";

    if(pass1.value.length!=10)
	{

        alert( "Contact number required 10 digits only!");
		document.getElementById('txtmobile').value=" ";
	}
	else
	{
		return true;
	}
}

$(document).on("change","#cmbaccesslevel",function(){
    var role1=$("#cmbaccesslevel").val();
    //alert(role1);
    if(role1=="Admin")
    {
        $("#role").val(1);
    }
    else if(role1=="Office general")
    {
        $("#role").val(2);
    }
    else if(role1=="Officer Departmental")
    {
        $("#role").val(3);
    }
    else if(role1=="Cadder Cheif Office Superitendent")
    {
        $("#role").val(4);
    }
    else if(role1=="Techinical")
    {
        $("#role").val(5);
    }
});

function ValidatecontactEmployee()
{
	var pass = document.getElementById('txtcontact');
  var goodColor = "#0C6";
    var badColor = "#FF9B37";

    if(pass.value.length!=10)
	{

        alert( "Employee Contact number should require 10 digits only.....!");
		document.getElementById('txtcontact').value=" ";
	}
	else
	{
		return true;
	}
}


</script>