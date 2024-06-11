<?php 
session_start();
 if(!isset($_SESSION['SESS_MEMBER_ID']))
 {
	 echo "<script>alert('Please login first');window.location='../index.php';</script>";
 }
include_once('global/header.php');
include_once('global/topbar.php');
include_once('global/sidebaradmin.php');
 $ename=$_SESSION['SESS_USER_FULLNAME'];

?>
<!-- Left side column. contains the logo and sidebar -->
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-top: -20px;">
    <!-- Content Header (Page header) -->
	<h1>User</h1>
	<div class="row">
	<div class="col-md-12">
	   
	</div>
    </section>
	
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        <div class="row">
		<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title" style="margin-left:20px;">Dashboard</h3><hr>
            </div>
  <div class="box-body"  style="padding:10px 10px 10px 10px;">
	<div class="col-md-3 col-sm-6">
          <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
			   
			  </h3>

              <p>ACCOUNTS</p>
			   <?php 
					$sql=mysql_query("select * from post_schedule WHERE dept='1' AND updated_by='$ename'");
						$count = mysql_num_rows($sql);
		               //if($count>0)		
			
					if($sql)
					{
						echo "<h1 style='margin-top:-10px;margin-bottom:-10px'>".$count."</h1>";
				    }
					else
					{
						echo "<script>alert('Entries Not Found')</script>";
					}
					
				?>
            </div>
            
            <a href="dept_wise_details.php?dept=1" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
   </div>
        <!-- ./col -->
		<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
			   
			  </h3>
              <p >ADMIN</p>
			    <?php 
					$sql=mysql_query("select * from post_schedule WHERE dept='2' AND updated_by='$ename'");
						$count = mysql_num_rows($sql);
		               //if($count>0)		
			
					if($sql)
					{
						echo "<h1 style='margin-top:-10px;margin-bottom:-10px'>".$count."</h1>";
				    }
					else
					{
						echo "<script>alert('Entries Not Found')</script>";
					}
					
				?>
            </div>
           
            <a href="dept_wise_details.php?dept=2" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>
			 
			  </h3>

              <p>PERSONNEL</p>
			   <?php 
					$sql=mysql_query("select * from post_schedule WHERE dept='3' AND updated_by='$ename'");
						$count = mysql_num_rows($sql);
		               //if($count>0)		
			
					if($sql)
					{
						echo "<h1 style='margin-top:-10px;margin-bottom:-10px'>".$count."</h1>";
				    }
					else
					{
						echo "<script>alert('Entries Not Found')</script>";
					}
					
				?>
            </div>
         
            <a href="dept_wise_details.php?dept=3" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		
        <!-- ./col -->
        <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
			 
			  </h3>
			  <p>ELECTRICAL</p>
			   <?php 
					$sql=mysql_query("select * from post_schedule WHERE dept='4' AND updated_by='$ename'");
						$count = mysql_num_rows($sql);
		               //if($count>0)		
			
					if($sql)
					{
						echo "<h1 style='margin-top:-10px;margin-bottom:-10px'>".$count."</h1>";
				    }
					else
					{
						echo "<script>alert('Entries Not Found')</script>";
					}
					
				?>
            </div>
          
            <a href="dept_wise_details.php?dept=4" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> 
		</div>
        </div>
	
      </div>
	  <div class="box-body" style="padding:10px 10px 10px 10px;">
	<div class="col-md-3 col-sm-6">
          <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
			   
			  </h3>

              <p>ELECTRICAL TRD</p>
			   <?php 
					$sql=mysql_query("select * from post_schedule WHERE dept='5' AND updated_by='$ename'");
						$count = mysql_num_rows($sql);
		               //if($count>0)		
			
					if($sql)
					{
						echo "<h1 style='margin-top:-10px;margin-bottom:-10px'>".$count."</h1>";
				    }
					else
					{
						echo "<script>alert('Entries Not Found')</script>";
					}
					
				?>
            </div>
            
            <a href="dept_wise_details.php?dept=5" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
   </div>
        <!-- ./col -->
		<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
			   
			  </h3>
              <p>C & W</p>
			   <?php 
					$sql=mysql_query("select * from post_schedule WHERE dept='6' AND updated_by='$ename'");
						$count = mysql_num_rows($sql);
		               //if($count>0)		
			
					if($sql)
					{
						echo "<h1 style='margin-top:-10px;margin-bottom:-10px'>".$count."</h1>";
				    }
					else
					{
						echo "<script>alert('Entries Not Found')</script>";
					}
					
				?>
            </div>
           
            <a href="dept_wise_details.php?dept=6" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>
			 
			  </h3>

              <p>LOCO</p>
			   <?php 
					$sql=mysql_query("select * from post_schedule WHERE dept='7' AND updated_by='$ename'");
						$count = mysql_num_rows($sql);
		               //if($count>0)		
			
					if($sql)
					{
						echo "<h1 style='margin-top:-10px;margin-bottom:-10px'>".$count."</h1>";
				    }
					else
					{
						echo "<script>alert('Entries Not Found')</script>";
					}
					
				?>
            </div>
         
            <a href="dept_wise_details.php?dept=7" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		
        <!-- ./col -->
        <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
			 
			  </h3>
			  <p>S & T</p>
			   <?php 
					$sql=mysql_query("select * from post_schedule WHERE dept='8' AND updated_by='$ename'");
						$count = mysql_num_rows($sql);
		               //if($count>0)		
			
					if($sql)
					{
						echo "<h1 style='margin-top:-10px;margin-bottom:-10px'>".$count."</h1>";
				    }
					else
					{
						echo "<script>alert('Entries Not Found')</script>";
					}
					
				?>
            </div>
          
            <a href="dept_wise_details.php?dept=8" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> 
		</div>
        </div>
	
      </div>
	  <div class="box-body" style="padding:10px 10px 10px 10px;">
	<div class="col-md-3 col-sm-6">
          <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
			   
			  </h3>

              <p>ENGINEERING</p>
			   <?php 
					$sql=mysql_query("select * from post_schedule WHERE dept='9' AND updated_by='$ename'");
						$count = mysql_num_rows($sql);
		               //if($count>0)		
			
					if($sql)
					{
						echo "<h1 style='margin-top:-10px;margin-bottom:-10px'>".$count."</h1>";
				    }
					else
					{
						echo "<script>alert('Entries Not Found')</script>";
					}
					
				?>
            </div>
            
            <a href="dept_wise_details.php?dept=9" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
   </div>
        <!-- ./col -->
		<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
			   
			  </h3>
              <p>MEDICAL</p>
			   <?php 
					$sql=mysql_query("select * from post_schedule WHERE dept='10' AND updated_by='$ename'");
						$count = mysql_num_rows($sql);
		               //if($count>0)		
			
					if($sql)
					{
						echo "<h1 style='margin-top:-10px;margin-bottom:-10px'>".$count."</h1>";
				    }
					else
					{
						echo "<script>alert('Entries Not Found')</script>";
					}
					
				?>
            </div>
           
            <a href="dept_wise_details.php?dept=10" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>
			 
			  </h3>

              <p>COMMERCIAL</p>
			   <?php 
					$sql=mysql_query("select * from post_schedule WHERE dept='11' AND updated_by='$ename'");
						$count = mysql_num_rows($sql);
		               //if($count>0)		
			
					if($sql)
					{
						echo "<h1 style='margin-top:-10px;margin-bottom:-10px'>".$count."</h1>";
				    }
					else
					{
						echo "<script>alert('Entries Not Found')</script>";
					}
					
				?>
            </div>
         
            <a href="dept_wise_details.php?dept=11" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		
        <!-- ./col -->
        <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
			 
			  </h3>
			  <p>OPERATING</p>
			   <?php 
					$sql=mysql_query("select * from post_schedule WHERE dept='12' AND updated_by='$ename'");
						$count = mysql_num_rows($sql);
		               //if($count>0)		
			
					if($sql)
					{
						echo "<h1 style='margin-top:-10px;margin-bottom:-10px'>".$count."</h1>";
				    }
					else
					{
						echo "<script>alert('Entries Not Found')</script>";
					}
					
				?>
            </div>
          
            <a href="dept_wise_details.php?dept=12" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> 
		</div>
        </div>
	
      </div>
      <!-- /.row -->
	  
    </section>
	
    <!-- /.content -->
	
  </div>
  
  </div>
  
  </div>
  
<?php
 include_once('/global/footer.php');
 ?> 