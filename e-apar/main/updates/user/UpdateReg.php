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
}

</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>

	  <br>
    </section>
	
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	
      <div class="row">
	  <?php
	  if(isset($_GET["reg_id"])!='')
	  {
	  $editid=$_GET["reg_id"];
	  $sqledit=mysql_query("select * from tbl_registration where reg_id='$editid'");
	  while($rwEdit=mysql_fetch_array($sqledit))
	  {
	  $id=$rwEdit["reg_id"];
	  ?>
	  <form action="edit_reg.php" method="post" id="frmregister" enctype="text/form-data" accept="image/jpg,image/png">
			<div class="col-md-6 col-sm-6">
          <!-- small box -->
		    <div class="form-group">
		<label>Index Register No:</label>
		<input type="hidden" id="txtregid" name="txtregid" value="<?php echo $rwEdit["reg_id"];?>">
		<input type="number" class="form-control primary" id="txtindexno" name="txtindexno" placeholder="Enter Index Number Here" value="<?php echo $rwEdit["registerno"];?>"  />
		</div>
		
		   <div class="form-group">
		<label>PPO No:</label>
		<input type="number" class="form-control primary" id="txtppono" name="txtppono" value="<?php echo $rwEdit["ppono"];?>" placeholder="Enter PPO Number Here" />
		</div>
		
        <div class="form-group">
		<label>User Full Name:</label>
		<input type="text" class="form-control primary" id="txtfullname" name="txtfullname" value="<?php echo $rwEdit["fullname"];?>" placeholder="Enter Your Full Name"  />
		</div>
		
		 <div class="form-group">
		<label>Designation:</label>
		<input type="text" class="form-control primary" id="txtdesignation" name="txtdesignation" value="<?php echo $rwEdit["designation"];?>" placeholder="Enter Your Full Name"  />
		</div>
		 <div class="form-group">
		<label>Station:</label>
		<input type="text" class="form-control primary" id="txtstation" name="txtstation" value="<?php echo $rwEdit["station"];?>" placeholder="Enter Your Full Name"  />
		</div>
		
		<div class="form-group">
		<label>Department:</label>
		<input type="text" class="form-control primary" id="txtdept" name="txtdept" value="<?php echo $rwEdit["department"];?>" placeholder="Enter Your Full Name"  />
		</div>
		
		<div class="form-group">
		<label>Date Of Birth:</label>
		<input type="date" class="form-control primary" id="txtdateofbirth" name="txtdateofbirth" value="<?php echo $rwEdit["dateofbirth"];?>"   />
		</div>
		
		 <div class="form-group">
		 <label>Email:</label>
                <!--span class="form-group-addon"><i class="fa fa-envelope"></i></span-->
                <input type="email" class="form-control primary " id="txtemail" name="txtemail" value="<?php echo $rwEdit["email"];?>"  />
         </div>
		 <div class="form-group">
		 <label>Date of Retirement:</label>
		 <input type="date" name="txtdateretirment" id="txtdateretirment" class="form-control primary" value="<?php echo $rwEdit["dateofretirment"];?>"  />
		 </div>
		 
		 <div class="form-group">
		 <label>Type Of Retirement</label>
               <select class="form-control primary" id="cmbretirement" name="cmbretirement" readonly >
			   <option value="<?php echo $rwEdit["typeofretirement"];?>"><?php echo $rwEdit["typeofretirement"];?></option>
               </select>
         </div>
		
			 <div class="form-group">
		 <label>User Address:</label>
                <textarea class="form-control primary" rows="3" id="txtaddress" name="txtaddress" value="" placeholder="Enter Address Here" ><?php echo $rwEdit["address"];?>
                </textarea>
         </div>
		
        </div>
        <!-- ./col -->
        <div class="col-md-6 col-sm-6">
          <!-- small box -->
          <div class="form-group">
		<label>PF Account No:</label>
		<input type="text" class="form-control primary" id="txtpfaccount" name="txtpfaccount" value="<?php echo $rwEdit["pfaccountno"];?>" placeholder="Enter Address here" readonly  />
		</div>
		
		<div class="form-group">
		<label>Qualifying Service:</label>
		<input type="text" class="form-control primary" id="txtservice" name="txtservice" value="<?php echo $rwEdit["qualifyingservice"];?>" placeholder="YY-MM-DD" value="YY-MM-DD" />
		</div>
		
			<div class="form-group">
		<label>Rate Of Pay</label> 
		<input type="number" class="form-control primary"  id="txtrateofpay" name="txtrateofpay" value="<?php echo $rwEdit["rateofpay"];?>"  placeholder="" readonly />
		</div>
		
		<div class="form-group">
		<label>Scale / Level</label>
		<input type="text" class="form-control primary" id="txtscale" name="txtscale"  value="<?php echo $rwEdit["scale"];?>" placeholder=""  />
		</div>
		
		<div class="form-group">
		<label>Pension</label>
		<input type="number" class="form-control primary" id="txtpension" name="txtpension" value="<?php echo $rwEdit["pension"];?>"  placeholder="" />
		</div>
		
		<div class="form-group">
		<label>Family Pension &nbsp;&nbsp;&nbsp; <i class="fa fa-arrow-left"></i></label><br>
		<label>Enhance</label>
		<input type="number" class="form-control primary" id="txtenhance" name="txtenhance" value="<?php echo $rwEdit["enhance"];?>"  placeholder=""  />
		<label>Normal</label>
		<input type="number" class="form-control primary" id="txtnormal" name="txtnormal" value="<?php echo $rwEdit["normal"];?>" placeholder=""  />
		
		</div>
		
		
		<div class="form-group">
		<label>Gratuity Amount:</label>
		<input type="number" class="form-control primary" id="txtgratuity" name="txtgratuity" value="<?php echo $rwEdit["gratuityno"];?>" placeholder="" readonly />
		</div>
		<div class="form-group">
		<label>NGIS / REIS Amount:</label>
		<input type="number" class="form-control primary" id="txtngisamount" name="txtngisamount" value="<?php echo $rwEdit["ngisamount"];?>" placeholder=""  />
		</div>
		
		<div class="form-group">
		<label>Railway Quarter No:</label>
		<input type="text" class="form-control primary" id="txtquarterno" name="txtquarterno" value="<?php echo $rwEdit["railwayquarter"];?>" placeholder=""  />
		</div>
		
		
		<div class="form-group">
		<label>Date Of Vacation:</label>
		<input type="date" class="form-control primary" id="txtvacation" name="txtvacation" value="<?php echo $rwEdit["dateofvacation"];?>" placeholder=""  />
		</div>
		
	
		
        </div>
        <!-- ./col -->
       <hr style="width:100%;background-color:red;height:5px;">
		<div class="col-md-6 col-sm-6">
		 
				<label style="color:green;font-size:22px">Bank Details</label><hr>
				<div class="form-group">
				<label>Name of Bank:</label>
				<input type="text" class="form-control primary" id="txtbank" name="txtbank" value="<?php echo $rwEdit["nameofbank"];?>" placeholder="" readonly />
				</div>
				
				
				<div class="form-group">
				<label>Name of Branch:</label>
				<input type="text" class="form-control primary" id="txtbranch" name="txtbranch" value="<?php echo $rwEdit["namebranch"];?>"  placeholder="" readonly />
				</div>
				
				<div class="form-group">
				<label>IFSC Code:</label>
				<input type="number" class="form-control primary" id="txtifsccode" name="txtifsccode" value="<?php echo $rwEdit["ifsccode"];?>" placeholder=""  readonly />
				</div>
				
				<div class="form-group">
				<label>Account No:</label>
				<input type="number" class="form-control primary" id="txtacountno" name="txtacountno" value="<?php echo $rwEdit["accountno"];?>"  placeholder="" readonly />
				</div>
				<div class="form-group">
				<label>RELHS Option:</label>
				  
						  <div class="radio" id="">
							<label>
							  <input type="radio" name="optionsRadios" id="txtyes" value="option1" checked >
							  Yes
							</label>
						  </div>
						  <div class="radio">
							<label>
							  <input type="radio" name="optionsRadios" id="txtno" value="option2">
							 No
							</label>
						  </div>
					 
				</div>
					<div class="form-group">
				<label>RELHS Amount Recovered:</label>
				<input type="number" class="form-control primary" id="txtrelhsamount" name="txtrelhsamount" value="<?php echo $rwEdit["relhsamount"];?>"  placeholder=""  />
				</div>
				
				<div class="form-group">
				<label>FD if any:</label>
				<input type="number" class="form-control primary" id="txtfd" name="txtfd"  value="<?php echo $rwEdit["fd"];?>" placeholder=""  />
				</div>
		
		
		
        </div>
        <!-- ./col -->
        <div class="col-md-6 col-sm-6">
			<label style="color:black;font-size:22px">Family Details</label><hr>
				
			<div class="form-group">
			<label>Family Particulars:</label>
			
			<div class="form-group">
			<label>Name:</label>
			<input type="text" class="form-control primary" id="txtname1" name="txtname1" value="<?php echo $rwEdit["fname"];?>" placeholder=""  />
			</div>
			
			<div class="form-group">
			<label>Relation:</label>
			<input type="text" class="form-control primary" id="txtrelation" name="txtrelation" value="<?php echo $rwEdit["relation"];?>" placeholder=""  />
			</div>
			<div class="form-group">
			<label>Date Of Birth:</label>
			<input type="date" class="form-control primary" id="txtreldateofbirth" name="txtreldateofbirth" value="<?php echo $rwEdit["redateofbirth"];?>" placeholder=""  />
			</div>
			
			<div class="form-group">
			<label>Aadhar No:</label>
			<input type="number" class="form-control primary" id="txtreaadharno" name="txtreaadharno" value="<?php echo $rwEdit["reaadharno"];?>" placeholder="" />
			</div>
			
			<div class="form-group">
			<label>Permanent Address:</label>
			<textarea class="form-control primary" rows="2" id="txtperaddress" name="txtperaddress" value="" ><?php echo $rwEdit["peraddress"];?></textarea>
			</div>
			
			<div class="form-group">
			<label>Pensioner Aadhar No:</label>
			<input type="number" class="form-control primary" id="txtaddharno" name="txtaddharno" value="<?php echo $rwEdit["pensioneraadhar"];?>" placeholder="" readonly  />
			</div>
			
			
			<div class="form-group">
			<label>Pensioner Phone/ Mob No:</label>
			<input type="number" class="form-control primary" id="txtcontact" name="txtcontact" value="<?php echo $rwEdit["pensionercontact"];?>" placeholder=""  />
			</div>
			</div>
        </div>
        <!-- ./col -->	
		<div class="form-group col-md-4">
		<button type="submit" class="btn btn-success" href="edit_reg.php?reg_id='$reg_id'" id="btnUpdate" name="btnUpdate">Update</button>
		&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-info" id="btnFinish" name="btnFinish" >Finish</button>
		&nbsp;&nbsp;<button type="reset" class="btn btn-danger" id="btnCancel" name="btnCancel" onClick="window.loading.refresh();">Cancel</button>
		</div>
		
		</form>
		<?php
		}
		}
		?>
      </div>
	  
				
	  <br>
	  <br>
	  <br>
	  
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