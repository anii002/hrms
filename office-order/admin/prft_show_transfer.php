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
		
//echo "<script>alert ('$pf');</script>";
 $query=mysql_query("Select * from prft_transfer_temp where trans_pf_no='$pf'and id='$id'");
 //echo "Select * from prft_reversion_temp where trans_pf_no='$pf'".mysql_error();
					 while($result=mysql_fetch_assoc($query))		
						{
							$trans_pf_no=$result['trans_pf_no'];
							$trans_order_type=get_order_type_transfer($result['trans_order_type']);
							$trans_letter_no=$result['trans_letter_no'];
							$trans_letter_date=$result['trans_letter_date'];
							$trans_wef=$result['trans_wef'];
							
							
							$trans_frm_dept=get_department($result['trans_frm_dept']);
							$trans_frm_desig=get_designation($result['trans_frm_desig']);
							$trans_frm_othr_desig=$result['trans_frm_othr_desig'];
							$trans_frm_pay_scale_type=$result['trans_frm_pay_scale_type'];
							$trans_frm_scale=$result['trans_frm_scale'];
							$trans_frm_level=$result['trans_frm_level'];							 
							$trans_frm_group=get_group($result['trans_frm_group']);
							$trans_frm_station=get_station($result['trans_frm_station']);
							$trans_frm_othr_station=$result['trans_frm_othr_station'];
							$trans_frm_rop=$result['trans_frm_rop'];
							$trans_frm_billunit=get_billunit($result['trans_frm_billunit']);
							$trans_frm_depot=$result['trans_frm_depot'];
							
							$trans_to_dept=get_department($result['trans_to_dept']);
							$trans_to_desig=get_designation($result['trans_to_desig']);
							$trans_to_othr_desig=$result['trans_to_othr_desig'];
							$trans_to_pay_scale_type=$result['trans_to_pay_scale_type'];
							$trans_to_scale=$result['trans_to_scale'];
							$trans_to_level=$result['trans_to_level'];
							$trans_to_group=get_group($result['trans_to_group']);
							$trans_to_station=get_station($result['trans_to_station']);
							$trans_to_othr_station=$result['trans_to_othr_station'];
							$trans_to_rop=$result['trans_to_rop'];
							$trans_to_billunit=get_billunit($result['trans_to_billunit']);
							$trans_to_depot=$result['trans_to_depot'];
							
							$trans_carried_out_type=$result['trans_carried_out_type'];
							$trans_carri_wef=$result['trans_carri_wef'];
							$trans_carri_date_of_incr=$result['trans_carri_date_of_incr'];
							$trans_car_re_accept_ltr_no=$result['trans_car_re_accept_ltr_no'];
							$trans_car_re_accept_ltr_date=$result['trans_car_re_accept_ltr_date'];
							$trans_car_re_wef_date=$result['trans_car_re_wef_date'];
							$trans_car_re_remark=$result['trans_car_re_remark'];
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
              <h3 class="box-title"><b>Transfer Details</b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
					<div class="table-responsive" style="padding:20px;">
				<table border="1" class="table table-bordered"  style="width:100%">
					<tbody>
						<tr> 
							<td><label class="control-label labelhed " >PF Number</label></td>
							<td> <label class="control-label labelhdata"> <?php echo $trans_pf_no ?> </label></td>
							<td><label class="control-label labelhed" >Order Type</label></td>
							<td><label class="labelhdata labelhdata"><?php echo $trans_order_type ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Letter Number<span class=""></span></label></td>
							<td><label class="labelhdata"><?php  echo $trans_letter_no ?></label></td>
							<td><label class="control-label labelhed" >Letter Date</label></td>
							<td><label class="labelhdata"><?php echo date('d/m/Y', strtotime($trans_letter_date)); ?></label></td>
						</tr>
						
						<tr>
							<td><label class="control-label labelhed" >WEF Date</label></td>
							<td colspan="4"><label class="control-label labelhdata"><?php echo date('d/m/Y', strtotime($trans_wef)); ?></label></td>
							
							
						</tr>
						<tr>
							<td colspan="2" ><label class="control-label labelhed"style="font-size:20px" ><b>Transfer From</b></label></td>
							
							<td colspan="3" ><label class="control-label labelhed" style="font-size:20px"><b>Transfer To</b></label></td>
							
							
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Department</label></td>
							<td><label class="control-label labelhdata"><?php echo $trans_frm_dept ?></label></td>
							
							
							<td><label class="control-label labelhed" >Department</label></td>
							<td><label class="control-label labelhdata"><?php echo $trans_to_dept ?></label></td>
						</tr>
							
						<tr>
							<td><label class="control-label labelhed" >Designation</label></td>
							<td><label class="control-label labelhdata"><?php echo $trans_frm_desig ?></label></td>
							
							<td><label class="control-label labelhed" >Designation</label></td>
							<td><label class="control-label labelhdata"><?php echo $trans_to_desig ?></label></td>
						</tr>
						
						<tr>
							<td><label class="control-label labelhed" >Other Designation</label></td>
							<td><label class="control-label labelhdata"><?php echo $trans_frm_othr_desig ?></label></td>
							
							
							
							<td><label class="control-label labelhed" >Other Designation</label></td>
							<td><label class="control-label labelhdata"><?php echo $trans_to_othr_desig ?></label></td>
							
						</tr>
						<tr>
							
							<td><label class="control-label labelhed" > Scale</label></td>
							<td><label class="control-label labelhdata"><?php echo $trans_frm_scale ?></label></td>
							<td><label class="control-label labelhed" >Scale</label></td>
							<td><label class="control-label labelhdata"><?php echo $trans_to_scale ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Level</label></td>
							<td><label class="control-label labelhdata"><?php echo $trans_frm_level ?></label></td>
							
							
							<td><label class="control-label labelhed" >Level</label></td>
							<td><label class="control-label labelhdata"><?php echo $trans_to_level ?></label></td>
							
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Group</label></td>
							<td><label class="control-label labelhdata"><?php echo $trans_frm_group ?></label></td>
							
							<td><label class="control-label labelhed" >Group</label></td>
							<td><label class="control-label labelhdata"><?php echo $trans_to_group ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Station</label></td>
							<td><label class="control-label labelhdata"><?php echo $trans_frm_station ?></label></td>
							
							
							
							<td><label class="control-label labelhed" >Station</label></td>
							<td><label class="control-label labelhdata"><?php echo $trans_to_station ?></label></td>
							</tr>
							
							<tr>
							<td><label class="control-label labelhed" >Other Station</label></td>
							<td><label class="control-label labelhdata"><?php echo $trans_frm_othr_station ?></label></td>
							<td><label class="control-label labelhed" >Other Station</label></td>
							<td><label class="control-label labelhdata"><?php echo $trans_to_othr_station ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Rate Of Pay</label></td>
							<td><label class="control-label labelhdata"><?php echo $trans_frm_rop ?></label></td>
							
							
							<td><label class="control-label labelhed" >Rate Of Pay</label></td>
							<td><label class="control-label labelhdata"><?php echo $trans_to_rop ?></label></td>
							</tr>
						<tr>	
							<td><label class="control-label labelhed" >Bill Unit</label></td>
							<td><label class="control-label labelhdata"><?php echo $trans_frm_billunit ?></label></td>
							<td><label class="control-label labelhed" >Bill Unit</label></td>
							<td><label class="control-label labelhdata"><?php echo $trans_to_billunit ?></label></td>
						</tr>
							
							<tr>
							<td><label class="control-label labelhed" >Depot</label></td>
							<td><label class="control-label labelhdata"><?php echo $trans_frm_depot ?></label><td><label class="control-label labelhed" >Depot</label></td>
							<td><label class="control-label labelhdata"><?php echo $trans_to_depot ?></label>
							</td>
							
							
						</tr>
						<tr>
						<td><label class="control-label labelhed" >Carried Out Type</label></td>
							<td colspan="5"><label class="control-label labelhdata"><?php echo $trans_carried_out_type ?></label></td>
						</tr>
						<?php if($trans_carried_out_type=='Yes'){?>
						<tr>
							<td><label class="control-label labelhed" >W.E.F Date</label></td>
							<td><label class="control-label labelhdata"><?php  echo date('d/m/Y', strtotime( $trans_carri_wef)); ?></label></td>
						<td><label class="control-label labelhed" >Date Of Increment</label></td>
							<td><label class="control-label labelhdata"><?php echo date('d/m/Y', strtotime( $trans_carri_date_of_incr)); ?></label></td>
						</tr>
						<?php }if($trans_carried_out_type=='No'){?>
						<tr>
							<td><label class="control-label labelhed" >Acceptance Letter Number</label></td>
							<td><label class="control-label labelhdata"><?php echo $trans_car_re_accept_ltr_no; ?></label></td>
							
							<td><label class="control-label labelhed" >Acceptance Letter Date</label></td>
							<td><label class="control-label labelhdata"><?php echo date('d/m/Y', strtotime($trans_car_re_accept_ltr_date)); ?></label></td>
						</tr>
						
						<tr>
							<td><label class="control-label labelhed" >WEF Date</label></td>
							<td><label class="control-label labelhdata"><?php echo date('d/m/Y', strtotime($trans_car_re_wef_date)); ?></label></td>
							<td><label class="control-label labelhed" >Remarks</label></td>
							<td><label class="control-label labelhdata"><?php echo $trans_car_re_remark; ?></label></td>
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