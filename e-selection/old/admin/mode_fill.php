<?php 
 session_start();
 
include_once('../global/header.php');
include_once('../global/topbar.php');
include_once('../global/sidebaradmin.php');

?>
  <div class="content-wrapper">
    <section class="content-header" style=" padding-left:20px;padding-bottom:10px;">
      <h1>
       Mode of Fill Master
      </h1>
    </section>
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Mode of Filling</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			
			<!--Umesh Code Here-->
            <form class="form-horizontal" method="POST" action="process.php?action=add_mode_of_fill">
              <div class="box-body">
               
               <div class="form-group">
                  <label for="inputEmail3" class="col-md-2 col-sm-2 col-xs-12 control-label">Mode of Filling</label>

                  <div class="col-md-6 col-sm-10 col-xs-12">
                    <input type="text" class="form-control"  placeholder="Enter Mode of Filling" name="mode_fill" id="mode_fill" required >
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="inputPassword3" class="col-md-2 col-sm-2 col-xs-12 control-label"></label>
                  <div class="col-md-6 col-sm-10 col-xs-12">
                <button type="submit" class="btn btn-primary">ADD</button>
                     <button type="reset" class="btn btn-warning">Cancel</button>
                  </div>
                </div>
                
              </div>
            </form>
         </div>
	
	 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Mode of Fill History</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Mode of Filling</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               <?php 
					$sql=mysql_query("select * from mode_of_fill");
					if($sql)
					{
					while($result=mysql_fetch_array($sql))
					{
						echo "<tr>";
						echo "<td>".$result['mode_of_fill']."</td>";
						echo "<td>
							<button type='button' value='".$result['id']."' data-target='#update' data-toggle='modal' class='btn btn-primary update_btn'>Update</button>
                      <button value='".$result['id']."' data-toggle='modal' data-target='#delete' class='btn btn-danger deleteBtn' style='margin-left:8px;'>Delete</button>
						</td>";
						echo "</tr>";
						
					}
					}
				?>
                </tbody>
                <tfoot>
               
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
		 <!--Umesh Code end here-->
		 <script>
  $(function () {
    $('#example1').DataTable()
    /* $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    }) */
  })
</script> 
    </section>
  </div>
  <!--Content code end here--->

  
  <!-- Umesh Coding Here-->
  
  
  <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id=""><strong>Update Mode of Filling</strong></h4>
        </div>
       <div class="modal-body">
        <form class="form-horizontal" method="POST" action="process.php?action=update_mode_of_fill">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-md-3 col-sm-3 col-xs-12 control-label">Mode of Filling</label>

                  <div class="col-md-8 col-sm-10 col-xs-12">
                    <input type="text" class="form-control"  placeholder="Enter Mode of Filling" name="update_modefill" id="update_modefill" required maxlength="50">
                    <input type="hidden" class="form-control"  placeholder="Enter Department Name" name="hide_field" id="hide_field" required maxlength="50">
                  </div>
                </div>
               
              </div>
      </div>
	  
	 <!--Umesh Coding End here-->
	 
	 
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
          <h4 class="modal-title" id=""><strong>Delete Mode of Fill</strong></h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" method="POST" action="process.php?action=delete_modeoffill">

            <div class="form-group">
              Do you really want to delete the specified record?
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
  <link href="select2/select2.min.css" rel="stylesheet"/>
<script src="select2/select2.min.js"> </script>
   <?php
 include_once('../global/footer.php');
 ?>

   <script>
  $(function () {
    $('#example1').DataTable()
  });
  $(document).on("click",".update_btn",function(){
	 var values = $(this).val();
	 //alert(values);
			$.ajax({
                url: 'process.php',
                type: 'POST',
                data: {action: 'fetchmodefill', id: values}
              })
              .done(function(html) {
				 // alert(html);
                var data = JSON.parse(html);
                $("#update_modefill").val(data.mode_of_fill);
                $("#hide_field").val(values);
              });
  });
  
  $(document).on("click", ".deleteBtn", function(){
            debugger;
              var id = $(this).val();
                $("#delete_id").val(id);
          });
	$(".select2").select2();
</script>
