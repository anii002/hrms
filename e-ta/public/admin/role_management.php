<?php
	require_once("../../global/admin_header.php");
	require_once("../../global/admin_topbar.php");
	require_once("../../global/admin_sidebar.php");
?>
  <div class="content-wrapper">
		<section class="content-header" style="background-color:#5be439; padding-left:20px;padding-bottom:10px;">
      <h1>
        Role <small style="color:gray;">Management</small>
      </h1>
    </section>
		<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary" style="padding-top:15px;padding-bottom:10px;padding-right:20px;padding-left:80px;">
                <div class="tab-pane" id="settings">

                  <form class="form-horizontal" action="control/adminProcess.php?action=ADDROLE" method="post" enctype="multipart/form-data">

                    <div class="form-group col-md-6">
                      <label for="role" class="col-sm-1 control-label">Role</label>

                       <div class="col-sm-6">
                        <input type="text" class="form-control" id="role" name="role" placeholder="Enter Role" >
                      </div><br>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-md-4 ">
                      <label for="add_record" class="col-sm-4">ADD</label>

                      <div class="col-sm-8">
                        <input type="checkbox" class="flat-red" id="add_record" name="add_record">
                      </div>
                    </div>
                    <div class="form-group col-md-4 ">
                      <label for="update_record" class="col-sm-4">UPDATE</label>

                      <div class="col-sm-8">
                        <input type="checkbox" class="flat-red" id="update_record" name="update_record">
                      </div>
                    </div>
                    <div class="form-group col-md-4 ">
                      <label for="delete_record" class="col-sm-4">DELETE</label>

                      <div class="col-sm-8">
                        <input type="checkbox" class="flat-red" id="delete_record" name="delete_record">
                      </div>
                    </div>
                    <div class="form-group col-md-4 ">
                      <label for="approve" class="col-sm-4">APPROVE</label>

                      <div class="col-sm-8">
                        <input type="checkbox" class="flat-red" id="approve" name="approve">
                      </div>
                    </div>
                    <div class="form-group col-md-4 ">
                      <label for="return_ta" class="col-sm-4">RETURN</label>

                      <div class="col-sm-8">
                        <input type="checkbox" class="flat-red" id="return_ta" name="return_ta">
                      </div>
                    </div>
                    <div class="form-group col-md-4 ">
                      <label for="forward" class="col-sm-4">FORWARD</label>

                      <div class="col-sm-8">
                        <input type="checkbox" class="flat-red" id="forward" name="forward">
                      </div>
                    </div>
                    <div class="form-group col-md-4 ">
                      <label for="print_form" class="col-sm-4">PRINT</label>

                      <div class="col-sm-8">
                        <input type="checkbox" class="flat-red" id="print_form" name="print_form">
                      </div>
                    </div>
                    <div class="form-group col-md-4 ">
                      <label for="summary" class="col-sm-4">SUMMARY</label>

                      <div class="col-sm-8">
                        <input type="checkbox" class="flat-red" id="summary" name="summary">
                      </div>
                    </div>
                    <div class="form-group col-md-4 ">
                      <label for="report" class="col-sm-4">REPORT</label>

                      <div class="col-sm-8">
                        <input type="checkbox" class="flat-red" id="report" name="report">
                      </div>
                    </div>
                    <div class="form-group col-md-4 ">
                      <label for="view" class="col-sm-4">VIEW</label>

                      <div class="col-sm-8">
                        <input type="checkbox" class="flat-red" id="view" name="view">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-11">
                        <button type="button" class="btn btn-success pull-left submit_btn" name='button' style="width:150px; margin-right: -30px;" value='submit'>Submit</button>
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
          <h3 class="box-title">Register Users</h3>
        </div>
        <div class="box-body">
          <div class="col-xs-12 table-responsive">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>empid</th>
              <th>Name</th>
              <th>Mobile</th>
              <th>email</th>
              <th>Pan Number</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
              $query_emp = "select employees.*, users.status as user_status  from employees INNER JOIN users on employees.pfno = users.empid";
              $result_emp = mysql_query($query_emp);
              while($value_emp = mysql_fetch_array($result_emp))
              {
                echo "
                  <tr>
                    <td>".$value_emp['pfno']."</td>
                    <td>".$value_emp['name']."</td>
                    <td>".$value_emp['mobile']."</td>
                    <td>".$value_emp['email']."</td>
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
</script>
