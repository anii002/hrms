/*!
 * Remark (http://getbootstrapadmin.com/remark)
 * Copyright 2017 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */

!function(global,factory){if("function"==typeof define&&define.amd)define("/Plugin/jquery-strength",["exports","Plugin"],factory);else if("undefined"!=typeof exports)factory(exports,require("Plugin"));else{var mod={exports:{}};factory(mod.exports,global.Plugin),global.PluginJqueryStrength=mod.exports}}(this,function(exports,_Plugin2){"use strict";Object.defineProperty(exports,"__esModule",{value:!0});var _Plugin3=babelHelpers.interopRequireDefault(_Plugin2),Strength=function(_Plugin){function Strength(){return babelHelpers.classCallCheck(this,Strength),babelHelpers.possibleConstructorReturn(this,(Strength.__proto__||Object.getPrototypeOf(Strength)).apply(this,arguments))}return babelHelpers.inherits(Strength,_Plugin),babelHelpers.createClass(Strength,[{key:"getName",value:function(){return"strength"}}],[{key:"getDefaults",value:function(){return{showMeter:!0,showToggle:!1,templates:{toggle:'<div class="checkbox-custom checkbox-primary show-password-wrap"><input type="checkbox" class="{toggleClass}" title="Show/Hide Password" id="show_password" /><label for="show_password">Show Password</label></div>',meter:'<div class="{meterClass}">{score}</div>',score:'<div class="{scoreClass}"></div>',main:'<div class="{containerClass}">{input}{meter}{toggle}</div>'},classes:{container:"strength-container",status:"strength-{status}",input:"strength-input",toggle:"strength-toggle",meter:"strength-meter",score:"strength-score"},scoreLables:{invalid:"Invalid",weak:"Weak",good:"Good",strong:"Strong"},scoreClasses:{invalid:"strength-invalid",weak:"strength-weak",good:"strength-good",strong:"strength-strong"}}}}]),Strength}(_Plugin3.default);_Plugin3.default.register("strength",Strength),exports.default=Strength});;;