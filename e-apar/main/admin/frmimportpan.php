<?php 
 session_start();
 if(!isset($_SESSION['SESS_MEMBER_NAME']))
 {
	 echo "<script>window.location='http://drmpsur-hrms.in/e-apar/index.php';</script>";
 }
include_once('../global/header.php');
include_once('../global/topbar.php');
include_once('../global/sidebaradmin.php');

?>
<style>
.primary
{
	 box-shadow: none;
	border-color: rgba(60, 141, 188, 0.53);
}
</style>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin
      </h1>
    </section>
	
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	
      <div class="row">
		<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Import PAN Details...</h3><hr>
            </div>
			<div class="box-body">
			<form method="get" id="frmaddemployee" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg" action="import_pan.php">  
				<div class="col-md-12">
						 <div class="box box-warning box-solid">
							<div class="box-header with-border">
							  <h3 class="box-title"><i class="fa fa-tags"></i>&nbsp;<b>Note:</b></h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
							<div class="form-group">
								<div class="col-md-6">
									<ul type='disc'>
										<li>
											<label>
											Please Select excelsheet format only
											</label>
										</li>
									</ul>
								</div>
							</div>
								<div class="col-md-12"></div>
								<div class="clearfix"></div>
								<div class="form-group">
									<label class="col-md-2">Select File :</label>
									<div class="col-md-4">
									<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-cloud-upload"></i></div>
										 <input type="file" name="txtfile" class="form-control primary" id="txtfile" required /><br><br>
									</div><br>
									</div>
								</div>
								<div class="clearfix"></div>
							  <input type="submit" value="Upload" class="btn btn-success btn-flat btn-sm"/>
								
							</div>
							<!-- /.box-body -->
						  </div>
						  <!-- /.box -->
				</div>
				
				
			</form>
			
            </div>
		</div>
		
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  
 <?php
 include_once('../global/footer.php');
 ?> 