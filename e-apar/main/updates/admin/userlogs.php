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
						var oTable = $('#tbl_userlog').dataTable
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
<script type="text/javascript">

		// $(document).ready(function(){
		// $('#example').dataTable();
		// });
</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       User Log Report
      </h1>

	  <br>
    </section>
	
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	
      
	  
	   <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Total Log Report</h3>

              <div class="box-tools pull-right">
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin" id="tbl_userlog" style="height:500px; overflow-y: scroll;">
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
				//$id=$rwReg["reg_id"];
				//echo "$id";
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
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <!--div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
            </div-->
            <!-- /.box-footer -->
			<!--div class="table table-responsive">
				<div id="divRecords" class="table table-striped table-hover responsive-utilities jambo_table dataTable aria-describedby="example_info">
				</div>
				</div>
          </div-->
				
				
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