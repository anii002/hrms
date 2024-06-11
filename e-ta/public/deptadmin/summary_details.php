<?php
 require_once("../../global/dept_admin_header.php");
  require_once("../../global/dept_admin_topbar.php");
  require_once("../../global/dept_admin_sidebar.php");
?>
<style>
	.font { 
		font-size: 18px;
		font-weight: bold;
	}
	.txt {
		border:none;
	}
	table, thead, tbody, th, td, tr {
		border: 1px solid black;
	}
</style>
  <div class="content-wrapper">
    <section class="content-header" style="background-color:#95e9a7; padding-left:20px;padding-bottom:10px;">
      <span class="col-sm-12">
        <span class="text-left" style="font-family: 'Raleway', sans-serif; font-weight: 600;">
  			Summary Details
        </span>
        <span style="float: right">
        <button class=" btn btn-danger" onclick="history.go(-1);">Back</button>
      </span>
    </span>
    <div class="clearfix"></div>
    </section>
    <section class="content">

<?php

if(isset($_SESSION['empid']) && isset($_REQUEST['subtn']))
{

	?>
				<div class="box box-info">
				<form action="control/adminProcess.php?action=generatesummary" method="post">
					<div class="box-header">
						<h3 class="box-title">Selected Claimed TA For Summary</h3>
					</div>
					<div class="box-body">
					<div class="col-xs-12 table-responsive">
					<?php 
					if(!isset($_REQUEST['selected_list']))
					{
						echo "<script>alert('Please select at least one employee to generate summary');
						window.location = history.go(-1);</script>";
					}
					function get_employee($id)
								{
									$query = mysql_query("select name from employees where pfno='$id'");
									$result = mysql_fetch_array($query);
									return $result['name'];
								}
						$selected_list = $_REQUEST['selected_list'];
						$cnt=0;
						echo "<table><thead><tr><th>Empid</th><th>Name</th><th>Reference</th></tr></thead><tbody>";
						foreach($selected_list as $list)
						{
							$query = mysql_query("select empid from taentryform_master where reference='".$list."'");
							$resultset = mysql_fetch_array($query);
							echo "<tr>
								<td><input type='text' class='txt' readonly name='selected_list_emp[$cnt]' value='".$resultset['empid']."'></td>
								<td><input type='text' class='txt' readonly name='selected_list_emp123[$cnt]' value='".get_employee($resultset['empid'])."'></td>
								<td><input type='text' class='txt' readonly name='selected_list[$cnt]' value='$list'></td>
							</tr>";
							/*echo "<div class='col-md-2 font'>Employee Number</div>
							<div class='col-md-2 font' style='float:left'><input type='text' class='txt' readonly name='selected_list_emp[$cnt]' value='".get_employee($resultset['empid'])."'></div>
							<div class='col-md-2 font'>TA Reference Number</div>
							<div class='col-md-2 font'><input type='text' class='txt' readonly name='selected_list[$cnt]' value='$list'></div><div class='clearfix'></div>";*/
							$cnt++;
						}
						echo "<tbody></table>";
					?>
					</div>
					<div class="col-md-12" style='margin-top:30px;'>
						<div class="col-md-1 col-xs-12 font">Title</div>
						<div class="col-md-3 col-xs-12"><input type="text" name="title" class="form-control" required></div>
						<div class="clearfix"></div><br>
						<div class="col-md-1 col-xs-12 font">Description</div>
						<div class="col-md-3 col-xs-12"><textarea name='description' class="form-control" required></textarea></div>
						<div class="clearfix"></div><br>
						<div class="col-md-1 col-xs-12 font"></div>
						<div class="col-md-2 col-xs-12"><button type="submit" class='btn btn-primary'>Submit</button></div>
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
