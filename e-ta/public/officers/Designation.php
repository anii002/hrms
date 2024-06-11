<?php
  require_once("../../global/admin_header.php");
  require_once("../../global/admin_topbar.php");
  require_once("../../global/admin_sidebar.php");
?>
  <div class="content-wrapper">
    <section class="content-header" style="background-color:#5be439; padding-left:20px;padding-bottom:10px;">
      <span style="font-size:20px;font-weight:bold;" class="col-sm-8">
        पदनाम प्रधान  /  Designation Master
      </span>
	  <span class="text-right col-sm-4">
	  <button class="btn btn-danger" onclick="history.go(-1);">Back</button>
	  </span>
	  <div class="clearfix"></div>
    </section>
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-primary" style="padding-top:15px;padding-bottom:10px;padding-right:45px;padding-left:20px;">
                <div class="tab-pane" id="settings">

                  <form class="form-horizontal" action="control/adminProcess.php?action=AddDesign" method="post" enctype="multipart/form-data">

										<div class="form-group">
											<label for="design" class="col-sm-2 control-label">पदनाम / Designation</label>

											<div class="col-sm-5">
												<input type="text" class="form-control" id="design" name="design" placeholder="पदनाम  दर्ज करे Enter designation">
											</div>
										</div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success" style="width:150px;">प्रस्तुत करे / Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
          </div>
        </div>

				<div class="box box-info">
					<div class="box-header">
						<h3 class="box-title">ऑडिट ट्रैक / Audit track</h3>
					</div>
					<div class="box-body">
						<div class="col-xs-12 table-responsive">
						<table id="example" class="table table-bordered table-hover">
							<thead>
							<tr>
								<th>आईडी / ID</th>
								<th>पदनाम / Designation</th>
								<th>कार्रवाई / Action</th>
							</tr>
							</thead>
							<tbody>
                <?php
                  $query = "select * from designation";
                  $result = mysql_query($query);
                  while($value = mysql_fetch_array($result))
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
          <h4 class="modal-title" id=""><strong>पदनाम अद्यातन / Update Designation</strong></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="control/adminProcess.php?action=UpdateDesign" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label for="update_design" class="col-sm-2 control-label">पदनाम / Designation</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="update_design" name="update_design" placeholder="Enter designation">
                <input type="hidden" class="form-control" id="update_id" name="update_id">
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">प्रस्तुत करे Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">बंद करे  Close</button>
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
          <h4 class="modal-title" id=""><strong>पदनाम मिटा दें / Delete Designation</strong></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="control/adminProcess.php?action=DeleteDesign" method="post" enctype="multipart/form-data">

            <div class="form-group">
              क्या आप मिटाना चाहते हैं ?  / Do you want to delete?
              <div class="col-sm-10">
                <input type="hidden" class="form-control" id="delete_id" name="delete_id">
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">प्रस्तुत करे Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">बंद करे  Close</button>
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
