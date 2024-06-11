<?php 
 session_start();
 if(!isset($_SESSION['SESS_MEMBER_NAME']))
 {
	 echo "<script>window.location='http://localhost/E_APR_FINAL/index.php';</script>";
 }
include_once('../global/header.php');
include_once('../global/topbaruser.php');
include_once('../global/sidebaruser.php');
?>
<script>

$(".scroll").jscroll({
		autoTriggerUntil:3
});

// $(document).ready(function () {
            // $('#example').dataTable({
                // "bPaginate": false
            // });
        // });
//----------------------------// Document Ready Function //----------------------------//
		$(document).ready(function ()
		{
		ShowRecordsEmployee();
		 $("#frmaddemployee").submit(function(event)
		{
			var formData = new FormData($(this)[0]);
			formData.append("Flag",$("#btnSave").val());
			$.ajax({
				url: "Ajaxemployee.php",
				type: 'POST',
				data: formData,
				async: false,
				success: function (data) {
					// alert(data);
					// ShowRecordsEmployee();
				},
				cache: false,
				contentType: false,
				processData: false
			});
		});
		});///ready fun close


//----------------------------//Function ShowRecords User//----------------------------//
function ShowRecordsEmployee()
{
	$.post("Ajaxemployee.php",
				{
					Flag:"ShowRecordsEmployee"
				},
					function(data,success)
					{
						$("#divRecords").html(data);
						//var oTable = $('#tbl_employee').dataTable
						({
							"oLanguage":
							{
								"sSearch": "Search all columns:"
							},
							"aoColumnDefs":
							[
								{
									'bSortable': false,
									'aTargets': [0]
								} //disables sorting for column one
							],
							'iDisplayLength': 10,
							"sPaginationType": "full_numbers",
							
							// "sPaginationType": "none",
							"dom": 'T<"clear">lfrtip'
						});
					}
			);
}

$(document).ready(function() {
    $('#tbl_employee').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false
    } );
} );
//------------------End---------------------------//


</script> 

  <!-- Left side column. contains the logo and sidebar -->
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-top: -20px;">
    <!-- Content Header (Page header) --><br>
	<h2>Employee Management</h2>
    
	
     <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	
      <div class="row">
	  <div class="box box-info">
            
			<div class="box box-warning box-solid">
							<div class="box-header with-border">
							  <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Register Employee </h3>
							</div>
							
							
			<div class="box-body">
				<form method="post" action="Ajaxaddemployee.php" id="frmaddemployee" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg">
				<div class="modal-body" style="overflow-y: scroll;">
					<div class="form-group">
						<label class="col-md-3"> Registered Year :</label>
						<div class="col-md-5">
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
						<div class="clearfix"></div>
						<label class="col-md-3">Employee Name : </label>
						<div class="col-md-5">
						<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-font"></i></div>
						<input type="text" class="form-control primary" id="txtempname" name="txtempname" placeholder="Enter Employee Name Here" required /></div><br>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="form-group">
						<label class="col-md-3">Employee No/ PF No :</label>
						<div class="col-md-5">
						<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-calculator"></i></div>
							<input type="text" class="form-control primary" id="txtempcode" name="txtempcode"  placeholder="Enter Code Here" required />
						</div><br>
						</div>
						<div class="clearfix"></div>
						<label class="col-md-3">Department:</label>
						<div class="col-md-5">
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
					<div class="clearfix"></div>
              <div class="form-group">
                <label class="col-md-3">Designation:</label>
				<div class="col-md-5">
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
				<div class="clearfix"></div>
				<label class="col-md-3">Station:</label>
				<div class="col-md-5">
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
			  <div class="clearfix"></div>
			  	<div class="form-group">
						<label class="col-md-3">Pay Scale :</label>
						<div class="col-md-5">
						<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-rupee"></i>&nbsp;&nbsp;</div>
							<input type="text" class="form-control primary" id="txtpayscale" name="txtpayscale"  placeholder="Enter Pay Scale Here" required/>
						</div><br>
						</div>
						
				</div>
				
				<div class="clearfix"></div>
				<div class="form-group">
						<label class="col-md-3">Substantive / GradePay :</label>
						<div class="col-md-5">
						<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-rupee"></i>&nbsp;&nbsp;</div>
							<input type="text" class="form-control primary" id="txtsubstantive" name="txtsubstantive"  placeholder="Enter Substantive Here" required />
						</div><br>
						</div>
						<div class="clearfix"></div>
						<label class="col-md-3">Substantive 7th CPC Paylevel :</label>
						<div class="col-md-5">
						<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-rupee"></i>&nbsp;&nbsp;</div>
							<input type="text" class="form-control primary" id="txtcpcpaylevel" name="txtcpcpaylevel"  placeholder="Enter Substantive Here" />
						</div><br>
						</div>
						<div class="clearfix"></div>
						<label class="col-md-3">ST SC:</label>
						<div class="col-md-5">
						<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-font"></i></div>
						<select id="txtstsc" name="txtstsc" class="form-control primary" required>
						<option value="" selected hidden disabled>-- Select ST SC Option --</option>
						<option value="ST/SC">YES</option>
						<option value="UR">NO</option>
						</select>
						</div><br>
						</div>
						<div class="clearfix"></div>
						<label class="col-md-3">Contact:</label>
						<div class="col-md-5">
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
            </div>
            </div>
			
			
		</div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  
  <script>
  
function anchoonclick(click_id)
{
	var empcode=document.getElementById("txtemppf").value;
	document.getElementById("te").innerHTML = click_id;
	alert(click_id.id);
	//return empcode;
		
}
  </script>
   <?php
 include_once('../global/footer.php');
 include_once('../global/Modal_Member.php');
 ?> 