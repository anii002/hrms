<?php
session_start();
if (!isset($_SESSION['SESS_MEMBER_NAME'])) {
  echo "<script>window.location='http://localhost/E-APAR/index.php';</script>";
}
include_once('../global/header.php');
include_once('../global/topbaruser.php');
include_once('../global/sidebaruser.php');

?>
<style>
  .primary {
    box-shadow: none;
    border-color: rgba(60, 141, 188, 0.53);
  }
</style>
<!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Notification's
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-bullhorn"></i> &nbsp;&nbsp;Notification Details...</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form action="Ajaxhelpdesk.php" method="POST" action="" enctype="multipart/form-data" role="form" id="frmhelpdesk">
                <div class="table-responsive" style="overflow-x: scroll;">
                  <table class="table no-margin" id="example">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>TICKET ID</th>
                        <th>Super Admin Response</th>
                        <th>Status</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php
                      $sqlquery = mysqli_query($conn,"select * from tbl_helpdesk where status=1 AND createdby='" . $_SESSION['SESS_USER_NAME'] . "'");
                      while ($rwReg = mysqli_fetch_array($sqlquery)) {
                        $id = $rwReg["HLP_id"];
                        //echo "$id";
                      ?>
                        <tr>
                          <td><?php echo date('d-m-Y', strtotime($rwReg["date"])); ?></td>
                          <td><?php echo $rwReg["Ticketid"]; ?></td>
                          <td><?php echo $rwReg["approvedcontent"]; ?></td>
                          <td><?php echo "<span class='btn btn-success btn-flat'><i class='fa fa-check'></i> Approved</span>" ?></td>
                        </tr>
                      <?php

                      }
                      ?>
                    </tbody>

                  </table>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>

<?php
include_once('../global/footer.php');
?>