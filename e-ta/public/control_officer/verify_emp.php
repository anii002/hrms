<?php
	require_once("../../global/ctrl_incharge_header.php");
	require_once("../../global/ctrl_incharge_topbar.php");
	require_once("../../global/ctrl_incharge_sidebar.php");
?>
  <div class="content-wrapper">
     <section class="content-header" style="background-color:#95e9a7; padding-left:20px;padding-bottom:10px;">
      <span class="col-sm-12">
        <span class="text-left" style="font-family: 'Raleway', sans-serif; font-weight: 600;">
        उपयोगकर्ता को सत्यापित करें / Verify user
        </span>
        <span style="float: right">
        <button class=" btn btn-danger" onclick="history.go(-1);">Back</button>
      </span>
    </span>
    <div class="clearfix"></div>
    </section>
		<!-- <section class="content-header" style="background-color:#5be439; padding-left:20px;padding-bottom:10px;">
      <h1>
      प्रयोगकर्ता पंजीकरण / Add user
      </h1>
    </section> -->
		<section class="content">
     

            <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">रजिस्टर प्रयोगकर्ता / Register Users</h3>
        </div>
        <div class="box-body">
          <div class="col-xs-12 table-responsive">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr>
               <th>अनु क्रमांक<br>ID</th>
              <th>कर्मचारी  आईडी <br>Empid</th>
              <th>नाम<br>Name</th>
              <th>मोबाइल<br>Mobile</th>
              <!-- <th>उपयोगकर्ता नाम<br>User Name</th>
              <th>पैन नंबर<br>Pan Number</th> -->
              <th>कार्रवाई / Action</th>


            </tr>
            </thead>
            <tbody>
            <?php
              // $query_emp = ;
              $result_emp = mysql_query("SELECT `id`, `BU`, `pfno`, `panno`, `name`, `desig`, `station`, `mobile`, `email`, `catg`, `dept`, `depot_id`, `grade`, `bp`, `gp`, `bdate`, `apdate`, `level`, `adpass`, `psw`, `status`, `unit`, `first_login`, `img`, `added_by` FROM `employees` WHERE dept='".$_SESSION['dept']."' ORDER BY id desc");
              $sr=1;
              while($value_emp = mysql_fetch_array($result_emp))
              {
                echo "
                  <tr>
                  <td>".$sr++."</td>
                    <td>".$value_emp['pfno']."</td>
                    <td>".$value_emp['name']."</td>
                    <td>".$value_emp['mobile']."</td>
                    
                    <td>";
                    // <td><button value='".$value_emp['pfno']."' class='btn btn-primary changerole'>Change Role</button>";
                    if($value_emp['status']=='0')
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
  <!--Content code end here--->
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
        // alert(id);
        var result = confirm("Confirm!!! proceed for user activation?");
        if(result == true)
        {
            $.ajax({
            url: 'control/adminProcess.php',
            type: 'POST',
            data: {action: 'activeUser', id : id},
          })
          .done(function(html) {
            // alert(html);
            window.location="verify_emp.php";
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
            // alert(html);
            window.location="verify_emp.php";
          });
        }
    });
</script>
