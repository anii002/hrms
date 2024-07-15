<?php
$GLOBALS['flag'] = "5.1";
include('common/header.php');
include('common/sidebar.php');
?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            Dashboard / डॅशबोर्ड
            <!-- <small>reports & statistics</small> -->
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="../../index.php">Home / मुख पृष्ठ</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Dashboard / डॅशबोर्ड</a>
                </li>
            </ul>
            <div class="page-toolbar">
                <div id="" class="pull-right tooltips btn btn-fit-height grey-salt">
                    <i class=""></i> <span><?php echo date('Y/m/d H:i:s'); ?></span>
                </div>
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS -->
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat red-intense">
                    <div class="visual">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <?php

                            if ($_SESSION['user'] == "admin") {
                                $con = dbcon2();
                                $query = mysqli_query($con, "SELECT * FROM tblpdfread");
                                echo $count = mysqli_num_rows($query);
                            } else {
                                dbcon2();
                                $query = mysqli_query($con,"SELECT * FROM tblpdfread WHERE pfno = '" . $_SESSION['user'] . "'");
                                echo $count = mysqli_num_rows($query);
                            }
                            ?>
                        </div>
                        <div class="desc">
                            <p>Total</br>IT_PARTICULAR</p>
                        </div>
                    </div>
                    <?php
                    if ($_SESSION['user'] == "admin") {
                    ?>
                        <a class="more" href="view_it_perticular.php">
                            अधिक जानकारी / View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    <?php
                    } else {
                    ?>
                        <a class="more" href="view_it_perticular.php">
                            अधिक जानकारी / View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- END DASHBOARD STATS -->
        <div class="clearfix">
        </div>
    </div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php
include('common/footer.php');
?>