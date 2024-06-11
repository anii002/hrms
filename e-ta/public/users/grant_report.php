<?php
  require_once("../../global/user_header.php");
  require_once("../../global/user_topbar.php");
  require_once("../../global/user_sidebar.php");
?>
  <div class="content-wrapper">
    <section class="content-header" style="background-color:#95e9a7; padding-left:20px;padding-bottom:10px;">
      <span class="col-sm-12">
        <span class="text-left" style="font-family: 'Raleway', sans-serif; font-weight: 600;">
  			Generate Grant Report
        </span>
        <span style="float: right">
        <button class=" btn btn-danger" onclick="history.go(-1);">Back</button>
      </span>
    </span>
    <div class="clearfix"></div>
    </section>
    <section class="content">

<?php

if(isset($_SESSION['empid']))
{

	?>
				<div class="box box-info">
				<form action="generated_grant_reprot.php" method="post">
					<div class="box-header">
						<h3 class="box-title">Select Two Dates</h3>
					</div>
					<div class="box-body">
						<div class="col-xs-12 table-responsive">
							<label class="control-label" for="from_date">Select Date</label>&emsp;&emsp;&emsp;
							<input type="month" id="from_date" name="from_date" required="required">&emsp;&emsp;&emsp;&emsp;
							<label class="control-label" for="to_date">Select To Date</label>&emsp;&emsp;&emsp;
							<input type="month" id="to_date" name="to_date" required="required">
							<br/>
							<br/>
							<input type="submit" class="btn btn-success" value="Generate Report"/>
						</div>
					</form>
					</div>
					<!-- /.box-body -->
				</div>

			<?php } ?>
			
    </section>
  </div>
  
  <!--Content code end here--->
 <?php
	require_once("../../global/footer.php");
 ?>
