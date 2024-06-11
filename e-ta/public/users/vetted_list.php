<?php
  require_once("../../global/user_header.php");
  require_once("../../global/user_topbar.php");
  require_once("../../global/user_sidebar.php");
?>
  <div class="content-wrapper">
    <section class="content-header" style="background-color:#95e9a7; padding-left:20px;padding-bottom:10px;">
      <span class="col-sm-12">
        <span class="text-left" style="font-family: 'Raleway', sans-serif; font-weight: 600;">
        Vetted Summary Report
        </span>
        <span style="float: right">
        <button class=" btn btn-danger" onclick="history.go(-1);">Back</button>
      </span>
    </span>
    <div class="clearfix"></div>
    </section>
    <section class="content">

<?php

if(isset($_SESSION['empid']))
{

  ?>
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Approved Summary Report</h3>
          </div>
          <div class="box-body">
            <div class="col-xs-12 table-responsive">
            <table id="example1" class="table table-bordered table-hover">
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
                $cnt=1;
                  $query = "SELECT * from tbl_summary where id in (select summary_id from tbl_summary_details where reference in (select reference_id from forward_data where fowarded_to='".$_SESSION['empid']."' AND hold_status='0') AND forward_status = '1' AND approved_status = '1')";
                  
                  $result = mysql_query($query);
                  while($val = mysql_fetch_array($result))
                  {
                    if($val['title']!=null)
                    {
                    echo "
                    <tr>
                      <td>$cnt</td>
                      <td>".$val['title']."</td>
                      <td>".$val['description']."</td>
                      <td><a href='approved_summary_details.php?id=".$val['id']."' class='btn btn-primary'>Show</a>";
                    echo "</tr>
                    ";
                    $cnt++;
                    }
                  }
                 ?>



              </tbody>
            </table>
          </div>
          </div>
          <!-- /.box-body -->
        </div>

      <?php } ?>
      
      <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Rejected / Pending Summary Report</h3>
          </div>
          <div class="box-body">
            <div class="col-xs-12 table-responsive">
            <table id="example2" class="table table-bordered table-hover">
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
                $cnt=1;
                  $query = "SELECT * from tbl_summary where id in (select summary_id from tbl_summary_details where reference in (select ref from tbl_rejected) AND est_approved='0')";
                  
                  $result = mysql_query($query);
                  while($val = mysql_fetch_array($result))
                  {
                    if($val['title']!=null)
                    {
                    echo "
                    <tr>
                      <td>$cnt</td>
                      <td>".$val['title']."</td>
                      <td>".$val['description']."</td>
                      <td><a href='rejected_summary_report.php?id=".$val['id']."' class='btn btn-primary'>Show</a>";
                    echo "</tr>
                    ";
                    $cnt++;
                    }
                  }
                 ?>



              </tbody>
            </table>
          </div>
          </div>
        </div>
    </section>
  </div>
  
  <!--Content code end here--->
 <?php
  require_once("../../global/footer.php");
 ?>
