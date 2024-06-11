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
  <div class="content-wrapper" style="margin-top: -20px;">
    <!-- Content Header (Page header) -->
	<h2>Admin</h2>
	<div class="row">
    	<div class="col-md-12">
            <div class="alert alert-success alert-dismissible" style="height: 50px;">
	            <div class="col-md-3">
                    <h4><i class="icon fa fa-bullhorn"></i> Notification..!</h4>
                </div>
                <div class="col-md-9">
                    <marquee direction="left" onmouseover="this.stop()" onmouseout="this.start();" loop="-1" scroll-delay="10000">
    				<?php
    					$sql_helpdesk=mysql_query("select * from tbl_helpdesk where status=0");
    					while($rwHelpdesk=mysql_fetch_array($sql_helpdesk))
    					{
    						
    				?>
    				
    				<label><i class="fa fa-angle-double-right"></i>&nbsp;<?php echo $rwHelpdesk["subject"]; ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
    				<?php
    					}
    				?>
    				</marquee>
				</div>
            </div>
    	</div>
	</div>
    </section>
	
    <!-- Main content -->
    <section class="">
      <!-- Small boxes (Stat box) -->
        <div class="row">
            <!--<div class="box-header">-->
            <!--  <h3 class="box-title">Dashboard...</h3><hr>-->
            <!--</div>-->
		    <div class="box-body">
            	<div class="col-md-3 col-sm-6"> 
                    <div class="small-box bg-yellow">
                        <div class="inner">
                          <h3>
            			  <?php
            			  $sqlcount=mysql_query("select count(empid) from tbl_employee where dept='ACCOUNTS' ");
            			  $rwCount=mysql_fetch_array($sqlcount);
            			  $count=$rwCount["count(empid)"];
            			  echo "$count";
            			  ?>
            			  </h3> 
                          <p>ACCOUNTS</p>
                        </div> 
                        <a href="dept_wise_list.php?dept=ACCOUNTS" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div> 
        		<div class="col-md-3 col-sm-6"> 
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>
                			  <?php
                			  $sqlcount=mysql_query("select count(empid) from tbl_employee where dept='GENERAL ADMINISTRATION' OR dept='GEN. ADMN.'");
                			  $rwCount=mysql_fetch_array($sqlcount);
                			  $count=$rwCount["count(empid)"];
                			  echo "$count";
                			 
                			  ?>
                			</h3>
                            <p style="font-size:12px;">GENERAL ADMINISTRATION</p>
                        </div> 
                        <a href="dept_wise_list.php?dept=GENERAL ADMINISTRATION" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          
                    </div>
                </div>
        		<div class="col-md-3 col-sm-6"> 
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3>
                    			<?php
                    			   $sqlcount=mysql_query("select count(empid) from tbl_employee where dept='AUDIT' ");
                    			  $rwCount=mysql_fetch_array($sqlcount);
                    			  $count=$rwCount["count(empid)"];
                    			  echo "$count";
                    			?>
                			</h3> 
                            <p>AUDIT</p>
                        </div> 
                        <a href="dept_wise_list.php?dept=AUDIT" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          
                    </div>
                </div> 
                <div class="col-md-3 col-sm-6"> 
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>
                    			<?php
                    			   $sqlcount=mysql_query("select count(empid) from tbl_employee where dept='COMMERCIAL' ");
                    			  $rwCount=mysql_fetch_array($sqlcount);
                    			  $count=$rwCount["count(empid)"];
                    			  echo "$count";
                    			?>
            			    </h3>
        			        <p>COMMERCIAL</p>
                        </div> 
                        <a href="dept_wise_list.php?dept=COMMERCIAL" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          
                    </div>
                </div> 
    		    <div class="col-md-3 col-sm-6"> 
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h3>
                			  <?php
                    			  $sqlcount=mysql_query("select count(empid) from tbl_employee where dept='ELECTRICAL' ");
                    			  $rwCount=mysql_fetch_array($sqlcount);
                    			  $count=$rwCount["count(empid)"];
                    			  echo "$count";
                			  ?>
        			        </h3>
        			        <p>ELECTRICAL</p>
                        </div>
                        <a href="dept_wise_list.php?dept=ELECTRICAL" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          
                    </div>
                </div> 
    		    <div class="col-md-3 col-sm-6"> 
                    <div class="small-box bg-orange">
                        <div class="inner">
                            <h3>
                			  <?php
                    			  $sqlcount=mysql_query("select count(empid) from tbl_employee where dept='ENGINEERING' ");
                    			  $rwCount=mysql_fetch_array($sqlcount);
                    			  $count=$rwCount["count(empid)"];
                    			  echo "$count";
                			  ?>
            			    </h3>
            			    <p>ENGINEERING</p>
                        </div>
                        <a href="dept_wise_list.php?dept=ENGINEERING" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          
                    </div>
                </div> 
    		    <div class="col-md-3 col-sm-6"> 
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>
                			  <?php
                    			  $sqlcount=mysql_query("select count(empid) from tbl_employee where dept='MECHANICAL' ");
                    			  $rwCount=mysql_fetch_array($sqlcount);
                    			  $count=$rwCount["count(empid)"];
                    			  echo "$count";
                			  ?>
            			    </h3>
            			    <p>MECHANICAL</p>
                        </div>
                        <a href="dept_wise_list.php?dept=MECHANICAL" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          
                    </div>
                </div> 
    		    <div class="col-md-3 col-sm-6"> 
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3>
                			  <?php
                    			  $sqlcount=mysql_query("select count(empid) from tbl_employee where dept='MEDICAL' ");
                    			  $rwCount=mysql_fetch_array($sqlcount);
                    			  $count=$rwCount["count(empid)"];
                    			  echo "$count";
                			  ?>
            			    </h3>
    			            <p>MEDICAL</p>
                        </div>
                        <a href="dept_wise_list.php?dept=MEDICAL" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          
                    </div>
                </div> 
                <div class="col-md-3 col-sm-6"> 
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>
                			  <?php
                			  $sqlcount=mysql_query("select count(empid) from tbl_employee where dept='OPERATING' ");
                			  $rwCount=mysql_fetch_array($sqlcount);
                			  $count=$rwCount["count(empid)"];
                			  echo "$count";
                			  ?>
            			    </h3> 
                            <p style="font-size:14px;">OPERATING</p>
                        </div>
                        <a href="dept_wise_list.php?dept=OPERATING" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          
                    </div>
                </div> 
                <div class="col-md-3 col-sm-6"> 
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h3>
                			   <?php
                    			  $sqlcount=mysql_query("select count(empid) from tbl_employee where dept='PERSONNEL' ");
                    			  $rwCount=mysql_fetch_array($sqlcount);
                    			  $count=$rwCount["count(empid)"];
                    			  echo "$count";
                			  ?>
            			    </h3> 
                            <p>PERSONNEL</p>
                        </div>
                        <a href="dept_wise_list.php?dept=PERSONNEL" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          
                    </div>
                </div>  
    		    <div class="col-md-3 col-sm-6"> 
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>
                			   <?php
                    			  $sqlcount=mysql_query("select count(empid) from tbl_employee where dept='SECURITY' ");
                    			  $rwCount=mysql_fetch_array($sqlcount);
                    			  $count=$rwCount["count(empid)"];
                    			  echo "$count";
                			  ?>
            			    </h3> 
                            <p>SECURITY</p>
                        </div>
                        <a href="dept_wise_list.php?dept=SECURITY" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          
                    </div>
                </div> 
        		<div class="col-md-3 col-sm-6"> 
                    <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3>
                			  <?php
                    			  $sqlcount=mysql_query("select count(empid) from tbl_employee where dept='SnT' ");
                    			  $rwCount=mysql_fetch_array($sqlcount);
                    			  $count=$rwCount["count(empid)"];
                    			  echo "$count";
                			  ?>
            			  </h3> 
                          <p>S and T</p>
                        </div>
                        <a href="dept_wise_list.php?dept=SnT" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          
                    </div>
                </div> 
        		<div class="col-md-3 col-sm-6"> 
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>
                			   <?php
                    			  $sqlcount=mysql_query("select count(empid) from tbl_employee where dept='STORES' ");
                    			  $rwCount=mysql_fetch_array($sqlcount);
                    			  $count=$rwCount["count(empid)"];
                    			  echo "$count";
                			   ?>
            			    </h3> 
                            <p>STORE</p>
                        </div>
                        <a href="dept_wise_list.php?dept=STORES" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          
                    </div>
                </div> 
        		<div class="col-md-3 col-sm-6"> 
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>
                			   <?php
                    			  $sqlcount=mysql_query("select count(empid) from tbl_employee where status='0' ");
                    			  $rwCount=mysql_fetch_array($sqlcount);
                    			  $count=$rwCount["count(empid)"];
                    			  echo "$count";
                			  ?>
            			    </h3> 
                            <p>In Process</p>
                        </div>
                        <a href="frmtotalapr.php?value=0" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          
                    </div>
                </div> 
        		<div class="col-md-3 col-sm-6"> 
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h3>
                			   <?php
                    			  $sqlcount=mysql_query("select count(empid) from tbl_employee where status='1' ");
                    			  $rwCount=mysql_fetch_array($sqlcount);
                    			  $count=$rwCount["count(empid)"];
                    			  echo "$count";
                			  ?>
            			    </h3> 
                            <p>Completed</p>
                        </div>
                        <a href="frmtotalapr.php?value=1" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          
                    </div>
                </div> 
        		<div class="col-md-3 col-sm-6"> 
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>
                			   <?php
                    			  $sqlcount=mysql_query("select count(empid) from tbl_employee");
                    			  $rwCount=mysql_fetch_array($sqlcount);
                    			  $count=$rwCount["count(empid)"];
                    			  echo "$count";
                			  ?>
            			    </h3> 
                            <p>Total</p>
                        </div>
                        <a href="frmtotalapr.php?value=0" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          
                    </div>
                </div> 
            </div>
        </div>
    </section> 
  </div>
<?php
 include_once('../global/footer.php');
 ?> 