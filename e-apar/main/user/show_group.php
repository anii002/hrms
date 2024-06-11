
<?php 
 session_start();
 if(!isset($_SESSION['SESS_MEMBER_NAME']))
 {
	 echo "<script>window.location='http://localhost/E-APAR/index.php';</script>";
 }
include_once('../global/header.php');
include_once('../global/topbaruser.php');
include_once('../global/sidebaruser.php');

?>
 <!-- Left side column. contains the logo and sidebar -->
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Management
      </h1>
       </h1>
      <ol class="breadcrumb">
       
        <li class="active">
			<a href="index.php"><button class="btn btn-success btn-flat btn-sm"><i class="fa fa-mail-reply"></i> Back</button></a>
	
      </li>
	  </ol>
	  <br>
    </section>
	
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	
	<div class="row">
		<div class="box box-info">
            <div class="box box-warning box-solid">
								<div class="box-header with-border">
								  <h3 class="box-title"><i class="fa fa-group"></i> &nbsp;&nbsp;Show Group Details...</h3>
								</div>
				  <form method="get" action="#">
				  <table class='table table-striped table-bordered table-hover' id='example'>
					<thead>
					<tr><th>View</th><th>Group name</th><th>Description</th><th>Member Count</th><th>Assigned</th></tr>
					</thead>
					
					<?php
					if($_SESSION['Access_level']=='Admin')
					{
					$sql=mysql_query("select * from group_master") or die(mysql_error());
						while($result=mysql_fetch_array($sql))
						{
							$sql_cnt = mysql_query("select count(distinct empid) from group_details where group_id='".$result['group_id']."'");
							$sql_fetch = mysql_fetch_array($sql_cnt);
							
							$permission = mysql_query("select * from tbl_accesspermission where accesslevel='".$_SESSION['Access_level']."'");
						$ResultSet = mysql_fetch_array($permission);
						if($ResultSet['deleting']=='on')
						{
							echo "<tbody><td><a href='view_group.php?id=".$result['group_id']."'>View</a> / 
							<a href='delete_group.php?id=".$result['group_id']."'>Delete</a>";
						}
						else
						{
							echo "<tbody><td><a href='view_group.php?id=".$result['group_id']."'>View</a>";
						}
							echo "</td><td>".$result['group_name']."</td><td>".$result['group_desc']."</td><td>".$sql_fetch['count(distinct empid)']."</td>";
							$query = mysql_query("select * from tbl_assignto where groupid = '".$result['group_id']."'");
							if($fetch=mysql_fetch_array($query))
							{
								echo "<td><a href='show_assign.php?gid=".$result['group_id']."'>Assigned</a></td> </tbody>";
							}
							else
								echo "<td>Not Assigned</td></tbody>";
						}
					}
					else
					{
						$sql=mysql_query("SELECT * FROM `group_master` where group_id in (select groupid from tbl_assignto where assignid in (select assignedid from assignto_tbl where emp_id='".$_SESSION['SESS_USER_ID']."'))") or die(mysql_error());
						while($result=mysql_fetch_array($sql))
						{
							$sql_cnt = mysql_query("select count(distinct empid) from group_details where group_id='".$result['group_id']."'");
							$sql_fetch = mysql_fetch_array($sql_cnt);
							
							$permission = mysql_query("select * from tbl_accesspermission where accesslevel='".$_SESSION['Access_level']."'");
						$ResultSet = mysql_fetch_array($permission);
						if($ResultSet['deleting']=='on')
						{
							echo "<tbody><td><a href='view_group.php?id=".$result['group_id']."'>View</a> / 
							<a href='delete_group.php?id=".$result['group_id']."'>Delete</a>";
						}
						else
						{
							echo "<tbody><td><a href='view_group.php?id=".$result['group_id']."'>View</a>";
						}
							echo "</td><td>".$result['group_name']."</td><td>".$result['group_desc']."</td><td>".$sql_fetch['count(distinct empid)']."</td>";
							$query = mysql_query("select * from tbl_assignto where groupid = '".$result['group_id']."'");
							if($fetch=mysql_fetch_array($query))
							{
								echo "<td><a href='show_assign.php?gid=".$result['group_id']."'>Assigned</a></td> </tbody>";
							}
							else
								echo "<td>Not Assigned</td></tbody>";
						}
					}
						if(!$sql)
							echo mysql_error();
				  ?>
				 
				 
				  </table>
				
				  </form>
			</div>
		</div>
	</div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
   <?php

 //include_once('../global/Modal_Index.php');
 include_once('../global/footer.php');
 ?> 