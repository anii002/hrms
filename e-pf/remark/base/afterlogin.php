<?php 

include_once('global/header.php'); 
include_once('global/sidebar.php'); 
 

 
 
?>

 <!-- Page -->
 <div class="page" style="color:black;min-height:1550px;">
    <div class="page-content">
      <div class="card">
		  <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">e-PF Entry</h3>
        </div>
        <div class="panel-body container-fluid">
		<form method="POST" action="process.php?action=insert_rpf">
          <div class="row">
            <div class="col-lg-2"><label>भविष्य निधि लेखा संख्या / PF NUMBER</label></div>
				<div class="col-lg-4">
					<input type="text" id="e_pf_pfno"name="e_pf_pfno" class="form-control" placeholder="Enter 11 Digit PF Number" maxlength="11">
				</div>
				</div>
				<div class="row">
					<div class="col-lg-2 form-group">
						<label class="control-label"  style="text-align:left">आवेदक का नाम /<br>  Name of applicant</label>
					</div>
					<div class="col-lg-10 form-group ">
						<input type="text" style="text-align:left" id="emp_pf_name"name="emp_pf_name" class="form-control " placeholder="" readonly>	
					</div>
				</div>
				<div class="row">
					<div class="col-lg-2 form-group">
						<label class="pull-right" style="text-align:right">विभाग / Department</label>
					</div>
					<div class="col-lg-4 form-group ">
					<input type="hidden" id="hid_depart" name="hid_depart">
					 <input type="text" style="text-align:left" id="emp_pf_dept"name="emp_pf_dept" class="form-control " placeholder="" readonly>
					</div>
					 <div class="col-lg-2"><label>पदनाम / Designation</label></div>
				<div class="col-lg-4">
				<input type="hidden" id="hid_desig" name="hid_desig">
					 <input type="text" style="text-align:left" id="emp_pf_desig" name="emp_pf_desig" class="form-control " placeholder=""readonly>
				</div>
					
				</div><br>
		  <div class="row">
				<div class="col-lg-2 form-group">
					<label class="pull-right" style="text-align:right">कार्यालय / Office</label>
				</div>
				<div class="col-lg-4 form-group ">
				<input type="hidden" id="hid_office" name="hid_office">
				  <input type="text" style="text-align:left" id="emp_pf_depot" name="emp_pf_depot" class="form-control " placeholder=""readonly>
				</div>
				<div class="col-lg-2 form-group">
					<label>टिकट क्रमांक /<br> Ticket No.</label>
				</div>
				<div class="col-lg-4 form-group ">
				  <input type="text" style="text-align:left" id="emp_pf_ticket" name="emp_pf_ticket" class="form-control " placeholder="">
				</div>
          </div>
		  <div class="row">
				<div class="col-lg-2 form-group">
					<label class="pull-right" style="text-align:right">स्टेशन / Station</label>
				</div>
				<div class="col-lg-4 form-group ">
				<input type="hidden" id="hid_station" name="hid_station"> 
				  <input type="text" style="text-align:left" id="emp_pf_station" name="emp_pf_station" class="form-control " placeholder="" readonly>
				</div>
				<div class="col-lg-2 form-group">
					<label>वेतन रु. / Pay Rs.</label>
				</div>
				<div class="col-lg-4 form-group ">
				  <input type="text" id="emp_pf_pay" name="emp_pf_pay"  style="text-align:left" class="form-control " placeholder="" readonly>
				</div>
          </div><br>
		  <div class="row">
				<div class="col-lg-7 form-group">
					<label>गत  वर्ष के प्रमाण पत्र के अनुसार निधि मैं अनिवार्य जमा रकम रु <br>Amount of Compulsary Deposit in the fund as per last year's certificate Rs.</label>
				</div>
				<div class="col-lg-5 form-group ">
				  <input type="text" style="text-align:left" class="form-control" id="rec_amt" name="rec_amt" placeholder="">
				</div>
		  </div>
		  <div class="row">
				<div class="col-lg-7 form-group">
					<label>रकम जिसके निकालने के लिए आवेदन किया है रू / Amount applied for to be withdrown Rs.</label>
				</div>
				<div class="col-lg-5 form-group ">
				  <input type="text" style="text-align:left"id="withdrown_amt" name="withdrown_amt" class="form-control " placeholder="" required/>
				</div>
		  </div>
		  <div class="row">
			<div class="col-lg-2 form-group">
						<label class="pull-right" style="text-align:right">Withdrawn Type</label>
					</div>
					<div class="col-lg-4 form-group ">
					 <select class="form-control" data-plugin="select2" id="emp_t" name="emp_t" data-placeholder="Select Withdrawn Type"data-allow-clear="true" required>
						<option selected disabled></option>
						  <option value="perm">Permanent Withdrawn </option>
						  <option value="temp">Temporary Withdrawn </option>
					  </select>
					</div>
		  </div>
		  <div class="row" id="emp_typ" style="display:none">
				<div class="col-lg-7 form-group">
					<label>मासिक किश्तों की संख्या,जिनमे रुपये वसूल किया जायेगा <br>Number of monthly instalments be which the amount has to be recoverd</label>
				</div>
				<div class="col-lg-5 form-group ">
				  <input type="text" style="text-align:left" id="num_month" name="num_month" class="form-control " placeholder="" />
				</div>
		  </div>
		  
		  <div class="row">
				<div class="col-lg-7 form-group">
					<label>रूपया निकलने का कारण (यदि जिला चिकित्सा अधिकारी /प्राइवेट चिकित्सक कि सिफरिश पर बीमारी के कारण रूपया निकलना हो तो आवेदन पत्र के साथ डाक्टरी प्रमाणपत्र भेजना चाहिए । <br>Reason for which required (Medical certificates should accomapny the application if the withdrawal is required on medical ground recommended by DMO.Private Doctor</label>
				</div>
				<div class="col-lg-5 form-group ">
				  <textarea rows="3" style="resize:none;" id="amt_with_reason" name="amt_with_reason" class="form-control"></textarea>
				</div>
		  </div>
		  <div class="row">
				<div class="col-lg-7 form-group">
					<label> यदि जमाकर्ता स्वयं अस्वस्थ न हो,तो परिवार के अस्वस्थ सदस्य के साथ उसका सम्बन्ध और क्या वह सदस्य उस पर आश्रित है ।<br>Relationship of member of family who is il,if not subscriber himself/herself and whether dependent.</label>
				</div>
				<div class="col-lg-5 form-group ">
				  <input type="text" style="text-align:left" id="rel_mem" name="rel_mem" class="form-control " placeholder="" required/>
				</div>
		  </div>
		  <div class="row">
				<div class="col-lg-7 form-group">
					<label>गत दो वर्ष मैं निकला गया अग्रिम धन / Advance teken during last 2 years.</label>
				</div>
				<div class="col-lg-5 form-group ">
				  <input type="text" style="text-align:left" id="adv_tkn" name="adv_tkn" class="form-control " placeholder="" required/>
				</div>
		  </div>
		  <div class="row">
				<div class="col-lg-7 form-group">
					<label>पिछले अग्रिम धन का कोई बकाया / Outstanding from previous advance,if any.</label>
				</div>
				<div class="col-lg-5 form-group ">
				  <input type="text" style="text-align:left"id="outstn_adv" name="outstn_adv" class="form-control " placeholder="" required/>
				</div>
		  </div>
		  <div class="row">
				<div class="col-lg-7 form-group">
					<label>क्या कर्मचारी ने सरकारी ऋण संस्था या ऐसी किसी अन्य संस्था से ऋण के लिए आवेदन किया था ? यदि हो ,तो उसका क्या परिणाम हुआ ?<br>Was loan applied for from the Employees Co-operative Credit Society or other such Institution?is so,what was the result?</label>
				</div>
				<div class="col-lg-5 form-group ">
				  <textarea rows="3" style="resize:none;" id="loan_apply" name="loan_apply" class="form-control"></textarea>
				</div>
		  </div>
		  <div class="row">
				<div class="col-lg-7 form-group">
					<label>आवेदन भूतपूर्व कम्पन्नी/राजकीय रेल भविष्य निधि नियमों द्वारा शासित है। उसकी नियुक्ति की तारीख<br><b>The applicant is governed bt ex.Company/State Rly.p.F.Rules.His date of engagement is</b></label>
				</div>
				<div class="col-lg-5 form-group ">
				 <input type="date" id="eng_date"name="eng_date">
				</div>
		  </div> 
		  <div class="row">
				<div class="col-lg-1 form-group">
					<label><b>स्टेशन/कार्यालय<br>Station/Office</b></label>
				</div>&emsp;
				<div class="col-lg-2 form-group ">
				<input style="font-weight:800" id="emp_pf_off" name="emp_pf_off" type="text" readonly>
			
				</div>
		  </div>
		  <div class="row">
				<div class="col-lg-1 form-group">
					<label><b>दिनांक/Date</b></label>
				</div>&emsp;
				<div class="col-lg-2 form-group">
				
				<input style="text-decoration: underline;font-weight:800" type="text" id="fill_date" name="fill_date" value="<?php echo date("d-m-Y");?>" readonly>
				</div>
		  </div> 
		  
		  <div class="row">
				<div class="col-lg-4 form-group">
					
				</div>&emsp;
				<div class="col-lg-4 form-group ">
				<button type="submit" class="btn btn-primary">Save</button>
				</div>
		  </div>
		  </form><hr style="height:1px;color:#f39c12;background-color:#f39c12;">
		  <h4>Generated e-PF</h4><hr style="height:1px;color:#f39c12;background-color:#f39c12;">
		  <div class="row">
				<div class="table-responsive">
					<table width="100%" class="table table-bordered" border="1" style="border-collapse:collapse">
					<tr>
						<th>Sr No</th>
						<th>PF NO</th>
						<th>Generated Date</th>
						<th>Action</th>
					</tr>
					<tbody>
							<?php 
							include_once('config.php');
							$sql=mysql_query("select * from pf_data");
							$n=0;
							// print_r($fetd);
							while($fetd=mysql_fetch_array($sql))
							{
								$n++;
								$pf_no=$fetd['pf_number'];
								$gen_date=date('d-m-Y', strtotime($fetd['date']));
								echo "<tr>";
								echo"<td>$n</td>";
								echo"<td>$pf_no</td>";
								echo"<td>$gen_date</td>";
								echo"<td><a href='view_e_pf.php?dt=".$fetd['id']."' class='btn btn-primary'>View</a></td>";
								echo "<tr>";
							}
							?>
					</tbody>
					
					</table>
				</div>
		  </div>
        </div>
      </div>
	  </div>
    </div>
  </div>
  <!-- End Page -->
  <?php 
include_once('global/footer.php'); ?>
<script>


</script>
<script>
debugger;
$(document).ready(function () {
        $('#emp_t').change(function () {
            if ($('#emp_t').val() == 'temp') {
                $('#emp_typ').show();
            }
            else {
                $('#emp_typ').hide();
            }
        });
		
		$("#e_pf_pfno").change(function(){
		
			var bio_pf_no=$(this).val();
			//alert(bio_pf_no);
			$.ajax({
				type:'POST',
				url:'process.php',
				data:'action=fetchdata&bio_pf_no='+bio_pf_no,
				success:function(html){
					//alert(html);
					var data=JSON.parse(html);
						
						$("#emp_pf_name").val(data['emp_name']);
						$("#emp_pf_dept").val(data['preapp_department']);
						$("#emp_pf_desig").val(data['preapp_designation']);
						$("#emp_pf_pay").val(data['preapp_rop']);
						$("#emp_pf_station").val(data['preapp_station']);
						$("#emp_pf_off").val(data['preapp_station']);
						$("#emp_pf_depot").val(data['preapp_depot']);
						
						
						$("#hid_depart").val(data['preapp_department1']);
						$("#hid_desig").val(data['preapp_designation1']);
						$("#hid_station").val(data['preapp_station1']);    
						$("#hid_office").val(data['preapp_depot1']);
						
						
					 // window.location='afterlogin.php';
				} 
			});
		
		});
	});
    


</script>

