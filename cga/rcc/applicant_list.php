<?php
	$GLOBALS['flag']="2.4";
	include('common/header.php');
	include('common/sidebar.php');
?>
			
	<div class="page-content-wrapper">
		<div class="page-content">

			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue-hoki">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Registered User List
							</div>
							<div class="tools">
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-bordered table-hover" id="example1">
							<thead>
							<tr>
								<th>SR No</th>
								<th>Ex. Employee PFno</th>
								<th>Ex. Employee Name</th>
								<th>Applicant Name</th>
								<th>Category</th>
								<th>Action</th>
								
							</tr>
							</thead>
							<tbody>
								<?php
								dbcon1();
								$query_emp = "SELECT * FROM `applicant_registration`";
								$result_emp = mysql_query($query_emp);
								$sr=1;
								while($value_emp = mysql_fetch_array($result_emp))
								{
									$id=$value_emp['id'];
								echo "
								<tr>
								<td>".$sr++."</td>
								<td>".$value_emp['ex_emp_pfno']."</td>
								<td>".$value_emp['ex_empname']."</td>
								<td>".$value_emp['applicant_name']."</td>
								<td>".getcase($value_emp['category'])."</td>
								<td>";
								
								if($value_emp['status']=='0')
								{
								echo "<button value='".$value_emp['ex_emp_pfno']."' class='btn btn-success active' style='margin-left:10px;width:81px'>Active</button>";
								}
								else
								{
								echo "<button value='".$value_emp['ex_emp_pfno']."' class='btn btn-warning deactive' style='margin-left:10px;'>Deactive</button>";
								}
								//echo "<button value='".$id."' id='".$value_emp['ex_emp_pfno']."'  class='btn btn-danger remove'>Remove</button>";

								
								echo "</tr>";
								} 
								?>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			
		</div>
	</div>
<?php
	include 'common/footer.php';
?>
<script>


  $(document).on("click",".active",function(){
        var id = $(this).val();
        var result = confirm("Confirm!!! Proceed for user activation?");
        if(result == true)
        {
            $.ajax({
            url: 'control/adminProcess.php',
            type: 'POST',
            data: {action: 'activeApplicant', id : id},
          })
          .done(function(html) {
            alert(html);
            window.location="applicant_list.php";
          });
        }
    });
    $(document).on("click",".deactive",function(){
        var id = $(this).val();
        var result = confirm("Confirm!!! Proceed for user deactivation?");
        if(result == true)
        {
            $.ajax({
            url: 'control/adminProcess.php',
            type: 'POST',
            data: {action: 'deactiveApplicant', id : id},
          })
          .done(function(html) {
            alert(html);
            window.location="applicant_list.php";
          });
        }
    });



    // $(document).on("click",".remove",function(){
    //   var value = $(this).attr("value");
    //   var pf = $(this).attr("id");
    //   //alert(value);
      
    //   $.ajax({
    //     url: 'control/adminProcess.php',
    //     type: 'POST',
    //     data:"action=removeApplicant&id="+value+"&pf="+pf,
    //     success:function(data){
    //     	//alert(data);
    //     	if(data==1)
    //     	{
    //     		alert("Applicant Removed Succeessfully");
    //     		window.location="registration.php";
    //     	}
    // //     	
    //     	else
    //     	{
    //     		alert("Failed");	
    //     	}
    //     }


    //   });
    //  });

 
</script>