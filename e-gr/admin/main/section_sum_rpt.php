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
    .modal-body {
    position: relative;
    padding: 15px;
    overflow-x: auto !important;
}
}

.table{
    overflow-x: auto;
    overflow-y: hidden;
    display: block;
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
                <h4> Section Wise Summary Report</h4><br>
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
                    <form action="process.php?action=get_section_report" Method="POST" class="form-horizontal"
                            enctype="multipart/form-data">
                        <input type="hidden" value='<?php echo $_SESSION['SESSION_ID']; ?>' name="user_id"
                            id="user_id" />
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="">Select Section</label>
                                    <select name="section[]" style="width:100%" id="section" multiple
                                        class="form-control select2" required>
                                        <option disabled hidden>----Select Section----</option>
                                        <option value="0">All</option>
                                        <?php
                                        if (isBA()) {
                                            $sql = "select * from tbl_section where is_branch_admin='1'";
                                        } else {
                                            $sql = "select * from tbl_section";
                                        }
                                        $fetch_section = mysqli_query( $db_egr,$sql);
                                        while ($section_fetch = mysqli_fetch_array($fetch_section)) {
                                            if (!isBA()) {
                                                if ($section_fetch['is_branch_admin'] <= 0 || $section_fetch['sec_id'] == 5) {
                                                    echo "<option value='" . $section_fetch['sec_id'] . "'>" . $section_fetch['sec_name'] . "</option>";
                                                }
                                            } else {
                                                echo "<option value='" . $section_fetch['sec_id'] . "'>" . $section_fetch['sec_name'] . "</option>";
                                            }
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
                        <h4 style="text-align: center">Section Wise Summary Report</h4>
                        <center>
                            <h6>Month : <span class="control-label" id="month_name">01/01/2018</span></h6>
                        </center>
                    </div>
                    <table class="table table-striped table-bordered" id="tbl_report" style="width:100%;">
                        <thead>
                            <tr style="font-size: 15px">
                                <th>Sr. No</th>
                                <th>Section/Dept</th>
                                <th>Total Cases</th>
                                <th>Complied Cases</th>
                                <th>Balance Cases</th>
                                <th>Beyond 1 Month Date</th>
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
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Grievance Details </h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-striped" id="tbl_report">
                            <thead>
                                <tr style="font-size: 15px">
                                    <th>Sr. No</th>
                                    <th>Grievance Ref. No.</th>
                                    <th>Grievance Date</th>
                                    <th>Category Name</th>
                                    <th>Employee Name / Designation</th>
                                     <th>Working Station</th> 
                                    <th>Subject</th>
                                    <!-- <th>Remark</th> -->
                                    <!-- <th>Target Date</th> -->
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="rpt_body1"></tbody>
                        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
        <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
    </div>
</div>
</div>
</div>

<script>
$(document).ready(function() {
    $(document).on("click", ".x", function() {
        // console.log($(this).attr('id'));
        // console.log($(this).parent().find('.get_id').attr('id'));
        var frm_date = $("#frm_date").val();
        var to_date = $("#to_date").val();
        var section = $(this).parent().find('.get_id').attr('id')
         $.ajax({
        type: 'post',
        url: 'process.php',
        data: "action=section_report&frm_date=" + frm_date + "&to_date=" + to_date +
                "&section=" + section+"&rd_radio="+$(this).attr('id'),
        success: function(data) {
            //alert(data);
            // console.log(data);
                $("#rpt_body1").html(data);

         $("#exampleModal").modal() 
        }
    });
    });
});


$(function() {
    $(".select2").select2();
    $(".datePick").datepicker({
        format: 'dd-mm-yyyy',
        forceParse: false,
        autoclose: true
    });

    $('#section').change(function() {
        $('option:selected', $(this)).each(function() {
            //alert($(this).val());
        });
    });


    $("#print_report").on("click", function() {
        //debugger;
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
        var section = $("#section").val();
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
            url: "process.php",
            data: "action=get_section_report&frm_date=" + frm_date + "&to_date=" + to_date +
                "&section=" + section,
            success: function(data) {
                // alert(data);
                console.log(data);
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