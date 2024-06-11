
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
	  <form method="get" action="#">
	  <table class='table table-striped table-bordered table-hover' id='tbl_employee'>
		<thead>
		<tr><th>Assinged Authority</th></tr>
		</thead>
		
			<?php
	$sqluser = mysql_query("select * from assignto_tbl where assignedid IN(select assignid from tbl_assignto where groupid='".$_GET['gid']."')");
			while($rwUser = mysql_fetch_array($sqluser))
			{
			$rwempid = $rwUser["emp_id"];
			$assngnid = $rwUser["assignedid"];
			
			}
		$sql=mysql_query("select * from tbl_user where userid IN(select emp_id from assignto_tbl where assignedid IN(select assignid from tbl_assignto where groupid='".$_GET['gid']."') AND status='1')");
		while($result=mysql_fetch_array($sql))
		{
			echo "<tbody><td  style='width:200px;'>".$result['fullname']."</td>";
			$permission = mysql_query("select * from tbl_accesspermission where accesslevel='".$_SESSION['Access_level']."'");
						$ResultSet = mysql_fetch_array($permission);
						if($ResultSet['deleting']=='on')
						{
			echo "<td><a href='Ajadeleteuser.php?rwempid=".$result['userid']."&assignid=".$assngnid."&gid=".$_GET['gid']."' id='deleteuser' name='deleteuser'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa fa-close'></i></a></td></tbody>";
						}
		}
			
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