<?php

     if ($_SESSION['otp']==$ozotp){
            echo('<html>
         <body><h2>You\'ve been successfully verified your One-Time Password</h2></body>
        </html>');}
     
    else { echo('<html>
        <body><h2>Wrong Password!</h2></body>
        </html>');}
                          


?>