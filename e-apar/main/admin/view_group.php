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
		<tr><th>PF NO</th><th>Name</th><th>Years</th></tr>
		</thead>
		
		
		<?php
			$G_id=$_GET['id'];
			echo "<input type='hidden' value='$G_id' name='groupid'/>";
			$sql=mysql_query("select DISTINCT empid from group_details where group_id=$G_id") or die(mysql_error());
			while($result=mysql_fetch_array($sql))
			{
				echo "<tbody><td><a href='frmshowemployee.php?emppf=".$result['empid']."'>".$result['empid']."</a></td>";
				$sqlemployee=mysql_query("select * from tbl_employee where emplcode='".$result['empid']."'") or die(mysql_error());
				
				$rwEmploye=mysql_fetch_array($sqlemployee);
				
				echo "<td>".$rwEmploye['empname']."</td><td>";
				
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
				echo "<tbody><td width='350px'>Group Name :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ".$result_set['group_name']."</td></tbody>";
				echo "<tbody><td>Description :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ".$result_set['group_desc']."</td></tbody>";
				echo "<input type='hidden' value='".$result_set['group_desc']."' name='descr'/>";
				
				$query = mysql_query("select * from tbl_assignto where groupid = '$G_id'");
			if($fetch=mysql_fetch_array($query))
			{
				echo "<td colspan='3'><a href='reassign_group.php?gid=$G_id' class='btn bg-navy btn-flat'><i class='fa fa-mail-reply'> </i> Re-Assigned</a>
				<a href='frmgroupreport.php?gid=$G_id' class='btn btn-primary btn-flat'>
				<i class='fa fa-print'></i>&nbsp;&nbsp;&nbsp;Generate Report</a>
				<a href='frmaddmoreemp.php?gid=$G_id&grpname=".$result_set['group_name']."' style='width:150px;' class='btn btn-warning btn-flat' ><i class='fa fa-users'></i> Edit Employee</a>
				</td></tbody>";
			}
			else
			{
		?>
	  <tbody>
		<td width='350px'>Select Users</td>
		<td>
			 
                  <select multiple="multiple" class="form-control" name="selection[]" id="selection" >
					<?php
						$query = mysql_query("select * from tbl_user");
						while($result_setuser = mysql_fetch_array($query))
						{
							 echo "<option value='".$result_setuser['userid']."'>".$result_setuser['fullname']."(".$result_setuser['designation'].")</option>";
						}
					?>
                    
                  </select>
		</td>
	  </tbody>
	  <tbody>
		<td></td>
		<td><input type="submit" value="Assign" name="sub"></td>
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

  
<?php
 include_once('../global/footer.php');
 ?> 