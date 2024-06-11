<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print SF 8 FORM</title>
    <link href="../../../new_eta/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="print_css/sf_8.css" media="print">
    <link rel="stylesheet" href="print_css/common_print.css">

</head>

<!-- <body> -->

<body>
    <div class="container print">
        <h3 class="text-center"><strong>STANDARD FORM NO.8</strong></h3>
        <h4 class="text-center"><strong>Form for appointment of Presenting Officer</strong></h4>
        <h4 class="text-center"><strong>[Sub-rule (9) (iv) (c) of Rule 9 of RS (D&A) Rules, 1968]</strong></h4>
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
            <p class="text-tabbed">Whereas a inquiry under Rule 9 of the Railway Servants (Discipline and Appeal) Rules,
                1968 is being held against Shri..............
            </p>
            <p class="text-tabbed">And whereas the undersigned considers it necessary to appoint a person to present the
                case in support of the charges before the Inquiring Autority.
            </p>
            <p class="text-tabbed">Now, therefore, the undersigned in exercise of the powers conferred by Sub-rule 9(iv)
                (c) of Rule 9 of the RS (D&A) Rules, 1968 hereby appoints Shri................ as Presenting Officer to
                present the case in support of the charges before the Inquiring Autority.</p>
            <p class="text-tabbed">Shri.............. is also authorised to appoint, during his <b>temporary
                    non-availability</b> any other CBI/Railway Official not below his rank for representing the case
                before the Inquiry Officer on his behalf and on behalf of the disciplinary authority for examination,
                cross examination as well as the arguments etc.</p>
        </div>
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6 pull-right">
                <h5>Signature ......................................</h5>
                <h5>Name ...........................................</h5>
                <h5>(Designation of the Disciplinary Authority)</h5>
                <h5>Dated ...................................</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 pull-left">
                <h5>Copy forwarded for information to:</h5>
                <h5>Shri.............. </h5>
                <h5>(Name and designation of the Railway Servant)</h5>
            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6 pull-right">
                <h5>Signature ...................................</h5>
                <h5>Name ...................................</h5>
                <h5 class="text-center">(Designation)</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 pull-left">
                <h5>No ................................</h5>
                <h5>Copy forwarded for information to:</h5>
                <h5>1. Shri.............. </h5>
                <h5>(Name and designation of the Railway Servant)</h5>
                <h5>2. Shri.............. </h5>
                <h5>(Name and designation of the Railway Servant)</h5>
            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6 pull-right">
                <h5>Signature ...................................</h5>
                <h5>Name ...................................</h5>
                <h5 class="text-center">(Designation)</h5>
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