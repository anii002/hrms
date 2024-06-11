<?php 
    require_once("../../global/header.php");
	require_once("../../global/topbar.php");
	require_once("../../global/sidebar.php");
?>
  <div class="content-wrapper">
    <section class="content-header" style="background-color:#95e9a7; padding-left:20px;padding-bottom:10px;">
      <span class="col-sm-12">
        <span class="text-left" style="font-family: 'Raleway', sans-serif; font-weight: 600;">
        Claimed TA Details
        </span>
        <span style="float: right">
        <button class=" btn btn-danger" onclick="history.go(-1);">Back</button>
      </span>
    </span>
    <div class="clearfix"></div>
    </section>
    <section class="content">

    <style type="text/css" media="screen">
        .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td{
          border : 2px solid black;
        }
        .table-bordered {
            border: 1px solid #1f1e1e;
        }
    </style>

<?php

if(isset($_REQUEST['id']))
{

	?>
				<div class="" style="background-color: white;">
					<div class="box-header">
						<h3 class="box-title">Claimed TA Details</h3>
					</div>
					<div class="box-body">
						<div class="col-xs-12 table-responsive">
              <table id="" class="table table-bordered table-hover table-condensed">
  							<thead>
  							<tr>
                  <th>Cardpass / Token </th>
  								<th>Date</th>
  								<th>Train no.</th>
  								<th>Depart station</th>
  								<th>Depart time</th>
  								<th>Arrival station</th>
  								<th>Arrival time</th>
  								<th>Rate</th>
								<th>Claim %</th>
  								<th>Objective</th>
  							</tr>
  							</thead>
  							<tbody>
  								<?php
                    $query_first = "select DISTINCT(set_number) from taentryforms where reference_id='".$_REQUEST['id']."'";
                    $result_first = mysql_query($query_first);
                    while($val_first = mysql_fetch_array($result_first))
                    {
                        $query = "SELECT * FROM taentryform_master INNER JOIN taentryforms ON taentryform_master.reference = taentryforms.reference_id WHERE taentryform_master.reference='".$_REQUEST['id']."' AND taentryforms.set_number='".$val_first['set_number']."'";
      									$result = mysql_query($query);
                        $rows = mysql_num_rows($result);
                        $cnt = 1;
      									while($val = mysql_fetch_array($result))
      									{
      										echo "
      										<tr>";
                          if($cnt == 1)
                            {
                                echo "<td rowspan='$rows'>".$val['cardpass']."</td>";
                            }
                            $date = date_create($val['taDate']);
      											echo "<td>".date_format($date,"d/m/Y")."</td>
      											<td>".$val['train']."</td>
      											<td>".$val['departS']."</td>";
                            if($val['departT']!="00:00:00")
      											 echo "<td>". $val['departT']."</td>";
                            else
                              echo "<td></td>";
      											echo "<td>".$val['arrivalS']."</td>";
                            if($val['arrivalT']!="00:00:00")
                             echo "<td>". $val['arrivalT']."</td>";
                            else
                              echo "<td></td>";
      											echo "<td>".$val['amount']."</td>
      											<td>".$val['percent']."</td>";
                            if($cnt == 1)
                            {
                                echo "<td rowspan='$rows'>".$val['Objective']."</td>";
                                $cnt++;
                            }

      										echo "</tr>
      										";
      									}
                        echo "<tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      </tr>";
                      }
  								 ?>
                   <tr style="background-color: gray; color:white;">
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>TOTAL</td>
                      <?php 
                        $query_first = "select SUM(amount) AS sum from taentryforms where reference_id='".$_REQUEST['id']."'";
                      $result_first = mysql_query($query_first);
                      $values = mysql_fetch_array($result_first);
                      echo "<td>".$values['sum']."</td>";
                      ?>
                      <td></td>
                    </tr>
  							</tbody>
  						</table>
					</div>
					</div>

          <div class="box-body">
            <div class="col-xs-offset-3"><h4 style="font-weight: bold;">Summary</h4></div>
            <div class="col-xs-offset-3 table-responsive" style="margin-right: 25%">
              <table class="table table-bordered table-hover table-condensed">
                <thead>
                  <tr>
                    <th>Percent</th>
                    <th>Count</th>
                    <th></th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $query_sum = "SELECT percent, SUM(amount) AS sum, COUNT(reference_id) AS cnt FROM taentryforms where amount<>'' and reference_id='".$_REQUEST['id']."' GROUP BY percent";
                    $result_sum = mysql_query($query_sum);
                    while($result_show = mysql_fetch_array($result_sum))
                    {
                      echo "
                            <tr>
                          <td>".$result_show['percent']."</td>
                          <td>".$result_show['cnt']."</td>
                          <td>=</td>
                          <td>".$result_show['sum']."</td>
                        </tr>
                      ";
                    }
                  ?>
                  <tr>
                    <td></td>
                    <td></td>
                    <td><b>Total</b></td>
                    <td><?php echo $values['sum']; ?></td>
                  </tr>
                </tbody>
              </table>
          </div>
          </div>
					<!-- /.box-body -->
				</div>

			<?php } ?>
      <div class="row">
        <input type="button" value="Print" class="hide_print btn btn-success pull-right" style="margin-right:45px; width: 150px;" onclick="print_button();">
        <?php 
          $query_select = "select forward_status from taentryform_master where reference='".$_REQUEST['id']."'";
          $result_select = mysql_query($query_select);
          $value_select = mysql_fetch_array($result_select);
          //echo $value_select['forward_status'];
          if($value_select['forward_status']!='1')
          {
        ?>
        <a href="add_more_TA.php?id=<?php echo $_REQUEST['id']; ?>" style="margin-right:45px; width: 150px;" class='btn btn-info pull-right hide_print'>Add More</a></td>
        <input type="button" value="Forward" class="hide_print btn btn-primary pull-right" data-toggle="modal" data-target="#forward" style="margin-right:45px; width: 150px;" >
        <?php }
        else
        {
          echo "<a href='tracking_TA.php?id=".$_REQUEST['id']."' class='btn btn-primary pull-right' style='margin-right:10px;'>Track</a>";
        }
        ?>
      </div>
    </section>
  </div>
  <!-- Modal -->
<div id="forward" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="border-bottom-color: white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2>Forward Travelling Allowance Sheet</h2>
      </div>
      <form action='control/adminProcess.php?action=forward_TA' method="post">
      <div class="modal-body" style="padding:20px;">
        <div class="form-group">
          <input type="hidden" name="empid" value="<?php echo $_SESSION['empid']; ?>">
          <input type="hidden" name="ref" value="<?php echo $_REQUEST['id']; ?>">
        <div class="col-xs-offset-1 col-xs-2"><label for="">User</label></div>
        <div class="col-xs-7">
            <select name="forwardName" class="form-control select2" style="width: 100%" required="required">
              <option readonly>Select User</option>
              <?php 
                $query = "SELECT * FROM employees where pfno IN ( select empid from users where status='1' AND role='4')";
                $result = mysql_query($query);
                while($value = mysql_fetch_array($result))
                {
                  echo "<option value='".$value['pfno']."'>".$value['name']."  (".$value['desig'].")</option>";
                }
              ?>
            </select>
        </div>
      </div>
      </div>
      <div class="modal-footer" style="margin-top:40px;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Forward</button>
      </div>
    </form>
    </div>

  </div>
</div>
 <?php
	require_once("../../global/footer.php");
 ?>

 <script type="text/javascript">
   function print_button()
   {
      $(".main-footer").hide();
      $(".box-header").hide();
      $(".hide_print").hide();
      window.print();
      $(".main-footer").show();
      $(".box-header").show();
      $(".hide_print").show();
   }
 </script>r
