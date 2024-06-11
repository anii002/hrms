/*!
 * Remark (http://getbootstrapadmin.com/remark)
 * Copyright 2017 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */

!function(global,factory){if("function"==typeof define&&define.amd)define("/App/Travel",["exports","Site"],factory);else if("undefined"!=typeof exports)factory(exports,require("Site"));else{var mod={exports:{}};factory(mod.exports,global.Site),global.AppTravel=mod.exports}}(this,function(exports,_Site2){"use strict";function getInstance(){return instance||(instance=new AppTravel),instance}Object.defineProperty(exports,"__esModule",{value:!0}),exports.getInstance=exports.run=exports.AppTravel=void 0;var _Site3=babelHelpers.interopRequireDefault(_Site2),Map=function(){function Map(){babelHelpers.classCallCheck(this,Map),this.window=$(window),this.$siteNavbar=$(".site-navbar"),this.$siteFooter=$(".site-footer"),this.$pageMain=$(".page-main"),this.handleMapHeight()}return babelHelpers.createClass(Map,[{key:"handleMapHeight",value:function(){var footerH=this.$siteFooter.outerHeight(),navbarH=this.$siteNavbar.outerHeight(),mapH=this.window.height()-navbarH-footerH;this.$pageMain.outerHeight(mapH)}},{key:"getMap",value:function(){var mapLatlng=L.latLng(37.769,-122.446);return L.mapbox.accessToken="pk.eyJ1IjoiYW1hemluZ3N1cmdlIiwiYSI6ImNpaDVubzBoOTAxZG11dGx4OW5hODl2b3YifQ.qudwERFDdMJhFA-B2uO6Rg",L.mapbox.map("map","mapbox.light").setView(mapLatlng,18)}}]),Map}(),Markers=function(){function Markers(spots,hotels,reviews,map){babelHelpers.classCallCheck(this,Markers),this.spots=spots,this.hotels=hotels,this.reviews=reviews,this.map=map,this.markers=null,this.allMarkers=[],this.addMarkersByOption("spots")}return babelHelpers.createClass(Markers,[{key:"deleteMarkers",value:function(){this.map.removeLayer(this.markers),this.markers=null,this.allMarkers.length=0}},{key:"addMarkersByOption",value:function(option){this.markers=new L.MarkerClusterGroup({removeOutsideVisibleBounds:!1,polygonOptions:{color:"#444"}}),this.initMarkers(this.markers,this[""+option]),this.map.addLayer(this.markers)}},{key:"initMarkers",value:function(markers,items){for(var i=0;i<items.length;i++){var path=void 0,x=void 0;x=i%2==0?Number(Math.random()):-1*Math.random();var markerLatlng=L.latLng(37.769+Math.random()/170*x,Math.random()/150*x-122.446),divContent="<div class='in-map-markers'>\n                          <div class='marker-icon'>\n                            <img src='"+(path=$(items[i]).find("img").attr("src"))+"'/>\n                          </div>\n                        </div>",itemImg=L.divIcon({html:divContent,iconAnchor:[0,0],className:""}),itemName=$(items[i]).find(".item-name").html(),popupInfo="<div class='marker-popup-info'>\n                        <div class='detail'>info</div>\n                        <h3>"+itemName+"</h3>\n                        <p>"+$(items[i]).find(".item-title").html()+"</p>\n                      </div>\n                      <i class='icon wb-chevron-right-mini'>\n                      </i>",marker=L.marker(markerLatlng,{title:itemName,icon:itemImg}).bindPopup(popupInfo,{closeButton:!1});markers.addLayer(marker),this.allMarkers.push(marker),marker.on("popupopen",function(){this._icon.className+=" marker-active",this.setZIndexOffset(999)}),marker.on("popupclose",function(){this._icon&&(this._icon.className="leaflet-marker-icon leaflet-zoom-animated leaflet-clickable"),this.setZIndexOffset(450)})}}},{key:"getAllMarkers",value:function(){return this.allMarkers}},{key:"getMarkersInMap",value:function(){for(var inMapMarkers=[],allMarkers=this.getAllMarkers(),i=0;i<allMarkers.length;i++)this.map.getBounds().contains(allMarkers[i].getLatLng())&&inMapMarkers.push(allMarkers.indexOf(allMarkers[i]));return inMapMarkers}}]),Markers}(),AppTravel=function(_Site){function AppTravel(){return babelHelpers.classCallCheck(this,AppTravel),babelHelpers.possibleConstructorReturn(this,(AppTravel.__proto__||Object.getPrototypeOf(AppTravel)).apply(this,arguments))}return babelHelpers.inherits(AppTravel,_Site),babelHelpers.createClass(AppTravel,[{key:"initialize",value:function(){babelHelpers.get(AppTravel.prototype.__proto__||Object.getPrototypeOf(AppTravel.prototype),"initialize",this).call(this),this.window=$(window),this.$pageAside=$(".page-aside"),this.$allSpots=$(".app-travel .spot-info"),this.allSpots=this.getAllListItems(this.$allSpots),this.$allHotels=$(".app-travel .hotel-info"),this.allHotels=this.getAllListItems(this.$allHotels),this.$allReviews=$(".app-travel .review-info"),this.allReviews=this.getAllListItems(this.$allReviews),this.mapbox=new Map,this.map=this.mapbox.getMap(),this.markers=new Markers(this.$allSpots,this.$allHotels,this.$allReviews,this.map),this.allMarkers=this.markers.getAllMarkers(),this.markersInMap=null,this.spotsNum=null,this.hotelsNum=null,this.reviewsNum=null,this.states={mapChange:!0,listItemActive:!1,optionChange:"spots"}}},{key:"process",value:function(){babelHelpers.get(AppTravel.prototype.__proto__||Object.getPrototypeOf(AppTravel.prototype),"process",this).call(this),this.handleResize(),this.steupListItem("spots"),this.steupListItem("hotels"),this.steupListItem("reviews"),this.steupMapChange(),this.setupTabChange(),this.handleSwitchClick(),this.handleSpotAction()}},{key:"getAllListItems",value:function($allListItems){var allListItems=[];return $allListItems.each(function(){allListItems.push(this)}),allListItems}},{key:"optionChange",value:function(change){var self=this;if(this.states.optionChange=change,change){self.markers.markers&&self.markers.deleteMarkers();var tabOption=self.states.optionChange;self.markers.addMarkersByOption(tabOption),self.changeListItemsByOption(tabOption)}}},{key:"mapChange",value:function(change){if(change);else{var tabOption=this.states.optionChange;this.changeListItemsByOption(tabOption)}this.states.mapChange=change}},{key:"listItemActive",value:function(active){if(active){var tabOption=this.states.optionChange;this.changeMapOnListActiveByOption(tabOption)}this.states.listItemActive=active}},{key:"changeListItems",value:function(allListItems){var itemsInList=[];this.markersInMap=this.markers.getMarkersInMap();for(var i=0;i<this.allMarkers.length;i++)-1===this.markersInMap.indexOf(i)?$(allListItems[i]).hide():($(allListItems[i]).show(),itemsInList.push($(allListItems[i])));return itemsInList}},{key:"onSpotsListChange",value:function(spotsItemsInList){$(".clearfix.hidden-xl-down").remove();for(var i=0;i<spotsItemsInList.length;i++)if(i>0&&(i+1)%2==0){var $clear=$("<div></div>").addClass("clearfix hidden-xl-down");spotsItemsInList[i].after($clear)}}},{key:"onReviewsListChange",value:function(reviewsItemsInList){var $lastReview=$(".last-review");$lastReview.length>0&&$lastReview.removeClass("last-review");var length=reviewsItemsInList.length;length>0&&reviewsItemsInList[length-1].addClass("last-review")}},{key:"changeListItemsByOption",value:function(option){var optionString=option.substring(0,1).toUpperCase()+option.substring(1),itemsInList=this.changeListItems(this["all"+optionString]);this["on"+optionString+"ListChange"]&&this["on"+optionString+"ListChange"](itemsInList),this.window.trigger("resize")}},{key:"changeMapOnListActive",value:function(num){this.map.panTo(this.allMarkers[num].getLatLng()),this.allMarkers[num].openPopup()}},{key:"changeMapOnListActiveByOption",value:function(option){this.changeMapOnListActive(this[option+"Num"])}},{key:"steupListItem",value:function(option){var _this2=this,self=this,optionString=option.substring(0,1).toUpperCase()+option.substring(1);this["$all"+optionString].on("click",function(){$(".rating").on("click",function(event){event.stopPropagation()}),self[option+"Num"]=self["all"+optionString].indexOf(this),self.listItemActive(!0)}),this["$all"+optionString].on("mouseup",function(){_this2.listItemActive(!1)})}},{key:"setupTabChange",value:function(){var self=this;$('a[data-toggle="tab"]').on("shown.bs.tab",function(e){var href=$(e.target).attr("href");if(href){var option=href.substring(1);self.optionChange(""+option)}})}},{key:"steupMapChange",value:function(){var _this3=this;this.map.on("viewreset move",function(){_this3.mapChange(!0)}),this.map.on("ready blur moveend dragend zoomend",function(){_this3.mapChange(!1)})}},{key:"handleSwitchClick",value:function(){var self=this;$(document).on("click",".page-aside .page-aside-switch",function(event){if(self.$pageAside.hasClass("open")){var tabOption=self.states.optionChange;self.changeListItemsByOption(tabOption)}else event.stopPropagation()})}},{key:"handleResize",value:function(){var _this4=this;this.window.on("resize",function(){_this4.mapbox.handleMapHeight()})}},{key:"handleSpotAction",value:function(){$(document).on("click",".card-actions",function(){$(this).toggleClass("active")})}}]),AppTravel}(_Site3.default),instance=null;exports.default=AppTravel,exports.AppTravel=AppTravel,exports.run=function(){getInstance().run()},exports.getInstance=getInstance});;;