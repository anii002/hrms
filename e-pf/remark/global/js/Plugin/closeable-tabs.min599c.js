/*!
 * Remark (http://getbootstrapadmin.com/remark)
 * Copyright 2017 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */

!function(global,factory){if("function"==typeof define&&define.amd)define("/Plugin/closeable-tabs",["exports","jquery"],factory);else if("undefined"!=typeof exports)factory(exports,require("jquery"));else{var mod={exports:{}};factory(mod.exports,global.jQuery),global.PluginCloseableTabs=mod.exports}}(this,function(exports,_jquery){"use strict";Object.defineProperty(exports,"__esModule",{value:!0});var _jquery2=babelHelpers.interopRequireDefault(_jquery),dismiss='[data-close="tab"]',TabClose=function(){function TabClose(el){babelHelpers.classCallCheck(this,TabClose),(0,_jquery2.default)(el).on("click",dismiss,this.close)}return babelHelpers.createClass(TabClose,[{key:"close",value:function(e){function removeElement(){$parent.detach().trigger("closed.bs.tab").remove(),$li.detach().remove()}var $toggle=(0,_jquery2.default)(this).closest('[data-toggle="tab"]'),selector=$toggle.data("target"),$li=$toggle.parent("li");if(selector||(selector=(selector=$toggle.attr("href"))&&selector.replace(/.*(?=#[^\s]*$)/,"")),$toggle.hasClass("active")){var $next=$li.siblings().eq(0).children('[data-toggle="tab"]');$next.length>0&&$next.tab().data("bs.tab").show()}var $parent=(0,_jquery2.default)(selector);e&&e.preventDefault(),$parent.trigger(e=_jquery2.default.Event("close.bs.tab")),e.isDefaultPrevented()||($parent.removeClass("in"),_jquery2.default.support.transition&&$parent.hasClass("fade")?$parent.one("bsTransitionEnd",removeElement).emulateTransitionEnd(TabClose.TRANSITION_DURATION):removeElement())}}],[{key:"_jQueryInterface",value:function(option){return this.each(function(){var $this=(0,_jquery2.default)(this),data=$this.data("bs.tab.close");data||$this.data("bs.tab.close",data=new TabClose(this)),"string"==typeof option&&data[option].call($this)})}}]),TabClose}();TabClose.TRANSITION_DURATION=150,_jquery2.default.fn.tabClose=TabClose._jQueryInterface,_jquery2.default.fn.tabClose.Constructor=TabClose,_jquery2.default.fn.tabClose.noConflict=function(){return _jquery2.default.fn.tabClose=window.JQUERY_NO_CONFLICT,asSelectable._jQueryInterface},(0,_jquery2.default)(document).on("click.bs.tab-close.data-api",dismiss,TabClose.prototype.close),exports.default=TabClose});;;