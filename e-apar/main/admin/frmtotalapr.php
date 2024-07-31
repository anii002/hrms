<?php
session_start();

// Redirect if session is not set
if (!isset($_SESSION['SESS_MEMBER_NAME'])) {
    echo "<script>window.location='http://drmpsur-hrms.in/e-apar/index.php';</script>";
    exit();
}

include_once('../global/header.php');
include_once('../global/topbar.php');
include_once('../global/sidebaradmin.php');
?>

<script>
    $(document).ready(function() {
        ShowRecordsEmployee();

        $("#frmaddemployee").submit(function(event) {
            event.preventDefault(); // Prevent the form from submitting via the browser
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
                    // ShowRecords();
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
    });

    function ShowRecordsEmployee() {
        $.post("Ajaxemployee.php", {
                Flag: "ShowRecordsEmployee"
            },
            function(data, success) {
                $("#divRecords").html(data);
                var oTable = $('#tbl_employee').dataTable({
                    "oLanguage": {
                        "sSearch": "Search all columns:"
                    },
                    "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [0] // disables sorting for the first column
                    }],
                    'iDisplayLength': 12,
                    'sPaginationType': "full_numbers",
                    "dom": 'T<"clear">lfrtip'
                });
            }
        );
    }
</script>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Department Wise Employee List</h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="index.php">
                    <button style="float: right;" type="button" class="btn btn-success btn-flat" onclick="ResetEditor();">
                        <i class="fa fa-mail-reply"></i> &nbsp;&nbsp;Back
                    </button>
                </a>
            </li>
        </ol>
        <br>
    </section>

    <section class="content">
        <div class="row">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-cubes"></i>&nbsp;&nbsp;Department Wise Employee List Details
                    </h3>
                    <hr>
                </div>
                <div class="box-body">
                    <span style="color:red;">NOTE: Click the button to create group</span><br><br>
                    <form method="post" id="frmaddemployee" action="frmmultipleemp.php" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg">
                        <div class="table-responsive" style="width:100%;height:100%;overflow-x:scroll;">
                            <?php
                            // Ensure 'value' parameter is set and valid
                            $val = isset($_GET['value']) ? $_GET['value'] : '';
                            $approvedStatusFilter = '';
                            if ($val === 'approved') {
                                $approvedStatusFilter = "AND approvedstatus = '1'";
                            } elseif ($val === 'pending') {
                                $approvedStatusFilter = "AND approvedstatus != '1'";
                            }

                            // Query to fetch employees based on approved status
                            $sqlemployee = mysqli_query($conn, "SELECT * FROM tbl_employee WHERE 1=1 $approvedStatusFilter");
                            if (mysqli_num_rows($sqlemployee) > 0) {
                                echo "<table class='table table-striped table-bordered table-hover' id='tbl_employee' style='font-size:11px;'>
                                    <thead>
                                        <tr class='odd gradeX'>
                                            <th style='display:none;'><i class='fa fa-fa'></i> Employee Code</th>
                                            <th></th>
                                            <th>empid</th>
                                            <th>Name</th>
                                            <th>design</th>
                                            <th>station</th>
                                            <th>pay scale</th>";
                                $sql = mysqli_query($conn, "SELECT * FROM year ORDER BY id DESC LIMIT 7");
                                while ($rev = mysqli_fetch_array($sql)) {
                                    echo "<th>{$rev['years']}</th>";
                                }
                                echo "</tr></thead><tbody>";
                                while ($rwEmployee = mysqli_fetch_array($sqlemployee, MYSQLI_ASSOC)) {
                                    $empid = $rwEmployee["empid"];
                                    $emplcode = $rwEmployee["emplcode"];
                                    $empname = $rwEmployee["empname"];
                                    $design = $rwEmployee["design"];
                                    $station = $rwEmployee["station"];
                                    $payscale = $rwEmployee["payscale"];

                                    echo "<tr class='headings'>
                                        <td style='display:none;' id='tdempid$empid'>$empid</td>
                                        <td id='tdempid$empid'><input type='checkbox' name='check_list[]' value='$empid'/></td>
                                        <td id='tdemplcode$empid'><a href='frmshowemployee.php?emppf=$emplcode'>$emplcode</a></td>
                                        <td id='tddept$empid'>$empname</td>
                                        <td id='tddesign$empid'>$design</td>
                                        <td id='tdstation$empid'>$station</td>
                                        <td id='tdstation$empid'>$payscale</td>";
                                    $sql = mysqli_query($conn, "SELECT * FROM year ORDER BY id DESC LIMIT 7");
                                    while ($rev = mysqli_fetch_array($sql)) {
                                        $demo_year = $rev['years'];
                                        $sql_query = mysqli_query($conn, "SELECT * FROM scanned_img WHERE empid='$emplcode' AND year='$demo_year'");
                                        $result = mysqli_fetch_array($sql_query);
                                        if ($result && $result['image'] != "") {
                                            $query = mysqli_query($conn, "SELECT * FROM scanned_apr WHERE empid='$emplcode' AND year='$demo_year'");
                                            $rwQuery = mysqli_fetch_array($query);
                                            $Rtype = isset($rwQuery['reporttype']) ? $rwQuery['reporttype'] : null;

                                            if ($Rtype == 'APAR Report') {
                                                echo "<td><label style='font-size:10px;'>AV[AR]</label></td>";
                                            } else {
                                                echo "<td><label style='color:green;'>AV[WR]</label></td>";
                                            }
                                        } else {
                                            $sqlreason = mysqli_query($conn, "SELECT * FROM tbl_reason WHERE empcode='$emplcode' AND financialyear='$demo_year'");
                                            $rwReason = mysqli_fetch_array($sqlreason);
                                            if (!empty($rwReason["reasontype"])) {
                                                echo "<td>{$rwReason['reasontype']}</td>";
                                            } else {
                                                echo "<td>NA</td>";
                                            }
                                        }
                                    }
                                    echo "</tr>";
                                }
                                echo "</tbody></table>";
                            } else {
                                echo "<p>No employees found based on the selected status.</p>";
                            }
                            ?>
                        </div>
                    </form>
                    <?php
                    // Handle form submission if needed
                    if (isset($_POST['submit'])) {
                        foreach ($_POST['year_list'] as $key => $yearList) {
                            echo "$key {<br>";
                            foreach ($yearList as $subKey => $value) {
                                echo "$subKey : $value<br>";
                            }
                            echo "}<br>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
include_once('../global/footer.php');
?>
