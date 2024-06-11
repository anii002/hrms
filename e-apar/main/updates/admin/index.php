<?php 
 session_start();
 if(!isset($_SESSION['SESS_MEMBER_NAME']))
 {
	 echo "<script>window.location='http://localhost/E_APR_FINAL/index.php';</script>";
 }
include_once('../global/header.php');
include_once('../global/topbar.php');
include_once('../global/sidebaradmin.php');

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
			  $sqlcount=mysql_query("select count(empid) from tbl_employee where dept='ACCOUNTS' ");
			  $rwCount=mysql_fetch_array($sqlcount);
			  $count=$rwCount["count(empid)"];
			  echo "$count";
			  ?>
			  </h3>

              <p>ACCOUNTS</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-plus"></i>
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
			  $sqlcount=mysql_query("select count(empid) from tbl_employee where dept='GENERAL ADMINISTRATION' ");
			  $rwCount=mysql_fetch_array($sqlcount);
			  $count=$rwCount["count(empid)"];
			  echo "$count";
			 
			  // $sqlcount=mysql_query("SELECT count(createddate) FROM tbl_registration WHERE createddate = CURDATE() ");
				// $rwCount=mysql_fetch_array($sqlcount);
			  // $count=$rwCount["count(createddate)"];
			  // echo "$count";
			 
			  ?>
			  </h3>
              <p style="font-size:14px;">GENERAL ADMINISTRATION</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="dept_wise_list.php?dept=GENERAL ADMINISTRATION" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		<div class="col-md-3 col-sm-6">
          <!-- small box -->
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
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
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
			   $sqlcount=mysql_query("select count(empid) from tbl_employee where dept='COMMERCIAL' ");
			  $rwCount=mysql_fetch_array($sqlcount);
			  $count=$rwCount["count(empid)"];
			  echo "$count";
			?>
			  </h3>
			  <p>COMMERCIAL</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="dept_wise_list.php?dept=COMMERCIAL" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		
		   <div class="col-md-3 col-sm-6">
          <!-- small box -->
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
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="dept_wise_list.php?dept=ELECTRICAL" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		
		   <div class="col-md-3 col-sm-6">
          <!-- small box -->
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
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="dept_wise_list.php?dept=ENGINEERING" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		
		   <div class="col-md-3 col-sm-6">
          <!-- small box -->
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
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="dept_wise_list.php?dept=MECHANICAL" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		
		   <div class="col-md-3 col-sm-6">
          <!-- small box -->
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
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
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
			  $sqlcount=mysql_query("select count(empid) from tbl_employee where dept='OPERATING' ");
			  $rwCount=mysql_fetch_array($sqlcount);
			  $count=$rwCount["count(empid)"];
			  echo "$count";
			  ?>
			  </h3>

              <p style="font-size:14px;">OPERATING</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
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
			   $sqlcount=mysql_query("select count(empid) from tbl_employee where dept='PERSONNEL' ");
			  $rwCount=mysql_fetch_array($sqlcount);
			  $count=$rwCount["count(empid)"];
			  echo "$count";
			  ?>
			  </h3>

              <p>PERSONNEL</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
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
			  $sqlcount=mysql_query("select count(empid) from tbl_employee where dept='SECURITY' ");
			  $rwCount=mysql_fetch_array($sqlcount);
			  $count=$rwCount["count(empid)"];
			  echo "$count";
			  ?>
			  </h3>

              <p>SECURITY</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="dept_wise_list.php?dept=SECURITY" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
	
			   <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
			   <?php
			   $sqlcount=mysql_query("select count(empid) from tbl_employee where dept='SIGNAL AND TELECOMMUNICATION' ");
			  $rwCount=mysql_fetch_array($sqlcount);
			  $count=$rwCount["count(empid)"];
			  echo "$count";
			  ?>
			  </h3>

              <p>S and T</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="dept_wise_list.php?dept=SIGNAL AND TELECOMMUNICATION" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		
		
      </div>
	  <div class="row">
		<div class="col-md-6 col-sm-6">
			  <div class="box-body">
				 <div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Success alert preview. This alert is dismissable.
              </div>
              </div>
        </div>
		<!--div class="col-md-6 col-sm-6">
		<div class="box box-solid bg-green-gradient">
			<div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Calendar</h3>
              <!-- tools box -->
              <!--div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <!--div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="#">Add new event</a></li>
                    <li><a href="#">Clear events</a></li>
                    <li class="divider"></li>
                    <li><a href="#">View calendar</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            <!--/div>
            <!-- /.box-header -->
            <!--div class="box-body no-padding">
              <!--The calendar -->
              <!--div id="calendar" ></div>
            </div>
            </div>
        </div-->
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