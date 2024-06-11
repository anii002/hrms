<?php
include_once('../dbconfig/dbcon.php');
include('mini_function.php');
dbcon1();
$cnt=$_GET['dt'];
$sql=mysql_query("select * from online_office_order where count=$cnt");
$fetch=mysql_fetch_array($sql);
// $fetch1=mysql_num_rows($sql);
// echo $fetch1;
// echo "select * from online_office_order where count='$cnt'".mysql_error();
?>

<html>
	<head>
		<title>Generated Order</title>
		<style>
		@media print{
			#order_print{display:none;}
			
		}
		
		</style>
	</head>
	<body>
		<center><button class="btn btn-primary" style="font-size:18px;" id="order_print" onclick="myFunction();" name="order_print">Print</button></center>
		
		<script>
function myFunction() {
    window.print();
}
</script>
		
	<div style="padding:20px; page-break-after: always;">
	
		<table style="border-collapse:collapse" class="table table-bordered" width="100%">
			<tr>
				<td>Central Railway<br><br>No.<span><?php echo $fetch['division'];?></span>/<?php echo get_designation($fetch['office_order_desig']);?></td>
				<td style="text-align:right">DRM Office,<br>'P'/Br Solapur<br>Dt.<?php echo date('d-m-Y', strtotime($fetch['order_date'])); ?></td>
			</tr>
		</table><br>
		<table class="table table-bordered" width="100%">
			<tr>
				<td style="text-align:center"><b>Office Order No :<span><?php echo $fetch['officee_order_no']; ?> </span></b></td>
			</tr>
		</table>
		<table class="table table-bordered" width="100%" style="min-height:20px">
			<tr>
				<td style="text-align:left"><b>Sub :&nbsp;<span style=" word-wrap: break-word;"></b><?php echo $fetch['subject']; ?> </span></td>
			</tr>
		</table>
		<center><label>= = = =</label><center>
		<table class="table table-bordered" width="100%" style="min-height:15px">
			<tr>
				<td style="text-align:left"><span style=" word-wrap: break-word;">&emsp;&emsp;&emsp;<?php echo $fetch['description']; ?> </span></td>
			</tr>
		</table>
		<table class="table table-bordered" border="1" style="border-collapse:collapse" width="100%">
			<tr>
				<th width="5%">Sr No.</th>
				<th>Name (S/Shri)</th>
				<th>Present Desig/Level</th>
				<th>Future Desig/Level</th>
				<th>To be Promoted against</th>
				
			</tr>
			<?php 
			dbcon1();
				$cnt1=0;
				$sql1=mysql_query("select * from online_office_order where count=$cnt");
				// echo "select * from online_office_order where count=$cnt".mysql_error();
				// $abc=mysql_num_rows($sql1);
				// echo $abc;
				while($fetch1=mysql_fetch_array($sql1))
				{
					$cnt1++;
					$name=$fetch1['emp_name'];
					$desig=get_designation($fetch1['emp_old_desig']);
					$old_lvl=$fetch1['emp_old_lvl'];
					$old_scale=$fetch1['emp_old_scale'];
					$new_desig=get_designation($fetch1['emp_new_desig']);
					$new_scale=$fetch1['emp_new_scale'];
					$new_lvl=$fetch1['emp_new_lvl'];
					$remark=$fetch1['remark'];
					// echo "name".$name;
				
					echo"<tr>";
					echo"<td style='word-wrap: break-word;padding-left:5px'>$cnt1</td>";
					echo"<td style='word-wrap: break-word;padding-left:5px'>$name</td>";
					echo"<td style='word-wrap: break-word;padding-left:5px'>$desig<br/>$old_scale $old_lvl</td>";
					echo"<td style='word-wrap: break-word;padding-left:5px'>$new_desig<br/>$new_scale $new_lvl</td>";
					echo"<td style='word-wrap: break-word;padding-left:5px'>$remark</td>";
					echo"</tr>";
				}
			?>
			
		</table>
	</div>
	<table class="table table-bordered" width="100%" style="min-height:15px">
			<tr>
				<td style="text-align:left"><span style="word-wrap: break-word;">&emsp;&emsp;&emsp;<?php echo $fetch['long_description']; ?> </span></td>
			</tr>
	</table>
	<table class="table table-bordered" width="100%" style="min-height:15px">
			<tr>
				<td style="text-align:justify"><p style="word-wrap: break-word;">&emsp;&emsp;Fixation of pay will be done as per extant rules on the subject.Above named employee eilgible to excercise an option with in a period of 1 month for fixation of pay on promotion in the manner as laid down in RB's letter No. F (E)II/89/FR-1/1 dated 12/12/1991 amendment 2 the IREC Vol. II (VI adition 87).However those space who have already awarded higher grade under MSCP scheme are not entitled for pay fixation on pay promotion on their regular promotion as it is the same grade granted under MSCP in reference to Para 4 of Annexure of Railway Board's letter No.PC-5/2009/ACP/2 dated 10.06.2009. Option once excercised shall be final. </p>
				<p style="word-wrap: break-word;">&emsp;&emsp;It is responsibility of controlling supervisor to inform concern staff accordingly.The date of shouldering higher responsibilities of the employee should be advised to all concerned without fail.</p>
				<p style="word-wrap: break-word;">&emsp;&emsp;The promotion is also subject to disposal of Writ Petitions/appeals/applications pending in Honorable Supreme Court/Higher Court of CAT as the case may in occupation before carrying out ther transfer/promotion order.</p>
				<p style="word-wrap: break-word;">&emsp;&emsp;Above promotion shall be subject to outcome of the main SLPs and the contempt petition mentioned in the Railwat Board's letter No.2016-E(SCT)1|25/8 dated 30.09.2016(RBE NO.117/2016).</p>
				<p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;This has the approval of the competent authority</p>
				</td>
			</tr>
	</table>
		<table style="border-collapse:collapse" class="table table-bordered" width="100%">
			<tr>
				<td style="text-align:right"><span></span></td>
				<td style="text-align:right"></td>
			</tr>
		</table><br>
	
	</body>
</html>