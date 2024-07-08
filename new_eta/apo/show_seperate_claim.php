<?php
$GLOBALS['flag'] = "-";
include('common/header.php');
include('common/sidebar.php');
include('control/function.php');
date_default_timezone_set("Asia/kolkata");
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
                    <a href="#">अपूर्ण संक्षिप्त रिपोर्ट / Pending Summary Report Details</a>
                </li>
            </ul>

        </div>
        <!-- <h1>ecefce</h1> -->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption col-md-6 btnhide">
                    <b>अपूर्ण संक्षिप्त रिपोर्ट / Pending Summary Report Details</b>
                </div>
                <div class="caption col-md-6 text-right backbtn">
                    <button class=" btn btn-danger print btnhide" onclick="history.go(-1);">Back</button>
                </div>
            </div>
            <div class="portlet-body form">

                <form method="POST">
                    <div class="form-body add-train">
                        <div class="row add-train-title">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!-- <label class="control-label"><h4 class="">Statement Showing the summery of TA & Contingency Bills For the Month of September-2018 </h4></label> -->

                                    <input type="hidden" value="<?php echo $_GET['ref_no']; ?>" name="reference_no"
                                        id="reference_no">

                                    <div class="portlet-body">
                                        <div class="table-scrollable summary-table">
                                            <table id="example" class="table table-hover table-bordered display">
                                                <thead>
                                                    <tr class="warning">
                                                        <th>Card Pass</th>
                                                        <th>Date</th>
                                                        <th>
                                                            <center>Journey<br>Type</center>
                                                        </th>
                                                        <th>Train No.</th>
                                                        <th>
                                                            <center>Journey<br>Purpose</center>
                                                        </th>
                                                        <th>
                                                            <center>Depart<br>Station</center>
                                                        </th>
                                                        <th>
                                                            <center>Depart<br>Time</center>
                                                        </th>
                                                        <th>
                                                            <center>Arrival<br>Station</center>
                                                        </th>
                                                        <th>
                                                            <center>Arrival<br>Time</center>
                                                        </th>
                                                        <th>Rate</th>
                                                        <th>Claim</th>
                                                        <th>Objective</th>
                                                        <th class='btnhide'>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody align="center">
                                                    <?php
													// $_GET['ref_no'];
													$query = "SELECT DISTINCT(set_number) FROM `taentrydetails` WHERE reference_no='" . $_GET['ref_no'] . "' AND empid='" . $_GET['empid'] . "' ORDER BY `id` ASC";
													$sql = mysqli_query($conn,$query);
													$total_row1 = mysqli_num_rows($sql);
													while ($row_1 = mysqli_fetch_array($sql)) {

														$query1 = "SELECT * FROM `taentrydetails` WHERE set_number='" . $row_1['set_number'] . "' AND reference_no='" . $_GET['ref_no'] . "' ORDER by STR_TO_DATE(taDate,'%d/%m/%Y') ASC";
														$sql1 = mysqli_query($conn,$query1);
														$total_rows = mysqli_num_rows($sql1);
														$cnt = 1;
														while ($row = mysqli_fetch_array($sql1)) {
															?>
                                                    <tr>
                                                        <?php
																if ($cnt == 1) {
																	?>
                                                        <td width="10%" rowspan='<?php echo $total_rows; ?>'>
                                                            <?php echo getcardpass($row['reference_no']); ?> </td>
                                                        <?php
															}
															?>
                                                        <td><?php echo $row['taDate']; ?></td>
                                                        <td><?php echo getjourneytype($row['journey_type']); ?></td>
                                                        <td><?php echo $row['train_no']; ?> </td>
                                                        <td> <?php echo getjourneypurpose($row['journey_purpose']); ?>
                                                        </td>
                                                        <td><?php echo $row['departS']; ?></td>
                                                        <td><?php echo $row['departT']; ?></td>
                                                        <td><?php echo $row['arrivalS']; ?></td>
                                                        <td><?php echo $row['arrivalT']; ?></td>
                                                        <td><?php echo $row['amount']; ?></td>
                                                        <td><?php echo $row['percent']; ?></td>
                                                        <?php
																if ($cnt == 1) {
																	?>
                                                        <td width="10%" rowspan='<?php echo $total_rows; ?>'>
                                                            <?php echo $row['objective']; ?> </td>
                                                        <td class='btnhide' width="10%"
                                                            rowspan='<?php echo $total_rows; ?>'>

                                                            <?php
																		$q = "SELECT id FROM `master_cont` WHERE reference_no='" . $_GET['ref_no'] . "' AND set_no='" . $row_1['set_number'] . "' ";
																		$s = mysqli_query($conn,$q);
																		$t = mysqli_num_rows($s);
																		if ($t == 1) {
																			?>
                                                            <a id="<?php echo $row_1['set_number']; ?>"
                                                                value="<?php echo get_employee($row['empid']); ?>"
                                                                style="margin-top: 2px;"
                                                                class="btn green view_cont btn_action">View Conti.</a>
                                                            <?php
																	} else {
																		?>
                                                            No Contingency Attached.

                                                            <?php
																	}
																	?>
                                                        </td>
                                                        <?php }
															// else {
															?>

                                                        <!-- <td>vvv SSS</td> -->
                                                        <?php
																$cnt++;
																?>

                                                    </tr>
                                                    <?php
													}
													?>
                                                    <tr>
                                                        <td colspan="13" style="background-color: #fcf8e3a3;"></td>
                                                    </tr>
                                                    <?php
												}
												?>
                                                </tbody>
                                            </table>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4 summary-total">
                                            <h4 style="font-weight: bold;">Summary</h4>
                                            <div class="table-scrollable">
                                                <?php
												$query3 = "SELECT `30p_cnt`,`30p_amt`,`70p_cnt`,`70p_amt`,`100p_cnt`,`100p_amt` FROM `tasummarydetails` WHERE `empid`='" . $_GET['empid'] . "' AND `reference_no`='" . $_GET['ref_no'] . "' ";
												$sql3 = mysqli_query($conn,$query3);
												$row3 = mysqli_fetch_array($sql3);
												$total_amount = $row3['100p_amt'] + $row3['70p_amt'] + $row3['30p_amt'];
												?>
                                                <table class="table table-bordered table-hover">
                                                    <thead class="page-bar">
                                                        <tr>
                                                            <th>Percent</th>
                                                            <th>Count</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>100%</td>
                                                            <td><?php echo $row3['100p_cnt']; ?></td>
                                                            <td><?php echo $row3['100p_amt']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>70%</td>
                                                            <td><?php echo $row3['70p_cnt']; ?></td>
                                                            <td><?php echo $row3['70p_amt']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>30%</td>
                                                            <td><?php echo $row3['30p_cnt']; ?></td>
                                                            <td><?php echo $row3['30p_amt']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td><b>Total</b></td>
                                                            <td><b><?php echo $total_amount; ?></b></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="col-md-12 trackprint-btn">
                                            <ul>
                                                <input type="hidden" value="<?php echo $row3['month']; ?>"
                                                    name="ta_manth" id="ta_manth">
                                                <input type="hidden" value="<?php echo $row3['cardpass']; ?>"
                                                    name="cardpass" id="cardpass">
                                                <input type="hidden" value="<?php echo $row3['year']; ?>" name="year"
                                                    id="year">

                                                <!-- <li><button type="button" class="hide_print btn btn-danger pull-right" data-toggle="modal" data-target="#reject" >Reject</button></li> -->
                                            </ul>
                                        </div>

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




<div id="forward" class="modal fade modal-scroll modalemployeedata" tabindex="-1" data-replace="true">
    <div class="modal-header btn-orange-moon">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Forwarding TA : <span id="name1" name="name1"></span> </h4>
    </div>
    <form action='control/adminProcess.php?action=forwardToDA' method="post" enctype="multipart/form-data"
        autocomplete="off" class="horizontal-form">
        <input type="text" name="empid" value="<?php echo $_SESSION['empid']; ?>">
        <input type="text" name="original_id" value="<?php echo $_REQUEST['empid']; ?>">
        <input type="text" name="ref" value="<?php echo $_REQUEST['ref_no']; ?>">
        <div class="modal-body">
            <div class="portlet-body table-responsive">
                <div class="col-xs-offset-1 col-xs-2"><label for="">User</label></div>
                <div class="col-xs-7">
                    <select name="forwardName" id="forwardName" class="form-control select2 required"
                        style="width: 100%" required>
                        <option readonly value=''>Select User</option>
                        <?php
						$query_emp = mysqli_query($conn,"SELECT department.deptno as id  FROM `employees` ,department WHERE department.deptno=employees.dept AND pfno='" . $_SESSION['empid'] . "' ");
						$resu1 = mysqli_fetch_array($query_emp);
						$dptid = $resu1['id'];

						$sql_user = mysqli_query($conn,"SELECT * from users where dept='" . $dptid . "' AND role='11' ");
						//echo $did="SELECT * from users where dept='".$dptid."' AND role='13'";
						while ($resu = mysqli_fetch_assoc($sql_user)) {
							$query = "SELECT * FROM employees where pfno='" . $resu['empid'] . "'";
							$did .= "SELECT * FROM employees where pfno='" . $resu['empid'] . "'";

							$result = mysqli_query($conn,$query);
							while ($value = mysqli_fetch_assoc($result)) {
								// $did.=$value['pfno'];
								echo "<option value='" . $value['pfno'] . "'>" . $value['name'] . "  (" . $value['desig'] . ")</option>";
							}
						}
						?>
                    </select>
                    <input type="hidden" value="<?php echo $did; ?>" name="">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn blue">Forward TA</button>
        </div>
    </form>
</div>

<div id="reject" class="modal fade" tabindex="-1" data-replace="true">
    <div class="modal-header btn-orange-moon">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Rejecting TA : </h4>
    </div>
    <form action='control/adminProcess.php?action=rejectTA_ESTCLERK' method="post" enctype="multipart/form-data"
        autocomplete="off" class="horizontal-form">
        <input type="hidden" name="coempid" value="<?php echo $_SESSION['empid']; ?>">
        <input type="hidden" name="pmempid" value="<?php echo $_GET['empid']; ?>">
        <input type="hidden" name="ref_no" value="<?php echo $_GET['ref_no']; ?>">
        <div class="modal-body">
            <div class="portlet-body table-responsive">
                <div class="col-xs-offset-1 col-xs-2"><label for="">Reason</label></div>
                <div class="col-md-6">
                    <textarea rows="2" name="reason" required></textarea>

                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn blue">Reject TA</button>
        </div>
    </form>
</div>



<div id="cont_Data" class="modal fade modal-scroll modalemployeedata" tabindex="-1" data-replace="true">
    <div class="modal-header btn-orange-moon">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Contingency Data : <span id="name2" name="name2"></span> </h4>
    </div>
    <form action="control/adminProcess.php?action=delcont" method="post" class="horizontal-form">
        <input type="hidden" id="ref_no" value="<?php echo $_GET['ref_no']; ?>" name="ref_no">
        <input type="hidden" id="set_no1" value="" name="set_no1">
        <div class="modal-body">
            <div class="portlet-body table-responsive">
                <div id="cont_details"></div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn default" data-dismiss="modal">Close</button>
            <!--<button type="submit" class="btn red" >Delete Conti.</button>-->
        </div>
    </form>
</div>


<?php
include 'common/footer.php';
?>


<!-- File export script -->
<script type="text/javascript">
$(document).on("click", ".view_cont", function() {
    var sno = $(this).attr('id');
    var ename = $(this).attr('value');
    var ref_no = $("#reference_no").val();
    // alert(sno);
    // alert(ref_no);
    $("#set_no1").val(sno);
    $("#name2").val(ename);
	jQuery.noConflict();
    $.ajax({
        url: 'control/adminProcess.php',
        type: 'post',
        data: "action=view_conti&ref_no=" + ref_no + "&set_no=" + sno,

        success: function(data) {
            // alert(data);
            if (data != 0) {
                $("#cont_details").html(data);
                $("#cont_Data").modal('toggle');
                // $("#cont_Data").modal('show'); 
            }
        }
    });

});

$(document).ready(function() {


    function print_button() {
        $(".main-footer").hide();
        $(".box-header").hide();
        $(".hide_print").hide();
        $("#info").hide();
        $(".btnhide").hide();
        window.print();
        $(".main-footer").show();
        $(".box-header").show();
        $(".hide_print").show();
        $("#info").show();
        $("#info2").show();
        $("#info3").show();
        $("#info4").show();
        window.location.reload();
    }


});
</script>