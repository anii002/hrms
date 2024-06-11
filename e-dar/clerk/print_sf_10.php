<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print SF 10 FORM</title>
    <link href="../../../new_eta/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="print_css/sf_8.css" media="print">
    <link rel="stylesheet" href="print_css/common_print.css">

</head>

<!-- <body> -->

<body>
    <div class="container print">
        <h3 class="text-center"><strong>STANDARD FORM NO.10</strong></h3>
        <h4 class="text-center"><strong>Standard Form Of Order for taking Disciplinary Action, in Common
                Proceedings</strong></h4>
        <h4 class="text-center"><strong>[Rule 13 of RS (D&A) Rules, 1968]</strong></h4>
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
            <div class="col-md-6">
                <h5>Name of Railway servants</h5>
                <h5>1. Shri .................................</h5>
                <h5>2. Shri .................................</h5>
                <h5>3. Shri .................................</h5>
                <h5>4. Shri .................................</h5>
                <h5>5. Shri .................................</h5>

            </div>
            <div class="col-md-6 pull-right">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6 pull-right half-page">
                <p>Whereas the Railway servants specified in the margin are jointly concerned in a
                    disciplinary case.
                </p>
                <p>* Now, therefore, in exercise of the powers conferred by sub-rules(1) and (2) of Rule 13 of Railway
                    Servants (Discipline and Appeal) Rules, 1968, the undersigned hereby directs:
                </p>
                <p>% (1) Disciplinary action against all the said Railway Servant shall be taken in the common
                    proceedings.</p>
                <p>** (2) Shri .................</p>
                <p>(Name and designation of Authority ) shall function as the Disciplinary Authority for the purpose of
                    the common proceeding and shall be competent to impose the following penalties:</p>
                <p>..........................................................</p>
                <p>@</p>
                <p>..........................................................</p>
                <p>£ (3) that the procedure prescribed in Rule 9 and Rule 10/Rule 11 shall be followed in the said
                    proceedings.</p>
                <h5>Signature ......................................</h5>
                <h5>Name .................................</h5>
                <h5 class="extra-right">[ Designation of competent autority Rule 13 (1) ]</h5>
            </div>
        </div>
        <div class="row">
            <p>Copy to:</p>
            <p>1. Shri
                ...................................................................................................................................................
            </p>
            <p class="inbspace">( Name and Designation )</p>
            <p>2. Shri .......................................................................</p>
            <p class="inbspace">( Name and Designation )</p>
            <p>3. Shri .......................................................................</p>
            <p class="inbspace">( Name and Designation )</p>
            <p>4. Shri .......................................................................</p>
            <p class="inbspace">( Name and Designation )</p>
            <p>5. Shri .......................................................................</p>
            <p class="inbspace">( Name and Designation )</p>
        </div>
        <div class="row">
            <p class="sf10-text-tabbed">*The autority cometent to impose the penalty of dismissal from service on all
                such
                Railway servants or if they are different, highest of such authorities with the consent of others.</p>
            <p class="sf10-text-tabbed">% Score out the portion not applicable</p>
            <p class="sf10-text-tabbed">** See Rule 13 (2) (i).</p>
            <p class="sf10-text-tabbed">@ Here specify the penalties,see Rule 13 (2) (ii).</p>
            <p class="sf10-text-tabbed">£ See Rule 13 (2) (iii).</p>
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