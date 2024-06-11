<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

  require_once("../../global/officer_header.php");
  require_once("../../global/officer_topbar.php");
  require_once("../../global/officer_sidebar.php");
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
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Claimed TA Details </h3>
          </div>
          <div class="box-body">
            <div class="col-xs-12 table-responsive">
              <table id="" class="table table-bordered table-hover table-condensed">
                <thead>
                <tr>
                  <th>Reference</th>
                  <th>Date</th>
                  <th>Train no.</th>
                  <th>Depart station</th>
                  <th>Depart time</th>
                  <th>Arrival station</th>
                  <th>Arrival time</th>
                  <th>Rate</th>
                  <th>Claim %</th>
                  <th>Objective</th>
                  <th class="hidden-print">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php

                  function get_employee($id)
                  {
                    $query = mysql_query("select name from employees where pfno='$id'");
                    $result = mysql_fetch_array($query);
                    return $result['name'];
                  }
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
                                echo "<td rowspan='$rows'>".$val['reference']."<br>Name :- ".get_employee($val['empid'])."</td>";
                            }
                             $date=date_create($val['taDate']);
                            echo "<td>".date_format($date,"d/m/Y")."</td>
                            <td>".$val['train']."</td>
                            <td>".$val['departS']."</td>";
                            if($val['departT']!="00:00:00")
                             echo "<td>". substr($val['departT'],0,-3)."</td>";
                            else
                              echo "<td></td>";
                            echo "<td>".$val['arrivalS']."</td>";
                            if($val['arrivalT']!="00:00:00")
                             echo "<td>". substr($val['arrivalT'],0,-3)."</td>";
                            else
                              echo "<td></td>";
                            echo "<td>".$val['amount']."</td>
                            <td>".$val['percent']."</td>";
                            if($cnt == 1)
                            {
                                echo "<td rowspan='$rows'>".$val['Objective']."</td>";
                                $cnt++;
                                $anotherquery = mysql_query("select count(id) as total from continjency_master where reference='".$val['reference']."' and set_number='".$val_first['set_number']."'");
                            echo "<td rowspan='$rows' class='hide_print'>";
                                $resultquery = mysql_fetch_array($anotherquery);
                                if($resultquery['total']>=1)
                                {
                                  echo '<button value="'.$val['reference'].'" cnt="'.$val_first['set_number'].'" class="classBtn btn btn-success" data-toggle="modal" data-target="#myModal"  style="margin-top:20px; margin-left:15px" id="view_cont">View Contijency</button>';
                                }
                                else
                                {
                                  echo "no contigency bill attached";
                                }

                            }
                            
                          echo "</td></tr>
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
                      <td class='hidden-print'></td>
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
                      <td>TOTAL</td>
                      <?php 
                        $query_first = "select SUM(amount) AS sum from taentryforms where reference_id='".$_REQUEST['id']."'";
                      $result_first = mysql_query($query_first);
                      $values = mysql_fetch_array($result_first);
                      echo "<td>".$values['sum']."</td>";
                      ?>
                      <td></td>
                      <td></td>
                      <td class="hidden-print"></td>
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
        echo "<a href='tracking_TA.php?id=".$_REQUEST['id']."' class='btn btn-primary pull-right' style='margin-right:10px;'>Track</a>";
          $query_select = "SELECT * FROM `forward_data` WHERE reference_id='".$_REQUEST['id']."' AND depart_time is null AND fowarded_to='".$_SESSION['empid']."'";
          $result_select = mysql_query($query_select);
          $value_empid = mysql_fetch_array($result_select);
          $value_select = mysql_num_rows($result_select);
		  $query_role = mysql_query("select role from users where username='".$_SESSION['admin_username']."'");
		  $result_role = mysql_fetch_array($query_role);
		  $role = $result_role['role'];
		  if($value_select>0 && $role == "BO")
		  {
			 ?>
			 <form action="control/adminProcess.php?action=admincancel" method="post">
		<input type="hidden" name="empid" value="<?php echo $_SESSION['empid']; ?>">
          <input type="hidden" name="original_id" value="<?php echo $value_empid['empid']; ?>">
          <input type="hidden" name="ref" value="<?php echo $_REQUEST['id']; ?>">
		<input type="submit" value="Return to Empl" class="hide_print btn btn-primary pull-right" style="margin-right:45px; width: 150px;" >
		</form>
			 <?php
		  }
          if($value_select>0 && $role == "BO")
          {
        ?>
        <input type="button" value="Moment Verified" class="hide_print btn btn-primary pull-right" data-toggle="modal" data-target="#forward" style="margin-right:45px; width: 150px;" >
        <?php }
		else
		{
			if($value_empid['admin_approve']!='1' && $value_select>0 && $role=="OS")
			{
		?>
		<form action="control/adminProcess.php?action=adminapprove" method="post">
		<input type="hidden" name="empid" value="<?php echo $_SESSION['empid']; ?>">
          <input type="hidden" name="original_id" value="<?php echo $value_empid['empid']; ?>">
          <input type="hidden" name="ref" value="<?php echo $_REQUEST['id']; ?>">
		<input type="submit" value="Approve" class="hide_print btn btn-primary pull-right" style="margin-right:45px; width: 150px;" >
		</form>
			<?php }} ?>
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
      <form action='control/adminProcess.php?action=approveAndForward' method="post">
      <div class="modal-body" style="padding:20px;">
        <div class="form-group">
          <input type="hidden" name="empid" value="<?php echo $_SESSION['empid']; ?>">
          <input type="hidden" name="original_id" value="<?php echo $value_empid['empid']; ?>">
          <input type="hidden" name="ref" value="<?php echo $_REQUEST['id']; ?>">
        <div class="col-xs-offset-1 col-xs-2"><label for="">User</label></div>
        <div class="col-xs-7">
            <select name="forwardName" class="form-control select2 required" required="required" style="width: 100%">
              <option readonly value=''>Select User</option>
              <?php 
                $query = "SELECT * FROM employees where pfno IN ( select empid from users where status='1' AND role='OS')";
                $result = mysql_query($query);
                while($value = mysql_fetch_array($result))
                {
                  echo "<option value='".$value['pfno']."' >".$value['name']."  (".$value['desig'].")</option>";
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


<!-- View Modal -->
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title" id="product_title">Contijency Details</h4>
                    </div>
                    <div class="modal-body">

                      <div class="container-fluid">
                    <div class="row" style=" margin-right:3px !important">
                      <div class="col-md-12">
                        <table class="table table-bordered table-condensed">
                          <thead>
                            <tr>
                                <th>Date</th>
                                <th>From</th>
                                <th>To</th>
                                <th>KMS</th>
                                <th>Per/Km rate</th>
                                <th>total amount</th>
                            </tr>
                          </thead>
                          <tbody id="tabledata">

                          </tbody>
                        </table>
                      </div>
                    </div><br>
                    
                    
                  </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
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

   
   $(".classBtn").on("click", function(){debugger;
    var ref = $(this).val();
    var set = $(this).attr('cnt');
    $("#hide_reference").val(ref);
    $("#hide_setNumber").val(set);

    $.ajax({
      type:"post",
      url:"control/adminProcess.php",
      data:"action=view_contingency&ref="+ref+"&set="+set,
      success:function(data){
      debugger;
        $("#tabledata").html(data);
      }
    });
  });
 </script>
