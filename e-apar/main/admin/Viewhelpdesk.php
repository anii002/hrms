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
 <!-- Left side column. contains the logo and sidebar -->
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Helpdesk
      </h1>
   </section>
	
    <!-- Main content -->
     <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
		 <div class="box-header">
              <h3 class="" style="text-align:center;">
			 Approval Of Request
              </h3>
              <!-- tools box -->
            
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
			  <?php
			  if(isset($_GET["HLP_id"]))
			  {
				  $id=$_GET["HLP_id"];
				$sqlhelpdesk=mysql_query("select * from tbl_helpdesk where HLP_id='$id'");
				while($rwHelp=mysql_fetch_array($sqlhelpdesk))
				{
					$helpid=$rwHelp["HLP_id"];
			  ?>
              <form action="" method="POST" action="" enctype="multipart/form-data" role="form" id="frmhelpdesk">
			
				<div class="form-group col-md-2">
			  <label>Date:</label></div>
					<div class="col-md-6">
                   <input type="date" name="txtdate" id="txtdate" class="form-control primary" value="<?php echo $rwHelp["date"]; ?>" />
					</div>
			  <div class="clearfix"></div><br>
			  <div class="form-group col-md-2">
			  <label>Subject:</label></div>
					<div class="col-md-6">
                   <input type="text" name="txtsubject" id="txtsubject" class="form-control primary" value="<?php echo $rwHelp["subject"]; ?>" readonly />
					</div>
					
					
				<div class="clearfix"></div><br>
				  <div class="form-group col-md-2">
				  <label>Description:</label>
				  </div>
					<div class="col-md-6">
                    <textarea id="txtdescription" name="txtdescription" rows="5" class="form-control primary" value="<?php echo $rwHelp["description"]; ?>" readonly><?php echo $rwHelp["description"]; ?></textarea>
					<input type="hidden" value="<?php echo $_SESSION['SESS_USER_NAME']; ?>" name="txtsessionpersone" id="txtsessionpersone">
					<input type="hidden" value="<?php echo $helpid; ?>" name="txthelpid" id="txthelpid">
					
					</div>
					<div class="clearfix"></div><br>
					<div class="form-group col-md-2">
					<label>Content:</label></div>
					<div class="col-md-6">
                   <input type="text" name="txtcontent" id="txtcontent" class="form-control primary" />
					</div>
					
					
					<div class="clearfix"></div><br>
					<div class="form-group col-md-2">
					<label>Approved Date:</label></div>
					<div class="col-md-6">
                   <input type="date" name="txtapprovedate" id="txtapprovedate" class="form-control primary" />
					</div>
					
					<div class="col-md-6">
					<br>
					<button class="btn btn-flat btn-warning" id="btnApprove" name="btnApprove" type="submit">Approve</button>&nbsp;&nbsp;&nbsp;&nbsp;
					</div>
              </form>
			  <?php
				}
				}
				?>
            </div>
			
			<?php
			  if(isset($_POST["btnApprove"]))
			  {
				  $approve = $_POST["txtapprovedate"];
				  $content = $_POST["txtcontent"];
				  $helpid = $_POST["txthelpid"];
				  
				  if(mysql_query("update tbl_helpdesk set approveddate='$approve' ,approvedcontent='$content',modifieddate=NOW(),status=1 where HLP_id='$helpid'"))
				  {
					  echo "<script>
					  alert('Updated Successfully.......!!');
					  window.location='frmshowhelpdesk.php';
					  </script>";
				  }else
				  {
					  echo mysql_error();
				  }
			  }
			  ?>
          </div>
          </div>
          </div>
		  </section>
    <!-- /.content -->
  </div>
 
   <?php
 include_once('../global/footer.php');
 ?> 