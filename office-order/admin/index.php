<?php 
	$_GLOBALS['a'] = 'index';
session_start();
 if(!isset($_SESSION['SESS_MEMBER_NAME']))
 {
	// echo "<script>window.location='http://localhost/E-APAR/index.php';</script>";
 }
$GLOBALS['a'] = 'index';
include_once('../global/header.php');
include_once('../global/topbar.php');
//include_once('../global/sidebaradmin.php');

?>
<!-- Left side column. contains the logo and sidebar -->
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-top: -20px;">
    <!-- Content Header (Page header) -->
	<h1>&nbsp;&nbsp;&nbsp;Admin</h1>
	<div class="row">
	<div class="col-md-12">
	    <!--div class="box box-default">
			   <div class="box-body">
			   <div class="alert alert-success alert-dismissible" style="height: 67px;">
                <h4><i class="icon fa fa-bullhorn"></i> Notification..!</h4>
                <marquee direction="left" onmouseover="this.stop()" onmouseout="this.start();" loop="-1" scroll-delay="10000">
				<?php
					// $sql_helpdesk=mysql_query("select * from tbl_helpdesk where status=0");
					// while($rwHelpdesk=mysql_fetch_array($sql_helpdesk))
					// {
						
				?>
				
				 <label><i class="fa fa-angle-double-right"></i>&nbsp;<?php //echo $rwHelpdesk["subject"]; ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
				<?php
					// }
				?>
				</marquee>
              </div>
			   </div>
		</div>
	</div-->
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
			<div class="box-body" style="padding:10px 10px 10px 10px;">
	<div class="col-md-3 col-sm-6">
          <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
			   
			  </h3>

              <p>ACCOUNTS</p>
            </div>
            
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
   </div>
        <!-- ./col -->
		<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
			   
			  </h3>
              <p style="font-size:12px;">GENERAL ADMINISTRATION</p>
            </div>
           
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>
			 
			  </h3>

              <p>AUDIT</p>
            </div>
         
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		
        <!-- ./col -->
        <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
			 
			  </h3>
			  <p>COMMERCIAL</p>
            </div>
          
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> </div>
        </div>
	
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  </div>
  </div>
<?php
 include_once('../global/footer.php');
 ?> 