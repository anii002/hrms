<?php

// session_start();

// if (!isset($_SESSION['SESS_MEMBER_NAME'])) {

//   echo "<script>window.location='http://localhost/E-APAR/index.php';</script>";
// }

include_once('../global/header.php');

include_once('../global/topbar.php');

//include_once('../global/sidebaradmin.php');

?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

  <!-- Content Header (Page header) -->

  <section class="content-header">



    <div class="box box-info">

      <div class="box-header with-border">

        <h3 class="box-title">Add Department</h3>

      </div>

      <!-- /.box-header -->

      <!-- form start -->

      <form class="form-horizontal" method="POST" action="process.php?action=add_dept">

        <div class="box-body">

          <div class="form-group">

            <label for="inputEmail3" class="col-md-2 col-sm-2 col-xs-12 control-label">Department Name</label>

            <div class="col-md-6 col-sm-10 col-xs-12">

              <input type="text" class="form-control" placeholder="Enter Department Name" name="name" id="desc" required maxlength="50">

            </div>

          </div>

          <div class="form-group">

            <label for="inputPassword3" class="col-md-2 col-sm-2 col-xs-12 control-label">Short Name</label>



            <div class="col-md-6 col-sm-10 col-xs-12">

              <input type="text" class="form-control" placeholder="Enter Short name" name="short" id="short" required maxlength="50">

            </div>

          </div>

          <div class="form-group">

            <label for="inputPassword3" class="col-md-2 col-sm-2 col-xs-12 control-label"></label>

            <div class="col-md-6 col-sm-10 col-xs-12">

              <button type="submit" class="btn btn-primary">ADD</button>

              <button type="reset" class="btn btn-warning">Cancel</button>

            </div>

          </div>



        </div>

      </form>

    </div>

  </section>



  <!-- Main content -->

  <section class="content">

    <div class="row">

      <div class="col-xs-12">

        <div class="box">

          <div class="box-header">

            <h3 class="box-title">Department LIST</h3>

          </div>

          <!-- /.box-header -->

          <div class="box-body">

            <table id="example1" class="table table-bordered table-striped">

              <thead>

                <tr>

                  <th>Sr No</th>

                  <th>Department Name</th>

                  <th>Short Name</th>

                  <th>Action</th>

                </tr>

              </thead>

              <tbody>

                <?php

                $sql = mysqli_query($conn, "select * from  department");

                while ($result = mysqli_fetch_array($sql)) {

                  echo "<tr>";

                  echo "<td>" . $result['id'] . "</td>";

                  echo "<td>" . $result['DEPTDESC'] . "</td>";

                  echo "<td>" . $result['ARPAN_DEPT'] . "</td>";

                  echo "<td>

							<a href='#' class='btn btn-info'><i class='fa fa-pencil' aria-hidden='true'></i></a>

							<a href='#' class='btn btn-danger'><i class='fa fa-trash' aria-hidden='true'></i></a>

						</td>";

                  echo "</tr>";
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

  <!-- /.content -->

</div>

<script>
  $(function() {

    $('#example1').DataTable()

  });
</script>

<?php

include_once('../global/footer.php');

?>