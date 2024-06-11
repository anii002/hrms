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

$(".scroll").jscroll({
		autoTriggerUntil:3
});

// $(document).ready(function () {
            // $('#example').dataTable({
                // "bPaginate": false
            // });
        // });
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
						//var oTable = $('#tbl_employee').dataTable
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
							'iDisplayLength': 10,
							"sPaginationType": "full_numbers",
							
							// "sPaginationType": "none",
							"dom": 'T<"clear">lfrtip'
						});
					}
			);
}

$(document).ready(function() {
    $('#tbl_employee').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false
    } );
} );
//------------------End---------------------------//


</script> 

  <!-- Left side column. contains the logo and sidebar -->
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-top: -20px;">
    <!-- Content Header (Page header) -->
	<h2>Employee Management</h2>
    <!--section class="content-header">
      <ol class="breadcrumb">
       
        <li class="active">
			 <button style="float: right;" data-toggle='modal' data-target='#myModalAddEmployee' name='btnadd' id='btnadd' type='button' class='btn btn-success btn-flat' onclick="ResetEditor();" ><i class='fa fa-plus'></i> &nbsp;&nbsp;Add Employee</button>
		</li>
	  </ol>
	  <br>
	  <br>
	  <br>
    </section-->
	
     <!-- Main content -->
    <section class="content"> 
        <div class="row">
		    <div class="box box-warning box-solid">
				<div class="box-header with-border">
				  <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Registered Employee List...</h3>
				</div> 
		        <div class="box-body">
		            <!--<span style="color:red;">NOTE&nbsp;:&nbsp;Click this button to create group</span><br><br>-->
		            <form method="post" id="frmaddemployee" action="frmmultipleemp.php" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg">  
		                <div class="row">
		                    <div class="col-md-10">
		                        <span style="color:red;">NOTE&nbsp;:&nbsp;Click this button to create group</span>
		                    </div>
		                    <div class="col-md-2">
		                        <input type="submit" value="Create Group" name="submit" class="btn btn-primary btn-flat"/><br> 
		                    </div>
		                </div>
		                <br>
		                <!--<input type="submit" value="Create Group" name="submit" class="btn btn-primary btn-flat"/><br> -->
			                <div class="table-responsive">
                    			<table class='table table-striped table-bordered table-hover' id='tbl_employee' style="text-align:left;">
                                     <thead>
            							<tr class=''>
            								<th style='display:none;'> Employee Code</th>
            								<th style=''></th>
            								<th> PF No</th>
            								<th> Name </th>
            								<th> Design </th>
            								<!--th> Station </th-->
            								<th> Pay Scale </th>
                    							<?php
                        							$sql=mysql_query("SELECT * FROM year order by id desc limit 7");
                        							while($rev = mysql_fetch_array($sql))
                        							{
                        							?>
                        							   <th style=""><?php echo $rev['years']; ?></th>
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
            				            <tr class="">	
                							<td style="display:none;" id="tdempid$empid"><?php echo $empid; ?></td>
                							<td id="tdempid$empid" ><input type="checkbox" name="check_list[]" value=<?php echo $emppf; ?> /></td>
                							<!--td id="tdemppf$empid"><?php echo $emppf; ?></a></td-->
                							<td id="tdemppf$empid"><?php echo "<a href='frmshowemployee.php?emppf=".$emppf."'>$emppf</a> "?></td>
                							<td id="tddept$empid"><?php echo $empname; ?></td>
                							<td id="tddesign$empid"><?php echo $design; ?></td>
                							<!--td id="tdstation$empid"><?php echo $station; ?></td-->
                							<td id="tdstation$empid"><?php echo $payscale; ?></td>
                    							<?php
                    							$i=0;
                    							$sql=mysql_query("SELECT * FROM year order by id desc limit 7");
                    							while($rev = mysql_fetch_array($sql))
                    							{
                    								//$sql_query = mysql_query("select * from scanned_apr where empid='".$emppf."' AND year='".$rev['years']."'");
                    								$sql_query = mysql_query("select * from scanned_img where empid='".$emppf."' AND year='".$rev['years']."'");
                    								$result=mysql_fetch_array($sql_query);
                    								$demo_year=$rev['years'];
                    								//$emppf=$rwEmployee["emplcode"];
                    								
                    								if($result['image']!="")
                    								{
                    									$query = mysql_query("select * from scanned_apr where empid='".$emppf."' AND year='".$rev['years']."'");
                    									$rwQuery = mysql_fetch_array($query);
                    									$Rtype = $rwQuery['reporttype'];
                    									if($rwQuery['reporttype']=='APAR Report')
                    									{
                    										
                    								?>
                    								<td  style="font-size:10px;"><input type="hidden" value="<?php echo $rwQuery['reporttype'];?>"><input type="checkbox" name="year_list[<?php echo $emppf; ?>][]" value=<?php echo $rev["years"]; ?> ><label style="color:green;font-size:10px;">AV[AR]</label></td>
                    								<?php
                    									
                    									}
                    									else
                    									{
                    								?>
                    									<td  ><input type="hidden" value="<?php echo $rwQuery['reporttype'];?>"><input type="checkbox" name="year_list[<?php echo $emppf; ?>][]" value="<?php echo $rev["years"]; ?>" ><label style="color:green;">AV[WR]</label></td>
                    								<?php
                    									}
                    								}else
                    								{
                    								$sqlreason=mysql_query("select * from tbl_reason where  empcode='$emppf' AND financialyear='$demo_year'");
                    								$rwReason=mysql_fetch_array($sqlreason);
                    									
                    									if(isset($rwReason["reasontype"])!='')
                    									{
                    									echo "<td id='tduploadfile$empid'><a href='frmshowreasone.php?emppf=$emppf&year=$demo_year&empid=$empid'  id='$empid'>".$rwReason["reasontype"]."</a></td>";
                    									}else
                    									{
                    									echo "<td id='tduploadfile$empid'><a href='frmaddreason.php?emppf=$emppf&year=$demo_year&empid=$empid' role='button' >NA</a></td>";
                    									
                    									}
                    									
                    								?>
                    								<?php
                    								}
                    							}
                    							?>
                							<td style="width:3px;"><?php echo '<a href="frmeditemployee.php?emppf=' . $emppf. '"><i class="fa fa-check-square-o"></i></a> '?></td>
                							<td style="width:3px;"><?php echo '<a href="frmviewemployee.php?emppf=' . $emppf. '"><i class="fa fa-eye"></i></a> '?></td>
            						    </tr>
                    				<?php
                    				
                    				}
                    				?>
            				    </tbody> 
                            </table>
        				 <!--input type="submit" value="Check" name="submit" class="btn btn-primary btn-flat btn-sm"/-->
        				</div> 
			        </form>
                </div>
            </div>
		</div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  
  <script>
  
function anchoonclick(click_id)
{
	var empcode=document.getElementById("txtemppf").value;
	document.getElementById("te").innerHTML = click_id;
	alert(click_id.id);
	//return empcode;
		
}
  </script>
   <?php
 include_once('../global/footer.php');
 include_once('../global/Modal_Member.php');
 ?> 