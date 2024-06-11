<?php
    error_reporting(0);
	include("../dbconfig/dbcon.php");
	dbcon();
	if(!isset($_SESSION['id'])){
		echo "<script>alert('UNAUTHORIZED ACCESS, PLEASE LOGIN FIRST');window.location='../index.php'</script>";
	}
	 
  ?>
<!DOCTYPE html>
<html>

<head id="header">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SR Module</title>



    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="icon" href="train.png" type="image/png" sizes="16x16">
    <!-- jQuery 2.2.3 -->
    <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.css" media="screen" />

    <!-- notification  -->
    <link rel="stylesheet" href="../plugins/jGrowl/jquery.jgrowl.css" media="screen" />
    <script src="../plugins/jGrowl/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <!-- Font Awesome -->
    <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"-->
    <link rel="stylesheet" href="../plugins/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../plugins/ionicons.min.css">
    <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"-->

    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables/jquery.dataTables.min.css">
    <!--link rel="stylesheet" href="../plugins/datatables/DT_bootstrap.css"-->
    <!-- Theme style -->
    <link rel="stylesheet" href="../plugins/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../plugins/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="../plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../plugins/iCheck/all.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="../plugins/colorpicker/bootstrap-colorpicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
    <link href="../plugins/bootstrap/toaster/toastr.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        type="text/css" />
    <script src="../plugins/bootstrap/toaster/toastr.min.js" type="text/javascript"></script>
    <!-- Select2 -->


    <!--link rel="shortcut icon" href="../../main/resources/admin/Image.png"-->
    <style>
    .example-modal .modal {
        position: relative;
        top: auto;
        bottom: auto;
        right: auto;
        left: auto;
        display: block;
        z-index: 1;
    }

    .example-modal .modal {
        background: transparent !important;
    }

    .form-control {
        font-size: 16px;
        color: black;
    }

    .nav a {
        font-size: 17px;
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->


</head>

<body class="hold-transition skin-blue sidebar-mini home">
    <div class="wrapper">