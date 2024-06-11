<?php 
 session_start();
 if(!isset($_SESSION['SESS_MEMBER_NAME']))
 {
	 echo "<script>window.location='http://localhost/E-APAR/index.php';</script>";
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
					//alert(data);
					//ShowRecords();
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

<!-- Left side column. contains the logo and sidebar -->
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	<h1>APAR DETAILS</h1>
      <ol class="breadcrumb">
        <li class="active">
			<a href="frmsample.php"><button type="button" class="btn btn-success" id="#btn1"><i class="fa fa-mail-reply"> Back</i></button></a>
		</li>
	  </ol>
	  <br>
    </section>
	<br><br>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	
      <div class="row">
	 <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-tags"></i>&nbsp;&nbsp; Employee APAR Details...</h3><hr>
            </div>
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
		  $empcode=$rwEmpEdit["emplcode"];
		  $empyear=$rwEmpEdit["year"];
		  ?>
			<form method="post" id="frmaddemployee" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg" action="">  
			  <!--div id="output1"></div-->
			  <!--<button style="float: right;" data-toggle='modal' data-target='#myModalInternalLoan' name='btnadd' id='btnadd' type='button' class='btn btn-success btn-flat' onclick="ResetEditor();" ><i class='fa fa-plus'></i> &nbsp;&nbsp;Add New Employee</button>-->
			 <div class="form-group">
			 <label class="col-md-2 col-sm-4"> Year </label>
						<div class="col-md-4 col-sm-4">
						<div class="input-group">
						
							<select class="form-control primary" id="cmbyear" name="cmbyear" readonly>
							<option value="<?php echo $rwEmpEdit["year"]; ?>"><?php echo $rwEmpEdit["year"]; ?></option>
							</select>
						</div><br>
						</div>
						
						<label class="col-md-2 col-sm-4">Employee Code </label>
						<div class="ccol-md-4 col-sm-4">
						<div class="input-group">
							<input type="number" class="form-control primary" id="txtempcode" name="txtempcode" value="<?php echo $rwEmpEdit["emplcode"];?>" readonly />
						</div><br>
						</div>
						
						<label class="col-md-2 col-sm-4">Employee Name  </label>
						<div class="col-md-4 col-sm-4">
						<div class="input-group">
						<input type="text" class="form-control primary" id="txtempname" name="txtempname" value="<?php echo $rwEmpEdit["empname"];?>" readonly />
						</div><br>
						</div>
					</div>
					
				<div class="form-group">
						<label class="col-md-2 col-sm-4">Department</label>
						<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<select class="form-control primary" id="cmbdept" name="cmbdept" readonly>
							<option value="<?php echo $rwEmpEdit["dept"]; ?>"><?php echo $rwEmpEdit["dept"]; ?></option>
							</select>
						</div><br>
						</div>
						
				<label class="col-md-2 col-sm-4">Designation</label>
				<div class="col-md-4 col-sm-4">
					<div class="input-group">
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
								<select class="form-control primary" id="cmbstation" name="cmbstation" readonly>
									<option value="<?php echo $rwEmpEdit["station"]; ?>"><?php echo $rwEmpEdit["station"]; ?></option>
								</select>
						</div><br>
						</div>
				
						<label class="col-md-2 col-sm-4">Pay Scale </label>
						<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<input type="text" class="form-control primary" id="txtpayscale" name="txtpayscale" value="<?php echo $rwEmpEdit["payscale"];  ?>" readonly />
						</div><br>
						</div>
				</div>
						
				<div class="form-group">		
						<label class="col-md-2 col-sm-4">Integrity</label>
						<div class="col-md-4 col-sm-4">
						<div class="input-group">
						<input type="text" class="form-control primary" id="txtinterity" name="txtinterity"  value="<?php echo $rwEmpEdit["integrity"];  ?>" readonly />
						</div><br>
						</div>
						
						<label class="col-md-2 col-sm-4">Substantive </label>
						<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<input type="number" class="form-control primary" id="txtsubstantive" name="txtsubstantive"   value="<?php echo $rwEmpEdit["substantive"];  ?>" readonly />
						</div><br>
						</div>
				</div>
						
				<div class="form-group">		
						<label class="col-md-2 col-sm-4">ST SC</label>
						<div class="col-md-4 col-sm-4">
						<div class="input-group">
						<input type="text" class="form-control primary" id="txtstsc" name="txtstsc"  value="<?php echo $rwEmpEdit["stsc"];  ?>" readonly />
						</div><br>
						</div>
						<label class="col-md-2 col-sm-4">Mobile number </label>
						<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<input type="number" class="form-control primary" id="txtsubstantive" name="txtsubstantive"   value="<?php echo $rwEmpEdit["contact"];  ?>" readonly />
						</div><br>
						</div>
						
						<label class="col-md-2 col-sm-4">Selected Year </label>
						<div class="col-md-4">
						<div class="input-group">
							<select class="form-control primary" id="txtyear" name="txtyear" onChange=";">
							<option value="">--Select Year--</option>
									<?php
									
										$employeeid=$rwEmpEdit["emplcode"];
										 //$sqlscapr=mysql_query("select year from tbl_employee where emplcode='$employeeid'");
										 $sqlscapr=mysql_query("select distinct year from scanned_img where empid='$employeeid'");
										while($rwYear=mysql_fetch_array($sqlscapr))
										{
											$rowempid=$rwYear["empid"];
										?>
									<option value="<?php echo $rwYear["year"];?>"><?php echo $rwYear["year"];?></option>
										<?php
										}
									?>
							</select>
						</div>
						
						</div>
						
						
						<div class="col-md-8">
						<div class="input-group">
						<button type="submit" class="btn btn-primary btn-block btn-flat" id="btnmultiple" name="btnmultiple">Multiple Year Image</button>
						</div>
						</div>
						
						<div id="output1">
						</div>
				</div>
				</div>
				</div><!--box info-->
				</div>
			</form>
			<div class="row" id="show_multiple" name="show_multiple">
			<div class="col-md-8">
				<div class='demo-gallery'>
						<ul id='lightgallery' class='list-unstyled row'>
			<?php
			if(isset($_POST["btnmultiple"]))
			{
				$sqlMultiple1=mysql_query("select distinct year from scanned_img where empid='$employeeid'");
				while($rwMultiImage1=mysql_fetch_array($sqlMultiple1))
				{
					$rwImage = $rwMultiImage1["year"];
					echo "<label style='font-size:22px;'>".$rwImage."</label><br>";
					$sqlMultiple2=mysql_query("select image from scanned_img where empid='$employeeid' AND year='$rwImage'");
				while($rwMultiImage2=mysql_fetch_array($sqlMultiple2))
				{
					$filename=$rwMultiImage2['image'];
					if($filename!=" ")
						{
				 echo "<li class='col-xs-6 col-sm-4 col-md-3' data-responsive='../resources/NAME_PFNO/$employeeid/$rwImage/$filename' data-src='../resources/NAME_PFNO/$employeeid/$rwImage/$filename'>
					<a href='../resources/NAME_PFNO/$employeeid/$rwImage/$filename'> 
					<img src='../resources/NAME_PFNO/$employeeid/$rwImage/$filename'  style='width:250px;height:250px;' alt='$rwImage'></a>
					<a href='Ajaxdelete.php?empid=".$employeeid."&year=".$rwImage."&image=".$filename."' class='btn btn-primary btn-flat btn-sm'  id='btnYear' name='btnYear' onclick='display_multiple()'><i class='fa fa-trash'></i> DELETE $rwImage</a></li>";   
					?>
					
				<?php
				}else
				{
					$file="";
				}
				}
				   echo "<div class='clearfix'></div>";
				}
			}
		}
		}
			?>
			</ul>
			</div>
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
		var empcode = document.getElementById("txtempcode").value;
		$("#output1").html("");
		if (txtyear.length > 0 ) 
			{
				$.ajax({
					type: "POST",
					url: "demo/fetch_state.php",
					data: "txtyear=" + txtyear+"&empcode="+ empcode,
					//data: "empcode="+ empcode,
					
					cache: false,
					beforeSend: function() {
						$('#output1').html('<img src="../resources/loader.gif" alt="" width="24" height="24">');
					},
					success: function(html) 
					{
						$("#output1").html(html);
						$('#show_multiple').hide();
					}
				});
				 
			}	
	}
	
	
	function display_multiple()
	{
		alert('Multiple');
	}	
</script>		
   <?php
 include_once('../global/footer.php');
 include_once('../global/Modal_Member.php');
 ?> 
 
		
		
		