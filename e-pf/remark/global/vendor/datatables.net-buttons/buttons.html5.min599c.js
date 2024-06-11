(function(j){"function"===typeof define&&define.amd?define(["jquery","datatables.net","datatables.net-buttons"],function(k){return j(k,window,document)}):"object"===typeof exports?module.exports=function(k,l,t,s){k||(k=window);if(!l||!l.fn.dataTable)l=require("datatables.net")(k,l).$;l.fn.dataTable.Buttons||require("datatables.net-buttons")(k,l);return j(l,k,k.document,t,s)}:j(jQuery,window,document)})(function(j,k,l,t,s,q){function x(a){for(var c="";0<=a;)c=String.fromCharCode(a%26+65)+c,a=Math.floor(a/
26)-1;return c}function y(a,c){u===q&&(u=-1===w.serializeToString(j.parseXML(z["xl/worksheets/sheet1.xml"])).indexOf("xmlns:r"));j.each(c,function(c,b){if(j.isPlainObject(b)){var e=a.folder(c);y(e,b)}else{if(u){var e=b.childNodes[0],f,g,n=[];for(f=e.attributes.length-1;0<=f;f--){g=e.attributes[f].nodeName;var h=e.attributes[f].nodeValue;-1!==g.indexOf(":")&&(n.push({name:g,value:h}),e.removeAttribute(g))}f=0;for(g=n.length;f<g;f++)h=b.createAttribute(n[f].name.replace(":","_dt_b_namespace_token_")),
h.value=n[f].value,e.setAttributeNode(h)}e=w.serializeToString(b);u&&(-1===e.indexOf("<?xml")&&(e='<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'+e),e=e.replace(/_dt_b_namespace_token_/g,":"));e=e.replace(/<([^<>]*?) xmlns=""([^<>]*?)>/g,"<$1 $2>");a.file(c,e)}})}function p(a,c,d){var b=a.createElement(c);d&&(d.attr&&j(b).attr(d.attr),d.children&&j.each(d.children,function(a,c){b.appendChild(c)}),null!==d.text&&d.text!==q&&b.appendChild(a.createTextNode(d.text)));return b}function J(a,c){var d=
a.header[c].length,b;a.footer&&a.footer[c].length>d&&(d=a.footer[c].length);for(var e=0,f=a.body.length;e<f;e++)if(b=a.body[e][c],b=null!==b&&b!==q?b.toString():"",-1!==b.indexOf("\n")?(b=b.split("\n"),b.sort(function(a,b){return b.length-a.length}),b=b[0].length):b=b.length,b>d&&(d=b),40<d)return 52;d*=1.3;return 6<d?d:6}var m=j.fn.dataTable,r;var h="undefined"!==typeof self&&self||"undefined"!==typeof k&&k||this.content;if("undefined"===typeof h||"undefined"!==typeof navigator&&/MSIE [1-9]\./.test(navigator.userAgent))r=
void 0;else{var v=h.document.createElementNS("http://www.w3.org/1999/xhtml","a"),K="download"in v,L=/constructor/i.test(h.HTMLElement)||h.safari,A=/CriOS\/[\d]+/.test(navigator.userAgent),M=function(a){(h.setImmediate||h.setTimeout)(function(){throw a;},0)},B=function(a){setTimeout(function(){"string"===typeof a?(h.URL||h.webkitURL||h).revokeObjectURL(a):a.remove()},4E4)},C=function(a){return/^\s*(?:text\/\S*|application\/xml|\S*\/\S*\+xml)\s*;.*charset\s*=\s*utf-8/i.test(a.type)?new Blob([String.fromCharCode(65279),
a],{type:a.type}):a},E=function(a,c,d){d||(a=C(a));var b=this,d="application/octet-stream"===a.type,e,f=function(){for(var a=["writestart","progress","write","writeend"],a=[].concat(a),c=a.length;c--;){var d=b["on"+a[c]];if("function"===typeof d)try{d.call(b,b)}catch(f){M(f)}}};b.readyState=b.INIT;if(K)e=(h.URL||h.webkitURL||h).createObjectURL(a),setTimeout(function(){v.href=e;v.download=c;var a=new MouseEvent("click");v.dispatchEvent(a);f();B(e);b.readyState=b.DONE});else if((A||d&&L)&&h.FileReader){var g=
new FileReader;g.onloadend=function(){var a=A?g.result:g.result.replace(/^data:[^;]*;/,"data:attachment/file;");h.open(a,"_blank")||(h.location.href=a);b.readyState=b.DONE;f()};g.readAsDataURL(a);b.readyState=b.INIT}else e||(e=(h.URL||h.webkitURL||h).createObjectURL(a)),d?h.location.href=e:h.open(e,"_blank")||(h.location.href=e),b.readyState=b.DONE,f(),B(e)},i=E.prototype;"undefined"!==typeof navigator&&navigator.msSaveOrOpenBlob?r=function(a,c,d){c=c||a.name||"download";d||(a=C(a));return navigator.msSaveOrOpenBlob(a,
c)}:(i.abort=function(){},i.readyState=i.INIT=0,i.WRITING=1,i.DONE=2,i.error=i.onwritestart=i.onprogress=i.onwrite=i.onabort=i.onerror=i.onwriteend=null,r=function(a,c,d){return new E(a,c||a.name||"download",d)})}m.fileSave=r;var N=function(a){var c="Sheet1";a.sheetName&&(c=a.sheetName.replace(/[\[\]\*\/\\\?\:]/g,""));return c},F=function(a){return a.newline?a.newline:navigator.userAgent.match(/Windows/)?"\r\n":"\n"},G=function(a,c){for(var d=F(c),b=a.buttons.exportData(c.exportOptions),e=c.fieldBoundary,
f=c.fieldSeparator,g=RegExp(e,"g"),n=c.escapeChar!==q?c.escapeChar:"\\",j=function(a){for(var b="",c=0,d=a.length;c<d;c++)0<c&&(b+=f),b+=e?e+(""+a[c]).replace(g,n+e)+e:a[c];return b},h=c.header?j(b.header)+d:"",k=c.footer&&b.footer?d+j(b.footer):"",l=[],o=0,i=b.body.length;o<i;o++)l.push(j(b.body[o]));return{str:h+l.join(d)+k,rows:l.length}},H=function(){if(!(-1!==navigator.userAgent.indexOf("Safari")&&-1===navigator.userAgent.indexOf("Chrome")&&-1===navigator.userAgent.indexOf("Opera")))return!1;
var a=navigator.userAgent.match(/AppleWebKit\/(\d+\.\d+)/);return a&&1<a.length&&603.1>1*a[1]?!0:!1};try{var w=new XMLSerializer,u}catch(O){}var z={"_rels/.rels":'<?xml version="1.0" encoding="UTF-8" standalone="yes"?><Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships"><Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument" Target="xl/workbook.xml"/></Relationships>',"xl/_rels/workbook.xml.rels":'<?xml version="1.0" encoding="UTF-8" standalone="yes"?><Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships"><Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/worksheet" Target="worksheets/sheet1.xml"/><Relationship Id="rId2" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/styles" Target="styles.xml"/></Relationships>',
"[Content_Types].xml":'<?xml version="1.0" encoding="UTF-8" standalone="yes"?><Types xmlns="http://schemas.openxmlformats.org/package/2006/content-types"><Default Extension="xml" ContentType="application/xml" /><Default Extension="rels" ContentType="application/vnd.openxmlformats-package.relationships+xml" /><Default Extension="jpeg" ContentType="image/jpeg" /><Override PartName="/xl/workbook.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet.main+xml" /><Override PartName="/xl/worksheets/sheet1.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.worksheet+xml" /><Override PartName="/xl/styles.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.styles+xml" /></Types>',
"xl/workbook.xml":'<?xml version="1.0" encoding="UTF-8" standalone="yes"?><workbook xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships"><fileVersion appName="xl" lastEdited="5" lowestEdited="5" rupBuild="24816"/><workbookPr showInkAnnotation="0" autoCompressPictures="0"/><bookViews><workbookView xWindow="0" yWindow="0" windowWidth="25600" windowHeight="19020" tabRatio="500"/></bookViews><sheets><sheet name="" sheetId="1" r:id="rId1"/></sheets></workbook>',
"xl/worksheets/sheet1.xml":'<?xml version="1.0" encoding="UTF-8" standalone="yes"?><worksheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships" xmlns:mc="http://schemas.openxmlformats.org/markup-compatibility/2006" mc:Ignorable="x14ac" xmlns:x14ac="http://schemas.microsoft.com/office/spreadsheetml/2009/9/ac"><sheetData/><mergeCells count="0"/></worksheet>',"xl/styles.xml":'<?xml version="1.0" encoding="UTF-8"?><styleSheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:mc="http://schemas.openxmlformats.org/markup-compatibility/2006" mc:Ignorable="x14ac" xmlns:x14ac="http://schemas.microsoft.com/office/spreadsheetml/2009/9/ac"><numFmts count="6"><numFmt numFmtId="164" formatCode="#,##0.00_- [$$-45C]"/><numFmt numFmtId="165" formatCode="&quot;£&quot;#,##0.00"/><numFmt numFmtId="166" formatCode="[$€-2] #,##0.00"/><numFmt numFmtId="167" formatCode="0.0%"/><numFmt numFmtId="168" formatCode="#,##0;(#,##0)"/><numFmt numFmtId="169" formatCode="#,##0.00;(#,##0.00)"/></numFmts><fonts count="5" x14ac:knownFonts="1"><font><sz val="11" /><name val="Calibri" /></font><font><sz val="11" /><name val="Calibri" /><color rgb="FFFFFFFF" /></font><font><sz val="11" /><name val="Calibri" /><b /></font><font><sz val="11" /><name val="Calibri" /><i /></font><font><sz val="11" /><name val="Calibri" /><u /></font></fonts><fills count="6"><fill><patternFill patternType="none" /></fill><fill/><fill><patternFill patternType="solid"><fgColor rgb="FFD9D9D9" /><bgColor indexed="64" /></patternFill></fill><fill><patternFill patternType="solid"><fgColor rgb="FFD99795" /><bgColor indexed="64" /></patternFill></fill><fill><patternFill patternType="solid"><fgColor rgb="ffc6efce" /><bgColor indexed="64" /></patternFill></fill><fill><patternFill patternType="solid"><fgColor rgb="ffc6cfef" /><bgColor indexed="64" /></patternFill></fill></fills><borders count="2"><border><left /><right /><top /><bottom /><diagonal /></border><border diagonalUp="false" diagonalDown="false"><left style="thin"><color auto="1" /></left><right style="thin"><color auto="1" /></right><top style="thin"><color auto="1" /></top><bottom style="thin"><color auto="1" /></bottom><diagonal /></border></borders><cellStyleXfs count="1"><xf numFmtId="0" fontId="0" fillId="0" borderId="0" /></cellStyleXfs><cellXfs count="67"><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="2" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="2" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="2" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="2" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="2" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="3" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="3" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="3" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="3" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="3" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="4" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="4" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="4" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="4" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="4" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="5" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="5" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="5" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="5" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="5" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="0" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="0" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="0" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="0" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="0" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="2" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="2" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="2" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="2" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="2" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="3" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="3" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="3" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="3" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="3" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="4" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="4" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="4" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="4" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="4" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="5" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="5" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="5" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="5" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="5" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1"><alignment horizontal="left"/></xf><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1"><alignment horizontal="center"/></xf><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1"><alignment horizontal="right"/></xf><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1"><alignment horizontal="fill"/></xf><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1"><alignment textRotation="90"/></xf><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1"><alignment wrapText="1"/></xf><xf numFmtId="9"   fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="164" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="165" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="166" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="167" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="168" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="169" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="3" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="4" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="1" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="2" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/></cellXfs><cellStyles count="1"><cellStyle name="Normal" xfId="0" builtinId="0" /></cellStyles><dxfs count="0" /><tableStyles count="0" defaultTableStyle="TableStyleMedium9" defaultPivotStyle="PivotStyleMedium4" /></styleSheet>'},
I=[{match:/^\-?\d+\.\d%$/,style:60,fmt:function(a){return a/100}},{match:/^\-?\d+\.?\d*%$/,style:56,fmt:function(a){return a/100}},{match:/^\-?\$[\d,]+.?\d*$/,style:57},{match:/^\-?£[\d,]+.?\d*$/,style:58},{match:/^\-?€[\d,]+.?\d*$/,style:59},{match:/^\-?\d+$/,style:65},{match:/^\-?\d+\.\d{2}$/,style:66},{match:/^\([\d,]+\)$/,style:61,fmt:function(a){return-1*a.replace(/[\(\)]/g,"")}},{match:/^\([\d,]+\.\d{2}\)$/,style:62,fmt:function(a){return-1*a.replace(/[\(\)]/g,"")}},{match:/^\-?[\d,]+$/,style:63},
{match:/^\-?[\d,]+\.\d{2}$/,style:64}];m.ext.buttons.copyHtml5={className:"buttons-copy buttons-html5",text:function(a){return a.i18n("buttons.copy","Copy")},action:function(a,c,d,b){this.processing(!0);var e=this,a=G(c,b),f=c.buttons.exportInfo(b),g=F(b),n=a.str,d=j("<div/>").css({height:1,width:1,overflow:"hidden",position:"fixed",top:0,left:0});f.title&&(n=f.title+g+g+n);f.messageTop&&(n=f.messageTop+g+g+n);f.messageBottom&&(n=n+g+g+f.messageBottom);b.customize&&(n=b.customize(n,b));b=j("<textarea readonly/>").val(n).appendTo(d);
if(l.queryCommandSupported("copy")){d.appendTo(c.table().container());b[0].focus();b[0].select();try{var h=l.execCommand("copy");d.remove();if(h){c.buttons.info(c.i18n("buttons.copyTitle","Copy to clipboard"),c.i18n("buttons.copySuccess",{1:"Copied one row to clipboard",_:"Copied %d rows to clipboard"},a.rows),2E3);this.processing(!1);return}}catch(k){}}h=j("<span>"+c.i18n("buttons.copyKeys","Press <i>ctrl</i> or <i>⌘</i> + <i>C</i> to copy the table data<br>to your system clipboard.<br><br>To cancel, click this message or press escape.")+
"</span>").append(d);c.buttons.info(c.i18n("buttons.copyTitle","Copy to clipboard"),h,0);b[0].focus();b[0].select();var D=j(h).closest(".dt-button-info"),i=function(){D.off("click.buttons-copy");j(l).off(".buttons-copy");c.buttons.info(!1)};D.on("click.buttons-copy",i);j(l).on("keydown.buttons-copy",function(a){27===a.keyCode&&(i(),e.processing(!1))}).on("copy.buttons-copy cut.buttons-copy",function(){i();e.processing(!1)})},exportOptions:{},fieldSeparator:"\t",fieldBoundary:"",header:!0,footer:!1,
title:"*",messageTop:"*",messageBottom:"*"};m.ext.buttons.csvHtml5={bom:!1,className:"buttons-csv buttons-html5",available:function(){return k.FileReader!==q&&k.Blob},text:function(a){return a.i18n("buttons.csv","CSV")},action:function(a,c,d,b){this.processing(!0);a=G(c,b).str;c=c.buttons.exportInfo(b);d=b.charset;b.customize&&(a=b.customize(a,b));!1!==d?(d||(d=l.characterSet||l.charset),d&&(d=";charset="+d)):d="";b.bom&&(a="﻿"+a);r(new Blob([a],{type:"text/csv"+d}),c.filename,!0);this.processing(!1)},
filename:"*",extension:".csv",exportOptions:{},fieldSeparator:",",fieldBoundary:'"',escapeChar:'"',charset:null,header:!0,footer:!1};m.ext.buttons.excelHtml5={className:"buttons-excel buttons-html5",available:function(){return k.FileReader!==q&&(t||k.JSZip)!==q&&!H()&&w},text:function(a){return a.i18n("buttons.excel","Excel")},action:function(a,c,d,b){this.processing(!0);var e=this,f=0,a=function(a){return j.parseXML(z[a])},g=a("xl/worksheets/sheet1.xml"),n=g.getElementsByTagName("sheetData")[0],
a={_rels:{".rels":a("_rels/.rels")},xl:{_rels:{"workbook.xml.rels":a("xl/_rels/workbook.xml.rels")},"workbook.xml":a("xl/workbook.xml"),"styles.xml":a("xl/styles.xml"),worksheets:{"sheet1.xml":g}},"[Content_Types].xml":a("[Content_Types].xml")},d=c.buttons.exportData(b.exportOptions),h,l,i=function(a){h=f+1;l=p(g,"row",{attr:{r:h}});for(var b=0,c=a.length;b<c;b++){var d=x(b)+""+h,e=null;if(!(null===a[b]||a[b]===q||""===a[b])){a[b]=j.trim(a[b]);for(var i=0,k=I.length;i<k;i++){var m=I[i];if(a[b].match&&
!a[b].match(/^0\d+/)&&a[b].match(m.match)){e=a[b].replace(/[^\d\.\-]/g,"");m.fmt&&(e=m.fmt(e));e=p(g,"c",{attr:{r:d,s:m.style},children:[p(g,"v",{text:e})]});break}}e||("number"===typeof a[b]||a[b].match&&a[b].match(/^-?\d+(\.\d+)?$/)&&!a[b].match(/^0\d+/)?e=p(g,"c",{attr:{t:"n",r:d},children:[p(g,"v",{text:a[b]})]}):(m=!a[b].replace?a[b]:a[b].replace(/[\x00-\x09\x0B\x0C\x0E-\x1F\x7F-\x9F]/g,""),e=p(g,"c",{attr:{t:"inlineStr",r:d},children:{row:p(g,"is",{children:{row:p(g,"t",{text:m})}})}})));l.appendChild(e)}}n.appendChild(l);
f++};j("sheets sheet",a.xl["workbook.xml"]).attr("name",N(b));b.customizeData&&b.customizeData(d);var m=function(a,b){var c=j("mergeCells",g);c[0].appendChild(p(g,"mergeCell",{attr:{ref:"A"+a+":"+x(b)+a}}));c.attr("count",c.attr("count")+1);j("row:eq("+(a-1)+") c",g).attr("s","51")},o=c.buttons.exportInfo(b);o.title&&(i([o.title],f),m(f,d.header.length-1));o.messageTop&&(i([o.messageTop],f),m(f,d.header.length-1));b.header&&(i(d.header,f),j("row:last c",g).attr("s","2"));for(var c=0,s=d.body.length;c<
s;c++)i(d.body[c],f);b.footer&&d.footer&&(i(d.footer,f),j("row:last c",g).attr("s","2"));o.messageBottom&&(i([o.messageBottom],f),m(f,d.header.length-1));c=p(g,"cols");j("worksheet",g).prepend(c);i=0;for(m=d.header.length;i<m;i++)c.appendChild(p(g,"col",{attr:{min:i+1,max:i+1,width:J(d,i),customWidth:1}}));b.customize&&b.customize(a);b=new (t||k.JSZip);d={type:"blob",mimeType:"application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"};y(b,a);b.generateAsync?b.generateAsync(d).then(function(a){r(a,
o.filename);e.processing(false)}):(r(b.generate(d),o.filename),this.processing(!1))},filename:"*",extension:".xlsx",exportOptions:{},header:!0,footer:!1,title:"*",messageTop:"*",messageBottom:"*"};m.ext.buttons.pdfHtml5={className:"buttons-pdf buttons-html5",available:function(){return k.FileReader!==q&&(s||k.pdfMake)},text:function(a){return a.i18n("buttons.pdf","PDF")},action:function(a,c,d,b){this.processing(!0);var e=this,a=c.buttons.exportData(b.exportOptions),f=c.buttons.exportInfo(b),c=[];
b.header&&c.push(j.map(a.header,function(a){return{text:"string"===typeof a?a:a+"",style:"tableHeader"}}));for(var g=0,d=a.body.length;g<d;g++)c.push(j.map(a.body[g],function(a){return{text:"string"===typeof a?a:a+"",style:g%2?"tableBodyEven":"tableBodyOdd"}}));b.footer&&a.footer&&c.push(j.map(a.footer,function(a){return{text:"string"===typeof a?a:a+"",style:"tableFooter"}}));c={pageSize:b.pageSize,pageOrientation:b.orientation,content:[{table:{headerRows:1,body:c},layout:"noBorders"}],styles:{tableHeader:{bold:!0,
fontSize:11,color:"white",fillColor:"#2d4154",alignment:"center"},tableBodyEven:{},tableBodyOdd:{fillColor:"#f3f3f3"},tableFooter:{bold:!0,fontSize:11,color:"white",fillColor:"#2d4154"},title:{alignment:"center",fontSize:15},message:{}},defaultStyle:{fontSize:10}};f.messageTop&&c.content.unshift({text:f.messageTop,style:"message",margin:[0,0,0,12]});f.messageBottom&&c.content.push({text:f.messageBottom,style:"message",margin:[0,0,0,12]});f.title&&c.content.unshift({text:f.title,style:"title",margin:[0,
0,0,12]});b.customize&&b.customize(c,b);c=(s||k.pdfMake).createPdf(c);"open"===b.download&&!H()?(c.open(),this.processing(!1)):c.getBuffer(function(a){a=new Blob([a],{type:"application/pdf"});r(a,f.filename);e.processing(!1)})},title:"*",filename:"*",extension:".pdf",exportOptions:{},orientation:"portrait",pageSize:"A4",header:!0,footer:!1,messageTop:"*",messageBottom:"*",customize:null,download:"download"};return m.Buttons});
;;