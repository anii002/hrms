<?php
session_start();
include("header.php");
include("topbar.php");
include("sidebar.php");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User List Management
      </h1>

	  <br>
    </section>
	
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	
      
	  
	   <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Registered List</h3>

              <div class="box-tools pull-right">
			   <a href="index.php"><button type="submit" class="btn btn-success btl-block" id="" name=""><i class="fa fa-mail-reply-all"></i>&nbsp;&nbsp;BACK
			  </button></a>
              </div>
            </div>
            <!-- /.box-header -->
		
			
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin" id="example">
                  <thead>
                   <tr>
                    <th>Index No</th>
                    <th>PPO No</th>
                    <th>Full Name</th>
                    <th>Designation</th>
                    <th>Station</th>
                    <th>Department</th>
                    <th>DOB</th>
					<th>Date Of Retirement</th>
                  </tr>
                  </thead>
              
				<tbody>
				  <?php
				  // $sqluser=mysql_query("select * from tbl_user  where  usertype='Cheif Office Superitendent'");
				  // $rwUser=mysql_fetch_array($sqluser);
				  // $userType=$rwUser["usertype"];
				  // $userName=$rwUser["username"];
				 // echo "$userName";
				  
				// $sqlquery=mysql_query("select * from tbl_registration ");
				// while($rwReg=mysql_fetch_array($sqlquery))
				// {
				// $id=$rwReg["reg_id"];
				//echo "$id";
				if(isset($_GET["value"]))
				{
				if($_GET["value"]==2)
					$sqlfinish=mysql_query("select * from tbl_registration where createdby='".$_SESSION['SESS_NAME']."'");
				else
				$sqlfinish=mysql_query("select * from tbl_registration where status='".$_GET['value']."' AND createdby='".$_SESSION['SESS_NAME']."'");
				while($rwsql=mysql_fetch_array($sqlfinish,MYSQL_ASSOC))
				{
					$user=$rwsql['typeofretirement'];
				?>
				<tr>
					<td><?php echo $rwsql["registerno"];?></td>
					<td><?php echo $rwsql["ppono"];?></td>
					<td><?php echo $rwsql["fullname"];?></td>
					<td><?php echo $rwsql["designation"];?></td>
					<td><?php echo $rwsql["station"];?></td>
					<td><?php echo $rwsql["department"];?></td>
					<td><?php echo $rwsql["dateofbirth"];?></td>
					<td><?php echo $rwsql["dateofretirment"];?></td>
				</tr>
				<?php
				}
				}else
				{
				echo mysql_error();
				}
				?>
				</tbody>
				
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <!--div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
            </div-->
            <!-- /.box-footer -->
          </div>
				
				
      <!-- /.row -->
      <!-- Main row -->

      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php
 
 include_once("footer.php");
 require("modal.php");
 ?>