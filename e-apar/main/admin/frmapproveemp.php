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
						//var oTable = $('#example').dataTable
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
    $('#example').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false
    } );
} );
//------------------End---------------------------//


</script> 
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1> ADMIN </h1>
            <ol class="breadcrumb"> 
                <li class="active">
			        <!--button type="button" href="#myModal" class="btn btn-success" id="#btn1"><i class="fa fa-user"> Add User</i></button-->
                </li>
	        </ol> 
        </section>
	
        <!-- Main content -->
        <section class="content"> 
            <div class="row">
		        <div class="box box-warning box-solid" style="margin-top:0px;">
    				<div class="box-header with-border">
    				  <h3 class="box-title"><i class="fa fa-list"></i> &nbsp;&nbsp;Employee Approve list...</h3>
    				</div>
			        <div class="box-body">
            			<form method="get" id="frmaddemployee" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg" action="Ajaxapproveemp.php">  
            				<div class="form-group">
            					<div class="col-md-4">
            						<input type="checkbox" name="select_all" id="select_all" value="Select All">&nbsp;&nbsp;SELECT ALL<br>
            					</div> 
            					<div class="input-group col-md-4">
            						<button class="btn btn-success btn-flat" id="btnSubmit" name="btnSubmit"> Submit</button>
            					</div>
            				</div> 
					        <div class="table-responsive"><br>
								<table class='table table-striped table-bordered table-hover' id='example'>
									<thead>
										<tr class='odd gradeX'>
											<th style='display:none;'> Employee Code</th>
											<th></th>
											<th> PF No</th>
											<th> Name </th>
											<th> Department </th>
											<th> Designation </th>
											<th> Action </th> 
										</tr> 
									</thead> 
									<tbody>
										<?php 
											$sql_query=mysql_query("select * from tbl_employee where approvedstatus='0'");
											while($rwEmp=mysql_fetch_array($sql_query))
											{
												$empid=$rwEmp["empid"];
												$year=$rwEmp["year"];
												$emppf=$rwEmp["emplcode"];
												$dept=$rwEmp["dept"];
												$design=$rwEmp["design"];
												$station=$rwEmp["station"];
												$payscale=$rwEmp["payscale"];
												$year=$rwEmp["year"];
												$uploadfile=$rwEmp["uploadfile"];
												$empname = $rwEmp["empname"];
												$emppass = $rwEmp["password"];
											?>
											<tr class="headings">	
												<td style="display:none;" id="tdempid$empid"><?php echo $empid; ?></td>
												<td id="tdempid$empid"><input type="checkbox" class="checkbox" id="check_list['<?php echo $emppf; ?>']" name="check_list['<?php echo $emppf; ?>']" value="<?php echo $emppf; ?>"/></td>
												<!--td id="tdemppf$empid"><?php echo $emppf; ?></a></td-->
												<td id="tdemppf$empid"><?php echo "<a href='frmshowemployee.php?emppf=".$emppf."'>$emppf</a> "?></td>
												<td><?php echo $empname; ?></td>
												<td><?php echo $dept; ?></td>
												<td><?php echo $design; ?></td>
												<td><?php echo"<a href='Ajaxapproveemp.php?emppf=".$emppf."' class='btn btn-warning btn-flat'><i class='fa fa-check'></i> APPROVE</a> " ?></td>
													
											</tr>
											 <?php
											}
										?>
									</tbody>
								</table>
					        </div>
			            </form>
                    </div>
		        </div> 
            </div> 
        </section>
        <!-- /.content -->
  </div>
  
								
								
  
 <script>
var select_all = document.getElementById("select_all"); //select all checkbox
var checkboxes = document.getElementsByClassName("checkbox"); //checkbox items

//select all checkboxes
select_all.addEventListener("change", function(e){
    for (i = 0; i < checkboxes.length; i++) { 
        checkboxes[i].checked = select_all.checked;
    }
});


for (var i = 0; i < checkboxes.length; i++) {
    checkboxes[i].addEventListener('change', function(e){ //".checkbox" change 
        //uncheck "select all", if one of the listed checkbox item is unchecked
        if(this.checked == false){
            select_all.checked = false;
        }
        //check "select all" if all checkbox items are checked
        if(document.querySelectorAll('.checkbox:checked').length == checkboxes.length){
            select_all.checked = true;
        }
    });
}
 </script>
  
   <?php
 include_once('../global/footer.php');
 ?> 