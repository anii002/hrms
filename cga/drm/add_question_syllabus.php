<?php
	$GLOBALS['flag']="10";
	include('common/header.php');
	include('common/sidebar.php');
	dbcon1();
?>
			
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-book"></i> Add Question Paper & Syllabus For Applicant 
					</div>
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<form action="control/adminProcess.php?action=add_questios" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
						<div class="form-body">
							<!-- <h3 class="form-section">Add User</h3> -->
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Name</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas  fa-user"></i>
										</span>
										<input type="text" class="form-control onlyText" id="que_name" name="que_name" maxlength="35" placeholder="Enter Question Paper Name or Syllabus Name" required>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Year</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas  fa-user"></i>
										</span>
										<input type="text" class="form-control onlyNumber" id="year" name="year" maxlength="4" placeholder="Enter Question Paper Name or Syllabus Name" onchange="phonenumber(this)" required>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Upload File<span style="color:red;">*</span>  <small style="color:red;">documents(in pdf format) & images(in jpg or png)</small>  </label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas fa-envelope"></i>
										</span>
										<input type="file" class="form-control" id="upload" name="upload" required="" accept="image/jpeg,image/png,application/pdf">
										</div>
									</div>
								</div>
							</div>
							<!--/row-->
						</div>
						<div class="form-actions right">
							<button type="submit" class="btn blue submit_btn" id='submit_btn' name='button'><i class="fa fa-check"></i> Submit</button>&nbsp;
							<button type="button" class="btn default">Cancel</button>
							
						</div>
					</form>
					<!-- END FORM-->
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue-hoki">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Uploaded Question Paper or Syllabus List
							</div>
							<div class="tools">
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-bordered table-hover" id="example1">
							<thead>
							<tr>
								<th>SR No</th>
								<th>Question Paper Name</th>
								<th>Year</th>
								<th>Uploaded Date</th>
								<th>Files</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
								<?php
								dbcon1();
								$query_emp = "SELECT * from add_syllabus";
								$result_emp = mysql_query($query_emp);
								$sr=1;
								while($value_emp = mysql_fetch_array($result_emp))
								{
									
								echo "
								<tr>
								<td>".$sr++."</td>
								<td>".$value_emp['name_of_que_paper']."</td>
								<td>".$value_emp['year']."</td>
								<td>".$value_emp['uploaded_date']."</td>
								
								<td>";
								
								//echo "<a target='_blank'  id='".$value_emp['uploaded_file_path']."' value='".$value_emp['uploaded_file_path']."'>'".$value_emp['uploaded_file_path']."'</a>";

								echo "<a href='../syllabus/".$value_emp['uploaded_file_path']."' target='_blank'>".$value_emp['uploaded_file_path']."</a></td>";
								
								echo "<td><button value='".$value_emp['id']."' class='btn btn-danger active' style='margin-left:10px;'>Remove</button></td>";
								echo "</tr>
								";
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
<!-- <div id="responsive" class="modal fade modal-scroll modalemployeedata" tabindex="-1" data-replace="true">
		<div class="modal-header btn-orange-moon">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			<h4 class="modal-title">Employee Data : <span id="name1" name="name1"></span>	</h4>
		</div>
		<form action="control/adminProcess.php?action=updateEmpData" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
		<div class="modal-body">
			<div class="portlet-body form">

					<input type="hidden" id="txtpfno" name="txtpfno">
					<input type="hidden" id="id" name="id">
					<input type="hidden" id="designation_id" name="designation_id">
					<input type="hidden" id="station_id" name="station_id">
					<input type="hidden" id="dept_id" name="dept_id">
					<input type="hidden" id="depot_id1" name="depot_id1">
					<div class="form-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">name_of_que_paper</label>
									<div class="input-group">
										<span >
											
											<span id="name_of_que_paper"></span>
										</span>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Year</label>
									<div class="input-group">
										<span id="year" >
											
										</span>
									</div>
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">uploaded_date</label>
									<div class="input-group">
										<span id="uploaded_date" >
											
										</span>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">File</label>
									<div class="input-group">
										<span >
											
										</span>
									</div>
								</div>
							</div>
							
						</div>
						
						</div>
			
			
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
			
		</div>
		</form>
	</div> -->

<script type="text/javascript">
$(document).on("click",".active",function(){
        var id = $(this).val();
        var result = confirm("Confirm!!! Proceed for Remove File?");
        if(result == true)
        {
            $.ajax({
            url: 'control/adminProcess.php',
            type: 'POST',
            data: {action: 'RemoveFile', id : id},
          })
          .done(function(html) {
            //alert(html);
            //window.location="add_question_syllabus.php";
            if(html==1)
            {
            	alert('Successfully Removed file...');
            	window.location='add_question_syllabus.php';
            }
            else
            {
            	alert('Failed to  Remove file...');
            	window.location='add_question_syllabus.php';
            }
          });
        }
    });

document.getElementById("upload").onchange = function(){  // on selecting file(s)
    for(var file in this.files){ // loop over all files
        if(isNaN(file) === false){  // if it is actually a file and not any other property
            if(this.files[file].type !== "application/pdf" && this.files[file].type !== "image/jpeg" && this.files[file].type !== "image/png"){ // if NOT PDF!!
                alert('Please select PDFs and img files only.');
                $("#upload").val('');
                return false;
            }
        }
    }
    var oFile = document.getElementById("upload").files[0]; // <input type="file" id="fileUpload" accept=".jpg,.png,.gif,.jpeg"/>
    	for(var file in this.files)
    	{
    		if(isNaN(file)===false)
    		{
    			if (this.files[file].size > 9097152) // 2 mb for bytes.
            	{
                	alert("Please check selected any of the file size is greater 9mb!..  please select file under 9mb!");
                	$("#upload").val('');
                	return;
            	}

    		}
    	}
    // alert('Yay!! All selected files are in PDF format.');
    // return true;
}

  $(function(){

    $(".onlyText").on("input change paste", function() {

        var newVal = $(this).val().replace(/[^a-zA-Z\s]/g, '');

        $(this).val(newVal);

    
    });



    $(document).on("input change paste", ".onlyNumber", function() {

        var newVal = $(this).val().replace(/[^0-9]*$/g, '');

        $(this).val(newVal);

    });
});

  function phonenumber(inputtxt)  
    {  
    
      var phoneno = /^((?!(0))[0-9]{4})$/g;  
      if((inputtxt.value.match(phoneno)))  
      {  
        return true;  
        }  
        else  
        {  
        $("#year").val("");
         $("#year").focus();
        alert("Please enter valid year");  
        
        return false;  
        }  
    }
</script>