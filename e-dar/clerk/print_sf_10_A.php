<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print SF 10 A FORM</title>
    <link href="../../../new_eta/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="print_css/sf_8.css" media="print">
    <link rel="stylesheet" href="print_css/common_print.css">

</head>

<!-- <body> -->

<body>
    <div class="container print">
        <h3 class="text-center"><strong>STANDARD FORM NO.10-A</strong></h3>
        <h4 class="text-center"><strong>Standard Form for appointment of Enquiring Authority in common
                proceedings</strong></h4>
        <h4 class="text-center"><strong>[Rule 13 of RS (D&A) Rules, 1968]</strong></h4>
        <div class="row">
            <div class="col-md-6">
            </div>
            <div class="col-md-6 pull-right">
                <h5>No ......................................</h5>
                <h5>(Name of Railway Administration)</h5>
                <h5>Place of Issue ..........................</h5>
                <h5>Dated ...................................</h5>
            </div>
        </div>
        <div class="row">
            <h3 class="text-center"><b>ORDER</b></h3>
        </div>

        <div class="row">
            <p class="text-tabbed">WHEREAS the Railway servants specified in the margin are jointly concerned in a
                disciplinary case.
            </p>
            <p class="text-tabbed">WHEREAS common proceedings have been ordered against the said Railway servants in
                terms of Rule 13 of the Railway Servants ( Discipline and Appeal ) Rules, 1968 vide Order No
                .......................... dated .........................appointing............................(Name
                and Designation of the authority) to function as the disciplinary authority for the purpose of the
                common proceedings.
            </p>
            <p class="text-tabbed">WHEREAS an inquiry in accordance with Rule 9 and Rule 10 or Rule 11 of the Railway
                Servants (Disciplinary and Appeal) Rules, 1968 is being held against the Railway servants specified in
                the margin. </p>
            <p class="text-tabbed">AND WHEREAS the President/Railway Board/the undersigned considers that an Inquiring
                Officer should be appointed to inquire into the charges framed against the said Railway servants.
            </p>
            <p class="text-tabbed">NOW, THEREFORE, the *President/Railway Board/the undersigned in exercise of the
                powers conferred bu sub-rule 2 of Rule 9 of the Railway Servants ( Discipline and Appeal ) Rules ,1968
                hereby appoint(s) Shri ......................... (Name and designation of the Inquiry Officer) as the
                Inquiry Authority to inquire into the charges framed against the said Railway Servants.
            </p>
        </div>
        <div class="row">
            <div class="col-md-6"> * By order and in the name of President</div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p>To</p>
                <p>1.................. The accused</p>
                <p> Rly. servants</p>
                <p>2. Presenting Officer</p>
            </div>
            <div class="col-md-6 pull-right middel-page">
                <p>Disciplinary Authority / </p>
                <p>*Authority competent to authenticate </p>
                <p>order in the name of the Presidet/Secretary,</p>
                <p>Railway Board.</p>
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