<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

	require_once("../../global/header.php");
	require_once("../../global/topbar.php");
	require_once("../../global/sidebar.php");
?>
<style>
@media print{
   .content{
    background: #fff !important;
   }
   .content-wrapper{
    background: #fff !important;
   }
 }
</style>
  <div class="content-wrapper">
    <section class="content-header" style="background-color:#95e9a7; padding-left:20px;padding-bottom:10px;">
      <span class="col-sm-12">
        <span class="text-left" style="font-family: 'Raleway', sans-serif; font-weight: 600;">
        निर्वाचित यात्रा भत्ता / Returned Claimed TA
        </span>
        <span style="float: right">
        <button class=" btn btn-danger" onclick="history.go(-1);">Back</button>
      </span>
    </span>
    <div class="clearfix"></div>
    </section>
    <section class="content">

    <style type="text/css" media="screen">

        .box.box-info {
    border-top-color: white;
  }
        .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td{
          border : 2px solid black;
        }
        .table-bordered {
            border: 1px solid #1f1e1e;
        }
	
	#info1 {
    display : none;
  page-break-after:always;
      } 
  #info2 {
    display : none;
    }   
  #info3 {
    display : none;
      }
      #info4 {
    display : none;
      }

@media print {
    #info1 {
       display : block;
    }#info1 {
       display : block;
    }
  #info2 {
       display : block;
    }
  #info3 {
       display : block;
    }
  #info4 {
       display : block;
    }
    .box{
      background-color: white;
      border:none;
    }
}
    </style>

<?php

if(isset($_REQUEST['id']))
{
  $empl_query = mysql_query("select * from taentryform_master where reference='".$_REQUEST['id']."'");
  $empl_id_result = mysql_fetch_array($empl_query);
  $empl_id = $empl_id_result['empid'];

  $emp_query = mysql_query("select * from employees where pfno='".$empl_id."'");
  $emp_result = mysql_fetch_array($emp_query);
  $years=["January","February","March","April","May","June","July","August","September","October","November","December"];
  $expl = explode(",",$empl_id_result['TAMonth']);
        

	?>		<div class=""  id="info1">
				<div class="row text-center">
				<label class="" style="font-size:14px"><b>यात्रा भत्ता जर्नल/TRAVELLING ALLOWANCE JOURNAL</b></label>
        <div style="position:absolute;left:845px;top:5px;font-size:12px;" class="cls_005"><span class="cls_005">जी.ए.31 एस  आर  सी /जी 1677</span></div>
        <div style="position:absolute;left:855px;top:20px;font-size:10px;" class="cls_005"><span class="cls_005">जी.69   एफ / जी 69 एफ / ए </span></div>
        <div style="position:absolute;left:835px;top:25px;font-size:8px;" class="cls_005"><span class="cls_005">____________________________________</span></div>
        <div style="position:absolute;left:860px;top:32px;font-size:12px;" class="cls_005"><span class="cls_005">GA 31 SRC/G 1677</span></div>
        <div style="position:absolute;left:875px;top:45px;font-size:10px;" class="cls_005"><span class="cls_005">G 69 F/G 69 F/A </span></div>
				</div>
				<div class="row">
				<label align="left" style="font-size:13px;margin-left:20px;">मध्य रेल/CENTRAL RAILWAY</label>
				</div>
				<div class="row text-center">
				<label class="" style="font-size:13px;font-weight:100;">नियम जिससे शामिल हे /Rules by Which governed &nbsp;<span style="border-bottom:1px solid black"><b></b></span></label>
				</div>
				<div class="row">
				<label class="" style="font-size:13px;font-weight:100;margin-left:20px;">शाखा/Branch &nbsp;<span style="border-bottom:1px solid black;"><b><?php echo $emp_result['dept']; ?></b></span>&nbsp;&nbsp;&nbsp;&nbsp;मंडल/जिला/Divison/Dist.&nbsp;&nbsp;<span style="border-bottom:1px solid black"><b>SR. DRM's OFFICE</b></span>&nbsp;&nbsp;&nbsp;मुख्यालय /Headquarters at&nbsp;<span style="border-bottom:1px solid black"><b>SUR</b></span>&nbsp;&nbsp; द्वारा किये गये कार्यो का जर्नल, जिनके बारे मैं &nbsp;<span style="border-bottom:1px solid black"><b><?php foreach($expl as $val)
         {
            echo $years[$val-1].", ";
         }
         echo " - ".$empl_id_result['TAYear']; ?></b></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; के लिये भत्ता मांगा गया हें |</label>
				
				<label class="" style="font-size:13px;font-weight:100;margin-left:20px;">Journal of duties performed by &nbsp;<span style="border-bottom:1px solid black"><b><?php echo $emp_result['name']; ?></b></span>&nbsp;&nbsp;&nbsp;&nbsp;for which allowance for&nbsp;&nbsp;<span style="border-bottom:1px solid black"><b><?php foreach($expl as $val)
         {
            echo $years[$val-1].", ";
         }
         echo " - ".$empl_id_result['TAYear']; ?></b></span> &nbsp;&nbsp; 20 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  is claimed.</label><label style="font-size:13px;font-weight:100;margin-left:20px;">पदनाम /Designation&nbsp;&nbsp;&nbsp;<span style="border-bottom:1px solid black"><b><?php echo $emp_result['desig']; ?></b></span>&nbsp;&nbsp;&nbsp;वेतन/Pay  &nbsp;&nbsp;&nbsp;<span style="border-bottom:1px solid black"><b><?php echo $emp_result['bp']; ?></b></span>&nbsp;</label>
				</div>
			<div class="row">
			
			
			</div>


				
			</div>
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
                  <th class='hide_print'>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
				  $query_select = "select forward_status from taentryform_master where reference='".$_REQUEST['id']."'";
          $result_select = mysql_query($query_select);
          $value_select = mysql_fetch_array($result_select);
		  
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
								
                                echo "<td rowspan='$rows' class='hide_print'><a href='update_claim.php?claim=".$val['reference']."-".$val_first['set_number']."' class='btn btn-primary hide_print' style='margin-right:5px;'>Update</a><a href='control/adminProcess.php?action=deleteclaim&claim=".$val['reference']."-".$val_first['set_number']."' class='btn btn-warning hide_print'>Delete</a></td>";
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
                      <td class='hide_print'></td>
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
                      <td class='hide_print'></td>
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

			<?php } ?>

      <div id="info2">
            <div class="row" style="border-top:1px solid black;page-break-before:always;">
            <div style="padding-left:35px;padding-right:30px;margin-top:20px;">
            <p style="text-align:justify;font-size:9px;"> मैं  प्रमाणित करता हूँ कि उपर्युक्त _______________________ उस अवधि  के दौरान, जिसके लिये इस बिल मैं भत्ता माँगा गया है रेलवे के कार्य से ड्यूटी पर मुख्यलय स्टेशन से बाहर गया था। इस अधिकारी ने रेलमार्ग /समुद्रमार्ग /सड़क-वाहन /वायुमार्ग की और इसे मुफ्त पास या सरकारी स्थानीय निधि या भारत सरकार के खर्च पर यात्रा करने की सुविधा दी गयी/नहीं दी गयी थी। <br>
मैं प्रमाणित करता हूं कि ड्यूटी पास की गयी यात्रा तथा विराम के बारे मैं जिसके लिए इस बिल मैं यात्रा भत्ता/दैनिक  भत्ता मांगा गया हैं,किसी भी स्त्रोत से कोई यात्रा भत्ता या अन्य पारिश्रमिक नहीं लिया गया हैं।   </p>
              <p style="text-align:justify;font-size:9px;margin-top:-11px;">
                I hereby certify that the above mentioned _______________________ was absent on duty from his headquater's station during the period charged for in this bill on railway business and that the officer performed the journey by Rail/Sea/Road/Air and was allowed free pass or locomotion at the expenses of Government local fund or Govt. of India.<br>
                I certify that no TA/DA or any other remuneration has been drawn from any other source in respect of the journey performed on duty pass and also for the halts for which TA/DA has been claimed in this bill. 
                
              </p>
            </div>
            </div>
          </div>
          <div id="info3">
            <div class="row" style="margin-top:15px;">
              <div style="padding-right:30px;padding-left:30px;">
                <div class="pull-left">___________________________________</div>
                <div class="pull-left"style="margin-top:25px;font-size:10px;margin-left:-180px;">प्रति हस्ताक्षरित/Countersigned</div>
              </div>
              <div style="padding-right:30px;padding-left:30px;margin-left:350px;">
                <div class="pull-left">___________________________________</div>
                <div class="pull-left"style="margin-top:25px;font-size:10px;margin-left:-180px;">कार्यालय प्रमुख /Head Of Office</div>
              </div>
              <div style="padding-right:30px;padding-left:30px;margin-left:800px;margin-top:-5px;">
                <div class="pull-right" style="margin-left:180px;">___________________________________</div>
                <div class=""style="margin-top:5px;font-size:10px;">भत्ता मांगने वाले अधिकारी का हस्ताक्षर <br>Signature of officer/Claiming T.A</div>
              </div>        
            </div>
          </div>
          <div id="info4" >
            <div class="row" style="margin-top:15px;">
              <div style="padding-left:35px;padding-right:30px;">
                <div style="font-size:10px;">टिप्पणी :- किसी एक रेलवे से दूसरी रेलवे पर स्तानंन्तरण  होने पर यात्रा भत्ता बिल पर यह प्रमाणित किया जाना चाहिये कि मुफ्त पास या सरकारी खर्च पर यात्रा करने की सुविधा दी गयी या नहीं। </div>
                <div style="font-size:10px;">Note :- On transfer from one Railway to another,certificate whether or not a free pass or not a free pass or Locomotion at Government expenses was allowed or not should be recorded on T.A Bills. </div>
                
              </div>
            </div>
          </div>
      <div class="row">
        <input type="button" value="Print" class="hide_print btn btn-success pull-right" style="margin-right:45px; width: 150px;" onclick="print_button();">
        
        <a href="add_more_TA.php?id=<?php echo $_REQUEST['id']; ?>" style="margin-right:45px; width: 150px;" class='btn btn-info pull-right hide_print'>Add More</a></td>
        <input type="button" value="Forward" class="hide_print btn btn-primary pull-right" data-toggle="modal" data-target="#forward" style="margin-right:45px; width: 150px;" >
        <?php
          echo "<a href='tracking_TA.php?id=".$_REQUEST['id']."' class='btn btn-primary pull-right hide_print' style='margin-right:10px;'>Track</a>";
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
      <form action='control/adminProcess.php?action=forward_returned_ta' method="post">
      <div class="modal-body" style="padding:20px;">
        <div class="form-group">
          <input type="hidden" name="empid" value="<?php echo $_SESSION['empid']; ?>">
          <input type="hidden" name="ref" value="<?php echo $_REQUEST['id']; ?>">
        <div class="col-xs-offset-1 col-xs-2"><label for="">User</label></div>
        <div class="col-xs-7">
            <select name="forwardName" class="form-control select2" style="width: 100%">
              <option value="none" hidden="hidden" readonly selected="selected">Select User</option>
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
      $("#info").hide();
	  
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
 </script>
