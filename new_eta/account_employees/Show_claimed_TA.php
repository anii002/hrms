<?php
$GLOBALS['flag'] = "5.4";
include('common/header.php');
include('common/sidebar.php');
?>
<div class="page-content-wrapper">
    <div class="page-content">

        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.php">Home / मुख पृष्ठ</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">दावा किए गए यात्रा भत्ता / Claimed / Forwarded TA</a>
                </li>
            </ul>
        </div>

        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption col-md-6">
                    <b>दावा किए गए यात्रा भत्ता / Claimed / Forwarded TA</b>
                </div>
                <div class="caption col-md-6 text-right backbtn">
                    <a href="#."></a>
                </div>
            </div>
            <div class="portlet-body form">
                <form method="POST">
                    <div class="form-body add-train">
                        <div class="row add-train-title">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="portlet-body">
                                        <div class="table-scrollable summary-table">
                                            <table id="example" class="table table-hover table-bordered display">
                                                <thead>
                                                    <tr class="warning">
                                                        <th>संदर्भ संख्या / Reference No.</th>
                                                        <th>साल / Year</th>
                                                        <th>माह / Month</th>
                                                        <th>दूरी / Distance</th>
                                                        <th>राशि / Amount</th>
                                                        <th>लागू तिथि / Applied Date</th>
                                                        <th class="hidden-print">कार्य / Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $query1 = "SELECT `id`, `TAMonth`, `TAYear`, `empid`, `reference_no`,`objective`, `created_date` FROM `taentry_master` WHERE empid='" . $_SESSION['empid'] . "' AND forward_status='1' AND is_rejected='0' ";
                                                    $sql1 = mysqli_query($conn, $query1);

                                                    while ($row = mysqli_fetch_array($sql1)) {
                                                        $query2 = "SELECT SUM(amount) as total_amount, distance FROM `taentrydetails` WHERE empid='" . $_SESSION['empid'] . "' AND reference_no='" . $row['reference_no'] . "' ";
                                                        $sql2 = mysqli_query($conn, $query2);
                                                        $row2 = mysqli_fetch_array($sql2);

                                                        $query3 = "SELECT cardpass, month, year, `30p_cnt`, `30p_amt`, `70p_cnt`, `70p_amt`, `100p_cnt`, `100p_amt` FROM `tasummarydetails`, taentry_master WHERE tasummarydetails.reference_no=taentry_master.reference_no AND tasummarydetails.empid='" . $_SESSION['empid'] . "' AND tasummarydetails.`reference_no`='" . $row['reference_no'] . "'";
                                                        $sql3 = mysqli_query($conn, $query3);
                                                        $row3 = mysqli_fetch_array($sql3);

                                                        $total_amount = 0;
                                                        if ($row3) {
                                                            $total_amount = ($row3['100p_amt'] ?? 0) + ($row3['70p_amt'] ?? 0) + ($row3['30p_amt'] ?? 0);
                                                        }
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $row['reference_no']; ?></td>
                                                            <td><?php echo $row['TAYear']; ?> </td>
                                                            <td><?php echo $row['TAMonth']; ?></td>
                                                            <td><?php echo $row2['distance']; ?></td>
                                                            <td><?php echo $total_amount; ?></td>
                                                            <td><?php echo $row['created_date']; ?></td>
                                                            <td><a href="claimed_details_1.php?ref_no=<?php echo $row['reference_no']; ?>" class="btn green btn_action">Show</a></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="text-right">
                                            <!-- <button class="btn yellow">Print</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include 'common/footer.php';
?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
    });
</script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js" type="text/javascript"></script>
