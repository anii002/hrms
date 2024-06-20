<?php
$GLOBALS['flag'] = "5.1";
include('common/header.php');
include('common/sidebar1.php');
include('dbcon.php');
$conn1 = dbcon1();
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
                    <a href="dashboard.php">Home / मुख पृष्ठ</a>
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
                            // $conn = dbcon1();
                            $qry1 = mysqli_query($conn1, "SELECT * FROM `office_order`");
                            echo $count = mysqli_num_rows($qry1);
                            // mysqli_close($conn1);
                            ?>
                        </div>
                        <div class="desc">
                            <p>Total<br>Office Order</p>
                        </div>
                    </div>
                    <a class="more" href="office_order1.php">
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
                            // $conn = dbcon1();
                            $qry2 = mysqli_query($conn1, "SELECT * FROM `seniority_list`");
                            echo $count = mysqli_num_rows($qry2);
                            // mysqli_close($conn1);
                            ?>
                        </div>
                        <div class="desc">
                            <p>Total<br>Seniority</p>
                        </div>
                    </div>
                    <a class="more" href="seniority1.php">
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
                            // $conn = dbcon1();
                            $qry3 = mysqli_query($conn1, "SELECT * FROM `e-notification1`");
                            echo $count = mysqli_num_rows($qry3);
                            // mysqli_close($conn1);
                            ?>
                        </div>
                        <div class="desc">
                            <p>Total<br>e-notification</p>
                        </div>
                    </div>
                    <a class="more" href="e-notification1.php">
                        अधिक जानकारी / View more <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat purple-plum">
                    <div class="visual">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <?php
                            // $conn = dbcon1();
                            $qry4 = mysqli_query($conn1, "SELECT * FROM `checklist`");
                            echo $count = mysqli_num_rows($qry4);
                            // mysqli_close($conn1);
                            ?>
                        </div>
                        <div class="desc">
                            <p>Total<br>Checklist</p>
                        </div>
                    </div>
                    <a class="more" href="Checklist1.php">
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
                            // $conn = dbcon1();
                            $qry6 = mysqli_query($conn1, "SELECT * FROM `photo_gallary`");
                            echo $count = mysqli_num_rows($qry6);
                            // mysqli_close($conn1);
                            ?>
                        </div>
                        <div class="desc">
                            <p><br>Photo Gallery</p>
                        </div>
                    </div>
                    <a class="more" href="Photo_Gallary1.php">
                        अधिक जानकारी / View more <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat purple-plum">
                    <div class="visual">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <?php
                            $conn1 = dbcon1();
                            $qry5 = mysqli_query($conn1, "SELECT * FROM `transfer_registration`");
                            echo $count = mysqli_num_rows($qry5);
                            // mysqli_close($conn1);
                            ?>
                        </div>
                        <div class="desc">
                            <p><br>Transfer Registration</p>
                        </div>
                    </div>
                    <a class="more" href="transfer_registration1.php">
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
<!-- JS scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
	$(document).ready(function() {
		// Hide preloader when the page is fully loaded
		$(".pre-loader").fadeOut("slow");

		// Function to handle "Login As" modal
		function modu(role) {
			$("input[name='user']").val(role);
			$("#myModal").modal('show');
		}

		// Event listener for the "Login As" button
		$(".loginas a").on("click", function() {
			var role = $(this).data("role");
			modu(role);
		});
	});
</script>