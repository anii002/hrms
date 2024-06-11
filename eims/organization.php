<?php
	$GLOBALS['flag']="4.96";
	include('common/header.php');
	include('common/sidebar1.php');
?>
<style>
    .greenbg{
    background: #00a65a;    
}
.greenbg th, .bluebg th{
    color: #fff;
    font-family: 'Poppins', sans-serif;
    font-weight: normal;
}
.orgsetup tr th{
    font-size: 16px;
}
.orgsetup td{
    font-size: 16px;
}
.orgheading h3 {
    color: #AA4022;
    font-family: 'Poppins', sans-serif;
    font-size: 18px;
    padding-bottom: 15px;
}
.welinspctr, .otherfacity, .resthouse{
    padding-top: 20px;
}
.bluebg{
    background: #3a87ad !important;
}
.moderegist tr .bluebg{
    color: #fff;
    text-align: center;
}
.moderegist p, .otherfacity p{
    font-size: 16px;
}
</style>
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			 Organization Setup
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="dashboard.php">Home / मुख पृष्ठ</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Organization Setup</a>
					</li>
				</ul>
				<div class="page-toolbar">
					<div id="" class="pull-right tooltips btn btn-fit-height grey-salt">
						<i class=""></i> <span><?php echo date('Y/m/d H:i:s'); ?></span>
						<!-- <span class="thin uppercase visible-lg-inline-block"></span> -->
						<!-- <i class="fa fa-angle-down"></i> -->
					</div>
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->
			<div class="row">
				
				
				
			</div>
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey-cascade">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-list-alt"></i>Organization Setup
							</div>
							
						</div>
						<div class="portlet-body">
						
						 <div class="content">
        <div class="row">
        <div class="col-md-12 orgheading">
          <h3>Organizational Setup</h3>
            <table class="table table-bordered table-responsive orgsetup">
                <thead>
                    <tr class="greenbg">
                        <th style="width: 8%">Sr. No.</th>
                        <th>Name of officer</th>
                        <th>Designation</th>
                        <th>Mobile No.</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="success">
                        <td>01</td>
                        <td>Shri Surendra Singh Barahat</td>
                        <td>Divisional Personnel Officer (Co)</td>
                        <td>7219614600</td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td>Shri R. R. Iyer</td>
                        <td>Divisional Personnel Officer (W)</td>
                        <td>7219614602</td>
                    </tr>
                    <tr class="success">
                        <td>03</td>
                        <td>Shri Prem Kumar Sharma</td>
                        <td>Assistant Personnel Officer (T&C)</td>
                        <td>7219614604</td>
                    </tr>
                </tbody>
            </table>
            <div class="welinspctr">
              <h3>List of sectional Staff &amp; Welfare Inspectors-</h3>
              <table class="table table-bordered table-responsive orgsetup">
                <thead>
                    <tr class="bluebg">
                        <th style="width: 7%">Sr. No.</th>
                        <th style="width: 20%">Name of S &amp; WI / HQ</th>
                        <th style="width: 12%">Contact No</th>
                        <th>HQ</th>
                        <th style="width: 15%">Section Allotted</th>
                        <th>Work / Station.</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="info">
                        <td>01</td>
                        <td>S. Anbalgan Ch.S&WI</td>
                        <td>9503014614</td>
                        <td>Kurduwadi</td>
                        <td>BALE-KWV-MRJ</td>
                        <td>All stations, depots/units/offices from Bale to MRJ including Kurduwadi.</td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td>A.P.Dethe, Ch.S&WI</td>
                        <td>9503014624</td>
                        <td>Daund</td>
                        <td>JEUR-DD</td>
                        <td>All stations, depots/units/offices from Jeur to Daund.</td>
                    </tr>
                    <tr class="info">
                        <td>03</td>
                        <td>Ashwini Kumar,S&WI</td>
                        <td>9503014610</td>
                        <td>Ahmednagar</td>
                        <td>KSTH-SNSI-YL</td>
                        <td>All stations, depots/units/offices from Kasthi to Yeola including SNSI.</td>
                    </tr>
                    <tr>
                        <td>04</td>
                        <td>Amar jee Jha, S&WI </td>
                        <td>9503014611</td>
                        <td>Shahabad</td>
                        <td>KUI to WADI</td>
                        <td>All stations, depots/units/offices from Kulali to Wadi</td>
                    </tr>
                    <tr class="info">
                        <td>05</td>
                        <td>V M Kengar, S&WI</td>
                        <td>9503014623</td>
                        <td>Daund</td>
                        <td>LUR-KWV-BLNI</td>
                        <td>WM/KWV and All depots from LUR to BLNI excluding KWV.</td>
                    </tr>
                    <tr>
                        <td>06</td>
                        <td>I A Shaikh, S&WI</td>
                        <td>9922576727</td>
                        <td>Solapur</td>
                        <td>SUR-DUD</td>
                        <td>All stations, depots/units/offices from Solapur to Dudhani.</td>
                    </tr>
                </tbody>
            </table>
            </div>

            

            </div>
        </div>
        </div>
      </div>
							
						
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END DASHBOARD STATS -->
			<div class="clearfix">
			</div>
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php
	include('common/footer.php');
?>
