<?php
require_once('Global_Data/header.php');
error_reporting(0);
include('config.php');
include('functions.php')
?>

<style>
@media print {
    h3 {
        text-align: center !important;
    }

    .btn-screen {
        display: none !important;
    }

    .table {
        width: 100% !important;
        max-width: 100% !important;
        margin-bottom: 20px !important;
        background-color: transparent !important;
        border-spacing: 0 !important;
        border: 1px solid black !important;
        border-collapse: collapse !important;
    }
}
</style>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css"
    media="print">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript" charset="utf-8"
    media="print"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js">
</script>
<!-- <script src="jquery.js" type="text/JavaScript" language="javascript"></script>
<script src="jquery.PrintArea.js" type="text/JavaScript" language="javascript"></script> -->
<!-- PNotify -->
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h4> Branch Admin Category Wise Summary Report</h4><br>
            </div>
            <!--<div class="title_right"></div>-->
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h4 class="bgshades"> Details </h4>
                    </div>
                    <form action="" Method="POST" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" value='<?php echo $_SESSION['SESSION_ID']; ?>' name="user_id"
                            id="user_id" />
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="">Select Category</label>
                                    <select name="category[]" style="width:100%" id="category" multiple
                                        class="form-control select2" required>
                                        <option disabled hidden>----Select Category----</option>
                                        <option value="0">All</option>
                                        <?php
                                        $fetch_category = mysqli_query($db_egr,"select * from category");
                                        while ($category_fetch = mysqli_fetch_array($fetch_category)) {
                                            echo "<option value='" . $category_fetch['cat_id'] . "'>" . $category_fetch['cat_name'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="">From Date</label>
                                    <input type="text" class="form-control datePick" id="frm_date"
                                            name="frm_date" placeholder="Select From Date " required>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="">To Date</label>
                                    <input type="text" class="form-control datePick" id="to_date" name="to_date"
                                        placeholder="Select To Date" required>
                                    <span style="color:red" id="warning"></span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-sm-7 col-xs-12">
                            <button type="button" class="btn btn-info source" id="get_rpt">Generate</button>
                            <a href="index.php" class="btn btn-danger" data-dismiss="modal">Close</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9"></div>
            <div class="col-md-3">
                <button type="button" class="btn btn-info btn-screen" id="excel_report" name="excel_report">Excel
                    Report</button>
                <button type="button" class="btn btn-info btn-screen pull-right" id="print_report"
                    name="print_report">Print
                    Report</button>
            </div>
        </div>

        <div class="row wrapper" id="print_area">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h4 style="text-align: center">Branch Admin Category Wise Summary Report</h4>
                        <center>
                            <h6>Month : <span class="control-label" id="month_name">01/01/2018</span></h6>
                        </center>
                    </div>
                    <table class="table table-striped table-bordered" id="tbl_report">
                        <thead>
                            <tr style="font-size: 15px">
                                <th>Sr. No</th>
                                <th>Category Name</th>
                                <th>Total No Of Grievance<br /> Accrued</th>
                                <th>Total No Of Grievance<br /> Complied</th>
                                <th>Total No Of Grievance<br /> Pending For Compliance</th>
                                <th>Total No Of Grievance<br /> Pending from more than month
                            </tr>
                        </thead>
                        <tbody id="rpt_body">
                            <tr>
                                <td>data</td>
                                <td>data</td>
                                <td>data</td>
                                <td>data</td>
                                <td>data</td>
                                <td>data</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
    </div>
</div>
</div>
</div>

<script>
$(function() {
    $(".select2").select2();
    $(".datePick").datepicker({
        format: 'dd-mm-yyyy',
        forceParse: false,
        autoclose: true
    });

    $('#category').change(function() {
        $('option:selected', $(this)).each(function() {
            //alert($(this).val());
        });
    });


    $("#print_report").on("click", function() {
        // debugger;
        window.frames["print_frame"].document.body.innerHTML = $("#print_area").html();
        window.frames["print_frame"].window.focus();
        //window.frames["print_frame"].window.open();
        window.frames["print_frame"].window.print();
        /* var mode = 'iframe'; // popup
         var close = mode == "popup";
         var options = { mode : mode, popClose : close};
         $("div.wrapper").printArea( options );*/

    });

    $("#get_rpt").on("click", function() {
        // debugger;
        var frm_date = $("#frm_date").val();
        var to_date = $("#to_date").val();
        var category = $("#category").val();
        var frm_d = frm_date.split("/");
        var to_d = to_date.split("/");
        if (frm_d[0] == to_d[0]) {
            var frm_month = get_month(frm_d[0]);
            var to_month = get_month(to_d[0]);
            //alert(frm_month);
            if (frm_d[2] == to_d[2]) {
                // $("#month_name").html(frm_month + " - " + to_month + " " + to_d[2]);
                $("#month_name").html(frm_month + " - " + to_d[2]);
            } else {
                // $("#month_name").html(frm_month + " - " + frm_d[2] + " / " + to_d[2]);
                $("#month_name").html(frm_month + " " + frm_d[2] + " - " + to_month + " " + to_d[2]);
            }

        } else {
            var frm_month = get_month(frm_d[0]);
            var to_month = get_month(to_d[0]);
            if (frm_d[2] == to_d[2]) {
                $("#month_name").html(frm_month + " - " + to_month + " " + to_d[2]);
            } else {
                $("#month_name").html(frm_month + " " + frm_d[2] + " - " + to_month + " " + to_d[2]);
            }
        }
        $.ajax({
            type: "post",
            url: "reportprocess.php",
            data: "action=ba_category_report_sum&frm_date=" + frm_date + "&to_date=" + to_date +
                "&category=" + category,
            success: function(data) {
                // alert(data);
                var ddd = data;
                var arr = ddd.split('$');
                $("#rpt_body").html(data);
            }
        });
    });

    function get_month(x) {
        switch (x) {
            case '01':
                return "Jan";
                break;
            case '02':
                return "Feb";
                break;
            case '03':
                return "Mar";
                break;
            case '04':
                return "Apr";
                break;
            case '05':
                return "May";
                break;
            case '06':
                return "June";
                break;
            case '07':
                return "July";
                break;
            case '08':
                return "Aug";
                break;
            case '09':
                return "Sep";
                break;
            case '10':
                return "Oct";
                break;
            case '11':
                return "Nov";
                break;
            case '12':
                return "Dec";
                break;
            default:
                return "";
                break;
        }
    }
});
</script>
<?php
require_once('Global_Data/footer.php');
?>
<link href="select2/select2.min.css" rel="stylesheet" />
<script src="select2/select2.min.js"> </script>
<script src="js/jquery.table2excel.js">
</script>
<script>
$(document).ready(function() {
    $("#excel_report").on("click", function() {
        // alert("working");
        $("#tbl_report").table2excel({
            exclude: ".noExl",
            name: "Report",
            filename: "Report", //do not include extension
            fileext: ".xlsx", // file extension
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
        });
    });
});
</script>