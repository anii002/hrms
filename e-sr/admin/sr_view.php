<?php
session_start();
// if(!isset($_SESSION['SESS_MEMBER_NAME']))
// {
// echo "<script>window.location='http://localhost/E_APR_FINAL/index.php';</script>";
// }
$GLOBALS['a'] = 'sr_view';
include_once('../global/header.php');
include_once('../global/topbar.php');
include_once('../global/sidebaradmin.php');


$conn = dbcon1();

?>

<div class="content-wrapper" style="margin-top: -20px;">
  <section class="content">
    <div class="row">
      <div class="box box-info">
        <div class="box box-warning box-solid">


          <div class="box-body">
            <div class="tab-content">

              <!--Bio Tab Start -->
              <div class="tab-pane active in" id="bio">

                <section class="content">
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">Employee List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>Sr No</th>
                                <th>PF No.</th>
                                <th>SR No.</th>
                                <th>Employee Name</th>
                                <th>Mobile No.</th>
                                <th>View</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $sql = mysqli_query($conn,"select * from  biodata_temp");
                              $cnt = 1;
                              while ($result = mysqli_fetch_array($sql)) {

                                echo "<tr>";
                                echo "<td>$cnt</td>";
                                echo "<td>" . $result['pf_number'] . "</td>";
                                echo "<td>" . $result['sr_no'] . "</td>";
                                echo "<td>" . $result['emp_name'] . "</td>";
                                echo "<td>" . $result['mobile_number'] . "</td>";
                                echo "<td>
							<a href='display_sr_tab.php?pf=" . $result['pf_number'] . "' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'></i></a>
						</td>";
                                echo "</tr>";
                                $cnt++;
                              }
                              ?>
                            </tbody>
                            <tfoot>

                            </tfoot>
                          </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </section>
              </div>
              <!--Bio Tab End -->



              <script>
                $(function() {
                  $('#example1').DataTable()
                  $('#example2').DataTable()
                })
              </script>
            </div>

          </div>


        </div>
      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<?php
include_once('../global/footer.php');

?>