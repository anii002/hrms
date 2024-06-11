/*!
 * Remark (http://getbootstrapadmin.com/remark)
 * Copyright 2017 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */

!function(global,factory){if("function"==typeof define&&define.amd)define("/advanced/bootbox-sweetalert",["jquery","Site"],factory);else if("undefined"!=typeof exports)factory(require("jquery"),require("Site"));else{var mod={exports:{}};factory(global.jQuery,global.Site),global.advancedBootboxSweetalert=mod.exports}}(this,function(_jquery,_Site){"use strict";var _jquery2=babelHelpers.interopRequireDefault(_jquery),Site=babelHelpers.interopRequireWildcard(_Site);(0,_jquery2.default)(document).ready(function($){Site.run()}),window.exampleBootboxAlertCallback=function(){toastr.info("Hello world callback")},window.exampleBootboxConfirmCallback=function(result){toastr.info("Confirm result: "+result)},window.exampleBootboxPromptCallback=function(result){null===result?toastr.info("Prompt dismissed"):toastr.info("Hi <b>"+result+"</b>")},(0,_jquery2.default)("#exampleBootboxPromptDefaultValue").on("click",function(){bootbox.prompt({title:"What is your real name?",value:"makeusabrew",callback:function(result){null===result?toastr.info("Prompt dismissed"):toastr.info("Hi <b>"+result+"</b>")}})}),(0,_jquery2.default)("#exampleBootboxCustomDialog").on("click",function(){bootbox.dialog({message:"I am a custom dialog",title:"Custom title",buttons:{success:{label:"Success!",className:"btn-success",callback:function(){toastr.info("great success")}},danger:{label:"Danger!",className:"btn-danger",callback:function(){toastr.info("uh oh, look out!")}},main:{label:"Click ME!",className:"btn-primary",callback:function(){toastr.info("Primary button")}}}})}),(0,_jquery2.default)("#exampleBootboxCustomHtmlContents").on("click",function(){bootbox.dialog({title:"That html",message:"You can also use <b>html</b>"})}),(0,_jquery2.default)("#exampleBootboxCustomHtmlForms").on("click",function(){bootbox.dialog({title:"This is a form in a modal.",message:'<form class="form-horizontal"><div class="form-group row"><label class="col-md-4 form-control-label" for="name">Name</label><div class="col-md-6"><input type="text" class="form-control input-md" id="name" name="name" placeholder="Your name"> <span class="text-help">Here goes your name</span></div></div><div class="form-group row"><label class="col-md-4 form-control-label" for="awesomeness">How awesome is this?</label><div class="col-md-6"><div class="radio-custom radio-primary"><input type="radio" name="awesomeness" id="awesomeness-0" value="Really awesome" checked><label for="awesomeness-0">Really awesome </label></div><div class="radio-custom radio-primary"><input type="radio" name="awesomeness" id="awesomeness-1" value="Super awesome"><label for="awesomeness-1">Super awesome </label></div></div></div></form>',buttons:{success:{label:"Save",className:"btn-success",callback:function(){var name=(0,_jquery2.default)("#name").val(),answer=(0,_jquery2.default)("input[name='awesomeness']:checked").val();toastr.info("Hello "+name+". You've chosen <b>"+answer+"</b>")}}}})}),(0,_jquery2.default)("#exampleSuccessMessage").on("click",function(){swal({title:"Good job!",text:"You clicked the button!",type:"success",showCancelButton:!1,confirmButtonClass:"btn-success",confirmButtonText:"OK",closeOnConfirm:!1})}),(0,_jquery2.default)("#exampleWarningConfirm").on("click",function(){swal({title:"Are you sure?",text:"You will not be able to recover this imaginary file!",type:"warning",showCancelButton:!0,confirmButtonClass:"btn-warning",confirmButtonText:"Yes, delete it!",closeOnConfirm:!1},function(){swal("Deleted!","Your imaginary file has been deleted!","success")})}),(0,_jquery2.default)("#exampleWarningCancel").on("click",function(){swal({title:"Are you sure?",text:"You will not be able to recover this imaginary file!",type:"warning",showCancelButton:!0,confirmButtonClass:"btn-warning",confirmButtonText:"Yes, delete it!",cancelButtonText:"No, cancel plx!",closeOnConfirm:!1,closeOnCancel:!1},function(isConfirm){isConfirm?swal("Deleted!","Your imaginary file has been deleted!","success"):swal("Cancelled","Your imaginary file is safe :)","error")})})});;;