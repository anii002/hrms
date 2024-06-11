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
function ShowRecordsEmployee()
{
	$.post("Ajaxemployee.php",
				{
					Flag:"ShowRecordsEmployee"
				},
					function(data,success)
					{
						$("#divRecords").html(data);
						var oTable = $('#tbl_employee').dataTable
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
</script><!-- Left side column. contains the logo and sidebar -->
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin
      </h1>
      <ol class="breadcrumb">
       
        <li class="active">
			<a href="frmaddemployee.php"><button type="submit" class="btn btn-success btl-block" id="" name=""><i class="fa fa-mail-reply"></i>&nbsp;&nbsp;BACK
			</button></a>
      </li>
	  </ol>
	  <br>
    </section>
	
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	
      <div class="row">
	<div class="box-body" style="padding:50px 50px 50px 50px;">
		 <form method="post" id="frmshowemployee" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg" action="ajaxstation.php">  
			<table class='table table-striped table-bordered table-hover' >
					<thead>
							<tr class='odd gradeX'>
								<th style='display:none;><i class='fa fa-fa'></i> Employee Code</th>
								<th><i class='fa fa-fa'></i>Employee ID</th>
								<th><i class='fa fa-gallary'></i> Name </th>
								<th><i class='fa fa-calendar'></i> Design </th>
								<th><i class='fa fa-calendar'></i> Station </th>
								<th><i class='fa fa-calendar'></i> Pay scale </th>
								<th><i class='fa fa-calendar'></i> APAR List </th>
							</tr>
					</thead>
					<tbody>
					<?php
					if(isset($_GET["empid"]))
					{
				
						$sample=$_GET["empid"];
						$sqlemployee=mysql_query("select * from tbl_employee where emplcode='$sample'");
						while($rwEmployee=mysql_fetch_array($sqlemployee,MYSQL_ASSOC))
						{
							$empid=$rwEmployee["emplcode"];
							$year=$rwEmployee["year"];
							$emplcode=$rwEmployee["emplcode"];
							$dept=$rwEmployee["dept"];
							$design=$rwEmployee["design"];
							$station=$rwEmployee["station"];
							$payscale=$rwEmployee["payscale"];
							$year=$rwEmployee["year"];
							$uploadfile=$rwEmployee["uploadfile"];
							$empname = $rwEmployee["empname"];
						
					
						?>
						<tr>
						<td style="display:none;"><?php echo $empid; ?></td>
						<td><?php echo $emplcode; ?></td>
						<td><?php echo $empname; ?></td>
						<td><?php echo $design; ?></td>
						<td><?php echo $station; ?></td>
						<td><?php echo $payscale; ?></td>
						</tr>
						<?php
						}
						}
						?>
					</tbody>
			</table>
			
			 </form>
				
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
 <?php
 include_once('../global/footer.php');
 ?> 