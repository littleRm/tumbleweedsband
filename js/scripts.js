/**
 * scripts.js
 *
 * includes common functions and doc.ready calls
 */
"document"in self&&!("classList"in document.createElement("_"))&&!function(t){"use strict";if("Element"in t){var e="classList",n="prototype",i=t.Element[n],r=Object,s=String[n].trim||function(){return this.replace(/^\s+|\s+$/g,"")},a=Array[n].indexOf||function(t){for(var e=0,n=this.length;n>e;e++)if(e in this&&this[e]===t)return e;return-1},o=function(t,e){this.name=t,this.code=DOMException[t],this.message=e},u=function(t,e){if(""===e)throw new o("SYNTAX_ERR","An invalid or illegal string was specified");if(/\s/.test(e))throw new o("INVALID_CHARACTER_ERR","String contains an invalid character");return a.call(t,e)},c=function(t){for(var e=s.call(t.getAttribute("class")||""),n=e?e.split(/\s+/):[],i=0,r=n.length;r>i;i++)this.push(n[i]);this._updateClassName=function(){t.setAttribute("class",this.toString())}},l=c[n]=[],h=function(){return new c(this)};if(o[n]=Error[n],l.item=function(t){return this[t]||null},l.contains=function(t){return t+="",-1!==u(this,t)},l.add=function(){var t,e=arguments,n=0,i=e.length,r=!1;do t=e[n]+"",-1===u(this,t)&&(this.push(t),r=!0);while(++n<i);r&&this._updateClassName()},l.remove=function(){var t,e=arguments,n=0,i=e.length,r=!1;do{t=e[n]+"";var s=u(this,t);-1!==s&&(this.splice(s,1),r=!0)}while(++n<i);r&&this._updateClassName()},l.toggle=function(t,e){t+="";var n=this.contains(t),i=n?e!==!0&&"remove":e!==!1&&"add";return i&&this[i](t),!n},l.toString=function(){return this.join(" ")},r.defineProperty){var f={get:h,enumerable:!0,configurable:!0};try{r.defineProperty(i,e,f)}catch(d){-2146823252===d.number&&(f.enumerable=!1,r.defineProperty(i,e,f))}}else r[n].__defineGetter__&&i.__defineGetter__(e,h)}}(self);
/** Astro v6.1.0, by Chris Ferdinandi | http://github.com/cferdinandi/astro | Licensed under MIT: http://gomakethings.com/mit/ */
!function(t,e){"function"==typeof define&&define.amd?define("astro",e(t)):"object"==typeof exports?module.exports=e(t):t.astro=e(t)}(window||this,function(t){"use strict";var e,n={},o=!!document.querySelector&&!!t.addEventListener,a={toggleActiveClass:"active",navActiveClass:"active",initClass:"js-astro",callbackBefore:function(){},callbackAfter:function(){}},c=function(t,e,n){if("[object Object]"===Object.prototype.toString.call(t))for(var o in t)Object.prototype.hasOwnProperty.call(t,o)&&e.call(n,t[o],o,t);else for(var a=0,c=t.length;c>a;a++)e.call(n,t[a],a,t)},r=function(t,e){var n={};return c(t,function(e,o){n[o]=t[o]}),c(e,function(t,o){n[o]=e[o]}),n},i=function(t,e){for(var n=e.charAt(0);t&&t!==document;t=t.parentNode)if("."===n){if(t.classList.contains(e.substr(1)))return t}else if("#"===n){if(t.id===e.substr(1))return t}else if("["===n&&t.hasAttribute(e.substr(1,e.length-2)))return t;return!1};n.toggleNav=function(t,e,n){var o=r(o||a,n||{}),c=document.querySelector(e);o.callbackBefore(t,e),t.classList.toggle(o.toggleActiveClass),c.classList.toggle(o.navActiveClass),o.callbackAfter(t,e)};var s=function(t){var o=i(t.target,"[data-nav-toggle]");o&&("a"===o.tagName.toLowerCase()&&t.preventDefault(),n.toggleNav(o,o.getAttribute("data-nav-toggle"),e))};return n.destroy=function(){e&&(document.documentElement.classList.remove(e.initClass),document.removeEventListener("click",s,!1),e=null)},n.init=function(t){o&&(n.destroy(),e=r(a,t||{}),document.documentElement.classList.add(e.initClass),document.addEventListener("click",s,!1))},n});

/** Right-Height v2.6.4, by Chris Ferdinandi | http://github.com/cferdinandi/right-height | Licensed under MIT: http://gomakethings.com/mit/ */
!function(t,e){"function"==typeof define&&define.amd?define("rightHeight",e(t)):"object"==typeof exports?module.exports=e(t):t.rightHeight=e(t)}(window||this,function(t){"use strict";var e,n,i,o={},r=!!document.querySelector&&!!t.addEventListener,c={callbackBefore:function(){},callbackAfter:function(){}},f=function(t,e,n){if("[object Object]"===Object.prototype.toString.call(t))for(var i in t)Object.prototype.hasOwnProperty.call(t,i)&&e.call(n,t[i],i,t);else for(var o=0,r=t.length;r>o;o++)e.call(n,t[o],o,t)},u=function(t,e){var n={};return f(t,function(e,i){n[i]=t[i]}),f(e,function(t,i){n[i]=e[i]}),n},l=function(t){var e=0;if(t.offsetParent)do e+=t.offsetTop,t=t.offsetParent;while(t);return e},a=function(t){var e=t.item(0),n=t.item(1);return e&&n?l(e)-l(n)===0?!1:!0:!1},h=function(t){t.style.height="",t.style.minHeight=""},s=function(t,e){return t.offsetHeight>e&&(e=t.offsetHeight),e},d=function(t,e){t.style.height=e+"px"};o.adjustContainerHeight=function(t,e){var n=u(n||c,e||{}),i=t.querySelectorAll("[data-right-height-content]"),o=a(i),r="0";n.callbackBefore(t),f(i,function(t){h(t)}),o||(f(i,function(t){r=s(t,r)}),f(i,function(t){d(t,r)})),n.callbackAfter(t)};var g=function(){f(n,function(t){o.adjustContainerHeight(t,e)})},v=function(){i||(i=setTimeout(function(){i=null,g(n,e)},66))};return o.destroy=function(){e&&(f(n,function(t){var e=t.querySelectorAll("[data-right-height-content]");f(e,function(t){h(t)})}),t.removeEventListener("resize",v,!1),e=null,n=null,i=null)},o.init=function(i){r&&(o.destroy(),e=u(c,i||{}),n=document.querySelectorAll("[data-right-height]"),g(n,i),t.addEventListener("load",g,!1),t.addEventListener("resize",v,!1))},o});



/********************/
/* PRELOAD FUNCTION */
/********************/

jQuery.fn.preload = function() {
    this.each(function(){
        jQuery('<img/>')[0].src = this;
    });
}


/***************************/
/*    CREATE POSTJASON     */
/***************************/

//create postJSON
jQuery.extend({
   postJSON: function( url, data, callback) {
      return jQuery.post(url, data, callback, "json");
   }
});



/************************************************/
/*    ADD BROWSER & OS CLASSES TO HTML TAG      */
/************************************************/
/*
CSS Browser Selector v0.4.0 (Nov 02, 2010)
Rafael Lima (http://rafael.adm.br)
http://rafael.adm.br/css_browser_selector
License: http://creativecommons.org/licenses/by/2.5/
Contributors: http://rafael.adm.br/css_browser_selector#contributors
*/
function css_browser_selector(u){var ua=u.toLowerCase(),is=function(t){return ua.indexOf(t)>-1},g='gecko',w='webkit',s='safari',o='opera',m='mobile',h=document.documentElement,b=[(!(/opera|webtv/i.test(ua))&&/msie\s(\d)/.test(ua))?('ie ie'+RegExp.$1):is('firefox/2')?g+' ff2':is('firefox/3.5')?g+' ff3 ff3_5':is('firefox/3.6')?g+' ff3 ff3_6':is('firefox/3')?g+' ff3':is('gecko/')?g:is('opera')?o+(/version\/(\d+)/.test(ua)?' '+o+RegExp.$1:(/opera(\s|\/)(\d+)/.test(ua)?' '+o+RegExp.$2:'')):is('konqueror')?'konqueror':is('blackberry')?m+' blackberry':is('android')?m+' android':is('chrome')?w+' chrome':is('iron')?w+' iron':is('applewebkit/')?w+' '+s+(/version\/(\d+)/.test(ua)?' '+s+RegExp.$1:''):is('mozilla/')?g:'',is('j2me')?m+' j2me':is('iphone')?m+' iphone':is('ipod')?m+' ipod':is('ipad')?m+' ipad':is('mac')?'mac':is('darwin')?'mac':is('webtv')?'webtv':is('win')?'win'+(is('windows nt 6.0')?' vista':''):is('freebsd')?'freebsd':(is('x11')||is('linux'))?'linux':'','js']; c = b.join(' '); h.className += ' '+c; return c;};css_browser_selector(navigator.userAgent);



/*************************************/
/*    A SAFE CONSOLE.LOG WRAPPER     */
/*************************************/

// usage: log('inside coolFunc',this,arguments);
// http://paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
// https://github.com/h5bp/html5-boilerplate/blob/d242bd27cdfaafb7d36c0e1908d7c60bde1e8b67/js/plugins.js
if(typeof window.log === "undefined") {
	window.log = function f() {
		log.history = log.history || [];
		log.history.push(arguments);
		if (this.console && typeof showConsole !== "undefined" && showConsole) {
			var args = arguments;
			var newarr;
			try {
				args.callee = f.caller;
			} catch(e) {}
			newarr = [].slice.call(args);
			if (typeof console.log === 'object')
				log.apply.call(console.log, console, newarr);
			else
				console.log.apply(console, newarr);
		}
	};
	if(typeof showConsole == "undefined")
		var showConsole = true;
}



/**********************************************************************************************************************************************************/
/*                                                             DOCUMENT READY SCRIPTS                                                                     */
/**********************************************************************************************************************************************************/




jQuery(document).ready(function($) {
	log("document ready");
	
	//initialize slideshow
	if($("#slidy-container").length)
		cssSlidy();
	
	
	astro.init({
		toggleActiveClass: 'active',
		navActiveClass: 'active',
		initClass: 'js-astro',
		callbackBefore: function () {},
		callbackAfter: function () {}
	});
	
	rightHeight.init({
		callbackBefore: function () {},
		callbackAfter: function () {}
	});
	
		
}); //end document.ready




/**********************************************************************************************************************************************************/
/*                                                            WINDOW LOADED SCRIPTS                                                                     */
/**********************************************************************************************************************************************************/



jQuery(window).load(function($) {
	log("window loaded");
	
});



/**********************************************************************************************************************************************************/
/*                                                            WINDOW RESIZE SCRIPTS                                                                     */
/**********************************************************************************************************************************************************/


var resizeControl = resizeControl || {
	 winWidth: jQuery(window).width()
	,winHeight: jQuery(window).height()
	,winNewWidth: 0
	,winNewHeight: 0
    ,resize: function() {
    	this.winNewWidth = jQuery(window).width();
		this.winNewHeight = jQuery(window).height();
		if(this.winWidth!=this.winNewWidth || this.winHeight!=this.winNewHeight) {
			log("WINDOW RESIZED TO WIDTH: "+jQuery('body').width());
			this.winWidth = this.winNewWidth;
			this.winHeight = this.winNewHeight;
			return true;
		}else{
			return false;
		}
	}
};


jQuery(window).resize(function($){
	if(resizeControl.resize()){	

	}
});