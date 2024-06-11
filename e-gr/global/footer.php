  <!-- <footer class="footer-section background-dark">
      <div class="container">
          <div class="row">

              <div class="footer-header">
                  <div class="section-separator">
                      <div class="each-section col-sm-5 col-xs-12">
                          <p style="color:#FFF;font-size:14px;">&copy; SALGEM Infoigy Tech Pvt Ltd, All rights reserved.
                          </p>
                      </div>
                      <div class="each-section col-sm-1 col-xs-12">
                          <ul class="nav">
                              <li>
                                  <div class="li-inner">
                                      <ul class="nav social-icon">
                                          <li><a href="#" style="color:red;"><i class="icon icons8-facebook"></i></a>
                                          </li>
                                          <li><a href="#" style="color:red;"><i class="icon icons8-twitter"></i></a>
                                          </li>
                                      </ul>
                                  </div>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </footer> -->
  <footer>
      <div class="container">
          <div class="row">
              <div class="col-md-6 col-lg-6 col-sm-7">
                  <h5>© Copyright 2020 <a href="http://infoigy.com" target="_blank"> Salgem Infoigy Tech Pvt. Ltd. </a>All rights reserved.</h5>
              </div>
              <div class="col-md-6 col-lg-6 col-sm-5 socialmedia">
                  <ul class="text-right">
                      <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                      <!-- <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li> -->
                  </ul>
              </div>
          </div>
      </div>
  </footer>
  </div>


  <!-- SCRIPTS 
        ========================================-->
  <script src="js/plagin-js/jquery-1.11.3.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <!-- <script src="js/plagin-js/plagin.js"></script> -->

  <!-- Custom Script 
        ==========================================-->
  <!-- <script src="js/custom-scripts.js"></script> -->
  <script src="dist/js/custome.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
  <script>
$("#select_type").select2();
$("#emp_dept").select2();
$("#emp_desig").select2();
$("#pro_emp_type").select2();
$("#emp_station").select2();
$("#emp_office").select2();
  </script>
  
     <script type="text/javascript">
        function modu(modu_name)
        {
            $.ajax({
                url : '../../module.php',
                type : 'POST',
                data : {name:modu_name},
                success: function(data)
                {
                    //console.log(data);
                    $('#rad').html(data);
                    $('#mod').html(modu_name.toUpperCase());
                }
            });
        }
    </script>


  </body>

  </html>