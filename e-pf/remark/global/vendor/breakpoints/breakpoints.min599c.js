/**
* breakpoints-js v1.0.5
* https://github.com/amazingSurge/breakpoints-js
*
* Copyright (c) amazingSurge
* Released under the LGPL-3.0 license
*/
!function(t,n){if("function"==typeof define&&define.amd)define(["exports"],n);else if("undefined"!=typeof exports)n(exports);else{var e={exports:{}};n(e.exports),t.breakpointsEs=e.exports}}(this,function(t){"use strict";function n(t,n){if(!t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!n||"object"!=typeof n&&"function"!=typeof n?t:n}function e(t,n){if("function"!=typeof n&&null!==n)throw new TypeError("Super expression must either be null or a function, not "+typeof n);t.prototype=Object.create(n&&n.prototype,{constructor:{value:t,enumerable:!1,writable:!0,configurable:!0}}),n&&(Object.setPrototypeOf?Object.setPrototypeOf(t,n):t.__proto__=n)}function i(t,n){if(!(t instanceof n))throw new TypeError("Cannot call a class as a function")}Object.defineProperty(t,"__esModule",{value:!0});var r=function(){function t(t,n){for(var e=0;e<n.length;e++){var i=n[e];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}return function(n,e,i){return e&&t(n.prototype,e),i&&t(n,i),n}}(),o="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},s={xs:{min:0,max:767},sm:{min:768,max:991},md:{min:992,max:1199},lg:{min:1200,max:1/0}},a={each:function(t,n){for(var e in t)if(("object"!==(void 0===t?"undefined":o(t))||t.hasOwnProperty(e))&&!1===n(e,t[e]))break},isFunction:function(t){return"function"==typeof t||!1},extend:function(t,n){for(var e in n)t[e]=n[e];return t}},u=function(){function t(){i(this,t),this.length=0,this.list=[]}return r(t,[{key:"add",value:function(t,n){var e=arguments.length>2&&void 0!==arguments[2]&&arguments[2];this.list.push({fn:t,data:n,one:e}),this.length++}},{key:"remove",value:function(t){for(var n=0;n<this.list.length;n++)this.list[n].fn===t&&(this.list.splice(n,1),this.length--,n--)}},{key:"empty",value:function(){this.list=[],this.length=0}},{key:"call",value:function(t,n){var e=arguments.length>2&&void 0!==arguments[2]?arguments[2]:null;n||(n=this.length-1);var i=this.list[n];a.isFunction(e)?e.call(this,t,i,n):a.isFunction(i.fn)&&i.fn.call(t||window,i.data),i.one&&(delete this.list[n],this.length--)}},{key:"fire",value:function(t){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null;for(var e in this.list)this.list.hasOwnProperty(e)&&this.call(t,e,n)}}]),t}(),c={current:null,callbacks:new u,trigger:function(t){var n=this.current;this.current=t,this.callbacks.fire(t,function(e,i){a.isFunction(i.fn)&&i.fn.call({current:t,previous:n},i.data)})},one:function(t,n){return this.on(t,n,!0)},on:function(t,n){var e=arguments.length>2&&void 0!==arguments[2]&&arguments[2];void 0===n&&a.isFunction(t)&&(n=t,t=void 0),a.isFunction(n)&&this.callbacks.add(n,t,e)},off:function(t){void 0===t&&this.callbacks.empty()}},l=function(){function t(n,e){i(this,t),this.name=n,this.media=e,this.initialize()}return r(t,[{key:"initialize",value:function(){this.callbacks={enter:new u,leave:new u},this.mql=window.matchMedia&&window.matchMedia(this.media)||{matches:!1,media:this.media,addListener:function(){},removeListener:function(){}};var t=this;this.mqlListener=function(n){var e=n.matches&&"enter"||"leave";t.callbacks[e].fire(t)},this.mql.addListener(this.mqlListener)}},{key:"on",value:function(t,n,e){var i=arguments.length>3&&void 0!==arguments[3]&&arguments[3];if("object"===(void 0===t?"undefined":o(t))){for(var r in t)t.hasOwnProperty(r)&&this.on(r,n,t[r],i);return this}return void 0===e&&a.isFunction(n)&&(e=n,n=void 0),a.isFunction(e)?(void 0!==this.callbacks[t]&&(this.callbacks[t].add(e,n,i),"enter"===t&&this.isMatched()&&this.callbacks[t].call(this)),this):this}},{key:"one",value:function(t,n,e){return this.on(t,n,e,!0)}},{key:"off",value:function(t,n){var e=void 0;if("object"===(void 0===t?"undefined":o(t))){for(e in t)t.hasOwnProperty(e)&&this.off(e,t[e]);return this}return void 0===t?(this.callbacks.enter.empty(),this.callbacks.leave.empty()):t in this.callbacks&&(n?this.callbacks[t].remove(n):this.callbacks[t].empty()),this}},{key:"isMatched",value:function(){return this.mql.matches}},{key:"destroy",value:function(){this.off()}}]),t}(),f={min:function(t){return"(min-width: "+t+(arguments.length>1&&void 0!==arguments[1]?arguments[1]:"px")+")"},max:function(t){return"(max-width: "+t+(arguments.length>1&&void 0!==arguments[1]?arguments[1]:"px")+")"},between:function(t,n){var e=arguments.length>2&&void 0!==arguments[2]?arguments[2]:"px";return"(min-width: "+t+e+") and (max-width: "+n+e+")"},get:function(t,n){var e=arguments.length>2&&void 0!==arguments[2]?arguments[2]:"px";return 0===t?this.max(n,e):n===1/0?this.min(t,e):this.between(t,n,e)}},h=function(t){function o(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0,r=arguments.length>2&&void 0!==arguments[2]?arguments[2]:1/0,s=arguments.length>3&&void 0!==arguments[3]?arguments[3]:"px";i(this,o);var a=f.get(e,r,s),u=n(this,(o.__proto__||Object.getPrototypeOf(o)).call(this,t,a));u.min=e,u.max=r,u.unit=s;var l=u;return u.changeListener=function(){l.isMatched()&&c.trigger(l)},u.isMatched()&&(c.current=u),u.mql.addListener(u.changeListener),u}return e(o,l),r(o,[{key:"destroy",value:function(){this.off(),this.mql.removeListener(this.changeHander)}}]),o}(),d=function(t){function r(t){i(this,r);var e=[],o=[];return a.each(t.split(" "),function(t,n){var i=g.get(n);i&&(e.push(i),o.push(i.media))}),n(this,(r.__proto__||Object.getPrototypeOf(r)).call(this,t,o.join(",")))}return e(r,l),r}(),v={version:"1.0.5"},p={},m={},y=window.Breakpoints=function(){for(var t=arguments.length,n=Array(t),e=0;e<t;e++)n[e]=arguments[e];y.define.apply(y,n)};y.defaults=s;var g=y=a.extend(y,{version:v.version,defined:!1,define:function(t){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};this.defined&&this.destroy(),t||(t=y.defaults),this.options=a.extend(n,{unit:"px"});for(var e in t)t.hasOwnProperty(e)&&this.set(e,t[e].min,t[e].max,this.options.unit);this.defined=!0},destroy:function(){a.each(p,function(t,n){n.destroy()}),p={},c.current=null},is:function(t){var n=this.get(t);return n?n.isMatched():null},all:function(){var t=[];return a.each(p,function(n){t.push(n)}),t},set:function(t){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0,e=arguments.length>2&&void 0!==arguments[2]?arguments[2]:1/0,i=arguments.length>3&&void 0!==arguments[3]?arguments[3]:"px",r=this.get(t);return r&&r.destroy(),p[t]=new h(t,n,e,i),p[t]},get:function(t){return p.hasOwnProperty(t)?p[t]:null},getUnion:function(t){return m.hasOwnProperty(t)?m[t]:(m[t]=new d(t),m[t])},getMin:function(t){var n=this.get(t);return n?n.min:null},getMax:function(t){var n=this.get(t);return n?n.max:null},current:function(){return c.current},getMedia:function(t){var n=this.get(t);return n?n.media:null},on:function(t,n,e,i){var r=arguments.length>4&&void 0!==arguments[4]&&arguments[4];if("change"===(t=t.trim()))return i=e,e=n,c.on(e,i,r);if(t.includes(" ")){var o=this.getUnion(t);o&&o.on(n,e,i,r)}else{var s=this.get(t);s&&s.on(n,e,i,r)}return this},one:function(t,n,e,i){return this.on(t,n,e,i,!0)},off:function(t,n,e){if("change"===(t=t.trim()))return c.off(n);if(t.includes(" ")){var i=this.getUnion(t);i&&i.off(n,e)}else{var r=this.get(t);r&&r.off(n,e)}return this}});t.default=g});
//# sourceMappingURL=breakpoints.min.js.map
;;