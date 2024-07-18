<?php
require_once('Global_Data/header.php');
error_reporting(0);
include('config.php');
include('functions.php');
?>

 <!-- PNotify -->
      <!-- page content -->
        <div class="right_col" role="main"style="background-image: url('images/small1.png');repeat:repeat;">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
               
				  <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <h2>Closed Grievance<small>List</small></h2><hr>
                 <div class="x_content">
					<table  class="table table-striped table-bordered display" style="width:100%;"> 
                      <thead>
                         <tr>
							<th>Sr.No</th>
							<th>Employee No</th>
							<th>Grievance Ref.No.</th>
							<th>Grievance Upload Date</th>
							<th>Reminder Date</th>
							<th>Remark</th>
							<th>Action</th>
						 </tr>
					  </thead>
                      <tbody>
		               <?php
					   function get_Cat($type)
					   {	
						global $db_egr;
						   $fetch_cat=mysqli_query($db_egr,"select cat_name from category where cat_id='".$type."'");
						   while($cat_get=mysqli_fetch_assoc($fetch_cat)){
							   $cat_names=$cat_get['cat_name'];
							    echo "<script>alert($cat_names)</script>";
						   }
						   return($cat_names);
					   }
					   function get_type($emp_type){
						global $db_egr;
						   $fetch_cat=mysqli_query($db_egr,"select * from emp_type where id='$emp_type'");
							while($cat_fetch=mysqli_fetch_array($fetch_cat))
							{
								$e_type=$cat_fetch['type'];
							}
							return $e_type;
					   }
					   $cnt=1;
					   $query=mysqli_query($db_egr,"select r.rem_id,r.emp_id,r.griv_ref_no,r.griv_upload_date,r.reminder_date,r.remark,g.id from reminder r INNER JOIN tbl_grievance g ON r.griv_ref_no=g.gri_ref_no where r.status='0'");
					   
					   while($rw_data=mysqli_fetch_array($query)){
						   $emp_id=$rw_data["emp_id"];
						   $gri_ref_no=$rw_data["griv_ref_no"];
						   $gri_upload_date=$rw_data["griv_upload_date"];
						   $rem_date=$rw_data["reminder_date"];
						   $remark=$rw_data["remark"];
						   $g_id=$rw_data["id"];
						   $r_id=$rw_data["rem_id"];
						 
						   echo "<tr>";
						   echo "<td>$cnt</td>";
						   echo "<td>$emp_id</td>";
						   echo "<td>$gri_ref_no</td>";
						   echo "<td>$gri_upload_date</td>";
						   echo "<td>$rem_date</td>";
						   echo "<td>$remark</td>";
						   echo "<td><div class='btn-group' style='margin-top:-5px;width: 85px;'>
										<a  style='width:34px' id='$r_id' href='griv_closed.php?g_id=$g_id' class='btn_show_center btn1 btn btn-info' value='$g_id'><i class='fa fa-eye' aria-hidden='true'></i></a>
										</div>
										</td>";
						      echo "</tr>";
							  $cnt++;
					   }
					//   echo "<script>alert('$g_id');</script>";
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
<script>
debugger;
$(".btn1").click(function(){
	var rem_id=$(this).attr('id');
	//alert(rem_id);
	$.ajax({
		type:'POST',
		url:'process.php?action=update_rem',
		data:{rem_id:rem_id},
		success:function(html){
			alert("send");
		}
	}); 
});
</script>