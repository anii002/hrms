<div id="printThis">
  <div class="modal fade" style="width:100%;" id="update" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" style="border:none;">
    <div class="modal-dialog" style="width:95%; height:800px;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" id="close_model" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id=""><strong>Monthly-Report</strong></h4>
        </div>
       <div class="modal-body">
        <form class="form-horizontal" method="POST" action="process.php?action=update_postschedule">
             <div class="modal-body">
				<div class="row">
			
					<div class="table-responsive">
						<table class="table"border="1" width="100%">
					
						<tbody>
						<tr>
							<td width="20%" >Department</td>
							<td width="30%" id="post_dept"></td>
							<td width="20%">Designation</td>
							<td width="30%" id="post_plan"></td>
							
						
						</tr>
						</tbody>
						
						
						</table>
					
					
					</div>

						
				<div class="col-md-6 col-sm-12 col-xs-12" id="">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Department:</label>
						
						  <div class="col-md-8 col-sm-8 col-xs-12" >
							<input type="text" class="control-label" id="post_dept" name="post_dept" style="border:none; width:50%;text-align:left;" readonly />
						  </div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						 <label class="control-label col-md-4 col-sm-3 col-xs-12" >Action Plan:</label>
						  <div class="col-md-8 col-sm-12 col-xs-12">
							<input type="text"  rows="2" style="resize:none; border:none; width:50%;text-align:left;" class="control-label" id="post_plan" name="post_plan"  readonly />
							<input type="hidden" class="form-control"  placeholder="Enter Department Name" name="hide_field" id="hide_field"  maxlength="50">
					  </div>
					</div>
				</div>	
					
				</div>
				<br>
				<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12" id="">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Category:</label>
						
						  <div class="col-md-8 col-sm-8 col-xs-12" >
							<input type="text" class="control-label" id="post_category" name="post_category" style="border:none; width:50%;text-align:left;" readonly />
							
						  </div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Grade Pay:</label>
						
						  <div class="col-md-8 col-sm-8 col-xs-12" >
							<input type="text" class="control-label" id="post_gradepay" name="post_gradepay" style="border:none; width:50%;text-align:left;" readonly />
							
						  </div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Mode of Fill:</label>
						
						  <div class="col-md-8 col-sm-8 col-xs-12" >
							<input type="text" class="control-label" id="post_fill" name="post_fill" style="border:none; width:50%;text-align:left;" readonly >
							
							
							</select>
						  </div>
						</div>
					
					</div>
					
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >SS:</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="control-label" style="border:none; width:50%;text-align:left;" id="post_ss" readonly name="post_ss" />
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg" >MOR:</label>
						<div class="col-md-8 col-sm-8 col-xs-12" >
							  <input type="text" class="control-label" id="post_mor"  style="border:none; width:50%;text-align:left;" name="post_mor" readonly />
						  </div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12" id="">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">VAC:</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<input type="text" class="control-label" style="border:none; width:50%;text-align:left;" id="post_vac" name="post_vac" readonly  />
							</div>
						</div>
					</div>
				</div>
				<br>	
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">VAC IN HG:<span class=""></span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">
							 <input type="text" class="control-label" id="post_vacinhg" style="border:none; width:50%;text-align:left;" name="post_vacinhg" readonly />	
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">U_TRG:<span class=""></span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">
							 <input type="text" class="control-label" style="border:none; width:50%;text-align:left;" id="post_trg" name="post_trg" readonly />	
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">NET VAC:<span class=""></span></label>
						
						  <div class="col-md-8 col-sm-8 col-xs-12">
							  <input type="text" class="control-label" style="border:none; width:50%;text-align:left;" id="post_netvac" name="post_netvac" readonly />
						  </div>
						</div>
					</div>	
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Date of ASS:<span class=""></span></label>
						<div class="col-md-8 col-sm-8 col-xs-12">
								<input type="text" class="control-label" style="border:none; width:50%;text-align:left;" id="post_dateass" name="post_dateass" readonly>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Date of NOT:<span class=""></span></label>
					     <div class="col-md-8 col-sm-8 col-xs-12">
								 <input type="text" class="control-label" style="border:none; width:50%;text-align:left;" id="post_datenot" name="post_datenot" readonly />
							</div>
                        </div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Date of Exam:</label>
						
						  <div class="col-md-8 col-sm-8 col-xs-12" >
							  <input type="text" class="control-label" id="post_dateexam" style="border:none; width:50%;text-align:left;" name="post_dateexam" readonly />
						  </div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Date of Panel:<span class=""></span></label>
					     <div class="col-md-8 col-sm-8 col-xs-12">
								 <input type="text" class="control-label" style="border:none; width:50%;text-align:left;" id="post_datepanel" name="post_datepanel" readonly />
							</div>
                        </div>
					</div>
					
				</div>
				<br><br>
				
            </div>
      </div>
	  <link href="select2/select2.min.css" rel="stylesheet"/>
<script src="select2/select2.min.js"> </script>
	  
	 <!--Umesh Coding End here-->
	 
	 
        <div class="modal-footer">
          <button type="button" class="btn btn-default" id="print_page">Print</button>
        </div>
		

      </form>
      </div>
    </div>
  </div>