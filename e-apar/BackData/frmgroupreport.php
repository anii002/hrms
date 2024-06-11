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
		<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Station Details...</h3><hr>
            </div>
			<div class="box-body" style="padding:50px 50px 50px 50px;">
			<form method="post" id="frmaddemployee" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg" action="ajaxstation.php">  
			  <div class="table-responsive" style="overflow-y: scroll;">
			  <?php	
					if(isset($_GET["gid"]))
					{
						$groupid=$_GET["gid"];
					}
				  
				  ?>
					<table class='table table-striped table-bordered table-hover' id='tbl_employee' style="width:170%;">
						<thead>
						<th>Employee PF No</th>
						<th>Employee Name</th>
						<th>Designation</th>
						<th>Cast</th>
						<th>2016</th>
						<th>2015</th>
						<th>2014</th>
						</thead>
						<tbody>
						<?php 
						
						
						$sql_group=mysql_query("select distinct empid from group_details where group_id='$groupid'");
						while($rwGroup=mysql_fetch_array($sql_group))
						{
							$rowgrpid=$rwGroup["empid"];
							//$rowyear=$rwGroup["year"];
						
						
							$sqlgroupmaster=mysql_query("select * from tbl_employee where emplcode='$rowgrpid'");
							while($rwGroupMaster=mysql_fetch_array($sqlgroupmaster))
							{
								$year=$rwGroupMaster["year"];
								?>
									<tr>
									<td><?php echo $rwGroupMaster["emplcode"]; ?></td>
									<td><?php echo $rwGroupMaster["empname"]; ?></td>
									<td><?php echo $rwGroupMaster["design"]; ?></td>
									<td><?php echo $rwGroupMaster["stsc"]; ?></td>
									
							<?php
							}
							$sql=mysql_query("SELECT * FROM year order by id desc limit 3");
							while($rev = mysql_fetch_array($sql))
							{
								$sqlyear=mysql_query("select * from scanned_apr where empid='$rowgrpid' AND year='".$rev['years']."'");
							    if($rwyear=mysql_fetch_array($sqlyear))
								{
									$rowyear=$rwyear["year"];
									$emid=$rwyear["id"];
								?>
								
								<td><?php echo $rwyear["totalgrade"]; ?></td>
								<?php
								}
								else
								{
									echo "<td><input type='hidden' id='grade' name='grade' value='$rowgrpid'><select class='nselect' id='$rowgrpid' name='$rowgrpid' value='$rowgrpid' onChange='selectYear()'><option>-year-</option>";
									$sqlselect=mysql_query("select * from scanned_apr where empid='$rowgrpid'");
									while($rwselect = mysql_fetch_array($sqlselect))
									{
									echo " NA
									
									<option>".$rwselect['year']."</option>";
									}
									echo "</select><div id='$emid' name='$emid' class='ngrade'></div></td>";
								}
								
							}
							echo "</tr>";
						}
						?>
						</tbody>
					</table>
				</div>
			</form>
				
				
            </div>
		</div>
		
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <script>
  
$(document).ready(function () 
{
	var id;
	var v1;
	var divid;
	var empgrade=document.getElementById("grade").value;
	$(".nselect").change(function()
	{
		
		id=$(this).attr('id');
		//divid=$(this).attr();
		v1=$(this).val();
		// alert(v1);
		// alert(id);
		// $("#"+id).hide();
		
				$.ajax({
					type: "GET",
					url: "frmfetchgrade.php",
					data: "v1=" + v1+"&grade="+empgrade,
					cache: false,
					beforeSend: function() {
						$(".ngrade").html('<img src="../resources/loader.gif" alt="" width="24" height="24">');
					},
					success: function(html) 
					{
						$(".ngrade").html(html);
						//$("#"+id).hide();
					}
				});
		
	});
	
	
});   
</script>
   <?php
 include_once('../global/footer.php');
 include_once('../global/Modal_Member.php');
 ?> 