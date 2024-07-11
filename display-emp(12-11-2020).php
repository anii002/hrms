<?php
$GLOBALS['flag'] = "5";
require_once 'common/db.php';
require_once 'common/header.php';

$id = $_SESSION['user_id'];

$sql = "SELECT * FROM user_permission WHERE id = '$id'";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);

$sql_fetch = "SELECT * FROM register_user";
$result_fetch = mysql_query($sql_fetch);


?>



<div class="bgwhite">

    <section class="content-header">
        <h1>Employee</h1>
        <ul style="list-style: none; margin-left: 70px; margin-top: -26px;">
            <li>
                <button class="btn btn-danger btn-sm" onclick="window.history.back()">Go Back</button>
            </li>
        </ul>
        <ol class="breadcrumb">
            <li><a href="super_admin_dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Employee</li>
        </ol>
    </section>

    <div class="container">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>PF Number</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>DOB</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php $i = 1;
                while ($row_fetch = mysql_fetch_assoc($result_fetch)) {
                    if ($row_fetch['delete_status'] != 1) {
                ?>
                        <tr>
                            <th><?php echo $i; ?></th>
                            <td><?php echo $row_fetch['emp_no']; ?></td>
                            <td><?php echo $row_fetch['name']; ?></td>
                            <td>
                                <?php
                                $dept = $row_fetch['department'];
                                $sql_dept = "SELECT DEPTDESC FROM department WHERE DEPTNO = '$dept'";
                                $result_dept = mysql_query($sql_dept);
                                $row_dept = mysql_fetch_assoc($result_dept);
                                echo $row_dept['DEPTDESC'];
                                ?>
                            </td>
                            <td>
                                <?php
                                $desig = $row_fetch['designation'];
                                $sql_desig = "SELECT DESIGLONGDESC FROM designations WHERE DESIGCODE = '$desig'";
                                $result_desig = mysql_query($sql_desig);
                                $row_desig = mysql_fetch_assoc($result_desig);
                                echo $row_desig['DESIGLONGDESC'];
                                ?>
                            </td>
                            <td><?php echo $row_fetch['dob']; ?></td>
                            <td>
                                <a href="edit-emp.php?id=<?php echo $row_fetch['id']; ?>" class="btn btn-success btn-sm">Update</a>
                                <a data-toggle="modal" data-target="#delete1" onClick="del1(<?php echo $row_fetch['id']; ?>)" style="margin-top: 2px;" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                <?php $i++;
                    }
                } ?>
            </tbody>
        </table>
    </div>
</div>



<aside class="control-sidebar control-sidebar-dark">

    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>

    <div class="tab-content">

        <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript::;">
                        <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                            <p>Will be 23 on April 24th</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript::;">
                        <i class="menu-icon fa fa-user bg-yellow"></i>
                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                            <p>New phone +1(800)555-1234</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript::;">
                        <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                            <p>nora@example.com</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript::;">
                        <i class="menu-icon fa fa-file-code-o bg-green"></i>
                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                            <p>Execution time 5 seconds</p>
                        </div>
                    </a>
                </li>
            </ul>

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript::;">
                        <h4 class="control-sidebar-subheading">
                            Custom Template Design
                            <span class="label label-danger pull-right">70%</span>
                        </h4>
                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript::;">
                        <h4 class="control-sidebar-subheading">
                            Update Resume
                            <span class="label label-success pull-right">95%</span>
                        </h4>
                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript::;">
                        <h4 class="control-sidebar-subheading">
                            Laravel Integration
                            <span class="label label-warning pull-right">50%</span>
                        </h4>
                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript::;">
                        <h4 class="control-sidebar-subheading">
                            Back End Framework
                            <span class="label label-primary pull-right">68%</span>
                        </h4>
                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                        </div>
                    </a>
                </li>
            </ul>

        </div>
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->

        <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
                <h3 class="control-sidebar-heading">General Settings</h3>
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Report panel usage
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                    <p>
                        Some information about this general settings option
                    </p>
                </div>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Allow mail redirect
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                    <p>
                        Other sets of options are available
                    </p>
                </div>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Expose author name in posts
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                    <p>
                        Allow the user to show his name in blog posts
                    </p>
                </div>

                <h3 class="control-sidebar-heading">Chat Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Show me as online
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                </div>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Turn off notifications
                        <input type="checkbox" class="pull-right">
                    </label>
                </div>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Delete chat history
                        <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                    </label>
                </div>
            </form>
        </div>
    </div>
</aside>
<div class="control-sidebar-bg"></div>
</div>

<div id="delete1" class="modal modal-width fade modal-scroll" data-replace="true" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-header btn-orange-moon">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Delete</h4>
    </div>
    <form action="delete-emp.php" method="post" autocomplete="off" class="horizontal-form">
        <div class="modal-body">
            Do you really want to delete ?
            <input type="hidden" name="id" id="id" />
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info">Delete</button>
        </div>
    </form>
</div>

<footer class="main-footer text-center">

    <h5>&copy; Copyright 2019 <a href="http://almsaeedstudio.com">Salgem Infoigy Tech Pvt. Ltd.</a> All rights
        reserved.</h5>
</footer>

<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="dist/js/demo.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>


<script type="text/javascript">
    function del1(id) {
        $('#id').val(id);
    }
</script>



</body>

</html>