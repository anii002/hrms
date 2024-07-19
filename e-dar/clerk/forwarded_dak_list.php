<?php
$GLOBALS['flag'] = "1.4";
include('common/header.php');
include('common/sidebar.php');
?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.php">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Forward Dak List</a>
                </li>
            </ul>

        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS -->
        <div class="row">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-book"></i>Forwarded List
                    </div>

                </div>
                <div class="portlet-body form">
                    <div class="form-body">
                        <table class="table table-bordered table-hover" id="example1">
                            <thead>
                                <tr>
                                    <th>SR No</th>
                                    <th>Unique DAK No.</th>
                                    <th>Marked TO</th>
                                    <th>Source</th>
                                    <!-- <th>Action</th> -->

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query_src = "SELECT * from master_source";
                                $result_src = mysqli_query($db_edak,$query_src);
                                $sr = 1;
                                while ($value_src = mysqli_fetch_array($result_src)) {
                                    echo "
								<tr>
								<td>" . $sr++ . "</td>
								<td>123123</td>
								<td>P/S&T</td>
								<td>" . $value_src['src_name'] . "</td>
								
								";

                                    //echo "<a target='_blank'  id='".$value_emp['uploaded_file_path']."' value='".$value_emp['uploaded_file_path']."'>'".$value_emp['uploaded_file_path']."'</a>";

                                    // echo "<td><button value='".$value_src['id']."' class='btn btn-info active' style='margin-left:10px;'>Forward</button>";
                                    // echo "<button value='".$value_src['id']."' class='btn btn-info active' style='margin-left:10px;'>Update</button>";
                                    // echo "<button value='".$value_src['id']."' class='btn btn-danger active' style='margin-left:10px;'>Remove</button></td>";
                                    echo "</tr>
								";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- END DASHBOARD STATS -->
        <div class="clearfix">
        </div>
    </div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php
include('common/footer.php');
?>