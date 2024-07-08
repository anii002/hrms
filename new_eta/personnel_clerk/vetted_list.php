<?php
$GLOBALS['flag'] = "2.7";
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
                    <a href="#">प्रत्याशित सारांश रिपोर्ट / Vetted Summary Report</a>
                </li>
            </ul>

        </div>
        <!-- <h1>ecefce</h1> -->

        <!-- <h3 class="form-section">Add User</h3> -->
        <div class="row">



            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box blue-hoki">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-globe"></i>प्रत्याशित सारांश रिपोर्ट / Vetted Summary Report
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="display" id="example1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
								$cnt = 1;
								$query = "SELECT * from master_summary WHERE forward_status = '1' and estcrk_status='1' and dept_id='-' and is_gazetted='1' ";
								//echo $query;
								$result = mysqli_query($conn,$query);
								while ($val = mysqli_fetch_array($result)) {
									if ($val['title'] != null) {
										echo "
											<tr>
												<td>$cnt</td>
												<td>" . $val['title'] . "</td>
												<td>" . $val['description'] . "</td>
												<td><a href='summary_report_details_vett.php?id=" . $val['id'] . "&sum_id=" . $val['summary_id'] . "' class='btn btn-primary'>Show</a>";
										echo "</tr>";
										$cnt++;
									}
								}
								?>


                            </tbody>
                        </table>
                    </div>
                </div>

            </div>



        </div>

    </div>
</div>
<?php
include 'common/footer.php';
?><script type="text/javascript">
$(document).ready(function() {
    $('#example2').DataTable({
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