<?php
	require_once("../../global/header.php");
	require_once("../../global/topbar.php");
	require_once("../../global/sidebar.php");
?>
<!--Content page--->
  <div class="content-wrapper">
    <section class="content-header" style="background-color:#5be439; padding-left:20px;padding-bottom:10px;">
      <h1>
        Department
      </h1>
    </section>
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-primary" style="padding-top:15px;padding-bottom:10px;padding-right:45px;padding-left:20px;">
                <div class="tab-pane" id="settings">

                  <form class="form-horizontal" action="control/adminProcess.php?action=AddDesign" method="post" enctype="multipart/form-data">

										<div class="form-group">
											<label for="design" class="col-sm-2 control-label">Designation</label>

											<div class="col-sm-5">
												<input type="text" class="form-control" id="design" name="design" placeholder="Enter designation">
											</div>
										</div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success" style="width:150px;">Submit</button>
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
						<table id="example" class="table table-bordered table-hover">
							<thead>
							<tr>
								<th>ID</th>
								<th>Designation</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
                <?php
                  $query = "select * from designation";
                  $result = mysqli_query($con,$query);
                  while($value = mysqli_fetch_array($result))
                  {
                    echo "<tr>
      								<td>".$value['id']."</td>
      								<td>".$value['designation']."</td>
      								<td><button type='button' value='".$value['id']."' data-target='#update' data-toggle='modal' class='btn btn-primary update'>Update</button>
                      <button value='".$value['id']."' data-toggle='modal' data-target='#delete' class='btn btn-danger deleteBtn' style='margin-left:8px;'>Delete</button></td>
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
  </div>
  <!--Content code end here--->

  <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id=""><strong>Update Designation</strong></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="control/adminProcess.php?action=UpdateDesign" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label for="update_design" class="col-sm-2 control-label">Designation</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="update_design" name="update_design" placeholder="Enter designation">
                <input type="hidden" class="form-control" id="update_id" name="update_id">
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id=""><strong>Delete Designation</strong></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="control/adminProcess.php?action=DeleteDesign" method="post" enctype="multipart/form-data">

            <div class="form-group">
              Do you want to delete?
              <div class="col-sm-10">
                <input type="hidden" class="form-control" id="delete_id" name="delete_id">
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
  </div>
 <?php
	require_once("../../global/footer.php"); ?>

  <script type="text/javascript">
      $(document).ready(function() {
          $(document).on("click",".update",function(){
              var id = $(this).val();
              $.ajax({
                url: 'control/adminProcess.php',
                type: 'POST',
                data: {action: 'fetchDesign', id: id}
              })
              .done(function(html) {
                var data = JSON.parse(html);
                $("#update_design").val(data.designation);
                $("#update_id").val(id);
              })
              .fail(function() {
                alert("error");
              });
          });
          $(document).on("click", ".deleteBtn", function(){
            debugger;
              var id = $(this).val();
                $("#delete_id").val(id);
          });
      });
  </script>
