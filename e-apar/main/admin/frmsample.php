<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['SESS_MEMBER_NAME'])) {
    echo "<script>window.location='http://drmpsur-hrms.in/e-apar/index.php';</script>";
    exit; // Stop further execution if not logged in
}

// Include necessary files
include_once('../global/header.php');
include_once('../global/topbar.php');
include_once('../global/sidebaradmin.php');

?>

<script>
    $(document).ready(function() {
        // Initialize DataTables
        $('#tbl_employee').DataTable({
            "paging": false,
            "ordering": false,
            "info": false
        });

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
                    // Handle success response
                    // alert(data);
                    // ShowRecordsEmployee(); // Uncomment if needed
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });

        // Function to show employee records
        ShowRecordsEmployee();

        // Function to handle initial display of employee records
        function ShowRecordsEmployee() {
            $.post("Ajaxemployee.php", {
                    Flag: "ShowRecordsEmployee"
                },
                function(data, status) {
                    $("#divRecords").html(data);
                    $('#tbl_employee').DataTable({
                        "paging": false,
                        "ordering": false,
                        "info": false
                    });
                }
            );
        }
    });
</script>

<div class="content-wrapper" style="margin-top: -20px;">
    <h2>Employee Management</h2>
    <section class="content">
        <div class="row">
            <div class="box box-warning box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Registered Employee List...</h3>
                </div>
                <div class="box-body">
                    <form method="post" id="frmaddemployee" action="frmmultipleemp.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-10">
                                <span style="color:red;">NOTE&nbsp;:&nbsp;Click this button to create group</span>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" value="Create Group" name="submit" class="btn btn-primary btn-flat" /><br>
                            </div>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class='table table-striped table-bordered table-hover' id='tbl_employee'>
                                <thead>
                                    <tr>
                                        <th style='display:none;'> Employee Code</th>
                                        <th style=''></th>
                                        <th> PF No</th>
                                        <th> Name </th>
                                        <th> Design </th>
                                        <th> Pay Scale </th>
                                        <?php
                                        $sql = mysqli_query($conn, "SELECT * FROM year order by id desc limit 7");
                                        while ($rev = mysqli_fetch_array($sql)) {
                                        ?>
                                            <th style=""><?php echo $rev['years']; ?></th>
                                        <?php
                                        }
                                        ?>
                                        <th> Edit</th>
                                        <th> View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sqlemployee = mysqli_query($conn, "select * from tbl_employee order by empid asc");
                                    while ($rwEmployee = mysqli_fetch_array($sqlemployee, MYSQLI_ASSOC)) {
                                        $empid = $rwEmployee["empid"];
                                        $emppf = $rwEmployee["emplcode"];
                                        $empname = $rwEmployee["empname"];
                                        $design = $rwEmployee["design"];
                                        $payscale = $rwEmployee["payscale"];
                                    ?>
                                        <tr>
                                            <td style="display:none;" id="tdempid<?php echo $empid; ?>"><?php echo $empid; ?></td>
                                            <td id="tdempid<?php echo $empid; ?>"><input type="checkbox" name="check_list[]" value="<?php echo $emppf; ?>" /></td>
                                            <td id="tdemppf<?php echo $empid; ?>"><?php echo "<a href='frmshowemployee.php?emppf=" . $emppf . "'>$emppf</a> " ?></td>
                                            <td id="tddept<?php echo $empid; ?>"><?php echo $empname; ?></td>
                                            <td id="tddesign<?php echo $empid; ?>"><?php echo $design; ?></td>
                                            <td id="tdstation<?php echo $empid; ?>"><?php echo $payscale; ?></td>
                                            <?php
                                            $sql_years = mysqli_query($conn, "SELECT * FROM year order by id desc limit 7");
                                            while ($rev_year = mysqli_fetch_array($sql_years)) {
                                                $demo_year = $rev_year['years'];
                                                $sql_query = mysqli_query($conn, "select * from scanned_img where empid='" . $emppf . "' AND year='" . $rev_year['years'] . "'");
                                                $result = mysqli_fetch_array($sql_query);

                                                if ($result && isset($result['image']) && $result['image'] != "") {
                                                    $query = mysqli_query($conn, "select * from scanned_apr where empid='" . $emppf . "' AND year='" . $rev_year['years'] . "'");
                                                    $rwQuery = mysqli_fetch_array($query);
                                                    if ($rwQuery && isset($rwQuery['reporttype']) && $rwQuery['reporttype'] == 'APAR Report') {
                                            ?>
                                                        <td><input type="checkbox" name="year_list[<?php echo $emppf; ?>][]" value="<?php echo $rev_year["years"]; ?>"><label style="color:green;">AV[AR]</label></td>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <td><input type="checkbox" name="year_list[<?php echo $emppf; ?>][]" value="<?php echo $rev_year["years"]; ?>"><label style="color:green;">AV[WR]</label></td>
                                            <?php
                                                    }
                                                } else {
                                                    $sqlreason = mysqli_query($conn, "select * from tbl_reason where  empcode='$emppf' AND financialyear='$demo_year'");
                                                    $rwReason = mysqli_fetch_array($sqlreason);

                                                    if ($rwReason && isset($rwReason["reasontype"])) {
                                                        echo "<td><a href='frmshowreasone.php?emppf=$emppf&year=$demo_year&empid=$empid'>" . $rwReason["reasontype"] . "</a></td>";
                                                    } else {
                                                        echo "<td><a href='frmaddreason.php?emppf=$emppf&year=$demo_year&empid=$empid' role='button' >NA</a></td>";
                                                    }
                                                }
                                            }
                                            ?>
                                            <td><?php echo '<a href="frmeditemployee.php?emppf=' . $emppf . '"><i class="fa fa-check-square-o"></i></a> ' ?></td>
                                            <td><?php echo '<a href="frmviewemployee.php?emppf=' . $emppf . '"><i class="fa fa-eye"></i></a> ' ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
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
// Include footer and modal files
include_once('../global/footer.php');
include_once('../global/Modal_Member.php');
?>