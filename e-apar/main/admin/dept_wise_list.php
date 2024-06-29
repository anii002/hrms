<?php
session_start();

// Redirect if session is not set
if (!isset($_SESSION['SESS_MEMBER_NAME'])) {
    echo "<script>window.location='http://drmpsur-hrms.in/e-apar/index.php';</script>";
    exit; // Ensure script stops after redirection
}

// Include necessary files
include_once('../global/header.php');
include_once('../global/topbar.php');
include_once('../global/sidebaradmin.php');
?>

<!-- jQuery and DataTables Initialization -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        // Function to show employee records
        ShowRecordsEmployee();

        // Form submission via AJAX
        $("#frmaddemployee").submit(function(event) {
            event.preventDefault(); // Prevent default form submission

            var formData = new FormData($(this)[0]);
            formData.append("Flag", $("#btnSave").val());

            $.ajax({
                url: "Ajaxemployee.php",
                type: 'POST',
                data: formData,
                async: false,
                success: function(data) {
                    // Handle success response if needed
                    // alert(data);
                    // ShowRecordsEmployee();
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });

        // DataTable initialization for employee table
        $('#tbl_employee').DataTable({
            "paging": false,
            "ordering": false,
            "info": false
        });
    });

    // Function to show employee records via AJAX
    function ShowRecordsEmployee() {
        $.post("Ajaxemployee.php", {
                Flag: "ShowRecordsEmployee"
            },
            function(data, status) {
                $("#divRecords").html(data);

                // Initialize DataTable for employee table
                $('#tbl_employee').DataTable({
                    "paging": false,
                    "ordering": false,
                    "info": false
                });
            }
        );
    }
</script>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="pull-left"> Department Wise Employee List </h1>
        <a href="index.php" class="pull-right">
            <button type='button' class='btn btn-success btn-flat'>
                <i class='fa fa-mail-reply'></i> &nbsp;&nbsp;Back
            </button>
        </a>
        <br><br>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="box box-info">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-10">
                            <span style="color:red;">NOTE: Click the button to create group</span>
                        </div>
                        <div class="col-md-2">
                            <input type="submit" value="Create Group" name="submit" class="btn btn-primary btn-flat" />
                        </div>
                    </div>
                    <hr>
                    <form method="post" id="frmaddemployee" action="frmmultipleemp.php" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg">
                        <?php
                        // Retrieve department name from URL
                        $deptname = isset($_GET['dept']) ? $_GET['dept'] : '';

                        // Adjust department name if needed
                        if ($deptname == "GENERAL ADMINISTRATION") {
                            $deptname = "GENERAL ADMINISTRATION' OR dept='GEN. ADMN.";
                        }

                        echo "<input type='hidden' value='$deptname' name='deptn'>";

                        // Query to fetch employees by department
                        $sqlemployee = mysqli_query($conn, "SELECT * FROM tbl_employee WHERE dept = '$deptname'");

                        echo "<table class='table table-striped table-bordered table-hover' id='tbl_employee'>
                                <thead>
                                    <tr class='odd gradeX'>
                                        <th style='display:none;'>Employee Code</th>
                                        <th></th>
                                        <th>Employee ID</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Station</th>
                                        <th>Pay Scale</th>";

                        // Query to fetch recent years
                        $sql = mysqli_query($conn, "SELECT * FROM year ORDER BY id DESC LIMIT 7");

                        // Loop through recent years and add as table headers
                        while ($rev = mysqli_fetch_array($sql)) {
                            echo "<th>" . $rev['years'] . "</th>";
                        }

                        echo "<th>Edit</th>
                              <th>View</th>
                              </tr>
                              </thead>
                              <tbody>";

                        // Loop through employees and populate table rows
                        while ($rwEmployee = mysqli_fetch_array($sqlemployee, MYSQLI_ASSOC)) {
                            $empid = $rwEmployee["empid"];
                            $emplcode = $rwEmployee["emplcode"];
                            $empname = $rwEmployee["empname"];
                            $design = $rwEmployee["design"];
                            $station = $rwEmployee["station"];
                            $payscale = $rwEmployee["payscale"];

                            echo "<tr class='headings'>  
                                    <td style='display:none;'>$empid</td>
                                    <td><input type='checkbox' name='check_list[]' value='$empid'/></td>
                                    <td><a href='frmshowemployee.php?emppf=$emplcode'>$emplcode</a></td>
                                    <td>$empname</td>
                                    <td>$design</td>
                                    <td>$station</td>
                                    <td>$payscale</td>";

                            // Loop through recent years again to display checkboxes based on conditions
                            $sql = mysqli_query($conn, "SELECT * FROM year ORDER BY id DESC LIMIT 7");

                            while ($rev = mysqli_fetch_array($sql)) {
                                $demo_year = $rev['years'];
                                $sql_query = mysqli_query($conn, "SELECT * FROM scanned_img WHERE empid='$emplcode' AND year='$demo_year'");
                                $result = mysqli_fetch_array($sql_query);

                                if ($result && $result['image'] != "") {
                                    $query = mysqli_query($conn, "SELECT * FROM scanned_apr WHERE empid='$emplcode' AND year='$demo_year'");
                                    $rwQuery = mysqli_fetch_array($query);

                                    if ($rwQuery && $rwQuery['reporttype'] == 'APAR Report') {
                                        echo "<td><input type='checkbox' name='year_list[$emplcode][]' value='$demo_year'><label style='color:green;font-size: 11px;'>AV[AR]</label></td>";
                                    } else {
                                        echo "<td><input type='checkbox' name='year_list[$emplcode][]' value='$demo_year'><label style='color:green;font-size: 11px;'>AV[WR]</label></td>";
                                    }
                                } else {
                                    $sqlreason = mysqli_query($conn, "SELECT * FROM tbl_reason WHERE empcode='$emplcode' AND financialyear='$demo_year'");
                                    $rwReason = mysqli_fetch_array($sqlreason);

                                    if ($rwReason && !empty($rwReason["reasontype"])) {
                                        echo "<td><a href='frmshowreasone.php?emppf=$emplcode&year=$demo_year&empid=$empid'>" . $rwReason["reasontype"] . "</a></td>";
                                    } else {
                                        echo "<td><a href='frmaddreason.php?emppf=$emplcode&year=$demo_year&empid=$empid' role='button'>NA</a></td>";
                                    }
                                }
                            }

                            echo "<td><a href='frmeditemployee.php?emppf=$emplcode'><i class='fa fa-check-square-o'></i></a></td>
                                  <td><a href='frmviewemployee.php?emppf=$emplcode'><i class='fa fa-eye'></i></a></td>
                                  </tr>";
                        }

                        echo "</tbody></table>";
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
// Include footer and modal files
include_once('../global/footer.php');
include_once('../global/Modal_Member.php');
?>