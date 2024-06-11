/*!
 * Remark (http://getbootstrapadmin.com/remark)
 * Copyright 2017 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */

!function(global,factory){if("function"==typeof define&&define.amd)define("/Plugin/responsive-tabs",["exports","jquery"],factory);else if("undefined"!=typeof exports)factory(exports,require("jquery"));else{var mod={exports:{}};factory(mod.exports,global.jQuery),global.PluginResponsiveTabs=mod.exports}}(this,function(exports,_jquery){"use strict";Object.defineProperty(exports,"__esModule",{value:!0});var _jquery2=babelHelpers.interopRequireDefault(_jquery),pluginName="responsiveHorizontalTabs",defaults={navSelector:".nav-tabs",itemSelector:".nav-item",dropdownSelector:">.dropdown",dropdownItemSelector:".dropdown-item",tabSelector:".tab-pane",activeClassName:"active"},responsiveHorizontalTabs=function(){function responsiveHorizontalTabs(el,options){babelHelpers.classCallCheck(this,responsiveHorizontalTabs);var $tabs=this.$tabs=(0,_jquery2.default)(el);this.options=options=_jquery2.default.extend(!0,{},defaults,options);var $nav=this.$nav=$tabs.find(this.options.navSelector),$dropdown=this.$dropdown=$nav.find(this.options.dropdownSelector),$items=this.$items=$nav.find(this.options.itemSelector).filter(function(){return!(0,_jquery2.default)(this).is($dropdown)});this.$dropdownItems=$dropdown.find(this.options.dropdownItemSelector),this.$tabPanel=this.$tabs.find(this.options.tabSelector),this.breakpoints=[],$items.each(function(){(0,_jquery2.default)(this).data("width",(0,_jquery2.default)(this).width())}),this.init(),this.bind()}return babelHelpers.createClass(responsiveHorizontalTabs,[{key:"init",value:function(){if(0!==this.$dropdown.length){this.$dropdown.show(),this.breakpoints=[];var length=this.length=this.$items.length,dropWidth=this.dropWidth=this.$dropdown.width(),total=0;if(this.flag=length,length<=1)this.$dropdown.hide();else{for(var i=0;i<length-2;i++)0===i?this.breakpoints.push(this.$items.eq(i).outerWidth()+dropWidth):this.breakpoints.push(this.breakpoints[i-1]+this.$items.eq(i).width());for(i=0;i<length;i++)total+=this.$items.eq(i).outerWidth();this.breakpoints.push(total),this.layout()}}}},{key:"layout",value:function(){if(!(this.breakpoints.length<=0)){for(var width=this.$nav.width(),i=0,activeClassName=this.options.activeClassName,active=this.$tabPanel.filter("."+activeClassName).index();i<this.breakpoints.length&&!(this.breakpoints[i]>width);i++);if(i!==this.flag){if(this.$items.children().removeClass(activeClassName),this.$dropdownItems.removeClass(activeClassName),this.$dropdown.children().removeClass(activeClassName),i===this.breakpoints.length)this.$dropdown.hide(),this.$items.show(),this.$items.eq(active).children().addClass(activeClassName);else{this.$dropdown.show();for(var j=0;j<this.length;j++)j<i?(this.$items.eq(j).show(),this.$dropdownItems.eq(j).hide()):(this.$items.eq(j).hide(),this.$dropdownItems.eq(j).show());active<i?this.$items.eq(active).children().addClass(activeClassName):(this.$dropdown.children().addClass(activeClassName),this.$dropdownItems.eq(active).addClass(activeClassName))}this.flag=i}}}},{key:"bind",value:function(){var self=this;(0,_jquery2.default)(window).resize(function(){self.layout()})}}],[{key:"_jQueryInterface",value:function(options){for(var _len=arguments.length,args=Array(_len>1?_len-1:0),_key=1;_key<_len;_key++)args[_key-1]=arguments[_key];if("string"==typeof options){var method=options;return!/^\_/.test(method)&&this.each(function(){var api=_jquery2.default.data(this,pluginName);api&&"function"==typeof api[method]&&api[method].apply(api,args)})}return this.each(function(){_jquery2.default.data(this,pluginName)?_jquery2.default.data(this,pluginName).init():_jquery2.default.data(this,pluginName,new responsiveHorizontalTabs(this,options))})}}]),responsiveHorizontalTabs}();_jquery2.default.fn[pluginName]=responsiveHorizontalTabs._jQueryInterface,_jquery2.default.fn[pluginName].constructor=responsiveHorizontalTabs,_jquery2.default.fn[pluginName].noConflict=function(){return _jquery2.default.fn[pluginName]=window.JQUERY_NO_CONFLICT,responsiveHorizontalTabs._jQueryInterface},exports.default=responsiveHorizontalTabs});;;