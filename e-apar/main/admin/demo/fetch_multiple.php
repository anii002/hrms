<?php

	include('../../dbconfig/dbcon.php');
	dbcon(); 
	session_start();
	
$emp_id = ($_REQUEST["empcode"] <> "") ? trim($_REQUEST["empcode"] ) : "";
$show = ($_REQUEST["btnshow"] <> "") ? trim($_REQUEST["btnshow"] ) : "";
//if ($emp_id <> "")
 //{
 
	$emp_id=$_POST["empcode"];
	$year=$_POST["btnshow"];
   
	?>
	 <link href="dist/css/lightgallery.css" rel="stylesheet">
	  <style type="text/css">
            body{
                background-color: #152836
            }
            .demo-gallery > ul {
              margin-bottom: 0;
            }
            .demo-gallery > ul > li {
                float: left;
                margin-bottom: 15px;
                margin-right: 20px;
                width: 200px;
            }
            .demo-gallery > ul > li a {
              border: 3px solid #FFF;
              border-radius: 3px;
              display: block;
              overflow: hidden;
              position: relative;
              float: left;
            }
            .demo-gallery > ul > li a > img {
              -webkit-transition: -webkit-transform 0.15s ease 0s;
              -moz-transition: -moz-transform 0.15s ease 0s;
              -o-transition: -o-transform 0.15s ease 0s;
              transition: transform 0.15s ease 0s;
              -webkit-transform: scale3d(1, 1, 1);
              transform: scale3d(1, 1, 1);
              height: 100%;
              width: 100%;
            }
            .demo-gallery > ul > li a:hover > img {
              -webkit-transform: scale3d(1.1, 1.1, 1.1);
              transform: scale3d(1.1, 1.1, 1.1);
            }
            .demo-gallery > ul > li a:hover .demo-gallery-poster > img {
              opacity: 1;
            }
            .demo-gallery > ul > li a .demo-gallery-poster {
              background-color: rgba(0, 0, 0, 0.1);
              bottom: 0;
              left: 0;
              position: absolute;
              right: 0;
              top: 0;
              -webkit-transition: background-color 0.15s ease 0s;
              -o-transition: background-color 0.15s ease 0s;
              transition: background-color 0.15s ease 0s;
            }
            .demo-gallery > ul > li a .demo-gallery-poster > img {
              left: 50%;
              margin-left: -10px;
              margin-top: -10px;
              opacity: 0;
              position: absolute;
              top: 50%;
              -webkit-transition: opacity 0.3s ease 0s;
              -o-transition: opacity 0.3s ease 0s;
              transition: opacity 0.3s ease 0s;
            }
            .demo-gallery > ul > li a:hover .demo-gallery-poster {
              background-color: rgba(0, 0, 0, 0.5);
            }
            .demo-gallery .justified-gallery > a > img {
              -webkit-transition: -webkit-transform 0.15s ease 0s;
              -moz-transition: -moz-transform 0.15s ease 0s;
              -o-transition: -o-transform 0.15s ease 0s;
              transition: transform 0.15s ease 0s;
              -webkit-transform: scale3d(1, 1, 1);
              transform: scale3d(1, 1, 1);
              height: 100%;
              width: 100%;
            }
            .demo-gallery .justified-gallery > a:hover > img {
              -webkit-transform: scale3d(1.1, 1.1, 1.1);
              transform: scale3d(1.1, 1.1, 1.1);
            }
            .demo-gallery .justified-gallery > a:hover .demo-gallery-poster > img {
              opacity: 1;
            }
            .demo-gallery .justified-gallery > a .demo-gallery-poster {
              background-color: rgba(0, 0, 0, 0.1);
              bottom: 0;
              left: 0;
              position: absolute;
              right: 0;
              top: 0;
              -webkit-transition: background-color 0.15s ease 0s;
              -o-transition: background-color 0.15s ease 0s;
              transition: background-color 0.15s ease 0s;
            }
            .demo-gallery .justified-gallery > a .demo-gallery-poster > img {
              left: 50%;
              margin-left: -10px;
              margin-top: -10px;
              opacity: 0;
              position: absolute;
              top: 50%;
              -webkit-transition: opacity 0.3s ease 0s;
              -o-transition: opacity 0.3s ease 0s;
              transition: opacity 0.3s ease 0s;
            }
            .demo-gallery .justified-gallery > a:hover .demo-gallery-poster {
              background-color: rgba(0, 0, 0, 0.5);
            }
            .demo-gallery .video .demo-gallery-poster img {
              height: 48px;
              margin-left: -24px;
              margin-top: -24px;
              opacity: 0.8;
              width: 48px;
            }
            .demo-gallery.dark > ul > li a {
              border: 3px solid #04070a;
            }
            .home .demo-gallery {
              padding-bottom: 80px;
            }
        </style>
		<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
		  
		<div class="row">
		<div class="clearfix"></div><br>
			<label class="col-md-4">&nbsp;&nbsp;&nbsp;APAR REPORT :</label>
			<div class="clearfix"></div><br>
					<div class="col-md-8">
					<div class='demo-gallery'>
						<ul id='lightgallery' class='list-unstyled row'>
					
					<?php 
					
					{
					$sqlEAPAR=mysql_query("select * from scanned_img where empid='$emp_id' ");
							while($rwEAPAR=mysql_fetch_array($sqlEAPAR,MYSQL_ASSOC))
						{
						
							$imgid=$rwEAPAR["empid"];
							$file=$rwEAPAR["image"];
							$fileyear=$rwEAPAR["year"];
							//$file=$rwEAPAR["empname"];
							//echo $file;
						if($file!="")
						{
						
						?>
						
			<?php 			
							echo"<li class='col-xs-6 col-sm-4 col-md-3' data-responsive='../resources/NAME_PFNO/$emp_id/$fileyear/$file' data-src='../resources/NAME_PFNO/$emp_id/$fileyear/$file'>
							<a href='../resources/NAME_PFNO/$emp_id/$fileyear/$file'>
							<img src='../resources/NAME_PFNO/$emp_id/$fileyear/$file' style='width:250px;height:250px;' alt='$fileyear'>
							</a><!--a href='../Ajaxdelete.php?empid=".$emp_id."&year=".$fileyear."&image=".$file."' class='btn btn-primary btn-flat btn-sm'><i class='fa fa-trash'></i> DELETE $fileyear</a-->$fileyear</li>"; 
							
			?>
		   
					  
				 <?php
						}else
						{
							$file="";
						}
						
						}
					}
						?>
				
						 </ul>
					   </div>
					<br>
					</div>
		</div>
					
    <script type="text/javascript">
        $(document).ready(function(){
            $('#lightgallery').lightGallery();
        });
        </script>
        <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
        <script src="demo/js/lightgallery.js"></script>
        <script src="demo/js/lg-fullscreen.js"></script>
        <script src="demo/js/lg-thumbnail.js"></script>
        <script src="demo/js/lg-video.js"></script>
        <script src="demo/js/lg-autoplay.js"></script>
        <script src="demo/js/lg-zoom.js"></script>
        <script src="demo/js/lg-hash.js"></script>
        <script src="demo/js/lg-pager.js"></script>
        <script src="demo/js/jquery.mousewheel.min.js"></script>	