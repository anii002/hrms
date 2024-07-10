<?php
include_once('../dbconfig/dbcon.php');


 if (isset($_REQUEST['action'])) {
	switch (strtolower($_REQUEST['action'])) { 
	
	case 'get_family_form':
	$cnt=$_POST['cnt'];
	$data="";
	$daate=date('d/m/Y');
	$data="<h4><input type='hidden' id='curDate1' value='$daate'>&emsp;Family Member $cnt</h4><div class='row'><div class='col-md-6'><div class='form-group'><label class='control-label'>Member Name</label><div class='input-group'><span class='input-group-addon'><i class='fas fa-envelope'></i></span><input type='text' class='form-control' id='fam_mem_name_$cnt' name='fam_mem_name_$cnt' maxlength='30' placeholder=' '></div></div></div><div class='col-md-6'><div class='form-group'><label class='control-label'>Member Mobile No</label><div class='input-group'><span class='input-group-addon'><i class='fas fa-envelope'></i></span><input type='text' class='form-control' id='fam_mem_mobno_$cnt' onchange='m_phonenumber(this)' maxlength='10' name='fam_mem_mobno_$cnt' placeholder=' '></div></div></div></div><div class='row'><div class='col-md-6'><div class='form-group'><label class='control-label'>Member Pan No</label><div class='input-group'><span class='input-group-addon'><i class='fas fa-envelope'></i></span><input type='text' class='form-control' id='fam_mem_panno_$cnt' style='text-transform: uppercase; ' maxlength='10' name='fam_mem_panno_$cnt' onchange='m_pannumber(this)' placeholder=' '></div></div></div><div class='col-md-6'><div class='form-group'><label class='control-label'>Member Aadhar No </label><div class='input-group'><span class='input-group-addon'><i class='fas fa-envelope'></i></span><input type='text' class='form-control' id='fam_mem_aadharno_$cnt' maxlength='12' onchange='m_adharnumber(this)' name='fam_mem_aadharno_$cnt' placeholder=' '></div></div></div></div><div class='row'><div class='col-md-6'><div class='form-group'><label class='control-label'>Member Relation </label><select name='fam_mem_rel_$cnt' id='fam_mem_rel_$cnt' class='select2me form-control' style='width: 100%;' tabindex='-1' aria-hidden='true'><option value='' selected disabled>Select Status</option>";
  $con=dbcon1();
		$query_emp =mysqli_query($con,'SELECT * from relation');
	 while($value_emp = mysqli_fetch_array($query_emp))
		 {
			$data.="<option value='".$value_emp['code']."'>".$value_emp['longdesc']."</option>";
		 }									
		$data.="</select></div></div><div class='col-md-6'><div class='form-group'><label class='control-label'>Maritial Status </label><select name='fam_mem_maritial_st_$cnt' id='fam_mem_maritial_st_$cnt' class='select2me form-control' style='width: 100%;' tabindex='-1' aria-hidden='true'><option value='' selected disabled>Select Status</option>";
		$con=dbcon2();
		$query_emp =mysqli_query($con,'SELECT * from marital_status');
																		
		 while($value_emp = mysqli_fetch_array($query_emp))
		 {
		  	$data.="<option value='".$value_emp['code']."'>".$value_emp['shortdesc']."</option>";
		}							
		$data.="</select></div></div></div><div class='row'><div class='col-md-6'><div class='form-group'><label class='control-label'>Member DOB</label><div class='input-group'><span class='input-group-addon'><i class='fas fa-envelope'></i></span><input type='text' class='form-control calender_picker_dyn$cnt' id='fam_mem_dob_$cnt' name='fam_mem_dob_$cnt' placeholder=' '></div></div></div><div class='col-md-6'><div class='form-group'><label class='control-label'>Member Qualifiaction</label><div class='input-group'><span class='input-group-addon'><i class='fas fa-envelope'></i></span><input type='text' class='form-control dtpicker description$cnt' id='fam_mem_qualif_$cnt' name='fam_mem_qualif_$cnt' placeholder=''></div></div></div></div><div class='row'><div class='col-md-6'><div class='form-group'><label class='control-label'>Member Employed or Otherwise</label>
		<div class='input-group'><span class='input-group-addon'><i class='fas fa-envelope'></i></span><input type='text' class='form-control dtpicker description$cnt' id='fam_mem_employedorother_$cnt' name='fam_mem_employedorother_$cnt' placeholder=''></div></div></div></div><hr>";
		
		$data.="<script>$('.calender_picker_dyn$cnt').datepicker({format:'dd/mm/yyyy',autoclose:true,forceParse:false});$(document).on('input change paste', '.description$cnt', function() {var newVal = $(this).val().replace(/[^a-zA-Z0-9\s,-.\/\\_]/g, '');
        $(this).val(newVal);});
    function m_pannumber(inputtxt)
        { var phoneno = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/;  
          if((inputtxt.value.match(phoneno)))  
          {return true;}  
              else  
                {    
                    alert('Please enter in proper format... '); 
                    $('#fam_mem_panno_$cnt').val('');
                    $('#fam_mem_panno_$cnt').focus();
                    return false;  
                }  
        }
        function m_adharnumber(inputtxt)  
        {  
              var phoneno = /^\d{12}$/;  
              if((inputtxt.value.match(phoneno)))  
                {  return true;  }  
              else  
                {  
                    
                    alert('Adhar Card number must be of 12 digits'); 
                    $('#fam_mem_aadharno_$cnt').val('');
                    $('#fam_mem_aadharno_$cnt').focus();
                    return false;  
                }  
        }
        function m_phonenumber(inputtxt)  
    {  
    
      var phoneno = /^[6789]\d{9}$/;  
      if((inputtxt.value.match(phoneno)))  
      {  
        return true;  
        }  
        else  
        {  
        $('#fam_mem_mobno_$cnt').val('');
         $('#fam_mem_mobno_$cnt').focus();
        alert('Invalid Mobile number');  
        
        return false;  
        }  
    }
    $('#fam_mem_dob_$cnt').on('change', function(){
    var dob=$('#curDate1').val();
    var doa=$('#fam_mem_dob_$cnt').val();
    
    var parts = dob.split('/');
    var s=new Date(parts[2], parts[1] - 1, parts[0]);
    var parts1 = doa.split('/');
    var s1=new Date(parts1[2], parts1[1] - 1, parts1[0]);
    
    if(s1 >= s){
      alert('Please select valid Date of Birth');
      $('#fam_mem_dob_$cnt').val('');
      $('#fam_mem_dob_$cnt').focus();
    }
  });</script>";
	
	echo $data;
	break;
		
	}
}?>
