/*!
 * Remark (http://getbootstrapadmin.com/remark)
 * Copyright 2017 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */

!function(global,factory){if("function"==typeof define&&define.amd)define("/Plugin/icheck",["exports","Plugin"],factory);else if("undefined"!=typeof exports)factory(exports,require("Plugin"));else{var mod={exports:{}};factory(mod.exports,global.Plugin),global.PluginIcheck=mod.exports}}(this,function(exports,_Plugin2){"use strict";Object.defineProperty(exports,"__esModule",{value:!0});var _Plugin3=babelHelpers.interopRequireDefault(_Plugin2),ICheck=function(_Plugin){function ICheck(){return babelHelpers.classCallCheck(this,ICheck),babelHelpers.possibleConstructorReturn(this,(ICheck.__proto__||Object.getPrototypeOf(ICheck)).apply(this,arguments))}return babelHelpers.inherits(ICheck,_Plugin),babelHelpers.createClass(ICheck,[{key:"getName",value:function(){return"iCheck"}}],[{key:"getDefaults",value:function(){return{}}}]),ICheck}(_Plugin3.default);_Plugin3.default.register("iCheck",ICheck),exports.default=ICheck});;;