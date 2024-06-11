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

 <!-- Left side column. contains the logo and sidebar -->
 <!-- Content Wrapper. Contains page content -->
	<style>
	.primary
	{
		box-shadow: none;
		border-color: #337AB7;
	}
</style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        APAR Grading Reprot
      </h1>
      <ol class="breadcrumb">
       
        <li class="active">
			
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
              <h3 class="" style="text-align:center;">APAR Grading Report for Three Years...</h3><hr>
            </div>
			<!--a href="" class="btn btn-primary btn-flat" onclick="window.print();" id="btnprint">Print</a-->
			<div class="box-body" style="padding:50px 10px 10px 10px;" >

			<?php
			if(isset($_GET["gid"]))
					{
						$groupid=$_GET["gid"];
					
					$sql_query = mysql_query("select * from tbl_finalgroupgrade where groupid='$groupid'");
					if($sql_fetch = mysql_fetch_array($sql_query))
					{
						?>
						<table class='table table-striped table-bordered table-hover' id='example' >
						<thead>
						<th>PF No</th>
						<th>Group ID</th>
						<th><?php echo $sql_fetch["year1"]?></th>
						<th><?php echo $sql_fetch["year2"]?></th>
						<th><?php echo $sql_fetch["year3"]?></th>
						<th>Total</th>
						<th>Remark</th>
						</thead>
						<tbody>
						
						<?php 
						
				$sqlcheck=mysql_query("select * from tbl_finalgroupgrade where groupid='$groupid'");
					while($rwSql=mysql_fetch_array($sqlcheck))
					{
						
						?>
						<tr>
						<td><?php echo $rwSql["pfno"]; ?></td>
						<td><?php echo $rwSql["groupid"]; ?></td>
						<td><?php echo $rwSql["grade1"]; ?></td>
						<td><?php echo $rwSql["grade2"]; ?></td>
						<td><?php echo $rwSql["grade3"]; ?></td>
						<td><?php echo $rwSql["total"]; ?></td>
						<td><?php echo $rwSql["remark"]; ?></td>
						</tr>
					<?php
					}
					?>
						
						</tbody>
					</table>
					<?php
					}
					else
					{
						?>
		
		
			<form method="get" id="frmaddemployee" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg" action="final_grading.php">  
			  <button type="submit" class="btn btn-primary btn-flat" id="btnsubmit"><i class="fa fa-save"></i> Save</button>
			  <div class="table-responsive" style="overflow-y: scroll;">
			 <br><br><br>
			 <input type='hidden' id='hid' name='hid' value='<?php echo $groupid; ?>' >
					<table class='table table-striped table-bordered table-hover' id='example' >
						<thead>
						<th>PF No</th>
						<th>Name</th>
						<th>Designation</th>
						<th>Cast</th>
						<?php
						$sql=mysql_query("SELECT * FROM year order by id desc limit 3");
						while($rev = mysql_fetch_array($sql))
						{
						 echo "<th>".$rev['years']."</th>";
						}
						?>
						<th>Total</th>
						<th>Remark</th>
						<th></th>
						</thead>
						<tbody>
						<?php 
						
						
						$sql_group=mysql_query("select distinct empid from group_details where group_id='$groupid'");
						while($rwGroup=mysql_fetch_array($sql_group))
						{
							$rowgrpid=$rwGroup["empid"];
						
						
							$sqlgroupmaster=mysql_query("select * from tbl_employee where emplcode='$rowgrpid'");
							while($rwGroupMaster=mysql_fetch_array($sqlgroupmaster))
							{
								$year=$rwGroupMaster["year"];
								?>
									<tr>
									<td><?php echo "<input id='emplid$rowgrpid' type='text' value=".$rwGroupMaster["emplcode"]." style='border:0px;' size='5' readonly>"; ?></td>
									<td><?php echo $rwGroupMaster["empname"]; ?></td>
									<td><?php echo $rwGroupMaster["design"]; ?></td>
									<td><?php echo $rwGroupMaster["stsc"]; ?></td>
									
							<?php
							}
							$cnt=0;
							$sql=mysql_query("SELECT * FROM year order by id desc limit 3");
							while($rev = mysql_fetch_array($sql))
							{
								$sqlyear=mysql_query("select * from scanned_apr where empid='$rowgrpid' AND year='".$rev['years']."'");
							    if($rwyear=mysql_fetch_array($sqlyear))
								{
									$rowyear=$rwyear["year"];
									//$emid=$rwyear["id"];
								
								?>
								
								<td><?php echo "<input id='txt1grade$rowyear' name='txt1grade$rowyear' type='text' size='10' value=".$rwyear["totalgrade"]." style='border:0px;' readonly>"; $cnt=$cnt+$rwyear["totalgrade"]; ?></td>
								<?php
								}
								else
								{
									echo "<td><input type='hidden' id='grade' name='grade' value='$rowgrpid'>
									<select class='nselect' id='$rowgrpid' name='$rowgrpid' value='$rowgrpid' >
									<option>-year-</option>";
									$sqlselect=mysql_query("select * from scanned_apr where empid='$rowgrpid'");
									while($rwselect = mysql_fetch_array($sqlselect))
									{
									echo "
									
									<option>".$rwselect['year']."</option>";
									}
									echo "</select><input type='text' id='ngrade$rowgrpid' name='ngrade$rowgrpid' style='border:0px' readonly></td>";
								}
								
							}
						
							echo "<td><input type='text' style='border:none;' size='4' id='nvalue$rowgrpid' name='nvalue$rowgrpid' value='$cnt' readonly></td>";
							$sql_remark=mysql_query("select * from tbl_graderemark where groupid='$groupid' AND empid='$rowgrpid'");
							$rwRemark=mysql_fetch_array($sql_remark);
							$getvar=$rwRemark["graderemark"];
							if($getvar=='')
						{

							echo "<td><input type='text' class='form-control primary' id='txtremark$rowgrpid' name='txtremark$rowgrpid'></td>";
						}else
							{
							echo "<td><input type='text' style='border:0px;' value='$getvar' readonly></td>";
							}
							echo "<td><a class='nbtn' id='$rowgrpid' name='$rowgrpid'><i class='fa fa-check'></i></a></td>";
							echo "</tr>";
						}
						?>
						</tbody>
					</table>
					
				</div>
			</form>
			
					<?php
					}
					}
					?>
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
		v1=$(this).val();
		var nvalue1=document.getElementById("nvalue"+id).value;
		
		
		
				$.ajax({
					type: "GET",
					url: "frmfetchgrade.php",
					data: "v1=" + v1+"&grade="+id+"&nvalue1="+nvalue1,
					cache: false,
					beforeSend: function() {
						$("#ngrade").html('<img src="../resources/loader.gif" alt="" width="24" height="24">');
					},
					success: function(html) 
					{
						
						var varible=parseInt(nvalue1)+parseInt(html);
						$("#"+id).hide();
					document.getElementById("nvalue"+id).value=varible;
					document.getElementById("ngrade"+id).value=html+"("+v1+")";
					
					//$("#ngrade"+id).html(html+"("+v1+")");
					}
				});
		
	});
	
	
});  

$(".nbtn").click(function()
	{
		
		id=$(this).attr('id');
		var nvalue1=document.getElementById("txtremark"+id).value;
		var v1=document.getElementById("hid").value;
		 $.ajax({
					type: "POST",
					url: "Ajaxgraderemark.php",
					data: "nvalue1=" + nvalue1+"&v1="+ v1+"&id="+id,
					cache: false,
					beforeSend: function() {
						$('#gradeshow'+id).html('<img src="../resources/loader.gif" alt="" width="24" height="24">');
					},
					success: function(html) 
					{
						$("#gradeshow"+id).html(html);
						$("#txtremark"+id).hide();
						window.location.reload();
						
					}
				});
  }); 

</script>
   <?php
 include_once('../global/footer.php');
 ?> 