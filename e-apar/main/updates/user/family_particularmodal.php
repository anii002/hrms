<?php
session_start();
include_once('header.php');
include_once('topbar.php');
include_once('sidebar.php');
?>
<link href="style.css" rel="stylesheet" type="text/css" />
<SCRIPT src="http://code.jquery.com/jquery-2.1.1.js"></SCRIPT>
<SCRIPT>
function addMore() {
	$("<div>").load("input.php", function() {
			$("#product").append($(this).html());
	});	
}
function deleteRow() {
	$('div.product-item').each(function(index, item){
		jQuery(':checkbox', this).each(function () {
            if ($(this).is(':checked')) {
				$(item).remove();
            }
        });
	});
}
</SCRIPT>
<style>

.primary
{

 box-shadow: none;
 border-color: none;
}

</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Family Particulars Details
      </h1>

	  <br>
    </section>
	
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	   <div class="box box-info">
            <!--div class="box-header with-border">
              <h3 class="box-title">Registered List</h3>

              <div class="box-tools pull-right">
              </div>
            </div-->
			
		<form name="frmProduct" method="post" action="">
			<div class="col-md-12 col-sm-12">
				<div id="header" class="col-md-12">
					<div class="float-left">&nbsp;</div>
					<div class="clearfix"></div>
					 <div class="form-group col-md-4 col-sm-4">
					<label>PPO No:</label>
					<?php 
					
					  if(isset($_GET["reg_id"])!='')
						{
		
						$reg_no=$_GET["reg_id"];
						//$ppo_no=$_GET["ppono"];
						$selectppo=mysql_query("select * from tbl_registration where reg_id='$reg_no'");
						$rwPPono=mysql_fetch_array($selectppo);
						$rowppo=$rwPPono["ppono"];
						//echo "$rowppo";
						}
					?>
				
					<input type="text" name="txtrowppo" id="txtrowppo" class="form-control primary" value="<?php echo $rowppo; ?>" readonly />
					</div>
					<div class="form-group col-md-4 col-sm-4">
					<label>Date</label><input type="date" name="txtdate" id="txtdate" class="form-control primary"/>
					</div>
					<input type="hidden" name="txtsession" id="txtsession" class="form-control primary" value="<?php echo $_SESSION['SESS_NAME']; ?>" />
				</div>
				<DIV class="product-item float-clear" >
					<table >
					<tr>
					<td style="width:50px;">
							<DIV ><input type="checkbox" name="item_index[]"style="display:none;"/>
							</DIV>
					</td>
					<td  style="margin-left:50px;">
							<div class="col-heading float-left" style="width:200px;">&nbsp;&nbsp;&nbsp;Name
							</div>
					</td>
					<td  style="margin-left:50px;width:200px">	<div class="col-heading float-left" style="width:150px;">&nbsp;&nbsp;&nbsp;DOB
							</div>
					</td>
					<td  style="margin-left:50px;width:200px">	<div class="col-heading float-left" style="width:150px;">&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;Relation
							</div>
					</td>
					<td  style="margin-left:50px;width:200px">
							<div class="col-heading float-left" style="width:150px;" >&nbsp;&nbsp;&nbsp;&nbsp;Aadhar No
							</div>
					</td>
					</td>
					<tr>
					</table>
				</DIV>
			</div>
					<div id="product">
					<?php require_once("input.php") ?>
					</div>
			<div class="btn-action float-clear">
					<input type="button" name="add_item" value="Add More" onClick="addMore();" />
					<input type="button" name="del_item" value="Delete" onClick="deleteRow();" />
					<span class="success"><?php if(isset($message)) { echo $message; }?></span>
			</div>
				<div class="clearfix"></div>
				<input type="submit" name="save" value="Save" />
				
			</div>
		</form>
		</div>
		<?php
	if(!empty($_POST["save"])) {
		//include('lib/dbcon.php');
		$itemCount = count($_POST["item_name"]);
		$rowppo=$_POST["txtrowppo"];
		$date=$_POST["txtdate"];
		$session=$_POST["txtsession"];
		$itemValues=0;
		$query = "INSERT INTO tbl_familyparticulars (ppoid,name,relation,aadharno,dob,createdby,createddate) VALUES ";
		$queryValue = "";
		for($i=0;$i<$itemCount;$i++) {
			if(!empty($_POST["item_name"][$i]) || !empty($_POST["item_relation"][$i]) || !empty($_POST["item_aadhar"][$i]) || !empty($_POST["item_dob"][$i])) 
			{
				$itemValues++;
				if($queryValue!="") {
					$queryValue .= ",";
				}
				$queryValue .= "('".$rowppo."','" . $_POST["item_name"][$i] . "', '" . $_POST["item_relation"][$i] . "','" . $_POST["item_aadhar"][$i] . "','" . $_POST["item_dob"][$i] . "','".$session."',NOW())";
			}
		}
		$sql = $query.$queryValue;
		if($itemValues!=0) {
			$result = mysql_query($sql);
			if(!empty($result))
			{
			echo "<script>
			alert('Family Details Added Successfully!!!!!');
			window.location='userlist.php';
			</script>";
			
			}
		}
	}
?>
	</section>	
</div>

<?php
include_once('footer.php');
?>