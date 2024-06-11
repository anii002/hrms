<?php
include_once("../global/header.php");
include_once("../global/topbar.php");
include_once("../global/sidebaradmin.php");
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
						var oTable = $('#example').dataTable
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
//----------------------------End Of Script--------------------------------------//
</script> 
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1> User Log Report </h1> 
        </section> 
        <!-- Main content -->
        <section class="content">  
	        <div class="">
	            <div class="box box-warning box-solid">
					<div class="box-header with-border">
					  <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Total User Log Report...</h3>
					</div> 
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered no-margin" id="example" >
                                <thead>
                                    <tr>
                                        <th>Start Date</th>
                                        <th>Staff ID</th>
                                        <th>Username</th>
                                    </tr>
                                </thead> 
				                <tbody>
                				  <?php
                        				$sqlquery=mysql_query("select * from tbl_userlog where username!='admin' ");
                        				while($rwReg=mysql_fetch_array($sqlquery))
                        				{
                        				?>
                        				<tr>
                        				<td><?php echo date('d-m-Y', strtotime($rwReg["login_startdate"]));?></td>
                        				<td><?php echo $rwReg["staffid"];?></td>
                        				<td><?php echo $rwReg["username"];?></td>
                        				
                        				</tr>
                        				<?php
                        				
                        				}
                    				?>
                				</tbody> 
                            </table>
                        </div> 
                    </div>
		        </div>
	        </div> 
        </section> 
	</div>
  <!-- /.content-wrapper -->
 <?php
 
 include_once("../global/footer.php");
 ?>