<?php
$GLOBALS['flag']="5.12";
include('common/header.php');
include('common/sidebar.php');
?>
			
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.php">Home / मुख पृष्ठ</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Summary Details</a>
					</li>
				</ul>
				
			</div>
			<!-- <h1>ecefce</h1> -->
			<?php 
				foreach($_POST['selected_list'] as $list)
						{
							 $list;
							// echo '
							// 	<input type="text" name="TAYear"  value="'.$_POST['TAYear'].'" >
							// 	<input type="text" name="TAMonth" value="'.$_POST['TAMonth'].'">
							// ';
						}
			?>
			
			<div class="row">

<?php if(isset($_SESSION['empid']) && isset($_REQUEST['subtn'])) { 	?>
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						
						<div class="portlet-title">
							<div class="caption">
								Selected Claimed Contigency For Summary
							</div>
							<div class="tools">
							</div>
						</div>
						<div class=" ">
							<form action="control/adminProcess.php?action=generatesummarycont" method="post">

								<div class="col-xs-12 table-responsive">
					<?php 
					if(!isset($_REQUEST['selected_list']))
					{
						echo "<script>alert('Please select at least one employee to generate summary');
						window.location = history.go(-1);</script>";
					}
					function get_employee($id)
								{
									global $conn;
									$query = mysqli_query($conn,"SELECT name from employees where pfno='$id'");
									$result = mysqli_fetch_array($query);
									return $result['name'];
								}
						$selected_list = $_REQUEST['selected_list'];
						$cnt=0;
						//echo "<table class=''><thead><tr><th>Empid</th><th>Name</th><th>Reference</th></tr></thead><tbody>";
						foreach($selected_list as $list)
						{
							$query = mysqli_query($conn,"SELECT empid,year,month from continjency_master where reference='".$list."'");
							$resultset = mysqli_fetch_array($query);

							// echo $y=$resultset['TAYear'];
							// echo $m=$resultset['TAMonth'];
							

							echo "<tr>
							<input type='hidden' class='txt' readonly name='dept_id' value='".$_SESSION['dept']."'>
							<input type='hidden' class='txt' readonly name='year' value='".$resultset['year']."'>
							<input type='hidden' class='txt' readonly name='month[]' value='".$resultset['month']."'>
								<td><input type='hidden' class='txt' readonly name='selected_list_emp[$cnt]' value='".$resultset['empid']."'></td>
								<td><input type='hidden' class='txt' readonly name='selected_list_emp123[$cnt]' value='".get_employee($resultset['empid'])."'></td>
								<td><input type='hidden' class='txt' readonly name='selected_list[$cnt]' value='$list'></td>
							</tr>";
							$cnt++;
						}
						echo "<tbody></table>";
					?>
					</div>
					<input type="hidden" name="summary_id" id="summary_id">
					<!--  -->
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
					</div>		
<?php } ?>			
				</div>				
			</div>			
		</div>
	</div>
<?php
	include 'common/footer.php';
?>
<script type="text/javascript">
	var sumid=Math.floor(Math.random()*90000) + 10000;
    
    $("#summary_id").val(sumid);
</script>