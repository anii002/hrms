<?php
include("lib/dbcon.php");
dbcon();
session_start();



//$Flag=$_POST["Flag"];


	$regid=$_POST["txtregid"];
	$indexno=$_POST["txtindexno"];
	$ppono=$_POST["txtppono"];
	$fullname=$_POST["txtfullname"];
	$designation=$_POST["txtdesignation"];
	$station=$_POST["txtstation"];
	$dept=$_POST["txtdept"];
	$dateofbirth=$_POST["txtdateofbirth"];
	$dateretirment=$_POST["txtdateretirment"];
	$email=$_POST["txtemail"];
	$retirement=$_POST["cmbretirement"];
	$address=$_POST["txtaddress"];
	$pfaccount=$_POST["txtpfaccount"];
	$service=$_POST["txtservice"];
	$rateofpay=$_POST["txtrateofpay"];
	$scale=$_POST["txtscale"];
	$pension=$_POST["txtpension"];
	$enhance=$_POST["txtenhance"];
	$normal=$_POST["txtnormal"];
	$gratuity=$_POST["txtgratuity"];
	$ngisamount=$_POST["txtngisamount"];
	$quarterno=$_POST["txtquarterno"];
	$vacation=$_POST["txtvacation"];
	$bank=$_POST["txtbank"];
	$branch=$_POST["txtbranch"];
	$ifsccode=$_POST["txtifsccode"];
	$acountno=$_POST["txtacountno"];
	$optionsRadios=$_POST["optionsRadios"];
	$relhsamount=$_POST["txtrelhsamount"];
	$fd=$_POST["txtfd"];
	$name1=$_POST["txtname1"];
	$relation=$_POST["txtrelation"];
	$reldateofbirth=$_POST["txtreldateofbirth"];
	$reaadharno=$_POST["txtreaadharno"];
	$peraddress=$_POST["txtperaddress"];
	$addharno=$_POST["txtaddharno"];
	$contact=$_POST["txtcontact"];
	$sessionpersone=$_POST["txtsessionpersone"];
	
	if(mysql_query("insert into tbl_registration(reg_id, registerno, ppono, fullname, designation, station, department,
	dateofbirth, dateofretirment,typeofretirement,email,address, pfaccountno, qualifyingservice, rateofpay, scale, pension, enhance, normal,
	gratuityno, ngisamount, railwayquarter, dateofvacation, nameofbank, namebranch, ifsccode, accountno,
	relhsoption, relhsamount, fd, fname, relation, redateofbirth, reaadharno, peraddress, pensioneraadhar,
	pensionercontact, date,modifydate,createdby,createddate,status)
	VALUES ('$regid', '$indexno', '$ppono', '$fullname', '$designation', '$station', '$dept', '$dateofbirth', '$dateretirment','$retirement', '$email',
	 '$address', '$pfaccount', '$service', '$rateofpay', '$scale', '$pension', '$enhance', '$normal', '$gratuity', '$ngisamount',
	'$quarterno', '$vacation', '$bank', '$branch', '$ifsccode', '$acountno', '$optionsRadios', '$relhsamount', '$fd', '$name1', '$relation',
	'$reldateofbirth', '$reaadharno', '$peraddress','$addharno','$contact',NOW(),NOW(),'$sessionpersone',NOW(),0)"))
	{
				echo "<script>
				alert('Your Record Saved Successfully!!!!!');
				window.location = 'registration.php';
				</script>";
	}else
	{
	echo mysql_error();
	}
	
?>