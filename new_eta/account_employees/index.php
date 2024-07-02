<?php
$GLOBALS['flag'] = "5.1";
include('common/header.php');
include('common/sidebar.php');

// Check if empid is set in session
if (!isset($_SESSION['empid'])) {
    // Handle the case where empid is not set (e.g., redirect to login page)
    header('Location: login.php'); // Adjust the redirection URL as per your application
    exit;
}

?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            Dashboard / डॅशबोर्ड
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
                            $query = mysqli_query($conn, "SELECT count(id) as total from taentry_master where empid='" . mysqli_real_escape_string($conn, $_SESSION['empid']) . "' and forward_status=1 ");
                            if ($query && mysqli_num_rows($query) > 0) {
                                $resultset = mysqli_fetch_array($query);
                                echo "<h3 style='margin-bottom: 0px;margin-top: 18px;'>" . $resultset['total'] . "</h3>";
                            } else {
                                echo "<h3 style='margin-bottom: 0px;margin-top: 18px;'>0</h3>";
                            }
                            ?>
                        </div>
                        <div class="desc">
                            <p>कुल दावे /<br> Total Claims</p>
                        </div>
                    </div>
                    <a class="more" href="Show_claimed_TA.php">
                        अधिक जानकारी / View more <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat dashboard-stat purple-plum">
                    <div class="visual">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <?php
                            $query = mysqli_query($conn, "SELECT count(id) as total from taentry_master where empid='" . mysqli_real_escape_string($conn, $_SESSION['empid']) . "' and forward_status=1 and est_approve='1' ");
                            if ($query && mysqli_num_rows($query) > 0) {
                                $resultset = mysqli_fetch_array($query);
                                echo "<h3 style='margin-bottom: 0px;margin-top: 18px;'>" . $resultset['total'] . "</h3>";
                            } else {
                                echo "<h3 style='margin-bottom: 0px;margin-top: 18px;'>0</h3>";
                            }
                            ?>
                        </div>
                        <div class="desc">
                            <p>अनुमोदित /<br> Approved</p>
                        </div>
                    </div>
                    <a class="more" href="Show_claimed_TA.php">
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
                            $query = mysqli_query($conn, "SELECT reference_no from taentry_master where empid='" . mysqli_real_escape_string($conn, $_SESSION['empid']) . "' and forward_status=1");

                            $total = 0;
                            if ($query && mysqli_num_rows($query) > 0) {
                                while ($resultset = mysqli_fetch_array($query)) {
                                    $sql = mysqli_query($conn, "SELECT summary_id from tasummarydetails where is_summary_generated=1 AND reference_no='" . $resultset['reference_no'] . "' AND empid='" . mysqli_real_escape_string($conn, $_SESSION['empid']) . "' ");
                                    if ($sql && mysqli_num_rows($sql) > 0) {
                                        $resultset1 = mysqli_fetch_array($sql);
                                        if ($resultset1['summary_id'] != 0) {
                                            $sql1 = mysqli_query($conn, "SELECT count(id) as total from master_summary where forward_status=1 and estcrk_status=0 AND summary_id='" . $resultset1['summary_id'] . "'");
                                            if ($sql1 && mysqli_num_rows($sql1) > 0) {
                                                $resultset2 = mysqli_fetch_array($sql1);
                                                $total = $total + $resultset2['total'];
                                            }
                                        } else {
                                            $sql = mysqli_query($conn, "SELECT count(reference_no) as total from tasummarydetails where is_summary_generated=0 AND reference_no='" . $resultset['reference_no'] . "' AND empid='" . mysqli_real_escape_string($conn, $_SESSION['empid']) . "' ");
                                            if ($sql && mysqli_num_rows($sql) > 0) {
                                                $resultset1 = mysqli_fetch_array($sql);
                                                $total = $total + $resultset1['total'];
                                            }
                                        }
                                    }
                                }
                            }

                            echo "<h3 style='margin-bottom: 0px;margin-top: 18px;'>" . $total . "</h3>";
                            ?>
                        </div>
                        <div class="desc">
                            <p>प्रलंबित /<br> Pending</p>
                        </div>
                    </div>
                    <a class="more" href="Show_claimed_TA.php">
                        अधिक जानकारी / View more <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>

        </div>
        <!-- END DASHBOARD STATS -->
        <div class="clearfix"></div>
    </div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php
include('common/footer.php');
?>
