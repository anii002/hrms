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

                  <form class="form-horizontal" action="control/adminProcess.php?action=AddUser" method="post" enctype="multipart/form-data">

                    <div class="form-group col-md-6">
                      <label for="empid" class="col-sm-3 control-label">कर्मचारी आईडी <br>/ PFNO</label>

                      <div class="col-sm-9">
                         <select name="empid" id="empid" class="form-control select2">
                          <option selected="" hidden="" readonly>Select Employee</option>
                          <?php
                            $query_emp = "select * from employees where pfno not in (select empid from users)";
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
                      <label for="empname" class="col-sm-3 control-label">नाम <br>/ Name</label>

                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="empname" name="empname" placeholder="Employee Name" readonly="">
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="mobile" class="col-sm-3 control-label">मोबाइल <br>/ Mobile</label>

                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile number" readonly="">
                      </div>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="email" class="col-sm-3 control-label">ई -मेल <br>/ E-Mail</label>

                      <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Employee Email id" readonly="">
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="design" class="col-sm-3 control-label">पदनाम <br>/ Designation</label>

                      <div class="col-sm-9">
                        <input type="text" id="design" name="design" class="form-control" readonly="">
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for=paylevel" class="col-sm-3 control-label">पे लेवल <br>/ Pay Level</label>

                      <div class="col-sm-9">
                        <input type="text" id="paylevel" name="paylevel" class="form-control" readonly="">
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for=username" class="col-sm-3 control-label">प्रयोगकर्ता  नाम <br>/ Username</label>

                      <div class="col-sm-9">
                        <input type="text" id="username" name="username" class="form-control" placeholder="Set Username">
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="psw" class="col-sm-3 control-label">पासवर्ड <br>/ Password</label>

                      <div class="col-sm-9">
                        <input type="text" id="psw" name="psw" class="form-control" placeholder="Set Password" >
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="role" class="col-sm-3 control-label">रोल <br>/ Role</label>

                      <div class="col-sm-9">
                         <select name="role" id="role" class="form-control select2">
                          <option selected="" hidden="" readonly>Select Role</option>
                          <?php
                            $query_emp = "select * from userlevel";
                            $result_emp = mysql_query($query_emp);
                            while($value_emp = mysql_fetch_array($result_emp))
                            {
                              echo "<option value='".$value_emp['id']."'>".$value_emp['level_name']."</option>";
                            }
                          ?>
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
							<th>कर्मचारी  आईडी <br>Empid</th>
							<th>नाम<br>Name</th>
							<th>मोबाइल<br>Mobile</th>
							<th> ई -मेल<br>e-mail</th>
							<th>पैन नंबर<br>Pan Number</th>
							<th>कार्रवाई / Action</th>


						</tr>
						</thead>
						<tbody>
						<?php
							$query_emp = "select employees.*, users.status as user_status, users.username  from employees INNER JOIN users on employees.pfno = users.empid";
							$result_emp = mysql_query($query_emp);
							while($value_emp = mysql_fetch_array($result_emp))
							{
								echo "
									<tr>
										<td>".$value_emp['pfno']."</td>
										<td>".$value_emp['name']."</td>
										<td>".$value_emp['mobile']."</td>
                    <td>".$value_emp['username']."</td>
                    <td>".$value_emp['panno']."</td>
										<td><button value='".$value_emp['pfno']."' class='btn btn-primary changerole'>Change Role</button>";
                    if($value_emp['user_status']=='0')
                    {
                      echo "<button value='".$value_emp['pfno']."' class='btn btn-warning active' style='margin-left:10px;'>Active</button></td>";
                    }
                    else
                    {
                      echo "<button value='".$value_emp['pfno']."' class='btn btn-danger deactive' style='margin-left:10px;'>Deactive</button></td>";
                    }
									echo "</tr>
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
    $(document).on("change","#empid",function(){
      var value = $(this).val();
      $.ajax({
        url: 'control/adminProcess.php',
        type: 'POST',
        data: {action: 'fetchEmployee1', id : value},
      })
      .done(function(html) {
        var data = JSON.parse(html);
        $("#empid").val(data.empid);
        $("#empname").val(data.empname);
        $("#mobile").val(data.mobile);
        $("#design").val(data.designation);
        $("#email").val(data.email);
        $("#paylevel").val(data.level);
        var val = Math.floor(1000 + Math.random() * 9000);
        $("#psw").val(val);
        $("#username").val("USER_"+data.empid);
      });
      
    });
    $(document).on("click",".active",function(){
        var id = $(this).val();
        var result = confirm("Confirm!!! proceed for user activation?");
        if(result == true)
        {
            $.ajax({
            url: 'control/adminProcess.php',
            type: 'POST',
            data: {action: 'activeUser', id : id},
          })
          .done(function(html) {
            alert(html);
            window.location="user_register.php";
          });
        }
    });
    $(document).on("click",".deactive",function(){
        var id = $(this).val();
        var result = confirm("Confirm!!! proceed for user deactivation?");
        if(result == true)
        {
            $.ajax({
            url: 'control/adminProcess.php',
            type: 'POST',
            data: {action: 'deactiveUser', id : id},
          })
          .done(function(html) {
            alert(html);
            window.location="user_register.php";
          });
        }
    });
</script>
