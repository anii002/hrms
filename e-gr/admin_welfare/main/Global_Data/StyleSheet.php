<style type="text/css">
    body {
		font-family: 'Varela Round', sans-serif;
	}
	.modal-confirm {		
		color: #636363;
		width: 400px;
	}
	.modal-confirm .modal-content {
		padding: 20px;
		border-radius: 5px;
		border: none;
        text-align: center;
		font-size: 14px;
	}
	.modal-confirm .modal-header {
		border-bottom: none;   
        position: relative;
	}
	.modal-confirm h4 {
		text-align: center;
		font-size: 26px;
		margin: 30px 0 -10px;
	}
	.modal-confirm .close {
        position: absolute;
		top: -5px;
		right: -2px;
	}
	.modal-confirm .modal-body {
		color: #999;
	}
	.modal-confirm .modal-footer {
		border: none;
		text-align: center;		
		border-radius: 5px;
		font-size: 13px;
		padding: 10px 15px 25px;
	}
	.modal-confirm .modal-footer a {
		color: #999;
	}		
	.modal-confirm .icon-box {
		width: 80px;
		height: 80px;
		margin: 0 auto;
		border-radius: 50%;
		z-index: 9;
		text-align: center;
		border: 3px solid #f15e5e;
	}
	.modal-confirm .icon-box i {
		color: #f15e5e;
		font-size: 46px;
		display: inline-block;
		margin-top: 13px;
	}
    .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
		background: #60c7c1;
		text-decoration: none;
		transition: all 0.4s;
        line-height: normal;
		min-width: 120px;
        border: none;
		min-height: 40px;
		border-radius: 3px;
		margin: 0 5px;
		outline: none !important;
    }
	.modal-confirm .btn-info {
        background: #c1c1c1;
    }
    .modal-confirm .btn-info:hover, .modal-confirm .btn-info:focus {
        background: #a8a8a8;
    }
    .modal-confirm .btn-danger {
        background: #f15e5e;
    }
    .modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
        background: #ee3535;
    }
	.trigger-btn {
		display: inline-block;
		margin: 100px auto;
	}
	@font-face {
  font-family: 'Material Icons';
  font-style: normal;
  font-weight: 400;
  src: url(https://fonts.gstatic.com/s/materialicons/v31/2fcrYFNaTjcS6g4U3t-Y5ZjZjT5FdEJ140U2DJYC3mY.woff2) format('woff2');
}

.material-icons {
  font-family: 'Material Icons';
  font-weight: normal;
  font-style: normal;
  font-size: 24px;
  line-height: 1;
  letter-spacing: normal;
  text-transform: none;
  display: inline-block;
  white-space: nowrap;
  word-wrap: normal;
  direction: ltr;
  -webkit-font-feature-settings: 'liga';
  -webkit-font-smoothing: antialiased;
}@font-face {
  font-family: 'Material Icons';
  font-style: normal;
  font-weight: 400;
  src: url(https://fonts.gstatic.com/s/materialicons/v31/2fcrYFNaTjcS6g4U3t-Y5ZjZjT5FdEJ140U2DJYC3mY.woff2) format('woff2');
}

.material-icons {
  font-family: 'Material Icons';
  font-weight: normal;
  font-style: normal;
  font-size: 24px;
  line-height: 1;
  letter-spacing: normal;
  text-transform: none;
  display: inline-block;
  white-space: nowrap;
  word-wrap: normal;
  direction: ltr;
  -webkit-font-feature-settings: 'liga';
  -webkit-font-smoothing: antialiased;
 
}
 

.material-icons {
  font-family: 'Material Icons';
  font-weight: normal;
  font-style: normal;
  font-size: 24px;
  line-height: 1;
  letter-spacing: normal;
  text-transform: none;
  display: inline-block;
  white-space: nowrap;
  word-wrap: normal;
  direction: ltr;
  -webkit-font-feature-settings: 'liga';
  -webkit-font-smoothing: antialiased;
}
</style>
<style>
.report
	{
		height: 50px;
		margin-bottom: 15px;
		border-radius: 3px;
		background: #28a3b1;
		color: #fff;
	}
</style>
<style>

html { box-sizing: border-box; }

/* Core Styles */


.navigation-bar {
  height: 0px;
  position: relative;
  z-index: 1000;
}


 .navbox {
  visibility: hidden;
  opacity: 0;
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 1;
  -webkit-transform: translateY(-200px);
  -ms-transform: translateY(-200px);
  transform: translateY(-200px);
  -webkit-transition: all .2s;
  transition: all .2s;
}

.navbox-tiles {
  -webkit-transform: translateY(-200px);
  -ms-transform: translateY(-200px);
  transform: translateY(-200px);
}


.navbox-open .navbox {
  visibility: visible;
  opacity: 1;
  -webkit-transform: translateY(0);
  -ms-transform: translateY(0);
  transform: translateY(0);
  -webkit-transition: opacity .3s, -webkit-transform .3s;
  transition: opacity .3s, transform .3s;
  width: 330px;
    height: initial;
    margin-top: 18px;
    margin-left: -51px;
	    height: 320px;
}

.navbox-open .navbox-tiles {
  -webkit-transform: translateY(0);
  -ms-transform: translateY(0);
  transform: translateY(0);
}


.navbox {
  background-color: #272634;
  width: 100%;
  max-width: 3800px;
  -webkit-backface-visibility: initial;
  backface-visibility: initial;
}

.navbox-tiles {
  width: 100%;
  padding: 15px;
}

.navbox-tiles .tile {
  display: block;
  background-color: #3498db;
  width: 30.3030303030303%;
  height: 0;
  padding-bottom: 22%;
  float: left;
  border: 2px solid transparent;
  color: #fff;
  position: relative;
}

.navbox-tiles .tile .icon {
  width: 100%;
  height: 100%;
  text-align: center;
  position: absolute;
  top: 0;
  left: 0;
}

.navbox-tiles .tile .icon .fa {
  font-size: 35px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  -webkit-backface-visibility: initial;
  backface-visibility: initial;
}

.navbox-tiles .tile .title {
  padding: 5px;
  position: absolute;
  bottom: 0;

       display:block;
     text-align:center;
}

.navbox-tiles .tile:hover {
  border-color: #fff;
  text-decoration: none;
}
.navbox-tiles .tile:not(:nth-child(3n+3)) {
 margin-right: 4.54545454545455%;
}

.navbox-tiles .tile:nth-child(n+4) { margin-top: 15px; }
 @media screen and (max-width: 370px) {

.navbox-tiles .tile .icon .fa { font-size: 25px; }

.navbox-tiles .tile .title {
  padding: 3px;
  font-size: 11px;
}
}


#wrapper
{
 /* margin:0 auto;
 padding:0px;
 text-align:center;
 width:995px; */
    margin: 0 auto;
    padding: 0px;
    text-align: center;
    width: 100%; 
}
#wrapper h1
{
 margin-top:50px;
 font-size:45px;
 color:#626567;
}
#wrapper h1 p
{
 font-size:18px;
}
#file_div
{
 /* width:835px;
 padding:20px;
 margin-left:30px;
 background-color:orange;
 margin-bottom:20px; */
 
 width: 100%;
    /* padding: 29px; */
    /* margin-left: 30px; */
    background-color: orange;
    margin-bottom: 20px;
}
#file_div input[type="file"]
{
 margin-top:10px;
}

#file_div input[type="text"]
{
 margin-top:10px;
}

#file_div input[type="button"]
{
	margin-top:10px;
 background-color:#ac2925;
 border:none;
 width:110px;
 height:35px;
 color:white;
 border-radius:3px;
}
#danger{
	
	 background-color:red;
}
#file_form input[type="submit"]
{
 background-color:#424242;
 border:none;
 width:110px;
 height:35px;
 color:white;
 border-radius:3px;
}


.modal-width {
    width: 100% !important;
    max-width: 700px;
    left: 45% !important;
}

.loginas{margin-top: 20px;}
.loginas li{list-style: none;}
.loginas li a{color: #fff;}

.btn-orange-moon{
  background: linear-gradient(to right, #FF416C, #FF4B2B);
    color: #fff;
}

</style>
        <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/print.css" rel="stylesheet" media="print">
	<style>
	#header { display:none; }
	#footer { display:none; }
	</style>
	
	    <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet" media="screen">
	 <!-- FullCalendar -->
    <link href="vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" media="screen">
    <link href="vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print" >
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" media="screen">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet" media="screen">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/square/orange.css" rel="stylesheet" media="screen">
    <link href="js/datepicker.css" rel="stylesheet" media="screen">
	
   
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" media="screen">
    <!-- Ion.RangeSlider -->
    <link href="vendors/normalize-css/normalize.css" rel="stylesheet" media="screen">
    <link href="vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet" media="screen">
    <link href="vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet" media="screen">
	
    <!-- Bootstrap Colorpicker -->
    <link href="vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet" media="screen">

    <link href="vendors/cropper/dist/cropper.min.css" rel="stylesheet" media="screen">

    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="screen">
    <!-- JQVMap -->
    <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/ media="screen">
	


	
	    <!-- Dropzone.js -->
    <link href="vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet" media="screen">
    <!-- Custom Theme Style -->
    <link href="css/custom-manual.css" rel="stylesheet" media="screen">
    <link href="css/build/css/custom.min.css" rel="stylesheet" media="screen">
	<link href="css/build/css/custom.css" rel="stylesheet" media="screen">
	<link href="css/build/css/green.css" rel="stylesheet" media="screen">
	
	<!--Bootstrap Select Multiple Css file-->
	<link href="css/build/css/bootstrap-select.css" rel="stylesheet" media="screen">
	<link href="css/build/css/bootstrap-select.min.css" rel="stylesheet" media="screen">

		<!--Alertfy Css file>
	<link href="css/alertify.min.css" rel="stylesheet" media="screen">
	
	 <link href="vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet"-->

	
	 
	<!--link href="build/css/bootstrap-select.css" rel="stylesheet">
	<link href="build/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="build/css/bootstrap-select.css" rel="stylesheet">
	
		<?php 
	
		
	//////////   DATEPICKER AND DOB VALODATION
	$currentdate=date('d/m/Y');
	
	$previousyear = date("d/m/Y",strtotime("-18 year"));
	
	$year = date("Y",strtotime("-1 year"));

		?>