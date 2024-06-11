<?php 
 session_start();
$GLOBALS['a'] = 'sr_hist';
include_once('../global/header.php');
include_once('../global/topbar.php');
//include_once('../global/sidebaradmin.php');
include('mini_function.php');
include_once('../dbconfig/dbcon.php');
dbcon1();
include('create_log.php');
$action_on=$_SESSION['set_update_pf'];
$action="Visited Biodata tab History tab On SR History";
create_log($action,$action_on);
?>
<style>

.table tbody tr td {
    border: 1px solid black;
    border-collapse: collapse;
}
.labelhed{
	font-size:17px;
	font-weight:400;
}
.labelhdata{
	font-size:17px;
	
}.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(Preloader_3.gif) center no-repeat #fff;
}
table {text-transform:uppercase;}
h1{text-transform:uppercase;}
h2{text-transform:uppercase;}
h3{text-transform:uppercase;}
h4{text-transform:uppercase;}
h5{text-transform:uppercase;}

.box.box-solid.box-warning>.box-header {
    color: #131212;
    background: #50a9dc;
    background-color: #50a9dc;
}
</style>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script>
	//paste this code under head tag or in a seperate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>
 			
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<ul class="nav nav-tabs" style="border-bottom: 0px solid #ddd;">
					<li class="active"><a href="#bio" data-toggle="tab" class="visit_tab" id="biodata_hist"><b>Bio-data</b></a></li> 
					<li class="present_works "><a href="#present_work" data-toggle="tab" class="visit_tab" id="present_work_hist"><b>Present Working Details</b></a></li>
					<li class=""><a href="#awards" data-toggle="tab" class="visit_tab" id="awards_hist"><b>Awards</b></a></li>
					<li class=""><a href="#penalty" data-toggle="tab" class="visit_tab" id="penalty_hist"><b>Penalty</b></a></li> 
					<li class=""><a href="#advance" data-toggle="tab" class="visit_tab" id="advance_hist"><b>Advance</b></a></li>
					<li class=""><a href="#family" data-toggle="tab" class="visit_tab" id="family_hist"><b>Family Composition</b></a></li>
					<li class=""><a href="#training" data-toggle="tab" class="visit_tab" id="training_hist"><b>Training</b></a></li>
					<li class=""><a href="#property" data-toggle="tab" class="visit_tab" id="property_hist"><b>Property</b></a></li>
					<li class=""><a href="#nominee" data-toggle="tab" class="visit_tab" id="nominee_hist"><b>Nominee</b></a></li>
					<li class=""><a href="#prft" data-toggle="tab" class="visit_tab" id="prft_hist"><b>PRFT</b></a></li>
				</ul>     	 
			</div>	 
	<div class="modal-body" >
		<div class="row">
			<div class="box-body"> 
				<div class="tab-content">
				
<!--Bio-data Start-->
<div class="tab-pane active in" id="bio">
	<div class="table-responsive" style="padding:20px;">
	   <h3>&nbsp;&nbsp;Bio-data Details</h3>
	    <hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
	       <label class="control-label labelhdata" style="color:black;margin-left:400px;font-size:18px">Note : Click On Icons For Bio-data History</label>
		<table border="1" class="table table-bordered"  style="width:100%">
			<tbody>
			<?php
			dbcon1();
			$bio_pf_no=$_GET['pf'];
			$cnt=1;
		    $i=0;
			$sql1=mysql_query("select distinct(count) from biodata_track where pf_number='$bio_pf_no'");
			
			if($sql1)
			  {
				while($res=mysql_fetch_assoc($sql1))
				{
				    $get_cnt=$res['count'];
			        if($get_cnt!=0)
				    dbcon1();
					$sql=mysql_query("select * from  biodata_track where pf_number='$bio_pf_no' and count='$get_cnt' and id!=(SELECT MAX(id) FROM biodata_track) ORDER by id desc");
					
					$count_records=mysql_num_rows($sql);
					$sql_last=mysql_query("select * from  biodata_track where pf_number='$bio_pf_no' and count='$get_cnt' ORDER by id desc limit 1");
					
					//echo "count_records1".$count_records;
					$data_last=[];
					 while($fetch_sql_last=mysql_fetch_array($sql_last))
					{
                       $data_last=$fetch_sql_last;
				    }					 
					$data=[];
		            $bio_diff=[];
			        while($fetch_sql=mysql_fetch_array($sql))
					{
						$data[$cnt]=$fetch_sql;
						if($count_records>=1)
						  {
								$temp=$cnt;
								$bio_pf_number=$data_last['pf_number'];
								$bio_oldpf_number=$data_last['oldpf_number'];
								$bio_sr_no=$data_last['sr_no'];

					if($data[$temp]['identity_number']!=$data_last['identity_number'])          $bio_diff[0]=1;
					if($data[$temp]['dob']!=$data_last['dob'])                                  $bio_diff[1]=1;
					if($data[$temp]['mobile_number']!=$data_last['mobile_number'])              $bio_diff[2]=1;
					if($data[$temp]['emp_name']!=$data_last['emp_name'])                		$bio_diff[3]=1;
					if($data[$temp]['emp_old_name']!=$data_last['emp_old_name'])				$bio_diff[4]=1;
					if($data[$temp]['f_h_name']!=$data_last['f_h_name'])						$bio_diff[5]=1;
					if($data[$temp]['cug']!=$data_last['cug'])									$bio_diff[6]=1;
					if($data[$temp]['aadhar_number']!=$data_last['aadhar_number'])				$bio_diff[7]=1;
					if($data[$temp]['email']!=$data_last['email'])								$bio_diff[8]=1;
					if($data[$temp]['pan_number']!=$data_last['pan_number'])					$bio_diff[9]=1;
					if($data[$temp]['present_address']!=$data_last['present_address'])			$bio_diff[10]=1;
					if($data[$temp]['pre_statecode']!=$data_last['pre_statecode'])				$bio_diff[11]=1;
					if($data[$temp]['pre_pincode']!=$data_last['pre_pincode'])					$bio_diff[12]=1;
					if($data[$temp]['permanent_address']!=$data_last['permanent_address'])		$bio_diff[13]=1;
					if($data[$temp]['per_statecode']!=$data_last['per_statecode'])				$bio_diff[14]=1;
					if($data[$temp]['per_pincode']!=$data_last['per_pincode'])					$bio_diff[15]=1;
					if($data[$temp]['identification_mark']!=$data_last['identification_mark'])	$bio_diff[16]=1;
					if($data[$temp]['religion']!=$data_last['religion'])						$bio_diff[17]=1;
					if($data[$temp]['community']!=$data_last['community'])						$bio_diff[18]=1;
					if($data[$temp]['caste']!=$data_last['caste'])								$bio_diff[19]=1;
					if($data[$temp]['gender']!=$data_last['gender'])							$bio_diff[20]=1;
					if($data[$temp]['marrital_status']!=$data_last['marrital_status'])			$bio_diff[21]=1;
					if($data[$temp]['recruit_code']!=$data_last['recruit_code'])				$bio_diff[22]=1;
					if($data[$temp]['group_col']!=$data_last['group_col'])						$bio_diff[23]=1;
					if($data[$temp]['education_ini']!=$data_last['education_ini'])				$bio_diff[24]=1;
					if($data[$temp]['edu_desc_ini']!=$data_last['edu_desc_ini'])				$bio_diff[25]=1;
					if($data[$temp]['education_sub']!=$data_last['education_sub'])				$bio_diff[26]=1;
					if($data[$temp]['edu_desc_sub']!=$data_last['edu_desc_sub'])				$bio_diff[27]=1;
					if($data[$temp]['bank_name']!=$data_last['bank_name'])						$bio_diff[28]=1;
					if($data[$temp]['account_number']!=$data_last['account_number'])			$bio_diff[29]=1;
					if($data[$temp]['micr_number']!=$data_last['micr_number'])					$bio_diff[30]=1;
					if($data[$temp]['ifsc_code']!=$data_last['ifsc_code'])						$bio_diff[31]=1;
					if($data[$temp]['reis_no']!=$data_last['reis_no'])							$bio_diff[32]=1;
					if($data[$temp]['ruid_no']!=$data_last['ruid_no'])							$bio_diff[33]=1;
					if($data[$temp]['nps_no']!=$data_last['nps_no'])							$bio_diff[34]=1;
					if($data[$temp]['bank_address']!=$data_last['bank_address'])				$bio_diff[35]=1;
				} 
				//End of if
						
				        else{
					 
					$sql=mysql_query("select * from  biodata_track where pf_number='$bio_pf_no'");
					if($sql){
						($fetch_sql=mysql_fetch_array($sql));
						  {
							$bio_pf_number = $fetch_sql['pf_number'];
							$bio_oldpf_number = $fetch_sql['oldpf_number'];
							$bio_sr_no = $fetch_sql['sr_no'];
							$bio_identity_number = $fetch_sql['identity_number'];
							$bio_dob = $fetch_sql['dob'];
							$bio_mobile_number = $fetch_sql['mobile_number'];
							$bio_empname = $fetch_sql['emp_name'];
							$bio_oldempname = $fetch_sql['emp_old_name'];
							$bio_f_h_name = $fetch_sql['f_h_name'];
							$bio_cug = $fetch_sql['cug'];
							$bio_aadhar_number = $fetch_sql['aadhar_number'];
							$bio_email = $fetch_sql['email'];
							$bio_pan_number = $fetch_sql['pan_number'];
							$bio_present_address = $fetch_sql['present_address'];
							$bio_pre_statecode = $fetch_sql['pre_statecode'];
							$bio_pre_pincode = $fetch_sql['pre_pincode'];
							$bio_permanent_address = $fetch_sql['permanent_address'];
							$bio_per_statecode = $fetch_sql['per_statecode'];
							$bio_per_pincode = $fetch_sql['per_pincode'];
							$bio_identification_mark = $fetch_sql['identification_mark'];
							$bio_religion = get_religion($fetch_sql['religion']);
							$bio_community = get_community($fetch_sql['community']);
							$bio_caste = $fetch_sql['caste'];
							$bio_gender = get_gender($fetch_sql['gender']);
							$bio_marrital_status = got_mr($fetch_sql['marrital_status']);
							$bio_recruit_code = get_recruitment_code($fetch_sql['recruit_code']);
							$bio_group_col = get_group($fetch_sql['group_col']);
							$bio_education_ini = get_initial_edu($fetch_sql['education_ini']);
							$bio_edu_desc_ini = $fetch_sql['edu_desc_ini'];
							$bio_education_sub = get_sub_edu($fetch_sql['education_sub']);
							$bio_edu_desc_sub = $fetch_sql['edu_desc_sub'];
							$bio_bank_name = $fetch_sql['bank_name'];
							$bio_account_number = $fetch_sql['account_number'];
							$bio_micr_number = $fetch_sql['micr_number'];
							$bio_ifsc_code = $fetch_sql['ifsc_code'];
							$bio_reis_no = $fetch_sql['reis_no'];
							$bio_ruid_no = $fetch_sql['ruid_no'];
							$bio_nps_no = $fetch_sql['nps_no'];
							$bio_bank_address = $fetch_sql['bank_address']; 
							 
						 }
					}
				} 
				//End of else
				
              $cnt++;
			 		} //End of while
					
					if($bio_diff[0]==1)
					{ echo "sjdj=".$bio_diff[0];
						$bio_identity_number=$data_last['identity_number']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='identity_number' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
					}
					else{
						$bio_identity_number=$data_last['identity_number'];
					}
					
					if($bio_diff[1]==1)
					{ 
						$bdob=$data_last['dob'];
						$bio_dob=date('d-m-Y',strtotime($bdob)).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="dob" class="fa fa-info-circle click_awards visit" data-toggle="modal" tbl_name="biodata_track" col_nm="pf_number" getcount='.$get_cnt.' data-target="#delete" ></span>';
					}
					else{
						  $bio_dob=$data_last['dob'];
					}

                    if($bio_diff[2]==1)
					{ 
						 $bio_mobile_number=$data_last['mobile_number']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='mobile_number' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";	 
					}
					else{
						  $bio_mobile_number=$data_last['mobile_number'];
					}
					if($bio_diff[3]==1)
					{ 
						 $bio_empname=$data_last['emp_name']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='emp_name' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";	 
					}
					else{
						  $bio_empname=$data_last['emp_name'];
					}	
					if($bio_diff[4]==1)
					{ 
						 $bio_oldempname=$data_last['emp_old_name']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='emp_old_name' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";	 
					}
					else{
						  $bio_oldempname=$data_last['emp_old_name'];
					}    
					
					if($bio_diff[5]==1)
					{ 
						 $bio_f_h_name=$data_last['f_h_name']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='f_h_name' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";	 
					}
					else{
						  $bio_f_h_name=$data_last['f_h_name'];
					}	
					
					if($bio_diff[6]==1)
					{ 
						 $bio_cug=$data_last['cug']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='cug' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";	 
					}
					else{
						  $bio_cug=$data_last['cug'];
					}

					if($bio_diff[7]==1)
					{ 
						 $bio_aadhar_number=$data_last['aadhar_number']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='aadhar_number' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";	 
					}
					else{
						  $bio_aadhar_number=$data_last['aadhar_number'];
					}	    
					if($bio_diff[8]==1)
					{ 
						 $bio_email=$data_last['email']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='email' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";	 
					}
					else{
						  $bio_email=$data_last['email'];
					}
					if($bio_diff[9]==1)
					{ 
						 $bio_pan_number=$data_last['pan_number']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='pan_number' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";	 
					}
					else{
						  $bio_pan_number=$data_last['pan_number'];
					}
					
					if($bio_diff[10]==1)
					{ 
						 $bio_present_address=$data_last['present_address']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='present_address' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";	 
					}
					else{
						  $bio_present_address=$data_last['present_address'];
					}
					
					if($bio_diff[11]==1)
					{ 
						 $bio_pre_statecode=$data_last['pre_statecode']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='pre_statecode' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";	 
					}
					else{
						  $bio_pre_statecode=$data_last['pre_statecode'];
					}
					
					if($bio_diff[12]==1)
					{ 
						 $bio_pre_pincode=$data_last['pre_pincode']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='pre_pincode' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";	 
					}
					else{
						  $bio_pre_pincode=$data_last['pre_pincode'];
					}
   
					if($bio_diff[13]==1)
					{ 
						 $bio_permanent_address=$data_last['permanent_address']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='permanent_address' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";	 
					}
					else{
						  $bio_permanent_address=$data_last['permanent_address'];
					}
					
					if($bio_diff[14]==1)
					{ 
						 $bio_per_statecode=$data_last['per_statecode']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='per_statecode' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";	 
					}
					else{
						  $bio_per_statecode=$data_last['per_statecode'];
					}
					
					if($bio_diff[15]==1)
					{ 
						 $bio_per_pincode=$data_last['per_pincode']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='per_pincode' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";	 
					}
					else{
						  $bio_per_pincode=$data_last['per_pincode'];
					}
					
					if($bio_diff[16]==1)
					{ 
						 $bio_identification_mark=$data_last['identification_mark']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='identification_mark' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";	 
					}
					else{
						  $bio_identification_mark=$data_last['identification_mark'];
					}
					
					if($bio_diff[17]==1){
						$bio_religion=get_religion($data_last['religion'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='religion' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else{
							$bio_religion=get_religion($data_last['religion']);
						}
					if($bio_diff[18]==1){
						$bio_community=get_community($data_last['community'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='community' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else{
							$bio_community=get_community($data_last['community']);
						}
						if($bio_diff[19]==1){
						$bio_caste=$data_last['caste']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='caste' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else{
							$bio_caste=$data_last['caste'];
						}
						
						
						if($bio_diff[20]==1){
							$bio_gender=get_gender($data_last['gender'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='gender' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else{
							$bio_gender=get_gender($data_last['gender']);
						}
						
						if($bio_diff[21]==1){
						$bio_marrital_status=got_mr($data_last['marrital_status'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='marrital_status' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else{
							$bio_marrital_status=got_mr($data_last['marrital_status']);
						}
						
						if($bio_diff[22]==1){
							$bio_recruit_code=get_recruitment_code($data_last['recruit_code'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='recruit_code' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else{
							$bio_recruit_code=get_recruitment_code($data_last['recruit_code']);
						}
						
						if($bio_diff[23]==1){
						$bio_group_col=get_group($data_last['group_col'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='group_col' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else{
							$bio_group_col=get_group($data_last['group_col']);
						}
						
						if($bio_diff[24]==1){
						$bio_education_ini=get_initial_edu($data_last['education_ini'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='education_ini' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else{
							$bio_education_ini=get_initial_edu($data_last['education_ini']);
						}
						
						if($bio_diff[25]==1){
						$bio_edu_desc_ini=$data_last['edu_desc_ini']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='edu_desc_ini' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else{
							$bio_edu_desc_ini=$data_last['edu_desc_ini'];
						}
						
						if($bio_diff[26]==1){
						$bio_education_sub=get_sub_edu($data_last['education_sub'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='education_sub' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else{
							$bio_education_sub=get_sub_edu($data_last['education_sub']);
						}
						
						if($bio_diff[27]==1){
						$bio_edu_desc_sub=$data_last['edu_desc_sub']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='edu_desc_sub' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else{
							$bio_edu_desc_sub=$data_last['edu_desc_sub'];
						}
						
						if($bio_diff[28]==1){
						$bio_bank_name=$data_last['bank_name']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='bank_name' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else{
							$bio_bank_name=$data_last['bank_name'];
						}
						
						if($bio_diff[29]==1){
						$bio_account_number=$data_last['account_number']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='account_number' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else{
							$bio_account_number=$data_last['account_number'];
						}
						
						if($bio_diff[30]==1){
						$bio_micr_number=$data_last['micr_number']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='micr_number' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else{
							$bio_micr_number=$data_last['micr_number'];
						}
						
						if($bio_diff[31]==1){
						$bio_ifsc_code=$data_last['ifsc_code']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='ifsc_code' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else{
							$bio_ifsc_code=$data_last['ifsc_code'];
						}
						
						if($bio_diff[32]==1){
						$bio_reis_no=$data_last['reis_no']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='reis_no' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else{
							$bio_reis_no=$data_last['reis_no'];
						}
						
						if($bio_diff[33]==1){
						$bio_ruid_no=$data_last['ruid_no']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='ruid_no' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else{
							$bio_ruid_no=$data_last['ruid_no'];
						}
						
				    	if($bio_diff[34]==1){
						$bio_nps_no=$data_last['nps_no']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='nps_no' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else{
							$bio_nps_no=$data_last['nps_no'];
						}
						
						if($bio_diff[35]==1){
						$bio_bank_address=$data_last['bank_address']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='bank_address' data-toggle='modal' tbl_name='biodata_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else{
							$bio_bank_address=$data_last['bank_address'];
						}
					 
					?>
					
				 <tr>
				
							<td><label class="control-label labelhed " >PF Number</label></td>
							<td> <label class="control-label labelhdata"> <?php echo $bio_pf_number ?></label></td>
							<td><label class="control-label labelhed " > Old PF Number</label></td>
							<td  > <label class="control-label labelhdata"> <?php echo $bio_oldpf_number ?></label></td><td><label class="control-label labelhed" >SR NO</label></td>
							<td>  <label class="labelhdata labelhdata"><?php echo $bio_sr_no ?></label></td>
							</tr>
							 
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Date Of Birth<span class=""></span></label></td>
							<td><label class="control-label labelhdata"><?php echo date('d-m-Y', strtotime($bio_dob)); ?></label></td>
							<td><label class="control-label labelhed" >ID Card Number<span class=""></span></label></td>
							<td><label class="control-label labelhdata"><?php echo $bio_identity_number ?></label></td>
							<td><label class="control-label labelhed" >Aadhar Number<span class=""></span></label></td>
							<td><label class="control-label labelhdata"><?php echo $bio_aadhar_number ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Employee Name</label></td>
							<td><label class="control-label labelhdata"><?php echo $bio_empname ?></label></td>
							<td><label class="control-label labelhed" >Employee Old Name</label></td>
							<td><label class="control-label labelhdata"><?php echo $bio_oldempname ?></label></td><td><label class="control-label labelhed" >Gender</label></td>
							<td><label class="control-label labelhdata"><?php echo $bio_gender ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Marital Status</label></td>
							<td><label class="control-label labelhdata"><?php echo $bio_marrital_status ?></label></td>
							<td><label class="control-label labelhed" >Father/Husband Name</label></td>
							<td><label class="control-label labelhdata"><?php echo $bio_f_h_name ?></label></td>
							<td><label class="control-label labelhed">CUG Number</label></td>
							<td><label class="control-label labelhdata"><?php echo $bio_cug ?></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Personal Mobile Number</label></td>
							<td><label class="control-label labelhdata"><?php echo $bio_mobile_number; ?></label></td>
							<td><label class="control-label labelhed" >PAN No</label></td>
							<td><label class="control-label labelhdata"><?php echo $bio_pan_number; ?></label></td>
							<td><label class="control-label labelhed" >PRAN Number</label></td>
							<td><label class="control-label labelhdata"><?php echo $bio_nps_no; ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >RUID Number</label></td>
							<td><label class="control-label labelhdata"><?php echo $bio_ruid_no; ?></label></td>
							<td><label class="control-label labelhed" >E-mail Id</label></td>
							<td colspan="3"><label class="control-label labelhdata"><?php echo $bio_email; ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Persent Address</label></td>
							<td><label class="control-label labelhdata"><?php echo $bio_present_address; ?></label></td>
							<td><label class="control-label labelhed" >State Code</label></td>
							<td><label class="control-label labelhdata"><?php echo $bio_pre_statecode; ?></label></td>
							<td><label class="control-label labelhed" >Pincode</label></td>
							<td><label class="control-label labelhdata"><?php echo $bio_pre_pincode; ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Permanent Address</label></td>
							<td><label class="control-label labelhdata"><?php echo $bio_permanent_address; ?></label></td>
							<td><label class="control-label labelhed" >State Code</label></td>
							<td><label class="control-label labelhdata"><?php echo $bio_per_statecode; ?></label></td>
							<td><label class="control-label labelhed" >Pincode</label></td>
							<td><label class="control-label labelhdata"><?php echo $bio_per_pincode; ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Identification Mark</label></td>
							<td colspan="5"><label class="control-label labelhdata"><?php echo $bio_identification_mark; ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Religion</label></td>
							<td><label class="control-label labelhdata"><?php echo $bio_religion; ?></label></td>
							<td><label class="control-label labelhed" >Community</label></td>
							<td><label class="control-label labelhdata"><?php echo $bio_community; ?></label></td><td><label class="control-label labelhed" >Caste</label></td>
							<td><label class="control-label labelhdata"><?php echo $bio_caste; ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Recruitment Code/<br>Appointment Type</label></td>
							<td colspan="1"><label class="control-label labelhdata"><?php echo $bio_recruit_code; ?></label></td><td><label class="control-label labelhed" >Group</label></td>
							<td colspan="3"><label class="control-label labelhdata"><?php echo $bio_group_col; ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Education Qualification at the time of Initial Appointment</label></td>
							<td colspan="1"><label class="control-label labelhdata"><?php echo $bio_education_ini; ?></label></td><td><label class="control-label labelhed" >Education Qualification at the time of Subsequent</label></td>
							<td colspan="3"><label class="control-label labelhdata"><?php echo $bio_education_sub; ?></label></td>
						</tr>
				        <tr>
							<td><label class="control-label labelhed " >Bank Name</label></td>
							<td> <label class="control-label labelhdata"><?php echo $bio_bank_name; ?></label></td>
							<td><label class="control-label labelhed" >Account No</label></td>
							<td><label class="labelhdata labelhdata"><?php echo $bio_account_number; ?></label></td>
							<td><label class="control-label labelhed" >MICR Number</label></td>
							<td><label class="control-label labelhdata"><?php echo $bio_micr_number; ?></label></td>
						</tr>
						<tr>
							
							<td><label class="control-label labelhed" >IFSC No</label></td>
							<td><label class="control-label labelhdata"><?php echo $bio_ifsc_code; ?></label></td>
								<td><label class="control-label labelhed" >Bank Address</label></td>
							<td colspan="5"><label class="control-label labelhdata"><?php echo $bio_bank_address; ?></label></td>
						</tr>
						 
				 
                 
				<tr>
				<tr><td colspan="6" style="background-color:gray"></td></tr>
				</tr>  
				<?php 
				 	
				}

			}				
				?>
			</tbody>
		</table>
	</div>
	 
</div>
<!-- Bio-data End  -->





		<!-- Present Working Start  -->
<div class="tab-pane" id="present_work">
	    <hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
	       <label class="control-label labelhdata" style="color:black;margin-left:400px;font-size:18px">Note : Click On Icons For Present Working History</label>
		 
			 
			<?php
			dbcon1();
			$pre_pf_no=$_GET['pf'];
			$cnt=1;
		    
			$sql1=mysql_query("select distinct(count) from present_work_track where preapp_pf_number='$pre_pf_no'");
                        
			
			if($sql1)
			  {
				while($res=mysql_fetch_assoc($sql1))
				{
				    $get_cnt=$res['count'];
			        if($get_cnt!=0)
				    dbcon1();
					$sql=mysql_query("select * from  present_work_track where preapp_pf_number='$pre_pf_no' and count='$get_cnt' and id!=(SELECT MAX(id) FROM present_work_track) ORDER by id desc");
					
					$count_records=mysql_num_rows($sql);
					$sql_last=mysql_query("select * from  present_work_track where preapp_pf_number='$pre_pf_no' and count='$get_cnt' ORDER by id desc limit 1");
					$data_last=[];
					 while($fetch_sql_last=mysql_fetch_array($sql_last))
						{
						   $data_last=$fetch_sql_last;
						}		
           			
					$data=[];
		            $pres_diff=[];
					
			        while($fetch_sql=mysql_fetch_array($sql))
					{
						$data[$cnt]=$fetch_sql;
								$temp=$cnt;
								$pres_pf_number=$data_last['preapp_pf_number'];
								 
							$sgd_dropdwn=$fetch_sql['sgd_dropdwn']; 
							 // $sgd_dropdwn_value="$sgd_dropdwn"; \\|//
							if($sgd_dropdwn=='1'){
								$sgd_dropdwn_value="YES";
							}
							else if($sgd_dropdwn=='2'){
								$sgd_dropdwn_value="No";
							}
							else{
								$sgd_dropdwn_value="";
							}	
					if($data[$temp]['preapp_department']!=$data_last['preapp_department'])          $pres_diff[0]=1;
					if($data[$temp]['preapp_designation']!=$data_last['preapp_designation'])                                  $pres_diff[1]=1;
					if($data[$temp]['pre_otherdesign']!=$data_last['pre_otherdesign'])              $pres_diff[2]=1;
					if($data[$temp]['preapp_scale']!=$data_last['preapp_scale'])                		$pres_diff[3]=1;
					if($data[$temp]['preapp_level']!=$data_last['preapp_level'])				$pres_diff[4]=1;
					if($data[$temp]['preapp_group']!=$data_last['preapp_group'])						$pres_diff[5]=1;
					if($data[$temp]['preapp_station']!=$data_last['preapp_station'])									$pres_diff[6]=1;
					if($data[$temp]['preapp_billunit']!=$data_last['preapp_billunit'])				$pres_diff[7]=1;
					if($data[$temp]['preapp_rop']!=$data_last['preapp_rop'])								$pres_diff[8]=1;
					if($data[$temp]['preapp_depot']!=$data_last['preapp_depot'])					$pres_diff[9]=1;
					if($data[$temp]['preapp_remark']!=$data_last['preapp_remark'])			$pres_diff[10]=1;
					
					
					if($data[$temp]['sgd_designation']!=$data_last['sgd_designation'])				$pres_diff[11]=1;
					if($data[$temp]['presgd_otherdesign']!=$data_last['presgd_otherdesign'])					$pres_diff[12]=1;
					if($data[$temp]['sgd_scale']!=$data_last['sgd_scale'])		$pres_diff[13]=1;
					if($data[$temp]['sgd_level']!=$data_last['sgd_level'])				$pres_diff[14]=1;
					if($data[$temp]['sgd_group']!=$data_last['sgd_group'])					$pres_diff[15]=1;
					if($data[$temp]['sgd_station']!=$data_last['sgd_station'])	$pres_diff[16]=1;
					if($data[$temp]['sgd_billunit']!=$data_last['sgd_billunit'])						$pres_diff[17]=1;
					if($data[$temp]['sgd_depot']!=$data_last['sgd_depot'])						$pres_diff[18]=1;
					
					
					if($data[$temp]['ogd_desig']!=$data_last['ogd_desig'])								$pres_diff[19]=1;
					if($data[$temp]['preogd_otherdesign']!=$data_last['preogd_otherdesign'])							$pres_diff[20]=1;
					if($data[$temp]['ogd_scale']!=$data_last['ogd_scale'])			$pres_diff[21]=1;
					if($data[$temp]['ogd_level']!=$data_last['ogd_level'])				$pres_diff[22]=1;
					if($data[$temp]['ogd_group']!=$data_last['ogd_group'])						$pres_diff[23]=1;
					if($data[$temp]['ogd_station']!=$data_last['ogd_station'])				$pres_diff[24]=1;
					if($data[$temp]['ogd_billunit']!=$data_last['ogd_billunit'])				$pres_diff[25]=1;
					if($data[$temp]['ogd_depot']!=$data_last['ogd_depot'])				$pres_diff[26]=1;
					if($data[$temp]['ogd_rop']!=$data_last['ogd_rop'])				$pres_diff[27]=1;
					 
				 
				//End of if
						
				       
				//End of else
				
              $cnt++;
			 		} //End of while
					
					if($count_records==0){
						 $sql_1=mysql_query("select * from  present_work_track where preapp_pf_number='$pre_pf_no'");
					 
						while($result=mysql_fetch_array($sql_1))
						  {
							$preapp_pf_number=$result['preapp_pf_number'];  
							$preapp_department=get_department($result['preapp_department']);  
							$preapp_designation=get_designation($result['preapp_designation']);   
							// $pre_app_scale_type=get_pay_scale_type($result['ps_type']);
							$preapp_scale=($result['preapp_scale']); 
							$preapp_billunit=get_billunit($result['preapp_billunit']); 					
							$preapp_level=$result['preapp_level'];  
							$preapp_group_col=get_group($result['preapp_group']);  
							$preapp_station=get_station($result['preapp_station']);  
							$preapp_other=$result['preapp_station'];  
							$preapp_depot=get_depot($result['preapp_depot']);  
							$preapp_rop=$result['preapp_rop'];  
							$preapp_remark=$result['preapp_remark'];  
							$sgd_dropdwn=$result['sgd_dropdwn']; 
							 // $sgd_dropdwn_value="$sgd_dropdwn"; 
							if($sgd_dropdwn=='1'){
								$sgd_dropdwn_value="YES";
							}
							else if($sgd_dropdwn=='2'){
								$sgd_dropdwn_value="No";
							}
							else{
								$sgd_dropdwn_value="";
							}
							//echo "sqlll=".$sgd_dropdwn;
							$sgd_designation=get_designation($result['sgd_designation']);  
							$presgd_otherdesign=$result['presgd_otherdesign'];  
							$sgd_pst=get_pay_scale_type($result['sgd_pst']);  
							$sgd_scale=$result['sgd_scale'];  
							$sgd_level=$result['sgd_level'];  
							$sgd_billunit=get_billunit($result['sgd_billunit']);  
							$sgd_depot=get_depot($result['sgd_depot']);  
							$sgd_station=get_station($result['sgd_station']);  
							$sgd_group=get_group($result['sgd_group']);  
							$ogd_desig=get_designation($result['ogd_desig']);  
							$preogd_otherdesign=$result['preogd_otherdesign'];  
							$ogd_pst=get_pay_scale_type($result['ogd_pst']);  
							$ogd_scale=$result['ogd_scale'];  
							$ogd_level=$result['ogd_level'];  
							$ogd_billunit=get_billunit($result['ogd_billunit']);  
							$ogd_depot=get_depot($result['ogd_depot']);  
							$ogd_station=get_station($result['ogd_station']);  
							$ogd_group=get_group($result['ogd_group']);  
							$ogd_rop=$result['ogd_rop'];
							 
						 }
					 
					}
					
					if($pres_diff[0]==1)
					{ 
						$preapp_department=get_department($data_last['preapp_department']).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="preapp_department" data-toggle="modal" tbl_name="present_work_track" col_nm="preapp_pf_number" getcount='.$get_cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
					   }
						else{
							$preapp_department=get_department($data_last['preapp_department']);
						}
					
					if($pres_diff[1]==1)
					{ 
						$preapp_designation=get_designation($data_last['preapp_designation']).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="preapp_designation" data-toggle="modal" tbl_name="present_work_track" col_nm="preapp_pf_number" getcount='.$get_cnt.'  limit='.$cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
						 }
						else{
							$preapp_designation=get_designation($data_last['preapp_designation']);
						}

                    if($pres_diff[2]==1)
					{ 
						 $pre_otherdesign=$data_last['pre_otherdesign'].'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="pre_otherdesign" data-toggle="modal" tbl_name="present_work_track" col_nm="preapp_pf_number" getcount='.$get_cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
						}
					    else{
							$pre_otherdesign=$data_last['pre_otherdesign'];
						}
						
					if($pres_diff[3]==1)
					{ 
						$preapp_scale=$data_last['preapp_scale']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='preapp_scale' data-toggle='modal' tbl_name='present_work_track' col_nm='preapp_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
                        }
						else{
							$preapp_scale=$data_last['preapp_scale'];
						}
							
					if($pres_diff[4]==1)
					{ 
						 $preapp_level=$data_last['preapp_level']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='preapp_level' data-toggle='modal' tbl_name='present_work_track' col_nm='preapp_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
                        }
						else{
							$preapp_level=$data_last['preapp_level'];
						}   
					
					if($pres_diff[5]==1)
					{ 
						 $preapp_group_col=get_group($data_last['preapp_group'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='preapp_group' data-toggle='modal' tbl_name='present_work_track' col_nm='preapp_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
                        }
						else{
							$preapp_group_col=get_group($data_last['preapp_group']);
						}	
					
					if($pres_diff[6]==1)
					{ 
						 $preapp_station=get_station($data_last['preapp_station'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='preapp_station' data-toggle='modal' tbl_name='present_work_track' col_nm='preapp_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
                        }
						else{
							$preapp_station=get_station($data_last['preapp_station']);
						}

					if($pres_diff[7]==1)
					{ 
						 $preapp_billunit=get_billunit($data_last['preapp_billunit'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='preapp_billunit' data-toggle='modal' tbl_name='present_work_track' col_nm='preapp_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
                        }
						else{
							$preapp_billunit=get_billunit($data_last['preapp_billunit']);
						}    
					if($pres_diff[8]==1)
					{ 
						 $preapp_rop=$data_last['preapp_rop']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='preapp_rop' data-toggle='modal' tbl_name='present_work_track' col_nm='preapp_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
                        }
						else{
							$preapp_rop=$data_last['preapp_rop'];
						}
					if($pres_diff[9]==1)
					{ 
						 $preapp_depot=get_depot($data_last['preapp_depot'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='preapp_depot' data-toggle='modal' tbl_name='present_work_track' col_nm='preapp_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
                        }
						else{
							$preapp_depot=get_depot($data_last['preapp_depot']);
						}
					
					if($pres_diff[10]==1)
					{ 
						$preapp_remark=$data_last['preapp_remark']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='preapp_remark' data-toggle='modal' tbl_name='present_work_track' col_nm='preapp_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
                        }
						else{
							$preapp_remark=$data_last['preapp_remark'];
						}	
					
					//sgd
					if($pres_diff[11]==1)
					{ 
						 $sgd_designation=get_designation($data_last['sgd_designation']).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="sgd_designation" data-toggle="modal" tbl_name="present_work_track" col_nm="preapp_pf_number" getcount='.$get_cnt.'  limit='.$cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
						 }
						else{
							$sgd_designation=get_designation($data_last['sgd_designation']);
						}
					
					if($pres_diff[12]==1)
					{ 
						 $presgd_otherdesign=$data_last['presgd_otherdesign'].'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="presgd_otherdesign" data-toggle="modal" tbl_name="present_work_track" col_nm="preapp_pf_number" getcount='.$get_cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
						}
					    else{
							$presgd_otherdesign=$data_last['presgd_otherdesign'];
						}
   
					if($pres_diff[13]==1)
					{ 
						 $sgd_scale=$data_last['sgd_scale']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='sgd_scale' data-toggle='modal' tbl_name='present_work_track' col_nm='preapp_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
                        }
						else{
							$sgd_scale=$data_last['sgd_scale'];
						}
					
					if($pres_diff[14]==1)
					{ 
						 $sgd_level=$data_last['sgd_level']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='sgd_level' data-toggle='modal' tbl_name='present_work_track' col_nm='preapp_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
                        }
						else{
							$sgd_level=$data_last['sgd_level'];
						}
					
					if($pres_diff[15]==1)
					{ 
						$sgd_group=get_group($data_last['sgd_group'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='sgd_group' data-toggle='modal' tbl_name='present_work_track' col_nm='preapp_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
                        }
						else{
							$sgd_group=get_group($data_last['sgd_group']);
						}
					
					if($pres_diff[16]==1)
					{ 
						 $sgd_station=get_station($data_last['sgd_station'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='sgd_station' data-toggle='modal' tbl_name='present_work_track' col_nm='preapp_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
                        }
						else{
							$sgd_station=get_station($data_last['sgd_station']);
						}
					
					if($pres_diff[17]==1){
						$sgd_billunit=get_billunit($data_last['sgd_billunit'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='sgd_billunit' data-toggle='modal' tbl_name='present_work_track' col_nm='preapp_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
                        }
						else{
							$sgd_billunit=get_billunit($data_last['sgd_billunit']);
						}
					if($pres_diff[18]==1){
						$sgd_depot=get_depot($data_last['sgd_depot'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='sgd_depot' data-toggle='modal' tbl_name='present_work_track' col_nm='preapp_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
                        }
						else{
							$sgd_depot=get_depot($data_last['sgd_depot']);
						}
						
						//ogd
						if($pres_diff[19]==1){
						$ogd_desig=get_designation($data_last['ogd_desig']).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="ogd_desig" data-toggle="modal" tbl_name="present_work_track" col_nm="preapp_pf_number" getcount='.$get_cnt.'  limit='.$cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
						 }
						else{
							$ogd_desig=get_designation($data_last['ogd_desig']);
						}
						
						
						if($pres_diff[20]==1){
							$preogd_otherdesign=$data_last['preogd_otherdesign'].'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="preogd_otherdesign" data-toggle="modal" tbl_name="present_work_track" col_nm="preapp_pf_number" getcount='.$get_cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
						}
					    else{
							$preogd_otherdesign=$data_last['preogd_otherdesign'];
						}
						
						if($pres_diff[21]==1){
						$ogd_scale=$data_last['ogd_scale']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='ogd_scale' data-toggle='modal' tbl_name='present_work_track' col_nm='preapp_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
                        }
						else{
							$ogd_scale=$data_last['ogd_scale'];
						}
						
						if($pres_diff[22]==1){
						$ogd_level=$data_last['ogd_level']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='ogd_level' data-toggle='modal' tbl_name='present_work_track' col_nm='preapp_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
                        }
						else{
							$ogd_level=$data_last['ogd_level'];
						}
						
					
						if($pres_diff[23]==1){
						$ogd_group=get_group($data_last['ogd_group'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='ogd_group' data-toggle='modal' tbl_name='present_work_track' col_nm='preapp_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
                        }
						else{
							$ogd_group=get_group($data_last['ogd_group']);
						}
						
						if($pres_diff[24]==1){
						$ogd_station=get_station($data_last['ogd_station'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='ogd_station' data-toggle='modal' tbl_name='present_work_track' col_nm='preapp_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
                        }
						else{
							$ogd_station=get_station($data_last['ogd_station']);
						}
						
						if($pres_diff[25]==1){
						$ogd_billunit=get_billunit($data_last['ogd_billunit'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='ogd_billunit' data-toggle='modal' tbl_name='present_work_track' col_nm='preapp_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards'></span>";
                        }
						else{
							$ogd_billunit=get_billunit($data_last['ogd_billunit']);
						}
						
						if($pres_diff[26]==1){
						$ogd_depot=get_depot($data_last['ogd_depot'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='ogd_depot' data-toggle='modal' tbl_name='present_work_track' col_nm='preapp_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
                        }
						else{
							$ogd_depot=get_depot($data_last['ogd_depot']);
						}
						
						if($pres_diff[27]==1){
						$ogd_rop=$data_last['ogd_rop']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='ogd_rop' data-toggle='modal' tbl_name='present_work_track' col_nm='preapp_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
                        }
						else{
							$ogd_rop=$data_last['ogd_rop'];
						} 
					 
					?>
			<div class="table-responsive" style="padding:20px;" id="sgd_ogd_no">
			<h3>&nbsp;&nbsp;Present Working Details</h3>
			<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">	
				<table border="1" class="table table-bordered"  style="width:100%">
					<tbody>
						 
				<tr> 
							<td><label class="control-label labelhed " >PF Number</label></td>
							<td> <label class="control-label labelhdata"> <?php echo $pre_pf_no; ?> </label></td>
							<td><label class="control-label labelhed" >Department</label></td>
							<td><label class="labelhdata labelhdata"><?php echo $preapp_department ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Weather Employee is officiating in 
higher<br> grade than substantive grade?<span class=""></span></label></td>
							<td><label class="labelhdata"><?php  echo $sgd_dropdwn_value ?></label></td>
							<td><label class="control-label labelhed" >Designation</label></td>
							<td><label class="labelhdata"><?php echo  $preapp_designation ?></label></td>
						</tr>
						
						<tr>
							<td><label class="control-label labelhed" >Pay Scale Type</label></td>
							<td><label class="control-label labelhdata"><?php echo $pre_app_scale_type ?></label></td>
							<td><label class="control-label labelhed" >Scale</label></td>
							<td><label class="control-label labelhdata"><?php echo $preapp_scale ?></label></td>
							
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Level</label></td>
							<td><label class="control-label labelhdata"><?php echo $preapp_level ?></label></td>
							<td><label class="control-label labelhed" >Bill Unit</label></td>
							<td><label class="control-label labelhdata"><?php echo $preapp_billunit  ?></label></td>
							
						</tr>
						<tr>
						<td><label class="control-label labelhed" >Depot/Workplace</label></td>
							<td><label class="control-label labelhdata"><?php echo $preapp_depot ?></label></td>
							<td><label class="control-label labelhed" >Group</label></td>
							<td><label class="control-label labelhdata"><?php echo $preapp_group_col ?></label></td>
							
						</tr>
						<tr>
							
							<td><label class="control-label labelhed" >Station</label></td>
							<td><label class="control-label labelhdata"><?php echo $preapp_station ?></label></td>	
							<td><label class="control-label labelhed" >Rate Of Pay</label></td>
							<td><label class="control-label labelhdata"><?php echo $preapp_rop ?></label></td>	
						</tr>	
					</tbody>		
				</table>
			</div>
			
			<div class="table-responsive" style="padding:20px;" id="sgd_ogd_yes">
			<h3>&nbsp;&nbsp;Present Working Details</h3>
			<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">	
				<table border="1" class="table table-bordered"  style="width:100%">
					<tbody>
						<tr> 
							<td><label class="control-label labelhed " >PF Number</label></td>
							<td> <label class="control-label labelhdata"> <?php echo $pre_pf_no ?> </label></td>
							<td><label class="control-label labelhed" >Department</label></td>
							<td><label class="labelhdata labelhdata"><?php echo $preapp_department ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Weather Employee is Officiating in 
higher<br> grade than substantive grade?<span class=""></span></label></td>
							<td colspan="5"><label class="labelhdata"><?php echo $sgd_dropdwn_value; ?></label></td>
							
						</tr>
						
						<tr>
							<td colspan="4"> <label class="control-label labelhed" style="font-size:18px;" ><b>Substancive Grade Details</b></label></td>
						</tr>
							
						<tr>
							<td><label class="control-label labelhed" >Designation</label></td>
							<td><label class="control-label labelhdata"><?php echo $sgd_designation ?></label></td>
							<td><label class="control-label labelhed" >Pay Scale Type</label></td>
							<td><label class="control-label labelhdata"><?php echo $sgd_pst ?></label></td>
							
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Scale</label></td>
							<td><label class="control-label labelhdata"><?php echo $sgd_scale ?></label></td>
							<td><label class="control-label labelhed" >Level</label></td>
							<td><label class="control-label labelhdata"><?php echo $sgd_level ?></label></td>
							
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Bill Unit</label></td>
							<td><label class="control-label labelhdata"><?php echo $sgd_billunit ?></label></td>
							<td><label class="control-label labelhed" >Depot</label></td>
							<td><label class="control-label labelhdata"><?php echo $sgd_depot ?></label></td>
							
						</tr>
							
						<tr>
							<td><label class="control-label labelhed" >Station</label></td>
							<td><label class="control-label labelhdata"><?php echo $sgd_station ?></label></td>
							<td><label class="control-label labelhed" >Group</label></td>
							<td><label class="control-label labelhdata"><?php echo $sgd_group ?></label></td>
							
						</tr>
						
						
						<tr>
							<td colspan="4"> <label class="control-label labelhed" style="font-size:18px;" ><b>Officiating Grade Details</b></label></td>
						</tr>
								
						<tr>
							<td><label class="control-label labelhed" >Designation</label></td>
							<td><label class="control-label labelhdata"><?php echo $ogd_desig ?></label></td>
							<td><label class="control-label labelhed" >Pay Scale Type</label></td>
							<td><label class="control-label labelhdata"><?php echo $ogd_pst ?></label></td>
							
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Scale</label></td>
							<td><label class="control-label labelhdata"><?php echo $ogd_scale ?></label></td>
							<td><label class="control-label labelhed" >Level</label></td>
							<td><label class="control-label labelhdata"><?php echo $ogd_level ?></label></td>
							
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Bill Unit</label></td>
							<td><label class="control-label labelhdata"><?php echo $ogd_billunit ?></label></td>
							<td><label class="control-label labelhed" >Depot</label></td>
							<td><label class="control-label labelhdata"><?php echo $ogd_depot ?></label></td>
							
						</tr>
							
						<tr>
							<td><label class="control-label labelhed" >Station</label></td>
							<td><label class="control-label labelhdata"><?php echo $ogd_station ?></label></td>
							<td><label class="control-label labelhed" >Group</label></td>
							<td><label class="control-label labelhdata"><?php echo $ogd_group ?></label></td>
							
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Rate Of Pay</label></td>
							<td colspan="5"><label class="control-label labelhdata"><?php echo $ogd_rop ?></label></td>	
						</tr>
				<tr><td colspan="5" style="background-color:gray"></td></tr>
				</tr>
				  
				<?php 
				 	
				}

			}				
				?>
			</tbody>
		</table>
	</div>
	</div>
	<!-- Present Working End  -->	
	
	<!-- Family Composition Tab Starts -->
<div class="tab-pane" id="family">
	<div class="table-responsive" style="padding:20px;">
	<h3>&nbsp;&nbsp;Family Composition Details</h3>
	<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">	
	<?php
	
	
	dbcon1();
			$pf_no=$_GET['pf'];
			//pen_pf_number=$pf_no;
			 $cnt=0;
		     	 $i=0;
			$sql1=mysql_query("select distinct(count) from  family_track where emp_pf='$pf_no'");
			if($sql1){
			while($res=mysql_fetch_assoc($sql1))
			{
				 $get_cnt=$res['count'];
			    if($get_cnt!=0)
					dbcon1();
					$sql=mysql_query("select * from  family_track where emp_pf='$pf_no' and count='$get_cnt' and id!=(SELECT MAX(id) FROM family_track) ORDER by id desc");

					$count_records=mysql_num_rows($sql);
					$sql_last=mysql_query("select * from  family_track where emp_pf='$pf_no' and count='$get_cnt' ORDER by id desc limit 1");
				 
					$data_last=[];
					 while($fetch_sql_last=mysql_fetch_array($sql_last))
					{
                       $data_last=$fetch_sql_last;
				    }					 
					$data=[];
		            $fam_diff=[];
			        while($fetch_sql=mysql_fetch_array($sql))
					{
						$data[$cnt]=$fetch_sql;
				if($count_records>0)
				 {
				 	$temp=$cnt;

				 	if($data[$temp]['fmy_updatedate']!=$data_last['fmy_updatedate'])          $fam_diff[0]=1;
					if($data[$temp]['fmy_member']!=$data_last['fmy_member'])                  $fam_diff[1]=1;
					if($data[$temp]['fmy_rel']!=$data_last['fmy_rel'])             			  $fam_diff[2]=1;
					if($data[$temp]['fmy_gender']!=$data_last['fmy_gender'])                  $fam_diff[3]=1;
					if($data[$temp]['fmy_dob']!=$data_last['fmy_dob'])				          $fam_diff[4]=1;
					
				 }
				 else{
	
	
		$sql=mysql_query("select * from  family_track where emp_pf='$pf_no'");
		if($sql)
		{
			while($result=mysql_fetch_array($sql))
			{
				$fmy_pf_number=$result['fmy_pf_number'];
				$fmy_updatedate=$result['fmy_updatedate'];
				$fmy_member=$result['fmy_member'];
				$fmy_rel=get_relation($result['fmy_rel']);
				$fmy_gender=get_gender($result['fmy_gender']);
				$fmy_dob=$result['fmy_dob'];
			}
		}
	}
	$cnt++;
			 		} 
						if($fam_diff[0]==1)
						{
					
						$fmy_updatedate1=$data_last['fmy_updatedate'];
						$fmy_updatedate=date('d-m-Y',strtotime($fmy_updatedate1)).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="fmy_updatedate" class="fa fa-info-circle click_awards visit" data-toggle="modal" tbl_name="family_track" col_nm="emp_pf" getcount='.$get_cnt.' data-target="#delete" ></span>';
						}
						else
						{
						
						$fmy_updatedate1=$data_last['fmy_updatedate'];
						$fmy_updatedate=date('d-m-Y',strtotime($fmy_updatedate1));
						}
						
						if($fam_diff[1]==1)
						{
						$fmy_member=$data_last['fmy_member'].'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="fmy_member" data-toggle="modal" tbl_name="family_track" col_nm="emp_pf" getcount='.$get_cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
						}
						else
						{
							$fmy_member=$data_last['fmy_member'];
						}
						
						if($fam_diff[2]==1)
						{
						$fmy_rel=get_relation($data_last['fmy_rel']).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="fmy_rel" data-toggle="modal" tbl_name="family_track" col_nm="emp_pf" getcount='.$get_cnt.'  limit='.$cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
						}
						else
						{
							$fmy_rel=get_relation($data_last['fmy_rel']);
						}
						
						
						if($fam_diff[3]==1)
						{
						$fmy_gender=get_gender($data_last['fmy_gender'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='fmy_gender' data-toggle='modal' tbl_name='family_track' col_nm='emp_pf' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$fmy_gender=get_gender($data_last['fmy_gender']);
						}
						
						if($fam_diff[4]==1)
						{
						$fmy_dob1=$data_last['fmy_dob'];
						$fmy_dob=date('d-m-Y',strtotime($fmy_dob1)).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="fmy_dob" class="fa fa-info-circle click_awards visit" data-toggle="modal" tbl_name="family_track" col_nm="emp_pf" getcount='.$get_cnt.' data-target="#delete" ></span>';
						}
						else
						{
							$fmy_dob1=$data_last['fmy_dob'];
						$fmy_dob=date('d-m-Y',strtotime($fmy_dob1));
						}
					?>	
				
				<input type="hidden" name="hidden_pfno" value='<?php echo $pf_no; ?>' id="hidden_pfno"/>
	
		
			<?php
			echo "<table border='1' class='table table-bordered'  style='width:100%'>";
			echo "<tbody>";
			echo "<tr>";
			
			echo "<td><label class='control-label labelhed ' >PF No</label></td>";		
			echo "<td> <label class='control-label labelhdata'>$pf_no</label></td>";	
			echo "<td><label class='control-label labelhed' >Date Of Updation</label></td>"	;	
			echo "<td><label class='labelhdata labelhdata'>$fmy_updatedate</label></td>";		
			echo "</tr>";	
			echo "<tr>";	
			echo "<td><label class='control-label labelhed' >Family Member Name</label></td>";	
			echo "<td><label class='control-label labelhdata'>$fmy_member</label></td>";		
			echo "<td><label class='control-label labelhed' >Member Relation</label></td>";		
			echo "<td><label class='control-label labelhdata'>$fmy_rel</label></td>";		
			echo "</tr>";	
			echo "<tr>";	
			echo "<td><label class='control-label labelhed' >Gender</label></td>";		
			echo "<td><label class='control-label labelhdata'>$fmy_gender</label></td>";		
			echo "<td><label class='control-label labelhed' >DOB</label></td>";		
			echo "<td><label class='control-label labelhdata'>$fmy_dob</label></td>";		
			echo "</tr>";
	 
			echo "</tbody>";
			echo "</table>";
				   }
			}				   
	?>				
			
		
	</div>
	<div class="pull-right col-md-7 col-sm-12 col-xs-12">
		<a href="#" class="btn btn-primary back_btn">Back</a>
	</div>
</div>
<!-- Family Composition Tab Ends -->
	
	
	<!-- Advance Tab Starts -->
<div class="tab-pane" id="advance">
	<h3>&nbsp;&nbsp;Adavance Details</h3>
	<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
		<div class="table-responsive" style="padding:20px;">
			<table border="1" class="table table-bordered"  style="width:100%">
				<tbody>
			<?php
			dbcon1();
			$pf_no=$_GET['pf'];
			 $cnt=0;
		     	 $i=0;
			$sql1=mysql_query("select distinct(count) from  advance_track where adv_pf_number='$pf_no'");
                          $h=mysql_num_rows($sql1);
                        if($h==0)
                       {
                          echo "<label class='control-label col-md-4 col-sm-3 col-xs-12' style='font-size:15px;color:red;'>Advance for This Employee Is Not Available</label>";
                       }
			if($sql1){
			while($res=mysql_fetch_assoc($sql1))
			{
				 $get_cnt=$res['count'];
			    if($get_cnt!=0)
					dbcon1();
					$sql=mysql_query("select * from  advance_track where adv_pf_number='$pf_no' and count='$get_cnt' and id!=(SELECT MAX(id) FROM advance_track) ORDER by id desc");

					$count_records=mysql_num_rows($sql);
					$sql_last=mysql_query("select * from  advance_track where adv_pf_number='$pf_no' and count='$get_cnt' ORDER by id desc limit 1");
				   
					$data_last=[];
					 while($fetch_sql_last=mysql_fetch_array($sql_last))
					{
                       $data_last=$fetch_sql_last;
				    }
		           //	if($sql){	       			
					$data=[];
		            $adv_diff=[];
					//echo "count_records".$count_records;
			        while($fetch_sql=mysql_fetch_array($sql))
					{
						$data[$cnt]=$fetch_sql;
				if($count_records>0)
				 {
				 	$temp=$cnt;

				 	if($data[$temp]['adv_type']!=$data_last['adv_type'])          $adv_diff[0]=1;
					if($data[$temp]['adv_letterno']!=$data_last['adv_letterno'])                  $adv_diff[1]=1;
					if($data[$temp]['adv_letterdate']!=$data_last['adv_letterdate'])             			  $adv_diff[2]=1;
					if($data[$temp]['adv_wefdate']!=$data_last['adv_wefdate'])                  $adv_diff[3]=1;
					if($data[$temp]['adv_amount']!=$data_last['adv_amount'])				          $adv_diff[4]=1;
					if($data[$temp]['adv_principle']!=$data_last['adv_principle'])				          $adv_diff[5]=1;
					if($data[$temp]['adv_interest']!=$data_last['adv_interest'])				          $adv_diff[6]=1;
					if($data[$temp]['adv_from']!=$data_last['adv_from'])				          $adv_diff[7]=1;
					if($data[$temp]['adv_to']!=$data_last['adv_to'])				          $adv_diff[8]=1;
					if($data[$temp]['adv_remark']!=$data_last['adv_remark'])				          $adv_diff[9]=1;
					
				 }
				else
				{
						$sql=mysql_query("select * from  advance_track where adv_pf_number='$pf_no'");
					if($sql){
						while($fetch_sql=mysql_fetch_array($sql))
							{
									$pf_no = $fetch_sql['adv_pf_number'];
									$advance_type=get_advance($fetch_sql['adv_type']);
									$letter_number= $fetch_sql['adv_letterno'];
									$letter_date = $fetch_sql['adv_letterdate'];
									$wef_date = $fetch_sql['adv_wefdate'];
									$amount = $fetch_sql['adv_amount'];
									$tot_amt = $fetch_sql['adv_principle'];
									$interest = $fetch_sql['adv_interest'];
									$date_frm = $fetch_sql['adv_from'];
									$date_to = $fetch_sql['adv_to'];
									$remark = $fetch_sql['adv_remark'];
							}
						}
				}
				$cnt++;
					}
						if($adv_diff[0]==1)
						{
							
						$advance_type=get_advance($data_last['adv_type']).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="adv_type" data-toggle="modal" tbl_name="advance_track" col_nm="adv_pf_number" getcount='.$get_cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
						//echo "if";
						}
						else
						{
							//echo "else";
							$advance_type=get_advance($data_last['adv_type']);
						}
						
						if($adv_diff[1]==1)
						{
						$letter_number=$data_last['adv_letterno'].'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="adv_letterno" data-toggle="modal" tbl_name="advance_track" col_nm="adv_pf_number" getcount='.$get_cnt.'  limit='.$cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
						}
						else
						{
							$letter_number=$data_last['adv_letterno'];
						}
						
						if($adv_diff[2]==1)
						{
						$letter_date1=$data_last['adv_letterdate'];
						$letter_date=date('d-m-Y',strtotime($letter_date1)).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="adv_letterdate" class="fa fa-info-circle click_awards visit" data-toggle="modal" tbl_name="advance_track" col_nm="adv_pf_number" getcount='.$get_cnt.' data-target="#delete" ></span>';
						}
						else
						{
							$letter_date1=$data_last['adv_letterdate'];
							$letter_date=date('d-m-Y',strtotime($letter_date1));
						}
						
						if($adv_diff[3]==1)
						{
						$wef_date1=$data_last['adv_wefdate'];
						$wef_date=date('d-m-Y',strtotime($wef_date1)).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="adv_wefdate" class="fa fa-info-circle click_awards visit" data-toggle="modal" tbl_name="advance_track" col_nm="adv_pf_number" getcount='.$get_cnt.' data-target="#delete" ></span>';
						}
						else
						{
							$wef_date1=$data_last['adv_wefdate'];
							$wef_date=date('d-m-Y',strtotime($wef_date1));
						}
						 
						if($adv_diff[4]==1)
						{						 
						$amount=$data_last['adv_amount'].'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="adv_amount" data-toggle="modal" tbl_name="advance_track" col_nm="adv_pf_number" getcount='.$get_cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
						}
						else
						{
							$amount=$data_last['adv_amount'];
						}
					
							 
						if($adv_diff[5]==1)
						{
						$tot_amt=$data_last['adv_principle']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='adv_principle' data-toggle='modal' tbl_name='advance_track' col_nm='adv_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$tot_amt=$data_last['adv_principle'];
						}
						
						if($adv_diff[6]==1)
						{
						$interest=$data_last['adv_interest']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='adv_interest' data-toggle='modal' tbl_name='advance_track' col_nm='adv_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$interest=$data_last['adv_interest'];
						}
						
						if($adv_diff[7]==1)
						{
						$date_frm1=$data_last['adv_from'];
						$date_frm=date('d-m-Y',strtotime($date_frm1)).'<span style="margin-left:6px;color:blue;cursor: pointer;font-size:24px;" val="adv_from" data-toggle="modal" tbl_name="advance_track" col_nm="adv_pf_number" getcount='.$get_cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
						}
						else
						{
							$date_frm1=$data_last['adv_from'];
							$date_frm=date('d-m-Y',strtotime($date_frm1));
						}
						
						if($adv_diff[8]==1)
						{
						$date_to1=$data_last['adv_to'];
						$date_to=date('d-m-Y',strtotime($date_to1)).'<span style="margin-left:6px;color:blue;cursor: pointer;font-size:24px;" val="adv_to" data-toggle="modal" tbl_name="advance_track" col_nm="adv_pf_number" getcount='.$get_cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
						}
						else
						{
							$date_to1=$data_last['adv_to'];
							$date_to=date('d-m-Y',strtotime($date_to1));
						}
							
						if($adv_diff[9]==1)
						{
						$remark=$data_last['adv_remark']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='adv_remark' data-toggle='modal' tbl_name='advance_track' col_nm='adv_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$remark=$data_last['adv_remark'];
						}
						 
				
				
				
			//}		
					?>
					
				<tr>
				        <input type="hidden" name="hidden_pfno" value="<?php echo $pf_no; ?>" id="hidden_pfno"/>
						<td><label class="control-label labelhed " >PF No</label></td>
						<td> <label class="control-label labelhdata"><?php echo $pf_no;?></label></td>
						<td><label class="control-label labelhed" >Advances Type</label></td>
						<td><label class="labelhdata labelhdata"><?php echo $advance_type;?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Letter No</label></td>
						<td><label class="control-label labelhdata"><?php echo $letter_number;?></label></td>
						<td><label class="control-label labelhed" >Letter Date</label></td>
						<td><label class="control-label labelhdata"><?php echo $letter_date;?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >WEF Date</label></td>
						<td><label class="control-label labelhdata"><?php echo $wef_date ?></label></td>
						<td><label class="control-label labelhed" >Amount</label></td>
						<td><label class="control-label labelhdata"><?php echo $amount ?></label></td>
					</tr>

					<tr>
						<td colspan="6"><label class="control-label labelhed" ><b>Recovery Details</b></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Total Principle Amount</label></td>
						<td><label class="control-label labelhdata"><?php echo $tot_amt ?></label></td>
						<td><label class="control-label labelhed" >Total Interest</label></td>
						<td><label class="control-label labelhdata"><?php echo $interest ?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >From Date</label></td>
						<td><label class="control-label labelhdata"><?php echo $date_frm ?></label></td>
						<td><label class="control-label labelhed" >To Date</label></td>
						<td><label class="control-label labelhdata"><?php echo $date_to ?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed">Remarks</label></td>
						<td colspan="6"><label class="control-label labelhdata"><?php echo $remark;?></label></td>
					</tr>
					<tr><td colspan="5" style="background-color:gray"></td></tr>
					 
					<?php 
					}
						}
					?>
				</tbody>
		</table>
	</div>
	 
</div>
<!-- Advance Tab Ends -->

<!-- Training Tab Starts -->
<div class="tab-pane" id="training">
	<h3>&nbsp;&nbsp Training</h3>
	<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
		<div class="table-responsive" style="padding:20px;">
			<table border="1" class="table table-bordered"  style="width:100%">
				<tbody>
			<?php
			dbcon1();
			$pf_no=$_GET['pf'];
			 $cnt=0;
		     	 $i=0;
			$sql1=mysql_query("select distinct(count) from  training_track where pf_number='$pf_no'");
                         $h=mysql_num_rows($sql1);
                        if($h==0)
                       {
                          echo "<label class='control-label col-md-4 col-sm-3 col-xs-12' style='font-size:15px;color:red;'>Training for This Employee Is Not Available</label>";
                       }
			if($sql1){
			while($res=mysql_fetch_assoc($sql1))
			{
				 $get_cnt=$res['count'];
			    if($get_cnt!=0)
					dbcon1();
					$sql=mysql_query("select * from  training_track where pf_number='$pf_no' and count='$get_cnt' and id!=(SELECT MAX(id) FROM training_track) ORDER by id desc");

					$count_records=mysql_num_rows($sql);
					$sql_last=mysql_query("select * from  training_track where pf_number='$pf_no' and count='$get_cnt' ORDER by id desc limit 1");
				   
					$data_last=[];	       			
			
			   while($fetch_sql_last=mysql_fetch_array($sql_last))
					{
                       $data_last=$fetch_sql_last;
				    }					 
					$data=[];
		            $tra_diff=[];
			        while($fetch_sql=mysql_fetch_array($sql))
					{
						$data[$cnt]=$fetch_sql;
				if($count_records>=1)
				 {
					 $temp=$cnt;

				 	if($data[$temp]['training_type']!=$data_last['training_type'])      $tra_diff[0]=1;
					if($data[$temp]['tr_inst']!=$data_last['tr_inst'])                  $tra_diff[1]=1;
					if($data[$temp]['tr_dept']!=$data_last['tr_dept'])             	    $tra_diff[2]=1;
					if($data[$temp]['tr_desig']!=$data_last['tr_desig'])                $tra_diff[3]=1;
					if($data[$temp]['last_date']!=$data_last['last_date'])			    $tra_diff[4]=1;
					if($data[$temp]['due_date']!=$data_last['due_date'])				$tra_diff[5]=1;
					if($data[$temp]['training_from']!=$data_last['training_from'])      $tra_diff[6]=1;
					if($data[$temp]['training_to']!=$data_last['training_to'])			$tra_diff[7]=1;
					if($data[$temp]['description']!=$data_last['description'])			$tra_diff[8]=1;
					if($data[$temp]['letter_no']!=$data_last['letter_no'])				$tra_diff[9]=1;
					if($data[$temp]['letter_date']!=$data_last['letter_date'])			$tra_diff[10]=1;
					if($data[$temp]['remarks']!=$data_last['remarks'])				    $tra_diff[11]=1;
				 }
				 else{
						
					$sql=mysql_query("select * from  training_track where pf_number='$pf_no'");
				if($sql){
						while($fetch_nominee=mysql_fetch_array($sql))
			{
				
				$tra_pf_number=$fetch_nominee['pf_number'];
				$training_type = $fetch_nominee['training_type'];
				$tr_inst	 = $fetch_nominee['tr_inst'];
				$tr_dept = $fetch_nominee['tr_dept'];
				$tr_desig = $fetch_nominee['tr_desig'];
				$last_date = $fetch_nominee['last_date'];
				$due_date = $fetch_nominee['due_date'];
				$training_from = $fetch_nominee['training_from'];
				$training_to = $fetch_nominee['training_to'];
			    $description  = $fetch_nominee['description'];
				$letter_no  = $fetch_nominee['letter_no'];
				$letter_date  = $fetch_nominee['letter_date'];
				$remarks = $fetch_nominee['remarks'];
				
			} 
						}
				}
				$cnt++;
					}
				 
					 	
						if($tra_diff[0]==1)
						{
							
						$training_type=get_training_type($data_last['training_type']).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="training_type" data-toggle="modal" tbl_name="training_track" col_nm="pf_number" getcount='.$get_cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
						}
						else
						{
					
							$training_type=get_training_type($data_last['training_type']);
						}
						
						if($tra_diff[1]==1)
						{
						$tr_inst=$data_last['tr_inst'].'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="tr_inst" data-toggle="modal" tbl_name="training_track" col_nm="pf_number" getcount='.$get_cnt.'  limit='.$cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
						}
						else
						{
							$tr_inst=$data_last['tr_inst'];
						}
						
						if($tra_diff[2]==1)
						{
						$tr_dept=get_department($data_last['tr_dept']).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="tr_dept" class="fa fa-info-circle click_awards visit" data-toggle="modal" tbl_name="training_track" col_nm="pf_number" getcount='.$get_cnt.' data-target="#delete" ></span>';
						}
						else
						{
							$tr_dept=get_department($data_last['tr_dept']);
						}
						
						if($tra_diff[3]==1)
						{
						$tr_desig=get_designation($data_last['tr_desig']).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="tr_desig" class="fa fa-info-circle click_awards visit" data-toggle="modal" tbl_name="training_track" col_nm="pf_number" getcount='.$get_cnt.' data-target="#delete" ></span>';
						}
						else
						{
							$tr_desig=get_designation($data_last['tr_desig']);
						}
						
						if($tra_diff[4]==1)
						{
						$last_date1=$data_last['last_date'];
						$last_date=date('d-m-Y',strtotime($last_date1)).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="last_date" class="fa fa-info-circle click_awards visit" data-toggle="modal" tbl_name="training_track" col_nm="pf_number" getcount='.$get_cnt.' data-target="#delete" ></span>';
						}
						else
						{
							$last_date1=$data_last['last_date'];
						$last_date=date('d-m-Y',strtotime($last_date1));
						}
						
						if($tra_diff[5]==1)
						{
						$due_date1=$data_last['due_date'];
						$due_date=date('d-m-Y',strtotime($due_date1)).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="due_date" class="fa fa-info-circle click_awards visit" data-toggle="modal" tbl_name="training_track" col_nm="pf_number" getcount='.$get_cnt.' data-target="#delete" ></span>';
						}
						else
						{
							$due_date1=$data_last['due_date'];
						$due_date=date('d-m-Y',strtotime($due_date1));
						}
						
						if($tra_diff[6]==1)
						{
						$training_from1=$data_last['training_from'];
						$training_from=date('d-m-Y',strtotime($training_from1)).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="training_from" class="fa fa-info-circle click_awards visit" data-toggle="modal" tbl_name="training_track" col_nm="pf_number" getcount='.$get_cnt.' data-target="#delete" ></span>';
						}
						else
						{
							$training_from1=$data_last['training_from'];
						$training_from=date('d-m-Y',strtotime($training_from1));
						}
						
						if($tra_diff[7]==1)
						{
						$training_to1=$data_last['training_to'];
						$training_to=date('d-m-Y',strtotime($training_to1)).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="training_to" class="fa fa-info-circle click_awards visit" data-toggle="modal" tbl_name="training_track" col_nm="pf_number" getcount='.$get_cnt.' data-target="#delete" ></span>';
						}
						else
						{
							$training_to=$data_last['training_to'];
						$training_to=date('d-m-Y',strtotime($training_to1));
						}
						
						 
						if($tra_diff[8]==1)
						{						 
						$description=$data_last['description'].'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="description" data-toggle="modal" tbl_name="training_track" col_nm="pf_number" getcount='.$get_cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
						}
						else
						{
							$description=$data_last['description'];
						}
					
							 
						if($tra_diff[9]==1)
						{
						$letter_no=$data_last['letter_no']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='letter_no' data-toggle='modal' tbl_name='training_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$letter_no=$data_last['letter_no'];
						}
												
						if($tra_diff[10]==1)
						{
						$letter_date1=$data_last['letter_date'];
						$letter_date=date('d-m-Y',strtotime($letter_date1)).'<span style="margin-left:6px;color:blue;cursor: pointer;font-size:24px;" val="letter_date" data-toggle="modal" tbl_name="training_track" col_nm="pf_number" getcount='.$get_cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
						}
						else
						{
							$letter_date1=$data_last['letter_date'];
						$letter_date=date('d-m-Y',strtotime($letter_date1));
						}
													
						if($tra_diff[11]==1)
						{
						$remarks=$data_last['remarks']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='remarks' data-toggle='modal' tbl_name='training_track' col_nm='pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$remarks=$data_last['remarks'];
						}
						 
				
				
				
			//}		
					?>
					
				<tr>
				<input type="hidden" name="hidden_pfno" value="<?php echo $pf_no; ?>" id="hidden_pfno"/>
					<td><label class="control-label labelhed " >PF No</label></td>
					<td> <label class="control-label labelhdata"><?php echo $pf_no; ?></label></td>
					<td><label class="control-label labelhed" >Training Type</label></td>
					<td><label class="labelhdata labelhdata"><?php echo $training_type; ?></label></td>
				</tr>
				<tr>
					<td><label class="control-label labelhed " >Institute</label></td>
					<td> <label class="control-label labelhdata"><?php echo $tr_inst; ?></label></td>
					<td><label class="control-label labelhed" >Last Date</label></td>
					<td><label class="labelhdata labelhdata"><?php echo $last_date; ?></label></td>
				</tr>
				<!--tr>
					<td><label class="control-label labelhed" >Designation</label></td>
					<td><label class="labelhdata labelhdata"><?php //echo $tr_desig; ?></label></td>
						<td><label class="control-label labelhed" ></label></td>
					<td><label class="labelhdata labelhdata"><?php //echo $last_date; ?></label>
				</tr-->
				
				<tr>
			
				</td><td><label class="control-label labelhed" >Due Date</label></td>
					<td><label class="labelhdata labelhdata"><?php echo $due_date; ?></label>
					<td><label class="control-label labelhed" >Training From</label></td>
					<td><label class="control-label labelhdata"><?php echo $training_from; ?></label></td>
				</td>
				</tr>
				
				
				<tr>
					
					<td><label class="control-label labelhed" >Training To</label></td>
					<td><label class="control-label labelhdata"><?php echo $training_to; ?></label></td>
					<td><label class="control-label labelhed" >Letter No</label></td>
					<td><label class="control-label labelhdata"><?php echo $letter_no ?></label></td>
				</tr>
				<tr>
					
					<td><label class="control-label labelhed" >Letter Date</label></td>
					<td><label class="control-label labelhdata"><?php echo $letter_date ?></label></td>
					<td><label class="control-label labelhed" >Description</label></td>
					<td><label class="control-label labelhdata"><?php echo $description ?></label></td>
				</tr>	
				<tr>
					<td><label class="control-label labelhed" >remark</label></td>
					<td colspan="6"> <label class="control-label labelhdata"><?php echo $remarks ?></label></td>
				</tr>
					<tr><td colspan="5" style="background-color:gray"></td></tr>
					 
					<?php 
					}
						}
					?>
				</tbody>
		</table>
	</div>
	 
</div>
<!-- Training Tab Ends -->

<!--Awards Start-->
	<div class="tab-pane" id="awards">
	<div class="table-responsive" style="padding:20px;">
	<h3>&nbsp;&nbsp;Award Details</h3>
	<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
	<label class="control-label labelhdata" style="color:black;margin-left:400px;font-size:18px">Note : Click On Icons For Award History</label>
		<table border="1" class="table table-bordered"  style="width:100%">
			<tbody>
			<?php
			dbcon1();
			$pf_no=$_GET['pf'];
			 $cnt=0;
		     	 $i=0;
			$sql1=mysql_query("select distinct(count) from  award_track where awd_pf_number='$pf_no'");
                         $h=mysql_num_rows($sql1);
                        if($h==0)
                       {
                          echo "<label class='control-label col-md-4 col-sm-3 col-xs-12' style='font-size:15px;color:red;'>Awards for This Employee Is Not Available</label>";
                       }
			if($sql1){
			while($res=mysql_fetch_assoc($sql1))
			{
				 $get_cnt=$res['count'];
			    if($get_cnt!=0)
					dbcon1();
					$sql=mysql_query("select * from  award_track where awd_pf_number='$pf_no' and count='$get_cnt' and id!=(SELECT MAX(id) FROM award_track) ORDER by id desc");
					
					$count_records=mysql_num_rows($sql);
					$sql_last=mysql_query("select * from  award_track where awd_pf_number='$pf_no' and count='$get_cnt' ORDER by id desc limit 1");
				   
					$data_last=[];
				while($fetch_sql_last=mysql_fetch_array($sql_last))
					{
                       $data_last=$fetch_sql_last;
				    }					 
					$data=[];
		            $awd_diff=[];
		
				while($fetch_sql=mysql_fetch_array($sql))
					{
						$data[$cnt]=$fetch_sql;	
						$temp=$cnt;

						if($data[$temp]['awd_date']!=$data_last['awd_date'])              $awd_diff[0]=1;
						if($data[$temp]['awd_by']!=$data_last['awd_by'])                  $awd_diff[1]=1;
						if($data[$temp]['awd_type']!=$data_last['awd_type'])              $awd_diff[2]=1;
						if($data[$temp]['awd_other']!=$data_last['awd_other'])            $awd_diff[3]=1;
						if($data[$temp]['awd_detail']!=$data_last['awd_detail'])		  $awd_diff[4]=1;
		
						$cnt++;
			 		} 
					if($count_records==0)
					{
						$sql=mysql_query("select * from  award_track where awd_pf_number='$pf_no'");
					
						
						($fetch_sql=mysql_fetch_array($sql));
						{
							$awd_pf_number = $fetch_sql['awd_pf_number'];
							$awd_award_date	 = $fetch_sql['awd_date'];
							$awd_awarded_by = get_awarded_by($fetch_sql['awd_by']);
							$awd_award_type = got_award($fetch_sql['awd_type']);
							$awd_other_award = $fetch_sql['awd_other'];
							$awd_award_detail = $fetch_sql['awd_detail'];
						}
					}
					
					 
					if($awd_diff[0]==1)
					{
						
						$awd_date=$data_last['awd_date'];
						$awd_award_date=date('d-m-Y',strtotime($awd_date)).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="awd_date" class="fa fa-info-circle click_awards visit" data-toggle="modal" tbl_name="award_track" col_nm="awd_pf_number" getcount='.$get_cnt.' data-target="#delete" ></span>';
					}
					else
					{
						
						 $awd_date=$data_last['awd_date'];
						$awd_award_date=date('d-m-Y',strtotime($awd_date));
					}
					 
					 if($awd_diff[1]==1)
					 {
						$awd_awarded_by=get_awarded_by($data_last['awd_by']).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="awd_by" data-toggle="modal" tbl_name="award_track" col_nm="awd_pf_number" getcount='.$get_cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
					}
					 else
					 {
						 $awd_awarded_by=get_awarded_by($data_last['awd_by']);
					 }
						
					 if($awd_diff[2]==1)
					 {
						$awd_award_type=got_award($data_last['awd_type']).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="awd_type" data-toggle="modal" tbl_name="award_track" col_nm="awd_pf_number" getcount='.$get_cnt.'  limit='.$cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
					}
					 else
					 {
						 
						 $awd_award_type=got_award($data_last['awd_type']);
					 }
						  
					 if($awd_diff[3]==1)
					 {
						$awd_other_award=$data_last['awd_other'].'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="awd_other" data-toggle="modal" tbl_name="award_track" col_nm="awd_pf_number" getcount='.$get_cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
					}
					 else
					 {
						 $awd_other_award=$data_last['awd_other'];
					 }
					
							 
					 if($awd_diff[4]==1)
					 {
						$awd_award_detail=$data_last['awd_detail']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='awd_detail' data-toggle='modal' tbl_name='award_track' col_nm='awd_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
					}
					 else
					 {
						 $awd_award_detail=$data_last['awd_detail'];
					 }			
				
			//}		
					?>
					
				<tr>  
				<input type="hidden" name="hidden_pfno" value="<?php echo $pf_no; ?>" id="hidden_pfno"/>
					<td><label class="control-label labelhed " >PF No</label></td>
					<td> <label class="control-label labelhdata"><?php echo $pf_no ?></label></td>
					<td><label class="control-label labelhed" >Date Of Award</label></td>
					<td><label class="labelhdata labelhdata"><?php echo $awd_award_date;?></label></td>
				</tr>
				<tr>
					<td><label class="control-label labelhed" >Awarded By</label></td>
					<td><label class="control-label labelhdata"><?php echo $awd_awarded_by;?></label></td>
					<td><label class="control-label labelhed" >Type Of Award</label></td>
					<td><label class="control-label labelhdata"><?php echo $awd_award_type;?></label></td>
				</tr>
				<tr>
					<td ><label class="control-label labelhed" >Other Award</label></td>
					<td colspan="3"><label class="control-label labelhdata"><?php echo $awd_other_award;?></label></td>
				</tr>
                <tr>				
					<td><label class="control-label labelhed" >Award Details</label></td>
					<td colspan="3"><label class="control-label labelhdata"><?php echo $awd_award_detail ?></label></td>
				</tr>
				<tr>
				<tr><td colspan="5" style="background-color:gray"></td></tr>
				</tr>  
				<?php 
				 	
				}

			}				
				?>
			</tbody>
		</table>
	</div>
	 
</div>
<!-- Award End  -->

<!-- Penalty Tab Starts -->
<div class="tab-pane" id="penalty">
		<div class="table-responsive" style="padding:20px;">
			<h3>&nbsp;&nbsp;Penalty Details</h3>
			<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">	
	<label class="control-label labelhdata" style="color:black;margin-left:400px;font-size:18px">Note : Click On Icons For Penalty History</label>
		<table border="1" class="table table-bordered" style="width:100%">
		<tbody>
			<?php
			dbcon1();
			$count_sr=0;
			$pf_no=$_GET['pf'];
			$cnt=0;
		    $i=0;
			$sql1=mysql_query("select distinct(count) from penalty_track where pen_pf_number='$pf_no'");
               $h=mysql_num_rows($sql1);
			   if($h==0)
			   {
				  echo "<label class='control-label col-md-4 col-sm-3 col-xs-12' style='font-size:15px;color:red;'>Penalty for This Employee Is Not Available</label>";
			   }
			if($sql1)
			{
				while($res=mysql_fetch_assoc($sql1))
				{
					$get_cnt=$res['count'];
					if($get_cnt!=0)
						dbcon1();
						$sql=mysql_query("select * from  penalty_track where pen_pf_number='$pf_no' and count='$get_cnt' and id!=(SELECT MAX(id) FROM penalty_track) ORDER by id desc");

						$count_records=mysql_num_rows($sql);
						$sql_last=mysql_query("select * from  penalty_track where pen_pf_number='$pf_no' and count='$get_cnt' ORDER by id desc limit 1");
					 
						$data_last=[];
						while($fetch_sql_last=mysql_fetch_array($sql_last))
						{
						   $data_last=$fetch_sql_last;
						}					 
						$data=[];
						$pen_diff=[];
						
						while($fetch_sql=mysql_fetch_array($sql))
						{
							$data[$cnt]=$fetch_sql;
							if($count_records>0)
							{
								$temp=$cnt;
								$count_sr++;
								if($data[$temp]['pen_type']!=$data_last['pen_type'])         		 $pen_diff[0]=1;
								if($data[$temp]['pen_issued']!=$data_last['pen_issued'])             $pen_diff[1]=1;
								if($data[$temp]['pen_effetcted']!=$data_last['pen_effetcted'])       $pen_diff[2]=1;
								if($data[$temp]['pen_letterno']!=$data_last['pen_letterno'])         $pen_diff[3]=1;
								if($data[$temp]['pen_letterdate']!=$data_last['pen_letterdate'])	 $pen_diff[4]=1;
								if($data[$temp]['pen_chargestatus']!=$data_last['pen_chargestatus']) $pen_diff[5]=1;
								if($data[$temp]['pen_chargeref']!=$data_last['pen_chargeref'])		 $pen_diff[6]=1;
								if($data[$temp]['pen_from']!=$data_last['pen_from'])				 $pen_diff[7]=1;
								if($data[$temp]['pen_to']!=$data_last['pen_to'])				     $pen_diff[8]=1;
								if($data[$temp]['pen_remark']!=$data_last['pen_remark'])			 $pen_diff[9]=1;
							}
							$cnt++;
						} 
						
						if($count_records==0)
						{
							$sql=mysql_query("select * from penalty_track where pen_pf_number='$pf_no'");
							if($sql){
								while($fetch_sql=mysql_fetch_array($sql))
								  {
									$pen_pf_number=$fetch_sql['pen_pf_number']; 
									$pen_type=get_penalty_type($fetch_sql['pen_type']);
									$pen_issued=$fetch_sql['pen_issued'];
									$pen_effetcted=$fetch_sql['pen_effetcted'];
									$pen_letterno=$fetch_sql['pen_letterno'];
									$pen_letterdate=$fetch_sql['pen_letterdate'];
									$pen_chargestatus=get_charge_sheet_status($fetch_sql['pen_chargestatus']);
									$pen_chargeref=$fetch_sql['pen_chargeref'];
									$pen_from=$fetch_sql['pen_from'];
									$pen_to=$fetch_sql['pen_to'];
									$pen_remark=$fetch_sql['pen_remark'];
									//echo $pen_remark."<br>";
								 }
							}
						}
						
						
						if($pen_diff[0]==1)
						{
							$pen_type=get_penalty_type($data_last['pen_type']).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="pen_type" data-toggle="modal" tbl_name="penalty_track" col_nm="pen_pf_number" getcount='.$get_cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
						}
						else
						{
							$pen_type=get_penalty_type($data_last['pen_type']);
						}
						
						if($pen_diff[1]==1)
						{
							$pen_issued1=$data_last['pen_issued'];
							$pen_issued=date('d-m-Y',strtotime($pen_issued1)).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="pen_issued" class="fa fa-info-circle click_awards visit" data-toggle="modal" tbl_name="penalty_track" col_nm="pen_pf_number" getcount='.$get_cnt.' data-target="#delete" ></span>';
						}
						else
						{
							$pen_issued1=$data_last['pen_issued'];
							$pen_issued=date('d-m-Y',strtotime($pen_issued1));
						}
						
						if($pen_diff[2]==1)
						{
							$pen_effetcted1=$data_last['pen_effetcted'];
							$pen_effetcted=date('d-m-Y',strtotime($pen_effetcted1)).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="pen_effetcted" class="fa fa-info-circle click_awards visit" data-toggle="modal" tbl_name="penalty_track" col_nm="pen_pf_number" getcount='.$get_cnt.' data-target="#delete" ></span>';
						}
						else
						{
							$pen_effetcted1=$data_last['pen_effetcted'];
							$pen_effetcted=date('d-m-Y',strtotime($pen_effetcted1));	
						}
						
						if($pen_diff[3]==1)
						{
							$pen_letterno=$data_last['pen_letterno'].'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="pen_letterno" data-toggle="modal" tbl_name="penalty_track" col_nm="pen_pf_number" getcount='.$get_cnt.'  limit='.$cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
						}
						else
						{
							$pen_letterno=$data_last['pen_letterno'];
						}
						
						if($pen_diff[4]==1)
						{
							$pen_letterdate1=$data_last['pen_letterdate'];
							$pen_letterdate=date('d-m-Y',strtotime($pen_letterdate1)).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="pen_letterdate" class="fa fa-info-circle click_awards visit" data-toggle="modal" tbl_name="penalty_track" col_nm="pen_pf_number" getcount='.$get_cnt.' data-target="#delete" ></span>';
						}
						else
						{
							$pen_letterdate1=$data_last['pen_letterdate'];
							$pen_letterdate=date('d-m-Y',strtotime($pen_letterdate1));
						}
						
						if($pen_diff[5]==1)
						{						
							$pen_chargestatus=get_charge_sheet_status($data_last['pen_chargestatus']).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="pen_chargestatus" data-toggle="modal" tbl_name="penalty_track" col_nm="pen_pf_number" getcount='.$get_cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
						}
						else
						{
							$pen_chargestatus=get_charge_sheet_status($data_last['pen_chargestatus']);
						}
					
						if($pen_diff[6]==1)
						{
							$pen_chargeref=$data_last['pen_chargeref']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='pen_chargeref' data-toggle='modal' tbl_name='penalty_track' col_nm='pen_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$pen_chargeref=$data_last['pen_chargeref'];
						}
						
						if($pen_diff[7]==1)
						{
							$pen_from1=$data_last['pen_from'];
							$pen_from=date('d-m-Y',strtotime($pen_from1)).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="pen_from" class="fa fa-info-circle click_awards visit" data-toggle="modal" tbl_name="penalty_track" col_nm="pen_pf_number" getcount='.$get_cnt.' data-target="#delete" ></span>';
						}
						else
						{
							$pen_from1=$data_last['pen_from'];
							$pen_from=date('d-m-Y',strtotime($pen_from1));
						}
						
						if($pen_diff[8]==1)
						{
							$pen_to1=$data_last['pen_to'];
							$pen_to=date('d-m-Y',strtotime($pen_to1)).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="pen_to" class="fa fa-info-circle click_awards visit" data-toggle="modal" tbl_name="penalty_track" col_nm="pen_pf_number" getcount='.$get_cnt.' data-target="#delete" ></span>';
						}
						else
						{
							$pen_to1=$data_last['pen_to'];
							$pen_to=date('d-m-Y',strtotime($pen_to1));
						}
						
						if($pen_diff[9]==1)
						{
							$pen_remark=$data_last['pen_remark']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='pen_remark' data-toggle='modal' tbl_name='penalty_track' col_nm='pen_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							//$pen_remark=$data[$i]['pen_remark'];
							$pen_remark=$data_last['pen_remark'];
						}
						
						?>
						
					<tr><td colspan="5" style="background-color:grey;color:white;"></td></tr>
						<tr>
							<td><label class="control-label labelhed " >PF No</label></td>
							<td> <label class="control-label labelhdata"><?php echo $pf_no; ?></label></td>
							<td><label class="control-label labelhed" >Penalty Type</label></td>
							<td><label class="labelhdata labelhdata"><?php echo $pen_type; ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Penalty Issued</label></td>
							<td><label class="control-label labelhdata"><?php echo $pen_issued; ?></label></td>
							<td><label class="control-label labelhed" >Penalty Effected</label></td>
							<td><label class="control-label labelhdata"><?php echo $pen_effetcted; ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Letter No</label></td>
							<td><label class="control-label labelhdata"><?php echo $pen_letterno; ?></label></td>
							<td><label class="control-label labelhed" >Letter Date</label></td>
							<td><label class="control-label labelhdata"><?php echo $pen_letterdate; ?></label></td>
						</tr>	
						<tr>
							<td><label class="control-label labelhed" >ChargeSheet Status</label></td>
							<td><label class="control-label labelhdata"><?php echo $pen_chargestatus; ?></label></td>
							<td><label class="control-label labelhed" >ChargeSheet Reference Number </label></td>
							<td><label class="control-label labelhdata"><?php echo $pen_chargeref;?></label></td>
						</tr>	
						<tr>
							<td><label class="control-label labelhed" >From Date</label></td>
							<td><label class="control-label labelhdata"><?php echo $pen_from; ?></label></td>
							<td><label class="control-label labelhed" >To Date</label></td>
							<td><label class="control-label labelhdata"><?php echo $pen_to; ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Remarks</label></td>
							<td colspan="5"><label class="control-label labelhdata"><?php echo $pen_remark;  ?></label></td>
							
						</tr>	
						<?php $cnt++;?>
	<?php 
				}
			}
	?>
			</tbody>
		</table>
	</div>
	 
</div>
<!-- Penalty Tab Ends -->

<!-- Property Tab Strats -->
<div class="tab-pane" id="property">
		<div class="table-responsive" style="padding:20px;">
			<h3>&nbsp;&nbsp;Property Details</h3>
			<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">	
	<label class="control-label labelhdata" style="color:black;margin-left:400px;font-size:18px">Note : Click On Icons For Property History</label>
		<table border="1" class="table table-bordered"  style="width:100%">
				<tbody>
			<?php
			dbcon1();
			$pf_no=$_GET['pf'];
			$cnt=0;
		    $i=0;
			
			$sql1=mysql_query("select distinct(count) from  property_track where pro_pf_number='$pf_no'");
                        $h=mysql_num_rows($sql1);
					//	echo "select distinct(count) from  property_track where pro_pf_number='$pf_no'".mysql_error();
                        if($h==0)
						{
							echo "<label class='control-label col-md-4 col-sm-3 col-xs-12' style='font-size:15px;color:red;'>Property for This Employee Is Not Available</label>";
						}
			if($sql1){
			while($res=mysql_fetch_assoc($sql1))
			{
				 $get_cnt=$res['count'];
			    if($get_cnt!=0)
					dbcon1();
					$sql=mysql_query("select * from  property_track where pro_pf_number='$pf_no' and count='$get_cnt' and id!=(SELECT MAX(id) FROM property_track) ORDER by id desc");

					
					$count_records=mysql_num_rows($sql);
					$sql_last=mysql_query("select * from  property_track where pro_pf_number='$pf_no' and count='$get_cnt' ORDER by id desc limit 1");
				 
					$data_last=[];
					while($fetch_sql_last=mysql_fetch_array($sql_last))
					{
                       $data_last=$fetch_sql_last;
				    }					 
					$data=[];
		            $pro_diff=[];
			        while($fetch_sql=mysql_fetch_array($sql))
					{
						$data[$cnt]=$fetch_sql;
						$temp=$cnt;

						if($data[$temp]['pro_type']!=$data_last['pro_type'])         		 $pro_diff[0]=1;
						if($data[$temp]['pro_item']!=$data_last['pro_item'])             	 $pro_diff[1]=1;
						if($data[$temp]['pro_otheritem']!=$data_last['pro_otheritem'])       $pro_diff[2]=1;
						if($data[$temp]['pro_make']!=$data_last['pro_make'])        		 $pro_diff[3]=1;
						if($data[$temp]['pro_dop']!=$data_last['pro_dop'])					 $pro_diff[4]=1;
						if($data[$temp]['pro_location']!=$data_last['pro_location'])		 $pro_diff[5]=1;
						if($data[$temp]['pro_regno']!=$data_last['pro_regno'])				 $pro_diff[6]=1;
						if($data[$temp]['pro_area']!=$data_last['pro_area'])				 $pro_diff[7]=1;
						if($data[$temp]['pro_surveyno']!=$data_last['pro_surveyno'])		 $pro_diff[8]=1;
						if($data[$temp]['pro_cost']!=$data_last['pro_cost'])			 	 $pro_diff[9]=1;
						if($data[$temp]['pro_source']!=$data_last['pro_source'])			 $pro_diff[10]=1;
						if($data[$temp]['pro_sourcetype']!=$data_last['pro_sourcetype'])	 $pro_diff[11]=1;
						if($data[$temp]['pro_amount']!=$data_last['pro_amount'])			 $pro_diff[12]=1;
						if($data[$temp]['pro_letterno']!=$data_last['pro_letterno'])		 $pro_diff[13]=1;
						if($data[$temp]['pro_letterdate']!=$data_last['pro_letterdate'])	 $pro_diff[14]=1;
						if($data[$temp]['pro_remark']!=$data_last['pro_remark'])			 $pro_diff[15]=1;
				  
						$cnt++;
			 		} 
					
					
					if($count_records==0)
					{
						$sql=mysql_query("select * from  property_track where pro_pf_number='$pf_no'");
						if($sql)
						{
							$fetch_sql=mysql_fetch_array($sql);
						
							$pf_no = $fetch_sql['pro_pf_number'];
							$property_type=get_property_type($fetch_sql['pro_type']);
							$item= get_property_item($fetch_sql['pro_item']);
							$other_item = $fetch_sql['pro_otheritem'];
							$make_modal = $fetch_sql['pro_make'];
							$dop = $fetch_sql['pro_dop'];
							$location = $fetch_sql['pro_location'];
							$reg_no = $fetch_sql['pro_regno'];
							$area = $fetch_sql['pro_area'];
							$survey_number = $fetch_sql['pro_surveyno'];
							$tot_cost = $fetch_sql['pro_cost'];
							$source = $fetch_sql['pro_source'];
							$source_type = get_source_typ($fetch_sql['pro_sourcetype']);
							$amount = $fetch_sql['pro_amount'];
							$letter_number = $fetch_sql['pro_letterno'];
							$letter_date = $fetch_sql['pro_letterdate'];
							$remark = $fetch_sql['pro_remark'];
						}
					}
					
					
						if($pro_diff[0]==1)
						{
							$property_type=get_property_type($data_last['pro_type']).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="pro_type" data-toggle="modal" tbl_name="property_track" col_nm="pro_pf_number" getcount='.$get_cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
						}
						else
						{
							$property_type=get_property_type($data_last['pro_type']);
						}
						
						if($pro_diff[4]==1)
						{
							$dop1=$data_last['pro_dop'];
							$dop=date('d-m-Y',strtotime($dop1)).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="pro_dop" class="fa fa-info-circle click_awards visit" data-toggle="modal" tbl_name="property_track" col_nm="pro_pf_number" getcount='.$get_cnt.' data-target="#delete" ></span>';
						}
						else
						{
							$dop1=$data_last['pro_dop'];
							$dop=date('d-m-Y',strtotime($dop1));
						}
						
						if($pro_diff[14]==1)
						{
							$letter_date1=$data_last['pro_letterdate'];
							$letter_date=date('d-m-Y',strtotime($letter_date1)).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="pro_letterdate" class="fa fa-info-circle click_awards visit" data-toggle="modal" tbl_name="property_track" col_nm="pro_pf_number" getcount='.$get_cnt.' data-target="#delete" ></span>';
						}
						else
						{
							$letter_date1=$data_last['pro_letterdate'];
							$letter_date=date('d-m-Y',strtotime($letter_date1));	
						}
						
						if($pro_diff[1]==1)
						{
							$item=get_property_item($data_last['pro_item']).'<span style="cursor: 		pointer;margin-left:6px;color:blue;font-size:20px;" val="pro_item" data-toggle="modal" tbl_name="property_track" col_nm="pro_pf_number" getcount='.$get_cnt.'  limit='.$cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
						}
						else
						{
							$item=get_property_item($data_last['pro_item']);
						}
						
						if($pro_diff[2]==1)
						{
							$other_item=$data_last['pro_otheritem'].'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="pro_otheritem" class="fa fa-info-circle click_awards visit" data-toggle="modal" tbl_name="property_track" col_nm="pro_pf_number" getcount='.$get_cnt.' data-target="#delete" ></span>';
						}
						else
						{
							$other_item=$data_last['pro_otheritem'];
						}
						
						if($pro_diff[3]==1)
						{						
							$make_modal=$data_last['pro_make'].'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="pro_make" data-toggle="modal" tbl_name="property_track" col_nm="pro_pf_number" getcount='.$get_cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
						}
						else
						{
							$make_modal=$data_last['pro_make'];
						}
					
						if($pro_diff[5]==1)
						{
							$location=$data_last['pro_location']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='pro_location' data-toggle='modal' tbl_name='property_track' col_nm='pro_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$location=$data_last['pro_location'];
						}
						
						if($pro_diff[6]==1)
						{
							$reg_no=$data_last['pro_regno'].'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="pro_regno" class="fa fa-info-circle click_awards visit" data-toggle="modal" tbl_name="property_track" col_nm="pro_pf_number" getcount='.$get_cnt.' data-target="#delete" ></span>';
						}
						else
						{
							$reg_no=$data_last['pro_regno'];
						}
						
						if($pro_diff[7]==1)
						{
							$area=$data_last['pro_area'].'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="pro_area" class="fa fa-info-circle click_awards visit" data-toggle="modal" tbl_name="property_track" col_nm="pro_pf_number" getcount='.$get_cnt.' data-target="#delete" ></span>';
						}
						else
						{
								$area=$data_last['pro_area'];
						}
						
						if($pro_diff[8]==1)
						{
							$survey_number=$data_last['pro_surveyno']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='pro_surveyno' data-toggle='modal' tbl_name='property_track' col_nm='pro_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$survey_number=$data_last['pro_surveyno'];
						}
						
						if($pro_diff[9]==1)
						{
							$tot_cost=$data_last['pro_cost']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='pro_cost' data-toggle='modal' tbl_name='property_track' col_nm='pro_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$tot_cost=$data_last['pro_cost'];
						}
						
						if($pro_diff[10]==1)
						{
							$source=$data_last['pro_source']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='pro_source' data-toggle='modal' tbl_name='property_track' col_nm='pro_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$source=$data_last['pro_source'];
						}
						
						if($pro_diff[11]==1)
						{
							$source_type=get_source_typ($data_last['pro_sourcetype'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='pro_sourcetype' data-toggle='modal' tbl_name='property_track' col_nm='pro_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$source_type=get_source_typ($data_last['pro_sourcetype']);
						}
						
						if($pro_diff[12]==1)
						{
							$amount=$data_last['pro_amount']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='pro_amount' data-toggle='modal' tbl_name='property_track' col_nm='pro_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$amount=$data_last['pro_amount'];
						}
						
						if($pro_diff[13]==1)
						{
							$letter_number=$data_last['pro_letterno']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='pro_letterno' data-toggle='modal' tbl_name='property_track' col_nm='pro_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$letter_number=$data_last['pro_letterno'];
						}
						
						if($pro_diff[15]==1)
						{
							$remark=$data_last['pro_remark']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='pro_remark' data-toggle='modal' tbl_name='property_track' col_nm='pro_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$remark=$data_last['pro_remark'];
						}
						 	
					?>
					
				<tr>
						<td><label class="control-label labelhed " >PF No</label></td>
						<td> <label class="control-label labelhdata"><?php echo $pf_no ?></label></td>
						<td><label class="control-label labelhed" >Property Type</label></td>
						<td><label class="labelhdata labelhdata"><?php echo $property_type;?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Item</label></td>
						<td><label class="control-label labelhdata"><?php echo $item;?></label></td>
						<td><label class="control-label labelhed" >Other Item</label></td>
						<td><label class="control-label labelhdata"><?php echo $other_item;?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Make/Model</label></td>
						<td><label class="control-label labelhdata"><?php echo $make_modal;?></label></td>
						<td><label class="control-label labelhed" >Date Of Purchase</label></td>
						<td><label class="control-label labelhdata"><?php echo $dop;?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Location</label></td>
						<td><label class="control-label labelhdata"><?php echo $location;?></label></td>
						<td><label class="control-label labelhed" >Registration No</label></td>
						<td><label class="control-label labelhdata"><?php echo $reg_no ?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Area</label></td>
						<td><label class="control-label labelhdata"><?php echo $area;?></label></td>
						<td><label class="control-label labelhed" >Survey Number</label></td>
						<td><label class="control-label labelhdata"><?php echo $survey_number;?></label></td>
					</tr><tr>
						<td><label class="control-label labelhed" >Total Cost</label></td>
						<td><label class="control-label labelhdata"><?php echo $tot_cost;?></label></td>
						<td><label class="control-label labelhed" >Source</label></td>
						<td><label class="control-label labelhdata"><?php echo $source;?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Source type</label></td>
						<td><label class="control-label labelhdata"><?php echo $source_type;?></label></td>
						<td><label class="control-label labelhed" >Amount</label></td>
						<td><label class="control-label labelhdata"><?php echo $amount;?></label></td>
					</tr>

					<tr>
						<td><label class="control-label labelhed" >Letter No</label></td>
						<td><label class="control-label labelhdata"><?php echo $letter_number;?></label></td>
						<td><label class="control-label labelhed" >Letter Date</label></td>
						<td><label class="control-label labelhdata"><?php echo $letter_date;?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Remarks</label></td>
						<td colspan="3"><label class="control-label labelhdata"><?php echo $remark;?></label></td>
					</tr>
					<tr><td colspan="5" style="background-color:gray"></td></tr>	
					<?php $cnt++;?>
<?php 
}
			}
?>
			</tbody>
		</table>
	</div>
	 
</div>
<!-- Property Tab Ends -->

<!--nominee Tab Start -->
<div class="tab-pane" id="nominee">
		
		<div  class="tab-pane" id="nominee" style="padding:10px;">
			<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Nominee Details</h3>
			<div class="box-header with-border">
			<!--ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
					<li class=""><a href="#nominee" data-toggle="tab"><b>PF Nominee</b></a></li>
						<li class=""><a href="#gis" data-toggle="tab"><b>GIS Nominee</b></a></li>
						<li class=""><a href="#gratuity" data-toggle="tab"><b>Gratuity Nominee</b></a></li>
						
			</ul-->
				 
			</div>
					<div class="box-body">
					<form method="post" action="process_main.php?action=" class="">
				<div class="modal-body">
						<!--h3>PF Nominee</h3><hr-->
							<div class="row">
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
             <div class="table-responsive">
			 <?php 
			 dbcon1();
				$pf_no=$_GET['pf'];
			
			 $cnt=0;
		     	 $i=0;
			$sql1=mysql_query("select distinct(count) from  nominee_track where nom_pf_number='$pf_no'");
			if($sql1){
			while($res=mysql_fetch_assoc($sql1))
			{
				 $get_cnt=$res['count'];
			    if($get_cnt!=0)
					dbcon1();
					$sql=mysql_query("select * from  nominee_track where nom_pf_number='$pf_no' and count='$get_cnt' and id!=(SELECT MAX(id) FROM nominee_track) ORDER by id desc");

					$count_records=mysql_num_rows($sql);
					$sql_last=mysql_query("select * from  nominee_track where nom_pf_number='$pf_no' and count='$get_cnt' ORDER by id desc limit 1");
				 
					$data_last=[];
					 while($fetch_sql_last=mysql_fetch_array($sql_last))
					{
                       $data_last=$fetch_sql_last;
				    }					 
					$data=[];
		            $npf_diff=[];
			        while($fetch_sql=mysql_fetch_array($sql))
					{
						$data[$cnt]=$fetch_sql;
						if($count_records>0)
						 {
							$temp=$cnt;

							if($data[$temp]['nom_type']!=$data_last['nom_type'])          		$npf_diff[0]=1;
							if($data[$temp]['nom_name']!=$data_last['nom_name'])          		$npf_diff[1]=1;
							if($data[$temp]['nom_rel']!=$data_last['nom_rel'])            		$npf_diff[2]=1;
							if($data[$temp]['nom_otherrel']!=$data_last['nom_otherrel'])  		$npf_diff[3]=1;
							if($data[$temp]['nom_per']!=$data_last['nom_per'])				    $npf_diff[4]=1;
							if($data[$temp]['nom_status']!=$data_last['nom_status'])	  		$npf_diff[5]=1;
							if($data[$temp]['nom_age']!=$data_last['nom_age'])			  		$npf_diff[6]=1;
							if($data[$temp]['nom_dob']!=$data_last['nom_dob'])			  		$npf_diff[7]=1;
							if($data[$temp]['nom_panno']!=$data_last['nom_panno'])		  		$npf_diff[8]=1;
							if($data[$temp]['nom_aadhar']!=$data_last['nom_aadhar'])	  		$npf_diff[9]=1;
							if($data[$temp]['nom_address']!=$data_last['nom_address'])	  		$npf_diff[10]=1;
							if($data[$temp]['nom_conti']!=$data_last['nom_conti'])		  		$npf_diff[11]=1;
							if($data[$temp]['nom_subscriber']!=$data_last['nom_subscriber'])	$npf_diff[12]=1;
							
						 }
						$cnt++;
			 		}
					if($count_records==0)
					{
						$sql=mysql_query("select * from  nominee_track where nom_pf_number='$pf_no'");
						if($sql)
						{
						while($result=mysql_fetch_array($sql)){
							
							$nom_type=$result['nom_type'];
							$nom_name=$result['nom_name'];
							$nom_rel=$result['nom_rel'];
							$nom_otherrel=$result['nom_otherrel'];
							$nom_per=$result['nom_per'];
							$nom_status=$result['nom_status'];
							$nom_age=$result['nom_age'];
							$nom_dob=$result['nom_dob'];
							$nom_panno=$result['nom_panno'];
							$nom_aadhar=$result['nom_aadhar'];
							$nom_address=$result['nom_address'];
							$nom_conti=$result['nom_conti'];
							$nom_subscriber=$result['nom_subscriber'];
							}
						}
					}

						
						if($npf_diff[0]==1)
						{
							$nom_type=$data_last['nom_type'].'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="nom_type" class="fa fa-info-circle click_awards visit" data-toggle="modal" tbl_name="nominee_track" col_nm="nom_pf_number" getcount='.$get_cnt.' data-target="#delete" ></span>';
						}
						else
						{
						
							$nom_type=$data_last['nom_type'];
						}
						
						if($npf_diff[1]==1)
						{
							$nom_name=get_fam_name($data_last['nom_name']).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="nom_name" data-toggle="modal" tbl_name="nominee_track" col_nm="nom_pf_number" getcount='.$get_cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
						}
						else
						{
							$nom_name=get_fam_name($data_last['nom_name']);
						}
						
						if($npf_diff[2]==1)
						{
							$nom_rel=get_relation($data_last['nom_rel']).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="nom_rel" data-toggle="modal" tbl_name="nominee_track" col_nm="nom_pf_number" getcount='.$get_cnt.'  limit='.$cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
						}
						else
						{
							$nom_rel=get_relation($data_last['nom_rel']);
						}
						
						
						if($npf_diff[3]==1)
						{
							$nom_otherrel=$data_last['nom_otherrel']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='nom_otherrel' data-toggle='modal' tbl_name='nominee_track' col_nm='nom_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$nom_otherrel=$data_last['nom_otherrel'];
						}
						
						if($npf_diff[4]==1)
						{
							$nom_per=$data_last['nom_per']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='nom_per' data-toggle='modal' tbl_name='nominee_track' col_nm='nom_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$nom_per=$data_last['nom_per'];
						}
						
						if($npf_diff[5]==1)
						{
							$nom_status=got_mr($data_last['nom_status'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='nom_status' data-toggle='modal' tbl_name='nominee_track' col_nm='nom_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$nom_status=got_mr($data_last['nom_status']);
						}
						
						if($npf_diff[6]==1)
						{
							$nom_age=$data_last['nom_age']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='nom_age' data-toggle='modal' tbl_name='nominee_track' col_nm='nom_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$nom_age=$data_last['nom_age'];
						}
						if($npf_diff[7]==1)
						{
							$nom_dob1=$data_last['nom_dob'];
							$nom_dob=date('d-m-Y',strtotime($nom_dob1)).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="nom_dob" class="fa fa-info-circle click_awards visit" data-toggle="modal" tbl_name="nominee_track" col_nm="nom_pf_number" getcount='.$get_cnt.' data-target="#delete" ></span>';
						}
						else
						{
							$nom_dob1=$data_last['nom_dob'];
							$nom_dob=date('d-m-Y',strtotime($nom_dob1));
						}
						
						if($npf_diff[8]==1)
						{
							$nom_panno=$data_last['nom_panno']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='nom_panno' data-toggle='modal' tbl_name='nominee_track' col_nm='nom_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$nom_panno=$data_last['nom_panno'];
						}
						
						if($npf_diff[9]==1)
						{
							$nom_aadhar=$data_last['nom_aadhar']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='nom_aadhar' data-toggle='modal' tbl_name='nominee_track' col_nm='nom_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$nom_aadhar=$data_last['nom_aadhar'];
						}
						
						if($npf_diff[10]==1)
						{
							$nom_address=$data_last['nom_address']."<span 	style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='nom_address' data-toggle='modal' tbl_name='nominee_track' col_nm='nom_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$nom_address=$data_last['nom_address'];
						}
						
						if($npf_diff[11]==1)
						{
							$nom_conti=$data_last['nom_conti']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='nom_conti' data-toggle='modal' tbl_name='nominee_track' col_nm='nom_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$nom_conti=$data_last['nom_conti'];
						}
						
						if($npf_diff[12]==1)
						{
							$nom_subscriber=$data_last['nom_subscriber']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='nom_subscriber' data-toggle='modal' tbl_name='nominee_track' col_nm='nom_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$nom_subscriber=$data_last['nom_subscriber'];
						}
					
					echo "<table border='1' class='table table-bordered'  style='width:100%'>";
					echo "<tbody>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed'>PF No</label></td>";
					echo "<td> <label class='control-label labelhdata'> $pf_no </label></td>";
					echo "<td><label class='control-label labelhed' >Nomination Type</label></td>";
					echo "<td><label class='labelhdata labelhdata'> $nom_type </label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Name of Nominee</label></td>";
					echo "<td><label class='labelhdata labelhdata'>$nom_name</label>";
					echo "</td><td><label class='control-label labelhed' >Nomination Relationship</label></td>";
					echo "<td><label class='labelhdata labelhdata'> $nom_rel </label>";
					echo "</td>";
					echo "</tr>";	
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Other Relationship</label></td>";
					echo "<td><label class='control-label labelhdata'> $nom_otherrel </label></td>";
					echo "<td><label class='control-label labelhed' >Percentage</label></td>";
					echo "<td><label class='control-label labelhdata'> $nom_per </label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Marital Status</label></td>";
					echo "<td><label class='control-label labelhdata'> $nom_status </label></td>";
					echo "<td><label class='control-label labelhed' >Age</label></td>";
					echo "<td><label class='control-label labelhdata'> $nom_age </label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Date Of Birth</label></td>";
					echo "<td><label class='control-label labelhdata'> $nom_dob </label></td>";
					echo "<td><label class='control-label labelhed' >Nominee PAN Number</label></td>";
					echo "<td><label class='control-label labelhdata'> $nom_panno </label></td>";
					echo "</tr>	";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Nominee Aadhar Number</label></td>";
					echo "<td><label class='control-label labelhdata'> $nom_aadhar </label></td>";
					echo "<td><label class='control-label labelhed'>Address Of Nominee</label></td>";
					echo "<td><label class='control-label labelhdata'> $nom_address </label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed'>Contigencies</label></td>";
					echo "<td><label class='control-label labelhdata'> $nom_conti </label></td>";
					echo "<td><label class='control-label labelhed'>Name, Address & Relation of person predeceasing the subscriber</label></td>";
					echo "<td><label class='control-label labelhdata'> $nom_subscriber </label></td>";
					echo "</tr>";
					echo"<tr><td colspan='5' style='background-color:gray'></td></tr>";
					echo "</tbody>";
					echo "</table>";
					
					}
			}		
				
			 ?>
			</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>	
	<script>
  $(function () {
    $('#example2').DataTable()
   
  })
</script>
							</div>
				</div>
				</form>
			</div>
		</div>			 
		<div class="pull-right col-md-7 col-sm-12 col-xs-12">
			<!--a href="sr_view.php" class="btn btn-primary">Back</a-->
		</div>						 
    </div> 
	<div class="tab-pane" id="gis">
		
		<div  class="tab-pane" id="gis" style="padding:10px;">
			<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Nominee Details	</h3>
			<div class="box-header with-border">
			<ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
						<li class=""><a href="#nominee" data-toggle="tab"><b>PF Nominee</b></a></li>
						<li class=""><a href="#gis" data-toggle="tab"><b>GIS Nominee</b></a></li>
						<li class=""><a href="#gratuity" data-toggle="tab"><b>Gratuity Nominee</b></a></li>
						
			</ul>
				 
			</div>
					<div class="box-body">
					<form method="post" action="process_main.php?action=" class="">
				<div class="modal-body">
						<h3>GIS Nominee</h3><hr>
							<div class="row">
										<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="table-responsive">
			<?php 
				dbcon1();
				$pf_no=$_GET['pf'];
				$cnt=0;
		     	$i=0;
			$sql1=mysql_query("select distinct(count) from  nominee_track where nom_pf_number='$pf_no'");
			if($sql1){
			while($res=mysql_fetch_assoc($sql1))
			{
				 $get_cnt=$res['count'];
			    if($get_cnt!=0)
					dbcon1();
					$sql=mysql_query("select * from  nominee_track where nom_pf_number='$pf_no' and count='$get_cnt' and id!=(SELECT MAX(id) FROM nominee_track) ORDER by id desc");

					$count_records=mysql_num_rows($sql);
					$sql_last=mysql_query("select * from  nominee_track where nom_pf_number='$pf_no' and count='$get_cnt' ORDER by id desc limit 1");
				 
					$data_last=[];
					 while($fetch_sql_last=mysql_fetch_array($sql_last))
					{
                       $data_last=$fetch_sql_last;
				    }					 
					$data=[];
		            $ngis_diff=[];
			        while($fetch_sql=mysql_fetch_array($sql))
					{
						$data[$cnt]=$fetch_sql;
						if($count_records>0)
						 {
							$temp=$cnt;

							if($data[$temp]['nom_type']!=$data_last['nom_type'])          		$ngis_diff[0]=1;
							if($data[$temp]['nom_name']!=$data_last['nom_name'])          		$ngis_diff[1]=1;
							if($data[$temp]['nom_rel']!=$data_last['nom_rel'])            		$ngis_diff[2]=1;
							if($data[$temp]['nom_otherrel']!=$data_last['nom_otherrel'])  		$ngis_diff[3]=1;
							if($data[$temp]['nom_per']!=$data_last['nom_per'])				    $ngis_diff[4]=1;
							if($data[$temp]['nom_status']!=$data_last['nom_status'])	  		$ngis_diff[5]=1;
							if($data[$temp]['nom_age']!=$data_last['nom_age'])			  		$ngis_diff[6]=1;
							if($data[$temp]['nom_dob']!=$data_last['nom_dob'])			  		$ngis_diff[7]=1;
							if($data[$temp]['nom_panno']!=$data_last['nom_panno'])		  		$ngis_diff[8]=1;
							if($data[$temp]['nom_aadhar']!=$data_last['nom_aadhar'])	  		$ngis_diff[9]=1;
							if($data[$temp]['nom_address']!=$data_last['nom_address'])	  		$ngis_diff[10]=1;
							if($data[$temp]['nom_conti']!=$data_last['nom_conti'])		  		$ngis_diff[11]=1;
							if($data[$temp]['nom_subscriber']!=$data_last['nom_subscriber'])	$ngis_diff[12]=1;
							
						 }
						$cnt++;
			 		} 
					if($count_records==0)
					{
						$sql=mysql_query("select * from  nominee_track where nom_pf_number='$pf_no'");
						if($sql)
						{
							while($result=mysql_fetch_array($sql)){
								$nom_type=$result['nom_type'];
								$nom_name=$result['nom_name'];
								$nom_rel=$result['nom_rel'];
								$nom_otherrel=$result['nom_otherrel'];
								$nom_per=$result['nom_per'];
								$nom_status=$result['nom_status'];
								$nom_age=$result['nom_age'];
								$nom_dob=$result['nom_dob'];
								$nom_panno=$result['nom_panno'];
								$nom_aadhar=$result['nom_aadhar'];
								$nom_address=$result['nom_address'];
								$nom_conti=$result['nom_conti'];
								$nom_subscriber=$result['nom_subscriber'];
							}
						}
					}

						
						if($ngis_diff[0]==1)
						{
						
						$nom_type=$data_last['nom_type'].'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="nom_type" class="fa fa-info-circle click_awards visit" data-toggle="modal" tbl_name="nominee_track" col_nm="nom_pf_number" getcount='.$get_cnt.' data-target="#delete" ></span>';
						}
						else
						{
						
						$nom_type=$data_last['nom_type'];
						}
						
						if($ngis_diff[1]==1)
						{
						$nom_name=$data_last['nom_name'].'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="nom_name" data-toggle="modal" tbl_name="nominee_track" col_nm="nom_pf_number" getcount='.$get_cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
						}
						else
						{
							$nom_name=$data_last['nom_name'];
						}
						
						if($ngis_diff[2]==1)
						{
						$nom_rel=get_relation($data_last['nom_rel']).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="nom_rel" data-toggle="modal" tbl_name="nominee_track" col_nm="nom_pf_number" getcount='.$get_cnt.'  limit='.$cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
						}
						else
						{
							$nom_rel=get_relation($data_last['nom_rel']);
						}
						
						
						if($ngis_diff[3]==1)
						{
						$nom_otherrel=$data_last['nom_otherrel']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='nom_otherrel' data-toggle='modal' tbl_name='nominee_track' col_nm='nom_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$nom_otherrel=$data_last['nom_otherrel'];
						}
						
						if($ngis_diff[4]==1)
						{
						$nom_per=$data_last['nom_per']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='nom_per' data-toggle='modal' tbl_name='nominee_track' col_nm='nom_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$nom_per=$data_last['nom_per'];
						}
						
						if($ngis_diff[5]==1)
						{
						$nom_status=got_mr($data_last['nom_status'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='nom_status' data-toggle='modal' tbl_name='nominee_track' col_nm='nom_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
						$nom_status=got_mr($data_last['nom_status']);
						}
						
						if($ngis_diff[6]==1)
						{
						$nom_age=$data_last['nom_age']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='nom_age' data-toggle='modal' tbl_name='nominee_track' col_nm='nom_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$nom_age=$data_last['nom_age'];
						}
						
						
						if($ngis_diff[7]==1)
						{
						$nom_dob1=$data_last['nom_dob'];
						$nom_dob=date('d-m-Y',strtotime($nom_dob1)).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="nom_dob" class="fa fa-info-circle click_awards visit" data-toggle="modal" tbl_name="nominee_track" col_nm="nom_pf_number" getcount='.$get_cnt.' data-target="#delete" ></span>';
						}
						else
						{
							$nom_dob1=$data_last['nom_dob'];
						$nom_dob=date('d-m-Y',strtotime($nom_dob1));
						}
						
						if($ngis_diff[8]==1)
						{
						$nom_panno=$data_last['nom_panno']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='nom_panno' data-toggle='modal' tbl_name='nominee_track' col_nm='nom_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$nom_panno=$data_last['nom_panno'];
						}
						
						if($ngis_diff[9]==1)
						{
						$nom_aadhar=$data_last['nom_aadhar']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='nom_aadhar' data-toggle='modal' tbl_name='nominee_track' col_nm='nom_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$nom_aadhar=$data_last['nom_aadhar'];
						}
						
						if($ngis_diff[10]==1)
						{
						$nom_address=$data_last['nom_address']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='nom_address' data-toggle='modal' tbl_name='nominee_track' col_nm='nom_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$nom_address=$data_last['nom_address'];
						}
						
						if($ngis_diff[11]==1)
						{
						$nom_conti=$data_last['nom_conti']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='nom_conti' data-toggle='modal' tbl_name='nominee_track' col_nm='nom_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$nom_conti=$data_last['nom_conti'];
						}
						
						if($ngis_diff[12]==1)
						{
						$nom_subscriber=$data_last['nom_subscriber']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='nom_subscriber' data-toggle='modal' tbl_name='nominee_track' col_nm='nom_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$nom_subscriber=$data_last['nom_subscriber'];
						}
					
					echo "<table border='1' class='table table-bordered'  style='width:100%'>";
					echo "<tbody>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed'>PF No</label></td>";
					echo "<td> <label class='control-label labelhdata'> $pf_no </label></td>";
					echo "<td><label class='control-label labelhed' >Nomination Type</label></td>";
					echo "<td><label class='labelhdata labelhdata'> $nom_type </label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Name of Nominee</label></td>";
					echo "<td><label class='labelhdata labelhdata'> $nom_name </label>";
					echo "</td><td><label class='control-label labelhed' >Nomination Relationship</label></td>";
					echo "<td><label class='labelhdata labelhdata'> $nom_rel </label>";
					echo "</td>";
					echo "</tr>";	
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Other Relationship</label></td>";
					echo "<td><label class='control-label labelhdata'> $nom_otherrel </label></td>";
					echo "<td><label class='control-label labelhed' >Percentage</label></td>";
					echo "<td><label class='control-label labelhdata'> $nom_per </label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Marital Status</label></td>";
					echo "<td><label class='control-label labelhdata'> $nom_status </label></td>";
					echo "<td><label class='control-label labelhed' >Age</label></td>";
					echo "<td><label class='control-label labelhdata'> $nom_age </label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Date Of Birth</label></td>";
					echo "<td><label class='control-label labelhdata'> $nom_dob </label></td>";
					echo "<td><label class='control-label labelhed' >Nominee PAN Number</label></td>";
					echo "<td><label class='control-label labelhdata'> $nom_panno </label></td>";
					echo "</tr>	";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Nominee Aadhar Number</label></td>";
					echo "<td><label class='control-label labelhdata'> $nom_aadhar </label></td>";
					echo "<td><label class='control-label labelhed'>Address Of Nominee</label></td>";
					echo "<td><label class='control-label labelhdata'> $nom_address </label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed'>Contigencies</label></td>";
					echo "<td><label class='control-label labelhdata'> $nom_conti </label></td>";
					echo "<td><label class='control-label labelhed'>Name, Address & Relation of person predeceasing the subscriber</label></td>";
					echo "<td><label class='control-label labelhdata'> $nom_subscriber </label></td>";
					echo "</tr>";
					echo"<tr><td colspan='5' style='background-color:gray'></td></tr>";
					echo "</tbody>";
					echo "</table>";
					
					}
			}		
				
			 ?>
			</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>	
	<script>
  $(function () {
    $('#example3').DataTable()
   
  })
</script>
							</div>
				</div>
				</form>
			</div>
		</div>			 
		<div class="pull-right col-md-7 col-sm-12 col-xs-12">
			<!--a href="sr_view.php" class="btn btn-primary">Back</a-->
		</div>						 
    </div> 	
	<div class="tab-pane" id="gratuity">
		
		<div  class="tab-pane" id="gratuity" style="padding:10px;">
			<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Nominee</h3>
			<div class="box-header with-border">
			<ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
						<li class=""><a href="#nominee" data-toggle="tab"><b>PF Nominee</b></a></li>
						<li class=""><a href="#gis" data-toggle="tab"><b>GIS Nominee</b></a></li>
						<li class=""><a href="#gratuity" data-toggle="tab"><b>Gratuity Nominee</b></a></li>
						
			</ul>
				 
			</div>
					<div class="box-body">
					<form method="post" action="process_main.php?action=" class="">
				<div class="modal-body">
						<h3>Gratuity Nominee</h3><hr>
							<div class="row">
										<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="table-responsive">
				<?php 
			 dbcon1();
				$pf_no=$_GET['pf'];
			 $cnt=0;
		     	 $i=0;
			$sql1=mysql_query("select distinct(count) from  nominee_track where nom_pf_number='$pf_no'");
			echo "select distinct(count) from  nominee_track where nom_pf_number='$pf_no'".mysql_error();
			if($sql1){
			while($res=mysql_fetch_assoc($sql1))
			{
				 $get_cnt=$res['count'];
			    if($get_cnt!=0)
					dbcon1();
					$sql=mysql_query("select * from  nominee_track where nom_pf_number='$pf_no' and count='$get_cnt' and id!=(SELECT MAX(id) FROM nominee_track) ORDER by id desc");

					$count_records=mysql_num_rows($sql);
					$sql_last=mysql_query("select * from  nominee_track where nom_pf_number='$pf_no' and count='$get_cnt' ORDER by id desc limit 1");
				 
					$data_last=[];
					 while($fetch_sql_last=mysql_fetch_array($sql_last))
					{
                       $data_last=$fetch_sql_last;
				    }					 
					$data=[];
		            $ngr_diff=[];
			        while($fetch_sql=mysql_fetch_array($sql))
					{
						$data[$cnt]=$fetch_sql;
						if($count_records>0)
						 {
							$temp=$cnt;

							if($data[$temp]['nom_type']!=$data_last['nom_type'])          		$ngr_diff[0]=1;
							if($data[$temp]['nom_name']!=$data_last['nom_name'])          		$ngr_diff[1]=1;
							if($data[$temp]['nom_rel']!=$data_last['nom_rel'])            		$ngr_diff[2]=1;
							if($data[$temp]['nom_otherrel']!=$data_last['nom_otherrel'])  		$ngr_diff[3]=1;
							if($data[$temp]['nom_per']!=$data_last['nom_per'])				    $ngr_diff[4]=1;
							if($data[$temp]['nom_status']!=$data_last['nom_status'])	  		$ngr_diff[5]=1;
							if($data[$temp]['nom_age']!=$data_last['nom_age'])			  		$ngr_diff[6]=1;
							if($data[$temp]['nom_dob']!=$data_last['nom_dob'])			  		$ngr_diff[7]=1;
							if($data[$temp]['nom_panno']!=$data_last['nom_panno'])		  		$ngr_diff[8]=1;
							if($data[$temp]['nom_aadhar']!=$data_last['nom_aadhar'])	  		$ngr_diff[9]=1;
							if($data[$temp]['nom_address']!=$data_last['nom_address'])	  		$ngr_diff[10]=1;
							if($data[$temp]['nom_conti']!=$data_last['nom_conti'])		  		$ngr_diff[11]=1;
							if($data[$temp]['nom_subscriber']!=$data_last['nom_subscriber'])	$ngr_diff[12]=1;
							
						 }
						$cnt++;
			 		} 
					if($count_records==0)
					{
						$sql=mysql_query("select * from  nominee_track where nom_pf_number='$pf_no'");
						if($sql)
						{
						while($result=mysql_fetch_array($sql)){
							
							$nom_type=$result['nom_type'];
							$nom_name=$result['nom_name'];
							$nom_rel=$result['nom_rel'];
							$nom_otherrel=$result['nom_otherrel'];
							$nom_per=$result['nom_per'];
							$nom_status=$result['nom_status'];
							$nom_age=$result['nom_age'];
							$nom_dob=$result['nom_dob'];
							$nom_panno=$result['nom_panno'];
							$nom_aadhar=$result['nom_aadhar'];
							$nom_address=$result['nom_address'];
							$nom_conti=$result['nom_conti'];
							$nom_subscriber=$result['nom_subscriber'];
							}
						}
					}

						
						if($ngr_diff[0]==1)
						{
						
						$nom_type=$data_last['nom_type'].'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="nom_type" class="fa fa-info-circle click_awards visit" data-toggle="modal" tbl_name="nominee_track" col_nm="nom_pf_number" getcount='.$get_cnt.' data-target="#delete" ></span>';
						}
						else
						{
						
						$nom_type=$data_last['nom_type'];
						}
						
						if($ngr_diff[1]==1)
						{
						$nom_name=$data_last['nom_name'].'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="nom_name" data-toggle="modal" tbl_name="nominee_track" col_nm="nom_pf_number" getcount='.$get_cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
						}
						else
						{
							$nom_name=$data_last['nom_name'];
						}
						
						if($ngr_diff[2]==1)
						{
						$nom_rel=get_relation($data_last['nom_rel']).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="nom_rel" data-toggle="modal" tbl_name="nominee_track" col_nm="nom_pf_number" getcount='.$get_cnt.'  limit='.$cnt.' data-target="#delete" class="fa fa-info-circle click_awards visit"></span>';
						}
						else
						{
							$nom_rel=get_relation($data_last['nom_rel']);
						}
						
						
						if($ngr_diff[3]==1)
						{
						$nom_otherrel=$data_last['nom_otherrel']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='nom_otherrel' data-toggle='modal' tbl_name='nominee_track' col_nm='nom_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$nom_otherrel=$data_last['nom_otherrel'];
						}
						
						if($ngr_diff[4]==1)
						{
						$nom_per=$data_last['nom_per']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='nom_per' data-toggle='modal' tbl_name='nominee_track' col_nm='nom_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$nom_per=$data_last['nom_per'];
						}
						
						if($ngr_diff[5]==1)
						{
						$nom_status=got_mr($data_last['nom_status'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='nom_status' data-toggle='modal' tbl_name='nominee_track' col_nm='nom_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
						$nom_status=got_mr($data_last['nom_status']);
						}
						
						if($ngr_diff[6]==1)
						{
						$nom_age=$data_last['nom_age']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='nom_age' data-toggle='modal' tbl_name='nominee_track' col_nm='nom_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$nom_age=$data_last['nom_age'];
						}
						
						
						if($ngr_diff[7]==1)
						{
						$nom_dob1=$data_last['nom_dob'];
						$nom_dob=date('d-m-Y',strtotime($nom_dob1)).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="nom_dob" class="fa fa-info-circle click_awards visit" data-toggle="modal" tbl_name="nominee_track" col_nm="nom_pf_number" getcount='.$get_cnt.' data-target="#delete" ></span>';
						}
						else
						{
							$nom_dob1=$data_last['nom_dob'];
						$nom_dob=date('d-m-Y',strtotime($nom_dob1));
						}
						
						if($ngr_diff[8]==1)
						{
						$nom_panno=$data_last['nom_panno']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='nom_panno' data-toggle='modal' tbl_name='nominee_track' col_nm='nom_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$nom_panno=$data_last['nom_panno'];
						}
						
						if($ngr_diff[9]==1)
						{
						$nom_aadhar=$data_last['nom_aadhar']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='nom_aadhar' data-toggle='modal' tbl_name='nominee_track' col_nm='nom_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$nom_aadhar=$data_last['nom_aadhar'];
						}
						
						if($ngr_diff[10]==1)
						{
						$nom_address=$data_last['nom_address']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='nom_address' data-toggle='modal' tbl_name='nominee_track' col_nm='nom_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$nom_address=$data_last['nom_address'];
						}
						
						if($ngr_diff[11]==1)
						{
						$nom_conti=$data_last['nom_conti']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='nom_conti' data-toggle='modal' tbl_name='nominee_track' col_nm='nom_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$nom_conti=$data_last['nom_conti'];
						}
						
						if($ngr_diff[12]==1)
						{
						$nom_subscriber=$data_last['nom_subscriber']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='nom_subscriber' data-toggle='modal' tbl_name='nominee_track' col_nm='nom_pf_number' getcount=".$get_cnt." data-target='#delete' class='fa fa-info-circle click_awards visit'></span>";
						}
						else
						{
							$nom_subscriber=$data_last['nom_subscriber'];
						}
					
					echo "<table border='1' class='table table-bordered'  style='width:100%'>";
					echo "<tbody>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed'>PF No</label></td>";
					echo "<td> <label class='control-label labelhdata'> $pf_no </label></td>";
					echo "<td><label class='control-label labelhed' >Nomination Type</label></td>";
					echo "<td><label class='labelhdata labelhdata'>$nom_type</label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Name of Nominee</label></td>";
					echo "<td><label class='labelhdata labelhdata'>".get_fam_name($nom_name)."</label>";
					echo "</td><td><label class='control-label labelhed' >Nomination Relationship</label></td>";
					echo "<td><label class='labelhdata labelhdata'> $nom_rel </label>";
					echo "</td>";
					echo "</tr>";	
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Other Relationship</label></td>";
					echo "<td><label class='control-label labelhdata'> $nom_otherrel </label></td>";
					echo "<td><label class='control-label labelhed' >Percentage</label></td>";
					echo "<td><label class='control-label labelhdata'> $nom_per </label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Marital Status</label></td>";
					echo "<td><label class='control-label labelhdata'> $nom_status </label></td>";
					echo "<td><label class='control-label labelhed' >Age</label></td>";
					echo "<td><label class='control-label labelhdata'> $nom_age </label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Date Of Birth</label></td>";
					echo "<td><label class='control-label labelhdata'> $nom_dob </label></td>";
					echo "<td><label class='control-label labelhed' >Nominee PAN Number</label></td>";
					echo "<td><label class='control-label labelhdata'> $nom_panno </label></td>";
					echo "</tr>	";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Nominee Aadhar Number</label></td>";
					echo "<td><label class='control-label labelhdata'> $nom_aadhar </label></td>";
					echo "<td><label class='control-label labelhed'>Address Of Nominee</label></td>";
					echo "<td><label class='control-label labelhdata'> $nom_address </label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed'>Contigencies</label></td>";
					echo "<td><label class='control-label labelhdata'> $nom_conti </label></td>";
					echo "<td><label class='control-label labelhed'>Name, Address & Relation of person predeceasing the subscriber</label></td>";
					echo "<td><label class='control-label labelhdata'> $nom_subscriber </label></td>";
					echo "</tr>";
					echo"<tr><td colspan='5' style='background-color:gray'></td></tr>";
					echo "</tbody>";
					echo "</table>";
					
					}
			}		
				
			 ?>
			</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>	
	<script>
  $(function () {
    $('#example4').DataTable()
   
  })
</script>
							</div>
				</div>
				</form>
			</div>
		</div>			 
		<div class="pull-right col-md-7 col-sm-12 col-xs-12">
			<!--a href="sr_view.php" class="btn btn-primary">Back</a-->
		</div>						 
    </div> 
<!--nominee Tab End -->

<!--PRFT Tab Start -->

<div class="tab-pane" id="prft">
		
		<div  class="tab-pane" id="prft" style="padding:10px;">
			<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Promotion/Reversion/Transfer/Fixation</h3>
			<div class="box-header with-border">
			<ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
						<li class=""><a href="#prft" data-toggle="tab"><b>Promotion</b></a></li>
						<li class=""><a href="#rever" data-toggle="tab"><b>Reversion</b></a></li>
						<li class=""><a href="#trans" data-toggle="tab"><b>Transfer</b></a></li>
						<li class=""><a href="#fix" data-toggle="tab"><b>Fixation</b></a></li>
			</ul>
				 
			</div>
					<div class="box-body">
					<form method="post" action="process_main.php?action=" class="">
				<div class="modal-body">
						<h3>Promotion</h3><hr>
							<div class="row">
										<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Employee List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-striped">
                <thead>
                <tr>
                  <th>Sr No</th>
                  <th>PF Number</th>
                  <th>Order Type</th>
                  <th>Transion Id</th>
                  <th>View</th>
                </tr>
                </thead>
                <tbody>
              		
					<?php
					dbcon1();
					$pf_no=$_GET['pf'];
					$cnt_pr=1;
					$sql=mysql_query("select * from  prft_promotion_temp where pro_pf_no='$pf_no'");
					while($result=mysql_fetch_array($sql)){
						echo "<tr>";
						echo "<td>$cnt_pr</td>";
						echo "<td>".$result['pro_pf_no']."</td>";
						echo "<td>".$result['pro_order_type']."</td>";
						echo "<td>".$result['temp_transaction_id']."</td>";
						echo "<td><a href='prft_show_promotion_hist.php?pf_no=$pf_no&id=".$result['id']."' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>View</b></i></a></td>";
						echo "</tr>";
						$cnt_pr++;
					}
				?>
			
                </tbody>
                <tfoot>
               
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>	
	<script>
  $(function () {
    $('#example2').DataTable()
   
  })
</script>
							</div>
				</div>
				</form>
			</div>
		</div>			 
		<div class="pull-right col-md-7 col-sm-12 col-xs-12">
			<!--a href="sr_view.php" class="btn btn-primary">Back</a-->
		</div>						 
    </div> 
	<div class="tab-pane" id="rever">
		
		<div  class="tab-pane" id="rever" style="padding:10px;">
			<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Promotion/Reversion/Transfer/Fixation</h3>
			<div class="box-header with-border">
			<ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
						<li class=""><a href="#prft" data-toggle="tab"><b>Promotion</b></a></li>
						<li class=""><a href="#rever" data-toggle="tab"><b>Reversion</b></a></li>
						<li class=""><a href="#trans" data-toggle="tab"><b>Transfer</b></a></li>
						<li class=""><a href="#fix" data-toggle="tab"><b>Fixation</b></a></li>
			</ul>
				 
			</div>
					<div class="box-body">
					<form method="post" action="process_main.php?action=" class="">
				<div class="modal-body">
						<h3>Reversion</h3><hr>
							<div class="row">
										<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Employee List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example3" class="table table-striped">
                <thead>
                <tr>
                  <th>Sr No</th>
                  <th>PF Number</th>
                  <th>Order Type</th>
                  <th>Transion Id</th>
                  <th>View</th>
                </tr>
                </thead>
                <tbody>
              		<?php
					dbcon1();
					$pf_no=$_GET['pf'];
					$cnt_rv=1;
					$sql=mysql_query("select * from prft_reversion_temp where rev_pf_no='$pf_no'");
					while($result=mysql_fetch_array($sql)){
						echo "<tr>";
						echo "<td>$cnt_rv</td>";
						echo "<td>".$result['rev_pf_no']."</td>";
						echo "<td>".$result['rev_order_type']."</td>";
						echo "<td>".$result['temp_transaction_id']."</td>";
						echo "<td><a href='prft_show_reversion_hist.php?pf_no=$pf_no&id=".$result['id']."' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>View</b></i></a></td>";
						echo "</tr>";
						$cnt_rv++;
					}
				?>
                </tbody>
                <tfoot>
               
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>	
	<script>
  $(function () {
    $('#example3').DataTable()
   
  })
</script>
							</div>
				</div>
				</form>
			</div>
		</div>			 
		<div class="pull-right col-md-7 col-sm-12 col-xs-12">
			<!--a href="sr_view.php" class="btn btn-primary">Back</a-->
		</div>						 
    </div> 	
	<div class="tab-pane" id="trans">
		
		<div  class="tab-pane" id="trans" style="padding:10px;">
			<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Promotion/Reversion/Transfer/Fixation</h3>
			<div class="box-header with-border">
			<ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
						<li class=""><a href="#prft" data-toggle="tab"><b>Promotion</b></a></li>
						<li class=""><a href="#rever" data-toggle="tab"><b>Reversion</b></a></li>
						<li class=""><a href="#trans" data-toggle="tab"><b>Transfer</b></a></li>
						<li class=""><a href="#fix" data-toggle="tab"><b>Fixation</b></a></li>
			</ul>
				 
			</div>
					<div class="box-body">
					<form method="post" action="process_main.php?action=" class="">
				<div class="modal-body">
						<h3>Transfer</h3><hr>
							<div class="row">
										<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Employee List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example4" class="table table-striped">
                <thead>
                <tr>
                  <th>Sr No</th>
                  <th>PF Number</th>
                  <th>Order Type</th>
                  <th>Transion Id</th>
                  <th>View</th>
                </tr>
                </thead>
                <tbody>
              		<?php
					dbcon1();
					$pf_no=$_GET['pf'];
						$cnt_tr=1;
						$sql=mysql_query("select * from prft_transfer_temp where trans_pf_no='$pf_no'");
						while($result=mysql_fetch_array($sql)){
							echo "<tr>";
							echo "<td>$cnt_tr</td>";
							echo "<td>".$result['trans_pf_no']."</td>";
							echo "<td>".get_order_type_transfer($result['trans_order_type'])."</td>";
							echo "<td>".$result['temp_transaction_id']."</td>";
							echo "<td><a href='prft_show_transfer_hist.php?pf_no=$pf_no&id=".$result['id']."' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>View</b></i></a></td>";
							echo "</tr>";
							$cnt_tr++;
						}
					?>
			
                </tbody>
                <tfoot>
               
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>	
	<script>
  $(function () {
    $('#example4').DataTable()
   
  })
</script>
							</div>
				</div>
				</form>
			</div>
		</div>			 
		<div class="pull-right col-md-7 col-sm-12 col-xs-12">
			<!--a href="sr_view.php" class="btn btn-primary">Back</a-->
		</div>						 
    </div> 	
	<div class="tab-pane" id="fix">
		
		<div  class="tab-pane" id="rever" style="padding:10px;">
			<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Promotion/Reversion/Transfer/Fixation</h3>
			<div class="box-header with-border">
			<ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
						<li class=""><a href="#prft" data-toggle="tab"><b>Promotion</b></a></li>
						<li class=""><a href="#rever" data-toggle="tab"><b>Reversion</b></a></li>
						<li class=""><a href="#trans" data-toggle="tab"><b>Transfer</b></a></li>
						<li class=""><a href="#fix" data-toggle="tab"><b>Fixation</b></a></li>
			</ul>
				 
			</div>
					<div class="box-body">
					<form method="post" action="process_main.php?action=" class="">
				<div class="modal-body">
						<h3>Fixation</h3><hr>
							<div class="row">
										<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Employee List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example5" class="table table-striped">
                <thead>
                <tr>
                   <th>Sr No</th>
                  <th>PF Number</th>
                  <th>Order Type</th>
                  <th>Transion Id</th>
                  <th>View</th>
                </tr>
                </thead>
                <tbody>
              		
						<?php
						dbcon1();
						$pf_no=$_GET['pf'];
						$cnt_fx=1;
						$sql1=mysql_query("select * from prft_fixation_temp where fix_pf_no='$pf_no'");
						$cnt=mysql_num_rows($sql1);
						
					 
						while($result=mysql_fetch_array($sql1)){
							//echo "<script>alert(".$result['id'].")</script>";
							echo "<tr>";
							echo "<td>$cnt_fx</td>";
							echo "<td>".$result['fix_pf_no']."</td>";
							echo "<td>".get_order_type_fixation($result['fix_order_type'])."</td>";
							echo "<td>".$result['temp_transaction_id']."</td>";
							echo "<td><a href='prft_show_fixation_hist.php?pf_no=$pf_no&id=".$result['id']."' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>View</b></i></a></td>";
							echo "</tr>";
							$cnt_fx++;
						}
					?>
			
                </tbody>
                <tfoot>
               
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>	
	<script>
  $(function () {
    $('#example5').DataTable()
   
  })
</script>
							</div>
				</div>
				</form>
			</div>
		</div>			 
		<div class="pull-right col-md-7 col-sm-12 col-xs-12">
			<!--a href="sr_view.php" class="btn btn-primary">Back</a-->
		</div>						 
    </div>

<!--PRFT Tab End -->

	</div>
	       </div>	    
             </div>
        </div>
      </div>
  </div>
   </div>
	  </section>
	 </div>	
	 
	 <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="width:160%; margin-left:-10%" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id=""><strong>Transaction History</strong></h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" method="POST" >

            <div style="padding: 10px" class="form-group table-responsive">
            		<table border="1" class="table table-bordered"  style="width:100%">
            			<thead>
            			<tr>
            			<th>Sr. No.</th>
            			<th>Transaction ID</th>
            			<th>Letter No</th>
            			<th> <label id="col_id_from"></label> From</th>
            			<th> <label id="col_id_to"></label> To</th>
            			<th>Updated On</th>
            			 
            			<th>Updated By</th>
            			</tr>
            			</thead>
            			<tbody class="display_history">
            				 

            			</tbody>
              		</table>
              <div class="col-sm-10">
                <input type="hidden" class="form-control" id="delete_id" name="delete_id">
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
  </div>
</div>
</div>
</div>
   <?php
 include_once('../global/footer.php');
 ?> 
 <script>
  
 $(document).on("click",".click_awards",function(){
	 
	var pf = $("#hidden_pfno").val();
	var val = $(this).attr('val');
	var val1 = $(this).attr('tbl_name');
	var val2 = $(this).attr('col_nm');
	var getcount = $(this).attr('getcount');
	$("#col_id_from").text(val);
	$("#col_id_to").text(val);
	 // alert(pf);
	 // alert(val);
	 // alert(val1);
	 // alert(val2);
	 // alert(getcount);
	 $.ajax({
		type:"post",
		url:"process_history.php",
		data:"action=fetch_history&pf="+pf+"&val="+val+"&val1="+val1+"&val2="+val2+"&getcount="+getcount,
		success:function(data){
		 //  alert(data);
		  $(".display_history").html(data);
		  }
	});
});
 </script>
<script>
$(".present_works").click(function(){
	var pre_wk='<?php echo $sgd_dropdwn;?>';
   //alert(pre_wk);
if(pre_wk==2)
{
	$("#sgd_ogd_no").show();
	$("#sgd_ogd_yes").hide();
}
else{
	$("#sgd_ogd_no").hide();
	$("#sgd_ogd_yes").show();
}
});


</script>
<script>
$(document).on("click",".visit", function(){
	
	var tab=$(this).attr("val");
	//alert(tab);
	 $.ajax({
		type:'POST'	,
		url:'log_display_case.php',
		data:'action=create_log&tab='+tab,
		success:function(html){
			//alert(html);
		}
	 });
});
$(document).on("click",".visit_tab", function(){
	
	var tab=$(this).attr("id");
	//alert(tab);
	 $.ajax({
		type:'POST'	,
		url:'log_display_case.php',
		data:'action=create_log&tab='+tab,
		success:function(html){
			//alert(html);
		}
	 });
});
</script>