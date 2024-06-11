<?php
$GLOBALS['flag']="3.4";
include('common/header.php');
include('common/sidebar.php');
include('control/function.php');
date_default_timezone_set("Asia/kolkata");
?>


<div class="page-content-wrapper">
    <div class="page-content">
        
        <div class="page-bar">
            <ul class="page-breadcrumb">
            	<li>
            		<i class="fa fa-home"></i>
            		<a href="index.php">Home / मुख पृष्ठ</a>
            		<i class="fa fa-angle-right"></i>
            	</li>
            	<li>
            		<a href="#">दावा किए गए यात्रा भत्ता विवरण / Claimed TA Details </a>
            	</li>
            </ul>
            
        </div>
      <!-- <h1>ecefce</h1> -->
      <div class="portlet box blue">
        <div class="portlet-title">
          <div class="caption col-md-6">
            <b>दावा किए गए यात्रा भत्ता विवरण / Claimed TA Detalis</b>
          </div>
          <div class="caption col-md-6 text-right backbtn">
            <button class="btn btn-danger" onclick="history.go(-1);">Back</button>
          </div>
        </div>
        <div class="portlet-body form">
            
  <form method="POST">                    
    <div class="form-body add-train">
      <div class="row add-train-title">
        <div class="col-md-12">
          <div class="form-group">
            <input type="hidden" value="<?php echo $_GET['ref_no']; ?>" name="reference_no" id="reference_no">
            <!-- <label class="control-label"><h4 class="">Statement Showing the summery of TA & Contingency Bills For the Month of September-2018 </h4></label> -->
            <div class="portlet-body">
                <div class="table-scrollable summary-table">
                <table id="example11" class="table table-hover table-bordered display">
                  <thead>
                    <tr class="warning">

                      <th>Reference</th>
                      <th>Date</th>
                      <th><center>Journey<br>Type</center></th>
                      <th>Train no.</th>
                      <th><center>Depart<br>Station</center></th> 
                      <th><center>Depart<br>Time</center></th> 
                      <th><center>Arrival<br>Station</center></th> 
                      <th><center>Arrival<br>Time</center></th> 
                      <th>Rate</th>
                      <th>Claim</th>
                      <th>Objective</th>
                      <th class="hidden-print">Action</th>              
                    </tr>                   
                  </thead>
                  <tbody align="center">
                    <?php

                  function get_employee($id)
                  {
                    $query = mysql_query("select name from employees where pfno='$id'");
                    $result = mysql_fetch_array($query);
                    return $result['name'];
                  }
                    $query_first = "select DISTINCT(set_number) from taentrydetails where reference_no='".$_REQUEST['ref_no']."'";
                    $result_first = mysql_query($query_first);
                    while($val_first = mysql_fetch_array($result_first))
                    {
                        $query = "SELECT * FROM taentry_master INNER JOIN taentrydetails ON taentry_master.reference_no = taentrydetails.reference_no WHERE taentry_master.reference_no='".$_REQUEST['ref_no']."' AND taentrydetails.set_number='".$val_first['set_number']."'";
                        $result = mysql_query($query);
                        $rows = mysql_num_rows($result);
                        $cnt = 1;
                        while($val = mysql_fetch_array($result))
                        {
                          $jtype=$val['journey_type'];
                          if($jtype=='Bus'){
                            $jtype="Road";
                          }
                        echo "
                          <tr>";
                          if($cnt == 1)
                            {
                                echo "<td rowspan='$rows'>".$val['reference_no']."<br>Name :- ".get_employee($val['empid'])."</td>";
                            }
                             $date=date_create($val['taDate']);
                            echo "<td>".date_format($date,"d/m/Y")."</td>
                            <td>".$jtype."</td>
                            <td>".$val['train_no']."</td>
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
                                echo "<td rowspan='$rows'>".$val['objective']."</td>";
                                $cnt++;
                                $anotherquery = mysql_query("select count(id) as total from continjency_master where reference='".$val['reference_no']."' and set_number='".$val_first['set_number']."'");
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
                       
                      }
                   ?>
                   <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><b>TOTAL</b></td>
                      <?php 
                        $query_first = "select SUM(amount) AS sum from taentrydetails where reference_no='".$_REQUEST['ref_no']."'";
                      $result_first = mysql_query($query_first);
                      $values = mysql_fetch_array($result_first);
                      echo "<td><b>".$values['sum']."</b></td>";
                      ?>
                      <td></td>
                      <!-- <td></td> -->
                      <td class="hidden-print"></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4"></div>
            <div class="col-md-4 summary-total">
            <h4>Summary</h4>
            <div class="table-scrollable">
              <?php 
               $query3="SELECT cardpass,month,year,`30p_cnt`,`30p_amt`,`70p_cnt`,`70p_amt`,`100p_cnt`,`100p_amt` FROM `tasummarydetails`,taentry_master WHERE  tasummarydetails.reference_no=taentry_master.reference_no AND tasummarydetails.empid='".$_GET['empid']."' AND tasummarydetails.`reference_no`='".$_GET['ref_no']."'";
                $sql3=mysql_query($query3);
                $row3=mysql_fetch_array($sql3);
                $total_amount=$row3['100p_amt'] + $row3['70p_amt'] + $row3['30p_amt'];
              ?>
                <table class="table table-bordered table-hover">
                <thead class="page-bar">
                <tr>
                  <th>Percent</th>
                  <th>Count</th>
                  <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>100%</td>
                  <td><?php echo $row3['100p_cnt']; ?></td>
                  <td><?php echo $row3['100p_amt']; ?></td>
                </tr>
                <tr>
                  <td>70%</td>
                  <td><?php echo $row3['70p_cnt']; ?></td>
                  <td><?php echo $row3['70p_amt']; ?></td>
                </tr>
                <tr>
                  <td>30%</td>
                  <td><?php echo $row3['30p_cnt']; ?></td>
                  <td><?php echo $row3['30p_amt']; ?></td>
                </tr>
                <tr>
                  <td></td>
                  <td><b>Total</b></td>
                  <td><b><?php echo $total_amount; ?></b></td>
                </tr>
                </tbody>
                </table>
              </div>
            </div>
            <div class="col-md-12 trackprint-btn">
              <ul>
                <input type="hidden" value="<?php echo $row3['month']; ?>" name="ta_manth" id="ta_manth">
                <input type="hidden" value="<?php echo $row3['cardpass']; ?>" name="cardpass" id="cardpass">
                <input type="hidden" value="<?php echo $row3['year']; ?>" name="year" id="year">
                <?php 
                // $sql=mysql_query("SELECT admin_approve  from forward_data where forward_data.fowarded_to='".$_SESSION['empid']."'");
                // $res=mysql_fetch_array($sql);
                // if($res['admin_approve'] != 1)
                // {
                //   echo '<button class="btn green"  class="hide_print btn btn-primary pull-right" data-toggle="modal" data-target="#forward" >Forword</button>';
                // }

                ?>

               <!-- <li></li> -->
                
              </ul>
            </div>

              <div class="col-md-4"></div>
          </div>
          </div>
          
        </div>
      </div>
  </div>
</form>       

        </div>
      </div>
    </div>
  </div>




  <div id="forward" class="modal fade modal-scroll modalemployeedata" tabindex="-1" data-replace="true">
    <div class="modal-header btn-orange-moon">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title">Forwarding TA : <span id="name1" name="name1"></span> </h4>
    </div>
    <form   action='control/adminProcess.php?action=forwardToDA' method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
      <input type="text" name="empid" value="<?php echo $_SESSION['empid']; ?>">
          <input type="text" name="original_id" value="<?php echo $_REQUEST['empid']; ?>">
          <input type="text" name="ref" value="<?php echo $_REQUEST['ref_no']; ?>">
      <div class="modal-body">
        <div class="portlet-body table-responsive">
          <div class="col-xs-offset-1 col-xs-2"><label for="">User</label></div>
          <div class="col-xs-7">
            <select name="forwardName" id="forwardName" class="form-control select2 required" style="width: 100%" required>
              <option readonly value=''>Select User</option>
               <?php 
              $query_emp =mysql_query("SELECT department.deptno as id  FROM `employees` ,department WHERE department.deptno=employees.dept AND pfno='".$_SESSION['empid']."' ");
              $resu1=mysql_fetch_array($query_emp);
               $dptid=$resu1['id'];

              $sql_user=mysql_query("SELECT * from users where dept='".$dptid."' AND role='11' ");
               //echo $did="SELECT * from users where dept='".$dptid."' AND role='13'";
              while($resu=mysql_fetch_assoc($sql_user)){             
              $query = "SELECT * FROM employees where pfno='".$resu['empid']."'";
              $did.="SELECT * FROM employees where pfno='".$resu['empid']."'";
                
                $result = mysql_query($query);
                while($value = mysql_fetch_assoc($result))
                {
                  // $did.=$value['pfno'];
                  echo "<option value='".$value['pfno']."'>".$value['name']."  (".$value['desig'].")</option>";
                }
              }
             ?>
            </select>
            <input type="hidden" value="<?php echo $did; ?>" name="">
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn blue">Forward TA</button>
      </div>
    </form>
  </div>



<?php
  include 'common/footer.php';
?>


<!-- File export script -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
    
     function print_button()
   {
      $(".main-footer").hide();
      $(".box-header").hide();
      $(".hide_print").hide();
      $("#info").hide();
      $(".btnhide").hide(); 
      window.print();
      $(".main-footer").show();
      $(".box-header").show();
      $(".hide_print").show();
     $("#info").show();
     $("#info2").show();
     $("#info3").show();
   $("#info4").show();
   window.location.reload();
   }


} );
</script>

