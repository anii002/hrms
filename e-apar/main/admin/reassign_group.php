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
	  <form method="POST" action="" >
	  <table class='table table-striped table-bordered table-hover' id='tbl_employee'>
		<thead>
		
		</thead>
		
		
		<?php
			$G_id=$_GET['gid'];
			echo "<input type='hidden' value='$G_id' name='groupid'/>";
			
			echo "</table><table class='table table-striped table-bordered table-hover' id='tbl_employee'>";
			$query = mysql_query("select * from group_master where group_id=$G_id");
			$result_set = mysql_fetch_array($query);
				echo "<tbody><td width='350px'>Group Name : </td><td>".$result_set['group_name']."</td></tbody>";
				echo "<tbody><td>Description : </td><td>".$result_set['group_desc']."</td></tbody>";
				echo "<input type='hidden' value='".$result_set['group_desc']."' name='descr'/>";
				
				
				
		?>
	  <tbody>
		<td width='350px'>Select Users</td>
		<td>
			 
                  <select multiple="multiple" class="form-control" name="selection[]" id="selection" >
					<?php
						$query = mysql_query("select * from tbl_user where userid not in(select emp_id from assignto_tbl where assignedid in (select assignid from tbl_assignto where groupid='$G_id'))");
						while($result_set = mysql_fetch_array($query))
						{
							 echo "<option value='".$result_set['userid']."'>".$result_set['fullname']." (".$result_set['designation'].")</option>";
						}
					?>
                    
                  </select>
		</td>
	  </tbody>
	  <tbody>
		<td></td>
		<td><input type="submit" value="Re-Assign" name="sub" id="sub" class="btn btn-primary btn-flat"></td>
	  </tbody>
	  </table>
	  </form>
	   
   </div>
  
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

				<?php
				if(isset($_POST["sub"]))
				{
					$groupid=$_POST['groupid'];
					$query=mysql_query("select * from tbl_assignto where groupid='$groupid'");
					$fetch=mysql_fetch_array($query);
					$assignid = $fetch['assignid'];
					//echo $assignid;
					
					
					foreach($_POST['selection'] as $value)
			$sql_query2 = mysql_query("insert into assignto_tbl(emp_id,assignedid,status,modified_date) values ('$value','$assignid','1',NOW())");
			
			
				mysql_query("insert into tbl_audit(message,action,updatePerson,date) values('Group $groupid assinged','assigning_group','Super Admin',NOW())");
				
				echo "<script>alert('Group Re-assigned'); window.location='show_group.php'</script>";
					
					
				}
				
				?>
  
<?php
 include_once('../global/footer.php');
 ?> 