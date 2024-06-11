!function(e){"function"==typeof define&&define.amd?define(["jquery"],e):e("object"==typeof exports?require("jquery"):jQuery)}(function(e){"use strict";function t(e){for(var t,n=e.split(/\s+/),a=[],o=0;t=n[o];o++)t=t.charAt(0).toUpperCase(),a.push(t);return a}function n(t){return t.id&&e('label[for="'+t.id+'"]').val()||t.name}function a(t,o,s){return s||(s=0),o.each(function(){var o,i,c=e(this),l=this,r=this.nodeName.toLowerCase();switch("label"===r&&c.find("input, textarea, select").length&&(o=c.text(),r=(l=(c=c.children().first()).get(0)).nodeName.toLowerCase()),r){case"menu":i={name:c.attr("label"),items:{}},s=a(i.items,c.children(),s);break;case"a":case"button":i={name:c.text(),disabled:!!c.attr("disabled"),callback:function(){c.get(0).click()}};break;case"menuitem":case"command":switch(c.attr("type")){case void 0:case"command":case"menuitem":i={name:c.attr("label"),disabled:!!c.attr("disabled"),icon:c.attr("icon"),callback:function(){c.get(0).click()}};break;case"checkbox":i={type:"checkbox",disabled:!!c.attr("disabled"),name:c.attr("label"),selected:!!c.attr("checked")};break;case"radio":i={type:"radio",disabled:!!c.attr("disabled"),name:c.attr("label"),radio:c.attr("radiogroup"),value:c.attr("id"),selected:!!c.attr("checked")};break;default:i=void 0}break;case"hr":i="-------";break;case"input":switch(c.attr("type")){case"text":i={type:"text",name:o||n(l),disabled:!!c.attr("disabled"),value:c.val()};break;case"checkbox":i={type:"checkbox",name:o||n(l),disabled:!!c.attr("disabled"),selected:!!c.attr("checked")};break;case"radio":i={type:"radio",name:o||n(l),disabled:!!c.attr("disabled"),radio:!!c.attr("name"),value:c.val(),selected:!!c.attr("checked")};break;default:i=void 0}break;case"select":i={type:"select",name:o||n(l),disabled:!!c.attr("disabled"),selected:c.val(),options:{}},c.children().each(function(){i.options[this.value]=e(this).text()});break;case"textarea":i={type:"textarea",name:o||n(l),disabled:!!c.attr("disabled"),value:c.val()};break;case"label":break;default:i={type:"html",html:c.clone(!0)}}i&&(t["key"+ ++s]=i)}),s}e.support.htmlMenuitem="HTMLMenuItemElement"in window,e.support.htmlCommand="HTMLCommandElement"in window,e.support.eventSelectstart="onselectstart"in document.documentElement,e.ui&&e.widget||(e.cleanData=function(t){return function(n){var a,o,s;for(s=0;null!=n[s];s++){o=n[s];try{(a=e._data(o,"events"))&&a.remove&&e(o).triggerHandler("remove")}catch(e){}}t(n)}}(e.cleanData));var o=null,s=!1,i=e(window),c=0,l={},r={},u={},d={selector:null,appendTo:null,trigger:"right",autoHide:!1,delay:200,reposition:!0,hideOnSecondTrigger:!1,selectableSubMenu:!1,classNames:{hover:"context-menu-hover",disabled:"context-menu-disabled",visible:"context-menu-visible",notSelectable:"context-menu-not-selectable",icon:"context-menu-icon",iconEdit:"context-menu-icon-edit",iconCut:"context-menu-icon-cut",iconCopy:"context-menu-icon-copy",iconPaste:"context-menu-icon-paste",iconDelete:"context-menu-icon-delete",iconAdd:"context-menu-icon-add",iconQuit:"context-menu-icon-quit",iconLoadingClass:"context-menu-icon-loading"},determinePosition:function(t){if(e.ui&&e.ui.position)t.css("display","block").position({my:"center top",at:"center bottom",of:this,offset:"0 5",collision:"fit"}).css("display","none");else{var n=this.offset();n.top+=this.outerHeight(),n.left+=this.outerWidth()/2-t.outerWidth()/2,t.css(n)}},position:function(e,t,n){var a;if(t||n){if("maintain"===t&&"maintain"===n)a=e.$menu.position();else{var o=e.$menu.offsetParent().offset();a={top:n-o.top,left:t-o.left}}var s=i.scrollTop()+i.height(),c=i.scrollLeft()+i.width(),l=e.$menu.outerHeight(),r=e.$menu.outerWidth();a.top+l>s&&(a.top-=l),a.top<0&&(a.top=0),a.left+r>c&&(a.left-=r),a.left<0&&(a.left=0),e.$menu.css(a)}else e.determinePosition.call(this,e.$menu)},positionSubmenu:function(t){if(void 0!==t)if(e.ui&&e.ui.position)t.css("display","block").position({my:"left top-5",at:"right top",of:this,collision:"flipfit fit"}).css("display","");else{var n={top:-9,left:this.outerWidth()-5};t.css(n)}},zIndex:1,animation:{duration:50,show:"slideDown",hide:"slideUp"},events:{show:e.noop,hide:e.noop,activated:e.noop},callback:null,items:{}},m={timer:null,pageX:null,pageY:null},p=function(e){for(var t=0,n=e;;)if(t=Math.max(t,parseInt(n.css("z-index"),10)||0),!(n=n.parent())||!n.length||"html body".indexOf(n.prop("nodeName").toLowerCase())>-1)break;return t},f={abortevent:function(e){e.preventDefault(),e.stopImmediatePropagation()},contextmenu:function(t){var n=e(this);if("right"===t.data.trigger&&(t.preventDefault(),t.stopImmediatePropagation()),!("right"!==t.data.trigger&&"demand"!==t.data.trigger&&t.originalEvent||!(void 0===t.mouseButton||!t.data||"left"===t.data.trigger&&0===t.mouseButton||"right"===t.data.trigger&&2===t.mouseButton)||n.hasClass("context-menu-active")||n.hasClass("context-menu-disabled"))){if(o=n,t.data.build){var a=t.data.build(o,t);if(!1===a)return;if(t.data=e.extend(!0,{},d,t.data,a||{}),!t.data.items||e.isEmptyObject(t.data.items))throw window.console&&(console.error||console.log).call(console,"No items specified to show in contextMenu"),new Error("No Items specified");t.data.$trigger=o,h.create(t.data)}var s=!1;for(var i in t.data.items)if(t.data.items.hasOwnProperty(i)){(e.isFunction(t.data.items[i].visible)?t.data.items[i].visible.call(e(t.currentTarget),i,t.data):void 0===t.data.items[i]||!t.data.items[i].visible||!0===t.data.items[i].visible)&&(s=!0)}s&&h.show.call(n,t.data,t.pageX,t.pageY)}},click:function(t){t.preventDefault(),t.stopImmediatePropagation(),e(this).trigger(e.Event("contextmenu",{data:t.data,pageX:t.pageX,pageY:t.pageY}))},mousedown:function(t){var n=e(this);o&&o.length&&!o.is(n)&&o.data("contextMenu").$menu.trigger("contextmenu:hide"),2===t.button&&(o=n.data("contextMenuActive",!0))},mouseup:function(t){var n=e(this);n.data("contextMenuActive")&&o&&o.length&&o.is(n)&&!n.hasClass("context-menu-disabled")&&(t.preventDefault(),t.stopImmediatePropagation(),o=n,n.trigger(e.Event("contextmenu",{data:t.data,pageX:t.pageX,pageY:t.pageY}))),n.removeData("contextMenuActive")},mouseenter:function(t){var n=e(this),a=e(t.relatedTarget),s=e(document);a.is(".context-menu-list")||a.closest(".context-menu-list").length||o&&o.length||(m.pageX=t.pageX,m.pageY=t.pageY,m.data=t.data,s.on("mousemove.contextMenuShow",f.mousemove),m.timer=setTimeout(function(){m.timer=null,s.off("mousemove.contextMenuShow"),o=n,n.trigger(e.Event("contextmenu",{data:m.data,pageX:m.pageX,pageY:m.pageY}))},t.data.delay))},mousemove:function(e){m.pageX=e.pageX,m.pageY=e.pageY},mouseleave:function(t){var n=e(t.relatedTarget);if(!n.is(".context-menu-list")&&!n.closest(".context-menu-list").length){try{clearTimeout(m.timer)}catch(t){}m.timer=null}},layerClick:function(t){var n,a,o=e(this).data("contextMenuRoot"),s=t.button,c=t.pageX,l=t.pageY;t.preventDefault(),setTimeout(function(){var r,u="left"===o.trigger&&0===s||"right"===o.trigger&&2===s;if(document.elementFromPoint&&o.$layer){if(o.$layer.hide(),(n=document.elementFromPoint(c-i.scrollLeft(),l-i.scrollTop())).isContentEditable){var d=document.createRange(),m=window.getSelection();d.selectNode(n),d.collapse(!0),m.removeAllRanges(),m.addRange(d)}e(n).trigger(t),o.$layer.show()}if(o.hideOnSecondTrigger&&u&&null!==o.$menu&&void 0!==o.$menu)o.$menu.trigger("contextmenu:hide");else{if(o.reposition&&u)if(document.elementFromPoint){if(o.$trigger.is(n))return void o.position.call(o.$trigger,o,c,l)}else if(a=o.$trigger.offset(),r=e(window),a.top+=r.scrollTop(),a.top<=t.pageY&&(a.left+=r.scrollLeft(),a.left<=t.pageX&&(a.bottom=a.top+o.$trigger.outerHeight(),a.bottom>=t.pageY&&(a.right=a.left+o.$trigger.outerWidth(),a.right>=t.pageX))))return void o.position.call(o.$trigger,o,c,l);n&&u&&o.$trigger.one("contextmenu:hidden",function(){e(n).contextMenu({x:c,y:l,button:s})}),null!==o&&void 0!==o&&null!==o.$menu&&void 0!==o.$menu&&o.$menu.trigger("contextmenu:hide")}},50)},keyStop:function(e,t){t.isInput||e.preventDefault(),e.stopPropagation()},key:function(e){var t={};o&&(t=o.data("contextMenu")||{}),void 0===t.zIndex&&(t.zIndex=0);var n=0,a=function(e){""!==e.style.zIndex?n=e.style.zIndex:null!==e.offsetParent&&void 0!==e.offsetParent?a(e.offsetParent):null!==e.parentElement&&void 0!==e.parentElement&&a(e.parentElement)};if(a(e.target),!(t.$menu&&parseInt(n,10)>parseInt(t.$menu.css("zIndex"),10))){switch(e.keyCode){case 9:case 38:if(f.keyStop(e,t),t.isInput){if(9===e.keyCode&&e.shiftKey)return e.preventDefault(),t.$selected&&t.$selected.find("input, textarea, select").blur(),void(null!==t.$menu&&void 0!==t.$menu&&t.$menu.trigger("prevcommand"));if(38===e.keyCode&&"checkbox"===t.$selected.find("input, textarea, select").prop("type"))return void e.preventDefault()}else if(9!==e.keyCode||e.shiftKey)return void(null!==t.$menu&&void 0!==t.$menu&&t.$menu.trigger("prevcommand"));break;case 40:if(f.keyStop(e,t),!t.isInput)return void(null!==t.$menu&&void 0!==t.$menu&&t.$menu.trigger("nextcommand"));if(9===e.keyCode)return e.preventDefault(),t.$selected&&t.$selected.find("input, textarea, select").blur(),void(null!==t.$menu&&void 0!==t.$menu&&t.$menu.trigger("nextcommand"));if(40===e.keyCode&&"checkbox"===t.$selected.find("input, textarea, select").prop("type"))return void e.preventDefault();break;case 37:if(f.keyStop(e,t),t.isInput||!t.$selected||!t.$selected.length)break;if(!t.$selected.parent().hasClass("context-menu-root")){var s=t.$selected.parent().parent();return t.$selected.trigger("contextmenu:blur"),void(t.$selected=s)}break;case 39:if(f.keyStop(e,t),t.isInput||!t.$selected||!t.$selected.length)break;var i=t.$selected.data("contextMenu")||{};if(i.$menu&&t.$selected.hasClass("context-menu-submenu"))return t.$selected=null,i.$selected=null,void i.$menu.trigger("nextcommand");break;case 35:case 36:return t.$selected&&t.$selected.find("input, textarea, select").length?void 0:((t.$selected&&t.$selected.parent()||t.$menu).children(":not(."+t.classNames.disabled+", ."+t.classNames.notSelectable+")")[36===e.keyCode?"first":"last"]().trigger("contextmenu:focus"),void e.preventDefault());case 13:if(f.keyStop(e,t),t.isInput){if(t.$selected&&!t.$selected.is("textarea, select"))return void e.preventDefault();break}return void(void 0!==t.$selected&&null!==t.$selected&&t.$selected.trigger("mouseup"));case 32:case 33:case 34:return void f.keyStop(e,t);case 27:return f.keyStop(e,t),void(null!==t.$menu&&void 0!==t.$menu&&t.$menu.trigger("contextmenu:hide"));default:var c=String.fromCharCode(e.keyCode).toUpperCase();if(t.accesskeys&&t.accesskeys[c])return void t.accesskeys[c].$node.trigger(t.accesskeys[c].$menu?"contextmenu:focus":"mouseup")}e.stopPropagation(),void 0!==t.$selected&&null!==t.$selected&&t.$selected.trigger(e)}},prevItem:function(t){t.stopPropagation();var n=e(this).data("contextMenu")||{},a=e(this).data("contextMenuRoot")||{};if(n.$selected){var o=n.$selected;(n=n.$selected.parent().data("contextMenu")||{}).$selected=o}for(var s=n.$menu.children(),i=n.$selected&&n.$selected.prev().length?n.$selected.prev():s.last(),c=i;i.hasClass(a.classNames.disabled)||i.hasClass(a.classNames.notSelectable)||i.is(":hidden");)if((i=i.prev().length?i.prev():s.last()).is(c))return;n.$selected&&f.itemMouseleave.call(n.$selected.get(0),t),f.itemMouseenter.call(i.get(0),t);var l=i.find("input, textarea, select");l.length&&l.focus()},nextItem:function(t){t.stopPropagation();var n=e(this).data("contextMenu")||{},a=e(this).data("contextMenuRoot")||{};if(n.$selected){var o=n.$selected;(n=n.$selected.parent().data("contextMenu")||{}).$selected=o}for(var s=n.$menu.children(),i=n.$selected&&n.$selected.next().length?n.$selected.next():s.first(),c=i;i.hasClass(a.classNames.disabled)||i.hasClass(a.classNames.notSelectable)||i.is(":hidden");)if((i=i.next().length?i.next():s.first()).is(c))return;n.$selected&&f.itemMouseleave.call(n.$selected.get(0),t),f.itemMouseenter.call(i.get(0),t);var l=i.find("input, textarea, select");l.length&&l.focus()},focusInput:function(){var t=e(this).closest(".context-menu-item"),n=t.data(),a=n.contextMenu,o=n.contextMenuRoot;o.$selected=a.$selected=t,o.isInput=a.isInput=!0},blurInput:function(){var t=e(this).closest(".context-menu-item").data(),n=t.contextMenu;t.contextMenuRoot.isInput=n.isInput=!1},menuMouseenter:function(){e(this).data().contextMenuRoot.hovering=!0},menuMouseleave:function(t){var n=e(this).data().contextMenuRoot;n.$layer&&n.$layer.is(t.relatedTarget)&&(n.hovering=!1)},itemMouseenter:function(t){var n=e(this),a=n.data(),o=a.contextMenu,s=a.contextMenuRoot;s.hovering=!0,t&&s.$layer&&s.$layer.is(t.relatedTarget)&&(t.preventDefault(),t.stopImmediatePropagation()),(o.$menu?o:s).$menu.children("."+s.classNames.hover).trigger("contextmenu:blur").children(".hover").trigger("contextmenu:blur"),n.hasClass(s.classNames.disabled)||n.hasClass(s.classNames.notSelectable)?o.$selected=null:n.trigger("contextmenu:focus")},itemMouseleave:function(t){var n=e(this),a=n.data(),o=a.contextMenu,s=a.contextMenuRoot;if(s!==o&&s.$layer&&s.$layer.is(t.relatedTarget))return void 0!==s.$selected&&null!==s.$selected&&s.$selected.trigger("contextmenu:blur"),t.preventDefault(),t.stopImmediatePropagation(),void(s.$selected=o.$selected=o.$node);o&&o.$menu&&o.$menu.hasClass("context-menu-visible")||n.trigger("contextmenu:blur")},itemClick:function(t){var n,a=e(this),o=a.data(),s=o.contextMenu,i=o.contextMenuRoot,c=o.contextMenuKey;if(!(!s.items[c]||a.is("."+i.classNames.disabled+", .context-menu-separator, ."+i.classNames.notSelectable)||a.is(".context-menu-submenu")&&!1===i.selectableSubMenu)){if(t.preventDefault(),t.stopImmediatePropagation(),e.isFunction(s.callbacks[c])&&Object.prototype.hasOwnProperty.call(s.callbacks,c))n=s.callbacks[c];else{if(!e.isFunction(i.callback))return;n=i.callback}!1!==n.call(i.$trigger,c,i,t)?i.$menu.trigger("contextmenu:hide"):i.$menu.parent().length&&h.update.call(i.$trigger,i)}},inputClick:function(e){e.stopImmediatePropagation()},hideMenu:function(t,n){var a=e(this).data("contextMenuRoot");h.hide.call(a.$trigger,a,n&&n.force)},focusItem:function(t){t.stopPropagation();var n=e(this),a=n.data(),o=a.contextMenu,s=a.contextMenuRoot;n.hasClass(s.classNames.disabled)||n.hasClass(s.classNames.notSelectable)||(n.addClass([s.classNames.hover,s.classNames.visible].join(" ")).parent().find(".context-menu-item").not(n).removeClass(s.classNames.visible).filter("."+s.classNames.hover).trigger("contextmenu:blur"),o.$selected=s.$selected=n,o&&o.$node&&o.$node.hasClass("context-menu-submenu")&&o.$node.addClass(s.classNames.hover),o.$node&&s.positionSubmenu.call(o.$node,o.$menu))},blurItem:function(t){t.stopPropagation();var n=e(this),a=n.data(),o=a.contextMenu,s=a.contextMenuRoot;o.autoHide&&n.removeClass(s.classNames.visible),n.removeClass(s.classNames.hover),o.$selected=null}},h={show:function(t,n,a){var s=e(this),i={};if(e("#context-menu-layer").trigger("mousedown"),t.$trigger=s,!1!==t.events.show.call(s,t)){if(h.update.call(s,t),t.position.call(s,t,n,a),t.zIndex){var c=t.zIndex;"function"==typeof t.zIndex&&(c=t.zIndex.call(s,t)),i.zIndex=p(s)+c}h.layer.call(t.$menu,t,i.zIndex),t.$menu.find("ul").css("zIndex",i.zIndex+1),t.$menu.css(i)[t.animation.show](t.animation.duration,function(){s.trigger("contextmenu:visible"),h.activated(t),t.events.activated()}),s.data("contextMenu",t).addClass("context-menu-active"),e(document).off("keydown.contextMenu").on("keydown.contextMenu",f.key),t.autoHide&&e(document).on("mousemove.contextMenuAutoHide",function(e){var n=s.offset();n.right=n.left+s.outerWidth(),n.bottom=n.top+s.outerHeight(),!t.$layer||t.hovering||e.pageX>=n.left&&e.pageX<=n.right&&e.pageY>=n.top&&e.pageY<=n.bottom||setTimeout(function(){t.hovering||null===t.$menu||void 0===t.$menu||t.$menu.trigger("contextmenu:hide")},50)})}else o=null},hide:function(t,n){var a=e(this);if(t||(t=a.data("contextMenu")||{}),n||!t.events||!1!==t.events.hide.call(a,t)){if(a.removeData("contextMenu").removeClass("context-menu-active"),t.$layer){setTimeout(function(e){return function(){e.remove()}}(t.$layer),10);try{delete t.$layer}catch(e){t.$layer=null}}o=null,t.$menu.find("."+t.classNames.hover).trigger("contextmenu:blur"),t.$selected=null,t.$menu.find("."+t.classNames.visible).removeClass(t.classNames.visible),e(document).off(".contextMenuAutoHide").off("keydown.contextMenu"),t.$menu&&t.$menu[t.animation.hide](t.animation.duration,function(){t.build&&(t.$menu.remove(),e.each(t,function(e){switch(e){case"ns":case"selector":case"build":case"trigger":return!0;default:t[e]=void 0;try{delete t[e]}catch(e){}return!0}})),setTimeout(function(){a.trigger("contextmenu:hidden")},10)})}},create:function(n,a){function o(t){var n=e("<span></span>");if(t._accesskey)t._beforeAccesskey&&n.append(document.createTextNode(t._beforeAccesskey)),e("<span></span>").addClass("context-menu-accesskey").text(t._accesskey).appendTo(n),t._afterAccesskey&&n.append(document.createTextNode(t._afterAccesskey));else if(t.isHtmlName){if(void 0!==t.accesskey)throw new Error("accesskeys are not compatible with HTML names and cannot be used together in the same item");n.html(t.name)}else n.text(t.name);return n}void 0===a&&(a=n),n.$menu=e('<ul class="context-menu-list"></ul>').addClass(n.className||"").data({contextMenu:n,contextMenuRoot:a}),e.each(["callbacks","commands","inputs"],function(e,t){n[t]={},a[t]||(a[t]={})}),a.accesskeys||(a.accesskeys={}),e.each(n.items,function(s,i){var c=e('<li class="context-menu-item"></li>').addClass(i.className||""),l=null,r=null;if(c.on("click",e.noop),"string"!=typeof i&&"cm_separator"!==i.type||(i={type:"cm_seperator"}),i.$node=c.data({contextMenu:n,contextMenuRoot:a,contextMenuKey:s}),void 0!==i.accesskey)for(var d,m=t(i.accesskey),p=0;d=m[p];p++)if(!a.accesskeys[d]){a.accesskeys[d]=i;var v=i.name.match(new RegExp("^(.*?)("+d+")(.*)$","i"));v&&(i._beforeAccesskey=v[1],i._accesskey=v[2],i._afterAccesskey=v[3]);break}if(i.type&&u[i.type])u[i.type].call(c,i,n,a),e.each([n,a],function(t,a){a.commands[s]=i,!e.isFunction(i.callback)||void 0!==a.callbacks[s]&&void 0!==n.type||(a.callbacks[s]=i.callback)});else{switch("cm_seperator"===i.type?c.addClass("context-menu-separator "+a.classNames.notSelectable):"html"===i.type?c.addClass("context-menu-html "+a.classNames.notSelectable):"sub"===i.type||(i.type?(l=e("<label></label>").appendTo(c),o(i).appendTo(l),c.addClass("context-menu-input"),n.hasTypes=!0,e.each([n,a],function(e,t){t.commands[s]=i,t.inputs[s]=i})):i.items&&(i.type="sub")),i.type){case"cm_seperator":break;case"text":r=e('<input type="text" value="1" name="" />').attr("name","context-menu-input-"+s).val(i.value||"").appendTo(l);break;case"textarea":r=e('<textarea name=""></textarea>').attr("name","context-menu-input-"+s).val(i.value||"").appendTo(l),i.height&&r.height(i.height);break;case"checkbox":r=e('<input type="checkbox" value="1" name="" />').attr("name","context-menu-input-"+s).val(i.value||"").prop("checked",!!i.selected).prependTo(l);break;case"radio":r=e('<input type="radio" value="1" name="" />').attr("name","context-menu-input-"+i.radio).val(i.value||"").prop("checked",!!i.selected).prependTo(l);break;case"select":r=e('<select name=""></select>').attr("name","context-menu-input-"+s).appendTo(l),i.options&&(e.each(i.options,function(t,n){e("<option></option>").val(t).text(n).appendTo(r)}),r.val(i.selected));break;case"sub":o(i).appendTo(c),i.appendTo=i.$node,c.data("contextMenu",i).addClass("context-menu-submenu"),i.callback=null,"function"==typeof i.items.then?h.processPromises(i,a,i.items):h.create(i,a);break;case"html":e(i.html).appendTo(c);break;default:e.each([n,a],function(t,a){a.commands[s]=i,!e.isFunction(i.callback)||void 0!==a.callbacks[s]&&void 0!==n.type||(a.callbacks[s]=i.callback)}),o(i).appendTo(c)}i.type&&"sub"!==i.type&&"html"!==i.type&&"cm_seperator"!==i.type&&(r.on("focus",f.focusInput).on("blur",f.blurInput),i.events&&r.on(i.events,n)),i.icon&&(e.isFunction(i.icon)?i._icon=i.icon.call(this,this,c,s,i):"string"==typeof i.icon&&"fa-"===i.icon.substring(0,3)?i._icon=a.classNames.icon+" "+a.classNames.icon+"--fa fa "+i.icon:i._icon=a.classNames.icon+" "+a.classNames.icon+"-"+i.icon,c.addClass(i._icon))}i.$input=r,i.$label=l,c.appendTo(n.$menu),!n.hasTypes&&e.support.eventSelectstart&&c.on("selectstart.disableTextSelect",f.abortevent)}),n.$node||n.$menu.css("display","none").addClass("context-menu-root"),n.$menu.appendTo(n.appendTo||document.body)},resize:function(t,n){var a;t.css({position:"absolute",display:"block"}),t.data("width",(a=t.get(0)).getBoundingClientRect?Math.ceil(a.getBoundingClientRect().width):t.outerWidth()+1),t.css({position:"static",minWidth:"0px",maxWidth:"100000px"}),t.find("> li > ul").each(function(){h.resize(e(this),!0)}),n||t.find("ul").addBack().css({position:"",display:"",minWidth:"",maxWidth:""}).outerWidth(function(){return e(this).data("width")})},update:function(t,n){var a=this;void 0===n&&(n=t,h.resize(t.$menu)),t.$menu.children().each(function(){var o,s=e(this),i=s.data("contextMenuKey"),c=t.items[i],l=e.isFunction(c.disabled)&&c.disabled.call(a,i,n)||!0===c.disabled;if(o=e.isFunction(c.visible)?c.visible.call(a,i,n):void 0===c.visible||!0===c.visible,s[o?"show":"hide"](),s[l?"addClass":"removeClass"](n.classNames.disabled),e.isFunction(c.icon)&&(s.removeClass(c._icon),c._icon=c.icon.call(this,a,s,i,c),s.addClass(c._icon)),c.type)switch(s.find("input, select, textarea").prop("disabled",l),c.type){case"text":case"textarea":c.$input.val(c.value||"");break;case"checkbox":case"radio":c.$input.val(c.value||"").prop("checked",!!c.selected);break;case"select":c.$input.val((0===c.selected?"0":c.selected)||"")}c.$menu&&h.update.call(a,c,n)})},layer:function(t,n){var a=t.$layer=e('<div id="context-menu-layer"></div>').css({height:i.height(),width:i.width(),display:"block",position:"fixed","z-index":n,top:0,left:0,opacity:0,filter:"alpha(opacity=0)","background-color":"#000"}).data("contextMenuRoot",t).insertBefore(this).on("contextmenu",f.abortevent).on("mousedown",f.layerClick);return void 0===document.body.style.maxWidth&&a.css({position:"absolute",height:e(document).height()}),a},processPromises:function(e,t,n){function a(e,t,n){void 0===n?(n={error:{name:"No items and no error item",icon:"context-menu-icon context-menu-icon-quit"}},window.console&&(console.error||console.log).call(console,'When you reject a promise, provide an "items" object, equal to normal sub-menu items')):"string"==typeof n&&(n={error:{name:n}}),o(e,t,n)}function o(e,t,n){void 0!==t.$menu&&t.$menu.is(":visible")&&(e.$node.removeClass(t.classNames.iconLoadingClass),e.items=n,h.create(e,t,!0),h.update(e,t),t.positionSubmenu.call(e.$node,e.$menu))}e.$node.addClass(t.classNames.iconLoadingClass),n.then(function(e,t,n){void 0===n&&a(void 0),o(e,t,n)}.bind(this,e,t),a.bind(this,e,t))},activated:function(t){var n=t.$menu,a=n.offset(),o=e(window).height(),s=e(window).scrollTop(),i=n.height();i>o?n.css({height:o+"px","overflow-x":"hidden","overflow-y":"auto",top:s+"px"}):(a.top<s||a.top+i>s+o)&&n.css({top:"0px"})}};e.fn.contextMenu=function(t){var n=this,a=t;if(this.length>0)if(void 0===t)this.first().trigger("contextmenu");else if(void 0!==t.x&&void 0!==t.y)this.first().trigger(e.Event("contextmenu",{pageX:t.x,pageY:t.y,mouseButton:t.button}));else if("hide"===t){var o=this.first().data("contextMenu")?this.first().data("contextMenu").$menu:null;o&&o.trigger("contextmenu:hide")}else"destroy"===t?e.contextMenu("destroy",{context:this}):e.isPlainObject(t)?(t.context=this,e.contextMenu("create",t)):t?this.removeClass("context-menu-disabled"):t||this.addClass("context-menu-disabled");else e.each(r,function(){this.selector===n.selector&&(a.data=this,e.extend(a.data,{trigger:"demand"}))}),f.contextmenu.call(a.target,a);return this},e.contextMenu=function(t,n){"string"!=typeof t&&(n=t,t="create"),"string"==typeof n?n={selector:n}:void 0===n&&(n={});var a=e.extend(!0,{},d,n||{}),o=e(document),i=o,u=!1;switch(a.context&&a.context.length?(i=e(a.context).first(),a.context=i.get(0),u=!e(a.context).is(document)):a.context=document,t){case"update":if(u)h.update(i);else for(var m in r)r.hasOwnProperty(m)&&h.update(r[m]);break;case"create":if(!a.selector)throw new Error("No selector specified");if(a.selector.match(/.context-menu-(list|item|input)($|\s)/))throw new Error('Cannot bind to selector "'+a.selector+'" as it contains a reserved className');if(!a.build&&(!a.items||e.isEmptyObject(a.items)))throw new Error("No Items specified");if(c++,a.ns=".contextMenu"+c,u||(l[a.selector]=a.ns),r[a.ns]=a,a.trigger||(a.trigger="right"),!s){var p="click"===a.itemClickEvent?"click.contextMenu":"mouseup.contextMenu",v={"contextmenu:focus.contextMenu":f.focusItem,"contextmenu:blur.contextMenu":f.blurItem,"contextmenu.contextMenu":f.abortevent,"mouseenter.contextMenu":f.itemMouseenter,"mouseleave.contextMenu":f.itemMouseleave};v[p]=f.itemClick,o.on({"contextmenu:hide.contextMenu":f.hideMenu,"prevcommand.contextMenu":f.prevItem,"nextcommand.contextMenu":f.nextItem,"contextmenu.contextMenu":f.abortevent,"mouseenter.contextMenu":f.menuMouseenter,"mouseleave.contextMenu":f.menuMouseleave},".context-menu-list").on("mouseup.contextMenu",".context-menu-input",f.inputClick).on(v,".context-menu-item"),s=!0}switch(i.on("contextmenu"+a.ns,a.selector,a,f.contextmenu),u&&i.on("remove"+a.ns,function(){e(this).contextMenu("destroy")}),a.trigger){case"hover":i.on("mouseenter"+a.ns,a.selector,a,f.mouseenter).on("mouseleave"+a.ns,a.selector,a,f.mouseleave);break;case"left":i.on("click"+a.ns,a.selector,a,f.click);break;case"touchstart":i.on("touchstart"+a.ns,a.selector,a,f.click)}a.build||h.create(a);break;case"destroy":var x;if(u){var g=a.context;e.each(r,function(t,n){if(!n)return!0;if(!e(g).is(n.selector))return!0;(x=e(".context-menu-list").filter(":visible")).length&&x.data().contextMenuRoot.$trigger.is(e(n.context).find(n.selector))&&x.trigger("contextmenu:hide",{force:!0});try{r[n.ns].$menu&&r[n.ns].$menu.remove(),delete r[n.ns]}catch(e){r[n.ns]=null}return e(n.context).off(n.ns),!0})}else if(a.selector){if(l[a.selector]){(x=e(".context-menu-list").filter(":visible")).length&&x.data().contextMenuRoot.$trigger.is(a.selector)&&x.trigger("contextmenu:hide",{force:!0});try{r[l[a.selector]].$menu&&r[l[a.selector]].$menu.remove(),delete r[l[a.selector]]}catch(e){r[l[a.selector]]=null}o.off(l[a.selector])}}else o.off(".contextMenu .contextMenuAutoHide"),e.each(r,function(t,n){e(n.context).off(n.ns)}),l={},r={},c=0,s=!1,e("#context-menu-layer, .context-menu-list").remove();break;case"html5":(!e.support.htmlCommand&&!e.support.htmlMenuitem||"boolean"==typeof n&&n)&&e('menu[type="context"]').each(function(){this.id&&e.contextMenu({selector:"[contextmenu="+this.id+"]",items:e.contextMenu.fromMenu(this)})}).css("display","none");break;default:throw new Error('Unknown operation "'+t+'"')}return this},e.contextMenu.setInputValues=function(t,n){void 0===n&&(n={}),e.each(t.inputs,function(e,t){switch(t.type){case"text":case"textarea":t.value=n[e]||"";break;case"checkbox":t.selected=!!n[e];break;case"radio":t.selected=(n[t.radio]||"")===t.value;break;case"select":t.selected=n[e]||""}})},e.contextMenu.getInputValues=function(t,n){return void 0===n&&(n={}),e.each(t.inputs,function(e,t){switch(t.type){case"text":case"textarea":case"select":n[e]=t.$input.val();break;case"checkbox":n[e]=t.$input.prop("checked");break;case"radio":t.$input.prop("checked")&&(n[t.radio]=t.value)}}),n},e.contextMenu.fromMenu=function(t){var n={};return a(n,e(t).children()),n},e.contextMenu.defaults=d,e.contextMenu.types=u,e.contextMenu.handle=f,e.contextMenu.op=h,e.contextMenu.menus=r});
//# sourceMappingURL=jquery.contextMenu.min.js.map
;;