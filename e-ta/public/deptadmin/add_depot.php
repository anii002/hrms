<?php
	require_once("../../global/dept_admin_header.php");
	require_once("../../global/dept_admin_topbar.php");
	require_once("../../global/dept_admin_sidebar.php");
  //require_once("../minifunction.php");
function getdepartment($id)
{
  $query = "select * from department where dept_id='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['deptname'];
}




 function fetch_station($code)
{
  $query = "select stationcode,stationdesc from station where stationcode='$code'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['stationdesc'];
}


?>
  <div class="content-wrapper">
        <section class="content-header" style="background-color:#95e9a7; padding-left:20px;padding-bottom:10px;">
      <span class="col-sm-12">
        <span class="text-left" style="font-family: 'Raleway', sans-serif; font-weight: 600;">
        डिपो मास्टर जोड़ें /Add Depot Master
        </span>
        
        <span style="float: right">
        <button class=" btn btn-danger" onclick="history.go(-1);">Back</button>
      </span>
      
    </span>
    <div class="clearfix"></div>
    </section>
		<!-- <section class="content-header" style="background-color:#5be439; padding-left:20px;padding-bottom:10px;">
      <h1>
      प्रयोगकर्ता पंजीकरण / Add User
      </h1>
    </section> -->
		<section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary" style="padding-top:15px;padding-bottom:10px;padding-right:20px;padding-left:20px;">
                <div class="tab-pane" id="settings">

                  <form class="form-horizontal" action="control/adminProcess.php?action=AddDepotmaster" method="post" enctype="multipart/form-data" autocomplete="off">                       
                    <input type="hidden" name="deptid" id="deptid" value="<?php echo $_SESSION['dept']; ?>" />

                    <div class="form-group col-md-6">
                      <label for="role" class="col-sm-3 control-label">स्टेशन <br>/ Station</label>

                      <div class="col-sm-9">
                         <!-- <select name="stationcode" id="stationcode" class="form-control select2 select2-hidden-accessible"  style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                        
                          <option value="" selected disabled>Select Station</option>
                          <?php
                            // $query_emp = "select stationcode,stationdesc from station";
                            // $result_emp = mysql_query($query_emp);
                            // while($value_emp = mysql_fetch_assoc($result_emp))
                            // {
                            //   echo "<option value='".$value_emp['stationcode']."'>".$value_emp['stationdesc']."</option>";
                            // }
                          ?>
                          </select> -->

                        <input type='text' list='dstation' required class='form-control $cnt departClass' style='text-transform:uppercase' name='stationcode' id='departS$cnt' placeholder='Station'>
                        <datalist id='dstation'>
                          <?php
                              $sql = "SELECT stationcode,stationdesc FROM station";
                              $query = mysql_query($sql);
                              echo mysql_error();
                              while($row = mysql_fetch_array($query)){
                                echo "<option value='".$row['stationcode']."'>".$row['stationdesc']."</option>";
                              }
                          ?>
                        </datalist>
                    
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="empname" class="col-sm-3 control-label">डिपो <br>/ Depot</label>

                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="depotname" name="depotname" placeholder="Depot Name" >
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-11">
                        <button type="submit" class="btn btn-block btn-success submit_btn" name='button' style="width:150px; float:right" value='submit'>प्रस्तुत करे / Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
          </div>
        </div>

            <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">डिपो नाम / Depot List</h3>
        </div>
        <div class="box-body">
          <div class="col-xs-12 table-responsive">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>अनु क्रमांक<br>ID</th>
              <th>स्टेशन कोड<br>Station code</th>
              <th>डिपो नाम<br>Depot Name</th>
              <th>विभाग<br>Department Name</th>
              <th>कार्रवाई / Action</th>


            </tr>
            </thead>
            <tbody>
            <?php
              // include_once('control/adminProcess.php');
                  $query_emp = "select * from depot_master where dept_id='".$_SESSION['dept']."'";
                  $result_emp = mysql_query($query_emp);
                  $sr=1;
                  while($value_emp = mysql_fetch_array($result_emp))
                  {
                      echo "<tr>";
                      echo "<td>".$sr++."</td>";                    
                      echo "<td>".fetch_station($value_emp['stationcode'])."</td>";
                      // echo "<td>".$stdesc."</td>";
                      echo "<td>".$value_emp['depot']."</td>";
                      echo "<td>".getdepartment($value_emp['dept_id'])."</td>";
                      // echo "<td><button value='".$value_emp['id']."' class='btn btn-primary changerole'>Change Role</button>";
                      if($value_emp['status']=='0')
                      {
                        echo "<td><button value='".$value_emp['id']."' class='btn btn-warning active' style='margin-left:10px;'>Active</button></td>";
                      }
                      else
                      {
                        echo "<td><button value='".$value_emp['id']."' class='btn btn-danger deactive' style='margin-left:10px;'>Deactive</button></td>";
                      }
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
  <!--Content code end here--->
 <?php
 
	require_once("../../global/dept_admin_footer.php");
 ?>

 <script>
    $(document).on("click",".active",function(){
        var id = $(this).val();
        var result = confirm("Confirm!!! proceed for depot activation?");
        if(result == true)
        {
            $.ajax({
            url: 'control/adminProcess.php',
            type: 'POST',
            data: {action: 'activeDepot', id : id},
          })
          .done(function(html) {
            alert(html);
            window.location="add_depot.php";
          });
        }
    });
    $(document).on("click",".deactive",function(){
        var id = $(this).val();
        var result = confirm("Confirm!!! proceed for depot deactivation?");
        if(result == true)
        {
            $.ajax({
            url: 'control/adminProcess.php',
            type: 'POST',
            data: {action: 'deactiveDepot', id : id},
          })
          .done(function(html) {
            alert(html);
            window.location="add_depot.php";
          });
        }
    });
</script>
