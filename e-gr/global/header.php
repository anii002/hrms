<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['empname'])) {
    echo "<script>alert('Unauthorized Access');window.location='../../../index.php'</script>";
}
?>
<html lang="en">
<!-- Old Header Start -->
<!-- 
<head>
    TITLE OF SITE
    <title>e-Grievance-Solapur</title>

    Meta
    <meta charset="utf-8">
    <meta name="description" content="StartUp Landing Page Template" />
    <meta name="keywords"
        content="Treetoper, startup, landing page, gradient background, image background, video background, template, responsive, bootstrap" />
    <meta name="developer" content="TemplateOcean">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    FAV AND TOUCH ICONS  
    link rel="icon" href="images/favicon.ico"
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

    GOOGLE FONTS
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    BOOTSTRAP CSS
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    Image Slider
    <link rel="stylesheet" href="css/plagin-css/plagin.css">

    FONT ICONS
    <link rel="stylesheet" href="icons/toicons/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">

      COUSTOM CSS link 
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/responsive.css">


    [if lt IE 9]>
            <script src="js/plagin-js/html5shiv.js"></script>
            <script src="js/plagin-js/respond.min.js"></script>
        <![endif]

</head> -->
<!-- Old Header Ends -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Grievance</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins-->
    <!-- Custome css -->
    <link rel="stylesheet" href="dist/css/custome.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="dist/css/responsive.css">
    <link rel="icon" type="image/png" href="../../../dist/img/logo1.png">
    <!-- Goodgle fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">

    <style type="text/css">
        .btn-orange-moon {
            background: linear-gradient(to right, #4085e6, #57ddfb) !important;
            color: #fff;
        }
    </style>


</head>

<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
        <header id="header">
            <div class="container">
                <div id="logo" class="pull-left">
                    <a href="index.php" class="scrollto"><img src="dist/img/logo/logo.png" alt="logo"></a>
                    <!-- Uncomment below if you prefer to use an image logo -->
                    <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
                </div>

                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active mobile-nav-active" id="home">
                            <a href="index.php">Home</a>
                        </li>
                        <!--<li id="grivance_status">-->
                        <!--    <a href="grivance_status.php">Grievance-->
                        <!--        Status</a>-->
                        <!--</li>-->
                        <?php
                        session_start();
                        error_reporting(0);
                        //echo $_SESSION['emp_id1'];
                        if (isset($_SESSION['user'])) {
                        ?>
                            <li id='add_grievance'>
                                <!--  onclick="window.location='add_grievance.php';" -->
                                <a href="add_grievance.php">Add Grievance</a>
                            </li>
                            <li>
                                <a class="" href="#" data-toggle="modal" data-target="#feedback">Feedback</a>
                            </li>


                            <!-- <li class="menu-active"><a href="#.">Home</a></li>
                        <li><a href="#.">Grievance Status</a></li>
                        <li><a href="#.">Feedback</a></li> -->



                            <li id='profile'>
                                <!-- onclick="window.location='profile.php'" -->
                                <a href="profile.php"><?php echo "'" . $_SESSION['empname'] . "'" ?></a>
                            </li>

                            <li id='griv_history'>
                                <!--  onclick="window.location='griv_history.php'" -->
                                <a href="griv_history.php">History</a>
                            </li>
                            <li> <a class="" href="#" data-toggle="modal" onClick="modu('e_gr')" data-target="#myModal
                            ">Login as</a></li>
                            <li>
                                <!--  onclick="window.location='logout.php';" -->
                                <a href="../../hrms/Logout.php">Logout</a>
                            </li>
                            <li>
                                <a href="../../hrms/dashboard.php" data-toggle="tooltip" title="Main Dashboard" class="btn-dashboard">Dashboard</a>
                            </li>


                        <?php
                        } else {
                        ?>
                            <li>
                                <a class='' style='border:1px solid gray' data-toggle='modal' data-target='#sign-in' href='#'>Login</a>
                            </li>

                        <?php } ?>
                    </ul>


                </nav><!-- #nav-menu-container -->
            </div>
        </header><!-- #header -->

        <div class="row">

            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header btn-orange-moon">
                            <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
                            <h4 class="modal-title" style="text-align:center">Login As</h4>
                        </div>
                        <div class="modal-body">


                            <form action="../../redi_module.php" method="POST" class="horizontal-form">

                                <div class="">
                                    <div class="row">
                                        <div id="rad">
                                        </div>
                                    </div>
                                    <div class="">
                                        <button type="submit" class="btn btn-success">Go!</button>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>