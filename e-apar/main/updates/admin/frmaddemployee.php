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
					alert(data);
					ShowRecordsEmployee();
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
</script> <!-- Left side column. contains the logo and sidebar -->
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin
      </h1>
      <ol class="breadcrumb">
       
        <li class="active">
			 <button style="float: right;" data-toggle='modal' data-target='#myModalInternalLoan' name='btnadd' id='btnadd' type='button' class='btn btn-success btn-flat' onclick="ResetEditor();" ><i class='fa fa-plus'></i> &nbsp;&nbsp;Add Employee</button>
	
      </li>
	  </ol>
	  <br>
    </section>
	
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	
      <div class="row">
	<div class="box-body">
			<form method="post" id="frmaddemployee" action="frmmultipleemp.php" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg">  
			<div class="table-responsive" style='width:100%;height:100%;overflow-x: scroll;'>
			<?php
			$sqlemployee=mysql_query("select * from tbl_employee ");
				echo "<table class='table table-striped table-bordered table-hover' id='tbl_employee'>
						<thead>
							<tr class='odd gradeX'>
								<th style='display:none;><i class='fa fa-fa'></i> Employee Code</th>
								<th style=''><i class='fa fa-fa'></i></th>
								<th><i class='fa fa-fa'></i>PF No</th>
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
							echo "<th><i class='fa fa-cog'></i> Action</th>";
							echo"</tr>";
							
						   echo"</thead>";
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
					
					$id=$rwEmployee["empid"];
					//echo $rwEmployee["registerno"];
					//<button class='btn btn-xs btn-warning' onclick='MarkPending($empid)'>Pending</button>
						echo "<tr class='headings'>	
							<td style='display:none; id='tdempid$empid'>$empid</td>
							<td id='tdempid$empid'><input type='checkbox' name='check_list[]' value='$empid'/></td>
							<td id='tdemppf$empid'><a href='show.php?empid=$emppf'>$emppf</a></td>
							<td id='tddept$empid'>$empname</td>
							<td id='tddesign$empid'>$design</td>
							<td id='tdstation$empid'>$station</td>
							<td id='tdstation$empid'>$payscale</td>";
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
							   echo "<td id='tduploadfile$empid'><a href='Modal_Member.php?emppf=$emppf&year=$demo_year' data-toggle='modal' data-target='#myModalReason'>NA</a></td>";;
							   }else
								{
								echo "<td><input type='checkbox' name='year_list[$empid][]' value='".$rev['years']."' ><label style='color:green;'>AV".$rev['years']."</label></input></td>";
								}
								
							}
							
							echo "<td><a href='frmeditemployee.php?empid='".$empid."'><button  name='btnSubmit' id='btnSubmit' class='btn btn-info btn-flat btn-sm'><i class='fa fa-fw fa-pencil'></i></button></a></td>";
					
						 echo "</tr>";
						 
				}
				echo "</table>";
				?>
				 <input type="submit" value="Check" name="btnsubmit" id="btnsubmit"/>
				</div>
			 
			</form>
				
				
				<!--div class="table table-responsive">
				<div id="divRecords" class="table table-striped table-hover responsive-utilities jambo_table dataTable aria-describedby="example_info">
				</div>
				</div-->
            </div>
			<?php
 // if(isset($_POST['btnsubmit']))
 // {
 //to run PHP script on submit
// if(!empty($_POST['check_list'])){
//Loop to store and display values of individual checked checkbox.
// $i=0;
// $list=array();
// $year=array();
// foreach($_POST['check_list'] as $selected){
 // $list[$i++]=$selected;
// }
 // $i=0;

// $keys = array_keys($_POST['year_list']);
// for($i = 0; $i < count($_POST['year_list']); $i++) {
    // echo $keys[$i] ;
    // foreach($_POST['year_list'][$keys[$i]] as $key => $value) {
        // echo  " " . $value . "";
    // }
    // echo "<br>";
// }
			// $keys = array_keys($_POST['year_list']);
			// for($i = 0; $i < count($_POST['year_list']); $i++) {
				// echo $keys[$i] . "{<br>";
				// foreach($_POST['year_list'][$keys[$i]] as $key => $value) {
					// echo $key . " : " . $value . "<br>";
				// }
				// echo "}<br>";
			// }
			 //}
?>
		
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
   <?php
 include_once('../global/footer.php');
 include_once('../global/Modal_Member.php');
 ?> 