<?php
	require_once("../../global/header.php");
	require_once("../../global/topbar.php");
	require_once("../../global/sidebar.php");
?>
<!--Content page--->
  <div class="content-wrapper">
    <section class="content-header" style="background-color:#5be439; padding-left:20px;padding-bottom:10px;">
      <h1>
        User Registration
      </h1>
    </section>
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-primary" style="padding-top:15px;padding-bottom:10px;padding-right:45px;padding-left:20px;">
                <div class="tab-pane" id="settings">
                  <form class="form-horizontal" action="control/adminProcess.php?action=addEmployee" method="post" enctype="multipart/form-data">

										<div class="form-group col-xs-6">
											<label for="empid" class="col-xs-3 control-label">Employee ID</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" id="empid" name="empid" placeholder="Employee ID" required>
											</div>
										</div>

										<div class="form-group col-xs-6">
											<label for="gradepay" class="col-xs-3 control-label">Grade Pay</label>
											<div class="col-sm-9">
												<select id="gradepay" name="gradepay" style="width:100%" class="form-control select2" required>
													<option selected hidden readonly>Select Grade Pay</option>
                        <?php
													$query = "select * from gradepay";
													$result = mysql_query($query);
													while($value = mysql_fetch_array($result))
													{
														echo "<option value='".$value['id']."'>".$value['gradepay']."</option>";
											 		}
												  ?>
												</select>
											</div>
										</div>
										<div class="clearfix"></div>
										<div class="form-group col-xs-6">
											<label for="fullname" class="col-xs-3 control-label">Fullname</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" id="fullname" name="fullname" required placeholder="Employee Full Name">
											</div>
										</div>
										<div class="form-group col-xs-6">
											<label for="dept" class="col-xs-3 control-label">Department</label>
											<div class="col-xs-9">
												<select id="dept" name="dept" style="width:100%" class="form-control select2" required>
													<option selected hidden readonly>Select department</option>
                        <?php
													$query = "select * from department";
													$result = mysql_query($query);
													while($value = mysql_fetch_array($result))
													{
														echo "<option value='".$value['dept_id']."'>".$value['deptname']."</option>";
											 		}
												  ?>
												</select>
											</div>
										</div>

										<div class="clearfix"></div>
										<div class="form-group col-xs-6">
											<label for="billunit" class="col-xs-3 control-label">Bill Unit</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" id="billunit" required name="billunit" placeholder="Employee Bill Unit">
											</div>
										</div>
										<div class="form-group col-xs-6">
											<label for="design" class="col-xs-3 control-label">Designation</label>
											<div class="col-sm-9">
												<select id="design" name="design" style="width:100%" class="form-control select2" required>
													<option selected hidden readonly>Select Designation</option>
                        <?php
													$query = "select * from designation";
													$result = mysql_query($query);
													while($value = mysql_fetch_array($result))
													{
														echo "<option value='".$value['id']."'>".$value['designation']."</option>";
											 		}
												  ?>
												</select>
											</div>
										</div>

										<div class="clearfix"></div>
										<div class="form-group col-xs-6">
											<label for="mobile" class="col-xs-3 control-label">Mobile</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" id="mobile" name="mobile" required placeholder="Employee Mobile Number">
											</div>
										</div>
										<div class="form-group col-xs-6">
											<label for="station" class="col-xs-3 control-label">Station</label>
											<div class="col-sm-9">
												<select id="station" name="station" style="width:100%" required class="form-control select2">
													<option selected hidden readonly>Select Station</option>
                        <?php
													$query = "select * from stations";
													$result = mysql_query($query);
													while($value = mysql_fetch_array($result))
													{
														echo "<option value='".$value['station_id']."'>".$value['station_name']."</option>";
											 		}
												  ?>
												</select>
											</div>
										</div>

										<div class="clearfix"></div>
										<div class="form-group col-xs-6">
											<label for="email" class="col-xs-3 control-label">E-mail</label>
											<div class="col-sm-9">
												<input type="email" class="form-control" id="email" name="email" placeholder="Employee E-Mail">
											</div>
										</div>
										<div class="form-group col-xs-6">
											<label for="address" class="col-xs-3 control-label">Address</label>
											<div class="col-sm-9">
												<textarea name="address" class="form-control" placeholder="Employee Address" required></textarea>
											</div>
										</div>


										<div class="clearfix"></div>
										<div class="form-group">
											<div class="col-xs-offset-10">
												<input type="submit" value="Register" style="width:100px;" class="btn btn-success">
											</div>
										</div>

                  </form>
                </div>
              </div>
          </div>
        </div>

				<div class="box box-info">
					<div class="box-header">
						<h3 class="box-title">Audit track</h3>
					</div>
					<div class="box-body">
						<div class="col-xs-12 table-responsive">
						<table id="example1" class="table table-bordered table-hover">
							<thead>
							<tr>
								<th>Employee ID</th>
								<th>Name</th>
								<th>Mobile</th>
								<th>Email</th>
								<th>Designation</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
								<?php
									$query = "select * from employees";
									$result = mysql_query($query);
									while($value = mysql_fetch_array($result))
									{
										echo "<tr>
											<td>".$value['empid']."</td>
											<td>".$value['empname']."</td>
											<td>".$value['mobile']."</td>
											<td>".$value['email']."</td>
											<td>".designation($value['designation'])."</td>
											<td><button type='button' value='".$value['id']."' class='btn btn-info update' data-toggle='modal' data-target='#update'>Update</button>
											<button type='button' value='".$value['id']."' class='btn btn-danger delete' data-toggle='modal' data-target='#delete'>Delete</button></td>
										</tr>";
									}
								?>
							</tbody>
						</table>
					</div>
					</div>
					<!-- /.box-body -->
				</div>
    </section>
		<div id="update" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Update Employee Information</h4>
		      </div>
		      <div class="modal-body">
						<form class="form-horizontal" action="control/adminProcess.php?action=updateEmployee" method="post" enctype="multipart/form-data">

							<div class="form-group col-xs-12">
								<label for="uempid" class="col-xs-3 control-label">Employee ID</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="uempid" name="uempid" required placeholder="Employee ID">
									<input type="hidden" class="form-control" id="update_id" name="update_id" required placeholder="Employee ID">
								</div>
							</div>

							<div class="clearfix"></div>
							<div class="form-group col-xs-12">
								<label for="ufullname" class="col-xs-3 control-label">Fullname</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="ufullname" name="ufullname" required placeholder="Employee Full Name">
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="form-group col-xs-12">
								<label for="umobile" class="col-xs-3 control-label">Mobile</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="umobile" name="umobile" required placeholder="Employee Mobile Number">
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="form-group col-xs-12">
								<label for="uemail" class="col-xs-3 control-label">E-mail</label>
								<div class="col-sm-9">
									<input type="email" class="form-control" id="uemail" name="uemail" placeholder="Employee E-Mail">
								</div>
							</div>

							<div class="clearfix"></div>
									<div class="form-group col-xs-12">
												<label for="ubillunit" class="col-xs-3 control-label">Bill Unit</label>
												<div class="col-sm-9">
														<input type="text" class="form-control" id="ubillunit" required name="ubillunit" placeholder="Employee Bill Unit">
												</div>
									</div>
									<div class="clearfix"></div>
							<div class="form-group col-xs-12">
								<label for="gradepay" class="col-xs-3 control-label">Grade Pay</label>
								<div class="col-sm-9">
									<select id="ugradepay" name="ugradepay" style="width:100%" required class="form-control select2">

									</select>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="form-group col-xs-12">
								<label for="udept" class="col-xs-3 control-label">Department</label>
								<div class="col-xs-9">
									<select id="udept" name="udept" style="width:100%" required class="form-control select2">

									</select>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="form-group col-xs-12">
								<label for="udesign" class="col-xs-3 control-label">Designation</label>
								<div class="col-sm-9">
									<select id="udesign" name="udesign" style="width:100%" required class="form-control select2">

									</select>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="form-group col-xs-12">
								<label for="ustation" class="col-xs-3 control-label">Station</label>
								<div class="col-sm-9">
									<select id="ustation" name="ustation" style="width:100%" required class="form-control select2">
									</select>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="form-group col-xs-12">
								<label for="uaddress" class="col-xs-3 control-label">Address</label>
								<div class="col-sm-9">
									<textarea name="uaddress" id="uaddress" class="form-control" required placeholder="Employee Address"></textarea>
								</div>
							</div>
							<div class="clearfix"></div>

		      </div>
		      <div class="modal-footer">
						<input type="submit" value="Update" style="width:100px;" class="btn btn-success">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
				</form>
		  </div>
		</div>
  </div>

	<div id="delete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Employee</h4>
      </div>
			<form action="control/adminProcess.php?action=deleteEmployee" method="post">
      <div class="modal-body">
        <p>Confirm Delete Employee.</p>
				<input type="hidden" id="delete_id" name="delete_id">
      </div>
      <div class="modal-footer">
				<input type="submit" value="Delete" style="width:100px;" class="btn btn-danger">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
		</form>
    </div>

  </div>
</div>
  <!--Update Modal-->

 <?php
	require_once("../../global/footer.php");
 ?>

 <script>
	$(document).ready(function() {
		$(document).on("click",".delete",function(){
			var id = $(this).val();
			$("#delete_id").val(id);
		});
		$(document).on("click",".update",function(){
			var id = $(this).val();
			$.ajax({
				url: 'control/adminProcess.php',
				type: 'POST',
				data: {action: 'FetchEmployee',id: id}
			})
			.done(function(data) {
				//alert(data);
				var html = JSON.parse(data);
				$("#uempid").val(html.empid);
				$("#ufullname").val(html.empname);
				$("#umobile").val(html.mobile);
				$("#uemail").val(html.email);
				$("#ubillunit").val(html.billunit);
				$("#ugradepay").html(html.gradepay);
				$("#udept").html(html.department);
				$("#udesign").html(html.designation);
				$("#ustation").html(html.station);
				$("#uaddress").val(html.address);
				$("#update_id").val(id);
			});
		});
	});
 </script>
