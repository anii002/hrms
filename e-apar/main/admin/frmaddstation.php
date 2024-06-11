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
		//ShowRecordsUser();
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
        Station Management
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
		<div class="box box-warning box-solid">
							<div class="box-header with-border">
							  <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Station Details...</h3>
							</div>
			<div class="box-body" style="padding:50px 50px 50px 50px;">
			<form method="post" id="frmaddemployee" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg" action="ajaxstation.php">  
			  <!--div id="output1"></div-->
			  <!--<button style="float: right;" data-toggle='modal' data-target='#myModalInternalLoan' name='btnadd' id='btnadd' type='button' class='btn btn-success btn-flat' onclick="ResetEditor();" ><i class='fa fa-plus'></i> &nbsp;&nbsp;Add New Employee</button>-->
			  
				<div class="form-group">
							<label class="col-md-4">Enter Station :</label>
							<div class="col-md-6">
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-train"></i></div>
								 <input type="text" name="txtstation" class="form-control primary" id="txtstation" size="50" placeholder="Please Enter Station Here" style="height: 37px;" required /><br><br>
							</div><br>
							</div>
				</div>
				<div class="clearfix"></div>
			  <input type="submit" value="ADD STATION" class="btn btn-success btn-flat btn-sm"/>
			</form>
				
				<div class="table table-responsive">
				<div id="divRecords" class="table table-striped table-hover responsive-utilities jambo_table dataTable aria-describedby="example_info">
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