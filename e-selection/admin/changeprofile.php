<?php 
 session_start();
 
include_once('../global/header.php');
include_once('../global/topbar.php');
include_once('../global/sidebaradmin.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <div class="content-wrapper">
    <section class="content-header" style=" padding-left:20px;padding-bottom:10px;">
      <h1>
   CHANGE PASSWORD OF ADMIN
      </h1>
    </section>
    <section class="content">
        <div class="box">
		<div class="tab-pane" id="postform">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Change Your password</h3>
			</div>
			
			

			<form method="post" action="process.php?action=changeprofile" class="apply_readonly" id="postform">
			
			<div class="modal-body">
			
				<br>
				<div class="row">
					 
					<div class="col-md-3 col-sm-3 col-xs-12"></div>
					<div class="col-md-6 col-sm-6 col-xs-12" id="">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-6 col-xs-12 lbl_reg">Enter Your Old Password :</label>
						
						 <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="password" class="form-control" id="post_oldpswrd" name="post_oldpswrd" required/>
							</div>
						</div>
						<br>
						<br>
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Enter Your New Password :</label>
						
						 <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="password" class="form-control" id="post_newpswrd" name="post_newpswrd" required/>
							</div>
						</div>
						<br>
						<br>
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Confirm New Password :</label>
						
						 <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="password" class="form-control" id="post_conpswrd" name="post_conpswrd" required/>
									<br>
									<label id="lbl1" name="lbl1" style="display:none; color:red"/>
							</div>
							<br>
						</div>
						
						<br>
						<br>
						<div class="form-group">
				
					<div class="col-sm-12 col-md-6 col-xs-12 pull-right">
					<input type="submit" id="btnSave" name="btnSave" value="Save" style="margin-right:30px"  class="btn btn-success" />
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						<br>
					</div>
					</div>	
						
					</div>
					
					<div class="col-md-3 col-sm-3 col-xs-12"></div>
				</div>	
				
				
            </div>
			</form>
		</div>
		</div>

            

            
    </section>
  </div>
  <!--Content code end here--->

  
  <!-- Umesh Coding Here-->
  
  
  
  
  
   <link href="select2/select2.min.css" rel="stylesheet"/>
<script src="select2/select2.min.js"> </script>
   <script>

   
  
   
   
   
    $(function () {
    $('#example1').DataTable()
  });
  $(document).on("click",".update_btn",function(){
	 var values = $(this).val();
	 alert(values);
			$.ajax({
                url: 'process.php',
                type: 'POST',
                data: {action: 'fetchdesignation', id: values}
              })
              .done(function(html) {
				  alert(html);
                var data = JSON.parse(html);
                $("#update_zone").val(data.zone);
                $("#update_dept").val(data.dept);
				$("#update_desg").val(data.desg);
                $("#hide_field").val(values);
              });
  });
  
  $(document).on("click", ".deleteBtn", function(){
            debugger;
              var id = $(this).val();
                $("#delete_id").val(id);
          });
   
   
   
   $(".select2").select2();
   $("#post_dept").select2();
   $("#post_category").select2();
   $("#post_fill").select2();
   $("#post_gradepay").select2();
 
   
$(document).ready(function(){
		$("#post_mor").on("change", function(){debugger;
		
			var ss=document.getElementById("post_ss").value;
			var mor=document.getElementById("post_mor").value;
			var voc=ss-mor;
    		document.getElementById("post_vac").value=voc;
		});
});

</script>


<script>
  
  // $(document).ready(function(){
	  // $('#btnSavebtnSave').click(function(){
		  // var cpass=$('#post_newpswrd').val();
		  // var pass=$('#post_conpswrd').val();
		  // if(cpass==pass)
		  // {
			  // $('#lbl1').css({"display":"block","color":"green"});
			  // document.getElementById('lbl1').innerHTML="Password Matched......";
		  // }
		  // else
		  // {
			   // $('#lbl1').css({"display":"block","color":"red"});
			  // document.getElementById('lbl1').innerHTML="Password does not Matched......";
			  // $('#post_newpswrd').focus();
			  // document.getElementById("post_newpswrd").value="";
			  // document.getElementById("post_conpswrd").value="";
			  
		  // }
	  // });
  // });
  
  $(document).on("change","#post_oldpswrd",function(){
	  var pass= $(this).val();
	  $.ajax({
                url: 'process.php',
                type: 'POST',
                data: {action: 'checkpassword', id: pass}
              })
              .done(function(html) {
				  debugger;
				  if(html=="true")
				  {
					  $("#post_oldpswrd").css("background-color", "green");
				  }
				  else
				  {
					  $("#post_oldpswrd").css("background-color", "red");
				  }
				  
              });
  });
  </script>





   <?php
 include_once('../global/footer.php');
 ?>


  