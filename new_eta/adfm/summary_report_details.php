<?php
$GLOBALS['flag'] = "1.2";
include('common/header.php');
include('common/sidebar.php');
include('control/function.php');
?>
<style>
    .bg_light_blue {
        background-color: #c9e7ff !important;
    }
</style>

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
                    <a href="#">संक्षिप्त रिपोर्ट / Summary Report Details</a>
                </li>
            </ul>

        </div>
        <!-- <h1>ecefce</h1> -->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption col-md-6">
                    <b>संक्षिप्त रिपोर्ट / Summary Report Detail</b>
                </div>
                <div class="caption col-md-6 text-right backbtn">
                    <button class=" btn btn-danger print btnhide" onclick="history.go(-1);">Back</button>
                </div>
            </div>
            <div class="portlet-body form">

                <form action="control/adminProcess.php?action=fwESTCLERK" method="POST">
                    <div class="form-body add-train">
                        <div class="row add-train-title">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!--<label class="control-label"><h4 class="">Summary Report Details </h4></label>-->
                                    <div class="portlet-body">
                                        <div class="table-scrollable summary-table">
                                            <table id="example" class="table table-hover table-bordered display">
                                                <thead>
                                                    <tr class="warning">
                                                        <th rowspan="2" valign="top">P.F. No</th>
                                                        <th rowspan="2" valign="top">Name</th>
                                                        <th rowspan="2" valign="top">BU</th>
                                                        <th rowspan="2" valign="top">Design</th>
                                                        <th rowspan="2" valign="top">P/L</th>
                                                        <th rowspan="2" valign="top">GP</th>
                                                        <th rowspan="2" valign="top">
                                                            <center>ROP</center>
                                                        </th>
                                                        <th rowspan="2" valign="top">Rate</th>
                                                        <th rowspan="2" valign="top">Travel<br> Month</th>
                                                        <th rowspan="2" valign="top">
                                                            <center>Claim<br> Month</center>
                                                        </th>
                                                        <th colspan="2">
                                                            <center>30% (Days Count)</center>
                                                        </th>
                                                        <th colspan="2">
                                                            <center>70% (Days Count)</center>
                                                        </th>
                                                        <th colspan="2">
                                                            <center>100% (Days Count)</center>
                                                        </th>
                                                        <th rowspan="2">
                                                            <center>TA<br> Amt.</center>
                                                        </th>
                                                        <th rowspan="2">Conti.<br> Amt.</th>
                                                        <th class="hidden-print" style="width:145px;" rowspan="2">Action</th>
                                                    </tr>
                                                    <tr id="warning" class="warning">
                                                        <th>Day</th>
                                                        <th>Amt.</th>
                                                        <th>Day</th>
                                                        <th>Amt.</th>
                                                        <th>Day</th>
                                                        <th>Amt.</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    $sql = "SELECT * from tasummarydetails,taentry_master where tasummarydetails.reference_no=taentry_master.reference_no AND taentry_master.is_rejected='0'  AND summary_id='" . $_GET['sum_id'] . "' AND is_summary_generated='1'";
                                                    $res = mysqli_query($conn, $sql);
                                                    echo mysqli_error($conn,);
                                                    //;
                                                    $total_amt = 0;
                                                    $temp = 0;
                                                    $temp1 = 0;
                                                    $emp_pfno = array();
                                                    while ($val = mysqli_fetch_array($res)) {
                                                        $sql1 = mysqli_query($conn, "SELECT * from employees where pfno='" . $val['empid'] . "' ");
                                                        $val1 = mysqli_fetch_array($sql1);


                                                        $level = $val1['level'];
                                                        $sql2 = "SELECT * from ta_amount where min<='" . $level . "' AND max>='" . $level . "' ";
                                                        $res2 = mysqli_query($conn, $sql2);
                                                        $val2 = mysqli_fetch_array($res2);

                                                        $amount = $val2['amount'];

                                                        $month_array = array("01" => "Jan", "02" => "Feb", "03" => "March", "04" => "April", "05" => "May", "06" => "June", "07" => "July", "08" => "Aug", "09" => "Sept", "10" => "Oct", "11" => "Nov", "12" => "Dec");
                                                        $month_array1 = array("01" => "Jan", "02" => "Feb", "03" => "March", "04" => "April", "05" => "May", "06" => "June", "07" => "July", "08" => "Aug", "09" => "Sept", "10" => "Oct", "11" => "Nov", "12" => "Dec");
                                                        $mon = '';
                                                        $mmon = '';
                                                        // 		$m=$val['month'];
                                                        // 		$s=$m;
                                                        $mts = explode(",", $val['month']);
                                                        //print_r($mts);
                                                        $s = $mts[0];
                                                        $y = substr($val['year'], 2);
                                                        // print_r($month_array);
                                                        if ($month_array[$s]) {
                                                            $mon = $month_array[$s];
                                                        }


                                                        $cdate = substr($val['created_at'], 3, 2);
                                                        $cyear = substr($val['created_at'], 8, 2);
                                                        if ($month_array1[$cdate]) {
                                                            $mmon = $month_array1[$cdate];
                                                        }

                                                        // array_push($emp_pfno, $val['reference_no']);
                                                        // if (in_array($stripped, $b))     //  && $val1['gp'] >= 4200
                                                        {
                                                            if ($val1['gp'] <= 4200) {
                                                                echo "<tr>";
                                                            } else {
                                                                echo "<tr class='bg_light_blue'>";
                                                            }
                                                            echo "
    										    <td>" . $val['empid'] . "</td>
    											<td>" . $val1['name'] . "</td>
    											<td>" . $val1['BU'] . "</td>
    											<td>" . getDesignation($val1['desig']) . "</td>
    											<td>" . $val1['level'] . "</td>
    											<td>" . $val1['gp'] . "</td>
    											<td>" . $val1['bp'] . "</td>
    											<td>$amount</td>
    											<td>$mon - $y</td>
    											<td>$mmon - $cyear</td>";

                                                            if ($val['30p_cnt'] == '0' && $val['30p_amt'] == '0') {
                                                                echo "
    												<td>-</td>
    											<td>-</td>
    												";
                                                                $t1 = 0;
                                                            } else {
                                                                echo "
    												<td>" . $val['30p_cnt'] . "</td>
    											<td>" . $val['30p_amt'] . "</td>
    												";
                                                                $t1 = $val['30p_amt'];
                                                            }
                                                            if ($val['70p_cnt'] == '0' && $val['70p_amt'] == '0') {
                                                                echo "
    												<td>-</td>
    											<td>-</td>
    												";
                                                                $t2 = 0;
                                                            } else {
                                                                echo "
    												<td>" . $val['70p_cnt'] . "</td>
    											<td>" . $val['70p_amt'] . "</td>
    												";
                                                                $t2 = $val['70p_amt'];
                                                            }
                                                            if ($val['100p_cnt'] == '0' && $val['100p_amt'] == '0') {
                                                                echo "
    												<td>-</td>
    											<td>-</td>
    												";
                                                                $t3 = 0;
                                                            } else {
                                                                echo "
    												<td>" . $val['100p_cnt'] . "</td>
    											<td>" . $val['100p_amt'] . "</td>
    												";
                                                                $t3 = $val['100p_amt'];
                                                            }

                                                            $total_amt = (int)$t1 + (int)$t2 + (int)$t3;
                                                            $temp = $temp + $total_amt;

                                                            echo "
    											<td>$total_amt</td>";
                                                            $tcnt = 0;
                                                            $sqll = mysqli_query($conn, "SELECT SUM(amount) as amount FROM `add_cont` WHERE empid='" . $val['empid'] . "' AND reference_no='" . $val['reference_no'] . "' ");
                                                            $ress = mysqli_fetch_array($sqll);
                                                            // 			$tcnt=$tcnt + $ress['amount'];
                                                            if ($ress['amount'] == '0' || $ress['amount'] == null) {

                                                                echo "<td>-</td>";
                                                            } else {
                                                                $temp1 = $temp1 + $ress['amount'];
                                                                echo "<td>" . $ress['amount'] . "</td>";
                                                            }

                                                            echo "											
    											<td><a href='show_seperate_claim.php?ref_no=" . $val['reference_no'] . "&empid=" . $val['empid'] . "' class='btn btn-primary btn-sm'>Show</a>
    											<a href='emp-track-modul.php?ref_no=" . $val['reference_no'] . "' class='btn green btn_action'>Track</a></td>
    										</tr>";
                                                        }
                                                    }


                                                    ?>
                                                    <?php
                                                    echo "<tr>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td><b>Total</b></td>
											<td><b>$temp</b></td>
											<td><b>$temp1<b></td>
											<td><b></b></td>
											
										</tr>";
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="text-right">
                                            <?php $str = implode(" ", $emp_pfno); ?>
                                            <input type="hidden" name="emp_pfno_data[]" value="<?php echo $str; ?>">
                                            <?php
                                            $query = mysqli_query($conn,"SELECT * from master_summary where id='" . $_GET['id'] . "' and summary_id='" . $_GET['sum_id'] . "' ");
                                            $val = mysqli_fetch_array($query);
                                            if ($val['estcrk_status'] == 0 && $val['forward_status'] == 1 && $val['pa_status'] == 0) {

                                                echo '<button type="submit" class="btn green">Approve</button>';
                                            }

                                            ?>

                                            <!-- <button class="btn yellow">Print</button> -->
                                        </div>
                                    </div>
                                </div>
                                <input type='hidden' name='empid' value='<?php echo $val['empid']; ?>'>
                                <input type='hidden' name='refno' value='<?php echo $val['reference_no']; ?>'>
                                <input type='hidden' name='sumid' value='<?php echo $val['summary_id']; ?>'>

                                <input type='hidden' id='summary_month_year' value='<?php echo date('F Y'); ?>'>
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



<!-- File export script -->
<script type="text/javascript">
    $(document).ready(function() {
        var summary_month_year = $("#summary_month_year").val();
        $('#example').DataTable({
            "dom": '<"dt-buttons"Bf><"clear">lirtp',
            "ordering": false,
            "paging": true,
            "autoWidth": true,
            "buttons": [{
                    text: 'Print',
                    extend: 'pdfHtml5',
                    filename: 'TA Summary for month of ' + summary_month_year,
                    orientation: 'landscape', //portrait
                    pageSize: 'A4', //A3 , A5 , A6 , legal , letter
                    exportOptions: {
                        columns: [0, 1, 2, 3, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17],
                        search: 'applied',
                        order: 'applied'
                    },
                    customize: function(doc) {
                        //Remove the title created by datatTables
                        doc.content.splice(0, 1);
                        //Create a date string that we use in the footer. Format is dd-mm-yyyy
                        var now = new Date();
                        var jsDate = now.getDate() + '-' + (now.getMonth() + 1) + '-' + now
                            .getFullYear();
                        // Logo converted to base64
                        // var logo = getBase64FromImageUrl('https://datatables.net/media/images/logo.png');
                        // The above call should work, but not when called from codepen.io
                        // So we use a online converter and paste the string in.
                        // Done on http://codebeautify.org/image-to-base64-converter
                        // It's a LONG string scroll down to see the rest of the code !!!
                        //var logo = 'data:image/jpeg;base64,/logo.p;
                        // A documentation reference can be found at
                        // https://github.com/bpampuch/pdfmake#getting-started
                        // Set page margins [left,top,right,bottom] or [horizontal,vertical]
                        // or one number for equal spread
                        // It's important to create enough space at the top for a header !!!
                        doc.pageMargins = [20, 60, 20, 30];
                        // Set the font size fot the entire document
                        doc.defaultStyle.fontSize = 11;
                        // Set the fontsize for the table header
                        doc.styles.tableHeader.fontSize = 11;
                        // Create a header object with 3 columns
                        // Left side: Logo
                        // Middle: brandname
                        // Right side: A document title
                        doc['header'] = (function() {
                            return {
                                columns: [

                                    {
                                        alignment: 'left',
                                        italics: true,
                                        text: 'CENTRAL RAILWAY',
                                        fontSize: 10,
                                        margin: [10, 0]
                                    },
                                    {
                                        alignment: 'center',
                                        italics: true,
                                        text: 'DRM OFFICE',
                                        fontSize: 10,
                                        margin: [10, 0]
                                    },
                                    {
                                        alignment: 'right',
                                        fontSize: 10,
                                        text: 'SOLAPUR DIVISION'
                                    }
                                ],
                                margin: 20
                            }
                        });
                        // Create a footer object with 2 columns
                        // Left side: report creation date
                        // Right side: current page and total pages
                        doc['footer'] = (function(page, pages) {
                            return {
                                columns: [
                                    // 	{
                                    // 		alignment: 'left',
                                    // 		text: ['Date: ', { text: jsDate.toString() }]
                                    // 	},
                                    {
                                        alignment: 'right',
                                        text: 'SR DPO/SUR',
                                        width: 300
                                    }
                                ],
                                margin: [520, 0]
                            }
                        });
                        // Change dataTable layout (Table styling)
                        // To use predefined layouts uncomment the line below and comment the custom lines below
                        // doc.content[0].layout = 'lightHorizontalLines'; // noBorders , headerLineOnly
                        var objLayout = {};
                        objLayout['hLineWidth'] = function(i) {
                            return .5;
                        };
                        objLayout['vLineWidth'] = function(i) {
                            return .5;
                        };
                        objLayout['hLineColor'] = function(i) {
                            return '#aaa';
                        };
                        objLayout['vLineColor'] = function(i) {
                            return '#aaa';
                        };
                        objLayout['paddingLeft'] = function(i) {
                            return 4;
                        };
                        objLayout['paddingRight'] = function(i) {
                            return 4;
                        };
                        doc.content[0].layout = objLayout;
                    }
                },
                {
                    extend: 'excel',
                    footer: false,

                }
            ]
        });

    });
</script>

<!-- <script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script> -->
<script src="../assets/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js" type="text/javascript"></script>
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">