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
</script> 
<style>
	.primary
	{
		border:0px;
	}
</style>
<!-- Left side column. contains the logo and sidebar -->
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin
      </h1>
      <ol class="breadcrumb">
       
        <li class="active">
			<a href="frmsample.php"><button type="button" class="btn btn-success" id="#btn1"><i class="fa fa-mail-reply"> Back</i></button></a>
	
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
		  $empyear=$rwEmpEdit["year"];
		  ?>
			<form method="post" id="frmaddemployee" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg" action="Ajaxeditemployee.php">  
			  <!--div id="output1"></div-->
			  <!--<button style="float: right;" data-toggle='modal' data-target='#myModalInternalLoan' name='btnadd' id='btnadd' type='button' class='btn btn-success btn-flat' onclick="ResetEditor();" ><i class='fa fa-plus'></i> &nbsp;&nbsp;Add New Employee</button>-->
			 <div class="form-group">
			 <label class="col-md-2 col-sm-4"> Year </label>
						<div class="col-md-4 col-sm-4">
						<div class="input-group">
						<div class="input-group-addon"></div>
							<select class="form-control primary" id="cmbyear" name="cmbyear" readonly>
							<option value="<?php echo $rwEmpEdit["year"]; ?>"><?php echo $rwEmpEdit["year"]; ?></option>
							</select>
						</div><br>
						</div>
						
						<label class="col-md-2 col-sm-4">Employee Code </label>
						<div class="ccol-md-4 col-sm-4">
						<div class="input-group">
						<div class="input-group-addon"></div>
							<input type="number" class="form-control primary" id="txtempcode" name="txtempcode" value="<?php echo $rwEmpEdit["emplcode"];?>" readonly />
						</div><br>
						</div>
						
						<label class="col-md-2 col-sm-4">Employee Name  </label>
						<div class="col-md-4 col-sm-4">
						<div class="input-group">
						<div class="input-group-addon"></div>
						<input type="text" class="form-control primary" id="txtempname" name="txtempname" value="<?php echo $rwEmpEdit["empname"];?>" readonly />
						</div><br>
						</div>
					</div>
					
				<div class="form-group">
						<label class="col-md-2 col-sm-4">Department</label>
						<div class="col-md-4 col-sm-4">
						<div class="input-group">
						<div class="input-group-addon"></div>
							<select class="form-control primary" id="cmbdept" name="cmbdept" readonly>
							<option value="<?php echo $rwEmpEdit["dept"]; ?>"><?php echo $rwEmpEdit["dept"]; ?></option>
							</select>
						</div><br>
						</div>
						
				<label class="col-md-2 col-sm-4">Designation</label>
				<div class="col-md-4 col-sm-4">
					<div class="input-group">
					  <div class="input-group-addon"> </div>
						<select class="form-control primary" id="cmbdesignation" name="cmbdesignation" readonly>
						<option value="<?php echo $rwEmpEdit["design"]; ?>"><?php echo $rwEmpEdit["design"]; ?></option>
					
						</select>
					</div><br>
				</div>
				</div>
				
				<div class="form-group">
						<label class="col-md-2 col-sm-4">Station</label>
						<div class="col-md-4 col-sm-4">
						<div class="input-group">
						  <div class="input-group-addon"></div>
								<select class="form-control primary" id="cmbstation" name="cmbstation" readonly>
									<option value="<?php echo $rwEmpEdit["station"]; ?>"><?php echo $rwEmpEdit["station"]; ?></option>
								</select>
						</div><br>
						</div>
				
						<label class="col-md-2 col-sm-4">Pay Scale </label>
						<div class="col-md-4 col-sm-4">
						<div class="input-group">
						<div class="input-group-addon"></div>
							<input type="number" class="form-control primary" id="txtpayscale" name="txtpayscale" value="<?php echo $rwEmpEdit["payscale"];  ?>" readonly />
						</div><br>
						</div>
				</div>
						
				<div class="form-group">		
						<label class="col-md-2 col-sm-4">Integrity</label>
						<div class="col-md-4 col-sm-4">
						<div class="input-group">
						<div class="input-group-addon"></div>
						<input type="text" class="form-control primary" id="txtinterity" name="txtinterity"  value="<?php echo $rwEmpEdit["integrity"];  ?>" readonly />
						</div><br>
						</div>
						
						<label class="col-md-2 col-sm-4">Substantive </label>
						<div class="col-md-4 col-sm-4">
						<div class="input-group">
						<div class="input-group-addon"></div>
							<input type="number" class="form-control primary" id="txtsubstantive" name="txtsubstantive"   value="<?php echo $rwEmpEdit["substantive"];  ?>" readonly />
						</div><br>
						</div>
				</div>
						
				<div class="form-group">		
						<label class="col-md-2 col-sm-4">ST SC</label>
						<div class="col-md-4 col-sm-4">
						<div class="input-group">
						<div class="input-group-addon"></div>
						<input type="text" class="form-control primary" id="txtstsc" name="txtstsc"  value="<?php echo $rwEmpEdit["stsc"];  ?>" readonly />
						</div><br>
						</div>
						
						<label class="col-md-2 col-sm-4">Selected Year </label>
						<div class="col-md-8">
						<div class="input-group">
						  <div class="input-group-addon"></div>
							<select class="form-control primary" id="txtyear" name="txtyear" onChange="showImage(this);">
							<option value="<?php echo $rwEmpEdit["year"];?>"><?php echo $rwEmpEdit["year"];?></option>
									<?php
										
										// $sqlscapr=mysql_query("select * from scanned_apr");
										// while($rwYear=mysql_fetch_array($sqlscapr))
										// {
										
										$employeeid=$rwEmpEdit["emplcode"];
										 $sqlscapr=mysql_query("select * from tbl_employee where year='$empyear'");
										while($rwYear=mysql_fetch_array($sqlscapr))
										{
										?>
									<option value="<?php echo $rwYear["year"];?>"><?php echo $rwYear["year"];?></option>
										<?php
										}
									?>
							</select>
						</div><br>
						
						</div>
						<div id="output1">
						</div>
						<!--div class="col-md-4 col-sm-4">
						<div class="input-group">
						<div class="input-group-addon"></div>
							<img src="../resources/NAME_PFNO/<?php print $rwEmpEdit["uploadfile"];?>" style="width:100px;height:100px;">
							<input type="hidden" class="form-control primary" id="txtempid" name="txtempid"  value="<?php echo $rwEmpEdit["empid"]; ?>"/>
							<input type="hidden"  id="txtsession" name="txtsession" value="<?php echo $_SESSION['SESS_ADMIN_NAME']; ?>" /></div>
						</div--><br>
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
	function showImage(sel) 
	{
		var txtyear = sel.options[sel.selectedIndex].value;
		$("#output1").html("");
		if (txtyear.length > 0) 
			{
				$.ajax({
					type: "POST",
					url: "fetch_state.php",
					data: "txtyear=" + txtyear,
					cache: false,
					beforeSend: function() {
						$('#output1').html('<img src="../resources/loader.gif" alt="" width="24" height="24">');
					},
					success: function(html) 
					{
						$("#output1").html(html);
					}
				});
			}	
	}
</script>		
   <?php
 include_once('../global/footer.php');
 include_once('../global/Modal_Member.php');
 ?> 