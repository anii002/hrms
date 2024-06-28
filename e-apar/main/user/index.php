<?php 
 session_start();
 if(!isset($_SESSION['SESS_MEMBER_NAME']))
 {
	 echo "<script>window.location='../../hrms/e-apar/index.php';</script>";
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
      <p>
         <?php
				echo "<label style='font-size:20px;color:black;'><i class='fa fa-user'> </i> ".$_SESSION['SESS_USER_NAME']."</label>";
		 ?>
      </p>
    <div class="row">
	<div class="col-md-12">
	    <div class="box box-default">
			   <div class="box-body">
			   <div class="alert alert-success alert-dismissible" style="height: 67px;">
                <h4><i class="icon fa fa-bullhorn"></i> Notification..!</h4>
                <marquee direction="left" onmouseover="this.stop()" onmouseout="this.start();" loop="-1" scroll-delay="10000">
				<?php
					$sql_helpdesk=mysqli_query($conn,"select * from tbl_helpdesk");
					while($rwHelpdesk=mysqli_fetch_array($sql_helpdesk))
					{
						
				?>
				<a href=""><p><?php echo $rwHelpdesk["subject"]; ?> | </p></a>
				<?php
					}
				?>
				</marquee>
              </div>
			   </div>
		</div>
	</div>
	</div>
	  <br>
    </section>
	
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	
      <div class="row">
	  <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Dashboard...</h3><hr>
            </div>
		<div class="col-md-3 col-sm-6">
          <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
			  <?php
			  $sqlcount=mysqli_query($conn,"select count(empid) from tbl_employee where dept='MECHANICAL C & W' ");
			  $rwCount=mysqli_fetch_array($sqlcount);
			  $count=$rwCount["count(empid)"];
			  echo "$count";
			  ?>
			  </h3>

              <p>MECHANICAL C & W</p>
            </div>
            
            <a href="dept_wise_list.php?dept=ACCOUNTS" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
		<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
			  <?php
			  $sqlcount=mysqli_query($conn,"select count(empid) from tbl_employee where dept='GENERAL ADMINISTRATION'  ");
			  $rwCount=mysqli_fetch_array($sqlcount);
			  $count=$rwCount["count(empid)"];
			  echo "$count";
			  ?>
			  </h3>
              <p style="font-size:14px;">GENERAL ADMINISTRATION</p>
            </div>
           
            <a href="dept_wise_list.php?dept=GENERAL ADMINISTRATION" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>
			<?php
			   $sqlcount=mysqli_query($conn,"select count(empid) from tbl_employee where dept='AUDIT' ");
			  $rwCount=mysqli_fetch_array($sqlcount);
			  $count=$rwCount["count(empid)"];
			  echo "$count";
			?>
			  </h3>

              <p>AUDIT</p>
            </div>
            <a href="dept_wise_list.php?dept=AUDIT" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		
        <!-- ./col -->
        <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
			<?php
			   $sqlcount=mysqli_query($conn,"select count(empid) from tbl_employee where dept='COMMERCIAL' ");
			  $rwCount=mysqli_fetch_array($sqlcount);
			  $count=$rwCount["count(empid)"];
			  echo "$count";
			?>
			  </h3>
			  <p>COMMERCIAL</p>
            </div>
         <a href="dept_wise_list.php?dept=COMMERCIAL" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		
		   <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3>
			  <?php
			 $sqlcount=mysqli_query($conn,"select count(empid) from tbl_employee where dept='ELECTRICAL' ");
			  $rwCount=mysqli_fetch_array($sqlcount);
			  $count=$rwCount["count(empid)"];
			  echo "$count";
			  ?>
			  </h3>
			  <p>ELECTRICAL</p>
            </div>
         
            <a href="dept_wise_list.php?dept=ELECTRICAL" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		
		   <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3>
			  <?php
			  $sqlcount=mysqli_query($conn,"select count(empid) from tbl_employee where dept='ENGINEERING' ");
			  $rwCount=mysqli_fetch_array($sqlcount);
			  $count=$rwCount["count(empid)"];
			  echo "$count";
			  ?>
			  </h3>
			  <p>ENGINEERING</p>
            </div>
           
            <a href="dept_wise_list.php?dept=ENGINEERING" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		
		   <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
			  <?php
			   $sqlcount=mysqli_query($conn,"select count(empid) from tbl_employee where dept='MECHANICAL LOCO' ");
			  $rwCount=mysqli_fetch_array($sqlcount);
			  $count=$rwCount["count(empid)"];
			  echo "$count";
			  ?>
			  </h3>
			  <p>MECHANICAL LOCO</p>
            </div>
          
            <a href="dept_wise_list.php?dept=MECHANICAL" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		
		   <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>
			  <?php
			 $sqlcount=mysqli_query($conn,"select count(empid) from tbl_employee where dept='MEDICAL' ");
			  $rwCount=mysqli_fetch_array($sqlcount);
			  $count=$rwCount["count(empid)"];
			  echo "$count";
			  ?>
			  </h3>
			  <p>MEDICAL</p>
            </div>
          
            <a href="dept_wise_list.php?dept=MEDICAL" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
        <!-- ./col -->
        <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
			  <?php
			  $sqlcount=mysqli_query($conn,"select count(empid) from tbl_employee where dept='OPERATING' ");
			  $rwCount=mysqli_fetch_array($sqlcount);
			  $count=$rwCount["count(empid)"];
			  echo "$count";
			  ?>
			  </h3>

              <p style="font-size:14px;">OPERATING</p>
            </div>
         
            <a href="dept_wise_list.php?dept=OPERATING" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
        <!-- ./col -->
        <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3>
			   <?php
			   $sqlcount=mysqli_query($conn,"select count(empid) from tbl_employee where dept='PERSONNEL' ");
			  $rwCount=mysqli_fetch_array($sqlcount);
			  $count=$rwCount["count(empid)"];
			  echo "$count";
			  ?>
			  </h3>

              <p>PERSONNEL</p>
            </div>
            
            <a href="dept_wise_list.php?dept=PERSONNEL" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
        <!-- ./col -->
		
		   <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
			   <?php
			  $sqlcount=mysqli_query($conn,"select count(empid) from tbl_employee where dept='SECURITY' ");
			  $rwCount=mysqli_fetch_array($sqlcount);
			  $count=$rwCount["count(empid)"];
			  echo "$count";
			  ?>
			  </h3>

              <p>SECURITY</p>
            </div>
           
            <a href="dept_wise_list.php?dept=SECURITY" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
	
		<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
			   <?php
			   $sqlcount=mysqli_query($conn,"select count(empid) from tbl_employee where dept='SnT' ");
			  $rwCount=mysqli_fetch_array($sqlcount);
			  $count=$rwCount["count(empid)"];
			  echo "$count";
			  ?>
			  </h3>

              <p>S and T</p>
            </div>
           
            <a href="dept_wise_list.php?dept=SnT" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		
		<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
			   <?php
			   $sqlcount=mysqli_query($conn,"select count(empid) from tbl_employee where dept='STORES' ");
			  $rwCount=mysqli_fetch_array($sqlcount);
			  $count=$rwCount["count(empid)"];
			  echo "$count";
			  ?>
			  </h3>

              <p>STORE</p>
            </div>
            <a href="dept_wise_list.php?dept=SIGNAL AND TELECOMMUNICATION" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		
		<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
			   <?php
			   $sqlcount=mysqli_query($conn,"select count(empid) from tbl_employee where status='0' ");
			  $rwCount=mysqli_fetch_array($sqlcount);
			  $count=$rwCount["count(empid)"];
			  echo "$count";
			  ?>
			  </h3>

              <p>In Process</p>
            </div>
            <a href="frmtotalapr.php?value=0" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		
		
		<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3>
			   <?php
			   $sqlcount=mysqli_query($conn,"select count(empid) from tbl_employee where status='1' ");
			  $rwCount=mysqli_fetch_array($sqlcount);
			  $count=$rwCount["count(empid)"];
			  echo "$count";
			  ?>
			  </h3>

              <p>Completed</p>
            </div>
            <a href="frmtotalapr.php?value=1" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		
		<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
			   <?php
			   $sqlcount=mysqli_query($conn,"select count(empid) from tbl_employee");
			  $rwCount=mysqli_fetch_array($sqlcount);
			  $count=$rwCount["count(empid)"];
			  echo "$count";
			  ?>
			  </h3>

              <p>Total</p>
            </div>
            <a href="frmtotalapr.php?value=0" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		
      </div>
	     </section>
      <!-- /.row -->
	  <?php
	  $sqlUser=mysqli_query($conn,"select * from tbl_user  where username = '".$_SESSION['SESS_MEMBER_NAME']."'");
					$rwUser=mysqli_fetch_array($sqlUser);
					$usertype=$rwUser["accesslevel"];
					if($usertype=='Cadder Cheif Office Superitendent')
					{
						?>
	  
				<?php
					}
				?>

    <!-- /.content -->
 </div>
 </div>
 <?php
include_once('../global/footer.php');
 ?> 
