<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print SF 4 FORM</title>
    <link href="../../../new_eta/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="print_css/sf_4.css" media="print">
    <link rel="stylesheet" href="print_css/common_print.css">

</head>

<!-- <body> -->

<body>
    <div class="container print">
        <h3 class="text-center"><strong>STANDARD FORM NO.4</strong></h3>
        <h4 class="text-center"><strong>Standard Form for Order for Revocation of Suspension Order</strong></h4>
        <h4 class="text-center"><strong>[Rule 5(5) (c) of RS (D&A) Rules, 1968]</strong></h4>
        <div class="row">
            <div class="col-md-6">
            </div>
            <div class="col-md-6 pull-right">
                <h5>No ......................................</h5>
                <h5>Railway .................................</h5>
                <h5>Place of Issue ..........................</h5>
                <h5>Dated ...................................</h5>
            </div>
        </div>
        <div class="row">
            <h3 class="text-center"><b>ORDER</b></h3>
        </div>
        <div class="row">
            <p class="text-tabbed">Whereas the order placing Shri..............................................................................
            </p>
            <p class="sf4-text-tabbed1">(Name and Desigantion of the Railway servant.)
            </p>
            <p class="text-tabbed">under suspension was made/was deemed to have been made by .................................. on </p>
            <p class="sf4-text-tabbed2">....................................</p>
            <p class="text-tabbed">Now,therefore, the undersigned (the authority which made or is deemed to have made</p><p class="sf4-text-tabbed2">
                the order of suspension or any other authority to which that authority is subordinate) in</p>
                <p class="sf4-text-tabbed2">exercise of the powers conferred by Clause (c) of sub-rule (5) of Rule 5 of the RS (D&A)</p>
                <p class="sf4-text-tabbed2">Rule, 1968, hereby revokes the said order of suspension with immediate effect with effect </p>
            <p class="sf4-text-tabbed2">from ...........................................</p>
        </div>
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6 pull-right">
                <h5>Signature ......................................</h5>
                <h5>Name ............................................</h5>
                <h5> .......................................................</h5>
                <h5>(Designation of the authority making this order)</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 pull-left">
                <h5>Copy to:</h5>
                <h5>Shri..................... </h5>
                <h5>(Name and designation of the suspended Railway Servant)</h5>
            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="row">
        
            <div class="col-md-12 ">
                <h5>Address ...............................................................................................................</h5>
                <h5> ......................................................................................................................</h5>
                
            </div>
        </div>
        
        
    </div>
</body>
<script src="../../../new_eta/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript">
function windowClose() {
    window.open('', '_parent', '');
    window.close();
}

function closeMe() {
    // var win = window.open("", "_self"); /* url = “” or “about:blank”; target=”_self” */
    // win.close();
    // var customWindow = window.open('', '_blank', '');
    // customWindow.close();
    // var objWindow = window.open(location.href, "_self");
    // objWindow.close();
}
</script>
<script>
$(document).ready(function() {
    // alert("working");
    // window.print();
    // window.print();
    // closeMe();
    // close();
    // CheckWindowState();
});

$(document).on("ready", function(e) {
    e.preventDefault();
    console.log("w");
    closeMe();
});
// function CheckWindowState() {
//     if (document.readyState == "complete") {
//         window.close();
//     } else {
//         setTimeout("CheckWindowState()", 10)
//     }
// }
window.onafterprint = function() {
    console.log("Printing completed...");
    window.top.close();
}
// var mediaQueryList = window.matchMedia('print');
// mediaQueryList.addListener(function(mql) {
//     if (mql.matches) {
//         console.log('webkit equivalent of onbeforeprint');
//         // alert("working");
//     }
// });
</script>

</html>