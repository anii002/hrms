<?php
	require_once("../../global/admin_header.php");
	require_once("../../global/admin_topbar.php");
	require_once("../../global/admin_sidebar.php");
?>
  <div class="content-wrapper">
		<section class="content-header" style="background-color:#5be439; padding-left:20px;padding-bottom:10px;">
		<span style="font-size:20px;font-weight:bold;" class="col-sm-8">
        कर्मचारी प्रवेश फॉर्म / Employee Entry Form
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

                  <form class="form-horizontal" action="control/adminProcess.php?action=AddEmployee" method="post" enctype="multipart/form-data">

                    <div class="form-group col-md-6">
                      <label for="empid" class="col-sm-3 col-md-5 control-label">कर्मचारी आईडी / Empid</label>

                      <div class="col-sm-9 col-md-7">
                        <input type="text" class="form-control" id="empid" name="empid" placeholder="कर्मचारी आईडी / PFNO">
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="pannumber" class="col-sm-3 col-md-5 control-label">पैन नंबर / PAN Number</label>

                      <div class="col-sm-9 col-md-7">
                        <input type="text" class="form-control" id="pannumber" name="pannumber" placeholder="पैन नंबर / PAN Number">
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="empname" class="col-sm-3 col-md-5 control-label">नाम / Name</label>

                      <div class="col-sm-9 col-md-7">
                        <input type="text" class="form-control" id="empname" name="empname" placeholder="नाम / Name">
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="billunit" class="col-sm-3 col-md-5 control-label">बिल यूनिट  / Bill Unit</label>

                      <div class="col-sm-9 col-md-7">
                        <input type="text" class="form-control" id="billunit" name="billunit" placeholder="बिल यूनिट  / Bill Unit">
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="mobile" class="col-sm-3 col-md-5 control-label">मोबाइल / Mobile</label>

                      <div class="col-sm-9 col-md-7">
                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="मोबाइल / Mobile">
                      </div>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="email" class="col-sm-3 col-md-5 control-label">ग्रेड पे/ Grade pay</label>

                      <div class="col-sm-9 col-md-7">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Grade Pay">
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="design" class="col-sm-3 col-md-5 control-label">पदनाम / Designation</label>

                      <div class="col-sm-9 col-md-7">
                        <select name="design" id="design" class="form-control select2">
                          <option selected="" hidden="" readonly>Select Designation</option>
                          <?php
                            $query_design = "select * from designation";
                            $result_design = mysql_query($query_design);
                            while($value_design = mysql_fetch_array($result_design))
                            {
                              echo "<option value='".$value_design['designation']."'>".$value_design['designation']."</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for=paylevel" class="col-sm-3 col-md-5 control-label">पे लेवल / Pay Level</label>

                      <div class="col-sm-9 col-md-7">
                        <select name="paylevel" id="paylevel" class="form-control select2">
                          <option selected="" hidden="" readonly>Select Pay Level</option>
                          <?php
                            $query_level = "select * from paylevel";
                            $result_level = mysql_query($query_level);
                            while($value_level = mysql_fetch_array($result_level))
                            {
                              echo "<option value='".$value_level['num']."'>".$value_level['pay_text']."</option>";
                            }
                          ?>
                        </select>
                        <input type="hidden" id="update_id" name="update_id"/>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-11">
                        <button type="submit" class="btn btn-success pull-right submit_btn" name='button' style="width:150px; margin-right: -30px;" value='submit'>प्रस्तुत करे / Submit</button>
                        <button type="submit" class="btn btn-success pull-right update_btn" name='button' value='update' style="width:150px; margin-right: -30px; display:none;"> अद्यतन  / Update</button>
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
					<h3 class="box-title">पंजीकृत कर्मचारी / Registered Employees</h3>
				</div>
				<div class="box-body">
					<div class="col-xs-12 table-responsive">
					<table id="example1" class="table table-bordered table-hover">
						<thead>
						<tr>
							<th>कर्मचारी  आईडी <br>Empid</th>
							<th>नाम<br>Name</th>
							<th>मोबाइल<br>Mobile</th>
							<th> ग्रेड पे <br>Grade pay</th>
							<th> पे बँड <br>Pay Band</th>
							<th>  <br>Basic Pay</th>
							<th> लेवल<br>Level</th>
							<th>कार्रवाई / Action</th>
						</tr>
						</thead>
						<tbody>
						<?php
							$query_emp = "select * from employees";
							$result_emp = mysql_query($query_emp);
							while($value_emp = mysql_fetch_array($result_emp))
							{
								echo "
									<tr>
										<td>".$value_emp['pfno']."</td>
										<td>".$value_emp['name']."</td>
										<td>".$value_emp['mobile']."</td>
										<td>".$value_emp['gp']."</td>
										<td>".$value_emp['grade']."</td>
										<td>".$value_emp['bp']."</td>
										<td>".$value_emp['level']."</td>
										<td><button value='".$value_emp['id']."' class='btn btn-primary update'>Update</button><button value='".$value_emp['id']."' class='btn btn-danger delete' style='margin-left:10px;'>Delete</button></td>
									</tr>
								";
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
 <?php
	require_once("../../global/admin_footer.php");
 ?>

 <script>
    $(document).on("click",".update",function(){
      var value = $(this).val();
      //alert(value);
      $("#update_id").val(value);
      $.ajax({
        url: 'control/adminProcess.php',
        type: 'POST',
        data: {action: 'fetchEmployee', id : value},
      })
      .done(function(html) {
        var data = JSON.parse(html);
        $("#empid").val(data.empid);
        $("#empname").val(data.empname);
        $("#mobile").val(data.mobile);
        $("#design").html(data.designation);
        $("#pannumber").val(data.panno);
        $("#billunit").val(data.billunit);
        $("#email").val(data.email);
        $("#paylevel").html(data.level);
        $(".submit_btn").hide();
        $(".update_btn").show();
      });
      
    });
    $(document).on("click",".delete",function(){
        var id = $(this).val();
        var result = confirm("Confirm Delete?");
        if(result == true)
        {
            $.ajax({
            url: 'control/adminProcess.php',
            type: 'POST',
            data: {action: 'deleteEmployee', id : id},
          })
          .done(function(html) {
            alert(html);
            window.location="employee_registration.php";
          });
        }
        else
        {

        }
    });
</script>
