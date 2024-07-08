<?php
$GLOBALS['flag'] = "2.1";
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
                    <a href="index.php">Home / मुख पृष्ठ</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Dashboard / डॅशबोर्ड</a>
                </li>
            </ul>
            <div class="page-toolbar">
                <div id="" class="pull-right tooltips btn btn-fit-height grey-salt">
                    <i class=""></i> <span><?php echo date('Y/m/d H:i:s'); ?></span>
                    <!-- <span class="thin uppercase visible-lg-inline-block"></span> -->
                    <!-- <i class="fa fa-angle-down"></i> -->
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
							$query = "SELECT MONTHNAME( str_to_date(taentry_master.created_date,'%d/%m/%Y') ) as created, taentry_master.reference_no, taentry_master.TAYear, taentry_master.empid as empid, taentry_master.TAMonth, SUM(taentrydetails.distance) AS distance, SUM(taentrydetails.amount) as rate FROM taentry_master INNER JOIN taentrydetails ON taentry_master.reference_no = taentrydetails.reference_no WHERE taentry_master.reference_no IN (select reference_id  from forward_data where forward_data.fowarded_to='" . $_SESSION['empid'] . "'and admin_approve='1') group by taentry_master.reference_no";
							$resultset = mysqli_query($conn,$query);
							$rows = mysqli_num_rows($resultset);
							echo "<h3 style='margin-bottom: 0px;margin-top: 18px;'>" . $rows . "</h3>";
							?>
                        </div>
                        <div class="desc">
                            <p>मंजूर किए गए यात्रा भत्ता /<br> Approved TA</p>
                        </div>
                    </div>
                    <a class="more" href="javascript:void(0)">
                        अधिक जानकारी / View more <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat green-haze">
                    <div class="visual">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <?php
							$query = "SELECT MONTHNAME( str_to_date(taentry_master.created_date,'%d/%m/%Y') ) as created, taentry_master.reference_no, taentry_master.TAYear,taentry_master.empid as empid, taentry_master.TAMonth, SUM(taentrydetails.distance) AS distance, SUM(taentrydetails.amount) as rate FROM taentry_master INNER JOIN taentrydetails ON taentry_master.reference_no = taentrydetails.reference_no WHERE taentry_master.reference_no IN (select reference_id from forward_data where forward_data.fowarded_to='" . $_SESSION['empid'] . "' AND forward_data.depart_time is null AND admin_approve='0') group by taentry_master.reference_no";
							$resultset = mysqli_query($conn,$query);
							$rows = mysqli_num_rows($resultset);
							echo "<h3 style='margin-bottom: 0px;margin-top: 18px;'>" . $rows . "</h3>";
							?>
                        </div>
                        <div class="desc">
                            <p>अमंजूर किए गए यात्रा भत्ता /<br> Pending TA</p>
                        </div>
                    </div>
                    <a class="more" href="javascript:void(0)">
                        अधिक जानकारी / View more <i class="m-icon-swapright m-icon-white"></i>
                    </a>
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