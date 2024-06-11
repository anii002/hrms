<?php 
 session_start();
 // if(!isset($_SESSION['SESS_MEMBER_NAME']))
 // {
	 // echo "<script>window.location='http://localhost/E_APR_FINAL/index.php';</script>";
 // }
$GLOBALS['a'] = 'sr_update';
include_once('../global/header.php');
include_once('../global/topbar.php');
include_once('../global/sidebaradmin.php'); 
include('mini_function.php');
include('fetch_all_column.php');
dbcon();
?>


<script src="javascript.js"></script>
<style>
/* .nav-tabs > li > a {
    margin-right: 2px;
    line-height: 1.42857143;
    border: 1px solid transparent;
    border-radius: 4px 4px 0 0;
}
 
.lbl_reg{
  display:none;
} 

.lbl_oth{
  display:none;
}
.lbl_oth1{
  display:none;
}
 */
 
 /*----- Tabs -----*/
.tab {
    width:100%;
    display:inline-block;
}
 
    /*----- Tab Links -----*/
    /* Clearfix */
    .tab-links:after {
        display:block;
        clear:both;
        content:'';
    }
 
    .tab-links li {
        margin:0px 5px;
        float:left;
        list-style:none;
    }
 
        .tab-links a {
            padding:9px 15px;
            display:inline-block;
            border-radius:3px 3px 0px 0px;
            background:#7FB5DA;
            font-size:16px;
            font-weight:600;
            color:#4c4c4c;
            transition:all linear 0.15s;
        }
 
        .tab-links a:hover {
            background:#a7cce5;
            text-decoration:none;
        }
 
    li.active a, li.active a:hover {
        background:#fff;
        color:#4c4c4c;
    }
 
    /*----- Content of Tabs -----*/
    .tab-content {
        padding:15px;
        border-radius:3px;
        box-shadow:-1px 1px 1px rgba(0,0,0,0.15);
        background:#fff;
    }
 
        .tab {
            display:none;
        }
 
        .tab.active {
            display:block;
        }

.nav-tabs > li > a {
    margin-right: 2px;
    line-height: 1.42857143;
    border: 1px solid transparent;
    border-radius: 4px 4px 0 0;
}
 
.lbl_reg{
  display:none;
} 

.lbl_oth{
  display:none;
}
.lbl_oth1{
  display:none;
}
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(Preloader_3.gif) center no-repeat #fff;
}

#bio_email{text-transform: none;}

input{text-transform:uppercase;}
textarea{text-transform:uppercase;}
</style>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script>
	//paste this code under head tag or in a seperate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>
<div class="se-pre-con"></div>
<div class="content-wrapper" style="margin-top: -20px;">
   <section class="content"> 
      <div class="row">
	     <div class="box box-info">
			<div class="box box-warning box-solid">
			    <div class="box-header with-border">
					 <ul class="nav nav-tabs" style="border-bottom: 0px solid #ddd;">
						<li class="active"><a href="#bio" data-toggle="tab"><b>Bio Data</b></a></li>
						<li class="medical_initial"><a href="#medical" data-toggle="tab"><b>Medical Details</b></a></li>
						<li class="appointment"><a href="#appointment" data-toggle="tab"><b>Initial Appointment</b></a></li>
						<li class="present_working"><a href="#present_appointment" data-toggle="tab"><b>Present Working Details</b></a></li>					
						<li class="fetch_prft"><a href="#prft" data-toggle="tab"><b>PRFT</b></a></li> 
						<li class=""><a href="#penalty" data-toggle="tab"><b>Penalty</b></a></li> 
						<li class=""><a href="#increment" data-toggle="tab"><b>Increment</b></a></li>	
						<li class=""><a href="#awards" data-toggle="tab"><b>Awards</b></a></li> 
						 <li class=""><a href="#family" data-toggle="tab"><b>Family Composition</b></a></li> 
						
						<li class=""><a href="#nominee" data-toggle="tab"><b>Nominee(s)</b></a></li>
						
						<li class=""><a href="#advance" data-toggle="tab"><b>Advance</b></a></li> 
						<li class=""><a href="#property" data-toggle="tab"><b>Property</b></a></li> 
						<li class=""><a href="#traning" data-toggle="tab"><b>Training</b></a></li>  
						<li class=""><a href="#extra_entry" data-toggle="tab"><b>Last Entry</b></a></li>  
						<li class=""><a href="#leave" data-toggle="tab"><b>Online Office Order</b></a></li>
               </div>
		<div class="box-body"> 
			<div class="tab-content">			
	
			   <!--Last Tab Start -->
					<div class="tab-pane" id="leave">
					 <div class="box-header with-border">
								  <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Online Office Order</h3>
								</div><BR>
						  <p>All Office orders are display here</p>
					 
					</div>  
			  <!--Last Tab End -->
		
          </div>
		  
        </div>
			
			
		</div>
      </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 