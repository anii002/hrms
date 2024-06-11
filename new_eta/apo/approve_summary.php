<?php
$GLOBALS['flag'] = "1.2";
include('common/header.php');
include('common/sidebar.php');
include('control/function.php');
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
                    <a href="#">अपूर्ण संक्षिप्त रिपोर्ट / Pending Summary Report</a>
                </li>
            </ul>

        </div>
        <!-- <h1>ecefce</h1> -->
        <div class="row">
            <?php if (isset($_SESSION['empid'])) {     ?>

            <form id="frm-example" action="summary_details.php" method="POST">
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption col-md-6">
                            <b>अपूर्ण संक्षिप्त रिपोर्ट / Pending Summary Report</b>
                        </div>
                        <div class="tools">
                            <input type="submit" class="btn btn-warning pull-right " id='gn' name="subtn"
                                value="Forward To Account">
                        </div>
                    </div>
                    <div class="portlet-body form">

                        <div class="form-body add-train">
                            <div class="row add-train-title">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <div class="portlet-body">
                                            <div class="table-scrollable summary-table">
                                                <table id="tbl_summary"
                                                    class="table table-hover table-bordered display">
                                                    <thead>
                                                        <tr class="warning">
                                                            <th></th>
                                                            <th>ID</th>
                                                            <th>Title</th>
                                                            <th>Description</th>
                                                            <th>Department</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $cnt = 1;
                                                            $query = "SELECT * from master_summary WHERE forward_status = '1' AND pa_status='0' AND estcrk_status='0' AND is_gazetted='1' ";
                                                            $result = mysql_query($query);
                                                            while ($val = mysql_fetch_array($result)) {
                                                                $sql1 = "SELECT * from tasummarydetails,taentry_master,employees where tasummarydetails.reference_no=taentry_master.reference_no AND taentry_master.empid=employees.pfno AND taentry_master.is_rejected='0'  AND summary_id='" . $val['summary_id'] . "' AND is_summary_generated='1'";
                                                                $res1 = mysql_query($sql1);
                                                                $data = 0;
                                                                while ($val1 = mysql_fetch_array($res1)) {
                                                                    //   echo "<br>".$val1['BU']."_".$val1['empid']."_".$val1['reference_no'];
                                                                    if ($data == 0) {
                                                                        // if(in_array($val1['BU'], $b) )  //&& $val1['gp'] >= 4200
                                                                        {
                                                                            if ($val['title'] != null) {
                                                                                //  echo "<br>".$val1['BU']."_".$val1['empid'];
                                                                                echo "
                    											<tr>
                    												<td>" . $val['summary_id'] . "</td>
                    												<td>" . $cnt . "</td>
                    												<td>" . $val['title'] . "</td>
                    												<td>" . $val['description'] . "</td>
                    												<td>" . getdepartment($val['dept_id']) . "</td>
                    												<td><a href='summary_report_details.php?id=" . $val['id'] . "&sum_id=" . $val['summary_id'] . "' class='btn btn-primary'>Show</a>";
                                                                                echo "</tr>";
                                                                                $cnt++;
                                                                            }
                                                                            $data++;
                                                                        }
                                                                    }
                                                                }
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

                    </div>
                </div>

            </form>
            <?php } ?></div>

    </div>
</div>
<?php
include 'common/footer.php';
?>


<script type="text/javascript">
$(document).ready(function(e) {
    var table = $('#tbl_summary').DataTable({
        'ajax': '',
        'columnDefs': [{
            'targets': 0,
            'checkboxes': {
                'selectRow': true
            }
        }],
        'select': {
            'style': 'multi'
        },
        'order': [
            [1, 'asc']
        ]
    });

    $('#frm-example').on('submit', function(e) {
        jQuery.noConflict();
        // e.preventDefault();
        var form = this;

        var rows_selected = table.column().checkboxes.selected();
      

        console.log(rows_selected);

        $.each(rows_selected, function(index, rowId) {
            // Create a hidden element 
            $(form).append(
                $('<input>')
                .attr('type', 'hidden')
                .attr('name', 'selected_summary[]')
                .val(rowId)
            );
        });
        // e.preventDefault(); 
    });


});
</script>

<!--<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script> -->
<!-- <script src="../assets/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js" type="text/javascript"></script>
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
-->