<?php
$GLOBALS['flag'] = "5.9";
include('common/header.php');
include('common/sidebar.php');
function get_sum_department($id)
{
    global $conn;
    $query = "SELECT `DEPTDESC` FROM `department` WHERE `DEPTNO`='" . $id . "' ";
    $result = mysqli_query($conn,$query);
    $value = mysqli_fetch_array($result);
    return $value['DEPTDESC'];
}
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

        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption col-md-6">
                    <b>अपूर्ण संक्षिप्त रिपोर्ट / Pending Summary Report</b>
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
                                                        <th>ID</th>
                                                        <th>Title</th>
                                                        <th>Description</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $cnt = 1;
                                                    $query = "SELECT * from master_summary_cont WHERE forward_status = '1' AND pa_status = '0' and estcrk_status='0' AND dept_id != '01'";
                                                    $result = mysqli_query($conn,$query);
                                                    while ($val = mysqli_fetch_array($result)) {
                                                        $sql1 = "SELECT * from continjency_master,employees where continjency_master.empid=employees.pfno AND continjency_master.is_rejected='0' AND continjency_master.summary_id='" . $val['summary_id'] . "' AND continjency_master.generate='1'";
                                                        $res1 = mysqli_query($conn,$sql1);
                                                        $data = 0;
                                                        while ($val1 = mysqli_fetch_array($res1)) {
                                                            
                                                            if ($data == 0) {
                                                                if ($val['title'] != null) {
                                                                    echo "
                											<tr>
                												<td>$cnt</td>
                												<td>" . $val['title'] . "</td>
                												<td>" . $val['description'] . "</td>
                												<td><a href='cont_summary_report_details.php?id=" . $val['id'] . "&sum_id=" . $val['summary_id'] . "' class='btn btn-primary'>Show</a>";
                                                                    echo "</tr>";
                                                                    $cnt++;
                                                                }
                                                                $data++;
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
                    columns: [0, 1, 2, 3, 5],
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

<!--<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script> -->
<script src="../assets/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js" type="text/javascript"></script>
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">