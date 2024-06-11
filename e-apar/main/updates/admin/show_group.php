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
// $(document).ready(function ()
// {
// ShowRecords();
// $("#frm").submit(function(event)
// {
	// var formData = new FormData($(this)[0]);
	// formData.append("Flag",$("#btnSave").val());
	// $.ajax({
		// url: "Ajaxgroups.php",
		// type: 'POST',
		// data: formData,
		// async: false,
		// success: function (data) {
			// alert(data);
			// ShowRecords();
		// },
		// cache: false,
		// contentType: false,
		// processData: false
	// });
// });
// });///ready fun close


//----------------------------//Function ShowRecords//----------------------------//
// function ShowRecords()
// {
	// $.post("Ajaxgroups.php",
				// {
					// Flag:"ShowRecords"
				// },
					// function(data,success)
					// {
						// $("#divRecords").html(data);
						// var oTable = $('#tbl_group').dataTable
						// ({
							// "oLanguage":
							// {
								// "sSearch": "Search all columns:"
							// },
							// "aoColumnDefs":
							// [
								// {
									// 'bSortable': false,
									// 'aTargets': [0]
								// } //disables sorting for column one
							// ],
							// 'iDisplayLength': 12,
							// "sPaginationType": "full_numbers",
							// "dom": 'T<"clear">lfrtip'
						// });
					// }
			// );
// }
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
			<!--button type="button" href="#myModal" class="btn btn-success" id="#btn1"><i class="fa fa-user"> Add User</i></button-->
	
      </li>
	  </ol>
	  <br>
    </section>
	
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	
      <div class="row">
	  <form method="get" action="#">
	  <table class='table table-striped table-bordered table-hover' id='tbl_employee'>
		<thead>
		<tr><th>View</th><th>Group name</th><th>Description</th><th>Member Count</th></tr>
		</thead>
		
		<?php
		$sql=mysql_query("select * from group_master") or die(mysql_error());
		while($result=mysql_fetch_array($sql))
		{
			echo "<tbody><td><a href='view_group.php?id=".$result['group_id']."'>view</a></td><td>".$result['group_name']."</td><td>".$result['group_desc']."</td><td>".$result['member_count']."</td> </tbody>";
		}
		if(!$sql)
			echo mysql_error();
	  ?>
	 
	 
	  </table>
	
	  </form>
   </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
   <?php

 //include_once('../global/Modal_Index.php');
 include_once('../global/footer.php');
 ?> 