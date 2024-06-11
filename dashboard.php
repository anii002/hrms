<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once("common/header-without-menu.php");
require_once 'common/db.php';

if ($_SESSION['UserName'] != 'Employee') {
    echo "<script>window.location.href='super_admin_dashboard.php';</script>";
}

$pf_num = $_SESSION['pf_num'];
$sql = "SELECT * FROM user_permission WHERE pf_num = '$pf_num' AND delete_status = 0";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>


<section class="content-header">
    <h1>Dashboard</h1>
    <ol class="breadcrumb">
        <a href="user_guide.php" style="font-size:20px;"><i class="fa fa-user"></i><b> User Manuals </b></a>
    </ol>
</section>

<div class="content">
    <div class="row">
        <?php if (isset($row['tamm'])) { ?>
        <div class="col-md-3">
            <a href="#" data-toggle="modal" data-target="#exampleModal" onClick="modu('tamm')">
                <div class="dash-box dash-box-color-1">
                    <div class="dash-box-icon">
                        <img src="dist/img/dashboard/tamm.png" alt="tamm">
                    </div>
                    <div class="dash-box-body">
                        <span class="dash-box-count">TAMM</span>
                    </div>
                    <div class="dash-box-action">
                        <button>View More</button>
                    </div>
                </div>
            </a>
        </div>

        <?php } ?>


        <?php if (isset($row['e_sar'])) { ?>
        <div class="col-md-3">
            <a href="#" data-toggle="modal" data-target="#exampleModal" onClick="modu('sar')">
                <div class="dash-box dash-box-color-3">
                    <div class="dash-box-icon">
                        <img src="dist/img/dashboard/esrbook.png" alt="e-SR">
                    </div>
                    <div class="dash-box-body">
                        <span class="dash-box-count">e-SR</span>
                    </div>
                    <div class="dash-box-action">
                        <button>View More</button>
                    </div>
                </div>
            </a>
        </div>

        <?php } ?>

        <?php if (isset($row['e_apar'])) { ?>

        <div class="col-md-3">
            <a href="#" data-toggle="modal" data-target="#exampleModal" onClick="modu('apar')">
                <div class="dash-box dash-box-color-4">
                    <div class="dash-box-icon">
                        <img src="dist/img/dashboard/eapar.png" alt="e-APAR">
                    </div>
                    <div class="dash-box-body">
                        <span class="dash-box-count">e-APAR</span>
                    </div>
                    <div class="dash-box-action">
                        <button>View More</button>
                    </div>
                </div>
            </a>
        </div>
        <?php } ?>


        <?php if (isset($row['e_grievance'])) { ?>
        <div class="col-md-3">
            <a href="#" data-toggle="modal" data-target="#exampleModal" onClick="modu('e_gr')">
                <div class="dash-box dash-box-color-2">
                    <div class="dash-box-icon">
                        <img src="dist/img/dashboard/grivenace.png" alt="grivenace">
                    </div>
                    <div class="dash-box-body">
                        <span class="dash-box-count">e-Grievance</span>
                    </div>
                    <div class="dash-box-action">
                        <button>View More</button>
                    </div>
                </div>
            </a>
        </div>

        <?php } ?>


        <?php if (isset($row['cga'])) { ?>

        <div class="col-md-3">
            <a href="#" data-toggle="modal" data-target="#exampleModal" onClick="modu('cga')">
                <div class="dash-box dash-box-color-1">
                    <div class="dash-box-icon">
                        <img src="dist/img/dashboard/eapar.png" alt="eapar">
                    </div>
                    <div class="dash-box-body">
                        <span class="dash-box-count">CGA</span>
                    </div>
                    <div class="dash-box-action">
                        <button>View More</button>
                    </div>
                </div>
            </a>
        </div>

        <?php } ?>




        <?php if (isset($row['e_notification'])) { ?>
        <div class="col-md-3">
            <a href="#" data-toggle="modal" data-target="#exampleModal" onClick="modu('eims')">
                <div class="dash-box dash-box-color-3">
                    <div class="dash-box-icon">
                        <img src="dist/img/dashboard/enotification.png" alt="enotification">
                    </div>
                    <div class="dash-box-body">
                        <span class="dash-box-count">EIMS</span>
                    </div>
                    <div class="dash-box-action">
                        <button>View More</button>
                    </div>
                </div>
            </a>
        </div>
        <?php } ?>

        <?php if (isset($row['it_form'])) { ?>

        <div class="col-md-3">
            <a href="#" data-toggle="modal" data-target="#exampleModal" onClick="modu('itp')">
                <div class="dash-box dash-box-color-4">
                    <div class="dash-box-icon">
                        <img src="dist/img/dashboard/circular.png" alt="circular">
                    </div>
                    <div class="dash-box-body">
                        <span class="dash-box-count">IT-Particulars</span>
                    </div>
                    <div class="dash-box-action">
                        <button>View More</button>
                    </div>
                </div>
            </a>
        </div>

        <?php } ?>

        <?php if (isset($row['forms'])) { ?>

        <div class="col-md-3">
            <a href="#" data-toggle="modal" data-target="#exampleModal" onClick="modu('frm')">
                <div class="dash-box dash-box-color-2">
                    <div class="dash-box-icon">
                        <img src="dist/img/dashboard/epf.png" alt="epf">
                    </div>
                    <div class="dash-box-body">
                        <span class="dash-box-count">Forms</span>
                    </div>
                    <div class="dash-box-action">
                        <button>View More</button>
                    </div>
                </div>
            </a>
        </div>

        <?php } ?>


        <?php if (isset($row['e_app'])) { ?>

        <div class="col-md-3">
            <a href="#" data-toggle="modal" data-target="#exampleModal" onClick="modu('eapp')">
                <div class="dash-box dash-box-color-1">
                    <div class="dash-box-icon">
                        <img src="dist/img/dashboard/epf.png" alt="onlineofficeorder">
                    </div>
                    <div class="dash-box-body">
                        <span class="dash-box-count">e-Application</span>
                    </div>
                    <div class="dash-box-action">
                        <button>View More</button>
                    </div>
                </div>
            </a>
        </div>

        <?php } ?>


        <?php if (isset($row['e_dak'])) { ?>
        <div class="col-md-3">
            <a href="#" data-toggle="modal" data-target="#exampleModal" onClick="modu('dak')">
                <div class="dash-box dash-box-color-3">
                    <div class="dash-box-icon">
                        <img src="dist/img/dashboard/enotification.png" alt="enotification">
                    </div>
                    <div class="dash-box-body">
                        <span class="dash-box-count">e-DAK</span>
                    </div>
                    <div class="dash-box-action">
                        <button>View More</button>
                    </div>
                </div>
            </a>
        </div>
        <?php } ?>


        <?php if (isset($row['feedback'])) { ?>

        <div class="col-md-3">
            <a href="#" data-toggle="modal" data-target="#exampleModal" onClick="modu('feed')">
                <div class="dash-box dash-box-color-4">
                    <div class="dash-box-icon">
                        <img src="dist/img/dashboard/eapar.png" alt="e-APAR">
                    </div>
                    <div class="dash-box-body">
                        <span class="dash-box-count">Feedback</span>
                    </div>
                    <div class="dash-box-action">
                        <button>View More</button>
                    </div>
                </div>
            </a>
        </div>
        <?php } ?>


        <?php if (isset($row['sbf'])) { ?>

        <div class="col-md-3">
            <a href="#" data-toggle="modal" data-target="#exampleModal" onClick="modu('sbf')">
                <div class="dash-box dash-box-color-2">
                    <div class="dash-box-icon">
                        <img src="dist/img/dashboard/epf.png" alt="epf">
                    </div>
                    <div class="dash-box-body">
                        <span class="dash-box-count">SBF</span>
                    </div>
                    <div class="dash-box-action">
                        <button>View More</button>
                    </div>
                </div>
            </a>
        </div>

        <?php } ?>


        <?php if (isset($row['dar'])) { ?>

        <div class="col-md-3">
            <a href="#" data-toggle="modal" data-target="#exampleModal" onClick="modu('dar')">
                <div class="dash-box dash-box-color-1">
                    <div class="dash-box-icon">
                        <img src="dist/img/dashboard/epf.png" alt="onlineofficeorder">
                    </div>
                    <div class="dash-box-body">
                        <span class="dash-box-count">e-DAR</span>
                    </div>
                    <div class="dash-box-action">
                        <button>View More</button>
                    </div>
                </div>
            </a>
        </div>

        <?php } ?>
    </div>
</div>




<div id="exampleModal" class="modal modal-width fade modal-scroll" data-replace="true" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-header btn-orange-moon">
        <button type="button" class="close" data-dismiss="modal" aria-label=""><span> × </span></button>
        <h4 class="modal-title">Login as</h4>
    </div>
    <div class="modal-body">
        <form action="redi_module.php" method="POST" class="horizontal-form">
            <div class="">
                <div class="row">
                    <div id="rad"></div>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-success">Go!</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include_once("common/footer.php"); ?>


<script type="text/javascript">
function modu(modu_name) {
    $.ajax({
        url: 'module.php',
        type: 'POST',
        data: {
            name: modu_name
        },
        success: function(data) {
            console.log(data);
            $('#rad').html(data);
            $('#mod').html(modu_name.toUpperCase());
        }
    });
}
</script>