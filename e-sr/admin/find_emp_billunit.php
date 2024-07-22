<?php
// $_GLOBALS['a'] = 'print';
// session_start();
// if (!isset($_SESSION['SESS_MEMBER_NAME'])) {
// 	echo "<script>window.location='http://localhost/SR/index.php';</script>";
// }
$GLOBALS['a'] = 'find_billunit';
include_once('../global/header.php');
include_once('../global/topbar.php');
include_once('mini_function.php');
//include_once('../global/sidebaradmin.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <div class="box box-info text-center">
            <div class="box-header with-border">
                <h3 class="box-title">FIND EMPLOYEES CURRENT BILLUNIT </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 col-sm-2 col-xs-12 control-label">Enter PF
                            Number</label>

                        <div class="col-md-6 col-sm-10 col-xs-12">
                            <input type="text" class="form-control" placeholder="Enter PF Number" name="pf_no"
                                id="pf_no" required maxlength="50">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-md-2 col-sm-2 col-xs-12 control-label"></label>
                        <div class="col-md-6 col-sm-10 col-xs-12">

                            <button type="submit" id="search" name="search" class="btn btn-primary">Search</button>
                            <button type="reset" class="btn btn-warning">Cancel</button>
                            <?php
							$conn1 = dbcon1();
							if (isset($_POST['search'])) {
								$pf = $_POST['pf_no'];
								$sql = mysqli_query($conn1, "select preapp_pf_number,preapp_department,preapp_billunit,preapp_depot from present_work_temp where preapp_pf_number='$pf'");


								$res = mysqli_fetch_array($sql);
								// echo "select preapp_pf_number,preapp_billunit,preapp_depot from present_work_temp where preapp_pf_number='$pf'".mysqli_error();
								// echo $res['preapp_pf_number'];
								$result = mysqli_num_rows($sql);
								if ($result <= 0) {
									echo "<script>alert('This SR Number is not registered');</script>";
								} else { ?>
                        </div>
                    </div> <br>
                    <?php
									echo "<div class='row' style='padding:20px;'>
									<table width='90%' border='2' class='table' style='text-align:left;font-size:17px'>
										<tr>
											<td width='20%'>Employee PF Number</td>
											<td width='20%'><b>" . $res['preapp_pf_number'] . "</td>
											<td width='20%'>Employee Name</td>
											<td><b>" . get_emp_name($res['preapp_pf_number']) . "</td>
										</tr>
										<tr>
										<td>Department</td>
										<td><b>" . get_department($res['preapp_department']) . "</td>
										<td>Employee Current Billunit</td>
										<td colspan='' ><b>" . bill_depot1($res['preapp_billunit']) . "
										</td>
										</tr>
								
									 </table>									 
									 </div>";
								}
							}

			?>


                </div>
            </form>
        </div>
    </section>
</div>
<?php
include_once('../global/footer.php');
?>