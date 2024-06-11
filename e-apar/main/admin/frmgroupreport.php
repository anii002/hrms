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
			<button class="btn bg-navy btn-flat" onclick="printDiv();" id="btnprint">Print</button>
      </li>
	  </ol>
	  <br>
    </section>
	
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	
      <div class="row">
		<div class="box box-info">
            <!--div class="box-header">
              <h3 class="" style="text-align:center;">APAR Grading Report for Three Years...</h3><hr>
            </div-->
			
			
			<?php
			if(isset($_GET["gid"]))
					{
						$groupid=$_GET["gid"];
				
					$sql_query = mysql_query("select * from tbl_finalgroupgrade where groupid='$groupid'");
					if($sql_fetch = mysql_fetch_array($sql_query))
					{
						echo "<div class='' id='hidebutton' name='hidebutton' style='padding-left:20px;padding-top:20px;'><a href='AjaxDeleteFinal.php?grp=$groupid' class='btn btn-primary btn-flat' id='btngenerate' name='btngenerate'><i class='fa fa-save'></i> Regenerate</a></div>";
						?>
						<div class="box-body" style="padding:10px 10px 10px 10px;" id="divemp">
						
						<div class="col-md-12" style="text-align:center;font-size:16px;"> 
						<?php
						$sql_header = mysql_query("select * from tbl_header where groupid = '$groupid' order by HDR_id desc limit 1");
						while($rwHeader = mysql_fetch_array($sql_header))
						{
						//}
						?>
							<div style="margin-left: 70%;" class="col-md-12">
								<div class="col-md-1" >
								<label>Date</label>
								</div>
								<div class="col-md-2">
								<label><?php echo $rwHeader["curdate"]; ?></label> 
								</div>
							</div>
							<br><br>
							<div class="clearfix"></div>
						<div class="col-md-12" style="text-align:center;">
							<label>Statement of APAR Grading for</label>
							&nbsp;&nbsp;<label>"<?php echo $rwHeader["selection"]; ?>"</label>
							&nbsp;&nbsp;<label>for the</label><br><label> post of </label>
								&nbsp;&nbsp;<label>"<?php echo $rwHeader["postof"]; ?>" &nbsp;&nbsp;in </label>
								&nbsp;&nbsp;<label>"<?php echo $rwHeader["department"]; ?>"</label><br>
								<label>Notification no. </label>
							&nbsp;&nbsp;<label>"<?php echo $rwHeader["notification"]; ?>"</label> &nbsp;
							&nbsp;&nbsp;<label>Dated</label>&nbsp;&nbsp;
							<label>"<?php echo $rwHeader["dated"]; ?>"</label>
						<?php
						}
						?>
						</div>
						</div>
						
			<form action="AjaxDeleteFinal.php" method="post" enctype="multipart/form-data" id="fmrgroupreport">
						<table class='table table-striped table-bordered table-hover' id='example' class="font-size:12px;" >
						<thead>
							<th>Sr.no.</th>
							<th>PF No</th>
							<th>Name</th>
							<th>Department</th>
							<th>Designation</th>
							<th><?php echo $sql_fetch["year1"]?></th>
							<th><?php echo $sql_fetch["year2"]?></th>
							<th><?php echo $sql_fetch["year3"]?></th>
							<th>Total</th>
							<th>Grade</th>
							<th>Remark</th>
						</thead>
						<tbody>
							<?php 
							$cnt=1;
							$sqlcheck=mysql_query("select * from tbl_finalgroupgrade where groupid='$groupid'");
							while($rwSql=mysql_fetch_array($sqlcheck))
							{
								$emppf = $rwSql["pfno"];
								$year = $rwSql["year1"];
								$grpid = $rwSql["groupid"];
								
							?>
								<tr>
									<td><?php echo $cnt++; ?></td>
									<td><?php echo "<a href='frmshowemployee.php?emppf=".$emppf."'>".$emppf."</a>"; ?></td>
									<?php
									
										
										$sql = mysql_query("select * from tbl_employee where emplcode = '$emppf'");
										$sql_fetch_record = mysql_fetch_array($sql);
										
										$emplid = $sql_fetch_record["emplcode"];
										$emplyear = $sql_fetch_record["year"];
										
									?>
									<td><?php echo $sql_fetch_record["empname"]; ?></td>
									<td><?php echo $sql_fetch_record["dept"]; ?></td>
									<td><?php echo $sql_fetch_record["design"]; ?></td>
									<td><?php echo "<a  href='sample_demo.php?gid=$groupid&emplcode=$emplid&year=$emplyear' data-toggle='modal' data-target='#myModalImage' role='button' >".$rwSql["grade1"]."</a>"; ?></td>
									
									<td><?php echo "<a  href='sample_demo.php?gid=$groupid&emplcode=$emplid&year=$emplyear' data-toggle='modal' data-target='#myModalImage' role='button' >".$rwSql["grade2"]."</a>"; ?></td>
									
									<td><?php echo "<a  href='sample_demo.php?gid=$groupid&emplcode=$emplid&year=$emplyear' data-toggle='modal' data-target='#myModalImage' role='button' >".$rwSql["grade3"]."</a>"; ?></td>
									<td><?php echo $rwSql["total"];  ?></td>
									<td><?php echo intval($rwSql["total"]/3);  ?></td>
									<?php
										switch(intval($rwSql["total"]/3))
										{
											case 1: echo "<td>Below Average</td>"; break;
											case 2: echo "<td>Average</td>"; break;
											case 3: echo "<td>Good</td>"; break;
											case 4: echo "<td>Very Good</td>"; break;
											case 5: echo "<td>Outstanding</td>"; break;
										}
									?>
									
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
					$num=1;
					?>
			</form>
		
			<form method="get" id="frmaddemployee" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg" action="final_grading.php">  
			<div class="col-md-12" style="text-align:center;">
							<div style="margin-left: 65%;" class="col-md-12">
								<div class="col-md-1" >
								<label>Date</label>
								</div>
								<div class="col-md-3">
								<input type="date" name="selectdate" id="selectdate" class="form-control"> 
								</div>
							</div>
						<div class="col-md-2"></div>
							<br><br><br>
							<div class="col-md-3">
							<label>Statement of APAR Grading for</label>
							</div>
							<div class="col-md-3">
							<input type="hidden" value="<?php echo $groupid; ?>" id="txtgrpid" name="txtgrpid" />
							<select class="form-control col-md-2" id="ncmbselect" name="ncmbselect">
							<option value="" selected hidden disabled>-- Please Select --</option>
							<option>Selection</option>
							<option>Suitability</option>
							</select>
							</div>
							<div class="clearfix"></div>
							<div class="col-md-2"><label>for the post of </label></div>
							<div class="col-md-3">
								<select class="form-control select2" id="cmbselect" name="cmbselect" style="width: 100%;">
								  <option></option>
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
							</div>	
							<div class="col-md-1">in</div>
							
							<div class="col-md-3">
								<select class="form-control select2" id="cmbselect2" name="cmbselect2" style="width: 100%;">
								<option></option>
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
							</div>
								<div class="clearfix"></div>
				
							<div class="col-md-2"><label>Notification no. </label></div>
							<div class="col-md-3">
							<input type="text" id="txtnotifi" name="txtnotifi" class="form-control"/> 
							</div>
							<div class="col-md-1"><label>Dated</label></div>
							<div class="col-md-3">
							<input type="text" id="notifydate" name="notifydate" class="form-control"/>
							</div>
							

			</div>			
						
						<div class="clearfix"></div>
						<br><br>
			
			
			
			
			  <button type="submit" class="btn btn-primary btn-flat" id="btnsubmit"><i class="fa fa-save"></i> Save</button>
			  <div class="table-responsive" >
			 <br><br><br>
			 <input type='hidden' id='hid' name='hid' value='<?php echo $groupid; ?>' >
					<table class='table table-striped table-bordered table-hover table-condensed' id='example' style="font-size:12px;" >
						<thead>
						<th>PF No</th>
						<th>Name</th>
						<th>Designation</th>
						<th>Caste</th>
						<?php
						$sql=mysql_query("SELECT * FROM year order by id desc LIMIT 1,3");
						while($rev = mysql_fetch_array($sql))
						{
						 echo "<th>".$rev['years']."</th>";
						}
						?>
						<th>Total</th>
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
								$empcode=$rwGroupMaster["emplcode"];
								?>
									<tr>
									<td><?php echo "<a href='frmshowemployee.php?emppf=".$empcode."'><input id='emplid$rowgrpid' type='text' value=".$rwGroupMaster["emplcode"]." style='border:0px;' size='12' readonly></a>"; ?></td>
									<td><?php echo $rwGroupMaster["empname"]; ?></td>
									<td><?php echo $rwGroupMaster["design"]; ?></td>
									<td><?php echo $rwGroupMaster["stsc"]; ?></td>
									
							<?php
							}
							$cnt=0;
							$sql=mysql_query("SELECT * FROM year order by id desc limit 1,3");
							
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
									<select class='nselect' id='$num' name='$num' value='".$rowgrpid."' >
									<option>-year-</option>";
									$sqlselect=mysql_query("select * from scanned_apr where empid='$rowgrpid'");
									while($rwselect = mysql_fetch_array($sqlselect))
									{
									echo "
									
									<option>".$rwselect['year']."</option>";
									}
									echo "</select><input type='text' id='ngrade$num' name='ngrade$num' style='border:0px' readonly></td>";
									$num++;
								}
								
							}
						   
							echo "<td><input type='text' style='border:none;' size='4' id='nvalue$rowgrpid' name='nvalue$rowgrpid' value='$cnt' readonly></td>";
							$sql_remark=mysql_query("select * from tbl_graderemark where groupid='$groupid' AND empid='$rowgrpid'");
							$rwRemark=mysql_fetch_array($sql_remark);
							$getvar=$rwRemark["graderemark"];
								if($getvar=='')
						{

							//echo "<td><input type='text' class='form-control primary' id='txtremark$rowgrpid' name='txtremark$rowgrpid'></td>";
							//echo "<td><a class='nbtn' id='$rowgrpid' name='$rowgrpid'><i class='fa fa-check'></i></a></td>";
						}else
							{
							//echo "<td><div id='div$rowgrpid'>$getvar</div></td>";
							//echo"<td></td>";
							}
							//echo "<td><a class='nbtn' id='$rowgrpid' name='$rowgrpid'><i class='fa fa-check'></i></a></td>";
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
	//var empgrade=document.getElementById("grade").value;	
	$(".nselect").change(function()
	{
		
		id=$(this).attr('value');
		value_id=$(this).attr('id');
		// alert(id);
		// alert(value_id);
		v1=$(this).val();
		//alert(v1);
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
						$("#"+value_id).hide();
					document.getElementById("nvalue"+id).value=varible;
					document.getElementById("ngrade"+value_id).value=html+"("+v1+")";
					
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
						$('#div'+id).html('<img src="../resources/loader.gif" alt="" width="24" height="24">');
					},
					success: function(html) 
					{
						$("#div"+id).html(html);
						$("#txtremark"+id).hide();
						$("#"+id).hide();
						window.location.reload();
						
					}
				});
  }); 
  
  
  function printDiv()
 {
var printContents = document.getElementById("divemp").innerHTML;
var noprint = document.getElementById("hidebutton").value;
var originalContents = document.body.innerHTML;
document.getElementById('header').style.display = 'none';
document.getElementById('footer').style.display = 'none';
document.getElementById('hidebutton').style.display = 'none';
//var hidebutton=document.getElementById('btngenerate');
//alert(document.getElementById('hidebutton'));
//hidebutton.style.visibility = 'hidden';
document.body.innerHTML = printContents;
//noprint.value="none";
window.print();


document.body.innerHTML = originalContents;

}


//---------------Model Code-------------------//

</script>
   <?php
 include_once('../global/footer.php');
include_once('demo/Modal_Member.php');
 ?> 