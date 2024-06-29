<?php 
 session_start();
 if(!isset($_SESSION['EMP_PF_NO']))
 {
	 echo "<script>window.location='http://localhost/E-APAR/index.php';</script>";
 }
include_once('../global/header.php');
include_once('../global/topbaremployee.php');
include_once('../global/sidebaremployee.php');

?>
<!-- Left side column. contains the logo and sidebar -->
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <p>
         <?php
				echo $_SESSION['SESS_EMPLOYEE_NAME'];
		 ?>
      </p>
      <ol class="breadcrumb">
       
        <li class="active">
			<!--button type="button" href="#myModal" class="btn btn-success" id="#btn1"><i class="fa fa-user"> Add User</i></button-->
	
      </li>
	  </ol>
	  <br>
    </section>
	
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	
      <div class="row">
		<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
			   <?php
			   $sqlcount=mysqli_query($conn,"select * from tbl_employee where emplcode='".$_SESSION['EMP_PF_NO']."' ");
			  $rwCount=mysqli_fetch_array($sqlcount);
			//  $count=$rwCount["count(empid)"];
			  $count=$rwCount["emplcode"];
			  echo "$count";
			  ?>
			  </h3>
              <p>Personal Details</p>
            </div>
  
     
            <a href="frmemployeedetails.php?emplcode=".$emplcode.'" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
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
