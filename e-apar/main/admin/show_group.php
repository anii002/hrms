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
        <h1 class="pull-left">Admin </h1> 
        <a href="index.php" class="pull-right"><button class="btn btn-success btn-flat btn-sm"><i class="fa fa-mail-reply"></i> Back</button></a>
     <!--   <ol class="breadcrumb"> -->
     <!--       <li class="active">-->
    	<!--		<a href="index.php"><button class="btn btn-success btn-flat btn-sm"><i class="fa fa-mail-reply"></i> Back</button></a>-->
     <!--       </li>-->
	    <!--</ol> -->
	    <br><br>
    </section>
	
    <!-- Main content -->
    <section class="content"> 
        <div class="row">
		    <div class="">
			    <div class="box box-warning box-solid">
					<div class="box-header with-border">
					  <h3 class="box-title"><i class="fa fa-group"></i> &nbsp;&nbsp;Show Group Details...</h3>
					</div>
    				<form method="get" action="#" class="p-12">
    					<table class='table table-striped table-bordered table-hover' id='example'>
    						<thead>
    							<tr>
    							    <th>View</th>
    							    <th>Group name</th>
    							    <th>Description</th>
    							    <th>Member Count</th>
    							    <th>Assigned</th>
							    </tr>
    						</thead> 
					    	<?php 
        						$sql=mysqli_query($conn,"select * from group_master") or die(mysqli_error($conn));
        						while($result=mysqli_fetch_array($sql))
        						{
        							$sql_cnt = mysqli_query($conn,"select count(distinct empid) from group_details where group_id='".$result['group_id']."'");
        							$sql_fetch = mysqli_fetch_array($sql_cnt);
        							echo "<tbody><td><a href='view_group.php?id=".$result['group_id']."'>View</a> / 
        							<a href='delete_group.php?id=".$result['group_id']."'>Delete</a>
        							</td><td>".$result['group_name']."</td><td>".$result['group_desc']."</td><td>".$sql_fetch['count(distinct empid)']."</td>";
        							$query = mysqli_query($conn,"select * from tbl_assignto where groupid = '".$result['group_id']."'");
        							if($fetch=mysqli_fetch_array($query))
        							{
        								echo "<td><a href='show_assign.php?gid=".$result['group_id']."'>Assigned</a></td> </tbody>";
        							}
        							else
        								echo "<td>Not Assigned</td></tbody>";
        						}
						
        						if(!$sql)
        							echo mysqli_error($conn);
        					  ?> 
					    </table> 
				    </form>
			    </div>
		    </div>
	    </div> 
    </section>
    <!-- /.content -->
  </div>
   <?php

 //include_once('../global/Modal_Index.php');
 include_once('../global/footer.php');
 ?> 