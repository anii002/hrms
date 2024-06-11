<?php 
 session_start();
 // if(!isset($_SESSION['SESS_MEMBER_NAME']))
 // {
	 // echo "<script>window.location='http://localhost/E_APR_FINAL/index.php';</script>";
 // }
 $GLOBALS['a'] = 'sr_view';
include_once('../global/header.php');
include_once('../global/topbar.php');
//include_once('../global/sidebaradmin.php');
   include('mini_function.php');

dbcon1();
	$pf=$_GET['pf_no'];
	$id=$_GET['id'];
// echo "<script>alert ('$pf');</script>";
// echo "<script>alert ('$id');</script>";
 $query=mysql_query("Select * from prft_fixation_temp where fix_pf_no='$pf' and id='$id'");
 //echo "Select * from prft_reversion_temp where rev_pf_no='$pf'".mysql_error();
					 while($result=mysql_fetch_assoc($query))		
						{
							$fix_pf_no=$result['fix_pf_no'];
							$fix_order_type=get_order_type_fixation($result['fix_order_type']);
							$fix_letter_no=$result['fix_letter_no'];
							$fix_letter_date=$result['fix_letter_date'];
							$fix_wef=$result['fix_wef'];
							
							
							$fix_frm_ps_type=get_pay_scale_type($result['fix_frm_ps_type']);
							$fix_frm_scale=$result['fix_frm_scale'];
							$fix_frm_level=$result['fix_frm_level'];
							$fix_frm_rop=$result['fix_frm_rop'];
							
							$fix_to_ps_type=get_pay_scale_type($result['fix_to_ps_type']);
							$fix_to_scale=$result['fix_to_scale'];
							$fx_to_level=$result['fx_to_level'];
							$fix_to_rop=$result['fix_to_rop'];
							
							
							// $fix_frm_dept=get_department($result['fix_dept']);
							// $fix_frm_desig=get_designation($result['fix_desig']);
							// $fix_frm_othr_desig=$result['fix_othr_desig'];
							// 
							// $fix_frm_scale=$result['fix_scale'];
							// $fix_frm_level=$result['fix_level'];							 
							// $fix_frm_group=get_group($result['fix_group']);
							// $fix_frm_station=get_station($result['fix_station']);
							// $fix_frm_othr_station=$result['fix_othr_station'];
							// $fix_frm_rop=$result['fix_rop'];
							// $fix_frm_billunit=get_billunit($result['fix_billunit']);
							// $fix_frm_depot=$result['fix_depot'];
							
							// $fix_to_dept=get_department($result['fix_to_dept']);
							// $fix_to_desig=get_designation($result['fix_to_desig']);
							// $fix_to_othr_desig=$result['fix_to_othr_desig'];
							// $fix_to_pay_scale_type=$result['fix_to_pay_scale_type'];
							// $fix_to_scale=$result['fix_to_scale'];
							// $fix_to_level=$result['fix_to_level'];
							// $fix_to_group=get_group($result['fix_to_group']);
							// $fix_to_station=get_station($result['fix_to_station']);
							// $fix_to_othr_station=$result['fix_to_othr_station'];
							// $fix_to_rop=$result['fix_to_rop'];
							// $fix_to_billunit=get_billunit($result['fix_to_billunit']);
							// $fix_to_depot=$result['fix_to_depot'];
							
							$fix_carried_out_type=$result['fix_carried_out_type'];
							$fix_carri_wef=$result['fix_carri_wef'];
							$fix_carri_date_of_incr=$result['fix_carri_date_of_incr'];
							$fix_car_re_accept_ltr_no=$result['fix_car_re_accept_ltr_no'];
							$fix_car_re_accept_ltr_date=$result['fix_car_re_accept_ltr_date'];
							$fix_car_re_wef_date=$result['fix_car_re_wef_date'];
							$fix_car_re_remark=$result['fix_car_re_remark'];
				        }
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
	
}
</style>

<div class="content-wrapper" style="margin-top: -20px;">
   <section class="content"> 
      <div class="row">
	     <div class="box box-info">
			<div class="box box-warning box-solid">
			    
				
		<div class="box-body"> 
			<div class="tab-content">
			
			     <!--Bio Tab Start -->
				 <div class="tab-pane active in" id="bio">
				          
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><b>Fixation Details</b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
					<div class="table-responsive" style="padding:20px;">
				<table border="1" class="table table-bordered"  style="width:100%">
					<tbody>
						<tr> 
							<td><label class="control-label labelhed " >PF Number</label></td>
							<td> <label class="control-label labelhdata"> <?php echo $fix_pf_no ?> </label></td>
							<td><label class="control-label labelhed" >Order Type</label></td>
							<td><label class="labelhdata labelhdata"><?php echo $fix_order_type ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Letter Number<span class=""></span></label></td>
							<td><label class="labelhdata"><?php  echo $fix_letter_no ?></label></td>
							<td><label class="control-label labelhed" >Letter Date</label></td>
							<td><label class="labelhdata"><?php echo date('d / m / Y', strtotime($fix_letter_date)); ?></label></td>
						</tr>
						
						<tr>
							<td><label class="control-label labelhed" >WEF Date</label></td>
							<td colspan="4"><label class="control-label labelhdata"><?php echo date('d / m / Y', strtotime($fix_wef)); ?></label></td>
							
							
						</tr>
						<tr>
							 
							
							<td colspan="2" ><label class="control-label labelhed" style="font-size:20px"><b>Fixation From</b></label></td>
							
							<td colspan="3" ><label class="control-label labelhed" style="font-size:20px"><b>Fixation To</b></label></td>
							
							
						</tr>
						
							
						
						
						<tr>
							
							
							<td><label class="control-label labelhed" >Pay Scale Type</label></td>
							<td><label class="control-label labelhdata"><?php echo $fix_frm_ps_type ?></label></td>
							<td><label class="control-label labelhed" >Pay Scale Type</label></td>
							<td><label class="control-label labelhdata"><?php echo $fix_to_ps_type ?></label></td>
							
						</tr>
						<tr>
							<td><label class="control-label labelhed" > Scale</label></td>
							<td><label class="control-label labelhdata"><?php echo $fix_frm_scale ?></label></td>
							
							<td><label class="control-label labelhed" > Scale</label></td>
							<td><label class="control-label labelhdata"><?php echo $fix_to_scale ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Level</label></td>
							<td><label class="control-label labelhdata"><?php echo $fix_frm_level ?></label></td>
							
						
							<td><label class="control-label labelhed" >Level</label></td>
							<td><label class="control-label labelhdata"><?php echo $fx_to_level ?></label></td>
							
						</tr>
						<tr>
							
							<!--td><label class="control-label labelhed" >Group</label></td>
							<td><label class="control-label labelhdata"><?php //echo $fix_to_group ?></label></td-->
						</tr>
						
							
							<tr>
							
							
							<!--td><label class="control-label labelhed" >Other Station</label></td>
							<td><label class="control-label labelhdata"><?php //echo $fix_to_othr_station ?></label></td-->
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Rate Of Pay</label></td>
							<td><label class="control-label labelhdata"><?php echo $fix_frm_rop ?></label></td>
							
							<td><label class="control-label labelhed" >Rate Of Pay</label></td>
							<td><label class="control-label labelhdata"><?php echo $fix_to_rop ?></label></td>
							
							</tr>
						
							
							<tr>
							
							<td><label class="control-label labelhed" >Carried Out Type</label></td>
							<td colspan="5"><label class="control-label labelhdata"><?php echo $fix_carried_out_type ?></label></td>
						</tr>
						<?php if($fix_carried_out_type=='Yes'){?>
						<tr>
							<td><label class="control-label labelhed" >W.E.F Date</label></td>
							<td><label class="control-label labelhdata"><?php  echo date('d/m/Y', strtotime( $fix_carri_wef)); ?></label></td>
						<td><label class="control-label labelhed" >Date Of Increment</label></td>
							<td><label class="control-label labelhdata"><?php echo date('d/m/Y', strtotime($fix_carri_date_of_incr)); ?></label></td>
						</tr>
						<?php }if($fix_carried_out_type=='No'){?>
						<tr>
							<td><label class="control-label labelhed" >Acceptance Letter Number</label></td>
							<td><label class="control-label labelhdata"><?php echo $fix_car_re_accept_ltr_no; ?></label></td>
							
							<td><label class="control-label labelhed" >Acceptance Letter Date</label></td>
							<td><label class="control-label labelhdata"><?php echo date('d/m/Y', strtotime($fix_car_re_accept_ltr_date)); ?></label></td>
						</tr>
						
						<tr>
							<td><label class="control-label labelhed" >WEF Date</label></td>
							<td><label class="control-label labelhdata"><?php  echo date('d/m/Y', strtotime( $fix_car_re_wef_date)); ?></label></td>
							<td><label class="control-label labelhed" >Remarks</label></td>
							<td><label class="control-label labelhdata"><?php echo $fix_car_re_remark; ?></label></td>
						</tr>
						<?php }?>
					</tbody>		
				</table>
			</div>
			<div class="pull-right col-md-7 col-sm-12 col-xs-12">
				<a href="display_sr_tab.php?pf=<?php echo $_GET['pf_no']; ?>" class="btn btn-primary">Back</a>
			</div>	
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>	 
		        </div>	
			     <!--Bio Tab End -->
				 
				 
						 
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable()
  })
</script>
 </div>
		  
        </div>
			
			
		</div>
      </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
   <?php
 include_once('../global/footer.php');
 
 ?> 