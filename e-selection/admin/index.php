<?php 
session_start();
 if(!isset($_SESSION['SESS_MEMBER_ID']))
 {
	 echo "<script>alert('Please login first');window.location='../index.php';</script>";
 }
include_once('../global/header.php');
include_once('../global/topbar.php');
include_once('../global/sidebaradmin.php');

function get_level_value($id)
{
	$sql=mysql_query("select * from seventh where id='".$id."'");
	$fetch="";
	while($query=mysql_fetch_array($sql))
	{
		$fetch=$query['level'];
	

	}
	return $fetch;
}

function get_dept($id)
{
	$sql=mysql_query("select * from department where id='".$id."'");
	$fetch="";
	while($query=mysql_fetch_array($sql))
	{
		$fetch=$query['dept'];
	}
	return $fetch;
}


function get_mod_fill($id)
{
	$sql=mysql_query("select mode_of_filling from excel_table where id='".$id."'");
	$fetch="";
	while($query=mysql_fetch_array($sql))
	{
		$fetch=$query['mode_of_filling'];
	}
	return $fetch;
}


function get_cat($id)
{
	$sql=mysql_query("select categary from category where id='".$id."'");
	$fetch="";
	while($query=mysql_fetch_array($sql))
	{
		$fetch=$query['categary'];
	}
	return $fetch;
}


?>
<!-- Left side column. contains the logo and sidebar -->
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-top: -20px;">
    <!-- Content Header (Page header) -->
	<h1>Admin</h1>
	<div class="row">
	<div class="col-md-12">
	   
	</div>
    </section>
	
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        <div class="row">
		<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title" style="margin-left:20px;">Dashboard</h3><hr>
            </div>
			<div class="box-body" style="padding:10px 10px 10px 10px;">
	<div class="col-md-3 col-sm-6">
          <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
			   
			  </h3>

              <p><h3>Total Users</h3></p>
			  <?php 
					$sql=mysql_query("select * from users");
						$count = mysql_num_rows($sql);
		               //if($count>0)		
			
					if($sql)
					{
						echo "<h1 style='margin-top:-10px;margin-bottom:-10px'>".$count."</h1>";
				    }
					else
					{
						echo "<script>alert('Entries Not Found')</script>";
					}
					
				?>
            </div>
            
            <a href="users.php?dept=ACCOUNTS" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
   </div>
        <!-- ./col -->
		<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
			   
			  </h3>
              <p><h3>Total Entries</h3></p>
			  <?php 
					$sql=mysql_query("select * from post_schedule");
						$count = mysql_num_rows($sql);			
					if($sql)
					{
						echo "<h1 style='margin-top:-10px;margin-bottom:-10px'>".$count."</h1>";
				    }
					else
					{
						echo "<script>alert('Entries Not Found')</script>";
					}
					
				?>
            </div>
           
            <a href="view_records.php?dept=GENERAL ADMINISTRATION" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          
			</div>
        </div>
		
		
        <!-- ./col -->
       
      </div>
	  <div class="box-body"  style="padding:10px 10px 10px 10px;">
	<div class="col-md-3 col-sm-6">
          <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
			   
			  </h3>

              <p>ACCOUNTS</p>
			   <?php 
					$sql=mysql_query("select * from post_schedule WHERE dept='1'");
						$count = mysql_num_rows($sql);
		               //if($count>0)		
			
					if($sql)
					{
						echo "<h1 style='margin-top:-10px;margin-bottom:-10px'>".$count."</h1>";
				    }
					else
					{
						echo "<script>alert('Entries Not Found')</script>";
					}
					
				?>
            </div>
            
            <a  href="dept_wise_details.php?dept=1" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
   </div>
        <!-- ./col -->
		<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
			   
			  </h3>
              <p>ADMIN</p>
			    <?php 
					$sql=mysql_query("select * from post_schedule WHERE dept='2'");
						$count = mysql_num_rows($sql);
		               //if($count>0)		
			
					if($sql)
					{
						echo "<h1 style='margin-top:-10px;margin-bottom:-10px'>".$count."</h1>";
				    }
					else
					{
						echo "<script>alert('Entries Not Found')</script>";
					}
					
				?>
            </div>
           
            <a href="dept_wise_details.php?dept=2" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>
			 
			  </h3>

              <p>PERSONNEL</p>
			   <?php 
					$sql=mysql_query("select * from post_schedule WHERE dept='3'");
						$count = mysql_num_rows($sql);
		               //if($count>0)		
			
					if($sql)
					{
						echo "<h1 style='margin-top:-10px;margin-bottom:-10px'>".$count."</h1>";
				    }
					else
					{
						echo "<script>alert('Entries Not Found')</script>";
					}
					
				?>
            </div>
         
            <a href="dept_wise_details.php?dept=3" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		
        <!-- ./col -->
        <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
			 
			  </h3>
			  <p>ELECTRICAL</p>
			   <?php 
					$sql=mysql_query("select * from post_schedule WHERE dept='4'");
						$count = mysql_num_rows($sql);
		               //if($count>0)		
			
					if($sql)
					{
						echo "<h1 style='margin-top:-10px;margin-bottom:-10px'>".$count."</h1>";
				    }
					else
					{
						echo "<script>alert('Entries Not Found')</script>";
					}
					
				?>
            </div>
          
            <a href="dept_wise_details.php?dept=4" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> 
		</div>
        </div>
	
      </div>
	  <div class="box-body"  style="padding:10px 10px 10px 10px;">
	<div class="col-md-3 col-sm-6">
          <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
			   
			  </h3>

              <p>ELECTRICAL TRD</p>
			   <?php 
					$sql=mysql_query("select * from post_schedule WHERE dept='5'");
						$count = mysql_num_rows($sql);
		               //if($count>0)		
			
					if($sql)
					{
						echo "<h1 style='margin-top:-10px;margin-bottom:-10px'>".$count."</h1>";
				    }
					else
					{
						echo "<script>alert('Entries Not Found')</script>";
					}
					
				?>
            </div>
            
            <a href="dept_wise_details.php?dept=5" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
   </div>
        <!-- ./col -->
		<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
			   
			  </h3>
              <p>C & W</p>
			    <?php 
					$sql=mysql_query("select * from post_schedule WHERE dept='6'");
						$count = mysql_num_rows($sql);
		               //if($count>0)		
			
					if($sql)
					{
						echo "<h1 style='margin-top:-10px;margin-bottom:-10px'>".$count."</h1>";
				    }
					else
					{
						echo "<script>alert('Entries Not Found')</script>";
					}
					
				?>
            </div>
           
            <a href="dept_wise_details.php?dept=6" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>
			 
			  </h3>

              <p>LOCO</p>
			   <?php 
					$sql=mysql_query("select * from post_schedule WHERE dept='7'");
						$count = mysql_num_rows($sql);
		               //if($count>0)		
			
					if($sql)
					{
						echo "<h1 style='margin-top:-10px;margin-bottom:-10px'>".$count."</h1>";
				    }
					else
					{
						echo "<script>alert('Entries Not Found')</script>";
					}
					
				?>
            </div>
         
            <a href="dept_wise_details.php?dept=7" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		
        <!-- ./col -->
        <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
			 
			  </h3>
			  <p>S & T</p>
			   <?php 
					$sql=mysql_query("select * from post_schedule WHERE dept='8'");
						$count = mysql_num_rows($sql);
		               //if($count>0)		
			
					if($sql)
					{
						echo "<h1 style='margin-top:-10px;margin-bottom:-10px'>".$count."</h1>";
				    }
					else
					{
						echo "<script>alert('Entries Not Found')</script>";
					}
					
				?>
            </div>
          
            <a href="dept_wise_details.php?dept=8" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> 
		</div>
        </div>
	
      </div>
	  <div class="box-body"  style="padding:10px 10px 10px 10px;">
	<div class="col-md-3 col-sm-6">
          <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
			   
			  </h3>

              <p>ENGINEERING</p>
			   <?php 
					$sql=mysql_query("select * from post_schedule WHERE dept='9'");
						$count = mysql_num_rows($sql);
		               //if($count>0)		
			
					if($sql)
					{
						echo "<h1 style='margin-top:-10px;margin-bottom:-10px'>".$count."</h1>";
				    }
					else
					{
						echo "<script>alert('Entries Not Found')</script>";
					}
					
				?>
            </div>
            
            <a href="dept_wise_details.php?dept=9" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
   </div>
        <!-- ./col -->
		<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
			   
			  </h3>
              <p >MEDICAL</p>
			    <?php 
					$sql=mysql_query("select * from post_schedule WHERE dept='10'");
						$count = mysql_num_rows($sql);
		               //if($count>0)		
			
					if($sql)
					{
						echo "<h1 style='margin-top:-10px;margin-bottom:-10px'>".$count."</h1>";
				    }
					else
					{
						echo "<script>alert('Entries Not Found')</script>";
					}
					
				?>
            </div>
           
            <a href="dept_wise_details.php?dept=10" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>
			 
			  </h3>

              <p>COMMERCIAL</p>
			   <?php 
					$sql=mysql_query("select * from post_schedule WHERE dept='11'");
						$count = mysql_num_rows($sql);
		               //if($count>0)		
			
					if($sql)
					{
						echo "<h1 style='margin-top:-10px;margin-bottom:-10px'>".$count."</h1>";
				    }
					else
					{
						echo "<script>alert('Entries Not Found')</script>";
					}
					
				?>
            </div>
         
            <a href="dept_wise_details.php?dept=11" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		
        <!-- ./col -->
        <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
			 
			  </h3>
			  <p>OPERATING</p>
			   <?php 
					$sql=mysql_query("select * from post_schedule WHERE dept='12'");
						$count = mysql_num_rows($sql);
		               //if($count>0)		
			
					if($sql)
					{
						echo "<h1 style='margin-top:-10px;margin-bottom:-10px'>".$count."</h1>";
				    }
					else
					{
						echo "<script>alert('Entries Not Found')</script>";
					}
					
				?>
            </div>
          
            <a href="dept_wise_details.php?dept=12" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> 
		</div>
        </div>
	
      </div>
      <!-- /.row -->
	  
    </section>
	 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h2 class="box-title"><b>Audit</b></h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Department</th>
				  <th>Date of Assessment</th>
				  <th>Date of Exam</th>
				  <th>Date of Panel</th>
				  <th>Date of Notice</th>
				  <th>Inserted-Date</th>
				  <th>Updated By</th>
                </tr>
                </thead>
                <tbody>
               <?php 
					$sql=mysql_query("select * from post_schedule where date_time=CURDATE()");
               		//$row_cnt = mysqli_num_rows($sql);	
					
					
				if($sql)
				{
					
					while($result=mysql_fetch_array($sql))
					{
						$conv=$result['date_of_ass'];
					    if($conv!='0000-00-00')
					{
						$con1=date('d-m-Y',strtotime($conv));
					}
					else
					{
						$con1='-';
					}
					
					 $con_exam1=$result['date_of_exam'];
					 if($con_exam1!='0000-00-00')
					{
						$con_exam=date('d-m-Y',strtotime($con_exam1));
					}
					else
					{
						$con_exam='-';
					}
					
					$con_date_pan1=$result['date_of_panel'];
					if($con_date_pan1!='0000-00-00')
					{
				    $con_date_pan=date('d-m-Y',strtotime($con_date_pan1));
					}
					else
					{
						$con_date_pan='-';
					}
					
					$con_date_noti1=$result['date_of_noti'];
					if($con_date_noti1!='0000-00-00')
					{
				    $con_date_not=date('d-m-Y',strtotime($con_date_pan1));
					}
					else
					{
						$con_date_not='-';
					}
					
					$in_date=$result['date_time'];
					//echo $in_date1;
					if($in_date!='0000-00-00')
					{
				    $in_date1=date('d-m-Y',strtotime($in_date));
					}
					else
					{
						$in_date1='-';
					}
						
						echo "<tr>";
						
						echo "<td>".get_dept($result['dept'])."</td>";
						echo "<td>".$con1."</td>";
						echo "<td>".$con_exam."</td>";
						echo "<td>".$con_date_pan."</td>";
						echo "<td>".$con_date_not."</td>";
						echo "<td>".$in_date1."</td>";
						echo "<td>".$result['updated_by']."</td>";
						echo "</tr>";
						
					
					}
				
				}
				else
				{
             		echo "<script>alert('No entries found for today')</ script>";
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
	</div>
	</div>
	</div>
	
    <!-- /.content -->
	
	
  
  
<?php
 include_once('../global/footer.php');
 ?> 