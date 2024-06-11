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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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
//----------------------------End Of Script--------------------------------------//
</script> 
<!-- Left side column. contains the logo and sidebar -->
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin
      </h1>
      <ol class="breadcrumb">
       
        <li class="active">
			<button style="float: right;" data-toggle='modal' data-target='#myModalInternalLoan' name='btnadd' id='btnadd' type='button' class='btn btn-success btn-flat' onclick="ResetEditor();" ><i class='fa fa-plus'></i> &nbsp;&nbsp;Add New Employee</button>
	
      </li>
	  </ol>
	  <br>
    </section>
	
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	
      <div class="row">
			<div class="box-body">
					<form method="post" id="frmaddemployee" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg">  
					<?php
						
						$sqlemployee=mysql_query("select * from tbl_employee order by empid");
						echo "<table class='table table-striped table-bordered table-hover' id='tbl_employee'>
								<thead>
									<tr class='odd gradeX'>
										<th style='display:none;><i class='fa fa-fa'></i> Employee Code</th>
										<th><i class='fa fa-fa'></i><input type='checkbox' name='select_all' id='select_all'/></th>
										<th><i class='fa fa-fa'></i>empid</th>
										<th><i class='fa fa-gallary'></i> Name </th>
										<th><i class='fa fa-calendar'></i> design </th>
										<th><i class='fa fa-calendar'></i> station </th>
										<th><i class='fa fa-calendar'></i> pay scale </th>
										<!--<th><i class='fa fa-cog'></i> year</th>
										<th><i class='fa fa-cog'></i> Action</th>-->
									";
									$sql=mysql_query("SELECT * FROM year order by id desc limit 7");
									while($rev = mysql_fetch_array($sql))
									{
									   echo "<th>".$rev['years']."</th>";
									}
									echo"</tr>";
								   echo"</thead>";
						while($rwEmployee=mysql_fetch_array($sqlemployee,MYSQL_ASSOC))
						{
							$empid=$rwEmployee["emplcode"];
							$year=$rwEmployee["year"];
							$emplcode=$rwEmployee["emplcode"];
							$dept=$rwEmployee["dept"];
							$design=$rwEmployee["design"];
							$station=$rwEmployee["station"];
							$payscale=$rwEmployee["payscale"];
							$year=$rwEmployee["year"];
							$uploadfile=$rwEmployee["uploadfile"];
							$empname = $rwEmployee["empname"];
							
							//echo $rwEmployee["registerno"];
							//<button class='btn btn-xs btn-warning' onclick='MarkPending($empid)'>Pending</button>
								echo "<tr class='headings'>	
									<td style='display:none; id='tdempid$empid'>$empid</td>
									<td id='tdempid$empid'><input type='checkbox' name='select_all' id='select_all' value='$empid'/></td>
									<td id='tdemplcode$empid'><a href='show.php?empid=$empid'>$empid</a></td>
									<td id='tddept$empid'>$empname</td>
									<td id='tddesign$empid'>$design</td>
									<td id='tdstation$empid'>$station</td>
									<td id='tdstation$empid'>$payscale</td>";
									
									$sql=mysql_query("SELECT * FROM year order by id desc limit 7");
									while($rev = mysql_fetch_array($sql))
									{
										$sql_query = mysql_query("select * from scanned_apr where empid='".$emplcode."' AND year='".$rev['years']."'");
										$result=mysql_fetch_array($sql_query);
										if($result['image']=="")
										{
									   echo "<td id='tduploadfile$empid'><a href='Modal_Member.php?empid='".$empid."'' data-toggle='modal' data-target='#myModalReason'>NA</a></td>";;
									   }else
										{
										echo "<td><input type='checkbox' name='".$emplcode."' ><label style='color:green;'>AV</label></input></td>";
										}
									}
									
									
							
								 echo "</tr>";
						
						}
						?>
					</form>
					<!--div class="table table-responsive">
						<div id="divRecords" class="table table-striped table-hover responsive-utilities jambo_table dataTable aria-describedby="example_info">
						</div>
						</div-->
			</div>
		
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<script type="text/javascript">
// $(document).ready(function(){
    // $('#select_all').on('click',function(){
        // if(this.checked){
            // $('.checkbox').each(function(){
                // this.checked = true;
            // });
        // }else{
             // $('.checkbox').each(function(){
                // this.checked = false;
            // });
        // }
    // });
    
    // $('.checkbox').on('click',function(){
        // if($('.checkbox:checked').length == $('.checkbox').length){
            // $('#select_all').prop('checked',true);
        // }else{
            // $('#select_all').prop('checked',false);
        // }
    // });
// });
</script>
   <?php
 include_once('../global/Modal_Member.php');
 include_once('../global/footer.php');
 ?> 