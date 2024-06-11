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
			<a href="show_group.php"><button class="btn btn-success btn-flat btn-sm"><i class="fa fa-mail-reply"></i> Back</button></a>
	
      </li>
	  </ol>
	  <br>
    </section>
	
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	
      <div class="row">
	  <form method="POST" action="ajaxassign.php" >
	  <table class='table table-striped table-bordered table-hover' id='tbl_employee'>
		<thead>
		<tr><th>PF NO</th><th>Years</th></tr>
		</thead>
		
		
		<?php
			$G_id=$_GET['id'];
			echo "<input type='hidden' value='$G_id' name='groupid'/>";
			$sql=mysql_query("select DISTINCT empid from group_details where group_id=$G_id") or die(mysql_error());
			while($result=mysql_fetch_array($sql))
			{
				echo "<tbody><td><a href='frmshowemployee.php?emppf=".$result['empid']."'>".$result['empid']."</a></td><td>";
				$sql1=mysql_query("select * from group_details where empid = '".$result['empid']."' AND group_id=$G_id");
				while($fetch = mysql_fetch_array($sql1))
				{
					echo "".$fetch['year']." | ";
				}
				echo "</td></tbody>";
			}
			echo "</table><table class='table table-striped table-bordered table-hover' id='tbl_employee'>";
			$query = mysql_query("select * from group_master where group_id=$G_id");
			$result_set = mysql_fetch_array($query);
				echo "<tbody><td width='350px'>Group Name : </td><td>".$result_set['group_name']."</td></tbody>";
				echo "<tbody><td>Description : </td><td>".$result_set['group_desc']."</td></tbody>";
				echo "<input type='hidden' value='".$result_set['group_desc']."' name='descr'/>";
				echo "<tbody><td>Department : </td><td>".$result_set['dept_name']."</td></tbody>";
				$deptname=$result_set['dept_name'];
				echo "<input type='hidden' value='$deptname' name='dept'/>";
				$query = mysql_query("select * from tbl_assignto where groupid = '$G_id'");
			if($fetch=mysql_fetch_array($query))
			{
				echo "<td><a href='show_assign.php?gid=$G_id'>Assigned</a></td> </tbody>";
			}
			else
			{
		?>
	  <tbody>
		<td width='350px'>Select Users</td>
		<td>
			 
                  <select multiple="multiple" class="form-control" name="selection[]" id="selection" >
					<?php
						$query = mysql_query("select * from tbl_user where dept='$deptname'");
						while($result_set = mysql_fetch_array($query))
						{
							 echo "<option value='".$result_set['userid']."'>".$result_set['fullname']."</option>";
						}
					?>
                    
                  </select>
		</td>
	  </tbody>
	  <tbody>
		<td></td>
		<td><input type="submit" value="Send" name="sub"></td>
		<?php
			}
	  ?>
	  </tbody>
	  </table>
	  </form>
	   
   </div>
  
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <script type="text/javascript">
  function multiselct()
  {
	  for(var i=0;i<document.getElementById("selection").option.lenght;i++)
	  {
		  document.getElementById("selection").option[i].selected=true;
	  }
	  return true;
  }
  </script>
  
   <?php

 //include_once('../global/Modal_Index.php');
 include_once('../global/footer.php');
 ?> 