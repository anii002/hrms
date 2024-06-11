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
        Employee List Management
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
			  <!--button type="submit" class="btn btn-info btl-block" id="" name="" onClick="window.print();">Print
			  </button-->
              </div>
            </div>
            <!-- /.box-header -->
			<?php
			$sqlquery=mysql_query("select * from tbl_user where username='".$_SESSION['SESS_NAME']."'");
			$rwUser=mysql_fetch_array($sqlquery);
			$user=$rwUser["usertype"];
			
			if($user=='Cheif Office Superitendent')
			{
			?>
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
					<th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
              
				<tbody>
				  <?php
				  $sqluser=mysql_query("select * from tbl_user  where  usertype='Cheif Office Superitendent'");
				  $rwUser=mysql_fetch_array($sqluser);
				  $userType=$rwUser["usertype"];
				  $userName=$rwUser["username"];
				 // echo "$userName";
				  
				$sqlquery=mysql_query("select * from tbl_registration ");
				while($rwReg=mysql_fetch_array($sqlquery))
				{
				$id=$rwReg["reg_id"];
				//echo "$id";
				?>
				<tr>
				<!--td><?php echo $rwReg["registerno"];?></td-->
				<td><?php echo '<a href="viewemployeelist.php?reg_id=' . $id. '">'.$rwReg["registerno"].' </a>'?></td>
				<td><?php echo $rwReg["ppono"];?></td>
				<td><?php echo $rwReg["fullname"];?></td>
				<td><?php echo $rwReg["designation"];?></td>
				<td><?php echo $rwReg["station"];?></td>
				<td><?php echo $rwReg["department"];?></td>
				<td><?php echo $rwReg["dateofbirth"];?></td>
				<td><?php echo $rwReg["dateofretirment"];?></td>
				<td><?php echo '<a href="UpdateReg.php?reg_id=' . $id. '"><i class="fa fa-check-square-o"></i></a>
				<a href="family_particularmodal.php?reg_id=' . $id. '"><i class="fa fa-users"></i></a> '?></td>
				<td><?php echo '<a href="printtable.php?reg_id=' . $id. '"><input type="submit" name="" id="" value="Print"></a>'?></td>
				</tr>
				<?php
				
				}
				?>
				</tbody>
				
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
			<?php
			}else
			{
			?>
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
					<th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
              
				<tbody>
				  <?php
				  
				  $sqluser=mysql_query("select * from tbl_user  where  usertype!='Cheif Office Superitendent'");
				  $rwUser=mysql_fetch_array($sqluser);
				  $userType=$rwUser["usertype"];
				  $userName=$rwUser["username"];
				 // echo "$userName";
			  
				$sqlquery=mysql_query("select * from tbl_registration  where createdby='$userName'");
				while($rwReg=mysql_fetch_array($sqlquery))
				// $sqlquery=mysql_query("select * from tbl_registration  where createdby='".$_SESSION['SESS_NAME']."' AND usertype!='Cheif Office Superitendent'");
				// while($rwReg=mysql_fetch_array($sqlquery))
				{
				$id=$rwReg["reg_id"];
				//echo "$id";
				?>
				<tr>
				<!--td><?php echo $rwReg["registerno"];?></td-->
				<td><?php echo '<a href="viewemployeelist.php?reg_id=' . $id. '">'.$rwReg["registerno"].' </a>'?></td>
				<td><?php echo $rwReg["ppono"];?></td>
				<td><?php echo $rwReg["fullname"];?></td>
				<td><?php echo $rwReg["designation"];?></td>
				<td><?php echo $rwReg["station"];?></td>
				<td><?php echo $rwReg["department"];?></td>
				<td><?php echo $rwReg["dateofbirth"];?></td>
				<td><?php echo $rwReg["dateofretirment"];?></td>
				<td><?php echo '<a href="family_particularmodal.php?reg_id=' . $id. '"><i class="fa fa-users"></i></a>'?></td>
				<td><?php echo '<a href="printtable.php?reg_id=' . $id. '"><input type="submit" name="" id="" value="Print"></a>'?></td>
				</tr>
				<?php
				}
				?>
				</tbody>
				
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
			<?php
			
			}
			?>
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
  <script>
		  // $( document ).ready(function() {
			// $('#example').DataTable({
				 // "processing": true,
				 // "sAjaxSource":"userlist.php",
				 // "dom": 'lBfrtip',
				
				// });
		// });
		
		// "buttons": [
            // {
                // extend: 'collection',
                // text: 'Export',
                // buttons: [
                    // 'copy',
                    // 'excel',
                    // 'csv',
                    // 'pdf',
                    // 'print'
                // ]
            // }
        // ]
		
  </script>
 <?php
 
 include_once("footer.php");
 require("modal.php");
 ?>