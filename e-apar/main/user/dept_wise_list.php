<?php 
 session_start();
 if(!isset($_SESSION['SESS_MEMBER_NAME']))
 {
	 echo "<script>window.location='http://localhost/E_APR_FINAL/index.php';</script>";
 }
include_once('../global/header.php');
include_once('../global/topbaruser.php');
include_once('../global/sidebaruser.php');

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
					// ShowRecords();
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
							'iDisplayLength': 12,
							//"sPaginationType": "full_numbers",
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
</script> <!-- Left side column. contains the logo and sidebar -->
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Department Wise Employee List....
      </h1>
      <ol class="breadcrumb">
       
        <li class="active">
			 <a href="index.php"><button style="float: right;" type='button' class='btn btn-success btn-flat' onclick="ResetEditor();" ><i class='fa fa-mail-reply'></i> &nbsp;&nbsp;Back</button></a>
	
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
              <h3 class="box-title"><i class="fa fa-cubes"></i>&nbsp;&nbsp;Department Wise Employee List Details...</h3><hr>
            </div>
		<div class="box-body">
		<span style="color:red;">NOTE:&nbsp;Click the button to create group</span><br><br>
			<form method="post" id="frmaddemployee" action="frmmultipleemp.php" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg">  
			<?php
				$permission = mysql_query("select * from tbl_accesspermission where accesslevel='".$_SESSION['Access_level']."'");
				$ResultSet = mysql_fetch_array($permission);
				if($ResultSet['grouping']=='on')
				{
			?>
			<input type="submit" value="Create Group" name="submit" class="btn btn-primary btn-flat"/><br>
			<?php
				}
				?>
			<div class="table-responsive" style="width:100%;height:100%;overflow-x:scroll;"> 
			<?php
			$deptname=$_GET['dept'];
			echo "<input type='hidden' value='$deptname' name='deptn'>";
			$sqlemployee=mysql_query("select * from tbl_employee where dept = '$deptname'");
				echo "<table class='table table-striped table-bordered table-hover' style='font-size:11px;' id='tbl_employee'>
						<thead>
							<tr class='odd gradeX'>
								<th style='display:none;><i class='fa fa-fa'></i> Employee Code</th>
								<th style=''></th>
								<th>empid</th>
								<th> Name </th>
								<th> design </th>
								<th> station </th>
								<th> pay scale </th>
								<!--<th><i class='fa fa-cog'></i> year</th>
								<th> Action</th>-->
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
					$empid=$rwEmployee["empid"];
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
							<td id='tdempid$empid'><input type='checkbox' name='check_list[]' value='$empid'/></td>
							<td id='tdemplcode$empid'><a href='frmshowemployee.php?emppf=$emplcode'>$emplcode</a></td>
							<td id='tddept$empid'>$empname</td>
							<td id='tddesign$empid'>$design</td>
							<td id='tdstation$empid'>$station</td>
							<td id='tdstation$empid'>$payscale</td>";
							$i=0;
							$sql=mysql_query("SELECT * FROM year order by id desc limit 7");
							
							while($rev = mysql_fetch_array($sql))
							{
								//$sql_query = mysql_query("select * from scanned_apr where empid='".$empid."' AND year='".$rev['years']."'");
								$sql_query = mysql_query("select * from scanned_img where empid='".$emplcode."' AND year='".$rev['years']."'");
								$result=mysql_fetch_array($sql_query);
								$demo_year=$rev['years'];
								//$emppf=$rwEmployee["emplcode"];
								
								if($result['image']!="")
								{
								$query = mysql_query("select * from scanned_apr where empid='".$emplcode."' AND year='".$rev['years']."'");
									$rwQuery = mysql_fetch_array($query);
									$Rtype = $rwQuery['reporttype'];
									if($rwQuery['reporttype']=='APAR Report')
									{
										
								?>
								<td  style="font-size:10px;"><input type="hidden" value="<?php echo $rwQuery['reporttype'];?>"><input type="checkbox" name="year_list[<?php echo $emplcode; ?>][]" value=<?php echo $rev["years"]; ?> ><label style="color:green;font-size:10px;">AV[AR]</label></td>
								<?php
									
									}
									else
									{
								?>
									<td  ><input type="hidden" value="<?php echo $rwQuery['reporttype'];?>"><input type="checkbox" name="year_list[<?php echo $emplcode; ?>][]" value="<?php echo $rev["years"]; ?>" ><label style="color:green;">AV[WR]</label></td>
								<?php
									}
								}else
								{
								$sqlreason=mysql_query("select * from tbl_reason where  empcode='$emplcode' AND financialyear='$demo_year'");
								$rwReason=mysql_fetch_array($sqlreason);
									
									if(isset($rwReason["reasontype"])!='')
									{
									echo "<td id='tduploadfile$empid'><a href='frmshowreasone.php?emppf=$emplcode&year=$demo_year&empid=$empid'  id='$empid' style='font-size:11px;'>".$rwReason["reasontype"]."</a></td>";
									}else
									{
									echo "<td id='tduploadfile$empid'><a href='frmaddreason.php?emppf=$emplcode&year=$demo_year&empid=$empid' role='button' >NA</a></td>";
									
									}
									
								?>
								<?php
								}
							}
							
					
						 echo "</tr>";
						 
				}
				echo "</table>";
				?>
			 </div>	
			</form>
				
				<?php
 if(isset($_POST['submit'])){//to run PHP script on submit
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
$keys = array_keys($_POST['year_list']);
for($i = 0; $i < count($_POST['year_list']); $i++) {
    echo $keys[$i] . "{<br>";
    foreach($_POST['year_list'][$keys[$i]] as $key => $value) {
        echo $key . " : " . $value . "<br>";
    }
    echo "}<br>";
}
}
?>
				<!--div class="table table-responsive">
				<div id="divRecords" class="table table-striped table-hover responsive-utilities jambo_table dataTable aria-describedby="example_info">
				</div>
				</div-->
            </div>
        </div>
		
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<script>
var nodes =("#year_list").fnGetNodes();

$("nodes").each(function(index){
alert("Column value:"+this.rows[index].cell[0].text());
});

</script>
   <?php
 include_once('../global/footer.php');
 include_once('../global/Modal_Member.php');
 ?> 