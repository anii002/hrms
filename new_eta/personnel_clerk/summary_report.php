<?php
$GLOBALS['flag'] = "2.6";
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
                    <a href="#">संक्षिप्त रिपोर्ट / Summary Report</a>
                </li>
            </ul>

        </div>
        <!-- <h1>ecefce</h1> -->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption col-md-6">
                    <b>संक्षिप्त रिपोर्ट / Summary Report</b>
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
                                    <!-- <label class="control-label"><h4 class="">Statement Showing the summery of TA & Contingency Bills For the Month of September-2018 </h4></label> -->
                                    <div class="portlet-body">
                                        <div class="table-scrollable summary-table">
                                            <table id="example1" class="table table-hover table-bordered display">
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
												    $query = "SELECT * from master_summary WHERE forward_status = '0' and dept_id='-' and is_gazetted='1' ";
													//echo $query;
													$result = mysqli_query($conn,$query);
													while ($val = mysqli_fetch_array($result)) {
														if ($val['title'] != null) {
															echo "
        											<tr>
        												<td>$cnt</td>
        												<td>" . $val['title'] . "</td>
        												<td>" . $val['description'] . "</td>
        												<td><a href='summary_report_details.php?id=" . $val['id'] . "&sum_id=" . $val['summary_id'] . "' class='btn btn-primary'>Show</a>";
															echo "</tr>";
															$cnt++;
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