<?php 
 session_start();
 if(!isset($_SESSION['SESS_MEMBER_NAME']))
 {
	 echo "<script>window.location='http://drmpsur-hrms.in/e-apar/index.php';</script>";
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
					// alert(data);
					// ShowRecords();
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
        User Managemnet
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
	<!--hr style="width:100%;height:3px;background-color:green;"-->
      <div class="row">
		<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add User Type Under Departments...</h3><hr>
            </div>
			<div class="box-body" style="padding:50px 50px 50px 50px;">
			<form method="post" id="frmadddepartment" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg" action="AjaxAdddepartment.php">  
			  <!--div id="output1"></div-->
			  <!--<button style="float: right;" data-toggle='modal' data-target='#myModalInternalLoan' name='btnadd' id='btnadd' type='button' class='btn btn-success btn-flat' onclick="ResetEditor();" ><i class='fa fa-plus'></i> &nbsp;&nbsp;Add New Employee</button>-->
			  <div class="form-group">
					<label class="col-md-4">Enter Department :</label>
					<div class="col-md-8">
					<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-cube"></i></div>
						<select class="form-control primary" id="cmbdept" name="cmbdept">
						<option value="" selected hidden disabled>-- Select Department Here -- </option>
						<?php
							$sqlDept=mysqli_query($conn,"select * from tbl_department");
							while($rwDept=mysqli_fetch_array($sqlDept))
							{
						?>
						<option value="<?php echo $rwDept["dept_id"]; ?>"><?php echo $rwDept["deptname"]; ?></option>
						<?php
						}
						?>
						</select>
					</div><br>
					</div>
					<label class="col-md-4">Enter User Type :</label>
					<div class="col-md-8">
					<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-user"></i></div>
						<input type="text" class="form-control primary" id="txtusertype" name="txtusertype" placeholder="Enter User Type Here"  />	
					</div><br>
					</div>
					<label class="col-md-4">Select Date :</label>
					<div class="col-md-8">
					<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
						<input type="date" name="txtdate" id="txtdate" class="form-control primary"/>
						<input type="hidden" name="txtsesion" id="txtsesion" class="form-control primary" value="<?php echo $_SESSION['SESS_ADMIN_NAME']; ?>"/>
					</div><br>
					</div>
					
					<div class="col-md-8">
					<input type="submit" id="btnSave" name="btnSave" value="Save"  class="btn btn-success" />&nbsp;&nbsp;&nbsp;
					<input type="reset" id="btnreset" name="btnreset" value="Reset" class="btn btn-default" />&nbsp;&nbsp;
					<input type="button"  id="btnrefresh" name="btnrefresh" value="Refresh"class="btn btn-info" onClick="window.location.reload()"/>
					</div><br>
					</div>
				</div>
			</form>
				
				<!--div class="table table-responsive">
				<div id="divRecords" class="table table-striped table-hover responsive-utilities jambo_table dataTable aria-describedby="example_info">
				</div>
				</div-->
            </div>
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