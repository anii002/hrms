<?php

	include('../dbconfig/dbcon.php');
	dbcon(); 
	
	
$emp_id = ($_REQUEST["empcode"] <> "") ? trim($_REQUEST["empcode"] ) : "";
$year = ($_REQUEST["txtyear"] <> "") ? trim($_REQUEST["txtyear"] ) : "";
//if ($emp_id <> "")
 //{
 
	$emp_id=$_POST["empcode"];
	$year=$_POST["txtyear"];
	//$employeeid=$_POST["empcode"];
	/* echo $emp_id." | ";
	echo $year;
    */    
	?>
	 <link href="css/lightgallery.css" rel="stylesheet" />
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
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		  
		<div class="row">
		<div class="clearfix"></div><br>
			<label class="col-md-4">&nbsp;&nbsp;&nbsp;APAR REPORT :</label>
			<div class="clearfix"></div><br>
					<div class="col-md-8">
					<div class="input-group">
					
						 <?php 
			
			{
						  // $sqlscapr=mysql_query("select * from tbl_employee where emplcode='$emp_id'");
						// while($rwYear=mysql_fetch_array($sqlscapr))
						// {
						// $rwempid=$rwYear["empid"];
						// $year=$rwYear["year"];
						//echo "$year";
						
						$sqlEAPAR=mysql_query("select * from scanned_img where empid='$emp_id' AND year='$year'");
							while($rwEAPAR=mysql_fetch_array($sqlEAPAR,MYSQL_ASSOC))
						{
						
							$file=$rwEAPAR["image"];
							//$file=$rwEAPAR["empname"];
							//echo $file;
						if($file!="")
						{
						
						?>
						<div class="demo-gallery">
            <ul id="lightgallery" class="list-unstyled row">
                <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="img/1-375.jpg 375, img/1-480.jpg 480, img/1.jpg 800" data-src="img/1-1600.jpg" data-sub-html="">
                    <a href="">
                        <img class="img-responsive" src="avatar5.png">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="img/2-375.jpg 375, img/2-480.jpg 480, img/2.jpg 800" data-src="img/2-1600.jpg" data-sub-html="">
                    <a href="">
                        <img class="img-responsive" src="avatar5.png">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="img/13-375.jpg 375, img/13-480.jpg 480, img/13.jpg 800" data-src="img/13-1600.jpg" data-sub-html="">
                    <a href="">
                        <img class="img-responsive" src="avatar5.png">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="img/4-375.jpg 375, img/4-480.jpg 480, img/4.jpg 800" data-src="img/4-1600.jpg" data-sub-html="">
                    <a href="avatar5.png">
                        <img class="img-responsive" src="avatar5.png">
                    </a>
                </li>
            </ul>
        </div>
						
						<?php echo "<a href='../resources/NAME_PFNO/$emp_id/$year/$file' target='_blank'> <img src='../resources/NAME_PFNO/$emp_id/$year/$file' style='width:250px;height:250px;' alt='Image Not Found'></a>";   ?>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<!--a href="../resources/NAME_PFNO/<?php print $rwEAPAR["image"]; ?>" target="_blank"> <img src="../resources/NAME_PFNO/<?php print $rwEAPAR["image"]; ?>" style="width:250px;height:250px;" alt="Image Not Found">&nbsp;&nbsp;&nbsp;</a-->
					 <?php
						}else
						{
							$file="";
						}
						}
			}
						?>
					</div><br>
					</div>
		</div>
					
    <script type="text/javascript">
        $(document).ready(function(){
            $('#lightgallery').lightGallery();
        });
        </script>
        <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
        <script src="js/lightgallery.js"></script>
        <script src="js/lg-fullscreen.js"></script>
        <script src="js/lg-thumbnail.js"></script>
        <script src="js/lg-video.js"></script>
        <script src="js/lg-autoplay.js"></script>
        <script src="js/lg-zoom.js"></script>
        <script src="js/lg-hash.js"></script>
        <script src="js/lg-pager.js"></script>
        <script src="../lib/jquery.mousewheel.min.js"></script>	
					
     
        <?php
   //}
?>