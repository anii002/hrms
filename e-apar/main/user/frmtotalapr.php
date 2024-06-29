<?php
session_start();

// Check if the session variable is set
if (!isset($_SESSION['SESS_MEMBER_NAME'])) {
    echo "<script>window.location='http://localhost/E_APR_FINAL/index.php';</script>";
    exit; // Exit after redirect
}

include_once('../global/header.php');
include_once('../global/topbaruser.php');
include_once('../global/sidebaruser.php');
?>

<script>
    $(document).ready(function() {
        ShowRecordsEmployee();
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
                    // Handle success
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
        }, function(data) {
            $("#divRecords").html(data);
            $('#tbl_employee').DataTable({
                "paging": false,
                "ordering": false,
                "info": false
            });
        });
    }
</script>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Department Wise Employee List....</h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="index.php">
                    <button style="float: right;" type='button' class='btn btn-success btn-flat' onclick="ResetEditor();">
                        <i class='fa fa-mail-reply'></i> &nbsp;&nbsp;Back
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
                    <h3 class="box-title"><i class="fa fa-cubes"></i>&nbsp;&nbsp;Department Wise Employee List Details...</h3>
                    <hr>
                </div>
                <div class="box-body">
                    <span style="color:red;">NOTE:&nbsp;Click the button to create group</span><br><br>
                    <form method="post" id="frmaddemployee" action="frmmultipleemp.php" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg">
                        <?php
                        // Check and fetch access permission
                        $permission = mysqli_query($conn, "SELECT * FROM tbl_accesspermission WHERE accesslevel='" . $_SESSION['Access_level'] . "'");
                        $ResultSet = mysqli_fetch_array($permission);
                        if (isset($ResultSet['grouping']) && $ResultSet['grouping'] == 'on') {
                            echo '<input type="submit" value="Create Group" name="submit" class="btn btn-primary btn-flat" /><br>';
                        }
                        ?>
                        <div class="table-responsive" style="width:100%;height:100%;overflow-x:scroll;">
                            <?php
                            // Validate and fetch value from $_GET['value']
                            $val = isset($_GET['value']) ? $_GET['value'] : ''; // Ensure $_GET['value'] is set
                            $approvedstatus_condition = !empty($val) ? "approvedstatus = '$val' OR approvedstatus = '1'" : "approvedstatus = '1'";
                            $sqlemployee = mysqli_query($conn, "SELECT * FROM tbl_employee WHERE $approvedstatus_condition");
                            echo "<table class='table table-striped table-bordered table-hover' id='tbl_employee' style='font-size:11px;'>
                                <thead>
                                    <tr class='odd gradeX'>
                                        <th style='display:none;'><i class='fa fa-fa'></i> Employee Code</th>
                                        <th></th>
                                        <th>empid</th>
                                        <th> Name </th>
                                        <th> design </th>
                                        <th> station </th>
                                        <th> pay scale </th>";

                            $sql = mysqli_query($conn, "SELECT * FROM year ORDER BY id DESC LIMIT 7");
                            while ($rev = mysqli_fetch_array($sql)) {
                                echo "<th>" . $rev['years'] . "</th>";
                            }
                            echo "</tr></thead>";

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

                                    if (!empty($result['image'])) {
                                        $query = mysqli_query($conn, "SELECT * FROM scanned_apr WHERE empid='$emplcode' AND year='$demo_year'");
                                        $rwQuery = mysqli_fetch_array($query);
                                        $Rtype = $rwQuery['reporttype'] ?? '';
                                        $reportTypeLabel = $Rtype == 'APAR Report' ? 'AV[AR]' : 'AV[WR]';
                                        echo "<td style='font-size:10px;'><input type='hidden' value='{$rwQuery['reporttype']}'><input type='checkbox' name='year_list[{$emplcode}][]' value='{$rev["years"]}'><label style='color:green;font-size:10px;'>{$reportTypeLabel}</label></td>";
                                    } else {
                                        $sqlreason = mysqli_query($conn, "SELECT * FROM tbl_reason WHERE empcode='$emplcode' AND financialyear='$demo_year'");
                                        $rwReason = mysqli_fetch_array($sqlreason);

                                        if (!empty($rwReason["reasontype"])) {
                                            echo "<td id='tduploadfile$empid'><a href='frmshowreasone.php?emppf=$emplcode&year=$demo_year&empid=$empid'  id='$empid' style='font-size:11px;'>" . $rwReason["reasontype"] . "</a></td>";
                                        } else {
                                            echo "<td id='tduploadfile$empid'><a href='frmaddreason.php?emppf=$emplcode&year=$demo_year&empid=$empid' role='button' >NA</a></td>";
                                        }
                                    }
                                }
                                echo "</tr>";
                            }
                            echo "</table>";
                            ?>
                        </div>
                    </form>

                    <?php
                    // Example processing of form submission
                    if (isset($_POST['submit']) && isset($_POST['year_list'])) {
                        foreach ($_POST['year_list'] as $key => $years) {
                            echo $key . "{<br>";
                            foreach ($years as $value) {
                                echo "Year : " . $value . "<br>";
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

<script>
    var nodes = $("#year_list").fnGetNodes();
    $("nodes").each(function(index) {
        alert("Column value:" + this.rows[index].cell[0].text());
    });
</script>

<?php
include_once('../global/footer.php');
?>
