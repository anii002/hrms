<?php
require_once('Global_Data/header.php');
error_reporting(0);
?>
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
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> Branch Admin Category Wise Report</h3><br>
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
                    <form method="POST" class="form-horizontal" enctype="multipart/form-data"
                        id="frm_category_report">
                        <input type="hidden" value='<?php echo $_SESSION['SESSION_ID']; ?>' name="user_id"
                            id="user_id" />
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="">Select Category</label>
                                    <select name="category[]" style="width:100%" id="category" multiple
                                        class="form-control select2 display" required>
                                        <option disabled hidden>----Select Category----</option>
                                        <option value="0">All</option>
                                        <?php
                                        $fetch_category = mysql_query("select * from category", $db_egr);
                                        while ($category_fetch = mysql_fetch_array($fetch_category)) {
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
                            <button type="button" class="btn btn-info source"
                                id="btn_report_generate">Generate</button>
                            <!-- <input type="submit" value="Generate" class="btn btn-info source"> -->
                            <a href="index.php" class="btn btn-danger" data-dismiss="modal">Close</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9"></div>
            <div class="col-md-3">
                <button type="button" class="btn btn-info btn-screen " id="excel_report" name="excel_report">Excel
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
                        <h4 style="text-align: center">Branch Admin Category Wise Report</h4>
                        <center>
                            <h6>Month : <span class="control-label" id="month_name">01/01/2018</span></h6>
                        </center>
                    </div>
                    <table class="table table-striped table-bordered" id="tbl_report">
                        <thead>
                            <tr style="font-size: 15px">
                                <th>Sr. No</th>
                                <th>Reg. No /Reg Date</th>
                                <th>Category Name</th>
                                <th>Employee Name / Designation</th>
                                <th>Subject</th>
                                <!-- <th>Officer</th> -->
                                <!-- <th>Remark</th> -->
                                <th style="width:10%">Target Date</th>
                            </tr>
                        </thead>
                        <tbody id="rpt_body">
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

<?php
require_once('Global_Data/footer.php');
?>
<link href="select2/select2.min.css" rel="stylesheet" />
<script src="select2/select2.min.js"> </script>
<script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="js/jquery.table2excel.js">
</script>
<script>
$(document).ready(function() {
    $(".select2").select2();
    $(".datePick").datepicker({
        format: 'dd-mm-yyyy',
        forceParse: false,
        autoclose: true
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

    $("#btn_report_generate").click(function(e) {
        e.preventDefault();
        var postData = new FormData();
        var postData = new FormData($("#frm_category_report")[0]);
        postData.append("action", "ba_category_report");
        var frm_date = $("#frm_date").val();
        var to_date = $("#to_date").val();
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
        var formURL = $(this).attr('action');
        $.ajax({
            url: "reportprocess.php",
            type: "POST",
            data: postData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data, textStatus, jqXHR) {
                // alert(data);
                // console.log(data);
                $("#rpt_body").html(data);
                // $("#tbl_report").DataTable({
                //     dom: 'Bfrtip',
                //     buttons: [
                //         'print', 'csv'
                //     ]
                // });
                // $('table.display').DataTable({
                //     dom: 'Bfrtip',
                //     buttons: [
                //         'print', 'csv', 'copy'
                //     ]
                // });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    });
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