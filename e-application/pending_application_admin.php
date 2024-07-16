<?php
$GLOBALS['flag'] = "5.5";
include('common/header.php');
include('common/sidebar.php');
?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title"> Received Applications
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="dashboard.php">Home / मुख पृष्ठ</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Received Applications</a>
                </li>
            </ul>
            <div class="page-toolbar">
                <div id="" class="pull-right tooltips btn btn-fit-height grey-salt">
                    <i class=""></i>
                    <span>
                        <?php echo date('Y/m/d H:i:s'); ?>
                    </span>
                    <!-- <span class="thin uppercase visible-lg-inline-block"></span> -->
                    <!-- <i class="fa fa-angle-down"></i> -->
                </div>
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS -->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <form class="horizontal-form" id="frm-example" method="post">
                    <div class="portlet box grey-cascade">
                        <div class="portlet-title">
                            <!-- <div class="caption"><i class="fa fa-list-alt"></i>Received Applications
							</div> -->
                            <div class="caption col-md-6 col-xs-6">
                                Received Applications
                            </div>
                            <div class="caption col-md-6 text-right backbtn">
                                <!-- <button class=" btn btn-danger print btnhide" onclick="history.go(-1);">Back</button> -->
                                <!-- <input type="submit" class="btn btn-warning pull-right " id='gn' name="subtn" value="Forward"> -->
                                <input type="submit" value="Forward selected " class="btn btn-warning pull-right ">
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table id="example" class="table table-striped table-bordered table-hover display">
                                <thead>
                                    <tr>
                                        <th>
                                            <input name="select_all" value="1" id="example-select-all" type="checkbox" />
                                        </th>
                                        <th>Sr No</th>
                                        <th>Employee Name</th>
                                        <th>PF No</th>
                                        <th>Purpose</th>
                                        <th>Received Date/Time</th>
                                        <th>BillUnit</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $counter = 0;
                                    $cnt = 0;
                                    $conn = dbcon3();
                                    // $qry = mysqli_query("SELECT * FROM `add_application`");
                                    $qry = mysqli_query($conn, "SELECT add_application.*,forward_appl.* FROM `add_application`,forward_appl WHERE add_application.application_id = forward_appl.appli_id AND forward_appl.forward_status = 1 AND forward_appl.admin_status = 0 AND forward_appl.forwarded_to = '" . $_SESSION['user'] . "'");

                                    // $row_emp_name = mysqli_fetch_array($name);
                                    $count_row = mysqli_num_rows($qry);
                                    // if ($count_row > 0) { } else {
                                    // 	echo "
                                    // 	<script>document.getElementById('gn').style.display='none';</script>";
                                    // }
                                    $cnt = 0;
                                    while ($row = mysqli_fetch_array($qry)) {
                                        // print_r($row);
                                        extract($row);
                                        $counter += 1;
                                        echo <<<abc
										<tr>
											<td>$application_id</td>
											<td>$counter</td>
abc;
                                        $conn = dbcon2();
                                        $name = mysqli_query($conn, "SELECT name FROM register_user WHERE emp_no = '" . $row['pfno'] . "'");
                                        $row_emp_name = mysqli_fetch_array($name);
                                        $name = $row_emp_name['name'];
                                        $pfno = $row['pfno'];
                                        $purpose = $row['purpose'];
                                        $created_date = $row['created_date'];
                                        $billunit = $row['billunit'];
                                        $application_id = $row['application_id'];
                                        echo <<<xyz
											<td>$name</td>
											<td>$pfno</td>
											<td>$purpose</td>
											<td>$created_date</td>
											<td>$billunit</td>
						
									</tr>
xyz;
                                        $cnt++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END DASHBOARD STATS -->
        <div class="clearfix"></div>
    </div>
</div>
<?php include('common/footer.php');
?>
<div id="forward_modal" class="modal fade modal-scroll" tabindex="-1" data-replace="true">
    <div class="modal-header btn-orange-moon">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Forward Application
            <span id="name1" name="name1"></span>
        </h4>
    </div>
    <input type="hidden" id='application_id' value='' name="application_id">
    <div class="modal-body">
        <div class="row">
            <!-- <div class="col-md-6"> -->
            <!-- <div class="form-group"><label class="control-label">कर्मचारी आईडी / PFNO</label><div class="input-group"><span class="input-group-addon"><i class="fa fa-user-circle"></i></span><input type="text" class="form-control" id="pf_no_cp" name="pf_no_cp" readonly></div></div> -->
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label">Select the recipient to forward the Application</label>
                    <select class="form-control select2 fetchuser" style="width: 100%;" tabindex="-1" id="user" name="user" autofocus="true" required>
                        <option value="" selected="" disabled="">Select Billunit Clerk</option>
                        <?php
                       $conn= dbcon3();
                        $query_select = mysqli_query($conn,"SELECT * FROM add_user WHERE user_role = '1'");
                        while ($row = mysqli_fetch_array($query_select)) {
                            $conn= dbcon2();
                            $query_name = mysqli_query($conn,"SELECT name FROM register_user WHERE emp_no = '" . $row['user_pfno'] . "'");
                            $row_name = mysqli_fetch_array($query_name);

                            echo "
						<option value='" . $row['user_pfno'] . "'>" . $row['office_description'] . "-" . $row_name['name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <table id="example1" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Station/Depot</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="odd gradeX">
                            <td id="empname"></td>
                            <td id="design"></td>
                            <td id="station"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- </div> -->
            <!-- <div class="col-md-6"><div class="form-group"><label class="control-label">New Generated Password</label><div class="input-group"><span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span><input type="text" class="form-control" id="new_password" name="new_password"></div></div></div> -->
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn blue forward">Forward</button>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#example').DataTable({
            'ajax': '',
            'columnDefs': [{
                'targets': 0,
                'searchable': false,
                'orderable': false,
                'className': 'dt-body-center',
                'render': function(data, type, full, meta) {
                    return '<input type="checkbox" name="id[]" value="' +
                        $('<div/>').text(data).html() + '">';
                }
            }],
            'order': [1, 'asc']
        });

        // Handle click on "Select all" control
        $('#example-select-all').on('click', function() {
            // Check/uncheck all checkboxes in the table
            var rows = table.rows({
                'search': 'applied'
            }).nodes();
            $('input[type="checkbox"]', rows).prop('checked', this.checked);
        });

        // Handle click on checkbox to set state of "Select all" control
        $('#example tbody').on('change', 'input[type="checkbox"]', function() {
            // If checkbox is not checked
            if (!this.checked) {
                var el = $('#example-select-all').get(0);
                // If "Select all" control is checked and has 'indeterminate' property
                if (el && el.checked && ('indeterminate' in el)) {
                    // Set visual state of "Select all" control 
                    // as 'indeterminate'
                    el.indeterminate = true;
                }
            }
        });

        $('#frm-example').on('submit', function(e) {
            var form = this;

            var res = [];
            // Iterate over all checkboxes in the table
            $("#example input[type='checkbox']").each(function() {

                if (this.checked) {
                    console.log(this.value);
                    res.push(this.value);
                }
            });
            // table.$('input[type="checkbox"]').each(function(){
            //    // If checkbox doesn't exist in DOM
            //    if(!$.contains(document, this)){
            //       // If checkbox is checked
            //       if(this.checked){
            //          // Create a hidden element 
            //          console.log(this.value);
            //          $(form).append(
            //             $('<input>')
            //                .attr('type', 'hidden')
            //                .attr('name', this.name)
            //                .val(this.value)
            //          );
            //          res.push(this.value);
            //       }
            //    } 
            // });

            // console.log(res);
            if (res.includes('1')) {
                res.shift();
            }
            // console.log(res);
            $("#application_id").val(res);
            $("#forward_modal").modal("show");
            // FOR TESTING ONLY


            // Output form data to a console
            // $('#example-console').text($(form).serialize()); 
            // console.log("Form submission", $(form).serialize()); 

            // Prevent actual form submission
            e.preventDefault();
        });
        /*$('#frm-example').on('submit', function(e) {

             // e.preventDefault();
             var form = this;

             var rows_selected = table.column(0).checkboxes.selected();

             console.log(rows_selected);

             $.each(rows_selected, function(index, rowId) {
                 // Create a hidden element 
                 $(form).append(
                     $('<input>')
                     .attr('type', 'hidden')
                     .attr('name', 'selected_list[]')
                     .val(rowId)
                 );
             });
             console.log(rows_selected);

         });*/
    });
    $(document).on('click', '.deleteapplication', function() {
        var id = $(this).val();
        // alert(id);
        var result = confirm("Confirm!!! Proceed for Application delete?");
        if (result == true) {
            $.ajax({
                    url: 'control/adminProcess.php',
                    type: 'POST',
                    data: {
                        action: 'deleteapplication',
                        id: id
                    },
                })
                .done(function(html) {
                    alert(html);
                    window.location = "view_application.php";
                });
        }
    });
    $(document).on("click", ".forward", function() {
        var user = $('#user').val();
        var app_id = $('#application_id').val();
        // alert(user);
        $.ajax({
                url: 'control/adminProcess.php',
                type: 'POST',
                data: {
                    action: 'forward_clerk',
                    user: user,
                    app_id: app_id
                },
            })
            .done(function(html) {
                alert(html);
                window.location = "approved_application_admin.php";
            });

    });
    $(document).on("change", ".fetchuser", function() {
        var id = $('#user').val();
        //alert(id);
        $.ajax({
                url: 'control/adminProcess.php',
                type: 'POST',
                data: {
                    action: 'fetchEmployee2',
                    id: id
                },
            })
            .done(function(html) {
                //alert(html);
                var data = JSON.parse(html);
                // alert(data);
                $("#empname").html(data.empname);
                $("#design").html(data.desigcode);
                $("#station").html(data.station);
            });
    });
</script>