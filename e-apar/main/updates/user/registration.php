<?php
session_start();
include_once("header.php");
include_once("topbar.php");
include_once("sidebar.php");
?>
<style>

.primary
{


 box-shadow: none;
 border-color: #337AB7;
	width: 60%;
    margin-top: -28px;
    margin-left: 175px;
}
.input-group-addon
{
width:10%;
margin-right:1px;
text-align:right;
float:right;
border:none;
}
</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Employee Registration
      </h1>
	<hr style="width:100%;background-color:red;height:3px;">
	  <br>
    </section>
	
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	
      <div class="row">
	  <form action="Ajaxregister.php" method="post" id="frmregister" enctype="text/form-data" accept="image/jpg,image/png">
			<div class="col-md-6 col-sm-6">
          <!-- small box -->
		    <div class="form-group">
		<label>Index Register No:</label>
		<input type="hidden" id="txtregid" name="txtregid">
		<!--i class="fa fa-calculator input-group-addon"></i-->
		<input type="number" class="form-control primary" id="txtindexno" name="txtindexno" placeholder="Enter Index Number Here"  />
		</div>
		
		   <div class="form-group">
		<label>PPO No:</label>
		<input type="number" class="form-control primary" id="txtppono" name="txtppono" placeholder="Enter PPO Number Here" required />
		</div>
		
        <div class="form-group">
		<label>User Full Name:</label>
		<input type="text" class="form-control primary" id="txtfullname" name="txtfullname" placeholder="Enter Your Full Name"  />
		</div>
		
		 <div class="form-group">
		<label>Designation:</label>
		<input type="text" class="form-control primary" id="txtdesignation" name="txtdesignation" placeholder="Enter Your Full Name"  />
		</div>
		 <div class="form-group">
		<label>Station:</label>
		<input type="text" class="form-control primary" id="txtstation" name="txtstation" placeholder="Enter Your Full Name"  />
		</div>
		
		<div class="form-group">
		<label>Department:</label>
		<input type="text" class="form-control primary" id="txtdept" name="txtdept" placeholder="Enter Your Full Name"  />
		</div>
		
		<div class="form-group">
		<label>Date Of Birth:</label>
		<input type="date" class="form-control primary" id="txtdateofbirth" name="txtdateofbirth" placeholder="Enter Your Full Name"  />
		</div>
		
		 <div class="form-group">
		 <label>Email:</label>
               <!--i class="fa fa-envelope input-group-addon"></i-->
                <input type="email" class="form-control primary" id="txtemail" name="txtemail"  placeholder="Enter Email Id Here">
         </div>
		 <div class="form-group">
		 <label>Date of Retirement:</label>
		 <input type="date" name="txtdateretirment" id="txtdateretirment" class="form-control primary" />
		 </div>
		 
		 <div class="form-group">
		 <label>Type Of Retirement</label>
                <!--span class="form-group-addon"><i class="fa fa-envelope"></i></span-->
               <select class="form-control primary" id="cmbretirement" name="cmbretirement" >
			   <option value="" selected hidden disabled> --Select Retirement Type-- </option>
					<?php
					 $sqlType=mysql_query("select * from tbl_retirement");
					 while($rwType=mysql_fetch_array($sqlType))
					 {
					 ?>
					 <option value="<?php echo $rwType["name"]; ?>"><?php echo $rwType["name"]; ?>
					 </option>
					 <?php
					 }
					 ?>
               </select>
         </div>
		
			 <div class="form-group">
		 <label>User Address:</label>
                <!--span class="form-group-addon"><i class="fa fa-envelope"></i></span-->
                <textarea class="form-control primary" rows="3" id="txtaddress" name="txtaddress" placeholder="Enter Address Here" >
                </textarea>
         </div>
		
        </div>
        <!-- ./col -->
        <div class="col-md-6 col-sm-6">
          <!-- small box -->
          <div class="form-group">
		<label>PF Account No:</label>
		<input type="text" class="form-control primary" id="txtpfaccount" name="txtpfaccount" placeholder="Enter Address here"  />
		</div>
		
		<div class="form-group">
		<label>Qualifying Service:</label>
		<input type="text" class="form-control primary" id="txtservice" name="txtservice" placeholder="Enter Qualifying Service" />
		</div>
		
			<div class="form-group">
		<label>Rate Of Pay</label> 
		<input type="number" class="form-control primary"  id="txtrateofpay" name="txtrateofpay"  placeholder="Enter Rate of Pay"  />
		</div>
		
		<div class="form-group">
		<label>Scale / Level</label>
		<input type="text" class="form-control primary" id="txtscale" name="txtscale"  placeholder="Enter Scale / level"  />
		</div>
		
		<div class="form-group">
		<label>Pension</label>
		<input type="number" class="form-control primary" id="txtpension" name="txtpension"  placeholder="Enter Pension amount" />
		</div>
		
		<div class="form-group">
		<label>Family Pension &nbsp;&nbsp;&nbsp; <i class="fa fa-arrow-left"></i></label><br>
		<label>Enhance</label>
		<input type="number" class="form-control primary" id="txtenhance" name="txtenhance"  placeholder="Enter enhance amount"  /><br>
		<label>Normal</label>
		<input type="number" class="form-control primary" id="txtnormal" name="txtnormal"  placeholder="Enter Normal amount"  />
		
		</div>
		
		
		<div class="form-group">
		<label>Gratuity Amount:</label>
		<input type="number" class="form-control primary" id="txtgratuity" name="txtgratuity"  placeholder="Enter gratuity amount"  />
		</div>
		<div class="form-group">
		<label>NGIS / REIS Amount:</label>
		<input type="number" class="form-control primary" id="txtngisamount" name="txtngisamount"  placeholder="Enter NGIS / REIS amount"  />
		</div>
		
		<div class="form-group">
		<label>Railway Quarter No:</label>
		<input type="text" class="form-control primary" id="txtquarterno" name="txtquarterno"  placeholder="Enter Railway Quarter No"  />
		</div>
		
		
		<div class="form-group">
		<label>Date Of Vacation:</label>
		<input type="date" class="form-control primary" id="txtvacation" name="txtvacation"  placeholder="Enter Date Of Vacation"  />
		</div>
		
	
		
        </div>
        <!-- ./col -->
       <hr style="width:100%;background-color:red;height:3px;">
		<div class="col-md-6 col-sm-6">
		 
				<label style="color:green;font-size:22px">Bank Details</label><hr>
				<div class="form-group">
				<label>Name of Bank:</label>
				<input type="text" class="form-control primary" id="txtbank" name="txtbank"  placeholder="Enter Bank name"  required/>
				</div>
				
				
				<div class="form-group">
				<label>Name of Branch:</label>
				<input type="text" class="form-control primary" id="txtbranch" name="txtbranch"   placeholder="Enter branch name" required />
				</div>
				
				<div class="form-group">
				<label>IFSC Code:</label>
				<input type="number" class="form-control primary" id="txtifsccode" name="txtifsccode"  placeholder="Enter IFSC code"   />
				</div>
				
				<div class="form-group">
				<label>Account No:</label>
				<input type="number" class="form-control primary" id="txtacountno" name="txtacountno"  placeholder="Enter account number" required />
				</div>
				<div class="form-group">
				<label>RELHS Option:</label>
				  
						  <div class="radio" id="">
							<label>
							  <input type="radio" name="optionsRadios" id="txtyes" value="Yes" checked >
							  Yes
							</label>
						  </div>
						  <div class="radio">
							<label>
							  <input type="radio" name="optionsRadios" id="txtno" value="No">
							 No
							</label>
						  </div>
					 
				</div>
					<div class="form-group">
				<label>RELHS Amount Recovered:</label> 
				<input type="number" class="form-control primary" id="txtrelhsamount" name="txtrelhsamount"  placeholder="Enter RELHS Amount Recovered"  />
				</div>
				
				<div class="form-group">
				<label>FD if any:</label>
				<input type="number" class="form-control primary" id="txtfd" name="txtfd"  placeholder="Enter FD"  />
				</div>
		
		
		
        </div>
        <!-- ./col -->
        <div class="col-md-6 col-sm-6">
			<label style="color:black;font-size:22px">Family Details</label><hr>
				
			<div class="form-group">
			<label>Family Particulars:</label>
			
			<div class="form-group">
			<label>Name:</label>
			<input type="text" class="form-control primary" id="txtname1" name="txtname1"  placeholder="Enter family name"  />
			</div>
			
			<div class="form-group">
			<label>Relation:</label>
			<input type="text" class="form-control primary" id="txtrelation" name="txtrelation"  placeholder="Enter Relation"  />
			</div>
			<div class="form-group">
			<label>Date Of Birth:</label>
			<input type="date" class="form-control primary" id="txtreldateofbirth" name="txtreldateofbirth"  placeholder="Select Date of birth"  />
			</div>
			
			<div class="form-group">
			<label>Aadhar No:</label>
			<input type="number" class="form-control primary" id="txtreaadharno" name="txtreaadharno"  placeholder="Enter Aadhar number" />
			</div>
			
			<div class="form-group">
			<label>Permanent Address:</label>
			<textarea class="form-control primary" rows="2" id="txtperaddress" name="txtperaddress">
			</textarea>
			</div>
			
			<div class="form-group">
			<label>Pensioner Aadhar No:</label>
			<input type="number" class="form-control primary" id="txtaddharno" name="txtaddharno"  placeholder="Enter Pensioner Aadhar no "  />
			</div>
			
			
			<div class="form-group">
			<label>Pensioner Phone/ Mob No:</label>
			<input type="number" class="form-control primary" id="txtcontact" name="txtcontact"  placeholder="Enter Pensioner contact no"  />
			<input type="hidden" class="form-control primary" id="txtsessionpersone" name="txtsessionpersone" value="<?php echo $_SESSION['SESS_NAME']; ?>" placeholder=""  />
			</div>
			
			
			</div>
        </div>
        <!-- ./col -->	
		<div class="clearfix"></div>&nbsp;&nbsp;&nbsp;&nbsp;
		<!--input type="submit" class="form-control" id="btnsubmit" name="btnsubmit" class="btn btn-info" value="Submit" sty/>
		<input type="reset" class="form-control" id="btnreset" name="btnreset"  value="Cancel" onClick="window.loading.refresh();"/-->
		<button type="submit" class="btn btn-success" id="btnSave" name="btnSave">Submit</button>&nbsp;&nbsp;
		<button type="reset" class="btn btn-info" id="btnCancel" name="btnCancel" onClick="window.loading.refresh();">Cancel</button>
		
		
		</form>
		
      </div>
	  <br>
	  <br>
	  <br>
	   <!--div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Registered List</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <!--div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Index No</th>
                    <th>PPO No</th>
                    <th>Full Name</th>
                    <th>Designation</th>
                    <th>Station</th>
                    <th>Department</th>
                    <th>Date Of Borth</th>
                    <th>Action</th>
                  </tr>
                  </thead>
              
				<tbody>
				  <?php
				// $sqlquery=mysql_query("select * from tbl_registration order by reg_id desc");
				// $rwReg=mysql_fetch_array($sqlquery);
				
				// $id=$rwReg["reg_id"];
				//echo "$id";
				?>
				<tr>
				<td><?php echo $rwReg["registerno"];?></td>
				<td><?php echo $rwReg["ppono"];?></td>
				<td><?php echo $rwReg["fullname"];?></td>
				<td><?php echo $rwReg["designation"];?></td>
				<td><?php echo $rwReg["station"];?></td>
				<td><?php echo $rwReg["department"];?></td>
				<td><?php echo $rwReg["dateofbirth"];?></td>
				<td><?php echo '<a href="UpdateReg.php?reg_id=' . $id. '"> <input type="button" class="btn btn-success" id="btnedit" name="btnedit" value="Edit"/></a>
			<a href="deletereg.php?reg_id=' . $id. '"> <input type="button" class="btn btn-danger" id="btndelete" name="btndelete" value="Delete"/></a> '?></td>
				</tr>
				
				</tbody>
				
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <!--div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
            </div-->
            <!-- /.box-footer -->
          <!--/div-->
				
				
      <!-- /.row -->
      <!-- Main row -->

      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php
 
 include_once("footer.php");
 ?>