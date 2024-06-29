<?php
session_start();
if (!isset($_SESSION['SESS_MEMBER_NAME'])) {
    echo "<script>window.location='http://localhost/E_APR_FINAL/index.php';</script>";
    exit();
}
include_once('../global/header.php');
include_once('../global/topbaruser.php');
include_once('../global/sidebaruser.php');
?>

<script>
$(document).ready(function() {
    ShowRecordsEmployee();

    $("#frmaddemployee").submit(function(event) {
        event.preventDefault();
        var formData = new FormData($(this)[0]);
        formData.append("Flag", $("#btnSave").val());
        $.ajax({
            url: "Ajaxemployee.php",
            type: 'POST',
            data: formData,
            async: false,
            success: function(data) {
                // Handle success
                // ShowRecordsEmployee();
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    $('#tbl_employee').DataTable({
        "paging": false,
        "ordering": false,
        "info": false
    });
});

function ShowRecordsEmployee() {
    $.post("Ajaxemployee.php", { Flag: "ShowRecordsEmployee" }, function(data) {
        $("#divRecords").html(data);
        $('#tbl_employee').DataTable({
            "oLanguage": { "sSearch": "Search all columns:" },
            "aoColumnDefs": [{ 'bSortable': false, 'aTargets': [0] }],
            "iDisplayLength": 10,
            "sPaginationType": "full_numbers",
            "dom": 'T<"clear">lfrtip'
        });
    });
}
</script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top: -20px;">
    <h2>Employee Management</h2>

    <section class="content">
        <div class="row">
            <div class="box box-info">
                <div class="box box-warning box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Registered Employee List...</h3>
                    </div>

                    <div class="box-body">
                        <span style="color:red;">NOTE&nbsp;::&nbsp;Click this button to create group</span><br><br>
                        <form method="post" id="frmaddemployee" action="frmmultipleemp.php" enctype="multipart/form-data">
                            <?php
                            $permissionQuery = "SELECT * FROM tbl_accesspermission WHERE accesslevel='" . $_SESSION['Access_level'] . "'";
                            $permission = mysqli_query($conn, $permissionQuery);
                            $ResultSet = mysqli_fetch_array($permission);
                            if (isset($ResultSet['grouping']) && $ResultSet['grouping'] == 'on') {
                                echo '<input type="submit" value="Create Group" name="submit" class="btn btn-primary btn-flat" /><br>';
                            }
                            ?>
                            <div class="table-responsive"><br>
                                <table class='table table-striped table-hover' id='tbl_employee' style="font-size:10px;text-align:left;">
                                    <thead>
                                        <tr class='odd gradeX'>
                                            <th style='display:none;'>Employee Code</th>
                                            <th></th>
                                            <th>PF No</th>
                                            <th>Name</th>
                                            <th>Design</th>
                                            <th>Pay Scale</th>
                                            <?php
                                            $yearQuery = "SELECT * FROM year ORDER BY id DESC LIMIT 7";
                                            $yearResult = mysqli_query($conn, $yearQuery);
                                            while ($rev = mysqli_fetch_array($yearResult)) {
                                                echo "<th style='font-size:10px;'>{$rev['years']}</th>";
                                            }
                                            ?>
                                            <?php if (isset($ResultSet['editing']) && $ResultSet['editing'] == 'on') echo "<th>Edit</th>"; ?>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $employeeQuery = "SELECT empid, year, emplcode, dept, design, station, payscale, year, uploadfile, empname FROM tbl_employee ORDER BY empid ASC";
                                        $employeeResult = mysqli_query($conn, $employeeQuery);
                                        while ($rwEmployee = mysqli_fetch_array($employeeResult, MYSQLI_ASSOC)) {
                                            $empid = $rwEmployee["empid"];
                                            $emppf = $rwEmployee["emplcode"];
                                            $empname = $rwEmployee["empname"];
                                            $design = $rwEmployee["design"];
                                            $payscale = $rwEmployee["payscale"];
                                            ?>
                                            <tr class="headings">
                                                <td style="display:none;" id="tdempid<?php echo $empid; ?>"><?php echo $empid; ?></td>
                                                <td><input type="checkbox" name="check_list[]" value="<?php echo $emppf; ?>" /></td>
                                                <td><?php echo "<a href='frmshowemployee.php?emppf={$emppf}'>{$emppf}</a>"; ?></td>
                                                <td><?php echo $empname; ?></td>
                                                <td><?php echo $design; ?></td>
                                                <td><?php echo $payscale; ?></td>
                                                <?php
                                                $yearResult = mysqli_query($conn, $yearQuery);
                                                while ($rev = mysqli_fetch_array($yearResult)) {
                                                    $year = $rev['years'];
                                                    $scannedQuery = "SELECT scanned_img.image, scanned_apr.reporttype FROM scanned_img INNER JOIN scanned_apr ON scanned_img.empid = scanned_apr.empid WHERE scanned_img.empid='{$emppf}' AND scanned_img.year='{$year}'";
                                                    $scannedResult = mysqli_fetch_array(mysqli_query($conn, $scannedQuery));

                                                    if (!empty($scannedResult['image'])) {
                                                        $Rtype = $scannedResult['reporttype'];
                                                        $label = $Rtype == 'APAR Report' ? "AV[AR]" : "AV[WR]";
                                                        echo "<td style='font-size:10px;'><input type='hidden' value='{$Rtype}'><input type='checkbox' name='year_list[{$emppf}][]' value='{$year}'><label style='color:green;font-size:10px;'>{$label}</label></td>";
                                                    } else {
                                                        $reasonQuery = "SELECT reasontype FROM tbl_reason WHERE empcode='{$emppf}' AND financialyear='{$year}'";
                                                        $reasonResult = mysqli_fetch_array(mysqli_query($conn, $reasonQuery));
                                                        if (!empty($reasonResult["reasontype"])) {
                                                            echo "<td id='tduploadfile{$empid}'><a href='frmshowreasone.php?emppf={$emppf}&year={$year}&empid={$empid}' id='{$empid}'>{$reasonResult["reasontype"]}</a></td>";
                                                        } else {
                                                            $usertype = $_SESSION['Access_level'];
                                                            if ($usertype == 'Admin') {
                                                                echo "<td id='tduploadfile{$empid}'><a href='frmaddreason.php?emppf={$emppf}&year={$year}&empid={$empid}' role='button'>NA</a></td>";
                                                            } else {
                                                                echo "<td id='tduploadfile{$empid}'>NA</td>";
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                                <?php if (isset($ResultSet['editing']) && $ResultSet['editing'] == 'on') echo "<td style='font-size:10px;width:3px;'><a href='frmeditemployee.php?emppf={$emppf}'><i class='fa fa-check-square-o'></i></a></td>"; ?>
                                                <td style="font-size:10px;width:3px;"><?php echo "<a href='frmviewemployee.php?emppf={$emppf}'><i class='fa fa-eye'></i></a>"; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
function anchoonclick(click_id) {
    var empcode = document.getElementById("txtemppf").value;
    document.getElementById("te").innerHTML = click_id;
    alert(click_id.id);
}
</script>

<?php
include_once('../global/footer.php');
include_once('../global/Modal_Member.php');
?>
