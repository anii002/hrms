<?php 
 session_start();
 // if(!isset($_SESSION['SESS_MEMBER_NAME']))
 // {
	 // echo "<script>window.location='http://localhost/E_APR_FINAL/index.php';</script>";
 // }
 $GLOBALS['a'] = 'sr_view';
include_once('../global/header.php');
include_once('../global/topbar.php');
include('mini_function.php');
include('create_log.php');

$conn=dbcon1();
$pf=$_GET['pf_no'];
$id=$_GET['id'];
$print=$_GET['print'];
			if($print=='print')
			{	
			 $action="Visited PRFT Reversion single record of SR $pf";	
			}
			$action_on=$_SESSION['set_update_pf'];
			create_log($action,$action_on); 				
			$query=mysqli_query($conn,"Select * from prft_reversion_temp where rev_pf_no='$pf' and id='$id'");

					 while($result=mysqli_fetch_assoc($query))		
						{
							$rev_pf_no=$result['rev_pf_no'];
							$rev_order_type=$result['rev_order_type'];
							$rev_letter_no=$result['rev_letter_no'];
							$rev_letter_date=$result['rev_letter_date'];
							$rev_wef=$result['rev_wef'];
							
							
							$rev_frm_dept=get_department($result['rev_frm_dept']);
							$rev_frm_desig=get_designation($result['rev_frm_desig']);
							$rev_frm_othr_desig=$result['rev_frm_othr_desig'];
							$rev_frm_pay_scale_type=$result['rev_frm_pay_scale_type'];
							$rev_frm_scale=$result['rev_frm_scale'];
							$rev_frm_level=$result['rev_frm_level'];							 
							$rev_frm_group=get_group($result['rev_frm_group']);
							$rev_frm_station=get_station($result['rev_frm_station']);
							$rev_frm_othr_station=$result['rev_frm_othr_station'];
							$rev_frm_rop=$result['rev_frm_rop'];
							$rev_frm_billunit=get_billunit($result['rev_frm_billunit']);
							$rev_frm_depot=get_depot($result['rev_frm_depot']);
							
							$rev_to_dept=get_department($result['rev_to_dept']);
							$rev_to_desig=get_designation($result['rev_to_desig']);
							$rev_to_othr_desig=$result['rev_to_othr_desig'];
							$rev_to_pay_scale_type=$result['rev_to_pay_scale_type'];
							$rev_to_scale=$result['rev_to_scale'];
							$rev_to_level=$result['rev_to_level'];
							$rev_to_group=get_group($result['rev_to_group']);
							$rev_to_station=get_station($result['rev_to_station']);
							$rev_to_othr_station=$result['rev_to_othr_station'];
							$rev_to_rop=$result['rev_to_rop'];
							$rev_to_billunit=get_billunit($result['rev_to_billunit']);
							$rev_to_depot=get_depot($result['rev_to_depot']);
							$rev_carried_out_type=$result['rev_carried_out_type'];
							$rev_carri_wef=$result['rev_carri_wef'];
							$rev_carri_date_of_incr=$result['rev_carri_date_of_incr'];
							$rev_car_re_accept_ltr_no=$result['rev_car_re_accept_ltr_no'];
							$rev_car_re_accept_ltr_date=$result['rev_car_re_accept_ltr_date'];
							$rev_car_re_wef_date=$result['rev_car_re_wef_date'];
							$rev_car_re_remark=$result['rev_car_re_remark'];
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
@media print {
	
  body * {
    visibility: hidden;
  }
  #section-to-print, #section-to-print * {
    visibility: visible;
	
  }
  #section-to-print {
   
   margin:-70px;
   margin-top:-110px;
  }
  #lablshow
  {
	  visibility: visible;
  }
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
              <h3 class="box-title"><b>Reversion Details</b></h3>
            </div>
			<?php if($print!='notprint') 
				{
				echo "<div align='center'>
					
					<a href='display_sr_tab.php?pf=$pf' class='btn btn-primary'>Back</a>
					</div>";
				}
			?>
			<?php if($print=='notprint') 
			{
				echo"<div align='center'>
				<a href='display_sr_tab.php?pf=$pf' class='btn btn-primary'>Back</a>
			</div>";		
			}
			?>
	<script type="text/javascript">
		function print_page() {
		window.print();
		var ButtonControl = document.getElementById("p1");
		ButtonControl.style.visibility = "hidden";
		window.location.assign('prft_update.php');
		}
	</script>
            <!-- /.box-header -->
            <div class="box-body" id="section-to-print">
					<div class="table-responsive" style="padding:20px;">
					 <label id="lablshow" style="visibility:hidden"><b>Reversion Details</b></label>
				<table border="1" class="table table-bordered"  style="width:100%;border-collapse:collapse">
					<tbody>
						<tr> 
							<td><label class="control-label labelhed " >PF Number</label></td>
							<td> <label class="control-label labelhdata"> <?php echo $rev_pf_no ?> </label></td>
							<td><label class="control-label labelhed" >Order Type</label></td>
							<td><label class="labelhdata labelhdata"><?php echo $rev_order_type ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Letter Number<span class=""></span></label></td>
							<td><label class="labelhdata"><?php  echo $rev_letter_no ?></label></td>
							<td><label class="control-label labelhed" >Letter Date</label></td>
							<td><label class="labelhdata"><?php echo date('d/m/Y', strtotime($rev_letter_date)); ?></label></td>
						</tr>
						
						<tr>
							<td><label class="control-label labelhed" >WEF Date</label></td>
							<td colspan="4"><label class="control-label labelhdata"><?php echo date('d/m/Y', strtotime($rev_wef)); ?></label></td>
							
							
						</tr>
						<tr>
							<td colspan="2" ><label class="control-label labelhed"style="font-size:20px" ><b>Reversion From</b></label></td>
							
							<td colspan="2" ><label class="control-label labelhed" style="font-size:20px"><b>Reversion To</b></label></td>
							
							
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Department</label></td>
							<td><label class="control-label labelhdata"><?php echo $rev_frm_dept ?></label></td>
							
							<td><label class="control-label labelhed" >Department</label></td>
							<td><label class="control-label labelhdata"><?php echo $rev_to_dept ?></label></td>
						</tr>
							
						<tr>
							<td><label class="control-label labelhed" >Designation</label></td>
							<td><label class="control-label labelhdata"><?php echo $rev_frm_desig ?></label></td>
							
							<td><label class="control-label labelhed" >Designation</label></td>
							<td><label class="control-label labelhdata"><?php echo $rev_to_desig ?></label></td>
						</tr>
						
						<tr>
							<td><label class="control-label labelhed" >Other Designation</label></td>
							<td><label class="control-label labelhdata"><?php echo $rev_frm_othr_desig ?></label></td>
							
							<td><label class="control-label labelhed" >Other Designation</label></td>
							<td><label class="control-label labelhdata"><?php echo $rev_to_othr_desig ?></label></td>
							
						</tr>
						<tr>
							<td><label class="control-label labelhed" > Scale</label></td>
							<td><label class="control-label labelhdata"><?php echo $rev_frm_scale ?></label></td>
							
							<td><label class="control-label labelhed" > Scale</label></td>
							<td><label class="control-label labelhdata"><?php echo $rev_to_scale ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Level</label></td>
							<td><label class="control-label labelhdata"><?php echo $rev_frm_level ?></label></td>
							
							<td><label class="control-label labelhed" >Level</label></td>
							<td><label class="control-label labelhdata"><?php echo $rev_to_level ?></label></td>
							
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Group</label></td>
							<td><label class="control-label labelhdata"><?php echo $rev_frm_group ?></label></td>
							<td><label class="control-label labelhed" >Group</label></td>
							<td><label class="control-label labelhdata"><?php echo $rev_to_group ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Station</label></td>
							<td><label class="control-label labelhdata"><?php echo $rev_frm_station ?></label></td>
							
							<td><label class="control-label labelhed" >Station</label></td>
							<td><label class="control-label labelhdata"><?php echo $rev_to_station ?></label></td>
							</tr>
							
							<tr>
							<td><label class="control-label labelhed" >Other Station</label></td>
							<td><label class="control-label labelhdata"><?php echo $rev_frm_othr_station ?></label></td>
							
							<td><label class="control-label labelhed" >Other Station</label></td>
							<td><label class="control-label labelhdata"><?php echo $rev_to_othr_station ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Rate Of Pay</label></td>
							<td><label class="control-label labelhdata"><?php echo $rev_frm_rop ?></label></td>
							
							<td><label class="control-label labelhed" >Rate Of Pay</label></td>
							<td><label class="control-label labelhdata"><?php echo $rev_to_rop ?></label></td>
							</tr>
						<tr>	
							<td><label class="control-label labelhed" >Bill Unit</label></td>
							<td><label class="control-label labelhdata"><?php echo $rev_frm_billunit ?></label></td>
							<td><label class="control-label labelhed" >Bill Unit</label></td>
							<td><label class="control-label labelhdata"><?php echo $rev_to_billunit ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Depot</label></td>
							<td><label class="control-label labelhdata"><?php echo $rev_frm_depot ?></label></td>
							
							<td><label class="control-label labelhed" >Depot</label></td>
							<td><label class="control-label labelhdata"><?php echo $rev_to_depot ?></label></td>
							</tr>
							
							<tr>
							<td><label class="control-label labelhed" >Carried Out Type</label></td>
							<td colspan="5"><label class="control-label labelhdata"><?php echo $rev_carried_out_type ?></label></td>
						</tr>
						<?php if($rev_carried_out_type=='Yes'){?>
						<tr>
							<td><label class="control-label labelhed" >W.E.F Date</label></td>
							<td><label class="control-label labelhdata"><?php  echo date('d/m/Y', strtotime($rev_carri_wef)); ?></label></td>
						<td><label class="control-label labelhed" >Date Of Increment</label></td>
							<td><label class="control-label labelhdata"><?php echo date('d/m/Y', strtotime($rev_carri_date_of_incr)); ?></label></td>
						</tr>
						<?php }if($rev_carried_out_type=='No'){?>
						<tr>
							<td><label class="control-label labelhed" >Acceptance Letter Number</label></td>
							<td><label class="control-label labelhdata"><?php echo $rev_car_re_accept_ltr_no; ?></label></td>
							
							<td><label class="control-label labelhed" >Acceptance Letter Date</label></td>
							<td><label class="control-label labelhdata"><?php echo date('d/m/Y', strtotime($rev_car_re_accept_ltr_date)); ?></label></td>
						</tr>
						
						<tr>
							<td><label class="control-label labelhed" >WEF Date</label></td>
							<td><label class="control-label labelhdata"><?php echo date('d/m/Y', strtotime($rev_car_re_wef_date)); ?></label></td>
							<td><label class="control-label labelhed" >Remarks</label></td>
							<td><label class="control-label labelhdata"><?php echo $rev_car_re_remark; ?></label></td>
						</tr>
						<?php }?>
						
					</tbody>
				</table>
			</div>
			<!--div class="pull-right col-md-7 col-sm-12 col-xs-12">
			
				<a href="display_sr_tab.php?pf=<?php //echo $_GET['pf_no']; ?>" class="btn btn-primary">Back</a>
			</div-->	
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
 <script>
	$("#p1").click(function(){
	 var tab="print_coderev";
	 var pf='<?php echo $pf;?>';
	  // alert(tab);
	 $.ajax({
			type:'POST'	,
			url:'log_display_case.php',
			data:'action=create_log&tab='+tab+'&pf='+pf,
			success:function(html){
			// $("#pincode_2").html(html);
			//alert(html);
			}
		});
	});
 </script>