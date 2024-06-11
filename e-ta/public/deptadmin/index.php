<?php
	require_once("../../global/dept_admin_header.php");
	require_once("../../global/dept_admin_topbar.php");
	require_once("../../global/dept_admin_sidebar.php");
?>
  <div class="content-wrapper">
    <section class="content-header" style="background-color:#95e9a7; padding-left:20px;padding-bottom:10px;">
      <span class="col-sm-12">
        <span class="text-left" style="font-family: 'Raleway', sans-serif; font-weight: 600;">
        डैशबोर्ड / Dashboard
        </span>
       <!--  <span style="float: right">
        <button class=" btn btn-danger" onclick="history.go(-1);">Back</button>
      </span> -->
    </span>
    <div class="clearfix"></div>
    </section>
		<!-- <section class="content-header" style="background-color:#5be439; padding-left:20px;padding-bottom:10px;">
      <h1>
        डैशबोर्ड / Dashboard
      </h1>
    </section> -->
		<section class="content">
      <!-- Small boxes (Stat box) -->
             <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
             <?php 
        $query = mysql_query("select count(id) as total from users where dept='".$_SESSION['dept']."' and role='13'");
        
        $resultset = mysql_fetch_array($query);
        echo "<h3>".$resultset['total']."</h3>";
      ?>
              <p>नियंत्रण अधिकारी /<br>Control Officer</p>
              
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            <a href="#" class="small-box-footer">अधिक जानकारी / More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
             <?php 
        $query = mysql_query("select count(id) as total from users where dept='".$_SESSION['dept']."' and role='12'");
        
        $resultset = mysql_fetch_array($query);
        echo "<h3>".$resultset['total']."</h3>";
      ?>
              <p>नियंत्रण प्रभारीक /<br>Control Incharge</p>
              
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            <a href="#" class="small-box-footer">अधिक जानकारी / More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
    </div>
          
    </section>
  </div>
  <!--Content code end here--->
 <?php
	require_once("../../global/dept_admin_footer.php");
 ?>
