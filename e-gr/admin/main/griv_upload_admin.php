<?php
require_once('Global_Data/header.php');
error_reporting(0);
?>

 <!-- PNotify -->
      <!-- page content -->
        <div class="right_col" role="main"style="background-image: url('images/small1.png');repeat:repeat;">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
               
				  <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <h2>New Grievance Complaints <small>List</small></h2><hr>
                 <div class="x_content">
					<table  class="table table-striped table-bordered display" style="width:100%;"> 
                      <thead>
                         <tr>
							<th>Sr.No</th>
							<th>Employee No</th>
							<th>Employee Name</th>
							<th>Grievance Ref.No.</th>
							<th>Updated By</th>
							<th>Action</th>
						 </tr>
					  </thead>
                      <tbody>
		               <?php
						function get_uploaded_user($emp_id){
							$sql_query=mysql_query("select * from tbl_user where user_id='$emp_id'");
							while($query_sql=mysql_fetch_array($sql_query))
							{
								$user_name=$query_sql['user_name'];
							}
							return $user_name;
						}
					   
					   $cnt=1;
					   $query=mysql_query("Select  e.emp_id,e.emp_name,e.mobile_no,g.gri_ref_no,g.uploaded_by,g.id from temp_emp_admin e INNER JOIN tbl_grievance g ON e.emp_id=g.emp_id where g.status='1'");
					   while($rw_data=mysql_fetch_array($query)){
						   $emp_id=$rw_data["emp_id"];
						   $emp_name=$rw_data["emp_name"];
						   $gri_ref_no=$rw_data["gri_ref_no"];
						   $uploaded_by=get_uploaded_user($rw_data["uploaded_by"]);
						   $g_id=$rw_data["id"];
						   echo "<tr>";
						   echo "<td>$cnt</td>";
						   echo "<td>$emp_id</td>";
						   echo "<td>$emp_name</td>";
						   echo "<td>$gri_ref_no</td>";
						   echo "<td>$uploaded_by</td>";
						   echo "<td><div class='btn-group' style='margin-top:-5px;width: 85px;'>
										<a  style='width:34px' id='".$rw_data['id']."' href='gri_temp_detail.php?g_id=".$rw_data['id']."' class='btn_show_center btn1 btn btn-info' value='".$rw_data['id']."'><i class='fa fa-eye' aria-hidden='true'></i></a>
										</div>
										</td>";
						      echo "</tr>";
							  $cnt++;
					   }
					   ?>
                           
                         </tbody>
                    </table>
                  </div>             
              </div>

              
            </div>
          </div>
              </div>
            </div>
        </div>
		
<?php
require_once('Global_Data/footer.php');
?>