<?php 
// $_GLOBALS['a'] ='biodata';
  include_once('../global/header_update.php');
  
	// include('create_log.php');
  
	// $action="Visited Biodata page";
	// $action_on=$_SESSION['set_update_pf'];
	// create_log($action,$action_on);
  ?>

<div style="padding:10px;margin:5px;padding-top:0px;margin-top:-15px;">
			<div class="row" style="background:#67809f;margin:0px"><span style="color:white;font-size:22px;font-weight:200">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-address-card" style="font-size:22px;font-weight:200"></i>&nbsp;&nbsp;&nbsp;&nbsp;ADD USER</span>
			</div>
			<div style="border:1px solid #67809f;padding:30px;">
				<div class="box-header with-border">
					<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;User Managment </h3>
						
				</div>
				<div class="row">
				<h4>Existing User</h4>
				<a href="add_user.php" class="pull-right btn btn-primary" style="margin-right:25px;">Add User</a>
				</div>
					<div class="box-body">
														<table id="exampleprom" class="table table-striped">
														<thead>
														<tr>
															<th width="40%">Sr No</th>
															<th width="40%">PF</th>
															<th width="40%">Name</th>
															
															<th width="40%">Alloated Billunits</th>
															<th width="20%">Action</th>
														</tr>
														</thead>
														<tbody>
														<?php 
														$conn=dbcon1();
														
														$query=mysqli_query($conn,"select * from user_login");
														$cnt=0;
														while($res=mysqli_fetch_array($query)){
															$bill=$res['multi_bill_unit'];
															$pf=$res['pf_no'];
															$acdc=$res["act_deact"];
															$cnt++;
															echo "<tr>";
															echo "<td width='7%'>$cnt</td>";
															echo "<td width='7%'>$pf</td>";
															//<a class='btn btn-primary ' href='#'>Edit</a>
															echo "<td >".$res['adminname']."</td>";
															echo "<td width='30%'>".wordwrap($bill,48,'<br>',true)."</td>";
															echo "<td >&emsp;";
															if($acdc=='0')
															{
																echo "<button class='btn btn-warning act_deact' type='submit' attr='deact' attr1='$pf' >Deactivate</button>";
															}
															else
															{
																echo "<button class='btn btn-success act_deact' attr='act' attr1='$pf' >Activate</button> ";
															}
															echo "</td>";
															
															echo "</tr>";
														}
														?>
														</tbody>
															
													</table>
												</div>
						<script>
							$(function () {
							$('#exampleprom').DataTable()
							})
						</script>
				
				
				
				
			</div>
</div>
<?php include_once('../global/footer.php');?>  

<script>
$(document).on("click",".act_deact",function(){
var a=$(this).attr('attr');
var pf=$(this).attr('attr1');
// alert(pf);
// alert(a);
			
			$.ajax({
				type:'POST',
				url:'process.php',
				data:'action=deact_user&pf='+pf+'&attribute='+a,
				success:function(html){
					  window.location='user_mgt.php';
				 if(a=='act')
					  {
						  alert("User Activated Successfully....!!!");
					  }
					  else
					  {
						  alert("User Deactivated....!!!");
					  }
				} 
			});
});
</script>

