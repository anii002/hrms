<?php 
 session_start();
 if(!isset($_SESSION['SESS_MEMBER_NAME']))
 {
	 echo "<script>window.location='http://localhost/E_APR_FINAL/index.php';</script>";
 }
include_once('../global/header.php');
include_once('../global/topbar.php');
include_once('../global/sidebaradmin.php');

?>
 <script>
//----------------------------// Document Ready Function //----------------------------//
		$(document).ready(function ()
		{
		ShowRecordsUser();
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
					alert(data);
					ShowRecords();
				},
				cache: false,
				contentType: false,
				processData: false
			});
		});
		});///ready fun close


//----------------------------//Function ShowRecords User//----------------------------//
function ShowRecordsUser()
{
	$.post("Ajaxemployee.php",
				{
					Flag:"ShowRecordsUser"
				},
					function(data,success)
					{
						$("#divRecords").html(data);
						var oTable = $('#tbl_registration').dataTable
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
							'iDisplayLength': 12,
							"sPaginationType": "full_numbers",
							"dom": 'T<"clear">lfrtip'
						});
					}
			);
}
</script> <!-- Left side column. contains the logo and sidebar -->
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin
      </h1>
      <ol class="breadcrumb">
       
        <li class="active">
			<!--button type="button" href="#myModal" class="btn btn-success" id="#btn1"><i class="fa fa-user"> Add User</i></button-->
	
      </li>
	  </ol>
	  <br>
    </section>
	
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	
      <div class="row">
	 
	<div class="box-body" style="padding:50px 50px 50px 50px;">
		 <?php
		  if(isset($_GET["emppf"])!='')
		  {
		  $emp_id=$_GET["emppf"];
		 //echo "$emp_id";
		  $sqlempedit=mysql_query("select * from tbl_employee where emplcode='$emp_id'");
		  while($rwEmpEdit=mysql_fetch_array($sqlempedit))
		  {
		  $id=$rwEmpEdit["empid"];
		  ?>
			<form method="post" id="frmaddemployee" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg" action="Ajaxeditemployee.php">  
			  <!--div id="output1"></div-->
			  <!--<button style="float: right;" data-toggle='modal' data-target='#myModalInternalLoan' name='btnadd' id='btnadd' type='button' class='btn btn-success btn-flat' onclick="ResetEditor();" ><i class='fa fa-plus'></i> &nbsp;&nbsp;Add New Employee</button>-->
			 <div class="form-group">
			 <label class="col-md-2 col-sm-4"> Year </label>
						<div class="col-md-4 col-sm-4">
						<div class="input-group">
						<div class="input-group-addon"></div>
							<select class="form-control primary" id="cmbyear" name="cmbyear" selected>
							<option value="<?php echo $rwEmpEdit["year"]; ?>"><?php echo $rwEmpEdit["year"]; ?></option>
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
						
						<label class="col-md-2 col-sm-4">Employee Code </label>
						<div class="ccol-md-4 col-sm-4">
						<div class="input-group">
						<div class="input-group-addon"></div>
							<input type="number" class="form-control primary" id="txtempcode" name="txtempcode" value="<?php echo $rwEmpEdit["emplcode"];?>" />
						</div><br>
						</div>
						
						<label class="col-md-2 col-sm-4">Employee Name  </label>
						<div class="col-md-4 col-sm-4">
						<div class="input-group">
						<div class="input-group-addon"></div>
						<input type="text" class="form-control primary" id="txtempname" name="txtempname" value="<?php echo $rwEmpEdit["empname"];?>" /></div><br>
						</div>
					</div>
					
				<div class="form-group">
						<label class="col-md-2 col-sm-4">Department</label>
						<div class="col-md-4 col-sm-4">
						<div class="input-group">
						<div class="input-group-addon"></div>
							<select class="form-control primary" id="cmbdept" name="cmbdept" selected>
							<option value="<?php echo $rwEmpEdit["dept"]; ?>"><?php echo $rwEmpEdit["dept"]; ?></option>
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
						
				<label class="col-md-2 col-sm-4">Designation</label>
				<div class="col-md-4 col-sm-4">
					<div class="input-group">
					  <div class="input-group-addon"> </div>
						<select class="form-control primary" id="cmbdesignation" name="cmbdesignation">
						<option value="<?php echo $rwEmpEdit["design"]; ?>"><?php echo $rwEmpEdit["design"]; ?></option>
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
				</div>
				
				<div class="form-group">
						<label class="col-md-2 col-sm-4">Station</label>
						<div class="col-md-4 col-sm-4">
						<div class="input-group">
						  <div class="input-group-addon"></div>
								<select class="form-control primary" id="cmbstation" name="cmbstation">
									<option value="<?php echo $rwEmpEdit["station"]; ?>"><?php echo $rwEmpEdit["station"]; ?></option>
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
				
						<label class="col-md-2 col-sm-4">Pay Scale </label>
						<div class="col-md-4 col-sm-4">
						<div class="input-group">
						<div class="input-group-addon"></div>
							<input type="number" class="form-control primary" id="txtpayscale" name="txtpayscale" value="<?php echo $rwEmpEdit["payscale"];  ?>" />
						</div><br>
						</div>
				</div>
						
				<div class="form-group">		
						<label class="col-md-2 col-sm-4">Integrity</label>
						<div class="col-md-4 col-sm-4">
						<div class="input-group">
						<div class="input-group-addon"></div>
						<input type="text" class="form-control primary" id="txtinterity" name="txtinterity"  value="<?php echo $rwEmpEdit["integrity"];  ?>"/>
						</div><br>
						</div>
						
						<label class="col-md-2 col-sm-4">Substantive </label>
						<div class="col-md-4 col-sm-4">
						<div class="input-group">
						<div class="input-group-addon"></div>
							<input type="number" class="form-control primary" id="txtsubstantive" name="txtsubstantive"   value="<?php echo $rwEmpEdit["substantive"];  ?>" />
						</div><br>
						</div>
				</div>
						
				<div class="form-group">		
						<label class="col-md-2 col-sm-4">ST SC</label>
						<div class="col-md-4 col-sm-4">
						<div class="input-group">
						<div class="input-group-addon"></div>
						<input type="text" class="form-control primary" id="txtstsc" name="txtstsc"  value="<?php echo $rwEmpEdit["stsc"];  ?>" />
						</div><br>
						</div>
						
						<label class="col-md-2 col-sm-4">Select File </label>
						<div class="col-md-4 col-sm-4">
						<div class="input-group">
						<div class="input-group-addon"></div>
							<input type="file" class="form-control primary" id="txtfileappr" name="txtfileappr"  />
							<input type="hidden" class="form-control primary" id="txtempid" name="txtempid"  value="<?php echo $rwEmpEdit["empid"]; ?>" />
							<input type="hidden"  id="txtsession" name="txtsession" value="<?php echo $_SESSION['SESS_ADMIN_NAME']; ?>" /></div>
						</div><br>
						</div>
				</div>
				<div class="form-group">
				<div class="col-md-12">
					<input type="hidden" id="txtsession" name="txtsession"  class="form-control" />
					<input type="submit" id="btnupdate" name="btnupdate" value="Update"  class="btn btn-primary" />
					<input type="reset" id="btnreset" name="btnreset" value="Reset" class="btn btn-default" onClick="window.location.reload()" />
					<!--input type="button"  id="btnrefresh" name="btnrefresh" value="Refresh"class="btn btn-info" onClick="window.location.reload()"/-->
					<br>
					<br>
					<br>
				</div>
				</div>
			</form>
			<?php
		}
		}
			?>
				
				<!--div class="table table-responsive">
				<div id="divRecords" class="table table-striped table-hover responsive-utilities jambo_table dataTable aria-describedby="example_info">
				</div>
				</div-->
            </div>
		
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <script>
// function ShowTable()
// {
	// $.post("Ajaxemployee.php",
	// {
		// Flag:"ShowRecords",
		// Date:$("#txtDate").val()
	// },
	// function (data,success)
	// {
		// $("#divShowTable").html(data);
	// });
											
// }
// $(document).ready(function()
	// {
		// ShowTable();
		// $('#txtDate').datepicker({
               // dateFormat: "yy-mm-dd"
                 // dateFormat: "HH:MM:ss"
          // });
	// });
</script>
   <?php
 include_once('../global/footer.php');
 include_once('../global/Modal_Member.php');
 ?> 