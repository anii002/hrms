<?php
	require_once("../../global/admin_header.php");
	require_once("../../global/admin_topbar.php");
	require_once("../../global/admin_sidebar.php");
?>
  <div class="content-wrapper">
		<section class="content-header" style="background-color:#5be439; padding-left:20px;padding-bottom:10px;">
	  <span style="font-size:20px;font-weight:bold;" class="col-sm-8">
       प्रयोगकर्ता पंजीकरण / User Registration Form
      </span>
	  <span class="text-right col-sm-4">
	  <button class="btn btn-danger" onclick="history.go(-1);">Back</button>
	  </span>
	  <div class="clearfix"></div>
    </section>
		<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary" style="padding-top:15px;padding-bottom:10px;padding-right:20px;padding-left:20px;">
                <div class="tab-pane" id="settings">

                  <form class="form-horizontal" action="control/adminProcess.php?action=applybillunit" method="post" enctype="multipart/form-data">

                    <div class="form-group col-md-6">
                      <label for="empid" class="col-sm-3 control-label">PFNO</label>

                      <div class="col-sm-8">
                         <select name="empid" id="empid" class="form-control select2">
                          <option selected="" hidden="" readonly>Select Employee</option>
                          <?php
                            $query_emp = "select * from employees where pfno in (select empid from users where role='5')";
                            $result_emp = mysql_query($query_emp);
                            while($value_emp = mysql_fetch_array($result_emp))
                            {
                              echo "<option value='".$value_emp['pfno']."'>".$value_emp['name']." (".$value_emp['pfno']."))</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div>

                     <div class="form-group col-md-6">
                      <label for="billunit" class="col-sm-3 control-label">BILL UNIT</label>

                      <div class="col-sm-9">
                         <select name="billunit[]" id="billunit" class="form-control select2" data-placeholder = "Select Bill Unit" multiple="multiple">
                            <?php 
                              $sql = "SELECT * FROM billunit WHERE au = '0107'";
                              $result = mysql_query($sql);
                              if($result){
                                while($row = mysql_fetch_array($result)){
                                    echo "<option value=".$row['billunit'].">".$row['billunit']."</option>";
                                }
                              }
                            ?>
                            <!--option value="61001">61001</option>
                            <option value="61002">61002</option-->
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-11">
                        <button type="submit" class="btn btn-success pull-right submit_btn" name='button' style="width:150px; margin-right: -30px;" value='submit'>प्रस्तुत करे / Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
          </div>
        <!-- ./col -->
      </div>

      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">रजिस्टर प्रयोगकर्ता / Register Users</h3>
        </div>
        <div class="box-body">
          <div class="col-xs-12 table-responsive">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Sr.</th>
              <th>Employee name</th>
              <th>Billunit</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
              $query_emp = "select sep_billunit.employee_id,sep_billunit.billunit,employees.name from employees inner join sep_billunit on sep_billunit.employee_id=employees.pfno";
              $result_emp = mysql_query($query_emp);
              $cnt = 1;
              while($value_emp = mysql_fetch_array($result_emp))
              {
                echo "
                  <tr>
                    <td>".$cnt++."</td>
                    <td>".$value_emp['name']."</td>
                    <td>".$value_emp['billunit']."</td>
                    <td><button value='".$value_emp['employee_id']."' data-toggle='modal' data-target='#update' class='btn btn-primary update'>Update</button>&nbsp;&nbsp;<button value='".$value_emp['employee_id']."' data-toggle='modal' data-target='#delete' class='btn btn-warning delete'>Delete</button></td>";
                  echo "</tr>";
              }
            ?> 
            
            
            </tbody>
          </table>
        </div>
        </div>
        <!-- /.box-body -->
      </div>

		</section>
  </div>
<div id="update" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="border-bottom-color: white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2>Update User for billunit</h2>
      </div>
      <form action='control/adminProcess.php?action=updatebillemp' method="post">
      <div class="modal-body" style="padding:20px;">
        <div class="form-group">
          <input type="hidden" name="updateemp" id="updateemp">
        <div class="col-xs-offset-1 col-xs-2"><label for="">Billunit</label></div>
        <div class="col-xs-7">
            <select name="updatebill[]" multiple="multiple" data-placeholder = "Select Bill Unit" class="form-control select2" style="width: 100%">
               <?php 
                  $sql = "SELECT * FROM billunit WHERE au = '0107'";
                  $result = mysql_query($sql);
                  echo mysql_error();
                  if($result){
                    while($row = mysql_fetch_array($result)){
                        echo "<option value=".$row['billunit'].">".$row['billunit']."</option>";
                    }
                  }
                ?>
            </select>
        </div>
      </div>
      </div>
      <div class="modal-footer" style="margin-top:40px;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
    </div>

  </div>
</div>




<div id="delete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="border-bottom-color: white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2>Delete employee from billunit</h2>
      </div>
      <form action='control/adminProcess.php?action=deletebillunitemp' method="post">
      <div class="modal-body" style="padding:20px;">
        <div class="form-group">
          <input type="hidden" name="deleteemp" id="deleteemp">
        <div class="col-xs-offset-1 col-xs-11"><label for="">Are you sure, you want to remove USER from billunit selection?</label></div>
      </div>
      </div>
      <div class="modal-footer" style="margin-top:40px;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Remove</button>
      </div>
    </form>
    </div>

  </div>
</div>
 <?php
	require_once("../../global/admin_footer.php");
 ?>

 <script>
    $(document).on("click",".update",function(){
      var value = $(this).val();
      $("#updateemp").val(value);
    });
    $(document).on("click",".delete",function(){
        var id = $(this).val();
        $("#deleteemp").val(id);
    });
</script>
