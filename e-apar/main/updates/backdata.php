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
					// alert(data);
					// ShowRecordsEmployee();
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
//------------------End---------------------------//
</script> 

  <!-- Left side column. contains the logo and sidebar -->
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<h2>Employee Management</h2>
    <section class="content-header">
      <ol class="breadcrumb">
       
        <li class="active">
			 <button style="float: right;" data-toggle='modal' data-target='#myModalAddEmployee' name='btnadd' id='btnadd' type='button' class='btn btn-success btn-flat' onclick="ResetEditor();" ><i class='fa fa-plus'></i> &nbsp;&nbsp;Add Employee</button>
		</li>
	  </ol>
	  <br>
	  <br>
	  <br>
    </section>
	
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	
      <div class="row">
	  <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title"> Employee Details...</h3><hr>
            </div>
			<div class="box-body">
			<form method="post" id="frmaddemployee" action="frmmultipleemp.php" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg">  
			<div class="table-responsive" style='width:100%;height:100%;overflow-x: scroll;'>
			<table class='table table-striped table-bordered table-hover' id='tbl_employee' style="height:500px; overflow-y: scroll;">
                 <thead>
							<tr class='odd gradeX'>
								<th style='display:none;'> Employee Code</th>
								<th style=''></th>
								<th> PF No</th>
								<th> Name </th>
								<th> Design </th>
								<th> Station </th>
								<th> Pay Scale </th>
								<!--<th><i class='fa fa-cog'></i> year</th>
								<th><i class='fa fa-cog'></i> Action</th>-->
							<?php
							$sql=mysql_query("SELECT * FROM year order by id desc limit 7");
							while($rev = mysql_fetch_array($sql))
							{
							?>
							   <th><?php echo $rev['years']; ?></th>
						   <?php
							}
							?>
							<th> Edit</th>
							<th> View</th>
							</tr>
							
						 </thead>
              
				<tbody>
				  <?php
				$sqlemployee=mysql_query("select * from tbl_employee order by empid asc");
				while($rwEmployee=mysql_fetch_array($sqlemployee,MYSQL_ASSOC))
				{
					$empid=$rwEmployee["empid"];
					$year=$rwEmployee["year"];
					$emppf=$rwEmployee["emplcode"];
					$dept=$rwEmployee["dept"];
					$design=$rwEmployee["design"];
					$station=$rwEmployee["station"];
					$payscale=$rwEmployee["payscale"];
					$year=$rwEmployee["year"];
					$uploadfile=$rwEmployee["uploadfile"];
					$empname = $rwEmployee["empname"];
					
				?>
				<tr class="headings">	
							<td style="display:none;" id="tdempid$empid"><?php echo $empid; ?></td>
							<td id="tdempid$empid"><input type="checkbox" name="check_list[]" value=<?php echo $empid; ?>/></td>
							<!--td id="tdemppf$empid"><?php echo $emppf; ?></a></td-->
							<td id="tdemppf$empid"><?php echo "<a href='frmviewemployee.php?emppf='".$emppf."'>$emppf</a> "?></td>
							<td id="tddept$empid"><?php echo $empname; ?></td>
							<td id="tddesign$empid"><?php echo $design; ?></td>
							<td id="tdstation$empid"><?php echo $station; ?></td>
							<td id="tdstation$empid"><?php echo $payscale; ?></td>
							<?php
							$i=0;
							$sql=mysql_query("SELECT * FROM year order by id desc limit 7");
							while($rev = mysql_fetch_array($sql))
							{
								//$sql_query = mysql_query("select * from scanned_apr where empid='".$emppf."' AND year='".$rev['years']."'");
								$sql_query = mysql_query("select * from scanned_apr where empid='".$emppf."' AND year='".$rev['years']."'");
								$result=mysql_fetch_array($sql_query);
								$demo_year=$rev['years'];
								//$emppf=$rwEmployee["emplcode"];
								if($result['image']=="" || $rwEmployee["uploadfile"]=='')
								{
								?>
							   <td id="tduploadfile$empid"><a href="Modal_Member.php?emppf=$emppf&year=$demo_year" data-toggle="modal" data-target="#myModalReason">NA</a></td>
							   <?php
							   }else
								{
								?>
								<td><input type="checkbox" name="year_list[$empid][]" value=<?php echo $rev["years"]; ?> ><label style="color:green;">AV</label></td>
								<?php
								}
								
							}
							?>
							<td><?php echo '<a href="frmeditemployee.php?emppf=' . $emppf. '"><i class="fa fa-check-square-o"></i></a> '?></td>
							<td><?php echo '<a href="frmviewemployee.php?emppf=' . $emppf. '"><i class="fa fa-eye"></i></a> '?></td>
						
						 </tr>
				<?php
				
				}
				?>
				</tbody>
				
                </table>
				 <!--input type="submit" value="Check" name="btnsubmit" id="btnsubmit"/-->
				</div>
			 
			</form>
			
            </div>
         </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
   <?php
 include_once('../global/footer.php');
 include_once('../global/Modal_Member.php');
 ?> 