<?php
session_start();

// Redirect to login page if session variable is not set
if (!isset($_SESSION['SESS_MEMBER_NAME'])) {
    echo "<script>window.location='http://drmpsur-hrms.in/e-apar/index.php';</script>";
    exit; // Ensure script stops executing after redirection
}

include_once('../global/header.php');
include_once('../global/topbar.php');
include_once('../global/sidebaradmin.php');

// Database connection
include_once('../global/db_connect.php'); // Adjust this to your actual database connection script

?>

<!-- HTML and JavaScript code goes here -->

<style>
    .primary {
        box-shadow: none;
        border-color: #337AB7;
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <h1 class="pull-left"> Employee Management </h1>
        <a href="frmsample.php" class="pull-right">
            <button type="button" class="btn btn-success" id="#btn1">
                <i class="fa fa-mail-reply"></i> Back
            </button>
        </a>
        <br><br>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="" style="text-align:center;margin-top:0px;"> Employee Report </h3>
                        <hr>
                    </div>
                    <div class="box-body">
                        <form action="" method="GET" enctype="multipart/form-data" role="form" id="frmemplogindetails">
                            <div class="col-md-4">
                                <label>Enter Employee PF No:</label>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="q" class="form-control" placeholder="Search..." id="q" required>
                                        <span class="input-group-btn">
                                            <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <?php
                        if (isset($_GET["q"])) {
                            $getid = $_GET["q"];
                            $sqlemployee = mysqli_query($conn, "select * from tbl_employee where emplcode like '%$getid%' or empname like '%$getid%'");

                            if (mysqli_num_rows($sqlemployee) > 0) {
                                echo "<table class='table table-striped table-bordered table-hover' style='font-size:11px;' id='tbl_employee'>
                                        <thead>
                                            <tr class='odd gradeX'>
                                                <th style='display:none;'><i class='fa fa-fa'></i> Employee Code</th>
                                                <th>empid</th>
                                                <th>Name</th>
                                                <th>Designation</th>
                                                <th>Station</th>
                                                <th>Pay Scale</th>";

                                $sql = mysqli_query($conn, "SELECT * FROM year ORDER BY id DESC LIMIT 7");
                                while ($rev = mysqli_fetch_array($sql)) {
                                    echo "<th>" . $rev['years'] . "</th>";
                                }
                                echo "<th>Edit</th>";
                                echo "</tr></thead><tbody>";

                                while ($rwEmployee = mysqli_fetch_assoc($sqlemployee)) {
                                    $empid = $rwEmployee["empid"];
                                    $emplcode = $rwEmployee["emplcode"];
                                    $empname = $rwEmployee["empname"];
                                    $design = $rwEmployee["design"];
                                    $station = $rwEmployee["station"];
                                    $payscale = $rwEmployee["payscale"];

                                    echo "<tr class='headings'>
                                            <td style='display:none;' id='tdempid$empid'>$empid</td>
                                            <td id='tdemplcode$empid'><a href='frmshowemployee.php?emppf=$emplcode'>$emplcode</a></td>
                                            <td id='tddept$empid'>$empname</td>
                                            <td id='tddesign$empid'>$design</td>
                                            <td id='tdstation$empid'>$station</td>
                                            <td id='tdpayscale$empid'>$payscale</td>";

                                    $sql = mysqli_query($conn, "SELECT * FROM year ORDER BY id DESC LIMIT 7");

                                    while ($rev = mysqli_fetch_array($sql)) {
                                        $demo_year = $rev['years'];
                                        $sql_query = mysqli_query($conn, "select * from scanned_img where empid='$emplcode' AND year='$demo_year'");
                                        $result = mysqli_fetch_array($sql_query);

                                        if (!empty($result['image'])) {
                                            $query = mysqli_query($conn, "select * from scanned_apr where empid='$emplcode' AND year='$demo_year'");
                                            $rwQuery = mysqli_fetch_array($query);

                                            $reporttype = isset($rwQuery['reporttype']) ? $rwQuery['reporttype'] : '';

                                            if ($reporttype == 'APAR Report') {
                                                echo "<td style='font-size:10px;'><input type='hidden' value='$reporttype'><label style='color:green;font-size:10px;'>AV[AR]</label></td>";
                                            } else {
                                                echo "<td><input type='hidden' value='$reporttype'><label style='color:green;'>AV[WR]</label></td>";
                                            }
                                        } else {
                                            $sqlreason = mysqli_query($conn, "select * from tbl_reason where empcode='$emplcode' AND financialyear='$demo_year'");
                                            $rwReason = mysqli_fetch_array($sqlreason);

                                            if (!empty($rwReason['reasontype'])) {
                                                echo "<td id='tduploadfile$empid'>" . $rwReason["reasontype"] . "</td>";
                                            } else {
                                                echo "<td id='tduploadfile$empid'>NA</td>";
                                            }
                                        }
                                    }

                                    echo "<td style='font-size:10px;width:3px;'>
                                            <a href='frmeditemployee.php?emppf=$emplcode' style='font-size:18px'><i class='fa fa-check-square-o'></i></a>
                                            <a href='frmviewemployee.php?emppf=$emplcode' style='font-size:18px'><i class='fa fa-user'></i></a>
                                          </td>";
                                    echo "</tr>";
                                }
                                echo "</tbody></table>";
                            } else {
                                echo "<p>No records found.</p>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
include_once('../global/footer.php');
mysqli_close($conn); // Close database connection
?>
