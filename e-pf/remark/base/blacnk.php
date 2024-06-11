<?php 
include_once('global/header.php'); 
include_once('global/sidebar.php'); 
?>
 <!-- Page -->
 <div class="page">
    <div class="page-content">
      <div class="card">
		  <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Input Grid</h3>
        </div>
        <div class="panel-body container-fluid">
          <div class="row">
			
            <div class="col-lg-2 form-group">
              <label>Department Name</label>
            </div>
            <div class="col-lg-4 form-group">
              <input type="text" class="form-control" placeholder=".col-lg-4">
            </div>
            <div class="col-lg-2 form-group">
              <label>dsad</label>
            </div>
            <div class="col-lg-4 form-group">
              <input type="text" class="form-control" placeholder=".col-lg-3">
            </div>
			<div class="col-lg-4 form-group">
                <input type="checkbox" class="js-switch-small" data-plugin="switchery" data-size="small"
                      checked />
            </div>
          </div>
		  <div class="row">
					<div class="col-md-4 col-sm-12 col-xs-12">
							<div class="form-group pran_no">
							<label class="control-label col-md-8 col-sm-3 col-xs-12" >Dummy</label>
							  <div class="col-md-12 col-sm-8 col-xs-12" >
								<input type="text" id="" name="" class="form-control " >
								
							  </div>
							</div>
						</div>
					<div class="col-md-4 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-8 col-sm-3 col-xs-12" >Dummy</label>
						  <div class="col-md-12 col-sm-8 col-xs-12">
							<input type="text" id="" name="" class="form-control" placeholder="" >
							
						  </div>
						</div>
					</div>
					<div class="col-md-4 col-sm-12 col-xs-12">
						<div class="form-group ">
						<label class="control-label col-md-8 col-sm-3 col-xs-12" >Dummy</label>
						  <div class="col-md-12 col-sm-8 col-xs-12">
							<input type="text" id="" name="" class="form-control " placeholder="">
							
						  </div>
						</div>
					</div>
					<div class="col-md-4 col-sm-12 col-xs-12">
						<div class="form-group ">
						  <div class="col-md-6 col-sm-8 col-xs-12">
							 <button type="button" class="btn btn-block btn-primary">Primary</button>	
						  </div>
						</div>
					</div>
					<div class="col-md-4 col-sm-12 col-xs-12">
						<div class="form-group ">
						<label class="control-label col-md-8 col-sm-3 col-xs-12" >Dummy</label>
						  <div class="col-md-12 col-sm-8 col-xs-12">
							<select class="form-control" data-plugin="select2" data-placeholder="Select a State"
                    data-allow-clear="true">
                    <option></option>
                   
                      <option value="AK">Alaska</option>
                      <option value="HI">Hawaii</option>
                  
                   
                      <option value="CA">California</option>
                      <option value="NV">Nevada</option>
                      <option value="OR">Oregon</option>
                      <option value="WA">Washington</option>
                  
                    
                  </select>
						  </div>
						</div>
					</div>
				</div>
        </div>
      </div>
	  </div>
    </div>
  </div>
  <!-- End Page -->
  <?php 
include_once('global/footer.php'); ?>