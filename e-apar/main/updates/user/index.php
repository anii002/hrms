<?php 
 session_start();
 if(!isset($_SESSION['SESS_USER_NAME']))
 {
	 echo "<script>window.location='http://localhost/E_APR_FINAL/index.php';</script>";
 }
include_once('../global/header.php');
include_once('../global/topbaruser.php');
include_once('../global/sidebaruser.php');

?>
 <script>
//----------------------------// Document Ready Function //----------------------------//
// $(document).ready(function ()
// {
// ShowRecords();
// $("#frm").submit(function(event)
// {
	// var formData = new FormData($(this)[0]);
	// formData.append("Flag",$("#btnSave").val());
	// $.ajax({
		// url: "Ajaxgroups.php",
		// type: 'POST',
		// data: formData,
		// async: false,
		// success: function (data) {
			// alert(data);
			// ShowRecords();
		// },
		// cache: false,
		// contentType: false,
		// processData: false
	// });
// });
// });///ready fun close


//----------------------------//Function ShowRecords//----------------------------//
// function ShowRecords()
// {
	// $.post("Ajaxgroups.php",
				// {
					// Flag:"ShowRecords"
				// },
					// function(data,success)
					// {
						// $("#divRecords").html(data);
						// var oTable = $('#tbl_group').dataTable
						// ({
							// "oLanguage":
							// {
								// "sSearch": "Search all columns:"
							// },
							// "aoColumnDefs":
							// [
								// {
									// 'bSortable': false,
									// 'aTargets': [0]
								// } //disables sorting for column one
							// ],
							// 'iDisplayLength': 12,
							// "sPaginationType": "full_numbers",
							// "dom": 'T<"clear">lfrtip'
						// });
					// }
			// );
// }
</script> <!-- Left side column. contains the logo and sidebar -->
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin
      </h1>
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
        <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
			  <?php
			  $sqlcount=mysql_query("select count(reg_id) from tbl_registration ");
			  $rwCount=mysql_fetch_array($sqlcount);
			  $count=$rwCount["count(reg_id)"];
			  echo "$count";
			  ?>
			  </h3>

              <p>ACCOUNTS</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-plus"></i>
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
			  <?php
			  $sqlcount=mysql_query("select count(userid) from tbl_user ");
			  $rwCount=mysql_fetch_array($sqlcount);
			  $count=$rwCount["count(userid)"];
			  echo "$count";
			 
			  // $sqlcount=mysql_query("SELECT count(createddate) FROM tbl_registration WHERE createddate = CURDATE() ");
				// $rwCount=mysql_fetch_array($sqlcount);
			  // $count=$rwCount["count(createddate)"];
			  // echo "$count";
			 
			  ?>
			  </h3>
              <p>ADMINISTRATION</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>
			<?php
			  $sqlcount=mysql_query("select count(reg_id) from tbl_registration where typeofretirement='Supperannuation'");
			  $rwCount=mysql_fetch_array($sqlcount);
			  $count=$rwCount["count(reg_id)"];
			  echo "$count";
			?>
			  </h3>

              <p>AUDIT</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		
        <!-- ./col -->
        <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
			<?php
			  $sqlcount=mysql_query("select count(reg_id) from tbl_registration where typeofretirement='Voluntary Retirement'");
			  $rwCount=mysql_fetch_array($sqlcount);
			  $count=$rwCount["count(reg_id)"];
			  echo "$count";
			?>
			  </h3>
			  <p>COMMERCIAL</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		
		   <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3>
			  <?php
			  $sqlcount=mysql_query("select count(reg_id) from tbl_registration where typeofretirement='DeathCase'");
			  $rwCount=mysql_fetch_array($sqlcount);
			  $count=$rwCount["count(reg_id)"];
			  echo "$count";
			  ?>
			  </h3>
			  <p>ELECTRICAL</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		
		   <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3>
			  <?php
			  $sqlcount=mysql_query("select count(reg_id) from tbl_registration where typeofretirement='Compulsory Retirement'");
			  $rwCount=mysql_fetch_array($sqlcount);
			  $count=$rwCount["count(reg_id)"];
			  echo "$count";
			  ?>
			  </h3>
			  <p>ENGINEERING</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		
		   <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
			  <?php
			  $sqlcount=mysql_query("select count(reg_id) from tbl_registration where typeofretirement='Technical Resignation'");
			  $rwCount=mysql_fetch_array($sqlcount);
			  $count=$rwCount["count(reg_id)"];
			  echo "$count";
			  ?>
			  </h3>
			  <p>MECHANICAL</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		
		   <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>
			  <?php
			  $sqlcount=mysql_query("select count(reg_id) from tbl_registration where typeofretirement='Provisional Pension'");
			  $rwCount=mysql_fetch_array($sqlcount);
			  $count=$rwCount["count(reg_id)"];
			  echo "$count";
			  ?>
			  </h3>
			  <p>MEDICAL</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
        <!-- ./col -->
        <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
			  <?php
			  $sqlcount=mysql_query("select count(reg_id) from tbl_registration where typeofretirement='Compassionate Allowance'");
			  $rwCount=mysql_fetch_array($sqlcount);
			  $count=$rwCount["count(reg_id)"];
			  echo "$count";
			  ?>
			  </h3>

              <p style="font-size:14px;">OPERATING</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
        <!-- ./col -->
        <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3>
			   <?php
			  $sqlcount=mysql_query("select count(reg_id) from tbl_registration where status=0");
			  $rwCount=mysql_fetch_array($sqlcount);
			  $count=$rwCount["count(reg_id)"];
			  echo "$count";
			  ?>
			  </h3>

              <p>PERSONNEL</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
        <!-- ./col -->
		
		   <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
			   <?php
			  $sqlcount=mysql_query("select count(reg_id) from tbl_registration where status=1");
			  $rwCount=mysql_fetch_array($sqlcount);
			  $count=$rwCount["count(reg_id)"];
			  echo "$count";
			  ?>
			  </h3>

              <p>SECURITY</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
	
			   <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
			   <?php
			  $sqlcount=mysql_query("select count(reg_id) from tbl_registration");
			  $rwCount=mysql_fetch_array($sqlcount);
			  $count=$rwCount["count(reg_id)"];
			  echo "$count";
			  ?>
			  </h3>

              <p>S &amp; T</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		
		
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <script>
// function ShowTable()
// {
	// $.post("AttedanceOperation.php",
	// {
		// Flag:"ShowTableDataEmployee",
		// Date:$("#txtDate").val()
	// },
	// function (data,success)
	// {
		// $("#divShowTable").html(data);
	// });
											
// }
// $(document).ready(function()
	// {
		// ShowTable();
		// $('#txtDate').datepicker({
              //  dateFormat: "yy-mm-dd"
                 // dateFormat: "HH:MM:ss"
          // });
	// });
</script>
   <?php

 //include_once('../global/Modal_Index.php');
 include_once('../global/footer.php');
 ?> 