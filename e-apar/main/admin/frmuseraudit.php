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
					/* alert(data);
					ShowRecords(); */
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
							'iDisplayLength': 10,
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
      <h1>
       User Audit Report
      </h1>

	  <br>
    </section>
	
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	
      
	  
	   <div class="box box-info">
            
            <!-- /.box-header -->
            <div class="box-body">
			<div class="box box-warning box-solid" style="margin-top:0px;">
				<div class="box-header with-border">
				  <h3 class="box-title"><i class="fa fa-lock"></i> &nbsp;&nbsp;Total User Audit Report...</h3>
				</div>
              <div class="table-responsive">
                <table class="table no-margin" id="example" style="overflow-x: scroll;">
                  <thead>
                  <tr>
                    <th>Activity</th>
                    <th>Action</th>
                    <th>Modified Person</th>
                    <th>Modified Date</th>
                  </tr>
                  </thead>
              
				<tbody>
				  <?php
				$sqlquery=mysql_query("select * from tbl_audit");
				while($rwReg=mysql_fetch_array($sqlquery))
				{
				?>
				<tr>
				<td><?php echo $rwReg["message"]; ?></td>
				<td><?php echo $rwReg["action"]; ?></td>
				<td><?php echo $rwReg["updatePerson"]; ?></td>
				<td><?php echo date('d-m-Y , h:m:s', strtotime($rwReg["date"]));?></td>
				
				</tr>
				<?php
				
				}
				?>
				</tbody>
				
                </table>
              </div>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
				
				
      <!-- /.row -->
      <!-- Main row -->

      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php
 
 include_once("../global/footer.php");
 ?>