define("ext.wikia.adEngine.geo",[],function(){return function(n){function t(r){if(e[r])return e[r].exports;var o=e[r]={i:r,l:!1,exports:{}};return n[r].call(o.exports,o,o.exports,t),o.l=!0,o.exports}var e={};return t.m=n,t.c=e,t.d=function(n,e,r){t.o(n,e)||Object.defineProperty(n,e,{configurable:!1,enumerable:!0,get:r})},t.n=function(n){var e=n&&n.__esModule?function(){return n.default}:function(){return n};return t.d(e,"a",e),e},t.o=function(n,t){return Object.prototype.hasOwnProperty.call(n,t)},t.p="",t(t.s=0)}([function(n,t,e){var r,o;r=[],void 0!==(o=function(){return function(n){function t(r){if(e[r])return e[r].exports;var o=e[r]={i:r,l:!1,exports:{}};return n[r].call(o.exports,o,o.exports,t),o.l=!0,o.exports}var e={};return t.m=n,t.c=e,t.d=function(n,e,r){t.o(n,e)||Object.defineProperty(n,e,{configurable:!1,enumerable:!0,get:r})},t.n=function(n){var e=n&&n.__esModule?function(){return n.default}:function(){return n};return t.d(e,"a",e),e},t.o=function(n,t){return Object.prototype.hasOwnProperty.call(n,t)},t.p="",t(t.s=8)}([function(n,t){var e=n.exports="undefined"!=typeof window&&window.Math==Math?window:"undefined"!=typeof self&&self.Math==Math?self:Function("return this")();"number"==typeof __g&&(__g=e)},function(n,t){var e=n.exports={version:"2.5.1"};"number"==typeof __e&&(__e=e)},function(n,t){n.exports=function(n){return"object"==typeof n?null!==n:"function"==typeof n}},function(n,t,e){n.exports=!e(4)(function(){return 7!=Object.defineProperty({},"a",{get:function(){return 7}}).a})},function(n,t){n.exports=function(n){try{return!!n()}catch(n){return!0}}},function(n,t){n.exports=function(n){if(void 0==n)throw TypeError("Can't call method on  "+n);return n}},function(n,t,e){var r=e(16),o=e(5);n.exports=function(n){return r(o(n))}},function(n,t){var e=Math.ceil,r=Math.floor;n.exports=function(n){return isNaN(n=+n)?0:(n>0?r:e)(n)}},function(n,t,e){"use strict";function r(n){return function(t){return!t.startsWith(M)&&t.indexOf(n+R)>-1}}function o(n){return parseFloat(n.split(R)[1])/100}function i(n,t){var e=S.a.getRandom(),r=n.some(function(n){return e<n}),o=100*n[0],i=r?"B":"A";return t&&(k[t]={name:t,group:i,limit:r?o:100-o,result:r}),r}function u(n,t,e){var u=n.filter(r(t));return 0!==u.length&&i(u.map(o),e)}function c(n,t){return n.indexOf(P)>-1||u(n,P,t)}function f(){if(null===E){var n=decodeURIComponent(j.a.get("Geo"));try{E=JSON.parse(n)||{}}catch(n){E={}}}return E}function a(n){E=n}function s(){return f().country}function p(){return f().continent}function l(){return f().region}function d(){var n=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[],t=arguments[1];return!!(n&&n.indexOf&&(n.indexOf(s())>-1||u(n,s(),t)))}function v(){var n=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[],t=arguments[1],e=s()+"-"+l();return!!(n&&n.indexOf&&(n.indexOf(e)>-1||u(n,e,t)))}function x(){var n=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[],t=arguments[1],e=P+"-"+p();return n.indexOf(e)>-1||u(n,e,t)}function g(){var n=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[],t=arguments[1];return!(!n||!n.indexOf||!c(n,t)&&!x(n,t))}function y(){var n=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[];return!!(n.indexOf(""+M+s())>-1||n.indexOf(""+M+s()+"-"+l())>-1||n.indexOf(""+M+P+"-"+p())>-1)}function h(n){return k[n].name+"_"+k[n].group+"_"+k[n].limit}function m(){k={}}function O(){return C()(k).map(h)}function b(){var n=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[],t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:void 0;return void 0!==t&&void 0!==k[t]?k[t].result:!(!n||!n.indexOf||y(n)||!(g(n,t)||d(n,t)||v(n,t)))}Object.defineProperty(t,"__esModule",{value:!0}),t.setGeoData=a,t.getCountryCode=s,t.getContinentCode=p,t.getRegionCode=l,t.isProperCountry=d,t.isProperRegion=v,t.isProperContinent=g,t.resetSamplingCache=m,t.getSamplingResults=O,t.isProperGeo=b;var w=e(9),C=e.n(w),_=e(36),j=e.n(_),S=e(37),P="XX",M="non-",R="/",E=null,k=[];t.default={getContinentCode:p,getCountryCode:s,getRegionCode:l,getSamplingResults:O,isProperGeo:b,resetSamplingCache:m}},function(n,t,e){n.exports={default:e(10),__esModule:!0}},function(n,t,e){e(11),n.exports=e(1).Object.keys},function(n,t,e){var r=e(12),o=e(13);e(25)("keys",function(){return function(n){return o(r(n))}})},function(n,t,e){var r=e(5);n.exports=function(n){return Object(r(n))}},function(n,t,e){var r=e(14),o=e(24);n.exports=Object.keys||function(n){return r(n,o)}},function(n,t,e){var r=e(15),o=e(6),i=e(18)(!1),u=e(21)("IE_PROTO");n.exports=function(n,t){var e,c=o(n),f=0,a=[];for(e in c)e!=u&&r(c,e)&&a.push(e);for(;t.length>f;)r(c,e=t[f++])&&(~i(a,e)||a.push(e));return a}},function(n,t){var e={}.hasOwnProperty;n.exports=function(n,t){return e.call(n,t)}},function(n,t,e){var r=e(17);n.exports=Object("z").propertyIsEnumerable(0)?Object:function(n){return"String"==r(n)?n.split(""):Object(n)}},function(n,t){var e={}.toString;n.exports=function(n){return e.call(n).slice(8,-1)}},function(n,t,e){var r=e(6),o=e(19),i=e(20);n.exports=function(n){return function(t,e,u){var c,f=r(t),a=o(f.length),s=i(u,a);if(n&&e!=e){for(;a>s;)if((c=f[s++])!=c)return!0}else for(;a>s;s++)if((n||s in f)&&f[s]===e)return n||s||0;return!n&&-1}}},function(n,t,e){var r=e(7),o=Math.min;n.exports=function(n){return n>0?o(r(n),9007199254740991):0}},function(n,t,e){var r=e(7),o=Math.max,i=Math.min;n.exports=function(n,t){return n=r(n),n<0?o(n+t,0):i(n,t)}},function(n,t,e){var r=e(22)("keys"),o=e(23);n.exports=function(n){return r[n]||(r[n]=o(n))}},function(n,t,e){var r=e(0),o=r["__core-js_shared__"]||(r["__core-js_shared__"]={});n.exports=function(n){return o[n]||(o[n]={})}},function(n,t){var e=0,r=Math.random();n.exports=function(n){return"Symbol(".concat(void 0===n?"":n,")_",(++e+r).toString(36))}},function(n,t){n.exports="constructor,hasOwnProperty,isPrototypeOf,propertyIsEnumerable,toLocaleString,toString,valueOf".split(",")},function(n,t,e){var r=e(26),o=e(1),i=e(4);n.exports=function(n,t){var e=(o.Object||{})[n]||Object[n],u={};u[n]=t(e),r(r.S+r.F*i(function(){e(1)}),"Object",u)}},function(n,t,e){var r=e(0),o=e(1),i=e(27),u=e(29),c=function(n,t,e){var f,a,s,p=n&c.F,l=n&c.G,d=n&c.S,v=n&c.P,x=n&c.B,g=n&c.W,y=l?o:o[t]||(o[t]={}),h=y.prototype,m=l?r:d?r[t]:(r[t]||{}).prototype;l&&(e=t);for(f in e)(a=!p&&m&&void 0!==m[f])&&f in y||(s=a?m[f]:e[f],y[f]=l&&"function"!=typeof m[f]?e[f]:x&&a?i(s,r):g&&m[f]==s?function(n){var t=function(t,e,r){if(this instanceof n){switch(arguments.length){case 0:return new n;case 1:return new n(t);case 2:return new n(t,e)}return new n(t,e,r)}return n.apply(this,arguments)};return t.prototype=n.prototype,t}(s):v&&"function"==typeof s?i(Function.call,s):s,v&&((y.virtual||(y.virtual={}))[f]=s,n&c.R&&h&&!h[f]&&u(h,f,s)))};c.F=1,c.G=2,c.S=4,c.P=8,c.B=16,c.W=32,c.U=64,c.R=128,n.exports=c},function(n,t,e){var r=e(28);n.exports=function(n,t,e){if(r(n),void 0===t)return n;switch(e){case 1:return function(e){return n.call(t,e)};case 2:return function(e,r){return n.call(t,e,r)};case 3:return function(e,r,o){return n.call(t,e,r,o)}}return function(){return n.apply(t,arguments)}}},function(n,t){n.exports=function(n){if("function"!=typeof n)throw TypeError(n+" is not a function!");return n}},function(n,t,e){var r=e(30),o=e(35);n.exports=e(3)?function(n,t,e){return r.f(n,t,o(1,e))}:function(n,t,e){return n[t]=e,n}},function(n,t,e){var r=e(31),o=e(32),i=e(34),u=Object.defineProperty;t.f=e(3)?Object.defineProperty:function(n,t,e){if(r(n),t=i(t,!0),r(e),o)try{return u(n,t,e)}catch(n){}if("get"in e||"set"in e)throw TypeError("Accessors not supported!");return"value"in e&&(n[t]=e.value),n}},function(n,t,e){var r=e(2);n.exports=function(n){if(!r(n))throw TypeError(n+" is not an object!");return n}},function(n,t,e){n.exports=!e(3)&&!e(4)(function(){return 7!=Object.defineProperty(e(33)("div"),"a",{get:function(){return 7}}).a})},function(n,t,e){var r=e(2),o=e(0).document,i=r(o)&&r(o.createElement);n.exports=function(n){return i?o.createElement(n):{}}},function(n,t,e){var r=e(2);n.exports=function(n,t){if(!r(n))return n;var e,o;if(t&&"function"==typeof(e=n.toString)&&!r(o=e.call(n)))return o;if("function"==typeof(e=n.valueOf)&&!r(o=e.call(n)))return o;if(!t&&"function"==typeof(e=n.toString)&&!r(o=e.call(n)))return o;throw TypeError("Can't convert object to primitive value")}},function(n,t){n.exports=function(n,t){return{enumerable:!(1&n),configurable:!(2&n),writable:!(4&n),value:t}}},function(n,t,e){var r,o;!function(i){var u=!1;if(r=i,void 0!==(o="function"==typeof r?r.call(t,e,t,n):r)&&(n.exports=o),u=!0,n.exports=i(),u=!0,!u){var c=window.Cookies,f=window.Cookies=i();f.noConflict=function(){return window.Cookies=c,f}}}(function(){function n(){for(var n=0,t={};n<arguments.length;n++){var e=arguments[n];for(var r in e)t[r]=e[r]}return t}function t(e){function r(t,o,i){var u;if("undefined"!=typeof document){if(arguments.length>1){if(i=n({path:"/"},r.defaults,i),"number"==typeof i.expires){var c=new Date;c.setMilliseconds(c.getMilliseconds()+864e5*i.expires),i.expires=c}i.expires=i.expires?i.expires.toUTCString():"";try{u=JSON.stringify(o),/^[\{\[]/.test(u)&&(o=u)}catch(n){}o=e.write?e.write(o,t):encodeURIComponent(String(o)).replace(/%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g,decodeURIComponent),t=encodeURIComponent(String(t)),t=t.replace(/%(23|24|26|2B|5E|60|7C)/g,decodeURIComponent),t=t.replace(/[\(\)]/g,escape);var f="";for(var a in i)i[a]&&(f+="; "+a,!0!==i[a]&&(f+="="+i[a]));return document.cookie=t+"="+o+f}t||(u={});for(var s=document.cookie?document.cookie.split("; "):[],p=/(%[0-9A-Z]{2})+/g,l=0;l<s.length;l++){var d=s[l].split("="),v=d.slice(1).join("=");this.json||'"'!==v.charAt(0)||(v=v.slice(1,-1));try{var x=d[0].replace(p,decodeURIComponent);if(v=e.read?e.read(v,x):e(v,x)||v.replace(p,decodeURIComponent),this.json)try{v=JSON.parse(v)}catch(n){}if(t===x){u=v;break}t||(u[x]=v)}catch(n){}}return u}}return r.set=r,r.get=function(n){return r.call(r,n)},r.getJSON=function(){return r.apply({json:!0},[].slice.call(arguments))},r.defaults={},r.remove=function(t,e){r(t,"",n(e,{expires:-1}))},r.withConverter=t,r}return t(function(){})})},function(n,t,e){"use strict";function r(){return Math.random()}t.a={getRandom:r}}])}.apply(t,r))&&(n.exports=o)}])});