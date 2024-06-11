 <?php
	require_once("../global/header.php");
	require_once("../global/topbar.php");
	require_once("../global/sidebar.php");
?>



  <style type="text/css">
	  body{
		  background:white;
		  -webkit-print-color-adjust:exact;
	  }
      th{
        text-decoration: none;
		background:red;
      }
	  html{overflow:auto;}
	  .table>thead>tr>td
{
		  
	  }
      .table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
        border: 1px solid black;
        text-align: left;
		font-weight: bold;
		    line-height: .8;
			border-collapse: collapse;
      }
      tbody, tfoot {
        background-color: white;
      }
      .border {
        border: 1px solid black;
      }
      .bottom{
        border-bottom: 1px solid black;
      }
      .dark {
        border: 1px solid black;
      }
      .text{
        font-weight: bold;
        font-size: 16px;
      }
	  .id-1{
		  text-align:center;
		  background:#f9dd7b;
	  }
	
    </style>
<!--Content page--->
<form id="ppoprint">
  <div class="content-wrapper" style="background:white">
  
   <div class="row" id="abc" >
   <div style="text-align:left;margin-left:80px;font-size:18px;margin-top:5px;margin-bottom:60px;">
   To,<br/>
   Manager;<br/>
   ()
		   <div style="text-align:right;margin-right:80px;font-size:18px;margin-top:-80px;margin-bottom:60px;">
		   <p style="text-align:right">PPO Issuing Railway,<br/>
		   CENTRAL RAILWAY<br/>
		NEW ADMINSTRATIVE BLDG,D.N</br>
		ROAD,MUMBAI CSMT,MAHARASHTRA,400001   </p>
		<p><b>Dated:26/9/2017</b></p></div>
   </div>
   <h3 style="text-align:center;margin-top:-40px;">SUB: Seventh CPC Revised PPO. ( Pre-2016 )</h3>
   <table class="table" style="margin-left:20px; border:none;width:95%;border-collapse: collapse;">
				
                  <thead style="font-size: 14px; background-color:white;border:1px solid black">
                    <tr>
        <td colspan="4" class="id-1"><b>Pensioner Details</b></td>
    </tr>
    <tr>
        <td>Name of Pensioner</td>
        <td rowspan="1"></td>
        <td></td>
        <td rowspan="1"></td>
    </tr>
    <tr>
		<td>New PPO Number</td>
        <td></td>
		
        <td>Old PPO Number</td>
        <td></td>
		
    </tr>
    <tr>
        <td>Branch IFSC</td>
        <td></td>
		<td>Branch Name</td>
        <td></td>

    </tr>
    <tr>
        <td>Account Number :</td>
        <td></td>
		<td>Issue Date</td>
        <td></td>
    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  
                </table>
   </div>
   
   
   
     <div class="row"style="margin-top:5px;">
   <table class="table" style="margin-left:20px; border:none;width:95%;border-collapse: collapse;">
				
                  <thead style="font-size: 14px; background-color:white;border:1px solid black">
                    <tr>
        <td colspan="4" class="id-1"><b>Employee Details</b></td>
    </tr>
    <tr>
        <td>Name of Employee</td>
        <td rowspan="1"></td>
        <td>Emp-No</td>
        <td rowspan="1"></td>
    </tr>
    <tr>
		<td>Designation</td>
        <td></td>
        <td></td>
        <td></td>
		
    </tr>
    <tr>
        <td>Railway Unit</td>
        <td></td>
		<td>Cessation Reason</td>
        <td></td>
		

    </tr>
    <tr>
        <td>Staff Category</td>
        <td></td>
		<td>Department</td>
        <td></td>
    </tr>
	<tr>
        <td>Date of Birth</td>
        <td></td>
		<td>Date of Appointment</td>
        <td></td>
    </tr>
	<tr>
        <td style="font-size:16px">Date of Exit</td>
        <td></td>
		<td>Net Qlfyn Service(Yrs.)</td>
        <td></td>
    </tr>
	<tr>
        <td>Mobile Number</td>
        <td></td>
		<td>E-mail Id</td>
        <td></td>
    </tr>
	<tr>
        <td>Aadhar Number</td>
        <td></td>
		<td>PAN</td>
        <td></td>
    </tr>
                  </thead>
                  <tbody>
                    
                 
                  </tbody>
                  
                </table>
   </div>
   
   
     <div class="row"style="margin-top:-5px;">
   <table class="table" style="margin-left:20px; border:none;width:95%">
				
                  <thead style="font-size: 14px; background-color:white;border:1px solid black">
                    <tr>
        <td colspan="5" class="id-1"><b>Employee Details</b></td>
        <td colspan="3" class="td_print;" style="text-align:center;background:#f9dd7b;"><b>Concordance Table Number</b></td>
    </tr>
    <tr>
        <td>Sr.No</td>
        <td rowspan="1">Pay Commission</td>
        <td>Pay Scale</td>
        <td rowspan="1">Grade Pay</td>
		<td>Level</td>        
		<td>Last Pay/Notional Pay</td>        
    </tr>
    <tr>
		<td>1</td>
        <td>4th Pay Commission</td>
        <td></td>
        <td></td>
        <td></td>
        <td>Rs</td>
		
    </tr>
    <tr>
        <td>2</td>
        <td>5th Pay Commission</td>
		<td>Cessation Reason</td>
        <td></td>
		<td></td>
		<td>Rs</td>
		

    </tr>
    <tr>
        <td>3</td>
        <td>6th Pay Commission</td>
		<td>Department</td>
          <td></td>
          <td></td>
          <td>Rs</td>
    </tr>
	<tr>
        <td>4</td>
        <td>7th Pay Commission</td>
		<td>Date of Appointment</td>
        <td></td>
        <td></td>
        <td>Rs</td>
    </tr>
	
	
                  </thead>
                  <tbody>
                    
                 
                  </tbody>
                  
                </table>
   </div>
   
   <div class="row" style="margin-top:5px;">
    <table class="table" style="margin-left:20px; border:none;width:95%">
				
                  <thead style="font-size: 14px; background-color:white;border:1px solid black">
                    <tr>
        <td colspan="6" class="id-1"><b>Revised Pension Details</b></td>
    </tr>
    <tr>
        <td>Sr.No</td>
        <td rowspan="1">Start Date</td>
        <td>Pension Amount</td>
        <td rowspan="1">Enhanced Family pension</td>
        <td>EFP End Date</td>
        <td>Normal Family Pension</td>
    </tr>
    <tr>
		<td>1</td>
        <td>1/1/2016</td>
        <td>Rs</td>
        <td></td>
        <td></td>
        <td></td>
		
    </tr>
   
    
                  </thead>
                  <tbody>
                  </tbody>
                  
                </table>
   </div>
   <div class="row">
     <table class="table" style="margin-left:20px;margin-top:10px; border:none;width:95%;">
				
                  <thead style="font-size: 14px; background-color:white;border:1px solid black;">
                   <tr>
        <td>Commutation</td>
        <td>No Change</td>
        <td>Fixed Medical Allowance</td>
        <td>as opted for/Sanctioned</td>
		
    </tr>
   
    
                  </thead>
                  <tbody>
                  </tbody>
                  
                </table>
   </div>
<div class="row">
<div style="text-align:left;margin-left:30px;font-size:14px;margin-top:20px;">
  <b> For PFA (Pension)</b>
   
		   <div style="text-align:right;margin-right:80px;font-size:18px;margin-top:-80px;margin-bottom:60px;">
		   <b><p style="text-align:right;margin-top:45px;font-size:14px;">Account Officer<br/>Headquater<br/></b>
		</p></div>
   </div>
</div>
   <!-- Page 2 Stat -->
   <div class="row" >
   <table class="table" style="margin-left:20px; border:none;width:95%">
				
                  <thead style="font-size: 14px; background-color:white;border:1px solid black">
                    <tr>
        <td colspan="4" class="id-1"><b>Pensioner Details</b></td>
    </tr>
    <tr>
        <td>Name of Pensioner</td>
        <td rowspan="1"></td>
        <td></td>
        <td rowspan="1"></td>
    </tr>
    <tr>
		<td>New PPO Number</td>
        <td></td>
		
        <td>Old PPO Number</td>
        <td></td>
		
    </tr>
    <tr>
        <td>Branch IFSC</td>
        <td></td>
		<td>Branch Name</td>
        <td></td>

    </tr>
    <tr>
        <td>Account Number :</td>
        <td></td>
		<td>Issue Date</td>
        <td></td>
    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  
                </table>
   </div>
   
   <div class="row" style="margin-top:5px;">
    <table class="table" style="margin-left:20px; border:1px solid black;width:95%">
				
                  <thead style="font-size: 14px; background-color:white;border:1px solid black;">
                    <tr style="border:1px solid black;">
        <td colspan="6" class="id-1"><b>Dependent Family Member Details</b></td>
    </tr>
    <tr>
        <td>Sr.No</td>
        <td rowspan="1">Family Member Name</td>
        <td>Relation With Employee</td>
        <td rowspan="1">Date Of Birth</td>
        <td>Aadhar No </td>
        
    </tr>
    <tr>
		<td>1</td>
        <td>abc</td>
        <td>wife</td>
        <td>1/1/1960</td>
        <td></td>
    </tr>        </thead>
                  
                </table>
   </div>
   
   <div class="row" style="margin-top:5px;">
    <table class="table" style="margin-left:20px; border:none;width:95%">
				
                  <thead style="font-size: 14px; background-color:white;border:1px solid black">
                    <tr>
        <td colspan="9" style="text-align:center;background:#f9dd7b;" class="id-1" media="print"><b>Additional Pension/ Family Pension payable on attanining age of 80 years and above</b></td>
    </tr>
    <tr>
        <td>Sr.No</td>
        <td rowspan="1">Age Of Pensioner</td>
        <td>Percentage</td>
        <td rowspan="1">Date</td>
        <td>Additional Quantum of pension</td>
        <td>Age of Family Pensioner</td>
        <td>Percentage</td>
        <td>Date</td>
        <td>Additional family pension</td>
        
    </tr>
    <tr>
		<td>1</td>
        <td>80</td>
        <td>20%</td>
        <td>1/7/2040</td>
        <td>5520</td>
        <td>80</td>
        <td>20%</td>
        <td>1/06/2041</td>
        <td>0</td>
    </tr>  
	<tr>
		<td>2</td>
        <td>85</td>
        <td>30%</td>
        <td>1/7/2045</td>
        <td>5520</td>
        <td>85</td>
        <td>30%</td>
        <td>1/06/2041</td>
        <td>0</td>
    </tr> 
	
	<tr>
		<td>3</td>
        <td>90</td>
        <td>20%</td>
        <td>1/7/2050</td>
        <td>5520</td>
        <td>90</td>
        <td>40%</td>
        <td>1/06/2041</td>
        <td>0</td>
    </tr> 
	<tr>
		<td>4</td>
        <td>95</td>
        <td>50%</td>
        <td>1/7/2055</td>
        <td>5520</td>
        <td>95</td>
        <td>50%</td>
        <td>1/06/2041</td>
        <td>0</td>
    </tr> 
	<tr>
		<td>5</td>
        <td>100</td>
        <td>100%</td>
        <td>1/7/2060</td>
        <td>5520</td>
        <td>100</td>
        <td>100%</td>
        <td>1/06/2041</td>
        <td>0</td>
    </tr> 


	</thead>
                  <tbody>
                  </tbody>
                </table>
   </div>
   
   <div class="row"style="margin-left:15px;">
   <p>
   1.New PPO number mentioned above may be updated in database against existing PPO number and shown in debit scroll(eScroll)<br/>
2.Arrears of pension/family pension w.e.f 1.1.2016 wherever due, may be paid after preparing due and drawn statements.</br>
3.Any major discrepancy in name/account number/PPO number may be reported back to railway immediately for recitification.</br>
4.In the case of PSU absorbees (Employed Pensioner), payment of dearness relief may be regulated as per extant rules.</br>
5.Prior confirmation from railway may be obtained for commencement of family pension to dependent family member (other that spouse)</br>
6.All other therms and conditions already mentioined in earlier PPO/Revised PPO (including commutation) remains unchanged.</br></br>
Note: Pensioner may register for My Account at www.arpan.railnet.gov.in for viewing PPO details.</p>


<div class="row">
<div style="text-align:left;margin-left:30px;font-size:14px;margin-top:20px;">
  <b> Pensioner Address</b>
   <label></label></p>
   </div>
   </div>
   
   <div class="row">
<div style="text-align:left;margin-left:30px;font-size:14px;margin-top:60px;">
  <div style="text-align:left;margin-left:10px;font-size:14px;margin-top:90px;">
  <b> Pensioner Address</b>
   <label></label></p>
   </div>
   
		   <div style="text-align:right;margin-right:80px;font-size:18px;margin-top:-70px;">
		   <b><p style="text-align:right;margin-top:45px;font-size:14px;">Account Officer<br/>Solapur<br/></b>
		</p></div>
   </div>
</div>

</div>
<div class="row">
	<div class="row no-print">
        <div class="col-xs-12">
          <a href="#" class="btn btn-default" onclick="myfunction()"><i class="fa fa-print"></i> Print</a><!--invoice-print.html-->
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
</div>
   </div>
   </form>
   
   
   <!-- Page 2 End -->
   
  <!--</div>-->
  <!--Content code end here--->
  <script>
  function myfunction() {
	 var w = screen.width;
	 var h = screen.height;
	   //alert("Width : "+w+" Height :"+h);
        var toPrint = document.getElementById('ppoprint');
        var popupWin = window.open('', '_blank', 'width='+w+',height='+h+',location=no,left=0px');
        popupWin.document.open();
        popupWin.document.write('<html><title></title><link rel="stylesheet" type="text/css" href="css/print.css" /></head><body onload="window.print()">')
        popupWin.document.write(toPrint.innerHTML);
        popupWin.document.write('</html>');
        popupWin.document.close();
    }
	// function myfunction(){
		// window.print();
	// }
  </script>
 <?php
	require_once("../global/footer.php");
 ?>