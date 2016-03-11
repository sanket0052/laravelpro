$( document ).ready(function() {
	// $('.item').prop('disabled', true);
	$('#alert-block').hide();
});

function update_cart(id, p_id, p_price)
{
	id = id.id;
	if (id.indexOf("item") >= 0)
	{
		var CSRF_TOKEN = $('input[name=_token]').val();
		$('#input-item-'+p_id).prop('disabled', false);
		$('#input-item-'+p_id).focus();
		old_item = $('#input-item-'+p_id).val();
		rowid = $('#rowid-'+p_id).html();
		$('#'+id).removeClass('btn-primary').addClass('btn-success');
		$('#'+id+' i').removeClass('fa fa-pencil').addClass('fa fa-floppy-o');
		$('#'+id).attr('data-original-title', 'Update Cart');
		$('#'+id).prop('id', 'save-'+p_id);
	}
	else if(id.indexOf("save-") >= 0)
	{
		var inputbox = $('#input-item-'+p_id);
		var item_val = inputbox.val();
		var max_val = inputbox.attr('max');
		if($.isNumeric(item_val))
		{
			if(parseInt(item_val) > parseInt(max_val))
			{
				$('#alert-block').addClass('alert alert-danger alert-dismissable');
				$('#alert-block strong').html('You Can not enter more than '+max_val+' item.');
				$('#alert-block').show();
				inputbox.val(max_val);
				subtotal = (parseInt(max_val)*parseInt(p_price));
				$('#subtotal-'+id).html(subtotal);
				return false;
			}
			else if(parseInt(item_val) <= parseInt(max_val))
			{
				subtotal = (parseInt(item_val)*parseInt(p_price));
				old_subtotal = $('#subtotal-'+id).html();
				$('#subtotal-'+id).html(subtotal);
				update_cart_item(rowid, item_val, p_id, old_subtotal, CSRF_TOKEN);
			}
		}
		else
		{
			$('#alert-block').addClass('alert alert-danger alert-dismissable');
			$('#alert-block strong').html('Only Numbers Can Input.');
			$('#alert-block').show();
			inputbox.val(1);
			return false;
		}

	}
}

function update_cart_item(rowid, qty, p_id, old_subtotal, CSRF_TOKEN)
{
	$.ajax({
		url: 'http://localhost/laravelpro/public/cart/update/',
		data: {'rowid': rowid, 'qty':qty, '_token':CSRF_TOKEN},
		type: 'POST',
		success: function(data)
		{
			if($.trim(data) != 0)
			{
				$('#save-'+p_id).removeClass('btn-success').addClass('btn-primary');
				$('#save-'+p_id+' i').removeClass('fa fa-floppy-o').addClass('fa fa-pencil');
				$('#save-'+p_id).attr('data-original-title', 'Edit Cart');
				$('#save-'+p_id).prop('id', 'item-'+p_id);
				$('#input-item-'+p_id).prop('disabled', true);
				price = $('#price-item-'+p_id).html();
				new_product_subtotal = (parseInt(price)*qty);

				final_subtotal = $('#subtotal').html();
				final_subtotal -= parseInt(old_subtotal);
				final_subtotal += parseInt(new_product_subtotal);
				$('#subtotal').html(final_subtotal);
				$('#final-total').html(final_subtotal);
				
			}
			else
			{
				
			}
		}
	});
}

function delete_items(p_id)
{
	rowid = $('#rowid-'+p_id).html();
	$.ajax({
		url: 'delete_item',
		data: {'rowid': rowid},
		type: "post",
		success: function(data)
		{
			if($.trim(data) != 0)
			{
				old_subtotal = $('#subtotal-save-'+p_id).html();
				alert(old_subtotal);
				final_subtotal = $('#subtotal').html();
				alert(final_subtotal);
				final_subtotal -= parseInt(old_subtotal);
				$('#subtotal').html(final_subtotal);
				$('#final-total').html(final_subtotal);
				$('table tr#item-tr-'+p_id).remove();
			}else{
				
			}
		}
	});
}
	// When the window has finished loading create our google map below
	google.maps.event.addDomListener(window, 'load', init);

	function init() {
		// Basic options for a simple Google Map
		// For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
		var mapOptions = {
			// How zoomed in you want the map to start at (always required)
			zoom: 11,

			// The latitude and longitude to center the map (always required)
			center: new google.maps.LatLng(40.6700, -73.9400), // New York

			// How you would like to style the map. 
			// This is where you would paste any style found on Snazzy Maps.
			styles: [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}]
		};

		// Get the HTML DOM element that will contain your map 
		// We are using a div with id="map" seen below in the <body>
		var mapElement = document.getElementById('googleMap');

		// Create the Google Map using our element and options defined above
		var map = new google.maps.Map(mapElement, mapOptions);

		// Let's also add a marker while we're at it
		var marker = new google.maps.Marker({
			position: new google.maps.LatLng(40.6700, -73.9400),
			map: map,
			title: 'Snazzy!'
		});
	}

jQuery.extend({highlight:function(e,t,n,i){if(3===e.nodeType){var r=e.data.match(t);if(r){var a=document.createElement(n||"span");a.className=i||"highlight";var h=e.splitText(r.index);h.splitText(r[0].length);var s=h.cloneNode(!0);return a.appendChild(s),h.parentNode.replaceChild(a,h),1}}else if(1===e.nodeType&&e.childNodes&&!/(script|style)/i.test(e.tagName)&&(e.tagName!==n.toUpperCase()||e.className!==i))for(var l=0;l<e.childNodes.length;l++)l+=jQuery.highlight(e.childNodes[l],t,n,i);return 0}}),jQuery.fn.unhighlight=function(e){var t={className:"highlight",element:"span"};return jQuery.extend(t,e),this.find(t.element+"."+t.className).each(function(){var e=this.parentNode;e.replaceChild(this.firstChild,this),e.normalize()}).end()},jQuery.fn.highlight=function(e,t){var n={className:"highlight",element:"span",caseSensitive:!1,wordsOnly:!1};if(jQuery.extend(n,t),e.constructor===String&&(e=[e]),e=jQuery.grep(e,function(e){return""!=e}),e=jQuery.map(e,function(e){return e.replace(/[-[\]{}()*+?.,\\^$|#\s]/g,"\\$&")}),0==e.length)return this;var i=n.caseSensitive?"":"i",r="("+e.join("|")+")";n.wordsOnly&&(r="\\b"+r+"\\b");var a=new RegExp(r,i);return this.each(function(){jQuery.highlight(this,a,n.element,n.className)})};

!function(r,e){if("function"==typeof define&&define.amd)define([],e);else if("object"==typeof exports){var n=e();"object"==typeof module&&module&&module.exports&&(exports=module.exports=n),exports.randomColor=n}else r.randomColor=e()}(this,function(){function r(r){var e=o(r.hue),n=f(e);return 0>n&&(n=360+n),n}function e(r,e){if("random"===e.luminosity)return f([0,100]);if("monochrome"===e.hue)return 0;var n=u(r),t=n[0],a=n[1];switch(e.luminosity){case"bright":t=55;break;case"dark":t=a-10;break;case"light":a=55}return f([t,a])}function n(r,e,n){var t=a(r,e),o=100;switch(n.luminosity){case"dark":o=t+20;break;case"light":t=(o+t)/2;break;case"random":t=0,o=100}return f([t,o])}function t(r,e){switch(e.format){case"hsvArray":return r;case"hslArray":return g(r);case"hsl":var n=g(r);return"hsl("+n[0]+", "+n[1]+"%, "+n[2]+"%)";case"rgbArray":return h(r);case"rgb":var t=h(r);return"rgb("+t.join(", ")+")";default:return c(r)}}function a(r,e){for(var n=i(r).lowerBounds,t=0;t<n.length-1;t++){var a=n[t][0],o=n[t][1],u=n[t+1][0],f=n[t+1][1];if(e>=a&&u>=e){var c=(f-o)/(u-a),s=o-c*a;return c*e+s}}return 0}function o(r){if("number"==typeof parseInt(r)){var e=parseInt(r);if(360>e&&e>0)return[e,e]}if("string"==typeof r&&v[r]){var n=v[r];if(n.hueRange)return n.hueRange}return[0,360]}function u(r){return i(r).saturationRange}function i(r){r>=334&&360>=r&&(r-=360);for(var e in v){var n=v[e];if(n.hueRange&&r>=n.hueRange[0]&&r<=n.hueRange[1])return v[e]}return"Color not found"}function f(r){return Math.floor(r[0]+Math.random()*(r[1]+1-r[0]))}function c(r){function e(r){var e=r.toString(16);return 1==e.length?"0"+e:e}var n=h(r),t="#"+e(n[0])+e(n[1])+e(n[2]);return t}function s(r,e,n){var t=n[0][0],a=n[n.length-1][0],o=n[n.length-1][1],u=n[0][1];v[r]={hueRange:e,lowerBounds:n,saturationRange:[t,a],brightnessRange:[o,u]}}function l(){s("monochrome",null,[[0,0],[100,0]]),s("red",[-26,18],[[20,100],[30,92],[40,89],[50,85],[60,78],[70,70],[80,60],[90,55],[100,50]]),s("orange",[19,46],[[20,100],[30,93],[40,88],[50,86],[60,85],[70,70],[100,70]]),s("yellow",[47,62],[[25,100],[40,94],[50,89],[60,86],[70,84],[80,82],[90,80],[100,75]]),s("green",[63,178],[[30,100],[40,90],[50,85],[60,81],[70,74],[80,64],[90,50],[100,40]]),s("blue",[179,257],[[20,100],[30,86],[40,80],[50,74],[60,60],[70,52],[80,44],[90,39],[100,35]]),s("purple",[258,282],[[20,100],[30,87],[40,79],[50,70],[60,65],[70,59],[80,52],[90,45],[100,42]]),s("pink",[283,334],[[20,100],[30,90],[40,86],[60,84],[80,80],[90,75],[100,73]])}function h(r){var e=r[0];0===e&&(e=1),360===e&&(e=359),e/=360;var n=r[1]/100,t=r[2]/100,a=Math.floor(6*e),o=6*e-a,u=t*(1-n),i=t*(1-o*n),f=t*(1-(1-o)*n),c=256,s=256,l=256;switch(a){case 0:c=t,s=f,l=u;break;case 1:c=i,s=t,l=u;break;case 2:c=u,s=t,l=f;break;case 3:c=u,s=i,l=t;break;case 4:c=f,s=u,l=t;break;case 5:c=t,s=u,l=i}var h=[Math.floor(255*c),Math.floor(255*s),Math.floor(255*l)];return h}function g(r){var e=r[0],n=r[1]/100,t=r[2]/100,a=(2-n)*t;return[e,Math.round(n*t/(1>a?a:2-a)*1e4)/100,a/2*100]}var v={};l();var d=function(a){a=a||{};var o,u,i;if(null!=a.count){var f=a.count,c=[];for(a.count=null;f>c.length;)c.push(d(a));return a.count=f,c}return o=r(a),u=e(o,a),i=n(o,u,a),t([o,u,i],a)};return d});

(function(a){if(typeof define==="function"&&define.amd&&define.amd.jQuery){define(["jquery"],a)}else{a(jQuery)}}(function(f){var p="left",o="right",e="up",x="down",c="in",z="out",m="none",s="auto",l="swipe",t="pinch",A="tap",j="doubletap",b="longtap",y="hold",D="horizontal",u="vertical",i="all",r=10,g="start",k="move",h="end",q="cancel",a="ontouchstart" in window,v=window.navigator.msPointerEnabled&&!window.navigator.pointerEnabled,d=window.navigator.pointerEnabled||window.navigator.msPointerEnabled,B="TouchSwipe";var n={fingers:1,threshold:75,cancelThreshold:null,pinchThreshold:20,maxTimeThreshold:null,fingerReleaseThreshold:250,longTapThreshold:500,doubleTapThreshold:200,swipe:null,swipeLeft:null,swipeRight:null,swipeUp:null,swipeDown:null,swipeStatus:null,pinchIn:null,pinchOut:null,pinchStatus:null,click:null,tap:null,doubleTap:null,longTap:null,hold:null,triggerOnTouchEnd:true,triggerOnTouchLeave:false,allowPageScroll:"auto",fallbackToMouseEvents:true,excludedElements:"label, button, input, select, textarea, a, .noSwipe"};f.fn.swipe=function(G){var F=f(this),E=F.data(B);if(E&&typeof G==="string"){if(E[G]){return E[G].apply(this,Array.prototype.slice.call(arguments,1))}else{f.error("Method "+G+" does not exist on jQuery.swipe")}}else{if(!E&&(typeof G==="object"||!G)){return w.apply(this,arguments)}}return F};f.fn.swipe.defaults=n;f.fn.swipe.phases={PHASE_START:g,PHASE_MOVE:k,PHASE_END:h,PHASE_CANCEL:q};f.fn.swipe.directions={LEFT:p,RIGHT:o,UP:e,DOWN:x,IN:c,OUT:z};f.fn.swipe.pageScroll={NONE:m,HORIZONTAL:D,VERTICAL:u,AUTO:s};f.fn.swipe.fingers={ONE:1,TWO:2,THREE:3,ALL:i};function w(E){if(E&&(E.allowPageScroll===undefined&&(E.swipe!==undefined||E.swipeStatus!==undefined))){E.allowPageScroll=m}if(E.click!==undefined&&E.tap===undefined){E.tap=E.click}if(!E){E={}}E=f.extend({},f.fn.swipe.defaults,E);return this.each(function(){var G=f(this);var F=G.data(B);if(!F){F=new C(this,E);G.data(B,F)}})}function C(a4,av){var az=(a||d||!av.fallbackToMouseEvents),J=az?(d?(v?"MSPointerDown":"pointerdown"):"touchstart"):"mousedown",ay=az?(d?(v?"MSPointerMove":"pointermove"):"touchmove"):"mousemove",U=az?(d?(v?"MSPointerUp":"pointerup"):"touchend"):"mouseup",S=az?null:"mouseleave",aD=(d?(v?"MSPointerCancel":"pointercancel"):"touchcancel");var ag=0,aP=null,ab=0,a1=0,aZ=0,G=1,aq=0,aJ=0,M=null;var aR=f(a4);var Z="start";var W=0;var aQ=null;var T=0,a2=0,a5=0,ad=0,N=0;var aW=null,af=null;try{aR.bind(J,aN);aR.bind(aD,a9)}catch(ak){f.error("events not supported "+J+","+aD+" on jQuery.swipe")}this.enable=function(){aR.bind(J,aN);aR.bind(aD,a9);return aR};this.disable=function(){aK();return aR};this.destroy=function(){aK();aR.data(B,null);return aR};this.option=function(bc,bb){if(av[bc]!==undefined){if(bb===undefined){return av[bc]}else{av[bc]=bb}}else{f.error("Option "+bc+" does not exist on jQuery.swipe.options")}return null};function aN(bd){if(aB()){return}if(f(bd.target).closest(av.excludedElements,aR).length>0){return}var be=bd.originalEvent?bd.originalEvent:bd;var bc,bb=a?be.touches[0]:be;Z=g;if(a){W=be.touches.length}else{bd.preventDefault()}ag=0;aP=null;aJ=null;ab=0;a1=0;aZ=0;G=1;aq=0;aQ=aj();M=aa();R();if(!a||(W===av.fingers||av.fingers===i)||aX()){ai(0,bb);T=at();if(W==2){ai(1,be.touches[1]);a1=aZ=au(aQ[0].start,aQ[1].start)}if(av.swipeStatus||av.pinchStatus){bc=O(be,Z)}}else{bc=false}if(bc===false){Z=q;O(be,Z);return bc}else{if(av.hold){af=setTimeout(f.proxy(function(){aR.trigger("hold",[be.target]);if(av.hold){bc=av.hold.call(aR,be,be.target)}},this),av.longTapThreshold)}ao(true)}return null}function a3(be){var bh=be.originalEvent?be.originalEvent:be;if(Z===h||Z===q||am()){return}var bd,bc=a?bh.touches[0]:bh;var bf=aH(bc);a2=at();if(a){W=bh.touches.length}if(av.hold){clearTimeout(af)}Z=k;if(W==2){if(a1==0){ai(1,bh.touches[1]);a1=aZ=au(aQ[0].start,aQ[1].start)}else{aH(bh.touches[1]);aZ=au(aQ[0].end,aQ[1].end);aJ=ar(aQ[0].end,aQ[1].end)}G=a7(a1,aZ);aq=Math.abs(a1-aZ)}if((W===av.fingers||av.fingers===i)||!a||aX()){aP=aL(bf.start,bf.end);al(be,aP);ag=aS(bf.start,bf.end);ab=aM();aI(aP,ag);if(av.swipeStatus||av.pinchStatus){bd=O(bh,Z)}if(!av.triggerOnTouchEnd||av.triggerOnTouchLeave){var bb=true;if(av.triggerOnTouchLeave){var bg=aY(this);bb=E(bf.end,bg)}if(!av.triggerOnTouchEnd&&bb){Z=aC(k)}else{if(av.triggerOnTouchLeave&&!bb){Z=aC(h)}}if(Z==q||Z==h){O(bh,Z)}}}else{Z=q;O(bh,Z)}if(bd===false){Z=q;O(bh,Z)}}function L(bb){var bc=bb.originalEvent;if(a){if(bc.touches.length>0){F();return true}}if(am()){W=ad}a2=at();ab=aM();if(ba()||!an()){Z=q;O(bc,Z)}else{if(av.triggerOnTouchEnd||(av.triggerOnTouchEnd==false&&Z===k)){bb.preventDefault();Z=h;O(bc,Z)}else{if(!av.triggerOnTouchEnd&&a6()){Z=h;aF(bc,Z,A)}else{if(Z===k){Z=q;O(bc,Z)}}}}ao(false);return null}function a9(){W=0;a2=0;T=0;a1=0;aZ=0;G=1;R();ao(false)}function K(bb){var bc=bb.originalEvent;if(av.triggerOnTouchLeave){Z=aC(h);O(bc,Z)}}function aK(){aR.unbind(J,aN);aR.unbind(aD,a9);aR.unbind(ay,a3);aR.unbind(U,L);if(S){aR.unbind(S,K)}ao(false)}function aC(bf){var be=bf;var bd=aA();var bc=an();var bb=ba();if(!bd||bb){be=q}else{if(bc&&bf==k&&(!av.triggerOnTouchEnd||av.triggerOnTouchLeave)){be=h}else{if(!bc&&bf==h&&av.triggerOnTouchLeave){be=q}}}return be}function O(bd,bb){var bc=undefined;if(I()||V()){bc=aF(bd,bb,l)}else{if((P()||aX())&&bc!==false){bc=aF(bd,bb,t)}}if(aG()&&bc!==false){bc=aF(bd,bb,j)}else{if(ap()&&bc!==false){bc=aF(bd,bb,b)}else{if(ah()&&bc!==false){bc=aF(bd,bb,A)}}}if(bb===q){a9(bd)}if(bb===h){if(a){if(bd.touches.length==0){a9(bd)}}else{a9(bd)}}return bc}function aF(be,bb,bd){var bc=undefined;if(bd==l){aR.trigger("swipeStatus",[bb,aP||null,ag||0,ab||0,W,aQ]);if(av.swipeStatus){bc=av.swipeStatus.call(aR,be,bb,aP||null,ag||0,ab||0,W,aQ);if(bc===false){return false}}if(bb==h&&aV()){aR.trigger("swipe",[aP,ag,ab,W,aQ]);if(av.swipe){bc=av.swipe.call(aR,be,aP,ag,ab,W,aQ);if(bc===false){return false}}switch(aP){case p:aR.trigger("swipeLeft",[aP,ag,ab,W,aQ]);if(av.swipeLeft){bc=av.swipeLeft.call(aR,be,aP,ag,ab,W,aQ)}break;case o:aR.trigger("swipeRight",[aP,ag,ab,W,aQ]);if(av.swipeRight){bc=av.swipeRight.call(aR,be,aP,ag,ab,W,aQ)}break;case e:aR.trigger("swipeUp",[aP,ag,ab,W,aQ]);if(av.swipeUp){bc=av.swipeUp.call(aR,be,aP,ag,ab,W,aQ)}break;case x:aR.trigger("swipeDown",[aP,ag,ab,W,aQ]);if(av.swipeDown){bc=av.swipeDown.call(aR,be,aP,ag,ab,W,aQ)}break}}}if(bd==t){aR.trigger("pinchStatus",[bb,aJ||null,aq||0,ab||0,W,G,aQ]);if(av.pinchStatus){bc=av.pinchStatus.call(aR,be,bb,aJ||null,aq||0,ab||0,W,G,aQ);if(bc===false){return false}}if(bb==h&&a8()){switch(aJ){case c:aR.trigger("pinchIn",[aJ||null,aq||0,ab||0,W,G,aQ]);if(av.pinchIn){bc=av.pinchIn.call(aR,be,aJ||null,aq||0,ab||0,W,G,aQ)}break;case z:aR.trigger("pinchOut",[aJ||null,aq||0,ab||0,W,G,aQ]);if(av.pinchOut){bc=av.pinchOut.call(aR,be,aJ||null,aq||0,ab||0,W,G,aQ)}break}}}if(bd==A){if(bb===q||bb===h){clearTimeout(aW);clearTimeout(af);if(Y()&&!H()){N=at();aW=setTimeout(f.proxy(function(){N=null;aR.trigger("tap",[be.target]);if(av.tap){bc=av.tap.call(aR,be,be.target)}},this),av.doubleTapThreshold)}else{N=null;aR.trigger("tap",[be.target]);if(av.tap){bc=av.tap.call(aR,be,be.target)}}}}else{if(bd==j){if(bb===q||bb===h){clearTimeout(aW);N=null;aR.trigger("doubletap",[be.target]);if(av.doubleTap){bc=av.doubleTap.call(aR,be,be.target)}}}else{if(bd==b){if(bb===q||bb===h){clearTimeout(aW);N=null;aR.trigger("longtap",[be.target]);if(av.longTap){bc=av.longTap.call(aR,be,be.target)}}}}}return bc}function an(){var bb=true;if(av.threshold!==null){bb=ag>=av.threshold}return bb}function ba(){var bb=false;if(av.cancelThreshold!==null&&aP!==null){bb=(aT(aP)-ag)>=av.cancelThreshold}return bb}function ae(){if(av.pinchThreshold!==null){return aq>=av.pinchThreshold}return true}function aA(){var bb;if(av.maxTimeThreshold){if(ab>=av.maxTimeThreshold){bb=false}else{bb=true}}else{bb=true}return bb}function al(bb,bc){if(av.allowPageScroll===m||aX()){bb.preventDefault()}else{var bd=av.allowPageScroll===s;switch(bc){case p:if((av.swipeLeft&&bd)||(!bd&&av.allowPageScroll!=D)){bb.preventDefault()}break;case o:if((av.swipeRight&&bd)||(!bd&&av.allowPageScroll!=D)){bb.preventDefault()}break;case e:if((av.swipeUp&&bd)||(!bd&&av.allowPageScroll!=u)){bb.preventDefault()}break;case x:if((av.swipeDown&&bd)||(!bd&&av.allowPageScroll!=u)){bb.preventDefault()}break}}}function a8(){var bc=aO();var bb=X();var bd=ae();return bc&&bb&&bd}function aX(){return !!(av.pinchStatus||av.pinchIn||av.pinchOut)}function P(){return !!(a8()&&aX())}function aV(){var be=aA();var bg=an();var bd=aO();var bb=X();var bc=ba();var bf=!bc&&bb&&bd&&bg&&be;return bf}function V(){return !!(av.swipe||av.swipeStatus||av.swipeLeft||av.swipeRight||av.swipeUp||av.swipeDown)}function I(){return !!(aV()&&V())}function aO(){return((W===av.fingers||av.fingers===i)||!a)}function X(){return aQ[0].end.x!==0}function a6(){return !!(av.tap)}function Y(){return !!(av.doubleTap)}function aU(){return !!(av.longTap)}function Q(){if(N==null){return false}var bb=at();return(Y()&&((bb-N)<=av.doubleTapThreshold))}function H(){return Q()}function ax(){return((W===1||!a)&&(isNaN(ag)||ag<av.threshold))}function a0(){return((ab>av.longTapThreshold)&&(ag<r))}function ah(){return !!(ax()&&a6())}function aG(){return !!(Q()&&Y())}function ap(){return !!(a0()&&aU())}function F(){a5=at();ad=event.touches.length+1}function R(){a5=0;ad=0}function am(){var bb=false;if(a5){var bc=at()-a5;if(bc<=av.fingerReleaseThreshold){bb=true}}return bb}function aB(){return !!(aR.data(B+"_intouch")===true)}function ao(bb){if(bb===true){aR.bind(ay,a3);aR.bind(U,L);if(S){aR.bind(S,K)}}else{aR.unbind(ay,a3,false);aR.unbind(U,L,false);if(S){aR.unbind(S,K,false)}}aR.data(B+"_intouch",bb===true)}function ai(bc,bb){var bd=bb.identifier!==undefined?bb.identifier:0;aQ[bc].identifier=bd;aQ[bc].start.x=aQ[bc].end.x=bb.pageX||bb.clientX;aQ[bc].start.y=aQ[bc].end.y=bb.pageY||bb.clientY;return aQ[bc]}function aH(bb){var bd=bb.identifier!==undefined?bb.identifier:0;var bc=ac(bd);bc.end.x=bb.pageX||bb.clientX;bc.end.y=bb.pageY||bb.clientY;return bc}function ac(bc){for(var bb=0;bb<aQ.length;bb++){if(aQ[bb].identifier==bc){return aQ[bb]}}}function aj(){var bb=[];for(var bc=0;bc<=5;bc++){bb.push({start:{x:0,y:0},end:{x:0,y:0},identifier:0})}return bb}function aI(bb,bc){bc=Math.max(bc,aT(bb));M[bb].distance=bc}function aT(bb){if(M[bb]){return M[bb].distance}return undefined}function aa(){var bb={};bb[p]=aw(p);bb[o]=aw(o);bb[e]=aw(e);bb[x]=aw(x);return bb}function aw(bb){return{direction:bb,distance:0}}function aM(){return a2-T}function au(be,bd){var bc=Math.abs(be.x-bd.x);var bb=Math.abs(be.y-bd.y);return Math.round(Math.sqrt(bc*bc+bb*bb))}function a7(bb,bc){var bd=(bc/bb)*1;return bd.toFixed(2)}function ar(){if(G<1){return z}else{return c}}function aS(bc,bb){return Math.round(Math.sqrt(Math.pow(bb.x-bc.x,2)+Math.pow(bb.y-bc.y,2)))}function aE(be,bc){var bb=be.x-bc.x;var bg=bc.y-be.y;var bd=Math.atan2(bg,bb);var bf=Math.round(bd*180/Math.PI);if(bf<0){bf=360-Math.abs(bf)}return bf}function aL(bc,bb){var bd=aE(bc,bb);if((bd<=45)&&(bd>=0)){return p}else{if((bd<=360)&&(bd>=315)){return p}else{if((bd>=135)&&(bd<=225)){return o}else{if((bd>45)&&(bd<135)){return x}else{return e}}}}}function at(){var bb=new Date();return bb.getTime()}function aY(bb){bb=f(bb);var bd=bb.offset();var bc={left:bd.left,right:bd.left+bb.outerWidth(),top:bd.top,bottom:bd.top+bb.outerHeight()};return bc}function E(bb,bc){return(bb.x>bc.left&&bb.x<bc.right&&bb.y>bc.top&&bb.y<bc.bottom)}}}));
!function(){"use strict";function a(){n.addClass("lnl-show").removeClass("lnl-hide"),s.addClass(i).css({height:o,overflow:"hidden"}),$("html, body").css("overflow","hidden"),l.find("span").removeClass("fa-bars").addClass("fa-remove")}function t(){n.removeClass("lnl-show").addClass("lnl-hide"),s.removeClass(i).css({height:"auto",overflow:"auto"}),$("html, body").css("overflow","auto"),l.find("span").removeClass("fa-remove").addClass("fa-bars")}function e(){try{return document.createEvent("TouchEvent"),!0}catch(a){return!1}}var n=$(".line-navbar-left"),l=$(".lno-btn-toggle"),s=($(".lno-btn-collapse"),$(".content-wrap")),i=s.data("effect"),o=$(window).height()-95;n.addClass("lnl-hide"),l.click(function(){n.hasClass("lnl-hide")?a():t()}),l.click(function(a){a.preventDefault(),n.hasClass("lnl-collapsed")?(n.removeClass("lnl-collapsed"),s.removeClass("lnl-collapsed"),$(this).find(".lnl-link-icon").removeClass("fa-arrow-right").addClass("fa-arrow-left")):(n.addClass("lnl-collapsed"),s.addClass("lnl-collapsed"),$(this).find(".lnl-link-icon").removeClass("fa-arrow-left").addClass("fa-arrow-right"))}),1==e()&&$(window).swipe({swipeRight:function(){a(),$(".navbar-collapse").removeClass("in")},swipeLeft:function(){t()},threshold:75}),$(window).resize(function(){$(window).width()>=767&&t()}),$(".lnt-search-input").focusin(function(){$(".lnt-search-suggestion").find(".dropdown-menu").slideDown()}),$(".lnt-search-input").focusout(function(){$(".lnt-search-suggestion").find(".dropdown-menu").slideUp()});var r=$(" .lnt-search-category ").find(" .dropdown-menu ").find(" li ");r.click(function(){var a=$(this).find(" a ").text(),t=$(" .selected-category-text ");t.text(a)}),$(".lnt-search-input").bind("keyup change",function(){var a=$(this).val(),t=$(".lnt-search-suggestion").find(".dropdown-menu > li > a");t.unhighlight({element:"strong",className:"important"}),a&&t.highlight(a,{element:"strong",className:"important"})}),$(".add-to-cart").click(function(){var a=randomColor({luminosity:"light",format:"rgb"}),t=$(".lnt-cart").find(".cart-item-quantity").text();$(".lnt-cart").css("backgroundColor",a),$(".lnt-cart").find("span").eq(0).addClass("item-added"),$(".lnt-cart").find(".cart-item-quantity").text(++t)}),$(".add-to-cart").click(function(){var a=randomColor({luminosity:"light",format:"rgb"}),t=$(".lno-cart").find(".cart-item-quantity").text();$(".lno-cart").css("backgroundColor",a),$(".lno-cart").find("span").eq(0).addClass("item-added"),$(".lno-cart").find(".cart-item-quantity").text(++t)});var c=$(".lnt-category").find("li").find("a"),d=$(".lnt-category").find("li");c.mouseenter(function(){d.removeClass("active"),$(this).parent().addClass("active");var a=$(this).attr("href");$(".lnt-subcategroy-carousel-wrap").find("> div").removeClass("active"),$(a).addClass("active")}),c.on("touchstart, touchend",function(a){a.preventDefault(),d.removeClass("active"),$(this).parent().addClass("active");var t=$(this).attr("href");$(".lnt-subcategroy-carousel-wrap").find("> div").removeClass("active"),$(t).addClass("active")}),1==e()&&($(window).swipe({swipeLeft:function(){$(".carousel").carousel("next")},swipeRight:function(){$(".carousel").carousel("prev")},threshold:75}),$(".carousel-indicators").hide()),$(".carousel-indicators").find("li").mouseenter(function(){var a=$(this).data("slide-to");$(this).parents(".carousel").carousel(a)}),String.prototype.capitalize=function(){return this.replace(/(?:^|\s)\S/g,function(a){return a.toUpperCase()})},$(".lnt-category > li").each(function(){var a=$(this).find("a");$(".lnl-nav").append("<li><a class='collapsed' data-toggle='collapse' href='#collapse"+a.text().capitalize().replace(/[, ]+/g,"")+"' aria-expanded='false' aria-controls='collapse"+a.text().capitalize().replace(/[, ]+/g,"")+"' data-subcategory="+a.attr("href").replace("#","")+"><span class='lnl-link-text'>"+$(this).text()+"</span><span class='fa fa-angle-up lnl-btn-sub-collapse'></span></a></li>")}),$(".lnl-nav li").each(function(){var a=$(this).find("a");$(this).append("<ul class='lnl-sub-one collapse' id='"+a.attr("href").replace("#","")+"' data-subcategory='"+a.data("subcategory")+"'></ul>")}),$(".lnt-subcategroy-carousel-wrap > div").each(function(){var a=$(this).attr("id"),t=$(this).find("ul").map(function(){return $(this).html()}).get(),e=$("ul[data-subcategory='"+a+"']");e.append(t)}),$(".navbar-toggle").click(function(){$(this).hasClass("collapsed")&&t()}),l.click(function(){$(".navbar-collapse").removeClass("in")})}();

	// When the window has finished loading create our google map below
	google.maps.event.addDomListener(window, 'load', init);

	function init() {
		// Basic options for a simple Google Map
		// For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
		var mapOptions = {
			// How zoomed in you want the map to start at (always required)
			zoom: 11,

			// The latitude and longitude to center the map (always required)
			center: new google.maps.LatLng(40.6700, -73.9400), // New York

			// How you would like to style the map. 
			// This is where you would paste any style found on Snazzy Maps.
			styles: [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}]
		};

		// Get the HTML DOM element that will contain your map 
		// We are using a div with id="map" seen below in the <body>
		var mapElement = document.getElementById('googleMap');

		// Create the Google Map using our element and options defined above
		var map = new google.maps.Map(mapElement, mapOptions);

		// Let's also add a marker while we're at it
		var marker = new google.maps.Marker({
			position: new google.maps.LatLng(40.6700, -73.9400),
			map: map,
			title: 'Snazzy!'
		});
	}

!function(r,e){if("function"==typeof define&&define.amd)define([],e);else if("object"==typeof exports){var n=e();"object"==typeof module&&module&&module.exports&&(exports=module.exports=n),exports.randomColor=n}else r.randomColor=e()}(this,function(){function r(r){var e=o(r.hue),n=f(e);return 0>n&&(n=360+n),n}function e(r,e){if("random"===e.luminosity)return f([0,100]);if("monochrome"===e.hue)return 0;var n=u(r),t=n[0],a=n[1];switch(e.luminosity){case"bright":t=55;break;case"dark":t=a-10;break;case"light":a=55}return f([t,a])}function n(r,e,n){var t=a(r,e),o=100;switch(n.luminosity){case"dark":o=t+20;break;case"light":t=(o+t)/2;break;case"random":t=0,o=100}return f([t,o])}function t(r,e){switch(e.format){case"hsvArray":return r;case"hslArray":return g(r);case"hsl":var n=g(r);return"hsl("+n[0]+", "+n[1]+"%, "+n[2]+"%)";case"rgbArray":return h(r);case"rgb":var t=h(r);return"rgb("+t.join(", ")+")";default:return c(r)}}function a(r,e){for(var n=i(r).lowerBounds,t=0;t<n.length-1;t++){var a=n[t][0],o=n[t][1],u=n[t+1][0],f=n[t+1][1];if(e>=a&&u>=e){var c=(f-o)/(u-a),s=o-c*a;return c*e+s}}return 0}function o(r){if("number"==typeof parseInt(r)){var e=parseInt(r);if(360>e&&e>0)return[e,e]}if("string"==typeof r&&v[r]){var n=v[r];if(n.hueRange)return n.hueRange}return[0,360]}function u(r){return i(r).saturationRange}function i(r){r>=334&&360>=r&&(r-=360);for(var e in v){var n=v[e];if(n.hueRange&&r>=n.hueRange[0]&&r<=n.hueRange[1])return v[e]}return"Color not found"}function f(r){return Math.floor(r[0]+Math.random()*(r[1]+1-r[0]))}function c(r){function e(r){var e=r.toString(16);return 1==e.length?"0"+e:e}var n=h(r),t="#"+e(n[0])+e(n[1])+e(n[2]);return t}function s(r,e,n){var t=n[0][0],a=n[n.length-1][0],o=n[n.length-1][1],u=n[0][1];v[r]={hueRange:e,lowerBounds:n,saturationRange:[t,a],brightnessRange:[o,u]}}function l(){s("monochrome",null,[[0,0],[100,0]]),s("red",[-26,18],[[20,100],[30,92],[40,89],[50,85],[60,78],[70,70],[80,60],[90,55],[100,50]]),s("orange",[19,46],[[20,100],[30,93],[40,88],[50,86],[60,85],[70,70],[100,70]]),s("yellow",[47,62],[[25,100],[40,94],[50,89],[60,86],[70,84],[80,82],[90,80],[100,75]]),s("green",[63,178],[[30,100],[40,90],[50,85],[60,81],[70,74],[80,64],[90,50],[100,40]]),s("blue",[179,257],[[20,100],[30,86],[40,80],[50,74],[60,60],[70,52],[80,44],[90,39],[100,35]]),s("purple",[258,282],[[20,100],[30,87],[40,79],[50,70],[60,65],[70,59],[80,52],[90,45],[100,42]]),s("pink",[283,334],[[20,100],[30,90],[40,86],[60,84],[80,80],[90,75],[100,73]])}function h(r){var e=r[0];0===e&&(e=1),360===e&&(e=359),e/=360;var n=r[1]/100,t=r[2]/100,a=Math.floor(6*e),o=6*e-a,u=t*(1-n),i=t*(1-o*n),f=t*(1-(1-o)*n),c=256,s=256,l=256;switch(a){case 0:c=t,s=f,l=u;break;case 1:c=i,s=t,l=u;break;case 2:c=u,s=t,l=f;break;case 3:c=u,s=i,l=t;break;case 4:c=f,s=u,l=t;break;case 5:c=t,s=u,l=i}var h=[Math.floor(255*c),Math.floor(255*s),Math.floor(255*l)];return h}function g(r){var e=r[0],n=r[1]/100,t=r[2]/100,a=(2-n)*t;return[e,Math.round(n*t/(1>a?a:2-a)*1e4)/100,a/2*100]}var v={};l();var d=function(a){a=a||{};var o,u,i;if(null!=a.count){var f=a.count,c=[];for(a.count=null;f>c.length;)c.push(d(a));return a.count=f,c}return o=r(a),u=e(o,a),i=n(o,u,a),t([o,u,i],a)};return d});

!function(){"use strict";function a(){n.addClass("lnl-show").removeClass("lnl-hide"),s.addClass(i).css({height:o,overflow:"hidden"}),$("html, body").css("overflow","hidden"),l.find("span").removeClass("fa-bars").addClass("fa-remove")}function t(){n.removeClass("lnl-show").addClass("lnl-hide"),s.removeClass(i).css({height:"auto",overflow:"auto"}),$("html, body").css("overflow","auto"),l.find("span").removeClass("fa-remove").addClass("fa-bars")}function e(){try{return document.createEvent("TouchEvent"),!0}catch(a){return!1}}var n=$(".line-navbar-left"),l=$(".lno-btn-toggle"),s=($(".lno-btn-collapse"),$(".content-wrap")),i=s.data("effect"),o=$(window).height()-95;n.addClass("lnl-hide"),l.click(function(){n.hasClass("lnl-hide")?a():t()}),l.click(function(a){a.preventDefault(),n.hasClass("lnl-collapsed")?(n.removeClass("lnl-collapsed"),s.removeClass("lnl-collapsed"),$(this).find(".lnl-link-icon").removeClass("fa-arrow-right").addClass("fa-arrow-left")):(n.addClass("lnl-collapsed"),s.addClass("lnl-collapsed"),$(this).find(".lnl-link-icon").removeClass("fa-arrow-left").addClass("fa-arrow-right"))}),1==e()&&$(window).swipe({swipeRight:function(){a(),$(".navbar-collapse").removeClass("in")},swipeLeft:function(){t()},threshold:75}),$(window).resize(function(){$(window).width()>=767&&t()}),$(".lnt-search-input").focusin(function(){$(".lnt-search-suggestion").find(".dropdown-menu").slideDown()}),$(".lnt-search-input").focusout(function(){$(".lnt-search-suggestion").find(".dropdown-menu").slideUp()});var r=$(" .lnt-search-category ").find(" .dropdown-menu ").find(" li ");r.click(function(){var a=$(this).find(" a ").text(),t=$(" .selected-category-text ");t.text(a)}),$(".lnt-search-input").bind("keyup change",function(){var a=$(this).val(),t=$(".lnt-search-suggestion").find(".dropdown-menu > li > a");t.unhighlight({element:"strong",className:"important"}),a&&t.highlight(a,{element:"strong",className:"important"})}),$(".add-to-cart").click(function(){var a=randomColor({luminosity:"light",format:"rgb"}),t=$(".lnt-cart").find(".cart-item-quantity").text();$(".lnt-cart").css("backgroundColor",a),$(".lnt-cart").find("span").eq(0).addClass("item-added"),$(".lnt-cart").find(".cart-item-quantity").text(++t)}),$(".add-to-cart").click(function(){var a=randomColor({luminosity:"light",format:"rgb"}),t=$(".lno-cart").find(".cart-item-quantity").text();$(".lno-cart").css("backgroundColor",a),$(".lno-cart").find("span").eq(0).addClass("item-added"),$(".lno-cart").find(".cart-item-quantity").text(++t)});var c=$(".lnt-category").find("li").find("a"),d=$(".lnt-category").find("li");c.mouseenter(function(){d.removeClass("active"),$(this).parent().addClass("active");var a=$(this).attr("href");$(".lnt-subcategroy-carousel-wrap").find("> div").removeClass("active"),$(a).addClass("active")}),c.on("touchstart, touchend",function(a){a.preventDefault(),d.removeClass("active"),$(this).parent().addClass("active");var t=$(this).attr("href");$(".lnt-subcategroy-carousel-wrap").find("> div").removeClass("active"),$(t).addClass("active")}),1==e()&&($(window).swipe({swipeLeft:function(){$(".carousel").carousel("next")},swipeRight:function(){$(".carousel").carousel("prev")},threshold:75}),$(".carousel-indicators").hide()),$(".carousel-indicators").find("li").mouseenter(function(){var a=$(this).data("slide-to");$(this).parents(".carousel").carousel(a)}),String.prototype.capitalize=function(){return this.replace(/(?:^|\s)\S/g,function(a){return a.toUpperCase()})},$(".lnt-category > li").each(function(){var a=$(this).find("a");$(".lnl-nav").append("<li><a class='collapsed' data-toggle='collapse' href='#collapse"+a.text().capitalize().replace(/[, ]+/g,"")+"' aria-expanded='false' aria-controls='collapse"+a.text().capitalize().replace(/[, ]+/g,"")+"' data-subcategory="+a.attr("href").replace("#","")+"><span class='lnl-link-text'>"+$(this).text()+"</span><span class='fa fa-angle-up lnl-btn-sub-collapse'></span></a></li>")}),$(".lnl-nav li").each(function(){var a=$(this).find("a");$(this).append("<ul class='lnl-sub-one collapse' id='"+a.attr("href").replace("#","")+"' data-subcategory='"+a.data("subcategory")+"'></ul>")}),$(".lnt-subcategroy-carousel-wrap > div").each(function(){var a=$(this).attr("id"),t=$(this).find("ul").map(function(){return $(this).html()}).get(),e=$("ul[data-subcategory='"+a+"']");e.append(t)}),$(".navbar-toggle").click(function(){$(this).hasClass("collapsed")&&t()}),l.click(function(){$(".navbar-collapse").removeClass("in")})}();
