<?php
include_once('config.php');
include('mini_function.php');
// dbcon1();
$cnt=$_GET['dt'];
$sql=mysql_query("select * from pf_data where id=$cnt");
$fetch=mysql_fetch_array($sql);
// $fetch1=mysql_num_rows($sql);
// echo $fetch1;
 // echo "select * from pf_data where id=$cnt".mysql_error();
 $dept=get_department($fetch['dept']);
 $desig=get_designation($fetch['designation']);
 $office=get_depot($fetch['office']);
 $emp_name=$fetch['emp_name'];
 $ticket_no=$fetch['ticket_no'];
 $station=get_station($fetch['station']);
 $pay=$fetch['pay'];
 $pf=$fetch['pf_number'];
 $receive_amt=$fetch['receive_amt'];
 $withdrawn_amt=$fetch['withdrawn_amt'];
 $number_month=$fetch['number_month'];
 $amt_withdraw_reason=$fetch['amt_withdraw_reason'];
 $relation_member=$fetch['relation_member'];
 $adv_taken=$fetch['adv_taken'];
 $outstanding_adv=$fetch['outstanding_adv'];
 $loadn_applied_reason=$fetch['loadn_applied_reason'];
 $engagement_date=date('d-m-Y', strtotime($fetch['engagement_date']));
 $station_office=$fetch['station_office'];
 $date=date('d-m-Y', strtotime($fetch['date']));

 
?>

<html>
	<head>
		<title>Generated e-PF's</title>
		<style>
		@media print{
			#order_print{display:none;}
			
		}
		
		</style>
	</head>
	<body >
		<center><button class="btn btn-primary" style="font-size:18px;" id="order_print" onclick="myFunction();" name="order_print">Print</button></center>
		
		<script>
function myFunction() {
    window.print();
}
</script>
		
	<div style="padding:5px; page-break-after: always;">
	
		<table style="border-collapse:collapse" class="table table-bordered" width="100%">
			<tr>
				<td>C.R.P.No.00-11-0027-1,20,000 From-W-II-12-11</td>
				<td style="text-align:right"><span style="text-decoration:underline;">जी-पी 49/परिशोधक 1958</span><br><span  style="text-align:left;padding-right:20px;">G.P.39/Rev 1958</span></td>
			</tr>
		</table>
		<table class="table table-bordered" width="100%">
			<tr>
				<td style="text-align:center"><b>मध्य रेल / CENTRAL RAILWAY</span></b></td>
			</tr>
		</table>
		<table class="table table-bordered" width="100%">
			<tr>
				<td style="text-align:center"><b>अनिवार्य भविष्य - निधि जमा से अस्थायी तौर पर रूपया निकलने का आवेदन पत्र </b><br><b>Application for Tempoary withdrawal of Compulsary Provident Fund Deposites</b></td>
			</tr>
		</table>
		<table class="table table-bordered" width="100%" style="font-size:12px;">
			<tr>
				<td style="text-align:left" width="25%">विभाग / Department</td>
				<td style="text-align:left;text-decoration:underline;font-weight:800"><?php echo $dept;?></td>
				<td style="text-align:right">कार्यालय  / Office</td>
				<td style="text-align:right;text-decoration:underline;font-weight:800;font-size:11px;"><?php echo $office;?></td>
			</tr>
		</table>
		<hr style="border:1px solid black">
		<table class="table table-bordered" width="100%" style="font-size:13px;">
			<tr>
				<td width="3%" style="text-align:left">1</td>
				<td style="text-align:left" width="38%">आवेदक का नाम / Name of applicant</td>
				<td style="text-align:left;border-bottom:1px solid black" width="70%"><?php echo $emp_name;?> </td>
			</tr>
		</table>
		<table class="table table-bordered" width="100%" style="font-size:13px;">
			<tr>
				<td width="3%" style="text-align:left">2</td>
				<td style="text-align:left" width="38%">पदनाम / Designstion</td>
				<td style="text-align:left;border-bottom:1px solid black" width="70%"><?php echo $desig;?></td>
			</tr>
		</table>
		<table class="table table-bordered" width="100%" style="margin-top:10px;font-size:13px;">
			<tr>
				<td width="3%" style="text-align:left">3</td>
				<td style="text-align:left" width="23.5%" >टिकट क्रमांक / Ticket No.</td>
				<td style="text-align:left;border-bottom:1px solid black"width="23.5%"><?php echo $ticket_no;?></td>
				<td style="text-align:left" width="3%">&nbsp;4</td>
				<td style="text-align:left"width="23.5%" >स्टेशन / Station</td>
				<td style="text-align:left;border-bottom:1px solid black" width="23.5%"><?php echo $station;?></td>
			</tr>
		</table>
		<table class="table table-bordered" width="100%" style="margin-top:10px;font-size:13px;">
			<tr>
				<td width="3%" style="text-align:left">5</td>
				<td style="text-align:left" width="23.5%" >वेतन रु. / Pay Rs.</td>
				<td style="text-align:left;border-bottom:1px solid black"width="23.5%"><?php echo $pay;?></td>
				<td style="text-align:left" width="3%">&nbsp;6</td>
				<td style="text-align:left"width="23.5%">भविष्य निधि लेखा संख्या / PF NUMBER</td>
				<td style="text-align:left;border-bottom:1px solid black" width="23.5%"><?php echo $pf;?></td>
			</tr>
		</table>
		<table class="table table-bordered" width="100%" style="margin-top:10px;font-size:13px;">
			<tr>
				<td width="3%" style="text-align:left">7</td>
				<td style="text-align:left" width="48%">गत  वर्ष के प्रमाण पत्र के अनुसार निधि मैं अनिवार्य जमा रकम रु </td>
				<td style="text-align:left;border-bottom:1px solid black" width="60%"><?php echo $receive_amt;?></td>
			</tr><tr>
				<td width="3%" style="text-align:left"></td>
				<td style="text-align:left" width="58%">Amount of Compulsary Deposit in the fund as per last year's certificate Rs.</td>
				<td style="text-align:left;" width="50%"></td>
			</tr>
		</table>
		
		<table class="table table-bordered" width="100%" style="margin-top:10px;font-size:13px;">
			<tr>
				<td width="3%" style="text-align:left">8</td>
				<td style="text-align:left" width="48%">रकम जिसके निकालने के लिए आवेदन किया है रू </td>
				<td style="text-align:left;border-bottom:1px solid black" width="60%"><?php echo $withdrawn_amt;?></td>
			</tr>
			<tr>
				<td width="3%" style="text-align:left"></td>
				<td style="text-align:left" width="58%">Amount applied for to be withdrown Rs.</td>
				<td style="text-align:left;" width="50%"></td>
			</tr>
		</table>
		<table class="table table-bordered" width="100%" style="margin-top:10px;font-size:13px;">
			<tr>
				<td width="3%" style="text-align:left">9</td>
				<td style="text-align:left" width="48%">मासिक किश्तों की संख्या,जिनमे रुपये वसूल किया जायेगा </td>
				<td style="text-align:left;border-bottom:1px solid black" width="60%"><?php echo $number_month;?></td>
			</tr>
			<tr>
				<td width="3%" style="text-align:left"></td>
				<td style="text-align:left" width="58%">Number of monthly instalments be which the amount has to be recoverd</td>
				<td style="text-align:left;" width="50%"></td>
			</tr>
		</table>
		<table class="table table-bordered" width="100%" style="margin-top:10px;font-size:13px;">
			<tr>
				<td width="3%" style="text-align:left">10</td>
				<td style="text-align:left" width="48%">रूपया निकलने का कारण (यदि जिला चिकित्सा अधिकारी /प्राइवेट चिकित्सक कि सिफरिश पर बीमारी के कारण रूपया निकलना हो तो आवेदन पत्र के साथ डाक्टरी प्रमाणपत्र भेजना चाहिए ।  </td>
				<td style="text-align:left;border-bottom:1px solid black" width="60%"><?php echo $amt_withdraw_reason;?></td>
			</tr>
			<tr>
				<td width="3%" style="text-align:left"></td>
				<td style="text-align:left" width="58%">Reason for which required (Medical certificates should accomapny the application if the withdrawal is required on medical ground recommended by DMO.Private Doctor</td>
				<td style="text-align:left;" width="50%"></td>
			</tr>
		</table>
		<table class="table table-bordered" width="100%" style="margin-top:10px;font-size:13px;">
			<tr>
				<td width="3%" style="text-align:left">11</td>
				<td style="text-align:left" width="48%">यदि जमाकर्ता स्वयं अस्वस्थ न हो,तो परिवार के अस्वस्थ सदस्य के साथ उसका सम्बन्ध और क्या वह सदस्य उस पर आश्रित है ।</td>
				<td style="text-align:left;border-bottom:1px solid black" width="60%"><?php echo $relation_member;?></td>
			</tr>
			<tr>
				<td width="3%" style="text-align:left"></td>
				<td style="text-align:left" width="58%">Relationship of member of family who is il,if not subscriber himself/herself and whether dependent.</td>
				<td style="text-align:left;" width="50%"></td>
			</tr>
		</table>
		<table class="table table-bordered" width="100%" style="margin-top:10px;font-size:13px;">
			<tr>
				<td width="3%" style="text-align:left">12</td>
				<td style="text-align:left" width="58%">गत दो वर्ष मैं निकला गया अग्रिम धन / Advance teken during last 2 years.</td>
				<td style="text-align:left;border-bottom:1px solid black" width="50%"><?php echo $adv_taken;?></td>
			</tr>
		</table>
		<table class="table table-bordered" width="100%" style="margin-top:10px;font-size:13px;">
			<tr>
				<td width="3%" style="text-align:left">13</td>
				<td style="text-align:left" width="60%">पिछले अग्रिम धन का कोई बकाया / Outstanding from previous advance,if any.</td>
				<td style="text-align:left;border-bottom:1px solid black" width="48%"><?php echo $outstanding_adv;?></td>
			</tr>
		</table>
		<table class="table table-bordered" width="100%" style="margin-top:10px;font-size:13px;">
			<tr>
				<td width="3%" style="text-align:left">14</td>
				<td style="text-align:left" width="48%">क्या कर्मचारी ने सरकारी ऋण संस्था या ऐसी किसी अन्य संस्था से ऋण के लिए आवेदन किया था ? यदि हो ,तो उसका क्या परिणाम हुआ ?</td>
				<td style="text-align:left;border-bottom:1px solid black" width="60%"><?php echo $loadn_applied_reason;?></td>
			</tr>
			<tr>
				<td width="3%" style="text-align:left"></td>
				<td style="text-align:left" width="58%">Was loan applied for from the Employees Co-operative Credit Society or other such Institution?is so,what was the result?</td>
				<td style="text-align:left;" width="50%"></td>
			</tr>
		</table>
		<table class="table table-bordered" width="100%" style="margin-top:10px;font-size:13px;">
			<tr>
				<td width="3%" style="text-align:left">15</td>
				<td style="text-align:left" width="48%">आवेदन भूतपूर्व कम्पन्नी/राजकीय रेल भविष्य निधि नियमों द्वारा शासित है। उसकी नियुक्ति की तारीख</td>
				<td style="text-align:left;border-bottom:1px solid black" width="60%"><?php echo $engagement_date;?></td>
			</tr>
			<tr>
				<td width="3%" style="text-align:left"></td>
				<td style="text-align:left" width="58%"><b>The applicant is governed bt ex.Company/State Rly.p.F.Rules.His date of engagement is</b></td>
				<td style="text-align:left;" width="50%"></td>
			</tr>
		</table>
		
		<table class="table table-bordered" width="100%" style="margin-top:10px;font-size:13px;">
			<tr>
				<td width="3%" style="text-align:left"></td>
				<td style="text-align:left" width="23.5%" >पदनाम / Designstion</td>
				<td style="text-align:left;border-bottom:1px solid black"width="23.5%"><?php echo $station_office;?></td>
				<td style="text-align:left" width="3%"></td>
				<td style="text-align:left"width="23.5%" ></td>
				<td style="text-align:left;" width="23.5%"></td>
			</tr>
		</table>
		<table class="table table-bordered" width="100%" style="margin-top:10px;font-size:13px;">
			<tr>
				<td width="3%" style="text-align:left"></td>
				<td style="text-align:left" width="23.5%" >दिनांक /Date</td>
				<td style="text-align:left;border-bottom:1px solid black"width="23.5%"><?php echo $date;?></td>
				<td style="text-align:left" width="10%"></td>
				<td style="text-align:left;border-bottom:1px solid black"width="45.5%"></td>
				<td style="text-align:left;" width="23.5%"></td>
			</tr>
		</table>
		<table class="table table-bordered" width="100%" style="margin-top:10px;font-size:13px;">
			<tr>
				<td width="3%" style="text-align:left"></td>
				<td style="text-align:left" width="13.5%" ></td>
				<td style="text-align:left;"width="13.5%"></td>
				<td style="text-align:left" width="30%"></td>
				<td style="text-align:left;"width="45.5%"><b>आवेदक का हस्ताक्षर / Signature of Applicant</b></td>
				<td style="text-align:left;" width="5.5%"></td>
			</tr>
		</table>
		
	</div>
	
	</body>
</html>