<?php
$GLOBALS['flag']="0";
	require_once 'common/db.php';
  require_once 'common/header.php';
        $id = $_SESSION['user_id'];
        
        $sql = "SELECT * FROM user_permission WHERE id = '$id' AND delete_status = 0";
        $result = mysql_query($sql);
        $row = mysql_fetch_assoc($result);     
        $id1 = $_GET['id'];
      	$sql_fetch = "SELECT * FROM user_permission WHERE id = '$id1' AND delete_status = 0";
      	$result_fetch = mysql_query($sql_fetch);
      	$row_fetch = mysql_fetch_assoc($result_fetch);
        $pf_num = $row_fetch['pf_num'];
        
         if(isset($row_fetch['e_grievance']))
         {
          $e_gr = explode(',' , $row_fetch['e_grievance']);  

         }
         else
         {
          $e_gr = array();
         }
        
        if(isset($row_fetch['tamm']))
        {
          $tamm = explode(',' , $row_fetch['tamm']);
        }
        else
        {
          $tamm = array();
        }

        if(isset($row_fetch['e_notification']))
        {
          $eims = explode(',' , $row_fetch['e_notification']);
        }
        else
        {
          $eims = array(); 
        }

        if(isset($row_fetch['cga']))
        {
          $cga = explode(',' , $row_fetch['cga']);  
        }
        else
        {
          $cga = array(); 
        }

        if(isset($row_fetch['it_form']))
        {
          $itp = explode(',', $row_fetch['it_form']);
        }
        else
        {
          $itp = array();
        }

        if(isset($row_fetch['e_app']))
        {
          $app = explode(',', $row_fetch['e_app']);
        }
        else
        {
          $app = array();
        }

        if(isset($row_fetch['forms']))
        {
          $frm = explode(',', $row_fetch['forms']);
        }
        else
        {
          $frm = array();
        }


        if(isset($row_fetch['e_sar']))
        {
          $sar = explode(',', $row_fetch['e_sar']);
        }
        else
        {
          $sar = array();
        }
        
        if(isset($row_fetch['e_apar']))
        {
          $apar = explode(',', $row_fetch['e_apar']);
        }
        else
        {
          $apar = array();
        }
        
        
        if(isset($row_fetch['e_dak']))
        {
          $dak = explode(',', $row_fetch['e_dak']);
        }
        else
        {
          $dak = array();
        }

        if(isset($row_fetch['feedback']))
        {
          $feed = explode(',', $row_fetch['feedback']);
        }
        else
        {
          $feed = array();
        }

        if(isset($row_fetch['sbf']))
        {
          $sbf = explode(',', $row_fetch['sbf']);
        }
        else
        {
          $sbf = array();
        }

        if(isset($row_fetch['dar']))
        {
          $dar = explode(',', $row_fetch['dar']);
        }
        else
        {
          $dar = array();
        }
        
        
        
  
        $sql_fet = "SELECT * FROM resgister_user WHERE emp_no = '$pf_num'";
        $result_fet = mysql_query($sql_fet);
        $row_fet = mysql_fetch_assoc($result_fet); 
        // echo "<pre>";
        // print_r($row_fet);exit();
?>    
    <div class="content-wrapper bgwhite">
      
      <section class="content-header">
        <h1>Edit Permission</h1>
        <ul style="list-style: none; margin-left: 130px; margin-top: -26px;">
      <li>
        <button class="btn btn-danger btn-sm" onclick="window.history.back()">Go Back</button>
      </li>
    </ul>
        <ol class="breadcrumb">
          <li><a href="super_admin_dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Edit Permission</li>
        </ol>
      </section>
   

      <div class="tab-pane" role="tabpanel" id="complete">
        <div class="container">
        <form method="POST" action="update-user.php"  autocomplete="off">
                        <div class="step44">

                          <div class="row">

              <div class="col-md-3 col-lg-3 col-sm-12 form-group">
                            <label>PF Number</label>
  <input type="text" class="form-control" name="pf_num" id="pf_num" value="<?php echo $row_fetch['pf_num']; ?>"  readonly autofocus>
                          </div>  
                    <?php

                    ?>
                          <div class="col-md-3 col-lg-3 col-sm-12 form-group">
                            <label>Name</label>
    <input type="text" class="form-control" name="name" id="name" value="<?php echo $row_fet['name']; ?>" readonly>
                          </div>

                   <?php
                   $dept = $row_fet['department'];
                   $sql_dept = "SELECT DEPTDESC FROM department WHERE DEPTNO = '$dept'";
                   $result_dept = mysql_query($sql_dept);
                   $row_dept = mysql_fetch_assoc($result_dept);
                    ?>       

                          <div class="col-md-3 col-lg-3 col-sm-12 form-group">
                            <label>Department</label>
  <input type="text" class="form-control" name="department" id="department" value="<?php echo $row_dept['DEPTDESC']; ?>" readonly>
                          </div>

                          <?php
              $desig = $row_fet['designation'];
              $sql_desig = "SELECT DESIGLONGDESC FROM designations WHERE DESIGCODE = '$desig'";
              $result_desig = mysql_query($sql_desig);
              $row_desig = mysql_fetch_assoc($result_desig);
                    ?>

                          <div class="col-md-3 col-lg-3 col-sm-12 form-group">
                            <label>Designation</label>
  <input type="text" class="form-control" name="designation" id="designation" value="<?php echo $row_desig['DESIGLONGDESC']; ?>" readonly>
                          </div>

                          </div>

                          <div class="row">

                            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
                            <label>Bill Unit</label>
    <input type="text" class="form-control" name="bill_unit" id="bill_unit" value="<?php echo $row_fet['bill_unit']; ?>" readonly>
                          </div>
                          <?php
              $pay = $row_fet['7th_pay_level'];
              $sql_pay = "SELECT num, pay_text FROM paylevel WHERE num = '$pay'";
              $result_pay = mysql_query($sql_pay);
              $row_pay = mysql_fetch_assoc($result_pay);
                          ?>
                          <div class="col-md-3 col-lg-3 col-sm-12 form-group">
                            <label>Pay Level</label>
  <input type="text" class="form-control" name="pay_level" id="pay_level" value="<?php echo $row_pay['pay_text']; ?>"  readonly>
                          </div>

                          <div class="col-md-3 col-lg-3 col-sm-12 form-group">
                            <label>Mobile Number</label>
    <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $row_fet['mobile']; ?>" readonly>
                          </div>

                          <div class="col-md-3 col-lg-3 col-sm-12 form-group">
                            <label>Date of Birth</label>
  <input type="text" class="form-control" name="dob" id="dob" value="<?php echo $row_fet['dob']; ?>"  readonly>
                          </div>
                            
                          </div>
                          
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12 user-permission"><h2>e-Grievance</h2></div>

                        <div class="row">

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
        <span class="button-checkbox"> 
 <button type="button" class="btn" data-color="info">Admin</button>                            
 <input type="checkbox" class="hidden" name="e_gr[]" id="gr_ad" value="0" <?php echo in_array('0',$e_gr)?"checked":"";?> />
        </span>
                          </div>

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
 <button type="button" class="btn" data-color="info">Section Officer</button>  
  <input type="checkbox" class="hidden" name="e_gr[]" id="gr_so" value="1" <?php echo in_array(1,$e_gr)?"checked":"";?> />
</span>
                          </div>
                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">Welfare Inspector</button>
   <input type="checkbox" class="hidden" name="e_gr[]" id="gr_wi" value="2" <?php echo in_array(2,$e_gr)?"checked":"";?> />
</span>
                          </div>

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">Branch Officer</button>
   <input type="checkbox" class="hidden" name="e_gr[]" id="gr_bo" value="3" <?php echo in_array(3,$e_gr)?"checked":"";?> />
</span>
                          </div>

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">Branch Admin</button>
  <input type="checkbox" class="hidden" name="e_gr[]" id="gr_ba" value="5" <?php echo in_array(5,$e_gr)?"checked":"";?> />
</span>
                          </div>

                        </div>

                          <div class="row">

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">Employee</button>
  <input type="checkbox" class="hidden" name="e_gr[]" id="gr_emp" value="4" <?php echo in_array(4,$e_gr)?"checked":"";?> />
</span>  
                          </div>
                        </div>

                      <div class="col-md-12 user-permission"><h2>TAMM</h2></div>

                        <div class="row">

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">Super Admin</button>
  <input type="checkbox" class="hidden" name="tamm[]" id="tamm_sad" value="0" <?php echo in_array('0',$tamm)?"checked":"";?> />
</span>  
                          </div>

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">Super Accountant</button>
<input type="checkbox" class="hidden" name="tamm[]" id="tamm_sac" value="1" <?php echo in_array(1,$tamm)?"checked":"";?> />
</span>
                          </div>

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">Department Admin</button>
<input type="checkbox" class="hidden" name="tamm[]" id="tamm_da" value="11" <?php echo in_array(11,$tamm)?"checked":"";?> />
</span>
                          </div>

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">Controlling Incharge</button>
<input type="checkbox" class="hidden" name="tamm[]" id="tamm_ci" value="12" <?php echo in_array(12,$tamm)?"checked":"";?> />
</span>
                          </div>

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">Controlling Office</button>
<input type="checkbox" class="hidden" name="tamm[]" id="tamm_co" value="13" <?php echo in_array(13,$tamm)?"checked":"";?> />
</span>
                          </div>

                        </div>  

                        <div class="row">

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">Accountant</button>
<input type="checkbox" class="hidden" name="tamm[]" id="tamm_ac" value="5" <?php echo in_array(5,$tamm)?"checked":"";?> />
</span>
                          </div>
                          
                           <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">Employee</button>
<input type="checkbox" class="hidden" name="tamm[]" id="tamm_emp" value="4" <?php echo in_array(4,$tamm)?"checked":"";?> />
</span>
                          </div>
                          
                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">Personnel Admin</button>
<input type="checkbox" class="hidden" name="tamm[]" id="tamm_pad" value="14" <?php echo in_array(14,$tamm)?"checked":"";?> />
</span>
                          </div>
                          
                          
                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">Branch Officer</button>
<input type="checkbox" class="hidden" name="tamm[]" id="tamm_bo" value="15" <?php echo in_array(15,$tamm)?"checked":"";?> />
</span>
                          </div>

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">Personnel Clerk</button>
<input type="checkbox" class="hidden" name="tamm[]" id="tamm_pc" value="16" <?php echo in_array(16,$tamm)?"checked":"";?> />
</span>
                          </div>

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">APO</button>
<input type="checkbox" class="hidden" name="tamm[]" id="tamm_apo" value="17" <?php echo in_array(17,$tamm)?"checked":"";?> />
</span>
                          </div>
                          

                        </div>
                        
                         <div class="col-md-12 user-permission"><h2>Account Users TAMM</h2></div>
                        <div class="row">

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">Account Employee</button>
<input type="checkbox" class="hidden" name="tamm[]" id="tamm_acemp" value="21" <?php echo in_array(21,$tamm)?"checked":"";?> />
</span>
                          </div>
                          
                           <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">SO</button>
<input type="checkbox" class="hidden" name="tamm[]" id="tamm_so" value="22" <?php echo in_array(22,$tamm)?"checked":"";?> />
</span>
                          </div>
                          
                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">SO Admin</button>
<input type="checkbox" class="hidden" name="tamm[]" id="tamm_sso" value="23" <?php echo in_array(23,$tamm)?"checked":"";?> />
</span>
                          </div>
                          
                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">ADFM</button>
<input type="checkbox" class="hidden" name="tamm[]" id="tamm_adfm" value="24" <?php echo in_array(24,$tamm)?"checked":"";?> />
</span>
                          </div>
                           
                          

                        </div>
                        

             <div class="col-md-12 user-permission"><h2>EIMS</h2></div> 
             
             <div class="row">

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">Admin</button>
<input type="checkbox" class="hidden" name="eims[]" id="eims_ad" value="0" <?php echo in_array('0',$eims)?"checked":"";?> />
</span>
                          </div>
                          
                           <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">Sectional Incharge</button>
<input type="checkbox" class="hidden" name="eims[]" id="eims_si" value="1" <?php echo in_array(1,$eims)?"checked":"";?> />
</span>
                          </div>
                          
                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">Employee</button>
<input type="checkbox" class="hidden" name="eims[]" id="eims_emp" value="2" <?php echo in_array(2,$eims)?"checked":"";?> />
</span>
                          </div>
                        </div>


              <div class="col-md-12 user-permission"><h2>CGA</h2></div> 
             
             <div class="row">

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">Super Admin</button>
<input type="checkbox" class="hidden" name="cga[]" id="cga_sa" value="1" <?php echo in_array(1,$cga)?"checked":"";?> /> 
</span>
                          </div>
                          
                           <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">DRM</button>
<input type="checkbox" class="hidden" name="cga[]" id="cga_drm" value="2" <?php echo in_array(2,$cga)?"checked":"";?> /> 
</span>
                          </div>
                          
                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">Sr. DPO</button>
<input type="checkbox" class="hidden" name="cga[]" id="cga_sdpo" value="3" <?php echo in_array(3,$cga)?"checked":"";?> /> 
</span>
                          </div>

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">DPO</button>
<input type="checkbox" class="hidden" name="cga[]" id="cga_dpo" value="4" <?php echo in_array(4,$cga)?"checked":"";?> />
</span>
                          </div>

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">Welfare Inspector</button>
<input type="checkbox" class="hidden" name="cga[]" id="cga_wi" value="5" <?php echo in_array(5,$cga)?"checked":"";?> /> 
</span>
                          </div>

                        </div>

                        <div class="row">
                          
                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">Confidential Clerk</button>
<input type="checkbox" class="hidden" name="cga[]" id="cga_cc" value="6" <?php echo in_array(6,$cga)?"checked":"";?> /> 
</span>
                          </div>

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">Recruitment Cell</button>
<input type="checkbox" class="hidden" name="cga[]" id="cga_rc" value="7" <?php echo in_array(7,$cga)?"checked":"";?> /> 
</span>
                          </div>

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">DAK Clerk</button>
<input type="checkbox" class="hidden" name="cga[]" id="cga_dc" value="8" <?php echo in_array(8,$cga)?"checked":"";?> /> 
</span>
                          </div>

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">Applicant</button>
<input type="checkbox" class="hidden" name="cga[]" id="cga_ap" value="0" <?php echo in_array('0',$cga)?"checked":"";?> />
</span>
                          </div>


                        </div>


                        <div class="col-md-12 user-permission"><h2>IT-Perticulars</h2></div> 
             
             <div class="row">

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">Admin</button>
<input type="checkbox" class="hidden" name="itp[]" id="itp_ad" value="0" <?php echo in_array('0',$itp)?"checked":"";?> />
</span>
                          </div>
                        
                          
                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">Employee</button>
 <input type="checkbox" class="hidden" name="itp[]" id="itp_emp" value="1" <?php echo in_array(1,$itp)?"checked":"";?> />
</span>
                          </div>
                        </div>


          <div class="col-md-12 user-permission"><h2>e-SR</h2></div> 
             
             <div class="row">

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                            <span class="button-checkbox">
<button type="button" class="btn" data-color="info">Admin</button>                            
<input type="checkbox" class="hidden" name="sar[]" id="sar_ad" value="0" <?php echo in_array('0',$sar)?"checked":"";?> />
                            </span>
                          </div>

                         <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                            <span class="button-checkbox">
<button type="button" class="btn" data-color="info">Clerk</button>                            
<input type="checkbox" class="hidden" name="sar[]" id="sar_cl" value="1" <?php echo in_array(1,$sar)?"checked":"";?> />
                            </span>
                          </div> 
                        
                          
                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                            <span class="button-checkbox">
<button type="button" class="btn" data-color="info">Employee</button>                         
<input type="checkbox" class="hidden" name="sar[]" id="sar_emp" value="2" <?php echo in_array(2,$sar)?"checked":"";?> /> 
                            </span>
                          </div>

                        </div>


        <div class="col-md-12 user-permission"><h2>e-Application</h2></div> 
             
             <div class="row">

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                            <span class="button-checkbox">
 <button type="button" class="btn" data-color="info">Admin</button>                              
<input type="checkbox" class="hidden" name="app[]" id="app_ad" value="0" <?php echo in_array('0',$app)?"checked":"";?> />
                           </span>
                          </div>
                        
                          
                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                            <span class="button-checkbox">
 <button type="button" class="btn" data-color="info">Clerk</button>                              
<input type="checkbox" class="hidden" name="app[]" id="app_clk" value="1" <?php echo in_array(1,$app)?"checked":"";?> />
                      </span>
                          </div>

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">Chief OS</button>
<input type="checkbox" class="hidden" name="app[]" id="app_cos" value="2" <?php echo in_array(2,$app)?"checked":"";?> />
</span>
                          </div>

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
<span class="button-checkbox">                            
   <button type="button" class="btn" data-color="info">Employee</button>
<input type="checkbox" class="hidden" name="app[]" id="app_emp" value="3" <?php echo in_array(3,$app)?"checked":"";?> />
</span>
                          </div>

                        </div>


        <div class="col-md-12 user-permission"><h2>Forms</h2></div> 
             
                 <div class="row">
                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                    <span class="button-checkbox">
 <button type="button" class="btn" data-color="info">Admin</button>                      
  <input type="checkbox" class="hidden" name="frm[]" id="frm_ad" value="0" <?php echo in_array('0',$frm)?"checked":"";?> /> 
                            </span>
                          </div>
                          
                           <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                    <span class="button-checkbox">
 <button type="button" class="btn" data-color="info">Employee</button>                      
  <input type="checkbox" class="hidden" name="frm[]" id="frm_emp" value="1" <?php echo in_array(1,$frm)?"checked":"";?> /> 
                            </span>
                          </div>
                        
          
                        </div>
                        
                        
                        
        <div class="col-md-12 user-permission"><h2>e_APAR</h2></div> 
             
                 <div class="row">

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                    <span class="button-checkbox">
 <button type="button" class="btn" data-color="info">Main Admin</button>                      
  <input type="checkbox" class="hidden" name="apar[]" id="apar_mad" value="0" <?php echo in_array('0',$apar)?"checked":"";?> /> 
                            </span>
                          </div>

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                    <span class="button-checkbox">
 <button type="button" class="btn" data-color="info">Admin</button>                      
  <input type="checkbox" class="hidden" name="apar[]" id="apar_ad" value="1" <?php echo in_array(1,$apar)?"checked":"";?> /> 
                            </span>
                          </div>

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                    <span class="button-checkbox">
 <button type="button" class="btn" data-color="info">Officer General</button>                      
  <input type="checkbox" class="hidden" name="apar[]" id="apar_og" value="2" <?php echo in_array(2,$apar)?"checked":"";?> /> 
                            </span>
                          </div>
                          
                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                    <span class="button-checkbox">
 <button type="button" class="btn" data-color="info">Officer Departmental</button>                      
  <input type="checkbox" class="hidden" name="apar[]" id="apar_emp" value="3" <?php echo in_array(3,$apar)?"checked":"";?> /> 
                            </span>
                          </div>
                          </div>
                          
                          <div class="row">
                          <div class="checkbox col-md-3 col-lg-3 col-sm-3 col-xs-12">
                    <span class="button-checkbox">
 <button type="button" class="btn" data-color="info">Cadder Cheif Office Superitendent</button>                      
  <input type="checkbox" class="hidden" name="apar[]" id="apar_ccos" value="4" <?php echo in_array(4,$apar)?"checked":"";?> /> 
                            </span>
                          </div>
                          
                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                    <span class="button-checkbox">
 <button type="button" class="btn" data-color="info">Technical</button>                      
  <input type="checkbox" class="hidden" name="apar[]" id="apar_t" value="5" <?php echo in_array(5,$apar)?"checked":"";?> /> 
                            </span>
                          </div>
                          
                          
                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                    <span class="button-checkbox">
 <button type="button" class="btn" data-color="info">Employee</button>                      
  <input type="checkbox" class="hidden" name="apar[]" id="apar_emp" value="6" <?php echo in_array(6,$apar)?"checked":"";?> /> 
                            </span>
                          </div>
                        
          
                        </div>      
                        
                        <div class="col-md-12 user-permission"><h2>e-DAK</h2></div> 
             
                 <div class="row">

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                    <span class="button-checkbox">
 <button type="button" class="btn" data-color="info">Admin</button>                      
  <input type="checkbox" class="hidden" name="dak[]" id="dak_ad" value="0" <?php echo in_array('0',$dak)?"checked":"";?> /> 
                            </span>
                          </div>

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                    <span class="button-checkbox">
 <button type="button" class="btn" data-color="info">Clerk</button>                      
  <input type="checkbox" class="hidden" name="dak[]" id="dak_cl" value="1" <?php echo in_array(1,$dak)?"checked":"";?> /> 
                            </span>
                          </div>

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                    <span class="button-checkbox">
 <button type="button" class="btn" data-color="info">Section User</button>                      
  <input type="checkbox" class="hidden" name="dak[]" id="dak_su" value="2" <?php echo in_array(2,$dak)?"checked":"";?> /> 
                            </span>
                          </div>
                        
          
                        </div>
                        
                        
                        <div class="col-md-12 user-permission"><h2>Feedback</h2></div> 
             
                 <div class="row">

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                    <span class="button-checkbox">
 <button type="button" class="btn" data-color="info">Admin</button>                      
  <input type="checkbox" class="hidden" name="feed[]" id="feed_ad" value="0" <?php echo in_array('0',$feed)?"checked":"";?> /> 
                            </span>
                          </div>

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                    <span class="button-checkbox">
 <button type="button" class="btn" data-color="info">Employee</button>                      
  <input type="checkbox" class="hidden" name="feed[]" id="feed_emp" value="3" <?php echo in_array(3,$feed)?"checked":"";?> /> 
                            </span>
                          </div>
                        
          
                        </div>



                        <div class="col-md-12 user-permission"><h2>SBF</h2></div> 
             
                 <div class="row">

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                    <span class="button-checkbox">
 <button type="button" class="btn" data-color="info">Admin</button>                      
  <input type="checkbox" class="hidden" name="sbf[]" value="0" <?php echo in_array('0',$sbf)?"checked":"";?> /> 
                            </span>
                          </div>

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                    <span class="button-checkbox">
 <button type="button" class="btn" data-color="info">Control Icharge</button>                      
  <input type="checkbox" class="hidden" name="sbf[]" value="1" <?php echo in_array(1,$sbf)?"checked":"";?> /> 
                            </span>
                          </div>


                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                    <span class="button-checkbox">
 <button type="button" class="btn" data-color="info">SBF Admin</button>                      
  <input type="checkbox" class="hidden" name="sbf[]" value="2" <?php echo in_array(2,$sbf)?"checked":"";?> /> 
                            </span>
                          </div>

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                    <span class="button-checkbox">
 <button type="button" class="btn" data-color="info">CSBF Admin</button>                      
  <input type="checkbox" class="hidden" name="sbf[]" value="3" <?php echo in_array(3,$sbf)?"checked":"";?> /> 
                            </span>
                          </div>

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                    <span class="button-checkbox">
 <button type="button" class="btn" data-color="info">Employee</button>                      
  <input type="checkbox" class="hidden" name="sbf[]" value="4" <?php echo in_array(4,$sbf)?"checked":"";?> /> 
                            </span>
                          </div>
                        
          
                        </div>


                        <div class="col-md-12 user-permission"><h2>DAR</h2></div> 
             
                 <div class="row">

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                    <span class="button-checkbox">
 <button type="button" class="btn" data-color="info">Admin</button>                      
  <input type="checkbox" class="hidden" name="dar[]" value="1" <?php echo in_array(1,$dar)?"checked":"";?> /> 
                            </span>
                          </div>

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                    <span class="button-checkbox">
 <button type="button" class="btn" data-color="info">Clerk</button>                      
  <input type="checkbox" class="hidden" name="dar[]" value="2" <?php echo in_array(2,$dar)?"checked":"";?> /> 
                            </span>
                          </div>


                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                    <span class="button-checkbox">
 <button type="button" class="btn" data-color="info">Discpline Authority</button>                      
  <input type="checkbox" class="hidden" name="dar[]" value="3" <?php echo in_array(3,$dar)?"checked":"";?> /> 
                            </span>
                          </div>

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                    <span class="button-checkbox">
 <button type="button" class="btn" data-color="info">Inquiry Officer</button>                      
  <input type="checkbox" class="hidden" name="dar[]" value="4" <?php echo in_array(4,$dar)?"checked":"";?> /> 
                            </span>
                          </div>

                          <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                    <span class="button-checkbox">
 <button type="button" class="btn" data-color="info">Employee</button>                      
  <input type="checkbox" class="hidden" name="dar[]" value="7" <?php echo in_array(7,$dar)?"checked":"";?> /> 
                            </span>
                          </div>
                        
          
                        </div>

                       
                        <div class="col-md-12">
                          <ul class="list-inline m-t30">
                            <li><button type="submit" class="btn btn-success btn-info-full next-step">Update</button></li>
                          </ul>
                        </div>
                        </form>
                        </div>
                      </div>

    </div>
    

    
    <aside class="control-sidebar control-sidebar-dark">
      
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
      </ul>
      
      <div class="tab-content">
        
        <div class="tab-pane" id="control-sidebar-home-tab">
          <h3 class="control-sidebar-heading">Recent Activity</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript::;">
                <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                  <p>Will be 23 on April 24th</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript::;">
                <i class="menu-icon fa fa-user bg-yellow"></i>
                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                  <p>New phone +1(800)555-1234</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript::;">
                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                  <p>nora@example.com</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript::;">
                <i class="menu-icon fa fa-file-code-o bg-green"></i>
                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                  <p>Execution time 5 seconds</p>
                </div>
              </a>
            </li>
          </ul>

          <h3 class="control-sidebar-heading">Tasks Progress</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript::;">
                <h4 class="control-sidebar-subheading">
                  Custom Template Design
                  <span class="label label-danger pull-right">70%</span>
                </h4>
                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript::;">
                <h4 class="control-sidebar-subheading">
                  Update Resume
                  <span class="label label-success pull-right">95%</span>
                </h4>
                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript::;">
                <h4 class="control-sidebar-subheading">
                  Laravel Integration
                  <span class="label label-warning pull-right">50%</span>
                </h4>
                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript::;">
                <h4 class="control-sidebar-subheading">
                  Back End Framework
                  <span class="label label-primary pull-right">68%</span>
                </h4>
                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                </div>
              </a>
            </li>
          </ul>

        </div>
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
        
        <div class="tab-pane" id="control-sidebar-settings-tab">
          <form method="post">
            <h3 class="control-sidebar-heading">General Settings</h3>
            <div class="form-group">
              <label class="control-sidebar-subheading">
                Report panel usage
                <input type="checkbox" class="pull-right" checked>
              </label>
              <p>
                Some information about this general settings option
              </p>
            </div>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Allow mail redirect
                <input type="checkbox" class="pull-right" checked>
              </label>
              <p>
                Other sets of options are available
              </p>
            </div>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Expose author name in posts
                <input type="checkbox" class="pull-right" checked>
              </label>
              <p>
                Allow the user to show his name in blog posts
              </p>
            </div>

            <h3 class="control-sidebar-heading">Chat Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Show me as online
                <input type="checkbox" class="pull-right" checked>
              </label>
            </div>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Turn off notifications
                <input type="checkbox" class="pull-right">
              </label>
            </div>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Delete chat history
                <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
              </label>
            </div>
          </form>
        </div>
      </div>
    </aside>
    <div class="control-sidebar-bg"></div>
  </div>

  <footer class="main-footer text-center">
      
      <h5>&copy; Copyright 2019 <a href="http://almsaeedstudio.com">Salgem Infoigy Tech Pvt. Ltd.</a> All rights
        reserved.</h5>
    </footer>

  <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="dist/js/app.min.js"></script>
  <script src="dist/js/demo.js"></script>

  <script type="text/javascript">
                                       $(function() {
    $('.button-checkbox').each(function() {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function() {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function() {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            } else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon +
                    '"></i> ');
            }
        }
        init();
    });
});
                                </script>
  

              
</body>

</html>