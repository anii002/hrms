<?php
include('lib/dbcon.php');
dbcon();
session_start();

error_reporting(0);

		if(isset($_POST['btnUpdate']))
			{
				$regid=$_POST['txtregid'];
				$indexno=$_POST['txtindexno'];
				$ppono=$_POST['txtppono'];
				$fullname=$_POST['txtfullname'];
				$designation=$_POST['txtdesignation'];
				$station=$_POST['txtstation'];
				$dept=$_POST['txtdept'];
				$dateofbirth=$_POST['txtdateofbirth'];
				$dateretirment=$_POST['txtdateretirment'];
				$email=$_POST['txtemail'];
				$retirement=$_POST['cmbretirement'];
				$address=$_POST['txtaddress'];
				$pfaccount=$_POST['txtpfaccount'];
				$service=$_POST['txtservice'];
				$rateofpay=$_POST['txtrateofpay'];
				$scale=$_POST['txtscale'];
				$pension=$_POST['txtpension'];
				$enhance=$_POST['txtenhance'];
				$normal=$_POST['txtnormal'];
				$gratuity=$_POST['txtgratuity'];
				$ngisamount=$_POST['txtngisamount'];
				$quarterno=$_POST['txtquarterno'];
				$vacation=$_POST['txtvacation'];
				$bank=$_POST['txtbank'];
				$branch=$_POST['txtbranch'];
				$ifsccode=$_POST['txtifsccode'];
				$acountno=$_POST['txtacountno'];
				$optionsRadios=$_POST['optionsRadios'];
				$relhsamount=$_POST['txtrelhsamount'];
				$fd=$_POST['txtfd'];
				$name1=$_POST['txtname1'];
				$relation=$_POST['txtrelation'];
				$reldateofbirth=$_POST['txtreldateofbirth'];
				$reaadharno=$_POST['txtreaadharno'];
				$peraddress=$_POST['txtperaddress'];
				$addharno=$_POST['txtaddharno'];
				$contact=$_POST['txtcontact'];
				

				if(mysql_query("update tbl_registration set registerno='".$indexno."',ppono='".$ppono."',fullname='".$fullname."',
				designation='".$designation."',station='".$station."',department='".$dept."',dateofbirth='".$dateofbirth."',dateofretirment='".$dateretirment."',address='".$address."',
				typeofretirement='".$retirement."',email='".$email."',pfaccountno='".$pfaccount."',rateofpay='".$rateofpay."'
				,qualifyingservice='".$service."',scale='".$scale."',pension='".$pension."',enhance='".$enhance."',normal='".$normal."',
				gratuityno='".$gratuity."',nameofbank='".$bank."',namebranch='".$branch."',ifsccode='".$ifsccode."',accountno='".$acountno."',
				ngisamount='".$ngisamount."',railwayquarter='".$quarterno."',dateofvacation='".$vacation."',relhsoption='".$optionsRadios."',
				relhsamount='".$relhsamount."',fd='".$fd."',fname='".$name1."',relation='".$relation."',redateofbirth='".$reldateofbirth."',
				reaadharno='".$reaadharno."',peraddress='".$peraddress."',pensionercontact='".$contact."',
				modifydate=NOW() where reg_id='$regid' "))
					{
							echo "<script>
							alert('Your Record Updated Successfully!!!!!');
							window.location = 'registration.php';
							</script>"; 
							
					}else
					{
					echo mysql_error();
					//echo "error";
					}
			}
		
		
		
		
		
				if(isset($_POST['btnFinish']))
				{
					$regid=$_POST['txtregid'];
					$indexno=$_POST['txtindexno'];
					$ppono=$_POST['txtppono'];
					$fullname=$_POST['txtfullname'];
					$designation=$_POST['txtdesignation'];
					$station=$_POST['txtstation'];
					$dept=$_POST['txtdept'];
					$dateofbirth=$_POST['txtdateofbirth'];
					$dateretirment=$_POST['txtdateretirment'];
					$email=$_POST['txtemail'];
					$retirement=$_POST['cmbretirement'];
					$address=$_POST['txtaddress'];
					$pfaccount=$_POST['txtpfaccount'];
					$service=$_POST['txtservice'];
					$rateofpay=$_POST['txtrateofpay'];
					$scale=$_POST['txtscale'];
					$pension=$_POST['txtpension'];
					$enhance=$_POST['txtenhance'];
					$normal=$_POST['txtnormal'];
					$gratuity=$_POST['txtgratuity'];
					$ngisamount=$_POST['txtngisamount'];
					$quarterno=$_POST['txtquarterno'];
					$vacation=$_POST['txtvacation'];
					$bank=$_POST['txtbank'];
					$branch=$_POST['txtbranch'];
					$ifsccode=$_POST['txtifsccode'];
					$acountno=$_POST['txtacountno'];
					$optionsRadios=$_POST['optionsRadios'];
					$relhsamount=$_POST['txtrelhsamount'];
					$fd=$_POST['txtfd'];
					$name1=$_POST['txtname1'];
					$relation=$_POST['txtrelation'];
					$reldateofbirth=$_POST['txtreldateofbirth'];
					$reaadharno=$_POST['txtreaadharno'];
					$peraddress=$_POST['txtperaddress'];
					$addharno=$_POST['txtaddharno'];
					$contact=$_POST['txtcontact'];
					

					if(mysql_query("update tbl_registration set registerno='".$indexno."',ppono='".$ppono."',fullname='".$fullname."',
					designation='".$designation."',station='".$station."',department='".$dept."',dateofbirth='".$dateofbirth."',dateofretirment='".$dateretirment."',address='".$address."',
					typeofretirement='".$retirement."',email='".$email."',pfaccountno='".$pfaccount."',rateofpay='".$rateofpay."'
					,qualifyingservice='".$service."',scale='".$scale."',pension='".$pension."',enhance='".$enhance."',normal='".$normal."',
					gratuityno='".$gratuity."',nameofbank='".$bank."',namebranch='".$branch."',ifsccode='".$ifsccode."',accountno='".$acountno."',
					ngisamount='".$ngisamount."',railwayquarter='".$quarterno."',dateofvacation='".$vacation."',relhsoption='".$optionsRadios."',
					relhsamount='".$relhsamount."',fd='".$fd."',fname='".$name1."',relation='".$relation."',redateofbirth='".$reldateofbirth."',
					reaadharno='".$reaadharno."',peraddress='".$peraddress."',pensionercontact='".$contact."',
					modifydate=NOW(),status=1 where reg_id='$regid' "))
						{
								echo "<script>
								alert('User Registration Completed Successfully!!!!!');
								window.location = 'registration.php';
								</script>"; 
								
						}else
						{
						echo mysql_error();
						//echo "error";
						}
					
				}
?>