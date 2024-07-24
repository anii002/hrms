<?php

session_start();

if (!isset($_SESSION['SESS_MEMBER_NAME'])) {

  echo "<script>window.location='http://localhost/E-APAR/index.php';</script>";
}

include_once('../global/header.php');

include_once('../global/topbar.php');

//include_once('../global/sidebaradmin.php');

//include('connect.php');

?>



<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

  <!-- Content Header (Page header) -->

  <section class="content-header">

    <h1>

      Penalty Awarded



    </h1>

    <div class="box box-info">

      <div class="box-header with-border">

        <h3 class="box-title">Add Penalty Awarded</h3>

      </div>

      <!-- /.box-header -->

      <!-- form start -->

      <form class="form-horizontal" method="POST" action="process.php?action=add_penalty_awarded">

        <div class="box-body">

          <div class="form-group">

            <label for="inputEmail3" class="col-md-2 col-sm-2 col-xs-12 control-label">Penalty Awarded</label>



            <div class="col-md-6 col-sm-10 col-xs-12">

              <input type="text" class="form-control" placeholder="Enter Penalty Awarded " name="penalty_awarded" id="penalty_awarded">

              <br>

              <button type="submit" class="btn btn-primary">ADD</button>

              <button type="submit" class="btn btn-warning">Cancel</button>

            </div>

          </div>





        </div>

        <!-- /.box-body -->

        <div class="box-footer">





        </div>

        <!-- /.box-footer -->

      </form>

    </div>

  </section>



  <!-- Main content -->

  <section class="content">

    <div class="row">

      <div class="col-xs-12">

        <div class="box">

          <div class="box-header">

            <h3 class="box-title">Penalty Awarded LIST</h3>

          </div>

          <!-- /.box-header -->

          <div class="box-body">

            <table id="example1" class="table table-bordered table-striped">

              <thead>

                <tr>

                  <th>Sr No</th>

                  <th>Penalty Awarded</th>

                  <th>Action</th>

                </tr>

              </thead>

              <tbody>

                <?php
                global $conn;
                $sql = mysqli_query($conn, "select * from penalty_awarded");

                while ($result = mysqli_fetch_array($sql)) {

                  echo "<tr>";

                  echo "<td>" . $result['id'] . "</td>";

                  echo "<td>" . $result['penalty_awarded'] . "</td>";

                  echo "<td>

              <button type='button' value='" . $result['id'] . "' data-target='#update' data-toggle='modal' class='btn btn-primary update_btn'>Update</button>

                      <button value='" . $result['id'] . "' data-toggle='modal' data-target='#delete' class='btn btn-danger deleteBtn' style='margin-left:8px;'>Delete</button>

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

    /* $('#example2').DataTable({

      'paging'      : true,

      'lengthChange': false,

      'searching'   : false,

      'ordering'    : true,

      'info'        : true,

      'autoWidth'   : false

    }) */

  })
</script>



<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

        <h4 class="modal-title" id=""><strong>Update Penalty Awarded</strong></h4>

      </div>

      <div class="modal-body">

        <form class="form-horizontal" method="POST" action="process.php?action=update_penalty_awarded">

          <div class="box-body">

            <div class="form-group">

              <label for="inputEmail3" class="col-md-3 col-sm-3 col-xs-12 control-label">Penalty Awarded</label>



              <div class="col-md-8 col-sm-10 col-xs-12">

                <input type="hidden" class="form-control" id="hide_field" name="hide_field">

                <input type="text" class="form-control" placeholder="Enter Penalty Awarded" name="update_penalty" id="update_penalty" required maxlength="50">

                <!--input type="hidden" class="form-control"  placeholder="Enter Department Name" name="hide_field" id="hide_field" required maxlength="50"-->

              </div>

            </div>

            <!--div class="form-group">

                  <label for="inputPassword3" class="col-md-3 col-sm-3 col-xs-12 control-label">Short Name</label>



                  <div class="col-md-8 col-sm-10 col-xs-12">

                    <input type="text" class="form-control"  placeholder="Enter Short name" name="update_short" id="update_short" required maxlength="50">

                  </div>

                </div-->



          </div>

          <div class="modal-footer">

            <button type="submit" class="btn btn-success">Submit</button>

            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

          </div>

        </form>

      </div>

    </div>



  </div>

</div>





<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

        <h4 class="modal-title" id=""><strong>Delete Penalty Awarded</strong></h4>

      </div>

      <div class="modal-body">

        <form class="form-horizontal" method="POST" action="process.php?action=delete_penalty">



          <div class="form-group">

            Do you really want to delete the specified record?

            <div class="col-sm-10">

              <input type="hidden" class="form-control" id="delete_id" name="delete_id">

            </div>

          </div>

      </div>

      <div class="modal-footer">

        <button type="submit" class="btn btn-success">Submit</button>

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>

      </form>

    </div>

  </div>

</div>





<?php

include_once('../global/footer.php');

include_once('../global/Modal_Member.php');

?>

<script>
  $(function() {

    $('#example1').DataTable()

  });

  $(document).on("click", ".update_btn", function() {

    var values = $(this).val();

    //alert(values);

    $.ajax({

        url: 'process.php',

        type: 'POST',

        data: {
          action: 'fetchpenalty_awarded',
          id: values
        }

      })

      .done(function(html) {

        //alert(html);

        var data = JSON.parse(html);

        $("#update_penalty").val(data.penalty_awarded);

        // $("#update_short").val(data.longdesc);

        $("#hide_field").val(values);

      });

  });



  $(document).on("click", ".deleteBtn", function() {

    debugger;

    var id = $(this).val();

    $("#delete_id").val(id);

  });
</script>