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
	<h1>Employee Reason</h1>
      <section class="content-header">
      <ol class="breadcrumb">
        <li class="active">
			<a href="index.php"><button type="button" class="btn btn-success" id="#btn1"><i class="fa fa-mail-reply"> Back</i></button></a>
		</li>
	  </ol>
	  <br>
    </section>
    </section>
	
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	<!--hr style="width:100%;height:3px;background-color:green;"-->
      <div class="row">
		<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;View Reason...</h3><hr>
            </div>
			<div class="box-body" style="padding:50px 50px 50px 50px;">
			<?php
			if(isset($_GET["emplcode"])!='')
			{
				$employeepf = $_GET["emplcode"];
				$reyear = $_GET["year"];
				//echo $employeepf;
			 $sql_Resonequery = mysql_query("select * from tbl_reason where empcode='".$employeepf."' AND financialyear='$reyear'");
				while($resultreason=mysql_fetch_array($sql_Resonequery))
				{
			?>
			<form method="post" id="frmreasone" enctype="multipart/form-data" role="form" accept="image/jpg,image/png,image/gif,image/jpeg" action="Ajaxreason.php">
				<div class="modal-body" style="overflow-y: scroll;">
					<div class="form-group">
							<label class="col-md-4">Year :</label>
							<div class="col-md-6">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
								<input type="text" class="form-control primary" id="txtyear" name="txtyear" value="<?php echo $resultreason["financialyear"];?>" readonly />
							</div><br>
							</div>
							<label class="col-md-4">Employee No/ PF No :</label>
							<div class="col-md-6">
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-calculator"></i></div>
								<input type="text" class="form-control primary" id="txtempcode" name="txtempcode" value="<?php echo $resultreason["empcode"];?>" readonly />
							</div><br>
							</div>
							<label class="col-md-4">Reasone :</label>
							<div class="col-md-6">
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-font"></i></div>
							<input type="text" class="form-control primary" id="txtempcode" name="txtempcode" value="<?php echo $resultreason["reasontype"];?>" readonly />
							</div><br>
							</div>

					</div>
              </div>
			  
				<div class="form-group">
				<div class="col-md-12">
				<!--a href="frmsample.php"><button type="button"  class="btn btn-success" style="float:left;"><i class="fa fa-mail-reply"> Back</i></button></a-->
					<input type="reset" id="btnreset" name="btnreset" value="Reset" class="btn btn-default" />
					<input type="button"  id="btnrefresh" name="btnrefresh" value="Refresh"class="btn btn-info" onClick="window.location.reload()"/>
					<br>
					<br>
					<br>
				</div>
				</div>
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
		
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
   <?php
 include_once('../global/footer.php');
 ?> 