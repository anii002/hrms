/**
* jQuery Selective v0.3.5
* https://github.com/amazingSurge/jquery-selective
*
* Copyright (c) amazingSurge
* Released under the LGPL-3.0 license
*/
!function(e,t){if("function"==typeof define&&define.amd)define(["jquery"],t);else if("undefined"!=typeof exports)t(require("jquery"));else{var i={exports:{}};t(e.jQuery),e.jquerySelectiveEs=i.exports}}(this,function(e){"use strict";function t(e){return e&&e.__esModule?e:{default:e}}function i(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}var n=t(e),s="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},a=function(){function e(e,t){for(var i=0;i<t.length;i++){var n=t[i];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}return function(t,i,n){return i&&e(t.prototype,i),n&&e(t,n),t}}(),o={namespace:"selective",buildFromHtml:!0,closeOnSelect:!1,local:null,selected:null,withSearch:!1,searchType:null,ajax:{work:!1,url:null,quietMills:null,loadMore:!1,pageSize:null},query:function(){},tpl:{frame:function(){return'<div class="'+this.namespace+'"><div class="'+this.namespace+'-trigger">'+this.options.tpl.triggerButton.call(this)+'<div class="'+this.namespace+'-trigger-dropdown"><div class="'+this.namespace+'-list-wrap">'+this.options.tpl.list.call(this)+"</div></div></div>"+this.options.tpl.items.call(this)+"</div>"},search:function(){return'<input class="'+this.namespace+'-search" type="text" placeholder="Search...">'},select:function(){return'<select class="'+this.namespace+'-select" name="'+this.namespace+'" multiple="multiple"></select>'},optionValue:function(e){return"name"in e?e.name:e},option:function(e){return'<option value="'+this.options.tpl.optionValue.call(this)+'">'+e+"</option>"},items:function(){return'<ul class="'+this.namespace+'-items"></ul>'},item:function(e){return'<li class="'+this.namespace+'-item">'+e+this.options.tpl.itemRemove.call(this)+"</li>"},itemRemove:function(){return'<span class="'+this.namespace+'-remove">x</span>'},triggerButton:function(){return'<div class="'+this.namespace+'-trigger-button">Add</div>'},list:function(){return'<ul class="'+this.namespace+'-list"></ul>'},listItem:function(e){return'<li class="'+this.namespace+'-list-item">'+e+"</li>"}},onBeforeShow:null,onAfterShow:null,onBeforeHide:null,onAfterHide:null,onBeforeSearch:null,onAfterSearch:null,onBeforeSelected:null,onAfterSelected:null,onBeforeUnselect:null,onAfterUnselect:null,onBeforeItemRemove:null,onAfterItemRemove:null,onBeforeItemAdd:null,onAfterItemAdd:null},c=function(){function e(t){i(this,e),this.instance=t}return a(e,[{key:"getOptions",value:function(){return this.instance.$options=this.instance.$select.find("option"),this.instance.$options}},{key:"select",value:function(e){return $(e).prop("selected",!0),this.instance}},{key:"unselect",value:function(e){return $(e).prop("selected",!1),this.instance}},{key:"add",value:function(e){if(this.instance.options.buildFromHtml===!1&&void 0===this.instance.getItem("option",this.instance.$select,this.instance.options.tpl.optionValue(e))){var t=$(this.instance.options.tpl.option.call(this.instance,e));return this.instance.setIndex(t,e),this.instance.$select.append(t),t}}},{key:"remove",value:function(e){return $(e).remove(),this.instance}}]),e}(),l=function(){function e(t){i(this,e),this.instance=t}return a(e,[{key:"build",value:function(e){var t=this,i=$("<ul></ul>"),n=this.instance._options.getOptions();return this.instance.options.buildFromHtml===!0?0!==n.length&&$.each(n,function(e,n){var s=$(t.instance.options.tpl.listItem.call(t.instance,n.text)),a=$(n);t.instance.setIndex(s,a),void 0!==a.attr("selected")&&t.instance.select(s),i.append(s)}):null!==e&&($.each(e,function(n){var s=$(t.instance.options.tpl.listItem.call(t.instance,e[n]));t.instance.setIndex(s,e[n]),i.append(s)}),0!==n.length&&$.each(n,function(e,n){var s=$(n),a=t.instance.getItem("li",i,t.instance.options.tpl.optionValue(s.data("selective_index")));void 0!==a&&t.instance._list.select(a)})),this.instance.$list.append(i.children("li")),this.instance}},{key:"buildSearch",value:function(){return this.instance.options.withSearch===!0&&(this.instance.$triggerDropdown.prepend(this.instance.options.tpl.search.call(this.instance)),this.instance.$search=this.instance.$triggerDropdown.find("."+this.instance.namespace+"-search")),this.instance}},{key:"select",value:function(e){return this.instance._trigger("beforeSelected"),$(e).addClass(this.instance.namespace+"-selected"),this.instance._trigger("afterSelected"),this.instance}},{key:"unselect",value:function(e){return this.instance._trigger("beforeUnselected"),$(e).removeClass(this.instance.namespace+"-selected"),this.instance._trigger("afterUnselected"),this.instance}},{key:"click",value:function(){var e=this;this.instance.$list.on("click","li",function(){var t=$(this);t.hasClass(e.instance.namespace+"-selected")||e.instance.select(t)})}},{key:"filter",value:function(e){return $.expr[":"].Contains=function(e,t,i){return jQuery(e).text().toUpperCase().includes(i[3].toUpperCase())},e?(this.instance.$list.find("li:not(:Contains("+e+"))").slideUp(),this.instance.$list.find("li:Contains("+e+")").slideDown()):this.instance.$list.children("li").slideDown(),this.instance}},{key:"loadMore",value:function(){var e=this,t=this.instance.options.ajax.pageSize||9999;return this.instance.$listWrap.on("scroll.selective",function(){if(t>e.instance.page){var i=e.instance.$list.outerHeight(!0),n=e.instance.$listWrap.outerHeight(),s=e.instance.$listWrap.scrollTop(),a=i-n-s;0===a&&e.instance.options.query(e.instance,e.instance.$search.val(),++e.instance.page)}}),this.instance}},{key:"loadMoreRemove",value:function(){return this.instance.$listWrap.off("scroll.selective"),this.instance}}]),e}(),r=function(){function e(t){i(this,e),this.instance=t}return a(e,[{key:"change",value:function(){var e=this;this.instance.$search.change(function(){e.instance._trigger("beforeSearch"),e.instance.options.buildFromHtml===!0?e.instance._list.filter(e.instance.$search.val()):""!==e.instance.$search.val()?(e.instance.page=1,e.instance.options.query(e.instance,e.instance.$search.val(),e.instance.page)):e.instance.update(e.instance.options.local),e.instance._trigger("afterSearch")})}},{key:"keyup",value:function(){var e=this,t=this.instance.options.ajax.quietMills||1e3,i="",n="",s=void 0;this.instance.$search.on("keyup",function(a){e.instance._trigger("beforeSearch"),n=e.instance.$search.val(),e.instance.options.buildFromHtml===!0?n!==i&&e.instance._list.filter(n):n===i&&13!==a.keyCode||(window.clearTimeout(s),s=window.setTimeout(function(){""!==n?(e.instance.page=1,e.instance.options.query(e.instance,n,e.instance.page)):e.instance.update(e.instance.options.local)},t)),i=n,e.instance._trigger("afterSearch")})}},{key:"bind",value:function(e){"change"===e?this.change():"keyup"===e&&this.keyup()}}]),e}(),u=function(){function e(t){i(this,e),this.instance=t}return a(e,[{key:"withDefaults",value:function(e){var t=this;null!==e&&$.each(e,function(i){t.instance._options.add(e[i]),t.instance._options.select(t.instance.getItem("option",t.instance.$select,t.instance.options.tpl.optionValue(e[i]))),t.instance._items.add(e[i])})}},{key:"add",value:function(e,t){var i=void 0,n=void 0;n=this.instance.options.buildFromHtml===!0?t:e,i=$(this.instance.options.tpl.item.call(this.instance,n)),this.instance.setIndex(i,e),this.instance.$items.append(i)}},{key:"remove",value:function(e){e=$(e);var t=void 0,i=void 0;return this.instance.options.buildFromHtml===!0?(this.instance._list.unselect(e.data("selective_index")),this.instance._options.unselect(e.data("selective_index").data("selective_index"))):(t=this.instance.getItem("li",this.instance.$list,this.instance.options.tpl.optionValue(e.data("selective_index"))),void 0!==t&&this.instance._list.unselect(t),i=this.instance.getItem("option",this.instance.$select,this.instance.options.tpl.optionValue(e.data("selective_index"))),this.instance._options.unselect(i)._options.remove(i)),e.remove(),this.instance}},{key:"click",value:function(){var e=this;this.instance.$items.on("click","."+this.instance.namespace+"-remove",function(){var t=$(this),i=t.parents("li");e.instance.itemRemove(i)})}}]),e}(),h="selective",p=function(){function e(t){var s=this,a=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};i(this,e),this.element=t,this.$element=(0,n.default)(t).hide()||(0,n.default)("<select></select>"),this.options=n.default.extend(!0,{},o,a),this.namespace=this.options.namespace;var c=(0,n.default)(this.options.tpl.frame.call(this)),l=function(){return s.$element.html(s.options.tpl.select.call(s)),s.$element.children("select")};this.$select=this.$element.is("select")===!0?this.$element:l(),this.$element.after(c),this.init(),this.opened=!1}return a(e,[{key:"init",value:function(){var e=this;this.$selective=this.$element.next("."+this.namespace),this.$items=this.$selective.find("."+this.namespace+"-items"),this.$trigger=this.$selective.find("."+this.namespace+"-trigger"),this.$triggerButton=this.$selective.find("."+this.namespace+"-trigger-button"),this.$triggerDropdown=this.$selective.find("."+this.namespace+"-trigger-dropdown"),this.$listWrap=this.$selective.find("."+this.namespace+"-list-wrap"),this.$list=this.$selective.find("."+this.namespace+"-list"),this._list=new l(this),this._options=new c(this),this._search=new r(this),this._items=new u(this),this._items.withDefaults(this.options.selected),this.update(this.options.local)._list.buildSearch(),this.$triggerButton.on("click",function(){e.opened===!1?e.show():e.hide()}),this._list.click(this),this._items.click(this),this.options.withSearch===!0&&this._search.bind(this.options.searchType),this._trigger("ready")}},{key:"_trigger",value:function(e){for(var t=arguments.length,i=Array(t>1?t-1:0),n=1;n<t;n++)i[n-1]=arguments[n];var s=[this].concat(i);this.$element.trigger(h+"::"+e,s),e=e.replace(/\b\w+\b/g,function(e){return e.substring(0,1).toUpperCase()+e.substring(1)});var a="on"+e;"function"==typeof this.options[a]&&this.options[a].apply(this,i)}},{key:"_show",value:function(){var e=this;return(0,n.default)(document).on("click.selective",function(t){e.options.closeOnSelect===!0?0===(0,n.default)(t.target).closest(e.$triggerButton).length&&0===(0,n.default)(t.target).closest(e.$search).length&&e._hide():0===(0,n.default)(t.target).closest(e.$trigger).length&&e._hide()}),this.$trigger.addClass(this.namespace+"-active"),this.opened=!0,this.options.ajax.loadMore===!0&&this._list.loadMore(),this}},{key:"_hide",value:function(){return(0,n.default)(document).off("click.selective"),this.$trigger.removeClass(this.namespace+"-active"),this.opened=!1,this.options.ajax.loadMore===!0&&this._list.loadMoreRemove(),this}},{key:"show",value:function(){return this._trigger("beforeShow"),this._show(),this._trigger("afterShow"),this}},{key:"hide",value:function(){return this._trigger("beforeHide"),this._hide(),this._trigger("afterHide"),this}},{key:"select",value:function(e){this._list.select(e);var t=e.data("selective_index");return this.options.buildFromHtml===!0?(this._options.select(t),this.itemAdd(e,t.text())):(this._options.add(t),this._options.select(this.getItem("option",this.$select,this.options.tpl.optionValue(t))),this.itemAdd(t)),this}},{key:"unselect",value:function(e){return this._list.unselect(e),this}},{key:"setIndex",value:function(e,t){return e.data("selective_index",t),this}},{key:"getItem",value:function(e,t,i){for(var n=t.children(e),s="",a=0;a<n.length;a++)this.options.tpl.optionValue(n.eq(a).data("selective_index"))===i&&(s=a);return""===s?void 0:n.eq(s)}},{key:"itemAdd",value:function(e,t){return this._trigger("beforeItemAdd"),this._items.add(e,t),this._trigger("afterItemAdd"),this}},{key:"itemRemove",value:function(e){return this._trigger("beforeItemRemove"),this._items.remove(e),this._trigger("afterItemRemove"),this}},{key:"optionAdd",value:function(e){return this._options.add(e),this}},{key:"optionRemove",value:function(e){return this._options.remove(e),this}},{key:"update",value:function(e){return this.$list.empty(),this.page=1,null!==e?this._list.build(e):this._list.build(),this}},{key:"destroy",value:function(){this.$selective.remove(),this.$element.show(),(0,n.default)(document).off("click.selective"),this._trigger("destroy")}}],[{key:"setDefaults",value:function(e){n.default.extend(!0,o,n.default.isPlainObject(e)&&e)}}]),e}(),d={version:"0.3.5"},f="selective",v=n.default.fn.selective,m=function(e){for(var t=this,i=arguments.length,a=Array(i>1?i-1:0),o=1;o<i;o++)a[o-1]=arguments[o];if("string"==typeof e){var c=function(){var i=e;if(/^_/.test(i))return{v:!1};if(!/^(get)/.test(i))return{v:t.each(function(){var e=n.default.data(this,f);e&&"function"==typeof e[i]&&e[i].apply(e,a)})};var s=t.first().data(f);return s&&"function"==typeof s[i]?{v:s[i].apply(s,a)}:void 0}();if("object"===("undefined"==typeof c?"undefined":s(c)))return c.v}return this.each(function(){(0,n.default)(this).data(f)||(0,n.default)(this).data(f,new p(this,e))})};n.default.fn.selective=m,n.default.selective=n.default.extend({setDefaults:p.setDefaults,noConflict:function(){return n.default.fn.selective=v,m}},d)});;;